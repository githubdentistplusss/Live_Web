<?php $__env->startSection('content'); ?>
 <main class="main-content">
      <!--register section-->
      <!--modal-->
      <div class="modal" id="registerModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="text-center">
                <h4 class="blue2">من فضلك قم بإدخال الأربع الأرقام المرسلة حتى تستطيع تفعيل الحساب</h4>
                <h4 class="blue">01117135734</h4>
                <div class="code-enter">
                  <input class="form-control loginInput" type="number" maxlength="4">
                  <input class="form-control loginInput" type="number" maxlength="4">
                  <input class="form-control loginInput" type="number" maxlength="4">
                  <input class="form-control loginInput" type="number" maxlength="4">
                </div>
                <h5 class="grey3">أرسل كود التفعيل مرة اخرى</h5>
                <button class="navBtn" id="activeBtn">تفعيل الحساب</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <section class="register">
        <div class="title">
          <div class="container">
            <h2><?php echo app('translator')->getFromJson('login.register'); ?> </h2>
          </div>
        </div>
        <div class="container">
          <div class="content">
		    <form method="POST" action="<?php echo e(route('clientRegister')); ?>">
                        <?php echo csrf_field(); ?>

	<!--<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>-->

            <div class="form-group">
              <h4><?php echo app('translator')->getFromJson('login.name'); ?></h4>
              <input class="form-control loginInput <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="name" required="">
            </div>
            <div class="form-group">
              <h4><?php echo app('translator')->getFromJson('login.mobile'); ?></h4>
              <input class="form-control loginInput  <?php if ($errors->has('mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="mobile" required="">
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
            <div class="form-group">
              <h4><?php echo app('translator')->getFromJson('login.password'); ?></h4>
              <input class="form-control loginInput <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="password" name="password">
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
            <div class="form-group">
              <h4><?php echo app('translator')->getFromJson('login.re_pass'); ?></h4>
              <input class="form-control loginInput" type="password" name="password_confirmation">
            </div>
            <div class="form-group">
              <h4><?php echo app('translator')->getFromJson('login.gender'); ?></h4>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" value="Male" name="gender" checked><?php echo app('translator')->getFromJson('login.male'); ?>
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" value="Female" name="gender"><?php echo app('translator')->getFromJson('login.female'); ?>
                </label>
              </div>
            </div>
            <div class="form-group">
              <h4><?php echo app('translator')->getFromJson('login.nationality'); ?></h4>
              <select class="form-control loginInput" name='nationality' required>
                <option><?php echo app('translator')->getFromJson('login.nationality'); ?></option>
				 <?php $__currentLoopData = $nationalitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nationality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option  value="<?php echo e($nationality->id); ?>"><?php if( app()->getLocale()=='ar'): ?>
					<?php echo e($nationality->nationality_name_ar); ?>

					<?php elseif( app()->getLocale()=='en'): ?>
					<?php echo e($nationality->nationality_name_en); ?>

					<?php endif; ?>
				</option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
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

            <div class="form-group">
              <h4><?php echo app('translator')->getFromJson('login.birthdate'); ?></h4>
              <!--<input class="form-control datetimepicker-input loginInput" type="text" id="datetimepickerDate" name="birthdate" required data-toggle="datetimepicker" data-target="#datetimepickerDate">-->
			   <input id="datetimepickerDate1" type="text" class="form-control loginInput" value="" data-toggle="datetimepicker" data-target="#datetimepickerDate1" name="birthdate" >
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
                            <div class="col-md-5 offset-md-5 mb-3">
                                <button type="submit" class="btn btn-primary">
                                  <?php echo app('translator')->getFromJson('login.register'); ?>
                                </button>
                            </div>
                            <div class="col-md-5 offset-md-5 pr-5"><a class="loginA" href="<?php echo e(route('clientlogin')); ?>">  <?php echo app('translator')->getFromJson('login.hasAccount'); ?></a></div>
                        </div>
    			</form>
          </div>
        </div>
      </section>
    </main>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/client/register.blade.php ENDPATH**/ ?>