<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Gufy\PdfToHtml\Pdf;

class FilesController extends Controller
{
    public function index($prefix){
        $roles = DB::table('roles')->get();

        return view('admin.modules.files.index', compact('roles'));
    }

    /*
    |--------------------------------------------------------------------------
    | function: get_file_section
    |--------------------------------------------------------------------------
    |
    | Load file section.
    |
    */

    public function get_file_section($prefix){
        $document_types = DB::table('document_types')->where('status', 1)->get();

    	return view('admin.common.section.files', compact('document_types'));
    }

    /*
    |--------------------------------------------------------------------------
    | function: get_file_list_datatables
    |--------------------------------------------------------------------------
    |
    | Used by datatables vendor to get the list of files.
    |
    */

    public function get_file_list_datatables($prefix, Request $request, $id, $type){
        $id = decrypt($id);

    	if ($request->ajax()) {
            $data = DB::table('file_requests as fr')->select('fr.*', 'dt.id as document_id', 'dt.document_name as document_name')
                        ->join('document_types as dt', 'fr.document_type_id', '=', 'dt.id', 'LEFT')
                        ->where([['fr.status', '>', 0], ['fr.user_id', $id], ['fr.request_type', $type]])->orderBy('id', 'desc');

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('input', function($data){
                            if($data->status == 1){
                                $status = "Activated";
                            }elseif($data->status == 2){
                                $status = "Deactivated";
                            }elseif($data->status == 3){
                                $status = "Pending";
                            }else{
                                $status = "Submitted";
                            }

                            $input = '<div class="input_radio"><input type="checkbox" name="requested_file_name" value="'.$data->id.'" data-desc="'.$data->description.'" data-date="'.$data->date.'" data-s_before="'.$data->submit_before.'" data-r_name="'.$data->requestor_name.'" data-status="'.$status.'" data-f_name="'.$data->file_name.'" data-status_id="'.$data->status.'" data-request_type="'.$data->request_type.'"/><label for="'.$data->id.'_radio" class="radio-label"></label></div>';
                            return $input;
                    })
                    ->editColumn('status', function ($data){
                            if($data->status == 1){
                                $status = "Activated";
                            }elseif($data->status == 2){
                                $status = "Deactivated";
                            }elseif($data->status == 3){
                                $status = "Pending";
                            }else{
                                $status = "Submitted";
                            }
                            return $status;
                    })
                    ->editColumn('date', function ($data){
                            return date('m/d/Y', strtotime($data->date));
                    })
                    ->editColumn('submit_before', function ($data){
                            return date('m/d/Y', strtotime($data->submit_before));
                    })
                    ->rawColumns(['input'])
                    ->make(true);
        }
    }

