<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
