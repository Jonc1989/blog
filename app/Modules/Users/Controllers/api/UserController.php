<?php

namespace App\Modules\Users\Controllers\api;

use App\Modules\Users\Repositories\UsersRepositoryInterface;
use App\Modules\Friends\Repositories\FriendsRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( UsersRepositoryInterface $user, FriendsRepositoryInterface $friends )
    {
        $this->user = $user;
        $this->friends = $friends;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        count(Input::all()) > 0 ? $fields = Input::all() : $fields = ['*'];
        return $this->user->find( $id, $fields );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param $key
     */
    public function search($key)
    {
        return $this->user->searchBy('name', 'surname', $key);
    }

    
    public function online()
    {
        count(Input::all()) > 0 ? $fields = Input::all() : $fields = ['*'];
        return $this->user->onlineUsers( $fields );
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
     */
    public function add($id)
    {
        $this->friends->add($id);
    }
}
