<?php $__env->startSection('content'); ?>
 <main class="main-content">
      <!--upcomingDates section-->
      <section class="upcomingDates">
        <div class="title">
          <div class="container">
            <h2><?php echo app('translator')->getFromJson('resrv.uDate'); ?></h2>
            <a href="<?php echo e(route('clientDashboard')); ?>"><?php echo app('translator')->getFromJson('login.account'); ?> >> </a>
          </div>
        </div>
        <div class="container">
          <div class="contentWrap">
		  <?php if(count($events) != 0): ?>
		  
		   <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="content2">
                    <div class="row">
                      <div class="col-3 col-md-2">
                        <div class="date text-center">
						  <?php 
						  $day=date('d', strtotime($event->event_date));
						  $month=date('M', strtotime($event->event_date));
						  $dayName=date('l', strtotime($event->event_date));
						  $am=date('A', strtotime($event->start_time));
						   $start_time = date('h:i', strtotime($event->start_time));  
						  ?>
                          <h5 class="grey3"><?php echo e($dayName); ?></h5>
                          <h4 class="blue"><?php echo e($day); ?></h4>
                          <h5 class="grey3"><?php echo e($month); ?></h5>
                        </div>
                      </div>
                      <div class="col-9 col-md-10">
                        <div class="row border-b">
                          <div class="col-6">
                            <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.time'); ?></h5>
                            <h4 class="blue2"><?php echo e($start_time); ?><span class="lightGrey"><?php echo e($am); ?></span></h4>
                          </div>
                          <div class="col-6">
                            <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.ill'); ?></h5>
                            <h4 class="blue"> <?php echo e($user[$i]->name); ?></h4>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.treatment'); ?></h5>
                            <h4 class="blue2"><?php echo e($treatments[$i]->service_name_ar); ?></h4>
                          </div>
                          <div class="col-6">
						  <br/>
                            <a href="<?php echo e(url('/details/'.$event->id)); ?>" class="w-btn"><?php echo app('translator')->getFromJson('login.details'); ?></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php else: ?>
		 
<h2 style="color: red"><?php echo app('translator')->getFromJson('resrv.NotFound'); ?></h2>
           <?php endif; ?> 
		   <?php echo e($events->links()); ?>         
          </div>
        </div>
      </section>
    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shahin/Sites/dentist-backend/resources/views/frontend/client/nextCalenderP.blade.php ENDPATH**/ ?>