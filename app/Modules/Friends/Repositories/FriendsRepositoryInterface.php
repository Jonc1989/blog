<?php namespace App\Modules\Friends\Repositories;

use App\Modules\Friends\Models\Friends;

interface FriendsRepositoryInterface
{
    public function __construct(Friends $friends);

    public function add($id);

    public function friendshipStatus( $id );

    public function invitations($id);

    public function accept( $user, $invitor);

    public function cancelFriendship( $id );
}