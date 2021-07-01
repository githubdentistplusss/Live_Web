    <!-- معتمد -->
<title >أسنان بلس - عرض :  <?php echo e($offers[0]->offer_title); ?></title>
<meta property="og:image" content="<?php echo e(asset('images/'.$offers[0]->offer_photo)); ?>">
<meta name="description" content=" <?php echo e($offers[0]->offer_sub_title); ?>">




<?php $__env->startSection('content'); ?>



<?php if(isset($offers)): ?>

<?php  function getpercentage($old,$new)


{
    if($new<$old)
    {
      return 100-round(($new/$old*100),0);  
    }
    else
    {
        return "";
    }
}

?>

<style>



.social .fbtn {
    width: 50px;
    display: inline-block;
    color: #fff;
    text-align: center;
    line-height:18px;
    float: left;
    height:50px;
    padding:15px;
}
.social .fa{padding:15px 0px}
.facebook {
    background-color: #3b5998;
}
.copy
{
    background-color: grey;
}
 
.whatsapp {
    background-color: #25D366;
}
 
.twitter {
    background-color: #55acee;
}


.telegram
{
    background-color:#0088cc
}
 
.stumbleupon {
    background-color: #eb4924;
}
 
.pinterest {
    background-color: #cc2127;
}
 
.linkedin {
    background-color: #0077b5;
}
 
.buffer {
    background-color: #323b43;
}

.share-button.sharer {

}
.share-button.sharer .social.active.top {
  transform: scale(1) translateY(-10px);
}
.share-button.sharer .social.active {
  opacity: 1;
  transition: all 0.4s ease 0s;
  visibility: visible;
}
.share-button.sharer .social.networks-5 {

}
.share-button.sharer .social.top {
  margin-top: 4%;
   margin-right: -6%;
  transform-origin: 0 0 0;
}
.share-button.sharer .social {
  margin-left: -65px;
  opacity: 0;
  transition: all 0.4s ease 0s;
  visibility: hidden;
}
  .breadcrumb-item+.breadcrumb-item
        {
            padding-right: .5rem;
            padding-left:0px;
            
        }
        .breadcrumb-item+.breadcrumb-item::before {
            padding-left: .5rem;
            padding-right:0px;
        }
        .breadcrumb-item a
        {
            color:white;
        }
        
        
        @media  only screen and (max-width: 1300px){
    #map{
        width: 100% !important;
    }
}

@media  only screen and (max-width: 1100px){
    #map{
        width: 32%;
    }
}
@media  only screen and (max-width: 640px){
      #map{
        width: 100% !important;
    }

}
@media  only screen and (max-width: 490px){
     #map{
        width: 100% !important;
        
    }

}
@media  only screen and (max-width: 380px){
     #map{
        width: 100% !important;
      
    }

}
</style>

		<!-- Main Wrapper -->
		<div>
		

			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
                    
					<div class="row">
				
					    <div class="col-md-11 m-auto">
					        	  
					    <div class="card">
					        	  <nav aria-label="breadcrumb">
										<ol class="breadcrumb mb-0" style="background-color:#fff;">
											<li class="breadcrumb-item"><a class="text-info" href="https://dentistpluss.com">الرئيسية</a></li>
											<li class="breadcrumb-item"><a class="text-info" href="https://dentistpluss.com/offers">العروض</a></li>
											<?php if($offers[0]->cat_type =="2"): ?>
												<li class="breadcrumb-item"><a class="text-info" href="#" >الجلدية</a></li>
											<?php else: ?>
												<li class="breadcrumb-item"><a class="text-info" href="#" >الأسنان</a></li>
											<?php endif; ?>
											<li class="breadcrumb-item active" aria-current="page"><?php echo e($offers[0]->cat_name); ?></li>
										</ol>
									</nav>
								<div class="card-body">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img">
												<a href="<?php echo e($offers[0]->offer_id); ?>">
												     <div style="width:65px;height:30px;background-color:red;position:absolute;color:white;font-size:20px">
											        
											       <center> <?php echo e(getpercentage($offers[0]->offer_old_price,$offers[0]->offer_new_price)); ?> % </center>
											       
											    </div>
													<img src="<?php echo e(asset('images/'.$offers[0]->offer_photo)); ?>" class="img-fluid" alt="User Image">
													
											   
												</a>
											 <div class="share-button sharer" style="display: block;">
