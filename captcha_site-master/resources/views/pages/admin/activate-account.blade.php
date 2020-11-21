@extends('layouts.admin')
@section('title','Admin Dashbaord')
@section('content')
    <section>
        <h1>{{$user->first_name}} {{$user->last_name}}</h1>
        <h4>{{$user->email}}</h4>
        <hr>
        <table class="table table-bordered bg-white">
            <thead>
                <tr>
                    <th>Text Details</th>
                    <th>Screenshot</th>
                    <th>Date Sent</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($apd as $a)
                <tr>
                    <td>
                        {{$a->description}}
                    </td>
                    <td>
                        <a href="/apd/{{$a->screenshot_url}}">
                            <img src="/apd/{{$a->screenshot_url}}" style="width: 400px;height: 200px;">
                        </a>
                    </td>
                    <td>
                        {{date_format($a->created_at, 'm-d-Y')}}
                    </td>
                    <td>
                        @if($a->is_accepted == 1)
                            <form id="apdForm" action="/activation-request/action" method="post">
                                @csrf
                                <input type="hidden" name="action" value="1">
                                <input type="hidden" name="uid" value="{{$user->id}}">
                                <input type="hidden" name="apdid" value="0">
                                <div>
                                    <a href="#" class="btn btn-success btn-action" apdid="{{$a->id}}" data-val="3" style="width:100px;">ACCEPT</a>
                                </div>
                                <hr>
                                <div>
                                    <a href="#" class="btn btn-danger btn-action" apdid="{{$a->id}}" data-val="2" style="width:100px;">REJECT</a>
                                </div>
                            </form>
                        @else
                            @switch($a->is_accepted)
                                @case(2)
                                    <b style="color:red;">REJECTED</b>
                                @break
                                @case(3)
                                    <b style="color:green">ACCEPTED</b>
                                @break
                            @endswitch
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#apdForm .btn-action').click(function () {
                console.log('asd');
                let val    = $(this).attr('data-val');
                let apdval = $(this).attr('apdid');
                $('#apdForm .btn-action').css('pointer-events', 'none');
                $('#apdForm input[name=action]').val(val);
                $('#apdForm input[name=apdid]').val(apdval);

                $('#apdForm').submit();
            });
        });
    </script>
@endsection
