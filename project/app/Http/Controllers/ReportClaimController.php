<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReportClaimController extends Controller
{
    public function index($prefix){
    	$id = Auth::user()->id;

    	if($id > 0){
            $policies = DB::table('policies as p')
                        ->select('p.*', 'pc.*')
                        ->join('product_categories as pc','p.category_id','=','pc.id','LEFT')
                        ->where('p.user_id', $id)->get();
        }else{
            $policies;
        }

        return view('admin.modules.report-claim.index', compact('policies'));
    }
}
