@extends('patient.profile.dashboard')
@section('title', 'My Appointments')
@section('bannerTitle', 'My Appointments')

@section('dashboardContent')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">


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
    
        $("#del_btn").on("click", function () {
            var id = $(this).data("submit");
            $("#form_" + id).submit();
        });

      
        function openModal(id){
            $('#myModal').modal();

            $("#del_btn").attr("data-submit", id);

        }   
    </script>
@endsection
