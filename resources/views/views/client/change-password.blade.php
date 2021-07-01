@extends('views.client.client')

@section('innercontent')

    <!-- Page Content -->
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">@lang('resrv.change_password')</h4>
            <div class="row">
                <div class="col-md-12 col-lg-12">

                    <!-- Change Password Form -->
                    <form>
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                        </div>
                    </form>
                    <!-- /Change Password Form -->

                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

@endsection
