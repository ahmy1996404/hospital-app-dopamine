@extends('patient.profile.dashboard')
@section('title', 'Change Password')
@section('bannerTitle', 'Change Password')

@section('dashboardContent')
    <div class="tab-content my-account-tab" id="pills-tabContent">

        <div class="tab-pane fade active show" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">
            <div class="product-details">
                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    <div class="container">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="my-account-details account-wrapper">
                                    <h4 class="account-title mt-3">Change Password</h4>

                                    <div class="account-details">
                                        <div class="row mt-5 mb-3">
                                            <input type="hidden" name="form_type" value="create_customer"><input
                                                type="hidden" name="utf8" value="✓">



                                            <div class="form-group row mb-3">
                                                <label for="FirstName" class="col-lg-5 col-md-5 col-form-label">Current
                                                    Password</label>
                                                <div class="col-lg-7 col-md-7">

                                                    <input id="current_password" type="password" name='oldpassword'
                                                        class="form-control">

                                                    @error('oldpassword')
                                                        <span class="error">{{ $message }}</span>
                                                    @enderror


                                                </div>
                                            </div>



                                            <div class="form-group row mb-3">
                                                <label for="Email" class="col-lg-5 col-md-5 col-form-label">New
                                                    Password</label>
                                                <div class="col-lg-7 col-md-7">
                                                    <input id="password" type="password" name="password"
                                                        class="form-control">


                                                    @error('password')
                                                        <span class="error">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label for="Email" class="col-lg-5 col-md-5 col-form-label">
                                                    Confirm Password</label>
                                                <div class="col-lg-7 col-md-7">
                                                    <input id="password_confirmation" type="password"
                                                        name="password_confirmation" class="form-control">



                                                    @error('password_confirmation')
                                                        <span class="error">{{ $message }}</span>
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

@endsection
