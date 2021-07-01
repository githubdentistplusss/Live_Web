<?php $__env->startSection('content'); ?>

 <main class="main-content">
  <section class="reserve">
        <div class="title">
          <div class="container">
            <h2><?php echo app('translator')->getFromJson('login.Uservice'); ?></h2>
          </div>
        </div>
      <!--doctorSchedule section-->
      <!--addModal-->
	  <div class="container">
          <div class="contentWrap">
            <div class="content2">

			 <form method="POST" action="<?php echo e(route('updateCalander', $object->id)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>


			<div class="form-group row">
                                                <label class="col-md-4 col-form-label text-md-right" for="service_id"><?php echo app('translator')->getFromJson('resrv.service'); ?></label>
 <div class="col-md-6">
                                               <select class="form-control form-control-lg" name="service_id" id="service_id" required>

                                                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php echo e(($object->service_id == $service->id)?'selected="selected"':""); ?> value="<?php echo e($service->id); ?>">
					<?php if( app()->getLocale()=='ar'): ?>
					<?php echo e($service->service_name_ar); ?>

					<?php elseif( app()->getLocale()=='en'): ?>
					<?php echo e($service->service_name_en); ?>

					<?php endif; ?>
					</option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

                                                <?php if($errors->has('service')): ?>
                                                    <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('service')); ?></strong>
                                                </span>
                                                <?php endif; ?>


                                            </div>
                                            </div>

			<div class="form-group row">
                             <!--                   <label class="col-md-4 col-form-label text-md-right" for="service_id"><?php echo app('translator')->getFromJson('mesg.period'); ?> </label>
 <div class="col-md-6">
			<input <?php echo e(((strtotime($object->end_date) - strtotime($object->start_date)>'86400'))?'checked="checked"':""); ?> type="checkbox" id="period"  name="period" value="1" style="height: 25px;width:25px"/>
							</div>-->
							</div>
		<div class="form-group row">
                                                <label class="col-md-4 col-form-label text-md-right" for="service_id" id="date_name"><?php echo app('translator')->getFromJson('resrv.Date'); ?> </label>
 <div class="col-md-6">
 <?php $newDate = date("m/d/y", strtotime($object->start_date));    ?>
                                           <input type="text" name="start_date" value="<?php echo e($object->start_date); ?>"  class="form-control start_date_picker"  autocomplete="off" id="datetimepickerDate" required data-toggle="datetimepicker" onchange="start_date_picker(this.value)" required  data-target="#datetimepickerDate"/>

                                                <?php if($errors->has('start_date')): ?>
                                                    <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('start_date')); ?></strong>
                                                </span>
                                                <?php endif; ?>

                                            </div>
                                            </div>



               <div class="form-group row">
                  <h4 class="col-md-4 col-form-label text-md-right"><?php echo app('translator')->getFromJson('mesg.time'); ?></h4>
				  <?php   $startTime = date("HH", strtotime($object->start_time));
                 // echo $start_time = date('g', strtotime($object->start_time));?>
				  <div class="col-md-6">
                  <!--<input class="form-control datetimepicker-input loginInput" type="text" id="datetimepickerTime1" data-toggle="datetimepicker" value="<?php echo e($object->start_time); ?>" name="start_time" data-target="#datetimepickerTime1">-->
                  <input class="form-control datetimepicker-input loginInput" type="text" id="datetimepickerTime1" required="required" data-toggle="datetimepicker" name="start_time" data-target="#datetimepickerTime1" autocomplete="off" value="">
			<!-- 	   <select name="start_time" class="form-control">
 <?php for ($i=1;$i<=24;$i++) {
                     $start_time = date('G', strtotime($object->start_time)); ?>
 	<?php for ($i=1;$i<=24;$i++) {
                         if ($i <= '12') {
                             if ($i == '12') {
                                 ?>
	<option <?php echo e(($start_time == '00')?'selected="selected"':""); ?>  value="00:00:00"><?php echo e($i); ?> <?php echo app('translator')->getFromJson('resrv.am'); ?></option>
	<?php
                             } else {
                                 ?>
 	<option <?php echo e(($i == $start_time)?'selected="selected"':""); ?>  value="<?php echo e($i); ?>:00:00"><?php echo e($i); ?> <?php echo app('translator')->getFromJson('resrv.am'); ?></option>
 <?php
                             }
                         } else {
                             $x=$i-12 ;
                             if ($i == '24') {?>
 	<option <?php echo e(($start_time == '12')?'selected="selected"':""); ?>  value="12:00:00"><?php echo e($x); ?> <?php echo app('translator')->getFromJson('resrv.pm'); ?></option>
 <?php } else {
                                 ?>
 	<option <?php echo e(($i == $start_time)?'selected="selected"':""); ?>  value="<?php echo e($i); ?>:00:00"><?php echo e($x); ?> <?php echo app('translator')->getFromJson('resrv.pm'); ?></option>
 <?php
                             }
                         } ?>
	<?php
                     }
                 } ?>
 </select>-->
                </div>
                </div>
               <!-- <div class="col-6">
                  <h4 class="grey3"><?php echo app('translator')->getFromJson('resrv.eTime'); ?></h4>
                  <input class="form-control datetimepicker-input loginInput" type="text" id="datetimepickerTime2" value="<?php echo e($object->end_time); ?>" data-toggle="datetimepicker" name="end_time" data-target="#datetimepickerTime2">
                </div>-->

              <div class="btns">
                <button class="navBtn" type="submit" id="button" ><?php echo app('translator')->getFromJson('login.edit'); ?> </button>

              </div>
			  </form>

      <!--end addModal-->

	 </div>
	 </div>
	 </div>
     </section>
    </main>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/vendor/edit_calander.blade.php ENDPATH**/ ?>