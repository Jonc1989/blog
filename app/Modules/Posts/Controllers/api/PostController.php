<?php

namespace App\Modules\Posts\Controllers\api;

use App\Http\Controllers\ApiController;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Modules\Posts\Repositories\PostRepositoryInterface;
use App\Modules\Galleries\Repositories\FileRepositoryInterface;
class PostController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( PostRepositoryInterface $posts, FileRepositoryInterface $files )
    {
        //$this->middleware('auth');
        $this->posts = $posts;
        $this->files = $files;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*Input::get('authId') != null ? */ $authId = Input::get('authId'); /* : $authId = null;*/
        /*Input::get('userId') != null ? */ $userId = Input::get('userId'); /* : $userId = null; */
        Input::get('per_page') != null ?  $per_page = Input::get('per_page') : $per_page = 15;
        Input::get('current') != null ?  $current_page = Input::get('current') : $current_page = 1;
        return $this->posts->posts( $per_page, $current_page, $authId, $userId );
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
        if( Input::get('post'))
        {
            return $this->respond( $this->posts->createPost( Input::all() ));
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
        //
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

    public function save_file()
    {
        $files = Input::file( 'files');
        $response = null;
        $path = storage_path() . '\users\\' . \Auth::user()->id . '\posts\\' . Input::get('id');
        $thumb_path = storage_path() . '\users\\' . \Auth::user()->id . '\posts\\' . Input::get('id') . '\thumbnails';

        $max_size = 2097152;

        foreach( $files as $file )
        {
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

                $data = $this->files->create([
                    'file_name'      => $imageName,
                    'thumb'         => $imageName,
                    'original_name' => $file->getClientOriginalName(),
                    'post_id'    => Input::get('id')
                ]);

                
            }else{
                return $this->respondError();
            }
        }
        return $this->respondSuccess( null, $files );
    }
}
