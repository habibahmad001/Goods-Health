<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteManagementController extends Controller
{
    public function index($prefix){
        return view('admin.modules.site-management.index');
    }
}
