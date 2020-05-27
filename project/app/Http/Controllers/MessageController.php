<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Mail;

class MessageController extends Controller
{
    public function index($prefix, $request_for){
        return view('admin.modules.message.index', compact('request_for'));
    }

    public function load_section($prefix, $request_for){
    	$request_for = decrypt($request_for);

    	if($request_for == 'compose'){
    		$view = 'compose';
    	}else{
    		$view = 'message_list';
    	}

    	return view('admin.modules.message.'.$view, compact('request_for'));
    }

    /**
    |--------------------------------------------------------------------------
    | function: show
    |--------------------------------------------------------------------------
    |
    | This function is use to display business users list.
    | @return \Illuminate\Http\Response
    */
    public function message_list_datatables($prefix, Request $request, $request_type){
        $user_id = Auth::user()->id;
        $request_type = decrypt($request_type);

        if ($request->ajax()) {
            if($request_type == 'inbox'){

            $data = DB::table('message_table as mt')->select('mt.*', 'u_from.name as f_name', 'u_from.email as f_email', 'mtsn.m_delete as m_delete', 'mtsn.m_important as m_important')

            		->join('users as u_from', 'mt.from_user_id', '=', 'u_from.id', 'LEFT')

                    ->leftjoin('message_transactions as mtsn', function($join) use($user_id){
                            $join->on('mt.id', '=', 'mtsn.message_id')
                            ->where('mtsn.user_id', $user_id);
                    })

                    ->where('mt.status', 1)

                    ->where(function($query){
                        $query->where('mtsn.m_delete', 0)
                        ->orWhereNull('mtsn.m_delete');
                    })

                    ->where(function($query) use($user_id){
                        $query->where('mt.to_user_id', $user_id)
                        ->orWhere('mt.to_cc', $user_id)
                        ->orWhere('mt.to_bcc', $user_id);
                    })->get();

            }elseif($request_type == 'sent'){

            $data = DB::table('message_table as mt')->select('mt.*', 'u_to.name as t_name', 'u_to.email as t_email', 'mtsn.m_delete as m_delete', 'mtsn.m_important as m_important')
                    
                    ->join('users as u_to', 'mt.to_user_id', '=', 'u_to.id', 'LEFT')

                    ->leftjoin('message_transactions as mtsn', function($join) use($user_id){
                            $join->on('mt.id', '=', 'mtsn.message_id')
                            ->where('mtsn.user_id', $user_id);
                    })

                    ->where('mt.status', 1)

                    ->where(function($query){
                        $query->where('mtsn.m_delete', 0)
                        ->orWhereNull('mtsn.m_delete');
                    })

                    ->where('mt.from_user_id', $user_id)->get();

            }elseif($request_type == 'important'){

            $data = DB::table('message_table as mt')->select('mt.*', 'u_from.name as f_name', 'u_from.email as f_email', 'mtsn.m_delete as m_delete', 'mtsn.m_important as m_important')
                    
                    ->join('users as u_from', 'mt.from_user_id', '=', 'u_from.id', 'LEFT')

                    ->leftjoin('message_transactions as mtsn', function($join) use($user_id){
                            $join->on('mt.id', '=', 'mtsn.message_id')
                            ->where('mtsn.user_id', $user_id);
                    })

                    ->where(function($query){
                        $query->where('mtsn.m_delete', 0)
                        ->orWhereNull('mtsn.m_delete');
                    })

                    ->where('mtsn.m_important', 1)
                    
                    ->where('mt.status', 1)
                    
                    ->where(function($query) use($user_id){
                        $query->where('mt.to_user_id', $user_id)
                        ->orWhere('mt.to_cc', $user_id)
                        ->orWhere('mt.to_bcc', $user_id);
                    })->get();

            }elseif($request_type == 'draft'){

            $data = DB::table('message_table as mt')->select('mt.*', 'u_to.name as t_name', 'u_to.email as t_email')
                    
                    ->join('users as u_to', 'mt.to_user_id', '=', 'u_to.id', 'LEFT')

                    ->where('mt.status', 0)
                    ->where('mt.from_user_id', $user_id)->get();

            }elseif($request_type == 'trash'){
                $data = DB::table('message_table as mt')->select('mt.*', 'u_from.name as f_name', 'u_from.email as f_email', 'u_to.name as t_name', 'u_to.email as t_email', 'mtsn.m_delete as m_delete', 'mtsn.m_important as m_important')

                    ->join('users as u_from', 'mt.from_user_id', '=', 'u_from.id', 'LEFT')
                    ->join('users as u_to', 'mt.to_user_id', '=', 'u_to.id', 'LEFT')

                    ->leftjoin('message_transactions as mtsn', function($join) use($user_id){
                            $join->on('mt.id', '=', 'mtsn.message_id')
                            ->where('mtsn.user_id', $user_id);
                    })

                    ->where('mt.status', 1)
                    ->where('mtsn.m_delete', 1)

                    ->where(function($query) use($user_id){
                        $query->where('mt.to_user_id', $user_id)
                        ->orWhere('mt.to_cc', $user_id)
                        ->orWhere('mt.to_bcc', $user_id)
                        ->orWhere('mt.from_user_id', $user_id);
                    })->get();
            }

	        return Datatables::of($data)
	                ->addIndexColumn()
	                ->addColumn('action', function($data) use ($request_type) {
                            $imp_star = $data->m_important == 1 ? 'fa-star' : 'fa-star-o';
                            
                            $view_action = '<a href="javascrtipt.void(0)" class="view_message" data-message_id="'.encrypt($data->id).'" data-request_type="'.$request_type.'"><i class="fa fa-eye fa-lg"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

                            if($request_type == 'inbox'){
                                $view_action .= '<a href="javascrtipt.void(0)" class="important_message" data-message_id="'.encrypt($data->id).'" data-request_type="'.$request_type.'"><i class="fa '.$imp_star.' fa-lg"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                            }elseif($request_type == 'draft'){
                                $view_action .= '<a href="javascrtipt.void(0)" class="edit_message" data-message_id="'.encrypt($data->id).'" data-request_type="'.$request_type.'"><i class="fa fa-edit fa-lg"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                            }
                            
                            if($request_type != 'trash'){
                            $view_action .= '<a href="javascrtipt.void(0)" class="delete_message" data-message_id="'.encrypt($data->id).'" data-request_type="'.$request_type.'"><i class="fa fa-trash-o fa-lg"></i></a>';
                            }
	                        return $view_action;
	                })
	                // ->addColumn('profile_image', function($data){
	                //     if($data->image){
	                //         $image = '<img src="'.asset('uploads/'.$data->id.'/photos/'. $data->image ).'" alt="User" class="img-responsive" width="30">';
	                //     }else{
	                //         $image = '<img src="'.asset('images/polaroid.png').'" alt="User" class="img-responsive">';
	                //     }

	                //     return $image;
	                // })
	                ->rawColumns(['action'])
	                ->make(true);
	    }
    }

    public function save($prefix, Request $request){
        $validate_array = [
                'to_email'=>['required','string'],
                'subject'=>['required','string'],
                'message'=>['required','string'],
            ];
        
        $this->validate($request, $validate_array);
        $filesNameToStore = [];

        if ($request->hasFile('files_name')) {
            foreach ($request->file('files_name') as $attachment) {
                $path = public_path('uploads/message_hub');

                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true);
                }

                $fileNameWithExt = $attachment->getClientOriginalName();
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $attachment->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.date('Ymdhis').'.'.$extension;
                $attachment->storeAs('/uploads/message_hub/', $fileNameToStore, 'public');

                array_push($filesNameToStore, $fileNameToStore);
            }
        }

