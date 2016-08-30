<?php namespace App\Modules\Galleries\Repositories;

use App\Modules\Galleries\Models\Gallery;
use App\Http\Repositories\Repository;
use App\Modules\Friends\Repositories\FriendsRepositoryInterface;
use \DB;
class GalleryRepository extends Repository implements GalleryRepositoryInterface
{

    public function __construct(Gallery $gallery, FriendsRepositoryInterface $friends )
    {
        $this->model = $gallery;
        $this->friends = $friends;
    }

    public function galleries( $id = null )
    {
        $ids = [];
        if( $id ){
            $ids = $id;
        }else{
            $friends = $this->friends->userFriends( \Auth::id()); \Log::info( $friends );
            foreach ( $friends as $friend )
            {
                $ids[] = $friend->id;
            }
        }
            
        return $this->model->with( 'files', 'user' )->whereIn( 'user_id', $ids )->get();
    }

    public function saveName( $name )
    {
        $gallery = new Gallery();
        $gallery->name = $name;
        $gallery->user_id = \Auth::user()->id;
        $gallery->save();
        return $gallery->id;
    }

    public function gallery( $id )
    {
        return $this->model->with('images')->find($id);

    }

}