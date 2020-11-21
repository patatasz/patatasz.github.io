@extends('layouts.default')
@section('title','Login')
@section('content')
    <link rel="stylesheet" href="/css/login.css">
    <section id="log-in-page">
        @if($errors)
            @if(count($errors) > 0)
                <ul class="alert alert-danger">
                    @foreach($errors as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        @endif
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <form action="/login" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <input type="submit" class="btn btn-dark form-control">
                </form>
            </div>
            <div class="card-footer text-center">
                <span>Don't have an account?</span><a href="/signup"> Sign up!</a>
            </div>
        </div>
    </section>
@endsection