<?php

namespace App\Http\Controllers\Auth;

use App\Modules\Users\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

//    public function getSocialAuth($provider=null)
//    {
//        if(!config("services.$provider")) abort('404'); //just to handle providers that doesn't exist
//
//        return $this->socialite->with($provider)->redirect();
//    }
//
//
//    public function getSocialAuthCallback( /*Request $request*/ $provider=null)
//    {
//        $user = $this->findByUsernameOrCreate( $this->socialite->with('facebook')->user() );
//        Auth::login($user, true);
//        return redirect('/');
//
//    }
//
//    public function findByUsernameOrCreate( $user )
//    {
//        return User::firstOrCreate([
//            'name'      => $user->name,
//            'email'     => $user->email,
//            'photo'     => $user->avatar
//        ]);
//    }
}
