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
                        <a href="javascript:void(0)" class="search"><img src="{{ asset('landing/healthshop/img/site/serch.png')}}" alt=""/></a>
                    </li>
                    <li>|</li>
                    <li>
                        <a href="javascript:void(0)" class="login"><img src="{{ asset('landing/healthshop/img/site/login_icon.png')}}" alt=""/> Login</a>
                    </li>
                    <li>|</li>
                    <li>
                        <a href="javascript:void(0)" class="location"><img src="{{ asset('landing/healthshop/img/site/pin.png')}}" alt=""/> Quote Location </a>
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
                        <img src="{{ asset('landing/healthshop/img/site/feed.png')}}" alt=""/>
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
                    <li class="drop_infomation mobile-menu">
                        <a href="javascript:void(0)">Information <i class="fa fa-caret-down"></i></a>
                        <ul class="info_drop">
                            <li>
                                <a href="javascript:void(0)">
                                    <h6>My Account</h6>
                                    <span><img src="{{ asset('landing/healthshop/img/site/in1.png')}}" alt=""/></span>
                                </a>
                                <ul class="inner_drop">
                                    <li>
                                        <a href="javascript:void(0)">Login</a>
                                        <ul class="sub_inner_drop">
                                            <li><a href="{{ route('healthinsured.login', 'business') }}">Business Login</a></li>
                                            <li><a href="{{ route('healthinsured.login', 'provider') }}">Provider Login</a></li>
                                            <li><a href="{{ route('healthinsured.login', 'broker') }}">Broker/Agent Login</a></li>
                                            <li><a href="{{ route('healthinsured.login', 'employee') }}">Employee Login</a></li>
                                            <li><a href="{{ route('healthinsured.login', 'carrier') }}">Carrier Login</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)">Create Online Account</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Platform</h6>
                                    <span><img src="{{ asset('landing/healthshop/img/site/in2.png')}}" alt=""/></span>
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
                                    <h6>Guides and Resources</h6>
                                    <span><img src="{{ asset('landing/healthshop/img/site/in3.png')}}" alt=""/></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Industries</h6>
                                    <span><img src="{{ asset('landing/goodinsured/img/site/industries1.png')}}" alt=""/></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Business Resources</h6>
                                    <span><img src="{{ asset('landing/goodinsured/img/site/industries.png')}}" alt=""/></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('healthinsured.about') }}">
                                    <h6>About The HealthInsured</h6>
                                    <span><img src="{{ asset('landing/healthshop/img/site/in4.png')}}" alt=""/></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('healthinsured.contact') }}">
                                    <h6>Contact Us</h6>
                                    <span><img src="{{ asset('landing/healthshop/img/site/in6.png')}}" alt=""/></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="line-nav">
                    <li>|</li>
                </ul>
                <ul>
                    <li class="drop_infomation mobile-menu">
                        <a href="javascript:void(0)">Insurance <i class="fa fa-caret-down"></i></a>
                        <ul class="info_drop insurance_drop">
                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Personal Insurance</h6>
                                    <span><img src="{{ asset('landing/healthshop/img/site/b1.png')}}" alt=""/></span>
                                </a>
                                <ul class="inner_drop">
                                    <li><a href="{{ route('healthinsured.health') }}">Health</a></li>
                                    <li><a href="{{ route('healthinsured.life') }}">Life</a></li>
                                    <li><a href="{{ route('healthinsured.medicare') }}">Medicare</a></li>
                                    <li><a href="javascript:void(0)">RDP</a></li>
                                    <li><a href="{{ route('healthinsured.dental') }}">Dental</a></li>
                                    <li><a href="{{ route('healthinsured.vision') }}">Vision</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)"> <h6>Business Insurance </h6>
                                    <span><img src="{{ asset('landing/healthshop/img/site/b6.png')}}" alt=""/></span>
                                </a>
                                <ul class="inner_drop">
                                    <li><a href="javascript:void(0)"> Annuity </a></li>
                                    <li><a href="javascript:void(0)"> Hospital </a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)"> <h6> Supplemental Insurance </h6>
                                    <span><img src="{{ asset('landing/healthshop/img/site/b6.png')}}" alt=""/></span>
                                </a>
                                <ul class="inner_drop">
                                    <li><a href="javascript:void(0)"> Medigap/ Supplement </a></li>
                                    <li><a href="javascript:void(0)"> Disability </a></li>
                                    <li><a href="javascript:void(0)"> Accident </a></li>
                                    <li><a href="javascript:void(0)"> Critical Illness </a></li>
                                    <li><a href="javascript:void(0)"> Cancer </a></li>
                                    <li><a href="javascript:void(0)"> Travel </a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Additional Insurance</h6>
                                    <span><img src="{{ asset('landing/healthshop/img/site/b6.png')}}" alt=""/></span>
                                </a>
                                <ul class="inner_drop">
                                    <li><a href="javascript:void(0)"> Vehicle </a></li>
                                    <li><a href="javascript:void(0)"> Property </a></li>
                                    <li><a href="javascript:void(0)"> Specialized </a></li>
                                    <li><a href="javascript:void(0)"> Business Goods </a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</header>
