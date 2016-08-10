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
    protected $fillable = [ 'img_name', 'thumb', 'original_name', 'gallery_id' ];
}
