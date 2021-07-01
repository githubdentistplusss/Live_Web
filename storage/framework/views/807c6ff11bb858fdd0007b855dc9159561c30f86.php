<?php $page = 'patient-dashboard'; ?>

<?php $__env->startSection('content'); ?>

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
                                    <img src="<?php echo e(url('assets/assets/img/patients/patient.jpg')); ?>" alt="User Image">
                                </a>
                                -->
                                <div class="profile-det-info">
                                    <h3><?php echo e(Auth::guard('client')->user()->name); ?></h3>
                                    <div class="patient-details">
                                        <h5><i class="fas fa-at"></i> <?php echo e(Auth::guard('client')->user()->email); ?></h5>
                                        <h5 class="mb-0"><i class="fas fa-mobile-alt"></i>
                                            <?php echo e(Auth::guard('client')->user()->mobile); ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-widget">
                            <nav class="dashboard-menu">
                                <ul>
                                    <li
                                        class="<?php echo e(Route::is(['clientDashboard', 'UAReservation', 'bookedoffers', 'prevReservation']) ? 'active' : ''); ?>">
                                        <a href="<?php echo e(route('clientDashboard')); ?>">
                                            <i class="fas fa-columns"></i>
                                            <span><?php echo app('translator')->getFromJson('resrv.dashboard'); ?></span>
                                        </a>
                                    </li>
                                    <li class="<?php echo e(Route::is('profile') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(route('profile')); ?>">
                                            <i class="fas fa-user-cog"></i>
                                            <span><?php echo app('translator')->getFromJson('login.accountEdit'); ?></span>
                                        </a>
                                    </li>
                                    <li class="<?php echo e(Route::is('changeClientPassword') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(route('changeClientPassword')); ?>">
                                            <i class="fas fa-lock"></i>
                                            <span><?php echo app('translator')->getFromJson('resrv.change_password'); ?></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('Clogout')); ?>">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <span><?php echo app('translator')->getFromJson('resrv.logout'); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
                <!-- / Profile Sidebar -->

                <div class="col-md-7 col-lg-8 col-xl-9">
                    <?php echo $__env->yieldContent('innercontent'); ?>

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('views.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/client/client.blade.php ENDPATH**/ ?>