@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <i class="pe-7s-cash"></i>
                        </div>
                        <div class="stat-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="" style="color:red">&#8369; {{$money_balance}}</span>
                                            <div class="stat-heading">Available Balance</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-left dib">
                                        <div class="stat-text">&#8369; <span class="">{{$total_income}}</span></div>

                                        <div class="stat-heading">Total Income</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <i class="pe-7s-cash"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text">&#8369; <span class="">{{$total_encashment}}</span></div>
                                <div class="stat-heading">Total Encashment</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <i class="pe-7s-cash"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text">&#8369; <span class="">{{$pending_encashment}}</span></div>
                                <div class="stat-heading">Pending Encashment</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-2">
                            <i class="fa fa-star" style="color:orange"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"> <span>{{$reward_points}}</span></div>
                                <div class="stat-heading">Reward Points Balance</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <i class="fa fa-star" style="color:orange"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text">&#8369; <span class="">{{$reward_claims}}</span></div>
                                <div class="stat-heading">Reward Claimed</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <i class="fa fa-star" style="color:orange"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text">&#8369; <span class="">{{$reward_claims_pending}}</span></div>
                                <div class="stat-heading">Pending Reward Claims</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-4">
                            <i class="pe-7s-users"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text">&#8369; <span class="">{{$referral_income}}</span></div>
                                <div class="stat-heading">Referral Bonus</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-3">
                            <i class="pe-7s-browser"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text">&#8369; <span class="">{{$captcha_income}}</span></div>
                                <div class="stat-heading">Captcha Bonus</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Referral Link
                </div>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" id="disabled-input" name="referral_link" readonly class="form-control" value="{{$referral_link}}">
                        <div class="input-group-btn"><button class="btn btn-primary copy-referral-link">COPY</button></div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('.user-side-bar li:nth-child(1)').addClass('active');

            $('.copy-referral-link').click(function() {
                var $input = $('input[name=referral_link]');
                $input.val();
                if (navigator.userAgent.match(/ipad|ipod|iphone/i)) {
                    var el = $input.get(0);
                    var editable = el.contentEditable;
                    var readOnly = el.readOnly;
                    el.contentEditable = true;
                    el.readOnly = false;
                    var range = document.createRange();
                    range.selectNodeContents(el);
                    var sel = window.getSelection();
                    sel.removeAllRanges();
                    sel.addRange(range);
                    el.setSelectionRange(0, 999999);
                    el.contentEditable = editable;
                    el.readOnly = readOnly;
                } else {
                    $input.select();
                }
                document.execCommand('copy');
                $input.blur();
                alert('Copied.');
            });
        })
    </script>
@endsection
