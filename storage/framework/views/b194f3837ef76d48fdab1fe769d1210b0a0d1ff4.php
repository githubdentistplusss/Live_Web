<?php $page = 'register'; ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Content -->
    <div class="content" style="min-height:200px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 offset-md-2">

                    <!-- Account Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">

                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3><?php echo app('translator')->getFromJson('login.register'); ?></h3>
                                </div>
                                <?php if(Session::has('message')): ?>
                                    <div class="alert alert-success col-md-12">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        <?php echo Session::get('message'); ?>

                                    </div>
                                <?php elseif(Session::has('error_message')): ?>
                                    <div class="alert alert-danger col-md-12">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        <strong style="color: #000;"><?php echo Session::get('error_message'); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <!-- Register Form -->
                                <form method="POST" action="<?php echo e(route('clientRegister')); ?>">
                                    <?php echo csrf_field(); ?>

                                    <div class="form-group card-label">
                                        <label><?php echo app('translator')->getFromJson('login.name'); ?></label>
                                        <input class="form-control loginInput <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                            type="text" name="name" value="<?php echo e(old('name')); ?>" required="">

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
                                   
                                    <div class="form-group card-label">
                                        <label><?php echo app('translator')->getFromJson('login.mobile'); ?></label>
                                        <input class="form-control loginInput  <?php if ($errors->has('mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                            type="text" name="mobile" value="<?php echo e(old('mobile')); ?>" required="">

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
                                    <div class="form-group card-label">
                                        <label><?php echo app('translator')->getFromJson('login.password'); ?></label>
                                        <input required class="form-control loginInput <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                            type="password" name="password">

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
                                    <div class="form-group card-label">
                                        <label><?php echo app('translator')->getFromJson('login.re_pass'); ?></label>
                                        <input required class="form-control loginInput" type="password" name="password_confirmation">
                                    </div>
                                  

                                    <div class="form-group">
                                        <div class="form-check-inline">
                                            <div class="terms-accept">
                                                <div class="custom-checkbox">
                                                    <input class="form-check-input" required type="checkbox" value="">
                                                    <label for="terms_accept"><a
                                                            href="<?php echo e(route('terms')); ?>"><?php echo app('translator')->getFromJson('login.privacy'); ?></a></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">
                                        <?php echo app('translator')->getFromJson('login.register'); ?></button>
                                    <div class="text-right pt-2">
                                        <a class="forgot-link" href="<?php echo e(route('clientlogin')); ?>">
                                            <?php echo app('translator')->getFromJson('login.hasAccount'); ?></a>
                                    </div>
                                    
                                </form>
                                <!-- /Register Form -->

                            </div>
                        </div>
                    </div>
                    <!-- /Account Content -->

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('views.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/client-register.blade.php ENDPATH**/ ?>