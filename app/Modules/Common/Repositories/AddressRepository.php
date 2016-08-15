<?php namespace App\Modules\Common\Repositories;

use App\Modules\Common\Models\Address;
use App\Http\Repositories\Repository;
class AddressRepository extends Repository implements AddressRepositoryInterface
{
    public function __construct( Address $address )
    {
        $this->model = $address;
    }

}
