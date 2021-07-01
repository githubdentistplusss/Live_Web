

<?php $__env->startSection('innercontent'); ?>





    <!--dateDetails section-->
    <section class="card">

        <div class="card-body">
            <h4>تفاصيل الحجز</h4>
            
            <div class="date-det pb-3">
                    <h5 class="grey3">صورة العرض</h5>
                    <div class="attach-image">

                        <?php if(!empty($offers[0]->offer_photo)): ?>
                            <a href="<?php echo e(asset('images/' . $offers[0]->offer_photo)); ?>" target="_blank">
                                <img height"100" width="100" src="<?php echo e(asset('images/' . $offers[0]->offer_photo)); ?>"></a>
                        <?php endif; ?>

                      

                    </div>
            
            <div class="content pt-4 pb-4">
                <div class="date-det pb-3">
                    <h5 class="grey3">رقم الحجز</h5>
                    <input class="form-control loginInput" name="name" required type="text"
                        value="#<?php echo e($offers[0]->offer_booking_id); ?>" readonly>
                </div>
               
                 <div class="date-det pb-3">
                    <h5 class="grey3">العرض</h5>
                    <input class="form-control loginInput" name="name" required type="text"
                        value="<?php echo e($offers[0]->offer_title); ?>" readonly>
                </div>
                
                    <div class="date-det pb-3">
                    <h5 class="grey3">تفاصيل العرض</h5>
                    <texarea class="form-control loginInput" name="name" required type="text"
                        value="" readonly><?php echo e($offers[0]->offer_description); ?></textarea>
                </div>
               
                <div class="date-det pb-3">
                    <h5 class="grey3">اسم العيادة</h5>
                    <input class="form-control loginInput" name="name" required type="text"
                        value="<?php echo e($offers[0]->clinic_name); ?>" readonly>
                </div>
                
                 <div class="date-det pb-3">
                    <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.satus'); ?></h5>
                    
                    
                    
                   <?php if($offers[0]->offer_booking_status == 0): ?>
                                                        <span
                                                            class="badge badge-pill bg-warning-light">في انتظار تأكيد الحجز من العيادة</span>

                                                    <?php elseif($offers[0]->offer_booking_status == 1): ?>
                                                        <span
                                                            class="badge badge-pill bg-success-light">تم تأكيد الحجز</span>

                                                    <?php elseif($offers[0]->offer_booking_status == 2): ?>
                                                        <span
                                                            class="badge badge-pill bg-danger-light">تم الغاء الحجز من المراجع</span>

                                                    <?php elseif($offers[0]->offer_booking_status == 3): ?>
                                                        <span
                                                            class="badge badge-pill bg-success-light">تم حضور المراجع  </span>

                                                    <?php else: ?>
                                                     <span
                                                            class="badge badge-pill bg-danger-light">لم يتم حضور المراجع  </span>

                                                    <?php endif; ?>

                </div>
               
                 <div class="date-det pb-3">
                    <h5 class="grey3">السعر قبل العرض</h5>
                    <input class="form-control loginInput" name="name" required type="text"
                        value="<?php echo e($offers[0]->offer_old_price); ?>" readonly>
                </div>
                
                  <div class="date-det pb-3">
                    <h5 class="grey3">السعر بعد العرض</h5>
                    <input class="form-control loginInput" name="name" required type="text"
                        value="<?php echo e($offers[0]->offer_booking_price); ?>" readonly>
                </div>
               
                                                                                                                         
              

                <div class="date-det pb-3">
                    <h5 class="grey3">رقم العيادة</h5>
                    <input class="form-control loginInput" name="name" required type="text" 
                    value="<?php echo e($offers[0]->clinic_phone); ?>"
                    readonly>

                </div>
                
                 <div class="date-det pb-3">
                    <h5 class="grey3">عنوان العيادة</h5>
                    <input class="form-control loginInput" name="name" required type="text" 
                    value="<?php echo e($offers[0]->clinic_address); ?>"
                    readonly>

                </div>

                
<div class="btns">
                            <a href="<?php echo e(route('offerNeglect', $offers[0]->offer_booking_id)); ?>"
                                class="btn btn-danger btn-md login-btn">الغاء الحجز
                            </a>
                        </div>

              
                

            </div>
        </div>
    </section>








<?php $__env->stopSection(); ?>

<?php echo $__env->make('views.client.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/client/offer-book-details.blade.php ENDPATH**/ ?>