<?php $page = 'register'; ?>
@extends('views.layout.mainlayout')
@section('content')

<style>

.profile-widget p.speciality
{
    width:auto !important;
}

@media only screen and (max-width: 1024px) {
    
    .carousel-inner
    {
        height:30vh !important;
    }
    
    .main-nav>li.active>a
    {
        color:white !important;
    }
    
    .cat-offers-tab
    {
        padding-left:5%;
        padding-right:5%;
    }
    #menu-type
    {
        padding-left:5%;
        padding-right:5%;
    }

}



.nav-tabs.nav-justified.nav-tabs-solid>li>a
{
    border: 1px solid #1c598F !important;
}

.nav-tabs.nav-justified.nav-tabs-solid>li>a {
    border-color: white !important;
    background-color: transparent !important;
    border: none !important;
}



.nav-tabs.nav-tabs-solid>li>a.active, .nav-tabs.nav-tabs-solid>li>a.active:hover, .nav-tabs.nav-tabs-solid>li>a.active:focus {
    background-color: transparent !important;
    border-bottom: 3px solid #1c598F !important;
    color: #1c598F !important;
}
    .categ
    {
        margin:1.5% !important;
        padding:12px !important;
    }
    .categ:hover
    {
        color:red;
    }
    
    .services
    {
        color:white;
        background-color:#1c598F !important;
    }
    
    #wave {
  position: relative;
  height: 70px;
  width: 600px;
  background: #e0efe3;
}
#wave:before {
  content: "";
  display: block;
  position: absolute;
  border-radius: 100% 50%;
  width: 340px;
  height: 80px;
  background-color: white;
  right: -5px;
  top: 40px;
}
#wave:after {
  content: "";
  display: block;
  position: absolute;
  border-radius: 100% 50%;
  width: 300px;
  height: 70px;
  background-color: #e0efe3;
  left: 0;
  top: 27px;
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

 <!-- Page Content -->
    <div class="content" style="min-height:200px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 offset-md-2">

                    <!-- Account Content -->
                    <div class="account-content">
                        <div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-8 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">الرئيسية</a></li>
									<li class="breadcrumb-item"><a href="index">العيادات</a></li>
								
								</ol>
							</nav>
						
						</div>
			
						<div class="col-md-4 col-12 d-md-block d-none">
							<div class="sort-by">
								<span class="sort-title">ترتيب حسب</span>
								<span class="sortby-fliter">
									<select class="select">
										<option>اختر</option>
										<option class="sorting">أقل سعر</option>
										<option class="sorting">أعلى تخفيض</option>
										
									</select>
								</span>
							</div>
							
						</div>
						
					
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
    <!-- Page Content -->
    <div class="content" style="min-height:200px;">
        <div class="container-fluid">
            <div class="row">
               
                


  <div  class="col-lg-12">
      
 
          <div class="card">
								<div class="card-body">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div style="min-width:20%" class="doctor-img">
												<a target="_blank" href="../../images/{{$clinic[0]->clinic_logo}}">
													<img width="250px" height="250px" src="../../images/{{$clinic[0]->clinic_logo}}" class="img-fluid" alt="User Image">
												</a>
											</div>
											<div style="margin-top: 2%;" class="doc-info-cont">
												<h4 class="doc-name"><a href="doctor-profile">{{$clinic[0]->clinic_name}}</a></h4>
											
												<p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{$clinic[0]->clinic_address}}</p>
													<p class="doc-location"><i class="fas fa-info"> </i> {{$clinic[0]->clinic_description}}</p>
											
												<div class="clinic-details">
												
													
													<ul class="clinic-gallery">
													    
													    <?php
													    
													      $str_arr = explode (",", $clinic[0]->clinic_carousel); 
													      
													      
													      
													      for($i=0;$i<count($str_arr)-1;$i++)
													      {
													          ?>
													          	<li>
															<a href="../../images{{$str_arr[$i]}}" data-fancybox="gallery">
																<img src="../../images{{$str_arr[$i]}}" alt="Feature">
															</a>
														</li>
													          
													     
													      
													      <?php }
													     


													    
													    
													    
													    ?>
													    
													
													
													
													
													</ul>
												</div>
											
											</div>
										</div>
									
									</div>
								</div>
							</div>

         
          
       
          
          
          
      </div>
                                    
								</div>
								
								</div>
								
									<br>		<br>						    
			<div id="menu-type" class="row">
			    
			 	<ul class="col-lg-12 nav nav-tabs nav-tabs-solid nav-justified">
    							    		    
												<li id="offers"  class="nav-item showing"><a class="nav-link active"  data-toggle="tab">العروض</a></li>
												<li id="services"  class="nav-item showing"><a class="nav-link " data-toggle="tab">الخدمات</a></li>
											</ul>
			    
			</div>					    

<div class="cat-offers-tab" id="cat-offers-tab">
<div class="row">

          <?php $break=0 ;
          
         
          
          ?>

          @foreach ($category as $cat)
          
          
         <?php if($cat->cat_type=="2" && $break=="0")
         {
             echo "</div>";
             
          
             echo "<hr>";
             
             echo '<div class="row">';
             $break=1;
         }
         ?>
          
          	
          <button id="" type="button" data-filter="{{$cat->cat_id}}" class="btn categ view-btn  btn-outline-primary filter-cat-offers">{{$cat->cat_name}}</button>
          
           
	
		
		
		@endforeach
	
