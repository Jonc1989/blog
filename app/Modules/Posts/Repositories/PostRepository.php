<?php namespace App\Modules\Posts\Repositories;

use App\Modules\Common\Models\Location;
use App\Modules\Posts\Models\Posts;
use App\Http\Repositories\Repository;
use App\Modules\Posts\Events\PostAdded;
use App\Modules\Users\Models\User;
class PostRepository extends Repository implements PostRepositoryInterface
{
    public function __construct( Posts $posts, User $user )
    {
        $this->model = $posts;
        $this->user = $user;
    }

    public function posts( $per_page, $current_page, $authId, $userId )
    {
        \DB::enableQueryLog();
//        $query = $this->model->with( 'user', 'files', 'location' );
//        if( $id ){
//            $query = $query->where( 'user_id', $id );
//        }
//        return $query->orderBy('updated_at', 'DESC')->paginate($per_page, ['*'], '', $current_page );

        if( !$userId ) {
            $userId = $authId;
        }

        $friend_id = $this->user
            ->join('friends', function ($join) use( $authId ){
                $join->on('friends.friend_id', '=', 'users.id')
                    ->where('friends.user_id', '=', $authId)
                    ->orOn('friends.user_id', '=', 'users.id')
                    ->where('friends.friend_id', '=', $authId);
            })
            ->where('friends.friendship', '1')
            ->select('users.id')
            ->get()->toArray();

        $ids = [];
        foreach ($friend_id as $id) {
            $ids[] = $id['id'];
        }
        $ids[] = \Auth::id();

        $data = $this->user
            ->join('posts', function ($join) {
                $join->on('posts.sender_id', '=', 'users.id')
                    ->orOn('posts.receiver_id', '=', 'users.id');
            })
            ->leftJoin('location', 'posts.location_id', '=', 'location.id')
            ->leftJoin('files', 'posts.id', '=', 'files.post_id')
            ->whereIn('users.id', $ids)
            ->select(
                'users.id',
                'users.name',
                'users.surname',
                'posts.id as p_id',
                'posts.content',
                'posts.location_id',
                'posts.updated_at',
                'location.id as l_id',
                'location.address',
                'location.latitude',
                'location.longitude',
                'files.id as f_id',
                'files.file_name'

            )
            ->orderBy('updated_at', 'DESC')->paginate($per_page, ['*'], '', $current_page);


        \Log::info(\DB::getQueryLog());

        return $data;
    }

    public function createPost( $data )
    {
        $post = new Posts();
        $post->content = $data['post'];
        $post->user_id = \Auth::user()->id;

        if( $data['location'] != '' ){
            $location = new Location();
            $location->address = $data['location'];
            $location->latitude = $data['latitude'];
            $location->longitude = $data['longitude'];
            $location->save();
            $post->location_id = $location->id;
        }

        

        $post->save();
        event( new PostAdded('Ok'));
        return $post->id;
    }
}
