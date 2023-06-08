@extends('patient.layouts.master')
@section('title', 'Appintment')
@section('content')

    <!-- Inner Banner -->
    <div class="inner-banner inner-bg2">
        <div class="container">
            <div class="inner-title">
                <h3>Appointment</h3>
                <ul>
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>Appointment</li>
                </ul>
            </div>
        </div>
        <div class="inner-banner-shape">
            <div class="shape1">
                <img src="{{ asset('patient/assets/img/inner-banner/inner-banner-shape1.png') }}" alt="Images">
            </div>
            <div class="shape2">
                <img src="{{ asset('patient/assets/img/inner-banner/inner-banner-shape2.png') }}" alt="Images">
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Appointment Widget -->
    <div class="appointment-widget pt-100 pb-70">
        <div class="container">
            <div class="row ">


                <div class="col-lg-12">
                    <div class="appointment-widget-form">
                        <div class="appointment-from">
                            <h2>Get Your Voice Appointment</h2>
                            <p>Online Easily During This Corona Pandemic</p>
                            {!! Form::open(['route' => 'patient.appointment.store', 'files' => true, 'method' => 'post']) !!}
                            @if (!$doctor)
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label  class="form-label">Speciality</label>
                                            <select class="form-control" disabled>
                                                <option  selected>
                                                    Psychiatric specialization
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('speciality_id', 'Sub Speciality', ['class' => 'form-label']) !!}

                                            <select class="form-control" id="speciality_id_dd" name="speciality_id">
                                                <option value="">Select speciality</option>
                                                @foreach ($specialities as $speciality)
                                                    <option value="{{ $speciality->id }}">{{ $speciality->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('doctor_id', 'Doctor', ['class' => 'form-label']) !!}

                                            <select id="doctor_id_dd" name="doctor_id" class="form-control  @error('doctor_id') is-invalid @enderror"">
                                                <option value="">Select Doctor</option>

                                            </select>
                                            @error('doctor_id')
                                                <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group date" id="">
                                                {!! Form::label('date', 'date', ['class' => 'form-label']) !!}

                                                <select id="avail-dd" class="form-control  @error('date') is-invalid @enderror"" name="date">
                                                    <option value="">Select time</option>

                                                </select>
                                                @error('date')
                                                    <span id="code-error"
                                                        class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn">
                                            Book An Appointment
                                        </button>
                                    </div>
                                </div>
                            @endif
                            @if ($doctor)
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label  class="form-label">Speciality</label>
                                            <select class="form-control" disabled>
                                                <option  selected>
                                                    Psychiatric specialization
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('speciality_id', 'Sub Speciality', ['class' => 'form-label']) !!}

                                            <select class="form-control" id="speciality_id_dd" name="speciality_id">
                                                <option value="{{ $doctors->speciality->id }}" selected>
                                                    {{ $doctors->speciality->name }}
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('doctor_id', 'Doctor', ['class' => 'form-label']) !!}

                                            <select id="doctor_id_dd" name="doctor_id" class="form-control">
                                                <option value="{{ $doctors->id }}" selected>
                                                    {{ $doctors->user->name }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group date" id="">
                                                {!! Form::label('date', 'Date', ['class' => 'form-label']) !!}

                                                <select id="avail-dd" class="form-control" name="date">
                                                    <option selected value="">Select date</option>
                                                    @foreach ($doctors->workingHours as $available)
                                                        {{ $date = Carbon\Carbon::parse('this ' . $available->day)->toDateString() }}
                                                        <option value="{{ $date }}">
                                                            {{ $available->day . ' ' . $date }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group date" id="">
                                                {!! Form::label('time', 'Time', ['class' => 'form-label']) !!}

                                                <select id="avail-tt" class="form-control" name="time">
                                                    <option selected value="">Select time</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn">
                                            Book An Appointment
                                        </button>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <a href="{{ route('patient.doctors') }}" type="submit" class="default-btn"
                                            style="text-align: center">
                                            Choose another doctor
                                        </a>
                                    </div>
                                </div>
                            @endif
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Appointment Widget End -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#speciality_id_dd').on('change', function() {
                var idSpeciality = this.value;
                $("#doctor_id_dd").html('');
                $.ajax({
                    url: "{{ url('api/doctor/doctors') }}",
                    type: "POST",
                    data: {
                        speciality_id: idSpeciality,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#doctor_id_dd').html(
                            '<option value="">Select Doctor</option>');

                        $.each(result, function(key, value) {

                            $("#doctor_id_dd").append('<option value="' + value.id +
                                '">' +
                                value.user.name + '</option>');
                        });
                    }
                });
            });
            $('#doctor_id_dd').on('change', function() {
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
            $('#avail-dd').on('change', function() {
                var idDoctor = $('#doctor_id_dd').find(":selected").val();
                console.log(idDoctor)
                var dateDoctor = this.value;
                $("#avail-tt").html('');
                $.ajax({

                    url: "{{ url('api/doctor/time') }}",
                    type: "POST",
                    data: {
                        doctor_id: idDoctor,
                        date: dateDoctor,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        console.log(result)
                        $('#avail-tt').html(
                            '<option value="">Select appointment time</option>');


                        $.each(result, function(key, value) {

                            $("#avail-tt").append('<option value="' + value + '">' +
                                value +  '</option>');
                        });
                    }
                });
            });

        });
    </script>
@endsection
