@extends('layouts.app')

@section('content')
    <div class="my-content-wrapper">
        <div class="content-container">
            <div class="sectionWrap">
                {{-- SALES HEADING --}}
                <h6 class="center sectionHeading">TERTIARY INSTITUTION DATA</h6>

                {{-- SALES TABLE --}}
                <div class="sectionFormWrap z-depth-1">
                    <div class="row col s12">
                        <p class="formMsg blue lighten-5 center">NOTE: This section is meant and compulsory for only those applying for the position of AIC and ASC</p>
                        <h6 class="customH61">Tertiary qualification record</h6>
                        <table class="responsive-table striped">
                            <thead>
                                <tr>
                                    <th>Qualification</th>
                                    <th>Institution</th>
                                    <th>Location</th>
                                    <th>Course</th>
                                    <th>Grade</th>
                                    <th>Start Year</th>
                                    <th>End Year</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="tertiaryRows">
                                @if(count(auth()->user()->tertiary) > 0)
                                    @foreach(auth()->user()->tertiary as $tertiary)
                                        <tr>
                                            <td>{{ strtoupper($tertiary->qualification) }}</td>
                                            <td>{{ ucwords($tertiary->institution) }}</td>
                                            <td>{{ ucwords($tertiary->location) }}</td>
                                            <td>{{ ucwords($tertiary->course) }}</td>
                                            <td>{{ ucwords($tertiary->grade) }}</td>
                                            <td>{{ $tertiary->TstartYear }}</td>
                                            <td>{{ $tertiary->TendYear }}</td>
                                            <td>
                                                <a id="deleteRow" onclick="deleteTertiary(event)" href="#" data-row_id="{{ $tertiary->id }}" class="red-text">x</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="dummyRow">
                                        <td class="center" colspan="8">No data</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <form class="row teriaryForm col s12" id="teriaryForm">
                        @csrf
                        <h6 class="customH62">Add a record</h6>
                        <div class="input-field col s12 l3">
                            <select id="qualification" name="qualification" class="browser-default " required>
                                <option value="" disabled="" disabled selected>Qualification</option>
                                @can('sup')
                                <option value="b.sc">B.SC</option>
                                <option value="m.sc">M.SC</option>
                                @endcan
                                @can('insp')
                                <option value="hnd">HND</option>
                                <option value="nce">NCE</option>
                                <option value="nd">ND</option>
                                @endcan
                            </select>
                        </div>
                        <div class="input-field col s12 l4">
                            <input id="institution" name="institution" type="text" class="">
                            <label for="institution">Institution</label>
                        </div>
                        <div class="input-field col s12 l5">
                            <input id="location" name="location" type="text" class="" placeholder="e.g. Gwagwalada, Abuja Nigeria">
                            <label for="location">Location</label>
                        </div>

                        <div class="input-field col s12 l3">
                            <input id="course" name="course" type="text" class="">
                            <label for="course">Course</label>
                        </div>
                        <div class="input-field col s12 l3">
                            <select id="grade" name="grade" class="browser-default " required>
                                <option value="" disabled="" disabled selected>Grade</option>
                                <option value="1st Class">1st Class/Distinction</option>
                                <option value="2nd Class Upper">2nd Class Upper/Upper Credit</option>
                                <option value="2nd Class Lower">2nd Class Lower/Lower Credit</option>
                                <option value="Pass">Pass</option>
                            </select>
                        </div>
                        <div class="input-field col s12 l2">
                            <select id="TstartYear" name="TstartYear" class="browser-default " required>
                            <option disabled selected>Start Year</option>
                            <option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option></select>
                        </div>
                        <div class="input-field col s12 l2">
                            <select id="TendYear" name="TendYear" class="browser-default " required>
                            <option disabled selected>End Year</option>
                            <option value="1970">1970</option><option value="1971">1971</option>
                            <option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option>
                            <option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option></select>
                        </div>
                        <div class="input-field col s12 l2">
                            <button class="btn waves-effect green darken-1 waves-light center addteriary right" type="submit" name="action"><i class="material-icons right">add</i> ADD</button>
                        </div>
                        <div class="input-field col s12">
                            <a href="{{ route('showCertification') }}" class="tertiaryProceed btn waves-effect waves-light right tertiarySave proceedBtn" {{ count(auth()->user()->tertiary) == 0 ? 'disabled' : ''}}>PROCEED</a>
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
