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
                        {!! Form::open(['route' => ['admin.articleCategory.update',$data->id],'files'=>true,'method'=>'put']) !!}
                        {!! Form::hidden('id',$data->id) !!}
                    @else
                        {!! Form::open(['route' => 'admin.articleCategory.store','files'=>true,'method'=>'post']) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('name', 'category name', ['class' => 'form-label']) !!}
                                {!! Form::text('name', $edit ? old('name',$data->name) : old('name'),['placeholder' => 'category name','class' => $errors->first('name') ? 'form-control is-invalid' : 'form-control']) !!}
                                @error('name')
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
