@extends('layouts.homeTemp')

@section('content')
<div class="homeContentWrap">
	<!-- SLIDER GOES HERE -->
	<div class="row slider-area">
		<div class="container">
			<div class="col s12 m8 l8">
				<h4>NIGERIA SECURITY AND CIVIL DEFENCE CORPS RECRUITMENT EXERCISE</h4>
				<p>Applications are hereby invited from suitably qualified candidates for full time appointments to fill existing vacancies in our service</p>

				<a href="/#instruction" id="howtoapplyBtn" class="waves-effect light-blue darken-3 hide-on-med-and-down waves-light btn-large left">Read Instruction</a>
				<a href="/#formArea" id="signinlinkBtn" class="waves-effect red hide-on-med-and-down waves-light btn-large pulse" style="margin-left: 20px;">Start Application</a>

				<!-- FOR MOBILE -->
				<a href="#instruction" id="readinstruction" class="waves-effect light-blue darken-3 hide-on-large-only waves-light btn-large col s12" style="margin-bottom: 10px;">Read Instruction</a>
				<a href="#formArea" id="formButton" class="waves-effect red hide-on-large-only waves-light btn-large col s12">Start Application</a>
			</div>
			<div class="col s12 m4 l4">
				<img src="{{ asset('storage/nscdclargelogo.png') }}" class="responsive-img" alt="logo">
			</div>
		</div>
		<div class="contactSection">
			<h4 class="container">
				<i class="medium material-icons">mail_outline</i>
				<p>SEND FEEDBACKS TO: recruitment@nscdc.gov.ng</p>
			</h4>
		</div>
	</div>
	<!-- FORM AREA GOES HERE -->
	<div id="formArea">
		<div class="container row">
			<!-- NEW APPLICANT -->
			<div class="newContainer col s12 m6 l6">

				<div class="newInfoWrap">
					<div class="newInfo">
						<h3 style="font-weight:700;" class="white-text">New Applicant?</h3>
						<p class="white-text">
							Are you a new applicant? make sure you read through the application guidelines in order to know the requirements and right vacancy/position for your qualification.
						</p>
						<button type="button" class="signInUp">
							Get Started <i style="margin-left:6px;" class="material-icons">person_add</i>
						</button>
					</div>
				</div>
				<div class="newWrap">
					<div class="new black-text">
						<h5 class="center-align">Create Account</h5>
						<p class="center-align">Fill the form below and submit to kick start your application process.</p>
						<form method="POST" action="{{ route('register') }}" name="register_form" id="register_form" class="left card register_form">
							@csrf
							@captcha('en')
							<div class="col s12 l6">
								<label>Select Cadre</label>
								<select id="cadre" name="cadre" class="browser-default" required>
									<option value="" disabled selected>Choose your option</option>
									<option value="1">Superintendent</option>
									<option value="2">Inspectorate</option>
									<option value="3">Assistant</option>
								</select>
							</div>
							<div class="col s12 l6">
								<label>Select Rank/Title</label>
								<select id="rank" name="rank" class="browser-default" required>
									<option value="" disabled selected>Choose cadre first</option>
								</select>
							</div>
							<div class="input-field col s12 l6" style="margin-top:30px!important;">
								<input id="first_name" name="firstname" type="text" class="" required>
								@if ($errors->has('firstname'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('firstname') }}</strong>
									</span>
								@endif
								<label for="first_name">First Name</label>
							</div>
							<div class="input-field col s12 l6" style="margin-top:30px!important;">
								<input id="last_name" name="lastname" type="text" class="" required>
								@if ($errors->has('lastname'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('lastname') }}</strong>
									</span>
								@endif
								<label for="last_name">Last Name</label>
							</div>
							<div class="input-field col s12 l6 ">
								<input id="email" name="email" type="email" class="" required>
								@if ($errors->has('email'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
								<label for="email">Email</label>
							</div>
							<div class="input-field col s12 l6 ">
								<input id="phone" name="phone" type="number" class="" required>
								@if ($errors->has('phone'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('phone') }}</strong>
									</span>
								@endif
								<label for="phone">Phone</label>
							</div>
							<div class="input-field col s12 l6">
								<input id="password" name="password" type="password" class="" required>
								@if ($errors->has('password'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
								<label for="password">Password</label>
							</div>
							<div class="input-field col s12 l6">
								<input id="confirm_password" name="password_confirmation" type="password" class="" required>
								@if ($errors->has('password_confirmation'))
									<span class="helper-text red-text">
										<strong>{{ $errors->first('password_confirmation') }}</strong>
									</span>
								@endif
								<label for="confirm_password">Confirm Password</label>
							</div>
							<div class="col s12 regFormLastRow" >
								<button id="regButt" class="btn right waves-effect light-blue darken-3 waves-light" type="submit">Register
									<i class="material-icons right">send</i>
								</button>
								<div class="col s4 right regBtnSpinner">
									<div class="preloader-wrapper small active right">
										<div class="spinner-layer spinner-blue-only">
											<div class="circle-clipper left">
											<div class="circle"></div>
											</div><div class="gap-patch">
											<div class="circle"></div>
											</div><div class="circle-clipper right">
											<div class="circle"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				
			</div>
			
			<!-- EXISTING APPLICANT -->
			<div class="existingContainer col s12 m6 l6">

				<div class="existingInfoWrap">
					<div class="existingInfo">
						<h3 style="font-weight:700;" class="white-text">Welcome Back!</h3>
						<p class="white-text">
							If you have created an account, and you have verified your email address, click the SignIn button below to reveal the SignIn Form.
						</p>
						<button type="button" class="signInUp">
							SIGN IN <i style="margin-left:6px;" class="material-icons">lock_open</i>
						</button>
					</div>
				</div>
				<div class="existingWrap">
					<div class="existing black-text">
						<h5 class="center-align">APPLICANT LOGIN</h5>
						<p class="center-align">Have you registered and verified your account? enter your login details
						to continue with your application.</p>
						<div class="card col s12" id="signincard">
							<div class="progress">
								<div class="indeterminate"></div>
							</div>
							<form method="POST" action="{{ route('login') }}" name='signin_form' id='signin_form'>
								@csrf
								@captcha('en')
								<div class="input-field col s12">
									<i class="material-icons prefix">person</i>
									<input id="login_email" name="loginEmail" type="email" class="">
									@if ($errors->login->has('details'))
										<span class="helper-text red-text">
											<strong>{{ $errors->login->first('details') }}</strong>
										</span>
									@endif
									<label for="login_email">Email</label>
								</div>
								<div class="input-field col s12">
									<i class="material-icons prefix">vpn_key</i>
									<input id="login_password" name="loginPassword" type="password" class="">
									<label for="login_password">Password</label>
								</div>
								
								<div class="row">
									<div class="input-field col s12 l6" style="display: flex; justify-content: center;">
										<p style="margin:0;">
											<label>
												<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
												<span>Remember Me</span>
											</label>
										</p>
									</div>
									<div class="input-field col s12 l6">
										<button id="loginButt" class="btn waves-effect red darken-1 waves-light right" type="submit" name="action">Login
											<i class="material-icons right">send</i>
										</button>
									</div>
								</div>
								<div>
									<p class='center'>Forgot password? <a href="{{ route('password.request') }}">Reset password</a></p>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- REQUIREMENT AND INSTRUCTION -->
	<div class="instruction red darken-3 white-text" id="instruction">
		<div class="container">
			<div class="section center-align">
				<div id="guide" class="left-align">
				<h5>REQUIREMENTS/INSTRUCTION</h5>
				<p>
				The Civil Defence, Fire, Immigration and Prisons Services Board
				(CDFIPB) is inviting applications from suitably qualified candidates for
				full time appointments to fill existing vacancies in the following
				positions in the Nigeria Security & Civil Defence Corps (NSCDC).
				</p>

				<ul class="collapsible">
					<li>
					<div class="collapsible-header h6">
						<b>AVAILABLE POSITIONS/CATEGORIES</b>
						<i class="material-icons right">arrow_drop_down</i>
					</div>
					<div class="collapsible-body">
						<h6>CATEGORY A: INSPECTORATE CADRE</h6>
						<p>
						i. Assistant Inspector of Corps (AIC), General Duty, CONPASS 06<br>
						Applicants must possess National Diploma (ND), NCE or
						Advanced NABTEB obtained from recognized institutions.
						</p>
						<h6>CATEGORY B: ASSISTANT CADRE</h6>
						<p>
						i. Corps Assistant I (CA I) CONPASS 04<br>
						Applicants must be holders of GCE Ordinary Level,
						SSCE/NECO or its equivalent with a minimum of five (6) 
						credits in not more than two (2) sittings, which must
						include Mathematics and English Language.<br>

						ii. Corps Assistant II (CA II) CONPASS 04<br>
						Applicants must be holders of GCE Ordinary Level,
						SSCE/NECO or its equivalent with a minimum of five (5) 
						credits in not more than two (2) sittings, which must
						include Mathematics and English Language.<br>

						iii. Corps Assistant III (CA III) CONPASS 03<br>
						Applicants must be holders of GCE Ordinary Level,
						SSCE/NECO or its equivalent with a minimum of three (3)
						credits in not more than two (2) sittings, which must
						include at least English or Mathematics.
						</p>
					</div>
					</li>
					<li>
					<div class="collapsible-header">
						<b>METHOD OF APPLICATION</b>
						<i class="material-icons right">arrow_drop_down</i>
					</div>
					<div class="collapsible-body">
						<p>
						a. Applications must be online. Candidates are expected to register an account, verify account, then login and fill the application form.
						log into the website<br>

						b. Candidates for the positions from GL 07 and Above (Holders of Degree and HND certificates) are expected to log into the website <a href='http://www.cdfipb.careers'>www.cdfipb.careers</a> fill and submit the application form online.<br>

						c. Candidates are advised to print out the Referee form after submitting application, the Referee Form must be duly completed for siting during screening and submission during documentation.<br>

						d. Candidates should NOTE, that Multiple Applications will automatically lead to disqualification.
						</p>
					</div>
					</li>
					<li>
					<div class="collapsible-header">
						<b>SUBMISSION OF APPLICATIONS</b>
						<i class="material-icons right">arrow_drop_down</i>
					</div>
					<div class="collapsible-body">
						<p>
							Applications must be submitted online within six (6) weeks from the date of publication.
						</p>
					</div>
					</li>
					<li>
					<div class="collapsible-header">
						<b>STATUTORY REQUIREMENTS FOR RECRUITMENT</b>
						<i class="material-icons right">arrow_drop_down</i>
					</div>
					<div class="collapsible-body">
						<p>
						i. Applicants must be Nigerian by birth;<br>

						ii. Applicants must possess the requisite qualifications and certificates. Any certificate or qualification not presented and accepted at the recruitment centre shall not be accepted after the recruitment;<br>

						iii. Applicants must be fit and present certificates of medical fitness from government recognized hospitals;<br>

						iv. Applicants must be of good character and must not have been convicted of any criminal offences;<br>

						v. Applicants must not be drug addicts or members of any secret society or cult;<br>

						vi. Applicants must not be financially embarrassed;<br>

						vii. Applicants must be between ages of 18 and 30 years;<br>

						viii. Applicants’ height must not be less than 1.65m for male and 1.60m for female;<br>

						ix. Applicants’ chest measurement must not be less than 0.87 for men;<br>

						x. Computer literacy will be of added advantage.
						</p>
					</div>
					</li>
					<li>
					<div class="collapsible-header">
						<b>APPLICATION IS FREE!</b>
						<i class="material-icons right">arrow_drop_down</i>
					</div>
					<div class="collapsible-body">
						<p>
						CANDIDATES SHOULD NOTE THAT THIS APPLICATION IS ABSOLUTELY FREE!.
						</p>
					</div>
					</li>
					<li>
					<div class="collapsible-header">
						<b>CLOSING DATE</b>
						<i class="material-icons right">arrow_drop_down</i>
					</div>
					<div class="collapsible-body">
						<p>
						All Applications are expected to be completed and submitted within six weeks from the date of this publication.<br /><br />
						Signed<br />
						<b>Director/Ag. Secretary to the Board</b>
						</p>
					</div>
					</li>
				</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection