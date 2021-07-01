<?php error_reporting(0); ?>
<!-- Loader -->
<?php if(Route::is(['map-grid', 'map-list'])): ?>
    <div id="loader">
        <div class="loader">
            <span></span>
            <span></span>
        </div>
    </div>
<?php endif; ?>
<?php $image=Auth::guard('dentist')->user()->profile_photo ?>
<!-- /Loader  -->
<div class="main-wrapper1">
    <!-- Header -->
    <header class="header">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="<?php echo e(Route('index')); ?>" class="navbar-brand logo">
                    <img src=<?php echo e(asset('assets/assets/img/logodp.jpg')); ?> class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="<?php echo e(Route('index')); ?>" class="menu-logo">
                        <img src="https://dentistpluss.com/assets/assets/img/logodp.jpg" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav" class="col-sm">
                    <li class="<?php echo e(Route::is('index') ? 'active' : ''); ?>">
                        <a href="<?php echo e(Route('index')); ?>"><?php echo app('translator')->getFromJson('home.home'); ?></a>
                    </li>
                    <li class="<?php echo e(Route::is('offers') ? 'active' : ''); ?>">
                        <a href="<?php echo e(Route('offers')); ?>"><?php echo app('translator')->getFromJson('home.offer'); ?></a>
                    </li>
                     <li class="<?php echo e(Route::is('allclinics') ? 'active' : ''); ?>">
                        <a href="<?php echo e(Route('allclinics')); ?>">العيادات</a>
                    </li>
                    <li class="<?php echo e(Route::is('aboutus') ? 'active' : ''); ?>">
                        <a href="<?php echo e(Route('aboutus')); ?>"><?php echo app('translator')->getFromJson('home.about'); ?></a>

                    </li>
                    <li class="<?php echo e(Route::is('contactus') ? 'active' : ''); ?>">
                        <a href="<?php echo e(Route('contactus')); ?>"><?php echo app('translator')->getFromJson('home.contact'); ?></a>
                    </li>
                    
                      <li class="<?php echo e(Route::is('clinic-member') ? 'active' : ''); ?>">
                        <a href="<?php echo e(Route('clinic-member')); ?>"><?php echo app('translator')->getFromJson('home.clinic-member'); ?></a>
                    </li>
                    
            
                        
                        
                    
                  <?php if(!isset(Auth::guard('client')->user()->id)): ?>
                    <li class="has-submenu <?php echo e(Route::is('clientLoginForm')  ? 'active' : ''); ?>"  >
							<a href="">تسجيل <i class="fas fa-chevron-down"></i></a>
							<ul class="submenu">
								<li class=""><a href="<?php echo e(Route('clientLoginForm')); ?>"> <?php echo app('translator')->getFromJson('about.patient'); ?> </a></li>
								
							</ul>
						</li>
						<?php else: ?>
						 <li class="has-submenu <?php echo e(Route::is('clientLoginForm')  ? 'active' : ''); ?>"  >
							<a href="<?php echo e(Route('Clogout')); ?>"> الخروج</a>
						 <?php endif; ?>
						 <?php if(isset(Auth::guard('client')->user()->id)): ?>
						   <li class="<?php echo e(Route::is('bookedoffers') ? 'active' : ''); ?>">
                        <a href="<?php echo e(Route('bookedoffers')); ?>"><?php echo app('translator')->getFromJson('home.bookedoffer'); ?></a>
                      
                    </li>
 <?php endif; ?>


                </ul>
            </div>
            <ul class="nav header-navbar-rht" class="col-sm">
                <li class="nav-item contact-item">
                    <select class="form-control select" name="locale" id="langSwitch">

                        <option class="dropdown-item" <?php if(app()->getLocale() == 'ar'): ?> selected="selected" <?php endif; ?> value="ar">العربية</option>
                        <option <?php if(app()->getLocale() == 'en'): ?> selected="selected" <?php endif; ?> value="en">English</option>
                    </select>
                    <!--  <?php if(Route::is(['page', 'cart', 'blank-page', 'term-condition', 'privacy-policy', 'blog-details', 'blog-grid', 'blog-list', 'forgot-password', 'register', 'login', 'invoice-view', 'doctor-register', 'components', 'calendar', 'map-grid', 'map-list', 'search', 'doctor-profile', 'booking', 'checkout', 'booking-success', 'payment-success', 'pharmacy-details', 'pharmacy-index', 'pharmacy-search', 'product-all', 'product-checkout', 'product-description', 'product-healthcare'])): ?> <li class="nav-item">
                    <a class="nav-link header-login" href="login">login / Signup </a>
                </li> <?php endif; ?> -->

                </li>
                <?php if(isset(Auth::guard('client')->user()->id)): ?>
                    <li class="nav-item dropdown has-arrow logged-item">
                        <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <span class="user-img">
                                <img class="rounded-circle" src=<?php echo e(asset('assets/assets/img/patients/patient.jpg')); ?>

                                    width="31" alt="User name">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left">
                            <div class="user-header">
                                <div class="avatar avatar-sm">
                                    <img src=<?php echo e(asset('assets/assets/img/patients/patient.jpg')); ?> alt="User Image"
                                        class="avatar-img rounded-circle">
                                </div>
                                <div class="user-text">
                                    <h6><?php echo e(Auth::guard('client')->user()->name); ?></h6>
                                    <p class="text-muted mb-0">Patient</p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="<?php echo e(route('clientDashboard')); ?>"><?php echo app('translator')->getFromJson('login.account'); ?></a>
                            <a class="dropdown-item" href="<?php echo e(route('profile')); ?>"><?php echo app('translator')->getFromJson('login.accountEdit'); ?></a>
                            <a class="dropdown-item" href="<?php echo e(route('Clogout')); ?>"><?php echo app('translator')->getFromJson('resrv.logout'); ?></a>
                        </div>
                    </li>
                <?php elseif(isset(Auth::guard('dentist')->user()->id)): ?>
                    <!-- User Menu -->
                    <li class="nav-item dropdown has-arrow logged-item">
                        <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <span class="user-img">
                                <img class="rounded-circle"
                                
                                    src="<?php echo e(asset('images/'.$image)); ?>" width="31"
                                    alt="Darren Elder">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left">
                            <div class="user-header">
                                <div class="avatar avatar-sm">
                                    
                                    <img src="<?php echo e(asset('images/'.$image)); ?>"
                                        alt="User Image" class="avatar-img rounded-circle">
                                </div>
                                <div class="user-text">
                                    <h6><?php echo e(Auth::guard('dentist')->user()->name); ?></h6>
                                    <p class="text-muted mb-0">Doctor</p>
                                </div>
                            </div>
                            <a class="dropdown-item"
                                href="<?php echo e(route('dentistDashboard')); ?>"><?php echo app('translator')->getFromJson('login.account'); ?></a>
                            <a class="dropdown-item"
                                href="<?php echo e(route('vendorProfile')); ?>"><?php echo app('translator')->getFromJson('login.accountEdit'); ?></a>
                            <a class="dropdown-item" href="<?php echo e(route('Dlogout')); ?>"><?php echo app('translator')->getFromJson('resrv.logout'); ?></a>
                        </div>
                    </li>
                    <!-- /User Menu -->
                <?php else: ?>
               
                    <li class="nav-item dropdown has-arrow">
                        <a href="" class="dropdown-toggle header-login" data-toggle="dropdown">دخول</a>
                        <div class="dropdown-menu dropdown-menu-left">
                        
                            <a class="<?php echo e(Route::is('clientLoginForm') ? 'active dropdown-item' : 'dropdown-item'); ?>"
                                href="<?php echo e(Route('clientLoginForm')); ?>"><?php echo app('translator')->getFromJson('about.patient'); ?></a>
                        </div>
                       

                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    
    
    <!-- /Header -->
<?php /**PATH /home/dentist/public_html/resources/views/views/layout/partials/header.blade.php ENDPATH**/ ?>