</div>
</div>

<div class="cat-offers-tab" style="display:none" id="cat-services-tab">
<div class="row">

          <?php $break=0 ;
          
         
          
          ?>

          @foreach ($servcategory as $servcat)
          
          
         <?php if($cat->cat_type=="2" && $break=="0")
         {
             echo "</div>";
             
          
             echo "<hr>";
             
             echo '<div class="row">';
             $break=1;
         }
         ?>
          
          	
          <button id="" data-filter="{{$servcat->cat_id}}" type="button"  data-filter="{{$cat->cat_name}}" class="btn categ view-btn  btn-outline-primary filter-cat-services">{{$servcat->cat_name}}</button>
          
           
	
		
		
		@endforeach
	
</div>
</div>


		
	
   
    

                     <div id="offers-tab" >
                    <div class="col-md-3 col-lg-4 col-xl-12">
							<div id="offers-data" class="row row-grid">
							
								
							 @foreach ($offers as $offer)
							
							
						
								
								<div data-category="{{$offer->cat_id}}" class="col-md-6 col-lg-4 col-xl-3 product-box">
									<div class="profile-widget">
										<div class="doc-img">
											<a href="doctor-profile">
												<img style="width:100%;height:150px" class="img-fluid" alt="User Image" src="../../images/{{$offer->offer_photo}}">
											</a>
									 <div style="width:60px;height:30px;background-color:red;position:absolute;color:white;font-size:20px;top:0px">
											        
											       <center> {{getpercentage($offer->offer_old_price,$offer->offer_new_price)}} % </center>
											       
											    </div>
											
											</a>
										</div>
									<div class="pro-content">
										
											<h3 class="title">
												<a href="doctor-profile">{{$offer->offer_title}}</a> 
												<i class="fas fa-check-circle verified"></i>
											</h3>
											<p class="speciality">{{$offer->offer_sub_title}}
											
											
											<ul class="available-info">
											<li>
											<i class="far fa-money-bill-alt"></i> <span style="font-size:20px;color:red;"> {{$offer->offer_new_price}} </span><del>{{$offer->offer_old_price}}</del>ريال
											
											</li>
										</ul>
										<div class="row row-sm">
												<div class="col-6">
													<a href="{{ Route('offerdetails',$offer->offer_id) }}" class="btn view-btn">تفاصيل</a>
												</div>
												<div class="col-6">
													<a href="{{ Route('offerdetails',$offer->offer_id) }}" class="btn book-btn">احجز الآن</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								
								@endforeach
								

							</div>
						</div>
						</div>
						
						
					
						
						
						<div style="display:none" id="services-tab">
						 <div class="col-md-3 col-lg-4 col-xl-12">
							<div id="services-data" class="row row-grid">
							
						
								
							 @foreach ($services as $serv)
							
							
						
								
								<div data-category="{{$serv->cat_id}}" class="col-md-6 col-lg-4 col-xl-3 product-service-box">
									<div class="profile-widget">
									
									<div class="pro-content">
										
											<h3 class="title">
												<a href="doctor-profile">{{$serv->private_serv_name}}</a> 
												<i class="fas fa-check-circle verified"></i>
											</h3>
										
											
											
											<ul class="available-info">
											<li>
												<i class="far fa-money-bill-alt"></i> <span style="font-size:20px;color:black;"> {{$serv->clinic_serv_price}} </span>ريال
											
											</li>
										</ul>
										<div class="row row-sm">
											
												<div class="col-12">
													<a href="{{ Route('bookservice',[$serv->clinic_id , $serv->private_serv_id] ) }}" class="btn book-btn">احجز الآن</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								
								@endforeach
								

							</div>
						</div>
						</div>
						
                    <!-- /Account Content -->

                </div>
            </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    
    $(document).ready(function(){
    
   
    
 var $filters = $('.filter-cat-offers');
 
 var $filters2 = $('.filter-cat-services');
 

    $boxes = $('.product-box');
    
    $boxes2 = $('.product-service-box');
    
    
    

  $filters.on('click', function(e) {
      
   
    e.preventDefault();
    var $this = $(this);
    
   

    var $filterColor = $this.attr('data-filter');
    
   
      
       
         
             var finaldata=$boxes.filter('[data-category = "' + $filterColor + '"]');
             
             $("#offers-data").empty();
             
             
             
            $("#offers-data").append(finaldata); 
            
            

            
         
          

  });
  
    $filters2.on('click', function(e) {
      
   
    e.preventDefault();
    var $this = $(this);
    
   

    var $filterColor2 = $this.attr('data-filter');
    
   
      
       
         
             var finaldata2=$boxes2.filter('[data-category = "' + $filterColor2 + '"]');
             
             $("#services-data").empty();
             
             
             
            $("#services-data").append(finaldata2); 
            
            

            
         
          

  });
  
  
        
        
        $("#services").click(function(){
   $("#services-data").empty();
    $("#services-data").append($boxes2); 
  $("#offers-tab").hide();
   $("#services-tab").show();
    $("#cat-services-tab").show();
     $("#cat-offers-tab").hide();
     
   
});

$("#offers").click(function(){
   
     $("#offers-data").empty();
    $("#offers-data").append($boxes); 
  $("#offers-tab").show();
   $("#services-tab").hide();
     $("#cat-services-tab").hide();
     $("#cat-offers-tab").show();
     
});

});
        
    </script>
    
@endsection


