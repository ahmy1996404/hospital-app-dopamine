 @extends('user.user_master')
 @section('user')
     <div class="row">
         <div class="col-md-12">
             <div class="card card-success">
                 <div class="card-header">
                     <h3 class="card-title">{{ 'Create' }}</h3>
                 </div>

                 <div class="card-body">

                     {!! Form::open(['route' => 'doctor.appointment.report.store', 'files' => true, 'method' => 'post']) !!}

                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <input type="text" name="appointment_id"
                                     class="form-control   @error('appointment_id') is-invalid @enderror" id="appointment_id"
                                     value="{{ $appointment->id }}" hidden>
                                 @error('appointment_id')
                                     <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                 @enderror

                             </div>

                             <div class="form-group">
                                 {!! Form::label('diagnosis', 'Diagnosis', ['class' => 'form-label']) !!}
                                 <input type="text" name="diagnosis"
                                     class="form-control   @error('diagnosis') is-invalid @enderror" id="diagnosis"
                                     value="{{ old('diagnosis') }}">
                                 @error('diagnosis')
                                     <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                 @enderror
                             </div>

                             <div class="form-group">
                                 {!! Form::label('report_details', 'Report details', ['class' => 'form-label']) !!}
                                 <textarea  name="report_details"
                                     class="form-control   @error('report_details') is-invalid @enderror" id="report_details">
                                     {{ old('report_details') }}
                                 </textarea>
                                 @error('report_details')
                                     <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                 @enderror
                             </div>
                         </div>

                     </div>

                     <div class="col-md-12">
                         {!! Form::submit('Create', ['class' => 'btn btn-success']) !!}
                     </div>
                     {!! Form::close() !!}
                 </div>
             </div>
         </div>
     </div>
 @endsection
