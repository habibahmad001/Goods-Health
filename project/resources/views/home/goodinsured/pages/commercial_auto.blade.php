<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 1/2/2020
 * Time: 1:44 AM
 */

$data = [
    'compare_title' => "Commercial Auto"
]
?>

@extends('home.goodinsured.layouts.master', $data)

@section('content')


    <div class="main">
        <div class="container banner_con_commercial page_header_banner">
            <div class="banner_title">
                <h3> COMMERCIAL AUTO</h3><h3>
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
                    <img src="{{ asset('landing/goodinsured/img/site/bus.png') }}" >
                    <span>WHAT IS COMMERCIAL AUTO INSURANCE?</span>
                </p>
                <p class="business-paragraph-conten-one">
                    In the event of an auto accident or loss, Commercial auto insurance covers vehicles used by your business for:
                </p>
                <p class="commercial-second">
                    Damage to your vehicle(s)<br />
                    Driver injury<br />
                    Injury to someone else<br />
                    Damage to someone else's property<br />
                    Commercial auto policies tend to have higher coverage limits than personal policies, because business vehicles<br /> need more protection in case of accidents.<br />
                </p>
                <p class="business-page-heading-two">
                    What vehicles are covered by commercial auto insurance?
                </p>
                <p class="business-paragraph-conten-one">
                    These types of vehicles may be covered if they're used for business purposes:
                </p>
                <p class="business-paragraph-conten-two">
                    • Cars<br />
                    • Vans<br />
                    • Pickup trucks<br />
                    • Box trucks<br />
                    • Service utility trucks<br />
                    • Food trucks<br />
                </p>
            </div>
        </div>

        <div class="gray-color padding-bottom-1">
            <div class="content-container">
                <p class="business-page-heading-two">
                    Who needs commercial auto insurance?
                </p>
                <p class="business-paragraph-conten-one">
                    If you or your employees use your vehicle as part of your business, you should have a commercial auto policy. We often cover vehicles used by:
                </p>
                <p class="gray-section-bollits">
                    • Electricians, plumbers, and HVAC professionals<br />
                    • Carpenters, painters, and other contractors<br />
                    • Landscapers and plow services<br />
                    • Caterers and food vendors<br />
                    • Other business types, like real estate and sales<br />
                </p>
            </div>
        </div>


        <div class="wrapper">
            <div class="content-container">
                <p class="business-page-heading-two margin-top-0">
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
                        <img src="{{ asset('landing/goodinsured/img/site/sdfdf.png') }}"  alt="">
                        <h3>Worker’s Compensation</h3>
                        <a href="javascript:void(0);">Read more...</a>
                    </div>
                    <div>
                        <img src="{{ asset('landing/goodinsured/img/site/gl.png') }}"  alt="">
                        <h3>General Liability</h3>
                        <a href="javascript:void(0);">Read more...</a>
                    </div>
                </div>
            </div>
        </div>


    </div>


@endsection