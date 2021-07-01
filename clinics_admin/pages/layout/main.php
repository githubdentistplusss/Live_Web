<!DOCTYPE html> 
<html lang="ar">
	<head>
		<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="<?php echo $rout_config?>/assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo $rout_config?>/assets/plugins/bootstrap-rtl/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="<?php echo $rout_config?>/assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="<?php echo $rout_config?>/assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="<?php echo $rout_config?>/assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="<?php echo $rout_config?>/assets/js/html5shiv.min.js"></script>
			<script src="<?php echo $rout_config?>/assets/js/respond.min.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="<?php echo $rout_config?>/assets/css/fixed.css">

	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
	
		
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
				
					<?php 	
	                            $current_page =current_page();	
	                        ?>
						<!-- Profile Sidebar -->
						
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="<?php echo $rout_config?>/assets/img/logo.png" alt="User Image">

										</a>
										<div class="profile-det-info">
											<h3> عيادة أسنان بلس الطبي </h3>
											<div class="patient-details">
											<!--	<h5><i class="fas fa-birthday-cake"></i> 24 Jul 1983, 38 years</h5>-->
												<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> الدمام - حي البحيرة - شارع الخليجي</h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
										<li class="<?php if ( $current_page =='dashboard') {echo "active";} ?>">												<a href="<?php echo $rout_config?>/dashboard">
													<i class="fas fa-columns"></i>
													<span>الرئيسية</span>
													<!-- <small class="unread-msg"></small> -->

												</a>
											</li>
											
											<li class="<?php if ( $current_page =='clinic_list') {echo "active";} ?>">												<a href="<?php echo $rout_config?>/clinic_list">
													<i class="fas fa-calendar-check"></i>
													<span>قائمة العيادات</span>
													<!-- <small class="unread-msg"></small> -->

												</a>
											</li>
											
											<li class="<?php if ( $current_page =='add_clinic') {echo "active";} ?>">												<a href="<?php echo $rout_config?>/add_clinic">
													<i class="fa fa-plus-square" aria-hidden="true"></i>
													<span>إضافة عيادة</span>
												</a>
											</li>

											<li class="<?php if ( $current_page =='booking') {echo "active";} ?>">												<a href="<?php echo $rout_config?>/booking">
													<i class="fas fa-calendar-check"></i>
													<span>الحجوزات</span>
													<!-- <small class="unread-msg"></small> -->

												</a>
											</li>
											
											
											<li class="<?php if ( $current_page =='offers') {echo "active";} ?>">												<a href="<?php echo $rout_config?>/offers">
													<i class="fas fa-file-invoice"></i>
													<span>العروض</span>
													<!-- <small class="unread-msg"></small> -->

												</a>
											</li>
											
											
											<li class="<?php if ( $current_page =='support') {echo "active";} ?>">												<a href="<?php echo $rout_config?>/support">
													<i class="fas fa-file-invoice"></i>
													<span>الدعم الفني</span>
													<!-- <small class="unread-msg"></small> -->

												</a>
											</li>



											<li>
											
												<a href="<?php echo $rout_config?>/logout">
													<i class="fas fa-sign-out-alt"></i>
													<span>تسجيل الخروج</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>

							</div>
						</div>
						<!-- / Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
							<?php 
								 include 'pages/content/'. current_page() .'.php' ; 
							?> 
							</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
			<footer class="footer">
								
				<!-- Footer Bottom -->
                <div class="footer-bottom">
					<div class="container-fluid">
					
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="copyright-text">
										<p class="mb-0">&copy; 2020 Doccure. All rights reserved.</p>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
								
									<!-- Copyright Menu -->
									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="term-condition.html">Terms and Conditions</a></li>
											<li><a href="privacy-policy.html">Policy</a></li>
										</ul>
									</div>
									<!-- /Copyright Menu -->
									
								</div>
							</div>
						</div>
						<!-- /Copyright -->
						
					</div>
				</div>
				<!-- /Footer Bottom -->
				
			</footer>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="<?php echo $rout_config?>/assets/js/jquery.min.js"></script>	
				
			<!-- Bootstrap Core JS -->	
			<script src="<?php echo $rout_config?>/assets/js/popper.min.js"></script>	
			<script src="<?php echo $rout_config?>/assets/plugins/bootstrap-rtl/js/bootstrap.min.js"></script>	
				
			<!-- Sticky Sidebar JS -->	
	        <script src="<?php echo $rout_config?>/assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>	
	        <script src="<?php echo $rout_config?>/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>	
				
			<!-- Fancybox JS -->	
			<script src="<?php echo $rout_config?>/assets/plugins/fancybox/jquery.fancybox.min.js"></script>	
				
			<script src="<?php echo $rout_config?>/assets/js/circle-progress.min.js"></script>	
			<!-- Custom JS -->	
			<script src="<?php echo $rout_config?>/assets/js/script.js"></script>
		
	</body>
</html>