<?php namespace App\Modules\Friends\Models;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model {

    public static function boot()
    {
        parent::boot();

        static::updating( function( $user ){
            \Log::info( $user );
        });
    }
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'friends';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'user_id', 'friend_id', 'request', 'friendship', 'invitation_text' ];
    
}
