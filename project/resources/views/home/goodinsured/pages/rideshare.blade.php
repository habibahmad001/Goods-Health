<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 12/26/2019
 * Time: 1:51 AM
 */

$data = [
    'compare_title' => "Rideshare"
]
?>

@extends('home.goodinsured.layouts.master', $data)

@section('content')

<div class="main">
    <div class="container rideshare page_header_banner">
        <div class="banner_title">
            <h3> RIDESHARE </h3><h3>INSURANCE</h3>
        </div>
        <div class="banner_tag">
            <h3> Existing policyholder?</h3>
            <h3> <a href="#"> Access your account.</a></h3>
        </div>
    </div>

    @include('home.common.quote-search')

    <div class="health_body">
        <div class="col-md-12 health_title">
            <div class="col-md-5">
                <img src="{{ asset('landing/goodinsured/img/site/rideshare.png') }}" alt="">
            </div>
            <div class="col-md-7 title">
                <h3> How Rideshare Insurance can protect you 24/7? </h3>
            </div>
        </div>
    </div>
    <div class="health_body ride-main container-fluid">
        <div class="desc">
            <p>Driving to pay off student loans? Supporting your family? Saving up for something? You can't afford to depend only on Uber or Lyft for coverage. If you don't have rideshare insurance, you run the risk of:</p>

            <ul>
                <li>Losing your personal auto coverage</li>
                <li>Falling into coverage gaps for accidents that occur while you're ridesharing or driving for on-demand deliveries</li>
                <li>Paying out of pocket for repairs, injuries, and more</li>
                <li>Why risk it? GEICO Rideshare Insurance covers you all the time, so you can focus on making money, not worry about losing it.</li>
            </ul>

            <h3 class="rideshare_h3">Who is ridesharing insurance for?</h3>
            <p>
                You need rideshare insurance if you drive for a ridesharing or on-demand delivery company, such as:</p>
            <div class="col-md-3 uber"><img src="{{ asset('landing/goodinsured/img/site/r1.png') }}" alt="" width="50px"></div>
            <div class="col-md-3 lya"><img src="{{ asset('landing/goodinsured/img/site/r2.png') }}" alt=""></div>
            <div class="col-md-3 amazon"><img src="{{ asset('landing/goodinsured/img/site/r3.png') }}" alt=""></div>
            <div class="col-md-3 grubhub"><img src="{{ asset('landing/goodinsured/img/site/r4.png') }}" alt=""></div>
            <div class="col-md-6 doordash"><img src="{{ asset('landing/goodinsured/img/site/r5.png') }}" alt=""></div>
            <div class="col-md-3 uber-eat"><img src="{{ asset('landing/goodinsured/img/site/r6.png') }}" alt=""></div>
            <div class="col-md-3 postmates"><img src="{{ asset('landing/goodinsured/img/site/r7.png') }}" alt=""></div>



            <img src="{{ asset('landing/goodinsured/img/site/ride2.png') }}" alt="">

        </div>
    </div>

    <div class="health_body treatment">
        <div class="col-md-12">
            <h3>
                Check out more of our insurance products:
            </h3>
        </div>
        <div class="col-md-12 products ">
            <a href="#" >
                <div class="motorcycle">
                    <img src="{{ asset('landing/goodinsured/img/site/icon5.png') }}" alt="">
                    <h4>Motorcycle</h4>
                </div>
            </a>
            <a href="#" >
                <div class="rv">
                    <img src="{{ asset('landing/goodinsured/img/site/rv.png') }}" alt="">
                    <h4>RV</h4>
                </div>
            </a>
            <a href="#" >
                <div class="auto">
                    <img src="{{ asset('landing/goodinsured/img/site/icon1.png') }}" alt="">
                    <h4>Auto</h4>
                </div>
            </a>
            <a href="#" >
                <div class="atv">
                    <img src="{{ asset('landing/goodinsured/img/site/atv.png') }}" alt="">
                    <h4>ATV</h4>
                </div>
            </a>
            <a href="#" >
                <div class="trailer">
                    <img src="{{ asset('landing/goodinsured/img/site/trailer.png') }}" alt="">
                    <h4>Trailer</h4>
                </div>
            </a>
            <a href="#" >
                <div class="mobile_home">
                    <img src="{{ asset('landing/goodinsured/img/site/mobile_home.png') }}" alt="">
                    <h4>Mobile Home</h4>
                </div>
            </a>
            <a href="#" >
                <div class="boat">
                    <img src="{{ asset('landing/goodinsured/img/site/boat.png') }}" alt="">
                    <h4>Boat</h4>
                </div>
            </a>
            <a href="#" >
                <div class="collector_img">
                    <img src="{{ asset('landing/goodinsured/img/site/colect_auto.png') }}" alt="">
                    <h4>Collector's Auto</h4>
                </div>
            </a>
        </div>
    </div>
</div>



@endsection

