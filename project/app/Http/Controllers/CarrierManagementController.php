<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class CarrierManagementController extends Controller
{
    public function carrier_management_show($prefix, $type){
    	$product_type = collect();
    	if($type == 'products'){
    		$product_type = DB::table('product_categories')->where('status', 1)->get();
    	}
    	return view('admin.modules.carrier-management.index', compact('type', 'product_type'));
    }

    public function carrier_management_list_datatables($prefix, Request $request){
    	if ($request->ajax()) {

            $condition = [['cd.status', '>', 0]];

	        if(isset($request->state) && !empty($request->state)){
	            array_push($condition, ['cd.carrier_state', '=', $request->state]);
	        }

	        if(isset($request->city_id) && !empty($request->city_id)){
	            array_push($condition, ['cd.carrier_city', '=', $request->city_id]);
	        }

	        if(isset($request->zipcode) && !empty($request->zipcode)){
	            array_push($condition, ['cd.carrier_zipcode', '=', $request->zipcode]);
	        }

            $data = DB::table('carrier_details as cd')->select('cd.*', 'c.city as c_city', 's.state as s_state')

                    ->join('cities as c', 'cd.carrier_city', '=','c.id','LEFT')
                    ->join('states as s', 'cd.carrier_state', '=','s.state_code','LEFT')
                    ->where($condition);
          
	        return Datatables::of($data)
	                ->addIndexColumn()
	                ->addColumn('input', function($data){
                            $input = '<div class="input_radio"><input id="'.$data->id.'_radio" type="radio" name="selectedradio" value="'.encrypt($data->id).'"><label for="'.$data->id.'_radio" class="radio-label"></label></div>';

	                        return $input;
	                })
	                ->editColumn('status', function ($data){
                            if($data->status == 1){
                                $status = "Active";
                            }elseif($data->status == 2){
                                $status = "In-active";
                            }else{
                                $status = "Down";
                            }
                            return $status;
                    })
	                ->rawColumns(['input'])
	                ->make(true);
	    }
    }

    public function carrier_add($prefix){
        $get_carrier = DB::table('carrier_details')->select('id')->orderBy('id','DESC')->first();

        if($get_carrier->id > 0){
            $carrier_id = str_pad($get_carrier->id + 1, 6, 0, STR_PAD_LEFT);
        }else{
            $carrier_id = '000001';
        }
    
        return view('admin.modules.carrier-management.section.add', compact('carrier_id'));
    }

    public function carrier_edit($prefix, $id){
        $id = decrypt($id);

        $carrier_detail = DB::table('carrier_details')->where('id', $id)->first();

        $cities = DB::table('cities')->select('id', 'city')->where('state_code', $carrier_detail->carrier_state)->orderBy('city', 'asc')->get();
        $zipcodes = DB::table('zip_codes')->select('id', 'zipcode')->where('city_id', $carrier_detail->carrier_city)->orderBy('zipcode', 'asc')->get();

        $carrier_locations = DB::table('carrier_locations')->where('carrier_id', $carrier_detail->id)->get();

        $get_states = $carrier_locations->pluck('state');
        $get_cities = $carrier_locations->pluck('city_id');
        $get_zipcodes = $carrier_locations->pluck('zipcode');
        $get_counties = $carrier_locations->pluck('county');

        $multiple_cities = DB::table('cities')->select('id','city as text')->whereIn('state_code', $get_states)->orderBy('city', 'asc')->get();
        $multiple_zipcodes = DB::table('zip_codes')->select('id', 'zipcode as text')->whereIn('city_id', $get_cities)->orderBy('zipcode', 'asc')->get();
        $multiple_county = DB::table('county')->select('id','county as text')->whereIn('zip_code', $get_zipcodes)->orderBy('county', 'asc')->get();

        return view('admin.modules.carrier-management.section.edit', compact('carrier_detail', 'cities', 'zipcodes', 'get_states', 'get_cities', 'get_zipcodes', 'get_counties', 'multiple_cities', 'multiple_zipcodes', 'multiple_county'));
    }

    public function store($prefix, Request $request){
        $this->validate($request, [
            'carrier_id'=>['required','string'],
            'carrier_name'=>['required','string'],
            'carrier_address'=>['required','string'],
            'carrier_state'=>['required'],
            'carrier_city'=>['required','string'],
            'carrier_zipcode'=>['required','string'],
            'phone_number'=>['required'],
            'email'=>['required','string','email'],
            'carrier_website'=>['required','string'],
            'carrier_hotline'=>['required','string'],
        ]);

        $id = DB::table('carrier_details')->insertGetId([
            'carrier_id' => $request->carrier_id,
            'carrier_name' => $request->carrier_name,
            'carrier_address' => $request->carrier_address,
            'carrier_state' => $request->carrier_state,
            'carrier_city' => $request->carrier_city,
            'carrier_zipcode' => $request->carrier_zipcode,
            'carrier_phone' => $request->phone_number,
            'carrier_email' => $request->email,
            'carrier_website' => $request->carrier_website,
            'carrier_hotline' => $request->carrier_hotline,
            'status' => $request->status,
            'added_by' => Auth::user()->id,
        ]);

        if ($request->hasFile('image')) {
            $path = public_path('uploads/carrier/'.$id.'/logo');

            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777,true);
            }
        
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $request->file('image')->storeAs('uploads/carrier/'.$id.'/logo', $fileNameToStore,'public');

            DB::table('carrier_details')->where('id', $id)->update(['carrier_logo' => $fileNameToStore]); 
        }  

        if(!empty($request->zipcode) && count($request->zipcode)){
            foreach($request->zipcode as $z_key => $z_value){
                $city = DB::table('zip_codes')->select('city_id')->where('zipcode', $z_value)->first();
                $state = DB::table('cities')->select('state_code')->where('id', $city->city_id)->first();
                $county = DB::table('county')->select('county')->where('zip_code', $z_value)->first();

                DB::table('carrier_locations')->insert([
                    'carrier_id' => $id,
                    'state' => $state->state_code,
                    'city_id' => $city->city_id,
                    'zipcode' => $z_value,
                    'county' => $county->county
                ]);
            }
        }

        if($id){ 
            $msg = ['status' => 'SUCCESS', 'mes' => 'Carrier added successfully!', 'id' => $id];
        }else{
            $msg = ['status' => 'ERROR', 'mes' => 'Something went wrong! Please try again later.', 'id' => $id];
        }

        return Response()->json($msg);
    }

    public function update($prefix, Request $request){
        $this->validate($request,[
            'carrier_id'=>['required','string'],
            'carrier_name'=>['required','string'],
            'carrier_address'=>['required','string'],
            'carrier_state'=>['required'],
            'carrier_city'=>['required','string'],
            'carrier_zipcode'=>['required','string'],
            'phone_number'=>['required'],
            'email'=>['required','string','email'],
            'carrier_website'=>['required','string'],
            'carrier_hotline'=>['required','string'],
        ]);
        
        $id = decrypt($request->id);
        
        $data = DB::table('carrier_details')->where('id', $id)->update([
                'carrier_name' => $request->carrier_name,
                'carrier_address' => $request->carrier_address,
                'carrier_state' => $request->carrier_state,
                'carrier_city' => $request->carrier_city,
                'carrier_zipcode' => $request->carrier_zipcode,
                'carrier_phone' => $request->phone_number,
                'carrier_email' => $request->email,
                'carrier_website' => $request->carrier_website,
                'carrier_hotline' => $request->carrier_hotline,
                'status' => $request->status
        ]);

        if ($request->hasFile('image')) {
            $path = public_path('uploads/carrier/'.$id.'/logo');

            if(!File::isDirectory($path)){ 
                File::makeDirectory($path, 0777,true);
            }
        
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $request->file('image')->storeAs('uploads/carrier/'.$id.'/logo', $fileNameToStore, 'public');

            DB::table('carrier_details')->where('id', $id)->update(['carrier_logo' => $fileNameToStore]); 
        }  

        if(!empty($request->zipcode) && count($request->zipcode)){
            DB::table('carrier_locations')->where('carrier_id', $id)->delete();
            
            foreach($request->zipcode as $z_key => $z_value){
                $city_ids = DB::table('zip_codes')->select('city_id')->where('zipcode', $z_value)->first();
                $state_ids = DB::table('cities')->select('state_code')->where('id', $city_ids->city_id)->first();
                $county_ids = DB::table('county')->select('county')->where('zip_code', $z_value)->first();

                DB::table('carrier_locations')->insert([
                    'carrier_id' => $id,
                    'state' => $state_ids->state_code,
                    'city_id' => $city_ids->city_id,
                    'zipcode' => $z_value,
                    'county' => $county_ids->county
                ]);
            }
        }

        if($id){ 
            $msg = ['status' => 'SUCCESS', 'mes' => 'Carrier updated successfully!', 'id' => $id];
        }else{
            $msg = ['status' => 'ERROR', 'mes' => 'Something went wrong! Please try again later.', 'id' => $id];
        }

        return Response()->json($msg);
    }

    public function destroy($prefix, Request $request){
        $id = decrypt($request->carrier_mgmt_id);

        DB::table('carrier_details')->where('id', $id)->update(['status' => 0]);

        $msg = ['status' => 'SUCCESS', 'mes' => 'Carrier deleted successfully!'];
        return Response()->json($msg);
    }
}
