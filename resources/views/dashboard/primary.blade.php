@extends('layouts.app')

@section('content')
    <div class="my-content-wrapper">
        <div class="content-container">
            <div class="sectionWrap">
                {{-- SALES HEADING --}}
                <h6 class="center sectionHeading">PRIMARY SCHOOL DATA</h6>
                {{-- SALES TABLE --}}
                <div class="sectionFormWrap z-depth-1">
                    <div class="row col s12">
                        <p class="formMsg blue lighten-5 justify">NOTE: (COMPULSORY SECTION) - Make sure to add your Primary school certificate. Fill the form below and click the green 'ADD' button, then click the 'PROCEED' button to go to the next section</p>
                        <h6 class="customH61">Primary school qualification records</h6>
                        <table class="responsive-table striped">
                            <thead>
                                <tr>
                                    <th>Name of School</th>
                                    <th>Qualification</th>
                                    <th>Start Year</th>
                                    <th>End Year</th>
                                </tr>
                            </thead>
                            <tbody class="priRows">
                                @if(count(auth()->user()->primary) > 0)
                                    @foreach(auth()->user()->primary as $record)
                                        <tr>
                                            <td>{{ ucwords($record->nameOfSchool.', '.$record->location) }}</td>
                                            <td>{{ strtoupper($record->certType) }}</td>
                                            <td>{{ $record->priStartYear }}</td>
                                            <td>{{ $record->priEndYear }}</td>
                                            <td>
                                                <a id="deleteRow" onclick="deletePrimary(event)" href="#" data-row_id="{{ $record->id }}" class="red-text">x</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="dummyRow">
                                        <td class="center" colspan="4">No data</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <form id="priForm" class="priForm" name="priForm">
                        <h6 class="customH62">Add a record</h6>
                        @csrf
                        <div class="row" style="margin:0;">
                            <div class="input-field col s12 l3">
                                <select id="certType" name="certType" class="browser-default " required>
                                    <option disabled="" selected="">Qualification</option>
                                    <option value="fslc" selected>FSLC</option>
                                </select>
                                @if ($errors->has('certType'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('certType') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col s12 l5">
                                <input id="nameOfSchool" name="nameOfSchool" type="text" class="" required>
                                <label for="nameOfSchool">Name of School</label>
                                @if ($errors->has('nameOfSchool'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('nameOfSchool') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col s12 l4">
                                <input id="location" name="location" type="text" class="" placeholder="e.g. Bwari, FCT Abuja Nigeria" required>
                                <label for="location">Location</label>
                                @if ($errors->has('location'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin:0; padding-top:0;">
                            <div class="input-field col s12 l2">
                                <select id="priStartYear" name="priStartYear" class="browser-default " required>
                                <option selected="">Start Year</option>
                                <option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option></select>
                                @if ($errors->has('priStartYear'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('priStartYear') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-field col s12 l2">
                                <select id="priEndYear" name="priEndYear" class="browser-default " required>
                                    <option selected="">End Year</option>
                                <option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option></select>
                                @if ($errors->has('priSec'))
                                    <span class="helper-text red-text">
                                        <strong>{{ $errors->first('priSec') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col s12 l3">
                                <button class="btn waves-effect waves-light green darken-1 center addPri proceedBtn" type="submit" name="action"><i class="material-icons right">add</i> ADD</button>
                            </div>
                            <div class="input-field col s12 l3 right">
                                <a href="{{ route('showSecondary') }}" class="proceedBtn right btn waves-effect waves-light"{{ count(auth()->user()->primary) == 0 ? 'disabled' : ''}}>PROCEED</a>
                            </div>
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
