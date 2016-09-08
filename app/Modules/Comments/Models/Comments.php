<?php namespace App\Modules\Comments\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comments';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'user_id', 'post_id', 'type', 'text', 'created_at', 'updated_at' ];

	public function user()
	{
		return $this->belongsTo('App\Modules\Users\Models\User', 'user_id');
	}

}
