

<?php $__env->startSection('content'); ?>

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
    
    .text-info, .dropdown-menu>li>a.text-info
       {
           color:white !important;
       }
       
       .text-info, .dropdown-menu>li>a.text-info:hover
       {
           color:white !important;
       }
       
         .breadcrumb-item+.breadcrumb-item::before {
            padding-left: .5rem;
            padding-right:0px;
            color:white !important;
        }
        .breadcrumb-item.active
        {
             color:#00ABEC !important; 
        }
    
    .slick-slide img {
    border-radius:100%;
    width: 150px;
    height: 150px;
    margin:0px;
}
.offer-slider .slick-slide {
    display: block;
    margin-left: 0;
    padding: 10px;
     width:  250px;
     
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
			    
			    <!-- class="container-fluid" -->
				<div>
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
						    
						    
						    <nav aria-label="breadcrumb">
										<ol class="breadcrumb mb-0" style="background-color:transparent;">
											<li class="breadcrumb-item"><a class="text-info" href="https://dentistpluss.com">الرئيسية</a></li>
											<li class="breadcrumb-item"><a class="text-info" href="https://dentistpluss.com/offers">العروض</a></li>
											
											<li class="breadcrumb-item active" aria-current="page"><?php echo e($offers[0]->city_name_ar); ?></li>
										</ol>
									</nav>
						    
						    
						</div>
					</div>
				</div>
			</div>
			
		  	<!-- Page Content -->
			<div class="content">
			    
			    			    <!-- class="container-fluid" -->

				<div class="container-fluid">
				    
				   

					<div class="row">
						
						 <!--class="offer_content"--> 
						
						<div class="col-md-7 col-lg-12 col-xl-12 offer_content">

					

							<div class="row">
							    
							      <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							      
							     
							      
							<div class="col-md-12 col-lg-3 col-xl-3 product-custom">
									<div class="profile-widget" style="width: 100%; display: inline-block;">
									
									<div class="doc-img">
										<a href="<?php echo e(Route('offerdetails',$offer->offer_id)); ?>" tabindex="0">
											<img class="img-fluid" alt="User Image" src="../images/<?php echo e($offer->offer_photo); ?>">
										</a>
										 <div style="width:60px;height:30px;background-color:red;position:absolute;color:white;font-size:20px;top:0px">
											        
											       <center> <?php echo e(getpercentage($offer->offer_old_price,$offer->offer_new_price)); ?> % </center>
											       
											    </div>
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
											
									
												
												 <input class="btn book-btn" onclick="return test(<?php echo $offer->offer_id?>)" value="احجز الان" type="submit" >
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

<?php echo $__env->make('views.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/sortoffers.blade.php ENDPATH**/ ?>