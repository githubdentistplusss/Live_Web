

<?php $__env->startSection('innercontent'); ?>

<style>
    
    
</style>

    <!--dateDetails section-->
    <section class="card">

        <div class="card-body">
            <h4><?php echo app('translator')->getFromJson('resrv.details'); ?></h4>
            <div class="content pt-4 pb-4">
                <div class="date-det pb-3">
                    <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.detailsID'); ?></h5>
                    <input class="form-control loginInput" name="name" required type="text"
                        value="#<?php echo e($object[0]->event_id); ?>" readonly>
                </div>
                <div class="date-det pb-3">
                    <?php if($follower): ?>
                        <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.ill'); ?></h5>
                    <?php else: ?>
                        <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.patient'); ?></h5>
                    <?php endif; ?>
                    <h4 class="blue2">
                        <?php if($follower): ?>
                            <input class="form-control loginInput" name="name" required type="text"
                                value="<?php echo e($follower[0]->name); ?>" readonly>
                        <?php else: ?>
                            <input class="form-control loginInput" name="name" required type="text"
                                value="<?php echo e($object[0]->Uname); ?>" readonly>

                        <?php endif; ?>
                    </h4>
                </div>
                <div class="date-det pb-3">
                    <h5 class="grey3"><?php echo app('translator')->getFromJson('about.dentist'); ?></h5>
                    <input class="form-control loginInput" name="name" required type="text"
                        value="<?php if($object[0]->status == '1' || $object[0]->status == '2' || $object[0]->status == '3' || $object[0]->status == '5'): ?> <?php echo e($object[0]->D_name); ?> <?php endif; ?>" readonly>
                        
                        <!-- 


                    <?php if($object[0]->status == '1' || $object[0]->status == '2'): ?>
                        <a href="<?php echo e(route('messages')); ?>"> <img src="<?php echo e(asset('img/chat-bubbles.png')); ?>"
                                width="35"></a>
                                
                                -->

                    <?php endif; ?>

                </div>
                <div class="date-det pb-3">
                    <h5 class="grey3"><?php echo app('translator')->getFromJson('login.hospital'); ?></h5>
                    <input class="form-control loginInput" name="name" required type="text"
                        value="<?php echo e($object[0]->hospital_name_ar); ?>" readonly>
                </div>
                <?php if(isset(Auth::guard('dentist')->user()->id)): ?>
                    <!--<div class="date-det">
                                                                                                                                                                      <h5 class="grey3">الطبيب المعالج</h5>
                                                                                                                                                                      <h4 class="blue2"><?php echo e($object[0]->D_name); ?></h4>
                                                                                                                                                                    </div>-->
                <?php endif; ?>
                <div class="date-det pb-3">
                    <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.trate'); ?></h5>
                    <input class="form-control loginInput" name="name" required type="text"
                        value="<?php echo e($object[0]->service_name_ar); ?>" readonly>
                </div>
                <div class="date-det pb-3">
                    <h5 class="grey3"> <?php echo app('translator')->getFromJson('resrv.dateTime'); ?></h5>
                    <?php
                    $start_time = date('h:i', strtotime($object[0]->start_time));
                    $am = date('A', strtotime($object[0]->start_time));
                    ?>
                    <input class="form-control loginInput" name="name" required type="text"
                        value="<?php echo e($object[0]->event_date); ?> / <?php echo e($start_time); ?> <?php echo e($am); ?>" readonly>

                </div>
                <!--<div class="date-det">
                                                                                                                                                                      <div class="custom-control custom-checkbox">
                                                                                                                                                                        <input class="custom-control-input" type="checkbox" id="alarm" name="alarmCheck">
                                                                                                                                                                        <label class="custom-control-label blue" for="alarm">تفعيل التنبية</label>
                                                                                                                                                                      </div>
                                                                                                                                                                    </div>-->
                <div class="date-det pb-3">
                    <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.satus'); ?></h5>
                    <?php if($object[0]->status == '0'): ?>
                        <h4 class="badge badge-pill bg-warning-light"><?php echo app('translator')->getFromJson('resrv.satus0'); ?></h4>
                    <?php elseif($object[0]->status=="1"): ?>
                        <h4 class="badge badge-pill bg-success-light"><?php echo app('translator')->getFromJson('resrv.satus1'); ?></h4>
                    <?php elseif($object[0]->status=="2"): ?>
                        <h4 class="badge badge-pill bg-success-light"><?php echo app('translator')->getFromJson('resrv.satus2'); ?></h4>
                    <?php elseif($object[0]->status=="3"): ?>
                        <h4 class="badge badge-pill bg-danger-light"><?php echo app('translator')->getFromJson('resrv.satus3'); ?></h4>
                   
                    <?php elseif($object[0]->status=="4"): ?>
                        <h4 class="badge badge-pill bg-danger-light"><?php echo app('translator')->getFromJson('resrv.satus4'); ?></h4>
                         <?php elseif($object[0]->status=="5"): ?>
                        <h4 class="badge badge-pill bg-success-light"><?php echo app('translator')->getFromJson('resrv.satus5'); ?></h4>
                        <!-- <div class="date-det">
                                                                                                                                                                      <h5 class="grey3">سبب الرفض</h5>
                                                                                                                                                                      <h4 class="pink"><?php echo e($object[0]->reason); ?></h4>
                                                                                                                                                                    </div>-->
                    <?php endif; ?>

                </div>

                <div class="date-det pb-3">
                    <h5 class="grey3"><?php echo app('translator')->getFromJson('about.dentistMobile'); ?></h5>
                    <input class="form-control loginInput" name="name" required type="text" value="<?php if($object[0]->status == '1' || $object[0]->status == '2' || $object[0]->status == '5'): ?> <?php echo e($object[0]->D_mobile); ?> <?php endif; ?>"
                    readonly>

                </div>

                <div class="date-det pb-3">
                    <h5 class="grey3"><?php echo app('translator')->getFromJson('about.patientMobile'); ?></h5>
                    <input class="form-control loginInput" name="name" required type="text" value="<?php if($object[0]->status == '1'): ?> <?php if($follower): ?>
                        <?php echo e($follower[0]->user->mobile); ?>

                    <?php else: ?>
                        <?php echo e($object[0]->Umobile); ?> <?php endif; ?>
                        <?php endif; ?>" readonly>
                </div>


                <div class="date-det pb-3">
                    <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.attachments'); ?></h5>
                    <div class="attach-image">

                        <?php if(!empty($object[0]->event_photo)): ?>
                            <a href="<?php echo e(asset('images/' . $object[0]->event_photo)); ?>" target="_blank">
                                <img width="100" height="100" src="<?php echo e(asset('images/' . $object[0]->event_photo)); ?>"></a>
                        <?php endif; ?>

                        <?php if(!empty($object[0]->event_photo2)): ?>
                            <a href="<?php echo e(asset('images/' . $object[0]->event_photo2)); ?>" target="_blank">
                                <img width="100" height="100" src="<?php echo e(asset('images/' . $object[0]->event_photo2)); ?>"></a>
                        <?php endif; ?>
                        <?php if(!empty($object[0]->event_photo3)): ?>
                            <a href="<?php echo e(asset('images/' . $object[0]->event_photo3)); ?>" target="_blank">
                                <img width="100" height="100" src="<?php echo e(asset('images/' . $object[0]->event_photo3)); ?>"></a>
                        <?php endif; ?>
                        <?php if(!empty($object[0]->event_photo4)): ?>
                            <a href="<?php echo e(asset('images/' . $object[0]->event_photo4)); ?>" target="_blank">
                                <img width="100" height="100" src="<?php echo e(asset('images/' . $object[0]->event_photo4)); ?>"></a>
                        <?php endif; ?>
                        <?php if(!empty($object[0]->event_photo5)): ?>
                            <a href="<?php echo e(asset('images/' . $object[0]->event_photo5)); ?>" target="_blank">
                                <img width="100" height="100" src="<?php echo e(asset('images/' . $object[0]->event_photo5)); ?>"></a>
                        <?php endif; ?>

                        <?php if(empty($object[0]->event_photo) && empty($object[0]->event_photo2) && empty($object[0]->event_photo3) && empty($object[0]->event_photo4) && empty($object[0]->event_photo5)): ?>
                            <?php echo app('translator')->getFromJson('resrv.notfound'); ?>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="date-det pb-3">
                    <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.diseases'); ?></h5>
                    <input class="form-control loginInput" name="name" required type="text" value="<?php if(!empty($object[0]->diseases)): ?> <?php echo e($object[0]->diseases); ?> <?php endif; ?>"
                    readonly>

                </div>
                <div class="date-det pb-3">
                    <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.drugs'); ?></h5>
                    <input class="form-control loginInput" name="name" required type="text" value="<?php if(!empty($object[0]->drugs)): ?> <?php echo e($object[0]->drugs); ?> <?php endif; ?>"
                    readonly>
                </div>
                
                <div class="date-det pb-3">
                    <h5 class="grey3">ملاحظات</h5>
                    <input class="form-control loginInput" name="name" required type="text" value="<?php if(!empty($object[0]->description)): ?> <?php echo e($object[0]->description); ?> <?php endif; ?>"
                    readonly>
                </div>
                <?php if($object[0]->status !== 3 && $object[0]->status !== 4): ?>

                    <?php
                    $now_date = Carbon\Carbon::now()->format('Y-m-d');
                    $date1 = new DateTime($object[0]->event_date);
                    $date2 = new DateTime($now_date);
                    $interval = $date1->diff($date2);
                    $now_time = Carbon\Carbon::now()->format('H:i:s');
                    ?>

                    <?php if(isset(Auth::guard('dentist')->user()->id)): ?>
                        <?php
                        $today = date('Y-m-d');
                        if ($object[0]->event_date >= $today and $object[0]->status == 0) { ?>

                        <div class="btns">
                            <a href="<?php echo e(route('accepetReservation', $object[0]->event_id)); ?>"
                                class="btn btn-primary btn-md login-btn"><?php echo app('translator')->getFromJson('resrv.confirm'); ?></a>
                            <!--  <button class="w-btn">الغاء الحجز</button>-->
                        </div>
                        <?php }

                        if ($object[0]->status == 2) { ?>
                        <a href="<?php echo e(route('approveArrival', $object[0]->event_id)); ?>"
                            class="btn btn-sucess btn-md login-btn <?php echo e($interval->days > 0 && $object[0]->start_time < $now_time ? 'isDisabled' : ''); ?>"><?php echo app('translator')->getFromJson('resrv.confirm3'); ?>
                        </a>
                        <?php }
                        if ($object[0]->status != 5) {
                        if ($object[0]->status == 0) { ?>
                        <br />
                        <div class="btns">
                            <a href="<?php echo e(route('neglectReservation', $object[0]->event_id)); ?>"
                                class="btn btn-danger btn-md login-btn"><?php echo app('translator')->getFromJson('resrv.cancle1'); ?> </a>
                        </div>
                        <?php } else { ?>

                        <br />
                        <div class="btns">
                            <a href="<?php echo e(route('neglectReservation', $object[0]->event_id)); ?>"
                                class="btn btn-danger btn-md login-btn"><?php echo app('translator')->getFromJson('resrv.cancle'); ?> </a>
                        </div>
                        <?php }
                        }
                        ?>
                    <?php endif; ?>
                    <?php if(isset(Auth::guard('client')->user()->id)): ?>
                        <?php
                        if ($object[0]->status == 1) { ?>

                        <div class="btns">
                            <a href="<?php echo e(route('accepetArr', $object[0]->event_id)); ?>"
                                class="navBtn <?php echo e($interval->days > 1 ? 'isDisabled' : ''); ?>" 
                                
                                class="btn btn-success btn-md login-btn"><?php echo app('translator')->getFromJson('resrv.confirm2'); ?></a>


                            <!--  <button class="w-btn">الغاء الحجز</button>-->
                        </div>
                        <?php }
                        if ($object[0]->status != 5) { ?>


                        <br />
                        <div class="btns">
                            <a href="<?php echo e(route('neglectArr', $object[0]->event_id)); ?>"
                                class="btn btn-danger btn-md login-btn"><?php echo app('translator')->getFromJson('resrv.cancle'); ?>
                            </a>
                        </div>
                        <?php }
                        ?>
                        <!-- <div class="btns">
                        
                        
                                                                                                                                                                      <a href="<?php echo e(route('messages.create')); ?>" class="navBtn">ارسال رسالة </a>

                                                                                                                                                                    </div>
                                                                                                                                                          -->

                    <?php endif; ?>
                <?php endif; ?>

            </div>
        </div>
    </section>








<?php $__env->stopSection(); ?>

<?php echo $__env->make('views.client.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/client/appointment-details.blade.php ENDPATH**/ ?>