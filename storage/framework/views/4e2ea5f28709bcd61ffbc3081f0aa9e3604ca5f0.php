

<?php $__env->startSection('innercontent'); ?>
    <!-- Page Content -->
    <?php if(Session::has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> <?php echo e(Session::get('success')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if(Session::has('failed')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong><?php echo e(Session::get('failed')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    <?php endif; ?>
     <div class="pb-3">
                        <button data-toggle="modal" data-target="#flollowerModal" class="btn btn-sm add-new-btn">
                            <i class="fas fa-plus"></i> <?php echo app('translator')->getFromJson('resrv.addFollower'); ?>
                        </button>
                    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?php echo app('translator')->getFromJson('login.accountEdit'); ?></h4>
            <!-- Profile Settings Form -->
            <form enctype="multipart/form-data" class="form-horizontal form-simple" method="POST"
                action="<?php echo e(route('postprofile')); ?>">
                <?php echo e(csrf_field()); ?>


                <?php if(isset($error)): ?>
                    <p style="text-align:center;color:red;direction:rtl">
                        <strong><?php echo e($error); ?> !</strong>
                    </p>
                <?php endif; ?>
                <div class="row form-row">
                 
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label><?php echo app('translator')->getFromJson('login.name'); ?></label>
                            <input id="name" type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                name="name" value="<?php echo e($client->name); ?>" required autocomplete="name" autofocus>
                            <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label><?php echo app('translator')->getFromJson('login.email'); ?></label>
                            <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                name="email" value="<?php echo e($client->email); ?>" autocomplete="email">
                            <input type="hidden" id="old_email" name="old_email" value="<?php echo e($client->email); ?>">

                            <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label><?php echo app('translator')->getFromJson('login.nationality'); ?></label>
                            <select class="form-control" name="nationality" id="nationality_id" required>
                                <option value=""><?php echo app('translator')->getFromJson('login.nationality'); ?></option>
                                <?php $__currentLoopData = $nationalitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nationality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($client->nationality == $nationality->id ? 'selected="selected"' : ''); ?>

                                        value="<?php echo e($nationality->id); ?>">
                                        <?php if(app()->getLocale() == 'ar'): ?>
                                            <?php echo e($nationality->nationality_name_ar); ?>

                                        <?php elseif( app()->getLocale()=='en'): ?>
                                            <?php echo e($nationality->nationality_name_en); ?>

                                        <?php endif; ?>
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                            <?php if($errors->has('city_id')): ?>
                                <span class="help-block">
                                    <strong style="color: #FF0000;"><?php echo e($errors->first('city_id')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label><?php echo app('translator')->getFromJson('login.city'); ?></label>
                            <select autocomplete="off" class="form-control form-control-lg" name="city_id" id="city_id"
                                required>
                                <option value=""><?php echo app('translator')->getFromJson('login.city'); ?></option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($client->city_id == $city->id ? 'selected="selected"' : ''); ?>

                                        value="<?php echo e($city->id); ?>">
                                        <?php if(app()->getLocale() == 'ar'): ?>
                                            <?php echo e($city->city_name_ar); ?>

                                        <?php elseif( app()->getLocale()=='en'): ?>
                                            <?php echo e($city->city_name_en); ?>

                                        <?php endif; ?>
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                            <?php if($errors->has('city_id')): ?>
                                <span class="help-block">
                                    <strong style="color: #FF0000;"><?php echo e($errors->first('city_id')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label><?php echo app('translator')->getFromJson('login.gender'); ?></label>
                            <select class="form-control" name="gender" id="Gender" required>
                                <option value=""><?php echo app('translator')->getFromJson('login.select'); ?></option>
                                <option value="Male" <?php echo e($client->gender == 'Male' ? 'selected="selected"' : ''); ?>>
                                    <?php echo app('translator')->getFromJson('login.male'); ?></option>
                                <option <?php echo e($client->gender == 'FeMale' ? 'selected="selected"' : ''); ?> value="FeMale">
                                    <?php echo app('translator')->getFromJson('login.female'); ?></option>


                            </select>

                            <?php if($errors->has('gender')): ?>
                                <span class="help-block">
                                    <strong style="color: #FF0000;"><?php echo e($errors->first('gender')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <?php $newDate = date('m/d/y', strtotime($client->birthdate)); ?>
                        <div class="form-group">
                            <label><?php echo app('translator')->getFromJson('login.birthdate'); ?></label>
                            <input id="datetimepickerDate1" type="text" class="form-control"
                                value="<?php echo e($client->birthdate); ?>" data-toggle="datetimepicker"
                                data-target="#datetimepickerDate1" name="birthdate">
                            <?php if($errors->has('birthdate')): ?>
                                <span class="help-block">
                                    <strong style="color: #FF0000;"><?php echo e($errors->first('birthdate')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button type="submit" class="btn btn-primary submit-btn"><?php echo app('translator')->getFromJson('login.edit'); ?></button>
                </div>
            </form>
            <!-- /Profile Settings Form -->

        </div>
    </div>
    
     <div class="modal fade call-modal" id="flollowerModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><?php echo app('translator')->getFromJson('login.addf'); ?></h3>
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo e(route('createFollower')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-1">
                                    <h4 class="grey3">&nbsp;</h4>
                                    <div class="icon pt-2"><img src="assets/imgs/reserve/user.svg"></div>
                                </div>
                                <div class="col-11">
                                    <h4 class="grey3"><?php echo app('translator')->getFromJson('login.fName'); ?></h4>
                                    <input class="form-control loginInput" name="name" required type="text"
                                        placeholder="<?php echo app('translator')->getFromJson('login.fName'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-1">
                                    <h4 class="grey3">&nbsp;</h4>
                                    <div class="icon pt-2"><img src="assets/imgs/account/lang.svg"></div>
                                </div>
                                <div class="col-11">
                                    <h4 class="grey3"><?php echo app('translator')->getFromJson('login.nationality'); ?></h4>
                                    <select class="form-control loginInput" name="nationality" id="nationality" required>
                                        <option value=""><?php echo app('translator')->getFromJson('login.nationality'); ?></option>
                                        <?php $__currentLoopData = $nationalitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nationality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($nationality->id); ?>">
                                                <?php if(app()->getLocale() == 'ar'): ?>
                                                    <?php echo e($nationality->nationality_name_ar); ?>

                                                <?php elseif( app()->getLocale()=='en'): ?>
                                                    <?php echo e($nationality->nationality_name_en); ?>

                                                <?php endif; ?>
                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-1">
                                    <h4 class="grey3">&nbsp;</h4>
                                    <div class="icon pt-2"><i class="fas fa-calendar-alt"
                                            style="color: #0de0fe; font-size: x-large;"></i></div>
                                </div>
                                <div class="col-11">
                                    <h4 class="grey3"><?php echo app('translator')->getFromJson('login.birthdate'); ?></h4>
                                    <input class="form-control datetimepicker" type="text" id="datetimepickerDate1" value=""
                                        name="birthdate" data-toggle="datetimepicker" data-target="#datetimepickerDate1">
                                </div>
                            </div>
                        </div>
                        <div class="form-group card-label">
                            <h4><?php echo app('translator')->getFromJson('login.gender'); ?></h4>
                            <div class="form-check-inline">
                                <label class="gender-radio">
                                    <input class="form-check-input" type="radio" value="Male"
                                        name="gender"><?php echo app('translator')->getFromJson('login.male'); ?>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="gender-radio">
                                    <input class="form-check-input" type="radio" value="Female"
                                        name="gender"><?php echo app('translator')->getFromJson('login.female'); ?>
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                            <?php if($errors->has('gender')): ?>
                                <span class="help-block">
                                    <strong style="color: #FF0000;"><?php echo e($errors->first('gender')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group card-label">
                            <h4 class="grey3"><?php echo app('translator')->getFromJson('login.relation'); ?></h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="friend"
                                                name="relation"><?php echo app('translator')->getFromJson('login.friend'); ?>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="brother"
                                                name="relation"><?php echo app('translator')->getFromJson('login.brother'); ?>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" value="wife" type="radio"
                                                name="relation"><?php echo app('translator')->getFromJson('login.wife'); ?>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="husband"
                                                name="relation"><?php echo app('translator')->getFromJson('login.husband'); ?>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="son"
                                                name="relation"><?php echo app('translator')->getFromJson('login.son'); ?>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="daughter"
                                                name="relation"><?php echo app('translator')->getFromJson('login.daughter'); ?>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="father"
                                                name="relation"><?php echo app('translator')->getFromJson('login.father'); ?>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="mother"
                                                name="relation"><?php echo app('translator')->getFromJson('login.mother'); ?>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block btn-md login-btn" type="submit"><?php echo app('translator')->getFromJson('login.addf'); ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('views.client.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/client/profile.blade.php ENDPATH**/ ?>