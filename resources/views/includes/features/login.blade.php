<div id="feature_login" class="card text-left">
    <div class="card-body bg-dark">
        <form action="/login" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <input type="submit" class="btn btn-success form-control" style="background: #1ab952;" value="LOGIN">
        </form>
    </div>
    <div class="card-footer text-center">
        <span>Don't have an account?</span><br><a href="?action=signup" style="color:blue;"> Sign up</a> | <a href="/forgot-password" style="color:red;font-size: 14px;">Forgot Password</a>
    </div>
</div>