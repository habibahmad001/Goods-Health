<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClaimManagementController extends Controller
{
    public function index($prefix){
        return view('admin.modules.claim-management.index');
    }
}
