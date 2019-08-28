@extends('layouts.admin_header')
@section('content')
    @php
        $data = session()->get('adminInfo');
    @endphp

    <!-- Header -->
    <header>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><span class="fa fa-location-arrow"></span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">                 
                    <li class="nav-item dropdown">
                        <span class="fa fa-user textDark adminIcon"></span>
                        <a class="nav-link dropdown-toggle d-inline-block text-capitalize" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $data['first_name'] }}</a>
                        <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                            <span class="fa fa-caret-up"></span>
                            <span class="fa fa-user-o userInPop"></span>
                            <p class="pt-2 textDark font-weight-bold userName text-capitalize">{{ $data['first_name'].' '.$data['last_name'] }}</p>
                            <p class="textDark conpanyName text-capitalize">{{ $data['company_name'] }}</p>
                            <hr class="mb-2">
                            <a href="{{ route('admin_logout') }}" class="mb-0 signOut textPrimary"><span class="fa fa-power-off pr-2"></span>Sign Out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>        
@endsection