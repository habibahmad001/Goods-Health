<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 1/2/2020
 * Time: 2:56 AM
 */


$data = [
    'compare_title' => "Trailer"
]
?>

@extends('home.goodinsured.layouts.master', $data)

@section('content')
    <div class="main">
        <div class="container banner_con_trailer page_header_banner">
            <div class="banner_title">
                <h3> TRAILER INSURANCE</h3>
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
                    <img src="{{ asset('landing/goodinsured/img/site/trailer.png') }}" alt="" style="width: 85px; ">
                </div>
                <div class="col-md-7 title">
                    <h3>
                        Trailer Insurance Coverage
                    </h3>
                </div>
            </div>
        </div>

        <div class="wrapper">
            <div>

                <p class="business-paragraph-conten-one traller-second-section">
                    Your plan will provide affordable protection for a park model trailer, tent trailer, camper, fifth wheel, toy hauler, or horse/stock trailer2.
                    <br/>
                    <br/>
                    •   Protects your trailer, detached private structures and belongings against a wide range of risks.<br />
                    •   Insures your trailer for  actual cash valuetooltip or  guaranteed replacement costtooltip, based on your needs and trailer age. <br />
                    •   Emergency vacation expense coverage helps with reasonable and necessary emergency expenses if your unit is lost or damaged as a result of an insured loss.<br />
                    •   Optional emergency road service coverage protects you in case you break down, need a tow or battery boost, run out of gas and more.<br />
                    •   Golf cart coverage, extended warranties for appliances and other coverage may be available.<br />
                    •   Additional protection is available if you travel with your unit full-time.<br />
                    •   Disappearing Deductible: stay claims-free and we’ll reduce your deductible by 20% every year.<br />
                    •   Receive discounts for a security system2, having more than one policy with us, and more.<br />
                </p>
                <img src="{{ asset('landing/goodinsured/img/site/traller-three.png') }}" alt="" />
            </div>
            </div>



        <div class="wrapper">
            <div >
                <div class="boat-section-with-bg-header three-section-heading-setting class-center">
                    How Trailer Insurance Protects You
                </div>
                <div class="tr-service boat-three-section-area">
                    <div class="boat-three-section-area-heading">
                        Your Trailer
                    </div>
                    <div class="boat-three-section-area-body">
                        Helps to protect your recreational trailer (and, if applicable, awnings) against insured risks like collision, theft, damage and more.
                    </div>
                </div>

                <div class="tr-service boat-three-section-area">
                    <div class="boat-three-section-area-heading">
                        Your Belongings
                    </div>
                    <div class="boat-three-section-area-body">
                        Helps to protect you financially against insured damage or loss to personal property inside your trailer or detached private structures.
                    </div>
                </div>

                <div class="tr-service boat-three-section-area">
                    <div class="boat-three-section-area-heading">
                        Detached Private Structures
                    </div>
                    <div class="boat-three-section-area-body">
                        Helps to protect your detached private structures such as a fence, shed or deck (if applicable), against insured risks like vandalism or damage by animals.
                    </div>
                </div>

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
                        <h4>MOTORCYCLE</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="rv">
                        <img src="{{ asset('landing/goodinsured/img/site/rv.png') }}" alt="" />
                        <h4>RV</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="rv">
                        <img src="{{ asset('landing/goodinsured/img/site/icon1.png') }}" alt="" />
                        <h4>AUTO</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="atv">
                        <img src="{{ asset('landing/goodinsured/img/site/atv.png') }}" alt="" />
                        <h4>ATV</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="mobile_home">
                        <img src="{{ asset('landing/goodinsured/img/site/mobile_home.png') }}" alt="" />
                        <h4>Mobile Home</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="pet">
                        <img src="{{ asset('landing/goodinsured/img/site/rideshare.png') }}" alt="" />
                        <h4>RIDESHARE</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="boat">
                        <img src="{{ asset('landing/goodinsured/img/site/boat.png') }}" alt="" />
                        <h4>BOAT</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="auto">
                        <img src="{{ asset('landing/goodinsured/img/site/colect_auto.png') }}" alt="" />
                        <h4>COLLECTOR'S AUTO</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>


@endsection
