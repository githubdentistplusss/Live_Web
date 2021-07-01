<?php $__env->startSection('content'); ?>
 <main class="main-content">
  <section class="reserve">
        <div class="title">
          <div class="container">
            <h2><?php echo app('translator')->getFromJson('login.edit'); ?> <?php echo e($object->name); ?></h2>
          </div>
        </div>
      <!--doctorSchedule section-->
      <!--addModal-->
	   <div class="container">
          <div class="contentWrap">
            <div class="content2">
			 <form method="POST" action="<?php echo e(url('updateFClient/'.$object->id)); ?>">
                        <?php echo csrf_field(); ?>

              <div class="form-group">
                <div class="row">
                 <!-- <div class="col-2">
                    <div class="icon"><img src="assets/imgs/reserve/user.svg"></div>
                  </div>-->
                  <div class="col-12">
                    <h4 class="grey3"><?php echo app('translator')->getFromJson('login.fName'); ?></h4>
                    <input class="form-control loginInput" name="name" required type="text" value="<?php echo e($object->name); ?>">
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
                                                    <option  value=""><?php echo app('translator')->getFromJson('login.nationality'); ?></option>
                                                    <?php $__currentLoopData = $nationalitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nationality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php echo e(($object->nationality == $nationality->id)?'selected="selected"':""); ?>  value="<?php echo e($nationality->id); ?>">
					<?php if( app()->getLocale()=='ar'): ?>
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
                    <input class="form-control loginInput" type="text" id="datetimepickerDate1" value="<?php echo e($object->birthdate); ?>" name="birthdate" data-toggle="datetimepicker" data-target="#datetimepickerDate1">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <h4 class="grey3"><?php echo app('translator')->getFromJson('login.gender'); ?></h4>
                <div class="row">
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" <?php echo e(($object->gender == 'Male')?'checked="checked"':""); ?> value="Male" type="radio" name="gender">
						<?php echo app('translator')->getFromJson('login.male'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" value="Female" type="radio" name="gender" <?php echo e(($object->gender == 'Female')?'checked="checked"':""); ?>><?php echo app('translator')->getFromJson('login.female'); ?>
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
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="friend" name="relation" <?php echo e(($object->relation == 'friend')?'checked="checked"':""); ?>><?php echo app('translator')->getFromJson('login.friend'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="brother" name="relation" <?php echo e(($object->relation == 'brother')?'checked="checked"':""); ?>><?php echo app('translator')->getFromJson('login.brother'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" value="wife" type="radio" name="relation" <?php echo e(($object->relation == 'wife')?'checked="checked"':""); ?>><?php echo app('translator')->getFromJson('login.wife'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="husband" name="relation" <?php echo e(($object->relation == 'husband')?'checked="checked"':""); ?>><?php echo app('translator')->getFromJson('login.husband'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="son" name="relation" <?php echo e(($object->relation == 'son')?'checked="checked"':""); ?>><?php echo app('translator')->getFromJson('login.son'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="daughter" name="relation" <?php echo e(($object->relation == 'daughter')?'checked="checked"':""); ?>><?php echo app('translator')->getFromJson('login.daughter'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="father" name="relation" <?php echo e(($object->relation == 'father')?'checked="checked"':""); ?>><?php echo app('translator')->getFromJson('login.father'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="mother" name="relation" <?php echo e(($object->relation == 'mother')?'checked="checked"':""); ?> ><?php echo app('translator')->getFromJson('login.mother'); ?>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button class="navBtn" type="submit"><?php echo app('translator')->getFromJson('login.addf'); ?> </button>
              </div>
			  </form>
			  </div>
			  </div>
			  </main>
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Follower Edit')); ?></div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(url('updateFClient, $object->id')); ?>">
                        <?php echo csrf_field(); ?>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Name')); ?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" value="<?php echo e($object->name); ?>" required autocomplete="name" autofocus>

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
                                                <label class="col-md-4 col-form-label text-md-right" for="city_id" >nationality</label>
												<div class="col-md-6">
                                                <select class="form-control" name="nationality" id="nationality" required>
                                                    <option value=""><?php echo app('translator')->getFromJson('login.nationality'); ?></option>
                                                    <?php $__currentLoopData = $nationalitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nationality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php echo e(($object->nationality == $nationality->id)?'selected="selected"':""); ?> value="<?php echo e($nationality->nationality_id); ?>"><?php if( app()->getLocale()=='ar'): ?>
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
                                                <label class="col-md-4 col-form-label text-md-right" for="gender" >Gender</label>
												<div class="col-md-6">
                                                <select class="form-control" name="gender" id="Gender" required>
				                       <option value="">Select</option>
				                      <option value="Male" <?php echo e(($object->gender == 'Male')?'selected="selected"':""); ?>>Male</option>
				                      <option value="FeMale" <?php echo e(($object->gender == 'FeMale')?'selected="selected"':""); ?>>FeMale</option>           
                                                   
                                                </select>

                                                <?php if($errors->has('gender')): ?>
                                                    <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('gender')); ?></strong>
                                                </span>
                                                <?php endif; ?>

                                            </div>
                                            </div>                   
						  <div class="form-group row">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-right">BirthDate</label>

                            <div class="col-md-6">
                                <input id="birthdate" type="text" class="form-control " name="birthdate" value="<?php echo e($object->birthdate); ?>" >
                            </div>
                        </div>
<div class="form-group row">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-right">relation</label>

                            <div class="col-md-6">
                               <input id="relation" type="radio" class="form-control " value="Brother" name="relation" <?php echo e(($object->relation == 'Brother')?'checked="checked"':""); ?>> Brother
					 
					             <input id="relation" type="radio" class="form-control " value="Sister" name="relation" <?php echo e(($object->relation == 'Sister')?'checked="checked"':""); ?>>Sister
					             <input id="relation" type="radio" class="form-control " value="Friend"  name="relation" <?php echo e(($object->relation == 'Friend')?'checked="checked"':""); ?> >Friend 
						           <input id="relation" type="radio" class="form-control " value="Father" name="relation" <?php echo e(($object->relation == 'Father')?'checked="checked"':""); ?>>Father
						         <input id="relation" type="radio" class="form-control " value="Mother" name="relation" <?php echo e(($object->relation == 'Mother')?'checked="checked"':""); ?>>Mother   
                            </div>
							<?php if($errors->has('relation')): ?>
                                                    <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('relation')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                        </div>
						<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Update')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/client/followerEdit.blade.php ENDPATH**/ ?>