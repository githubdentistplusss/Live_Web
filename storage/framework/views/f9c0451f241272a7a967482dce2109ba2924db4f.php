<?php if(isset($auser)): ?>

<?php $__env->startSection('title','Edit Patient'); ?>

<?php endif; ?>

<?php $__env->startSection('title','Add Patient'); ?>

<?php $__env->startSection('content'); ?>





<?php if(isset($auser)): ?>

    <div class="container">

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-content collapse show">

                    <div class="card-body">

                        <form enctype="multipart/form-data" id="page_forme" action="<?php echo e(route('updatesick', $auser->id)); ?>" class="form ls_form validate_form" method="post">

                            <?php echo e(csrf_field()); ?>


                            <?php echo e(method_field('PUT')); ?>


                            <div class="form-body">

                                <h4 class="form-section"><i class="la la-paperclip"></i>Edit Patient</h4>

                                <div class="form-group col-md-8">

                                    <label for="name">

                                       Name

                                    </label>

                                    <input type="text" id="name" class="form-control validate[required]" name="name" required value="<?php echo e($auser->name); ?>" autofocus>

                                    <?php if($errors->has('name')): ?>

                                        <span class="help-block text-danger">

                                        <strong><?php echo e($errors->first('name')); ?></strong>

                                    </span>

                                    <?php endif; ?>

                                </div>

                               

                            

                                

                                    

                                        

                                    

                                    

                                           

                                    

                                        

                                        

                                    

                                    

                                

                                <div class="form-group col-md-8">

                                    <label for="password">

                                       Password

                                    </label>

                                    <input type="password" id="password"  value="" class="form-control validate[required]"

                                           name="password" >

                                    <?php if($errors->has('password')): ?>

                                        <span class="help-block text-danger">

                                        <strong><?php echo e($errors->first('password')); ?></strong>

                                    </span>

                                    <?php endif; ?>

                                </div>

                                <div class="form-group col-md-8">

                                    <label for="mobile">

                                       Mobile

                                    </label>

                                    <input id="mobile"  class="form-control validate[required]" value="<?php echo e($auser->mobile); ?>" name="mobile" >

                                    <?php if($errors->has('mobile')): ?>

                                        <span class="help-block text-danger">

                                        <strong><?php echo e($errors->first('mobile')); ?></strong>

                                    </span>

                                    <?php endif; ?>

                                </div>

                                <div class="form-group">
              <h4>Gender</h4>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" <?php echo e(($auser->gender == 'Male')?'checked="checked"':""); ?> value="Male" name="gender" >Male
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" <?php echo e(($auser->gender == 'Female')?'checked="checked"':""); ?> value="Female" name="gender">Female
                </label>
              </div>
            </div>
            <div class="form-group">
              <h4>nationality</h4>
              <select class="form-control loginInput" name='nationality' required>
                <option>nationality</option>
				 <?php $__currentLoopData = $nationalitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nationality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php echo e(($auser->nationality == $nationality->id)?'selected="selected"':""); ?> value="<?php echo e($nationality->id); ?>"><?php if( app()->getLocale()=='ar'): ?>
					<?php echo e($nationality->nationality_name_ar); ?>

					<?php elseif( app()->getLocale()=='en'): ?>
					<?php echo e($nationality->nationality_name_en); ?>

					<?php endif; ?>	
				</option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            
            
            
            
                                       <div class="form-group ">
                                            <label class="col-form-label text-md-right" for="nationality">City</label>
                                            <select class="form-control loginInput form-control-lg" name="city" id="city" required>
                                                <option value="">City</option>
                                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e($auser->city_id == $city->id ?'selected="selected"':""); ?> value="<?php echo e($city->id); ?>"><?php if( app()->getLocale()=='ar'): ?>
                                                            <?php echo e($city->city_name_ar); ?>

                                                        <?php elseif( app()->getLocale()=='en'): ?>
                                                            <?php echo e($nationality->city_name_en); ?>

                                                        <?php endif; ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                            <?php if($errors->has('city_id')): ?>
                                                <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('city_id')); ?></strong>
                                                </span>
                                            <?php endif; ?>


                                        </div>
                                        
                                        

            
            
            <div class="form-group">
              <h4>birthdate</h4>
              <input class="form-control datetimepicker-input loginInput" type="text" id="datetimepickerDate" name="birthdate" required data-toggle="datetimepicker" data-target="#datetimepickerDate" value="<?php echo e($auser->birthdate); ?>">
            </div>

                            </div>

                            <div class="form-actions text-center">

                                <button type="submit" class="btn btn-primary btn-min-width box-shadow-1 ml-1">Edit</button>

                                <a  href="<?php echo e(route('showuser')); ?>" class="btn btn-warning btn-min-width box-shadow-1 mr-1"> <i class="ft-x"></i>

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

                        <form enctype="multipart/form-data" id="page_forme" action="<?php echo e(route('storesick')); ?>" class="form ls_form validate_form" method="post">

                            <?php echo e(csrf_field()); ?>




                            <div class="form-body">

                                <h4 class="form-section"><i class="la la-paperclip"></i> اضافة عضو</h4>

                                <div class="form-group col-md-8">

                                    <label for="name">

                                       Name

                                    </label>

                                    <input type="text" id="name" class="form-control validate[required]" name="name" required value="" autofocus>

                                    <?php if($errors->has('name')): ?>

                                        <span class="help-block text-danger">

                                        <strong><?php echo e($errors->first('name')); ?></strong>

                                    </span>

                                    <?php endif; ?>

                                </div>

                               

                              

                                <div class="form-group col-md-8">

                                    <label for="email">

                                      Email

                                    </label>

                                    <input type="email" id="email" class="form-control validate[required]"

                                           name="email" >

                                    <?php if($errors->has('email')): ?>

                                        <span class="help-block text-danger">

                                        <strong><?php echo e($errors->first('email')); ?></strong>

                                    </span>

                                    <?php endif; ?>

                                </div>

                              

                                <div class="form-group col-md-8">

                                    <label for="password">

                                        Password

                                    </label>

                                    <input type="password" id="password" required class="form-control validate[required]"

                                           name="password" >

                                    <?php if($errors->has('password')): ?>

                                        <span class="help-block text-danger">

                                        <strong><?php echo e($errors->first('password')); ?></strong>

                                    </span>

                                    <?php endif; ?>

                                </div>

                                <div class="form-group col-md-8">

                                    <label for="mobile">

                            Mobile

                                    </label>

                                    <input id="mobile"  class="form-control validate[required]" name="mobile" >

                                    <?php if($errors->has('mobile')): ?>

                                        <span class="help-block text-danger">

                                        <strong><?php echo e($errors->first('mobile')); ?></strong>

                                    </span>

                                    <?php endif; ?>

                                </div>
