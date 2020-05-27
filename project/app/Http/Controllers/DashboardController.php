<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index($prefix){
        return view('admin.modules.dashboard.index');
    }
}
