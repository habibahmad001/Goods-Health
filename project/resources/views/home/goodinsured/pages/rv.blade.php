<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 1/2/2020
 * Time: 2:56 AM
 */


$data = [
    'compare_title' => "RV"
]
?>

@extends('home.goodinsured.layouts.master', $data)

@section('content')
    <div class="main">
        <div class="container banner_con_rv page_header_banner">
            <div class="banner_title">
                <h3> RV INSURANCE</h3>
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
                    <img src="{{ asset('landing/goodinsured/img/site/rv.png') }}" alt="" style="width: 85px; margin-top: 20PX;">
                </div>
                <div class="col-md-7 title">
                    <h3>
                        RV Insurance Coverage
                    </h3>
                </div>
            </div>
        </div>
        <div class="health_body container-fluid">
            <div class="desc rv-list">
                <p> RVers encounter situations that are unique to life on the road. So with that in mind, GEICO offers an enhanced Motorized RV and Towable RV insurance policy in most states.* These enhanced recreational vehicle insurance coverages include:</p>

                <ul>
                    <li><b>Total Loss Replacement – </b>provides you with a new, comparably-equipped RV if your RV is totaled within its first four model years. When the RV is in the fifth through seventh model years, the settlement is the higher of the actual cash value at the time of loss or the original documented purchase price. After the seventh model year, the settlement is on an actual cash value basis. (Coverage availability may vary by state and vehicle value.)</li>

                    <li><b>Replacement Cost Personal Effects – </b>pays for the replacement of your personal items in your RV that resulted from a covered loss. $1,000 or $5,000 of Replacement Cost Personal Effects coverage is automatically included at no additional cost with Comprehensive and Collision coverage depending upon the state in which the RV is rated. Additional limits of coverage are available up to $100,000 for additional premium.</li>

                    <li><b>Vacation Liability – </b>pays for Bodily Injury and Property Damage losses that occur at your vacation site. $10,000 of Vacation Liability coverage is automatically included at no additional cost with Comprehensive and Collision coverage.</li>

                    <li><b>Emergency Expense Coverage – </b>pays your expenses for hotels and transportation due to a covered loss. $1,000 of Emergency Expense coverage is automatically included at no additional cost with Comprehensive and Collision coverage.</li>

                    <li><b>Special Windshield Deductible – </b>charges nothing for RV windshield repair, and $50 for RV windshield replacement.</li>

                    <li><b>Recreational Vehicle Medical Payments Coverage – </b>pays the cost for necessary medical treatment that is caused in an RV accident, regardless of fault.</li>

                    <p>GEICO covers motorized recreational vehicles including Type A motorhomes, Type B motorhomes (van campers) and Type C motorhomes (mini motor homes), as well as sport utility recreational vehicles.</p>
                </ul>

            </div>

        </div>
        <div class="wrapper margin-bottom-100">

            <div class="rv-main-div">
                <img class="rv-three-left" src="{{ asset('landing/goodinsured/img/site/rv-three-left.png') }}" alt="" />
                <img class="rv-three-right" src="{{ asset('landing/goodinsured/img/site/rv-three-right.png') }}" alt="" />
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
