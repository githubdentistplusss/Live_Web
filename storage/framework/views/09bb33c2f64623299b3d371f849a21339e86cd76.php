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


                            
                            <div id="dayx" style="display:display">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right"
                                           for="day"><?php echo app('translator')->getFromJson('resrv.day'); ?></label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="day" required>

                                        <!--
                                            <option value="0"><?php echo app('translator')->getFromJson('login.select'); ?></option>
                                            <option value="Sunday">كل <?php echo app('translator')->getFromJson('mesg.Sunday'); ?> من الفصل الدراسي</option>
                                            <option value="Monday">كل <?php echo app('translator')->getFromJson('mesg.Monday'); ?> من الفصل الدراسي</option>
                                            <option value="Tuesday">كل <?php echo app('translator')->getFromJson('mesg.Tuesday'); ?>  من الفصل الدراسي</option>
                                            <option value="Wednesday">كل <?php echo app('translator')->getFromJson('mesg.Wednesday'); ?> من الفصل الدراسي</option>
                                            <option value="Thursday"> كل <?php echo app('translator')->getFromJson('mesg.Thursday'); ?> من الفصل الدراسي</option>
                                            -->
                                        <option value="0"><?php echo app('translator')->getFromJson('login.select'); ?></option>
                                            <option value="Sunday">
                                             كل يوم (( احد )) من الفصل الدراسي    
                                              </option>
                                            <option value="Monday">
                                            كل يوم (( الأثنين )) من الفصل الدراسي 
                                            </option>
                                            <option value="Tuesday">
                                            كل يوم (( ثلاثاء )) من الفصل الدراسي
                                            </option>
                                            <option value="Wednesday">
                                            كل يوم (( أربعاء )) من الفصل الدراسي
                                            </option>
                                            <option value="Thursday">
                                                كل يوم (( خميس )) من الفصل الدراسي
                                                 </option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <br/>
                           
                          
                            <div class="form-group row">

                                <label class="col-md-4 col-form-label text-md-right"
                                       for="day"><?php echo app('translator')->getFromJson('mesg.morning_time'); ?></label>

                                <div class="col-md-6">
                                  
                                      <select class="form-control" required="required" name="morning_time">


                                            <option value="0"><?php echo app('translator')->getFromJson('login.select'); ?></option>
                                            <option value="08:00:00">08:00</option>
                                            <option value="09:00:00">09:00</option>
                                            <option value="10:00:00">10:00</option>
                                        
                                        </select>

                                     
                                </div>
                              
                            </div>
                            <div class="form-group row">

                                <label class="col-md-4 col-form-label text-md-right"
                                       for="day"><?php echo app('translator')->getFromJson('mesg.noon_time'); ?></label>

                                <div class="col-md-6">
                                  
                                      <select class="form-control" required="required" name="noon_time">


                                           <option value="0"><?php echo app('translator')->getFromJson('login.select'); ?></option>
                                            <option value="13:00:00">13:00</option>
                                            <option value="14:00:00">14:00</option>
                                           <!-- <option value="15:00:00">15:00:00</option>-->
                                        
                                        </select>

                                     
                                </div>
                              
                            </div>
                     
                       
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
                                
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">


                        <?php
                        $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday');
                        foreach($days as $day){
                       
                        $dentist_id = Auth::guard('dentist')->user()->id;
                        $day_data = DB::table('dentist_calanders')
                        ->where('dentist_id', '=', $dentist_id)
                        ->where('dentist_calanders.start_date','<=', \Carbon\Carbon::now()->todatestring())
                        ->where('dentist_calanders.end_date','>=', \Carbon\Carbon::now()->todatestring())
                        ->where('day', '=', $day)
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
                                                <div class="h5 grey3"><i class="far fa-clock"></i><?php echo e($time2); ?> <?php echo e($am); ?></div>
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



<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/vendor/add_calander.blade.php ENDPATH**/ ?>