<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 1/2/2020
 * Time: 2:04 AM
 */


$data = [
    'compare_title' => "Auto"
]
?>

@extends('home.goodinsured.layouts.master', $data)

@section('content')
    <div class="main">
        <div class="container banner_con_auto page_header_banner">
            <div class="banner_title">
                <h3> AUTO INSURANCE</h3>
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
                    <img src="{{ asset('landing/goodinsured/img/site/trailer1.png') }}" alt="" style="width: 85px; ">
                </div>
                <div class="col-md-7 title">
                    <h3>
                        Why You Need Car Insurance
                    </h3>
                </div>
            </div>
        </div>
        <div class="health_body container-fluid">
            <div class="desc">
                <p> No matter which auto insurance quote you go with, the most important thing is your car insurance provides the coverage you need. We want you to be Car insurance protects you from financial liability in incidents involving your vehicle. It has two major benefits. First, it can help save you from costs involved with bodily injury (medical costs). Second, it covers property damage to both you and your property, and other people involved in the accident if you’re at fault. Car insurance is required in most states and it is illegal to operate a car without it.
                </p>

            </div>

        </div>

        <div class="gray-color padding-bottom-1">
            <div class="content-container">
                <p class="profile-dubble-bulit set-photo">
                    <img src="{{ asset('landing/goodinsured/img/site/left-pic-sec.png') }}" alt="" />
                </p>
                <p class="profile-dubble-bulit">
                <div class="business-page-heading-two what-care">
                    What car insurance covers?
                </div>
                <div class="ailigiablity-above-3-section">In general, car insurance covers damage, vandalism, and theft of your vehicle. But what any specific auto insurance policy will cover depends on the coverage type(s) you have. Each car insurance policy is made up of at least one of the following:<br /><br /><br />

                    • Liability insurance: Doesn’t cover your vehicle, but covers damage you cause to others in an accident. It is made up of bodily injury (BI) and property damage (PD).<br /><br />
                    • Collision and comprehensive insurance: Collision insurance covers your vehicle in case of a collision; comprehensive insurance covers your vehicle in the event of anything else (theft, vandalism, etc).<br /><br />
                    • Personal injury protection (PIP): PIP covers medical expenses, lost wages, and other damages. It’s required in “no-fault” states because it pays regardless of legal liability.<br /><br />
                    • Uninsured/underinsured motorist insurance: If you’re in an accident with an uninsured driver and they’re at fault, uninsured motorist insurance means you’ll still be covered. Like liability insurance, bodily injury and property damage are covered here, but for you instead of the other driver.<br /><br />
                    No-fault states are states in which drivers can file a claim with their insurer regardless of which driver is at fault.<br />
                </div>
                </p>
            </div>
        </div>


        <div class="health_body container-fluid">
            <p class="business-page-heading-two what-care">
                How car insurance works.
            </p>
            <div class="desc">
                <p> Some people are hesitant to file a car insurance claim, fearing that their premiums will increase even if they aren’t at fault. However, this isn’t necessarily true, and an insurance company will look at the damage involved and who is responsible for the accident before deciding whether or not a claim results in a rate increase. If you find yourself in an auto accident, whether it’s a fender bender or your car is totalled, exchange insurance information with any involved parties. Even damage that looks cosmetic may have comprehensive damage that you can’t see, so you should file a claim.
                </p>

            </div>

        </div>

    <div class="ailigiablity-three-item-section three-container-outer">
        <div class="content-container">
            <div class="three-section-div">
                <p class="three-heading-section">
                    Is car insurance worth it?
                </p>
                <p class="three-content-section">
                    Besides being legally required in almost every state, auto insurance is an incredibly important part of your financial safety net. The average car insurance claim in 2013 was over $15,000 for bodily injury and over $3,200 for property damage. Car insurance is there to cover medical bills, vehicle repair or replacement, and keeps you off the hook for injury and damage liability for others. Your premiums will go up if you cause an accident, but that’s better than the alternative.
                </p>
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
                    <div class="atv">
                        <img src="{{ asset('landing/goodinsured/img/site/atv.png') }}" alt="" />
                        <h4>ATV</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="rv">
                        <img src="{{ asset('landing/goodinsured/img/site/rv.png') }}" alt="" />
                        <h4>RV</h4>
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
