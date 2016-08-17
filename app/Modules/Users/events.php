<?php

Event::listen( 'user.logout', 'App\Modules\Users\Events\OnlineStatusHandler@logout' );

Event::listen( 'Illuminate\Auth\Events\Login', 'App\Modules\Users\Events\OnlineStatusHandler@login' );

Event::listen( 'Illuminate\Auth\Events\Logout', 'App\Modules\Users\Events\OnlineStatusHandler@logoutManualy' );