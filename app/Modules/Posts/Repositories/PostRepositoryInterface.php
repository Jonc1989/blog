<?php namespace App\Modules\Posts\Repositories;

use App\Modules\Posts\Models\Posts;

interface PostRepositoryInterface
{
    public function __construct(Posts $posts);

    public function posts( $per_page, $current_page, $id );
        
    public function createPost( $data );
}