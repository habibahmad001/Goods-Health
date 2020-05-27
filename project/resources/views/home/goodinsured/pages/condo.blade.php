<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 12/26/2019
 * Time: 1:50 AM
 */

$data = [
    'compare_title' => "Condo"
]
?>

@extends('home.goodinsured.layouts.master', $data)

@section('content')
    <!---->
    <div class="main">
        <div class="container condo_banner page_header_banner">
            <div class="banner_title">
                <h3> CONDO</h3><h3> INSURANCE</h3>
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
                    <img src="{{ asset('landing/goodinsured/img/site/z2.png') }}" style="width: 60px; ">
                </div>
                <div class="col-md-7 title">
                    <h3>
                        Condo Insurance Coverage
                    </h3>
                </div>
            </div>
        </div>
        <div class="health_body container-fluid">
            <div class="desc">
                <p>Ah, the sweet condo life. No need to spend your weekends mowing the yard or cleaning gutters – you've got better things to do with your time. While your condo association's master policy covers the exterior structure, the master policy doesn't cover what's inside your condo unit. That's where GOODSInsured comes in: after all, it's what's inside that counts.
                </p>

                <div class="desc condo_feature">
                    <img src="{{ asset('landing/goodinsured/img/site/cf1.png') }}" class="tag_img"/>
                    <h3>Why do you need condo/co-op insurance?</h3>

                    <p> Life is unpredictable. Condo insurance and co-op insurance protect your unit and personal property against the unexpected such as fire, lightning, theft, and vandalism. </p>

                    <p> With an insurance policy, you're also covered for certain kinds of accidents, like a neighbor slipping on a wet kitchen floor and water damage to interior walls and fixtures of your unit. </p>
                </div>

                <div class="desc condo_feature">
                    <img src="{{ asset('landing/goodinsured/img/banner/condo2.png') }}" />
                </div>
                <div class="desc condo_feature">
                    <img src="{{ asset('landing/goodinsured/img/banner/condo1.png') }}" />
                </div>

                <div class="desc condo_feature">
                    <img src="{{ asset('landing/goodinsured/img/site/cf2.png') }}" class="tag_img"/>
                    <h3>How much would it cost to replace my stuff? </h3>

                    <p> Do you know the value of your belongings? It may be more than you think. Use our handy personal property calculator to see the cost of replacing your: </p>

                    <ul>
                        <li> Furniture </li>
                        <li> Clothing  </li>
                        <li> Electronics </li>
                        <li> Jewelry, etc. </li>
                    </ul>
                </div>

            </div>

            <div class="col-md-4 desc condo">
                <img src="{{ asset('landing/goodinsured/img/site/sdfdf.png') }}"  style="width: 80px !important;"/>
                <h3>Budget-Friendly Discounts
                </h3>
                <p>Want to save money? You might qualify for a discount if your unit has certain safety features, such as deadbolt locks or a monitored security alarm system. It literally pays to check! </p>

            </div>

            <div class="col-md-4 desc condo">
                <img src="{{ asset('landing/goodinsured/img/site/gl.png') }}" style="width: 57px !important;" />
                <h3>Liability Coverage Included</h3>
                <p>Every condo policy includes personal liability protection, which may cover injury or property damage by you or a member of your household. In addition, your policy includes medical payment coverage for people who don't live with you and are injured while on your property.</p>
            </div>

            <div class="col-md-4 desc condo">
                <img src="{{ asset('landing/goodinsured/img/site/clock.png') }}"  style="width: 63px !important;" />
                <h3>Convenient Service and Claims</h3>
                <p>You chose a condo for the convenience. A condo/co-op policy through GOODSInsured is also very convenient. It's a breeze to pay your bill, report a claim, or make a change.</p>
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
                    <div class="renters">
                        <img src="{{ asset('landing/goodinsured/img/site/z1.png') }}">
                        <h4>Renters</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="homeowners">
                        <img src="{{ asset('landing/goodinsured/img/site/icon3.png') }}">
                        <h4>Homeowners</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="pet">
                        <img src="{{ asset('landing/goodinsured/img/site/icon4.png') }}">
                        <h4>PET</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="flood">
                        <img src="{{ asset('landing/goodinsured/img/site/flood.png') }}">
                        <h4>FLOOD</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="trailer">
                        <img src="{{ asset('landing/goodinsured/img/site/trailer.png') }}">
                        <h4>Trailer</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="mobile_home">
                        <img src="{{ asset('landing/goodinsured/img/site/mobile_home.png') }}">
                        <h4>Mobile Home</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="rv">
                        <img src="{{ asset('landing/goodinsured/img/site/rv.png') }}">
                        <h4>RV</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="auto">
                        <img src="{{ asset('landing/goodinsured/img/site/icon1.png') }}">
                        <h4>Auto</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>


@endsection

