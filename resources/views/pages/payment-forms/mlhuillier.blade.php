@extends('layouts.admin')
@section('title','Encashment')
@section('content')
    <style>
        .card {
            width: 600px;
            margin: auto;
        }
        .card-header, .card-footer {
            background: #0d3537 !important;
            color:white;
        }
    </style>
    <section>
        <div class="container-fluid">
            <div class="row text-center align-content-center">
                <div class="col-md-12">
                    @include('includes.error-validation')
                    <form action="/encashment" method="post">
                        <div class="card">
                            <div class="card-header">
                                MLhuillier
                            </div>
                            <div class="card-body">
                                @csrf
                                <input type="hidden" name="payment_option" value="mlhuillier">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Full Name" name="full_name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Address" name="address" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Mobile Number" name="mobile_number" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Amount" name="amount" required>
                                </div>
                                <br>
                                <p>
                                    Payment Details will be sent to your registered email within the next 24 - 48 hours.
                                </p>
                                <strong>Sending Fee : 9.00 PHP</strong>
                            </div>
                            <div class="card-footer">
                                <input type="submit" value="REQUEST" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
