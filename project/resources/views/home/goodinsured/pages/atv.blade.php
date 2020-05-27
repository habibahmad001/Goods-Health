<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 1/2/2020
 * Time: 2:56 AM
 */


$data = [
    'compare_title' => "ATV"
]
?>

@extends('home.goodinsured.layouts.master', $data)

@section('content')
    <div class="main">
        <div class="container banner_con_atv page_header_banner">
            <div class="banner_title">
                <h3> ATV INSURANCE</h3>
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
                    <img src="{{ asset('landing/goodinsured/img/site/atv.png') }}" alt="" style="width: 85px; ">
                </div>
                <div class="col-md-7 title">
                    <h3>
                        ATV Insurance Coverage
                    </h3>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="margin-bottom-100">

                <p class="business-paragraph-conten-one traller-second-section">
                    Wheeling surely gets your heart racing, but what does ATV insurance from GOODSInsured get you? Well, it may not get your blood pumping in quite the same way as hopping on your four-wheeler, but it does help you out if something should go wrong.<br /><br />

                    Here is a rundown of the coverages included in our customized ATV policy:<br /><br />

                    •   Collision coverage – pays for covered damage to your ATV when it hits, or is hit by, another vehicle or other object. This coverage is available with a $500 or $1,000 deductible.<br />
                    •   Property damage liability coverage – insures you against certain damages caused to someone else's property while operating your ATV and in most cases, provides you with a legal defense for such claims if another party files a lawsuit against you.<br />
                    •   Bodily injury liability coverage – insures you against certain damages if you injure or kill someone while operating your ATV and in most cases, provides you with a legal defense if another party in the accident files a lawsuit against you.<br />
                    •   Comprehensive physical damage coverage – pays for covered losses resulting from incidents other than collision - such as theft, fire or vandalism. This coverage is available with a $500 or $1,000 deductible and is limited to damage that affects the structure or safe operation of the vehicle.<br />
                    •   Medical payments coverage – in most states you can select medical coverage for yourself and your passengers.<br />
                    •   Uninsured/Underinsured motorists coverage – insures you against certain damages in the event of an accident that occurs on a public road or highway where you are struck by someone with no insurance coverage or limits that are lower than yours. The uninsured vehicle must be a vehicle that is designed to be insured and registered for use on a public road or highway (such as a car, truck, or motorcycle).<br />
                </p>
                <img src="{{ asset('landing/goodinsured/img/site/atv-three.png') }}" alt="" />
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
