@extends('layouts.default')
@section('content')
    <style>
        #activateAccPage {
            padding: 60px;
            background: url("/temp-rex/assets/images/activate-acc-bg.jpg");
            background-position: bottom center;
            height: 100vh;
        }

        .content-wrapper {
            padding: 30px;
            background: #fff;
            position: relative;
        }

        label {
            font-weight: bold;
            text-transform: uppercase;
            color:black;
        }

        .logout {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        @media (max-width: 1024px) {
            .card-body img {
                width:100%;
                height: fit-content;
            }
        }

        @media(max-width: 767px) {
            .container {
                width:100%;
            }

            .main-wrapper {
                padding-top:65px;
            }
        }

        @media(max-width: 540px) {
            #activateAccPage {
                padding:0px;
            }

            .payment-method-list .card {
                height: auto;
            }

            .main-wrapper {
                padding-top:80px;
            }
        }
        
        @media(max-width: 406px) {
            .payment-method-list .card-header {
                font-size:14px;
            }

            .payment-method-list {
                padding:0px;
            }
        }

        @media(max-width: 415px) {
            #activateAccPage h2.text-black-50 {
                font-size: 25px;
            }
        }

        @media(max-width: 375px) {
            #activateAccPage h2.text-black-50 {
                font-size: 20px;
                line-height: 27px;
            }
        }

        @media(max-width: 341px) {
            .payment-method-list .card-header {
                font-size:12px;
            }

        }
    </style>
    <section id="activateAccPage">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content-wrapper main-wrapper">
                        <h2 class="text-black-50">Hi <span style="text-transform: capitalize">{{$user->first_name}}</span>, your account is not yet activated.</h2>
                        <a href="/logout" class="btn btn-outline-danger logout" style="float:right"><i class="fa fa-power-off"></i> Logout</a>
                        <p>Please pay a registration fee of 150.00 PHP to any of the following payment outlet below to activate your account.</p>

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
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="text-black-50">Done paying the registration fee?</h2>
                                <p>Submit the transaction details of the payment made OR send a readable SCREENSHOT/PHOTO of the payment receipt below.</p>
                                <p>Need help? Feel free to contact us at <a href="mailto:trihomebased@gmail.com" style="color:dodgerblue;font-weight: bold;">trihomebased@gmail.com</a> for inquiries and questions.</p>
                                @include('includes.error-validation')
                                <form action="/activation-payment-details" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Details</label>
                                        <textarea name="text_details" class="form-control" style="height: 100px;text-align: left;padding:10px;" value=""></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload a SCREENSHOT</label>
                                        <br>
                                        <input type="file" name="payment_details_screenshot">
                                    </div>
                                    <input type="submit" class="btn btn-success " style="width: 100px;">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
