@extends('admin.admin_master')
@section('admin')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">{{ $edit ? 'Edit' : 'Create' }}</h3>
                </div>

                <div class="card-body">
                    @if ($edit)
                        {!! Form::open(['route' => ['admin.aboutUs.update'], 'files' => true, 'method' => 'put']) !!}
                        {!! Form::hidden('id', $data->id) !!}
                    @else
                        {!! Form::open(['route' => 'admin.aboutUs.store', 'files' => true, 'method' => 'post']) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('header', 'header name', ['class' => 'form-label']) !!}
                                {!! Form::text('header', $edit ? old('header', $data->header) : old('header'), ['placeholder' => 'header name', 'class' => $errors->first('header') ? 'form-control is-invalid' : 'form-control']) !!}
                                @error('header')
                                    <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('content', 'content ', ['class' => 'form-label']) !!}
                                {!! Form::textarea('content', $edit ? old('content', $data->content) : old('content'), ['placeholder' => 'content ', 'class' => $errors->first('content') ? 'form-control is-invalid' : 'form-control']) !!}
                                @error('content')
                                    <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        {!! Form::submit($edit ? 'Update' : 'Create', ['class' => 'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