<div class="form-group">
              <h4>Gender</h4>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" value="Male" name="gender" checked>Male
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" value="Female" name="gender">Female
                </label>
              </div>
            </div>
            <div class="form-group">
              <h4>nationality</h4>
              <select class="form-control loginInput" name='nationality' required>
                <option>nationality</option>
				 <?php $__currentLoopData = $nationalitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nationality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php echo e((old('nationality_id') == $nationality->nationality_id)?'selected="selected"':""); ?> value="<?php echo e($nationality->id); ?>"><?php if( app()->getLocale()=='ar'): ?>
					<?php echo e($nationality->nationality_name_ar); ?>

					<?php elseif( app()->getLocale()=='en'): ?>
					<?php echo e($nationality->nationality_name_en); ?>

					<?php endif; ?>	
				</option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            
            
            
            
              <div class="form-group col-md-8">
                                            <label class="col-form-label text-md-right" for="nationality">City</label>
                                            <select class="form-control loginInput form-control-lg" name="city" id="city" required>
                                                <option value="">City</option>
                                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($city->id); ?>"><?php if( app()->getLocale()=='ar'): ?>
                                                            <?php echo e($city->city_name_ar); ?>

                                                        <?php elseif( app()->getLocale()=='en'): ?>
                                                            <?php echo e($nationality->city_name_en); ?>

                                                        <?php endif; ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                            <?php if($errors->has('city_id')): ?>
                                                <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('city_id')); ?></strong>
                                                </span>
                                            <?php endif; ?>


                                        </div>
            
            
            
            
            
            
            
            
            
            
            
            
            <div class="form-group">
              <h4>birthdate</h4>
              <input class="form-control datetimepicker-input loginInput" type="text" id="datetimepickerDate" name="birthdate" required data-toggle="datetimepicker" data-target="#datetimepickerDate">
            </div>
                               

                            </div>



                            <div class="form-actions text-center">

                                <button type="submit" class="btn btn-primary btn-min-width box-shadow-1 ml-1"> <i class="la la-check-square-o"></i>

                                    Add                                </button>

                                <a  href="<?php echo e(route('showsick')); ?>" class="btn btn-warning btn-min-width box-shadow-1 mr-1"> <i class="ft-x"></i>

                                    Back

                                </a> </div>

                        </form>



                    </div>

                </div>

            </div>

        </div>

    </div>

<?php endif; ?>

</div>











<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/backstage/sicks/edit.blade.php ENDPATH**/ ?>