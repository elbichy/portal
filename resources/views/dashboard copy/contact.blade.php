@extends('layouts.app')

@section('content')
    <div class="my-content-wrapper">
        <div class="content-container">
            <div class="sectionWrap">
                {{-- SALES HEADING --}}
                <h6 class="center sectionHeading">CONTACT DATA</h6>

                {{-- SALES TABLE --}}
                <div class="sectionFormWrap z-depth-1">
                    <p class="formMsg blue lighten-5 center">NOTE: This section is Compulsory! all fields are required.</p>
                    <form action="{{ route('storeContact') }}" method="POST" name="personal" id="personal">
                        @csrf
                        <fieldset class="row" style="width:100%; border: 1px solid #ccc; margin-bottom:12px;">
                            <legend>State of Origin Address</legend>
                            <div class="input-field col s12 l3">
                                <select id="soo" name="soo" class="validate browser-default" required>
                                    <option disabled selected>State of residence</option>
                                    <option value="1" {{ $selectedStateAndLGA['soo']['id'] == 1 ? 'selected' : ''}}>Abia</option>
                                    <option value="2" {{ $selectedStateAndLGA['soo']['id'] == 2 ? 'selected' : ''}}>Adamawa</option>
                                    <option value="3" {{ $selectedStateAndLGA['soo']['id'] == 3 ? 'selected' : ''}}>Akwa-ibom</option>
                                    <option value="4" {{ $selectedStateAndLGA['soo']['id'] == 4 ? 'selected' : ''}}>Anambra</option>
                                    <option value="5" {{ $selectedStateAndLGA['soo']['id'] == 5 ? 'selected' : ''}}>Bauchi</option>
                                    <option value="6" {{ $selectedStateAndLGA['soo']['id'] == 6 ? 'selected' : ''}}>Bayelsa</option>
                                    <option value="7" {{ $selectedStateAndLGA['soo']['id'] == 7 ? 'selected' : ''}}>Benue</option>
                                    <option value="8" {{ $selectedStateAndLGA['soo']['id'] == 8 ? 'selected' : ''}}>Borno</option>
                                    <option value="9" {{ $selectedStateAndLGA['soo']['id'] == 9 ? 'selected' : ''}}>Cross-river</option>
                                    <option value="10" {{ $selectedStateAndLGA['soo']['id'] == 10 ? 'selected' : ''}}>Delta</option>
                                    <option value="11" {{ $selectedStateAndLGA['soo']['id'] == 11 ? 'selected' : ''}}>Ebonyi</option>
                                    <option value="12" {{ $selectedStateAndLGA['soo']['id'] == 12 ? 'selected' : ''}}>Edo</option>
                                    <option value="13" {{ $selectedStateAndLGA['soo']['id'] == 13 ? 'selected' : ''}}>Ekiti</option>
                                    <option value="14" {{ $selectedStateAndLGA['soo']['id'] == 14 ? 'selected' : ''}}>Enugu</option>
                                    <option value="15" {{ $selectedStateAndLGA['soo']['id'] == 15 ? 'selected' : ''}}>Fct</option>
                                    <option value="16" {{ $selectedStateAndLGA['soo']['id'] == 16 ? 'selected' : ''}}>Gombe</option>
                                    <option value="17" {{ $selectedStateAndLGA['soo']['id'] == 17 ? 'selected' : ''}}>Imo</option>
                                    <option value="18" {{ $selectedStateAndLGA['soo']['id'] == 18 ? 'selected' : ''}}>Jigawa</option>
                                    <option value="19" {{ $selectedStateAndLGA['soo']['id'] == 19 ? 'selected' : ''}}>Kaduna</option>
                                    <option value="20" {{ $selectedStateAndLGA['soo']['id'] == 20 ? 'selected' : ''}}>Kano</option>
                                    <option value="21" {{ $selectedStateAndLGA['soo']['id'] == 21 ? 'selected' : ''}}>Katsina</option>
                                    <option value="22" {{ $selectedStateAndLGA['soo']['id'] == 22 ? 'selected' : ''}}>Kebbi</option>
                                    <option value="23" {{ $selectedStateAndLGA['soo']['id'] == 23 ? 'selected' : ''}}>Kogi</option>
                                    <option value="24" {{ $selectedStateAndLGA['soo']['id'] == 24 ? 'selected' : ''}}>Kwara</option>
                                    <option value="25" {{ $selectedStateAndLGA['soo']['id'] == 25 ? 'selected' : ''}}>Lagos</option>
                                    <option value="26" {{ $selectedStateAndLGA['soo']['id'] == 26 ? 'selected' : ''}}>Nasarawa</option>
                                    <option value="27" {{ $selectedStateAndLGA['soo']['id'] == 27 ? 'selected' : ''}}>Niger</option>
                                    <option value="28" {{ $selectedStateAndLGA['soo']['id'] == 28 ? 'selected' : ''}}>Ogun</option>
                                    <option value="29" {{ $selectedStateAndLGA['soo']['id'] == 29 ? 'selected' : ''}}>Ondo</option>
                                    <option value="30" {{ $selectedStateAndLGA['soo']['id'] == 30 ? 'selected' : ''}}>Osun</option>
                                    <option value="31" {{ $selectedStateAndLGA['soo']['id'] == 31 ? 'selected' : ''}}>Oyo</option>
                                    <option value="32" {{ $selectedStateAndLGA['soo']['id'] == 32 ? 'selected' : ''}}>Plateau</option>
                                    <option value="33" {{ $selectedStateAndLGA['soo']['id'] == 33 ? 'selected' : ''}}>Rivers</option>
                                    <option value="34" {{ $selectedStateAndLGA['soo']['id'] == 34 ? 'selected' : ''}}>Sokoto</option>
                                    <option value="35" {{ $selectedStateAndLGA['soo']['id'] == 35 ? 'selected' : ''}}>Taraba</option>
                                    <option value="36" {{ $selectedStateAndLGA['soo']['id'] == 36 ? 'selected' : ''}}>Yobe</option>
                                    <option value="37" {{ $selectedStateAndLGA['soo']['id'] == 37 ? 'selected' : ''}}>Zamfara</option>
                                </select>
                                @if ($errors->has('soo'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('soo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col s12 l3">
                                <select id="lga" name="lga" class="browser-default " required>
                                    @if($selectedStateAndLGA['lga'] != '0')
                                        <option value="{{ $selectedStateAndLGA['lga']['id'] }}" selected>{{ $selectedStateAndLGA['lga']['lg_name'] }}</option>
                                    @else
                                        <option disabled selected>LG of Residence</option>
                                    @endif
                                </select>
                                @if ($errors->has('lga'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('lga') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col s12 l6">
                                <input id="aoo" name="aoo" type="text" class="" value="{{ $selectedStateAndLGA['aoo'] }}" required>
                                <label for="aoo">Address of hometown</label>
                            </div>
                        </fieldset>
                        <fieldset class="row" style="width:100%; border: 1px solid #ccc; margin-bottom:12px;">
                            <legend>State of Residence Address (Your selection here determines where you will undergo nextofkin)</legend>
                            <div class="input-field col s12 l3">
                                <select id="sor" name="sor" class="validate browser-default" required>
                                    <option disabled selected>State of residence</option>
                                    <option value="1" {{ $selectedStateAndLGA['sor']['id'] == 1 ? 'selected' : ''}}>Abia</option>
                                    <option value="2" {{ $selectedStateAndLGA['sor']['id'] == 2 ? 'selected' : ''}}>Adamawa</option>
                                    <option value="3" {{ $selectedStateAndLGA['sor']['id'] == 3 ? 'selected' : ''}}>Akwa-ibom</option>
                                    <option value="4" {{ $selectedStateAndLGA['sor']['id'] == 4 ? 'selected' : ''}}>Anambra</option>
                                    <option value="5" {{ $selectedStateAndLGA['sor']['id'] == 5 ? 'selected' : ''}}>Bauchi</option>
                                    <option value="6" {{ $selectedStateAndLGA['sor']['id'] == 6 ? 'selected' : ''}}>Bayelsa</option>
                                    <option value="7" {{ $selectedStateAndLGA['sor']['id'] == 7 ? 'selected' : ''}}>Benue</option>
                                    <option value="8" {{ $selectedStateAndLGA['sor']['id'] == 8 ? 'selected' : ''}}>Borno</option>
                                    <option value="9" {{ $selectedStateAndLGA['sor']['id'] == 9 ? 'selected' : ''}}>Cross-river</option>
                                    <option value="10" {{ $selectedStateAndLGA['sor']['id'] == 10 ? 'selected' : ''}}>Delta</option>
                                    <option value="11" {{ $selectedStateAndLGA['sor']['id'] == 11 ? 'selected' : ''}}>Ebonyi</option>
                                    <option value="12" {{ $selectedStateAndLGA['sor']['id'] == 12 ? 'selected' : ''}}>Edo</option>
                                    <option value="13" {{ $selectedStateAndLGA['sor']['id'] == 13 ? 'selected' : ''}}>Ekiti</option>
                                    <option value="14" {{ $selectedStateAndLGA['sor']['id'] == 14 ? 'selected' : ''}}>Enugu</option>
                                    <option value="15" {{ $selectedStateAndLGA['sor']['id'] == 15 ? 'selected' : ''}}>Fct</option>
                                    <option value="16" {{ $selectedStateAndLGA['sor']['id'] == 16 ? 'selected' : ''}}>Gombe</option>
                                    <option value="17" {{ $selectedStateAndLGA['sor']['id'] == 17 ? 'selected' : ''}}>Imo</option>
                                    <option value="18" {{ $selectedStateAndLGA['sor']['id'] == 18 ? 'selected' : ''}}>Jigawa</option>
                                    <option value="19" {{ $selectedStateAndLGA['sor']['id'] == 19 ? 'selected' : ''}}>Kaduna</option>
                                    <option value="20" {{ $selectedStateAndLGA['sor']['id'] == 20 ? 'selected' : ''}}>Kano</option>
                                    <option value="21" {{ $selectedStateAndLGA['sor']['id'] == 21 ? 'selected' : ''}}>Katsina</option>
                                    <option value="22" {{ $selectedStateAndLGA['sor']['id'] == 22 ? 'selected' : ''}}>Kebbi</option>
                                    <option value="23" {{ $selectedStateAndLGA['sor']['id'] == 23 ? 'selected' : ''}}>Kogi</option>
                                    <option value="24" {{ $selectedStateAndLGA['sor']['id'] == 24 ? 'selected' : ''}}>Kwara</option>
                                    <option value="25" {{ $selectedStateAndLGA['sor']['id'] == 25 ? 'selected' : ''}}>Lagos</option>
                                    <option value="26" {{ $selectedStateAndLGA['sor']['id'] == 26 ? 'selected' : ''}}>Nasarawa</option>
                                    <option value="27" {{ $selectedStateAndLGA['sor']['id'] == 27 ? 'selected' : ''}}>Niger</option>
                                    <option value="28" {{ $selectedStateAndLGA['sor']['id'] == 28 ? 'selected' : ''}}>Ogun</option>
                                    <option value="29" {{ $selectedStateAndLGA['sor']['id'] == 29 ? 'selected' : ''}}>Ondo</option>
                                    <option value="30" {{ $selectedStateAndLGA['sor']['id'] == 30 ? 'selected' : ''}}>Osun</option>
                                    <option value="31" {{ $selectedStateAndLGA['sor']['id'] == 31 ? 'selected' : ''}}>Oyo</option>
                                    <option value="32" {{ $selectedStateAndLGA['sor']['id'] == 32 ? 'selected' : ''}}>Plateau</option>
                                    <option value="33" {{ $selectedStateAndLGA['sor']['id'] == 33 ? 'selected' : ''}}>Rivers</option>
                                    <option value="34" {{ $selectedStateAndLGA['sor']['id'] == 34 ? 'selected' : ''}}>Sokoto</option>
                                    <option value="35" {{ $selectedStateAndLGA['sor']['id'] == 35 ? 'selected' : ''}}>Taraba</option>
                                    <option value="36" {{ $selectedStateAndLGA['sor']['id'] == 36 ? 'selected' : ''}}>Yobe</option>
                                    <option value="37" {{ $selectedStateAndLGA['sor']['id'] == 37 ? 'selected' : ''}}>Zamfara</option>
                                </select>
                                @if ($errors->has('sor'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('sor') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col s12 l3">
                                <select id="lgor" name="lgor" class="browser-default " required>
                                    @if($selectedStateAndLGA['lgor'] != '0')
                                        <option value="{{ $selectedStateAndLGA['lgor']['id'] }}" selected>{{ $selectedStateAndLGA['lgor']['lg_name'] }}</option>
                                    @else
                                        <option disabled selected>LG of Residence</option>
                                    @endif
                                </select>
                                @if ($errors->has('lgor'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('lgor') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col s12 l6">
                                <input id="aor" name="aor" type="text" class="" value="{{ $selectedStateAndLGA['aor'] }}" required>
                                @if ($errors->has('aor'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('aor') }}</strong>
                                    </span>
                                @endif
                                <label for="aor">Address of Residence</label>
                            </div>
                        </fieldset>
                        <div class="row">
                            <div class="input-field col s12 l6">
                                <input id="email" name="email" type="text" class="" value="{{ auth()->user()->email }}" disabled>
                                <label for="email" class="active">Email</label>
                            </div>
                            <div class="input-field col s12 l6">
                                <input id="phone" name="phone" type="text" class="" value="{{ auth()->user()->phone }}" disabled>
                                <label for="phone">Phone</label>
                            </div>
                        </div>
                        <div class="row col s12 l12">
                            <button class="btn waves-effect waves-light right personalSave" type="submit">Save &amp; Proceed</button>
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
