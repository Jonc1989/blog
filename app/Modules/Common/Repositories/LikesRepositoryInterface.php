<?php namespace App\Modules\Common\Repositories;

use App\Modules\Common\Models\Likes;

interface LikesRepositoryInterface
{
    public function __construct(Likes $likes);
    
    public function getLikes( $postId, $type );

    public function deleteLike( $authId, $postId, $type );

}