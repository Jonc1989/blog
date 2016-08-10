<?php

namespace App\Modules;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('session.timeout');
        \Blade::setEscapedContentTags( '<%%', '%%>' );
        \Blade::setContentTags( '<%', '%>' );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modules.home.home');
    }
}
