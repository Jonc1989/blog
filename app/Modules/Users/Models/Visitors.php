<?php

namespace App\Modules\Users\Models;

use Illuminate\Database\Eloquent\Model;
class Visitors extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'visitor_id', 'created_at', 'updated_at'
    ];

    public function visitor()
    {
        return $this->belongsTo('App\Modules\Users\Models\User', 'visitor_id');
    }
}

