

<?php $__env->startSection('content'); ?>

<style>


.hidden
{
    
}


.is-animated
{
    
}
.profile-widget p.speciality {
    font-size: 13px;
    color: #757575;
    margin-bottom: 5px;
    max-height: 40px;
    width: 220px;
    word-wrap: break-word;
    overflow: hidden;
}

.bar {
  position: relative;
  height: 2px;
  width: 500px;
  margin: 0 auto;
  background: #fff;
  margin-top: 150px;
}

.circle {
  position: absolute;
  top: -30px;
  margin-left: -30px;
  height: 60px;
  width: 60px;
  left: 0;
  background-image: url("https://dentistpluss.com/assets/assets/img/favicon.png");
  background: #fff;
  border-radius: 20%;
  -webkit-animation: move 4s infinite;
}



@-webkit-keyframes move {
  0% {left: 0;}
  50% {left: 100%; -webkit-transform: rotate(450deg); width: 150px; height: 150px;}
  75% {left: 100%; -webkit-transform: rotate(450deg); width: 150px; height: 150px;}
  100 {right: 100%;}
} 


    .dropdown-item
    {
        cursor:pointer;
    }
    
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
.book-btn{
    width:80px;
}
}
}

.overlay {
  height: 100%;
  width: 0;
  height:100%;
  background-color:grey;
  position: absolute;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 1);
  overflow-x: hidden;
  transition: 0.5s;
}

.overlay-content {
  position: relative;
  top: 25%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
}



</style>

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

		<!-- Main Wrapper -->
	
          
  
		
		<div class="main-wrapper">
		
		              
                
       
<div id="myNav" style="width: 100%;
    position: absolute;
    width: 100%;
    height: 700%;
    background-color: #1c598F !important;
    z-index: 20;"class="overlay">
  
  <div style="position: absolute;top:2%" class="overlay-content">
  
  <div class="bar">
  <div class="circle"></div>
  
</div>

  </div>
  
</div>
	
		 
			<div class="content">
			    <!--class="container-fluid"-->
				<div class="container-fluid">
				    
				    <div class="row">
				        
				        											<div class="col-lg-2 col-md-2 col-xs-2">
					<center><div class="btn-group">
						    
										<button id="cityfilter" style="margin-bottom:2%;height:45px;width:250px;;background-color:#1c598F !important;border:#1c598F !important" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">فلتر حسب المدينة</button>
										<div style="width:250px" class="dropdown-menu" style="">
										    	<a class="dropdown-item filter" data-filter="all" >الكل</a>
										     <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										    
											<a class="dropdown-item filter" data-filter="<?php echo $city->id ?>" ><?php echo e($city->city_name_ar); ?></a>
										
											
											
										 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											
											
										</div>
									</div></center></div>
									
									
											<div class="col-lg-10 col-md-10 col-xs-10">
						    
				
				
					   <div class="input-group rounded">
  <input type="search" id="search" class="form-control rounded" placeholder="ابحث عن العيادات" aria-label="Search"
    aria-describedby="search-addon" />
  <span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
  </span>
</div>
				
				</div>
				
				</div>
				   

                            
                            <div style="margin-top:2%" id="alldata" class="row">
							    
							      <?php $__currentLoopData = $clinic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							      
							     
							      
								<div  data-category="<?php echo $clin->city_id ?>" class="col-md-6 col-lg-3 col-xl-3 product-custom">
									<div class="profile-widget"  style="width: 80%; display: inline-block;">
									
									<div class="doc-img">
										<a href="" tabindex="0">
											<img  class="img-fluid" alt="User Image" src="images/<?php echo e($clin->clinic_logo); ?>">
										</a>
										
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
										  
											<a href="<?php echo e(Route('clinic',['id'=>$clin->clinic_id,'name'=>$clin->clinic_name])); ?>" tabindex="0"><?php echo e($clin->clinic_name); ?></a> 
											<i style="display:none" class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality"><?php echo e($clin->clinic_address); ?></p>
										
										
									
									
									
									
									
										</a>
										<div class="row row-sm">
											<div class="col-12">
											<a href="<?php echo e(Route('clinic',['id'=>$clin->clinic_id,'name'=>$clin->clinic_name])); ?>" class="btn view-btn" tabindex="0"> تفاصيل العيادة </a>
											</div>
											
										
                                      
											
											
										</div>
									</div>
								</div>
							   </div>
							   
							   
							  
						
							 
							 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                      
		                      
		                     
		                      
		                     
		                       
		                       

		                    
                         	</div>
                         	
                         	
                         	 
                         	 <center style="margin-bottom:30px"><div style="display:none" class="ajax-loading"><img width='150px' height='150px' src="<?php echo e(asset('images/loading.gif')); ?>" /></div><center>

						
                        
					</div>
				</div>
			</div>
		
			
	
		   
	   </div>
	   
	   	  
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	   <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
	   
	   
<script>



    


  var SITEURL = "<?php echo e(url('/')); ?>";


$(document).ready(function(){
    
      $('#myNav').hide();

    
 var $filters = $('.filter'),
 

    $boxes = $('.product-custom');
    
  

  $filters.on('click', function(e) {
      
    
   
    e.preventDefault();
    var $this = $(this);
    
    $filters.removeClass('active');
    $this.addClass('active');

    var $filterColor = $this.attr('data-filter');
    
     var $city = $this.html();
     

        
    
     
     $("#cityfilter").html($city);
    


    if ($filterColor == 'all') {
        
       $("#alldata").append($boxes).hide().show('slow');
        
        
           
    }   
         else
         {
               var finaldata = $boxes.filter('[data-category = "' + $filterColor + '"]');
              
             $("#alldata").empty();
             $("#alldata").append(finaldata).hide().show('slow');
         }
   
      
    
  });
  
  
  

});
</script>


	   
	   <?php $__env->stopSection(); ?>
	   

	   

<?php echo $__env->make('views.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/allclinics.blade.php ENDPATH**/ ?>