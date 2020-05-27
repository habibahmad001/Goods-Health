<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 1/2/2020
 * Time: 1:42 AM
 */


$data = [
    'compare_title' => "Worker's Compensation"
]
?>

@extends('home.goodinsured.layouts.master', $data)

@section('content')


    <div class="main">
        <div class="container banner_con_worker page_header_banner">
            <div class="banner_title">
                <h3> WORKER’S COMPENSATION</h3><h3>
                    INSURANCE </h3>
            </div>
            <div class="banner_tag">
                <h3> Existing policyholder?</h3>
                <h3> <a href="#"> Access your account.</a></h3>
            </div>
        </div>


    @include('home.common.quote-search')

        <div class="wrapper">
            <div class="content-container">
                <p class="business-page-heading">
                    <img src="{{ asset('landing/goodinsured/img/site/sdfdf.png') }}" >
                    <span>WHAT IS WORKER’S COMPENSATION INSURANCE ?</span>
                </p>
                <p class="business-paragraph-conten-one">
                    Workers' compensation insurance is coverage for an employee's medical expenses, lost wages, and rehabilitation services that result from a workplace injury or illness. Workers' compensation insurance is known by many names from workman's compensation, workers' comp, workman's comp, and others. Regardless of the name it's state regulated and generally mandatory for many businesses. The GEICO Insurance Agency, Inc. has teamed up with companies to help your business get the coverage you need.
                </p>
                <p class="business-page-heading-two">
                    Workers' Compensation Insurance-Benefits For Employees
                </p>
                <p class="business-paragraph-conten-one">
                    Mandatory workers' compensation insurance is invaluable to both you and your employees. It can help cover medical bills and a portion of lost wages for employees that are injured or become ill due to work-related events. It can also help cover funeral expenses if the work-related event results in a death.
                </p>
                <p class="business-page-heading-two">
                    Workers' Comp-Benefits For Your Business
                </p>
                <p class="business-paragraph-conten-one">
                    Accidents happen, but workers' comp provides your business with a safety net that helps prepare you for the unexpected. In addition to helping cover medical bills and lost wages, the coverage may help with vocational rehabilitation services to assist getting your employee back to work. It can also help with legal costs in the event of a lawsuit.
                </p>
                <p class="business-page-heading-two">
                    What is covered in a Workers' Comp Policy?
                </p>
                <p class="business-paragraph-conten-one">
                    Workers' comp policies differ by where you operate but usually provide coverage for employees', owners' and officers' injuries or illness that occur due to their job duties. In general, a workers' compensation insurance policy covers:
                </p>
                <p class="business-paragraph-conten-two">
                    • Lost Wages<br />
                    • Medical Expenses<br />
                    • Rehabilitation Expenses<br />
                    • Death Benefits<br />
                </p>
                <p class="business-page-heading-two">
                    Check out more of our insurance products:
                </p>
                <div class="business-last-section">
                    <div>
                        <img src="{{ asset('landing/goodinsured/img/site/icon8.png') }}"  alt="">
                        <h3>Business Owners</h3>
                        <a href="javascript:void(0);">Read more...</a>
                    </div>
                    <div>
                        <img src="{{ asset('landing/goodinsured/img/site/pl.png') }}"  alt="">
                        <h3>Professional Liability</h3>
                        <a href="javascript:void(0);">Read more...</a>
                    </div>
                    <div>
                        <img src="{{ asset('landing/goodinsured/img/site/gl.png') }}"  alt="">
                        <h3>General Liability</h3>
                        <a href="javascript:void(0);">Read more...</a>
                    </div>
                    <div>
                        <img src="{{ asset('landing/goodinsured/img/site/icon6.png') }}"  alt="">
                        <h3>Commercial Auto</h3>
                        <a href="javascript:void(0);">Read more...</a>
                    </div>
                </div>
            </div>
        </div>


    </div>


@endsection