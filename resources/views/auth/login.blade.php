<!doctype html>
<html lang="en">
<head>
    @include('includes.frontend.frontend_top')
    <title>Login | {{$website_title}}</title>
</head>
<body>
@include('layouts.frontend_header')
@include('includes.frontend.content.menu')
<div class="container margin_60">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8">
            <div class="box_account">
                <h3 class="client">Already registered</h3>
                <form class="" action="<?php echo route('login'); ?>" method="post">
                    @csrf
                    <div class="form_container">
                        <div class="divider"><span>Login credentials</span></div>
                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror " name="email" id="email" placeholder="Email*">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror " name="password" id="password" value="" placeholder="Password*">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="clearfix add_bottom_15">
                            <div class="float-right"><a id="forgot-pass" href="<?php echo route('password.request'); ?>"> <small>Lost password?</small> </a></div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <input type="submit" value="Log In" class="btn_1 w-100">
                            </div>
                            <div class="col-md-12">
                                <a id="sign_up" class="btn_1 full-width outline wishlist icon-login" href="<?php echo route('register'); ?>">Sign up</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('includes.frontend.frontend_bottom')
</body>
</html>



