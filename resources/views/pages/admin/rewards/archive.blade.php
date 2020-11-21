@extends('layouts.admin')
@section('title','Admin Dashbaord')
@section('content')
    <section class="add-reward-page">
        <div class="row text-center">
            <div class="col-md-12">
                <h1 class="text-center" style="color:red"><b>ARCHIVE</b></h1>
            </div>
        </div>
        <hr>
        <div class="row">
            @if(count($rewards) > 0)
                @foreach($rewards as $r)
                    <div class="col-md-3">
                        <div class="card" >
                            <div class="card-title text-center" style="padding-top: 10px;">
                                <h3>{{$r->title}}</h3>
                            </div>
                            <div class="card-body" >
                                <img src="/images/rewards/{{$r->featured_image_url}}" alt="" style="width: 100%;">
                                <div class="row">
                                    <table class="table table-striped  bg-white">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$r->description}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered  bg-white">
                                        <thead>
                                            <tr>
                                                <th>Reward Points</th>
                                                <th>Cash Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$r->price_reward_points}}</td>
                                                <td>{{$r->price_money_balance}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="/rewards/edit/{{$r->id}}" class="btn btn-primary form-control" style="margin-bottom: 10px;">EDIT</a>
                                @if($r->is_published == \App\Models\Rewards::SAVED)
                                    <form action="/rewards/publish" method="post">
                                        @csrf
                                        <input type="hidden" name="rid" value="{{$r->id}}">
                                        <input type="submit" class="btn btn-success form-control" value="PUBLISH">
                                    </form>
                                @endif
                                @if($r->is_published == \App\Models\Rewards::PUBLISHED)
                                    <a href="/rewards/archive/{{$r->id}}" class="btn btn-danger form-control">ARCHIVE</a>
                                @endif
                                @if($r->is_published == \App\Models\Rewards::ARCHIVED)
                                    <form action="/rewards/publish" method="post">
                                        @csrf
                                        <input type="hidden" name="rid" value="{{$r->id}}">
                                        <input type="submit" class="btn btn-success form-control" value="PUBLISH">
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h1>No Item Found</h1>
            @endif
        </div>
    </section>
@endsection

