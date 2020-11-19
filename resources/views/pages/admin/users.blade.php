@extends('layouts.admin')
@section('title','Activated Users')
@section('content')
    <style>
        @media(max-width: 425px) {

        }
    </style>
    <section id="adminUsers">
        <h1>Activated Users</h1>
        <hr>
        <p style="color:red;margin-bottom: 0px;"><strong>NOTE:</strong> Click user's <span style="color: darkgreen;font-weight: bold;">AVAILABLE INCOME</span> to edit</p>
        <div class="content">
            <table class="table table-bordered table-striped bg-white table-responsive">
                <thead style="background-color: #0d3537;color: white;">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        @if($status == 'activated')
                            <th>Captcha Income</th>
                            <th>Referral Income</th>
                            <th>Available Income</th>
                            <th>Action</th>
                        @endif
                        @if($status == 'deactivated')
                            <th>Action</th>
                        @endif
                        @if($status == 'pending')
                            <th>Activation Request</th>
                        @endif
                        <th>Registration Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $u)
                        <tr>
                            <td>{{$count}}</td>
                            <td>{{$u->first_name}} {{$u->last_name}}</td>
                            <td>{{$u->email}}</td>
                            @if($status == 'activated')
                                <?php
                                    $um = new \App\Models\Users;
                                ?>
                                <td><b style="color:green;">{{$um->getCaptchaIncome($u->id)}}</b></td>
                                <td><b style="color:orange;">{{$um->getReferralIncome($u->id)}}</b></td>
                                <td>
                                    <a href="#" class="edit-available-income" name="{{$u->first_name}} {{$u->last_name}}" uid="{{$u->id}}" balance="{{$um->getMoneyBalance($u->id)}}">{{$um->getMoneyBalance($u->id)}}</a>
                                </td>
                                <td>
                                    <form action="/user/deactivate" method="post">
                                        @csrf
                                        <input type="hidden" name="uid" value="{{$u->id}}">
                                        <input type="submit" class="btn btn-danger" value="DEACTIVATE">
                                    </form>
                                </td>
                            @endif
                            @if($status == 'deactivated')
                                <td>
                                    <form action="/user/reactivate" method="post">
                                        @csrf
                                        <input type="hidden" name="uid" value="{{$u->id}}">
                                        <input type="submit" class="btn btn-primary" value="REACTIVATE">
                                    </form>
                                </td>
                            @endif
                            @if($status== 'pending')
                                <td>
                                    @if(count($u->activationRequests) > 0)
                                        <a href="/activation-request/{{$u->id}}" target="_blank" class="btn btn-success color-white">Verify</a>
                                    @else
                                        <span style="color:red;">NONE</span>
                                    @endif
                                </td>
                            @endif
                            <td>{{date_format($u->created_at,'F - d - Y')}}</td>
                        </tr>
                        <?php
                        $count--;
                        ?>
                    @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </section>
    <div id="creditModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Edit User Balance - <strong id="editBalanceName"></strong>
                </div>
                <div class="modal-body">
                    <form action="/user/balance/edit" method="post">
                        @csrf
                        <input type="hidden" name="uid" value="0">
                        <input type="hidden" name="og_balance" value="0">
                        <input type="hidden" name="adjusted_balance" value="0">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Balance</label>
                                    <input type="number" value="0" id="userBalance" min="0" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Computed Adjustment</label>
                                    <h3 id="credit">0</h3>
                                    <input type="hidden" name="adjusted_balance" value="0">
                                </div>
                                <div class="col-md-12" style="padding-top: 20px;">
                                    <p style="font-size: 12px"><b>NOTE:</b> Computed Adjustment will be added to user as a CAPTCHA transaction</p>
                                    <input type="submit" class="btn btn-success form-control" value="SUBMIT">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function($){
            $('.edit-available-income').click(function () {
                let uid = $(this).attr('uid');
                let balance = $(this).attr('balance');
                let name = $(this).attr('name');

                $('#userBalance, input[name=og_balance]').val(balance);
                $('input[name=uid]').val(uid);
                $('#editBalanceName').text(name);

                $('#creditModal').modal('show');
            })

            $('#userBalance').on('change keyup', function () {
                let origBalance = $('input[name=og_balance]').val();
                let adjustedBalance = parseInt($('#userBalance').val()) - origBalance;

                $('#credit').text(adjustedBalance.toFixed(2));
                $('input[name=adjusted_balance]').val(adjustedBalance.toFixed(2));
            })
        });
    </script>
@endsection
