<?php namespace App\Modules\Common\Repositories;

use App\Modules\Common\Models\Address;

interface AddressRepositoryInterface
{
    public function __construct(Address $address);

}