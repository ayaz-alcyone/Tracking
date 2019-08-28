@extends('layouts.auth')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 backPrimary">

            <div class="loginWrapper">
                <section class="d-inline-block">
                    <div class="loginHeader pt-1">
                        <img src="{{ asset('images/login_logo.png') }}" alt="login_logo.png" class="topLogo">
                        <div>
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h5 class="text-center textDark pt-4 mt-3 pb-3">Welcome back! Please Login.</h5>
                    </div>

                    <div class="loginBody">
                        
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block ml-3 mr-3">
                                <button type="button" class="close" data-dismiss="alert">×</button>	
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block ml-3 mr-3 loginError">
                                <button type="button" class="close" data-dismiss="alert"><span>x</span></button>	
                                <strong class="text-capitalize">{{ $message }}</strong>
                            </div>
                        @endif
                        <form class="pl-3 pr-3" method='POST' action="{{ route('user_login') }}">
                            <div class="inputWithIcon mt-3">
                                <label for="email" class="mb-0">Sign in with your username</label>
                                <input type="email" class="mt-1 email" name="email">
                                <i class="fa fa-user-o fa-lg fa-fw textPrimary" aria-hidden="true"></i>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="inputWithIcon">
                                <label for="password" class="mb-0">Password</label>
                                <input type="password" class="mt-1 password" name="password">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <i class="fa fa-lock fa-lg fa-fw textPrimary" aria-hidden="true"></i>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-block backSecondry textLight mt-2 loginBtn">LOGIN</button>
                        </form>
                    </div>

                    <div class="loginFooter">
                        <span><a href="{{ URL('/users/forgotpassword') }}" class="textDark">Forgot Password?</a></span>
                        <p class="text-center mb-0">Don't have an account yet? <a href="javascript:void(0)" class="textPrimary pl-1"><u class="font-weight-bold">Contact ARMS</u></a></p>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $(".loginWrapper").height($(window).height());
    if ($(window).height() >= 366) {
        $(".loginWrapper").height($(window).height());
    } else {
        $(".loginWrapper").height(366);
    }
});
</script>
@endsection