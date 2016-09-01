<?php

namespace App\Modules\Galleries\Controllers\api;

use App\Http\Controllers\ApiController;
use App\Modules\Galleries\Repositories\ImageRepositoryInterface;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Modules\Galleries\Repositories\GalleryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class GalleryController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( GalleryRepositoryInterface $gallery, ImageRepositoryInterface $images )
    {
        $this->gallery = $gallery;
        $this->images = $images;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->respond( $this->gallery->galleries( Input::get( 'auth' ) ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $galleryId = null;
        if(Input::get('name'))
        {
            $galleryId = $this->gallery->saveName( Input::get('name') );


            $response = null;
            $path = storage_path() . '\users\\' . \Auth::user()->id . '\galleries\\' . $galleryId;
            $max_size = 10097152;
            $files = Input::file( 'files');


            foreach( $files as $file ){

                    $imageName = str_random(30) . '.' . $file->getClientOriginalExtension();

                    if($file->getSize() < $max_size)
                    {
                        $response = $file->move( $path, $imageName );

                        //                $manager     = new ImageManager();
                        //                $height = $manager->make($path.$imageName)->height();
                        //                $width = $manager->make($path.$imageName)->width();
                        //
                        //                $index = $width / $height;
                        //
                        //                $manager->make($path.$imageName)->resize( (228 * $index), 228 )
                        //                    ->crop(228, 228)->save($thumb_path . $imageName);

                        $data = $this->images->create([
                            'file_name'      => $imageName,
                            'thumb'         => $imageName,
                            'original_name' => $file->getClientOriginalName(),
                            'gallery_id'    => $galleryId,
                            'path'          => $path . '\\' . $imageName
                        ]);

                    }else{
                        return $this->respondError();
                    }
            }
        }else{
            return $this->respondError();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->respond( $this->gallery->gallery( $id ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function read( $user_id, $gallery, $id )
    {
        $response = Response::make( \File::get( storage_path() . '/users/' . $user_id . '/galleries/' . $gallery . '/' . $id ), 200 );
        $response->header("Content-Type", 'image/jpeg');
        return $response;
    }

}
