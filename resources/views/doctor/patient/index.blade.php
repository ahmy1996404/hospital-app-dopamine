@extends('user.user_master')
@section('user')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"> Patients &nbsp;
                    </h3>
                </div>

                <div class="card-body table-responsive">
                    <table class="table" id="data_table">
                        <thead class="thead-inverse">
                            <tr>
                                <th>#</th>
                                <th>photo</th>
                                <th>name</th>
                                <th>email</th>
                                <th>created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>
                                        @if ($row->profile_photo_path != null)
                                            <img src="{{ asset('/upload/user_images/' . $row->profile_photo_path) }}"
                                                height="70px" width="70px">
                                        @else
                                            <img src="{{ asset('upload/noimagejpg.jpg') }}" height="70px" width="70px">
                                        @endif
                                    </td>
                                    <td>{{ $row->name }}</td>

                                    <td>{{ $row->email }}</td>
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
                                                    href="{{ route('doctor.appointment.report.index', $row->id) }}"> <span
                                                        aria-hidden="true" class="fa fa-edit"
                                                        style="color: #f0ad4e;"></span> View Reports</a>
                                            </div>
                                        </div>
                                        {!! Form::open(['url' => route('admin.patient.destroy', $row->id), 'method' => 'DELETE', 'class' => 'form-horizontal', 'id' => 'form_' . $row->id]) !!}

                                        {!! Form::hidden('id', $row->id) !!}

                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>photo</th>
                                <th>name</th>
                                <th>email</th>
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
