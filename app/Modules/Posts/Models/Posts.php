<?php namespace App\Modules\Posts\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model {
    
    
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'content', 'sender_id', 'receiver_id', 'post_type', 'content_id', 'location_id', 'created_at', 'updated_at' ];

    public function user()
    {
        return $this->belongsTo('App\Modules\Users\Models\User', 'user_id');
    }

    public function senders()
    {
        return $this->belongsTo('App\Modules\Users\Models\User', 'sender_id');
    }

    public function receivers()
    {
        return $this->belongsTo('App\Modules\Users\Models\User', 'receiver_id');
    }

    public function images()
    {
        return $this->hasMany('App\Modules\Galleries\Models\Images', 'post_id');
    }

    public function location()
    {
        return $this->belongsTo('App\Modules\Common\Models\Location', 'location_id');
    }

    public function likes()
    {
        return $this->hasMany( 'App\Modules\Common\Models\Likes', 'post_id' );
    }
    
}
