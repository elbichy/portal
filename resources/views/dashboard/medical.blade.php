@extends('layouts.app')

@section('content')
    <div class="my-content-wrapper">
        <div class="content-container">
            <div class="sectionWrap">
                {{-- SALES HEADING --}}
                <h6 class="center sectionHeading">MEDICAL DATA</h6>

                {{-- SALES TABLE --}}
                <div class="sectionFormWrap z-depth-1">
                    <p class="formMsg blue lighten-5 center">NOTE: This section is Compulsory! all fields are required.</p>
                    <form action="{{ route('storeMedical') }}" method="POST" name="personal" id="personal">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12 l3">
                                <select name="bloodGroup" id="bloodGroup" class="validate browser-default" required>
                                    <option disabled selected>Blood Group</option>
                                    <option value="A+" {{ auth()->user()->medical == NULL ? '' : auth()->user()->medical->bloodGroup == 'A+' ? 'selected' : '' }}>A+</option>
                                    <option value="A-" {{ auth()->user()->medical == NULL ? '' : auth()->user()->medical->bloodGroup == 'A-' ? 'selected' : '' }}>A-</option>
                                    <option value="B+" {{ auth()->user()->medical == NULL ? '' : auth()->user()->medical->bloodGroup == 'B+' ? 'selected' : '' }}>B+</option>
                                    <option value="B-" {{ auth()->user()->medical == NULL ? '' : auth()->user()->medical->bloodGroup == 'B-' ? 'selected' : '' }}>B-</option>
                                    <option value="O+" {{ auth()->user()->medical == NULL ? '' : auth()->user()->medical->bloodGroup == 'O+' ? 'selected' : '' }}>O+</option>
                                    <option value="O-" {{ auth()->user()->medical == NULL ? '' : auth()->user()->medical->bloodGroup == 'O-' ? 'selected' : '' }}>O-</option>
                                    <option value="AB+" {{ auth()->user()->medical == NULL ? '' : auth()->user()->medical->bloodGroup == 'AB+' ? 'selected' : '' }}>AB+</option>
                                    <option value="AB-" {{ auth()->user()->medical == NULL ? '' : auth()->user()->medical->bloodGroup == 'AB-' ? 'selected' : '' }}>AB-</option>
                                </select>
                                @if ($errors->has('bloodGroup'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('bloodGroup') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col s12 l3">
                                <select name="genotype" id="genotype" class="validate browser-default" required>
                                    <option disabled="" disabled selected>Genotype</option>
                                    <option value="AA" {{ auth()->user()->medical == NULL ? '' : auth()->user()->medical->genotype == 'AA' ? 'selected' : '' }}>AA</option>
                                    <option value="AS" {{ auth()->user()->medical == NULL ? '' : auth()->user()->medical->genotype == 'AS' ? 'selected' : '' }}>AS</option>
                                    <option value="SS" {{ auth()->user()->medical == NULL ? '' : auth()->user()->medical->genotype == 'SS' ? 'selected' : '' }}>SS</option>
                                    <option value="AC" {{ auth()->user()->medical == NULL ? '' : auth()->user()->medical->genotype == 'AC' ? 'selected' : '' }}>AC</option>
                                </select>
                                @if ($errors->has('genotype'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('genotype') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col s12 l2">
                                <input type="number" id="height" name="height" class="validate" value="{{ auth()->user()->medical == NULL ? '' : auth()->user()->medical->height }}" required>
                                @if ($errors->has('height'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('height') }}</strong>
                                    </span>
                                @endif
                                <label for="height">Height (cm)</label>
                            </div>
                            <div class="input-field col s12 l2">
                                <input type="number" id="weight" name="weight" class="validate" value="{{ auth()->user()->medical == NULL ? '' : auth()->user()->medical->weight }}" required>
                                @if ($errors->has('weight'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                @endif
                                <label for="weight">Weight (kg)</label>
                            </div>
                            <div class="input-field col s12 l2">
                                <input type="number" id="chestWidth" name="chestWidth" class="validate" value="{{ auth()->user()->medical == NULL ? '' : auth()->user()->medical->chestWidth }}" required>
                                @if ($errors->has('chestWidth'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('chestWidth') }}</strong>
                                    </span>
                                @endif
                                <label for="chestWidth">Chest width (cm)</label>
                            </div>
                        </div>
                        <div class="row col s12 l12">
                            <button class="btn waves-effect waves-light right personalSave" type="submit" name="action">Save &amp; Proceed</button>
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
