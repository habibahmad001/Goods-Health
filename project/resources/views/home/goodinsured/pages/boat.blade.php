<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 1/2/2020
 * Time: 2:56 AM
 */


$data = [
    'compare_title' => "Boat"
]
?>

@extends('home.goodinsured.layouts.master', $data)

@section('content')
    <div class="main">
        <div class="container banner_con_boat page_header_banner">
            <div class="banner_title">
                <h3> BOAT INSURANCE</h3>
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
                    <img src="{{ asset('landing/goodinsured/img/site/boat.png') }}" alt="" style="width: 85px; ">
                </div>
                <div class="col-md-7 title">
                    <h3>
                        Boat Insurance Coverage
                    </h3>
                </div>
            </div>
        </div>
        <div class="health_body container-fluid">
            <div class="desc">
                <b> Why is Boat Insurance Important? </b>
                <p> Boat insurance helps you enjoy peace of mind as you navigate your boat or personal watercraft (PWC). So if you travel across lakes, rivers, or ocean waters of the United States we can help. Whether you're looking for a new boat insurance policy or just to save money on an existing policy, we're can help you get started with a free boat insurance quote.
                </p>

            </div>
        </div>

        <div class="Image-bg-area-boat padding-bottom-1">
            <div class="content-container">
                <div class="boat-section-with-bg">
                    <div class="boat-section-with-bg-header">
                        What kind of boat do you have?
                    </div>
                    <div class="boat-section-with-bg-body">
                        Find your style of boat from the following list:
                    </div>
                </div>
                <div class="boat-section-with-bg-left boat-desc">
                    <ul>
                        <li> <b>Bow Rider – </b> Open bow type of boat with seating. They are best suited for use in lakes and inland waterways (16 - 28 feet).</li>
                        <li><b>Center Consoles – </b>  Single decked open hull boats with the operator's console (helm) in the center of the boat. Work great as fishing boats. Most are powered by outboard motors. (18 - 28 feet).</li>
                        <li><b>Cuddy Cabin – </b>  A boat that contains a small cabin in the bow (18 - 28 feet).</li>
                        <li> <b>Walk Around –  </b> Cross between center console and a cuddy boat. Generally used as fishing boats and they contain a small cabin. (18 - 28 feet).</li>
                        <li><b>Ski Boats – </b>  Flat bottom, high torque boats designed to safely tow water skiers. Powered by high-horsepower engines.</li>
                        <li><b>Pontoon –  </b> Relatively inexpensive, flat hulls that sit on pontoons. Commonly referred to as "party boats" (16 - 30 feet). Should only be used in calm inland waters.</li>
                    </ul>
                </div>
                <div class="boat-section-with-bg-right boat-desc">
                    <ul>
                        <li> <b>Jet Boats – </b>  Propelled by a jet of water ejected from the back of the craft. Come in a variety of sizes.</li>
                        <li><b>Personal Watercraft – </b>  A watercraft used for recreational purposes that you sit or stand on. Often referred to as WaveRunner, Jet Ski or Sea Doo which are actually brand names.</li>
                        <li><b>Sailboats –  </b> A boat propelled partially or entirely by sails. Can be used for racing, sport or just cruising.</li>
                        <li><b>Bass Boats –  </b> A small, flat bottom boat used primarily for bass fishing in inland waters. They are often equipped with swivel chairs for easy casting. (14 - 22 feet).</li>
                        <li>And other Fishing Boats too.</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="wrapper">
            <div>
                <div class="boat-section-with-bg-header three-section-heading-setting class-center">
                    What does boat insurance cover?
                </div>
                <div class="boat-three-section-area tr-service">
                    <div class="boat-three-section-area-heading">
                        Personal Water Craft (PWC) Insurance Coverage
                    </div>
                    <div class="boat-three-section-area-body">
                        <ul>
                            <li>Damage to another craft or dock</li>
                            <li>Physical damage to your PWC</li>
                            <li>Towing assistance</li>
                        </ul>
                    </div>
                </div>

                <div class="boat-three-section-area tr-service">
                    <div class="boat-three-section-area-heading">
                        Service and Claims
                    </div>
                    <div class="boat-three-section-area-body">
                        <ul>
                            <li>Licensed agents as passionate about boating as you are</li>
                            <li>Expert service including 24/7 claims handling and towing experience you can rely on</li>
                        </ul>
                    </div>
                </div>

                <div class="boat-three-section-area tr-service">
                    <div class="boat-three-section-area-heading">
                        24/7 Boat Towing
                    </div>
                    <div class="boat-three-section-area-body">
                        24/7 boat towing assistance,<br />
                        fuel delivery services and more<br />
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
                    <div class="atv">
                        <img src="{{ asset('landing/goodinsured/img/site/atv.png') }}" alt="" />
                        <h4>ATV</h4>
                    </div>
                </a>
                <a href="#" >
                    <div class="auto">
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
                    <div class="rv">
                        <img src="{{ asset('landing/goodinsured/img/site/rv.png') }}" alt="" />
                        <h4>RV</h4>
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
