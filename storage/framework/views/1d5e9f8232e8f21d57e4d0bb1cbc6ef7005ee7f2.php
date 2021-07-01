<?php $__env->startSection('content'); ?>
<!-- Main Content-->
     <main class="main-content">
      <!--contactUs section-->
      <section class="register contact">
        <div class="title">
          <div class="container">
            <h2><?php echo app('translator')->getFromJson('home.contact'); ?></h2>
				<?php if(session('status')): ?>
    <h3 style="color: red;" ><?php echo e(session('status')); ?></h3>
<?php endif; ?>
          </div>
        </div>
	
        <div class="container">
          <div class="contentWrap">
            <div class="content2">
              <div class="contact">
                <h3 class="blue"><?php echo app('translator')->getFromJson('home.map'); ?></h3>
                <div id="map"></div>
              </div>
            </div>
            <div class="content2">
              <h3 class="blue"><?php echo app('translator')->getFromJson('home.info'); ?></h3>
              <div class="row">
                <div class="col-md-4 about"><i class="fas fa-mobile-alt"></i>
                  <h5 class="blue2"><a href="tel:<?php echo e($sets['site_mobile']); ?>"><?php echo e($sets['site_mobile']); ?></a></h5>
                </div>
                <div class="col-md-4 about"><i class="far fa-envelope"></i>
                  <h5 class="blue2"><a href = "mailto: <?php echo e($sets['site_email']); ?>"><?php echo e($sets['site_email']); ?></a></h5>
                </div>
                <div class="col-md-4 about"><i class="fas fa-map-marker-alt"></i>
                  <h5 class="blue2"><?php if( app()->getLocale()=='ar'): ?>
					<?php echo e($sets['site_address_ar']); ?>

					<?php elseif( app()->getLocale()=='en'): ?>
					<?php echo e($sets['site_address_en']); ?>

					<?php endif; ?> </h5>
                </div>
              </div>
            </div>
            <div class="content2">
              <h3 class="blue"><?php echo app('translator')->getFromJson('home.contacNow'); ?></h3>
			   <form id="contactForm" action="<?php echo e(url('api/contact')); ?>?lang=en" method="POST" enctype="multipart/form-data">

          <?php echo e(csrf_field()); ?>

              <div class="form-group">
                <h5 class="blue2"><?php echo app('translator')->getFromJson('login.name'); ?> </h5>
                <input class="form-control loginInput" name="contact_name" value="" type="text" required="required" data-msg-required="Please enter your name.">
				 <?php if($errors->has('contact_name')): ?>
                <span class="help-block">
                  <strong style="color: #FF0000;"><?php echo e($errors->first('contact_name')); ?></strong>
                </span>
              <?php endif; ?>
              </div>
              <div class="form-group">
                <h5 class="blue2"><?php echo app('translator')->getFromJson('login.mobile'); ?></h5>
                <input class="form-control loginInput <?php if ($errors->has('contact_mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contact_mobile'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="contact_mobile" id="contact_mobile">
				 <?php if ($errors->has('contact_mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contact_mobile'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
              </div>
              <div class="form-group">
                <h5 class="blue2"><?php echo app('translator')->getFromJson('login.email'); ?></h5>
                <input class="form-control loginInput  <?php if ($errors->has('contact_email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contact_email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="email" name="contact_email" id="contact_email" required="required">
				 <?php if ($errors->has('contact_email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contact_email'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
              </div>
              <div class="form-group">
                <h5 class="blue2"><?php echo app('translator')->getFromJson('resrv.msg'); ?></h5>
                <textarea class="form-control loginInput <?php if ($errors->has('contact_message')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contact_message'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="contact_message" required></textarea>
				 <?php if ($errors->has('contact_message')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contact_message'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
              </div>
              <div class="form-group text-left">
                <button type="submit" class="btn-banner"><?php echo app('translator')->getFromJson('home.send'); ?></button>
              </div>
			  </form>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- End Main Content-->
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBr8fHyX4CFO0PMq4dxJlhPH8RrjXfyN8&amp;callback=initMap"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bsamat/public_html/demo/dentistplus/resources/views/frontend/contact.blade.php ENDPATH**/ ?>