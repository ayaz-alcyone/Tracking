@extends('layouts.auth')

@section('content')

<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="loginWrapper backPrimary">
                    <section class="d-inline-block">
                        <div class="loginHeader pt-1">
                            <!-- <img src="./assets/images/logo.jpg" alt="logo.jpg"> -->
                            <div>
                                <span class="fa fa-location-arrow"></span>
                            </div>
                            <h5 class="text-center textDark pt-4 mt-3 pb-3">Forgot Password</h5>
                        </div>
                        <div class="loginBody backLight">
                            <form class="pl-3 pr-3">
                                <div class="inputWithIcon">
                                    <label for="name" class="mb-0">First Name</label>
                                    <input type="text" class="mt-1" name="name">
                                    <i class="fa fa-user-o fa-lg fa-fw textPrimary" aria-hidden="true"></i>
                                </div>

                                <div class="inputWithIcon">
                                    <label for="password" class="mb-0">Password</label>
                                    <input type="password" class="mt-1" name="password">
                                    <i class="fa fa-lock fa-lg fa-fw textPrimary" aria-hidden="true"></i>
                                </div>
                                <button type="submit" class="btn btn-block backSecondry textLight mt-2">Forgot Password</button>
                            </form>
                        </div>
                        <div class="loginFooter">
                            <span><a href="{{ url('/') }}" class="textDark">Login?</a></span>
                            <p class="text-center mb-0">Don't have an account yet? <a href="javascript:void(0)" class="textPrimary pl-1"><u>Contact Here</u></a></p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>


@endsection
