<!DOCTYPE html> 
<html lang="ar">
	<head>
		<meta charset="utf-8">
		<title>لوحة تحكم العيادة</title>
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
		<link rel="stylesheet" href="<?php echo $rout_config?>/assets/css/fixed.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="<?php echo $rout_config?>/assets/js/html5shiv.min.js"></script>
			<script src="<?php echo $rout_config?>/assets/js/respond.min.js"></script>
		<![endif]-->
		

	  

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 


		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

	  

		<script type="text/javascript" src="<?php echo $rout_config?>/assets/plugins/esign/jquery.signature.min.js"></script>

		<link rel="stylesheet" type="text/css" href="<?php echo $rout_config?>/assets/plugins/esign/jquery.signature.css">

	  

		<style>

			.kbw-signature { width: 400px; height: 200px;}

			#sig canvas{

				width: 100% !important;

				height: auto;

			}

		</style>

  
	</head>
	<body>
       <?php 
            $current_page =current_page();
			$id = $_SESSION['userInfo']['clinic_id'];
			$sql = "SELECT * FROM `contracts` WHERE clinic_id='{$id}' " ; 
			$clinic_info = $db->data_query ($sql) ;
       ?>
		<!-- Main Wrapper -->
		<div class="main-wrapper">
	
		
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						
						<!-- Profile Sidebar -->
						
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="<?php echo $upload_dir?>/<?php echo $_SESSION['userInfo']['clinic_logo'];  ?>" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3> <?php echo $_SESSION['userInfo']['clinic_name'];
											?> </h3>
											<div class="patient-details">
											<!--	<h5><i class="fas fa-birthday-cake"></i> 24 Jul 1983, 38 years</h5>-->
												<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>  <?php echo $_SESSION['userInfo']['clinic_address']; ?></h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li class="<?php if ( $current_page =='dashboard') {echo "active";} ?>">
												<a href="<?php echo $rout_config?>/dashboard">
													<i class="fas fa-columns"></i>
													<span>الرئيسية</span>
													<!-- <small class="unread-msg">5</small> -->

												</a>
											</li>
											<li class="<?php if ( $current_page =='booking') {echo "active";} ?>">
												<a href="<?php echo $rout_config?>/booking">
													<i class="fas fa-calendar-check"></i>
													<span>الحجوزات</span>
													<!-- <small class="unread-msg">23</small> -->

												</a>
											</li>
											<li class="<?php if ( $current_page =='offers') {echo "active";} ?>">
												<a href="<?php echo $rout_config?>/offers">
													<i class="fas fa-file-invoice"></i>
													<span>العروض</span>
														<!-- <small class="unread-msg">3</small> -->

												</a>
											</li>
											<li class="<?php if ( $current_page =='hours') {echo "active";} ?>">
												<a href="<?php echo $rout_config?>/hours">
													<i class="fas fa-hourglass-start"></i>
													<span>أوقات العمل </span>
												</a>
											</li>
											<li class="<?php if ( $current_page =='info') {echo "active";} ?>">
												<a href="<?php echo $rout_config?>/info">
													<i class="fas fa-comments"></i>
													<span>معلومات المنشأة</span>
												</a>
											</li >
											<?php
												if ($clinic_info)
                								{
                								    echo '<li class="">
        											    	<a href="'. $rout_config .'/get_contract">
        													<i class="fas fa-file"></i>
        													<span>العقد الإلكتروني</span>
        												</a>
        											</li >';
                								}
                								?>
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
							// 0 Not Sign 
							// 1 Sign 
							// 2 Active 

							if($_SESSION['userInfo']['clinic_status']==0)
							{	
								if ($clinic_info)
								{
									$msg = "الحساب في انتظار التفعيل و توثيق العقد، للإطلاع على العقد يرجى 
									<b><a href='$rout_config/get_contract' > الضغط هنا </a> </b>" ;
									echo $temp->msg($msg, 'success');
								}
								else
								{
									$msg = "لم يتم توقيع العقد ، لقراءة بنود العقد و توقعيه يرجى 
									<b><a href='$rout_config/contract' > الضغط هنا </a> </b>" ;
									echo $temp->msg($msg, 'danger'); 
								}
							}
						//	print_r($_SESSION);
						/*
						Array ( [clinic_id] => 1 [userInfo] => Array ( [clinic_id] => 1 [clinic_name] => عيادة أسنان بلس الطبي [clinic_phone] => 05400055 [clinic_2nd_phone] => 4445454 [clinic_description] => عيادات رام مخصصة في الرعاية الطبية ونوفر خدمات ذات جودة عالية تحت سقف واحد بأحدث التقنيات المتقدمة في جميع التخصصات ( أسنان – جلدية – طبي ) نسعى لخدمتكم بأي وقت. [city_id] => 9 [clinic_address] => الدمام - حي البحيرة - شارع الخليجي [clinic_map_lang] => 26.4685133 [clinic_logo] => clinics/ram_clinic.png [clinic_username] => ram_clinic [clinic_password] => ram123 [clinic_status] => 1 [clinic_map_lat] => 50.0560048 ) [username] => ram_clinic [password] => ram123 )
                            */
							
								 include 'pages/content/'.  $current_page  .'.php' ; 
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
										<p class="mb-0">&copy; جميع الحقوق محفوظه لطبيب أسنان بلس 2021</p>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
								
									<!-- Copyright Menu --  >
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
	  		
<script type="text/javascript">

    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});

    $('#clear').click(function(e) {

        e.preventDefault();

        sig.signature('clear');

        $("#signature64").val('');

    });

</script>


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