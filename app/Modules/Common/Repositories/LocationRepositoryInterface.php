<?php namespace App\Modules\Common\Repositories;

use App\Modules\Common\Models\Location;

interface LocationRepositoryInterface
{
    public function __construct(Location $location);

}