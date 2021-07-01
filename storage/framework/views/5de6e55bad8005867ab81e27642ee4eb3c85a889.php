

<?php $__env->startSection('innercontent'); ?>
    <div class="card">
        <div class="card-body pt-0">
            <!-- Tab Menu -->
            <nav class="user-tabs mb-4">
                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('clientDashboard')); ?>"><?php echo app('translator')->getFromJson('resrv.follower'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo e(route('UAReservation')); ?>"><?php echo app('translator')->getFromJson('resrv.uADate'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('bookedoffers')); ?>"><span
                                class="med-records"><?php echo app('translator')->getFromJson('resrv.uDate'); ?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('prevReservation')); ?>"><?php echo app('translator')->getFromJson('resrv.pDate'); ?></a>
                    </li>
                </ul>
            </nav>
            <!-- /Tab Menu -->
            <!-- Tab Content -->
            <div class="tab-content pt-0">
                <!--upcomingDates section-->
                <div class="card card-table mb-4 pb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>رقم الموعد</th>
                                        <th><?php echo app('translator')->getFromJson('resrv.doctor'); ?></th>
                                        <th><?php echo app('translator')->getFromJson('resrv.appointment_date'); ?></th>
                                        <th><?php echo app('translator')->getFromJson('resrv.patient'); ?></th>
                                        <th><?php echo app('translator')->getFromJson('resrv.treatment'); ?></th>
                                        <th><?php echo app('translator')->getFromJson('resrv.satus'); ?></th>
                                        <th style=""><?php echo app('translator')->getFromJson('resrv.action'); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if(count($events) != 0): ?>
                                        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                            $day = date('d', strtotime($event->event_date));
                                            $month = date('M', strtotime($event->event_date));
                                            $dayName = date('l', strtotime($event->event_date));
                                            $am = date('A', strtotime($event->start_time));
                                            $start_time = date('g', strtotime($event->start_time));
                                            ?>
                                            <tr>
                                                 <td>
                                                     #<?php echo e($event->id); ?>

                                                     </td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="assets/assets/img/doctors/doctor-thumb-01.jpg"
                                                                alt="User Image">
                                                        </a>
                                                        
                                                            <?php if($event->status == 1 || $event->status == 2 || $event->status == 3 || $event->status == 5): ?>
                                                            
                                                             <a href="#"><?php echo e($dentist[$i]->name); ?><span></span></a>
                                                        
                                                           <?php else: ?>
                                                           
                                                             <a href="#"><span></span></a>
                                                             
                                                             <?php endif; ?>
                                                           
                                                    </h2>
                                                </td>
                                                <td><?php echo e($dayName); ?> <?php echo e($day); ?> <?php echo e($month); ?> <span
                                                        class="d-block text-info"><?php echo e($start_time); ?>

                                                        <?php echo e($am); ?></span>
                                                </td>
                                                </td>
                                                <td><?php echo e(isset($user[$i]->name) ? $user[$i]->name : ''); ?>

                                                    
                                                </td>
                                                <td><?php echo e($treatments[$i]->service_name_ar); ?></td>
                                                <td>
                                                    <?php if($event->status == 0): ?>
                                                        <span
                                                            class="badge badge-pill bg-warning-light"><?php echo app('translator')->getFromJson('resrv.satus0'); ?></span>

                                                    <?php elseif($event->status == 1): ?>
                                                        <span
                                                            class="badge badge-pill bg-success-light"><?php echo app('translator')->getFromJson('resrv.satus1'); ?></span>

                                                    <?php elseif($event->status == 2): ?>
                                                        <span
                                                            class="badge badge-pill bg-success-light"><?php echo app('translator')->getFromJson('resrv.satus2'); ?></span>

                                                    <?php elseif($event->status == 3): ?>
                                                        <span
                                                            class="badge badge-pill bg-danger-light"><?php echo app('translator')->getFromJson('resrv.satus3'); ?></span>

                                                    <?php elseif($event->status == 4): ?>
                                                        <span
                                                            class="badge badge-pill bg-danger-light"><?php echo app('translator')->getFromJson('resrv.satus4'); ?></span>

                                                    <?php elseif($event->status == 5): ?>
                                                        <span
                                                            class="badge badge-pill bg-success-light"><?php echo app('translator')->getFromJson('resrv.satus5'); ?></span>

                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-right">
                                                    <div class="table-action row">
                                                        <a href=<?php echo e(url('/details/' . $event->id)); ?>

                                                            class="btn btn-sm bg-info-light">
                                                            <i class="far fa-eye"></i> <?php echo app('translator')->getFromJson('resrv.view'); ?>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6">
                                                <div style="text-align: -webkit-center; text-align: center;">
                                                    <h2 style="color: red;"><?php echo app('translator')->getFromJson('resrv.NotFound'); ?></h2>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>

                            </table>
                        </div>
                        <?php echo e($events->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('views.client.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/client/upcoming-accepted-appointments.blade.php ENDPATH**/ ?>