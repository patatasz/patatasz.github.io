@extends('layouts.admin')
@section('title','Encashments')
@section('content')
    <section id="encashmentsPage">
        <h1>Encashments</h1>
        <hr>
        <table class="table table-bordered table-hover table-responsive">
            <thead style="background:#0d3537;color:white">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Payment Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                    <tr>
                        <td width="25%">{{$u->first_name}} {{$u->last_name}}</td>
                        <td width="25%">{{$u->email}}</td>
                        <td width="50%">
                            @foreach($u->encashments as $e)
                                <table class="table table-striped">
                                    <thead></thead>
                                    <tbody>
                                        @switch($e->payment_option)
                                            @case('palawan')
                                                <tr>
                                                    <th>Payment Option</th>
                                                    <td>Palawan Padala</td>
                                                </tr>
                                                <tr>
                                                    <th>Full Name</th>
                                                    <td>{{$e->full_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>{{$e->address}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Mobile Number</th>
                                                    <td>{{$e->mobile_number}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Amount</th>
                                                    <td>&#8369; {{$e->amount}}</td>
                                                </tr>
                                                @if($status != 'completed')
                                                    <tr>
                                                        <th>Action</th>
                                                        <td>
                                                            @if($status == 'pending')
                                                                <form action="/encashments/process" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="eid" value="{{$e->id}}">
                                                                    <input type="hidden" name="status" value="processing">
                                                                    <input type="submit" class="btn btn-success" value="Process">
                                                                </form>
                                                            @endif
                                                            @if($status == 'processing')
                                                                <form action="/encashments/process" method="post" class="d-inline">
                                                                    @csrf
                                                                    <input type="hidden" name="eid" value="{{$e->id}}">
                                                                    <input type="hidden" name="status" value="completed">
                                                                    <input type="submit" class="btn btn-success" value="Complete">
                                                                </form>
                                                                <form action="/encashments/process" method="post" class="d-inline">
                                                                    @csrf
                                                                    <input type="hidden" name="eid" value="{{$e->id}}">
                                                                    <input type="hidden" name="status" value="failed">
                                                                    <input type="submit" class="btn btn-danger" value="Fail">
                                                                </form>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif
                                            @break
                                            @case('coinsph')
                                                <tr>
                                                    <th>Payment Option</th>
                                                    <td>Coins PH</td>
                                                </tr>
                                                <tr>
                                                    <th>Coins PH Wallet Address</th>
                                                    <td>{{$e->coinsph_wallet_address}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Amount</th>
                                                    <td>&#8369; {{$e->amount}}</td>
                                                </tr>
                                                @if($status != 'completed')
                                                    <tr>
                                                        <th>Action</th>
                                                        <td>
                                                            @if($status == 'pending')
                                                                <form action="/encashments/process" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="eid" value="{{$e->id}}">
                                                                    <input type="hidden" name="status" value="processing">
                                                                    <input type="submit" class="btn btn-success" value="Process">
                                                                </form>
                                                            @endif
                                                            @if($status == 'processing')
                                                                <form action="/encashments/process" method="post" class="d-inline">
                                                                    @csrf
                                                                    <input type="hidden" name="eid" value="{{$e->id}}">
                                                                    <input type="hidden" name="status" value="completed">
                                                                    <input type="submit" class="btn btn-success" value="Complete">
                                                                </form>
                                                                <form action="/encashments/process" method="post" class="d-inline">
                                                                    @csrf
                                                                    <input type="hidden" name="eid" value="{{$e->id}}">
                                                                    <input type="hidden" name="status" value="failed">
                                                                    <input type="submit" class="btn btn-danger" value="Fail">
                                                                </form>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif
                                            @break
                                            @case('mlhuillier')
                                                <tr>
                                                    <th>Payment Option</th>
                                                    <td>Mlhuillier</td>
                                                </tr>
                                                <tr>
                                                    <th>Full Name</th>
                                                    <td>{{$e->full_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>{{$e->address}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Mobile Number</th>
                                                    <td>{{$e->mobile_number}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Amount</th>
                                                    <td>&#8369; {{$e->amount}}</td>
                                                </tr>
                                                @if($status != 'completed')
                                                    <tr>
                                                        <th>Action</th>
                                                        <td>
                                                            @if($status == 'pending')
                                                                <form action="/encashments/process" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="eid" value="{{$e->id}}">
                                                                    <input type="hidden" name="status" value="processing">
                                                                    <input type="submit" class="btn btn-success" value="Process">
                                                                </form>
                                                            @endif
                                                            @if($status == 'processing')
                                                                <form action="/encashments/process" method="post" class="d-inline">
                                                                    @csrf
                                                                    <input type="hidden" name="eid" value="{{$e->id}}">
                                                                    <input type="hidden" name="status" value="completed">
                                                                    <input type="submit" class="btn btn-success" value="Complete">
                                                                </form>
                                                                <form action="/encashments/process" method="post" class="d-inline">
                                                                    @csrf
                                                                    <input type="hidden" name="eid" value="{{$e->id}}">
                                                                    <input type="hidden" name="status" value="failed">
                                                                    <input type="submit" class="btn btn-danger" value="Fail">
                                                                </form>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif
                                            @break
                                            @case('gcash')
                                                <tr>
                                                    <th>Payment Option</th>
                                                    <td>GCash</td>
                                                </tr>
                                                <tr>
                                                    <th>Full Name</th>
                                                    <td>{{$e->full_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Mobile Number</th>
                                                    <td>{{$e->mobile_number}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Amount</th>
                                                    <td>&#8369; {{$e->amount}}</td>
                                                </tr>
                                                @if($status != 'completed')
                                                    <tr>
                                                        <th>Action</th>
                                                        <td>
                                                            @if($status == 'pending')
                                                                <form action="/encashments/process" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="eid" value="{{$e->id}}">
                                                                    <input type="hidden" name="status" value="processing">
                                                                    <input type="submit" class="btn btn-success" value="Process">
                                                                </form>
                                                            @endif
                                                            @if($status == 'processing')
                                                                <form action="/encashments/process" method="post" class="d-inline">
                                                                    @csrf
                                                                    <input type="hidden" name="eid" value="{{$e->id}}">
                                                                    <input type="hidden" name="status" value="completed">
                                                                    <input type="submit" class="btn btn-success" value="Complete">
                                                                </form>
                                                                <form action="/encashments/process" method="post" class="d-inline">
                                                                    @csrf
                                                                    <input type="hidden" name="eid" value="{{$e->id}}">
                                                                    <input type="hidden" name="status" value="failed">
                                                                    <input type="submit" class="btn btn-danger" value="Fail">
                                                                </form>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif
                                            @break
                                        @endswitch
                                    </tbody>
                                </table>
                                <hr>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
