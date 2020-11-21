@extends('layouts.admin')
@section('title','Admin Dashbaord')
@section('content')
    <section class="add-reward-page">
        <div class="row">
            <h1>Edit Reward Item</h1>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                @if(session()->has('edit_reward_success'))
                    <div class="alert alert-success">
                        Reward Item Updated!
                    </div>
                @endif
                @include('includes.error-validation')
                <form action="/rewards/edit" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="current_featured_image" value="{{$reward->featured_image_url}}">
                    <input type="hidden" name="rid" value="{{$reward->id}}">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$reward->title}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" value="{{$reward->description}}">
                    </div>
                    <div class="form-group">
                        <label for="featured_image">Featured Image</label>
                        <input type="file" name="featured_image">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Price - Reward Points</label>
                                <input type="number" name="price_reward" class="form-control" value="{{$reward->price_reward_points}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Price - Money Balance</label>
                                <input type="number" name="price_money" class="form-control" value="{{$reward->price_money_balance}}">
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success form-control" value="Update">
                </form>
            </div>
        </div>
    </section>
@endsection
