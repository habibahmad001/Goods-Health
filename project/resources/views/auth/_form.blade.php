<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 3/11/2020
 * Time: 10:38 PM
 */


?>

<form method="POST" action="{{ route('login') }}" name="clogin-frm" id="clogin-frm" >
    @csrf
    <div class="frm-container">
        <center>
            @if(Session::has('error'))

                <strong style="color: red;font-size: 20px;">{{ Session::get('error') }}  </strong>

            @endif
        </center>
        <div class="frm-row">
            <label>User ID / Email</label>
            <input type="text" name="email" class="in @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="frm-row">
            <label>Password</label>
            <input  id="password" type="password" name="pass" class="in @error('password') is-invalid @enderror"  autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="frm-row">
            <input type="checkbox" name="remember"  id="remember" {{ old('remember') ? 'checked' : '' }}>
            <span class="remember">Remember Username/Password</span>
        </div>
        <div class="frm-row">
            <input type="submit" name="submit" value="LOGIN">
        </div>
        <div class="frm-row" id="frm-captcha">
            <div class="g-recaptcha" data-sitekey="6Le9keAUAAAAACIKZLzsssrWyFqqJVXTrVpzD2FJ"></div>
        </div>
        <div class="frm-row" id="frm-txt">


                    <label> <a href="#" class="login-frm-txt ">Forgot User ID / Password? </a></label>
                    <label> <a href="#" class="login-frm-txt">Signup here for an account.</a></label>


            {{--<span class="login-frm-txt">Forgot User ID / Password?</span>--}}
            {{--<span class="login-frm-txt"></span>--}}
        </div>
    </div>
</form>
