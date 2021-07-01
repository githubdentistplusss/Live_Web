

<?php $__env->startSection('innercontent'); ?>
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
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    <h4 class="card-title"><?php echo app('translator')->getFromJson('mesg.calander'); ?></h4>
                </div>
                <div class="col-3" style="text-align-last: end;">
                    <div class="pb-3">
                        <button data-toggle="modal" data-target="#add_time_slot" class="btn btn-sm add-new-btn">
                            <i class="fas fa-plus"></i> <?php echo app('translator')->getFromJson('mesg.addCalander'); ?>
                        </button>
                    </div>
                </div>
            </div>

            <div class="profile-box">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card schedule-widget mb-0">
                            <!-- Schedule Header -->
                            <div class="schedule-header">
                                <!-- Schedule Nav -->
                                <div class="schedule-nav">
                                    <ul class="nav nav-tabs nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#Sunday"><?php echo app('translator')->getFromJson('mesg.Sunday'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#Monday"><?php echo app('translator')->getFromJson('mesg.Monday'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#Tuesday"><?php echo app('translator')->getFromJson('mesg.Tuesday'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab"
                                                href="#Wednesday"><?php echo app('translator')->getFromJson('mesg.Wednesday'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab"
                                                href="#Thursday"><?php echo app('translator')->getFromJson('mesg.Thursday'); ?></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /Schedule Nav -->
                            </div>
                            <!-- /Schedule Header -->
                            <!-- Schedule Content -->
                            <div class="tab-content schedule-cont">
                                <?php
                                $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];
                                foreach ($days as $day) {

                                $dentist_id = Auth::guard('dentist')->user()->id;
                                $day_data = DB::table('dentist_calanders')
                                ->where('dentist_id', '=', $dentist_id)
                                ->where('dentist_calanders.start_date', '<=', \Carbon\Carbon::now()->todatestring())
                                    ->where('dentist_calanders.end_date', '>=', \Carbon\Carbon::now()->todatestring())
                                    ->where('day', '=', $day)
                                    ->where('dentist_calanders.flag', '=', 0)
                                    ->orderBy('start_date')
                                    ->get();
                                    ?>


                                    <div class="tab-pane fade" role="tabpanel" id="<?php echo e($day); ?>">

                                        <?php $__currentLoopData = $day_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $service = DB::table('services')
                                            ->where('id', '=', $dData->service_id)
                                            ->get(); ?>


                                            <div class="card">
                                                <div class="">
                                                    <div class="card-body row">
                                                        <div class="col-10">
                                                            <h4 class="blue2">
                                                                <?php if(app()->getLocale() == 'ar'): ?>
                                                                    <?php echo e($service[0]->service_name_ar); ?>

                                                                <?php elseif( app()->getLocale()=='en'): ?>
                                                                    <?php echo e($service[0]->service_name_en); ?>

                                                                <?php endif; ?>
                                                                <?php
                                                                $time2 = date('h:i', strtotime($dData->start_time));
                                                                // echo $dData->start_time;
                                                                $am = date('A', strtotime($dData->start_time));
                                                                ?>
                                                            </h4>
                                                            <div class="h5 grey3"><i
                                                                    class="far fa-clock"></i><?php echo e($time2); ?>

                                                                <?php echo e($am); ?></div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="row">
                                                                <a href="<?php echo e(url('calander/' . $dData->id)); ?>"
                                                                    class="btn btn-sm bg-primary-light">
                                                                    <i class="fas fa-edit"></i> <?php echo app('translator')->getFromJson('login.edit'); ?>
                                                                </a>
                                                                <a href="<?php echo e(url('deletecalander/' . $dData->id)); ?>"
                                                                    class="btn btn-sm bg-danger-light ml-2 mr-2"
                                                                    onclick="return confirm('انت على وشك حذف عنصر. هل أنت متأكد ؟!');">
                                                                    <i class="fas fa-trash-alt"></i><?php echo app('translator')->getFromJson('login.delete'); ?>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                    <?php
                                    }
                                    ?>

                            </div>
                            <!-- /Schedule Content -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Time Slot Modal -->
    <div class="modal fade call-modal" id="add_time_slot">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo e(route('createCalander')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="hospital_id" value="<?php echo e($hospital_id); ?>" />
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right"
                                for="service_id"><?php echo app('translator')->getFromJson('resrv.service'); ?></label>
                            <div class="col-md-8">
                                <select class="form-control form-control-lg" name="service_id" id="service_id" required>

                                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(old('service') == $service->id ? 'selected="selected"' : ''); ?>

                                            value="<?php echo e($service->id); ?>">
                                            <?php if(app()->getLocale() == 'ar'): ?>
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
                                <label class="col-md-4 col-form-label text-md-right" for="day"><?php echo app('translator')->getFromJson('resrv.day'); ?></label>
                                <div class="col-md-8">
                                    <select class="form-control" name="day" required>
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

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right"
                                for="day"><?php echo app('translator')->getFromJson('mesg.morning_time'); ?></label>
                            <div class="col-md-8">
                                <select class="form-control" required="required" name="morning_time">
                                    <option value="0"><?php echo app('translator')->getFromJson('login.select'); ?></option>
                                    <option value="08:00:00">08:00</option>
                                    <option value="09:00:00">09:00</option>
                                    <option value="10:00:00">10:00</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="day"><?php echo app('translator')->getFromJson('mesg.noon_time'); ?></label>
                            <div class="col-md-8">

                                <select class="form-control" required="required" name="noon_time">


                                    <option value="0"><?php echo app('translator')->getFromJson('login.select'); ?></option>
                                    <option value="13:00:00">13:00</option>
                                    <option value="14:00:00">14:00</option>
                                    <!-- <option value="15:00:00">15:00:00</option>-->

                                </select>


                            </div>

                        </div>


                </div>
                <div class="submit-section text-center" style="margin: 20px">
                    <button class="btn btn-primary submit-btn" type="submit" id="button"><?php echo app('translator')->getFromJson('login.add'); ?> </button>

                </div>
                </form>

            </div>
        </div>
    </div>
    </div>
    <!-- /Add Time Slot Modal -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('views.dentist.dentist', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/dentist/schedule.blade.php ENDPATH**/ ?>