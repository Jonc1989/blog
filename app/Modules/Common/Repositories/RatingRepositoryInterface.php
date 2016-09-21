<?php namespace App\Modules\Common\Repositories;

use App\Modules\Common\Models\Ratings;

interface RatingRepositoryInterface
{
    public function __construct(Ratings $ratings);

    public function rate( $data );

}