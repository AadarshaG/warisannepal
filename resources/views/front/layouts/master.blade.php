<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/owl.carousel.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/owl.theme.default.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/material-design/css/material-design-iconic-font.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/hs-menu.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/animate.css')}}"/>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/custom.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/responsive.css')}}"/>

    <link rel="icon" href="{{asset('assets/front/img/logo.png')}}">
    <title>WITN</title>

</head>

<body>
<div id="app">
    <header>
        <div id="desktopMenu">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    @php
                        $logo = DB::table('logos')->select('*')->first();
                    @endphp
                    @if(!empty($logo))
                    <a class="navbar-brand" href="{{ URL::to('/') }}">
                        <img class="header-logo" src="{{asset('uploads/logo/'.$logo->image)}}" alt="logo" width="100px;">
                    </a>
                    @endif
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarToggler">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link {{Request::is('/')? 'active':''}}" href="{{ URL::to('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{Request::is('about/us')? 'active':''}}" href="{{route('about')}}">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{Request::is('services')? 'active':''}}" href="{{route('services')}}">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{Request::is('vendors')? 'active':''}}" href="{{route('vendors')}}">Vendors</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{Request::is('contact/us')? 'active':''}}" href="{{route('contact')}}">Contact Us</a>
                            </li>
                        </ul>
                        <div class="header-account">
                            @if(Auth::guard('member')->check())
                                @php
                                    $id = Auth::guard('member')->user()->id;
                                @endphp
                                <a href="{{route('myprofile',$id)}}" class="login-link lightbg">Profile</a>
                                <a href="" class="login-link lightbg">Reset Password</a>
                                <a href="{{route('member.logout')}}" class="login-link lightbg">Logout</a>
                            @else
                                <a href="{{route('member.login')}}" class="login-link lightbg">Login</a>
                            @endif
                            <a href="{{route('member.register')}}" class="apply-link mainbg">Apply Online</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    @yield('main-content')

    <footer>
        <div id="preFooter">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 first">
                        @php
                            $logo = DB::table('logos')->select('*')->first();
                        @endphp
                        @if(!empty($logo))
                        <a href="{{ URL::to('/') }}">
                            <img class="footer-logo" src="{{asset('uploads/logo/'.$logo->image)}}" width="80px;">
                        </a>
                        @endif
                        <div class="footer-title">Install App</div>
                        <div class="footer-li">
                            <a href="">
                                <img src="{{asset('assets/front/img/googleplay.png')}}">
                            </a>
                        </div>
                        <div class="footer-li">
                            <a href="">
                                <img src="{{asset('assets/front/img/appstore.png')}}">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 second">
                        <div class="footer-title">Company</div>
                        <div class="footer-li"><a href="{{route('about')}}">About Us</a></div>
                        <div class="footer-li"><a href="{{ URL::to('/associates') }}">Associates</a></div>
                        <div class="footer-li"><a href="{{ URL::to('/clients') }}">Clients</a></div>
                        <div class="footer-li"><a href="{{route('contact')}}">Contact Us</a></div>
                    </div>
                    <div class="col-md-3 third">
                        <div class="footer-title">Support</div>
                        <div class="footer-li"><a href="{{ URL::to('/help/center') }}">Help Center</a></div>
                        <div class="footer-li"><a href="{{ URL::to('/safety/center') }}">Safety Center</a></div>
                        <div class="footer-li"><a href="{{ URL::to('/community/guidelines') }}">Community Guidelines</a></div>
                    </div>
                    <div class="col-md-3 fourth">
                        <div class="footer-title">Legal</div>
                        <div class="footer-li"><a href="{{ URL::to('/cookies/policy') }}">Cookies Policy</a></div>
                        <div class="footer-li"><a href="{{ URL::to('/privacy/policy') }}">Privacy Policy</a></div>
                        <div class="footer-li"><a href="{{ URL::to('/terms/of/service') }}">Terms of Service</a></div>
                        <div class="footer-li"><a href="{{ URL::to('/law/enforcement') }}">Law Enforcement</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="copyright">
            <div class="container">
                <div class="text-center">
                    <div>
                        Copyright © {{date('Y')}} WITN | All Rights Reserved.
                    </div>
                    <div>
                        Developed by <a href="https://itarrow.com/" target="_blank">IT Arrow</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>

<a id="back-to-top" href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<script type="text/javascript" src="{{asset('assets/front/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/html5lightbox/html5lightbox.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/js/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/purecounterjs/dist/purecounter.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/js/custom.js')}}"></script>

</body>

</html>
