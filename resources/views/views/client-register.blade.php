<?php $page = 'register'; ?>
@extends('views.layout.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="content" style="min-height:200px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 offset-md-2">

                    <!-- Account Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">

                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3>@lang('login.register')</h3>
                                </div>
                                @if (Session::has('message'))
                                    <div class="alert alert-success col-md-12">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        {!! Session::get('message') !!}
                                    </div>
                                @elseif(Session::has('error_message'))
                                    <div class="alert alert-danger col-md-12">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        <strong style="color: #000;">{!! Session::get('error_message') !!}</strong>
                                    </div>
                                @endif
                                <!-- Register Form -->
                                <form method="POST" action="{{ route('clientRegister') }}">
                                    @csrf

                                    <div class="form-group card-label">
                                        <label>@lang('login.name')</label>
                                        <input class="form-control loginInput @error('name') is-invalid @enderror"
                                            type="text" name="name" value="{{ old('name') }}" required="">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                   
                                    <div class="form-group card-label">
                                        <label>@lang('login.mobile')</label>
                                        <input class="form-control loginInput  @error('mobile') is-invalid @enderror"
                                            type="text" name="mobile" value="{{ old('mobile') }}" required="">

                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group card-label">
                                        <label>@lang('login.password')</label>
                                        <input required class="form-control loginInput @error('password') is-invalid @enderror"
                                            type="password" name="password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group card-label">
                                        <label>@lang('login.re_pass')</label>
                                        <input required class="form-control loginInput" type="password" name="password_confirmation">
                                    </div>
                                  

                                    <div class="form-group">
                                        <div class="form-check-inline">
                                            <div class="terms-accept">
                                                <div class="custom-checkbox">
                                                    <input class="form-check-input" required type="checkbox" value="">
                                                    <label for="terms_accept"><a
                                                            href="{{ route('terms') }}">@lang('login.privacy')</a></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">
                                        @lang('login.register')</button>
                                    <div class="text-right pt-2">
                                        <a class="forgot-link" href="{{ route('clientlogin') }}">
                                            @lang('login.hasAccount')</a>
                                    </div>
                                    {{-- <div class="login-or">
												<span class="or-line"></span>
												<span class="span-or">or</span>
											</div>
											<div class="row form-row social-login">
												<div class="col-6">
													<a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
												</div>
												<div class="col-6">
													<a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
												</div>
											</div> --}}
                                </form>
                                <!-- /Register Form -->

                            </div>
                        </div>
                    </div>
                    <!-- /Account Content -->

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
    </div>
@endsection
