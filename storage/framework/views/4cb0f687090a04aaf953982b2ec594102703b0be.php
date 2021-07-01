

<?php $__env->startSection('title','services'); ?>

<?php $__env->startSection('content'); ?>

    

    <?php if(isset($objects)): ?>

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-header">

                            <div class="heading-elements">

                              <a href="<?php echo e(route('addservice')); ?>" class="btn btn-primary box-shadow-1  btn-min-width ml-1 mr-1">Add new</a>



                            </div>

                        </div>

                        <div class="card-content collapse show">

                            <div class="card-body">

                                <!--Table Wrapper Start-->

                                <div class="table-responsive ls-table">

                                    <table class="table table-bordered table-striped">

                                        <thead>

                                        <tr>

                                            <th>#</th>

                                           

                                            <th>Service Name arabic</th>
                                            <th>Service Name English</th>

                                          
                                            <th class="text-center">Actions</th>

                                        </tr>

                                        </thead>

                                        <tbody>

                                          <?php if(($objects)): ?>



                                         



                                          <?php $__currentLoopData = $objects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
                                          <tr>

                                          <td><?php echo e($object->sort); ?></td>

                                         

                                          <td><?php echo e($object->service_name_ar); ?></td>

                                          <td><?php echo e($object->service_name_en); ?></td>

                                          <td><div class="container">

                                              <div class="row">

                                                      <?php $__currentLoopData = Auth::user()->permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                      <?php if($per->per_name == 'editservice'): ?>



                                          <a href="<?php echo e(route('editservice', $object->id)); ?>" class="btn btn-icon btn-pure info"><i class="ft-settings"></i>Edit</a>

                                                  <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                  <?php $__currentLoopData = Auth::user()->permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                                                  <?php if($per->per_name == 'deleteservice'): ?>



                                                        <form action="<?php echo e(route('deleteservice', $object->id)); ?>" method="post">

                                                            <?php echo e(csrf_field()); ?>


                                                            <?php echo e(method_field('DELETE')); ?>


                                                            <button class="btn btn-icon btn-pure danger" type="submit" onclick="return confirm('انت على وشك حذف عنصر. هل أنت متأكد ؟!');"><i class="ft-trash-2"></i>Delete</button>

                                                        </form>

                                                        <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                  </div>



                                          </div></td>

                                      </tr>



                                     

                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                      <?php else: ?>

                                          <tr>

                                              <td colspan="7">No service found</td>

                                          </tr>

                                      <?php endif; ?>

                                    </tbody>



                                    </table>

                                </div>

                                <!--Table Wrapper Finish-->

                                 <?php echo e($objects->links()); ?>


                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </div>



    <?php endif; ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shahin/Sites/dentist-backend/resources/views/backstage/services/index.blade.php ENDPATH**/ ?>