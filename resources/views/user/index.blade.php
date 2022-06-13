 @extends('user.user_master')
 @section('user')
     <div class="middle_content_wrapper">
         <!-- counter_area -->
         <section class="counter_area">
             <div class="row">
                 <div class="col-lg-3 col-sm-6">
                     <div class="counter">
                         <div class="counter_item">
                             <span><i class="fas fa-users"></i></span>
                             <h2 class="timer count-number" data-to="{{ $totalAppointmants }}" data-speed="500"></h2>
                         </div>

                         <p class="count-text ">Total Appointment</p>
                     </div>
                 </div>
                 <div class="col-lg-3 col-sm-6">
                     <div class="counter">
                         <div class="counter_item">
                             <span><i class="fas fa-user-check"></i></span>
                             <h2 class="timer count-number" data-to="{{ $completedAppointmants }}" data-speed="500"></h2>
                         </div>
                         <p class="count-text ">Completed Appointment</p>
                     </div>
                 </div>
                 <div class="col-lg-3 col-sm-6">
                     <div class="counter">
                         <div class="counter_item">
                             <span><i class="fas fa-circle"></i></span>
                             <h2 class="timer count-number" data-to="{{ $pendingAppointmants }}" data-speed="500"></h2>
                         </div>
                         <p class="count-text ">Pending Appointment</p>

                     </div>
                 </div>
                 <div class="col-lg-3 col-sm-6">
                     <div class="counter">
                         <div class="counter_item">
                             <span><i class="fas fa-user-alt-slash"></i></span>
                             <h2 class="timer count-number" data-to="{{ $canceledAppointmants }}" data-speed="500"></h2>
                         </div>
                         <p class="count-text ">Cancelled Appointment</p>
                     </div>
                 </div>
             </div>
         </section>
         <!--/ counter_area -->
         <!-- table area -->
         <section class="table_area">
             <div class="panel">
                 <div class="panel_header">
                     <div class="panel_title"><span>Last Appointments</span></div>
                 </div>
                 <div class="panel_body">
                     <div class="table-responsive">
                         <table class="table" id="data_table">
                             <thead class="thead-inverse">
                                 <tr>
                                     <th>#</th>
                                     <th>doctor name</th>
                                     <th>user name</th>
                                     <th>date</th>
                                     <th>status</th>
                                     <th>created</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($data as $row)
                                     <tr>
                                         <td>{{ $row->id }}</td>

                                         <td>{{ $row->doctor->user->name }}</td>
                                         <td>{{ $row->user->name }}</td>
                                         <td>{{ $row->date }}</td>
                                         <td>{{ $row->status }}</td>
                                         <td>{{ $row->created_at->diffForHumans() }}</td>
                                         <td>
                                             <div class="btn-group">

                                                 <button type="button" class="btn btn-info dropdown-toggle"
                                                     data-toggle="dropdown">
                                                     <span class="fa fa-gear"></span>
                                                     <span class="sr-only">Toggle Dropdown</span>
                                                 </button>
                                                 <div class="dropdown-menu custom" role="menu">
                                                     @if ($row->status == 'pending')
                                                         <a class="dropdown-item"
                                                             href="{{ route('doctor.appointment.status', ['id' => $row->id, 'status' => 'confirmed']) }}">
                                                             <span aria-hidden="true" class="fa fa-edit"
                                                                 style="color: #f0ad4e;"></span> Confirm</a>
                                                     @endif
                                                     @if ($row->status == 'confirmed')
                                                         <a class="dropdown-item"
                                                             href="{{ route('doctor.appointment.status', ['id' => $row->id, 'status' => 'completed']) }}">
                                                             <span aria-hidden="true" class="fa fa-edit"
                                                                 style="color: #f0ad4e;"></span> Completed</a>
                                                     @endif

                                                     @if ($row->status != 'completed' && $row->status != 'rejected')
                                                         <a class="dropdown-item"
                                                             href={{ route('doctor.appointment.status', ['id' => $row->id, 'status' => 'rejected']) }}>
                                                             <span aria-hidden="true" class="fa fa-edit"
                                                                 style="color: #f0ad4e;"></span> Reject</a>
                                                     @endif
                                                     @if ($row->status == 'completed' && !$row->report)
                                                         <a class="dropdown-item"
                                                             href="{{ route('doctor.appointment.report.create', ['id' => $row->id]) }}">
                                                             <span aria-hidden="true" class="fa fa-edit"
                                                                 style="color: #f0ad4e;"></span> Add Report</a>
                                                     @endif

                                                 </div>
                                             </div>

                                         </td>
                                     </tr>
                                 @endforeach
                             </tbody>
                             <tfoot>
                                 <tr>
                                     <th>#</th>
                                     <th>doctor name</th>
                                     <th>user name</th>
                                     <th>date</th>
                                     <th>status</th>
                                     <th>created</th>
                                     <th>Action</th>
                                 </tr>
                             </tfoot>
                         </table>
                     </div>
                 </div>
             </div> <!-- /table -->
             <!-- chart area -->
              
         </section>
     </div>
 @endsection
