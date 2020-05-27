<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentBrokerCenterController extends Controller
{
    public function index($prefix){
        return view('admin.modules.agent-broker-center.index');
    }
}
