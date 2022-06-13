@extends('patient.profile.dashboard')
@section('title', 'show report')
@section('bannerTitle', 'show report')

@section('dashboardContent')
<div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Show Report </h3>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label><strong>User Name : </strong></label>
                                <span>{{ $data->appointment->user->name }}</span>

                            </div>            
                        </div>
                         <div class="col-md-6">
                            
                            <div class="form-group">
                                <label><strong>Doctor Name : </strong></label>
                                <span>{{ $data->appointment->doctor->user->name }}</span>

                            </div>                          
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>diagnosis : </strong></label>
                                <span>{{ $data->diagnosis }}</span>


                            </div>
                            <div class="form-group">
                                <label><strong>report details : </strong></label>

                                <span>{{ $data->report_details }}</span>


                            </div>
                            
                            <div class="form-group">
                                <label><strong>created at  : </strong></label>
                                <span>{{ $data->created_at->diffForHumans() }}</span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

 @endsection
