

<?php if(isset($object)): ?>

    <?php $__env->startSection('title','Edit Hospital'); ?>

<?php endif; ?>

<?php $__env->startSection('title','Edit Hospital'); ?>

<?php $__env->startSection('content'); ?>





    <?php if(isset($object) &&!empty($object)): ?>

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-content collapse show">

                            <div class="card-body">

                                <form enctype="multipart/form-data" id="hospital_form"
                                      action="<?php echo e(route('updatehospital', $object->id)); ?>"
                                      class="form ls_form validate_form" method="post">

                                    <?php echo e(csrf_field()); ?>


                                    <?php echo e(method_field('PUT')); ?>


                                    <div class="form-body">

                                        <h4 class="form-section"><i class="la la-paperclip"></i> Edit Hospital</h4>

                                        <div class="form-group col-md-12">

                                            <label for="hospital_name_ar">

                                                Arabic Name

                                            </label>

                                            <input type="text" id="hospital_name_ar"
                                                   class="form-control validate[required]" name="hospital_name_ar"
                                                   value="<?php echo e($object->hospital_name_ar); ?>" autofocus>

                                            <?php if($errors->has('hospital_name_ar')): ?>

                                                <span class="help-block text-danger">

                                                    <strong><?php echo e($errors->first('hospital_name_ar')); ?></strong>

                                                </span>

                                            <?php endif; ?>

                                        </div>

                                        <div class="form-group col-md-12">

                                            <label for="hospital_name_en">

                                                English Name

                                            </label>

                                            <input type="text" id="hospital_name_en"
                                                   class="form-control validate[required]" name="hospital_name_en"
                                                   value="<?php echo e($object->hospital_name_en); ?>">

                                            <?php if($errors->has('hospital_name_en')): ?>

                                                <span class="help-block text-danger">

                                                    <strong><?php echo e($errors->first('hospital_name_en')); ?></strong>

                                                </span>

                                            <?php endif; ?>

                                        </div>

                                        <div class="form-group col-md-12">

                                            <label for="hospital_desc_ar">

                                                Arabic Address

                                            </label>

                                            <input type="text" id="hospital_address_ar"
                                                   class="form-control validate[required]" name="hospital_address_ar"
                                                   value="<?php echo e($object->hospital_address_ar); ?>">


                                            <?php if($errors->has('hospital_address_ar')): ?>

                                                <span class="help-block text-danger">

                                                    <strong><?php echo e($errors->first('hospital_address_ar')); ?></strong>

                                                </span>

                                            <?php endif; ?>

                                        </div>


                                        <div class="form-group col-md-12">

                                            <label for="hospital_desc_ar">

                                                English Address

                                            </label>

                                            <input type="text" id="hospital_address_en"
                                                   class="form-control validate[required]" name="hospital_address_en"
                                                   value="<?php echo e($object->hospital_address_en); ?>">


                                            <?php if($errors->has('hospital_address_en')): ?>

                                                <span class="help-block text-danger">

                                                    <strong><?php echo e($errors->first('hospital_address_en')); ?></strong>

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
                                        <div class="form-group col-md-12">
                                                <div class="col-md-6">		
                                                     <input <?php echo e(($object->active)?'checked="checked"':""); ?> type="checkbox" id="active"  name="active" value="1"/>
                                                     Display dates?		
                                                    </div>			
                                        </div>
                                        <div class="form-group col-md-12">

                                            <label for="city">

                                                City

                                            </label>


                                            <select class="form-control validate[required]" required name="city_id">
                                                <option>Select City</option>
                                                <?php $__currentLoopData = $citys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e(($object->city_id == $city->id)?'selected="selected"':""); ?> value="<?php echo e($city->id); ?>">  <?php echo e($city->city_name_en); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>


                                            <?php if($errors->has('city_id')): ?>

                                                <span class="help-block text-danger">

                                                    <strong><?php echo e($errors->first('city_id')); ?></strong>

                                                </span>

                                            <?php endif; ?>

                                        </div>


                                        <div class="form-group col-md-12">
                                            <label class="col-lg-12 control-label text-lg-right pt-2"
                                                   for="req_map_location"><?php echo app('translator')->getFromJson('location'); ?></label>
                                            <div class="col-lg-12">
                                                <input type="text" style="width:70%;margin-top: 10px;" id="pac-input"
                                                       class="form-control">
                                                <?php  $location = (!empty($object->req_map_location)) ? $object->req_map_location : "26.4214,50.0812";
                                                 $latitude = (!empty($object->latitude)) ? $object->latitude : "";
                                                 $longitude = (!empty($object->longitude)) ? $object->longitude : "";
                                                  ?>
                                                <input type="hidden" readonly="readonly" id="req_map_location"
                                                       name="req_map_location" value="<?=$location?>"/>

                                                       <input type="hidden" readonly="readonly" id="latitude"
                                                       name="latitude" value="<?=$latitude?>"/>

                                                       <input type="hidden" readonly="readonly" id="longitude"
                                                       name="longitude" value="<?=$longitude?>"/>

                                                <div id="googlemaps" style="width:100%;height:480px"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions text-center">

                                        <button type="submit" class="btn btn-primary  box-shadow-1 ml-1">Edit</button>

                                        <a href="<?php echo e(route('showhospital')); ?>" class="btn btn-warning box-shadow-1 mr-1">
                                            <i class="ft-x"></i>

                                            Back

                                        </a></div>
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

                                <form class="form ls_form validate_form" enctype="multipart/form-data"
                                      id="hospital_form" action="<?php echo e(route('storehospital')); ?>" method="post">

                                    <?php echo e(csrf_field()); ?>



                                    <div class="form-body">

                                        <h4 class="form-section"><i class="la la-paperclip"></i>Add Hospital</h4>

                                        <div class="form-group col-md-12">

                                            <label for="hospital_name_ar">

                                                Arabic Name

                                            </label>

                                            <input type="text" id="hospital_name_ar"
                                                   class=" form-control validate[required]" name="hospital_name_ar"
                                                   tabindex="1" autofocus>

                                            <?php if($errors->has('hospital_name_ar')): ?>

                                                <span class="help-block text-danger">

                                                    <strong><?php echo e($errors->first('hospital_name_ar')); ?></strong>

                                                </span>

                                            <?php endif; ?>

                                        </div>

                                        <div class="form-group col-md-12">

                                            <label for="hospital_name_en">

                                                English Name

                                            </label>

                                            <input type="text" id="hospital_name_en"
                                                   class=" form-control validate[required]" name="hospital_name_en"
                                                   tabindex="1">

                                            <?php if($errors->has('hospital_name_en')): ?>

                                                <span class="help-block text-danger">

                                                    <strong><?php echo e($errors->first('hospital_name_en')); ?></strong>

                                                </span>

                                            <?php endif; ?>

                                        </div>

                                        <div class="form-group col-md-12">

                                            <label for="hospital_desc_ar">
                                                Arabic address


                                            </label>

                                            <input type="text" id="hospital_address_ar"
                                                   class="form-control validate[required]" name="hospital_address_ar"
                                                   value="">


                                            <?php if($errors->has('hospital_address_ar')): ?>

                                                <span class="help-block text-danger">

                                                    <strong><?php echo e($errors->first('hospital_address_ar')); ?></strong>

                                                </span>

                                            <?php endif; ?>

                                        </div>


                                        <div class="form-group col-md-12">

                                            <label for="hospital_desc_ar">

                                                English address

                                            </label>

                                            <input type="text" id="hospital_address_en"
                                                   class="form-control validate[required]" name="hospital_address_en"
                                                   value="">


                                            <?php if($errors->has('hospital_address_en')): ?>

                                                <span class="help-block text-danger">

                                                    <strong><?php echo e($errors->first('hospital_address_en')); ?></strong>

                                                </span>

                                            <?php endif; ?>

                                        </div>
                                        <div class="form-group col-md-12">

                                        <label for="sort">

                                           Sort Number

                                        </label>

                                        <input type="number" id="sort" value="0"
                                            class=" form-control" min='0' name="sort">

                                        <?php if($errors->has('sort')): ?>

                                            <span class="help-block text-danger">

                                                <strong><?php echo e($errors->first('sort')); ?></strong>

                                            </span>

                                        <?php endif; ?>

                                        </div>

                                        <div class="form-group col-md-12">
                                                <div class="col-md-6">
                                                     <input <?php echo e((!empty(old('active')) && old('active') == 1)?'checked="checked"':""); ?> type="checkbox" id="active"  name="active" value="1"/>
                                                    Display dates?		
                                                    </div>			
                                        </div>
                                        <div class="form-group col-md-12">

                                            <label for="city">

                                                City

                                            </label>


                                            <select class="form-control validate[required]" required name="city_id">
                                                <option>Select City</option>
                                                <?php $__currentLoopData = $citys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($city->id); ?>">  <?php echo e($city->city_name_en); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>


                                            <?php if($errors->has('city_id')): ?>

                                                <span class="help-block text-danger">

                                                    <strong><?php echo e($errors->first('city_id')); ?></strong>

                                                </span>

                                            <?php endif; ?>

                                        </div>


                                        <div class="form-group col-md-12">
                                            <label class="col-lg-3 control-label text-lg-right pt-2"
                                                   for="req_map_location"><?php echo app('translator')->getFromJson('location'); ?></label>
                                            <div class="col-lg-12">
                                                <input type="text" style="width:70%;margin-top: 10px;" id="pac-input"
                                                       class="form-control">
                                                <?php  $location = (!empty(old('req_map_location'))) ? old('req_map_location') : "26.4214,50.0812";
                                                 $latitude = (!empty(old('latitude'))) ? old('latitude') : "";
                                                 $longitude = (!empty(old('longitude'))) ? old('longitude') : "";  ?>

                                                <input type="hidden" readonly="readonly" id="req_map_location"
                                                       name="req_map_location" value="<?=$location?>"/>

                                                       <input type="hidden" readonly="readonly" id="latitude"
                                                       name="latitude" value="<?=$latitude?>"/>

                                                       <input type="hidden" readonly="readonly" id="longitude"
                                                       name="longitude" value="<?=$longitude?>"/>

                                                <div id="googlemaps" style="width:100%;height:480px"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions text-center">

                                        <button type="submit" class="btn btn-primary  box-shadow-1 ml-1"><i
                                                    class="la la-check-square-o"></i>

                                            Add
                                        </button>

                                        <a href="<?php echo e(route('showhospital')); ?>" class="btn btn-warning box-shadow-1 mr-1">
                                            <i class="ft-x"></i>

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
<?php $__env->startSection('script'); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bsamat/public_html/demo/dentistplus/resources/views/backstage/hospitals/edit.blade.php ENDPATH**/ ?>