<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 1/2/2020
 * Time: 12:53 AM
 */

$data = [
    'compare_title' => "Business Owner"
]
?>

@extends('home.goodinsured.layouts.master', $data)

@section('content')


    <div class="main">
        <div class="container banner_con_business page_header_banner">
            <div class="banner_title">
                <h3> BUSINESS OWNER POLICY </h3>
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
                    <img src="{{ asset('landing/goodinsured/img/site/icon8.png') }}" >
                    <span>WHAT IS BUSINESS OWNER POLICY?</span>
                </p>
                <p class="business-paragraph-conten-one">
                    A Business Owner's Policy (BOP) is a convenient way to help protect your business for property damage and liability insurance in a single policy. By bundling these two coverages into one policy, you can worry less about insurance policies and focus more on your customers. Get your free business owner's policy quote and see how the GEICO Insurance Agency puts the 'us' in business insurance. We'll work together to create a plan that works for your business.
                </p>
                <p class="business-page-heading-two">
                    Examples of BOP Coverages:
                </p>
                <p class="business-paragraph-conten-two">
                    • Bodily injury or property damage (e.g., You spill water on a client's computer causing damage.)<br />
                    • Defense costs for covered liability losses (e.g., libel and slander)<br />
                    • Protection for business furniture and equipment (e.g., chairs, desks, and computers)<br />
                </p>
                <p class="business-page-heading-three">
                    Managing Your Policy is Easy
                </p>
                <p class="business-paragraph-conten-three">
                    You already have to manage your business. The least we could do is make it easy to keep up-to-date with your business owner's policy. We're here to help you make any necessary updates, because we know your business may change.
                </p>
                <p class="business-paragraph-conten-four">
                    <a href="javascript:void(0);">Access your policy or call.</a>
                </p>
                <p class="business-paragraph-conten-five">
                    Check out more of our insurance products:
                </p>
                <div class="business-last-section">
                    <div>
                        <img src="{{ asset('landing/goodinsured/img/site/gl.png') }}"  alt="">
                        <h3>General Liability</h3>
                        <a href="javascript:void(0);">Read more...</a>
                    </div>
                    <div class="business-last-section-2">
                        <img src="{{ asset('landing/goodinsured/img/site/pl.png') }}"  alt="">
                        <h3>Professional Liability</h3>
                        <a href="javascript:void(0);">Read more...</a>
                    </div>
                    <div class="business-last-section-3">
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


    </div>


@endsection


