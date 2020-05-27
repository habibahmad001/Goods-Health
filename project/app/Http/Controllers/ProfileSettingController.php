<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class ProfileSettingController extends Controller
{
    /**
    |--------------------------------------------------------------------------
    | function: view_profile
    |--------------------------------------------------------------------------
    |
    | This function is use to display user's profile.
    */
    public function view_profile($prefix){
    	$id = Auth::user()->id;
    	$role_id = Auth::user()->role_id;

        $role_data_for_user = new \stdClass;
        $role_data_for_user = Auth::user()->role;

    	$permissions = DB::table('permissions')->where('role_id', $role_id)->first();

        $module_ids = json_decode($permissions->module, true);

        $modules = DB::table('modules')->whereIn('id', $module_ids)->where('status', 1)->whereNotIn('id', [21,22])->orderBy('module_order')->get();

        $get_permission = DB::table('permissions')->where('user_id', $id)->first();

        if(!empty($get_permission) && $get_permission->module != 'null'){
            $get_permission = json_decode($get_permission->module, true);
        }else{
            $get_permission = [];
        }

    	//$userdata = DB::table('users as u')->where('status', 1)->where('id', $id)->first();

        $userdata = DB::table('users as u')->select('u.*', 'ud.family_group_id', 'ud.first_name', 'ud.id as user_family_group_id', 'ud.middle_initial', 'ud.last_name', 'ud.gender', 'ud.dob', 'ud.social_security_number','ud.policy_number', 'ud.insurer', 'ud.occupation', 'ud.employment_status', 'ud.benefit', 'ud.resident', 'ud.spouse', 'ud.own_home')
                ->leftjoin('user_family_groups as ud', function($join){
                    $join->on('ud.user_id','=','u.id')->where('ud.relation', 0);
                })
                ->where('u.status', 1)->where('u.role_id', $role_id)->where('u.id', $id)->first();

        $cities = DB::table('cities')->select('id','city')->where('state_code',$userdata->state)->orderBy('city', 'asc')->get();
        $zipcodes = DB::table('zip_codes')->select('id','zipcode')->where('city_id',$userdata->city)->orderBy('zipcode', 'asc')->get();

        if($id > 0){
            $assigned_products = DB::table('access_to_products')->select('product_category_id')->where('user_id',$id)->get();
        }else{
            $assigned_products = array();
        }

    	return view('admin.modules.profile-setting.index', compact('role_id', 'userdata', 'cities', 'zipcodes', 'assigned_products', 'modules', 'get_permission', 'role_data_for_user'));
    }

    public function profile_setting_carrier_list_datatables($prefix, Request $request, $user_id = null){
    	if($request->employee == 1){
            $employee = 1;
    		if($request->added_by){
    			$id = decrypt($request->added_by);
    		}else{
    			$id = '';
    		}
            $condition = [['ctsn.added_by', '>=', 0]];
    	}else{
            if($user_id){
                $id = decrypt($user_id);
            }else{
                $id = Auth::user()->id;
            }
            $employee = 0;
            $condition = [['ctsn.added_by', '=', 0]];
    	}

        if ($request->ajax()) {
            $data = DB::table('carrier_details as cd')->select('cd.*', 'c.city as c_city', 's.state as s_state', 'ctsn.status as c_status')

                        ->join('cities as c', 'cd.carrier_city', '=', 'c.id', 'LEFT')
                        ->join('states as s', 'cd.carrier_state', '=', 's.state_code', 'LEFT')
                        //->where($condition)
                        ->leftjoin('carrier_transactions as ctsn', function($join) use($id){
                                $join->on('cd.id', '=', 'ctsn.carrier_id')
                                ->where('ctsn.user_id', $id);
                        })

                        //->where($condition)

                        ->where(function($query) use($condition) {
                            $query->where($condition)
                            ->orWhereNull('ctsn.added_by');
                        })
                        ->get();
            
	        return Datatables::of($data)
	                ->addIndexColumn()
	                ->addColumn('input', function($data) use($employee) {
                            $id_name = ($employee == 1) ? '_radio_emp' : '_radio';
                            $radio_name = ($employee == 1) ? 'selectedradio_carrier_emp' : 'selectedradio_carrier';
                            $status = ($data->c_status === 0) ? 0 : 1;

                            $input = '<div class="input_radio"><input id="'.$data->id.$id_name.'" type="radio" name="'.$radio_name.'" value="'.encrypt($data->id).'" data-status="'.$status.'"><label for="'.$data->id.$id_name.'" class="radio-label"></label></div>';

	                        return $input;
	                })
	                ->addColumn('status', function($data){
	                    if($data->c_status === 0){
	                        $image = '<span class="text-danger">Disable</span>';
	                    }else{
	                        $image = '<span class="text-success">Enable</span>';
	                    }

	                    return $image;
	                })
	                ->rawColumns(['input', 'status'])
	                ->make(true);
	    }
    }

    public function employee_search($prefix, Request $request){
    	$id = Auth::user()->id;
    	$role_id = Auth::user()->role_id;
    	$search_key = $request->term;
    	$user_list = [];


        if(in_array($role_id, [3, 4, 5, 1])){
            $get_employee_role = DB::table('roles')->where('parent_role_id', $role_id)->first();
            $emp_role_id = $get_employee_role->id;
        }else{
            $emp_role_id = 0;
        }

    	$users_data = DB::table('users as u')
    						->where('status', 1)
    						->where('role_id', $emp_role_id)
    						->where('parent_user_id', $id)
    						->where(function($query) use($search_key){
                        		$query->where('name', 'LIKE', "%{$search_key}%")
                            	->orWhere('username', 'LIKE', "%{$search_key}%")
                            	->orWhere('email', 'LIKE', "%{$search_key}%");
                    		})
    						->get();

    	foreach($users_data as $user_data){
            $user_name = $user_data->name ? $user_data->name : $user_data->username;
            $complete_name = $user_name.' - '.$user_data->email;
                
            array_push($user_list, ['id' => encrypt($user_data->id), 'text' => $complete_name]);
        }

        return json_encode($user_list);
    }

    public function change_carrier_status($prefix, $user_id, $carrier_id, $status, $added_by){
        $user_id = decrypt($user_id);
        $carrier_id = decrypt($carrier_id);
        $status = decrypt($status);
        $added_by = decrypt($added_by);

        DB::table('carrier_transactions')->updateOrInsert(
                    [
                        "carrier_id" => $carrier_id,
                        "user_id" => $user_id
                    ],
                    [
                        "status" => $status,
                        "added_by" => $added_by
                    ]);

        if($status == 0){
            return response()->json(['status' => 'ERROR', 'mes' => "Carrier disabled successfully."]);
        }else{
            return response()->json(['status' => 'SUCCESS', 'mes' => "Carrier enabled successfully."]);
        }
    }
}
