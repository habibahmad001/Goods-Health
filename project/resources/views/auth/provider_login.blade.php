<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 3/8/2020
 * Time: 2:41 AM
 */

?>

<div class="main">
    <div class="wrapper login">
        <div class="heading-section-login-customer">
            PROVIDER LOGIN
        </div>
        <div class="main-area-class">
            <img src="{{ asset('landing/login/provider.png') }}" style="width: 50%;" />
            <div class="area-class-right">

                @include('auth._form')
            </div>
        </div>
    </div>
</div>

