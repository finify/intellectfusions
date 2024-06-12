@extends('user.accountlayout.layout')


@section('content')
<div class="layout-login-centered-boxed__form card">
<div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-5 navbar-light">
    <a href="/"
        class="navbar-brand flex-column mb-2 align-items-center mr-0"
        style="min-width: 0">
        <img src="{{ env('APP_LOGO') }}" width="200px" alt="">
    </a>
    <p class="m-0">Input email to get a reset password link </p>
</div>

<!-- <div class="alert alert-soft-danger d-flex"
        role="alert">
    <i class="material-icons mr-3">check_circle</i>
    <div class="text-body">An email with password reset instructions has been sent to your email address, if it exists on our system.</div>
</div>

<a href=""
    class="btn btn-light btn-block">
    <span class="fab fa-google mr-2"></span>
    Continue with Google
</a> -->

<!-- <div class="page-separator">
    <div class="page-separator__text">or</div>
</div> -->


@if(!empty($page))
    @if ($page == "resetform")
        @if(Session::has('reset_success'))
            <div class="alert alert-success" role="alert">
            {{Session::get('reset_success')}}
            </div>
        @endif 
        @if(Session::has('reset_error'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('reset_error')}}
            </div>
        @endif
        <form action="" method="post">@csrf
            <div class="form-group">
                <label class="text-label text-dark"
                        for="email_2">Email Address:</label>
                <div class="input-group input-group-merge">
                    <input id="email_2"
                            type="email" required
                            name="email" value="{{ old('email') }}"
                            class="form-control form-control-prepended"
                            placeholder="john@doe.com">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="far fa-envelope"></span>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="form-group">
                <button class="btn btn-block btn-primary user-type-active py-3"
                        type="submit">Reset Password</button>
            </div>
        </form>

    @endif
@endif

@if(!empty($page))
    @if ($page == "reset")
        @if(Session::has('reset_success'))
            <div class="alert alert-success" role="alert">
            {{Session::get('reset_success')}}
            </div>
        @endif 
        @if(Session::has('reset_error'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('reset_error')}}
            </div>
        @endif
        <form method="post" action="{{ url('user/resetpassword/reset')}}?q={{$q}}">@csrf
            <div class="form-group">
                <label class="text-label text-dark"
                        for="password_1">Enter New Password:</label>
                <div class="input-group input-group-merge">
                    <input id="password_1"
                            type="password" required
                            name="password" value=""
                            class="form-control form-control-prepended"
                            >
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-key"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="text-label text-dark"
                        for="password_2">Confirm Password:</label>
                <div class="input-group input-group-merge">
                    <input id="password_2"
                            type="password" required
                            name="confirm_password" value=""
                            class="form-control form-control-prepended"
                            >
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-key"></span>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="form-group">
                <button class="btn btn-block btn-primary user-type-active py-3"
                        type="submit">Reset Password</button>
            </div>
        </form>

    @endif
@endif

@if(!empty($page))
    @if ($page == "Expired")
        <!-- login form -->
        <div class="row gy-2  mt-3 text-white">
            <div class="col-12">
                <center><h4 class="text-red">Error</h4></center>
            </div>
            <div class="col-12">
                <center>
                    <img src="/homeassets/img/error.png" width="50px" alt="">
                </center>
            </div>
            <div class="col-12">
                <center>
                    <h2>Link Expired or Doesn't Exist </h2> </br>
                    <a href="/user/resetpassword/resetform">Reset Password Here</a>
                </center>
            </div>
            
        </div>
    @endif
@endif

@if(!empty($page))
    @if ($page == "completed")
        <!-- login form -->
        <div class="row gy-2  mt-3 text-white">
            <div class="col-12">
                <center><h4 class="text-red">Successs</h4></center>
            </div>
            <div class="col-12">
                <center>
                    <img src="/homeassets/img/success.png" width="50px" alt="">
                </center>
            </div>
            <div class="col-12">
                <center>
                    <h2>Password Reset Completed  </h2> </br>
                    <a href="/user/login">Login</a>
                </center>
            </div>
            
        </div>
    @endif
@endif


</div>

@endsection