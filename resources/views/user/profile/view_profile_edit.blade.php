@extends('user.user_master')
 @section('user')
 <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- :::::::::: Start My Account Section :::::::::: -->
                    <div class="my-account-area">
                        <div class="row">
                            <div class="col-xl-3 col-md-4">
                                <div class="my-account-menu">
                                    <ul class="nav account-menu-list flex-column nav-pills" id="pills-tab" role="tablist">
                                        <li>
                                            <a class="active link--icon-left" id="pills-dashboard-tab" data-toggle="pill" href="#pills-dashboard" role="tab" aria-controls="pills-dashboard" aria-selected="true"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                                        </li>
                                        <li>
                                            <a id="pills-order-tab" class="link--icon-left" data-toggle="pill" href="#pills-order" role="tab" aria-controls="pills-order" aria-selected="false"><i class="fas fa-shopping-cart"></i> Order</a>
                                        </li>
                                        <li>
                                            <a id="pills-download-tab" class="link--icon-left" data-toggle="pill" href="#pills-download" role="tab" aria-controls="pills-download" aria-selected="false"><i class="fas fa-cloud-download-alt"></i> Download</a>
                                        </li>
                                        <li>
                                            <a id="pills-payment-tab" class="link--icon-left" data-toggle="pill" href="#pills-payment" role="tab" aria-controls="pills-payment" aria-selected="false"><i class="fas fa-credit-card"></i> Payment Method</a>
                                        </li>
                                        <li>
                                            <a id="pills-address-tab" class="link--icon-left" data-toggle="pill" href="#pills-address" role="tab" aria-controls="pills-address" aria-selected="false"><i class="fas fa-map-marker-alt"></i> Address</a>
                                        </li>
                                        <li>
                                            <a id="pills-account-tab" class="link--icon-left" data-toggle="pill" href="#pills-account" role="tab" aria-controls="pills-account" aria-selected="false"><i class="fas fa-user"></i>
                                                Account Details</a>
                                        </li>
                                        <li>
                                            <a class="link--icon-left" href="login.html"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-8 col-md-8">
                                <div class="tab-content my-account-tab" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel" aria-labelledby="pills-dashboard-tab">
                                        <div class="my-account-dashboard account-wrapper">
                                            <h4 class="account-title">Dashboard</h4>
                                            <div class="welcome-dashboard m-t-30">
                                                <p>Hello, <strong>Alex Tuntuni</strong> (If Not <strong>Tuntuni !</strong> <a href="#">Logout</a> )</p>
                                            </div>
                                            <p class="m-t-25">From your account dashboard. you can easily check &amp; view your
                                                recent orders, manage your shipping and billing addresses and edit your password and
                                                account details.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-order" role="tabpanel" aria-labelledby="pills-order-tab">
                                        <div class="my-account-order account-wrapper">
                                            <h4 class="account-title">Orders</h4>
                                            <div class="account-table text-center m-t-30 table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="no">No</th>
                                                            <th class="name">Name</th>
                                                            <th class="date">Date</th>
                                                            <th class="status">Status</th>
                                                            <th class="total">Total</th>
                                                            <th class="action">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Mostarizing Oil</td>
                                                            <td>Aug 22, 2020</td>
                                                            <td>Pending</td>
                                                            <td>$100</td>
                                                            <td><a href="#">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Katopeno Altuni</td>
                                                            <td>July 22, 2020</td>
                                                            <td>Approved</td>
                                                            <td>$45</td>
                                                            <td><a href="#">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Murikhete Paris</td>
                                                            <td>June 22, 2020</td>
                                                            <td>On Hold</td>
                                                            <td>$99</td>
                                                            <td><a href="#">View</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-download" role="tabpanel" aria-labelledby="pills-download-tab">
                                        <div class="my-account-download account-wrapper">
                                            <h4 class="account-title">Download</h4>
                                            <div class="account-table text-center m-t-30 table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="name">Product</th>
                                                            <th class="date">Date</th>
                                                            <th class="status">Expire</th>
                                                            <th class="action">Download</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Mostarizing Oil</td>
                                                            <td>Aug 22, 2020</td>
                                                            <td>Yes</td>
                                                            <td><a href="#">Download File</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Katopeno Altuni</td>
                                                            <td>July 22, 2020</td>
                                                            <td>Never</td>
                                                            <td><a href="#">Download File</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-payment" role="tabpanel" aria-labelledby="pills-payment-tab">
                                        <div class="my-account-payment account-wrapper">
                                            <h4 class="account-title">Payment Method</h4>
                                            <p class="m-t-30">You Can't Saved Your Payment Method yet.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-address" role="tabpanel" aria-labelledby="pills-address-tab">
                                        <div class="my-account-address account-wrapper">
                                            <h4 class="account-title">Payment Method</h4>
                                            <div class="account-address m-t-30">
                                                <h6 class="name">Alex Tuntuni</h6>
                                                <p>1355 Market St, Suite 900 <br> San Francisco, CA 94103</p>
                                                <p>Mobile: (123) 456-7890</p>
                                                <a class="box-btn m-t-25 " href="#"><i class="far fa-edit"></i> Edit Address</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">
                                        <div class="my-account-details account-wrapper">
                                            <h4 class="account-title">Account Details</h4>

                                            <div class="account-details">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <input type="text" placeholder="First Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <input type="text" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <input type="text" placeholder="Display Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <input type="text" placeholder="Email address">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <h5 class="title">Password change</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <input type="password" placeholder="Current Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <input type="password" placeholder="New Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <input type="password" placeholder="Confirm Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <button class="btn btn--box btn--radius btn--small btn--black btn--black-hover-green btn--uppercase font--bold">Save Change</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- :::::::::: End My Account Section :::::::::: -->
                </div>
            </div>
        </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <div class="row" style="padding: 20px">
    <div class="col-md-6">

        <form method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data">
            @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">User name</label>
            <input type="text" name = 'name' class="form-control"  value="{{ $editData->name }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control"  value="{{ $editData->email }}">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Profile Image</label>
            <input class="form-control" name="profile_photo_path" type="file" id="image">
        </div>
          <div class="mb-3">
             <img id = "showImage" src="{{ (!empty($editData->profile_photo_path)) ? url('upload/user_images/'.$editData->profile_photo_path) : url('upload/noimagejpg.jpg') }}" class="card-img-top" alt="..." style="width: 100px;height:100px">

        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

</div>
<script>
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function (e){
                $('#showImage').attr('src',e.target.result )
            }
            reader.readAsDataURL(e.target.files['0'])
        })
    })
</script>
 @endsection
