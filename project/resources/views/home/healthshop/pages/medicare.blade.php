<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 12/26/2019
 * Time: 1:27 AM
 */
$data = [
    'compare_title' => "Medicare"
];
?>
@extends('home.healthshop.layouts.master', $data)

@section('content')

    <div class="main">
        <div class="container medicare page_header_banner">
            <div class="banner_title">
                <h3> MEDICARE INSURANCE</h3>
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
                    <img src="{{ asset('landing/healthshop/img/site/i3.png') }}">
                </div>
                <div class="col-md-8">
                    <h3> What is Medicare Insurance? </h3>
                </div>
            </div>
        </div>
        <div class="health_body medi-main container-fluid">
            <div class="desc">
                <p>
                    You’d think health insurance would cover all your medical costs in your senior years. Unfortunately it’s not quite that simple. Getting older often requires specific types of medical care, and without long-term care insurance millions of seniors can find themselves without insurance options to cover the bills.
                </p>

                <p>
                    Medicare pays for the costs of a nursing home and other kinds of elder care that seniors need, such as in-home nursing care.
                </p>

            </div>
        </div>

        <div class="life_insurance">
            <div class="col-md-12 ">
                <h3>What Does Medicare Cover?</h3>

                <p>Medicare insurance covers the costs associated with treating chronic illnesses or other ailments in old age, such as at-home care for Alzheimer’s patients or nursing home costs for people unable to live alone. In addition to nursing home costs LTC covers home health care, homemaker services, respite care and memory facilities.</p>

                <p> It does not cover costs of surgeries, prescription drugs and doctors’ visits—those are covered by health insurance in the case of most seniors.</p>
            </div>
        </div>

        <div class="health_body medi feature">
            <div class="col-md-12 desc">
                <h3>
                    Who Needs Medicare Insurance?
                </h3>


                <p> An estimated 3 out of 4 seniors will need some form of long-term care. But to understand who needs long-term care insurance, you first need to understand a couple things about Medicare and Medicaid:
                </p><p>
                    Medicare is health insurance automatically granted to all Americans 65 or older. It does not cover long-term care costs. Medicaid is health insurance given primarily to poorer Americans. It does cover long-term care, but only if you’re broke.
                </p><p>
                    If you’re thinking you can just give your kids your money when the time comes and qualify for Medicaid, think again. Here’s a full explainer on how your finances affect nursing home options, but the short version is that you can’t offload your money and qualify for Medicaid unless you did it more than 5 years ago.
                </p><p>
                    Nursing homes can be incredibly expensive—while nationwide averages hover just over $200 per day, they can easily run to $400 per day depending on your area. That’s anywhere from $75,000 - $150,000 per year. A 5-year stay in a nursing home can easily cost over $750,000.
                </p><p>
                    Long-term care insurance is worth considering for people with savings who don’t want to spend that much on elder care in their senior years.
                </p><p>
                    Couples are at an advantage if they’re buying long-term care insurance together, as a policy that covers both spouses is only moderately more expensive than buying an individual policy.
                </p><p>
                    If you’re broke and think you may always be, bummer. But the good news is, if you need Medicare will cover you. There’s no need to consider long-term care insurance.</p>

                <img style="margin-bottom: 0;" src="img/banner/m1.png') }}" width="90%"/>
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
