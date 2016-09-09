<?php namespace App\Modules\Users\Repositories;

use App\Http\Models\Events;
use App\Http\Repositories\Repository;

class EventRepository extends Repository implements EventRepositoryInterface   
{
    /**
     * UsersRepository constructor.
     * @param Users $users
     */
    public function __construct( Events $events )
    {
        $this->model = $events;
    }
    
    public function allEvents( $id )
    {
        return $this->model->where( 'user_id', $id )->get();
    }
    
}
