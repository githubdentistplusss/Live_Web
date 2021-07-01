<?php $page = 'patient-dashboard'; ?>
@extends('views.layout.mainlayout')
@section('content')

    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <!-- Profile Sidebar -->
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                    <div class="profile-sidebar">
                        <div class="widget-profile pro-widget-content">
                            <div class="profile-info-widget">
                                <!--
                                <a href="#" class="booking-doc-img">
                                    <img src="{{ url('assets/assets/img/patients/patient.jpg') }}" alt="User Image">
                                </a>
                                -->
                                <div class="profile-det-info">
                                    <h3>{{ Auth::guard('client')->user()->name }}</h3>
                                    <div class="patient-details">
                                        <h5><i class="fas fa-at"></i> {{ Auth::guard('client')->user()->email }}</h5>
                                        <h5 class="mb-0"><i class="fas fa-mobile-alt"></i>
                                            {{ Auth::guard('client')->user()->mobile }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-widget">
                            <nav class="dashboard-menu">
                                <ul>
                                    <li
                                        class="{{ Route::is(['clientDashboard', 'UAReservation', 'bookedoffers', 'prevReservation']) ? 'active' : '' }}">
                                        <a href="{{ route('clientDashboard') }}">
                                            <i class="fas fa-columns"></i>
                                            <span>@lang('resrv.dashboard')</span>
                                        </a>
                                    </li>
                                    <li class="{{ Route::is('profile') ? 'active' : '' }}">
                                        <a href="{{ route('profile') }}">
                                            <i class="fas fa-user-cog"></i>
                                            <span>@lang('login.accountEdit')</span>
                                        </a>
                                    </li>
                                    <li class="{{ Route::is('changeClientPassword') ? 'active' : '' }}">
                                        <a href="{{ route('changeClientPassword') }}">
                                            <i class="fas fa-lock"></i>
                                            <span>@lang('resrv.change_password')</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('Clogout') }}">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <span>@lang('resrv.logout')</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
                <!-- / Profile Sidebar -->

                <div class="col-md-7 col-lg-8 col-xl-9">
                    @yield('innercontent')

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
    </div>

@endsection

@section('script')
    <script type='text/javascript'>
        (function() {
            'use strict';

            function remoteModal(idModal) {
                var vm = this;
                vm.modal = $(idModal);

                if (vm.modal.length == 0) {
                    return false;
                }

                if (window.location.hash == idModal) {
                    openModal();
                }

                var services = {
                    open: openModal,
                    close: closeModal
                };

                return services;
                ///////////////

                // method to open modal
                function openModal() {
                    vm.modal.modal('show');
                }

                // method to close modal
                function closeModal() {
                    vm.modal.modal('hide');
                }
            }
            Window.prototype.remoteModal = remoteModal;
        })();

        $(function() {
            window.remoteModal('#flollowerModal');
        });

    </script>

@endsection
