<?php namespace App\Modules\Common\Repositories;

use App\Modules\Common\Models\Likes;
use App\Http\Repositories\Repository;
class LikesRepository extends Repository implements LikesRepositoryInterface
{
    public function __construct( Likes $likes )
    {
        $this->model = $likes;
    }

    public function getLikes( $postId, $type )
    {
        return $this->model->where( 'post_id', $postId )->where( 'type', $type )->get();
    }

    public function deleteLike( $authId, $postId, $type )
    {
        return $this->model
            ->where( 'user_id', $authId )
            ->where( 'post_id', $postId )
            ->where( 'type', $type )
            ->delete();
    }
}
