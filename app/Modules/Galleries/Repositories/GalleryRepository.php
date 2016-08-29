<?php namespace App\Modules\Galleries\Repositories;

use App\Modules\Galleries\Models\Gallery;
use App\Http\Repositories\Repository;
use \DB;
class GalleryRepository extends Repository implements GalleryRepositoryInterface
{

    public function __construct(Gallery $gallery)
    {
        $this->model = $gallery;
    }

    public function galleries( $id = false )
    {
        if( $id )
        {
            $gallery = $this->model->find( $id )->first();

            $data['user'] = \DB::select( DB::raw("SELECT * FROM users WHERE id = '" . $gallery->user_id ."'") );

            $data['gallery'] = $this->model->leftJoin( 'files', function ($join) {
                $join
                    ->on( 'galleries.id', '=', 'files.gallery_id' );
            })->where('galleries.id', $id)
                ->select('galleries.id',
                    'galleries.name',
                    'galleries.user_id',
                    'galleries.created_at',
                    'galleries.updated_at',
                    'files.id as image_id',
                    'files.img_name as image_name',
                    'files.id as image_id',
                    'files.thumb'
                )->get();

            return $data;

        }else{
            return $this->model->with('files')->get();
        }
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