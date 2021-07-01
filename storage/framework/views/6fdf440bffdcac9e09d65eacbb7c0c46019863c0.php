


<?php $__env->startSection('content'); ?>

<style>
    
    h5
    {
        font-size:12px !important;
    }
    
    .slick-slide img {
    border-radius:100%;
    width: 100px;
    height: 100px;
    margin:0px;
}
.offer-slider .slick-slide {
    display: block;
    margin-left: 0;
    padding: 10px;
     width:  110px;
     
}

.customfoot
{
    margin-top:3%;
}
.offer-widget
{
    background-color:transparent;
    
}
#cat_title
{
    margin-top: 2%;
    /*margin-right: 11%;*/
}
.img-fluid {
    max-height:175px;
    width: auto;
}
.doc-img img {
    height:150px;
    width: 100%;
}
.avatar>img {
    
    margin-top:-30px;
}
.nav {
    padding-right:0px;
}
}
</style>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
	
		

			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								
							</nav>
							<h2 class="breadcrumb-title"><?php echo e($offers[0]->cat_name); ?></h2>
						</div>
					</div>
				</div>
			</div>
			
		  	<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
				    
				   

					<div class="row">
						
						 
						
						<div style="margin:auto" class="col-md-7 col-lg-9 col-xl-9 offer_content">

					

							<div class="row">
							    
							      <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							      
							  
							      
								<div class="col-md-12 col-lg-4 col-xl-4 product-custom">
									<div class="profile-widget" style="width: 100%; display: inline-block;">
									
									<div class="doc-img">
										<a href="doctor-profile.html" tabindex="0">
											<img style="width:300px !important;height:200px !important" class="img-fluid" alt="User Image" src="../images/<?php echo e($offer->offer_photo); ?>">
										</a>
										
										</a>
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
												<img class="avatar-img rounded-circle"  alt="<?php echo e($offer->clinic_name); ?>" src="../images/<?php echo e($offer->clinic_logo); ?>">
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
											
												<form id="f<?php echo $offer->offer_id?>" action="<?php echo e(url('bookoffer')); ?>" method="post">
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
											
									
												
											 <input class="btn book-btn" onclick="" value="احجز الان" type="submit" >
											</div>
                                               
                                                 </form>
                                      
											
											
										</div>
									</div>
								</div>
							   </div>
							   
							   
							  
							  			     
					 
						
							 
							 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							 
			
                              
                          
						</div>
					</div>
				</div>
			</div>
		
			
	
		   
	   </div>
	   <?php $__env->stopSection(); ?>

<?php echo $__env->make('views.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/catoffers.blade.php ENDPATH**/ ?>