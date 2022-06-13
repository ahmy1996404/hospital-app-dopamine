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
                        {!! Form::open(['route' => ['admin.appointment.update', $appointment->id], 'files' => true, 'method' => 'put']) !!}
                        {!! Form::hidden('id', $appointment->id) !!}
                    @else
                        {!! Form::open(['route' => 'admin.appointment.store', 'files' => true, 'method' => 'post']) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('doctor_id', 'doctor_id', ['class' => 'form-label']) !!}
                                <select id="doctor_id" name="doctor_id"
                                    class="form-control @error('doctor_id') is-invalid @enderror">
                                    <option value="">Select doctor id</option>
                                    @foreach ($doctors as $doctor)
                                        <option
                                            {{ old('doctor_id', $edit ? $appointment->doctor_id : '') == $doctor->id ? 'selected' : '' }}
                                            value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
                                    @endforeach
                                </select>
                                @error('doctor_id')
                                    <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {!! Form::label('user_id', 'user_id', ['class' => 'form-label']) !!}
                                <select id="user_id" name="user_id"
                                    class="form-control @error('user_id') is-invalid @enderror">
                                    <option value="">Select patient id</option>
                                    @foreach ($users as $user)
                                        <option
                                            {{ old('user_id', $edit ? $appointment->user_id : '') == $user->id ? 'selected' : '' }}
                                            value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                @if (!$edit)
                                    {!! Form::label('date', 'date', ['class' => 'form-label']) !!}

                                    <select id="avail-dd" class="form-control" name="date">

                                    </select>

                                    @error('date')
                                        <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                @else
                                    {!! Form::label('date', 'date', ['class' => 'form-label']) !!}

                                    <select id="avail-dd" class="form-control" name="date">
                                        @foreach ($doctorAvailDays as $doctorAvailDay)
                                            <option
                                                {{ old('date', $edit ? $appointment->date : '') == $doctorAvailDay->date ? 'selected' : '' }}
                                                value="{{ $doctorAvailDay->date }}">
                                                {{ $doctorAvailDay->date }} {{ $doctorAvailDay->day }} </option>
                                        @endforeach
                                    </select>
                                    @error('date')
                                        <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                @endif
                            </div>
                            @if ($edit)
                                <div class="form-group">
                                    {!! Form::label('status', 'status', ['class' => 'form-label']) !!}

                                    <select id="avail-dd" class="form-control" name="status">

                                        <option
                                            {{ old('status', $edit ? $appointment->status : '') == 'pending' ? 'selected' : '' }}
                                            value="pending">
                                            pending
                                        </option>
                                        <option
                                            {{ old('status', $edit ? $appointment->status : '') == 'confirmed' ? 'selected' : '' }}
                                            value="confirmed">
                                            confirmed
                                        </option>
                                        <option
                                            {{ old('status', $edit ? $appointment->status : '') == 'rejected' ? 'selected' : '' }}
                                            value="rejected">
                                            rejected
                                        </option>
                                        <option
                                            {{ old('status', $edit ? $appointment->status : '') == 'rejected' ? 'complete' : '' }}
                                            value="complete">
                                            complete
                                        </option>
                                    </select>
                                    @error('status')
                                        <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#doctor_id').on('change', function() {
                var idDoctor = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{ url('api/doctor/working-hours') }}",
                    type: "POST",
                    data: {
                        doctor_id: idDoctor,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#avail-dd').html(
                            '<option value="">Select appointment date</option>');
                        var today = new Date();
                        var days = [
                            "sunday",
                            "monday",
                            "tuesday",
                            "wednesday",
                            "thursday",
                            "friday",
                            "saturday",
                        ];

                        $.each(result, function(key, value) {
                            var d = new Date(value);

                            $("#avail-dd").append('<option value="' + value + '">' +
                                value + ' ' + days[d.getDay()] + '</option>');
                        });
                    }
                });
            });

        });
    </script>
@endsection