<button style="width:93%;color:white;font-size:15px;background-color:#1c598F;border:none;box-shadow: 0px 0px grey;padding:5px;margin-top:10px;margin-right:4px" type="button" class="btn btn-success share-btn"><i class="fas fa-share-alt"></i> مشاركة العرض  </button>
<div style="width:100%" class="social top center networks-5 ">
 <!-- Facebook Share Button -->
    <a class="fbtn share facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://www.dentistpluss.com/offerdetails/<?php echo $offers[0]->offer_id ?>"><i class="fab fa-facebook-f"></i></a> 
    <!-- Google Plus Share Button -->
    <a class="fbtn share whatsapp" target="_blank" href="https://api.whatsapp.com/send?text=https://www.dentistpluss.com/offerdetails/<?php echo $offers[0]->offer_id ?>"><i class="fab fa-whatsapp"></i></a> 
    <!-- Twitter Share Button -->
    <a class="fbtn share twitter" target="_blank" href="https://twitter.com/intent/tweet?url=https://www.dentistpluss.com/offerdetails/<?php echo $offers[0]->offer_id ?>&text="><i class="fab fa-twitter"></i></a> 
       <!-- Pinterest Share Button -->
    <a class="fbtn share telegram" target="_blank" href="https://t.me/share/url?url=https://www.dentistpluss.com/offerdetails/<?php echo $offers[0]->offer_id ?>&text=<?php echo $offers[0]->offer_title ?>"><i class="fab fa-telegram"></i></a>
     <button class="fbtn share copy" onclick="myFunction()" style="border:none"><i class="fas fa-copy"></i></button>
   
    
 </a>
</div>
</div>
											</div>    

											                             
											       
											<div class="doc-info-cont">
												<h4 class="doc-name"><a href="<?php echo e($offers[0]->offer_id); ?>"><?php echo e($offers[0]->offer_title); ?></a></h4>
												<p class="doc-speciality"><?php echo e($offers[0]->offer_sub_title); ?></p>
												<div >
    												<h2 class="table-avatar" >
														<a target="_blank" href="<?php echo e($offers[0]->clinic_map_link); ?>" class="avatar avatar-lg">
															<img class="avatar-img rounded-circle" src="<?php echo e(asset('images/'.$offers[0]->clinic_logo)); ?>" alt="User Image">
														</a>
														<a target="_blank" href="<?php echo e($offers[0]->clinic_map_link); ?>" style="margin-right:10px">
														    <?php echo e($offers[0]->clinic_name); ?>

														    <span><i class="fas fa-map-marker-alt"></i> <?php echo e($offers[0]->clinic_address); ?></span>
														</a>
    												</h2>
												</div>
												<Br/>
												<h3>
 											 <span  class="text-danger"> <?php echo e($offers[0]->offer_new_price); ?> ريال </span> 
											 <del><span style="font-size:1rem;" > <?php echo e($offers[0]->offer_old_price); ?> ريال </span>
											 </del> 
											 <span class="text-success" style="font-size:0.8rem;" > ستوفر  <?php echo e($offers[0]->offer_old_price - $offers[0]->offer_new_price); ?>ريال  </span>
											 	</h3>
											 	<br/>
											  
											
											</span>
											
								<div><i class="fas fa-eye"></i> عدد المشاهدات : <?php echo $offers[0]->offer_view ?></div> 
										
												<!--
												<h5 class="doc-department"><img src="<?php echo e(asset('assets/assets/img/features/feature-05.jpg')); ?>" class="img-fluid" alt="Speciality">Dentist</h5>
												<div class="rating">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i>
													<span class="d-inline-block average-rating">(17)</span>
												</div>-->
										
											<p>
											    <?php if(isset(Auth::guard('client')->user()->id)): ?>
											    
											    <small>احجز الآن قبل إنتهاء مدة العرض</small>
											    
												<form id="f<?php echo $offers[0]->offer_id?>" action="<?php echo e(url('bookoffer')); ?>" method="post">
											    <?php echo csrf_field(); ?>  

                                                     <?php echo method_field('PUT'); ?>
                                                    <input type="text" value="<?php echo e($offers[0]->offer_id); ?>" name="offer_id" hidden />
                                                 
                                                   <input type="text" value="<?php echo e($offers[0]->offer_new_price); ?>" name="offer_booking_price" hidden />
                                                   <?php if(isset(Auth::guard('client')->user()->id)): ?>
                                                    <input type="text" value="<?php echo e(Auth::guard('client')->user()->id); ?>" name="user_id" hidden />
                                                   <?php else: ?>
                                                    <input type="text" value="-1" name="user_id" hidden />
                                                   
                                                   <?php endif; ?>
                                                 
                                                     <div class="col-6">
    												     <input class="btn book-btn" onclick="" value="احجز الان" type="submit" >
    										    	</div>
                                                   
                                                     </form>
												<?php endif; ?>
											</p>
												<br/>
												<div class="widget experience-widget">
												<h4 class="widget-title">تفاصيل و شروط العرض</h4>
												<div class="experience-box">
													<ul class="experience-list">
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content" style="min-height:50px">
																<div class="timeline-content" >
													    <pre class="timeline-content" style='font-family: "Poppins", sans-serif;font-weight: 400;line-height: 1.5;white-space: break-spaces;'><?php echo e(preg_replace('#<br\s*/?>#i', " ", $offers[0]->offer_details)); ?></pre>
																    
																</div>
															</div>
														</li> 
													</ul>
												</div>
											</div>
											
										
											  
											  
											  
											

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBr8fHyX4CFO0PMq4dxJlhPH8RrjXfyN8&callback=initMap&libraries=places&v=weekly"
      async
    ></script>
    
    <script>
    function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: <?php echo $offers[0]->clinic_map_lang ?> , lng: <?php echo $offers[0]->clinic_map_lat ?> },
    zoom: 10,
  });
  const request = {
    placeId:"<?php echo $offers[0]->place_id ?>",
    fields: ["name", "formatted_address", "place_id", "geometry"],
  };
  const infowindow = new google.maps.InfoWindow();
  const service = new google.maps.places.PlacesService(map);
  service.getDetails(request, (place, status) => {
    if (
      status === google.maps.places.PlacesServiceStatus.OK &&
      place &&
      place.geometry &&
      place.geometry.location
    ) {
      const marker = new google.maps.Marker({
        map,
        position: place.geometry.location,
      });
      google.maps.event.addListener(marker, "click", function () {
        infowindow.setContent(
          "<div><strong>" +
            place.name +
            "</strong><br>" +
            "Place ID: " +
            place.place_id +
            "<br>" +
            place.formatted_address +
            "</div>"
        );
        infowindow.open(map, this);
      });
    }
  });
}

