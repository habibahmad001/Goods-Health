<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 12/26/2019
 * Time: 1:50 AM
 */

$data = [
    'compare_title' => "Pets"
]
?>

@extends('home.goodinsured.layouts.master', $data)

@section('content')
    <div class="main">
        <div class="container pets_insurance page_header_banner">
            <div class="banner_title">
                <h3> PET INSURANCE</h3>
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
                    <img src="{{ asset('landing/goodinsured/img/site/icon4.png') }}" alt="" />
                </div>
                <div class="col-md-7 title">
                    <h3>
                        What is Pet Insurance?
                    </h3>
                </div>
            </div>
        </div>
        <div class="health_body container-fluid">
            <div class="desc">
                <p>Pet insurance is like car insurance: it reimburses you for expenses when something bad and unexpected happens. Except in this case it applies to your beloved dog or cat. Pet insurance helps you save on vet bills, and you can go to any vet you want. Pet insurance provides peace of mind when it comes to your pet's health and your budget.
                </p>

                <img src="{{ asset('landing/goodinsured/img/banner/pets2.png') }}" alt="" />
                <div class="col-md-12 title">
                    <h3>
                        How it works?
                    </h3>
                </div>

                <img src="{{ asset('landing/goodinsured/img/banner/pets.png') }}" alt="" />

            </div>

            <div class="col-md-4 desc pets">
                <img src="{{ asset('landing/goodinsured/img/banner/p1.png') }}" alt=""  />
                <h3>ACCIDENT PLANS</h3>
                <p>Like car insurance or homeowners insurance, it reimburses you a set percentage of your out-of-pocket costs for a claim. </p>
                <p class="pets_list">Covers the following:</p>
                <ul>
                    <li> Accidental injuries </li>
                    <li> Wellness & Preventative Care (can be added)</li>
                    <li> Go to any licensed vet</li>
                </ul>

            </div>

            <div class="col-md-4 desc pets">
                <img src="{{ asset('landing/goodinsured/img/banner/p2.png') }}" alt="" style="width: 100px !important;" />
                <h3>COMPREHENSIVE PLAN</h3>
                <p>Like car insurance or homeowners insurance, it reimburses you a set percentage of your out-of-pocket costs for a claim. </p>
                <p class="pets_list">Covers the following:</p>
                <ul>
                    <li> Accidental injuries </li>
                    <li>IIllnesses</li>
                    <li>Congenital & Hereditary</li>
                    <li> Wellness & Preventative Care (can be added)</li>
                    <li> Go to any licensed vet</li>
                    <li>Best for larger & unpredictable bills</li>
                </ul>
            </div>

            <div class="col-md-4 desc pets">
                <img src="{{ asset('landing/goodinsured/img/banner/p3.png') }}" alt=""  style="width: 65px !important;" />
                <h3>MEMBERSHIP PLAN </h3>
                <p>homeowners insurance, it reimburses you a set percentage of your out-of-pocket costs for a claim.	Not pet insurance. You have to stick to specific vets, who offer members discounted services. </p>

                <p class="pets_list">Covers the following:</p>
                <ul>
                    <li> Best for smaller & predictable bills </li>
                </ul>
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
                    <div class="renters">
                        <img src="{{ asset('landing/goodinsured/img/site/z1.png') }}" alt="" />
                        <h4>Renters</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="flood">
                        <img src="{{ asset('landing/goodinsured/img/site/flood.png') }}" alt="" />
                        <h4>FLOOD</h4>
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