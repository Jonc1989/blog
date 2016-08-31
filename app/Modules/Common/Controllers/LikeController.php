<?php

namespace App\Modules\Common\Controllers;

use App\Http\Controllers\ApiController;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Modules\Common\Repositories\LikesRepositoryInterface;
class LikeController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( LikesRepositoryInterface $likes )
    {
        $this->likes = $likes;
    }

    public function like()
    {
        \Log::info(Input::get('params.status'));
        $authId = Input::get('params.authId');
        $postId = Input::get('params.postId');
        $status = Input::get('params.status');

        if( $status == 'true' ){
            $response = $this->likes
                
                ->where( 'user_id', $authId )
                ->where( 'post_id', $postId )
                ->delete();
        }else{
            $response = $this->likes->create([
                'user_id'       => $authId,
                'post_id'       => $postId
            ]);
        }

        return $this->respond( $response );
    }

}
