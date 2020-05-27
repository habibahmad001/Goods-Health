<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 12/26/2019
 * Time: 1:29 AM
 */

?>

@extends('home.goodinsured.layouts.master')

@section('content')

    @php
    	if(!empty($user_type)){
    		$page = "auth.".$user_type."_login";
    	}else{
    		$page = "auth.login";
    	}
    @endphp

    @include($page)

@endsection

