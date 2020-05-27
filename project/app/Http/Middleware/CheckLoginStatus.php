<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLoginStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        //If the status is not approved redirect to login 
        if(Auth::check()){
            if(Auth::user()->status !=  1){
                Auth::logout();
                return redirect('/login')->with('error', 'Your account has been permanently suspended. Please contact to the administrator.');
            }elseif(Auth::user()->dashboard_access !=  1){
                Auth::logout();
                return redirect('/login')->with('error', 'Your access to dashboard has been temporarily suspended. Please contact to the administrator.');
            }
            
        }
        return $response;
    }
}
