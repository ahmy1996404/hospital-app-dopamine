@extends('admin.admin_master')
@section('admin')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Show Doctor </h3>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                             
                            <div class="form-group">
                                <label><strong>Name : </strong></label>
                                <span>{{ $data->name }}</span>

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
