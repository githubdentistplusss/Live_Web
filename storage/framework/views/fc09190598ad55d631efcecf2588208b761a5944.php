<?php $__env->startSection('title','Hospitals'); ?>

<?php $__env->startSection('content'); ?>

    <?php if(isset($objects)): ?>

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-header">

                            <div class="heading-elements" style='display: inline-block'>

                                <a href="<?php echo e(route('addhospital')); ?>"
                                   class="btn btn-primary box-shadow-1  btn-min-width ml-1 mr-1">Add New</a>

                            </div>
                            
                            <!--<div class="col-md-6" style='float: right ;display: inline-block;z-index:9999'>-->
                                
                            <!--    <form action="<?php echo e(route('showhospital')); ?>" method="GET">-->
                            <!--        <div class="input-group">-->
                            <!--            <input type="text" class="form-control" name="search" placeholder="Search for..." value="<?php echo e(isset($searchTerm) ? $searchTerm : ''); ?>">-->
                            <!--            <span class="input-group-btn">-->
                            <!--                <button class="btn btn-secondary" type="submit">Search</button>-->
                            <!--            </span>-->
                            <!--        </div>-->
                            <!--    </form>-->
                            <!--</div>-->

                        </div>

                        <div class="card-content collapse show">

                            <div class="card-body">

                                <!--Table Wrapper Start-->

                                <div class="table-responsive ls-table">

                                    <table id="myTable" class="display" style="width:100%,z-index:9999">

                                    <!--<table class="table table-bordered table-striped">-->

                                        <thead>

                                        <tr>

                                            <th>#</th>


                                            <th>Hospital name arabic</th>
                                            <th>Hospital name english</th>


                                            <th class="text-center">Actions</th>

                                        </tr>

                                        </thead>

                                        <tbody>

                                        <?php if(($objects)): ?>


                                            <?php $__currentLoopData = $objects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <tr>

                                                    <td><?php echo e($object->sort); ?></td>



                                                    <td><?php echo e($object->hospital_name_ar); ?></td>

                                                    <td><?php echo e($object->hospital_name_en); ?></td>

                                                    <td>
                                                        <div class="container">

                                                            <div class="row">

                                                                

                                                                    

                                                                        <a href="<?php echo e(route('edithospital', $object->id)); ?>"
                                                                           class="btn btn-icon btn-pure info"><i
                                                                                    class="ft-settings"></i>Edit</a>

                                                                    

                                                                



                                                                    



                                                                        <form action="<?php echo e(route('deletehospital', $object->id)); ?>"
                                                                              method="post">

                                                                            <?php echo e(csrf_field()); ?>


                                                                            <?php echo e(method_field('DELETE')); ?>


                                                                            <button class="btn btn-icon btn-pure danger"
                                                                                    type="submit"
                                                                                    onclick="return confirm('انت على وشك حذف عنصر. هل أنت متأكد ؟!');">
                                                                                <i class="ft-trash-2"></i>Delete
                                                                            </button>

                                                                        </form>

                                                                    

                                                            </div>


                                                        </div>
                                                    </td>

                                                </tr>





                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php else: ?>

                                            <tr>

                                                <td colspan="7">No hospitals found</td>

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shahin/Sites/dentist-backend/resources/views/backstage/hospitals/index.blade.php ENDPATH**/ ?>