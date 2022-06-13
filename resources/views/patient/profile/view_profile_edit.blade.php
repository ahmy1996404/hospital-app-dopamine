@extends('patient.profile.dashboard')
@section('title','Edit Profile')
@section('bannerTitle','Edit Profile')

@section('dashboardContent')
    <div class="tab-content my-account-tab" id="pills-tabContent">

        <div class="tab-pane fade active show" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">
            <div class="product-details">
                <form method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg"
                                            name="profile_photo_path" />
                                        <label for="imageUpload"><i class="fas fa-pen"></i></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview"
                                            style="background-image: url({{ !empty($editData->profile_photo_path) ? url('upload/user_images/' . $editData->profile_photo_path) : url('upload/noimagejpg.jpg') }});">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="my-account-details account-wrapper">
                                    <h4 class="account-title mt-3">Edit Account</h4>

                                    <div class="account-details">
                                        <div class="row mt-5 mb-3">
                                            <input type="hidden" name="form_type" value="create_customer"><input
                                                type="hidden" name="utf8" value="✓">

                                            

                                            <div class="form-group row mb-3">
                                                <label for="FirstName" class="col-lg-5 col-md-5 col-form-label">User
                                                    name</label>
                                                <div class="col-lg-7 col-md-7">

                                                    <input type="text" name='name' class="form-control"
                                                        value="{{ $editData->name }}">
                                                    @error('name')
                                                        <span class="error">{{$message}}</span>
                                                    @enderror
                                                    

                                                </div>
                                            </div>



                                            <div class="form-group row mb-3">
                                                <label for="Email" class="col-lg-5 col-md-5 col-form-label">Email</label>
                                                <div class="col-lg-7 col-md-7">
                                                    <input type="email" name="email" class="form-control"
                                                        value="{{ $editData->email }}">

                                                    @error('email')
                                                        <span class="error">{{$message}}</span>
                                                    @enderror

                                                </div>
                                            </div>




                                            <div class="col-md-6 mt-5">
                                                <div class="form-box__single-group">
                                                    <button type="submit"
                                                        class="btn btn--box btn--radius btn--small btn--black btn--black-hover-green btn--uppercase font--bold">
                                                        Save Changes</button>
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result)
                }
                reader.readAsDataURL(e.target.files['0'])
            })
        })
    </script>
@endsection
