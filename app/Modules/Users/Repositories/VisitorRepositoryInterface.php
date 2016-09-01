<?php namespace App\Modules\Users\Repositories;

use App\Modules\Users\Models\Visitors;

interface VisitorRepositoryInterface
{

    public function __construct( Visitors $visitors );

    public function allGuests( $id );

}
