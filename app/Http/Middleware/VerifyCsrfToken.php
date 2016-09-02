<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    /**
     * Determine if the session and input CSRF tokens match.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
//    protected function tokensMatch($request)
//    {
//        // If request is an ajax request, then check to see if token matches token provider in
//        // the header. This way, we can use CSRF protection in ajax requests also.
//        $token = $request->ajax() ? $request->header('X-CSRF-TOKEN') : $request->input('_token');
//
//        return $request->session()->token() == $token;
//    }

//    public function handle($request, Closure $next)
//    {
//        if($request->input('_token')) {
//            if ( \Session::getToken() != $request->input('_token')) {
//                \Log::error("Expired token found. Redirecting to /");
//                return redirect()->guest('/');
//            }
//        }
//
//        return parent::handle($request, $next);
//    }
}
