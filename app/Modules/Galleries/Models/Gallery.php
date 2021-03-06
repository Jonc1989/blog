<?php namespace App\Modules\Galleries\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'galleries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'user_id'];

    public function images()
    {
        return $this->hasMany('App\Modules\Galleries\Models\Images', 'gallery_id');
    }

    public function user()
    {
        return $this->belongsTo( 'App\Modules\Users\Models\User' );
    }

    public function likes()
    {
        return $this->hasMany( 'App\Modules\Common\Models\Likes', 'post_id' );
    }
}
