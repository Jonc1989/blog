<?php namespace App\Modules\Friends\Models;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model {

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

    public function user()
    {
        return $this->belongsTo('App\Modules\Users\Models\User', 'user_id');
    }
}
