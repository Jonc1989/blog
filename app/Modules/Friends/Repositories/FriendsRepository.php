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

    public function add( $id, $status )
    {
        switch($status) {
            case 1:
                return $this->model->where( 'friend_id', $id )->delete();
                break;
            case 2:
                return $this->model->where( 'friend_id', $id )->delete();

            case 3:
                return $this->model->where( 'user_id', $id )->where( 'friend_id', \Auth::user()->id )->update(['friendship' => 1]);;

            case 4:
                return $this->model->where( 'friend_id', $id )->delete();

            default:
                return $this->model->create([
                    'user_id'       => \Auth::user()->id,
                    'friend_id'     => $id,
                    'request'       => '1',
                    'friendship'    => '0'
                ]);
                break;
        }
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

    public function invitations()
    {
        return $this->model
            ->join('users', 'friends.user_id', '=', 'users.id')
        ->where( 'friend_id', \Auth::user()->id )
            ->where('friendship', '0')->get();
    }

}