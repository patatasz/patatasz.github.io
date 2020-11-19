@extends('layouts.default')
@section('title','Thank You!')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center" style="padding-top:150px;">
                <h1>Thank you! Your reward claim request has been submitted.</h1>
                <p>An email will be sent to you regarding with the request in 24 - 48 hours.</p>
                <a href="/rewards/list" class="btn btn-success" style="margin-top: 100px;">Go back to Rewards Page</a>
            </div>
        </div>
    </div>
@endsection
