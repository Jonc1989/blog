<?php namespace App\Modules\Messages\Controllers\api;

use App\Http\Requests;
use App\Http\Controllers\ApiController;
use App\Modules\Messages\Events\MessageSent;
use App\Modules\Messages\Events\MessageReaded;
use App\Modules\Messages\Repositories\MessagesRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
class MessagesController extends ApiController {


    public function __construct(MessagesRepositoryInterface $message)
    {
        //$this->middleware('auth');
        $this->message = $message;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return $this->message->messangers();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        if( Input::get( 'messageText' ) && Input::get( 'receiver' ) )
        {
            $message = Input::get( 'messageText' );
            $sender = \Auth::user()->id;
            $receiver = Input::get( 'receiver' );

            $data = [
                'sender_id'     => $sender,
                'receiver_id'    => $receiver,
                'text'          => $message,
				'readed'		=> 0,
				'answered'		=> 0
            ];
			
            $response =  $this->respondCreated( null, $this->message->create($data) );
	        event( new MessageSent( $receiver ));
	        return $response;
        }


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return $this->respond( $this->message->messages( $id ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::all();
		$response = $this->respondUpdated( null, $this->message->update( $data, $id ) );
		$message = $this->message->find( $id );
		event( new MessageReaded( $message->receiver_id ));
		return $response;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function messengers()
	{
		return $this->respond( $this->message->messengers() );
	}
	
	public function getNewMessageCount( $id )
	{
		return $this->respond( $this->message->getNewMessagesCount( $id ));
	}

}
