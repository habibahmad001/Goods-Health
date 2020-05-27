<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CommonController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | function: get_broker_employee
    |--------------------------------------------------------------------------
    |
    | Get broker's employees list for dropdown options.
    |
    */

    public function get_broker_employee($prefix, $id){

        $brokers = DB::table('users')->select('id', 'name', 'email')->where('role_id', 6)->where('status', 1)->where('parent_user_id', $id)->get();

        $options = '<option value="0">Please Select Broker Agent</option>';

        foreach ($brokers as $b_key => $b_value) {
            $options .= '<option value="'.$b_value->id.'">'.$b_value->name.'/'.$b_value->email.'</option>';
        }

        echo $options;
        exit;
    }

    /*
    |--------------------------------------------------------------------------
    | function: save_payment
    |--------------------------------------------------------------------------
    |
    | Save payment data.
    |
    */

    public function save_payment($prefix, Request $request){

        if($request->payment_plan == 'annual'){
            $amount = $request->total_premium * 12;
        }else if($request->payment_plan == 'quarter'){
            $amount = $request->total_premium * 3;
        }else{
            $amount = $request->total_premium;
        }

        if($request->policy_id == ''){
            $cpd = DB::table('carrier_product_details')->select('*')->where('id', $request->cpd_id)->first();

            $policy_number = 'POL'.date('Ymdhis');

            $policy_id = DB::table('policies')
                ->insertGetId(
                [
                    'policy_number' => $policy_number,
                    'user_id' => decrypt($request->user_id),
                    'broker_agency_id' => $request->broker_id,
                    'agent_id' => $request->agent_id,
                    'provider_id' => $request->provider_id,
                    'price_1' => $cpd->price_1,
                    'price_2' => $cpd->price_2,
                    'price_3' => $cpd->price_3,
                    'price_4' => $cpd->price_4,
                    'product_id' => $cpd->id,
                    'policy_meta' => $cpd->meta,
                    'carrier_id' => $cpd->carrier_id,
                    'category_id' => $cpd->category_id,
                    'policy_name' => $cpd->product_name,
                    'policy_type' => 'Renew Basis',
                    'policy_period' => $request->policy_period,
                    'policy_value' => $cpd->price_1,
                    'policy_description' => $cpd->product_description,
                    'status' => 1
                    
                ]
            );
        } else {
            $policy_id = $request->policy_id;
            $policy_number = '';
        }
        

        DB::table('payments')
            ->insertGetId(
            [
                'user_id' => decrypt($request->user_id),
                'policy_id' => $policy_id,
                'payment_plan' => $request->payment_plan,
                'card_name' => $request->card_name,
                'card_number' => $request->card_number,
                'expiry_date' => $request->expiry_date,
                'country' => 'USA',
                'postal_code' => $request->postal_code,
                'transaction_number' => '00000'.date('Ymdhis'),
                'amount' => $amount,
                'transaction_status' => 1,
                'transaction_response_msg' => 1,
            ]
        );

        $payment_history = DB::table('payments')->select('*')->where('user_id', decrypt($request->user_id))->take(5)->orderBy('id', 'desc')->get();

        $count = count($payment_history);
        
        return response()->json(['status' => 'SUCCESS', 'mes' => 'Payment saved successfully!', 'count' => $count, 'offset' => $count, 'data' => $payment_history, 'policy_id' => $policy_id, 'policy_number' => $policy_number]);
    }

    /*
    |--------------------------------------------------------------------------
    | function: get_payment_history
    |--------------------------------------------------------------------------
    |
    | Get payment history.
    |
    */

    public function get_payment_history($prefix, $id, $offset){
        $id = decrypt($id);

        $payment_history = DB::table('payments')->select('*')->where('user_id', $id)->skip($offset)->take(5)->orderBy('id', 'DESC')->get();

        $count = count($payment_history);
        $new_offset = $offset + $count;

        return response()->json(['status' => 'SUCCESS', 'count' => $count, 'offset' => $new_offset, 'data' => $payment_history]);
    }

    /*
    |--------------------------------------------------------------------------
    | function: get_report_claim_section
    |--------------------------------------------------------------------------
    |
    | Load report claim section.
    |
    */

    public function get_report_claim_section($prefix, $id){
        $id = decrypt($id);

    	if($id > 0){
            $policies = DB::table('policies as p')
                        ->select('p.*', 'pc.*')
                        ->join('product_categories as pc','p.category_id','=','pc.id','LEFT')
                        ->where('p.user_id', $id)->get();
        }else{
            $policies;
        }

    	return view('admin.common.section.report-claim', compact('policies'));
    }

    /*
    |--------------------------------------------------------------------------
    | function: get_report_claim_list_datatables
    |--------------------------------------------------------------------------
    |
    | Used by datatables vendor to get the list of reports claim.
    |
    */

    public function get_report_claim_list_datatables($prefix, Request $request, $id){
        $id = decrypt($id);

    	if ($request->ajax()) {
            $data = DB::table('report_claim as report_claim')->select('report_claim.*', 'p.policy_type as policy_type', 'p.id as pid', 'cd.carrier_name as carrier_name')
                        ->join('policies as p','report_claim.policy_id','=','p.id','LEFT')
                        ->join('carrier_details as cd','report_claim.organization_id','=','cd.id','LEFT')
                        ->where('report_claim.user_id', $id)
                        ->where('report_claim.soft_delete', 1)->orderBy('id', 'desc')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('input', function($data){
                            $input = '<div class="input_radio"><input type="radio" name="report_claim_input" id="'.$data->id.'_radio_rc" value="'.encrypt($data->id).'" data-policy="'.encrypt($data->pid).'"/><label for="'.$data->id.'_radio_rc" class="radio-label"></label></div>';
                            return $input;
                    })
                    ->rawColumns(['input'])
                    ->make(true);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | function: save_report_claim
    |--------------------------------------------------------------------------
    |
    | Save report claim data.
    |
    */

    public function save_report_claim($prefix, Request $request){

        parse_str($request->form_data, $form_data);

        $user_id = decrypt($request->user_id);
        
    	if ($request->hasFile('image')) {
            $path = public_path('uploads/'.$user_id.'/reports');

            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true);
            }

            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.date('Ymdhis').'.'.$extension;

            $request->file('image')->storeAs('/uploads/'.$user_id.'/reports/', $fileNameToStore, 'public');

        }else{
        	$fileNameToStore = '';
        }

        if(!empty($form_data['report_claim_id'])){
            $rc_update = DB::table('report_claim')
                    ->where('id', $form_data['report_claim_id'])
                    ->update(
                    [
                        'owner_damaged_property' => $form_data['rc_injured_owner'],
                        'injured_party_information' => $form_data['rc_injured_party'],
                        'injured_person_name' => $form_data['rc_injured_person'],
                        'injured_person_address' => $form_data['rc_injured_address'],
                        'injured_person_number' => $form_data['phone_number'],
                        'injured_person_alternate_number' => $form_data['rc_injured_apn'],
                        'injured_person_dob' => $form_data['rc_injured_dob'],
                        'injured_person_guardian' => $form_data['rc_injured_gaurdian'],
                        'damage_injury_date' => $form_data['rc_injured_date'],
                        'location_of_incident' => $form_data['rc_injured_location'],
                        'activity' => $form_data['rc_injured_activity'],
                        'description_of_accident' => $form_data['rc_injured_description'],
                        'file_name' => $fileNameToStore
                 
                    ]
                );
            if($rc_update){
                return response()->json(['status' => 'SUCCESS', 'mes' => 'Report Claim updated successfully!']);
            }else{
                return response()->json(['status' => 'ERROR', 'mes' => 'Unable to update Report Claim!']);
            }
            
        }else{
            DB::table('report_claim')
                    ->insertGetId(
                    [
                        'user_id' => $user_id,
                        'policy_id' => $form_data['policy_id'],
                        'organization_id' => $form_data['organisation_id'],
                        'owner_damaged_property' => $form_data['rc_injured_owner'],
                        'injured_party_information' => $form_data['rc_injured_party'],
                        'injured_person_name' => $form_data['rc_injured_person'],
                        'injured_person_address' => $form_data['rc_injured_address'],
                        'injured_person_number' => $form_data['phone_number'],
                        'injured_person_alternate_number' => $form_data['rc_injured_apn'],
                        'injured_person_dob' => $form_data['rc_injured_dob'],
                        'injured_person_guardian' => $form_data['rc_injured_gaurdian'],
                        'damage_injury_date' => $form_data['rc_injured_date'],
                        'location_of_incident' => $form_data['rc_injured_location'],
                        'activity' => $form_data['rc_injured_activity'],
                        'description_of_accident' => $form_data['rc_injured_description'],
                        'file_name' => $fileNameToStore,
                        'created_at' => date('Y-m-d h:i:s'),
                    ]
                );
            return response()->json(['status' => 'SUCCESS', 'mes' => 'Report Claim submitted successfully!']);
        }
    
    }

    /*
    |--------------------------------------------------------------------------
    | function: soft_delete_report_claim
    |--------------------------------------------------------------------------
    |
    | Soft delete the report claim.
    |
    */

    public function soft_delete_report_claim($prefix, $id, $status){
        $id = decrypt($id);

        DB::table('report_claim')
            ->where('id', $id)
            ->update(
            [
                'soft_delete' => $status,
            ]
        );

        return response()->json(['status' => 'SUCCESS', 'mes' => 'Report claim deleted successfully!']);
    }

    /*
    |--------------------------------------------------------------------------
    | function: get_policies_list
    |--------------------------------------------------------------------------
    |
    | Get policies list.
    |
    */

    public function get_policies_list($prefix, $id, $cat_id){
        $id = decrypt($id);

    	if($id > 0){
            $cat_id = decrypt($cat_id);
            $policies = DB::table('policies as p')
                        ->select('p.id as id', 'p.policy_number as policy_number', 'p.policy_name as policy_name', 'p.created_at as created_at')
                        ->where('p.user_id', $id)
                        ->where('p.category_id', $cat_id)->get();
        }else{
            $policies;
        }

    	return view('admin.common.elements.policies_list', compact('policies'));
    }

    /*
    |--------------------------------------------------------------------------
    | function: load_apply_form
    |--------------------------------------------------------------------------
    |
    | Load report claim form section.
    |
    */
    public function load_apply_form($prefix, $id, $policy_id, $rc_id = ''){
        $id = decrypt($id);

        if(!empty($rc_id) && $rc_id != 'null'){
            $rc_id = decrypt($rc_id);
            $rc_details = DB::table('report_claim')->where('id', $rc_id)->first();
        }else{
            $rc_details = [];
        }
        if($id > 0){
            $policy_id = decrypt($policy_id);

            $policy = DB::table('policies')->where('policies.user_id', $id)->where('policies.id', $policy_id)->first();

            $organisation = DB::table('carrier_details')->where('id', $policy->carrier_id)->first();

            if(intval($policy->agent_id) && $policy->agent_id > 0){
                $contact_person = DB::table('users')->where('id', $policy->agent_id)->first();
            }elseif(intval($policy->broker_agency_id) && $policy->broker_agency_id > 0){
                $contact_person = DB::table('users')->where('id', $policy->broker_agency_id)->first();
            }elseif(intval($policy->provider_id) && $policy->provider_id > 0){
                $contact_person = DB::table('users')->where('id', $policy->provider_id)->first();
            }else{
                $contact_person = '';
            }
        }else{
            $policy;
            $organisation;
            $contact_person;
        }

        return view('admin.common.elements.apply_form', compact('policy', 'contact_person', 'organisation', 'rc_details'));
    }

    /*
    |--------------------------------------------------------------------------
    | function: show_benefits
    |--------------------------------------------------------------------------
    |
    | Get the list of policies.
    |
    */
    public function show_benefits($prefix, $id){
        $id = decrypt($id);
        if($id > 0){
            $policies = DB::table('policies as p')
                        ->select('p.*', 'pc.*', 'b.id as broker_id', 'b.name as broker_name', 'a.id', 'a.name as agent_name', 'pv.id', 'pv.name as provider_name', 'cd.id', 'cd.carrier_name', 'cpd.product_name')
                        ->join('product_categories as pc','p.category_id','=','pc.id','LEFT')
                        ->join('users as b','p.broker_agency_id','=','b.id','LEFT')
                        ->join('users as a','p.agent_id','=','a.id','LEFT')
                        ->join('users as pv','p.provider_id','=','pv.id','LEFT')
                        ->join('carrier_details as cd','p.carrier_id','=','cd.id','LEFT')
                        ->join('carrier_product_details as cpd','p.product_id','=','cpd.id','LEFT')
                        ->where('p.user_id', $id)->get();
        }else{
            $policies;
        }

        return view('admin.common.section.benefit-info', compact('policies'));
    }

    /*
    |--------------------------------------------------------------------------
    | function: get_insurance_options
    |--------------------------------------------------------------------------
    |
    | Get the list of insurance options.
    |
    */
    public function get_insurance_options($prefix, $user_id, $id=null){
        $user_id = decrypt($user_id);
        $id = decrypt($id);

        $userdata = DB::table('users')->select('*')->where('status', 1)->where('id', $user_id)->first();

        $insurance_options = DB::table('carrier_product_details as cpd')->select('cpd.*','cd.carrier_name', 'cd.carrier_logo')->join('carrier_details as cd','cpd.carrier_id','=','cd.id', 'LEFT')->where('cpd.state', $userdata->state)->where('cpd.city_id', $userdata->city)->where('cpd.zipcode', $userdata->zipcode)->where('cpd.category_id', $id)->get();

        return view('admin.common.elements.insurance_options_list', compact(['insurance_options']));
    }

    /*
    |--------------------------------------------------------------------------
    | function: get_insurance_options_details
    |--------------------------------------------------------------------------
    |
    | Get the detail of insurance options.
    |
    */
    public function get_insurance_options_details($prefix, $id){
        $insurance_option_details = DB::table('carrier_product_details as cpd')->select('cpd.*')->where('cpd.id', $id)->get();

        return response()->json($insurance_option_details);
    }

    /*
    |--------------------------------------------------------------------------
    | function: get_user_list_by_role
    |--------------------------------------------------------------------------
    |
    | Get the list of users by role.
    |
    */
    public function get_user_list($prefix, $role_id, $state = null, $city = null, $zipcode = null){
        $condition = [['status', '=', 1]];
        
        if(!empty($role_id)){
            array_push($condition, ['role_id', '=', decrypt($role_id)]);
        }

        if(!empty($state)){
            array_push($condition, ['state', '=', $state]);
        }

        if(!empty($city)){
            array_push($condition, ['city', '=', decrypt($city)]);
        }

        if(!empty($zipcode)){
            array_push($condition, ['zipcode', '=', decrypt($zipcode)]);
        }

        $users_data = DB::table('users')->select('id', 'name', 'username', 'email', 'role_id')
                    ->where($condition)
                    ->get();

        $name_option = '<option value="">Select User</option>';
        foreach($users_data as $user_data){
            $user_name = $user_data->name ? $user_data->name : $user_data->username;
            $name_option .= '<option value="'.encrypt($user_data->id).'">'.$user_name.' / '.$user_data->email.'</option>';
        }

        return $name_option;
    }

    /*
    |--------------------------------------------------------------------------
    | function: get_cities_list
    |--------------------------------------------------------------------------
    |
    | Get the list of cities by state code.
    |
    */
    public function get_cities_list($prefix, $state_code){
        $cities = DB::table('cities')->select('id','city')->where('state_code', $state_code)->orderBy('city', 'asc')->get();

        $city_option = '<option value="">Select City</option>';
        foreach($cities as $city){
            $city_option .= '<option value="'.$city->id.'">'.$city->city.'</option>';
        }

        return $city_option;
    }

    /*
    |--------------------------------------------------------------------------
    | function: get_multiple_cities_list
    |--------------------------------------------------------------------------
    |
    | Get the list of cities by state code.
    |
    */
    public function get_cities_list_for_multiple_state($prefix, Request $request){
        $cities = DB::table('cities')->select('id','city as text')->whereIn('state_code', $request->code)->orderBy('city', 'asc')->get();

        return response()->json($cities);
    }

    /*
    |--------------------------------------------------------------------------
    | function: get_cities_list
    |--------------------------------------------------------------------------
    |
    | Get the list of zipcode by city id.
    |
    */
    public function get_zipcodes_list($prefix, $city_id){
        $zipcodes = DB::table('zip_codes')->select('id', 'zipcode')->where('city_id', $city_id)->orderBy('zipcode', 'asc')->get();
        
        $zip_option = '<option value="">Select Zipcode</option>';
        foreach($zipcodes as $zipcode){
            $zip_option .= '<option value="'.$zipcode->zipcode.'">'.$zipcode->zipcode.'</option>';
        }

        return $zip_option;
    }

    /*
    |--------------------------------------------------------------------------
    | function: get_multiple_cities_list
    |--------------------------------------------------------------------------
    |
    | Get the list of cities by state code.
    |
    */
    public function get_zipcode_list_for_multiple_city($prefix, Request $request){
        $zipcodes = DB::table('zip_codes')->select('zipcode as id','zipcode as text')->whereIn('city_id', $request->code)->orderBy('zipcode', 'asc')->get();

        return response()->json($zipcodes);
    }

    /*
    |--------------------------------------------------------------------------
    | function: get_county
    |--------------------------------------------------------------------------
    |
    | Get the county by zicode id.
    |
    */
    public function get_county($prefix, $zip_id)
    {   
        $county = DB::table('county')->select('id','county')->where('zip_code', $zip_id)->first();

        return $county->county;
    }

    /*
    |--------------------------------------------------------------------------
    | function: get_multiple_cities_list
    |--------------------------------------------------------------------------
    |
    | Get the list of cities by state code.
    |
    */
    public function get_county_list_for_multiple_zipcode($prefix, Request $request){
        $county = DB::table('county')->select('id','county as text')->whereIn('zip_code', $request->code)->orderBy('county', 'asc')->get();

        return response()->json($county);
    }
    
    /*
    |--------------------------------------------------------------------------
    | function: check_username_email_exists
    |--------------------------------------------------------------------------
    |
    | Check username/email exist or not.
    |
    */
    public function check_username_email_exists($prefix, $data, $type){
        if($type == 'email'){
            $user_data = DB::table('users')->where('email', $data)->get();
        }else{
            $user_data = DB::table('users')->where('username', $data)->get();
        }
        
        echo count($user_data);
    }

    public function load_calendar_data($prefix, Request $request, $keywords = null, $module_id = null, $show_n = 1, $show_t = 1, $show_e = 1){
        $all_notification = $get_history = $get_tasks = $get_events = collect();

        $h_condition = $a_condition = [];

        if(!empty($module_id) && $module_id != 'null'){
            array_push($h_condition, ['module_id', '=', $module_id]);
        }

        if(!empty($keywords) && $keywords != 'null'){
            array_push($h_condition, ['description', 'LIKE', '%'.str_replace('-',' ', $keywords).'%']);
            array_push($a_condition, ['description', 'LIKE', '%'.str_replace('-',' ', $keywords).'%']);
        }


        if($show_n != 0){
            $get_history = DB::table('histories')->select('id', 'description as title', 'created_at as start', 'created_at as end', DB::raw('"notification" as n_type'))->whereBetween('created_at', [$request->start." 00:00:00", $request->end." 23:59:59"])->where($h_condition)->get();
        }

        if(empty($module_id) || $module_id == 'null' || $module_id == 3){
            if($show_t != 0){
                $get_tasks = DB::table('tasks')->select('id', 'title', 'start_date as start', 'start_date as end', DB::raw('"task" as n_type'))->whereBetween('start_date', [$request->start, $request->end])->where('status', 1)->where($a_condition)->get();
            }

            if($show_e != 0){
                $get_events = DB::table('events')->select('id', 'title', 'start_datetime as start', 'start_datetime as end', DB::raw('"event" as n_type'))->whereBetween('start_datetime', [$request->start." 00:00:00", $request->end." 23:59:59"])->where('status', 1)->where($a_condition)->get();
            }
        }

        $all_notification = $all_notification->merge($get_history);

        $all_notification = $all_notification->merge($get_tasks);

        $all_notification = $all_notification->merge($get_events);

        return response()->json($all_notification);
    }

    public function get_calender_notification_list($prefix, Request $request, $date_time, $keywords = null, $module_id = null, $show_n = 1, $show_t = 1, $show_e = 1){
        $all_notification = $get_history = $get_tasks = $get_events = collect();

        $h_condition = $a_condition = [];

        if(!empty($module_id) && $module_id != 'null'){
            array_push($h_condition, ['module_id', '=', $module_id]);
        }

        if(!empty($keywords) && $keywords != 'null'){
            array_push($h_condition, ['description', 'LIKE', '%'.str_replace('-',' ', $keywords).'%']);
            array_push($a_condition, ['description', 'LIKE', '%'.str_replace('-',' ', $keywords).'%']);
        }

        if($show_n != 0){
            $get_history = DB::table('histories')->select('id', 'description', 'created_at as created_at', DB::raw('"notification" as n_type, "N/A" as schedule'))->whereBetween('created_at', [$date_time." 00:00:00", $date_time." 23:59:59"])->where($h_condition)->get();
        }

        if(empty($module_id) || $module_id == 'null' || $module_id == 3){
            if($show_t != 0){
                $get_tasks = DB::table('tasks')->select('id', 'description', 'created_at as created_at', 'start_date as schedule', DB::raw('"task" as n_type'))->where('start_date', $date_time)->where('status', 1)->where($a_condition)->get();
            }

            if($show_e != 0){
                $get_events = DB::table('events')->select('id', 'description', 'created_at as created_at', 'start_datetime as schedule', DB::raw('"events" as n_type'))->whereBetween('start_datetime', [$date_time." 00:00:00", $date_time." 23:59:59"])->where('status', 1)->where($a_condition)->get();
            }
        }

        $all_notification = $all_notification->merge($get_history);

        $all_notification = $all_notification->merge($get_tasks);

        $all_notification = $all_notification->merge($get_events);

        return Datatables::of($all_notification)
                    ->addIndexColumn()
                    ->editColumn('schedule', function ($all_notification){
                            if($all_notification->n_type == 'notification'){
                                return 'N/A';
                            }else{
                                return date('m/d/Y', strtotime($all_notification->schedule));
                            }
                    })
                    ->editColumn('n_type', function ($all_notification){
                            return ucfirst($all_notification->n_type);
                    })
                    ->editColumn('created_at', function ($all_notification){
                            return date('m/d/Y h:i:s A', strtotime($all_notification->created_at));
                    })
                    ->addColumn('action', function($all_notification){
                        if($all_notification->n_type == 'notification'){
                            $action = '';
                        }else{
                            $action = '<a href="javascript.void(0)" class="view_'.$all_notification->n_type.'_to_user" data-'.$all_notification->n_type.'_id="'.encrypt($all_notification->id).'"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;';

                            $action .= '<a href="javascript.void(0)" class="edit_'.$all_notification->n_type.'_to_user" data-'.$all_notification->n_type.'_id="'.encrypt($all_notification->id).'"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;';

                            $action .= '<a href="javascript.void(0)" class="delete_'.$all_notification->n_type.'_to_user" data-'.$all_notification->n_type.'_id="'.encrypt($all_notification->id).'"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;';
                        }

                        return $action;
                    })
                    ->rawColumns(['action'])
                    ->make(true);


    }

    public function save_task_event_data($prefix, Request $request){
        //dd($request->all());

        if($request->activity_type == 'task'){
            DB::table('tasks')->updateOrInsert(
                    [
                        'id' => $request->task_id
                    ],
                    [
                        'user_id' => decrypt($request->user_id),
                        'start_date' => $request->start_date ? date('Y-m-d', strtotime($request->start_date)) : date('Y-m-d'),
                        'start_time' => $request->start_time,
                        'end_time' => $request->end_time,
                        'all_day' => $request->all_day || (empty($request->start_time) || empty($request->end_time)) ? 1 : 0,
                        'title' => $request->title,
                        'description' => $request->description,
                        'reminder_1' => $request->reminder_1,
                        'reminder_2' => $request->reminder_2,
                        'reminder_3' => $request->reminder_3,
                        'created_by' => Auth::user()->id
                    ]);
            if($request->task_id > 0){
                $mes = 'Task updated successfully.';
            }else{
                $mes = 'Task added successfully.';
            }
        }else{

            DB::table('events')->updateOrInsert(
                    [
                        'id' => $request->event_id
                    ],
                    [
                        'user_id' => decrypt($request->user_id),
                        'start_datetime' => $request->start_datetime ? date('Y-m-d h:i:s', strtotime($request->start_datetime)) : date('Y-m-d h:i:s'),
                        'end_datetime' => $request->start_datetime ? date('Y-m-d h:i:s', strtotime($request->start_datetime)) : date('Y-m-d h:i:s'),
                        'title' => $request->title,
                        'description' => $request->description,
                        'location' => $request->location,
                        'reminder_1' => $request->reminder_1,
                        'reminder_2' => $request->reminder_2,
                        'reminder_3' => $request->reminder_3,
                        'created_by' => Auth::user()->id
                    ]);
            
            if($request->event_id > 0){
                $mes = 'Event updated successfully.';
            }else{
                $mes = 'Event added successfully.';
            }
        }

        return response()->json(['status' => 'SUCCESS', 'mes' => $mes]);
    }

    public function get_activity_form_data($prefix, $activity_type, $action_from, $action_type, $user_id = null, $activity_id = null){
        $activity_type = decrypt($activity_type);
        $action_from = decrypt($action_from);
        $policies = [];
        $activity_data = $get_user = $users_data = $note_reply = [];
        $table = '';

        if($action_from == 'module'){
            $user_id = decrypt($user_id);
        }else{
            $user_id = '';
        }
        
        if($activity_type == 'task'){
            $view = 'admin.common.elements.task_form';
            $table = 'tasks';
        }elseif($activity_type == 'event'){
            $view = 'admin.common.elements.event_form';
            $table = 'events';
        }elseif($activity_type == 'note'){
            $policies = DB::table('policies')->select('id', 'policy_number')->where('user_id', $user_id)->get();
            if($action_type == 'view'){
                $note_reply = DB::table('notes as n')->select('n.id as n_id', 'n.note as note', 'n.created_at as created_at', 'c.name as name')->where('n.status', 1)->where('n.parent_note_id', decrypt($activity_id))
                        ->join('users as c', 'n.created_by', '=','c.id','LEFT')
                        ->get();
            }
            
            $view = 'admin.common.elements.note_form';
            $table = 'notes';
        }

        if(($action_type == 'edit' || $action_type == 'view' || $action_type == 'reply') && !empty($activity_id)){
            $activity_data = DB::table($table.' as a')->where('id', decrypt($activity_id))
                                ->first();
            if($action_from != 'module'){
                $get_user = DB::table('users')->select('id', 'role_id')->where('id', $activity_data->user_id)->first();

                $users_data = DB::table('users')->select('id', 'name', 'username', 'email', 'role_id')
                    ->where('role_id', $get_user->role_id)
                    ->where('status', 1)
                    ->get();
            }
        }

        return view($view, compact('action_from', 'user_id', 'policies', 'action_type', 'activity_data', 'users_data', 'get_user', 'note_reply'));
    }

    public function delete_activity_data($prefix, Request $request){
        $id = decrypt($request->activity_id);
        $table = $request->activity_type;

        DB::table($table.'s')->where('id', $id)->update(['status' => 0]);

        $msg = ['status' => 'SUCCESS', 'mes' => ucfirst($table).' deleted successfully!'];
        return Response()->json($msg);
    }

    public function get_user_details_by_email($prefix, $email){
        $users = DB::table('users as u')->select('u.id as uid', 'u.name as u_name', 'u.email as u_email', 'ud.*')
                        ->leftjoin('user_family_groups as ud', function ($join) {
                            $join->on('ud.user_id', '=', 'u.id')->where('ud.relation', 0);
                        })
                        ->where('u.status', 1)
                        ->where('u.email', $email)
                        ->first();
                        
        return response()->json(['status' => 'SUCCESS', 'data' => $users]);
    }

    /*
    |--------------------------------------------------------------------------
    | function: get_carrier_list
    |--------------------------------------------------------------------------
    |
    | Get the list of users by role.
    |
    */

    public function get_carrier_list($prefix, $state = null, $city = null, $zipcode = null){
        $condition = [];

        if(!empty($state)){
            array_push($condition, ['state', '=', $state]);
        }

        if(!empty($city)){
            array_push($condition, ['city_id', '=', $city]);
        }

        if(!empty($zipcode)){
            array_push($condition, ['zipcode', '=', $zipcode]);
        }

        $carrier_locations = DB::table('carrier_locations')
                    ->where($condition)
                    ->groupBy('carrier_id')
                    ->pluck('carrier_id');

        $carrier_option = '<option value="">Select Carrier</option>';

        if($carrier_locations->isNotEmpty()){
            $carriers = DB::table('carrier_details')->select('id', 'carrier_id', 'carrier_name')
                            ->where([['status', '>', 0]])
                            ->whereIn('id', $carrier_locations->toArray())
                            ->get();
            foreach($carriers as $carrier){
                $carrier_option .= '<option value="'.$carrier->id.'">'.$carrier->carrier_name.' / '.$carrier->carrier_id.'</option>';
            }
        }

        return $carrier_option;
    }

    public function get_carrier_detail($prefix, $id){
        $carrier_details = DB::table('carrier_details as cd')->select('cd.*', 'c.city as c_city', 's.state as s_state')

                                ->join('cities as c', 'cd.carrier_city', '=','c.id', 'LEFT')
                                ->join('states as s', 'cd.carrier_state', '=','s.state_code', 'LEFT')
                                ->where('cd.id', $id)
                                ->first();

        return response()->json(['status' => 'SUCCESS', 'data' => $carrier_details]);
    }
}
