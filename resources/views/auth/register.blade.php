<!doctype html>
<html lang="en">
<head>
    @include('includes.frontend.frontend_top')
    <title>Register | {{$website_title}}</title>
</head>
<body>
@include('layouts.frontend_header')
@include('includes.frontend.content.menu')
<div class="container margin_60">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8">
            <div class="box_account">
                <h3 class="new_client">New user</h3> <small class="float-right pt-2">* Required fields</small>
                <form class="" action="<?php echo route('register') ?>" method="post">
                    @csrf
                    <div class="form_container">
                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email *" required value="{{old('email')}}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="" placeholder="Password *" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password *" required>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name *" required value="{{old('name')}}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address *" required value="{{old('address')}}">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror"  name="phone" placeholder="Phone *" required value="{{old('phone')}}">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-7">
                                <div class="form-group">
                                    <label class="container_check">
                                        <small>
                                            Accept <a href="<?php echo url('home/terms_and_conditions'); ?>">Terms and condition</a>
                                            <input type="checkbox" required>
                                            <span class="checkmark"></span>
                                        </small>
                                    </label>
                                </div>
                            </div>

                        </div>


                        <div class="row mt-1">
                            <div class="col-md-12 mb-2">
                                <input type="submit" value="Sign Up" class="btn_1 w-100">
                            </div>
                            <div class="col-md-12">

                                <a id="login" class="btn_1 full-width outline wishlist icon-login" href="<?php echo route('login'); ?>">Login</a>
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

