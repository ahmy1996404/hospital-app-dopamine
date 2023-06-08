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
                        {!! Form::open(['route' => ['admin.article.update',$data->id],'files'=>true,'method'=>'put']) !!}
                        {!! Form::hidden('id',$data->id) !!}
                    @else
                        {!! Form::open(['route' => 'admin.article.store','files'=>true,'method'=>'post']) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('header', 'header', ['class' => 'form-label']) !!}
                                {!! Form::text('header', $edit ? old('header',$data->header) : old('header'),['placeholder' => 'header name','class' => $errors->first('header') ? 'form-control is-invalid' : 'form-control']) !!}
                                @error('header')
                                <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>      
                             <div class="form-group">
                                {!! Form::label('thumbnail_img', 'thumbnail_img', ['class' => 'form-label']) !!}

                                <input type="file" name="thumbnail_img"
                                    class="form-control avatar @error('thumbnail_img') is-invalid @enderror" id="thumbnail_img">
                                @error('thumbnail_img')
                                    <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                             <div class="form-group">
                                {!! Form::label('header_img', 'header_img', ['class' => 'form-label']) !!}

                                <input type="file" name="header_img"
                                    class="form-control avatar @error('header_img') is-invalid @enderror" id="header_img">
                                @error('header_img')
                                    <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {!! Form::label('category_id', 'category_id', ['class' => 'form-label']) !!}
                                <select id="category_id" name="category_id"
                                    class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option
                                            {{ old('category_id', $edit ? $data->category_id : '') == $category->id ? 'selected' : '' }}
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {!! Form::label('content', 'content', ['class' => 'form-label']) !!}
                                {!! Form::textarea('content', $edit ? old('content', $data->content) : old('content'), ['id' => 'content', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none', 'class' => $errors->first('content') ? 'form-control is-invalid' : 'form-control']) !!}
                                @error('content')
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
