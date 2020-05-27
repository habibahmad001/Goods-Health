<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 3/8/2020
 * Time: 12:30 AM
 */

?>

<div class="main">
    <div class="wrapper login">
        <div class="heading-section-login-customer">
            BUSINESS LOGIN
        </div>
        <div class="main-area-class">
            <img src="{{ asset('landing/login/business.png') }}" style="width: 50%;" />
            <div class="area-class-right">

                @include('auth._form')
            </div>
        </div>
    </div>
</div>
