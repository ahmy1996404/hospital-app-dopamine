@extends('admin.admin_master')
@section('admin')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Show Message </h3>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                             
                            <div class="form-group">
                                <label><strong>Name : </strong></label>
                                <span>{{ $data->name }}</span>

                            </div>
                            <div class="form-group">
                                <label><strong>email : </strong></label>
                                <span>{{ $data->email }}</span>

                            </div>
                            <div class="form-group">
                                <label><strong>phone : </strong></label>
                                <span>{{ $data->phone }}</span>

                            </div>
                            <div class="form-group">
                                <label><strong>subject : </strong></label>
                                <span>{{ $data->subject }}</span>

                            </div>
                            <div class="form-group">
                                <label><strong>message : </strong></label>
                                <span>{{ $data->message }}</span>

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
