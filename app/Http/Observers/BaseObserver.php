<?php namespace App\Http\Observers;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Events;
class BaseObserver
{

    public function __construct( Events $events )
    {
        $this->event = $events;
    }

    /**
     * @param Model $model
     */
    public function created( $model )
    {
        $class = new \ReflectionClass($model);

        $this->event->create([
            'revisionable_model'    => $class->getName(),
            'type'                  => strtolower( $class->getShortName() ),
            'event_id'              => $model->id,
            'user_id'               => \Auth::id(),
            'action'                   => 'create'
        ]);     

    }

    
    public function updated( $user )
    {
        \Log::info( 'updatedd' );
    }

    
//    public function saved( $user )
//    {
//        \Log::info( 'savedd' );
//    }

   
    public function deleted( $user )
    {
        \Log::info( 'deletedd' );
    }
    
}