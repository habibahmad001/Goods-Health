<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class ProductManagementController extends Controller
{
    public function product_management_show($prefix, $type){
    	$product_type = DB::table('product_categories')->where('status', 1)->get();

    	return view('admin.modules.product-management.index', compact('type', 'product_type'));
    }

    public function carrier_product_list_datatables($prefix, Request $request){
        if ($request->ajax()) {
            $condition = [['cpd.status', '>', 0]];


	        if(isset($_GET['state']) && !empty($_GET['state'])){
	            array_push($condition, ['cpd.state', '=', $_GET['state']]);
	        }

	        if(isset($_GET['city_id']) && !empty($_GET['city_id'])){
	            array_push($condition, ['cpd.city_id', '=', $_GET['city_id']]);
	        }

	        if(isset($_GET['zipcode']) && !empty($_GET['zipcode'])){
	            array_push($condition, ['cpd.zipcode', '=', $_GET['zipcode']]);
	        }

	        if(isset($_GET['carrier_id']) && !empty($_GET['carrier_id'])){
	            array_push($condition, ['cpd.carrier_id', '=', $_GET['carrier_id']]);
	        }

	        if(isset($_GET['category_id']) && !empty($_GET['category_id'])){
	            array_push($condition, ['cpd.category_id', '=', $_GET['category_id']]);
	        }

            $data = DB::table('carrier_product_details as cpd')->select('cpd.id as id', 'cpd.product_name as product_name', 'cpd.zipcode as zipcode', 'cpd.county as county', 'cpd.status as status', 'c.city as c_city', 's.state as s_state', 'pc.category_name as category_name', 'cd.carrier_id as carrier_id', 'cd.carrier_name as carrier_name')

                    ->join('cities as c', 'cpd.city_id', '=','c.id','LEFT')
                    ->join('states as s', 'cpd.state', '=','s.state_code','LEFT')
                    ->join('product_categories as pc', 'cpd.category_id', '=','pc.id','LEFT')
                    ->join('carrier_details as cd', 'cpd.carrier_id', '=','cd.id','LEFT')
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
                            }else{
                                $status = "In-active";
                            }
                            return $status;
                    })
	                ->rawColumns(['input'])
	                ->make(true);
	    }
    }

    public function product_add($prefix){
        $product_type = DB::table('product_categories')->where('status', 1)->get();

        return view('admin.modules.product-management.section.add', compact('product_type'));
    }

    public function product_edit($prefix, $id, $type){
        $id = decrypt($id);
        $type = decrypt($type);

        $product_type = DB::table('product_categories')->where('status', 1)->get();

        $carrier_product = DB::table('carrier_product_details as cpd')->select('cpd.*', 'cd.carrier_name as carrier_name', 'cd.carrier_address as carrier_address', 'cd.carrier_zipcode as carrier_zipcode', 'cd.carrier_phone as carrier_phone', 'cd.carrier_email as carrier_email', 'cd.carrier_website as carrier_website', 'cd.carrier_hotline as carrier_hotline', 'cd.carrier_logo as carrier_logo', 'c.city as c_city', 's.state as s_state')

                    ->join('carrier_details as cd', 'cpd.carrier_id', '=','cd.id','LEFT')
                    ->join('cities as c', 'cd.carrier_city', '=','c.id','LEFT')
                    ->join('states as s', 'cd.carrier_state', '=','s.state_code','LEFT')
                    ->where('cpd.id', $id)
                    ->first();

        $cities = DB::table('cities')->select('id', 'city')->where('state_code', $carrier_product->state)->orderBy('city', 'asc')->get();
        $zipcodes = DB::table('zip_codes')->select('id', 'zipcode')->where('city_id', $carrier_product->city_id)->orderBy('zipcode', 'asc')->get();

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
                    ->where('state', $carrier_product->state)
                    ->where('city_id', $carrier_product->city_id)
                    ->where('zipcode', $carrier_product->zipcode)
                    ->groupBy('carrier_id')
                    ->pluck('carrier_id');


        if($carrier_locations->isNotEmpty()){
            $carriers = DB::table('carrier_details')->select('id', 'carrier_id', 'carrier_name')
                            ->where([['status', '>', 0]])
                            ->whereIn('id', $carrier_locations->toArray())
                            ->get();
        }else{
            $carriers = collect();
        }

        return view('admin.modules.product-management.section.edit', compact('type', 'carrier_product', 'cities', 'zipcodes', 'product_type', 'carriers'));
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
    public function product_management_edit($prefix, $id, $type){
        $id = decrypt($id);
        $type = decrypt($type);

        $carrier_product = DB::table('carrier_product_details as cpd')->select('cpd.*', 'cd.carrier_name as carrier_name', 'cd.carrier_address as carrier_address', 'cd.carrier_zipcode as carrier_zipcode', 'cd.carrier_phone as carrier_phone', 'cd.carrier_email as carrier_email', 'cd.carrier_website as carrier_website', 'cd.carrier_hotline as carrier_hotline', 'cd.carrier_logo as carrier_logo', 'c.city as c_city', 's.state as s_state')

                    ->join('cities as c', 'cpd.city_id', '=','c.id','LEFT')
                    ->join('states as s', 'cpd.state', '=','s.state_code','LEFT')
                    ->join('carrier_details as cd', 'cpd.carrier_id', '=','cd.id','LEFT')
                    ->where('cpd.id', $id)
                    ->first();

        $get_benefit_option_sections = DB::table('benefit_question_section_transactions as bqst')->select('bqst.id as t_id', 'bqs.*')
                                            ->leftjoin('benefit_question_sections as bqs', function ($join) {
                                                $join->on('bqst.benefit_question_section_id', '=', 'bqs.id')->where('bqs.status', 1);
                                            })
                                            ->where('bqst.category_id', $carrier_product->category_id)->get();

        $get_benefit_questions = DB::table('benefit_question_transactions as bqt')->select('bqt.id as t_id', 'bq.*', DB::raw('GROUP_CONCAT(bo.option_text  SEPARATOR "@-@") as option_text'))
                                            ->leftjoin('benefit_questions as bq', function ($join) {
                                                $join->on('bqt.benefit_question_id', '=', 'bq.id')->where('bq.status', 1);
                                            })
                                            ->leftjoin('benefit_options as bo', function ($join) {
                                                $join->on('bq.id', '=', 'bo.question_id')->where('bo.status', 1);
                                            })
                                            ->groupBy('t_id')
                                            ->where('bqt.category_id', $carrier_product->category_id)
                                            ->where(function($query) use($carrier_product){
                                                $query->where('bqt.product_id', $carrier_product->id)
                                                ->orWhere('bqt.product_id', 0);
                                            })
                                            ->get();

        return view('admin.modules.product-management.section.edit', compact('carrier_product', 'type', 'get_benefit_option_sections', 'get_benefit_questions'));
    }

    public function destroy($prefix, Request $request){
        $id = decrypt($request->carrier_mgmt_id);

        DB::table('carrier_product_details')->where('id', $id)->update(['status' => 0]);

        $msg = ['status' => 'SUCCESS', 'mes' => 'Product deleted successfully!'];
        return Response()->json($msg);
    }

    public function store($prefix, Request $request){
        $this->validate($request,[
            'carrier_id'=>['required','string'],
            'category_id'=>['required','string'],
            'state'=>['required','string'],
            'city'=>['required','string'],
            'zipcode'=>['required','string'],
            'county'=>['required','string'],
            'product_name'=>['required','string'],
            'product_description'=>['required','string'],
            'price_1'=>['required'],
            'price_2'=>['required'],
            'price_3'=>['required'],
            'price_4'=>['required'],
        ]);

        $id = DB::table('carrier_product_details')->insert([
            'carrier_id' => $request->carrier_id,
            'category_id' => $request->category_id,
            'state' => $request->state,
            'city_id' => $request->city,
            'zipcode' => $request->zipcode,
            'county' => $request->county,
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'price_1' => $request->price_1,
            'price_2' => $request->price_2,
            'price_3' => $request->price_3,
            'price_4' => $request->price_4,
            'status' => $request->status,
            'added_by' => Auth::user()->id,
        ]);

        if($id){ 
            $msg = ['status' => 'SUCCESS', 'mes' => 'Carrier product added successfully!', 'id' => $id];
        }else{
            $msg = ['status' => 'ERROR', 'mes' => 'Something went wrong! Please try again later.', 'id' => $id];
        }

        return Response()->json($msg);
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SiteUser  $siteUser
     * @return \Illuminate\Http\Response
     */
    public function update($prefix, Request $request){
        $this->validate($request,[
            'carrier_id'=>['required','string'],
            'category_id'=>['required','string'],
            'state'=>['required','string'],
            'city'=>['required','string'],
            'zipcode'=>['required','string'],
            'county'=>['required','string'],
            'product_name'=>['required','string'],
            'product_description'=>['required','string'],
            'price_1'=>['required'],
            'price_2'=>['required'],
            'price_3'=>['required'],
            'price_4'=>['required'],
        ]);
        
        $id = decrypt($request->id);
        
        DB::table('carrier_product_details')->where('id', $id)->update([
            'carrier_id' => $request->carrier_id,
            'category_id' => $request->category_id,
            'state' => $request->state,
            'city_id' => $request->city,
            'zipcode' => $request->zipcode,
            'county' => $request->county,
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'price_1' => $request->price_1,
            'price_2' => $request->price_2,
            'price_3' => $request->price_3,
            'price_4' => $request->price_4,
            'status' => $request->status,
        ]);

        if($id){ 
            $msg = ['status' => 'SUCCESS', 'mes' => 'Carrier product updated successfully!', 'id' => $id];
        }else{
            $msg = ['status' => 'ERROR', 'mes' => 'Something went wrong! Please try again later.', 'id' => $id];
        }

        return Response()->json($msg); 
    }

    public function product_management_save_field_option($prefix, Request $request){
        $product_id = decrypt($request->product_id);

        $question_id = DB::table('benefit_questions')->insertGetId([
            'question_text' => $request->question_text,
            'is_custom_question_status' => 1,
            'section_ids' => json_encode([$request->benefit_question_section_id], JSON_FORCE_OBJECT),
            'question_input_type' => $request->input_field,
            'added_by_user_id' => Auth::user()->id,
        ]);

        if(!empty($request->option) && count($request->option) > 0 && !in_array($request->input_field, ['text', 'number', 'calendar'])){
            foreach ($request->option as $opt) {
                $option_id = DB::table('benefit_options')->insert([
                    'question_id' => $question_id,
                    'option_text' => $opt
                ]);
            }
        }
        
        DB::table('benefit_question_transactions')->insert([
            'category_id' => $request->category_id,
            'product_id' => $product_id,
            'benefit_question_id' => $question_id
        ]);

        $carrier_product = collect();
        $carrier_product->category_id = $request->category_id;

        $get_benefit_option_sections = DB::table('benefit_question_section_transactions as bqst')->select('bqst.id as t_id', 'bqs.*')
                                            ->leftjoin('benefit_question_sections as bqs', function ($join) {
                                                $join->on('bqst.benefit_question_section_id', '=', 'bqs.id')->where('bqs.status', 1);
                                            })
                                            ->where('bqst.category_id', $request->category_id)->get();

        $get_benefit_questions = DB::table('benefit_question_transactions as bqt')->select('bqt.id as t_id', 'bq.*', DB::raw('GROUP_CONCAT(bo.option_text  SEPARATOR "@-@") as option_text'))
                                            ->leftjoin('benefit_questions as bq', function ($join) {
                                                $join->on('bqt.benefit_question_id', '=', 'bq.id')->where('bq.status', 1);
                                            })
                                            ->leftjoin('benefit_options as bo', function ($join) {
                                                $join->on('bq.id', '=', 'bo.question_id')->where('bo.status', 1);
                                            })
                                            ->groupBy('t_id')
                                            ->where('bqt.category_id', $request->category_id)
                                            ->where(function($query) use($product_id){
                                                $query->where('bqt.product_id', $product_id)
                                                ->orWhere('bqt.product_id', 0);
                                            })
                                            ->get();

        return view('admin.common.elements.benefit_option_details', compact('carrier_product', 'get_benefit_option_sections', 'get_benefit_questions'));
    }
}
