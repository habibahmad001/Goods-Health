<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 12/26/2019
 * Time: 1:28 AM
 */

    $data = [
        'compare_title' => "Life"
    ];
?>

@extends('home.healthshop.layouts.master', $data)

@section('content')


<div class="main">
    <div class="container life page_header_banner">
        <div class="banner_title">
            <h3> LIFE INSURANCE</h3>
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
                <img src="{{ asset('landing/healthshop/img/site/i2.png') }}">
            </div>
            <div class="col-md-8">
                <h3> What is Life Insurance? </h3>
            </div>
        </div>
    </div>
    <div class="health_body life-main container-fluid">
        <div class="desc">
            <p>Life insurance provides a tax-free lump sum of money to your loved ones after your death so you can make sure they’re able to pay everyday bills, children's college costs, or final expenses. A life insurance policy provides affordable financial protection — and invaluable peace of mind — to people with friends or family who rely on them.
            </p>

            <h3 class="life_basic">Life insurance basics:</h3>

            <ul>
                <li>You choose how many years your policy will last (the term) and the coverage amount that will be paid out if you die (the death benefit).</li>
                <li>You pay for the policy in the form of monthly or annual premiums. You can compare quotes from multiple life insurers to see the different monthly rates they 		charge for a policy.</li>
                <li>If you die while your life insurance policy is in effect, its death benefit is paid out to your chosen beneficiaries, who can use the money to pay off debts, cover 		expenses, like your monthly mortgage or rent payments, and more.</li>
            </ul>

        </div>
    </div>

    <div class="life_insurance">
        <div class="col-md-12 ">
            <h3>Types of life insurance</h3>

            <p>At the end of the day, most people will choose between two different types of life insurance: term life insurance, which lasts for a set amount of time before expiring, or whole life insurance, a type of permanent life insurance that has an investment-like cash value component and stays in effect for as long as you make the premium payments.</p>

            <p> Whole life insurance can be good for people with complex financial situations or estate planning needs, but term life is the right choice for most shoppers because it’s the cheaper and more straightforward option.</p>
        </div>
    </div>

    <div class="health_body feature">
        <div class="col-md-12 desc">
            <h3>Who needs life insurance?</h3>


            <p> If you have someone who depends on your income or services, you likely need life insurance. Life insurance policyholders commonly include:</p>

            <ul>
                <li><b>Students</b> — Did you know that your parents may be on the hook for your debt if they cosigned your student loans? Anyone with cosigned debt should consider life insurance, even if you’re young.</li>

                <li><b>Spouses</b> — Marriage complicates finances, and you’ll feel better if you know your significant other is taken care of regarding any shared debt or future  financial plans. </li>
                <li><b>Parents </b>— Whether it’s diapers or tuition, kids are expensive. A life insurance policy ensures their costs are taken care of from cradle to college. </li>
                <li><b>Homeowners </b>— Mortgages are the biggest, longest-lasting debt most people will take on. A good rule of thumb is to have a life insurance policy that lasts
                    as long as your mortgage. It's not uncommon for a policy to last 20 or 30 years. </li>
                <li><b>Business owners</b> — A smart business owner will have an insurance policy so their partners can keep the company going even after you’re gone. </li>
            </ul>
            <p style="margin-left: 35px;">You might consider life insurance even if you don’t fall into one of those buckets. For example, you can use a death benefit to leave behind a charitable gift 		to a museum or foundation.</p>


        </div>
    </div>
    <div class="health_body feature_img">
        <div class="col-md-12 ">
            <div class="life_feature"><img src="{{ asset('landing/healthshop/img/banner/l3.png') }}" /></div>
            <div class="life_feature"><img src="{{ asset('landing/healthshop/img/banner/l2.png') }}" /></div>
            <div class="life_feature"><img src="{{ asset('landing/healthshop/img/banner/l1.png') }}" /></div>
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

