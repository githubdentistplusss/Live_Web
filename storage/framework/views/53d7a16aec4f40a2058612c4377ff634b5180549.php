

<?php $__env->startSection('content'); ?>
<!-- Main Content-->
     <main class="content p-0">
       <!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							
							<h2 class="breadcrumb-title"><?php echo app('translator')->getFromJson('home.contact'); ?></h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
      <!--contactUs section-->
      
      <section class="register contact">
        <div class="container1">
          <div class="contentWrap">
            
            <div class="content2">
              <div class="contact3 py-5">
                <div class="row no-gutters">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="card-shadow">
                          <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/contact/2.jpg" class="img-fluid">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="contact-box ml-3">
                          <h1 class="font-weight-light mt-2"><?php echo app('translator')->getFromJson('home.contacNow'); ?></h1>
                          <form id="contactForm" action="<?php echo e(url('api/contact')); ?>?lang=en" method="POST" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <h5 class="blue2"><?php echo app('translator')->getFromJson('login.name'); ?> </h5>
                                  <input class="form-control loginInput" name="contact_name" value="" type="text" placeholder="<?php echo app('translator')->getFromJson('login.name'); ?>" required="required" data-msg-required="Please enter your name.">
                                <?php if($errors->has('contact_name')): ?>
                                  <span class="help-block">
                                    <strong style="color: #FF0000;"><?php echo e($errors->first('contact_name')); ?></strong>
                                  </span>
                                <?php endif; ?>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <h5 class="blue2"><?php echo app('translator')->getFromJson('login.mobile'); ?></h5>
                                  <input class="form-control loginInput <?php if ($errors->has('contact_mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contact_mobile'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="contact_mobile" id="contact_mobile" placeholder="<?php echo app('translator')->getFromJson('login.mobile'); ?>">
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
                              </div>
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <div class="form-group">
                                    <h5 class="blue2"><?php echo app('translator')->getFromJson('login.email'); ?></h5>
                                    <input class="form-control loginInput  <?php if ($errors->has('contact_email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contact_email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="email" name="contact_email" id="contact_email" required="required" placeholder="<?php echo app('translator')->getFromJson('login.email'); ?>">
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
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <h5 class="blue2"><?php echo app('translator')->getFromJson('resrv.msg'); ?></h5>
                                  <textarea class="form-control loginInput <?php if ($errors->has('contact_message')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contact_message'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="contact_message" required placeholder="<?php echo app('translator')->getFromJson('resrv.msg'); ?>"></textarea>
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
                              </div>
                              <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary btn-block btn-lg login-btn"><?php echo app('translator')->getFromJson('home.send'); ?></button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
			  
            </div>
            <div class="col-lg-12">
              <div class="card border-0">
                <div class="row">
                  <div class="col-lg-4 col-md-4">
                    <div class="card-body d-flex align-items-center c-detail pl-0">
                      <div class="mr-3 align-self-center">
                        <img src="assets/assets/img/icon1.png">
                      </div>
                      <div class="">
                        <h5 class="blue2"><?php if( app()->getLocale()=='ar'): ?>
                          <?php echo e($sets['site_address_ar']); ?>

                          <?php elseif( app()->getLocale()=='en'): ?>
                          <?php echo e($sets['site_address_en']); ?>

                          <?php endif; ?> </h5>
                        <p class=""></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <div class="card-body d-flex align-items-center c-detail">
                      <div class="mr-3 align-self-center">
                        <img src="assets/assets/img/icon2.png">
                      </div>
                      <div class="">
                        <h5 class="blue2"><a href="tel:<?php echo e($sets['site_mobile']); ?>"><?php echo e($sets['site_mobile']); ?></a></h5>
                        <p class=""></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4">
                    <div class="card-body d-flex align-items-center c-detail">
                      <div class="mr-3 align-self-center">
                        <img src="assets/assets/img/icon3.png">
                      </div>
                      <div class="">
                        <h5 class="blue2"><a href = "mailto: <?php echo e($sets['site_email']); ?>"><?php echo e($sets['site_email']); ?></a></h5>
                        <p class=""></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="content2">
              <div class="contact">
                
                <div id="mapx" class="map-listing"></div>
              </div>
            </div>
            
            <script>
      // Initialize and add the map
      function initateMap() {
            
             const uluru = { lat: 26.460839, lng: 50.0610558};
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("mapx"), {
          zoom: 21,
          center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
          position: uluru,
          map: map,
        });
        
      }
        
        </script>
            
          </div>
        </div>
      </section>
    </main>
    <!-- End Main Content-->
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBr8fHyX4CFO0PMq4dxJlhPH8RrjXfyN8&amp;callback=initateMap"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('views.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/contact.blade.php ENDPATH**/ ?>