<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageManagementController extends Controller
{
    public function index($prefix){
        return view('admin.modules.page-management.index');
    }
}
