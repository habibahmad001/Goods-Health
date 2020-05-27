<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinessTimesheetController extends Controller
{
    public function index($prefix){
        return view('admin.modules.business-timesheet.index');
    }
}
