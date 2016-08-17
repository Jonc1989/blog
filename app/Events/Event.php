<?php

namespace App\Events;
use Illuminate\Database\Eloquent\Model;
abstract class Event
{
    public function __construct()
    {
        //
    }
    
    public function handle(Model $user, $remember)
    {
        //
    }
}
