<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DirectoryController extends Controller
{
    public function index($prefix){
    	$role_id = Auth::user()->role_id;

    	if(in_array($role_id, [3, 4, 5, 1])){
            $get_employee_role = DB::table('roles')->where('parent_role_id', $role_id)->first();
        }else{
            $get_employee_role = [];
        }

        return view('admin.modules.directory.index', compact('get_employee_role'));
    }
}
