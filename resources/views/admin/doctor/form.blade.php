@extends('admin.admin_master')
@section('admin')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">{{ $edit ? 'Edit' : 'Create' }}</h3>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    @if ($edit)
                        {!! Form::open(['route' => ['admin.doctor.update', $user->id], 'files' => true, 'method' => 'put']) !!}
                        {!! Form::hidden('id', $user->id) !!}
                    @else
                        {!! Form::open(['route' => 'admin.doctor.store', 'files' => true, 'method' => 'post']) !!}
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
                            <div class="form-group">
                                {!! Form::label('speciality', 'speciality', ['class' => 'form-label']) !!}
                                <select id="speciality_id" name="speciality_id"
                                    class="form-control @error('speciality_id') is-invalid @enderror">
                                    <option value="">Select Speciality</option>
                                    @foreach ($specialities as $speciality)
                                        <option
                                            {{ old('speciality_id', $edit ? $doctor->speciality_id : '') == $speciality->id ? 'selected' : '' }}
                                            value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                                    @endforeach
                                </select>
                                @error('speciality_id')
                                    <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {!! Form::label('doctor_info', 'Doctor Info', ['class' => 'form-label']) !!}
                                {!! Form::textarea('doctor_info', $edit ? old('doctor_info', $doctor->doctor_info) : old('doctor_info'), ['id' => 'doctor_info', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none', 'class' => $errors->first('doctor_info') ? 'form-control is-invalid' : 'form-control']) !!}
                                @error('doctor_info')
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
                                {!! Form::label('clinic_address', 'Clinic Address', ['class' => 'form-label']) !!}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                    </div>
                                    {!! Form::text('clinic_address', $edit ? old('clinic_address', $doctor->clinic_address) : old('clinic_address'), ['placeholder' => 'clinic address', 'class' => $errors->first('clinic_address') ? 'form-control is-invalid' : 'form-control']) !!}
                                    @error('clinic_address')
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
                                {{--                            voice working--}}
                                <label>Voice Working hours</label>
                                <div class="form-group">
                                    <div class="row">

                                        <div class="col-3">
                                            <label class="switch">

                                                <input id="sunday" value="sunday" class="day-checkbox" type="checkbox"
                                                    name="days[]">
                                                <span class="slider round"></span>
                                            </label>
                                            Sunday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="sundayFrom" name="from[]" required disabled>
                                            <input type="time" id="sundayTo" name="to[]" required disabled>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch">

                                                <input id="monday" value="monday" class="day-checkbox" type="checkbox"
                                                    name="days[]">
                                                <span class="slider round"></span>
                                            </label>
                                            Monday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="mondayFrom" name="from[]" required disabled>
                                            <input type="time" id="mondayTo" name="to[]" required disabled>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch" class="row">

                                                <input id="tuesday" value="tuesday" class="day-checkbox" type="checkbox"
                                                    name="days[]">
                                                <span class="slider round"></span>
                                            </label>

                                            Tuesday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="tuesdayFrom" name="from[]" required disabled>
                                            <input type="time" id="tuesdayTo" name="to[]" required disabled>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch">

                                                <input id="wednesday" value="wednesday" class="day-checkbox"
                                                    type="checkbox" name="days[]">
                                                <span class="slider round"></span>
                                            </label>
                                            Wednesday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="wednesdayFrom" name="from[]" required disabled>
                                            <input type="time" id="wednesdayTo" name="to[]" required disabled>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch">

                                                <input id="thursday" value="thursday" class="day-checkbox" type="checkbox"
                                                    name="days[]">
                                                <span class="slider round"></span>
                                            </label>
                                            Thursday
                                        </div>
                                        <div class="col-6">
                                            <input type="time" id="thursdayFrom" name="from[]" required disabled>
                                            <input type="time" id="thursdayTo" name="to[]" required disabled>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch">

                                                <input id="friday" value="friday" class="day-checkbox" type="checkbox"
                                                    name="days[]">
                                                <span class="slider round"></span>
                                            </label>
                                            Friday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="fridayFrom" name="from[]" required disabled>
                                            <input type="time" id="fridayTo" name="to[]" required disabled>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch">

                                                <input id="saturday" value="saturday" class="day-checkbox" type="checkbox"
                                                    name="days[]">
                                                <span class="slider round"></span>
                                            </label>
                                            Saturday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="saturdayFrom" name="from[]" required disabled>
                                            <input type="time" id="saturdayTo" name="to[]" required disabled>
                                        </div>

                                    </div>

                                </div>

                                {{--                            video working--}}
                                <label>Video Working hours</label>
                                <div class="form-group">
                                    <div class="row">

                                        <div class="col-3">
                                            <label class="switch">

                                                <input id="sunday" value="sunday" class="video-day-checkbox" type="checkbox"
                                                       name="videoDays[]">
                                                <span class="slider round"></span>
                                            </label>
                                            Sunday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="sundayVideoFrom" name="videoFrom[]" required disabled>
                                            <input type="time" id="sundayVideoTo" name="videoTo[]" required disabled>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch">

                                                <input id="monday" value="monday" class="video-day-checkbox" type="checkbox"
                                                       name="videoDays[]">
                                                <span class="slider round"></span>
                                            </label>
                                            Monday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="mondayVideoFrom" name="videoFrom[]" required disabled>
                                            <input type="time" id="mondayVideoTo" name="videoTo[]" required disabled>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch" class="row">

                                                <input id="tuesday" value="tuesday" class="video-day-checkbox" type="checkbox"
                                                       name="videoDays[]">
                                                <span class="slider round"></span>
                                            </label>

                                            Tuesday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="tuesdayVideoFrom" name="videoFrom[]" required disabled>
                                            <input type="time" id="tuesdayVideoTo" name="videoTo[]" required disabled>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch">

                                                <input id="wednesday" value="wednesday" class="video-day-checkbox"
                                                       type="checkbox" name="videoDays[]">
                                                <span class="slider round"></span>
                                            </label>
                                            Wednesday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="wednesdayVideoFrom" name="videoFrom[]" required disabled>
                                            <input type="time" id="wednesdayVideoTo" name="videoTo[]" required disabled>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch">

                                                <input id="thursday" value="thursday" class="video-day-checkbox" type="checkbox"
                                                       name="videoDays[]">
                                                <span class="slider round"></span>
                                            </label>
                                            Thursday
                                        </div>
                                        <div class="col-6">
                                            <input type="time" id="thursdayVideoFrom" name="videoFrom[]" required disabled>
                                            <input type="time" id="thursdayVideoTo" name="videoTo[]" required disabled>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch">

                                                <input id="friday" value="friday" class="video-day-checkbox" type="checkbox"
                                                       name="videoDays[]">
                                                <span class="slider round"></span>
                                            </label>
                                            Friday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="fridayVideoFrom" name="videoFrom[]" required disabled>
                                            <input type="time" id="fridayVideoTo" name="videoTo[]" required disabled>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch">

                                                <input id="saturday" value="saturday" class="video-day-checkbox" type="checkbox"
                                                       name="videoDays[]">
                                                <span class="slider round"></span>
                                            </label>
                                            Saturday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="saturdayVideoFrom" name="videoFrom[]" required disabled>
                                            <input type="time" id="saturdayVideoTo" name="videoTo[]" required disabled>
                                        </div>

                                    </div>

                                </div>
                            @else
                                {{--                            voice working--}}
                                <label>Voice Working hours</label>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="switch">

                                                <input id="sunday" value="sunday" class="day-checkbox" type="checkbox"
                                                    name="days[]" {{ in_array('sunday', $days) ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                            Sunday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="sundayFrom" name="from[]" required
                                                {{ in_array('sunday', $days)
                                                    ? 'value=' .
                                                        $Availability->filter(function ($item) {
                                                                return $item->day == 'sunday';
                                                            })->first()->from
                                                    : 'disabled' }}>
                                            <input type="time" id="sundayTo" name="to[]" required
                                                {{ in_array('sunday', $days)
                                                    ? 'value=' .
                                                        $Availability->filter(function ($item) {
                                                                return $item->day == 'sunday';
                                                            })->first()->to
                                                    : 'disabled' }}>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch">

                                                <input id="monday" value="monday" class="day-checkbox" type="checkbox"
                                                    name="days[]" {{ in_array('monday', $days) ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                            Monday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="mondayFrom" name="from[]" required
                                                {{ in_array('monday', $days)
                                                    ? 'value=' .
                                                        $Availability->filter(function ($item) {
                                                                return $item->day == 'monday';
                                                            })->first()->from
                                                    : 'disabled' }}>
                                            <input type="time" id="mondayTo" name="to[]" required
                                                {{ in_array('monday', $days)
                                                    ? 'value=' .
                                                        $Availability->filter(function ($item) {
                                                                return $item->day == 'monday';
                                                            })->first()->to
                                                    : 'disabled' }}>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch" class="row">

                                                <input id="tuesday" value="tuesday" class="day-checkbox" type="checkbox"
                                                    name="days[]" {{ in_array('tuesday', $days) ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>

                                            Tuesday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="tuesdayFrom" name="from[]" required
                                                {{ in_array('tuesday', $days)
                                                    ? 'value=' .
                                                        $Availability->filter(function ($item) {
                                                                return $item->day == 'tuesday';
                                                            })->first()->from
                                                    : 'disabled' }}>
                                            <input type="time" id="tuesdayTo" name="to[]" required
                                                {{ in_array('tuesday', $days)
                                                    ? 'value=' .
                                                        $Availability->filter(function ($item) {
                                                                return $item->day == 'tuesday';
                                                            })->first()->to
                                                    : 'disabled' }}>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch">

                                                <input id="wednesday" value="wednesday" class="day-checkbox"
                                                    type="checkbox" name="days[]"
                                                    {{ in_array('wednesday', $days) ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                            Wednesday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="wednesdayFrom" name="from[]" required
                                                {{ in_array('wednesday', $days)
                                                    ? 'value=' .
                                                        $Availability->filter(function ($item) {
                                                                return $item->day == 'wednesday';
                                                            })->first()->from
                                                    : 'disabled' }}>
                                            <input type="time" id="wednesdayTo" name="to[]" required
                                                {{ in_array('wednesday', $days)
                                                    ? 'value=' .
                                                        $Availability->filter(function ($item) {
                                                                return $item->day == 'wednesday';
                                                            })->first()->to
                                                    : 'disabled' }}>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch">

                                                <input id="thursday" value="thursday" class="day-checkbox"
                                                    type="checkbox" name="days[]"
                                                    {{ in_array('thursday', $days) ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                            Thursday
                                        </div>
                                        <div class="col-6">
                                            <input type="time" id="thursdayFrom" name="from[]" required
                                                {{ in_array('thursday', $days)
                                                    ? 'value=' .
                                                        $Availability->filter(function ($item) {
                                                                return $item->day == 'thursday';
                                                            })->first()->from
                                                    : 'disabled' }}>
                                            <input type="time" id="thursdayTo" name="to[]" required
                                                {{ in_array('thursday', $days)
                                                    ? 'value=' .
                                                        $Availability->filter(function ($item) {
                                                                return $item->day == 'thursday';
                                                            })->first()->to
                                                    : 'disabled' }}>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch">

                                                <input id="friday" value="friday" class="day-checkbox" type="checkbox"
                                                    name="days[]" {{ in_array('friday', $days) ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                            Friday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="fridayFrom" name="from[]" required
                                                {{ in_array('friday', $days)
                                                    ? 'value=' .
                                                        $Availability->filter(function ($item) {
                                                                return $item->day == 'friday';
                                                            })->first()->from
                                                    : 'disabled' }}>
                                            <input type="time" id="fridayTo" name="to[]" required
                                                {{ in_array('friday', $days)
                                                    ? 'value=' .
                                                        $Availability->filter(function ($item) {
                                                                return $item->day == 'friday';
                                                            })->first()->to
                                                    : 'disabled' }}>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch">

                                                <input id="saturday" value="saturday" class="day-checkbox"
                                                    type="checkbox" name="days[]"
                                                    {{ in_array('saturday', $days) ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                            Saturday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="saturdayFrom" name="from[]" required
                                                {{ in_array('saturday', $days)
                                                    ? 'value=' .
                                                        $Availability->filter(function ($item) {
                                                                return $item->day == 'saturday';
                                                            })->first()->from
                                                    : 'disabled' }}>
                                            <input type="time" id="saturdayTo" name="to[]" required
                                                {{ in_array('saturday', $days)
                                                    ? 'value=' .
                                                        $Availability->filter(function ($item) {
                                                                return $item->day == 'saturday';
                                                            })->first()->to
                                                    : 'disabled' }}>
                                        </div>

                                    </div>
                                </div>
                                {{--                            video working--}}
                                <label>Video Working hours</label>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="switch">

                                                <input id="sunday" value="sunday" class="video-day-checkbox" type="checkbox"
                                                       name="videoDays[]" {{ in_array('sunday', $videoDays) ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                            Sunday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="sundayVideoFrom" name="videoFrom[]" required
                                                    {{ in_array('sunday', $videoDays)
                                                        ? 'value=' .
                                                            $videoAvailability->filter(function ($item) {
                                                                    return $item->day == 'sunday';
                                                                })->first()->from
                                                        : 'disabled' }}>
                                            <input type="time" id="sundayVideoTo" name="videoTo[]" required
                                                    {{ in_array('sunday', $videoDays)
                                                        ? 'value=' .
                                                            $videoAvailability->filter(function ($item) {
                                                                    return $item->day == 'sunday';
                                                                })->first()->to
                                                        : 'disabled' }}>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch">

                                                <input id="monday" value="monday" class="video-day-checkbox" type="checkbox"
                                                       name="videoDays[]" {{ in_array('monday', $videoDays) ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                            Monday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="mondayVideoFrom" name="videoFrom[]" required
                                                    {{ in_array('monday', $videoDays)
                                                        ? 'value=' .
                                                            $videoAvailability->filter(function ($item) {
                                                                    return $item->day == 'monday';
                                                                })->first()->from
                                                        : 'disabled' }}>
                                            <input type="time" id="mondayVideoTo" name="videoTo[]" required
                                                    {{ in_array('monday', $videoDays)
                                                        ? 'value=' .
                                                            $videoAvailability->filter(function ($item) {
                                                                    return $item->day == 'monday';
                                                                })->first()->to
                                                        : 'disabled' }}>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch" class="row">

                                                <input id="tuesday" value="tuesday" class="video-day-checkbox" type="checkbox"
                                                       name="videoDays[]" {{ in_array('tuesday', $videoDays) ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>

                                            Tuesday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="tuesdayVideoFrom" name="videoFrom[]" required
                                                    {{ in_array('tuesday', $videoDays)
                                                        ? 'value=' .
                                                            $videoAvailability->filter(function ($item) {
                                                                    return $item->day == 'tuesday';
                                                                })->first()->from
                                                        : 'disabled' }}>
                                            <input type="time" id="tuesdayVideoTo" name="videoTo[]" required
                                                    {{ in_array('tuesday', $videoDays)
                                                        ? 'value=' .
                                                            $videoAvailability->filter(function ($item) {
                                                                    return $item->day == 'tuesday';
                                                                })->first()->to
                                                        : 'disabled' }}>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch">

                                                <input id="wednesday" value="wednesday" class="video-day-checkbox"
                                                       type="checkbox" name="videoDays[]"
                                                        {{ in_array('wednesday', $videoDays) ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                            Wednesday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="wednesdayVideoFrom" name="videoFrom[]" required
                                                    {{ in_array('wednesday', $videoDays)
                                                        ? 'value=' .
                                                            $videoAvailability->filter(function ($item) {
                                                                    return $item->day == 'wednesday';
                                                                })->first()->from
                                                        : 'disabled' }}>
                                            <input type="time" id="wednesdayVideoTo" name="videoTo[]" required
                                                    {{ in_array('wednesday', $videoDays)
                                                        ? 'value=' .
                                                            $videoAvailability->filter(function ($item) {
                                                                    return $item->day == 'wednesday';
                                                                })->first()->to
                                                        : 'disabled' }}>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch">

                                                <input id="thursday" value="thursday" class="video-day-checkbox"
                                                       type="checkbox" name="videoDays[]"
                                                        {{ in_array('thursday', $videoDays) ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                            Thursday
                                        </div>
                                        <div class="col-6">
                                            <input type="time" id="thursdayVideoFrom" name="videoFrom[]" required
                                                    {{ in_array('thursday', $videoDays)
                                                        ? 'value=' .
                                                            $videoAvailability->filter(function ($item) {
                                                                    return $item->day == 'thursday';
                                                                })->first()->from
                                                        : 'disabled' }}>
                                            <input type="time" id="thursdayVideoTo" name="videoTo[]" required
                                                    {{ in_array('thursday', $videoDays)
                                                        ? 'value=' .
                                                            $videoAvailability->filter(function ($item) {
                                                                    return $item->day == 'thursday';
                                                                })->first()->to
                                                        : 'disabled' }}>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch">

                                                <input id="friday" value="friday" class="video-day-checkbox" type="checkbox"
                                                       name="videoDays[]" {{ in_array('friday', $videoDays) ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                            Friday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="fridayVideoFrom" name="videoFrom[]" required
                                                    {{ in_array('friday', $videoDays)
                                                        ? 'value=' .
                                                            $videoAvailability->filter(function ($item) {
                                                                    return $item->day == 'friday';
                                                                })->first()->from
                                                        : 'disabled' }}>
                                            <input type="time" id="fridayVideoTo" name="videoTo[]" required
                                                    {{ in_array('friday', $videoDays)
                                                        ? 'value=' .
                                                            $videoAvailability->filter(function ($item) {
                                                                    return $item->day == 'friday';
                                                                })->first()->to
                                                        : 'disabled' }}>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">

                                            <label class="switch">

                                                <input id="saturday" value="saturday" class="video-day-checkbox"
                                                       type="checkbox" name="videoDays[]"
                                                        {{ in_array('saturday', $videoDays) ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                            Saturday
                                        </div>
                                        <div class="col-6">

                                            <input type="time" id="saturdayVideoFrom" name="videoFrom[]" required
                                                    {{ in_array('saturday', $videoDays)
                                                        ? 'value=' .
                                                            $videoAvailability->filter(function ($item) {
                                                                    return $item->day == 'saturday';
                                                                })->first()->from
                                                        : 'disabled' }}>
                                            <input type="time" id="saturdayVideoTo" name="videoTo[]" required
                                                    {{ in_array('saturday', $videoDays)
                                                        ? 'value=' .
                                                            $videoAvailability->filter(function ($item) {
                                                                    return $item->day == 'saturday';
                                                                })->first()->to
                                                        : 'disabled' }}>
                                        </div>

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
    <script type="text/javascript">
        var checkBoxs = document.getElementsByClassName("video-day-checkbox")
        var i = checkBoxs.length;
        for (i = 0; i < checkBoxs.length; i++) {
            checkBoxs[i].addEventListener("click", function() {
                document.getElementById(this.id + 'VideoFrom').disabled = !this.checked;
                document.getElementById(this.id + 'VideoTo').disabled = !this.checked;

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
