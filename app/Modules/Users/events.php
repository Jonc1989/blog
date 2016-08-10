<?php

Event::listen( 'user.logout', 'App\Modules\Users\Events\OnlineStatusHandler@logout' );