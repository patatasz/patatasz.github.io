@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-black-50 font-weight-bold">Referrals</h1>
        </div>
    </div>
    <div class="row referral-list">
        <div class="col-md-12">
            @if(count($referrals) > 0)
                <table id="bootstrap-data-table" class="table table-bordered table-responsive" style="background:white;margin-top:50px;">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Referral Level</th>
                            <th>Earnings</th>
                            <th>Registration Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($referrals as $r)
                            <?php
                            $user = explode(',', $r->source_token);
                            ?>
                            <tr>
                                <td>{{$user[0]}}</td>
                                <td>{{$user[1]}}</td>
                                <td>{{str_replace('_level', '', $user[2])}}</td>
                                <td>
                                    @if($r->type_id == \App\Models\Transactions::TYPE_REFERRAL_BONUS_REWARD)
                                        <i class="fa fa-star" style="color:orange"></i>
                                    @elseif($r->type_id == \App\Models\Transactions::TYPE_REFERRAL_BONUS_MONEY)
                                        <i class="fa fa-money" style="color:green"></i>
                                    @endif
                                    {{$r->value}}
                                </td>
                                <td>{{$r->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$referrals->links()}}
            @else
                <div class="card" style="margin-top:50px;">
                    <div class="card-body">
                        <h1>No Records Found</h1>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('.user-side-bar li:nth-child(3)').addClass('active');

        })
    </script>
@endsection