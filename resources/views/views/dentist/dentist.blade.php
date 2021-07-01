<?php $page = 'doctor-dashboard/{code}'; ?>
@extends('views.layout.mainlayout')
@section('og_meta')
    <meta calss='ogimage' property="og:image"
        content="{{ url('/') . '/uploads/' . Auth::guard('dentist')->user()->card }}">
    <meta calss='ogimage' property="og:url" content="{{ url('/') . '/uploads/' . Auth::guard('dentist')->user()->card }}">
    <meta property="og:title" content="{{ Auth::guard('dentist')->user()->name }}">
    <meta calss='ogimage' name="twitter:card"
        content="{{ url('/') . '/uploads/' . Auth::guard('dentist')->user()->card }}">
@endsection
@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Profile Sidebar -->
                    <div class="profile-sidebar">
                        <div class="widget-profile pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="#" class="booking-doc-img">
                                    <img src="{{ url('') . '/images/' . Auth::guard('dentist')->user()->profile_photo }}" alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3>{{ Auth::guard('dentist')->user()->name }}</h3>
                                    <div class="patient-details">
                                        <h5>الكود: {{ Auth::guard('dentist')->user()->code }}</h5>
                                        <h5><i class="fas fa-at"></i> {{ Auth::guard('dentist')->user()->email }}</h5>
                                        <h5 class="mb-0"><i class="fas fa-mobile-alt"></i>
                                            {{ Auth::guard('dentist')->user()->mobile }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-widget">
                            <nav class="dashboard-menu">
                                <ul>
                                    <li
                                        class="{{ Route::is(['dentistDashboard', 'upcommingReservation', 'prevReservationD', 'upcommingAcceptedReservation', 'Ddeatils']) ? 'active' : '' }}">
                                        <a href="{{ route('dentistDashboard') }}">
                                            <i class="fas fa-columns"></i>
                                            <span>@lang('resrv.dashboard')</span>
                                        </a>
                                    </li>
                                    <li class="{{ Route::is(['showCalanderForm', 'editcalander']) ? 'active' : '' }}">
                                        <a href="{{ route('showCalanderForm') }}">
                                            <i class="fas fa-calendar-check"></i>
                                            <span>@lang('mesg.calander')</span>
                                        </a>
                                    </li>
                                    <li class="{{ Route::is('vendorProfile') ? 'active' : '' }}">
                                        <a href="{{ route('vendorProfile') }}">
                                            <i class="fas fa-user-cog"></i>
                                            <span>@lang('login.accountEdit')</span>
                                        </a>
                                    </li>
                                    <li class="{{ Route::is('changeDentistPassword') ? 'active' : '' }}">
                                        <a href="{{ route('changeDentistPassword') }}">
                                            <i class="fas fa-lock"></i>
                                            <span>@lang('resrv.change_password')</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('Dlogout') }}">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <span>@lang('resrv.logout')</span>
                                        </a>
                                    </li>


                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- /Profile Sidebar -->

                </div>

                <div class="col-md-7 col-lg-8 col-xl-9">

                    @yield('innercontent')
                </div>

            </div>
        </div>

    </div>

    </div>
    <!-- /Page Content -->
    </div>
@endsection
