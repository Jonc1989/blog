<?php namespace App\Modules\Posts\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model {

    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'content', 'user_id', 'post_type', 'content_id', 'location_id' ];

    public function user()
    {
        return $this->belongsTo('App\Modules\Users\Models\User', 'user_id');
    }

    public function files()
    {
        return $this->hasMany('App\Modules\Galleries\Models\Files', 'post_id');
    }

    public function location()
    {
        return $this->belongsTo('App\Modules\Common\Models\Address', 'location_id');
    }

}
