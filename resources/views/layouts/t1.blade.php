<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1  maximum-scale=1 user-scalable=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="shortcut icon" href="{{ asset('t1/img/favicon.png') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('t1/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('t1/css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('t1/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('t1/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('t1/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('t1/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('t1/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('t1/css/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('t1/css/style.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f2f310153a68b98"></script>
</head>
<body>
    <!-- navbar -->
    <div class="navbar">
        <div class="container">
            <div class="panel-control-left">
                <a href="#" data-activates="slide-out-left" class="sidenav-control"><i class="fa fa-bars"></i></a>
            </div>
            <div class="site-title">
                <a href="{{ url('/') }}" class="logo"><h1>{{ config('app.name', 'Laravel') }}</h1></a>
            </div>

            <div class="panel-control-right">
                <a href="{{ route('contact') }}"><i class="fa fa-envelope"></i></a>
            </div>
        </div>
    </div>
    <!-- end navbar -->

    <!-- panel control -->
    <div class="panel-control-left">
        <ul id="slide-out-left" class="side-nav collapsible"  data-collapsible="accordion">
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
            <li>
                <div class="photos">
                    <img src="https://api.adorable.io/avatars/130/{{ rand (500, 1000)  }}.png" alt="">
                    <h3>{{ Auth::user()->name }}</h3>
                </div>
            </li>
            <li class="first-list">
                <a href="{{ route('home') }}">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            @endguest
        </ul>
    </div>
    <!-- end panel control -->
    @if (session('message'))
        <div class="offers app-section app-pages">
            <div class="container">
                <div class="offers-content">
                    <div class="row">
                        <div class="col s4">
                            <div class="icon icon1">
                                <i class="fa fa-thumbs-up"></i>
                            </div>
                        </div>
                        <div class="col s8">
                            <div class="entry">
                                <p>{{ session('message') }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- end panel control -->
    @if ($errors->all())
        <div class="offers app-section app-pages container">
            @foreach ($errors->all() as $error)
                <blockquote>{{ $error }}</blockquote>
            @endforeach
        </div>
    @endif

    @yield('content')


<!-- Scripts -->
<script src="{{ asset('t1/js/jquery.min.js') }}"></script>
<script src="{{ asset('t1/js/materialize.min.js') }}"></script>
<script src="{{ asset('t1/js/slick.min.js') }}"></script>
<script src="{{ asset('t1/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('t1/js/custom.js') }}"></script>

    {{--
    <script src="{{ asset('t1/js/jquery.filterizr.min.js') }}"></script>
<script src="{{ asset('t1/js/lightbox.min.js') }}"></script>
<script src="{{ asset('t1/js/custom-portfolio.js') }}"></script>

--}}

    @yield('js')

    @if (session('toast'))
    <script>
        $(function () {
            Materialize.toast("{{ session('toast') }}", 4000);
        });
    </script>
    @endif

</body>
</html>
