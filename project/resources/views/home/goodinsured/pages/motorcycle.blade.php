<?php
/**
 * Created by PhpStorm.
 * User: Mobarok_Hossen
 * Date: 1/2/2020
 * Time: 2:46 AM
 */


$data = [
    'compare_title' => "Motorcycle"
]
?>

@extends('home.goodinsured.layouts.master', $data)

@section('content')
    <div class="main">
        <div class="container banner_con_motorcycle page_header_banner">
            <div class="banner_title">
                <h3> MOTORCYCLE INSURANCE</h3>
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
                        What does motorcycle insurance cover?
                    </h3>
                </div>
            </div>
        </div>
        <div class="health_body container-fluid">
            <div class="desc">
                <p> Of course you don't plan on crashing your bike or having it stolen but if bad luck gives you the nod, you'll be glad you have top notch cycle insurance coverage.
<br/>
<br/>
                    Having motorcycle insurance coverage benefits you, your bike and others on the road. Here is a rundown of the coverages included in a GOODSinsured motorcycle insurance policy:
                </p>

            </div>

        </div>

        <div class="Image-bg-area padding-bottom-1">
            <div class="content-container">
                <div class="auto-rec-three">
                    <div class="auto-rec-three-header">
                        Accessories Coverage
                    </div>
                    <div class="auto-rec-three-body">
                        Provides protection for your accessories. You must, however, carry comprehensive or collision coverage on your policy. Accessories may include: saddlebags, backrests, seats, chrome pieces and CB radios. If needed, additional coverage can be purchased. Collision coverage provides protection for your helmet as well. (Coverage amounts vary by state.)
                    </div>
                </div>

                <div class="auto-rec-three">
                    <div class="auto-rec-three-header">
                        Bodily Injury Liability Coverage
                    </div>
                    <div class="auto-rec-three-body">
                        Insures you against certain damages if you injure or kill someone while operating your motorcycle and also provides you with a legal defense if another party in the accident files a lawsuit against you. We have multiple limits of protection from which to choose.
                    </div>
                </div>

                <div class="auto-rec-three">
                    <div class="auto-rec-three-header">
                        Collision Coverage
                    </div>
                    <div class="auto-rec-three-body">
                        Pays for covered damage to your motorcycle when it hits, or is hit by, another vehicle.
                    </div>
                </div>

                <div class="auto-rec-three">
                    <div class="auto-rec-three-header">
                        Comprehensive Physical Damage Coverage
                    </div>
                    <div class="auto-rec-three-body">
                        Pays for covered losses resulting from incidents other than collision, such as theft, fire or vandalism.
                    </div>
                </div>

                <div class="auto-rec-three">
                    <div class="auto-rec-three-header">
                        Uninsured/Underinsured Motorist Coverage
                    </div>
                    <div class="auto-rec-three-body">
                        Pays for injuries caused by an uninsured driver in a crash that is not your fault.
                    </div>
                </div>

                <div class="auto-rec-three">
                    <div class="auto-rec-three-header">
                        Accessories Coverage
                    </div>
                    <div class="auto-rec-three-body">
                        Provides protection for your accessories. You must, however, carry comprehensive or collision coverage on your policy. Accessories may include: saddlebags, backrests, seats, chrome pieces and CB radios. If needed, additional coverage can be purchased. Collision coverage provides protection for your helmet as well. (Coverage amounts vary by state.)
                    </div>
                </div>

                <div class="auto-rec-three-last-section">
                    <div class="auto-rec-three-last-section-header">
                        Property Damage Liability Coverage
                    </div>
                    <div class="auto-rec-three-last-section-body">
                        Insures you against certain damages caused to someone else's property while operating your motorcycle and provides you with a legal defense for such claims if another party files a lawsuit against you. We have multiple limits of protection from which to choose.
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
