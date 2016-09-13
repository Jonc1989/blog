<?php namespace App\Modules\Comments\Repositories;

use App\Modules\Comments\Models\Comments;
use App\Http\Repositories\Repository;
class CommentsRepository extends Repository implements CommentsRepositoryInterface
{
    public function __construct( Comments $comments )
    {
        $this->model = $comments;
    }

    public function allComments( $post_id, $type )
    {
        return $this->model->where( 'post_id', $post_id )->where( 'type', $type )->with( 'user' )->orderBy( 'updated_at', 'desc' )->get();
    }
}
