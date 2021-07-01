<?php $__env->startSection('title','Orders'); ?>

<?php $__env->startSection('content'); ?>



    <?php if(isset($objects)): ?>

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-header">

                            <div class="heading-elements">
                            Reservations
                            </div>

                        </div>

                        <div class="card-content collapse show">

                            <div class="card-body">

                                <!--Table Wrapper Start-->

                                <div class="table-responsive ls-table">

                                    <table id="myTable" class="display" style="width:100%,z-index:9999">

                                        <thead>

                                        <tr>

                                            <th>#</th>
                                            <th>Patient</th>
                                            <th>Mobile</th>
                                            <th>Follower Mobile</th>
                                            <th>Treatment</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Details</th>
                                        </tr>

                                        </thead>

                                        <tbody>

                                        <?php if(($objects)): ?>


                                            <?php $__currentLoopData = $objects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <tr>

                                                    <td><?php echo e($object->id); ?></td>
                                                    <td>
                                                        <?php if(!empty($user[$i]->name)): ?>
                                                          <?php echo e($user[$i]->name); ?>

                                                        <?php endif; ?>
                                                        </td>
                                                        <td>
                                                        <?php if(!empty($user[$i]->mobile)): ?>
                                                          <?php echo e($user[$i]->mobile); ?>

                                                        <?php endif; ?>
                                                        </td>

                                                        <td>
                                                        <?php if(!empty($user[$i]->user_id)): ?>
                                                          <?php echo e($user[$i]->user->mobile); ?>

                                                        <?php endif; ?>
                                                        </td>

                                                        <td><?php echo e($treatments[$i]->service_name_ar); ?></td>

                                                    <td>
                                                        <?php echo e($object->event_date); ?>

                                                    </td>

                                                    <td>
                                                        <?php echo e(date("g:ia", strtotime($object->start_time))); ?>

                                                        -<?php echo e(date("g:ia", strtotime($object->end_time))); ?>

                                                    </td>
                                                    <td>
                                                    <?php if($object->status=="0"): ?>
                                                        <?php echo app('translator')->getFromJson('resrv.satus1'); ?>
                                                    <?php elseif($object->status=="1"): ?>
                                                        <?php echo app('translator')->getFromJson('resrv.satus2'); ?>
                                                    <?php elseif($object->status=="2"): ?>
                                                        <?php echo app('translator')->getFromJson('resrv.satus4'); ?>
                                                    <?php elseif($object->status=="3"): ?>
                                                        <?php echo app('translator')->getFromJson('resrv.satus3'); ?>
                                                    <?php elseif($object->status=="4"): ?>
                                                        <?php echo app('translator')->getFromJson('resrv.satus8'); ?>
                                                    <?php elseif($object->status=="5"): ?>
                                                        <?php echo app('translator')->getFromJson('resrv.satus6'); ?>
                                                    <?php endif; ?>
                                                    </td>
                                                    <td><a href="<?php echo e(url('home/orders/Showdetails/'.$object->id )); ?>">Details</a>
                                                    </td>

                                                </tr>


                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php else: ?>

                                            <tr>

                                                <td colspan="7">لا يوجد مواعيد محجوزة</td>

                                            </tr>

                                        <?php endif; ?>

                                        </tbody>


                                    </table>

                                </div>

                                <!--Table Wrapper Finish-->

                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </div>



    <?php endif; ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bsamat/public_html/demo/dentistplus/resources/views/backstage/orders/index.blade.php ENDPATH**/ ?>