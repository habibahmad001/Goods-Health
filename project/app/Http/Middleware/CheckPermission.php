<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;

class CheckPermission
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
        if($request->prefix == Auth::user()->role->role_slug){
            if(Auth::user()->role_id == 4 && request()->is('*/user/provider')){
                abort(403, 'Access denied');
                exit();
            }else{
                return $next($request); 
            }
        }else{
            abort(403, 'Access denied');
            exit();
        }
    }
}
