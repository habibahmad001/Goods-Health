<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function index($prefix){
        return view('admin.modules.tickets.index');
    }
}
