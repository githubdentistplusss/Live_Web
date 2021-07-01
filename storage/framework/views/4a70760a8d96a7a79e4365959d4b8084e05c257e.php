<?php $__env->startSection('content'); ?>
<main class="main-content">
      <!--dateDetails section-->
      <section class="dateDetails">
        <div class="title">
          <div class="container">
			<h2><?php echo app('translator')->getFromJson('resrv.details'); ?></h2>
			<?php if(isset(Auth::guard('dentist')->user()->id)): ?>
            <a href="<?php echo e(route('dentistDashboard')); ?>"><?php echo app('translator')->getFromJson('login.account'); ?> >> </a>
            <?php else: ?>
            <a href="<?php echo e(route('clientDashboard')); ?>"><?php echo app('translator')->getFromJson('login.account'); ?> >> </a>
            <?php endif; ?>
          </div>
        </div>
        <div class="container">
          <div class="content">
            <div class="date-det">
              <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.detailsID'); ?></h5>
              <h4 class="blue2">#<?php echo e($object[0]->event_id); ?></h4>
            </div>
            <div class="date-det">
              <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.patient'); ?></h5>
              <h4 class="blue2">
			  <?php if($follower): ?>
			  	<?php echo e($follower[0]->name); ?>

				 <?php else: ?>
				<?php echo e($object[0]->Uname); ?>

			  <?php endif; ?>
			  </h4>
            </div>
			<div class="date-det">
              <h5 class="grey3"><?php echo app('translator')->getFromJson('about.dentist'); ?></h5>
              <h4 class="blue2">
			   <?php if($object[0]->status!="0"): ?>
			  	<?php echo e($object[0]->D_name); ?>

				<?php endif; ?>

				 <?php if($object[0]->status=="1"): ?>
				 <!--	<a href="<?php echo e(route('messages')); ?>">	  <img src="<?php echo e(asset('public/img/chat-bubbles.png')); ?>" width="35"></a>
				-->
				 <?php endif; ?>
			  </h4>
            </div>
            <div class="date-det">
              <h5 class="grey3"><?php echo app('translator')->getFromJson('login.hospital'); ?></h5>
              <h4 class="blue2"><?php echo e($object[0]->hospital_name_ar); ?></h4>
            </div>
			<?php if(isset(Auth::guard('dentist')->user()->id)): ?>
            <!--<div class="date-det">
              <h5 class="grey3">الطبيب المعالج</h5>
              <h4 class="blue2"><?php echo e($object[0]->D_name); ?></h4>
            </div>-->
			<?php endif; ?>
            <div class="date-det">
              <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.trate'); ?></h5>
              <h4 class="blue2"><?php echo e($object[0]->service_name_ar); ?></h4>
            </div>
            <div class="date-det">
              <h5 class="grey3"> <?php echo app('translator')->getFromJson('resrv.dateTime'); ?></h5>
			<?php    $start_time = date('h:i', strtotime($object[0]->start_time));
              $am=date('A', strtotime($object[0]->start_time));
              ?>
              <h4 class="blue2"><?php echo e($object[0]->event_date); ?> /  <?php echo e($start_time); ?>    <?php echo e($am); ?></h4>
            </div>
            <!--<div class="date-det">
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="alarm" name="alarmCheck">
                <label class="custom-control-label blue" for="alarm">تفعيل التنبية</label>
              </div>
            </div>-->
            <div class="date-det">
              <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.satus'); ?></h5>
			  <?php if($object[0]->status=="0"): ?>
			   <h4 class="blue2"><?php echo app('translator')->getFromJson('resrv.satus1'); ?></h4>
			   <?php elseif($object[0]->status=="1"): ?>
			   <h4 class="blue2"><?php echo app('translator')->getFromJson('resrv.satus2'); ?></h4>
			   <?php elseif($object[0]->status=="2"): ?>
			   <h4 class="pink"><?php echo app('translator')->getFromJson('resrv.satus4'); ?></h4>
			   <?php elseif($object[0]->status=="3"): ?>
			   <h4 class="pink"><?php echo app('translator')->getFromJson('resrv.satus3'); ?></h4>
			   <?php elseif($object[0]->status=="5"): ?>
			   <h4 class="pink"><?php echo app('translator')->getFromJson('resrv.satus6'); ?></h4>
			   <?php elseif($object[0]->status=="4"): ?>
			   <h4 class="pink"><?php echo app('translator')->getFromJson('resrv.satus7'); ?></h4>
			  <!-- <div class="date-det">
              <h5 class="grey3">سبب الرفض</h5>
              <h4 class="pink"><?php echo e($object[0]->reason); ?></h4>
            </div>-->
			  <?php endif; ?>

            </div>

            <div class="date-det">
              <h5 class="grey3"><?php echo app('translator')->getFromJson('about.dentistMobile'); ?></h5>
              <h4 class="blue2">
			   <?php if($object[0]->status!="0"): ?>
			  	<?php echo e($object[0]->D_mobile); ?>

				<?php endif; ?>


			  </h4>

            </div>

            <div class="date-det">
              <h5 class="grey3"><?php echo app('translator')->getFromJson('about.patientMobile'); ?></h5>
              <h4 class="blue2">
                <?php if($follower): ?>
                <?php echo e($follower[0]->user->mobile); ?>

        				 <?php else: ?>
        				<?php echo e($object[0]->Umobile); ?>

        			  <?php endif; ?>


			  </h4>

            </div>


            <div class="date-det">
              <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.attachments'); ?></h5>
              <div class="attach-image">

			  <?php if(!empty($object[0]->event_photo)): ?>
		<a href="<?php echo e(asset('public/images/'.$object[0]->event_photo)); ?>" target="_blank">
			  <img src="<?php echo e(asset('public/images/'.$object[0]->event_photo)); ?>"></a>
			  <?php endif; ?>

			  <?php if(!empty($object[0]->event_photo2)): ?>
		<a href="<?php echo e(asset('public/images/'.$object[0]->event_photo2)); ?>" target="_blank">
			  <img src="<?php echo e(asset('public/images/'.$object[0]->event_photo2)); ?>"></a>
			  <?php endif; ?>
			  <?php if(!empty($object[0]->event_photo3)): ?>
		<a href="<?php echo e(asset('public/images/'.$object[0]->event_photo3)); ?>" target="_blank">
			  <img src="<?php echo e(asset('public/images/'.$object[0]->event_photo3)); ?>"></a>
			  <?php endif; ?>
			  <?php if(!empty($object[0]->event_photo4)): ?>
		<a href="<?php echo e(asset('public/images/'.$object[0]->event_photo4)); ?>" target="_blank">
			  <img src="<?php echo e(asset('public/images/'.$object[0]->event_photo4)); ?>"></a>
			  <?php endif; ?>
			  <?php if(!empty($object[0]->event_photo5)): ?>
		<a href="<?php echo e(asset('public/images/'.$object[0]->event_photo5)); ?>" target="_blank">
			  <img src="<?php echo e(asset('public/images/'.$object[0]->event_photo5)); ?>"></a>
			  <?php endif; ?>

			  <?php if(empty($object[0]->event_photo) && empty($object[0]->event_photo2)
			  && empty($object[0]->event_photo3) && empty($object[0]->event_photo4) && empty($object[0]->event_photo5)): ?>
			  <?php echo app('translator')->getFromJson('resrv.notfound'); ?>
			  <?php endif; ?>

			 </div>
            </div>
			<div class="date-det">
              <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.diseases'); ?></h5>
              <div class="attach-image">
			  <?php if(!empty($object[0]->diseases)): ?>
			  <?php echo e($object[0]->diseases); ?>

			  <?php else: ?>
			  <?php echo app('translator')->getFromJson('resrv.notfound'); ?>
			  <?php endif; ?>

			 </div>
            </div>
			<div class="date-det">
              <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.drugs'); ?></h5>
              <div class="attach-image">
			  <?php if(!empty($object[0]->drugs)): ?>
			  <?php echo e($object[0]->drugs); ?>

			  <?php else: ?>
			  <?php echo app('translator')->getFromJson('resrv.notfound'); ?>
			  <?php endif; ?>

			 </div>
			</div>
			<?php if($object[0]->status !== 3 && $object[0]->status !== 4): ?>

			<?php
            $now_date = Carbon\Carbon::now()->format('Y-m-d');
            $date1 = new DateTime($object[0]->event_date);
            $date2 = new DateTime($now_date);
            $interval = $date1->diff($date2);
            $now_time =  Carbon\Carbon::now()->format('H:i:s');
            ?>

			<?php if(isset(Auth::guard('dentist')->user()->id)): ?>
            <?php
            $today=date('Y-m-d');
            if ($object[0]->event_date >= $today and $object[0]->status==0) {?>

			 <div class="btns">
              <a href="<?php echo e(route('accepetReservation', $object[0]->event_id)); ?>" class="navBtn"><?php echo app('translator')->getFromJson('resrv.confirm'); ?></a>
            <!--  <button class="w-btn">الغاء الحجز</button>-->
            </div>
		<?php	}

        if ($object[0]->status==2) {?>
			 <a href="<?php echo e(route('approveArrival', $object[0]->event_id)); ?>" class="w-btn <?php echo e(($interval->days > 0 && $object[0]->start_time < $now_time  )? 'isDisabled':''); ?>"><?php echo app('translator')->getFromJson('resrv.confirm3'); ?> </a>
	<?php	}	if ($object[0]->status!=5) {
            if ($object[0]->status==0) {?>
	<br/>
			 <div class="btns">
              <a href="<?php echo e(route('neglectReservation', $object[0]->event_id)); ?>" class="w-btn"><?php echo app('translator')->getFromJson('resrv.cancle1'); ?> </a>
			  </div>
	<?php } else {?>

			 <br/>
			 <div class="btns">
              <a href="<?php echo e(route('neglectReservation', $object[0]->event_id)); ?>" class="w-btn"><?php echo app('translator')->getFromJson('resrv.cancle'); ?> </a>
			  </div>
			  <?php }
        }?>
           <?php endif; ?>
           	<?php if(isset(Auth::guard('client')->user()->id)): ?>
			<?php

            if ($object[0]->status==1) {?>

			 <div class="btns">
              <a href="<?php echo e(route('accepetArr', $object[0]->event_id)); ?>" class="navBtn <?php echo e(($interval->days > 1)? 'isDisabled':''); ?>"><?php echo app('translator')->getFromJson('resrv.confirm2'); ?></a>


            <!--  <button class="w-btn">الغاء الحجز</button>-->
            </div>
		<?php	} if ($object[0]->status!=5) {?>


			<br/>
			 <div class="btns">
		 <a href="<?php echo e(route('neglectArr', $object[0]->event_id)); ?>" class="w-btn"><?php echo app('translator')->getFromJson('resrv.cancle'); ?> </a>
				</div>
				<?php } ?>
			<!-- <div class="btns">
              <a href="<?php echo e(route('messages.create')); ?>" class="navBtn">ارسال رسالة </a>

            </div>
		-->

		   <?php endif; ?>
		   <?php endif; ?>

          </div>
        </div>
      </section>
    </main>







<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shahin/Sites/dentist-backend/resources/views/client/details.blade.php ENDPATH**/ ?>