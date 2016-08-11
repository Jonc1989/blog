<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Store;
use \Illuminate\Events\Dispatcher;
class SessionTimeout
{
    protected $session;
    protected $timeout = 2400;
    protected $event;

    public function __construct( Store $session, Dispatcher $event ){
        $this->session = $session;
        $this->event = $event;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $isLoggedIn = $request->path() != 'dashboard/logout';
        if(! session('lastActivityTime'))
            $this->session->put('lastActivityTime', time());
        elseif(time() - $this->session->get('lastActivityTime') > $this->timeout){
            $this->session->forget('lastActivityTime');
            $cookie = cookie('intend', $isLoggedIn ? url()->current() : 'dashboard');
            $email = $request->user()->email;
            //auth()->logout();
            $this->event->fire( 'user.logout', [ \Auth::user() ] );
            //return message('You had not activity in '.$this->timeout/60 .' minutes ago.', 'warning', 'login')->withInput(compact('email'))->withCookie($cookie);

            //return redirect('/login')->with('message', 'You had not activity in '.$this->timeout/60 .' minutes ago.');
        }
        $isLoggedIn ? $this->session->put('lastActivityTime', time()) : $this->session->forget('lastActivityTime');
        return $next($request);
    }
}