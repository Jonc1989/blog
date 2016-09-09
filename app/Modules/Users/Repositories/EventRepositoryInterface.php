<?php namespace App\Modules\Users\Repositories;

use App\Http\Models\Events;

interface EventRepositoryInterface
{

    public function __construct( Events $events );

    public function allEvents( $id );

}
