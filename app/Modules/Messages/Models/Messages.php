<?php namespace App\Modules\Messages\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['text', 'sender_id', 'receiver_id', 'readed', 'answered' ];

    public function senders()
    {
        return $this->belongsTo('App\Modules\Users\Models\User', 'sender_id');
    }

    public function receivers()
    {
        return $this->belongsTo('App\Modules\Users\Models\User', 'receiver_id');
    }

}
