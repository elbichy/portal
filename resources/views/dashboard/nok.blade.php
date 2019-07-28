@extends('layouts.app')

@section('content')
    <div class="my-content-wrapper">
        <div class="content-container">
            <div class="sectionWrap">
                {{-- SALES HEADING --}}
                <h6 class="center sectionHeading">NEXT-OF-KIN DATA</h6>

                {{-- SALES TABLE --}}
                <div class="sectionFormWrap z-depth-1">
                    <div class="row col s12">
                        <p class="formMsg blue lighten-5 center">NOTE: Add at least 2 next of kin details (This section is compulsory!)</p>
                        <h6 class="customH61">Next of Kin records</h6>
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
                            <tbody class="nokTableBody">
                                @if(count(auth()->user()->nextOfKin) > 0)
                                    @foreach(auth()->user()->nextOfKin as $nextofkin)
                                        <tr>
                                            <td>{{ ucwords($nextofkin->nokfn) }}</td>
                                            <td>{{ ucwords($nextofkin->nokg) }}</td>
                                            <td>{{ ucwords($nextofkin->nokr) }}</td>
                                            <td>{{ ucwords($nextofkin->noka) }}</td>
                                            <td>{{ $nextofkin->nokp }}</td>
                                            <td>
                                                <a id="deleteRow" onclick="deleteNextofkin(event)" href="#" data-row_id="{{ $nextofkin->id }}" class="red-text">x</a>
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
                    <form id="nextofkinForm" class="row nextofkinForm col s12" method="post">
                        <h6 class="customH62">Add a record</h6>
                        @csrf
                        <div class="input-field col s12 l5">
                            <input id="nokfn" name="nokfn" type="text" class="" required>
                            <label for="nokfn">Full Name</label>
                        </div>
                        <div class="input-field col s12 l2">
                            <select name="nokg" id="nokg" class=" browser-default" required>
                                <option value="" disabled="" disabled selected>Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="input-field col s12 l2">
                            <select name="nokr" id="nokr" class=" browser-default" required>
                                <option value="" disabled="" disabled selected>Relationship</option>
                                <option value="husband">Husband</option>
                                <option value="wife">Wife</option>
                                <option value="son">Son</option>
                                <option value="daughter">Daughter</option>
                                <option value="father">Father</option>
                                <option value="mother">Mother</option>
                                <option value="brother">Brother</option>
                                <option value="sister">Sister</option>
                                <option value="uncle">Uncle</option>
                                <option value="aunt">Aunt</option>
                                <option value="nephew">Nephew</option>
                                <option value="niece">Niece</option>
                            </select>
                        </div>
                        <div class="input-field col s12 l3">
                            <input id="nokp" name="nokp" type="number" class="" required>
                            <label for="nokp">Phone Number</label>
                        </div>
                        <div class="input-field col s12 l6">
                            <input id="noka" name="noka" type="text" class="" required>
                            <label for="noka">Permanent Address</label>
                        </div>
                        <div class="input-field col s12 l2">
                            <button class="btn waves-effect waves-light green darken-1 center addNOK" type="submit" name="action"><i class="material-icons right">add</i> ADD</button>
                        </div>
                        <div class="input-field col s12 l4">
                            <a href="{{ route('showPrimary') }}" class="nokProceed btn waves-effect waves-light right proceedBtn" {{ count(auth()->user()->nextOfKin) < 2 ? 'disabled' : ''}}>Proceed</a>
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
