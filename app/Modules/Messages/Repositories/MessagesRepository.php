<?php namespace App\Modules\Messages\Repositories;

use App\Modules\Messages\Models\Messages;
use App\Http\Repositories\Repository;
use Illuminate\Support\Facades\DB;
class MessagesRepository extends Repository implements MessagesRepositoryInterface
{

    public function __construct(Messages $messages)
    {
        $this->model = $messages;
    }

    public function messengers()
    {
        //DB::enableQueryLog();
        $data = $this->model->join('users', function ($join){
            $join->on( 'users.id', '=', 'messages.sender_id')
                ->where( 'messages.receiver_id', '=', \Auth::user()->id )
                ->orOn( 'users.id', '=', 'messages.receiver_id')
                ->where( 'messages.sender_id', '=', \Auth::user()->id );
            })
            ->orderBy( 'messages.updated_at', 'desc' )
            ->select(
            'users.id',
            'users.name',
            'users.surname'
            )
            ->groupby('users.id')
            ->paginate();

        return $data;
    }

    public function messages( $id )
    {
        //DB::enableQueryLog();
        return $this->model
            ->where( 'sender_id', '=', $id )
            ->where( 'receiver_id', \Auth::user()->id )

            ->orWhere('receiver_id', '=', $id )
            ->where('sender_id', \Auth::user()->id )
            ->with([ 'receivers', 'senders'])

//            ->join('users as a', function ($join) use ( $id ) {
//                $join->on( 'a.id', '=', 'messages.sender_id')
//                    ->where( 'messages.sender_id', '=', $id)
//                    ->where( 'messages.receiver_id', '=', \Auth::user()->id );
//            })
//
//            ->join('users as b', function ($join) use ( $id ) {
//                $join->on( 'b.id', '=', 'messages.receiver_id')
//                    ->where( 'messages.receiver_id', '=', $id )
//                    ->where( 'messages.sender_id', '=', \Auth::user()->id );
//            })


            ->orderBy('created_at', 'DESC')
            ->paginate();

//        \Log::info( DB::getQueryLog() );
    }
    
    public function getNewMessagesCount( $id )
    {
        return $this->model
            ->where( 'receiver_id', '=', $id )
            ->where( 'readed', 0 )
            ->count();
    }
}

