@extends('layouts.default')
@section('content')
    <!-- Start header section -->
    <div class="header-inner">
        <header id="header">
            <!-- Header image -->
            <img src="/temp-rex/assets/images/header-bg.jpg" alt="img" style="height:800px;width: 100%;">
            <div class="header-overlay">
                <div class="header-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-7">
                                <h2 class="header-slide">Trihomebased
                                    <span>EARNING MONEY EASY</span>
                                    <span>WORK ANYTIME</span>
                                    <span>AWESOME PRODUCTS</span>
                                </h2>
                            </div>
                            <div class="col-lg-5">
                                @if(session()->has('error'))
                                    <div style="background:red;color:white;padding: 10px;border-radius:5px;margin-bottom:20px;">
                                        @foreach(session()->get('error') as $e)
                                            <span>{{$e}}</span>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="auth-box">
                                    @if(!empty($action))
                                        @if($action == 'signup')
                                            @include('includes.features.signup')
                                        @else
                                            @include('includes.features.login')
                                        @endif
                                    @else
                                        @include('includes.features.login')
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <!-- Start menu section -->
    <section id="menu-area">
        <nav class="navbar navbar-default main-navbar" role="navigation">
            <div class="container">
                <div id="navbar" class="navbar-collapse">
                    <ul id="top-menu" class="nav navbar-nav main-nav menu-scroll">
                        <li class="active"><a href="#" onclick="window.location.href='/'">Home</a></li>
                        <li><a href="#about">ABOUT</a></li>
                        <li><a href="#how_it_works">HOW TO JOIN</a></li>
                        <li><a href="#contact">CONTACT US</a></li>
                        <li>
                            <button class="btn btn-outline-primary" id="loginBtn">Login</button>
                        </li>
                        <li>
                            <button class="btn btn-outline-success" id="signupBtn">Sign Up</button>
                        </li>

                    </ul>

                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <header class="header" role="banner" style="display: none;">

            <nav id="nav" class="nav" role="navigation">

                <!-- ACTUAL NAVIGATION MENU -->
                <ul class="nav__menu" id="menu" tabindex="-1" aria-label="main navigation" hidden>
                    <li class="nav__item"><a href="#header" class="nav__link">Home</a></li>
                    <li class="nav__item"><a href="#about" class="nav__link">About</a></li>
                    <li class="nav__item"><a href="#how_it_works" class="nav__link">How To Join</a></li>
                    <li class="nav__item"><a href="#contact" class="nav__link">Contact Us</a></li>
                </ul>

                <!-- MENU TOGGLE BUTTON -->
                <a href="#nav" class="nav__toggle" role="button" aria-expanded="false" aria-controls="menu">
                    <svg class="menuicon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                        <title>Trihomebased</title>
                        <g>
                            <line class="menuicon__bar" x1="13" y1="16.5" x2="37" y2="16.5"/>
                            <line class="menuicon__bar" x1="13" y1="24.5" x2="37" y2="24.5"/>
                            <line class="menuicon__bar" x1="13" y1="24.5" x2="37" y2="24.5"/>
                            <line class="menuicon__bar" x1="13" y1="32.5" x2="37" y2="32.5"/>
                            <circle class="menuicon__circle" r="23" cx="25" cy="25" />
                        </g>
                    </svg>
                </a>
                <ul style="list-style-type: none; position: absolute;right: 40px;top: 20px;">
                    <li style="float: left;margin-right: 20px;">
                        <button class="btn btn-outline-primary" id="loginBtnM">Login</button>
                    </li>
                    <li style="float: left;">
                        <button class="btn btn-outline-success" id="signupBtnM">Sign Up</button>
                    </li>
                </ul>
                <!-- ANIMATED BACKGROUND ELEMENT -->
                <div class="splash"></div>

            </nav>

        </header>
    </section>
    <!-- End menu section -->

    <!-- Start about section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Start welcome area -->
                    <div class="welcome-area">
                        <div class="title-area">
                            <h2 class="tittle">Welcome to <span>Trihomebased</span></h2>
                            <span class="tittle-line"></span>
                            <p>
                                Trihomebased is a hybrid website which offers guaranteed income by typing captcha and an online store
                                which gives lots of privileges to its members.

                                A website may generate income via google adsense through its traffic. Every time a user visits our website and does captcha encoding, trihomebased will generate income.

                                Aside from that, we have tangible products that are available in our online store and with free delivery nationwide!
                                Once you are a member, you will be getting up to 20% discount in all trihomebased products and earn extra income
                                by doing direct selling. Non-members can also purchase in our online store, free
                                delivery nationwide.

                            </p>
                        </div>
                        <div class="welcome-content">
                            <hr style="margin-bottom: 50px;">

                            <h1 style="margin-bottom: 40px">3 Ways to earn in Trihomebased</h1>

                            <ul class="wc-table">
                                <li>
                                    <div class="single-wc-content wow fadeInUp">
                                        <span class="fa fa-users wc-icon"></span>
                                        <h4 class="wc-tittle">1. CAPTCHA ENCODING</h4>
                                        <p>0.03 PESOS PER SUCCESSFUL CAPTCHA
                                            (captcha income will be automatically credited to cash wallet)
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-wc-content wow fadeInUp">
                                        <span class="fa fa-sellsy wc-icon"></span>
                                        <h4 class="wc-tittle">2. REFERRAL INCENTIVE</h4>
                                        <ul class="sub-item" style="    list-style-type: decimal;    margin-top: 20px;">
                                            <li>1ST LEVEL = 40 PESOS + 10 REWARD POINTS</li>
                                            <li>2ND LEVEL = 10 PESOS</li>
                                            <li>3RD LEVEL = 5 PESOS</li>
                                            <li>4TH LEVEL = 2.50</li>
                                            <li>5H LEVEL = 2.50</li>
                                        </ul>

                                    </div>
                                </li>
                                <li>
                                    <div class="single-wc-content wow fadeInUp">
                                        <span class="fa fa-line-chart wc-icon"></span>
                                        <h4 class="wc-tittle">3. DIRECT SELLING (UP TO 20% DISCOUNT ON OUR PRODUCTS)</h4>
                                        <p>ONCE YOU ARE A MEMBER YOU WILL ENJOY 20% DISCOUNT ON ALL OUR
                                            PRODUCTS.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End welcome area -->
                </div>
            </div>
            <div class="row" id="how_it_works" style="margin-top:30px;">
                <div class="col-md-12">
                    <div class="about-area container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="about-right wow fadeInRight">
                                    <div class="title-area">
                                        <h2 class="tittle">How To Join <span>Trihomebased</span> Marketing?</h2>
                                        <span class="tittle-line"></span>
                                        <ul class="marketing-instruction" style="list-style-type: decimal;padding: 20px;">
                                            <li>
                                                Ask for a referral link to any of <span style="color:#00d999;">TRIHOMEBASED</span> members or you can directly
                                                <a href="?action=signup" style="color:dodgerblue">signup to our website</a>.
                                            </li>
                                            <li>
                                                To activate your account, you must pay
                                                <b style="color:black">&#8369;150.00</b> via payment options below and send the payment transaction details / SCREENSHOT together with your USERNAME to trihomebased@gmail.com or send it through our
                                                <a href="#contact" style="color:dodgerblue">CONTACT US</a> section.
                                            </li>
                                            <li>
                                                Once your payment is verified, your account will be activated within 24 to 48 hours.
                                            </li>
                                        </ul>
                                        <div class="about-btn-area">
                                            <a href="?action=signup" class="button button-default" data-text="SIGN UP!"><span>GET STARTED</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row payment-method-list">
                <div class="container-fluid" style="width: 100%">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    GCASH Mobile No :<br>09350057909
                                </div>
                                <div class="card-body text-center">
                                    <img src="/temp-rex/assets/images/gcash.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Smart Padala Referrence No :<br> 5577-5194-1012-0100
                                </div>
                                <div class="card-body text-center">
                                    <img src="/temp-rex/assets/images/smartpadala.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Email : trihomebased@gmail.com <br> Mobile # : 09350057909
                                </div>
                                <div class="card-body text-center">
                                    <img src="/temp-rex/assets/images/coinsph.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End about section -->

    <!-- Start service section -->
    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="service-area">
                        <div class="title-area">
                            <h2 class="tittle">Trihomebased Platform</h2>
                            <span class="tittle-line"></span>
                            <p>perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam, eaque ipsa quae ab illo inventore</p>
                        </div>
                        <!-- service content -->
                        <div class="service-content">
                            <ul class="service-table">
                                <li class="col-md-4 col-sm-6">
                                    <div class="single-service wow slideInUp">
                                        <h4 class="service-title">10 REWARD POINTS UPON SIGNUP 1PESO = 1REWARD POINT</h4>
                                    </div>
                                </li>
                                <li class="col-md-4 col-sm-6">
                                    <div class="single-service wow slideInUp">
                                        <h4 class="service-title">ONLINE STORE</h4>
                                    </div>
                                </li>
                                <li class="col-md-4 col-sm-6">
                                    <div class="single-service wow slideInUp">
                                        <h4 class="service-title">FREE DELIVERY NATIONWIDE</h4>
                                    </div>
                                </li>
                                <li class="col-md-4 col-sm-6">
                                    <div class="single-service wow slideInUp">
                                        <h4 class="service-title">CAPTCHA ENCONDING</h4>
                                    </div>
                                </li>
                                <li class="col-md-4 col-sm-6">
                                    <div class="single-service wow slideInUp">
                                        <h4 class="service-title">0.03 PER SUCCESSFUL CAPTCHA</h4>
                                    </div>
                                </li>
                                <li class="col-md-4 col-sm-6">
                                    <div class="single-service wow slideInUp">
                                        <h4 class="service-title">UNLIMITED CAPTCHA ENCONDING</h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End service section -->
    {{-- Products Section : START --}}
    @if($rewards)
        @if(count($rewards) > 0)
            <section id="products-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center" style="color:black;margin-bottom: 20px;">Rewards and Products</h1>
                            <p style="margin-bottom: 30px;text-align: center;"><a href="/?action=signup" class="btn btn-outline-primary">Be a member</a> and claim awesome <strong style="color:orange">REWARDS</strong> and <strong style="color:orange">PRODUCTS</strong></p>
                            <div class="product-list">
                                @foreach($rewards as $r)
                                    <div class="p-item">
                                        <div class="card">
                                            <span class="price reward">
                                                <i class="fa fa-star" style="color:orange"></i> {{$r->price_reward_points}}<br><i class="fa fa-money" style="color:#04d204"></i> {{$r->price_money_balance}}
                                            </span>
                                            <img class="card-img-top" src="/images/rewards/{{$r->featured_image_url}}" alt="">
                                            <div class="card-body">
                                                <h4 class="card-title mb-3">{{$r->title}}</h4>
                                                <p class="card-text">{{$r->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif
    {{-- Products Section : END --}}

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="contact-left wow fadeInLeft">
                        <h2>Contact with us</h2>
                        <address class="single-address">
                            <h4>Phone</h4>
                            <p>Phone Number: 09350057909 </p>
                        </address>
                        <address class="single-address">
                            <h4>E-Mail</h4>
                            <p>Support: trihomebased@gmail.com</p>
                        </address>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <div class="contact-right wow fadeInRight">
                        <h2>Send a message</h2>
                        <form action="/contact-us" method="post" class="contact-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name" name="name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Enter Email" name="email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <button type="submit" data-text="SUBMIT" class="button button-default"><span>SUBMIT</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--MODALS--}}
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999999999999;margin-top:120px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: transparent;border: none;">
                <div class="modal-body" >
                    @include('includes.features.login')
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999999999999;margin-top:120px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: transparent;border: none;">
                <div class="modal-body" >
                    <style>
                        @mdeia(max-width: 425px) {
                            #feature_signup.card {
                                padding-top:45px !important;
                            }
                        }
                    </style>
                    @include('includes.features.signup')
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact section -->

    <!-- Start Google Map -->
    {{--<section id="google-map">--}}
    {{--<iframe src="https://www.google.com/maps/embed?pb=!1m17!1m8!1m3!1d6303.67022361714!2d144.955652!3d-37.817331!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d-37.8173306!2d144.9556518!5e0!3m2!1sen!2sbd!4v1442411159706" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>--}}
    {{--</section>--}}
    <!-- End Google Map -->

    <!-- Start Footer -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p><a rel="nofollow" href="#">Trihomebased</a></p>
        </div>
    </footer>
    <!-- End Footer -->


    <!-- End header section -->
    {{--<div class="flex-center position-ref full-height">--}}
    {{--@if (Route::has('login'))--}}
    {{--<div class="top-right links">--}}
    {{--<a href="{{ route('login') }}">Login</a>--}}
    {{--@if (Route::has('register'))--}}
    {{--<a href="{{ route('register') }}">Register</a>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--@endif--}}


    {{--</div>--}}
    <style>


    </style>
    <script>
        let ww = $(window).width();
        @if(isset($_GET['ref']))
        if(ww < 1200) {
            let ref = '{{$_GET['ref']}}';

            if(ref !== '') {
                $('#signupModal').modal('show');
            }
        }
        @endif
        $('.product-list').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            autoplay:true,
            autoplaySpeed: 3000,
            responsive: [
                {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 543,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });

        $('#loginBtn').click(function (e) {
            e.preventDefault();
            let ww = $(window).width();
            if(ww > 1199) {
                window.location.href='/?action=login';
            } else {
                $('#loginModal').modal('show');
            }

        });

        $('#signupBtn').click(function (e) {
            e.preventDefault();
            let ww = $(window).width();
            if(ww > 1199) {
                window.location.href='/?action=signup';
            } else {
                $('#signupModal').modal('show');
            }

        });

        $('#loginBtnM').click(function (e) {
            $('#signupModal').modal('hide');
            $('#loginModal').modal('show');
        });

        $('#signupBtnM').click(function (e) {
            $('#loginModal').modal('hide');
            $('#signupModal').modal('show');
        });

        /* BABEL */

        const nav = document.querySelector('#nav');
        const menu = document.querySelector('#menu');
        const menuToggle = document.querySelector('.nav__toggle');
        const menuItem = document.querySelector('.nav__link');
        let isMenuOpen = false;


        // TOGGLE MENU ACTIVE STATE
        menuToggle.addEventListener('click', e => {
            e.preventDefault();
            isMenuOpen = !isMenuOpen;

            // toggle a11y attributes and active class
            menuToggle.setAttribute('aria-expanded', String(isMenuOpen));
            menu.hidden = !isMenuOpen;
            nav.classList.toggle('nav--open');
        });

        $('.nav__link').click(function () {
            isMenuOpen = !isMenuOpen;

            // toggle a11y attributes and active class
            menuToggle.setAttribute('aria-expanded', String(isMenuOpen));
            menu.hidden = !isMenuOpen;
            nav.classList.toggle('nav--open');
        })


        // TRAP TAB INSIDE NAV WHEN OPEN
        nav.addEventListener('keydown', e => {
            // abort if menu isn't open or modifier keys are pressed
            if (!isMenuOpen || e.ctrlKey || e.metaKey || e.altKey) {
                return;
            }

            // listen for tab press and move focus
            // if we're on either end of the navigation
            const menuLinks = menu.querySelectorAll('.nav__link');
            if (e.keyCode === 9) {
                if (e.shiftKey) {
                    if (document.activeElement === menuLinks[0]) {
                        menuToggle.focus();
                        e.preventDefault();
                    }
                } else if (document.activeElement === menuToggle) {
                    menuLinks[0].focus();
                    e.preventDefault();
                }
            }
        });
        
        @if(session()->has('SENT_CONTACTUS'))
            alert('Your inquiry has been submitted.');
        @endif

        @if(session()->has('SIGNUP_ERROR'))
            @if(session()->get('SIGNUP_ERROR') == true)
                $('#signupModal').modal('show');
            @endif
        @endif
    </script>

@endsection
