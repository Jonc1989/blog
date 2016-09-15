<?php namespace App\Modules\Friends\Repositories;

use App\Modules\Friends\Models\Friends;

interface FriendsRepositoryInterface
{
    public function __construct(Friends $friends);

    public function add($id, $status );

    public function friendshipStatus( $id );

    public function userFriends( $id );

    public function friendsOnline( $fields );

    public function invitations();
    
}