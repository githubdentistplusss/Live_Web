<?php $__env->startSection('content'); ?>
 <!-- Main Content-->
 <main class="main-content">
      <!--notification section-->
      <section class="account">
        <div class="title">
          <div class="container">
            <h2>التنبيهات</h2>
          </div>
        </div>
        <div class="container">
          <div class="contentWrap">
          <?php if(count($notifications) != 0): ?>
		  
          <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notify): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="content2">
                    <div class="notification">
                      <div class="row">
                        <div class="col-10">
                        <div class="h5 grey3"><i class="far fa-clock"></i> <?php echo e(\Carbon\Carbon::parse($notify->created_at)->diffForHumans()); ?></div>
                          <div class="h4 blue2">
                        
                         <a href="<?php echo e(url('/Ddetails/'.$notify->event_id)); ?>">
  
                         <?php echo e($notify->mesg. ' بتاريخ ' . $notify->event_date. ' لخدمة ' . $notify->service_name_ar . ' الساعة ' . $notify->start_time); ?>


                              </a>
                        </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
		 
            <h2 style="color: red"><?php echo app('translator')->getFromJson('resrv.NoNotifications'); ?></h2>
           <?php endif; ?> 
           <?php echo e($notifications->links()); ?>         
          </div>
        </div>
      </section>
    </main>
    <!-- End Main Content-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shahin/Sites/dentist-backend/resources/views/vendor/notifications.blade.php ENDPATH**/ ?>