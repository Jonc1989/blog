<?php namespace App\Modules\Users\Repositories;

use App\Modules\Users\Models\User;

interface UsersRepositoryInterface
{

    public function __construct( User $user );

    public function getAll();

    public function searchBy( $attribute1, $attribute2, $value );

}
