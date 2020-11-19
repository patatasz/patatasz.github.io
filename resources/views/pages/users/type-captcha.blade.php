@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <style>
        .content {
        }
        .col-xs-6 {
            width:50% ;
        }
        @media(max-width: 768px) {
            .captcha-box {
                width: auto !important;
            }
        }
        @media(max-width: 375px) {
            .right-panel header.header .top-right {
                padding: 0px;
            }
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-black-50 font-weight-bold">Encode, Earn and Enjoy!</h1>
        </div>
    </div>
    <div class="row" style="margin-top: 30px;">
        <div class="container" style="width: 100%;">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="">{{$total_captcha}}</span></div>
                                        <div class="stat-heading">Total Captcha</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text">&#8369; <span class="">{{$total_earnings}}</span></div>
                                        <div class="stat-heading">Total Captcha Earnings</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="">{{$today_captcha}}</span></div>
                                        <div class="stat-heading">Today's Total Captcha</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text">&#8369; <span class="">{{$today_earnings > 0 ? $today_earnings : 0}}</span></div>
                                        <div class="stat-heading">Today's Total Earnings</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row text-center" style="padding-top:50px;">
        @if(session()->has('success'))
        <div class="col-md-12">
            <div style="width:auto;margin: auto;">

                    @if(session()->get('success'))
                        <div class="alert-success" style="padding: 10px;">
                            Captcha is correct!
                        </div>
                    @else
                        <div class="alert-danger" style="padding: 10px;">
                            Captcha is wrong!
                        </div>
                    @endif
            </div>
        </div>
        @endif

        <div class="col-md-12">
            @include('includes.error-validation')
            <div id="captchaBox" class="captcha-box" style="width:600px;margin: auto;">
                <div class="card">
                    <div class="card-header">
                        Encode Captcha!
                    </div>
                    <div class="card-body">
                        <form action="/typing-captcha/attempt" method="post">
                            @csrf
                            @captcha
                            <div class="captcha-input container" style="background: #dde;margin-top:30px;padding:30px;">
                                <div class="row">
                                    <div class="col-sm-9 col-xs-6">
                                        <input type="text" id="captcha" name="captcha" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-sm-3 col-xs-6">
                                        <input type="submit" class="btn btn-dark form-control" id="submitCaptcha">
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="/js/loadingOverlay/dist/loadingoverlay.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('.user-side-bar li:nth-child(2)').addClass('active');

            $('#submitCaptcha').click(function () {
                $('body').LoadingOverlay("show");
            })
        })
    </script>
@endsection