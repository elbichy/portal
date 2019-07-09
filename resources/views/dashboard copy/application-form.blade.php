<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>NIGERIA SECURITY & CIVIL DEFENCE CORPS - APPLICANT'S DATA FORM</title>
    <link rel="stylesheet" href="{{asset('css/print.css')}}">
</head>
<body>
	<div class="wrapper">
		<header>
			<img src="http://localhost/recruitment/assets/img/pdfLogo.png" width="100px" alt="logo">
			<h1>NIGERIA SECURITY &amp; CIVIL DEFENCE CORPS</h1>
			<h3>(Applicant's Data Form)</h3>
			<p><b>Application No:</b> {{ auth()->user()->appNum }}</p>
		</header>
		<div class="firstRow">
			<table>
				<caption>POSITION APPLIED FOR</caption>
				<tbody>
					<tr>
						<th>CADRE</th>
						<td>{{ auth()->user()->cadre->name }}</td>
					</tr>
					<tr>
						<th>RANK</th>
						<td>{{ auth()->user()->rank->name }}</td>
					</tr>
				</tbody>
			</table>
			<div class="passportContainer">
				<img src="{{ auth()->user()->image != NULL ? asset('storage/applicants').'/'.auth()->user()->id.'/'.auth()->user()->image : 'http://localhost/recruitment/assets/passports/default.png'}}" alt="Passport photograph" class="responsive-img">
			</div>
		</div>
		<div class="secondRow">
				<table>
					<caption>PERSONAL INFORMATION</caption>
					<tbody>
						<tr>
							<td><b>Name:</b> {{ auth()->user()->firstname }} {{ auth()->user()->lastname }} {{ auth()->user()->personal->othername }}</td>
							<td><b>State of Origin:</b>  {{ ucwords($data['soo']['state_name']) }}</td>
						</tr>
						<tr>
							<td><b>Gender:</b> {{ ucwords(auth()->user()->personal->gender) }}</td>
							<td><b>Local Govt.:</b>  {{ ucwords($data['lga']['lg_name']) }}</td>
						</tr>
						<tr>
							<td><b>Date of Birth:</b> {{ auth()->user()->personal->dob }}</td>
							<td><b>Religion:</b> {{ ucwords(auth()->user()->personal->religion) }}</td>
						</tr>
						<tr>
							<td><b>Marital Status:</b> {{ ucwords(auth()->user()->personal->maritalStatus) }}</td>
							<td><b>Tribe:</b> {{ ucwords(auth()->user()->personal->tribe) }}</td>
						</tr>
					</tbody>
				</table>
		</div>
		<div class="thirdRow">
			<table>
				<caption>MEDICAL INFORMATION</caption>
				<tbody>
					<tr>
						<td><b>Blood Group:</b> {{ auth()->user()->medical->bloodGroup }}</td>
						<td><b>Genotype:</b> {{ auth()->user()->medical->genotype }}</td>
						<td><b>Height:</b> {{ auth()->user()->medical->height }}cm</td>
					</tr>
					<tr>
						<td><b>Weight:</b>  {{ auth()->user()->medical->weight }}kg</td>
						<td colspan="2"><b>Chest width:</b> {{ auth()->user()->medical->chestWidth }}cm</td>
				  	</tr>
				</tbody>
			</table>
		</div>
		<div class="fourthRow">
			<table>
				<caption>CONTACT INFORMATION</caption>
				<tbody>
					<tr>
						<td><b>State of Origin:</b> {{ ucwords($data['soo']['state_name']) }}</td>
						<td><b>LGA:</b> {{ ucwords($data['lga']['lg_name']) }}</td>
						<td><b>Address:</b> {{ ucwords(auth()->user()->contact->aoo) }}</td>
					</tr>
					<tr>
						<td><b>State of Residence:</b> {{ ucwords($data['soo']['state_name']) }}</td>
						<td><b>LGA:</b> {{ ucwords($data['lgor']['lg_name']) }}</td>
						<td><b>Address:</b> {{ ucwords(auth()->user()->contact->aor) }}</td>
					</tr>
					<tr>
						<td><b>Phone Number:</b> {{ ucwords(auth()->user()->contact->phone) }}</td>
						<td colspan="2"><b>Email Address:</b> {{ ucwords(auth()->user()->contact->email) }}</td>
					</tr>
				</tbody>
			</table>
		</div>


		<div class="page-break"></div>


		<div class="fifthRow">
			<table>
				<caption>NEXT OF KIN INFORMATION</caption>
				<tbody>
					<tr>
						<th width="30%" style="font-weight:bold;">Fullname</th>
						<th width="5%" style="font-weight:bold;">Gender</th>
						<th width="10%" style="font-weight:bold;">Relationship</th>
						<th width="35%" style="font-weight:bold;">Address</th>
						<th width="20%" style="font-weight:bold;">Phone</th>
					</tr>
				@foreach(auth()->user()->nextOfKin as $nok)
					<tr>
						<td>{{ ucwords($nok->nokfn) }}</td>
						<td>{{ ucwords($nok->nokg) }}</td>
						<td>{{ ucwords($nok->nokr) }}</td>
						<td>{{ ucwords($nok->noka) }}</td>
						<td>{{ $nok->nokp }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="sixthRow">
			<table>
				<caption>ACADEMIC QUALIFICATION</caption>
				<tbody>
					<tr>
						<th width="45%" style="font-weight:bold;">Name of school</th>
						<th width="25%" style="font-weight:bold;">Qualification</th>
						<th width="15%" style="font-weight:bold;">Start Year</th>
						<th width="15%" style="font-weight:bold;">End Year</th>
					</tr>
				@foreach(auth()->user()->primary as $primary)
					<tr>
						<td>{{ ucwords($primary->nameOfSchool) }}, {{ ucwords($primary->location) }}</td>
						<td>{{ strtoupper($primary->certType) }}</td>
						<td>{{ $primary->priStartYear }}</td>
						<td>{{ $primary->priEndYear }}</td>
					</tr>
				@endforeach	
				@foreach(auth()->user()->secondary as $secondary)
					<tr>
						<td>{{ ucwords($secondary->nameOfSchool) }}, {{ ucwords($secondary->location) }}</td>
						<td>{{ strtoupper($secondary->certType) }}</td>
						<td>{{ $secondary->secStartYear }}</td>
						<td>{{ $secondary->secEndYear }}</td>
					</tr>
				@endforeach
				@cannot('ca')
					@foreach(auth()->user()->tertiary as $tertiary)
						<tr>
							<td>{{ ucwords($tertiary->institution) }}, {{ ucwords($tertiary->location) }}</td>
							<td>{{ strtoupper($tertiary->qualification) }} {{ ucwords($tertiary->course) }} ({{ ucwords($tertiary->grade) }})</td>
							<td>{{ $tertiary->TstartYear }}</td>
							<td>{{ $tertiary->TendYear }}</td>
						</tr>
					@endforeach
				@endcannot
				</tbody>
			</table>
		</div>
		<div class="seventhRow">
			@if(count(auth()->user()->certification) > 0)
			<table>
				<caption>PROFESSIONAL CERTIFICATION</caption>
				<tbody>
					<tr>
						<th width="40%" style="font-weight:bold;">Institution</th>
						<th width="30%" style="font-weight:bold;">Title</th>
						<th width="15%" style="font-weight:bold;">Start Date</th>
						<th width="15%" style="font-weight:bold;">End Date</th>
					</tr>
					@foreach(auth()->user()->certification as $certification)
						<tr>
							<td>{{ ucwords($certification->institute) }}, {{ ucwords($certification->location) }}</td>
							<td>{{ ucwords($certification->title) }}</td>
							<td>{{ $certification->startdate }}</td>
							<td>{{ $certification->enddate }}</td>
						</tr>
					@endforeach	
				</tbody>
			</table>
			@endif
		</div>
		<div class="eightRow">
			@if(count(auth()->user()->experience) > 0)
			<table>
				<caption>PREVIOUS WORK EXPIRIENCE</caption>
				<tbody>
					<tr>
						<th width="40%" style="font-weight:bold;">Organization</th>
						<th width="30%" style="font-weight:bold;">Role</th>
						<th width="15%" style="font-weight:bold;">Start Date</th>
						<th width="15%" style="font-weight:bold;">End Date</th>
					</tr>
					@foreach(auth()->user()->experience as $experience)  
						<tr>
							<td>{{ ucwords($experience->organisation) }}, {{ ucwords($experience->location) }}</td>
							<td>{{ ucwords($experience->role) }}</td>
							<td>{{ $experience->startDate }}</td>
							<td>{{ $experience->endDate }}</td>
						</tr>
					@endforeach	
				</tbody>
			</table>
			@endif
		</div>
	</div>
	<script type="text/javascript">
		window.print();
	  </script>
</body>
</html>