@extends('admin.admin_master')
@section('admin')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"> Speciality &nbsp;
                        <a href="{{ route('admin.speciality.create') }}" class="btn btn-success">Create Speciality</a>
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
                                <th>name</th>
                                <th>created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>

                                    <td>{{ $row->name }}</td>

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
                                                    href="{{ route('admin.speciality.edit', $row->id) }}"> <span
                                                        aria-hidden="true" class="fa fa-edit"
                                                        style="color: #f0ad4e;"></span> Edit</a>



                                                <a class="dropdown-item" onclick="openModal({{ $row->id }})"><span
                                                        aria-hidden="true" class="fa fa-trash"
                                                        style="color: #dd4b39"></span>delete</a>



                                            </div>
                                        </div>
                                        {!! Form::open(['url' => route('admin.speciality.destroy', $row->id), 'method' => 'DELETE', 'class' => 'form-horizontal', 'id' => 'form_' . $row->id]) !!}

                                        {!! Form::hidden('id', $row->id) !!}

                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>name</th>
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
@endsection
