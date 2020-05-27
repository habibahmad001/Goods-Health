<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 1/2/2020
 * Time: 2:56 AM
 */


$data = [
    'compare_title' => "Mobile Home"
]
?>

@extends('home.goodinsured.layouts.master', $data)

@section('content')
    <div class="main">
        <div class="container banner_con_mobile_home page_header_banner">
            <div class="banner_title">
                <h3> MOBILE HOME </h3> <h3> INSURANCE</h3>
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
                    <img src="{{ asset('landing/goodinsured/img/site/mobile_home.png') }}" alt="" style="width: 85px; ">
                </div>
                <div class="col-md-7 title">
                    <h3>
                        What does a mobile home insurance policy cover?
                    </h3>
                </div>
            </div>
        </div>
        <div class="health_body container-fluid">
            <div class="desc">
                <p> <b>Coverage for the structure of your mobile home.</b><br />
                    Your mobile home policy helps protect your mobile home and structures you own that are on the same piece of land as the home but are not attached to it (such as a shed or detached garage), from all forms of loss unless they are specifically excluded in the policy.<br /><br />

                    Coverage is provided for a wide range of perils including, but not limited to fire, windstorm damage, damage from falling objects, lightning, explosion, and more. In most cases, a regular mobile home policy will not cover your mobile home while it's being moved.<br /><br />

                    <b>Protection for your personal effects.</b><br />
                    Your policy also includes protection against a wide range of perils for your personal property, whether it's inside the mobile home or in an adjacent structure like a shed. Personal property coverage also applies while your property is away from your home, but with a lower maximum limit and a smaller range of perils insured against.<br /><br />

                    <b>Personal liability protection.</b><br />
                    In cartoons all you have to do to keep people from slipping and falling is to make sure there are no rogue banana peels lying around. Unfortunately, accidents can happen in the real world and, if you unintentionally cause bodily injury or property damage to someone who doesn't live in your home, you could be faced with large, out-of-pocket expenses due to court costs or damages.<br /><br />

                    Your policy can pay for the medical expenses of someone who does not live in your home in addition to the damages or defense costs due to a covered accidental circumstance.<br /><br />
                </p>

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
                    <div class="auto">
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
                    <div class="trailer">
                        <img src="{{ asset('landing/goodinsured/img/site/trailer.png') }}" alt="" />
                        <h4>Trailer</h4>
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
