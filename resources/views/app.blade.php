<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>QLSV</title>

    <!-- Styles -->
    <link href="/public/css/app.css" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    QLSV
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if(session()->get( 'result' )->role == 1)
                    <li>
                        <a class="navbar-brand" href="{{ url('/user') }}"> List User</a>
                    </li>
                    @endif
                    <li>
                        <a class="navbar-brand" href="{{ url('/course') }}"> List Course</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (session()->get('auth') == 'true')
                        <li class="dropdown">
                            <a href="{{url('logout')}}">Logout</a>
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown-menu" role="button"--}}
                               {{--aria-expanded="false">--}}
                                {{--Profile--}}
                                {{--<span class="caret"></span>--}}
                            {{--</a>--}}
                            {{----}}

                            {{--<ul class="dropdown-menu" role="menu">--}}
                                {{--<li>--}}
                                    {{--<a href="{{url('logout')}}">Logout</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        </li>
                    @else
                        <li><a href="{{url('login')}}">Login</a></li>
                        {{--<li><a href="register">Register</a></li>--}}
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

</body>
</html>