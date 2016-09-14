<?php

namespace App\Modules\Common\Controllers;

use App\Http\Controllers\ApiController;
use App\Http\Requests;
use App\Modules\Common\Events\Like;
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

    public function getLikes()
    {
        $postId = Input::get('postId');
        $type = Input::get('type');
        return $this->respond( $this->likes->getLikes( $postId, $type ) );
    }
    
    public function like()
    {
        $authId = Input::get('params.authId');
        $postId = Input::get('params.postId');
        $status = Input::get('params.status');
        $type = Input::get('params.type');

        if( $status == 'true' ){
            $response = $this->likes->deleteLike( $authId, $postId, $type );
        }else{
            $response = $this->likes->create([
                'user_id'       => $authId,
                'post_id'       => $postId,
                'type'       => $type
            ]);
        }

        event( new Like( [
            'postId'    => $postId,
            'type'      => $type
        ]));
        return $this->respond( $response );
    }

}
