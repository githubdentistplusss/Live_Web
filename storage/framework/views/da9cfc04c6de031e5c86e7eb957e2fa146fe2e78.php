<?php if(isset($object)): ?>    <?php $__env->startSection('title','Edit offer'); ?><?php endif; ?><?php $__env->startSection('title','Edit offer'); ?><?php $__env->startSection('content'); ?>    <?php if(isset($object) &&!empty($object)): ?>        <div class="container">            <div class="row">                <div class="col-md-12">                    <div class="card">                        <div class="card-content collapse show">                            <div class="card-body">                                <form enctype="multipart/form-data" id="offer_form" action="<?php echo e(route('updateoffer', $object->id)); ?>" class="form ls_form validate_form" method="post">                                    <?php echo e(csrf_field()); ?>                                    <?php echo e(method_field('PUT')); ?>                                    <div class="form-body">                                        <h4 class="form-section"><i class="la la-paperclip"></i> Edit offer</h4>                                        <div class="form-group col-md-8">                                            <label for="offer_name_ar">                                               URL                                            </label>                                            <input type="text" id="link" class="form-control " name="link" value="<?php echo e($object->link); ?>" autofocus>                                            <?php if($errors->has('link')): ?>                                                <span class="help-block text-danger">                                                    <strong><?php echo e($errors->first('link')); ?></strong>                                                </span>                                            <?php endif; ?>                                        </div>                                        <div class="form-group col-md-8">                                            <label for="offer_name_en">                                                Photo                                            </label>                                            <input type="file"   class="form-control" name="photo" ><br/>                                    <img class="img-thumbnail img-responsive" width="70" height="70" src="<?php echo e(asset('public/images/'.$object->photo)); ?>" alt="">                                <?php if($errors->has('photo')): ?>                                        <span class="help-block text-danger">                                        <strong><?php echo e($errors->first('photo')); ?></strong>                                    </span>                                    <?php endif; ?>                                        </div>                                                                            </div>                                    <div class="form-actions text-center">                                        <button type="submit" class="btn btn-primary  box-shadow-1 ml-1">Edit</button>                                        <a  href="<?php echo e(route('showoffer')); ?>" class="btn btn-warning box-shadow-1 mr-1"> <i class="ft-x"></i>                                            Back                                        </a> </div>                                </form>                            </div>                        </div>                    </div>                </div>            </div>        </div>    <?php else: ?>        <div class="container">            <div class="row">                <div class="col-md-12">                    <div class="card">                        <div class="card-content collapse show">                            <div class="card-body">                                <form  class="form ls_form validate_form" enctype="multipart/form-data" id="offer_form" action="<?php echo e(route('storeoffer')); ?>"  method="post">                                    <?php echo e(csrf_field()); ?>                                    <div class="form-body">                                        <h4 class="form-section"><i class="la la-paperclip"></i> Add offer</h4>                                        <div class="form-group col-md-8">                                            <label for="offer_name_ar">                                               Url                                            </label>                                                                                     <input type="text" id="link" class="form-control " name="link" value="" >                                            <?php if($errors->has('link')): ?>                                                <span class="help-block text-danger">                                                    <strong><?php echo e($errors->first('link')); ?></strong>                                                </span>                                            <?php endif; ?>                                        </div>                                        <div class="form-group col-md-8">                                            <label for="offer_name_en">                                                Photo                                            </label>                                             <input type="file"   class="form-control" name="photo" >                                                                   <?php if($errors->has('photo')): ?>                                        <span class="help-block text-danger">                                        <strong><?php echo e($errors->first('photo')); ?></strong>                                    </span>                                    <?php endif; ?>                                        </div>                                          </div>                                    <div class="form-actions text-center">                                        <button type="submit" class="btn btn-primary  box-shadow-1 ml-1"> <i class="la la-check-square-o"></i>                                            Add                                </button>                                        <a  href="<?php echo e(route('showoffer')); ?>" class="btn btn-warning box-shadow-1 mr-1"> <i class="ft-x"></i>                                            Back                                        </a>                                    </div>                                </form>                            </div>                        </div>                    </div>                </div>            </div>        </div>    <?php endif; ?><?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/backstage/offers/edit.blade.php ENDPATH**/ ?>