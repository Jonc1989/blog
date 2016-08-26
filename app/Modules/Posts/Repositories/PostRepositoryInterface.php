<?php namespace App\Modules\Posts\Repositories;

use App\Modules\Posts\Models\Posts;
use App\Modules\Users\Models\User;
interface PostRepositoryInterface
{
    public function __construct( Posts $posts, User $user );

    public function posts( $per_page, $current_page, $authId, $userId );
        
    public function createPost( $data );
}