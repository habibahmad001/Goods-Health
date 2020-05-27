
@extends('home.healthshop.layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('landing/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
@endpush

@section('content')

<div class="main">

    <div class="wrapper">
        <div class="banner_con">
            <h1>We provide insurance that suits what you need.</h1>
            <div class="insurance_list first owl-carousel owl-theme">
                <a href="javascript:void(0)" class="item">
                    <img src="{{ asset('landing/healthshop/img/site/i1.png') }}" alt="" />
                    <h3>Health</h3>
                </a>
                <a href="javascript:void(0)" class="item">
                    <img src="{{ asset('landing/healthshop/img/site/i2.png') }}" alt="" />
                    <h3>Life</h3>
                </a>
                <a href="javascript:void(0)" class="item">
                    <img src="{{ asset('landing/healthshop/img/site/i3.png') }}" alt="" />
                    <h3>Medicare</h3>
                </a>
                <a href="javascript:void(0)"class="item">
                    <img src="{{ asset('landing/healthshop/img/site/i4.png') }}" alt="" />
                    <h3>Dental</h3>
                </a>
                <a href="javascript:void(0)" class="item">
                    <img src="{{ asset('landing/healthshop/img/site/i5.png') }}" alt="" />
                    <h3>Critical Illness</h3>
                </a>
                <a href="javascript:void(0)" class="item">
                    <img src="{{ asset('landing/healthshop/img/site/i5.png') }}" alt="" />
                    <h3>Travel</h3>
                </a>
                <a href="javascript:void(0)" class="item">
                    <img src="{{ asset('landing/healthshop/img/site/i5.png') }}" alt="" />
                    <h3>Disability</h3>
                </a>
            </div>
            <div class="insurance_list owl-carousel owl-theme">

                <a href="javascript:void(0)" class="item">
                    <img src="{{ asset('landing/goodinsured/img/site/i5.png') }}" alt="" />
                    <h3>Vision</h3>
                </a>
                <a href="javascript:void(0)" class="item">
                    <img src="{{ asset('landing/goodinsured/img/site/i1.png') }}" alt="" />
                    <h3>Annuity</h3>
                </a>
                <a href="javascript:void(0)" class="item">
                    <img src="{{ asset('landing/goodinsured/img/site/i2.png') }}" alt="" />
                    <h3>Hospital</h3>
                </a>
                <a href="javascript:void(0)" class="item">
                    <img src="{{ asset('landing/goodinsured/img/site/i2.png') }}" alt="" />
                    <h3>Medigap</h3>
                </a>
                <a href="javascript:void(0)" class="item">
                    <img src="{{ asset('landing/goodinsured/img/site/i3.png') }}" alt="" />
                    <h3>PDP</h3>
                </a>
                <a href="javascript:void(0)"class="item">
                    <img src="{{ asset('landing/goodinsured/img/site/i4.png') }}" alt="" />
                    <h3>Accident</h3>
                </a>
                <a href="javascript:void(0)"class="item">
                    <img src="{{ asset('landing/goodinsured/img/site/i4.png') }}" alt="" />
                    <h3>Cancer</h3>
                </a>
            </div>
        </div>
    </div>
    <div class="how_bg">
        <div class="wrapper">
            @include('home.common.how_it_work')
        </div>
    </div>
    <div class="wrapper">
        @include('home.common.coverage')
    </div>
    <div class="how_bg">
        <div class="wrapper">
            @include("home.common.service")
        </div>
    </div>
    <div class="wrapper">
        @include('home.common.faq')
    </div>
    <div class="wrapper">
        <div class="how_work about_product">
            <h2>LEARN MORE ABOUT PRODUCTS</h2>
        </div>
        <div class="products">
            <div class="border-blue product-img health_product ">
                <p>Coverage that covers medical expense or preventive care for individuals and/ or families, often called medical insurance, or medical health plans.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/healthshop/img/site/health-icon.png') }}" alt="" />
                <h3>Health</h3>
            </div>
            <div class="border-blue product-img life_product">
                <p>Coverage that provides a tax-free lump sum of money to loved ones or beneficiary after the death of the policyholder to pay for bills, children’s college cost, or final expense.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/healthshop/img/site/life-icon.png') }}" alt="" />
                <h3>LIFE</h3>
            </div>
            <div class="border-blue  product-img pdp_product">
                <p>Coverage of prescription for 65+ year old individual in the federal subsidize program of Medicare.</p>
                <a href="#">LEARN MORE</a>
                <img src="{{ asset('landing/healthshop/img/site/pdp-icon.png') }}" alt="" />
                <h3>PDP</h3>
            </div>
        </div>
        <div class="products">
            <div class="border-blue  product-img  product_medicare">
                <p>Coverage that allows policyholder to be cover for services not covered by Medicare or MAPD, with most common service being personal care.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/healthshop/img/site/medicare-icon.png') }}" alt="" />
                <h3>MEDICARE</h3>
            </div>
            <div class="border-blue  product-img  product_dental">
                <p>Insurance coverage that will cover policyholder a for dental procedures and preventive care.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/healthshop/img/site/dental-icon.png') }}" alt="" />
                <h3>DENTAL</h3>
            </div>
            <div class="border-blue product-img  product_vision">
                <p>Insurance that similar to a discount plan provide discount advantages to cover for glasses and yearly preventive exam.</p>
                <a href="#">LEARN MORE</a>
                <img src="{{ asset('landing/healthshop/img/site/vision-icon.png') }}" alt="" />
                <h3>VISION</h3>
            </div>
        </div>
        <div class="products">
            <div class="border-blue  product-img  product_annuity">
                <p>Annuity is an investment product that pays out a sum of money to its owner over the course of a number of years.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/healthshop/img/site/ANNUITY-icon.png') }}" alt="" />
                <h3>ANNUITY</h3>
            </div>
            <div class="border-blue  product-img  product_hospital">
                <p>Often call hospitalization insurance or hospital indemnity help pays for bills resulting to cover out of pocket expense, loss of work, copays and deductible when a medical emergency occurs.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/healthshop/img/site/hospital-icon.png') }}" alt="" />
                <h3>HOSPITAL</h3>
            </div>
            <div class="border-blue product-img  product_medigap">
                <p>Supplemental insurance pays for out of pocket cost that original Medicare does not cover like copays, coinsurance and deductible when an illness or accident occurs for 65+ years of age.</p>
                <a href="#">LEARN MORE</a>
                <img src="{{ asset('landing/healthshop/img/site/medigap-icon.png') }}" alt="" />
                <h3>MEDIGAP/ SUPPLEMENT</h3>
            </div>
        </div>
        <div class="products">
            <div class="border-blue product-img product_disability ">
                <p>Insurance coverage that cover a % of your annual salary / paycheck if you can’t work due to illness or injury.</p>
                <a href="#">LEARN MORE</a>
                <img src="{{ asset('landing/healthshop/img/site/disability-icon.png') }}" alt="" />
                <h3>DISABILITY</h3>
            </div>

            <div class="border-blue product-img product_accident">
                <p>Insurance Coverage that pays benefits in case of accidental injuries. </p>
                <a href="#">LEARN MORE</a>
                <img src="{{ asset('landing/healthshop/img/site/accident-icon.png') }}" alt="" />
                <h3>ACCIDENT</h3>
            </div>

            <div class="border-blue product-img product_critical">
                <p>Coverage that makes a lump sum payment if policyholder is diagnosed with a covered illness or undergoes specified medical procedure. </p>
                <a href="#">LEARN MORE</a>
                <img src="{{ asset('landing/healthshop/img/site/critical_illness-icon.png') }}" alt="" />
                <h3>CRITICAL illness</h3>
            </div>
        </div>

        <div class="products">
            <div class="border-blue  product-img   col-md-offset-1 cancer_product">
                <p>Insurance policy that provides cash benefit to help cover the medical expense if you’re diagnose with cancer.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/healthshop/img/site/cancer-icon.png') }}" alt="" />
                <h3>CANCER</h3>
            </div>
            <div class="border-blue  product-img   col-md-offset-1 travel_product">
                <p>Protects from certain monetary and/ or medical risks that occur while traveling.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/healthshop/img/site/travel-icon.png') }}" alt="" />
                <h3>TRAVEL</h3>
            </div>
        </div>
    </div>

    <div class="how_bg">
        <div class="wrapper">
            <div class="how_work">
                <h2>OUR LATEST BLOGS</h2>
            </div>
            <div class="blogs">
                <div class="single-blog">
                    <a href="#">
                        <div class=" blog1">
                            <h3> Liability Insurance</h3>
                        </div>
                    </a>
                    <a href="#">READ MORE</a>
                </div>
                <div class="single-blog">
                    <a href="#">
                        <div class=" blog2">
                            <h3> Collision Insurance</h3>
                        </div>
                    </a>
                    <a href="#">READ MORE</a>
                </div>
                <div class="single-blog">
                    <a href="#">
                        <div class=" blog3">
                            <h3>Uninsured Motorist Coverage</h3>
                        </div>
                    </a>
                    <a href="#">READ MORE</a>
                </div>
                <div class="single-blog">
                    <a href="#">
                        <div class=" blog4">
                            <h3> Comprehensive Insurance</h3>
                        </div>
                    </a>
                    <a href="#">READ MORE</a>
                </div>
                <div class="single-blog">
                    <a href="#">
                        <div class=" blog5">
                            <h3> Personal Injury Protection Insurance</h3>
                        </div>
                    </a>
                    <a href="#">READ MORE</a>
                </div>
                <div class="single-blog">
                    <a href="#">
                        <div class=" blog6">
                            <h3>No-Fault Insurance</h3>
                        </div>
                    </a>
                    <a href="#">READ MORE</a>
                </div>
            </div>
        </div>
    </div>
    <div class="contact">
        <div class=" col-md-12">
            <h2>It's easy to start saving.</h2>
        </div>
        <div class="col-md-6 contact1">
            <div>
                <img src="{{ asset('landing/healthshop/img/site/contact2.png') }}" alt="" />
            </div>
            <div>
                <h3> Buy Online </h3>
                <p>Our easy-to-use tool lets you compare quotes from top providers, all at once and online.</p>
                <div>
                    <input type="text" placeholder=" Zip Code"/><button class="start-button"> Start <img src="{{ asset('landing/healthshop/img/site/start-arrow.png') }}" alt="" /> </button>
                </div>
                <p class="security-spam-text"> <img class="security-spam" src="{{ asset('landing/healthshop/img/site/security.png') }}" alt="" />No spam. We take your privacy seriously.</p>
            </div>
        </div>
        <div class="col-md-6 contact2">
            <div>
                <img src="{{ asset('landing/healthshop/img/site/contact.PNG') }}" alt="" />
            </div>
            <a href="javascript:void(0)" class="get_call" data-toggle="modal" data-target="#exampleModal"> GET A CALL FROM US </a>
            <img class="get_or"  src="{{ asset('landing/healthshop/img/site/or.png') }}" alt="" />
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-modal-header">
                    <h5 class="modal-title text-uppercase" id="exampleModalLongTitle">Make AN Appointment</h5>

                </div>
                <div class="modal-body">
                    <div class="col-md-12 bt-1-white">
                            <p class="text-black ">Contact us for inquiries, feeback or appoitnment with our Broker.</p>
                    </div>
                <div class="contact_form col-md-12">
                    <div class="form-group">
                        <label class="col-md-12">Full Name </label>
                        <input class="form-control bt-1-white" type="text" />
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Address </label>
                        <input class="form-control" type="text" />
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Zip Code </label>
                        <input class="form-control bt-1-white" type="text" />
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Phone No. </label>
                        <input class="form-control" type="text" />
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Email </label>
                        <input class="form-control" type="text" />
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Category </label>
                        <input class="form-control" type="text" />
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Subject </label>
                        <input class="form-control" type="text" />
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Description </label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 remember_label">Set Appointment with Broker </label>
                        <div class="col-md-4">
                            <div class="input-group date">
                                <input type="text" class="form-control bt-1-input" value="12-02-2012">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                            </div>
                        </div>
                        <select class="col-md-1">
                            <option>0.00</option>
                            <option>0.20</option>
                        </select>
                        <select class="col-md-1">
                            <option>AM</option>
                            <option>PM</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="submit" class="contact_submit"> Submit </button>
                </div>
                    <div class="form-group text-center" id="frm-captcha">
                        <div class="g-recaptcha" data-sitekey="6Le9keAUAAAAACIKZLzsssrWyFqqJVXTrVpzD2FJ"></div>
                    </div>
            </div>
        </div>
    </div>

    <div class="wrapper newsletter">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <h3 class="news_letter_text">Join our Newsletter for updates and latest promotions.</h3>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
            <input class="join_email" type="text" placeholder="Email Address" alt="" /><button class="btn-join">JOIN </button>
        </div>
    </div>

</div>
@endsection

@push('scripts')
    <script src="{{ asset('landing/owlcarousel/owl.carousel.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            // $(".owl-carousel").owlCarousel();

            $('.owl-carousel').owlCarousel({
                loop:true,
                autoplay:true,
                margin:100,
                nav:true,
                dots:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:4
                    }
                }
            });
        });


    </script>
@endpush
