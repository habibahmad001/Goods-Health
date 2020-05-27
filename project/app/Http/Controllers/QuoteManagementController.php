<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuoteManagementController extends Controller
{
    public function index($prefix){
        return view('admin.modules.quote-management.index');
    }
}
