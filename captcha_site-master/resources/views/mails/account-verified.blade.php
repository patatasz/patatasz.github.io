@extends('layouts.default')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Hello {{$user->first_name}},</h3>
                <p>
                    Good day! Your payment details has been verified and your account is now activated.
                    You can login now to <a href="{{$site_link}}" style="color: blue;font-weight: bold;">Trihomebased</a>. Enjoy!
                </p>
                <br><br>
                <p style="color:green;font-weight: bold;">
                    TRIHOMEBASED
                </p>
            </div>
        </div>
    </div>
@endsection