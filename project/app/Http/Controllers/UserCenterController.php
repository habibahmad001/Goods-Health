<?php

namespace App\Http\Controllers;

use App\SiteUser;
use App\Roles;
use App\UserDetail;
use App\UserEmployee;
use App\UserDms;
use App\UserPermission;
use App\UserFamilyGroup;
use Mail;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Access\AuthorizationException;
use Yajra\DataTables\Facades\DataTables;
use Session;

class UserCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($prefix){
        $user_role_data = new \stdClass;
        $user_role_data->role_slug = 'user_center';

        $u_type = 'user_center';
        $roles = Roles::all();

        $get_role_from_session = Session::get('role_id');
        
        return view('admin.modules.user-center.index', compact('roles', 'u_type', 'user_role_data', 'get_role_from_session'));
    }

    /**
    |--------------------------------------------------------------------------
    | function: load list
    |--------------------------------------------------------------------------
    |
    | This function is use to display business users list.
    | @return \Illuminate\Http\Response
    */
    public function load_user_center_list($prefix, $role_id){
        $role_id = decrypt($role_id);

        $user_role_data = new \stdClass;
        $user_role_data->role_slug = 'user_center';

        $u_type = 'user_center';

        Session::put('role_id', $role_id);

        $role_name = DB::table('roles')->where('id', $role_id)->first();
        
        return view('admin.modules.user-center.section.list', compact('role_name', 'u_type', 'user_role_data'));
    }

    /**
    |--------------------------------------------------------------------------
    | function: list data
    |--------------------------------------------------------------------------
    |
    | This function is use to display business users list.
    | @return \Illuminate\Http\Response
    */
    public function user_center_list_datatables($prefix, Request $request, $role_id){
        $role_id = decrypt($role_id);

        if ($request->ajax()) {

           
            $condition = [['u.status', '=', 1], ['u.role_id', '=', $role_id]];
            

            if(isset($_GET['username']) && !empty($_GET['username'])){
                array_push($condition, ['u.username', 'LIKE', '%'.str_replace('-', ' ', $_GET['username']).'%']);
            }

            if(isset($_GET['name']) && !empty($_GET['name'])){
                array_push($condition, ['u.name', 'LIKE', '%'.str_replace('-',' ', $_GET['name']).'%']);
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

            $data = DB::table('users as u')->select('u.*', 'c.city as c_city', 's.state as s_state')

                    ->join('cities as c', 'u.city', '=','c.id','LEFT')
                    ->join('states as s', 'u.state', '=','s.state_code','LEFT')
                    ->where($condition)->get();
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('input', function($data) {
                            $input = '<div class="input_radio"><input id="'.$data->id.'_radio" type="radio" name="selectedradio" value="'.encrypt($data->id).'"><label for="'.$data->id.'_radio" class="radio-label"></label></div>';

                            return $input;
                    })
                    // ->addColumn('profile_image', function($data){
                    //     if($data->image){
                    //         $image = '<img src="'.asset('uploads/'.$data->id.'/photos/'. $data->image ).'" alt="User" class="img-responsive" width="30">';
                    //     }else{
                    //         $image = '<img src="'.asset('images/polaroid.png').'" alt="User" class="img-responsive">';
                    //     }

                    //     return $image;
                    // })
                    ->rawColumns(['input'])
                    ->make(true);
        }
    }

    public function add($prefix, $role_id){
        $role_id = decrypt($role_id);
        $role_name = DB::table('roles')->where('id', $role_id)->first();

        $permissions = DB::table('permissions')->where('role_id', $role_id)->first();

        $module_ids = json_decode($permissions->module, true);

        $modules = DB::table('modules')->whereIn('id', $module_ids)->where('status', 1)->whereNotIn('id', [21,22])->orderBy('module_order')->get();

        $get_permission = [];

        if($role_name->parent_role_id > 0){
            $parent_user = DB::table('users')->select('id', 'username', 'name', 'email')->where('role_id', $role_name->parent_role_id)->where('status', 1)->get();
        }else{
            $parent_user = [];
        }

        return view('admin.modules.user-center.section.add', compact('role_name', 'role_id', 'parent_user', 'modules', 'get_permission'));
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
    public function edit($prefix, $id, $role_id){
        $id = decrypt($id);
        $role_id = decrypt($role_id);
        $role_name = DB::table('roles')->where('id', $role_id)->first();

        $userdata = $policies = $policy = $state = $cities = $zipcodes = $assigned_products = [];

        $permissions = DB::table('permissions')->where('role_id', $role_id)->first();

        $module_ids = json_decode($permissions->module, true);

        $modules = DB::table('modules')->whereIn('id', $module_ids)->where('status', 1)->whereNotIn('id', [21,22])->orderBy('module_order')->get();

        $get_permission = DB::table('permissions')->where('user_id', $id)->first();

        if(!empty($get_permission) && $get_permission->module != 'null'){
            $get_permission = json_decode($get_permission->module, true);
        }else{
            $get_permission = [];
        }

        $userdata = DB::table('users as u')->select('*')->where('u.status', 1)->where('u.role_id', $role_id)->where('u.id', $id)->first();

        $policies = DB::table('product_categories as pc')
                            ->select('lwp.category_id', 'pc.category_name as category_name', 'pc.id as cat_id')
                            ->join('location_wise_policies as lwp', 'pc.id', '=', 'lwp.category_id', 'LEFT')
                            ->where('lwp.state_code', $userdata->state)
                            ->where('lwp.city_id', $userdata->city)
                            ->where('lwp.zipcode', $userdata->zipcode)
                            ->groupBy('lwp.category_id')
                            ->groupBy('pc.category_name')
                            ->get();

        $cities = DB::table('cities')->select('id','city')->where('state_code',$userdata->state)->orderBy('city', 'asc')->get();
        $zipcodes = DB::table('zip_codes')->select('id','zipcode')->where('city_id',$userdata->city)->orderBy('zipcode', 'asc')->get();

        if($role_name->parent_role_id > 0){
            $parent_user = DB::table('users')->select('id', 'username', 'name', 'email')->where('role_id', $role_name->parent_role_id)->where('status', 1)->get();
        }else{
            $parent_user = [];
        }

        if($id > 0){
            $assigned_products = DB::table('access_to_products')->select('product_category_id')->where('user_id',$id)->get();
        }else{
            $assigned_products = array();
        }

        return view('admin.modules.user-center.section.edit', compact('role_id', 'role_name', 'userdata', 'cities', 'zipcodes', 'policies', 'assigned_products', 'parent_user', 'modules', 'get_permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($prefix, Request $request){
        $role_id = decrypt($request->role_id);

        if($role_id == 2){
            $validate_array = [
                        'full_name'=>['required','string','max:255'],
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
        }else{
            $company_name = $request->company;
        }

        $access_link = ($request->access_link == 1) ? 'profile/user-profile/'.$request->username : '' ;

        $parent_user_id = (isset($request->parent_user_id) && !empty($request->parent_user_id)) ? decrypt($request->parent_user_id) : 0;

        $dashboard_access = (isset($request->dashboard_access) && $request->dashboard_access == 0) ? 0 : 1;

        $data = SiteUser::create([
            'name' => $request->full_name,
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
            'password' => Hash::make($request->password),
            'dashboard_access' => $dashboard_access
        ]);

        if(isset($request->access_to_products) && array_key_exists('0',$request->access_to_products) && count($request->access_to_products) > 0)
        {
            foreach ($request->access_to_products as $key => $value) {
                DB::table('access_to_products')->insert(
                    ['user_id' => $data->id, 'product_category_id' => $value,'status'=>1]
                );
            }
        }

        if(in_array($role_id, [1,7,8,9,10])){
            UserEmployee::create([
                    'employee_group_id' => 1,
                    'user_id' => $data->id,
                    'first_name' => $request->full_name,
                    'last_name' => 'N/A',
                    'state' => $request->state,
                    'city' => $request->city,
                    'zipcode' => $request->zipcode,
                ]);
        }
        
        if($role_id == 2){
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
        }

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
        if($data){ 
            $msg = ['status' => 'SUCCESS', 'mes' => 'User added successfully!'];
        }else{
            $msg = ['status' => 'ERROR', 'mes' => 'Something went wrong! Please try again later.'];
        }
        return Response()->json($msg);
    }

    public function get_access_products_by_ajax($prefix, $user_id)
    {
        header('Content-Type: application/x-json; charset=utf-8');
        $response['products'] = DB::table('access_to_products')->select('id','product_category_id')->where('user_id',$user_id)->get();
        echo json_encode( $response );exit;
    }

    public function get_policies_list_by_ajax($prefix, $state_code,$city_id,$zipcode,$id=null)
    {
        //header('Content-Type:application/x-json;charset=utf-8');
        $policies = DB::table('product_categories as pc')->select('lwp.category_id','pc.category_name as category_name')->join('location_wise_policies as lwp','pc.id','=','lwp.category_id','LEFT')->where('lwp.state_code',$state_code)->where('lwp.city_id',$city_id)->where('lwp.zipcode',$zipcode)->groupBy('lwp.category_id')->groupBy('pc.category_name')->get();
        if($id > 0)
        {
            $assigned_products = DB::table('access_to_products')->select('product_category_id')->where('user_id',$id)->get();
        }else
        {
            $assigned_products = array();
        }
        
        return view('admin.common.elements.policies-list-by-ajax',compact(['policies','assigned_products']));
        /*echo json_encode($response);
        exit;*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($prefix, Request $request){
        $id = decrypt($request->userid);
        $role_id = decrypt($request->role_id);

        if($role_id == 2){
            $validate_array = [
                        'full_name'=>['required','string','max:255'],
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
            $company_name = 'N/A';
        }else{
            $company_name = $request->company;
        }

        $access_link = (isset($request->access_link) && $request->access_link == 1) ? 'profile/user-profile/'.$request->username : '' ;

        $dashboard_access = (isset($request->dashboard_access) && $request->dashboard_access == 0) ? 0 : 1;

        $user = SiteUser::findOrFail($id);

        $user->name = $request->full_name;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->zipcode = $request->zipcode;
        $user->county = $request->county;
        $user->company = $company_name;
        $user->phone_number = $request->phone_number;
        $user->access_link = $access_link;
        $user->security_question_one = $request->security_question_one;
        $user->answer_one = $request->answer_one;
        $user->security_question_two = $request->security_question_two;
        $user->answer_two = $request->answer_two;
        $user->dashboard_access = $dashboard_access;

        if(isset($request->parent_user_id) && !empty($request->parent_user_id)){
            $user->parent_user_id = decrypt($request->parent_user_id);
        }

        if($request->password != ""){
            $user->password = Hash::make($request->password);
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

        $msg = ['status' => 'SUCCESS', 'mes' => 'User updated successfully!'];
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

        $msg = ['status' => 'SUCCESS', 'mes' => 'Employee deleted successfully!'];
        return Response()->json($msg);
    }
}
