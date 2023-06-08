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
                        {!! Form::open(['route' => ['admin.setting.update',$data->id],'files'=>true,'method'=>'put']) !!}
                        {!! Form::hidden('id',$data->id) !!}
                    @else
                        {!! Form::open(['route' => 'admin.setting.store','files'=>true,'method'=>'post']) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('name', ' name', ['class' => 'form-label']) !!}
                                {!! Form::text('name', $edit ? old('name',$data->name) : old('name'),['placeholder' => '  name','class' => $errors->first('name') ? 'form-control is-invalid' : 'form-control']) !!}
                                @error('name')
                                <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>      
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('value', 'value ', ['class' => 'form-label']) !!}
                                {!! Form::text('value', $edit ? old('value',$data->value) : old('value'),['placeholder' => 'value','class' => $errors->first('value') ? 'form-control is-invalid' : 'form-control']) !!}
                                @error('value')
                                <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>      
                        </div>
                      
                    </div>

                    <div class="col-md-12">
                        {!! Form::submit($edit ? 'Update': 'Create', ['class' => 'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
 
 
@endsection
