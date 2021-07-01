<?php if(isset($aDentist)): ?>

    <?php $__env->startSection('title','Edit Dentist'); ?>

<?php endif; ?>

<?php $__env->startSection('title','Edit Dentist'); ?>

<?php $__env->startSection('content'); ?>



    <?php if(isset($aDentist)): ?>

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-content collapse show">

                            <div class="card-body">

                                <form enctype="multipart/form-data" id="page_forme"
                                      action="<?php echo e(route('updatedentist', $aDentist->id)); ?>"
                                      class="form ls_form validate_form" method="post">

                                    <?php echo e(csrf_field()); ?>


                                    <?php echo e(method_field('PUT')); ?>


                                    <div class="form-body">

                                        <h4 class="form-section"><i class="la la-paperclip"></i>Edit </h4>
                                        <div class="form-group col-md-8">
                                            <label for="nation_id"
                                                   class="col-md-4 col-form-label text-md-right">nation_id</label>


                                            <input id="nation_id" type="text"
                                                   class="form-control loginInput <?php if ($errors->has('nation_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nation_id'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                   name="nation_id" value="<?php echo e($aDentist->nation_id); ?>" required
                                                   autocomplete="nation_id" autofocus>

                                            <?php if ($errors->has('nation_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nation_id'); ?>
                                            <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                        <div class="form-group col-md-8">

                                            <label for="first_name">

                                                Name

                                            </label>

                                            <input type="text" id="name" class="form-control validate[required]"
                                                   name="name" required value="<?php echo e($aDentist->name); ?>" autofocus>

                                            <?php if($errors->has('name')): ?>

                                                <span class="help-block text-danger">

                                        <strong><?php echo e($errors->first('first_name')); ?></strong>

                                    </span>

                                            <?php endif; ?>

                                        </div>

                                        <div class="form-group col-md-8">

                                            <label for="password">

                                                Password

                                            </label>

                                            <input type="password" id="password" value=""
                                                   class="form-control validate[required]"

                                                   name="password">

                                            <?php if($errors->has('password')): ?>

                                                <span class="help-block text-danger">

                                        <strong><?php echo e($errors->first('password')); ?></strong>

                                    </span>

                                            <?php endif; ?>

                                        </div>

                                        <div class="form-group col-md-8">

                                            <label for="mobile">

                                                mobile

                                            </label>

                                            <input id="mobile" class="form-control validate[required]"
                                                   value="<?php echo e($aDentist->mobile); ?>" name="mobile">

                                            <?php if($errors->has('mobile')): ?>

                                                <span class="help-block text-danger">

                                        <strong><?php echo e($errors->first('mobile')); ?></strong>

                                    </span>

                                            <?php endif; ?>

                                        </div>

                                        <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="nationality">nationality</label>
                                            <select class="form-control loginInput form-control-lg" name="nationality"
                                                    id="nationality" required>
                                                <option value="">nationality</option>
                                                <?php $__currentLoopData = $nationalitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nationality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e($aDentist->nationality == $nationality->id ?'selected="selected"':""); ?> value="<?php echo e($nationality->id); ?>"><?php if( app()->getLocale()=='ar'): ?>
                                                            <?php echo e($nationality->nationality_name_ar); ?>

                                                        <?php elseif( app()->getLocale()=='en'): ?>
                                                            <?php echo e($nationality->nationality_name_en); ?>

                                                        <?php endif; ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                            <?php if($errors->has('nationality')): ?>
                                                <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('nationality')); ?></strong>
                                                </span>
                                            <?php endif; ?>


                                        </div>

                                        <div class="form-group col-md-8">
                                            <label class="col-form-label text-md-right" for="nationality">City</label>
                                            <select class="form-control loginInput form-control-lg" name="city" id="city" required>
                                                <option value="">City</option>
                                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e($aDentist->city_id == $city->id ?'selected="selected"':""); ?> value="<?php echo e($city->id); ?>"><?php if( app()->getLocale()=='ar'): ?>
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

                                        <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="hospital">Hospital</label>

                                            <select class="form-control loginInput form-control-lg" name="hospital"
                                                    id="hospital" required>

                                                <?php $__currentLoopData = $hospitals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hospital): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e($aDentist->hospital == $hospital->id?'selected="selected"':""); ?> value="<?php echo e($hospital->id); ?>">
                                                        <?php if( app()->getLocale()=='ar'): ?>
                                                            <?php echo e($hospital->hospital_name_ar); ?>

                                                        <?php elseif( app()->getLocale()=='en'): ?>
                                                            <?php echo e($hospital->hospital_name_en); ?>

                                                        <?php endif; ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                            <?php if($errors->has('hospital')): ?>
                                                <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('hospital')); ?></strong>
                                                </span>
                                            <?php endif; ?>


                                        </div>

                                        <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="gender">Gender</label>

                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" value="Male"
                                                           <?php echo e(($aDentist->gender == 'Male')?'checked="checked"':""); ?> name="gender"
                                                           checked>Male
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" value="Female"
                                                           <?php echo e(($aDentist->gender == 'Female')?'checked="checked"':""); ?> name="gender">Female
                                                </label>
                                            </div>

                                            <?php if($errors->has('gender')): ?>
                                                <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('gender')); ?></strong>
                                                </span>
                                            <?php endif; ?>


                                        </div>

                                        <div class="form-group col-md-8">
                                            <label class="col-form-label text-md-right"
                                                   for="dgree">Dgree</label>

                                            <input id="dgree" type="text"
                                                   class="form-control <?php if ($errors->has('dgree')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('dgree'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> loginInput"
                                                   value="<?php echo e($aDentist->dgree); ?>" name="dgree" required>

                                            <?php if($errors->has('dgree')): ?>
                                                <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('dgree')); ?></strong>
                                                </span>
                                            <?php endif; ?>


                                        </div>

                                        <div class="form-group col-md-8">
                                            <label for="birthdate" class=" col-form-label text-md-right">birthdate</label>


                                            <input id="birthdate" type="text" class="form-control loginInput "
                                                   name="birthdate" value="<?php echo e($aDentist->birthdate); ?>">

                                        </div>

                                        <div class="form-group col-md-8">

                                            <label for="mobile">

                                                <?php echo app('translator')->getFromJson('login.uPhoto'); ?>

                                            </label>


                                            <input type="file" class="form-control loginInput" name="photo">
                                            <a href='<?php echo e(asset('images/'.$aDentist->photo)); ?>' target='_blank'>
                                                <img class="img-thumbnail img-responsive" width="70" height="70"
                                                     src="<?php echo e(asset('images/'.$aDentist->photo)); ?>" alt=""></a>
                                            <?php if($errors->has('photo')): ?>

                                                <span class="help-block text-danger">

                                        <strong><?php echo e($errors->first('photo')); ?></strong>

                                    </span>

                                            <?php endif; ?>

                                        </div>

                                        <div class="form-group col-md-6">

                                            <label for="mobile">

                                                <?php echo app('translator')->getFromJson('login.pPhoto'); ?>

                                            </label>


                                            <input type="file" class="form-control loginInput" name="profile_photo">

                                            <img class="img-thumbnail img-responsive" width="70" height="70"
                                                 src="<?php echo e(asset('images/'.$aDentist->profile_photo)); ?>" alt="">
                                            <?php if($errors->has('profile_photo')): ?>

                                                <span class="help-block text-danger">

                                        <strong><?php echo e($errors->first('profile_photo')); ?></strong>

                                    </span>

                                            <?php endif; ?>

                                        </div>

                                    </div>

                                    <div class="form-actions text-center">

                                        <button type="submit" class="btn btn-primary btn-min-width box-shadow-1 ml-1">
                                            Edit
                                        </button>

                                        <a href="<?php echo e(route('showdentist')); ?>"
                                           class="btn btn-warning btn-min-width box-shadow-1 mr-1"> <i class="ft-x"></i>

                                            Back

                                        </a></div>

                                </form>

                                <form action="<?php echo e(route('permission')); ?>" method="post">

                                    <?php echo e(csrf_field()); ?>


                                    <div class="card-content collapse show">

                                        <div class="card-body">

                                            <div class="card-title">

                                                <strong></strong>

                                            </div>

                                            <!--Table Wrapper Start-->


                                        </div>
                                    </div>


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

                                <form enctype="multipart/form-data" id="page_forme" action="<?php echo e(route('storedentist')); ?>"
                                      class="form ls_form validate_form" method="post">

                                    <?php echo e(csrf_field()); ?>



                                    <div class="form-body">

                                        <h4 class="form-section"><i class="la la-paperclip"></i> Add Dentist</h4>

                                        <div class="form-group col-md-8">
                                            <label for="nation_id">Nation id</label>


                                            <input id="nation_id" type="text"
                                                   class="form-control loginInput <?php if ($errors->has('nation_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nation_id'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                   name="nation_id" value="<?php echo e(old('nation_id')); ?>" required
                                                   autocomplete="nation_id" autofocus>

                                            <?php if ($errors->has('nation_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nation_id'); ?>
                                            <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                        <div class="form-group col-md-8">

                                            <label for="first_name">

                                                Name

                                            </label>

                                            <input type="text" id="name" class="form-control validate[required]"
                                                   name="name" required value="" autofocus>

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

                                                   name="email">

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

                                            <input type="password" id="password" class="form-control validate[required]"

                                                   name="password">

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

                                            <input id="mobile" class="form-control validate[required]" name="mobile">

                                            <?php if($errors->has('mobile')): ?>

                                                <span class="help-block text-danger">

                                        <strong><?php echo e($errors->first('mobile')); ?></strong>

                                    </span>

                                            <?php endif; ?>

                                        </div>
                                        <div class="form-group col-md-8">
                                            <label class="col-form-label text-md-right" for="nationality">nationality</label>
                                            <select class="form-control loginInput form-control-lg" name="nationality"
                                                    id="nationality" required>
                                                <option value="">nationality</option>
                                                <?php $__currentLoopData = $nationalitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nationality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e((old('nationality') == $nationality->nationality)?'selected="selected"':""); ?> value="<?php echo e($nationality->id); ?>"><?php if( app()->getLocale()=='ar'): ?>
                                                            <?php echo e($nationality->nationality_name_ar); ?>

                                                        <?php elseif( app()->getLocale()=='en'): ?>
                                                            <?php echo e($nationality->nationality_name_en); ?>

                                                        <?php endif; ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                            <?php if($errors->has('nationality')): ?>
                                                <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('nationality')); ?></strong>
                                                </span>
                                            <?php endif; ?>


                                        </div>

                                        <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right" for="city_id">City</label>
                                            <select class="form-control loginInput form-control-lg" name="city_id" id="city_id" required>
                                                <option value="" disabled>city</option>
                                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e((old('city_id') == $city->city_id)?'selected="selected"':""); ?> value="<?php echo e($city->id); ?>">
                                                        <?php if( app()->getLocale()=='ar'): ?>
                                                            <?php echo e($city->city_name_ar); ?>

                                                        <?php elseif( app()->getLocale()=='en'): ?>
                                                            <?php echo e($city->city_name_en); ?>

                                                        <?php endif; ?>
                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                            <?php if($errors->has('city_id')): ?>
                                                <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('city_id')); ?></strong>
                                                </span>
                                            <?php endif; ?>


                                        </div>


                                        <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="hospital"><?php echo app('translator')->getFromJson('login.hospital'); ?></label>

                                            <select class="form-control loginInput form-control-lg" name="hospital"
                                                    id="hospital" required>

                                                <?php $__currentLoopData = $hospitals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hospital): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e((old('hospital') == $hospital->hospital)?'selected="selected"':""); ?> value="<?php echo e($hospital->id); ?>">
                                                        <?php if( app()->getLocale()=='ar'): ?>
                                                            <?php echo e($hospital->hospital_name_ar); ?>

                                                        <?php elseif( app()->getLocale()=='en'): ?>
                                                            <?php echo e($hospital->hospital_name_en); ?>

                                                        <?php endif; ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                            <?php if($errors->has('hospital')): ?>
                                                <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('hospital')); ?></strong>
                                                </span>
                                            <?php endif; ?>


                                        </div>
                                        <div class="form-group col-md-8">
                                            <label class="col-form-label text-md-right"
                                                   for="gender">Gender</label>

                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" value="Male"
                                                           name="gender" checked>Male
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" value="Female"
                                                           name="gender">Female
                                                </label>
                                            </div>

                                            <?php if($errors->has('gender')): ?>
                                                <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('gender')); ?></strong>
                                                </span>
                                            <?php endif; ?>


                                        </div>
                                        <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="dgree">Dgree</label>

                                            <input id="dgree" type="text"
                                                   class="form-control <?php if ($errors->has('dgree')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('dgree'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> loginInput"
                                                   name="dgree" required>

                                            <?php if($errors->has('dgree')): ?>
                                                <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('dgree')); ?></strong>
                                                </span>
                                            <?php endif; ?>


                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="birthdate" class=" col-form-label text-md-right">birthdate</label>


                                            <input id="birthdate" type="text" class="form-control loginInput "
                                                   name="birthdate">

                                        </div>
                                        <div class="form-group col-md-8">

                                            <label for="mobile">

                                                <?php echo app('translator')->getFromJson('login.uPhoto'); ?>

                                            </label>


                                            <input type="file" class="form-control loginInput" name="photo">


                                            <?php if($errors->has('photo')): ?>

                                                <span class="help-block text-danger">

                                        <strong><?php echo e($errors->first('photo')); ?></strong>

                                    </span>

                                            <?php endif; ?>

                                        </div>
                                        <div class="form-group col-md-6">

                                            <label for="mobile">

                                                <?php echo app('translator')->getFromJson('login.pPhoto'); ?>

                                            </label>


                                            <input type="file" class="form-control loginInput" name="profile_photo">


                                            <?php if($errors->has('profile_photo')): ?>

                                                <span class="help-block text-danger">

                                        <strong><?php echo e($errors->first('profile_photo')); ?></strong>

                                    </span>

                                            <?php endif; ?>

                                        </div>


                                    </div>


                                    <div class="form-actions text-center">

                                        <button type="submit" class="btn btn-primary btn-min-width box-shadow-1 ml-1"><i
                                                    class="la la-check-square-o"></i>

                                            Add
                                        </button>

                                        <a href="<?php echo e(route('showdentist')); ?>"
                                           class="btn btn-warning btn-min-width box-shadow-1 mr-1"> <i class="ft-x"></i>

                                            Back

                                        </a></div>

                                </form>


                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <?php endif; ?>

        </div>











<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bsamat/public_html/demo/dentistplus/resources/views/backstage/dentists/edit.blade.php ENDPATH**/ ?>