<?php namespace App\Modules\Posts\Repositories;

use App\Modules\Posts\Models\Posts;

interface PostRepositoryInterface
{
    public function __construct(Posts $posts);

    public function posts();
        
    public function createPost( $data );
}