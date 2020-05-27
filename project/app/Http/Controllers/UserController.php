<?php

namespace App\Http\Controllers;

use App\SiteUser;
use App\UserPermission;
use App\UserFamilyGroup;

use Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
    |--------------------------------------------------------------------------
    | function: show
    |--------------------------------------------------------------------------
    |
    | This function is use to display users section.
    | @return \Illuminate\Http\Response
    */
    public function show($prefix, $u_type, $used_in = ''){
        $user_role_data = $get_sub_users_role = $get_employee_role = collect();
        $user_role_data = DB::table('roles')->where('role_slug', $u_type)->first();

        if(!empty($used_in)){
            if($user_role_data->parent_role_id == 0){
                return view('admin.modules.user.section.list',compact('u_type', 'used_in', 'user_role_data'));
            }else{
                return view('admin.modules.sub-user.section.list',compact('u_type', 'used_in', 'user_role_data'));
            }
        }else{
            $get_sub_users_role = DB::table('roles')->whereIn('id', [2,3,4])->get();
            $get_sub_users_role = $get_sub_users_role->keyBy('id');

            $get_employee_role = DB::table('roles')->where('parent_role_id', $user_role_data->id)->first();
            
            return view('admin.modules.user.index', compact('u_type', 'user_role_data', 'get_sub_users_role', 'get_employee_role'));
        }
    }

    /**
    |--------------------------------------------------------------------------
    | function: user_list_datatables
    |--------------------------------------------------------------------------
    |
    | This function is use to display business users list.
    | @return \Illuminate\Http\Response
    */
    public function user_list_datatables($prefix, Request $request, $role_id, $parent_id = '', $parent_status = ''){
        $role_id = decrypt($role_id);
        $data_child = 0;

        if ($request->ajax()) {
            if(!empty($parent_id) && decrypt($parent_id) > 0){
                $get_parent_data = DB::table('users')->select('id', 'role_id')->where('id', decrypt($parent_id))->first();

                if(!empty($parent_status) && $parent_status == 'parent_yes'){
                    $condition = [['u.status', '=', 1], ['u.role_id', '=', $role_id], ['u.parent_user_id', '=', decrypt($parent_id)]];
                }else{
                    if($get_parent_data->role_id == 1){
                        $condition = [['u.status', '=', 1], ['u.role_id', '=', $role_id]];
                    }else{
                        $condition = [['u.status', '=', 1], ['u.role_id', '=', $role_id], ['u.provider_user_id', '=', decrypt($parent_id)]];
                    }
                }
	        }else{
	            $condition = [['u.status', '=', 1], ['u.role_id', '=', $role_id]];
                if(Auth::user()->role_id == 4 ){
                    array_push($condition, ['u.provider_user_id', '=', Auth::user()->id]);
                }
	        }

	        if(isset($_GET['username']) && !empty($_GET['username'])){
	            array_push($condition, ['u.username', 'LIKE', '%'.str_replace('-', ' ', $_GET['username']).'%']);
	        }

	        if(isset($_GET['name']) && !empty($_GET['name'])){
	            if($role_id == 2){
	                array_push($condition, ['u.name', 'LIKE', '%'.str_replace('-',' ', $_GET['name']).'%']);
	            }else{
	                array_push($condition, ['u.company', 'LIKE', '%'.str_replace('-',' ', $_GET['name']).'%']);
	            }
	            
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

	        if($role_id == 2){
	            $data = DB::table('users as u')->select('u.*', 'r.role_name as role_name', 'c.city as c_city', 's.state as s_state', 'ud.user_id as user_id', 'ud.insurer', 'ud.policy_number')

	                    ->join('roles as r', 'u.role_id', '=','r.id','LEFT')
	                    ->join('cities as c', 'u.city', '=','c.id','LEFT')
	                    ->join('states as s', 'u.state', '=','s.state_code','LEFT')
	                    ->leftjoin('user_family_groups as ud', function ($join) {
	                        $join->on('ud.user_id', '=', 'u.id')->where('ud.relation', 0);
	                    })
	                    ->where($condition);

	        }elseif($role_id == 4){
	            $data = DB::table('users as u')->select('u.*', 'r.role_name as role_name', 'b.name as broker_name', 'c.city as c_city', 's.state as s_state')

	                    ->join('roles as r', 'u.role_id', '=','r.id','LEFT')
	                    ->join('cities as c', 'u.city', '=','c.id','LEFT')
	                    ->join('states as s', 'u.state', '=','s.state_code','LEFT')
	                    ->join('users as b', 'u.broker_user_id', '=','b.id','LEFT')
	                    ->where($condition);

	        }elseif($role_id == 3){
	            $data = DB::table('users as u')->select('u.*', 'r.role_name as role_name', 'p.name as provider_name', 'b.name as broker_name', 'c.city as c_city', 's.state as s_state')

	                    ->join('roles as r', 'u.role_id', '=','r.id','LEFT')
	                    ->join('cities as c', 'u.city', '=','c.id','LEFT')
	                    ->join('states as s', 'u.state', '=','s.state_code','LEFT')
	                    ->join('users as p', 'u.provider_user_id', '=','p.id','LEFT')
	                    ->join('users as b', 'u.broker_user_id', '=','b.id','LEFT')
	                    ->where($condition);
	        }else{
                $data = DB::table('users as u')->select('u.*', 'c.city as c_city', 's.state as s_state')

                        ->join('cities as c', 'u.city', '=','c.id','LEFT')
                        ->join('states as s', 'u.state', '=','s.state_code','LEFT')
                        ->where($condition);
            }

            if(!empty($parent_id) && decrypt($parent_id) > 0){
                $data_child = 1;
            }

            if(!empty($parent_status) && $parent_status == 'parent_yes'){
                $data_child = 1;
            }

	        return Datatables::of($data)
	                ->addIndexColumn()
	                ->addColumn('input', function($data) use($data_child, $request) {
                            if($data_child == 1){
                                $r_name = 'selectedradio_child';
                            }else{
    	                        $r_name = 'selectedradio';
                            }
                            if($request->session()->has('go_to_profile_'.Auth::user()->id) && $request->session()->get('go_to_profile_'.Auth::user()->id) == $data->id){
                                $checked = 'checked';

                                $request->session()->forget('go_to_profile_'.Auth::user()->id);
                            }else{
                                $checked = '';
                            }

                            $input = '<div class="input_radio"><input id="'.$data->id.'_radio" type="radio" name="'.$r_name.'" value="'.encrypt($data->id).'" '.$checked.'><label for="'.$data->id.'_radio" class="radio-label"></label></div>';

	                        return $input;
	                })
	                ->addColumn('profile_image', function($data){
	                    if($data->image){
	                        $image = '<img src="'.asset('uploads/'.$data->id.'/photos/'. $data->image ).'" alt="User" class="img-responsive" width="30">';
	                    }else{
	                        $image = '<img src="'.asset('images/polaroid.png').'" alt="User" class="img-responsive">';
	                    }

	                    return $image;
	                })
	                ->rawColumns(['input', 'profile_image'])
	                ->make(true);
	    }
    }

    /*
    |--------------------------------------------------------------------------
    | function: add
    |--------------------------------------------------------------------------
    |
    | This function is use to load the form for new business user.
    |
    */
    public function add($prefix, $role_id, $used_in){
        $role_id = decrypt($role_id);
        $used_in = decrypt($used_in);

        $role_data_for_user = DB::table('roles')->where('id', $role_id)->first();
        
        $permissions = DB::table('permissions')->where('role_id', $role_id)->first();

        $module_ids = json_decode($permissions->module, true);

        $modules = DB::table('modules')->whereIn('id', $module_ids)->where('status', 1)->whereNotIn('id', [21,22])->orderBy('module_order')->get();

        $get_permission = [];

        $providers = DB::table('users')->select('id', 'name')->where('role_id', 4)->where('status', 1)->get();
        $brokers = DB::table('users')->select('id', 'name')->where('role_id', 5)->where('status', 1)->get();

        if($used_in == 'module'){
            $view = 'admin.modules.user.section.add';
        }else{
            $view = 'admin.modules.sub-user.section.add';
        }

        return view($view, compact('role_id', 'providers', 'brokers', 'modules', 'get_permission', 'role_data_for_user'));
    }

    /**
    |--------------------------------------------------------------------------
    | function: edit
    |--------------------------------------------------------------------------
    |
    | This function is use to load the edit form for existing user.
    |
    | @param  $id
    |
    */
    public function edit($prefix, $id, $role_id, $used_in){
        $id = decrypt($id);
        $role_id = decrypt($role_id);
        $used_in = decrypt($used_in);

        $userdata = $policies = $brokers_emp = $providers = $brokers = $payment_history = $policy = $cities = $zipcodes = $assigned_products = $emergency_contact = $family_group_info = collect();

        $role_data_for_user = DB::table('roles')->where('id', $role_id)->first();

        if(in_array($role_data_for_user->id, [3, 4, 5, 1])){
            $get_employee_role = DB::table('roles')->where('parent_role_id', $role_data_for_user->id)->first();
            $employee_role_id = $get_employee_role->id;
        }else{
            $employee_role_id = 0;
        }

        $permissions = DB::table('permissions')->where('role_id', $role_id)->first();

        $module_ids = json_decode($permissions->module, true);

        $modules = DB::table('modules')->whereIn('id', $module_ids)->where('status', 1)->whereNotIn('id', [21,22])->orderBy('module_order')->get();

        $get_permission = DB::table('permissions')->where('user_id', $id)->first();

        if(!empty($get_permission) && $get_permission->module != 'null'){
            $get_permission = json_decode($get_permission->module, true);
        }else{
            $get_permission = [];
        }

        
        $userdata = DB::table('users as u')->select('u.*', 'ud.family_group_id', 'ud.first_name', 'ud.id as user_family_group_id', 'ud.middle_initial', 'ud.last_name', 'ud.gender', 'ud.dob', 'ud.social_security_number','ud.policy_number', 'ud.insurer', 'ud.occupation', 'ud.employment_status', 'ud.benefit', 'ud.resident', 'ud.spouse', 'ud.own_home')
                ->leftjoin('user_family_groups as ud', function($join){
                    $join->on('ud.user_id','=','u.id')->where('ud.relation', 0);
                })
                ->where('u.status', 1)->where('u.role_id', $role_id)->where('u.id', $id)->first();
        
        $policies = DB::table('product_categories as pc')
                            ->select('lwp.category_id', 'pc.category_name as category_name', 'pc.id as cat_id')
                            ->join('location_wise_policies as lwp', 'pc.id', '=', 'lwp.category_id', 'LEFT')
                            ->where('lwp.state_code', $userdata->state)
                            ->where('lwp.city_id', $userdata->city)
                            ->where('lwp.zipcode', $userdata->zipcode)
                            ->groupBy('lwp.category_id')
                            ->groupBy('pc.category_name')
                            ->get();

        $cities = DB::table('cities')->select('id', 'city')->where('state_code', $userdata->state)->orderBy('city', 'asc')->get();
        
        $zipcodes = DB::table('zip_codes')->select('id', 'zipcode')->where('city_id', $userdata->city)->orderBy('zipcode', 'asc')->get();

        $assigned_products = DB::table('access_to_products')->select('product_category_id')->where('user_id',$id)->get();

        if($used_in == 'module'){
            $brokers_emp = DB::table('users')->select('id', 'name', 'email')->where('role_id', 6)->where('status', 1)
                            ->where('parent_user_id', $userdata->broker_user_id)->get();

            $providers = DB::table('users')->select('id', 'name')->where('role_id', 4)->where('status', 1)->get();
            $brokers = DB::table('users')->select('id', 'name')->where('role_id', 5)->where('status', 1)->get();

            $payment_history = DB::table('payments')->select('*')->where('user_id', $userdata->id)->skip(0)->take(5)
                                ->orderBy('id', 'DESC')->get();

            $policy = DB::table('policies')->select('*')->where('user_id', $userdata->id)->orderBy('id', 'desc')->first();

            $emergency_contact = DB::table('user_family_group_emergency_details')->select('*')->where('user_id', $userdata->id)
                                ->where('status', 1)->get();

            $family_group_info = DB::table('user_family_groups')->select('*')->where('user_id', $userdata->id)
                                    ->where('relation', '>', 0)->get();

            $view = 'admin.modules.user.section.edit';
        }else{
            $view = 'admin.modules.sub-user.section.edit';
        }

        return view($view, compact('role_id', 'userdata', 'cities', 'zipcodes', 'providers', 'brokers', 'policies', 'assigned_products', 'brokers_emp', 'payment_history', 'policy', 'emergency_contact', 'family_group_info', 'modules', 'get_permission', 'role_data_for_user', 'employee_role_id'));
    }

    /**
    |--------------------------------------------------------------------------
    | function: store
    |--------------------------------------------------------------------------
    |
    | This function is use to store new customer user data.
    | @param  \Illuminate\Http\Request  $request
    | @return \Illuminate\Http\Response
    |
    */
    public function store($prefix, Request $request){   
    	$role_id = decrypt($request->role_id);

    	if($role_id == 2){
    		$validate_array = [
			            'full_name'=>['required','string','max:255'],
			            'last_name'=>['required','string','max:255'],
			            'state'=>['required','string','max:155'],
			            'city'=>['required','string','max:155'],
			            'zipcode'=>['required','string','max:6'],
			            'county'=>['required','string','max:155'],
			            'phone_number'=>['required','string','max:16'],
			            'email'=>['required','string','email','max:255','unique:users'],
			            'username'=>['required','string','max:255','unique:users'],
			            'password'=>['required','string','min:8','max:16']
			        ];
    	}else{
    		$validate_array = [
			            'company'=>['required','string','max:255'],
			            'phone_number'=>['required','string','max:16'],
			            'full_name'=>['required','string','max:255'],
			            'state'=>['required','string','max:155'],
			            'city'=>['required','string','max:155'],
			            'zipcode'=>['required','string','max:6'],
			            'county'=>['required','string','max:155'],
			            'email'=>['required','string','email','max:255','unique:users'],
			            'username'=>['required','string','max:255','unique:users'],
			            'password'=>['required','string','min:8','max:16']
			        ];
    	}

        $this->validate($request, $validate_array);

        if($role_id == 2){
			$company_name = 'N/A';
			$user_name = $request->full_name . ' '.$request->last_name;
    	}else{
			$company_name = $request->company;
			$user_name = $request->full_name;
    	}

        $access_link = ($request->access_link == 1) ? 'profile/user-profile/'.$request->username : '' ;

        $parent_user_id = (isset($request->parent_user_id) && !empty($request->parent_user_id)) ? decrypt($request->parent_user_id) : 0;

        $dashboard_access = (isset($request->dashboard_access) && $request->dashboard_access == 0) ? 0 : 1;
        
        $data = SiteUser::create([
            'name' => $user_name,
            'parent_user_id' => $parent_user_id,
            'username' => $request->username,
            'state' => $request->state,
            'city' => $request->city,
            'zipcode' => $request->zipcode,
            'county' => $request->county,
            'company' => $company_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'access_link' => $access_link,
            'security_question_one' => $request->security_question_one,
            'answer_one' => $request->answer_one,
            'security_question_two' => $request->security_question_two,
            'answer_two' => $request->answer_two,
            'role_id' => $role_id,
            'broker_user_id' => $request->broker_user_id,
            'provider_user_id' => $request->provider_user_id,
            'agent_user_id' => $request->broker_employee,
            'password' => Hash::make($request->password),
            'dashboard_access' => $dashboard_access
        ]);

        if ($request->hasFile('image')) {
            $path = public_path('uploads/'.$data->id.'/photos');

            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true);
            }
        
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $request->file('image')->storeAs('/uploads/'.$data->id.'/photos/', $fileNameToStore, 'public');

            $user = SiteUser::find($data->id);
            $user->image = $fileNameToStore;
            $user->save();
        }

        
        if(isset($request->access_to_products) && array_key_exists('0',$request->access_to_products) && count($request->access_to_products) > 0){
            foreach ($request->access_to_products as $key => $value) {
                DB::table('access_to_products')->insert(
                    ['user_id' => $data->id, 'product_category_id' => $value,'status'=>1]
                );
            }
        }

        DB::table('user_family_groups')->insert(
            [
                'user_id' => $data->id,
                'first_name' => $request->full_name,
                'last_name' => $request->last_name,
                'state' => $request->state,
                'city' => $request->city,
                'zipcode' => $request->zipcode,
            ]
        );

        DB::table('permissions')->insert(
            [
                'user_id' => $data->id,
                'module' => json_encode($request->access_to_dashboard, JSON_FORCE_OBJECT)
            ]
        );

        /*$role_name = Roles::where('id',2)->first();
        $data = array('email'=>$request->email,'password'=>$request->password,'role'=>$role_name->role_name,'username'=>$request->username);
        
        Mail::send('emails.welcome', $data, function($message) use ($data)
        {
            $message->from('no-reply@site.com', "Goodinsured");
            $message->subject("Welcome to Goodinsured");
            $message->to($data['email']);
        });*/

        $get_role_data = DB::table('roles')->where('id', $role_id)->first();

        if($data){ 
            $msg = ['status' => 'SUCCESS', 'mes' => ucfirst(strtolower($get_role_data->role_name)).' added successfully!', 'id' => $data->id];
        }else{
            $msg = ['status' => 'ERROR', 'mes' => 'Something went wrong! Please try again later.', 'id' => $data->id];
        }

        return Response()->json($msg);
    }

    /**
    |--------------------------------------------------------------------------
    | function: update
    |--------------------------------------------------------------------------
    |
    | This function is use to update existing user data.
    | @param  \Illuminate\Http\Request  $request
    | @return \Illuminate\Http\Response
    |
    */
    public function update($prefix, Request $request) {
        $id = decrypt($request->userid);
        $role_id = decrypt($request->role_id);

        if($role_id == 2){
        	$validate_array = [
			            'full_name'=>['required','string','max:255'],
			            'last_name'=>['required','string','max:255'],
			            'state'=>['required','string','max:155'],
			            'city'=>['required','string','max:155'],
			            'zipcode'=>['required','string','max:6'],
			            'county'=>['required','string','max:155'],
			            'phone_number'=>['required','string','max:16'],
			        ];
        }else{
        	$validate_array = [
			            'company'=>['required','string','max:255'],
			            'phone_number'=>['required','string','max:16'],
			            'full_name'=>['required','string','max:255'],
			            'state'=>['required','string','max:155'],
			            'city'=>['required','string','max:155'],
			            'zipcode'=>['required','string','max:6'],
			            'county'=>['required','string','max:155']
			        ];
        }

        $this->validate($request, $validate_array);

        if($role_id == 2){
        	$user_name = $request->full_name  . ' '.$request->last_name;
        }else{
        	$user_name = $request->full_name;
        }

        $access_link = (isset($request->access_link) && $request->access_link == 1) ? 'profile/user-profile/'.$request->username : '' ;

        $dashboard_access = (isset($request->dashboard_access) && $request->dashboard_access == 0) ? 0 : 1;

        $user = SiteUser::findOrFail($id);

        $user->name = $user_name;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->zipcode = $request->zipcode;
        $user->county = $request->county;
        $user->company = $request->company;
        $user->phone_number = $request->phone_number;
        $user->access_link = $access_link;
        $user->security_question_one = $request->security_question_one;
        $user->answer_one = $request->answer_one;
        $user->security_question_two = $request->security_question_two;
        $user->answer_two = $request->answer_two;
        $user->broker_user_id = $request->broker_user_id;
        $user->provider_user_id = $request->provider_user_id;
        $user->agent_user_id = $request->broker_employee;
        $user->dashboard_access = $dashboard_access;

        if($request->password != ""){
            $user->password = Hash::make($request->password);
        }
        
        if ($request->hasFile('image')) {
            $path = public_path('uploads/'.$id.'/photos');
           
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true);
            }
        
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $request->file('image')->storeAs('/uploads/'.$id.'/photos/', $fileNameToStore,'public');
            
            $user->image = $fileNameToStore;
        }

        $user->save();   

        if(isset($request->access_to_products) && count($request->access_to_products) > 0){
            DB::table('access_to_products')->where('user_id', $id)->delete();
	            foreach ($request->access_to_products as $key => $value) {
	                DB::table('access_to_products')->insert(
	                    ['user_id' => $id, 'product_category_id' => $value, 'status'=>1]
	                );
	            }
        }else{
        	DB::table('access_to_products')->where('user_id', $id)->delete();
        }

        
        if($request->user_family_group_id > 0){
            $userDetail = UserFamilyGroup::findOrFail($request->user_family_group_id);
        }else{
            $userDetail = new UserFamilyGroup;
            $userDetail->user_id = $id;
        }

        $userDetail->first_name = $request->full_name;
        $userDetail->last_name = $request->last_name;
        $userDetail->state = $request->state;
        $userDetail->city = $request->city;
        $userDetail->zipcode = $request->zipcode;
        
        $userDetail->save();
        

        $get_permission = DB::table('permissions')->where('user_id', $id)->first();

        if(!empty($get_permission)){
            DB::table('permissions')
                            ->where('user_id', $id)
                            ->update([
                                'module' => json_encode($request->access_to_dashboard, JSON_FORCE_OBJECT)
                            ]);
        }else{
            DB::table('permissions')->insert(
                [
                    'user_id' => $id,
                    'module' => json_encode($request->access_to_dashboard, JSON_FORCE_OBJECT)
                ]
            );
        }

        $get_role_data = DB::table('roles')->where('id', $role_id)->first();

        $msg = ['status' => 'SUCCESS', 'mes' => ucfirst(strtolower($get_role_data->role_name)).' updated successfully!', 'id' => $id];
        
        return Response()->json($msg);
    }

    public function update_detailed_info($prefix, Request $request){
        $id = decrypt($request->userid);

        if($request->user_family_group_id > 0){
            $userDetail = UserFamilyGroup::findOrFail($request->user_family_group_id);
        }else{
            $userDetail = new UserFamilyGroup;
            $userDetail->user_id = $id;
        }

        $userDetail->gender = $request->gender;
        $userDetail->dob = $request->dob;
        $userDetail->social_security_number = $request->social_security_number;
        $userDetail->employment_status = $request->employment_status;
        $userDetail->occupation = $request->occupation;
        $userDetail->resident = 1;
        $userDetail->spouse = 1;
        $userDetail->own_home = 1;
        $userDetail->save();

        for($i=0; $i < count($request->emergency_user_name); $i++) {
            if($request->emergency_user_name[$i] != null && $request->relation[$i] != null && $request->emergency_number[$i] != null && $request->emergency_relative_email[$i] != null ){
                DB::table('user_family_group_emergency_details')->updateOrInsert(
                    [
                        "id" => $request->emergency_id[$i],
                        "user_id" => $id
                    ],
                    [
                        "emergency_user_name" => $request->emergency_user_name[$i],
                        "relation" => $request->relation[$i],
                        "emergency_number" => $request->emergency_number[$i],
                        "emergency_relative_email" => $request->emergency_relative_email[$i],
                        "status" => 1
                    ]);
            }
        }

        if(!empty($request->fm) && count($request->fm) > 0){
            $fg_ids = [];
            foreach ($request->fm as $fm_key => $fm_value) {
                if($fm_value['family_relation'] != null && $fm_value['fm_name'] != null && $fm_value['fm_dob'] != null && $fm_value['fm_gender'] != null){

                    if(isset($fm_value['fg_id'])){
                        DB::table('user_family_groups')
                            ->where('id', $fm_value['fg_id'])
                            ->update(
                            [
                                'relation' => isset($fm_value['family_relation']) ? $fm_value['family_relation'] : NULL,
                                'first_name' => isset($fm_value['fm_name']) ? $fm_value['fm_name'] : NULL,
                                'gender' => isset($fm_value['fm_gender']) ? $fm_value['fm_gender'] : NULL,
                                'dob' => isset($fm_value['fm_dob']) ? $fm_value['fm_dob'] : NULL,
                                'social_security_number' => isset($fm_value['fm_ssn']) ? $fm_value['fm_ssn'] : NULL,
                                'employment_status' => isset($fm_value['fm_employment_status']) ? $fm_value['fm_employment_status'] : NULL,
                                'occupation' => isset($fm_value['fm_occupation']) ? $fm_value['fm_occupation'] : NULL,
                                'resident' => isset($fm_value['fm_resident']) ? $fm_value['fm_resident'] : NULL,
                                'spouse' => isset($fm_value['fm_spouse']) ? $fm_value['fm_spouse'] : NULL,
                                'own_home' => isset($fm_value['fm_own_home']) ? $fm_value['fm_own_home'] : NULL,
                                'email' => isset($fm_value['fm_email']) ? $fm_value['fm_email'] : NULL, 
                                'employer_name' => isset($fm_value['fm_employer_name']) ? $fm_value['fm_employer_name'] : NULL,
                                'employer_phone' => isset($fm_value['fm_employer_phone']) ? $fm_value['fm_employer_phone']: NULL,
                                'self_user_id' => isset($fm_value['fm_self_user_id']) ? $fm_value['fm_self_user_id']: NULL,
                         
                            ]
                        );

                        $fg_ids[] = $fm_value['fg_id']; 
                    }else{
                        $fg_id = DB::table('user_family_groups')
                            ->insertGetId(
                            [
                                'user_id' => $id,
                                'relation' => isset($fm_value['family_relation']) ? $fm_value['family_relation'] : NULL,
                                'first_name' => isset($fm_value['fm_name']) ? $fm_value['fm_name'] : NULL,
                                'gender' => isset($fm_value['fm_gender']) ? $fm_value['fm_gender'] : NULL,
                                'dob' => isset($fm_value['fm_dob']) ? $fm_value['fm_dob'] : NULL,
                                'social_security_number' => isset($fm_value['fm_ssn']) ? $fm_value['fm_ssn'] : NULL,
                                'state' => $request->state,
                                'city' => $request->city,
                                'zipcode' => $request->zipcode,
                                'employment_status' => isset($fm_value['fm_employment_status']) ? $fm_value['fm_employment_status'] : NULL,
                                'occupation' => isset($fm_value['fm_occupation']) ? $fm_value['fm_occupation'] : NULL,
                                'benefit' => $request->benefit_type,
                                'insurer' => $request->insurer,
                                'resident' => isset($fm_value['fm_resident']) ? $fm_value['fm_resident'] : NULL,
                                'spouse' => isset($fm_value['fm_spouse']) ? $fm_value['fm_spouse'] : NULL,
                                'own_home' => isset($fm_value['fm_own_home']) ? $fm_value['fm_own_home'] : NULL,
                                'policy_number' => $request->policy_number,
                                'email' => isset($fm_value['fm_email']) ? $fm_value['fm_email'] : NULL, 
                                'employer_name' => isset($fm_value['fm_employer_name']) ? $fm_value['fm_employer_name'] : NULL,
                                'employer_phone' => isset($fm_value['fm_employer_phone']) ? $fm_value['fm_employer_phone']: NULL,
                                'self_user_id' => isset($fm_value['fm_self_user_id']) ? $fm_value['fm_self_user_id']: NULL,
                            ]
                        );

                        $fg_ids[] = $fg_id; 
                    }
                          
                }
            }
            DB::table('user_family_groups')->where('user_id', $id)->where('relation', '!=', 0)->whereNotIn('id', $fg_ids)->delete();
        }
        
        $msg = ['status' => 'SUCCESS', 'mes' => 'Detailed information updated successfully!', 'id' => $id];
    
        return Response()->json($msg);
    }


    public function update_beneficiaries(){
        $id = decrypt($request->userid);
        $role_id = decrypt($request->role_id);
        $u_type = decrypt($request->u_type);

        $user = SiteUser::findOrFail($id);

        if($request->user_family_group_id > 0){
            $userDetail = UserFamilyGroup::findOrFail($request->user_family_group_id);
        }else{
            $userDetail = new UserFamilyGroup;
            $userDetail->user_id = $id;
        }

        $userDetail->gender = $request->gender;
        $userDetail->dob = $request->dob;
        $userDetail->social_security_number = $request->social_security_number;
        $userDetail->employment_status = $request->employment_status;
        $userDetail->occupation = $request->occupation;
        $userDetail->resident = 1;
        $userDetail->spouse = 1;
        $userDetail->own_home = 1;
        $userDetail->save();
        
        for($i=0; $i < count($request->emergency_user_name); $i++) {
            if($request->emergency_user_name[$i] != null && $request->relation[$i] != null && $request->emergency_number[$i] != null && $request->emergency_relative_email[$i] != null ){
                DB::table('user_family_group_emergency_details')->updateOrInsert(
                    [
                        "emergency_user_name" => $request->emergency_user_name[$i],
                        "relation" => $request->relation[$i],
                        "emergency_number" => $request->emergency_number[$i],
                        "emergency_relative_email" => $request->emergency_relative_email[$i],
                        "status" => 1
                    ],
                    [
                        "id" => $request->emergency_id[$i],
                        "user_id" => $id
                    ]);
            }
        }

        //     if(!empty($request->beneficiary_name)){
        //     for ($j=0;$j < count($request->beneficiary_name);$j++) {
        //         //if(( $request->hasFile('beneficiary_information_file')) && ($request->beneficiary_name[$j] != null  )  && ($request->beneficiary_relation[$j] != null ) )
        //         if(($request->beneficiary_name[$j] != null  )  && ($request->beneficiary_relation[$j] != null ) )
        //             {
        //             $path = 'uploads/'.$id.'/documents/beneficiaries';
        //             if(!is_dir($path))
        //             {
                        
        //                 File::makeDirectory($path, 0777,true);
        //             }
                
        //             // filename with extension
        //             //$fileNameWithExt = $request->file('beneficiary_information_file')[$j]->getClientOriginalName();
        //             // filename
        //             //$filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //             // extension
        //             //$extension = $request->file('beneficiary_information_file')[$j]->getClientOriginalExtension();
        //             // filename to store
        //             //$fileNameToStore = $filename.'_'.time().'.'.$extension;
        //             // upload file
        //             //$path = $request->file('beneficiary_information_file')[$j]->storeAs('/uploads/'.$id.'/documents/beneficiaries', $fileNameToStore,'public');
        //             if($request->benefeciaries_id[$j] > 0)
        //             {
        //                 DB::table('user_family_group_beneficiaries')
        //                     ->where('id', $request->benefeciaries_id[$j])
        //                     ->update([
        //                         'beneficiaries' => $request->beneficiaries[$j],
        //                         'beneficiary_name' => $request->beneficiary_name[$j],
        //                         'beneficiary_relation' => $request->beneficiary_relation[$j],
        //                         'beneficiary_information_file' => $path,
        //                         'status' => 1
        //                     ]);
                      
        //             }else
        //             {
        //                 DB::table('user_family_group_beneficiaries')->insert([
        //                     'user_id' => $id,
        //                     'beneficiaries' => $request->beneficiaries[$j],
        //                     'beneficiary_name' => $request->beneficiary_name[$j],
        //                     'beneficiary_relation' => $request->beneficiary_relation[$j],
        //                     'beneficiary_information_file' => $path,
        //                     'status' => 1
        //                 ]);  
        //             }
                    
        //         }
            
        //     }
        // }

            // for ($k=0;$k < count($request->document_type);$k++) {
            //     if(($request->document_type[$k] > 0 ) && ( $request->hasFile('document_name'))  )
            //         {
            //         $path = 'uploads/'.$id.'/documents';
            //         if(!is_dir($path))
            //         {
                        
            //             File::makeDirectory($path, 0777,true);
            //         }
                
            //         // filename with extension
            //         $fileNameWithExt = $request->file('document_name')[$k]->getClientOriginalName();
            //         // filename
            //         $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //         // extension
            //         $extension = $request->file('document_name')[$k]->getClientOriginalExtension();
            //         // filename to store
            //         $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //         // upload file
            //         $path = $request->file('document_name')[$k]->storeAs('/uploads/'.$id.'/documents', $fileNameToStore,'public');
            //         if($request->doc_id[$k] > 0)
            //         {
            //             DB::table('user_dms')
            //                 ->where('id', $request->doc_id[$k])
            //                 ->update([
            //                     'document_name' => $request->document_type[$k],
            //                     'document_type' => $extension,
            //                     'document_path' => $path,
            //                     'status' => 1,
            //                 ]);
                      
            //         }else
            //         {
            //             DB::table('user_dms')->insert([
            //                 'user_id' => $id,
            //                 'document_name' => $request->document_type[$k],
            //                 'document_type' => $extension,
            //                 'document_path' => $path,
            //                 'status' => 1,
            //             ]); 
            //         }
                    
            //  }
            
            // }
            
            // if($request->user_family_group_id > 0)
            // {
            //     $userDetail = UserFamilyGroup::findOrFail($request->user_family_group_id);
            // }else
            // {
            //     $userDetail = new UserFamilyGroup;
            //     $userDetail->user_id = $id;
            // }


            
            // $userDetail->first_name = $request->full_name;
            // $userDetail->last_name = $request->last_name;
            // $userDetail->gender = $request->gender;
            // $userDetail->dob = $request->dob;
            // $userDetail->social_security_number = $request->social_security_number;
            // $userDetail->state = $request->state;
            // $userDetail->city = $request->city;
            // $userDetail->zipcode = $request->zipcode;
            // $userDetail->employment_status = $request->employment_status;
            // $userDetail->occupation = $request->occupation;
            // $userDetail->benefit = $request->benefit_type;
            // $userDetail->insurer = $request->insurer;
            // $userDetail->resident = $request->resident;
            // $userDetail->spouse = $request->spouse;
            // $userDetail->own_home = $request->own_home;
            // $userDetail->policy_number = $request->policy_number ;
            // $userDetail->save();


            // if(!empty($request->fm) && count($request->fm) > 0){
            //     $fg_ids = [];
            //     foreach ($request->fm as $fm_key => $fm_value) {
            //         if($fm_value['family_relation'] != null && $fm_value['fm_name'] != null && $fm_value['fm_dob'] != null && $fm_value['fm_gender'] != null){

            //             if(isset($fm_value['fg_id'])){
            //                 DB::table('user_family_groups')
            //                     ->where('id', $fm_value['fg_id'])
            //                     ->update(
            //                     [
            //                         'relation' => isset($fm_value['family_relation']) ? $fm_value['family_relation'] : NULL,
            //                         'first_name' => isset($fm_value['fm_name']) ? $fm_value['fm_name'] : NULL,
            //                         'gender' => isset($fm_value['fm_gender']) ? $fm_value['fm_gender'] : NULL,
            //                         'dob' => isset($fm_value['fm_dob']) ? $fm_value['fm_dob'] : NULL,
            //                         'social_security_number' => isset($fm_value['fm_ssn']) ? $fm_value['fm_ssn'] : NULL,
            //                         'employment_status' => isset($fm_value['fm_employment_status']) ? $fm_value['fm_employment_status'] : NULL,
            //                         'occupation' => isset($fm_value['fm_occupation']) ? $fm_value['fm_occupation'] : NULL,
            //                         'resident' => isset($fm_value['fm_resident']) ? $fm_value['fm_resident'] : NULL,
            //                         'spouse' => isset($fm_value['fm_spouse']) ? $fm_value['fm_spouse'] : NULL,
            //                         'own_home' => isset($fm_value['fm_own_home']) ? $fm_value['fm_own_home'] : NULL,
            //                         'email' => isset($fm_value['fm_email']) ? $fm_value['fm_email'] : NULL, 
            //                         'employer_name' => isset($fm_value['fm_employer_name']) ? $fm_value['fm_employer_name'] : NULL,
            //                         'employer_phone' => isset($fm_value['fm_employer_phone']) ? $fm_value['fm_employer_phone']: NULL,
                             
            //                     ]
            //                 );

            //                 $fg_ids[] = $fm_value['fg_id']; 
            //             }else{

            //                 $fg_id = DB::table('user_family_groups')
            //                     ->insertGetId(
            //                     [
            //                         'user_id' => $id,
            //                         'relation' => isset($fm_value['family_relation']) ? $fm_value['family_relation'] : NULL,
            //                         'first_name' => isset($fm_value['fm_name']) ? $fm_value['fm_name'] : NULL,
            //                         'gender' => isset($fm_value['fm_gender']) ? $fm_value['fm_gender'] : NULL,
            //                         'dob' => isset($fm_value['fm_dob']) ? $fm_value['fm_dob'] : NULL,
            //                         'social_security_number' => isset($fm_value['fm_ssn']) ? $fm_value['fm_ssn'] : NULL,
            //                         'state' => $request->state,
            //                         'city' => $request->city,
            //                         'zipcode' => $request->zipcode,
            //                         'employment_status' => isset($fm_value['fm_employment_status']) ? $fm_value['fm_employment_status'] : NULL,
            //                         'occupation' => isset($fm_value['fm_occupation']) ? $fm_value['fm_occupation'] : NULL,
            //                         'benefit' => $request->benefit_type,
            //                         'insurer' => $request->insurer,
            //                         'resident' => isset($fm_value['fm_resident']) ? $fm_value['fm_resident'] : NULL,
            //                         'spouse' => isset($fm_value['fm_spouse']) ? $fm_value['fm_spouse'] : NULL,
            //                         'own_home' => isset($fm_value['fm_own_home']) ? $fm_value['fm_own_home'] : NULL,
            //                         'policy_number' => $request->policy_number,
            //                         'email' => isset($fm_value['fm_email']) ? $fm_value['fm_email'] : NULL, 
            //                         'employer_name' => isset($fm_value['fm_employer_name']) ? $fm_value['fm_employer_name'] : NULL,
            //                         'employer_phone' => isset($fm_value['fm_employer_phone']) ? $fm_value['fm_employer_phone']: NULL,
            //                     ]
            //                 );

            //                 $fg_ids[] = $fg_id; 
            //             }
                              
            //         }
            //     }

            //     DB::table('user_family_groups')->where('user_id', $id)->where('relation', '!=', 0)->whereNotIn('id', $fg_ids)->delete();
            // }
        //}

        $msg = ['status' => 'SUCCESS', 'mes' => 'Detailed information updated successfully!', 'id' => $id];
    
        return Response()->json($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SiteUser  $siteUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($prefix, Request $request){
    	$id = decrypt($request->user_id);

        $user = SiteUser::findOrFail($id);
        $user->status = 0;
        $user->save();

        $msg = ['status' => 'SUCCESS', 'mes' => 'User deleted successfully!'];
        return Response()->json($msg);
    }

    public function get_task_activity($prefix, $user_id){
        $user_id = decrypt($user_id);

        $task_data = DB::table('tasks as t')->select('t.id as t_id', 'start_date as schedule', 't.title as title', 't.description as description', 't.created_at as created_at', 'u.name as user', 'c.name as creator')->where('t.user_id', $user_id)->where('t.status', 1)
                        ->join('users as u', 't.user_id', '=','u.id','LEFT')
                        ->join('users as c', 't.created_by', '=','c.id','LEFT')
                        ->get();

        return Datatables::of($task_data)
                    ->addIndexColumn()
                    ->editColumn('schedule', function ($task_data){
                            return date('m/d/Y', strtotime($task_data->schedule));
                    })
                    ->editColumn('created_at', function ($task_data){
                            return date('m/d/Y h:i:s A', strtotime($task_data->created_at));
                    })
                    ->addColumn('action', function($task_data){
                        $action = '<a href="javascript.void(0)" class="view_Task_to_user_module" data-task_id="'.encrypt($task_data->t_id).'"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;';

                        $action .= '<a href="javascript.void(0)" class="edit_Task_to_user_module" data-task_id="'.encrypt($task_data->t_id).'"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;';

                        $action .= '<a href="javascript.void(0)" class="delete_Task_to_user_module" data-task_id="'.encrypt($task_data->t_id).'"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;';

                        $action .= '<a href="#" class="open_calender_task" data-task_id="'.encrypt($task_data->t_id).'"><i class="fa fa-calendar-check-o fa-lg" aria-hidden="true"></i></a>';

                        return $action;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }

    public function get_event_activity($prefix, $user_id){
        $user_id = decrypt($user_id);

        $event_data = DB::table('events as e')->select('e.id as e_id', 'e.start_datetime as schedule', 'e.title as title', 'e.description as description', 'e.created_at as created_at', 'e.location as location', 'u.name as user', 'c.name as creator')->where('e.user_id', $user_id)->where('e.status', 1)
                        ->join('users as u', 'e.user_id', '=','u.id','LEFT')
                        ->join('users as c', 'e.created_by', '=','c.id','LEFT')
                        ->get();

        return Datatables::of($event_data)
                    ->addIndexColumn()
                    ->editColumn('schedule', function ($event_data){
                            return date('m/d/Y', strtotime($event_data->schedule));
                    })
                    ->editColumn('created_at', function ($event_data){
                            return date('m/d/Y h:i:s A', strtotime($event_data->created_at));
                    })
                    ->addColumn('action', function($event_data){
                        $action = '<a href="javascrtipt.void(0)" class="view_Event_to_user_module" data-event_id="'.encrypt($event_data->e_id).'"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;';

                        $action .= '<a href="javascrtipt.void(0)" class="edit_Event_to_user_module" data-event_id="'.encrypt($event_data->e_id).'"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;';

                        $action .= '<a href="javascrtipt.void(0)" class="delete_Event_to_user_module" data-event_id="'.encrypt($event_data->e_id).'"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;';

                        $action .= '<a href="#" class="open_calender_event" data-event_id="'.encrypt($event_data->e_id).'"><i class="fa fa-calendar-check-o fa-lg" aria-hidden="true"></i></a>';

                        return $action;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }

    public function get_note_activity($prefix, $user_id){
        $user_id = decrypt($user_id);

        $note_data = DB::table('notes as n')->select('n.id as n_id', 'n.title as title', 'n.note as note', 'n.created_at as created_at', 'c.name as author', 'p.policy_number as policy')->where('n.user_id', $user_id)->where('n.status', 1)->where('parent_note_id', 0)
                        ->join('policies as p', 'n.policy_id', '=','p.id','LEFT')
                        ->join('users as c', 'n.created_by', '=','c.id','LEFT')
                        ->get();

        return Datatables::of($note_data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function ($note_data){
                            return date('m/d/Y h:i:s A', strtotime($note_data->created_at));
                    })
                    ->addColumn('action', function($note_data){
                        $action = '<a href="javascrtipt.void(0)" class="view_Note_to_user_module" data-note_id="'.encrypt($note_data->n_id).'"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;';

                        $action .= '<a href="javascrtipt.void(0)" class="reply_Note_to_user_module" data-note_id="'.encrypt($note_data->n_id).'"><i class="fa fa-reply fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;';

                        return $action;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }

    public function get_user_histories($prefix, $user_id){
        $user_id = decrypt($user_id);

        $histories_data = DB::table('histories as h')->select('h.id as h_id', 'h.description as description', 'h.created_at as created_at', 'c.name as name')->where('h.user_id', $user_id)
                        ->join('users as c', 'h.added_by', '=','c.id','LEFT')
                        ->get();

        return Datatables::of($histories_data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function ($histories_data){
                            return date('m/d/Y h:i:s A', strtotime($histories_data->created_at));
                    })
                    ->make(true);
    }

    public function save_activity_data($prefix, Request $request){
        if($request->activity_type == 'note'){
            DB::table('notes')->insert(
                    [
                        'user_id' => decrypt($request->user_id),
                        'policy_id' => isset($request->policy_id) && !empty($request->policy_id) ? decrypt($request->policy_id) : NULL,
                        'parent_note_id' => isset($request->note_id) && !empty($request->note_id) ? decrypt($request->note_id) : 0,
                        'title' => $request->title,
                        'note' => $request->note,
                        'created_by' => Auth::user()->id
                    ]);
            
            if(isset($request->note_id) && !empty($request->note_id)){
                $mes = 'Reply submitted successfully.';
            }else{
                $mes = 'Note added successfully.';
            }
        }

        return response()->json(['status' => 'SUCCESS', 'mes' => $mes]);
    }

    public function go_to_profile($prefix, Request $request, $user_id){
        $user_id = decrypt($user_id);

        $get_user_data = DB::table('users')->select('id', 'role_id')->where('id', $user_id)->first();
        $get_role_slug = DB::table('roles')->where('id', $get_user_data->role_id)->first();

        $request->session()->put('go_to_profile_'.Auth::user()->id, $user_id);

        return redirect()->route('admin.users.show', ['prefix' => Auth::user()->role->role_slug, 'u_type' => $get_role_slug->role_slug]); 
    }
}
