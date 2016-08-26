<?php namespace App\Http\Observers;;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Revisions;
class BaseObserver
{

    public function __construct( Revisions $revisions ) 
    {
        $this->revision = $revisions;
    }

    /**
     * @param Model $model
     */
    public function created( $model )
    {
        $class = new \ReflectionClass($model);
        
        $this->revision->create([
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