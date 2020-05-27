<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 1/2/2020
 * Time: 1:16 AM
 */

$data = [
    'compare_title' => "General Liability"
]
?>

@extends('home.goodinsured.layouts.master', $data)

@section('content')


    <div class="main">
        <div class="container banner_con_aligiablity page_header_banner">
            <div class="banner_title">
                <h3> GENERAL LIABILITY</h3><h3>
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
                    <img src="{{ asset('landing/goodinsured/img/site/gl.png') }}" >
                    <span>WHAT IS GENERAL LIABILITY INSURANCE?</span>
                </p>
                <p class="business-paragraph-conten-one">
                    General Liability (GL) Insurance helps protect you from claims that happen as a result of normal business operations. GL includes claims for third-party bodily injuries, resulting medical payments, and advertising injuries. General liability is also known as "Business Liability Insurance," or "Commercial General Liability" (CGL) insurance. While we're not here to tell you what to call it, we can help you get the coverage your business needs.
                </p>
                <p class="business-page-heading-two">
                    What does general liability insurance cover?
                </p>
                Helps protect your business from claims that come from your normal business operations such as:
                <p class="business-paragraph-conten-two">
                    • Property damage<br />
                    • Physical injury<br />
                    • Defense costs<br />
                    • Personal and advertising injury<br />
                </p>
                <p class="business-page-heading-three">
                    How much does general liability insurance cost?
                </p>
                <p class="business-paragraph-conten-three">
                    The cost of general liability insurance is based on your specific business needs. Your business is unique, and GEICO can help you get an insurance policy with the right coverage at a great price. Start your quote now.
                </p>
            </div>
        </div>


        <div class="ailigiablity-three-item-section">
            <div class="content-container">
                <p class="business-page-heading-two">
                    What do these insurance terms mean?
                </p>
                <div class="business-last-section">
                    <div>
                        <img src="{{ asset('landing/goodinsured/img/site/home.png') }}"  alt="">
                        <h3>Property Damage</h3>
                        <div class="ailigiablity-content">Could include claims costs if you damage someone else's property.</div>
                    </div>
                    <div>
                        <img src="{{ asset('landing/goodinsured/img/site/i1.png') }}"  alt="">
                        <h3>Medical Payments</h3>
                        <div class="ailigiablity-content">Medical payments resulting from accidents that occur on your premises or because of your operations, regardless of fault. This could include if a customer slips on a wet floor.</div>
                    </div>
                    <div>
                        <img src="{{ asset('landing/goodinsured/img/site/alert-icon.png') }}"  alt="">
                        <h3>Personal & Advertising Injury</h3>
                        <div class="ailigiablity-content">If you're sued for libel and slander, this could provide coverage for those claims.</div>
                    </div>
                </div>
            </div>
        </div>


        <div class="wrapper">
            <div class="content-container">
                <p class="business-page-heading-two">
                    Does your company need more liability coverage?
                </p>
                Typical businesses that use general liability insurance are:
                <p class="points-left-align">
                    • General contractors<br />
                    • Landscaping companies<br />
                    • IT contractors<br />
                    • Real estate agents<br />
                    • Consulting<br />
                    • Marketing and more<br />
                </p>
                <div class="ailigiablity-above-3-section">Sometimes your business needs more than general liability insurance. Being properly insured is critical to protecting your company. A few examples of companies that may be better suited with our other businesses insurance products:</div>
                <p>
                    • Your company provides professional services (e.g. education and training)<br />
                    • Rent/own a storefront<br />
                    • Utilize vehicles to transport goods, yourself, or employees<br />
                </p>
            </div>
        </div>
    </div>
    <div class="ailigiablity-full-width-section">
        <div class="business-last-section">
            <p class="business-page-heading-two">
                Check out more of our insurance products:
            </p>
            <div>
                <img src="{{ asset('landing/goodinsured/img/site/gl.png') }}"  alt="">
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
                <img src="{{ asset('landing/goodinsured/img/site/icon6.png') }}"  alt="">
                <h3>Commercial Auto</h3>
                <a href="javascript:void(0);">Read more...</a>
            </div>
        </div>
    </div>



    </div>


@endsection


