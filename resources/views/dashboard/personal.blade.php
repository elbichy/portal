@extends('layouts.app')

@section('content')
    <div class="my-content-wrapper">
        <div class="content-container">
            <div class="sectionWrap">
                {{-- SALES HEADING --}}
                <h6 class="center sectionHeading">PERSONAL DATA</h6>

                {{-- SALES TABLE --}}
                <div class="sectionFormWrap z-depth-1">
                    <p class="formMsg blue lighten-5 center">NOTE: This section is Compulsory! all fields are required.</p>
                    <form action="{{ route('storePersonal') }}" method="POST" name="personal" id="personal">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12 l3">
                                <input id="firstname" name="firstname" type="text" class="" value="{{ auth()->user()->firstname }}" readonly>
                                <label for="firstname" class="active">Firstname</label>
                            </div>
                            <div class="input-field col s12 l3">
                                <input id="lastname" name="lastname" type="text" class="" value="{{ auth()->user()->lastname }}" required readonly>
                                <label for="lastname" class="active">Lastname</label>
                            </div>
                            <div class="input-field col s12 l3">
                                <input id="othername" name="othername" type="text" class="" value="{{ auth()->user()->personal != NULL ? auth()->user()->personal->othername : '' }}">
                                <label for="othername">Othername</label>
                                @if ($errors->has('othername'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('othername') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col s12 l3">
                                <select id="gender" name="gender" class=" browser-default" required>
                                    <option disabled selected>Select Gender</option>
                                    <option value="male" {{ auth()->user()->personal == NULL ? '' : auth()->user()->personal->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ auth()->user()->personal == NULL ? '' : auth()->user()->personal->gender == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ auth()->user()->personal == NULL ? '' : auth()->user()->personal->gender == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 l3">
                                <input id="dob" name="dob" type="date" placeholder="dd/mm/yyyy" class="" value="{{ auth()->user()->personal != NULL ? auth()->user()->personal->dob : '' }}" required>
                                <label for="dob" class="active">Date of Birth</label>
                                @if ($errors->has('dob'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col s12 l3">
                                <select id="maritalStatus" name="maritalStatus" class=" browser-default" required>
                                    <option disabled selected>Marital status</option>
                                    <option value="single" {{ auth()->user()->personal == NULL ? '' : auth()->user()->personal->maritalStatus == 'single' ? 'selected' : '' }}>Single</option>
                                    <option value="married" {{ auth()->user()->personal == NULL ? '' : auth()->user()->personal->maritalStatus == 'married' ? 'selected' : '' }}>Married</option>
                                </select>
                                @if ($errors->has('maritalStatus'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('maritalStatus') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col s12 l3">
                                <input id="tribe" name="tribe" type="text" class="" value="{{ auth()->user()->personal != NULL ? auth()->user()->personal->tribe : ''}}" required>
                                <label for="tribe">Tribe</label>
                                @if ($errors->has('tribe'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('tribe') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col s12 l3">
                                <select name="religion" id="religion" class=" browser-default" required>
                                    <option disabled selected>Religion</option>
                                    <option value="christianity" {{ auth()->user()->personal == NULL ? '' : auth()->user()->personal->religion == 'christianity' ? 'selected' : '' }}>Christianity</option>
                                    <option value="islam" {{ auth()->user()->personal == NULL ? '' : auth()->user()->personal->religion == 'islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="other" {{ auth()->user()->personal == NULL ? '' : auth()->user()->personal->religion == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @if ($errors->has('religion'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('religion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row col s12 l12">
                            <button class="btn waves-effect waves-light right proceedBtn" type="submit" name="action">Save &amp; Proceed</button>
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
