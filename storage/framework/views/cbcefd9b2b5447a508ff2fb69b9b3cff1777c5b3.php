<?php $__env->startSection('content'); ?>
 <main class="main-content">
 <section class="register">
        <div class="title">
          <div class="container">
            <h2><?php echo app('translator')->getFromJson('login.dregister'); ?></h2>
          </div>
        </div>
        <div class="container">
          <div class="content">
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
                    <form method="POST" action="<?php echo e(route('dentistRegister')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
<div class="form-group row">
                            <h4><?php echo app('translator')->getFromJson('login.nation_id'); ?></h4>

                         
                                <input id="nation_id" type="text" class="form-control loginInput <?php if ($errors->has('nation_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nation_id'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="nation_id" value="<?php echo e(old('nation_id')); ?>" required autocomplete="nation_id" autofocus>

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
                      

                        <div class="form-group row">
                           <h4><?php echo app('translator')->getFromJson('login.name'); ?></h4>

                            
                                <input id="name" type="text" class="form-control loginInput <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>

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
                       
                        <div class="form-group row">
                           <h4><?php echo app('translator')->getFromJson('login.email'); ?></h4>

                            
                                <input id="email" type="email" class="form-control loginInput <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">

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
<div class="form-group row">
                            <h4><?php echo app('translator')->getFromJson('login.mobile'); ?></h4>

                           
                                <input id="mobile" type="text" class="form-control <?php if ($errors->has('mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> loginInput" name="mobile" value="<?php echo e(old('mobile')); ?>" required autocomplete="mobile">

                                <?php if ($errors->has('mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                           
                        </div>

                        <div class="form-group row">
                            <h4><?php echo app('translator')->getFromJson('login.password'); ?></h4>

                           
                                <input id="password" type="password" class="form-control loginInput  <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required autocomplete="new-password">

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

                        <div class="form-group row">
                            <h4><?php echo app('translator')->getFromJson('login.re_pass'); ?></h4>

                           
                                <input id="password-confirm" type="password" class="form-control loginInput" name="password_confirmation" required autocomplete="new-password">
                            </div>
                       
 <div class="form-group row">
                                               <h4><?php echo app('translator')->getFromJson('login.nationality'); ?></h4>
                                       <select class="form-control loginInput form-control-lg" name="nationality" id="nationality" required>
                                                    <option value=""><?php echo app('translator')->getFromJson('login.nationality'); ?></option>
                                                    <?php $__currentLoopData = $nationalitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nationality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php echo e((old('nationality') == $nationality->nationality)?'selected="selected"':""); ?> value="<?php echo e($nationality->id); ?>"><?php if( app()->getLocale()=='ar'): ?>
					<?php echo e($nationality->nationality_name_ar); ?>

					<?php elseif( app()->getLocale()=='en'): ?>
					<?php echo e($nationality->nationality_name_en); ?>

					<?php endif; ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

                                                <?php if($errors->has('nationality')): ?>
                                                    <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('nationality')); ?></strong>
                                                </span>
                                                <?php endif; ?>

                                            
                                            </div>

                                            <div class="form-group row">
                                               <h4><?php echo app('translator')->getFromJson('login.city'); ?></h4>
                                       <select class="form-control loginInput form-control-lg" name="city_id" id="city_id" required>
                                                    <option value=""><?php echo app('translator')->getFromJson('login.city'); ?></option>
                                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php echo e((old('city_id') == $city->id)?'selected="selected"':""); ?> value="<?php echo e($city->id); ?>"><?php if( app()->getLocale()=='ar'): ?>
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

                      <div class="form-group row">
                                               <h4><?php echo app('translator')->getFromJson('login.hospital'); ?></h4>
												
                                                <select class="form-control loginInput form-control-lg" name="hospital" id="hospital" required>
                                                    
                                                    <?php $__currentLoopData = $hospitals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hospital): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php echo e((old('hospital') == $hospital->hospital)?'selected="selected"':""); ?> value="<?php echo e($hospital->id); ?>">
														<?php if( app()->getLocale()=='ar'): ?>
					<?php echo e($hospital->hospital_name_ar); ?>

					<?php elseif( app()->getLocale()=='en'): ?>
					<?php echo e($hospital->hospital_name_en); ?>

					<?php endif; ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

                                                <?php if($errors->has('hospital')): ?>
                                                    <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('hospital')); ?></strong>
                                                </span>
                                                <?php endif; ?>

                                            
                                            </div>  
						 <div class="form-group row">
                                               <h4><?php echo app('translator')->getFromJson('login.gender'); ?></h4>
												
                                                <div class="form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" value="Male" name="gender" checked><?php echo app('translator')->getFromJson('login.male'); ?>
                </h4>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" value="Female" name="gender"><?php echo app('translator')->getFromJson('login.female'); ?>
                </h4>
              </div>

                                                <?php if($errors->has('gender')): ?>
                                                    <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('gender')); ?></strong>
                                                </span>
                                                <?php endif; ?>

                                           
                                            </div> 
								 <div class="form-group row">
                                               <h4><?php echo app('translator')->getFromJson('login.dgree'); ?></h4>
												
                                               <!-- <input id="dgree" type="text" class="form-control <?php if ($errors->has('dgree')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('dgree'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> loginInput" name="dgree" required >-->
