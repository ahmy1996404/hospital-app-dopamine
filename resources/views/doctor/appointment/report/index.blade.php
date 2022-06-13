 @extends('user.user_master')
 @section('user')
     <div class="row">
         <div class="col-md-12">
             <div class="card card-info">
                 <div class="card-header">
                     <h3 class="card-title"> Patient Report &nbsp;
                     </h3>
                 </div>

                 <div class="card-body table-responsive">
                     <table class="table" id="data_table">
                         <thead class="thead-inverse">
                             <tr>
                                 <th>#</th>
                                 <th>diagnosis</th>
                                 <th>Doctor</th>
                                 <th>user</th>

                                 <th>created</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($data as $row)
                                 <tr>
                                     <td>{{ $row->id }}</td>

                                     <td>{{ $row->report->diagnosis }}</td>

                                     <td>{{ $row->doctor->user->name }}</td>
                                     <td>{{ $row->user->name }}</td>

                                     <td>{{ $row->created_at->diffForHumans() }}</td>
                                     <td>
                                         <div class="btn-group">

                                             <button type="button" class="btn btn-info dropdown-toggle"
                                                 data-toggle="dropdown">
                                                 <span class="fa fa-gear"></span>
                                                 <span class="sr-only">Toggle Dropdown</span>
                                             </button>
                                             <div class="dropdown-menu custom" role="menu">
                                                 <a class="dropdown-item"
                                                     href="{{ route('doctor.appointment.report.show', $row->report->id) }}"> <span
                                                         aria-hidden="true" class="fa fa-edit"
                                                         style="color: #f0ad4e;"></span> Show Report</a>
                                             </div>
                                         </div>
                                     </td>
                                 </tr>
                             @endforeach
                         </tbody>
                         <tfoot>
                             <tr>
                                  <th>#</th>
                                 <th>diagnosis</th>
                                 <th>Doctor</th>
                                 <th>user</th>
                                 <th>created</th>
                                 <th>Action</th>
                             </tr>
                         </tfoot>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 @endsection
