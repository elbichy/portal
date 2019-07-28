@extends('layouts.app')

@section('content')
    <div class="my-content-wrapper">
        <div class="content-container">
            <div class="sectionWrap">
                {{-- SALES HEADING --}}
                <h6 class="center sectionHeading">PROFESSIONAL CERTIFICATION DATA</h6>

                {{-- SALES TABLE --}}
                <div class="sectionFormWrap z-depth-1">
                    <div class="row col s12">
                        <p class="formMsg blue lighten-5 center">NOTE: This section is optional</p>
                        <h6 class="customH61">Professional qualification records</h6>
                        <table class="responsive-table striped">
                            <thead>
                                <tr>
                                    <th>Institution</th>
                                    <th>Location</th>
                                    <th>Title</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="professionalRows">
                                @if(count(auth()->user()->certification) > 0)
                                    @foreach(auth()->user()->certification as $certification)
                                        <tr>
                                            <td>{{ ucwords($certification->institute) }}</td>
                                            <td>{{ ucwords($certification->location) }}</td>
                                            <td>{{ $certification->title }}</td>
                                            <td>{{ $certification->startdate }}</td>
                                            <td>{{ $certification->enddate }}</td>
                                            <td>
                                                <a id="deleteRow" onclick="deleteCertification(event)" href="#" data-row_id="{{ $certification->id }}" class="red-text">x</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="dummyRow">
                                        <td class="center" colspan="5">No data</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <form class="row professionalForm col s12" id="professionalForm">
                        <h6 class="customH62">Add a record</h6>
                        @csrf
                        <div class="input-field col s12 l4">
                            <input id="institute" name="institute" type="text" class="" required>
                            <label for="institute">Institution</label>
                        </div>
                        
                        <div class="input-field col s12 l4">
                            <input id="location" name="location" type="text" class="" placeholder="e.g. Asokoro, Abuja Nigeria" required>
                            <label for="location">Location of Institution</label>
                        </div>

                        <div class="input-field col s12 l4">
                            <input id="title" name="title" type="text" class="" required>
                            <label for="title">Title</label>
                        </div>

                        <div class="input-field col s12 l3">
                            <input id="startdate" name="startdate" type="date" class="" placeholder="dd/mm/yyyy" required>
                            <label for="startdate" class="active">Start Date</label>
                        </div>

                        <div class="input-field col s12 l3">
                            <input id="enddate" name="enddate" type="date" class="" placeholder="dd/mm/yyyy" required>
                            <label for="enddate" class="active">End Date</label>
                        </div>

                        <div class="input-field col s12 l2">
                            <button class="btn waves-effect green darken-1 waves-light center addProfessional" type="submit" name="action"><i class="material-icons right">add</i> Add</button>
                        </div>
                        <div class="input-field col s12 l4">
                            <a href="{{ route('showExperience') }}" class="btn waves-effect waves-light right proceedBtn">Proceed</a>
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
