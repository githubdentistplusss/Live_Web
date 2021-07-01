
<?php $__env->startSection('content'); ?>

    <main class="content p-0">
        <!-- Page Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 center">
                    <!-- Login Tab Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="assets/assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">
                            </div>
                            <div class="col-md-12 col-lg-6 login-right p-4">
                                <div class="p-5">
                                    <div class="login-header">
                                        <h3><?php echo app('translator')->getFromJson('login.dLogin'); ?></h3>
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
                                            <strong style="color: #FFFFFF;"><?php echo Session::get('error_message'); ?></strong>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(isset($loginerror)): ?>
                                        <div class="alert alert-danger">
                                            <strong style="color: red;"><?php echo e($loginerror); ?></strong>
                                        </div>
                                    <?php endif; ?>
                                    <form method="POST" action="<?php echo e(route('dentistlogin')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group form-focus">
                                            <input id="mobile" type="text"
                                                class="form-control floating <?php if ($errors->has('mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                name="mobile" value="<?php echo e(old('mobile')); ?>" required autocomplete="mobile"
                                                autofocus>
                                            <label class="focus-label"><?php echo app('translator')->getFromJson('login.mobile'); ?></label>
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
                                        <div class="form-group form-focus">
                                            <input id="password" type="password"
                                                class="form-control floating <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                name="password" required autocomplete="current-password">
                                            <label class="focus-label"><?php echo app('translator')->getFromJson('login.password'); ?></label>
                                        </div>
                                        <div class="text-right">
                                            <a class="forgot-link" href="<?php echo e(route('dForgetPassword')); ?>">
                                                <?php echo app('translator')->getFromJson('login.forget'); ?>
                                            </a>

                                        </div>
                                        <button class="btn btn-primary btn-block btn-lg login-btn"
                                            type="submit">دخول</button>
                                        <div class="login-or">
                                            <span class="or-line"></span>
                                            <span class="span-or">or</span>
                                        </div>
                                        <div class="text-center dont-have"><a class="loginA"
                                                href="<?php echo e(route('dentistRegister')); ?>"><?php echo app('translator')->getFromJson('login.dregister'); ?> </a></div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Login Tab Content -->
                </div>
            </div>

        </div>

        <!-- /Page Content -->

    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('views.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/dentist-login.blade.php ENDPATH**/ ?>