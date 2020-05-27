<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 12/26/2019
 * Time: 1:27 AM
 */

$data = [
    'compare_title' => "Health"
];
?>

@extends('home.healthshop.layouts.master', $data)

@section('content')

    <div class="main">
        <div class="container health page_header_banner">
            <div class="banner_title">
                <h3> HEALTH INSURANCE</h3>
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
                    <h3> What is Health Insurance? </h3>
                </div>
            </div>
        </div>

        <div class="health_body container-fluid">

            <div class="desc">
                <p>Health insurance is a product that covers your medical expenses. Like auto insurance covers your car if you get into an accident, health insurance covers you if you get sick or injured. Health insurance also covers preventive care – i.e., doctors visits and tests before you get sick.</p>
                <p>Health insurance doesn’t always cover 100% of your costs. In fact, it’s designed to share costs with you up until a certain point, called the out-of-pocket limit. After you hit the out-of-pocket limit, health insurance will pay 100% of your healthcare costs.</p>
                <p>There are a few ways that health insurance companies might share costs with you, and they make up major features of your health insurance plan that you need to be aware of: your deductible, your copayment, your coinsurance, and your out-of-pocket limit. </p>
                <p>All health insurance plans need to cover the ten essential benefits. In addition to the ten essential benefits, health insurance plans must meet certain affordability standards, as well as other rules that vary on a state-by-state basis, in order to be included on a government-run health insurance exchange. Off-exchange plans, so called because they are not sold on government-run exchanges, must also cover the ten essential benefits and meet certain federal standards in order to be considered qualifying health coverage. These consumer protections closed loopholes that caused financial problems for policyholders in the past.</p>
                <p>As outlined by the Affordable Care Act (the ACA, also known as Obamacare), all American citizens must have qualifying health coverage. If you don’t, you’ll have to pay a fee on your federal tax return. The tax fee is calculated in one of two ways:</p>
                <p class="sign_text">2.5% of your household income or <br/>
                    $695 per adult and $347.50 per child under 18 <br/>
                    You’ll pay whichever is higher.</p>

                <img src="{{ asset('landing/healthshop/img/banner/h1.png') }}">

                <h3>Who should buy health insurance?</h3>

                <p>Literally everyone should buy health insurance because it’s mandatory (unless you qualify for a hardship exemption). But you might be thinking that it makes more sense to take the tax hit than to buy an expensive health insurance policy you don’t need. First, you should know that health insurance can be less expensive than the tax fee you face if you don’t have health insurance. Secondly, the amount you’d have to pay out-of-pocket for a medical emergency if you don’t have health insurance is much, much higher than the tax fee. Medical bills are a leading cause of consumer debt and related financial problems (e.g., bankruptcy and home foreclosure).</p>

                <div class="col-md-4 health_people">
                    <h3>For a Family</h3>
                    <p>If you have children, it’s likely that they may need to visit the doctor or urgent care more frequently than a relatively healthy adult. Make sure that your deductible, copayments, and coinsurance payments are affordable for you, as you may otherwise be paying out-of-pocket for a simple doctor’s visit.</p>
                </div>
                <div class="col-md-4 health_people">
                    <h3> Student</h3>
                    <p>
                        You can stay on a parent’s health insurance plan until you’re 26-years-old, so no need to buy health insurance if your parents are willing to let you stay on their plan. You can also check your university for health insurance plans, which may be more affordable. This is an especially good option if you’re going to college out-of-state, as your parent’s plan’s network may not work in your state.
                    </p>
                </div>
                <div class="col-md-4 health_people">
                    <h3>Self-employed</h3>

                    <p>Make sure your premiums are affordable, as your monthly income may be variable. Your health insurance premiums are also tax deductible, so don’t forget that come tax time. Additionally, if you travel frequently, you may want to purchase a plan that allows you to see out-of-network providers, like a PPO or POS plan.
                    </p>
                </div>

                <div class="col-md-4 health_people">
                    <h3>With Low-Income</h3>
                    <p>If your income is between 100% and 400% of the federal poverty line, you likely qualify for a subsidy from the health insurance marketplace. This subsidy can help make health insurance more affordable.
                    </p>
                </div>
                <div class="col-md-4 health_people">
                    <h3>Veteran

                    </h3>
                    <p>If you’re a veteran, you may qualify for health care through the U.S. Department of Veterans Affairs (VA). The Affordable Care Act does not change VA health benefits. If you qualify for VA health benefits, you do not need to purchase an additional health insurance plan to meet the Affordable Care Act’s health insurance mandate.</p>
                </div>
                <div class="col-md-4 health_people">
                    <h3>Pregnant</h3>
                    <p>All health insurance plans that count as qualifying health insurance cover pregnancy and childbirth related services. Maternity care and childbirth are one of the ten essential benefits required on qualifying health plans under the ACA. These services are covered even if you became pregnant before your coverage starts.</p>
                </div>
                <div class="col-md-4 health_people">
                    <h3>Senior Citizen</h3>
                    <p>If you’re above the age of 65, you likely qualify for Medicare.</p>

                    <p>  You can also purchase supplemental insurance, called Medigap, that can help pay for your deductibles, copayments, and coinsurance. Medigap plans may or may not make sense for you – make sure you know what you’re buying before you start to pay for it.</p>
                </div>
                <div class="col-md-4 health_people">
                    <h3>Military</h3>
                    <p>If you’re an active duty service member, your health care (and your family’s health care) is covered by TRICARE. You do not need to purchase additional health insurance to comply with the ACA.</p>
                </div>
                <div class="col-md-4 health_people">
                    <h3>Married, but don’t have kids</h3>
                    <p>If you’re married but don’t have kids, you don’t need to buy health insurance as a family. You can buy individual plans from separate companies, if that makes sense for you and your spouse. You can also purchase a family plan from the marketplace.</p>
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
                        <img src="{{ asset('landing/healthshop/img/site/b44.png') }}">
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
