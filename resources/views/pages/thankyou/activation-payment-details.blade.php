@extends('layouts.default')
@section('content')
    <style>
        #apdThankyouPage {
            background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url("/temp-rex/assets/images/apd-thankyou.jpg");
            background-size:cover;
            background-repeat: no-repeat;
            height: 100vh;
            padding:60px;
        }

        .content-wrapper {
            margin-top: 50px;
            padding: 134px;
            text-align: center;
            background: #fff;
            height: 500px;

        }

        @media(max-width: 768px) {
            .content-wrapper {
                padding: 50px;
            }
        }

        @media(max-width: 767px) {
            h1 {
                font-size: 31px;
                color:black;
            }
        }

        @media(max-width: 475px) {
            h1 {
                font-size: 18px;
            }
            .content-wrapper {
                padding: 40px;
            }

            #apdThankyouPage {
                padding: 10px;
            }
        }

        @media(max-width: 425px) {
            h1 {
                font-size: 20px;
            }
            .content-wrapper {
                padding: 20px;
            }
        }

        @media(max-width: 320px) {
            h1 {
                font-size: 23px;
            }
        }

    </style>
    <section id="apdThankyouPage">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content-wrapper">
                        <h1>Thank you for submitting your<br>Activation payment details!</h1>
                        <hr>
                        <p>An email will be sent to your registered email address : <span><b style="color:blue;">{{$email}}</b></span></p>
                        <a href="/logout" class="btn btn-success">Go to Home page</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
