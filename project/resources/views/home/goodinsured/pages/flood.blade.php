<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 1/2/2020
 * Time: 2:56 AM
 */


$data = [
    'compare_title' => "Flood"
]
?>

@extends('home.goodinsured.layouts.master', $data)

@section('content')
    <div class="main">
        <div class="container banner_con_motorcycle page_header_banner">
            <div class="banner_title">
                <h3> FLOOD INSURANCE</h3>
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
                    <img src="{{ asset('landing/goodinsured/img/site/food.png') }}" alt="" style="width: 85px;margin-top: 20px; ">
                </div>
                <div class="col-md-7 title">
                    <h3>
                        Flood Insurance Coverage
                    </h3>
                </div>
            </div>
        </div>
        <div class="health_body container-fluid">
            <div class="desc">
                <p>Protect your personal property and belongings with an online flood insurance quote today. After all, water's great in pools and on water slides but not so much in your basement or living room. And whether you're required to buy flood insurance or just want additional protection for your property, GOODSInsured can help insure your investment with a flood policy through the National Flood Insurance Program (NFIP).
                </p>

            </div>

        </div>

        <div class="wrapper">
                <div class="auto-rec-three-header">
                    <img src="{{ asset('landing/goodinsured/img/site/flooding-two.png') }}" alt="" />
                </div>
        </div>


        <div class="wrapper">
                <div class="boat-three-section-area-heading class-center">
                    Coverage you need with service you can count on.<br /><br />
                </div>
                <div class="boat-three-section-area flood-section-four tr-service">
                    <div class="boat-three-section-area-heading">
                        <img src="{{ asset('landing/goodinsured/img/site/flooding.png') }}" alt="" />
                        Flooding you with confidence that your stuff is covered.
                    </div>
                    <div class="boat-three-section-area-body">
                        If your home is in a community that participates in the National Flood Insurance Program (NFIP) you may be eligible for flood insurance at a modest cost through the federal government. This means insurance companies issue flood insurance that's administered by the federal government.<br />
                    </div>
                </div>

                <div class="boat-three-section-area flood-section-four tr-service">
                    <div class="boat-three-section-area-heading">
                        <img style="width:40px !important;" src="{{ asset('landing/goodinsured/img/site/when-should.png') }}" alt="" />
                        When should I buy flood insurance?
                    </div>
                    <div class="boat-three-section-area-body">
                        Most flood insurance policies require a 30 day waiting period before the coverage is effective. Exceptions include if you've purchased a new home and the closing is in less than 30 days.<br />
                    </div>
                </div>

                <div class="boat-three-section-area flood-section-four tr-service">
                    <div class="boat-three-section-area-heading">
                        <img src="{{ asset('landing/goodinsured/img/site/gl.png') }}" alt="" />
                        Why choose GOODSInsured to help you get flood insurance?
                    </div>
                    <div class="boat-three-section-area-body">
                        Big coverage for a small premium:<br /><br />

                        • Backed by the Federal government<br />
                        • Cover damages not covered by homeowner's policies<br />
                        • Rates tailored to your specific area<br />
                    </div>
                </div>

        </div>


        <div class="wrapper">
                <div class="auto-rec-three-header">
                    <img src="{{ asset('landing/goodinsured/img/site/flodding-three.png') }}" alt="" />
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
                    <div class="homeowners">
                        <img src="{{ asset('landing/goodinsured/img/site/icon3.png') }}" alt="" />
                        <h4>Homeowners</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="condo_item">
                        <img src="{{ asset('landing/goodinsured/img/site/icon2.png') }}" alt="" />
                        <h4>CONDO</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="pet">
                        <img src="{{ asset('landing/goodinsured/img/site/pet.png') }}" alt="" />
                        <h4>PET</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="renters">
                        <img src="{{ asset('landing/goodinsured/img/site/z1.png') }}" alt="" />
                        <h4>Renters</h4>
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
            </div>
        </div>
    </div>


@endsection
