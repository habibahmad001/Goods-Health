<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\MakeHeaderSeoTrait;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails, MakeHeaderSeoTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLinkRequestForm()
    {
        $data['landing_site']= "goodinsured";
        $data['title'] = $this->get_header_title($data['landing_site'], "Forget_password");
        return view('home.goodinsured.auth.forget-password', $data);
    }

    public function showHealthshopLinkRequestForm()
    {
        $data['landing_site']= "healthinsured";
        $data['title'] = $this->get_header_title($data['landing_site'], "Forget_password");
        return view('home.healthshop.auth.forget-password', $data);
    }

}
