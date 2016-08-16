<?php namespace App\Modules\Common\Repositories;

use App\Modules\Common\Models\Location;
use App\Http\Repositories\Repository;
class LocationRepository extends Repository implements LocationRepositoryInterface
{
    public function __construct( Location $location )
    {
        $this->model = $location;
    }

}
