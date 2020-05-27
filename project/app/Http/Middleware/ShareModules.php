<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;

class ShareModules
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
        if(Auth::check()){
            $role_id = Auth::user()->role_id;
            $user_id = Auth::user()->id;
            $get_all_roles = DB::table('roles')->get();

            $get_roles = DB::table('roles')->whereIn('id', [2,3,4,1,7,8,9,10])->orderByRaw('FIELD(id,2,3,4,1,7,8,9,10)')->get();

            $get_user_permission = DB::table('permissions')->select('id', 'module')->where('user_id', $user_id)->first();
            $get_role_permission = DB::table('permissions')->select('id', 'module')->where('role_id', $role_id)->first();

            $global_modules = DB::table('modules')->select('*')->where('status', 1)->orderBy('module_order', 'ASC')->get()->toArray();
            
            if(!empty($get_user_permission) && $get_user_permission->module != 'null'){
                $global_permission = array_unique(array_intersect(json_decode($get_role_permission->module, true), json_decode($get_user_permission->module, true)));
            }else{
                $global_permission = json_decode($get_role_permission->module, true);
            }

            $state = DB::table('states')->select('*')->orderBy('state', 'asc')->get();
            
            view()->share(['global_permission' => $global_permission, 'global_modules' => $global_modules, 'get_roles' => $get_roles, 'state' => $state, 'get_all_roles' => $get_all_roles]);
        }

        return $next($request);
    }
}