</script>
									
												
											
											    <!--
												<div class="clinic-details">
													<p class="doc-location"><i class="fas fa-map-marker-alt"></i> Florida, USA</p>
													<ul class="clinic-gallery">
														<li>
															<a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
																<img src="<?php echo e(asset('assets/assets/img/features/feature-01.jpg')); ?>" alt="Feature">
															</a>
														</li>
														<li>
															<a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">
																<img src="<?php echo e(asset('assets/assets/img/features/feature-02.jpg')); ?>" alt="Feature">
															</a>
														</li>
														<li>
															<a href="assets/img/features/feature-03.jpg" data-fancybox="gallery">
																<img src="<?php echo e(asset('assets/assets/img/features/feature-03.jpg')); ?>" alt="Feature">
															</a>
														</li>
														<li>
															<a href="assets/img/features/feature-04.jpg" data-fancybox="gallery">
																<img src="<?php echo e(asset('assets/assets/img/features/feature-04.jpg')); ?>" alt="Feature">
															</a>
														</li>
													</ul>
												</div>
												<div class="clinic-services">
													<span>Dental Fillings</span>
													<span> Whitneing</span>
												</div>
												-->
											</div>
										</div>
										 <?php if(isset( $booking[0]->offer_booking_status ) ): ?>
										<div class="doc-info-right">
										    <h4 style="color:red"><?php echo e(Auth::guard('client')->user()->name); ?> , </h4>
										     <p class="doc-speciality"> شكراً لثقتكم في عروض أسنان بلس ، سوف يتم التواصل معكم من قبل العياده لتحديد موعد الحجز</p>
										    	<div class="clini-infos">
												<ul>
													<li><i class="far fa-bookmark"></i><b> حالة الحجز 
												        </b>
													<?php if($booking[0]->offer_booking_status ==0): ?>
    												في إنتظار التأكيد من العيادة
    													<?php elseif($booking[0]->offer_booking_status ==1): ?>
    												تم تأكيد الحجز 
    													<?php elseif($booking[0]->offer_booking_status ==2): ?>
    													 تم الإلغاء من المستخدم
    													<?php elseif($booking[0]->offer_booking_status ==3): ?>
    													 تم تأكيد الحضور
    													<?php elseif($booking[0]->offer_booking_status ==4): ?>
    													لم يتم الحضور للموعد 
													<?php endif; ?>
													
													</li>
													<li><i class="far fa-comment"></i><b>
													تاريخ الحجز
													</b>
    													<?php if($booking[0]->offer_booking_status ==''): ?>
        												 لم يتم التحديد بعد
    													<?php else: ?>
        												 <?php echo e($booking[0]->offer_booking_date); ?>

    													<?php endif; ?>
													</li>
													<li><i class="far fa-money-bill-alt"></i> <b>
													قيمة العرض:
													</b>
												    	<?php echo e($booking[0]->offer_booking_price); ?>

												    <!--	<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>-->
													</li>
													<li><i class="fas fa-map-marker-alt"></i>
													    <a class="text-success" href="<?php echo e($offers[0]->clinic_map_link); ?>" target="_blank" > الذهاب للموقع</a>
													</li>
													<li><i class="fas fa-phone"></i>
												    	<a class="text-success" href="tel:<?php echo e($offers[0]->clinic_2nd_phone); ?>" target="_blank"> <?php echo e($offers[0]->clinic_2nd_phone); ?></a>
													</li>

												</ul>
                                        	</div>
										    
										 </div>
									    <?php elseif(!isset(Auth::guard('client')->user()->id)): ?>

										<div class="doc-info-right">
										    		    <div class="login-header">
                                                        <h3>سجل و احجز الآن</h3>
                                                    </div>
										    	
											    <small>احجز الآن قبل إنتهاء مدة العرض
											    / 
											    <a href="<?php echo e(url('cLogin')); ?>" class="text-primary">تسجيل الدخول</a>
											    </small>
                    									
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
                                                    <form method="POST" action="<?php echo e(url('offerdetails')); ?>/<?php echo e($offers[0]->offer_id); ?>">
                                                        <?php echo csrf_field(); ?>
                    
                                                        <div class="form-group card-label">
                                                            <label><?php echo app('translator')->getFromJson('login.name'); ?></label>
                                                            <input class="form-control loginInput <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                                type="text" name="name" value="<?php echo e(old('name')); ?>" required="">
                                                              <input class="form-control" type="hidden" name="offer_new_price" 
                                                              value="<?php echo e($offers[0]->offer_new_price); ?>" >
                                                            
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
                                                            <label><?php echo app('translator')->getFromJson('login.mobile'); ?></label>
                                                            <input class="form-control loginInput  <?php if ($errors->has('mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                                type="text" name="mobile" value="<?php echo e(old('mobile')); ?>" required="">
                    
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
                                                            <input required class="form-control loginInput <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                                type="password" name="password">
                    
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
                                                            <input required class="form-control loginInput" type="password" name="password_confirmation">
                                                        </div>
                                                      
                    
                                                        <div class="form-group">
                                                            <div class="form-check-inline">
                                                                <div class="terms-accept">
                                                                    <div class="custom-checkbox">
                                                                        <!--<input class="form-check-input" required type="checkbox" value="">-->
                                                                        <label for="terms_accept">بالضغط على زر الحجز أنت توافق على <a
                                                                                href="<?php echo e(route('terms')); ?>">الشروط و الأحكام</a></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary btn-block btn-lg login-btn" type="submit"name="btn_rigester">
                                                               أحجز</button>
                                                    </form>
										    <!--
											<div class="clini-infos">
												<ul>
													<li><i class="far fa-thumbs-up"></i> 98%</li>
													<li><i class="far fa-comment"></i> 17 Feedback</li>
													<li><i class="fas fa-map-marker-alt"></i> Florida, USA</li>
													<li><i class="far fa-money-bill-alt"></i> $300 - $1000 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i> </li>
												</ul>

												الآن يمكنك حجز العرض بضغط زر 
											</div>
											<div class="clinic-booking">
												<a class="apt-btn" href="<?php echo e(url('bookoffer')); ?>">احجز الآن</a>
											</div>
										</div>
										-->
									</div>
									<?php endif; ?> 

								</div>
						
						<br/>
						<hr/>

			    	 <div class = " offer text-center">
			    <h2>عروض قد تهمك</h2>
			    </div>
			    
			 
						
					
						<div class="col-lg-12" class="col-sm-12">
							<div class="doctor-slider slider">
					           <?php $__currentLoopData = $rec_offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    								<!-- Doctor Widget -->
    								<div style="" class="profile-widget">
    									<div class="doc-img">
    										<a href="<?php echo e(Route('offerdetails',$offer->offer_id)); ?>">
    										    
    											<img style="width:220px !important;height:150px !important" class="img-fluid" alt="<?php echo e($offer->offer_title); ?>" src="<?php echo e(asset('images/'.$offer->offer_photo)); ?>">
    										</a>
    										 <div style="width:60px;height:30px;background-color:red;position:absolute;color:white;font-size:20px;top:0px">
											        
											       <center> <?php echo e(getpercentage($offer->offer_old_price,$offer->offer_new_price)); ?> % </center>
											       
											    </div>
    									</div>
    															    
			     
    									<div class="pro-content">
										<h3 class="title">
											<a href="<?php echo e(Route('offerdetails',$offer->offer_id)); ?>" tabindex="0"><?php echo e($offer->offer_title); ?></a> 
											<i style="display:none" class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality"><?php echo e($offer->offer_sub_title); ?></p>
									
										<ul class="available-info">
											<li>
												<i class="far fa-money-bill-alt"></i> <span style="font-size:20px;color:red;"> <?php echo e($offer->offer_new_price); ?> </span><del><?php echo e($offer->offer_old_price); ?></del>ريال
											</li>
										</ul>
										<div> 
									    	<div class="avatar avatar-lg">
												<img class="avatar-img rounded-circle"  alt="<?php echo e($offer->clinic_name); ?>" src="<?php echo e(asset('images/'.$offer->clinic_logo)); ?>">
											</div>
									    	<div class="avatar" style="width: 10rem;white-space:nowrap; overflow:hidden;">
									    	   	<ul class="available-info">
									    	   	    <li>
									    	   	        <b>  <?php echo e($offer->clinic_name); ?></b>
									    	   	    </li>
        											<li>
            												<i class="fas fa-map-marker-alt"></i><?php echo e($offer->clinic_address); ?>

        											</li>
        										</ul>
											</div>
										</div>
										<div class="row row-sm">
											<div class="col-6">
												<a href="<?php echo e(Route('offerdetails',$offer->offer_id)); ?>" class="btn view-btn" tabindex="0">عرض التفاصيل</a>
											</div>
											
											<form action="<?php echo e(url('bookoffer')); ?>" method="post">
											    <?php echo csrf_field(); ?>  

                                             <?php echo method_field('PUT'); ?>
                                              <input type="text" value="<?php echo e($offer->offer_id); ?>" name="offer_id" hidden />
                                             
                                               <input type="text" value="<?php echo e($offer->offer_new_price); ?>" name="offer_booking_price" hidden />
                                               <?php if(isset(Auth::guard('client')->user()->id)): ?>
                                                <input type="text" value="<?php echo e(Auth::guard('client')->user()->id); ?>" name="user_id" hidden />
                                               <?php else: ?>
                                                <input type="text" value="-1" name="user_id" hidden />
                                               
                                               <?php endif; ?>
                                             
                                                 <div class="col-6">
												    <input class="btn book-btn" onclick="javascript:return confirm('هل تريد حجز هذا العرض');" value="احجز الان" type="submit" >
										    	</div>
                                               
                                                 </form>
										</div>
    									</div>
    								</div>
    								<!-- /Doctor Widget -->
    						    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    						    
    						    
						
							</div>
							
							<div class = "text-center">
							<a href="https://www.dentistpluss.com/offers" class="btn book-btn1 mb-4" class="text-center"> <?php echo app('translator')->getFromJson('home.view_all_offers'); ?> </a>
							</div>

			
		

				</div>
                    	</div>
					    </div>
				
				</div>
			</div>		
			<!-- /Page Content -->
   
		
	
	
		<?php else: ?>
		
		<div></div>
		
		<?php endif; ?>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<script>
		
	
function myFunction() {
var dummy = document.createElement('input'),
text = window.location.href;
document.body.appendChild(dummy);
dummy.value = text;
dummy.select();
document.execCommand('copy');
document.body.removeChild(dummy);

}

		    
		 $( document ).ready(function() {
     //custom button for homepage
     $( ".share-btn" ).click(function(e) {
          $('.networks-5').not($(this).next( ".networks-5" )).each(function(){
             $(this).removeClass("active");
         });
         $(this).next( ".networks-5" ).toggleClass( "active" );
    });   
    
     
});

	    
		</script>
		
		<?php $__env->stopSection(); ?>
<?php echo $__env->make('views.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/offer-details.blade.php ENDPATH**/ ?>