<?php namespace App\Modules\Posts\Repositories;

use App\Modules\Common\Models\Location;
use App\Modules\Posts\Models\Posts;
use App\Http\Repositories\Repository;
class PostRepository extends Repository implements PostRepositoryInterface
{
    public function __construct( Posts $posts )
    {
        $this->model = $posts;
    }

    public function posts( $per_page, $current_page, $id )
    {
        $query = $this->model->with( 'user', 'files', 'location' );

        if( $id ){
            $query = $query->where( 'user_id', $id );
        }

        return $query->orderBy('updated_at', 'DESC')->paginate($per_page, ['*'], '', $current_page );
        
        //return $this->model->with('user', 'files')->where( 'user_id', $id )->orderBy('updated_at', 'DESC')->paginate($per_page, ['*'], '', $current_page );
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
        return $post->id;
    }
}
