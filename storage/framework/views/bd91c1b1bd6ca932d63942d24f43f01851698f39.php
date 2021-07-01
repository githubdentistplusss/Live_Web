<option><?php echo app('translator')->getFromJson('login.select'); ?></option>
<?php if(!empty($hospitals)): ?>

    <?php $__currentLoopData = $hospitals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?><?php /**PATH /home/bsamat/public_html/demo/dentistplus/resources/views/ajax-select-hospital.blade.php ENDPATH**/ ?>