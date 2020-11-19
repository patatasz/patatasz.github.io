@extends('layouts.admin')
@section('title','Admin Dashbaord')
@section('content')
    <section class="add-reward-page">
        <div class="row">
            <h1>Add Reward Item</h1>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                @if(session()->has('add_reward_success'))
                    <div class="alert alert-success">
                        Reward Item Added
                    </div>
                @endif
                @include('includes.error-validation')
                <form action="/rewards/add" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="featured_image">Featured Image</label>
                        <input type="file" name="featured_image">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Price - Reward Points</label>
                                <input type="number" name="price_reward" class="form-control" value="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Price - Money Balance</label>
                                <input type="number" name="price_money" class="form-control" value="0">
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success form-control">

                </form>
            </div>
        </div>
    </section>
@endsection
