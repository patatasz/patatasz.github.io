@extends('layouts.default')
@section('title', 'Sign Up')
@section('content')
    <link rel="stylesheet" href="/css/signup.css">
    <section id="sign-up-page">
        @include('includes.error-validation')
        <div class="card">
            <div class="card-header">
                <h1>Sign Up</h1>
            </div>
            <div class="card-body">
                <form action="/signup" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" @if(session()->has('draft')) value="{{session()->get('draft')->first_name}}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" @if(session()->has('draft')) value="{{session()->get('draft')->last_name}}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" type="text" class="form-control" name="email" @if(session()->has('draft')) value="{{session()->get('draft')->email}}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" type="text" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" type="text" class="form-control" name="password_confirmation">
                    </div>
                    <input type="submit" class="btn btn-dark form-control">
                </form>
            </div>
            <div class="card-footer">
                <a href="/login">Login now</a>
            </div>
        </div>
    </section>
@endsection