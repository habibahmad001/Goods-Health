<?php

namespace App\Http\Controllers;
error_reporting(0);
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InsuranceOptionsController extends Controller
{
    public function index($prefix){        
        $policies = DB::table('product_categories as pc')
                            ->select('lwp.category_id', 'pc.category_name as category_name', 'pc.id as cat_id')
                            ->join('location_wise_policies as lwp', 'pc.id', '=', 'lwp.category_id', 'LEFT')
                            ->where('lwp.state_code', Auth::user()->state)
                            ->where('lwp.city_id', Auth::user()->city)
                            ->where('lwp.zipcode', Auth::user()->zipcode)
                            ->groupBy('lwp.category_id')
                            ->groupBy('pc.category_name')
                            ->get();

        if(Auth::user()->id > 0){
            $assigned_products = DB::table('access_to_products')->select('product_category_id')->where('user_id', Auth::user()->id)->get();
        }else{
            $assigned_products = array();
        }

        return view('admin.modules.insurance-option.index', compact(['insurance_options','policies', 'assigned_products']));
    }
}
