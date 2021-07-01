

<?php $__env->startSection('innercontent'); ?>
    <section class="card">

        <!--doctorSchedule section-->


        <div class="card-body">
            <h4><?php echo app('translator')->getFromJson('resrv.editFollower'); ?></h4>
            <div class="content2">
                <form method="POST" action="<?php echo e(url('updateFClient/' . $object->id)); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <div class="row">
                            <!-- <div class="col-2">
                                            <div class="icon"><img src="assets/imgs/reserve/user.svg"></div>
                                          </div>-->
                            <div class="col-12">
                                <h4 class="grey3"><?php echo app('translator')->getFromJson('login.fName'); ?></h4>
                                <input class="form-control loginInput" name="name" required type="text"
                                    value="<?php echo e($object->name); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <!--<div class="col-2">
                                            <div class="icon"><img src="assets/imgs/account/lang.svg"></div>
                                          </div>-->
                            <div class="col-12">
                                <h4 class="grey3"><?php echo app('translator')->getFromJson('login.nationality'); ?></h4>

                                <select class="form-control loginInput" name="nationality" id="nationality" required>
                                    <option value=""><?php echo app('translator')->getFromJson('login.nationality'); ?></option>
                                    <?php $__currentLoopData = $nationalitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nationality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            <?php echo e($object->nationality == $nationality->id ? 'selected="selected"' : ''); ?>

                                            value="<?php echo e($nationality->id); ?>">
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
                            <!--<div class="col-2">
                                            <div class="icon"><img src="assets/imgs/account/lang.svg"></div>
                                          </div>-->
                            <div class="col-12">
                                <h4 class="grey3"><?php echo app('translator')->getFromJson('login.birthdate'); ?></h4>
                                <input class="form-control loginInput" type="text" id="datetimepickerDate1"
                                    value="<?php echo e($object->birthdate); ?>" name="birthdate" data-toggle="datetimepicker"
                                    data-target="#datetimepickerDate1">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h4 class="grey3"><?php echo app('translator')->getFromJson('login.gender'); ?></h4>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label gender-radio">
                                        <input class="form-check-input"
                                            <?php echo e($object->gender == 'Male' ? 'checked="checked"' : ''); ?> value="Male"
                                            type="radio" name="gender">
                                        <?php echo app('translator')->getFromJson('login.male'); ?>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label gender-radio">
                                        <input class="form-check-input" value="Female" type="radio" name="gender"
                                            <?php echo e($object->gender == 'Female' ? 'checked="checked"' : ''); ?>><?php echo app('translator')->getFromJson('login.female'); ?>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h4 class="grey3"><?php echo app('translator')->getFromJson('login.relation'); ?></h4>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label gender-radio">
                                        <input class="form-check-input" type="radio" value="friend" name="relation"
                                            <?php echo e($object->relation == 'friend' ? 'checked="checked"' : ''); ?>><?php echo app('translator')->getFromJson('login.friend'); ?>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label gender-radio">
                                        <input class="form-check-input" type="radio" value="brother" name="relation"
                                            <?php echo e($object->relation == 'brother' ? 'checked="checked"' : ''); ?>><?php echo app('translator')->getFromJson('login.brother'); ?>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label gender-radio">
                                        <input class="form-check-input" value="wife" type="radio" name="relation"
                                            <?php echo e($object->relation == 'wife' ? 'checked="checked"' : ''); ?>><?php echo app('translator')->getFromJson('login.wife'); ?>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label gender-radio">
                                        <input class="form-check-input" type="radio" value="husband" name="relation"
                                            <?php echo e($object->relation == 'husband' ? 'checked="checked"' : ''); ?>><?php echo app('translator')->getFromJson('login.husband'); ?>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label gender-radio">
                                        <input class="form-check-input" type="radio" value="son" name="relation"
                                            <?php echo e($object->relation == 'son' ? 'checked="checked"' : ''); ?>><?php echo app('translator')->getFromJson('login.son'); ?>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label gender-radio">
                                        <input class="form-check-input" type="radio" value="daughter" name="relation"
                                            <?php echo e($object->relation == 'daughter' ? 'checked="checked"' : ''); ?>><?php echo app('translator')->getFromJson('login.daughter'); ?>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label gender-radio">
                                        <input class="form-check-input" type="radio" value="father" name="relation"
                                            <?php echo e($object->relation == 'father' ? 'checked="checked"' : ''); ?>><?php echo app('translator')->getFromJson('login.father'); ?>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label gender-radio">
                                        <input class="form-check-input" type="radio" value="mother" name="relation"
                                            <?php echo e($object->relation == 'mother' ? 'checked="checked"' : ''); ?>><?php echo app('translator')->getFromJson('login.mother'); ?>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-md login-btn" type="submit"><?php echo app('translator')->getFromJson('login.update'); ?>
                        </button>
                    </div>
                </form>
            </div>


        <?php $__env->stopSection(); ?>

<?php echo $__env->make('views.client.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/client/follower-edit.blade.php ENDPATH**/ ?>