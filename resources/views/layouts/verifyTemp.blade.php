<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'NSCDC Recruitment Portal') }}</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    {!! MaterializeCSS::include_css() !!}
    
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/wnoty.js')}}"></script>
    {!! MaterializeCSS::include_js() !!}
    <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>

    <style>
        :root {
            --primary-bg-dark: #164f6b; 
            --primary-bg-mid: #0e75a7; 
            --primary-bg-light: #039be5;  
            
            --primary-trans-bg-dark: #164f6b;
            --primary-trans-bg-light: #039be5;
            
            --secondary-bg-dark: #8d1003; 
            --secondary-bg-light: #c91e0b; 
            
            --switch-dark: #164f6b; 
            --switch-light: #039be5; 

            --button-dark: #164f6b; 
            --button-light: #039be5;
            --button-secondary: #8d1003;
        }
    </style>
    <link rel="stylesheet" href="{{asset('css/wnoty.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="app" id="app">
        {{-- Navbar goes here --}}
        <div id="space-for-sidenave" class="navbar-fixed">
            <nav>
                <div class="nav-wrapper">
                    <!-- LOGO AREA HERE -->
					<a href="#" class="brand-logo" style="height: 100%; display: flex; align-items: center; justify-content: center;"><img src="{{asset('storage/nscdclogo50.png')}}" class="responsive-image" alt="logo"> <p style="font-size: 16px; font-weight: bold; margin-left: 8px;" class="hide-on-med-and-down">Nigeria Security and Civil Defence Corps</p>
					</a>

                    {{-- OTHER MENU RIGHT --}}
                    <a href="#" data-target="slide-out" class="sidenav-trigger hide-on-med-and-up right"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li class="logOutBtn">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="material-icons right">power_settings_new</i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                    @auth
                    <ul class="right hide-on-small-only">
                        <a href="#">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</a>
                    </ul>
                    @endauth
                </div>
            </nav>
        </div>

        {{-- CONTENT AREA    --}}
            @if (session()->has('accessError'))
                <script>
                $(document).ready(function () {
                        $.wnoty({
                        type: 'error',
                        message: '{{session('accessError')}}',
                        autohideDelay: 5000
                        });
                    });
                </script>
            @endif
            @if (session()->has('error'))
                <script>
                $(document).ready(function () {
                        $.wnoty({
                        type: 'error',
                        message: '{{session('error')}}',
                        autohideDelay: 5000
                        });
                    });
                </script>
            @endif
            @if (session()->has('info'))
                <script>
                $(document).ready(function () {
                        $.wnoty({
                        type: 'info',
                        message: '{{session('info')}}',
                        autohideDelay: 10000
                        });
                    });
                </script>
            @endif
            @if (session()->has('success'))
                <script>
                $(document).ready(function () {
                        $.wnoty({
                        type: 'success',
                        message: '{{session('success')}}',
                        autohideDelay: 5000
                        });
                    });
                </script>
            @endif
            @if (session('resent'))
                <script>
                $(document).ready(function () {
                        $.wnoty({
                        type: 'success',
                        message: 'A fresh verification link has been sent to your email address.',
                        autohideDelay: 5000
                        });
                    });
                </script>
            @endif
		
        @yield('content')
        <!-- FOOTER AREA -->
        <div class="footer-copyright light-blue darken-4">
            <div class="container white-text" style="padding: 5px 0;">
                &copy 2018 ICT & Cybersecurity <a class="grey-text text-lighten-4" href="http://www.nscdc.gov.ng">NSCDC</a>
            </div>
        </div>

    <script>
        let base_url = '{{ asset('/') }}';
    </script>
</body>
</html>
