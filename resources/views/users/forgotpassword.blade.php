@extends('layouts.auth')
@section('content')
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 backPrimary">

            <div class="loginWrapper">
                <section class="d-inline-block">
                    <div class="loginHeader pt-1">
                        <img src="{{ asset('images/login_logo.png')}}" alt="login_logo.png" class="topLogo">
                        <div>
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h5 class="text-center textDark pt-4 mt-3 pb-3">Forgot Password</h5>
                    </div>

                    <div class="loginBody">
                        <form class="pl-3 pr-3" action="javascript:void(0)">
                            <div class="inputWithIcon mt-3">
                                <label for="email" class="mb-0">Email</label>
                                <input type="email" class="mt-1 email" name="email">
                                <i class="fa fa-user-o fa-lg fa-fw textPrimary" aria-hidden="true"></i>
                            </div>

                            <button type="submit" class="btn btn-block backSecondry textLight mt-2 loginBtn">Forgot password</button>
                        </form>
                    </div>

                    <div class="loginFooter">
                        <span><a href="{{ url('/') }}" class="textDark">Login?</a></span>
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