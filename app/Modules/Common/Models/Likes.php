<?php
namespace App\Modules\Common\Models;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model {

    protected $table = 'likes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'id', 'user_id', 'post_id', 'created_at', 'updated_at' ];

    public function user()
    {
        return $this->belongsTo('App\Modules\Users\Models\User', 'user_id');
    }


}
