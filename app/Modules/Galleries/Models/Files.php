<?php namespace App\Modules\Galleries\Models;

use Illuminate\Database\Eloquent\Model;

class Files extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'files';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'file_name', 'thumb', 'original_name', 'gallery_id', 'post_id' ];
}
