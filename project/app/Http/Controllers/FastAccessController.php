<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FastAccessController extends Controller
{
    public function index($prefix){
        return view('admin.modules.fast-access.index');
    }
}
