<?php $__env->startSection('content'); ?>


  <main class="main-content">
      <!--upcomingDates section-->
      <section class="register">
        <div class="title">
          <div class="container">
            <h2><?php echo app('translator')->getFromJson('login.account'); ?></h2>
          </div>
        </div>
        <div class="container">
          <div class="content">
                                <form enctype="multipart/form-data" class="form-horizontal form-simple" method="POST" action="<?php echo e(route('postprofile')); ?>" >
                                    <?php echo e(csrf_field()); ?>


                                    <?php if(isset($error)): ?>
                                        <p style="text-align:center;color:red;direction:rtl">
                                            <strong><?php echo e($error); ?> !</strong>
                                        </p>
                                    <?php endif; ?>

                                     <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo app('translator')->getFromJson('login.name'); ?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" value="<?php echo e($client->name); ?>" required autocomplete="name" autofocus>

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

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e($client->email); ?>"  autocomplete="email">
								 <input type="hidden" id="old_email" name="old_email" value="<?php echo e($client->email); ?>" >

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
                            <!-- <label for="mobile" class="col-md-4 col-form-label text-md-right"><?php echo app('translator')->getFromJson('login.mobile'); ?></label> -->

                            <!-- <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control <?php if ($errors->has('mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="mobile" value="<?php echo e($client->mobile); ?>" required autocomplete="mobile">
 <input type="hidden" id="old_mobile" name="old_mobile" value="<?php echo e($client->mobile); ?>">
                                <?php if ($errors->has('mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div> -->
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo app('translator')->getFromJson('login.password'); ?></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password"  autocomplete="new-password">

                                <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo app('translator')->getFromJson('login.re_pass'); ?></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>
 <div class="form-group row">
                                                <label class="col-md-4 col-form-label text-md-right" for="city_id" ><?php echo app('translator')->getFromJson('login.nationality'); ?></label>
												<div class="col-md-6">
                                                <select class="form-control" name="nationality" id="nationality_id" required>
                                                    <option value=""><?php echo app('translator')->getFromJson('login.nationality'); ?></option>
                                                    <?php $__currentLoopData = $nationalitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nationality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php echo e(($client->nationality == $nationality->id)?'selected="selected"':""); ?> value="<?php echo e($nationality->id); ?>"><?php if( app()->getLocale()=='ar'): ?>
					<?php echo e($nationality->nationality_name_ar); ?>

					<?php elseif( app()->getLocale()=='en'): ?>
					<?php echo e($nationality->nationality_name_en); ?>

					<?php endif; ?></option>
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
                                               <label class="col-md-4 col-form-label text-md-right" for="city_id"><?php echo app('translator')->getFromJson('login.city'); ?></label>
                                               <div class="col-md-6">
                                       <select autocomplete="off" class="form-control form-control-lg" name="city_id" id="city_id" required>
                                                    <option value=""><?php echo app('translator')->getFromJson('login.city'); ?></option>
                                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php echo e(($client->city_id == $city->id)?'selected="selected"':""); ?> value="<?php echo e($city->id); ?>"><?php if( app()->getLocale()=='ar'): ?>
                                                        <?php echo e($city->city_name_ar); ?>

                                                        <?php elseif( app()->getLocale()=='en'): ?>
                                                        <?php echo e($city->city_name_en); ?>

                                                        <?php endif; ?></option>
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
                                                <label class="col-md-4 col-form-label text-md-right" for="gender" ><?php echo app('translator')->getFromJson('login.gender'); ?></label>
												<div class="col-md-6">
                                                <select class="form-control" name="gender" id="Gender" required>
				                      <option value=""><?php echo app('translator')->getFromJson('login.select'); ?></option>
				                      <option value="Male" <?php echo e(($client->gender == 'Male')?'selected="selected"':""); ?>><?php echo app('translator')->getFromJson('login.male'); ?></option>
				                      <option <?php echo e(($client->gender == 'FeMale')?'selected="selected"':""); ?> value="FeMale"><?php echo app('translator')->getFromJson('login.female'); ?></option>


                                                </select>

                                                <?php if($errors->has('gender')): ?>
                                                    <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('gender')); ?></strong>
                                                </span>
                                                <?php endif; ?>

                                            </div>
                                            </div>

						  <div class="form-group row">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-right"><?php echo app('translator')->getFromJson('login.birthdate'); ?></label>

                            <div class="col-md-6">
							<?php $newDate = date("m/d/y", strtotime($client->birthdate));    ?>




                                  <input id="datetimepickerDate1" type="text" class="form-control " value="<?php echo e($client->birthdate); ?>" data-toggle="datetimepicker" data-target="#datetimepickerDate1" name="birthdate" >
                            </div>

                        </div>

                         <div class="form-group row">
                        <label class="col-md-4  col-form-label text-md-right">
                            Attachment(s)
                            (Attach multiple files.)
                        </label>
                        <div class="col-sm-6">
                        <span class="btn btn-default btn-file">
                                <input  name="gallery[]" type="file" class="form-control file" multiple data-show-upload="true" data-show-caption="true">
                        </span>
                        </div>
                        </div>

						<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                      <?php echo app('translator')->getFromJson('login.edit'); ?>
                                </button>
                            </div>
                        </div>
                                </form>
                            </div>
                        </div>





    </section>
</main>>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/frontend/client/profile.blade.php ENDPATH**/ ?>