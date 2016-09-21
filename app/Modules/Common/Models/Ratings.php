<?php namespace App\Modules\Common\Models;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ratings';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'id', 'rate', 'user_id', 'post_id', 'type', 'created_at', 'updated_at' ];

	public function user()
	{
		return $this->belongsTo( 'App\Modules\Users\Models\User', 'user_id' );
	}

}