        DB::table('message_table')
            ->insertGetId(
            [
                'from_user_id' => Auth::user()->id,
                'to_user_id' => decrypt($request->to_email),
                'to_cc' => $request->has('cc_email') ? decrypt($request->cc_email) : NULL,
                'to_bcc' => $request->has('bcc_email') ? decrypt($request->bcc_email) : NULL,
                'mail_category_id' => 1,
                'subject' => $request->subject,
                'message' => $request->message,
                'file_name' => json_encode($filesNameToStore, JSON_FORCE_OBJECT),
                'status' => 1,
                'created_at' => date('Y-m-d h:i:s'),
            ]
        );
        return response()->json(['status' => 'SUCCESS', 'mes' => 'Message sent!']);
    }

    public function change_status($prefix, $message_id, $action_for){
        $message_id = decrypt($message_id);
        $action_for = decrypt($action_for);
        $user_id  = Auth::user()->id;

        $data = DB::table('message_transactions')->where('user_id', $user_id)->where('message_id', $message_id)->first();

        if(!empty($data)){
            $delete = $data->m_delete;
            $important = $data->m_important;

            if($action_for == 'delete'){
                $delete = $delete == 1 ? 0 : 1;
            }else{
                $important = $important == 1 ? 0 : 1;
            }

            DB::table('message_transactions')
                    ->where('id', $data->id)
                    ->update([
                        'm_important' => $important,
                        'm_delete' => $delete,
                    ]);   
        }else{
            $delete = 0;
            $important = 0;

            if($action_for == 'delete'){
                $delete = 1;
            }else{
                $important = 1;
            }

            DB::table('message_transactions')->insert([
                        'user_id' => $user_id,
                        'message_id' => $message_id,
                        'm_important' => $important,
                        'm_delete' => $delete,
                    ]);
        }

        if($action_for == 'delete'){
            $msg = 'Message deleted!';
        }else{
            if($important){
                $msg = 'Marked as important!';
            }else{
                $msg = 'Removed from important!';
            }
        }

        return response()->json(['status' => 'SUCCESS', 'mes' => $msg]);
    }

    public function get_details($prefix, $message_id, $request_type){
        $message_id = decrypt($message_id);

        $data = DB::table('message_table as mt')->select('mt.*', 'u_from.name as f_name', 'u_from.username as f_uname', 'u_from.email as f_email', 'u_to.name as t_name', 'u_to.username as t_uname', 'u_to.email as t_email', 'to_cc.name as c_name', 'to_cc.username as c_uname', 'to_cc.email as c_email', 'to_bcc.name as b_name', 'to_bcc.username as b_uname', 'to_bcc.email as b_email')
                    ->join('users as u_from', 'mt.from_user_id', '=', 'u_from.id', 'LEFT')
                    ->join('users as u_to', 'mt.to_user_id', '=', 'u_to.id', 'LEFT')
                    ->join('users as to_cc', 'mt.to_cc', '=', 'to_cc.id', 'LEFT')
                    ->join('users as to_bcc', 'mt.to_bcc', '=', 'to_bcc.id', 'LEFT')
                    ->where('mt.id', $message_id)->first();

        return view('admin.common.elements.message_detail', compact('data', 'request_type'));
    }

    public function search_user($prefix, Request $request){
        if(!empty($request->term)){
            $search_key = $request->term;
            $user_list = [];

            $role_id = Auth::user()->role_id;

            if($role_id == 2){
                $users_data = DB::table('users')->select('id', 'name', 'username', 'email', 'role_id')
                    ->where('role_id', 1)
                    ->where('status', 1)
                    ->where(function($query) use($search_key){
                        $query->where('name', 'LIKE', "%{$search_key}%")
                            ->orWhere('username', 'LIKE', "%{$search_key}%")
                            ->orWhere('email', 'LIKE', "%{$search_key}%");
                    })
                    ->get();

                if(!empty(Auth::user()->agent_user_id)){
                    $get_agent = DB::table('users')->select('id', 'name', 'username', 'email')
                    ->where('id', Auth::user()->agent_user_id)
                    ->where('status', 1)
                    ->where(function($query) use($search_key){
                        $query->where('name', 'LIKE', "%{$search_key}%")
                            ->orWhere('username', 'LIKE', "%{$search_key}%")
                            ->orWhere('email', 'LIKE', "%{$search_key}%");
                    })
                    ->get();
                    $users_data = $users_data->merge($get_agent);
                }
            }elseif($role_id == 3){
                // $data = array('email'=>'artest232768@gmail.com','password'=>'14526589','role'=>'abc','username'=>'sn');
                // Mail::send('emails.welcome', $data, function($message) use ($data)
                // {
                //     $message->from('support@goodsinsured.com', "Goodinsured");
                //     $message->subject("Welcome to Goodinsured");
                //     $message->to('artest232768@gmail.com');
                // });

                $users_data = DB::table('users')->select('id', 'name', 'username', 'email', 'role_id')
                    ->where('parent_user_id', Auth::user()->id)
                    ->where('status', 1)
                    ->where(function($query) use($search_key){
                        $query->where('name', 'LIKE', "%{$search_key}%")
                            ->orWhere('username', 'LIKE', "%{$search_key}%")
                            ->orWhere('email', 'LIKE', "%{$search_key}%");
                    })
                    ->get();

                $admin_data = DB::table('users')->select('id', 'name', 'username', 'email', 'role_id')
                    ->where('role_id', 1)
                    ->where('status', 1)
                    ->where(function($query) use($search_key){
                        $query->where('name', 'LIKE', "%{$search_key}%")
                            ->orWhere('username', 'LIKE', "%{$search_key}%")
                            ->orWhere('email', 'LIKE', "%{$search_key}%");
                    })
                    ->get();

                $users_data = $users_data->merge($admin_data);

                if(!empty(Auth::user()->agent_user_id)){
                    $get_agent = DB::table('users')->select('id', 'name', 'username', 'email')
                    ->where('id', Auth::user()->agent_user_id)
                    ->where('status', 1)
                    ->where(function($query) use($search_key){
                        $query->where('name', 'LIKE', "%{$search_key}%")
                            ->orWhere('username', 'LIKE', "%{$search_key}%")
                            ->orWhere('email', 'LIKE', "%{$search_key}%");
                    })
                    ->get();
                    $users_data = $users_data->merge($get_agent);
                }
            }elseif($role_id == 4){

                $users_data = DB::table('users')->select('id', 'name', 'username', 'email', 'role_id')
                    ->where('parent_user_id', Auth::user()->id)
                    ->where('status', 1)
                    ->where(function($query) use($search_key){
                        $query->where('name', 'LIKE', "%{$search_key}%")
                            ->orWhere('username', 'LIKE', "%{$search_key}%")
                            ->orWhere('email', 'LIKE', "%{$search_key}%");
                    })
                    ->get();

                $admin_data = DB::table('users')->select('id', 'name', 'username', 'email', 'role_id')
                    ->where('role_id', 1)
                    ->where('status', 1)
                    ->where(function($query) use($search_key){
                        $query->where('name', 'LIKE', "%{$search_key}%")
                            ->orWhere('username', 'LIKE', "%{$search_key}%")
                            ->orWhere('email', 'LIKE', "%{$search_key}%");
                    })
                    ->get();

                $get_agent = DB::table('users')->select('id', 'name', 'username', 'email')
                    ->where('id', Auth::user()->agent_user_id)
                    ->where('status', 1)
                    ->where(function($query) use($search_key){
                        $query->where('name', 'LIKE', "%{$search_key}%")
                            ->orWhere('username', 'LIKE', "%{$search_key}%")
                            ->orWhere('email', 'LIKE', "%{$search_key}%");
                    })
                    ->get();

                $get_business_data = DB::table('users')->select('id')
                    ->where('provider_user_id', Auth::user()->id)
                    ->where('role_id', 3)
                    ->where('status', 1)
                    ->get();

                $get_business_ids = $get_business_data->pluck('id');

                $get_business_customer = DB::table('users')->select('id', 'name', 'username', 'email', 'role_id')
                    ->where('provider_user_id', Auth::user()->id)
                    ->where('status', 1)
                    ->where(function($query) use($search_key){
                        $query->where('name', 'LIKE', "%{$search_key}%")
                            ->orWhere('username', 'LIKE', "%{$search_key}%")
                            ->orWhere('email', 'LIKE', "%{$search_key}%");
                    })
                    ->get();

                $users_data = $users_data->merge($admin_data);
                $users_data = $users_data->merge($get_agent);
                $users_data = $users_data->merge($get_business_customer);

                if(!$get_business_ids->isEmpty()){
                    $get_business_employee = DB::table('users')->select('id', 'name', 'username', 'email', 'role_id')
                        ->whereIn('parent_user_id', $get_business_ids)
                        ->where('status', 1)
                        ->where(function($query) use($search_key){
                            $query->where('name', 'LIKE', "%{$search_key}%")
                                ->orWhere('username', 'LIKE', "%{$search_key}%")
                                ->orWhere('email', 'LIKE', "%{$search_key}%");
                        })
                        ->get();
                    $users_data = $users_data->merge($get_business_employee);
                }
            }elseif($role_id == 5){
                $users_data = DB::table('users')->select('id', 'name', 'username', 'email', 'role_id', 'agent_user_id')
                    ->where('parent_user_id', Auth::user()->parent_user_id)
                    ->where('status', 1)
                    ->where(function($query) use($search_key){
                        $query->where('name', 'LIKE', "%{$search_key}%")
                            ->orWhere('username', 'LIKE', "%{$search_key}%")
                            ->orWhere('email', 'LIKE', "%{$search_key}%");
                    })
                    ->get();

                $admin_data = DB::table('users')->select('id', 'name', 'username', 'email', 'role_id')
                    ->where('role_id', 1)
                    ->where('status', 1)
                    ->where(function($query) use($search_key){
                        $query->where('name', 'LIKE', "%{$search_key}%")
                            ->orWhere('username', 'LIKE', "%{$search_key}%")
                            ->orWhere('email', 'LIKE', "%{$search_key}%");
                    })
                    ->get();

                $users_data = $users_data->merge($admin_data);

                $agents_ids = $users_data->pluck('id');

                if(!$agents_ids->isEmpty()){
                    $get_business_customer_provider = DB::table('users')->select('id', 'name', 'username', 'email', 'role_id')
                    ->whereIn('agent_user_id', $agents_ids)
                    ->orWhere('broker_user_id', Auth::user()->id)
                    ->where('status', 1)
                    ->where(function($query) use($search_key){
                        $query->where('name', 'LIKE', "%{$search_key}%")
                            ->orWhere('username', 'LIKE', "%{$search_key}%")
                            ->orWhere('email', 'LIKE', "%{$search_key}%");
                    })
                    ->get();

                    $users_data = $users_data->merge($get_business_customer_provider);

                    $get_business_provider = DB::table('users')->select('id')
                        ->where('agent_user_id', $agents_ids)
                        ->orWhere('broker_user_id', Auth::user()->id)
                        ->whereIn('role_id', [3,4])
                        ->where('status', 1)
                        ->get();

                    $get_business_provider_ids = $get_business_provider->pluck('id');

                    if(!$get_business_provider_ids->isEmpty()){
                        $get_business_provider_employee = DB::table('users')->select('id', 'name', 'username', 'email', 'role_id')
                            ->whereIn('parent_user_id', $get_business_provider_ids)
                            ->where('status', 1)
                            ->where(function($query) use($search_key){
                                $query->where('name', 'LIKE', "%{$search_key}%")
                                    ->orWhere('username', 'LIKE', "%{$search_key}%")
                                    ->orWhere('email', 'LIKE', "%{$search_key}%");
                            })
                            ->get();
                        $users_data = $users_data->merge($get_business_provider_employee);
                    }
                }

            }elseif($role_id == 6){
                $users_data = DB::table('users')->select('id', 'name', 'username', 'email', 'role_id', 'agent_user_id')
                    ->where('id', Auth::user()->parent_user_id)
                    ->where('status', 1)
                    ->where(function($query) use($search_key){
                        $query->where('name', 'LIKE', "%{$search_key}%")
                            ->orWhere('username', 'LIKE', "%{$search_key}%")
                            ->orWhere('email', 'LIKE', "%{$search_key}%");
                    })
                    ->get();

                $admin_data = DB::table('users')->select('id', 'name', 'username', 'email', 'role_id')
                    ->where('role_id', 1)
                    ->where('status', 1)
                    ->where(function($query) use($search_key){
                        $query->where('name', 'LIKE', "%{$search_key}%")
                            ->orWhere('username', 'LIKE', "%{$search_key}%")
                            ->orWhere('email', 'LIKE', "%{$search_key}%");
                    })
                    ->get();

                $get_business_customer_provider = DB::table('users')->select('id', 'name', 'username', 'email', 'role_id')
                    ->where('agent_user_id', Auth::user()->id)
                    ->where('status', 1)
                    ->where(function($query) use($search_key){
                        $query->where('name', 'LIKE', "%{$search_key}%")
                            ->orWhere('username', 'LIKE', "%{$search_key}%")
                            ->orWhere('email', 'LIKE', "%{$search_key}%");
                    })
                    ->get();

                $users_data = $users_data->merge($admin_data);
                $users_data = $users_data->merge($get_business_customer_provider);

                $get_business_provider = DB::table('users')->select('id')
                    ->where('agent_user_id', Auth::user()->id)
                    ->whereIn('role_id', [3,4])
                    ->where('status', 1)
                    ->get();

                $get_business_provider_ids = $get_business_provider->pluck('id');

                if(!$get_business_provider_ids->isEmpty()){
                    $get_business_provider_employee = DB::table('users')->select('id', 'name', 'username', 'email', 'role_id')
                        ->whereIn('parent_user_id', $get_business_provider_ids)
                        ->where('status', 1)
                        ->where(function($query) use($search_key){
                            $query->where('name', 'LIKE', "%{$search_key}%")
                                ->orWhere('username', 'LIKE', "%{$search_key}%")
                                ->orWhere('email', 'LIKE', "%{$search_key}%");
                        })
                        ->get();
                    $users_data = $users_data->merge($get_business_provider_employee);
                }

                if(!$users_data->isEmpty()){
                    $broker_employee = DB::table('users')->select('id', 'name', 'username', 'email', 'role_id', 'agent_user_id')
                        ->where('parent_user_id', $users_data[0]->parent_user_id)
                        ->where('status', 1)
                        ->where(function($query) use($search_key){
                            $query->where('name', 'LIKE', "%{$search_key}%")
                                ->orWhere('username', 'LIKE', "%{$search_key}%")
                                ->orWhere('email', 'LIKE', "%{$search_key}%");
                        })
                        ->get();
                    $users_data = $users_data->merge($broker_employee);
                }

            }elseif($role_id == 10 || $role_id == 9 || $role_id == 8){
                $users_data = DB::table('users')->select('id', 'name', 'username', 'email', 'role_id', 'agent_user_id')
                    ->where('id', Auth::user()->parent_user_id)
                    ->where('status', 1)
                    ->where(function($query) use($search_key){
                        $query->where('name', 'LIKE', "%{$search_key}%")
                            ->orWhere('username', 'LIKE', "%{$search_key}%")
                            ->orWhere('email', 'LIKE', "%{$search_key}%");
                    })
                    ->get();

                $admin_data = DB::table('users')->select('id', 'name', 'username', 'email', 'role_id')
                    ->where('role_id', 1)
                    ->where('status', 1)
                    ->where(function($query) use($search_key){
                        $query->where('name', 'LIKE', "%{$search_key}%")
                            ->orWhere('username', 'LIKE', "%{$search_key}%")
                            ->orWhere('email', 'LIKE', "%{$search_key}%");
                    })
                    ->get();

                $users_data = $users_data->merge($admin_data);

                if(!$users_data->isEmpty() && $role_id != 8){
                    $get_agent = DB::table('users')->select('id', 'name', 'username', 'email')
                    ->where('id', $users_data[0]->agent_user_id)
                    ->where('status', 1)
                    ->where(function($query) use($search_key){
                        $query->where('name', 'LIKE', "%{$search_key}%")
                            ->orWhere('username', 'LIKE', "%{$search_key}%")
                            ->orWhere('email', 'LIKE', "%{$search_key}%");
                    })
                    ->get();
                    $users_data = $users_data->merge($get_agent);
                }
            }else{
                $users_data = DB::table('users')->select('id', 'name', 'username', 'email')
                    ->where('status', 1)
                    ->where(function($query) use($search_key){
                        $query->where('name', 'LIKE', "%{$search_key}%")
                            ->orWhere('username', 'LIKE', "%{$search_key}%")
                            ->orWhere('email', 'LIKE', "%{$search_key}%");
                    })
                    ->get();
            }

            

            foreach($users_data as $user_data){
                //print_r($user_data);
                $user_name = $user_data->name ? $user_data->name : $user_data->username;

                $complete_name = $user_data->email.' <'.$user_name.'>';
                
                array_push($user_list, ['id' => encrypt($user_data->id), 'text' => $complete_name]);
            }

            return json_encode($user_list);
        }
    }
}
