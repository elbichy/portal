<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ config('app.name', 'NSCDC Recruitment Portal') }}@isset($title) - {{ $title }}@endisset
    </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/wnoty.js')}}"></script>
    {!! MaterializeCSS::include_js() !!}
    {!! MaterializeCSS::include_css() !!}
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('css/wnoty.css')}}">
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="app" id="app">
        {{-- Navbar goes here --}}
        <div id="space-for-sidenave" class="navbar-fixed">
            <nav>
                <div class="nav-wrapper">
                    {{-- BREADCRUMB --}}
                    <div class="left breadcrumbWrap hide-on-small-only">
                        @if(request()->segment(1) == 'applicant')
                            <a href="/applicant" class="breadcrumb">Applicant</a>
                        @else
                            <a href="/administrator" class="breadcrumb">Administrator</a>
                        @endif
                            <a href="/{{request()->segment(1)}}/{{request()->segment(2)}}" class="breadcrumb">{{(request()->segment(2) == '') ? 'Dashbord' : ucfirst(request()->segment(2))}}</a>
                        @if(request()->segment(3) != '')
                            <a href="/{{request()->segment(1)}}/{{ request()->segment(2) }}/{{request()->segment(3)}}" class="breadcrumb">{{ strtoupper(request()->segment(3)) }}</a>
                        @endif
                    </div>

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

        {{-- SIDE NAV --}}
        <ul id="slide-out" class="sidenav sidenav-fixed" style="min-height: 100%; display: flex; flex-direction: column;">
            <div class="sideNavContainer">
                {{-- THE RED LOGO AREA --}}
                <li>
                    <div class="user-view">
                        
                        {{-- BUSINESS LOGO --}}
                        <a href="#user"><img class="circle" src="{{asset('storage/nscdclargelogo.png')}}"></a>
                    
                        {{-- BUSINESS NAME --}}
                        <a href="#name"><span class="white-text name">
                            Nigeria Security & Civil Defence Corps
                        </span></a>

                        {{-- BUSINESS BRANCH AND ADDRESS --}}
                        <a href="#email"><span class="white-text email">Recruitment portal</span></a>
                    </div>
                </li>
            @can('isApplicant')
                <li class="{{(request()->segment(1) == 'applicant' && request()->segment(2) == NULL) ? 'active' : ''}}">
                    <a href="/applicant"><i class="material-icons">dashboard</i>DASHBOARD</a>
                </li>
                {{-- (($action == 'edit') ? 'Edit' : ($action == 'delete') ? 'Delete' : 'New'); --}}
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                    <li class="{{ (request()->segment(2) == 'personal-data') ? 'active' : ((request()->segment(2) == 'contact-data') ? 'active' : ((request()->segment(2) == 'medical-data') ? 'active' : ''))}}">
                        <a style="padding:0 32px;" class="collapsible-header">
                            <i class="material-icons">person</i>PERSONAL DATA<i class="material-icons right">arrow_drop_down</i>
                        </a>
                        <div class="collapsible-body">
                        <ul>
                            <li class="{{(request()->segment(2) == 'personal-data') ? 'active' : ''}}">
                                <a href="/applicant/personal-data">Personal Info</a>
                            </li>
                            <li class="{{(request()->segment(2) == 'contact-data') ? 'active' : ''}}">
                                <a href="/applicant/contact-data">Contact Info</a>
                            </li>
                            <li class="{{(request()->segment(2) == 'medical-data') ? 'active' : ''}}">
                                <a href="/applicant/medical-data">Medical Info</a>
                            </li>
                        </ul>
                        </div>
                    </li>
                    </ul>
                </li>

                <li class="{{(request()->segment(2) == 'next-of-kin-data') ? 'active' : ''}}">
                    <a href="/applicant/next-of-kin-data"><i class="material-icons">people</i>NEXT OF KIN DATA</a>
                </li>

                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                    <li class="{{ (request()->segment(2) == 'primary-school') ? 'active' : ((request()->segment(2) == 'secondary-school') ? 'active' : ((request()->segment(2) == 'tertiary-institution') ? 'active' : ''))}}">
                        <a style="padding:0 32px;" class="collapsible-header">
                            <i class="material-icons">book</i>EDUCATION DATA<i class="material-icons right">arrow_drop_down</i>
                        </a>
                        <div class="collapsible-body">
                        <ul>
                            <li class="{{(request()->segment(2) == 'primary-school') ? 'active' : ''}}"><a href="/applicant/primary-school">Primary School</a></li>
                            <li class="{{(request()->segment(2) == 'secondary-school') ? 'active' : ''}}"><a href="/applicant/secondary-school">Secondary School</a></li>
                            @cannot('ca')
                            <li class="{{(request()->segment(2) == 'tertiary-institution') ? 'active' : ''}}"><a href="/applicant/tertiary-institution">Tertiary Institution</a></li>
                            @endcannot
                        </ul>
                        </div>
                    </li>
                    </ul>
                </li>

                <li class="{{(request()->segment(2) == 'certification') ? 'active' : ''}}">
                    <a href="/applicant/certification"><i class="material-icons">receipt</i>CERTIFICATION</a>
                </li>
                
                <li class="{{(request()->segment(2) == 'experience') ? 'active' : ''}}">
                    <a href="/applicant/experience"><i class="material-icons">work</i>WORK EXPERIENCE</a>
                </li>
                
                <li class="{{(request()->segment(2) == 'review') ? 'active' : ''}}">
                    <a href="/applicant/review"><i class="material-icons">playlist_add_check</i>REVIEW & SUBMIT</a>
                </li>
            @endcan


            {{-- ADMIN SIDENAV HERE --}}
            @can('isAdmin')
                <li class="{{(request()->segment(1) == 'administrator' && request()->segment(2) == NULL) ? 'active' : ''}}">
                    <a href="/administrator"><i class="material-icons">dashboard</i>DASHBOARD</a>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                    <li class="{{ (request()->segment(2) == 'applicants') ? 'active' : ((request()->segment(2) == 'applicants') ? 'active' : ((request()->segment(2) == 'applicants') ? 'active' : ''))}}">
                        <a style="padding:0 32px;" class="collapsible-header">
                            <i class="material-icons">people</i>APPLICANTS<i class="material-icons right">arrow_drop_down</i>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li class="{{(request()->segment(3) == 'gl-09') ? 'active' : ''}}"><a href="/administrator/applicants/gl-09"> Grade Level 09 (ASC I) </a></li>
                                <li class="{{(request()->segment(3) == 'gl-08') ? 'active' : ''}}"><a href="/administrator/applicants/gl-08"> Grade Level 08 (ASC II) </a></li>
                                <li class="{{(request()->segment(3) == 'gl-07') ? 'active' : ''}}"><a href="/administrator/applicants/gl-07"> Grade Level 07 (IC) </a></li>
                                <li class="{{(request()->segment(3) == 'gl-06') ? 'active' : ''}}"><a href="/administrator/applicants/gl-06"> Grade Level 06 (AIC) </a></li>
                                <li class="{{(request()->segment(3) == 'gl-05') ? 'active' : ''}}"><a href="/administrator/applicants/gl-05"> Grade Level 05 (CA I) </a></li>
                                <li class="{{(request()->segment(3) == 'gl-04') ? 'active' : ''}}"><a href="/administrator/applicants/gl-04"> Grade Level 04 (CA II) </a></li>
                                <li class="{{(request()->segment(3) == 'gl-03') ? 'active' : ''}}"><a href="/administrator/applicants/gl-03"> Grade Level 03 (CA III) </a></li>
                            </ul>
                        </div>
                    </li>
                    </ul>
                </li>
                <li class="{{  (request()->segment(2) == 'shortlisted') ? 'active' : '' }}">
                    <a href="/administrator/shortlisted/"><i class="material-icons">done_all</i>SHORTLISTED</a>
                </li>
            @endcan
                {{-- OTHER MENU RIGHT FOR MOBILE DEVICES --}}
                <li class="hide-on-med-and-up col s12" style="border-top:1px solid rgba(0,0,0, 0.3); justify-self: flex-end; margin-top: auto;">
                    <ul class="right col s8" style="display:flex; justify-content:center; align-items:center; width:20%;">
                        <li class="logOutBtn">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i style="margin:0;" class="material-icons left">power_settings_new</i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                    <ul class="col s4 right white-text" style="display:flex; justify-content:center; align-items:center; width:80%;">
                        @if(auth()->check())
                            <a class="white-text" href="#">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</a>
                        @endif
                    </ul>
                </li>
            </div>
        </ul>

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
        @yield('content')

    <script>
        let base_url = '{{ asset('/') }}';
    </script>
    @stack('scripts')
    
</body>
</html>
