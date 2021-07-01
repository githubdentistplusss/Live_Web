

<?php if(isset($object)): ?>

    <?php $__env->startSection('title','Edit Service'); ?>

<?php endif; ?>

<?php $__env->startSection('title','Edit Service'); ?>

<?php $__env->startSection('content'); ?>





    <?php if(isset($object) &&!empty($object)): ?>

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-content collapse show">

                            <div class="card-body">

                                <form enctype="multipart/form-data" id="service_form" action="<?php echo e(route('updateservice', $object->id)); ?>" class="form ls_form validate_form" method="post">

                                    <?php echo e(csrf_field()); ?>


                                    <?php echo e(method_field('PUT')); ?>


                                    <div class="form-body">

                                        <h4 class="form-section"><i class="la la-paperclip"></i> Edit Service</h4>

                                        <div class="form-group col-md-8">

                                            <label for="service_name_ar">

                                              Arabic Name

                                            </label>

                                            <input type="text" id="service_name_ar" class="form-control validate[required]" name="service_name_ar" value="<?php echo e($object->service_name_ar); ?>" autofocus>

                                            <?php if($errors->has('service_name_ar')): ?>

                                                <span class="help-block text-danger">

                                                    <strong><?php echo e($errors->first('service_name_ar')); ?></strong>

                                                </span>

                                            <?php endif; ?>

                                        </div>

                                        <div class="form-group col-md-8">

                                            <label for="service_name_en">

                                                English Name

                                            </label>

                                            <input type="text" id="service_name_en" class="form-control validate[required]" name="service_name_en" value="<?php echo e($object->service_name_en); ?>" >

                                            <?php if($errors->has('service_name_en')): ?>

                                                <span class="help-block text-danger">

                                                    <strong><?php echo e($errors->first('service_name_en')); ?></strong>

                                                </span>

                                            <?php endif; ?>

                                        </div>

                                      
                                        <div class="form-group col-md-12">

                                        <label for="sort">

                                            Sort Number

                                        </label>

                                        <input type="number" id="sort"
                                            class="form-control"  min='0' name="sort"
                                            value="<?php echo e($object->sort); ?>">


                                        <?php if($errors->has('sort')): ?>

                                            <span class="help-block text-danger">

                                                <strong><?php echo e($errors->first('sort')); ?></strong>

                                            </span>

                                        <?php endif; ?>

                                        </div>

 
                                    </div>

                                    <div class="form-actions text-center">

                                        <button type="submit" class="btn btn-primary  box-shadow-1 ml-1">Added</button>

                                        <a  href="<?php echo e(route('showservice')); ?>" class="btn btn-warning box-shadow-1 mr-1"> <i class="ft-x"></i>

                                            Back

                                        </a> </div>

                                </form>



                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    <?php else: ?>

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-content collapse show">

                            <div class="card-body">

                                <form  class="form ls_form validate_form" enctype="multipart/form-data" id="service_form" action="<?php echo e(route('storeservice')); ?>"  method="post">

                                    <?php echo e(csrf_field()); ?>




                                    <div class="form-body">

                                        <h4 class="form-section"><i class="la la-paperclip"></i> Add Service</h4>

                                        <div class="form-group col-md-8">

                                            <label for="service_name_ar">

                                               Arabic Name

                                            </label>

                                            <input type="text" id="service_name_ar"  class=" form-control validate[required]" name="service_name_ar" tabindex="1" autofocus>

                                            <?php if($errors->has('service_name_ar')): ?>

                                                <span class="help-block text-danger">

                                                    <strong><?php echo e($errors->first('service_name_ar')); ?></strong>

                                                </span>

                                            <?php endif; ?>

                                        </div>

                                        <div class="form-group col-md-8">

                                            <label for="service_name_en">

                                               English Name

                                            </label>

                                            <input type="text" id="service_name_en"  class=" form-control validate[required]" name="service_name_en" tabindex="1" >

                                            <?php if($errors->has('service_name_en')): ?>

                                                <span class="help-block text-danger">

                                                    <strong><?php echo e($errors->first('service_name_en')); ?></strong>

                                                </span>

                                            <?php endif; ?>

                                        </div>
                                        <div class="form-group col-md-12">

                                                <label for="sort">

                                                Sort Number

                                                </label>

                                                <input type="number" id="sort"
                                                    class=" form-control" value="0" min='0' name="sort">

                                                <?php if($errors->has('sort')): ?>

                                                    <span class="help-block text-danger">

                                                        <strong><?php echo e($errors->first('sort')); ?></strong>

                                                    </span>

                                                <?php endif; ?>

                                                </div>

                                      
                                    </div>

                                    <div class="form-actions text-center">

                                        <button type="submit" class="btn btn-primary  box-shadow-1 ml-1"> <i class="la la-check-square-o"></i>

                                            Add                                </button>

                                        <a  href="<?php echo e(route('showservice')); ?>" class="btn btn-warning box-shadow-1 mr-1"> <i class="ft-x"></i>

                                            Back

                                        </a>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bsamat/public_html/demo/dentistplus/resources/views/backstage/services/edit.blade.php ENDPATH**/ ?>