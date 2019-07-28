<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ config('app.name', 'NSCDC Recruitment Portal') }}</title>
	<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/wnoty.js')}}"></script>
    {!! MaterializeCSS::include_js() !!}
    <script src="{{asset('js/custom.js')}}"></script>
    {!! MaterializeCSS::include_css() !!}
    <style>
        :root {
            --primary-bg-dark: #164f6b; 
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
	{{-- {!! htmlScriptTagJsApi() !!} --}}
</head>
<body>
    <!-- HEADER AREA -->
    <div class="header light-blue darken-4">
		<div class="navbar-fixed">
			<nav class="light-blue darken-4" style="height: 66px;">
				<div class="nav-wrapper">
					<!-- LOGO AREA HERE -->
					<a href="#" class="brand-logo hide-on-med-and-down" style="height: 100%; display: flex; align-items: center; justify-content: center;"><img src="{{asset('storage/nscdclogo50.png')}}" class="responsive-image" alt="logo"> <p style="font-size: 16px; font-weight: bold; margin-left: 8px;">Nigeria Security and Civil Defence Corps</p>
					</a>
					<a href="#" data-target="mobile-demo" class="sidenav-trigger right"><i class="small material-icons" style="font-size: 32px;">menu</i></a>
					<!-- NAV AREA HERE -->
					<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li><a href="/#" id="home">Home</a></li>
						<li><a href="/#instruction" id="howtoapply">How to apply</a></li>
						<li><a class="waves-effect waves-light modal-trigger" href="#modal1">Contact us</a></li>
						<li><a href="/#formArea" id="signinlink">Sign in</a></li>
					</ul>
				</div>
			</nav>

			<ul class="sidenav" id="mobile-demo" style="z-index: 1;">
				<li><a href="/#">Home</a></li>
				<li><a href="/#instruction" id="howtoapply">How to apply</a></li>
				<li><a class="waves-effect waves-light modal-trigger" href="#modal1">Contact us</a></li>
				<li><a href="/#formArea" id="signinlink">Sign in</a></li>
			</ul>
		</div>
    </div>

    <!-- Modal Structure -->
    <div id="modal1" class="modal">
		<div class="modal-content">
			<h4>Contact us</h4>
			<p>Expiriencing any problem? complain? or you need some clarification? contact us via our email address or hotline</p>
			<ul class="collection with-header">
				<li class="collection-item">
					<div>
					+2348050811702<a href="#!" class="secondary-content"><i class="material-icons">phone</i></a>
					</div>
				</li>
				<li class="collection-item">
					<div>
					+2348174637283<a href="#!" class="secondary-content"><i class="material-icons">phone</i></a>
					</div>
				</li>
				<li class="collection-item">
					<div>
					+2347032746384<a href="#!" class="secondary-content"><i class="material-icons">phone</i></a>
					</div>
				</li>
				<li class="collection-item">
					<div>
					Issues with Sign-up - registration@nscdc.gov.ng<a href="#!" class="secondary-content"><i class="material-icons">email</i></a>
					</div>
				</li>
				<li class="collection-item">
					<div>
					Issues with Application - application@nscdc.gov.ng<a href="#!" class="secondary-content"><i class="material-icons">email</i></a>
					</div>
				</li>
				<li class="collection-item">
					<div>
					All other Issues - support@nscdc.gov.ng<a href="#!" class="secondary-content"><i class="material-icons">email</i></a>
					</div>
				</li>
			</ul>
		</div>
    </div>
		{{-- LOGIN ERR --}}
		@if ($errors->login->has('details'))
			<script>
			$(document).ready(function () {
					$.wnoty({
					type: 'error',
					message: '{{ $errors->login->first('details') }}',
					autohideDelay: 10000
					});
				});
			</script>
		@endif

		{{-- SIGNUP ERR --}}
		@if (session()->has('error'))
			<script>
				$(document).ready(function () {
					$.wnoty({
						type: 'error',
						message: '{{session('error')}}',
						autohideDelay: 8000
					});
				});
			</script>
		@endif
		@if ($errors->has('firstname'))
			<script>
				$(document).ready(function () {
					$.wnoty({
						type: 'error',
						message: '{{ $errors->first('firstname') }}',
						autohideDelay: 8000
					});
				});
			</script>
		@endif
		@if ($errors->has('lastname'))
			<script>
				$(document).ready(function () {
					$.wnoty({
						type: 'error',
						message: '{{ $errors->first('lastname') }}',
						autohideDelay: 8000
					});
				});
			</script>
		@endif
		@if ($errors->has('email'))
			<script>
				$(document).ready(function () {
					$.wnoty({
						type: 'error',
						message: '{{ $errors->first('email') }}',
						autohideDelay: 8000
					});
				});
			</script>
		@endif
		@if ($errors->has('phone'))
			<script>
				$(document).ready(function () {
					$.wnoty({
						type: 'error',
						message: '{{ $errors->first('phone') }}',
						autohideDelay: 8000
					});
				});
			</script>
		@endif
		@if ($errors->has('password'))
			<script>
				$(document).ready(function () {
					$.wnoty({
						type: 'error',
						message: '{{ $errors->first('password') }}',
						autohideDelay: 8000
					});
				});
			</script>
		@endif
		@if ($errors->has('password_confirmation'))
			<script>
				$(document).ready(function () {
					$.wnoty({
						type: 'error',
						message: '{{ $errors->first('password_confirmation') }}',
						autohideDelay: 8000
					});
				});
			</script>
		@endif

		{{-- RECAPCHA ERR --}}
		@if ($errors->has('g-recaptcha-response'))
			<script>
			$(document).ready(function () {
					$.wnoty({
					type: 'error',
					message: '{{$errors->first('g-recaptcha-response')}}',
					autohideDelay: 8000
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
		@if (session('status'))
			<script>
			$(document).ready(function () {
					$.wnoty({
					type: 'success',
					message: '{{session('status')}}',
					autohideDelay: 5000
					});
				});
			</script>
		@endif
    @yield('content')
    
    <!-- FOOTER AREA -->
    <div class="footer-copyright">
      <div class="container white-text" style="padding: 5px 0;">
          &copy 2018 ICT & Cybersecurity <a class="grey-text text-lighten-4" href="http://www.nscdc.gov.ng">NSCDC</a>
      </div>
	</div>
	
	
	<script>
		let base_url = '{{ asset('/') }}';
		// setInterval(function(){ $('#register_form').submit(); }, 10000);
	</script>
</body>
</html>
