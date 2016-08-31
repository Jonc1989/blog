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

        $ids = [];
        if( $userId == '' ) {

            $friend_id = $this->user
                ->join('friends', function ($join) {
                    $join->on('friends.friend_id', '=', 'users.id')
                        ->where('friends.user_id', '=', \Auth::id())
                        ->orOn('friends.user_id', '=', 'users.id')
                        ->where('friends.friend_id', '=', \Auth::id());
                })
                ->where('friends.friendship', '1')
                ->select('users.id')
                ->get()->toArray();


            foreach ($friend_id as $id) {
                $ids[] = $id['id'];
            }
            $ids[] = \Auth::id();

        }else{
            $ids[] = $userId;
        }


        $data = $this->model
            ->whereIn( 'receiver_id', $ids)
            ->orWhere(function ($query) use ($ids) {
                $query->whereIn('sender_id', $ids );
                    })
            ->with( 'senders', 'receivers', 'location', 'likes.user' )
            ->orderBy('updated_at', 'DESC')->paginate($per_page, ['*'], '', $current_page);

        return $data;
    }

    public function createPost( $data )
    {
        $post = new Posts();
        $post->content = $data['post'];
        $post->sender_id = \Auth::user()->id;
        if (array_key_exists('userId', $data)) {
            $post->receiver_id = $data['userId'];
        }


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
