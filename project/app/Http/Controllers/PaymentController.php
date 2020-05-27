<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($prefix){
        return view('admin.modules.payment.index');
    }
}
