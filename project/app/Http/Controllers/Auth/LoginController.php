<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\MakeHeaderSeoTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, MakeHeaderSeoTrait;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */


    //protected $redirectTo = '/';
    public function redirectTo(){
        
        if(Auth::check()){
            return '/'.Auth::user()->role->role_slug.'/dashboard';
        }else{
            return '/login';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required',
            'password' => 'required',
        ]);

        $login_type = filter_var($request->email, FILTER_VALIDATE_EMAIL ) 
            ? 'email' 
            : 'username';

        $request->merge([
            $login_type => $request->email
        ]);

        if (Auth::attempt($request->only($login_type, 'password'))) {
            
            return redirect()->intended($this->redirectPath());
        }



        return redirect()->back()
            ->withInput()
            ->withErrors([
                'login' => 'These credentials do not match our records.',
            ]);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('login');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showGoodinsuredLoginForm($user)
    {
        $data['landing_site']= "goodinsured";
        $data['user_type'] = strtolower($user);
        $data['title'] = $this->get_header_title($data['landing_site'], "login");
        return view('home.goodinsured.auth.login', $data);
    }
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showHealthshopLoginForm($user)
    {
        $data['landing_site']= "healthinsured";
        $data['user_type'] = strtolower($user);
        $data['title'] = $this->get_header_title($data['landing_site'], "login");
        return view('home.healthshop.auth.login', $data);
    }
}
