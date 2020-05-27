
@extends('home.goodinsured.layouts.master')

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
                    <img src="{{ asset('landing/goodinsured/img/site/icon1.png') }}" alt="" />
                    <h3>Auto</h3>
                </a>
                <a href="javascript:void(0)" class="item">
                    <img src="{{ asset('landing/goodinsured/img/site/i2.png') }}" alt="" />
                    <h3>Condo</h3>
                </a>
                <a href="javascript:void(0)" class="item">
                    <img src="{{ asset('landing/goodinsured/img/site/i3.png') }}" alt="" />
                    <h3>Homeowners</h3>
                </a>
                <a href="javascript:void(0)"class="item">
                    <img src="{{ asset('landing/goodinsured/img/site/pet.png') }}" alt="" />
                    <h3>Pet</h3>
                </a>
                <a href="javascript:void(0)" class="item">
                    <img src="{{ asset('landing/goodinsured/img/site/rv.png') }}" alt="" />
                    <h3>RV</h3>
                </a>

            </div>
            <div class="insurance_list owl-carousel owl-theme">
                <a href="javascript:void(0)" class="item">
                    <img src="{{ asset('landing/goodinsured/img/site/moto.png') }}" alt="" />
                    <h3>Motorcycle</h3>
                </a>
                <a href="javascript:void(0)" class="item">
                    <img src="{{ asset('landing/goodinsured/img/site/trailer.png') }}" alt="" />
                    <h3>Trailer</h3>
                </a>
                <a href="javascript:void(0)"class="item">
                    <img src="{{ asset('landing/goodinsured/img/site/boat.png') }}" alt="" />
                    <h3>Boat</h3>
                </a>
                <a href="javascript:void(0)" class="item">
                    <img src="{{ asset('landing/goodinsured/img/site/icon8.png') }}" alt="" />
                    <h3>Business Owner</h3>
                </a>
                <a href="javascript:void(0)" class="item">
                    <img src="{{ asset('landing/goodinsured/img/site/rideshare.png') }}" alt="" />
                    <h3>Rideshare</h3>
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
        <div class="products index">
            <div class="border-blue product-img product_auto ">
                <p>
                    A Car Insurance Policy help with financial stoppage in case you, and possibly others, are involved in an accident, victims of vandalism, or theft. All states in the US required minimum auto insurance coverage. </p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/auto-white.png') }}" alt="" />
                <h3>Auto</h3>
            </div>
            <div class="border-blue product-img product_motorcycle">
                <p>Motorcycle insurance coverage benefits you, your bike, and others on the road. Most states in the US required minimum motorcycle insurance coverage to operate on public streets.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/motorcycle-white.png') }}" alt="" />
                <h3>MOTORCYCLE</h3>
            </div>
            <div class="border-blue  product-img product_atv">
                <p>ATVs are associated with relatively high rates of injuries. Accidents happen you may inadvertently injure or cause damage to someone else.</p>
                <a href="#">LEARN MORE</a>
                <img src="{{ asset('landing/goodinsured/img/site/atv-white.png') }}" alt="" />
                <h3>ATV</h3>
            </div>
        </div>
        <div class="products index">
            <div class="border-blue  product-img  product_rv">
                <p>Before your next big trip, whether it's an RV, motor home, travel trailer, or camper make sure you have the right RV insurance policy. Most states in the US required liability insurance on your RV to operate on public streets</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/rv-white.png') }}" alt="" />
                <h3>RV</h3>
            </div>
            <div class="border-blue  product-img  product_trailer">
                <p>Trailers are considered specialty vehicles and will required additional coverage to be 100% liability free.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/trailer-white.png') }}" alt="" />
                <h3>Trailer</h3>
            </div>
            <div class="border-blue product-img  product_mobilehome">
                <p>Mobile or manufactured home insurance coverage can protect from multiple accident scenario. Like Fire, Windstorm, Falling objects, Lightening, Explosion, Visitors Injuries and more.
                </p>
                <a href="#">LEARN MORE</a>
                <img src="{{ asset('landing/goodinsured/img/site/mobilehome-white.png') }}" alt="" />
                <h3>Mobile Home</h3>
            </div>
        </div>
        <div class="products index">
            <div class="border-blue product-img product_rideshare ">
                <p>If you are shuttling as a driver or on-demand deliveries you need the proper coverage. You could lose personal auto coverage, and pay out of pocket for repairs, injuries and more.</p>
                <a href="#">LEARN MORE</a>
                <img src="{{ asset('landing/goodinsured/img/site/rideshare-white.png') }}" alt="" />
                <h3>Rideshare</h3>
            </div>

            <div class="border-blue product-img product_boat">
                <p>Get peace of mind when driving your boat, some of the coverages include damages to another craft or dock, physical damage or towing assistance.</p>
                <a href="#">LEARN MORE</a>
                <img src="{{ asset('landing/goodinsured/img/site/boat-white.png') }}" alt="" />
                <h3>Boats</h3>
            </div>

            <div class="border-blue product-img product_collectio_auto">
                <p>If you’re a proud owner of a vintage, antique, or collectible car, you need a correct coverage for your investment. Vintage is car 1994 year or older, a new exotic car, or classic military vehicle plus to qualify it needs to be used in exhibitions & store in fully enclosed and locked structure.</p>
                <a href="#">LEARN MORE</a>
                <img src="{{ asset('landing/goodinsured/img/site/collection-auto-white.png') }}" alt="" />
                <h3>Collection Auto</h3>
            </div>
        </div>
        <div class="products index">
            <div class="border-blue product-img product_homeowner">
                <p>Home is where the heart is plus a good portion of your personal net worth, make sure is protected. Coverage can protect from Fire, Wind, Hail, Water Damages, Personal Liability, Medical Bills, Jewelry and more. </p>
                <a href="#">LEARN MORE</a>
                <img src="{{ asset('landing/goodinsured/img/site/homeowner-white.png') }}" alt="" />
                <h3>Homeowner</h3>
            </div>
            <div class="border-blue  product-img product_renters">
                <p>If you are renting protect yourself and your belonging from the unexpected. Coverage extends to Fire, Smoke Damage, Vandalism, Theft, Windstorm, Water Damage, Visitor injuries and more.</p>
                <a href="#">LEARN MORE</a>
                <img src="{{ asset('landing/goodinsured/img/site/renters-white.png') }}" alt="" />
                <h3>Renters</h3>
            </div>
            <div class="border-blue product-img product_condo">
                <p>A lot of the condo association’s master policy does not cover what is most important to you, what is inside your condo unit. Get the correct coverage to protect your unit, personal properties from fire, lightning, theft, vandalism, certain type of accidents and water damage.</p>
                <a href="#">LEARN MORE</a>
                <img src="{{ asset('landing/goodinsured/img/site/condo-white.png') }}" alt="" />
                <h3>Condo</h3>
            </div>
        </div>
        <div class="products index">
            <div class="border-blue product-img  pet_product">
                <p>Protect your four-legged family members, pets get hurt or sick. Coverage can extend to accidents, illness (not pre-existing), dental issues, cancer and more.</p>
                <a href="#">LEARN MORE</a>
                <img src="{{ asset('landing/goodinsured/img/site/pet-white.png') }}" alt="" />
                <h3>Pet</h3>
            </div>
            <div class="border-blue product-img  flood_product">
                <p>Give extra protection to your home from severe water damage. Backed by the federal government, cover damages not offer by homeowner’s policies, tailored to demographic. </p>
                <a href="#">LEARN MORE</a>
                <img src="{{ asset('landing/goodinsured/img/site/flood-white.png') }}" alt="" />
                <h3>Flood</h3>
            </div>
            <div class="border-blue product-img business_owner_product ">
                <p>BOP (business owner’s policy) protects businesses from bodily injuries or property damage, , business interruption incident, Defense costs for covered liability, protection of business property such as furniture and equipment. Usual customers: Salons, Offices, Professional consultants, consumer services, apartment buildings, retail stores.</p>
                <a href="#">LEARN MORE</a>
                <img src="{{ asset('landing/goodinsured/img/site/business-owner-white.png') }}" alt="" />
                <h3>Business Owner</h3>
            </div>
        </div>
        <div class="products index">
            <div class="border-blue product-img  general_liability_product">
                <p>Protect businesses from claims as a result of normal business operations, Slip-and-fall accidents, property damage, physical injury, libel or slander lawsuits, personal and advertising injury.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/general-laibility-white.png') }}" alt="" />
                <h3>GENERAL LIABILITY</h3>
            </div>
            <div class="border-blue product-img product_laibility ">
                <p>Call often by Errors & Omission insurance provides businesses with protection in case of damages from professional service or advice. Coverage protects against mistakes or negligence, professional negligence lawsuits, copyright infringement, personal injury for libel or slander.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/liability-white.png') }}" alt="" />
                <h3>Professional Liability</h3>
            </div>
            <div class="border-blue product-img worker_product ">
                <p>This is a required in almost every state. This insurance covers medical expenses, lost wages, rehabilitation services, and death benefits in case of an employee’s work-related injuries or illness.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/workers-white.png') }}" alt="" />
                <h3>WORKERS COMPENSATION</h3>
            </div>
        </div>
        <div class="products index">
            <div class="border-blue  product-img commercial_product">
                <p>If you use a vehicle for your business, this is the policy to get. Some of the covered vehicles may include Cars, vans, ick trucks, box trucks, service utility trucks, food trucks, semi-trucks and tractor-trailers.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/commercial-white.png') }}" alt="" />
                <h3>COMMERCIAL AUTO</h3>
            </div>
            <div class="border-blue  product-img hired_product">
                <p>Policy covers business’s liability in accidents that occur while driving leased vehicles, rentals and employee-owned cars. Accident in leased vehicles, accident in rental cars, accidents in employee-owned vehicles doing business task are all candidates for coverage.
                </p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/hired-icon.png') }}" alt="" />
                <h3>HIRED AND NON-OWNED AUTO</h3>
            </div>
            <div class="border-blue  product-img error_product">
                <p>Common with professional services, will cover legal fees of lawsuits related to work performance. Business disputes, Negligence accusations, Work errors.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/error-icon.png') }}" alt="" />
                <h3>ERROR AND OMISSIONS</h3>
            </div>
        </div>
        <div class="products index">
            <div class="border-blue  product-img cyber_product">
                <p>Coverage helps businesses survive data breaches and cyberattacks by helping pay for recovery expenses and associated costs. Data breach lawsuits, breach notification expenses, fraud monitoring costs. </p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/cyber-icon.png') }}" alt="" />
                <h3>CYBER LIABILITY</h3>
            </div>
            <div class="border-blue  product-img umbrella_product">
                <p>This policy provides additional coverage once another policy limit is reached. It can boost coverage on general liability insurance and other liability policies. </p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/umbrella-icon.png') }}" alt="" />
                <h3>UMBRELLA/ EXCESS LIABILITY</h3>
            </div>
            <div class="border-blue  product-img com_pro_product">
                <p>This coverage covers the value of a business’s physical structure and its contents like inventory, equipment and furniture.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/commercial-property-icon.png') }}" alt="" />
                <h3>COMMERCIAL PROPERTY</h3>
            </div>
        </div>
        <div class="products index">
            <div class="border-blue  product-img business_inter_product">
                <p>Coverage for when the unexpected happens to your business and it must close temporary, covers loss of revenue, day to day expense and rent or relocation costs.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/business-interup-icon.png') }}" alt="" />
                <h3>BUSINESS INTERRUPTION</h3>
            </div>
            <div class="border-blue  product-img inland_product">
                <p>This type of insurance covers products, tools and equipment while its in transit over land or stored at an off-site location. It is a floater policy, meaning coverage moved with insured property. </p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/inland-icon.png') }}" alt="" />
                <h3>INLAND MARINE</h3>
            </div>
            <div class="border-blue  product-img pro_lia_product">
                <p>Cover a product company sells when it damages someone’s property, cause bodily paint to someone or makes them sick. It is most useful with manufacturers, distributors, retailers, and restaurant owners. </p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/product-liability-icon.png') }}" alt="" />
                <h3>PRODUCT LIABILITY</h3>
            </div>
        </div>
        <div class="products index">
            <div class="border-blue  product-img emp_prectice_product">
                <p>Is coverage in case a business is sued by an employee over wrongful termination or another violation of employee rights, EPLI pays for legal costs. </p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/employment-icon.png') }}" alt="" />
                <h3>EMPLOYMENT PRACTICES LIABILITY</h3>
            </div>
            <div class="border-blue  product-img director_product">
                <p>Coverage that protects board members and officers against legal expense if sued over a decision that led to financial loss.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/director-icon.png') }}" alt="" />
                <h3>DIRECTORS AND OFFICERS</h3>
            </div>
            <div class="border-blue  product-img event_product">
                <p>Coverage protects from liability exposure for a specified dates when organizing a party, fundraiser or other special event. </p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/special-event-icon.png') }}" alt="" />
                <h3>SPECIAL EVENT</h3>
            </div>
        </div>
        <div class="products index">
            <div class="border-blue  product-img liquity_product">
                <p>Coverage for legal fees, settlements, and medical costs if alcohol is sold to an intoxicated person that harm others or damages property. </p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/liquity-icon.png') }}" alt="" />
                <h3>LIQUOR LIABILITY INSURANCE</h3>
            </div>
            <div class="border-blue  product-img builder_product">
                <p>Also known as course of construction insurance covers structures under construction for damages related to fire, theft, vandalism and other risks.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/builders-icon.png') }}" alt="" />
                <h3>BUILDERS RISK</h3>
            </div>
            <div class="border-blue  product-img contract_product">
                <p>This type of coverage helps pay for repair or replacement of a contractor’s tools and equipment if they are lost, stolen or damaged, items TYPICALLY must be less than five years old.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/contactor-icon.png') }}" alt="" />
                <h3>CONTRACTOR'S TOOLS AND EQUIPMENT</h3>
            </div>
        </div>
        <div class="products index">
            <div class="border-blue  product-img fidely_product">
                <p>Type of bond that provides reimbursement if an employee of a business commits fraud, theft, or forgery against a client or your business.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/bond-icon.png') }}" alt="" />
                <h3>FIDELITY BONDS</h3>
            </div>
            <div class="border-blue  product-img surety_product">
                <p>Bonds that act as a contract between business, a client and an insurance carrier, it often guarantee the insurer will reimburse the client if business fails to deliver on a contracted service.</p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/surety-bond-icon.png') }}" alt="" />
                <h3>SURETY BONDS</h3>
            </div>
            <div class="border-blue  product-img licese_product">
                <p>Bond that guarantees that a business will complete a project in accordance with ordinance, regulations, and industry standards, contractors often required this policy. </p>
                <a href="#">LEARN MORE</a>

                <img src="{{ asset('landing/goodinsured/img/site/lisence-icon.png') }}" alt="" />
                <h3>LICENSE/ PERMIT BONDS</h3>
            </div>
        </div>
    </div>

    <div class="how_bg">
        <div class="wrapper">
            <div class="how_work">
                <h2>Our latest guides & resources</h2>
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
                <img src="{{ asset('landing/goodinsured/img/site/contact2.png') }}" alt="" />
            </div>
            <div>
                <h3> Buy Online </h3>
                <p>Our easy-to-use tool lets you compare quotes from top providers, all at once and online.</p>
                <div>
                    <input type="text" placeholder=" Zip Code"/><button class="start-button"> Start <img src="{{ asset('landing/goodinsured/img/site/start-arrow.png') }}" alt="" /> </button>
                </div>
                <p class="security-spam-text"> <img class="security-spam" src="{{ asset('landing/goodinsured/img/site/security.png') }}" alt="" />No spam. We take your privacy seriously.</p>
            </div>
        </div>
        <div class="col-md-6 contact2">
            <div>
                <img src="{{ asset('landing/goodinsured/img/site/contact.PNG') }}" alt="" />
            </div>
            <a href="javascript:void(0)" class="get_call" data-toggle="modal" data-target="#exampleModal"> GET A CALL FROM US </a>
            <img class="get_or"  src="{{ asset('landing/goodinsured/img/site/or.png') }}" alt="" />
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
