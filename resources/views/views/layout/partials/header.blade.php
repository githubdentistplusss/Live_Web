<?php error_reporting(0); ?>
<!-- Loader -->
@if (Route::is(['map-grid', 'map-list']))
    <div id="loader">
        <div class="loader">
            <span></span>
            <span></span>
        </div>
    </div>
@endif
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
                <a href="{{ Route('index') }}" class="navbar-brand logo">
                    <img src={{ asset('assets/assets/img/logodp.jpg') }} class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="{{ Route('index') }}" class="menu-logo">
                        <img src="https://dentistpluss.com/assets/assets/img/logodp.jpg" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav" class="col-sm">
                    <li class="{{ Route::is('index') ? 'active' : '' }}">
                        <a href="{{ Route('index') }}">@lang('home.home')</a>
                    </li>
                    <li class="{{ Route::is('offers') ? 'active' : '' }}">
                        <a href="{{ Route('offers') }}">@lang('home.offer')</a>
                    </li>
                     <li class="{{ Route::is('allclinics') ? 'active' : '' }}">
                        <a href="{{ Route('allclinics') }}">العيادات</a>
                    </li>
                    <li class="{{ Route::is('aboutus') ? 'active' : '' }}">
                        <a href="{{ Route('aboutus') }}">@lang('home.about')</a>

                    </li>
                    <li class="{{ Route::is('contactus') ? 'active' : '' }}">
                        <a href="{{ Route('contactus') }}">@lang('home.contact')</a>
                    </li>
                    
                      <li class="{{ Route::is('clinic-member') ? 'active' : '' }}">
                        <a href="{{ Route('clinic-member') }}">@lang('home.clinic-member')</a>
                    </li>
                    
            
                        
                        
                    
                  @if (!isset(Auth::guard('client')->user()->id))
                    <li class="has-submenu {{ Route::is('clientLoginForm')  ? 'active' : '' }}"  >
							<a href="">تسجيل <i class="fas fa-chevron-down"></i></a>
							<ul class="submenu">
								<li class=""><a href="{{ Route('clientLoginForm') }}"> @lang('about.patient') </a></li>
								
							</ul>
						</li>
						@else
						 <li class="has-submenu {{ Route::is('clientLoginForm')  ? 'active' : '' }}"  >
							<a href="{{ Route('Clogout') }}"> الخروج</a>
						 @endif
						 @if (isset(Auth::guard('client')->user()->id))
						   <li class="{{ Route::is('bookedoffers') ? 'active' : '' }}">
                        <a href="{{ Route('bookedoffers') }}">@lang('home.bookedoffer')</a>
                      
                    </li>
 @endif


                </ul>
            </div>
            <ul class="nav header-navbar-rht" class="col-sm">
                <li class="nav-item contact-item">
                    <select class="form-control select" name="locale" id="langSwitch">

                        <option class="dropdown-item" @if (app()->getLocale() == 'ar') selected="selected" @endif value="ar">العربية</option>
                        <option @if (app()->getLocale() == 'en') selected="selected" @endif value="en">English</option>
                    </select>
                    <!--  @if (Route::is(['page', 'cart', 'blank-page', 'term-condition', 'privacy-policy', 'blog-details', 'blog-grid', 'blog-list', 'forgot-password', 'register', 'login', 'invoice-view', 'doctor-register', 'components', 'calendar', 'map-grid', 'map-list', 'search', 'doctor-profile', 'booking', 'checkout', 'booking-success', 'payment-success', 'pharmacy-details', 'pharmacy-index', 'pharmacy-search', 'product-all', 'product-checkout', 'product-description', 'product-healthcare'])) <li class="nav-item">
                    <a class="nav-link header-login" href="login">login / Signup </a>
                </li> @endif -->

                </li>
                @if (isset(Auth::guard('client')->user()->id))
                    <li class="nav-item dropdown has-arrow logged-item">
                        <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <span class="user-img">
                                <img class="rounded-circle" src={{ asset('assets/assets/img/patients/patient.jpg') }}
                                    width="31" alt="User name">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left">
                            <div class="user-header">
                                <div class="avatar avatar-sm">
                                    <img src={{ asset('assets/assets/img/patients/patient.jpg') }} alt="User Image"
                                        class="avatar-img rounded-circle">
                                </div>
                                <div class="user-text">
                                    <h6>{{ Auth::guard('client')->user()->name }}</h6>
                                    <p class="text-muted mb-0">Patient</p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="{{ route('clientDashboard') }}">@lang('login.account')</a>
                            <a class="dropdown-item" href="{{ route('profile') }}">@lang('login.accountEdit')</a>
                            <a class="dropdown-item" href="{{ route('Clogout') }}">@lang('resrv.logout')</a>
                        </div>
                    </li>
                @elseif(isset(Auth::guard('dentist')->user()->id))
                    <!-- User Menu -->
                    <li class="nav-item dropdown has-arrow logged-item">
                        <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <span class="user-img">
                                <img class="rounded-circle"
                                
                                    src="{{ asset('images/'.$image) }}" width="31"
                                    alt="Darren Elder">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left">
                            <div class="user-header">
                                <div class="avatar avatar-sm">
                                    
                                    <img src="{{ asset('images/'.$image) }}"
                                        alt="User Image" class="avatar-img rounded-circle">
                                </div>
                                <div class="user-text">
                                    <h6>{{ Auth::guard('dentist')->user()->name }}</h6>
                                    <p class="text-muted mb-0">Doctor</p>
                                </div>
                            </div>
                            <a class="dropdown-item"
                                href="{{ route('dentistDashboard') }}">@lang('login.account')</a>
                            <a class="dropdown-item"
                                href="{{ route('vendorProfile') }}">@lang('login.accountEdit')</a>
                            <a class="dropdown-item" href="{{ route('Dlogout') }}">@lang('resrv.logout')</a>
                        </div>
                    </li>
                    <!-- /User Menu -->
                @else
               
                    <li class="nav-item dropdown has-arrow">
                        <a href="" class="dropdown-toggle header-login" data-toggle="dropdown">دخول</a>
                        <div class="dropdown-menu dropdown-menu-left">
                        
                            <a class="{{ Route::is('clientLoginForm') ? 'active dropdown-item' : 'dropdown-item' }}"
                                href="{{ Route('clientLoginForm') }}">@lang('about.patient')</a>
                        </div>
                       

                    </li>
                @endif
            </ul>
        </nav>
    </header>
    
    
    <!-- /Header -->