<select id="dgree" type="text" class="form-control <?php if ($errors->has('dgree')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('dgree'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> loginInput" name="dgree" required>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7"><?php echo app('translator')->getFromJson('login.entern'); ?></option>
</select>
                                                <?php if($errors->has('dgree')): ?>
                                                    <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('dgree')); ?></strong>
                                                </span>
                                                <?php endif; ?>

                                            
                                            </div>
											  <div class="form-group row">
                           <h4><?php echo app('translator')->getFromJson('login.birthdate'); ?></h4>

                             <!-- <input class="form-control datetimepicker-input loginInput" type="text" id="datetimepickerDate" name="birthdate" required data-toggle="datetimepicker" data-target="#datetimepickerDate">-->
							   <input id="datetimepickerDate1" type="text" class="form-control loginInput" value="" data-toggle="datetimepicker" data-target="#datetimepickerDate1" name="birthdate" >
                             <!--   <input id="birthdate" type="text" class="form-control loginInput date-picker" name="birthdate" >-->
                           
                        </div> 
											 <div class="form-group">

                                    <h4>

                                  <?php echo app('translator')->getFromJson('login.uPhoto'); ?>     

                                    </h4>



                                    <input type="file" required="required"   class="form-control loginInput" name="photo" >

                                   
                                <?php if($errors->has('photo')): ?>

                                        <span class="help-block text-danger">

                                        <strong><?php echo e($errors->first('photo')); ?></strong>

                                    </span>

                                    <?php endif; ?>

                                </div>
 <div class="form-group">

                                  <h4>

                                   <?php echo app('translator')->getFromJson('login.pPhoto'); ?>   

                                    </h4>



                                    <input type="file"   class="form-control loginInput" name="profile_photo" >

                                   
                                <?php if($errors->has('profile_photo')): ?>

                                        <span class="help-block text-danger">

                                        <strong><?php echo e($errors->first('profile_photo')); ?></strong>

                                    </span>

                                    <?php endif; ?>

                                </div>
                                 <div class="form-group">
              <div class="form-check-inline">
                <div class="form-check-label">
                  <input class="form-check-input" required type="checkbox" value="">
			<a class="loginA" href="<?php echo e(route('terms')); ?>"> 	  <?php echo app('translator')->getFromJson('login.privacy'); ?> </a>
                </div>
              </div>
            </div>
						<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  <?php echo app('translator')->getFromJson('login.dregister'); ?>  
                                </button>
                            </div>
                            
                        </div>
                        <div class="form-group text-center"><a class="loginA" href="<?php echo e(route('dentistlogin')); ?>">  <?php echo app('translator')->getFromJson('login.hasAccount'); ?></a></div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/freedentist/resources/views/vendor/register.blade.php ENDPATH**/ ?>