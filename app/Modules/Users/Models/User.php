<?php

namespace App\Modules\Users\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'surname', 'email', 'online', 'year', 'gender', 'photo', 'address', 'telephone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function friends()
    {
        return $this->hasMany('App\Modules\Friends\Models\Friends', 'user_id');
    }

    public function senders()
    {
        return $this->hasMany('App\Modules\Posts\Models\Posts', 'sender_id');
    }

    public function receivers()
    {
        return $this->hasMany('App\Modules\Posts\Models\Posts', 'receiver_id');
    }
}

