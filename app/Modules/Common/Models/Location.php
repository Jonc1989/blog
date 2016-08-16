<?php
namespace App\Modules\Common\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {

    protected $table = 'location';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'id', 'address', 'latitude', 'longitude', 'user_id' ];

    
    

}
