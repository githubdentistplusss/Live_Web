

<?php $__env->startSection('title','Orders'); ?>

<?php $__env->startSection('content'); ?>




    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="card">


                    <div class="card-content collapse show">

                        <div class="card-body">
                            <div class="table-responsive ls-table">

                                <table class="table table-bordered table-striped" style="">
                                    <tr>
                                        <td><?php echo app('translator')->getFromJson('resrv.detailsID'); ?></td>
                                        <td>#<?php echo e($object[0]->event_id); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo app('translator')->getFromJson('resrv.patient'); ?></td>
                                        <td> <?php if($follower): ?>
                                                <?php echo e($follower[0]->name); ?>

                                            <?php else: ?>
                                                <?php echo e($object[0]->Uname); ?>

                                            <?php endif; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo app('translator')->getFromJson('about.dentist'); ?></td>
                                        <td>
                                            <b>
                                             <?php $__currentLoopData = $name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($doc); ?>  ||
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            

                                            
                                            </b>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>ارشفة الاطباء </td>
                                        <td>
                                             <?php $__currentLoopData = $b_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($doc); ?>  ||
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            

                                            
                                        </td>
                                    </tr>
                                       
                                    <tr>
                                        <td><?php echo app('translator')->getFromJson('resrv.satus'); ?></td>
                                        <td>
                                                                                    <?php if($object[0]->status=="0"): ?>
                                                <?php echo app('translator')->getFromJson('resrv.satus0'); ?>
                                            <?php elseif($object[0]->status=="1"): ?>
                                                <?php echo app('translator')->getFromJson('resrv.satus1'); ?>
                                            <?php elseif($object[0]->status=="2"): ?>
                                                <?php echo app('translator')->getFromJson('resrv.satus2'); ?>
                                            <?php elseif($object[0]->status=="3"): ?>
                                                <?php echo app('translator')->getFromJson('resrv.satus3'); ?>
                                            <?php elseif($object[0]->status=="4"): ?>
                                                <?php echo app('translator')->getFromJson('resrv.satus4'); ?>
                                            <?php elseif($object[0]->status=="5"): ?>
                                                <?php echo app('translator')->getFromJson('resrv.satus5'); ?>
                                           <?php elseif($object[0]->status=="6"): ?>
                                                <?php echo app('translator')->getFromJson('resrv.satus6'); ?>
                                           <?php elseif($object[0]->status=="7"): ?>
                                                <?php echo app('translator')->getFromJson('resrv.satus7'); ?>
                                           <?php elseif($object[0]->status=="8"): ?>
                                                <?php echo app('translator')->getFromJson('resrv.satus8'); ?>
                                                 
                                            <?php endif; ?>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td>حالة القبول</td>
                                        <td>
                                           <b style="color:red">
                                                                               <?php if($object[0]->dentist_approved=="0"): ?>
                                               لم يتم قبول الموعد قط
                                    <?php elseif($object[0]->dentist_approved=="1"): ?>
                                                تم قبول الموعد من الطبيب 
                                    <?php elseif($object[0]->dentist_approved=="2"): ?>
                                              الموعد تم إنشاءه من قبل الطبيب
                                     <?php endif; ?>
                                    </b>

                                        </td>
                                    </tr>
           
                                    <tr>
                                        <td><?php echo app('translator')->getFromJson('resrv.dateTime'); ?></td>

                                        <td><?php
                                            $start_time = date('h:i', strtotime($object[0]->start_time));
                                            $am = date('A', strtotime($object[0]->start_time));
                                            ?>  <?php echo e($object[0]->event_date); ?> |
                                             <?php echo e($object[0]->start_time); ?>

                                            <?php echo e($am); ?>

                                        </td>
                                    </tr>
                                                           
                                    <tr>
                                        <td><?php echo app('translator')->getFromJson('login.hospital'); ?></td>
                                        <td>  <?php echo e($object[0]->hospital_name_ar); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo app('translator')->getFromJson('resrv.trate'); ?></td>
                                        <td>  <?php echo e($object[0]->service_name_ar); ?></td>
                                    </tr>
                                   <tr>
                                        <td><?php echo app('translator')->getFromJson('resrv.attachments'); ?></td>
                                        <td>   <?php if($object[0]->event_photo != null || $object[0]->photo2 != null ||
                                             $object[0]->photo3 != null || $object[0]->photo4 != null || $object[0]->photo5 != null): ?>

                                             <?php if($object[0]->event_photo != null): ?>
                                                <a href="<?php echo e(asset('public/images/'.$object[0]->event_photo)); ?>"
                                                   target="_blank"> <img
                                                            src="<?php echo e(asset('public/images/'.$object[0]->event_photo)); ?>"></a>
                                                            <?php endif; ?>
                                                            <?php if($object[0]->photo2 != null): ?>
                                                            <a href="<?php echo e(asset('public/images/'.$object[0]->photo2)); ?>"
                                                   target="_blank"> <img
                                                            src="<?php echo e(asset('public/images/'.$object[0]->photo2)); ?>"></a>
                                                            <?php endif; ?>
                                                            <?php if($object[0]->photo3 != null): ?>
                                                            <a href="<?php echo e(asset('public/images/'.$object[0]->photo3)); ?>"
                                                   target="_blank"> <img
                                                            src="<?php echo e(asset('public/images/'.$object[0]->photo3)); ?>"></a>
                                                            <?php endif; ?>
                                                            <?php if($object[0]->photo4 != null): ?>
                                                            <a href="<?php echo e(asset('public/images/'.$object[0]->photo4)); ?>"
                                                   target="_blank"> <img
                                                            src="<?php echo e(asset('public/images/'.$object[0]->photo4)); ?>"></a>
                                                            <?php endif; ?>
                                                            <?php if($object[0]->photo5 != null): ?>
                                                            <a href="<?php echo e(asset('public/images/'.$object[0]->photo5)); ?>"
                                                   target="_blank"> <img
                                                            src="<?php echo e(asset('public/images/'.$object[0]->photo5)); ?>"></a>
                                                            <?php endif; ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->getFromJson('resrv.notfound'); ?>
                                            <?php endif; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo app('translator')->getFromJson('resrv.diseases'); ?></td>
                                        <td>  <?php if(!empty($object[0]->diseases)): ?>
                                                <?php echo e($object[0]->diseases); ?>

                                            <?php else: ?>
                                                <?php echo app('translator')->getFromJson('resrv.notfound'); ?>
                                            <?php endif; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo app('translator')->getFromJson('resrv.drugs'); ?></td>
                                        <td>   <?php if(!empty($object[0]->drugs)): ?>
                                                <?php echo e($object[0]->drugs); ?>

                                            <?php else: ?>
                                                <?php echo app('translator')->getFromJson('resrv.notfound'); ?>
                                            <?php endif; ?></td>
                                    </tr>
                                    <tr>
                                        <td>ملاحظات خدمة العملاء </td>
                                        <td> <pre style="
    font-family: auto;
    font-size: 13px;
"><?php echo e($object[0]->note); ?> </pre>  </td>
                                    </tr>
                                    <tr>
    <td> لخطة العلاجية </td>
    <td> <pre style="
    font-family: auto;
    font-size: 13px;
"><?php echo e($object[0]->treatment); ?> </pre> </td>
</tr>
                                </table>


                                <!--<div class="date-det">
                                  <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="alarm" name="alarmCheck">
                                    <label class="custom-control-label blue" for="alarm">تفعيل التنبية</label>
                                  </div>
                                </div>-->


                            <!-- <div class="btns">
              <a href="<?php echo e(route('messages.create')); ?>" class="navBtn">ارسال رسالة </a>
             
            </div>
		-->
                                
                               


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/backstage/orders/details.blade.php ENDPATH**/ ?>