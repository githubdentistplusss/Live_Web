

<?php $__env->startSection('content'); ?>
<main class="main-content">
      <!--login section-->
      <section class="login">
        <div class="title">
          <div class="container">
            <h2><?php echo app('translator')->getFromJson('login.cLogin'); ?></h2>
			 <?php if(Session::has('message')): ?>
		
                    <div class="alert alert-success col-md-12">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo Session::get('message'); ?>

                    </div>
            <?php elseif(Session::has('error_message')): ?>
                <div class="alert alert-danger col-md-12">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong style="color: #FFFFFF;"><?php echo Session::get('error_message'); ?></strong>
                </div>
            <?php endif; ?>
          </div>
        </div>
		 <div class="container">
          <div class="content">
          <?php if(isset($loginerror)): ?>
          <div class="alert alert-danger">
                    <strong style="color: red;"><?php echo e($loginerror); ?></strong>
                </div>
				<?php endif; ?>
                    <form method="POST" action="<?php echo e(route('clientlogin')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
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

                        <div class="form-group row">
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
                        
                        
                        <div class="form-group row ">
                               <button type="submit" class="btn btn-primary">
                                    <?php echo app('translator')->getFromJson('login.login'); ?>
                                </button>
</div>
<div class="form-group form-group-flex">
                                <?php if(Route::has('password.request')): ?>
                                    <a class="btn btn-link" href="<?php echo e(route('uForgetPassword')); ?>">
                                     <?php echo app('translator')->getFromJson('login.forget'); ?>   
                                    </a>
                                <?php endif; ?>
								<a class="loginA" href="<?php echo e(route('clientRegister')); ?>">  <?php echo app('translator')->getFromJson('login.register'); ?>  </a>
								</div>
                    </form>
                </div>
            </div>
        </section>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/client/login.blade.php ENDPATH**/ ?>