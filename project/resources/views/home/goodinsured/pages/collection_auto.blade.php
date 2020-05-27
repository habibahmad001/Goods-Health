<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 12/26/2019
 * Time: 1:50 AM
 */

$data = [
    'compare_title' => "Collection's Auto"
]
?>

@extends('home.goodinsured.layouts.master', $data)

@section('content')


<div class="main">
    <div class="container collection_auto_banner page_header_banner">
        <div class="banner_title">
            <h3> Collection's Auto </h3><h3>INSURANCE</h3>
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
                <img src="{{ asset('landing/goodinsured/img/site/colect_auto.png') }}" alt="" />
            </div>
            <div class="col-md-7 title">
                <h3> Collector’s Auto Insurance Coverage </h3>
            </div>
        </div>
    </div>
    <div class="health_body container-fluid">
        <div class="desc">
            <p>
                Whether you lovingly rebuilt your antique auto or classic car from the ground up or you bought a perfectly restored showpiece, it's much more than a car to you. It's your passion, your pride and joy. GOODSInsured can help protect it. We've offered competitively-priced quality auto insurance coverage since 1922. When your antique car was new, it may have been covered by GOODSInsured. Who better to insure it again?</p>

            <img src="{{ asset('landing/goodinsured/img/banner/ca1.png') }}" alt="" />

        </div>

        <div class="col-md-6 desc collector">
            <h3>Is Your Car Eligible for Antique Car Insurance Coverage?</h3>
            <p>If you're not sure, these definitions may help: </p>

            <ul>
                <li> <b>Classic automobile:</b> A motor vehicle ten or more years old, 	which is of special historical interest. A classic motor vehicle 25 years old or older is covered as an antique.</li>
                <li> <b>Antique automobile:</b> A motor vehicle 25 years old or older.</li>
            </ul>

            <p> Here are some important conditions for classic car insurance eligibility:</p>

            <p>   Your antique or classic car must be used on a very limited basis, such as exhibitions, club activities, and parades or similar events. You need to have restored, maintained, or preserved your antique or classic car or it must be actively undergoing restoration.</p>
        </div>

        <div class="col-md-6 desc collector">
            <h3> Is Your Car Eligible for Antique Car Insurance Coverage? </h3>
            <p></p>
            <ul>
                <li>Available Coverages</li>
                <li>Liability</li>
                <li>Medical Payments/No Fault</li>
                <li>Comprehensive</li>
                <li>Collision</li>
                <li>Uninsured Motor Vehicle/Underinsured Motor Vehicle</li>
                <li>Emergency Road Service</li>
                <li>Death, Dismemberment and Loss of Sight</li>
                <li>Loss of Earnings</li>
            </ul>
            <p><b>NOTE:</b> This is only a general description of available coverages and is not a statement of contract. All coverages are subject to policy provisions and applicable endorsements.</p>
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
                    <img src="{{ asset('landing/goodinsured/img/site/icon5.png') }}" alt="" />
                    <h4>Motorcycle</h4>
                </div>
            </a>
            <a href="#" >
                <div class="rv">
                    <img src="{{ asset('landing/goodinsured/img/site/rv.png') }}" alt="" />
                    <h4>RV</h4>
                </div>
            </a>
            <a href="#" >
                <div class="auto">
                    <img src="{{ asset('landing/goodinsured/img/site/icon1.png') }}" alt="" />
                    <h4>Auto</h4>
                </div>
            </a>
            <a href="#" >
                <div class="atv">
                    <img src="{{ asset('landing/goodinsured/img/site/atv.png') }}" alt="" />
                    <h4>ATV</h4>
                </div>
            </a>
            <a href="#" >
                <div class="trailer">
                    <img src="{{ asset('landing/goodinsured/img/site/trailer.png') }}" alt="" />
                    <h4>Trailer</h4>
                </div>
            </a>
            <a href="#" >
                <div class="mobile_home">
                    <img src="{{ asset('landing/goodinsured/img/site/mobile_home.png') }}" alt="" />
                    <h4>Mobile Home</h4>
                </div>
            </a>
            <a href="#" >
                <div class="boat">
                    <img src="{{ asset('landing/goodinsured/img/site/boat.png') }}" alt="" />
                    <h4>Boat</h4>
                </div>
            </a>
            <a href="#" >
                <div class="rideshare_img">
                    <img src="{{ asset('landing/goodinsured/img/site/rideshare.png') }}" alt="" />
                    <h4>Rideshare</h4>
                </div>
            </a>
        </div>
    </div>
</div>

    
    @endsection
