<?php $page = 'doctor-dashboard/{code}'; ?>

<?php $__env->startSection('og_meta'); ?>
    <meta calss='ogimage' property="og:image"
        content="<?php echo e(url('/') . '/uploads/' . Auth::guard('dentist')->user()->card); ?>">
    <meta calss='ogimage' property="og:url" content="<?php echo e(url('/') . '/uploads/' . Auth::guard('dentist')->user()->card); ?>">
    <meta property="og:title" content="<?php echo e(Auth::guard('dentist')->user()->name); ?>">
    <meta calss='ogimage' name="twitter:card"
        content="<?php echo e(url('/') . '/uploads/' . Auth::guard('dentist')->user()->card); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
                                    <img src="<?php echo e(url('') . '/images/' . Auth::guard('dentist')->user()->profile_photo); ?>" alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3><?php echo e(Auth::guard('dentist')->user()->name); ?></h3>
                                    <div class="patient-details">
                                        <h5>الكود: <?php echo e(Auth::guard('dentist')->user()->code); ?></h5>
                                        <h5><i class="fas fa-at"></i> <?php echo e(Auth::guard('dentist')->user()->email); ?></h5>
                                        <h5 class="mb-0"><i class="fas fa-mobile-alt"></i>
                                            <?php echo e(Auth::guard('dentist')->user()->mobile); ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-widget">
                            <nav class="dashboard-menu">
                                <ul>
                                    <li
                                        class="<?php echo e(Route::is(['dentistDashboard', 'upcommingReservation', 'prevReservationD', 'upcommingAcceptedReservation', 'Ddeatils']) ? 'active' : ''); ?>">
                                        <a href="<?php echo e(route('dentistDashboard')); ?>">
                                            <i class="fas fa-columns"></i>
                                            <span><?php echo app('translator')->getFromJson('resrv.dashboard'); ?></span>
                                        </a>
                                    </li>
                                    <li class="<?php echo e(Route::is(['showCalanderForm', 'editcalander']) ? 'active' : ''); ?>">
                                        <a href="<?php echo e(route('showCalanderForm')); ?>">
                                            <i class="fas fa-calendar-check"></i>
                                            <span><?php echo app('translator')->getFromJson('mesg.calander'); ?></span>
                                        </a>
                                    </li>
                                    <li class="<?php echo e(Route::is('vendorProfile') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(route('vendorProfile')); ?>">
                                            <i class="fas fa-user-cog"></i>
                                            <span><?php echo app('translator')->getFromJson('login.accountEdit'); ?></span>
                                        </a>
                                    </li>
                                    <li class="<?php echo e(Route::is('changeDentistPassword') ? 'active' : ''); ?>">
                                        <a href="<?php echo e(route('changeDentistPassword')); ?>">
                                            <i class="fas fa-lock"></i>
                                            <span><?php echo app('translator')->getFromJson('resrv.change_password'); ?></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('Dlogout')); ?>">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <span><?php echo app('translator')->getFromJson('resrv.logout'); ?></span>
                                        </a>
                                    </li>


                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- /Profile Sidebar -->

                </div>

                <div class="col-md-7 col-lg-8 col-xl-9">

                    <?php echo $__env->yieldContent('innercontent'); ?>
                </div>

            </div>
        </div>

    </div>

    </div>
    <!-- /Page Content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('views.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/dentist/dentist.blade.php ENDPATH**/ ?>