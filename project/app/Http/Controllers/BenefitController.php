<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BenefitController extends Controller
{
    public function index($prefix){

    	$id = Auth::user()->id;

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

        return view('admin.modules.benefits.index', compact('policies'));
    }
}
