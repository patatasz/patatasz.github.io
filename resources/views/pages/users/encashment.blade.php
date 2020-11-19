@extends('layouts.admin')
@section('title','Encashment')
@section('content')
    <style>
        .card {
            height:350px;
        }
        .card-header, .card-footer {
            background: #0d3537 !important;
            color:white;
        }
    </style>
    <section>
        <div class="container-fluid">
            <div class="row text-center align-content-center">
                @if(session()->has('encashment_request_submitted'))
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            <h2>Encashment Request Submitted</h2>
                        </div>
                    </div>
                @endif
                @if(session()->has('available_income_not_enough'))
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            Your <b>AVAILABLE INCOME</b> is not enough to request an encashment. Minimum of 300 php per encashment request.
                        </div>
                    </div>
                @endif
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Globe GCASH
                        </div>
                        <div class="card-body">
                            <img src="/images/globegcash.png">
                        </div>
                        <div class="card-footer">
                            <a href="/encashment/gcash" class="btn btn-success">Withdraw</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Palawan Pawnshop
                        </div>
                        <div class="card-body">
                            <img src="/images/palawan-pawnshop.png">
                        </div>
                        <div class="card-footer">
                            <a href="/encashment/palawan" class="btn btn-success">Withdraw</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Coins.ph
                        </div>
                        <div class="card-body">
                            <img src="/images/coinsph.png">
                        </div>
                        <div class="card-footer">
                            <a href="/encashment/coinsph" class="btn btn-success">Withdraw</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            MLHUILLIER
                        </div>
                        <div class="card-body">
                            <img src="/images/mlhuillier.png">
                        </div>
                        <div class="card-footer">
                            <a href="/encashment/mlhuillier" class="btn btn-success">Withdraw</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
