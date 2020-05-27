<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 12/26/2019
 * Time: 1:27 AM
 */

$data = [
    'compare_title' => "Dental"
];
?>
@extends('home.healthshop.layouts.master', $data)

@section('content')

    <div class="main">
        <div class="container dental page_header_banner">
            <div class="banner_title">
                <h3> DENTAL INSURANCE</h3>
            </div>
            <div class="banner_tag">
                <h3> Existing policyholder?</h3>
                <h3> <a href="#"> Access your account.</a></h3>
            </div>
        </div>


        @include('home.common.quote-search')

        <div class="health_body">
            <div class="col-md-12 health_title">
                <div class="col-md-4">
                    <img src="{{ asset('landing/healthshop/img/site/i4.png') }}">
                </div>
                <div class="col-md-8">
                    <h3> What is Dental Insurance? </h3>
                </div>
            </div>
        </div>
        <div class="health_body dental-main container-fluid">
            <div class="desc">
                <p>
                    Dental insurance helps protect you from unexpected dental expenses and makes it easier to afford to keep up the regular checkups, cleanings and other preventive treatments you need to keep your mouth healthy. </p>
                <p>
                    Like medical insurance, dental insurance provides benefits for a specific rate or premium. Different plan designs offer various levels of coverage and different choices in which dentists you can visit. </p>

                <p>The major differences between dental insurance plans:</p>

                <ul>
                    <li>The choice of dentists</li>
                    <li>Your out-of-pocket costs</li>
                    <li>How dental treatments are paid</li>
                </ul>

                <p> Most types of insurance, like a dental PPO, DPO, DHMO or prepaid plan, rely on a network of dentists. These participating dentists agree to perform services for patients at pre-determined rates and usually will submit claims for you. You'll usually pay less when you visit a network dentist.
                </p>

                <p>
                    Most (but not all) traditional indemnity or fee-for-service insurance products do not provide a network feature, so you may have to pay for services up front, file your own claims, and wait for the insurance carrier to reimburse you. However, there are advantages such as having the freedom to visit the dentist of your choice.
                </p>

            </div>
        </div>
        <div class="health_body">
            <div class="desc">
                <h3>
                    Types of Dental Plans
                </h3>
            </div>
            <div class="dental_feature">
                <div>
                    <h4>PPO dental plans</h4>
                    <p>Dental PPO (Preferred Provider Organization) plans offer a network feature and usually offer a balance between lower costs and dentist choice. PPO dentists participate in the network thereby agreeing to accept contracted fees as payment in full rather than their usual fee for patients with the PPO. When you visit a PPO dentist, you typically pay a certain percentage of the reduced rate (called coinsurance) and the plan pays the rest. The percentage usually varies by the type of coverage such as diagnostic and preventive, major services, etc.</p>
                </div>
                <div>
                    <h4>Prepaid, fixed copayment dental plans</h4>
                    <p>A typical DHMO-type plan doesn't have any deductibles or maximums. Instead, when you receive a dental service, you pay a fixed dollar amount for the treatment (a "copayment"). Often, diagnostic and preventive services have no copayment, so you pay nothing for these services. However, generally if you visit a dentist outside of the network, you may be responsible for the entire bill. These plans can be a very affordable option for individuals and families.</p>
                </div>
                <div>
                    <h4>Fee-for-service dental plans</h4>
                    <p> Fee-for-service plans, also known as indemnity or traditional plans, typically offer the greatest choice of dentists. Like PPO plans, when you visit a network dentist, you typically pay a certain percentage for each service (called coinsurance) and the plan pays the rest. The percentage usually varies by the type of coverage, such as diagnostic and preventive, major services, etc. For example preventive services may be covered at 80% (you would pay 20%) while crowns and bridges may be covered at 50%. Indemnity plans usually require you to meet a deductible and have an annual maximum amount of coverage (example $1,000 a year).
                    </p>
                </div>
                <div>
                    <h4>Dental discount plans</h4>
                    <P> Discount plans, or reduced-fee-for-service plans are not insurance but instead offer access to dental services at a discounted rate from participating dentists for a monthly or annual charge. There is generally no paperwork, annual limits or deductibles, but you must visit a participating dentist to receive the discount. Also, you may be responsible for a greater portion of the treatment cost than with a PPO or DHMO plan. We do not offer discount plans currently.</P>
                </div>
            </div>
        </div>



        <div class="health_body treatment">
            <div class="col-md-12 health_find">
                <h3>
                    Check out more of our insurance products:
                </h3>
            </div>
            <div class="col-md-12 health_treatment">
                <a href="#" >
                    <div>
                        <img src="{{ asset('landing/healthshop/img/site/i2.png') }}">
                        <h4>Life</h4>
                    </div>
                </a>
                <a href="#" >
                    <div>
                        <img src="{{ asset('landing/healthshop/img/site/i3.png') }}">
                        <h4>Medicare</h4>
                    </div>
                </a>
                <a href="#" >
                    <div>
                        <img src="{{ asset('landing/healthshop/img/site/b4.png') }}">
                        <h4>Dental</h4>
                    </div>
                </a>
                <a href="#" >
                    <div>
                        <img src="{{ asset('landing/healthshop/img/site/i5.png') }}">
                        <h4>Vision</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>


@endsection
