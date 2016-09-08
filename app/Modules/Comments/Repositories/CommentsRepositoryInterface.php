<?php namespace App\Modules\Comments\Repositories;

use App\Modules\Comments\Models\Comments;

interface CommentsRepositoryInterface
{
    public function __construct(Comments $likes);
    
    public function allComments( $post_id, $type );

}