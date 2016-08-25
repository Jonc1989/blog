<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Revisions extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'revisionable_type', 'revisionable_id', 'user_id', 'key', 'old_value', 'new_value', 'created_at', 'updated_at'
    ];

}
