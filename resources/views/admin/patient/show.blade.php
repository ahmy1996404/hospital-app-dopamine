@extends('admin.admin_master')
@section('admin')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Show Patient </h3>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Photo : </strong></label>
                                @if ($user->profile_photo_path != null)
                                    <img src="{{ asset('/upload/user_images/' . $user->profile_photo_path) }}" height="70px"
                                        width="70px">
                                @else
                                    <img src="{{ asset('upload/noimagejpg.jpg') }}" height="70px" width="70px">
                                @endif

                            </div>
                            <div class="form-group">
                                <label><strong>Name : </strong></label>
                                <span>{{ $user->name }}</span>

                            </div>




                             
                              
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>email : </strong></label>
                                <span>{{ $user->email }}</span>


                            </div>
                            <div class="form-group">
                                <label><strong>phone : </strong></label>

                                <span>{{ $user->phone }}</span>


                            </div>
                            
                            <div class="form-group">
                                <label><strong>created at  : </strong></label>
                                <span>{{ $user->created_at->diffForHumans() }}</span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
