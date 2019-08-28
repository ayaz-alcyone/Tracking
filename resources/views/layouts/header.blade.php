<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tracking') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/googleFontFamily.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</head>
<body>
<div class="page-wrapper">
    <!-- Header -->
    <header>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark pb-0 pt-0">
            <a href="{{ URL('home') }}"> <img src="{{ asset('images/homeLogo.png') }}" alt="logo.png" class="topLogo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item custom-nav-item">
                        <a class="nav-link" id="trackingLink" href="{{ URL('home') }}">{{ __('messages.menu.tracking') }}</a>
                    </li>
                    <li class="nav-item custom-nav-item">
                        <a class="nav-link" href="{{ URL('route') }}">{{ __('messages.menu.route') }}</a>
                    </li>
                    <li class="nav-item custom-nav-item">
                        <a class="nav-link" href="{{ URL('photos') }}">{{ __('messages.menu.photos') }}</a>
                    </li>
                    <li class="nav-item custom-nav-item">
                        <a class="nav-link" href="{{ URL('invoices') }}">{{ __('messages.menu.invoices') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('messages.menu.eng') }}</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="lang/en/{{ Request::segment(1) }}"><img src="{{ asset('images/us-flag-round.png') }}" alt="us-flag-round.png" width="20px" class="mr-2"> English</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="lang/sp/{{ Request::segment(1) }}"><img src="{{ asset('images/maxico-flag.png') }}" alt="maxico-flag-round.png" width="20px" class="mr-2"> Spanish</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown pr-0">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('messages.menu.myAccount') }}</a>
                        <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                            <span class="fa fa-caret-up"></span>
                            <span class="fa fa-user-o userInPop mt-3"></span>
                            <p class="pt-3 textDark font-weight-bold userName">
                                @if (Session::has('user'))
                                    {{ session('user')['user_name'] }}
                                @endif
                            </p>
                            <p class="textDark conpanyName mb-2">
                                @if (Session::has('user'))
                                    {{ session('user')['company_name'] }}
                                @endif
                            </p>
                            <hr class="mb-2">
                            <p class="mb-0 signOut textPrimary"><a href="{{ route('user_logout') }}" class="textPrimary"><span class="fa fa-power-off pr-2"></span>{{ __('messages.menu.signOut') }}</a></p>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    @yield('content')
</body>
</html>