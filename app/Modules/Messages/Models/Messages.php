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
    protected $fillable = ['text', 'sender_id', 'reciver_id'];

    public function senders()
    {
        return $this->belongsTo('App\Modules\Users\Models\User', 'sender_id');
    }

    public function recivers()
    {
        return $this->belongsTo('App\Modules\Users\Models\User', 'reciver_id');
    }

}
