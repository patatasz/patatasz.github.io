@extends('layouts.default')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <style>
                    .table-borderd th, .table-borderd td{
                        border: solid 1px #ddd;
                        padding:10px;
                    }
                </style>
                <table class="table table-bordered">
                    <tbod>
                        <tr>
                            <th>Name -</th>
                            <td>{{$name}}</td>
                        </tr>
                        <tr>
                            <th>Email -</th>
                            <td>{{$email}}</td>
                        </tr>
                        <tr>
                            <th>Inquiry -</th>
                            <td>{{$description}}</td>
                        </tr>
                    </tbod>
                </table>
            </div>
        </div>
    </div>
@endsection
