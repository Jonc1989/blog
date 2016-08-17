<?php

namespace App\Modules\Friends\Controllers\api;

use App\Http\Controllers\ApiController;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Modules\Friends\Repositories\FriendsRepositoryInterface;
use Illuminate\Support\Facades\Input;
class FriendController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( FriendsRepositoryInterface $friends )
    {
        //$this->middleware('guest');
        $this->friends = $friends;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('modules.galleries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //if( Input::get( 'id' ) && Input::get( 'status' ) ){
            $id = Input::get( 'id' );
            $status = Input::get( 'status' );
            return $this->respond( $this->friends->add($id, $status) );
        //}else{
        //    return $this->respondError();
        //}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param $id
     */
    public function status( $id )
    {
        return $this->friends->friendshipStatus( $id );
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function friends( $id )
    {
        return $this->respond( $this->friends->userFriends( $id ) );
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function invitations()
    {
        return $this->respond( $this->friends->invitations() );
    }
}
