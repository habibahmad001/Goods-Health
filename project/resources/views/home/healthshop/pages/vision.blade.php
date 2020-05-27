<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 12/26/2019
 * Time: 1:27 AM
 */
$data = [
    'compare_title' => "Vision"
];
?>

@extends('home.healthshop.layouts.master', $data)

@section('content')
    <div class="main">
        <div class="container vision page_header_banner">
            <div class="banner_title">
                <h3> VISION INSURANCE</h3>
            </div>
            <div class="banner_tag">
                <h3> Existing policyholder?</h3>
                <h3> <a href="#"> Access your account.</a></h3>
            </div>
        </div>


        @include('home.common.quote-search')

        <div class="health_body">
            <div class="col-md-12 health_title">
                <div class="col-md-4">
                    <img src="{{ asset('landing/healthshop/img/site/i5.png') }}"  style=" width: 100px;margin-top: 20px;"/>
                </div>
                <div class="col-md-8">
                    <h3> What is Vision Insurance? </h3>
                </div>
            </div>
        </div>
        <div class="health_body vision-main container-fluid">
            <div class="desc">
                <p>The term "vision insurance" is commonly used to describe health and wellness plans designed to reduce your costs for routine preventive eye care (eye exams) and prescription eyewear (eyeglasses and contact lenses). Some vision plans also offer discounts on elective vision correction surgery, such as LASIK and PRK.
                </p><p>
                    But unlike major medical insurance policies that may provide unlimited benefits after a certain co-pays and deductibles are met, most vision insurance plans are discount plans or wellness benefit plans that provide specific benefits and discounts for an annual premium.
                </p><p>
                    In effect, these vision discount and wellness benefits plans offer savings much like a gift card. As such, they can be used to cover much of the cost of basic eyewear, or they can be used to make premium eyewear products and enhancements — such as progressive lenses, anti-reflective coating and photochromic lenses — significantly more affordable.
                </p><p>
                    When purchasing "vision insurance," be sure you fully understand the costs and benefits associated with the plan(s) you are considering. Also, if you have vision care coverage through a plan at work, be aware that "vision insurance" plans usually operate differently than other health insurance plans or major medical insurance.it for the insurance carrier to reimburse you. However, there are advantages such as having the freedom to visit the dentist of your choice.
                </p>
            </div>
        </div>

        <div class="health_body feature">
            <div class="col-md-12 desc">
                <h3>
                    What Kinds Of Vision Insurance Plans Are Available?
                </h3>


                <p> Vision insurance typically comes in the form of either a vision benefits package or a discount vision plan. </p><p>

                    Typically, a vision benefits package provides free eye care services and eyewear within fixed dollar amounts in exchange for an annual premium or membership fee and a relatively small co-pay (fixed dollar amount) each time you access a service.
                </p><p>
                    A discount vision plan, on the other hand, provides eye care and eyewear at discounted rates after you pay an annual premium or membership fee.
                </p><p>
                    In some cases, a vision benefits package or discount vision plan may also include a "deductible" — a fixed dollar amount you must pay your eye care provider out-of-pocket before the insurance benefits take effect. </p><p>

                    Both kinds of vision insurance can be custom-designed to meet the requirements of a wide range of customers, including school districts, unions, and big and small companies.
                </p><p>
                    Vision plans generally cover or provide discounts on the following products and services:
                </p>

                <ul>
                    <li>Annual eye examinations</li>
                    <li>Eyeglass frames</li>
                    <li>Eyeglass lenses (including lens coatings and enhancements)</li>
                    <li>Contact lenses</li>
                    <li>Discounted rates for LASIK and PRK</li>
                </ul>

            </div>
        </div>
        <div class="health_body feature_img">
            <div class="col-md-12 ">
                <div class="vision_feature"><img src="{{ asset('landing/healthshop/img/banner/v3.png') }}" /></div>
                <div class="vision_feature"><img src="{{ asset('landing/healthshop/img/banner/v1.png') }}" /></div>
                <div class="vision_feature"><img src="{{ asset('landing/healthshop/img/banner/v2.png') }}" /></div>
            </div>
        </div>

        <div class="health_body treatment">
            <div class="col-md-12 health_find">
                <h3>
                    Check out more of our insurance products:
                </h3>
            </div>
            <div class="col-md-12 health_treatment">
                <a href="#" >
                    <div>
                        <img src="{{ asset('landing/healthshop/img/site/i2.png') }}">
                        <h4>Life</h4>
                    </div>
                </a>
                <a href="#" >
                    <div>
                        <img src="{{ asset('landing/healthshop/img/site/i3.png') }}">
                        <h4>Medicare</h4>
                    </div>
                </a>
                <a href="#" >
                    <div>
                        <img src="{{ asset('landing/healthshop/img/site/b44.png') }}">
                        <h4>Dental</h4>
                    </div>
                </a>
                <a href="#" >
                    <div>
                        <img src="{{ asset('landing/healthshop/img/site/i5.png') }}">
                        <h4>Vision</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>



@endsection
