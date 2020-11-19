@extends('layouts.admin')
@section('title','Rewards')
@section('content')
    <style>
        .price {
            position: absolute;
            background: white;
            padding: 5px 20px;
            background: #21212096;
            color: white;
            font-size: 20px;
        }

        .price.reward {
            top: 0px;
            right: 0px;
        }
    </style>
    <section>
        <div class="row">
            <h1>Rewards</h1>
        </div>
        <hr>
        <div class="row rewards-row" style="padding: 40px;">
            @if(count($rewards) > 0)
                @foreach($rewards as $r)
                    <div class="col-md-4 col-sm-4">
                        <div class="card">
                            <span class="price reward">
                                <i class="fa fa-star" style="color:orange"></i> {{$r->price_reward_points}}<br><i class="fa fa-money" style="color:#04d204"></i> {{$r->price_money_balance}}
                            </span>

                            <img class="card-img-top" src="/images/rewards/{{$r->featured_image_url}}" alt="">
                            <div class="card-body">
                                <h4 class="card-title mb-3">{{$r->title}}</h4>
                                <p class="card-text">{{$r->description}}</p>
                            </div>
                            <a href="/reward/checkout/{{$r->id}}" class="btn btn-primary form-control" style="width: 90%;margin:auto;margin-bottom: 20px;background-color: #0d3537;border:none;">Check Out</a>
                        </div>
                    </div>
                    {{--<div class="col-md-3">--}}
                        {{--<div class="card" >--}}
                            {{--<div class="card-title text-center" style="padding-top: 10px;">--}}
                                {{--<h3>{{$r->title}}</h3>--}}
                            {{--</div>--}}
                            {{--<div class="card-body" >--}}
                                {{--<img src="/images/rewards/{{$r->featured_image_url}}" alt="" style="width: 100%;">--}}
                                {{--<div class="row">--}}
                                    {{--<table class="table table-striped  bg-white">--}}
                                        {{--<thead>--}}
                                            {{--<tr>--}}
                                                {{--<th>Description</th>--}}
                                            {{--</tr>--}}
                                        {{--</thead>--}}
                                        {{--<tbody>--}}
                                            {{--<tr>--}}
                                                {{--<td>{{$r->description}}</td>--}}
                                            {{--</tr>--}}
                                        {{--</tbody>--}}
                                    {{--</table>--}}
                                    {{--<table class="table table-bordered  bg-white">--}}
                                        {{--<thead>--}}
                                            {{--<tr>--}}
                                                {{--<th>Reward Points</th>--}}
                                                {{--<th>Cash Price</th>--}}
                                            {{--</tr>--}}
                                        {{--</thead>--}}
                                        {{--<tbody>--}}
                                            {{--<tr>--}}
                                                {{--<td>{{$r->price_reward_points}}</td>--}}
                                                {{--<td>{{$r->price_money_balance}}</td>--}}
                                            {{--</tr>--}}
                                        {{--</tbody>--}}
                                    {{--</table>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="card-footer">--}}
                                {{--<form action="/reward/claim/reward-points" method="post">--}}
                                    {{--@csrf--}}
                                    {{--<input type="hidden" name="rid" value="{{$r->id}}">--}}
                                    {{--<input type="submit" class="btn btn-success form-control" value="CLAIM VIA REWARD POINTS">--}}
                                {{--</form>--}}
                                {{--<form action="/reward/claim/cash" method="post">--}}
                                    {{--@csrf--}}
                                    {{--<input type="hidden" name="rid" value="{{$r->id}}">--}}
                                    {{--<input type="submit" class="btn btn-success form-control" value="CLAIM VIA CASH BALANCE">--}}
                                {{--</form>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                @endforeach
            @else
                <h1>No Item Found</h1>
            @endif
        </div>
        <div class="row">
            {{$rewards->links()}}
        </div>
    </section>
@endsection
