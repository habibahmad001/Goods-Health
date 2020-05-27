<!DOCTYPE html>
<html lang="en" >
   <!-- begin::Head -->
   <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <meta name="viewport" content="width=1000"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="IE=Edge">
    <meta name="description" content="Page Description" />
    <!-- Chrome, Firefox OS, Opera and Vivaldi -->
    <meta name="theme-color" content="#000">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#000">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">
    <title>Healthshop Login</title>
    <link rel="icon" type="image/ico" href="images/favicon.ico" />
    <link rel="mask-icon" href="images/site/favicon.ico" color="white">
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic|Gentium+Basic|Playfair+Display+SC' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/bootstrap-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-glypicon.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/screen.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('fonts/stylesheet.css') }}" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js?ver=4.8.9'></script>
    <!--[if IE]> <script src="js/html5shiv.js"></script> <![endif]-->
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/placeholder.js') }}"></script>
    <script src="{{ asset('js/browser-selector.js') }}"></script>
</head>
<body>
<div id="full_wrapper"> <!-- id full_wrapper was added here -->
    <header>
        <div class="top_head cf">
            <div class="left">
                <a href="javascrip:void(0)">
                    <img src="{{ asset('images/logo1.png') }}" alt="">
                </a>
            </div>
            <div class="right">
                <a href="javascrip:void(0)">
                    <img src="{{ asset('images/logo2.png') }}" alt="">
                </a>
            </div>
        </div>
        <div class="bottom_head">
            <a href="javascript:void(0)" class="hamburger"><span></span></a>
            <div class="bottom_wrap cf">
                <div class="nav_left">
                    <ul>
                        <li>
                            <a href="javascript:void(0)" class="search"><img src="{{ asset('images/serch.png') }}" alt=""></a>
                        </li>
                        <li>|</li>
                        <li>
                            <a href="javascript:void(0)" class="login"><img src="{{ asset('images/login_icon.png') }}" alt=""> Login</a>
                        </li>
                        <li>|</li>
                        <li>
                            <a href="javascript:void(0)" class="location"><img src="{{ asset('images/pin.png') }}" alt=""> Quote Location </a>
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
                            <img src="{{ asset('images/feed.png') }}" alt="">
                        </a>
                    </div>
                    <div class="location_drop">

                        <form action="">
                            <h3>State</h3>
                            <input type="text" class="in">
                            <h3>Zipcode</h3>
                            <input type="text" class="in">
                            <input type="submit" class="submit" value="UPDATE">
                        </form>
                    </div>
                    <div class="login_drop">
                        {{--<form action="">--}}
                            {{--<h3>Access your policy</h3>--}}
                            {{--<input type="submit" class="submit" value="LOGIN"><br/>--}}
                            {{--<span>New Customer?</span> <a href="#">Sign up Here</a>--}}
                        {{--</form>--}}

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
                                    <label> User ID / Email / Policy Number </label>
                                    <input type="text" name="email" class="in @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label> Password </label>
                                    <input id="password" type="password" class="in @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                @if (Route::has('password.request'))
                                    <div class="form-group">

                                        <label> <a href="{{ route('password.request') }}" class="red-text">Forgot User ID / Password </a></label>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="submit" value="Login">
                                </div>
                                <div class="form-group">
                                    <label> <a href="#"> Sign up for an account. </a></label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="nav_right">
                    <ul>
                        <li class="drop_infomation">
                            <a href="javascript:void(0)">Information <i class="fa fa-caret-down"></i></a>
                            <ul class="info_drop">
                                <li>
                                    <a href="javascript:void(0)">
                                        <h6>My Account</h6>
                                        <span><img src="{{ asset('images/in1.png') }}" alt=""></span>
                                    </a>
                                    <ul class="inner_drop">
                                        <li><a href="javascript:void(0)">Make a Payment</a></li>
                                        <li><a href="javascript:void(0)">Get ID Cards</a></li>
                                        <li><a href="javascript:void(0)">Add A Vehicle</a></li>
                                        <li><a href="javascript:void(0)">Create Online Account</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <h6>Claims and Roadside <br> Help</h6>
                                        <span><img src="{{ asset('images/in2.png') }}" alt=""></span>
                                    </a>
                                    <ul class="inner_drop">
                                        <li><a href="javascript:void(0)">Report a claim</a></li>
                                        <li><a href="javascript:void(0)">View a Claim</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <h6>Tools and Resources</h6>
                                        <span><img src="{{ asset('images/in3.png') }}" alt=""></span>
                                    </a>
                                    <ul class="inner_drop">
                                        <li><a href="javascript:void(0)">About Our products</a></li>
                                        <!--<li><a href="javascript:void(0)">Insurance Discounts</a></li>-->
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <h6>About The Health Shop</h6>
                                        <span><img src="{{ asset('images/in4.png') }}" alt=""></span>
                                    </a>
                                    <ul class="inner_drop">
                                        <li><a href="javascript:void(0)">Corporate Information</a></li>
                                        <li><a href="javascript:void(0)">Insurers</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <h6>Contact Us</h6>
                                        <span><img src="{{ asset('images/in6.png') }}" alt=""></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li>|</li>
                    </ul>
                    <ul>
                        <li class="drop_infomation">
                            <a href="javascript:void(0)">Insurance <i class="fa fa-caret-down"></i></a>
                            <ul class="info_drop insurance_drop">
                                <li>
                                    <a href="javascript:void(0)">
                                        <h6>Health</h6>
                                        <span><img src="{{ asset('images/b1.png') }}" alt=""></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <h6>Life</h6>
                                        <span><img src="{{ asset('images/b2.png') }}" alt=""></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <h6>Medicare</h6>
                                        <span><img src="{{ asset('images/b3.png') }}" alt=""></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <h6>Dental</h6>
                                        <span><img src="{{ asset('images/b4.png') }}" alt=""></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <h6>Vision</h6>
                                        <span><img src="{{ asset('images/b5.png') }}" alt=""></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <h6>Additional Insurance</h6>
                                        <span><img src="{{ asset('images/b6.png') }}" alt=""></span>
                                    </a>
                                    <ul class="inner_drop">
                                        <li><a href="javascript:void(0)"> Vehicle Insurance</a></li>
                                        <li><a href="javascript:void(0)"> Property Insurance</a></li>
                                        <li><a href="javascript:void(0)"> Business Insurance</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="main"> <!-- class main was added here -->
        <div class="inner_page container">
            <div class="row step cf text-center heading">
               <h4>  <i class="fa fa-user"></i>  Login</h4>
            </div>
        </div>
        <div class="container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login_form">
                    <center>
                         @if(Session::has('error'))
                            
                            <strong style="color: red;font-size: 20px;">
                                {{ Session::get('error') }}
                            </strong>
                                             
                        @endif
                    </center>
                    <div class="form-group">
                        <label> User ID / Email / Policy Number </label>
                        <input type="text" name="email" class="in @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> Password </label>
                        <input id="password" type="password" class="in @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @if (Route::has('password.request'))
                    <div class="form-group">
                        
                        <label> <a href="{{ route('password.request') }}" class="red-text">Forgot User ID / Password </a></label>
                    </div>
                    @endif
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="submit" value="Login">
                    </div>
                    <div class="form-group">
                        <label> <a href="#"> Sign up for an account. </a></label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="push"><!-- --></div>
