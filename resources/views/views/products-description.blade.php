@extends('views.layout.mainlayout')
@section('content')



@if(isset($offers))

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
									<li class="breadcrumb-item active" aria-current="page">العروض</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">{{$offers[0]->offer_title}}</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">

						<div class="col-md-6 col-lg-6 col-xl-6">
							<!-- Doctor Widget -->
							<div class="card">
								<div class="card-body product-description">
									<div class="doctor-widget">
										<div class="doc-info-left">

											<!--"doctor-img1"-->
											<div>
													<img src="../images/.{{$offers[0]->offer_photo}}"
													
													
													
													class="img-fluid" alt="User Image">

													<h1 class="pt-4">{{$offers[0]->clinic_name}}</h1>
													<h3 class="pt-4">{{$offers[0]->clinic_address}}</h3>
													


											</div>
											
											
										</div>
										
									</div>
									
								</div>
							</div>
							<!-- /Doctor Widget -->
							
							<!-- Doctor Details Tab -->
							<div class="card">
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
										
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
									<div class="tab-content pt-3">
									
										<!-- Overview Content -->
										<div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
											<div class="row">
												<div class="col-md-9">
												
													<!-- About Details -->
													<div class="widget about-widget">
													
														<iframe
															src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3571.8402559989922!2d50.063217785815134!3d26.460877683324252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e49fe80158839ed%3A0xab99a6181d2cf08!2sAlahsaa%20Food%20Center!5e0!3m2!1sar!2ssa!4v1617056434205!5m2!1sar!2ssa"
															width="740" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

													</div>
													<!-- /About Details -->
									
													<!-- About Details -->
													
													

													<!-- /About Details -->
												</div>
											</div>
										</div>
										<!-- /Overview Content -->
										
									</div>
								</div>
							</div>
							<!-- /Doctor Details Tab -->


						</div>

						<div class="col-md-6 col-lg-6 col-xl-6 theiaStickySidebar">
							
							<!-- Right Details -->
							<div class="card search-filter">
								<div class="card-body">
							<h1 class="pt-4">{{$offers[0]->offer_title}}</h1>
							<h5>{{$offers[0]->offer_sub_title}}</h5>

									<div class="clini-infos mt-0">

										<h2> 
										
											 <b class="text-lg strike">  <del><span class="text-lg text-danger"> {{$offers[0]->offer_old_price}} ريال  </span>
											 </del>
											 	<br></b>
											 <span> {{$offers[0]->offer_new_price}} ريال </span> 
											  
											
											</span></h2>
									</div>
									
									<div class="custom-increment pt-4">
	                                    <div class="input-group1">
		                                    <span class="input-group-btn float-left">
		                                        
		                                    </span>
		                                  
		                                    
		                                    </span>
	                                	</div>
                        			</div>
									<div class="clinic-details mt-4">
										<div class="clinic-booking">
											<a class="apt-btn" href="cart.html">احجز العرض</a>
										</div>
										<div class="doc-info-cont">
										
											<div class="feature-product pt-4">
												<span> <h1>تفاصيل العرض والشروط</h1></span>
											{{$offers[0]->offer_description}}
											</div>
										
										</div>
									</div>
								
								</div>
							</div>
							<div class="card search-filter">
								<div class="card-body">
									
										<!-- Business Hours Widget -->
										<div class="widget business-widget">
											<div class="widget-content">
												<div class="listing-hours">
													<div class="listing-day current">
														<div class="day"> اليوم الأحد<span>5 مارس 2021</span></div>
														<div class="time-items">
															<span class="open-status"><span class="badge bg-success-light">مفتوح الآن</span></span>
															<span class="time">07:00 صباحاً - 09:00 مساءً</span>
														</div>
													</div>
													<div class="listing-day">
														<div class="day">الأثنين</div>
														<div class="time-items">
															<span class="time">07:00 صباحاً - 09:00 مساءً</span>
														</div>
													</div>
													<div class="listing-day">
														<div class="day">الثلاثاء</div>
														<div class="time-items">
															<span class="time">07:00 صباحاً - 09:00 مساءً</span>
														</div>
													</div>
													<div class="listing-day">
														<div class="day">الأربعاء</div>
														<div class="time-items">
															<span class="time">07:00 صباحاً - 09:00 مساءً</span>
														</div>
													</div>
													<div class="listing-day">
														<div class="day">الخميس</div>
														<div class="time-items">
															<span class="time">07:00 صباحاً - 09:00 مساءً</span>
														</div>
													</div>
													<div class="listing-day closed">
														<div class="day">الجمعه</div>
														<div class="time-items">
															<span class="time"><span class="badge bg-danger-light">مغلق</span></span>
														</div>
													</div>
													<div class="listing-day">
														<div class="day">السبت</div>
														<div class="time-items">
															<span class="time">07:00 صباحاً - 1:00 مساءً</span>
														</div>
													</div>
										
												</div>
											</div>
										</div>
										<!-- /Business Hours Widget -->

								</div>
							</div>
							<!-- /Right Details -->
							
						</div>

					</div>

					

				</div>
			</div>		
			<!-- /Page Content -->
   
		
	
	
		@else
		
		<div></div>
		
		@endif
		
		@endsection