<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
     <!-- Other meta tags and links -->
     <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa; /* Set background color */
            color: #333; /* Set text color */
        }

        .navbar {
            background-color: #fff; /* Set navbar background color */
        }

        .navbar-brand {
            color: #007bff; /* Set navbar brand color */
            font-size: 24px; /* Adjust font size */
            font-weight: bold; /* Make the text bold */
        }

        .navbar-toggler {
            border-color: #007bff; /* Set navbar toggler border color */
        }

        .navbar-toggler-icon {
            background-color: #007bff; /* Set navbar toggler icon color */
        }

        .nav-link {
            color: #333; /* Set nav link color */
        }

        .nav-link:hover {
            color: #007bff; /* Set hover color for nav link */
        }

        .dropdown-menu {
            background-color: #fff; /* Set dropdown menu background color */
        }

        .dropdown-item {
            color: #333; /* Set dropdown item color */
        }

        .dropdown-item:hover {
            background-color: #f8f9fa; /* Set hover background color for dropdown item */
        }

        .col-sm-6 {
            padding: 20px; /* Add padding to columns */
        }

        section {
            height: 100vh; /* Set section height to viewport height */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center; /* Center align content */
        }

        @media (max-width: 767px) {
            section {
                height: 50vh; /* Set section height to half of viewport height on small screens */
            }
        }

        
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="" style="overflow-x: hidden;">
            <div class="row">
                <div class="col-sm-6">
                    <section>
                        <!-- Content for the left section -->
                    </section>
                </div>

                <div class="col-sm-6" style="margin-top:50px">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>

</html>
