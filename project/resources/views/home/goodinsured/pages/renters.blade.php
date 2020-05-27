<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 12/26/2019
 * Time: 1:51 AM
 */

$data = [
    'compare_title' => "Renters"
]
?>

@extends('home.goodinsured.layouts.master', $data)

@section('content')

<div class="main">
    <div class="container renters_banner page_header_banner">
        <div class="banner_title">
            <h3> RENTERS</h3><h3> INSURANCE</h3>
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
                <img src="{{ asset('landing/goodinsured/img/site/z1.png') }}" alt="" style="width: 135px; " />
            </div>
            <div class="col-md-7 title">
                <h3>
                    Renters Insurance Coverage
                </h3>
            </div>
        </div>
    </div>
    <div class="health_body container-fluid">
        <div class="desc">
            <p>  Renters insurance helps protect yourself and your belongings if you experience the unexpected. A landlord's insurance policy covers the building, but not your personal items. If you rent an apartment, condo, house, etc., you need renters insurance. Take the next step to protect what you care about by getting a renters insurance quote today.
            </p>

        </div>

    </div>

    <div class="container-fluid renters_type">
        <div class="type1 ">
            <img src="{{ asset('landing/goodinsured/img/site/head1.png') }}" alt="" />
            <h3>What is renters insurance?</h3>

            <p> A Renters Insurance policy through GOODSInsured provides affordable coverage for yourself and your personal belongings for things like: </p>
            <div class="ul_list">
                <ul>
                    <li>Fire</li>
                    <li>Smoke damage	 </li>
                    <li>Vandalism	 </li>
                    <li>Visitor injuries	 </li>
                </ul>
            </div>
            <div  class="ul_list">
                <ul>
                    <li>Water damage	 </li>
                    <li>Theft	 </li>
                    <li>Windstorm	 </li>
                </ul>
            </div>

        </div>
        <div class="type2 ">
            <img src="{{ asset('landing/goodinsured/img/site/tv2.png') }}" alt="" />
            <h3>What is covered by renters insurance?</h3>

            <p> Commonly covered items include: </p>

            <ul>
                <li>Electronics and appliances	 </li>
                <li>Furniture and clothing	 </li>
                <li>Extra expenses if property is uninhabitable due to a covered loss	 </li>
                <li>Accidental damage to someone else's property	 </li>
                <li>Medical expenses and/or legal fees if someone is injured on your property	 </li>
            </ul>
        </div>
    </div>

    <div class="health_body container-fluid">

        <div class="desc">
            <h3>How much does renters insurance cost?</h3>
        </div>

        <div class="col-md-4 desc condo renters_cost">
            <img src="{{ asset('landing/goodinsured/img/site/renter1.png') }}" alt=""   style="width: 65px !important;"/>
            <h3> Multi-Policy Discount
            </h3>
            <p>When you insure your car with us and have a renters insurance policy through the GOODSInsured, you could get a discount on your car insurance.</p>

        </div>

        <div class="col-md-4 desc condo renters_cost">
            <img src="{{ asset('landing/goodinsured/img/site/renter3.png') }}" alt=""  style="width: 67px !important;') }}" alt="" />
            <h3>Home Security Systems</h3>
            <p>If you live in a building with security staff or if you installed a burglar alarm on the property, your wallet could feel more secure with another discount.</p>
        </div>

        <div class="col-md-4 desc condo renters_cost">
            <img src="{{ asset('landing/goodinsured/img/site/renter2.png') }}" alt=""   style="width: 73px !important;') }}" alt="" />
            <h3>Sprinklers or Smoke Alarms</h3>
            <p>Smoke alarms save lives and could save you money with a discount on renters insurance. Same goes for fire extinguishers.</p>
        </div>
    </div>
    <div class="health_body container-fluid">
        <div class="desc">
            <img src="{{ asset('landing/goodinsured/img/banner/renters1.png') }}" alt="" />
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
                    <img src="{{ asset('landing/goodinsured/img/site/icon3.png') }}" alt="" />>
                    <h4>Homeowners</h4>
                </div>
            </a>
            <a href="#" >
                <div class="condo_item">
                    <img src="{{ asset('landing/goodinsured/img/site/icon2.png') }}" alt="" />>
                    <h4>CONDO</h4>
                </div>
            </a>
            <a href="#" >
                <div class="pet">
                    <img src="{{ asset('landing/goodinsured/img/site/icon4.png') }}" alt="" />>
                    <h4>PET</h4>
                </div>
            </a>
            <a href="#" >
                <div class="flood">
                    <img src="{{ asset('landing/goodinsured/img/site/flood.png') }}" alt="" />>
                    <h4>FLOOD</h4>
                </div>
            </a>
            <a href="#" >
                <div class="trailer">
                    <img src="{{ asset('landing/goodinsured/img/site/trailer.png') }}" alt="" />>
                    <h4>Trailer</h4>
                </div>
            </a>
            <a href="#" >
                <div class="mobile_home">
                    <img src="{{ asset('landing/goodinsured/img/site/mobile_home.png') }}" alt="" />>
                    <h4>Mobile Home</h4>
                </div>
            </a>
            <a href="#" >
                <div class="rv">
                    <img src="{{ asset('landing/goodinsured/img/site/rv.png') }}" alt="" />>
                    <h4>RV</h4>
                </div>
            </a>
            <a href="#" >
                <div class="auto">
                    <img src="{{ asset('landing/goodinsured/img/site/icon1.png') }}" alt="" />>
                    <h4>Auto</h4>
                </div>
            </a>
        </div>
    </div>
</div>


@endsection


