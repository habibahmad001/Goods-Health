<?php

namespace App\Http\Controllers;

use App\SiteUser;
use App\Roles;
use Mail;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function show()
    {
    	return view('change-password');
    }

    public function changePassword(Request $request)
    {
    	$this->validate($request,[
            'curr_password'=>['required','string'],
            'password'=>['required','string','min:8','max:16','confirmed']
        ]);
       
       	$current_password = Auth::User()->password;           
		if(Hash::check($request->curr_password, $current_password))
		{ 
            
            $user = SiteUser::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            $this->guard()->logout();
            return redirect()->route('login')->with('success','Password Updated Successfully.Login with your new password...');
        }else
        {
            return redirect()->route('password.show')->with('error','Wrong Current Password...');
        }  
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
