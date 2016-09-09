<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'event_type', 'event_id', 'user_id', 'key', 'old_value', 'new_value', 'created_at', 'updated_at'
    ];

}
