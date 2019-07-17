@extends('layouts.app', ['title' => 'Administrator - Dashboard'])

@section('content')
    <div class="my-content-wrapper">
        <div class="content-container">
            <div class="sectionWrap">
                <div class="stats card row">
                    <div class="stats-inner">
                        <div class="col s12 m4 l3">
                            <div class="info-box">
                            <span class="info-box-icon blue darken-1 white-text"><i class="material-icons">people</i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">TOTAL<br>REGISTERED</span>
                                <span id="registered" class="info-box-number">0</span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col s12 m4 l3">
                            <div class="info-box">
                            <span class="info-box-icon red darken-1 white-text"><i class="material-icons">people</i></span>
    
                            <div class="info-box-content">
                                <span class="info-box-text">TOTAL<br>VERIFIED</span>
                                <span id="in_progress" class="info-box-number">0</span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
    
                        <div class="col s12 m4 l3">
                            <div class="info-box">
                            <span class="info-box-icon yellow darken-4 white-text"><i class="material-icons">people</i></span>
    
                            <div class="info-box-content">
                                <span class="info-box-text">TOTAL<br>COMPLETED</span>
                                <span id="completed" class="info-box-number">0</span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col s12 m4 l3">
                            <div class="info-box">
                            <span class="info-box-icon teal darken-2 white-text"><i class="material-icons">done_all</i></span>
    
                            <div class="info-box-content">
                                <span class="info-box-text">TOTAL SHORTLISTED</span>
                                <span class="info-box-number">0</span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    <!-- /.col -->
                    </div>
                </div>
            </div>
        </div>
        <div class="footer z-depth-1">
            <p>&copy; NSCDC ICT & Cybersecurity Department</p>
        </div>
    </div>
@endsection
