<?php namespace App\Modules\Common\Repositories;

use App\Modules\Common\Models\Likes;
use App\Http\Repositories\Repository;
class LikesRepository extends Repository implements LikesRepositoryInterface
{
    public function __construct( Likes $likes )
    {
        $this->model = $likes;
    }

}
