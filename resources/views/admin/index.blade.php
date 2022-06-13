@extends('admin.admin_master')
@section('admin')
    <div class="sl-pagebody">

        <div class="row row-sm">
            <div class="col-sm-6 col-xl-3"  >
                <div class="card pd-20 bg-primary">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Patients</h6>
                        <a href="{{ route('admin.patient.index') }}" class="tx-white-8 hover-white"><i class="fas fa-eye"></i></a>
                    </div><!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <i style="font-size: 30px; color:white" class="fa-solid fa-hospital-user"></i>
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ $totalPatient }}</h3>
                    </div><!-- card-body -->

                </div><!-- card -->
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                <div class="card pd-20 bg-info">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Doctors</h6>
                        <a  href="{{ route('admin.doctor.index') }}"  class="tx-white-8 hover-white"><i class="fas fa-eye"></i></a>
                    </div><!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <i style="font-size: 30px; color:white" class="fa-solid fa-user-doctor"></i>

                        <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ $totalDoctors }}</h3>
                    </div><!-- card-body -->

                </div><!-- card -->
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="card pd-20 bg-purple">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Appointment</h6>
                        <a href="{{ route('admin.appointment.index') }}" class="tx-white-8 hover-white"><i class="fas fa-eye"></i></a>
                    </div><!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <i style="font-size: 30px; color:white" class="fa-solid fa-calendar-check"></i>

                        <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ $totalAppointmants }}</h3>
                    </div><!-- card-body -->

                </div><!-- card -->
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="card pd-20 bg-sl-primary">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Speciality</h6>
                        <a href="{{ route('admin.speciality.index') }}" class="tx-white-8 hover-white"><i class="fas fa-eye"></i></a>
                    </div><!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <i style="font-size: 30px; color:white" class="fa-solid fa-circle-h"></i>

                        <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ $totalSpeciality }}</h3>
                    </div><!-- card-body -->

                </div><!-- card -->
            </div><!-- col-3 -->
        </div><!-- row -->

         <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"> Last Appointments &nbsp;
                    </h3>
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="card-body table-responsive">
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
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.appointment.edit', $row->id) }}"> <span
                                                        aria-hidden="true" class="fa fa-edit"
                                                        style="color: #f0ad4e;"></span> Edit</a>



                                                <a class="dropdown-item" onclick="openModal({{ $row->id }})"><span
                                                        aria-hidden="true" class="fa fa-trash"
                                                        style="color: #dd4b39"></span>delete</a>



                                            </div>
                                        </div>
                                        {!! Form::open(['url' => route('admin.appointment.destroy', $row->id), 'method' => 'DELETE', 'class' => 'form-horizontal', 'id' => 'form_' . $row->id]) !!}

                                        {!! Form::hidden('id', $row->id) !!}

                                        {!! Form::close() !!}
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
        </div>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure ?</p>
                </div>
                <div class="modal-footer">
                    <button id="del_btn" class="btn btn-danger" type="button" data-submit="">Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
        $("#del_btn").on("click", function() {
            var id = $(this).data("submit");
            $("#form_" + id).submit();
        });


        function openModal(id) {
            $('#myModal').modal();

            $("#del_btn").attr("data-submit", id);

        }
    </script>
    </div>
@endsection
