<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCenterController extends Controller
{
    public function index($prefix){
        return view('admin.modules.admin-center.index');
    }
}
