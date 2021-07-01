


<?php $__env->startSection('innercontent'); ?>
    <div class="card ">
        <div class="card-body">
            <h4 class="card-title"><?php echo app('translator')->getFromJson('login.accountEdit'); ?></h4>
            <form method="POST" action="<?php echo e(route('vendorpostprofile')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group row">
                    <label for="nation_id" class="col-md-4 col-form-label text-md-right"><?php echo app('translator')->getFromJson('login.nation_id'); ?></label>

                    <div class="col-md-12">
                        <input id="nation_id" type="text" class="form-control <?php if ($errors->has('nation_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nation_id'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                            name="nation_id" value="<?php echo e($client->nation_id); ?>" required autocomplete="nation_id" autofocus>

                        <?php if ($errors->has('nation_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nation_id'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo app('translator')->getFromJson('login.name'); ?></label>

                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name"
                            value="<?php echo e($client->name); ?>" required autocomplete="name" autofocus>

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

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo app('translator')->getFromJson('login.email'); ?></label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                            name="email" value="<?php echo e($client->email); ?>" required autocomplete="email">
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
                
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right"
                        for="nationality"><?php echo app('translator')->getFromJson('login.nationality'); ?></label>
                    <div class="col-md-12">
                        <select class="form-control form-control-lg" name="nationality" id="nationality" required>
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

                        <?php if($errors->has('nationality')): ?>
                            <span class="help-block">
                                <strong style="color: #FF0000;"><?php echo e($errors->first('nationality')); ?></strong>
                            </span>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right" for="city_id"><?php echo app('translator')->getFromJson('login.city'); ?></label>
                    <div class="col-md-12">
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
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right" for="hospital"><?php echo app('translator')->getFromJson('login.hospital'); ?></label>
                    <div class="col-md-12">
                        <select autocomplete="off" class="form-control form-control-lg" name="hospital" id="hospital"
                            required>
                            <option value=""><?php echo app('translator')->getFromJson('login.hospital'); ?></option>
                            <?php $__currentLoopData = $hospitals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hospital): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e($client->hospital == $hospital->id ? 'selected="selected"' : ''); ?>

                                    value="<?php echo e($hospital->id); ?>">
                                    <?php if(app()->getLocale() == 'ar'): ?>
                                        <?php echo e($hospital->hospital_name_ar); ?>

                                    <?php elseif( app()->getLocale()=='en'): ?>
                                        <?php echo e($hospital->hospital_name_en); ?>

                                    <?php endif; ?>
                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php if($errors->has('hospital')): ?>
                            <span class="help-block">
                                <strong style="color: #FF0000;"><?php echo e($errors->first('hospital')); ?></strong>
                            </span>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right" for="gender"><?php echo app('translator')->getFromJson('login.gender'); ?></label>
                    <div class="col-md-12">
                        <select class="form-control" name="gender" id="Gender" required>
                            <option value="">Select</option>
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
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right" for="dgree"><?php echo app('translator')->getFromJson('login.dgree'); ?></label>
                    <div class="col-md-12">
                        <input id="dgree" type="text" class="form-control <?php if ($errors->has('dgree')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('dgree'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="dgree"
                            value="<?php echo e($client->dgree); ?>" required>

                        <?php if($errors->has('dgree')): ?>
                            <span class="help-block">
                                <strong style="color: #FF0000;"><?php echo e($errors->first('dgree')); ?></strong>
                            </span>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="birthdate" class="col-md-4 col-form-label text-md-right"><?php echo app('translator')->getFromJson('login.birthdate'); ?></label>

                    <div class="col-md-12">
                        <input id="datetimepickerDate1" type="text" class="form-control "
                            value="<?php echo e($client->birthdate); ?>" data-toggle="datetimepicker"
                            data-target="#datetimepickerDate1" name="birthdate">
                    </div>

                </div>
                <div class="form-group row">

                    <label for="mobile" class="col-md-4 col-form-label text-md-right">

                        <?php echo app('translator')->getFromJson('login.uPhoto'); ?>

                    </label>

                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <div class="change-avatar">
                                <div class="profile-img">
                                    <?php if($client->photo): ?>
                                        <img width="70" height="70" src="<?php echo e(asset('images/' . $client->photo)); ?>" alt="">
                                    <?php else: ?>
                                        <img src="<?php echo e(url('assets/assets/img/patients/patient.jpg')); ?>" alt="User Image">
                                    <?php endif; ?>
                                </div>
                                <div class="upload-img">
                                    <div class="change-photo-btn">
                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                        <input name="photo" type="file" class="form-control upload" multiple
                                            data-show-upload="false" data-show-caption="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($errors->has('photo')): ?>

                            <span class="help-block text-danger">

                                <strong><?php echo e($errors->first('photo')); ?></strong>

                            </span>

                        <?php endif; ?>
                    </div>

                </div>
                <div class="form-group row">

                    <label for="photo" class="col-md-4 col-form-label text-md-right">

                        <?php echo app('translator')->getFromJson('login.pPhoto'); ?>

                    </label>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="change-avatar">
                                <div class="profile-img">
                                    <?php if($client->profile_photo): ?>
                                        <img width="70" height="70" src="<?php echo e(asset('images/' . $client->profile_photo)); ?>"
                                            alt="">
                                    <?php else: ?>
                                        <img src="<?php echo e(url('assets/assets/img/patients/patient.jpg')); ?>" alt="User Image">
                                    <?php endif; ?>
                                </div>
                                <div class="upload-img">
                                    <div class="change-photo-btn">
                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                        <input name="profile_photo" type="file" class="form-control upload" multiple
                                            data-show-upload="false" data-show-caption="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($errors->has('profile_photo')): ?>

                            <span class="help-block text-danger">

                                <strong><?php echo e($errors->first('profile_photo')); ?></strong>

                            </span>

                        <?php endif; ?>

                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-12 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            <?php echo app('translator')->getFromJson('login.edit'); ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('views.dentist.dentist', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/dentist/profile.blade.php ENDPATH**/ ?>