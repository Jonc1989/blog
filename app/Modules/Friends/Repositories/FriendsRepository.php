<?php namespace App\Modules\Friends\Repositories;

use App\Modules\Friends\Models\Friends;
use App\Http\Repositories\Repository;
use Illuminate\Support\Facades\DB;
class FriendsRepository extends Repository implements FriendsRepositoryInterface
{

    public function __construct(Friends $friends)
    {
        $this->model = $friends;
    }

    public function add( $id )
    {
        $this->model->create([
            'user_id'       => \Auth::user()->id,
            'friend_id'     => $id,
            'request'       => '1',
            'friendship'    => '0'
        ]);
    }

    public function friendshipStatus( $id ){
        return $this->model->where( 'user_id', \Auth::user()->id )
            ->where( 'friend_id', $id )->get();
    }

    public function userFriends( $id )
    {
        return $this->model
            ->join('users', function ($join) use ( $id ){
                $join->on( 'users.id', '=', 'friends.friend_id')
                    ->where( 'friends.user_id', '=', $id )
                ->orOn( 'users.id', '=', 'friends.user_id')
                    ->where( 'friends.friend_id', '=', $id );
            })->get();
    }



















    public function invitations($id)
    {
        return $this->model
        ->where('user_id', $id)
            ->where('friendship', '1')->get();
    }

    public function accept( $user, $invitor)
    {
        $this->model->where('friend_id', $user)->where('user_id', $invitor)
            ->update([
                'request' => 0,
                'friendship' => 1
            ]);

        $this->model->create([
            'user_id'       => $user,
            'friend_id'     => $invitor,
            'request'       => '0',
            'friendship'    => '1'
        ]);
    }

    public function cancelFriendship( $id )
    {
        $this->model->where('friend_id', $id )
            ->where('user_id', \Auth::user()->id )->delete();

        $this->model->where('user_id', $id )
            ->where('friend_id', \Auth::user()->id )->delete();
    }

}