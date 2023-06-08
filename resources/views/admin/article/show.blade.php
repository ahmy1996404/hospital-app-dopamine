@extends('admin.admin_master')
@section('admin')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Show Article </h3>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label><strong>header : </strong></label>
                                <span>{{ $data->header }}</span>

                            </div>
                            <div class="form-group">
                                <label><strong>content : </strong></label>
                                <span>{{ $data->content }}</span>

                            </div>
                            <div class="form-group">
                                <label><strong>category : </strong></label>
                                <span>{{ $data->category->name }}</span>

                            </div>
                            <div class="form-group">
                                <label><strong>header img : </strong></label>
                                @if ($data->header_img != null)
                                    <img src="{{ asset('/upload/article/' . $data->header_img) }}" height="70px"
                                        width="70px">
                                @else
                                    <img src="{{ asset('upload/noimagejpg.jpg') }}" height="70px" width="70px">
                                @endif

                            </div>
                            <div class="form-group">
                                <label><strong>thumbnail img : </strong></label>
                                @if ($data->thumbnail_img != null)
                                    <img src="{{ asset('/upload/article/thumb/' . $data->thumbnail_img) }}" height="70px"
                                        width="70px">
                                @else
                                    <img src="{{ asset('upload/noimagejpg.jpg') }}" height="70px" width="70px">
                                @endif

                            </div>
                            <div class="form-group">
                                <label><strong>created at : </strong></label>
                                <span>{{ $data->created_at->diffForHumans() }}</span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
