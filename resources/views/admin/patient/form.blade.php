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
                        {!! Form::open(['route' => ['admin.patient.update', $user->id], 'files' => true, 'method' => 'put']) !!}
                        {!! Form::hidden('id', $user->id) !!}
                    @else
                        {!! Form::open(['route' => 'admin.patient.store', 'files' => true, 'method' => 'post']) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('name', 'user name', ['class' => 'form-label']) !!}
                                {!! Form::text('name', $edit ? old('name', $user->name) : old('name'), ['placeholder' => 'user name', 'class' => $errors->first('name') ? 'form-control is-invalid' : 'form-control']) !!}
                                @error('name')
                                    <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                {!! Form::label('avatar', 'Photo', ['class' => 'form-label']) !!}

                                <input type="file" name="avatar"
                                    class="form-control avatar @error('avatar') is-invalid @enderror" id="avatar">
                                @error('avatar')
                                    <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                             
                             
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                    </div>
                                    {!! Form::email('email', $edit ? old('email', $user->email) : old('email'), ['placeholder' => 'email', 'class' => $errors->first('email') ? 'form-control is-invalid' : 'form-control']) !!}
                                    @error('email')
                                        <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                {!! Form::label('phone', 'Phone', ['class' => 'form-label']) !!}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    {!! Form::tel('phone', $edit ? old('phone', $user->phone) : old('phone'), ['placeholder' => 'phone', 'class' => $errors->first('phone') ? 'form-control is-invalid' : 'form-control']) !!}
                                    @error('phone')
                                        <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            @if (!$edit)
                                <div class="form-group">
                                    {!! Form::label('password', 'Password', ['class' => 'form-label']) !!}
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                        </div>
                                        {!! Form::password('password', ['placeholder' => 'Password', 'class' => $errors->first('password') ? 'form-control is-invalid' : 'form-control']) !!}
                                        @error('password')
                                            <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                             
                            @endif

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
    <script type="text/javascript">
        var checkBoxs = document.getElementsByClassName("day-checkbox")
        var i = checkBoxs.length;
        for (i = 0; i < checkBoxs.length; i++) {
            checkBoxs[i].addEventListener("click", function() {
                document.getElementById(this.id + 'From').disabled = !this.checked;
                document.getElementById(this.id + 'To').disabled = !this.checked;

            });
        }
    </script>
    <script>
        $(".avatar").change(function() {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.avatar-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }

        });

        $("#avatar").change(function() {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.avatar-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }

        });
    </script>
@endsection
