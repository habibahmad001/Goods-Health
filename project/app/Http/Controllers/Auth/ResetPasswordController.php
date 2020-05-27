<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    public function redirectTo(){
        
    // User role
        $role = Auth::user()->role_id; 
        
        // Check user role
        switch ($role) {
            case 1:
            return '/admin/index';
            break;

            case 2:
            return  '/customer/index';
            break;

            case 3:
            return '/business-user/index';
            break;

            case 4:
            return '/provider-user/index';
            break;

            case 5:
            return '/broker-agency-flat/index';
            break;

            case 6:
            return '/broker-agency-franchise/index';
            break;

            default:
            return '/login';
            break;
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
