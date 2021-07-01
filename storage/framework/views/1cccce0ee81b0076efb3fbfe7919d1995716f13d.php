<?php $__env->startSection('title','Dentists Calendar'); ?>

<?php $__env->startSection('content'); ?>


    <?php if(isset($objects)): ?>

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                </div>

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-header">

                            <div class="heading-elements">
                                
                               <h1>مواعيد الاطباء</h1> 

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
                                            <th>Doctor</th>
                                            <th>Hospital</th>
                                            <th>Service</th>
                                            <th>Start Date</th>
                                           <!--// <th>End Date</th>-->
                                          <th>Day</th>
                                            <th>Start Time</th>
                        
                                            <th>Mobile</th>
                                            <th>Status</th>

                                        </tr>

                                        </thead>

                                        <tbody>

                                        <?php if(count($objects)): ?>

                                            <?php

                                            $_page = (!empty($_GET['page']))?$_GET['page']:1;

                                            $counter = intval($_per_page * intval($_page - 1)) + 1;

                                            ?>



                                            <?php $__currentLoopData = $objects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php if($object->admin != 2): ?>

                                                    <tr>

                                                        <td><?php echo e($object->id); ?></td>
                                                       
                                                           <td><?php echo e($object->dentist['name']); ?></td>

        
                                                        <td><?php echo e($object->hospital['hospital_name_en']); ?></td>

                                                        <td><?php echo e($object->service['service_name_en']); ?></td>

                                                        <td><?php echo e($object->start_date); ?></td>

                                                        <td><?php echo e($object->day); ?></td>

                                                        <td><?php echo e(date("g:ia", strtotime($object->start_time))); ?></td>

                                                        <td><?php echo e($object->dentist['mobile']); ?></td>

                                                        <td>
                                                            <?php if($object->status): ?>
                                                            Reserved
                                                            <?php else: ?>
                                                            Not reserved
                                                            <?php endif; ?>
                                                        </td>

                                                    </tr>

                                                <?php endif; ?>

                                                <?php $counter++; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php else: ?>

                                            <tr>

                                                <td colspan="7">لا يوجد اعضاء</td>

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bsamat/public_html/demo/dentistplus/resources/views/backstage/dentists/calendars.blade.php ENDPATH**/ ?>