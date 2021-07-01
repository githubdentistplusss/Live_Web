<?php $__env->startSection('content'); ?>

    <main class="main-content">
        <!--doctorSchedule section-->
        <!--addModal-->
        <div class="modal" id="addModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?php echo e(route('createCalander')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="hospital_id" value="<?php echo e($hospital_id); ?>"/>


                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="service_id"><?php echo app('translator')->getFromJson('resrv.service'); ?></label>
                                <div class="col-md-6">
                                    <select class="form-control form-control-lg" name="service_id" id="service_id"
                                            required>

                                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e((old('service') == $service->id)?'selected="selected"':""); ?> value="<?php echo e($service->id); ?>">
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
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="service_id"><?php echo app('translator')->getFromJson('mesg.period'); ?> </label>
                                <div class="col-md-6">
                                    <input type="checkbox" id="period" name="period" value="1"
                                           style="height: 25px;width:25px"/>
                                </div>
                            </div>
                            <div id="dayx" style="display: none;">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right"
                                           for="day"><?php echo app('translator')->getFromJson('resrv.day'); ?></label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="day">


                                            <option value="0"><?php echo app('translator')->getFromJson('login.select'); ?></option>
                                            <option value="Saturday"><?php echo app('translator')->getFromJson('mesg.Saturday'); ?></option>
                                            <option value="Sunday"><?php echo app('translator')->getFromJson('mesg.Sunday'); ?></option>
                                            <option value="Monday"><?php echo app('translator')->getFromJson('mesg.Monday'); ?></option>
                                            <option value="Tuesday"><?php echo app('translator')->getFromJson('mesg.Tuesday'); ?></option>
                                            <option value="Wednesday"><?php echo app('translator')->getFromJson('mesg.Wednesday'); ?></option>
                                            <option value="Thursday"><?php echo app('translator')->getFromJson('mesg.Thursday'); ?></option>
                                            <option value="Friday"><?php echo app('translator')->getFromJson('mesg.Friday'); ?></option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="form-group row">

                                <label class="col-md-4 col-form-label text-md-right" for="service_id"
                                       id="date_name"><?php echo app('translator')->getFromJson('resrv.Date'); ?> </label>
                                <div class="col-md-6">
                                    <input type="text" name="start_date" value="" class="form-control start_date_picker"
                                           autocomplete="off" id="datetimepickerDate" onchange="start_date_picker(this.value)" required
                                           data-toggle="datetimepicker" data-target="#datetimepickerDate"/>

                                    <?php if($errors->has('start_date')): ?>
                                        <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('start_date')); ?></strong>
                                                </span>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <div id="end_datex" style="display: none;">

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right"
                                           for="end_date"><?php echo app('translator')->getFromJson('resrv.eDate'); ?> </label>
                                    <div class="col-md-6">

                                        <input type="text" name="end_date" value="" class="form-control"
                                               autocomplete="off" id="datetimepickerDate2" data-toggle="datetimepicker"
                                               data-target="#datetimepickerDate2"/>
                                        <?php if ($errors->has('end_date')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('end_date'); ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                    <!--<?php if($errors->has('end_date')): ?>
                                        <span class="help-block">
                                        <strong style="color: #FF0000;"><?php echo e($errors->first('end_date')); ?></strong>
                                                </span>
                                                <?php endif; ?>-->

                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">

                                <label class="col-md-4 col-form-label text-md-right"
                                       for="day"><?php echo app('translator')->getFromJson('mesg.time'); ?></label>

                                <div class="col-md-6">
                                    <input class="form-control datetimepicker-input loginInput" type="text"
                                           id="datetimepickerTime1" required="required" data-toggle="datetimepicker"
                                           name="start_time" data-target="#datetimepickerTime1" autocomplete="off">
                                <!-- 	  <select name="start_time" class="form-control">
 <?php for($i = 1;$i <= 24;$i++){
                                if($i <= '12'){
                                if($i == '12'){
                                ?>
                                        <option  value="00:00:00"><?php echo e($i); ?> <?php echo app('translator')->getFromJson('resrv.am'); ?></option>
	<?php }else{

                                ?>
                                        <option  value="<?php echo e($i); ?>:00:00"><?php echo e($i); ?> <?php echo app('translator')->getFromJson('resrv.am'); ?></option>
 <?php }}else{ $x = $i - 12;
                                if($i == '24'){?>
                                        <option  value="12:00:00"><?php echo e($x); ?> <?php echo app('translator')->getFromJson('resrv.pm'); ?></option>
 <?php }else{

                                ?>
                                        <option  value="<?php echo e($i); ?>:00:00"><?php echo e($x); ?> <?php echo app('translator')->getFromJson('resrv.pm'); ?></option>
 <?php }}
                                ?>


                                <?php } ?>
                                        </select>-->
                                </div>
                                <!-- <input class="form-control datetimepicker-input loginInput" type="text" id="datetimepickerTime1" required="required" data-toggle="datetimepicker" name="start_time" data-target="#datetimepickerTime1">-->
                            </div>
                            <input class="form-control datetimepicker-input loginInput" type="hidden"
                                   id="datetimepickerTime2" value="0" name="end_time">
                        <!-- <div class="col-6">
                  <h4 class="grey3"><?php echo app('translator')->getFromJson('resrv.eTime'); ?></h4>
                  <input class="form-control datetimepicker-input loginInput" type="text" id="datetimepickerTime2" required="required"  data-toggle="datetimepicker" name="end_time" data-target="#datetimepickerTime2">
                </div>-->
                    </div>
                    <div class="btns" style="margin: 20px">
                        <button class="navBtn" type="submit" id="button"><?php echo app('translator')->getFromJson('login.add'); ?> </button>

                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!--end addModal-->


        <section class="account">
            <div class="title">
                <div class="container">
                    <h2><?php echo app('translator')->getFromJson('mesg.calander'); ?></h2>
                    <a href="<?php echo e(route('dentistDashboard')); ?>"><?php echo app('translator')->getFromJson('login.account'); ?> >> </a>
                    <div class="addFavor">
                        <button class="navBtn" data-toggle="modal" data-target="#addModal"><i
                                    class="fas fa-plus"></i> <?php echo app('translator')->getFromJson('mesg.addCalander'); ?></button>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="contentWrap">
                    <div class="content2">
                        <?php if(Session::has('message')): ?>
                            <div class="alert alert-success col-md-12">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo Session::get('message'); ?>

                            </div>
                        <?php elseif(Session::has('error_message')): ?>
                            <div class="alert alert-danger col-md-12">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <strong style="color: #000;"><?php echo Session::get('error_message'); ?></strong>
                            </div>
                        <?php endif; ?>
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <div class="days">
                            <ul class="nav nav-pills nav-justified">

                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Sunday"><?php echo app('translator')->getFromJson('mesg.Sunday'); ?></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Monday"><?php echo app('translator')->getFromJson('mesg.Monday'); ?></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Tuesday"><?php echo app('translator')->getFromJson('mesg.Tuesday'); ?></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Wednesday"><?php echo app('translator')->getFromJson('mesg.Wednesday'); ?></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Thursday"><?php echo app('translator')->getFromJson('mesg.Thursday'); ?></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Friday"><?php echo app('translator')->getFromJson('mesg.Friday'); ?></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Saturday"><?php echo app('translator')->getFromJson('mesg.Saturday'); ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">


                        <?php
                        $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
                        foreach($days as $day){
                        //echo $day;
                        $dentist_id = Auth::guard('dentist')->user()->id;
                        $day_data = DB::table('dentist_calanders')
                        ->where('dentist_id', '=', $dentist_id)
                        ->where('dentist_calanders.start_date','>=', \Carbon\Carbon::now()->todatestring())
                        ->where('day', '=', "$day")
                        ->where('dentist_calanders.flag', '=', 0)
                        ->orderBy('start_date')->get();
                        ?>


                        <div class="tab-pane" role="tabpanel" id="<?php echo e($day); ?>">

                            <?php $__currentLoopData = $day_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php   $service = DB::table('services')->where('id', '=', $dData->service_id)->get(); ?>

                                <div class="content2">
                                    <div class="favor">
                                        <div class="row">
                                            <div class="col-10">
                                                <h4 class="blue2">
                                                    <?php if( app()->getLocale()=='ar'): ?>
                                                        <?php echo e($service[0]->service_name_ar); ?>

                                                    <?php elseif( app()->getLocale()=='en'): ?>
                                                        <?php echo e($service[0]->service_name_en); ?>

                                                    <?php endif; ?>
                                                    <?php
                                                    $time2 = date('h:i', strtotime($dData->start_time));
                                                    //	echo $dData->start_time;
                                                    $am = date('A', strtotime($dData->start_time)); ?>
                                                </h4>
                                                <div class="h5 grey3"><i class="far fa-clock"></i><?php echo e($dData->start_date); ?> - <?php echo e($time2); ?> <?php echo e($am); ?></div>
                                            </div>
                                            <div class="col-2">
                                                <div class="dropdown">
                                                    <button class="dots-btn dropdown-toggle" type="button" data-toggle="dropdown"><img src="<?php echo e(asset('assets/imgs/account/dots.svg')); ?>"></button>
                                                    <div class="dropdown-menu"><a class="dropdown-item grey3" href="<?php echo e(url('calander/'.$dData->id)); ?>"><?php echo app('translator')->getFromJson('login.edit'); ?></a><a class="dropdown-item grey3" href="<?php echo e(url('deletecalander/'.$dData->id)); ?>"><?php echo app('translator')->getFromJson('login.delete'); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php  }?>


                    </div>
                </div>
            </div>
        </section>
    </main>




<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bsamat/public_html/demo/dentistplus/resources/views/vendor/add_calander.blade.php ENDPATH**/ ?>