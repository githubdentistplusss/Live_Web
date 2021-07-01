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
                            <img src="assets/assets/img/login-banner.png" class="img-fluid" alt="Dentist Pluss Login">
                        </div>
                        <div class="col-md-12 col-lg-6 login-right p-4">
                            <div class="p-5">
                                <div class="login-header">
                                    <h3>@lang('login.clinicLogin')</h3>
                                </div>
                                @if(Session::has('message'))

                                <div class="alert alert-success col-md-12">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {!!Session::get('message')!!}
                                </div>
                                @elseif(Session::has('error_message'))
                                <div class="alert alert-danger col-md-12">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong style="color: #FFFFFF;">{!!Session::get('error_message')!!}</strong>
                                </div>
                                @endif
                                @if(isset($loginerror))
                                <div class="alert alert-danger">
                                    <strong style="color: red;">{{$loginerror}}</strong>
                                </div>
                                @endif
                                <form method="POST" action="{{ route('clientlogin') }}">
                                    @csrf
                                    <div class="form-group form-focus">
                                        <input id="mobile" type="text" class="form-control floating @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>
                                        <label class="focus-label">@lang('login.mobile')</label>
                                        @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-focus">
                                        <input id="password" type="password" class="form-control floating @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <label class="focus-label">@lang('login.password')</label>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="text-right">
                                        @if (Route::has('password.request'))
                                        <a class="forgot-link" href="{{ route('uForgetPassword') }}">
                                            @lang('login.forget')
                                        </a>
                                        @endif

                                    </div>
                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
                                    <div class="login-or">
                                        <span class="or-line"></span>
                                        <span class="span-or">or</span>
                                    </div>
                                    <div class="text-center dont-have">
                                        <a class="loginA" href="{{ route('clinicRegister') }}"> @lang('login.register_title') </a>
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
