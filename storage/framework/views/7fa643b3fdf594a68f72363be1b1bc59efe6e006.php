

<?php $__env->startSection('innercontent'); ?>

    <!-- Page Content -->
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?php echo app('translator')->getFromJson('resrv.change_password'); ?></h4>
            <div class="row">
                <div class="col-md-12 col-lg-12">

                    <!-- Change Password Form -->
                    <form>
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                        </div>
                    </form>
                    <!-- /Change Password Form -->

                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('views.client.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/client/change-password.blade.php ENDPATH**/ ?>