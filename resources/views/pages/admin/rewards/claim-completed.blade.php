@extends('layouts.admin')
@section('title','Completed Claims')
@section('content')
    <style>
        th, td {
        }
    </style>
    <section class="">
        <div class="container">
            <div class="row" style="overflow: auto;min-height: 500px;">
                <div class="col-md-12" style="width: 100vw;">
                    <table class="table table-bordered bg-white table-responsive" style="width: auto!important;">
                        <thead style="background: #000;color: white;">
                            <tr>
                                <th nowrap>Name</th>
                                <th nowrap>Email</th>
                                <th nowrap>Delivery Address</th>
                                <th nowrap>Mobile Number</th>
                                <th nowrap>Notes</th>
                                <th nowrap>Item</th>
                                <th nowrap>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $r)
                                <tr>
                                    <td nowrap="">{{$r->user->first_name}} {{$r->user->last_name}}</td>
                                    <td nowrap>{{$r->user->email}}</td>
                                    <td nowrap>{{$r->delivery_address}}</td>
                                    <td nowrap>{{$r->mobile_number}}</td>
                                    <td nowrap>{{$r->notes}}</td>
                                    <td nowrap>
                                        {{$r->reward->title}}<br>
                                        @if($r->payment_option == \App\Models\RewardClaimRequests::PAYMENT_OPTION_REWARD)
                                            <i class='fa fa-star' style="color:orange"></i> {{$r->reward->price_reward_points}}
                                        @endif
                                        @if($r->payment_option == \App\Models\RewardClaimRequests::PAYMENT_OPTION_MONEY )
                                            <i class='fa fa-money' style="color:green"></i> {{$r->reward->price_money_balance}}
                                        @endif
                                    </td>
                                    <td nowrap>
                                        {{date_format(date_create($r->created_at), 'M, d Y')}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$requests->links()}}
                </div>
            </div>
        </div>
    </section>
@endsection
