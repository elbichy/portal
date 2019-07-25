@extends('layouts.app')

@section('content')
    <div class="my-content-wrapper">
        <div class="content-container">
            <div class="sectionWrap">
                {{-- SALES HEADING --}}
                <h6 class="center sectionHeading">APPLICANT'S DASHBOARD</h6>

                {{-- SALES TABLE --}}
                <div class="sectionFormWrap z-depth-1" style="padding:24px;">
                    @cannot('hasSubmitted')
                    <p class="formMsg blue lighten-5 left-align">
                        Welcome {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}!<br/>
                        Start your application by uploading your passport photograph.
                    </p>
                    @endcannot
                    @can('hasSubmitted')
                    <p class="formMsg green lighten-5 left-align">
                        Dear {{ auth()->user()->firstname }} {{ auth()->user()->lastname }},<br/>
                        while we process your application, print and keep a copy of your application and referee forms, further directives shall be sent to you via your E-mail, for any feedbacks, feel free to E-mail us.
                    </p>
                    @endcan
                    <div class="display-and-form-wrap row col s12">
                        <div style="padding:0;">
                            <div class="imgWrap col s12 l10">
                                <img src="{{ auth()->user()->image != NULL ? auth()->user()->image : 'https://nscdc-portal-bucket.s3.eu-west-2.amazonaws.com/avatars/default.jpg'}}" alt="Passport photograph" class="responsive-img"></div>
                        </div>

                        @if(auth()->user()->image == NULL)
                            <form action="{{ route('storeImage') }}" method="POST" class="imageUploadForm col s12 l9" enctype="multipart/form-data" style="padding:0;">
                                @csrf
                                <h6 class="customH62">Upload your passport photograph</h6>
                                <div class="col s12">
                                    <blockquote>
                                        (Accepted Max file size is 80KB and supported formats are JPEG, PNG, GIF)
                                    </blockquote>
                                    <p>
                                        @if ($errors->has('image'))
                                            <span class="helper-text red-text">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </p>
                                </div>
                                <div class="file-field input-field col s12 l10">
                                    <div class="btn btn-flat white-text">
                                        <span>Select Image</span>
                                        <input type="file" name="image" id="image" required>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>

                                <div class="input-field col s12 l2">
                                    <button class="btn waves-effect green darken-1 waves-light left addImage" type="submit" name="action"> UPLOAD</button>
                                </div>
                            </form>
                        @endif
                        @if(auth()->user()->image != NULL)
                            <div style="display: width:100%; flex; flex-direction: column; justify-content: center; align-items: center;">
                                <h4 style="margin-bottom:0;">{{ ucwords(auth()->user()->firstname) }} {{ ucwords(auth()->user()->lastname) }}</h4>
                                <h5 style="margin-top:9px;">{{ auth()->user()->appNum != NULL ? auth()->user()->appNum : 'NSCDC/REC/2019/'.auth()->user()->id }}</h5>
                                @can('hasSubmitted')
                                    <div class="row printBtns">
                                        <a target="blank" href="{{ route('applicationForm') }}" style="margin-right:10px;" class="btn green darken-3 waves-effect waves-light"><i class="material-icons left">print</i>Application Form</a>
                                        <a href="{{ route('refereeForm') }}" style="margin-right:10px;" class="btn green darken-3 waves-effect waves-light"><i class="material-icons left">print</i> Refferee Form</a>
                                        <button class="emailUs btn blue darken-3 waves-effect waves-light"><i class="material-icons left">email</i>E-mail Us</button>
                                    </div>
                                @endcan
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="footer z-depth-1">
            <p>&copy; NSCDC ICT & Cybersecurity Department</p>
        </div>
    </div>
@endsection
