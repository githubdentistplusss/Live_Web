<?php $__env->startSection('content'); ?>
 <main class="main-content">
      <!--login section-->
      <section class="login">
        <div class="title">
          <div class="container">
            <h2><?php echo app('translator')->getFromJson('login.dLogin'); ?></h2>
          </div>
        </div>
		 <div class="container">
          <div class="content">
                    <form method="POST" action="<?php echo e(route('dentistlogin')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                           <h4><?php echo app('translator')->getFromJson('login.mobile'); ?></h4>

                            
                                <input id="mobile" type="text" class="form-control loginInput <?php if ($errors->has('mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="mobile" value="<?php echo e(old('mobile')); ?>" required autocomplete="mobile" autofocus>

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

                        <div class="form-group">
                           <h4><?php echo app('translator')->getFromJson('login.password'); ?></h4>

                            
                                <input id="password" type="password" class="form-control loginInput <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required autocomplete="current-password">

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
                           
                                <button type="submit" class="btn-banner">
                                  <?php echo app('translator')->getFromJson('login.login'); ?>
                                </button>

                               </div>
								 <div class="form-group form-group-flex"> 
                                    <a class="loginA" href="<?php echo e(route('dForgetPassword')); ?>">
                                    <?php echo app('translator')->getFromJson('login.forget'); ?>
                                    </a>
                                <a class="loginA" href="<?php echo e(route('dentistRegister')); ?>"><?php echo app('translator')->getFromJson('login.dregister'); ?> </a></div>
                           
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/vendor/login.blade.php ENDPATH**/ ?>