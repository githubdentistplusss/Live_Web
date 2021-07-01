<?php if(Session::has('error_message')): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo e(Session::get('error_message')); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('error')): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo e(Session::get('error')); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('success')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(Session::get('success')); ?>

    </div>
<?php endif; ?><?php /**PATH /home/bsamat/public_html/demo/dentistplus/resources/views/messenger/partials/flash.blade.php ENDPATH**/ ?>