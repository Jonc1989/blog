<?php namespace App\Http\Observers;;

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
            'revisionable_type'     => $class->getName(),
            'revisionable_id'       => $model->id,
            'user_id'               => \Auth::id()
        ]);
    }

    
    public function updated( $user )
    {

    }

    
    public function saved( $user )
    {

    }

   
    public function deleted( $user )
    {

    }
    
}