@extends('layouts.app')

@section('content')
    <div class="my-content-wrapper">
        <div class="content-container">
            <div class="sectionWrap">
                {{-- SALES HEADING --}}
                <h6 class="center sectionHeading">PERSONAL DATA</h6>

                {{-- SALES TABLE --}}
                <div class="sectionFormWrap z-depth-1" style="padding: 24px;">
                    <p class="formMsg blue lighten-5 center">NOTE: This section is optional</p>
                    <form name="certifyForm" id="certifyForm" method="POST" action="{{ route('submitApplication') }}">
                        @csrf
                        <h6 class="customH61">Review submitted information</h6>
                        <div class="review">
                            <div class="headWrap"><h6>Selected Position</h6></div>
                            <table class="responsive-table striped">
                                <tbody>
                                    <tr>
                                        <td><b>Cadre</b> {{ auth()->user()->cadre->name }}</td>
                                        <td><b>Position</b> {{ auth()->user()->rank->name }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="headWrap"><h6>Personal Information</h6></div>
                            <table class="responsive-table striped">
                                <tbody>
                                    <tr>
                                        <td><b>Firstname</b> {{ ucwords(auth()->user()->firstname) }}</td>
                                        <td><b>Lastname</b> {{ ucwords(auth()->user()->lastname) }}</td>
                                        <td><b>Othername</b> {{ ucwords(auth()->user()->personal->othername) }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Gender</b> {{ ucwords(auth()->user()->personal->gender) }}</td>
                                        <td><b>Date of Birth</b> {{ auth()->user()->personal->dob }}</td>
                                        <td><b>Marital status</b> {{ ucwords(auth()->user()->personal->maritalStatus) }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Tribe</b> {{ ucwords(auth()->user()->personal->tribe) }}</td>
                                        <td><b>Religion</b> {{ ucwords(auth()->user()->personal->religion) }}</td>
                                        <td><b>Blood Group</b> {{ auth()->user()->medical->bloodGroup }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Genotype</b> {{ auth()->user()->medical->genotype }}</td>
                                        <td><b>Height(cm)</b> {{ auth()->user()->medical->height }}</td>
                                        <td><b>Weight(kg)</b> {{ auth()->user()->medical->weight }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Chest Width</b> {{ auth()->user()->medical->chestWidth }}</td>
                                        <td><b>State of Origin</b> {{ ucwords($selectedStateAndLGA['soo']['state_name']) }}</td>
                                        <td><b>LG of Origin</b> {{ ucwords($selectedStateAndLGA['lga']['lg_name']) }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Address (State of origin)</b> {{ ucwords(auth()->user()->contact->aoo) }}</td>
                                        <td><b>State of Residence</b> {{ ucwords($selectedStateAndLGA['sor']['state_name']) }}</td>
                                        <td><b>LG of Residence</b> {{ ucwords($selectedStateAndLGA['lgor']['lg_name']) }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Address (State of Residence)</b> {{ ucwords(auth()->user()->contact->aor) }}</td>
                                        <td><b>Email</b> {{ auth()->user()->email }}</td>
                                        <td><b>Phone</b> {{ auth()->user()->phone }}</td>
                                    </tr>
                                </tbody>
                            </table>
                    
                            <!-- NEXT OF KIN INFORMATION -->
                            <div class="headWrap"><h6>Next of Kin Data</h6></div>
                            <table class="responsive-table striped">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Gender</th>
                                        <th>Relationship</th>
                                        <th>Permanent Address</th>
                                        <th>Phone Number</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                    
                            <!-- PRIMARY QUALIFICATION INFORMATION -->
                            <div class="headWrap"><h6>Primary School Education</h6></div>
                            <table class="responsive-table striped">
                                <thead>
                                    <tr>
                                        <th>Name of school</th>
                                        <th>Qualification</th>
                                        <th>Start Year</th>
                                        <th>End Year</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(auth()->user()->primary as $primary)
                                        <tr>
                                            <td>{{ ucwords($primary->nameOfSchool) }}, {{ ucwords($primary->location) }}</td>
                                            <td>{{ strtoupper($primary->certType) }}</td>
                                            <td>{{ $primary->priStartYear }}</td>
                                            <td>{{ $primary->priEndYear }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            
                            <!-- SECONDARY QUALIFICATION INFORMATION -->
                            <div class="headWrap"><h6>Secondary School Education</h6></div>
                            <table class="responsive-table striped">
                                <thead>
                                    <tr>
                                        <th>Name of school</th>
                                        <th>Qualification</th>
                                        <th>Start Year</th>
                                        <th>End Year</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(auth()->user()->secondary as $secondary)
                                        <tr>
                                            <td>{{ ucwords($secondary->nameOfSchool) }}, {{ ucwords($secondary->location) }}</td>
                                            <td>{{ strtoupper($secondary->certType) }}</td>
                                            <td>{{ $secondary->secStartYear }}</td>
                                            <td>{{ $secondary->secEndYear }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    
                    
                            <!-- TERTIARY QUALIFICATION INFORMATION -->
                            @cannot('ca')
                            <div class="headWrap"><h6>Tertiary Education</h6></div>
                            <table class="responsive-table striped">
                                <thead>
                                    <tr>
                                        <th>Institution</th>
                                        <th>Type</th>
                                        <th>Course</th>
                                        <th>Grade</th>
                                        <th>Start Year</th>
                                        <th>End Year</th>
                                    </tr>
                                </thead>				
                                <tbody>
                                    @foreach(auth()->user()->tertiary as $tertiary)
                                        <tr>
                                            <td>{{ ucwords($tertiary->institution) }}, {{ ucwords($tertiary->location) }}</td>
                                            <td>{{ strtoupper($tertiary->qualification) }}</td>
                                            <td>{{ ucwords($tertiary->course) }}</td>
                                            <td>{{ ucwords($tertiary->grade) }}</td>
                                            <td>{{ $tertiary->TstartYear }}</td>
                                            <td>{{ $tertiary->TendYear }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endcannot

                            @if(count(auth()->user()->certification) > 0)
                                <div class="headWrap"><h6>Professional Certification</h6></div>
                                <table class="responsive-table striped">
                                    <thead>
                                        <tr>
                                        <th>Institution</th>
                                        <th>Title</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                        
                            @if(count(auth()->user()->experience) > 0)
                                <div class="headWrap"><h6>Work Experience</h6></div>
                                <table class="responsive-table striped">
                                    <thead>
                                        <tr>
                                            <th>Organisation</th>
                                            <th>Role</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                        <div class="row" style="padding: 8px 0; margin-top: 10px;margin-left: 0px;margin-right: 0px;">
                            <div class="col s12 l1" style="padding: 8px 0 0 0;">
                                <label>
                                    <input type="checkbox" name="certify" id="certify" {{ auth()->user()->hasSubmitted == 1 ? 'checked' : '' }} required>
                                    <span></span>
                                </label>
                            </div>
                            <blockquote class="col s12 l11" style="margin-top: 0px;">
                                I do solemnly declare that all information given above are correct and in the event they are discovered to be false. I shall be prosecuted for false declaration in accordance with extant regulations.
                            </blockquote>
                        </div>
                        <div class="col s12">
                            <button class="btn green waves-effect waves-light right submitSave">SUBMIT &amp; PRINT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer z-depth-1">
            <p>&copy; NSCDC ICT & Cybersecurity Department</p>
        </div>
    </div>
@endsection