    public function get_archive_file_list_datatables($prefix, Request $request, $id){
        $id = decrypt($id);

        if ($request->ajax()) {
            $data = DB::table('archive_library as al')->select('al.*', 'dt.id as document_id', 'dt.document_name as document_name')
                        ->join('document_types as dt', 'al.document_type', '=', 'dt.id', 'LEFT')
                        ->where('al.user_id', $id)->where([['al.status', '>', 0]])->orderBy('al.id', 'desc');
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('input', function($data){
                            if($data->status == 1){
                                $status = "Activated";
                            }elseif($data->status == 2){
                                $status = "Deactivated";
                            }elseif($data->status == 3){
                                $status = "Pending";
                            }else{
                                $status = "Submitted";
                            }

                            $input = '<div class="input_radio"><input type="checkbox" name="requested_file_name" value="'.$data->id.'" data-desc="'.$data->description.'" data-status="'.$status.'" data-f_name="'.$data->file_name.'" data-status_id="'.$data->status.'" data-request_type="4"/><label for="'.$data->id.'_radio" class="radio-label"></label></div>';
                            return $input;
                    })
                    ->editColumn('status', function ($data){
                            if($data->status == 1){
                                $status = "Activated";
                            }elseif($data->status == 2){
                                $status = "Deactivated";
                            }
                            return $status;
                    })
                    ->editColumn('created_at', function ($data){
                            return date('m/d/Y h:i:s', strtotime($data->created_at));
                    })
                    ->rawColumns(['input'])
                    ->make(true);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | function: save_file_request_response
    |--------------------------------------------------------------------------
    |
    | Save file request & response data.
    |
    */

    public function save_file_request_response($prefix, Request $request){
    	if ($request->hasFile('images')) {
            $filesNameToStore = [];

            foreach ($request->file('images') as $image) {
                $path = public_path('uploads/'.decrypt($request->user_id).'/files');

                if(!File::isDirectory($path)){  
                    File::makeDirectory($path, 0777, true);
                }
            
                $fileNameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.date('Ymdhis').'.'.$extension;
            
                $image->storeAs('/uploads/'.decrypt($request->user_id).'/files/', $fileNameToStore, 'public');

                array_push($filesNameToStore, $fileNameToStore);
            }

            if(!empty($request->request_id)){
	            DB::table('file_requests')
	                    ->where('id', $request->request_id)
	                    ->update(
	                    [
	                        'status' => 'Submitted',
	                        'file_name' => json_encode($filesNameToStore, JSON_FORCE_OBJECT),
	                        'reply' => $request->description,
	                 
	                    ]
	                );

	            return response()->json(['status' => 'SUCCESS', 'mes' => 'Responce submitted successfully!']);
	        }else{
                    $status = $request->request_type == 3 ? 1 : 3; 
                    $file_name_to_save = $request->request_type == 3 ? $filesNameToStore[0] : json_encode($filesNameToStore, JSON_FORCE_OBJECT);
	                DB::table('file_requests')
	                    ->insertGetId(
	                    [
	                        'user_id' => decrypt($request->user_id),
	                        'document_type_id' => $request->document_type,
	                        'request_type' => $request->request_type,
	                        'description' => $request->description,
	                        'date' => date('Y-m-d'),
	                        'submit_before' => date('Y-m-d', strtotime($request->submit_before)),
	                        'requestor_name' => Auth::user()->name,
	                        'file_name' => $file_name_to_save,
	                        'created_at' => date('Y-m-d h:i:s'),
                            'status' => $status
	                    ]
	                );

                if($request->request_type == 2){
                    return response()->json(['status' => 'SUCCESS', 'mes' => 'Attachment submitted successfully!']);
                }else{
                    return response()->json(['status' => 'SUCCESS', 'mes' => 'Request submitted successfully!']);
                }
	        }
        }else{
        	return response()->json(['status' => 'ERROR', 'mes' => 'Please select a document file!']);
        }
    }

    public function get_files_list($prefix, $user_id, $request_id){
        $user_id = decrypt($user_id);

        $data = DB::table('file_requests')->where('id', $request_id)->where('user_id', $user_id)->first();

        return view('admin.common.elements.file_list', compact('data'));
    }

    public function change_file_request_status($prefix, $user_id, $request_id, $type, $request_type, $status){
        $user_id = decrypt($user_id);
        $status = decrypt($status);
        $type = decrypt($type);

        if($type == 'archive'){
            $table = 'archive_library';
        }else{
            $table = 'file_requests';
        }
 
        DB::table($table)
                        ->where('id', $request_id)
                        ->where('user_id', $user_id)
                        ->update(
                        [
                            'status' => $status,
                        ]
                    );

        if($request_type == 1){
            $mes_text = 'Request';
        }elseif($request_type == 2){
            $mes_text = 'Attachment';
        }elseif($request_type == 3){
            $mes_text = 'Personal File';
        }else{
            $mes_text = 'Archive File';
        }

        if($status == 0){
            $mes = $mes_text." deleted successfully.";
        }elseif($status == 1){
            $mes = $mes_text." activated successfully.";
        }else{
            $mes = $mes_text." deactivated successfully.";
        }

        return response()->json(['status' => 'SUCCESS', 'mes' => $mes]);
    }

    public function set_file_as_request_attachment($prefix, $user_id, $request_id, $type){
        $user_id = decrypt($user_id);
        $type = decrypt($type);

        $get_personal_lib = DB::table('file_requests')->where('id', $request_id)->where('user_id', $user_id)->where('request_type', 3)->first();

        $exist = DB::table('file_requests')->where('document_type_id', $get_personal_lib->document_type_id)->where('file_name', $get_personal_lib->file_name)->where('request_type', $type)->exists();

        if($exist){
            if($type == 1){
                $mes = "File already exist in Request.";
            }else{
                $mes = "File already exist in Attachment.";
            }
            return response()->json(['status' => 'SUCCESS', 'mes' => $mes]);
        }else{
            DB::table('file_requests')
                        ->insertGetId(
                        [
                            'user_id' => $get_personal_lib->user_id,
                            'document_type_id' => $get_personal_lib->document_type_id,
                            'request_type' => $type,
                            'description' => $get_personal_lib->description,
                            'date' => date('Y-m-d'),
                            'submit_before' => date('Y-m-d', strtotime('+30 days', strtotime(date('Y-m-d')))),
                            'requestor_name' => $get_personal_lib->requestor_name,
                            'file_name' => $get_personal_lib->file_name,
                            'created_at' => date('Y-m-d h:i:s'),
                        ]
                    );

            if($type == 1){
                $mes = "File has been set as a Request.";
            }else{
                $mes = "File has been set as a Attachment.";
            }
            return response()->json(['status' => 'SUCCESS', 'mes' => $mes]);
        }
    }

    public function edit_archive_library_file($prefix, $user_id, $request_id, $type){
        $user_id = decrypt($user_id);
        $type = decrypt($type);

        $get_archive_file = DB::table('archive_library')->where('id', $request_id)->first();

        $path = public_path('uploads/library/'.$get_archive_file->file_name);

        if(File::exists($path)){
            $file = File::get($path);

            $pdf = new Pdf($path);

            $pdf_html = '';

            for($i = 1; $i <= $pdf->getPages(); $i++){
                $pdf_html .= $pdf->html($i);
            }

            return response()->json(['status' => 'SUCCESS', 'data' => $pdf_html]);
        }else{
            return response()->json(['status' => 'ERROR', 'mes' => "File does not exist into the system."]);
        }
    }

    public function insert_pdf_meta_data_into_db($prefix){
        $path = public_path('uploads/library');

        $files_data = File::files($path);

        $i_f = $f_f = 0;

        foreach($files_data as $f_key => $f_value){
            if(DB::table('archive_library')->where('file_name', $f_value->getFileName())->exists()){
                $f_f++;
            }else{
                
                DB::table('archive_library')
                        ->insertGetId(
                        [
                            'user_id' => 1,
                            'file_name' => $f_value->getFilename(),
                            'document_type' => 11,
                            'description' => $f_value->getFilename(),
                            'file_type' => $f_value->getExtension(),
                            'file_size' => $f_value->getSize(),
                        ]
                    );

                $i_f++;
            }
        }

        echo $i_f." file's meta data successfully inserted into database. $f_f files already exists.";
        exit;
    }
}
