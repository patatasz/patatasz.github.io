<style>
    .alert.alert-danger {
        margin-bottom: 0px;
    }
</style>
<div id="feature_signup" class="card text-left " style="overflow: auto">
    @include('includes.error-validation')
    <div class="card-body bg-dark">
        <form action="/signup" method="post">
            @csrf
            <input type="hidden" name="ref" value="{{\Illuminate\Support\Facades\Input::get('ref')}}">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" @if(session()->has('draft')) value="{{session()->get('draft')->first_name}}" @endif>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" @if(session()->has('draft')) value="{{session()->get('draft')->last_name}}" @endif>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" type="text" class="form-control" name="email" @if(session()->has('draft')) value="{{session()->get('draft')->email}}" @endif>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" type="text" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" type="text" class="form-control" name="password_confirmation">
            </div>
            <input type="submit" class="btn btn-success form-control" style="background: #1ab952;">
        </form>
    </div>
    <div class="card-footer text-center">
        <span>Already have an account?</span><a href="/" style="color:blue;"> Login now</a>
    </div>
</div>
