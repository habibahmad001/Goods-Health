<?php
/**
 * Created by PhpStorm.
 * User: Mobarok Hossen
 * Date: 23-Dec-19
 * Time: 3:58 PM
 */
?>


<header>

    @include('home.common.top_header')

    <div class="bottom_head">
        <a href="javascript:void(0)" class="hamburger"><span></span></a>
        <div class="bottom_wrap cf">
            <div class="nav_left">
                <ul>
                    <li>
                        <a href="javascript:void(0)" class="location"> Quote Location<img src="{{ asset('landing/goodinsured/img/site/pin.png') }}" alt=""/></a>
                    </li>
                    <li>|</li>
                    <li>
                        <a href="javascript:void(0)" class="login"><img src="{{ asset('landing/goodinsured/img/site/login_icon.png') }}" alt=""/> Login</a>
                    </li>
                    <li>|</li>
                    <li>
                        <a href="javascript:void(0)" class="search"><img src="{{ asset('landing/goodinsured/img/site/serch.png') }}" alt=""/></a>
                    </li>
                </ul>
                <div class="search_drop">
                    <h3>SEARCH: The Health Shop</h3>
                    <form action="">
                        <input type="text" class="in">
                        <input type="submit" class="submit" value="SEARCH">
                    </form>
                    <div class="hi_search">
                        <h6>Top Searches</h6>
                        <span><a href="javascript:void(0)">Insurance in Florida</a></span>
                        <span><a href="javascript:void(0)">Contact Us</a></span>
                        <span><a href="javascript:void(0)">Get An Insurance Quote</a></span>
                    </div>
                    <a href="javascript:void(0)" class="feedback">
                        <img src="{{ asset('landing/goodinsured/img/site/feed.png') }}" alt=""/>
                    </a>
                </div>
                <div class="location_drop">

                    <form action="">
                        <h3>State</h3>
                        <input type="text" class="in">
                        <h3>City/Zipcode</h3>
                        <input type="text" class="in">
                        <input type="submit" class="submit" value="SUBMIT">
                    </form>
                </div>
                <div class="login_drop">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <center>
                                @if(Session::has('error'))

                                    <strong style="color: red;font-size: 20px;">
                                        {{ Session::get('error') }}
                                    </strong>

                                @endif
                            </center>
                            <div class="form-group">
                                <label> User ID / Email </label>
                                <input type="text" class="header-input" name="email" class="in @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label> Password </label>
                                <input id="password"  class="header-input" type="password" class="in @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label class="remember_label">
                                        <input type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                      <label class="rem_text"> Remember Username/Password</label>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="submit" value="Login">
                            </div>
                            <div class="form-group text-center" id="frm-captcha">
                                <div class="g-recaptcha" data-sitekey="6Le9keAUAAAAACIKZLzsssrWyFqqJVXTrVpzD2FJ"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label"> <a href="#" class="red-text">Forgot User ID / Password?</a></label>
                                <label class="form-label"> <a href="#" class="red-text"> Signup here for an account. </a></label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="nav_right">
                <ul>
                    <li class="drop_infomation mobile-menu" >
                        <a href="javascript:void(0)">Insurance <i class="fa fa-caret-down"></i></a>
                        <ul class="info_drop">
                            <li class="treeview">
                                <a href="javascript:void(0)">
                                    <span><img src="{{ asset('landing/goodinsured/img/site/f1.png') }}" alt=""/></span>
                                    <h6>Vehicle Insurance</h6>
                                </a>
                                <ul class="inner_drop treeview-menu">
                                    <li><a href="{{ route('goodinsured.auto') }}">Auto</a></li>
                                    <li><a href="{{ route('goodinsured.motorcycle') }}">Motorcycle</a></li>
                                    <li><a href="{{ route('goodinsured.atv') }}">ATV</a></li>
                                    <li><a href="{{ route('goodinsured.rv') }}">RV</a></li>
                                    <li><a href="{{ route('goodinsured.trailer') }}">Trailer</a></li>
                                    <li><a href="{{ route('goodinsured.mobile-home') }}">Mobile home</a></li>
                                    <li><a href="{{ route('goodinsured.collection_auto') }}">Collector Auto</a></li>
                                    <li><a href="{{ route('goodinsured.rideshare') }}">Rideshare</a></li>
                                    <li><a href="{{ route('goodinsured.boat') }}">Boats</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="javascript:void(0)">
                                    <span><img src="{{ asset('landing/goodinsured/img/site/f2.png') }}" alt=""/></span>
                                    <h6>Property Insurance</h6>
                                </a>
                                <ul class="inner_drop">
                                    <li><a href="{{ route('goodinsured.homeowners') }}">Homeowners</a></li>
                                    <li><a href="{{ route('goodinsured.renters') }}">Renters</a></li>
                                    <li><a href="{{ route('goodinsured.condo') }}">Condo</a></li>
                                    <li><a href="{{ route('goodinsured.pet') }}">Pet</a></li>
                                    <li><a href="{{ route('goodinsured.flood') }}">Flood</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="javascript:void(0)">
                                    <span><img src="{{ asset('landing/goodinsured/img/site/f3.png') }}" alt=""/></span>
                                    <h6>Business Insurance</h6>
                                </a>
                                <ul class="inner_drop">
                                    <li><a href="{{ route('goodinsured.business_owner') }}">Business Owners</a></li>
                                    <li><a href="{{ route('goodinsured.general_liability') }}">General Liability</a></li>
                                    <li><a href="{{ route('goodinsured.professional_liability') }}">Professional Liability</a></li>
                                    <li><a href="{{ route('goodinsured.workers_compensation') }}">Worker's Compensation</a></li>
                                    <li><a href="{{ route('goodinsured.commercial_auto') }}">Commercial Auto</a></li>
                                    <li><a href="javascript:void(0)">Hired and Non-owned Auto</a></li>
                                    <li><a href="javascript:void(0)">Error and Commissions</a></li>
                                    <li><a href="javascript:void(0)">Cyber Liability</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="javascript:void(0)">
                                    <span><img src="{{ asset('landing/goodinsured/img/site/sp1.png') }}" alt=""/></span>
                                    <h6>Specialized Insurance</h6>
                                </a>
                                <ul class="inner_drop">
                                    <li><a href="javascript:void(0)">Umbrella/ Excess Liability</a></li>
                                    <li><a href="javascript:void(0)">Commercial Property</a></li>
                                    <li><a href="javascript:void(0)">Business Interuption</a></li>
                                    <li><a href="javascript:void(0)">Inland Marine</a></li>
                                    <li><a href="javascript:void(0)">Product Liability</a></li>
                                    <li><a href="javascript:void(0)">Employment Practices Liability</a></li>
                                    <li><a href="javascript:void(0)">Directors and Officers</a></li>
                                    <li><a href="javascript:void(0)">Specialized Event</a></li>
                                    <li><a href="javascript:void(0)">Liquor Liability Insurance</a></li>
                                    <li><a href="javascript:void(0)">Builder's Risk</a></li>
                                    <li><a href="javascript:void(0)">Contractor's Tools and Equipment</a></li>
                                    <li><a href="javascript:void(0)">Fidelity Bonds</a></li>
                                    <li><a href="javascript:void(0)">Surety Bonds</a></li>
                                    <li><a href="javascript:void(0)">License/ Permit Bonds</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="javascript:void(0)">
                                    <span><img src="{{ asset('landing/goodinsured/img/site/f4.png') }}" alt=""/></span>
                                    <h6>Additional Insurance</h6>
                                </a>
                                <ul class="inner_drop">
                                    <li><a href="{{ route('goodinsured.pet') }}">Pet</a></li>
                                    <li><a href="javascript:void(0)">Personal</a></li>
                                    <li><a href="javascript:void(0)">Supplemental</a></li>
                                    <li><a href="javascript:void(0)">Business Healths</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="line-nav">
                    <li>|</li>
                </ul>
                <ul>
                    <li class="drop_infomation mobile-menu">
                        <a href="javascript:void(0)">Information <i class="fa fa-caret-down"></i></a>
                        <ul class="info_drop">
                            <li class="treeview">
                                <a href="javascript:void(0)">
                                    <span><img src="{{ asset('landing/goodinsured/img/site/in1.png') }}" alt=""/></span>
                                    <h6>My Account</h6>
                                </a>
                                <ul class="inner_drop">
                                    <li>
                                        <a href="javascript:void(0)">Login</a>
                                        <ul class="sub_inner_drop">
                                            <li><a href="{{ route('login', 'business') }}">Business Login</a></li>
                                            <li><a href="{{ route('login', 'provider') }}">Provider Login</a></li>
                                            <li><a href="{{ route('login', 'broker') }}">Broker/Agent Login</a></li>
                                            <li><a href="{{ route('login', 'employee') }}">Employee Login</a></li>
                                            <li><a href="{{ route('login', 'carrier') }}">Carrier Login</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)">Create Online Account</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="javascript:void(0)">
                                    <span><img src="{{ asset('landing/healthshop/img/site/in2.png')}}" alt=""/></span>
                                    <h6>Platform</h6>
                                </a>
                                <ul class="inner_drop">
                                    <li><a href="javascript:void(0)">For Business</a></li>
                                    <li><a href="javascript:void(0)">For Provider</a></li>
                                    <li><a href="javascript:void(0)">For Broker/Agent</a></li>
                                    <li><a href="javascript:void(0)">For Carrier</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <span><img src="{{ asset('landing/healthshop/img/site/in3.png')}}" alt=""/></span>
                                    <h6>Guides and Resources</h6>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <span><img src="{{ asset('landing/goodinsured/img/site/industries1.png')}}" alt=""/></span>
                                    <h6>Industries</h6>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <span><img src="{{ asset('landing/goodinsured/img/site/industries.png')}}" alt=""/></span>
                                    <h6>Business Resources</h6>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('goodinsured.about') }}">
                                    <span><img src="{{ asset('landing/goodinsured/img/site/gi.png')}}" alt=""/></span>
                                    <h6>About  Goodinsured</h6>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('goodinsured.contact') }}">
                                    <span><img src="{{ asset('landing/goodinsured/img/site/in6.png') }}" alt=""/></span>
                                    <h6>Contact Us</h6>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>