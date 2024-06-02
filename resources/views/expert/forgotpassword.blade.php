@extends('expert.accountlayout.layout')


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

        <form action="index.html"
        novalidate>
            <div class="form-group">
                <label class="text-label text-dark"
                        for="email_2">Email Address:</label>
                <div class="input-group input-group-merge">
                    <input id="email_2"
                            type="email"
                            required=""
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


</div>

@endsection