</div>   
<footer>
    <div class="top_footer">
        <div class="wrapper cf">
            <div class="left_contact cf">
                <div class="content-container">
                    <div class="footer-left">
                        <h3><a href="javascript:void(0);">Top Searched Blogs</a></h3>
                        <ol class="footer-section-top-search">
                            <li>
                                <a href="javascript:void(0);">Liability Insurance</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Collision Insurance</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Comprehensive Insurance</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Uninsured Motorist Coverage</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Personal Injury Protection Insurance</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">No-Fault Insurance</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Non-Owners Insurance</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Full Coverage Insurance</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Insurance Glossary</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Car Insurance Discounts</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Average Car Insurance</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Ask An Agent</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Reviews</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">TV Commercials</a>
                            </li>
                        </ol>
                    </div>
                    <div class="footer-right">

                        <div>
                            <h3><a href="javascript:void(0);">Cheap Insurance Providers</a></h3>
                            <ol class="footer-cheap-one">
                                <li><a href="javascript:void(0);">USAA</a></li>
                                <li><a href="javascript:void(0);">Progressive</a></li>
                                <li><a href="javascript:void(0);">State Farm</a></li>
                                <li><a href="javascript:void(0);">Esurance</a></li>
                            </ol>

                            <ol class="footer-cheap-two">
                                <li><a href="javascript:void(0);">Farmers</a></li>
                                <li><a href="javascript:void(0);">Nationwide</a></li>
                                <li><a href="javascript:void(0);">MetLife</a></li>
                                <li><a href="javascript:void(0);">21st Century</a></li>
                            </ol>
                        </div>

                        <div class="footer-find">
                            <h3><a href="javascript:void(0);">Find Cheap Insurance By State</a></h3>

                            AL AK AZ AR CA CO CT DE FL GA HI ID IL IN IA KS KY LA ME MD MA MI MN MS MO MT NE NV NH NJ NM NY NC ND OH OK OR PA RI SC SD TN TX UT VT VA WA WV WI WY | Cheap Insurance By City
                        </div>

                        <div class="footer-compare">
                            <h3><a href="javascript:void(0);">Compare Cheap Car Insurance Companies</a></h3>

                            <ol>
                                <li><a href="javascript:void(0);">Geico vs Progressive</a></li>
                                <li><a href="javascript:void(0);">State Farm vs Allstate</a></li>
                                <li><a href="javascript:void(0);">Geico vs State Farm</a></li>
                                <li><a href="javascript:void(0);">Progressive vs State Farm</a></li>
                            </ol>

                            <ol>
                                <li><a href="javascript:void(0);">AAA vs State Farm</a></li>
                                <li><a href="javascript:void(0);">State Farm vs Farmers</a></li>
                                <li><a href="javascript:void(0);">USAA vs Geico</a></li>
                                <li><a href="javascript:void(0);">Geico vs Liberty Mutual</a></li>
                            </ol>

                            <ol>
                                <li><a href="javascript:void(0);">AAA vs Geico</a></li>
                                <li><a href="javascript:void(0);">Allstate vs AAA</a></li>
                                <li><a href="javascript:void(0);">Geico vs Allstate</a></li>
                                <li><a href="javascript:void(0);">State Farm vs Nationwide</a></li>
                            </ol>

                            <ol>
                                <li><a href="javascript:void(0);">USAA vs State Farm</a></li>
                                <li><a href="javascript:void(0);">AAA vs USAA</a></li>
                                <li><a href="javascript:void(0);">Allstate vs Farmers</a></li>
                                <li><a href="javascript:void(0);">State Farm vs Liberty Mutual</a></li>
                            </ol>

                        </div>
                    </div>

                </div>
            </div>

            <div class="footer-href">
                <a href="javascript:void(0);">About Us</a>
                <a href="javascript:void(0);">Blogs</a>
                <a href="javascript:void(0);">Contact Us</a>
            </div>
            <div class="right_social">
                <h3>follow us</h3>
                <a href="javascript:void(0)"><i class="fa fa-facebook"></i></a>
                <a href="javascript:void(0)"><i class="fa fa-instagram"></i></a>
                <a href="javascript:void(0)"><i class="fa fa-twitter"></i></a>
            </div>
        </div>
        <div class="bottom_footer cf">
            <div class="wrapper">
                <div class="footer_menu">
                    <ul>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">LEGAL &amp; SECURITY</a></li>
                        <li><a href="#">CAREERS</a></li>
                    </ul>
                </div>
                <div class="copy_right">
                    <p>© GOODINSURED | HEALTHSHOP 2019</p>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-call-text">
        <p>305-307-8548</p>
    </div>
    <div class="btn-call-chat">
        <div class="bottom-fix-left"><img src="{{ asset('images/phone.png') }}" /></div>
        <div class="bottom-fix-right"><img src="{{ asset('images/chat.png')}}" /></div>
    </div>
</footer> 
<script src="{{ asset('js/script.js') }}"></script>
<!-- bootstrap 4 js -->

</body>
</html>

