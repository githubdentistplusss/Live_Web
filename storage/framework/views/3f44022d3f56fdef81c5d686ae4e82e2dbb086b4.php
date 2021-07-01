<?php $page = 'register'; ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Content -->
    <div class="content" style="min-height:200px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 offset-md-2">

                    <!-- Account Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">

                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3><?php echo app('translator')->getFromJson('login.dregister'); ?> </h3>
                                </div>
                                <?php if(Session::has('message')): ?>
                                    <div class="alert alert-success col-md-12">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        <?php echo Session::get('message'); ?>

                                    </div>
                                <?php elseif(Session::has('error_message')): ?>
                                    <div class="alert alert-danger col-md-12">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        <strong style="color: #000;"><?php echo Session::get('error_message'); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <!-- Register Form -->
                                <form method="POST" action="<?php echo e(route('dentistRegister')); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group card-label">
                                        <label><?php echo app('translator')->getFromJson('login.nation_id'); ?></label>
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
                                    <div class="form-group card-label">
                                        <label><?php echo app('translator')->getFromJson('login.name'); ?></label>
                                        <input id="name" type="text"
                                            class="form-control loginInput <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name"
                                            value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>

                                        <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group card-label">
                                        <label><?php echo app('translator')->getFromJson('login.email'); ?></label>
                                        <input id="email" type="email"
                                            class="form-control loginInput <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                            name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">

                                        <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group card-label">
                                        <label><?php echo app('translator')->getFromJson('login.mobile'); ?></label>
                                        <input id="mobile" type="text"
                                            class="form-control <?php if ($errors->has('mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> loginInput"
                                            name="mobile" value="<?php echo e(old('mobile')); ?>" required autocomplete="mobile">

                                        <?php if ($errors->has('mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group card-label">
                                        <label><?php echo app('translator')->getFromJson('login.password'); ?></label>
                                        <input id="password" type="password"
                                            class="form-control loginInput  <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                            name="password" required autocomplete="new-password">

                                        <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                    <div class="form-group card-label">
                                        <label><?php echo app('translator')->getFromJson('login.re_pass'); ?></label>
                                        <input id="password-confirm" type="password" class="form-control loginInput"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <div class="form-group card-label">
                                        <h4><?php echo app('translator')->getFromJson('login.nationality'); ?></h4>
                                        <select class="form-control loginInput form-control-lg" name="nationality"
                                            id="nationality" required>

                                            <?php $__currentLoopData = $nationalitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nationality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    <?php echo e(old('nationality') == $nationality->nationality ? 'selected="selected"' : ''); ?>

                                                    value="<?php echo e($nationality->id); ?>">
                                                    <?php if(app()->getLocale() == 'ar'): ?>
                                                        <?php echo e($nationality->nationality_name_ar); ?>

                                                    <?php elseif( app()->getLocale()=='en'): ?>
                                                        <?php echo e($nationality->nationality_name_en); ?>

                                                    <?php endif; ?>
                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <?php if($errors->has('nationality')): ?>
                                            <span class="help-block">
                                                <strong
                                                    style="color: #FF0000;"><?php echo e($errors->first('nationality')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group card-label">
                                        <h4><?php echo app('translator')->getFromJson('login.city'); ?></h4>
                                        <select class="form-control loginInput form-control-lg" name="city_id" id="city_id"
                                            required>
                                            <option value=""><?php echo app('translator')->getFromJson('login.city'); ?></option>
                                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('city_id') == $city->id ? 'selected="selected"' : ''); ?>

                                                    value="<?php echo e($city->id); ?>">
                                                    <?php if(app()->getLocale() == 'ar'): ?>
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
                                    <div class="form-group card-label">
                                        <h4><?php echo app('translator')->getFromJson('login.hospital'); ?></h4>

                                        <select class="form-control loginInput form-control-lg" name="hospital"
                                            id="hospital" required>
                                            <option selected value=""><?php echo app('translator')->getFromJson('login.hospital'); ?></option>
                                            <?php $__currentLoopData = $hospitals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hospital): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($hospital->id); ?>">
                                                    <?php if(app()->getLocale() == 'ar'): ?>
                                                        <?php echo e($hospital->hospital_name_ar); ?>

                                                    <?php elseif( app()->getLocale()=='en'): ?>
                                                        <?php echo e($hospital->hospital_name_en); ?>

                                                    <?php endif; ?>
                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                        <?php if($errors->has('hospital')): ?>
                                            <span class="help-block">
                                                <strong style="color: #FF0000;"><?php echo e($errors->first('hospital')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group card-label">
                                        <h4><?php echo app('translator')->getFromJson('login.gender'); ?></h4>
                                        <div class="form-check-inline">
                                            <label class="gender-radio">
                                                <input class="form-check-input" type="radio" value="Male" name="gender"
                                                    checked><?php echo app('translator')->getFromJson('login.male'); ?>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="gender-radio">
                                                <input class="form-check-input" type="radio" value="Female"
                                                    name="gender"><?php echo app('translator')->getFromJson('login.female'); ?>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <?php if($errors->has('gender')): ?>
                                            <span class="help-block">
                                                <strong style="color: #FF0000;"><?php echo e($errors->first('gender')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group card-label">
                                        <h4><?php echo app('translator')->getFromJson('login.dgree'); ?></h4>

                                        <select id="dgree" type="text"
                                            class="form-control <?php if ($errors->has('dgree')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('dgree'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> loginInput"
                                            name="dgree" required>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7"><?php echo app('translator')->getFromJson('login.entern'); ?></option>
                                        </select>
                                        <?php if($errors->has('dgree')): ?>
                                            <span class="help-block">
                                                <strong style="color: #FF0000;"><?php echo e($errors->first('dgree')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group card-label">
                                        <label><?php echo app('translator')->getFromJson('login.birthdate'); ?></label>
                                        <input required id="datetimepickerDate1" type="text" class="form-control datetimepicker"
                                            value="" data-toggle="datetimepicker" data-target="#datetimepickerDate1"
                                            name="birthdate">

                                    </div>
                                    <h4><?php echo app('translator')->getFromJson('login.uPhoto'); ?></h4>
                                    <div class="form-group">
                                        <div class="change-avatar">
                                           
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" id="photo" required="required" class="form-control upload"
                                                        name="photo">
                                                    <?php if($errors->has('photo')): ?>
                                                        <span class="help-block text-danger">
                                                            <strong><?php echo e($errors->first('photo')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of
                                                    2MB</small>
                                                    
                                                    <div class="profile-img">
                                                <br>
                                                 <ul id="upload-wrap"></ul>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><?php echo app('translator')->getFromJson('login.pPhoto'); ?></h4>
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" id="profile" class="form-control upload" name="profile_photo">
                                                    <?php if($errors->has('profile_photo')): ?>
                                                        <span class="help-block text-danger">
                                                            <strong><?php echo e($errors->first('profile_photo')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of
                                                    2MB</small>
                                                    
                                                     <div class="profile-img">
                                                <br>
                                                 <ul id="upload-wrap1"></ul>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check-inline">
                                            <div class="terms-accept">
                                                <div class="custom-checkbox">
                                                    <input class="form-check-input" required type="checkbox" value="">
                                                    <label for="terms_accept"><a
                                                            href="<?php echo e(route('termsdentist')); ?>"><?php echo app('translator')->getFromJson('login.privacy'); ?></a></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary btn-block btn-lg login-btn"
                                        type="submit"><?php echo app('translator')->getFromJson('login.dregister'); ?></button>
                                    <div class="text-right pt-2">
                                        <a class="forgot-link" href="<?php echo e(route('dentistlogin')); ?>">
                                            <?php echo app('translator')->getFromJson('login.hasAccount'); ?></a>
                                    </div>
                                    
                                </form>
                                <!-- /Register Form -->

                            </div>
                        </div>
                    </div>
                    <!-- /Account Content -->

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
    </div>
    
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<script>
		    $(document).ready(function() {
		        
		       
  if (window.File && window.FileList && window.FileReader) {
      
    $("#photo").on("change", function(e) {
      
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("#upload-wrap").append("<li style=\"display:inline\"><div class=\"upload-images\">" +
            "<img  src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span style=\"color:red\" class=\"remove\">مسح</span>" +
            "</div></li>");
          $(".remove").click(function(){
            $(this).parent(".upload-images").remove();
          });
          
														
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
   if (window.File && window.FileList && window.FileReader) {
  $("#profile").on("change", function(e) {
      
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("#upload-wrap1").append("<li style=\"display:inline\"><div class=\"upload-images\">" +
            "<img  src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span style=\"color:red\" class=\"remove\">مسح</span>" +
            "</div></li>");
          $(".remove").click(function(){
            $(this).parent(".upload-images").remove();
          });
          
														
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
  
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('views.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/dentist-register.blade.php ENDPATH**/ ?>