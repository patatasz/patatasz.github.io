@extends('layouts.default')
@section('title','Forgot Password')
@section('content')
    <link rel="stylesheet" href="/css/forgot-password.css">
    <style>
        #forgot-password-page {
            padding: 60px;
            background: url("/temp-rex/assets/images/activate-acc-bg.jpg");
            background-position: bottom center;
            height: 100vh;
        }

        .content-wrapper {
            padding: 30px;
            background: #0d3537;
            position: relative;
        }
    </style>
    <section id="forgot-password-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="forgot-pass-box">
                        @if($errors)
                            @if(count($errors) > 0)
                                <ul class="alert alert-danger">
                                    @foreach($errors as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif
                        @endif
                        <div class="card content-wrapper">
                            <div class="card-header">
                                <h2 style="color:white !important;">Forgot Password</h2>
                            </div>
                            <div class="card-body">
                                <form action="/forgot-password" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>

                                    <input type="submit" class="btn btn-success form-control">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection