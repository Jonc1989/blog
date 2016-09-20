<?php namespace App\Modules\Galleries\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'file_name', 'thumb', 'original_name', 'gallery_id', 'post_id', 'path' ];

    public function likes()
    {
        return $this->hasMany( 'App\Modules\Common\Models\Likes', 'post_id' );
    }

    public function rating()
    {
        return $this->hasOne( 'App\Modules\Galleries\Models\Ratings', 'post_id' );
    }
}
