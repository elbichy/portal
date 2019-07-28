@extends('layouts.app')

@section('content')
    <div class="my-content-wrapper">
        <div class="content-container">
            <div class="sectionWrap">
                {{-- SALES HEADING --}}
                <h6 class="center sectionHeading">WORK EXPERIENCE DATA</h6>

                {{-- SALES TABLE --}}
                <div class="sectionFormWrap z-depth-1">
                    <div class="row col s12">
                        <p class="formMsg blue lighten-5 center">NOTE: This section is optional</p>
                        <h6 class="customH61">Work experience records</h6>
                        <table class="responsive-table striped">
                            <thead>
                                <tr>
                                    <th>Organisation</th>
                                    <th>Location</th>
                                    <th>Role</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="experienceRows">
                                @if(count(auth()->user()->experience) > 0)
                                    @foreach(auth()->user()->experience as $experience)
                                        <tr>
                                            <td>{{ ucwords($experience->organisation) }}</td>
                                            <td>{{ ucwords($experience->location) }}</td>
                                            <td>{{ $experience->role }}</td>
                                            <td>{{ $experience->startDate }}</td>
                                            <td>{{ $experience->endDate }}</td>
                                            <td>
                                                <a id="deleteRow" onclick="deleteExperience(event)" href="#" data-row_id="{{ $experience->id }}" class="red-text">x</a>
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
                    <form class="row workExperienceForm col s12" id="workExpirienceForm">
                        <h6 class="customH62">Add a record</h6>
                        @csrf
                        <div class="input-field col s12 l4">
                            <input id="organisation" name="organisation" type="text" class="" required>
                            <label for="organisation">Organisation</label>
                        </div>

                        <div class="input-field col s12 l4">
                            <input id="location" name="location" type="text" class="" placeholder="e.g. Nassarawa, Kano Nigeria" required>
                            <label for="location">Location</label>
                        </div>
                        
                        <div class="input-field col s12 l4">
                            <input id="role" name="role" type="text" class="" required>
                            <label for="role">Role</label>
                        </div>

                        <div class="input-field col s12 l3">
                            <input id="startDate" name="startDate" type="date" class="" placeholder="dd/mm/yyyy" required>
                            <label for="startDate" class="active">Start Date</label>
                        </div>

                        <div class="input-field col s12 l3">
                            <input id="endDate" name="endDate" type="date" class="" placeholder="dd/mm/yyyy" required>
                            <label for="endDate" class="active">End Date</label>
                        </div>

                        <div class="input-field col s12 l2">
                            <button class="btn waves-effect green darken-1 waves-light center addExpirience" type="submit" name="action"><i class="material-icons right">add</i> Add</button>
                        </div>
                        <div class="input-field col s12 l4">
                            <a href="{{ route('showReview') }}" class="btn waves-effect waves-light right proceedBtn">Proceed</a>
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
