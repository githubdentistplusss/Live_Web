@extends('views.layout.mainlayout')
@section('content')
    <main class="content p-0">
        <!-- Page Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 center">
                    <!-- Login Tab Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="assets/assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">
                            </div>
                            <div class="col-md-12 col-lg-6 login-right p-4">
                                <div class="p-5">
                                    <div class="login-header">
                                        <h3>Forget Password</h3>
                                    </div>

                                    @if (isset($loginerror))
                                        <div class="alert alert-danger">
                                            <strong style="color: red;">{{ $loginerror }}</strong>
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('dForgetPasswordAction') }}">
                                        @csrf
                                        <div class="form-group form-focus">
                                            <input id="mobile" type="text"
                                                class="form-control floating @error('mobile') is-invalid @enderror"
                                                name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile"
                                                autofocus>
                                            <label class="focus-label">@lang('login.mobile')</label>
                                            @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">

                                            <button type="submit" class="btn btn-primary btn-block btn-lg login-btn">
                                                @lang('home.send')
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Login Tab Content -->
                </div>
            </div>

        </div>
        <!-- /Page Content -->
    </main>
@endsection
