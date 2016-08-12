<?php namespace App\Modules\Posts\Repositories;

use App\Modules\Posts\Models\Posts;
use App\Http\Repositories\Repository;
class PostRepository extends Repository implements PostRepositoryInterface
{
    public function __construct( Posts $posts )
    {
        $this->model = $posts;
    }

    public function posts()
    {
        return $this->model->with('user.profile', 'images')->orderBy('updated_at', 'DESC')->get();
    }

    public function createPost( $data )
    {
        $post = new Posts();
        $post->content = $data;
        $post->user_id = \Auth::user()->id;
        $post->save();
        return $post->id;
    }
}
