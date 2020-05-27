<?php
/**
 * Created by PhpStorm.
 * User: Mobarok Hossen
 * Date: 23-Dec-19
 * Time: 3:52 PM
 */
?>
    <!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <meta name="viewport" content="width=1000"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="IE=Edge">
    <meta name="description" content="Page Description" />
    <!-- Chrome, Firefox OS, Opera and Vivaldi -->
    <meta name="theme-color" content="#000">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#000">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">
    <title>{{ isset($title) ? $title : "" }}</title>
    <link rel="icon" type="image/ico" href="images/favicon.ico" />
    @include('home.goodinsured.partials.styles')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>


<body class="goods_insured">


    @include('home.goodinsured.partials.header')

        @yield('content')

    @include('home.goodinsured.partials.footer')

    @include('home.goodinsured.partials.scripts')

</body>

</html>

