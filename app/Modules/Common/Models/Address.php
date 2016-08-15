<?php
namespace App\Modules\Common\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

    protected $table = 'address';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'id', 'address', 'latitude', 'longitude', 'user_id' ];

    public function user()
    {
        return $this->belongsTo('App\Modules\Users\Models\User', 'user_id');
    }

    public function post()
    {
        return $this->belongsTo('App\Modules\Posts\Models\Posts', 'post_id');
    }

}
