<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class FamilyGroupController extends Controller
{
    public function index($prefix){
        return view('admin.modules.family-group.index');
    }

    /*
    |--------------------------------------------------------------------------
    | function: add
    |--------------------------------------------------------------------------
    |
    | This function is use to load the form for new business user.
    |
    */
    public function add($prefix, $role_id){
    	$role_id = decrypt($role_id);

        $permissions = DB::table('permissions')->where('role_id', $role_id)->first();

        $module_ids = json_decode($permissions->module, true);

        $modules = DB::table('modules')->whereIn('id', $module_ids)->where('status', 1)->whereNotIn('id', [21,22])->orderBy('module_order')->get();

        $get_permission = [];

        if($role_id == 3){
            $u_type = 'business';
        }elseif($role_id == 4){
            $u_type = 'provider';
        }elseif($role_id == 2){
            $u_type = 'customer';
        }elseif(in_array($role_id, [6,7,8,9,10])){
            $u_type = 'employee';
        }

        $providers = DB::table('users')->select('id', 'name')->where('role_id', 4)->where('status', 1)->get();
        $brokers = DB::table('users')->select('id', 'name')->where('role_id', 5)->where('status', 1)->get();

        return view('admin.modules.'.$u_type.'.section.add', compact('u_type', 'role_id', 'providers', 'brokers', 'modules', 'get_permission'));
    }

    /**
    |--------------------------------------------------------------------------
    | function: show
    |--------------------------------------------------------------------------
    |
    | This function is use to display users section.
    | @return \Illuminate\Http\Response
    */
    public function show($prefix){
    	$role_id = Auth::user()->role_id;

        return view('admin.modules.family-group.index',compact('role_id'));
    }

    /**
    |--------------------------------------------------------------------------
    | function: show
    |--------------------------------------------------------------------------
    |
    | This function is use to display business users list.
    | @return \Illuminate\Http\Response
    */
    public function family_group_list_datatables($prefix, Request $request){

        if ($request->ajax()) {

        	$condition = [['u.user_id', '=', Auth::user()->id], ['u.relation', '>', 0]];

	        if(isset($_GET['username']) && !empty($_GET['username'])){
	            array_push($condition, ['u.username', 'LIKE', '%'.str_replace('-', ' ', $_GET['username']).'%']);
	        }

	        if(isset($_GET['email']) && !empty($_GET['email'])){
	            array_push($condition, ['u.email', 'LIKE', '%'.$_GET['email'].'%']);
	        }

	        if(isset($_GET['state']) && !empty($_GET['state'])){
	            array_push($condition, ['u.state', '=', $_GET['state']]);
	        }

	        if(isset($_GET['city']) && !empty($_GET['city'])){
	            array_push($condition, ['u.city', '=', $_GET['city']]);
	        }

	        if(isset($_GET['zipcode']) && !empty($_GET['zipcode'])){
	            array_push($condition, ['u.zipcode', '=', $_GET['zipcode']]);
	        }


	        $data = DB::table('user_family_groups as u')->select('u.*', 'c.city as c_city', 's.state as s_state')

                    ->join('cities as c', 'u.city', '=','c.id','LEFT')
                    ->join('states as s', 'u.state', '=','s.state_code','LEFT')
                    ->where($condition)->get();

	        return Datatables::of($data)
	                ->addIndexColumn()
	                ->addColumn('input', function($data){

                            $input = '<div class="input_radio"><input id="'.$data->id.'_radio" type="radio" name="selectedradio" value="'.encrypt($data->id).'"><label for="'.$data->id.'_radio" class="radio-label"></label></div>';

	                        return $input;
	                })
	                ->rawColumns(['input'])
	                ->make(true);
	    }
    }
}
