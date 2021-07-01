<?php 
 if (!isset($temp))
 {
	 exit; 
 }
?> 

<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>أسنان بلس - صفحة إدارة العيادات</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo $rout_config?>/assets/plugins/bootstrap-rtl/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="<?php echo $rout_config?>//plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="<?php echo $rout_config?>/assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="<?php echo $rout_config?>/assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="<?php echo $rout_config?>/assets/js/html5shiv.min.js"></script>
			<script src="<?php echo $rout_config?>/assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body class="account-page">
 
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
				
						<div class="col-md-8 offset-md-2">
							
							<!-- Login Tab Content -->
							<div class="account-content" style="margin-top:50px;margin-bottom:50px;">
								<div class="row align-items-center justify-content-center" sty>
								
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3><b>يرجى إدخال أسم المستخدم و كلمة المرور</b></h3>
										</div>
										<form action="<?php echo $rout_config; ?>/login" method="POST">
											<div class="form-group form-focus">
												<input type="text" name="username" class="form-control floating" required>
												<label class="focus-label">اسم المستخدم</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" name="password" class="form-control floating" required>
												<label class="focus-label">كلمة المرور </label>
												<span style="color:red" ><b><?php echo $log->logError ; ?></b></span>

											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit" name="btn_login">تسجيل دخول</button>
											
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
			<footer class="footer">
				
				<!-- Footer Top -->
				<div class="footer-top"  >
					<div class="container-fluid">
					</div>
				</div>
				<!-- /Footer Top -->
				
				<!-- Footer Bottom -->
                <div class="footer-bottom">
					<div class="container-fluid">
					
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="copyright-text">
										<p class="mb-0">جميع الحقوق محفوظة لطبيب أسنان بلس</p>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
								
									<!-- Copyright Menu -->
									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="term-condition.html">الشروط و الاحكام</a></li>
											<li><a href="privacy-policy.html">سياستنا</a></li>
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
		
		<!-- Custom JS -->
		<script src="<?php echo $rout_config?>/assets/js/script.js"></script>
		
	</body>
</html>