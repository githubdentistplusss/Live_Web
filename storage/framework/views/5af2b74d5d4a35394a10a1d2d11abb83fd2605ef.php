

<?php $__env->startSection('content'); ?>

<style>


.hidden
{
    
}

.nav-tabs.nav-justified.nav-tabs-solid>li>a {
    border-color: white !important;
    background-color: white !important;
    border: none !important;
}

.nav-tabs.nav-tabs-solid>li>a.active, .nav-tabs.nav-tabs-solid>li>a.active:hover, .nav-tabs.nav-tabs-solid>li>a.active:focus {
    background-color: white !important;
    border-bottom: 3px solid #1c598F !important;
    color: #1c598F !important;
}

.nav-tabs.nav-tabs-solid {
    background-color: transparent !important;
}

.cat-offers-tab .view-btn
{
    border-radius:30px !important;
    width:150px !important;
}

.is-animated
{
    
}
.btn-outline-primary:not(:disabled):not(.disabled):active, .btn-outline-primary:not(:disabled):not(.disabled).active, .show>.btn-outline-primary.dropdown-toggle
{
    color:white !important;
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
									
										<div class="col-lg-2 col-md-2 col-xs-2">
						    
					<center><div class="btn-group">
						    
										<button id="sortbtn" style="margin-bottom:2%;height:45px;width:250px;;background-color:#1c598F !important;border:#1c598F !important" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">الترتيب</button>
										<div style="width:250px" class="dropdown-menu" style="">
										   
										    
											
										
											 <a class="dropdown-item sortbyprice" data-filter="l2h">ترتيب حسب اقل سعر</a>
                                              <a  class="dropdown-item sortbyprice" data-filter="h2l">ترتيب حسب اعلي سعر</a>
                                               <a class="dropdown-item sortbyprice" data-filter="views">ترتيب حسب عدد المشاهدات </a>
                                                <a class="dropdown-item sortbyprice" data-filter="recent">ترتيب حسب احدث العروض</a>
                                                <a class="dropdown-item sortbyprice" data-filter="match"> ترتيب حسب الاكثر مناسبة</a>
                                                
											
										
											
											
										</div>
									</div></center></div>
									
									<div class="col-lg-8 col-md-8 col-xs-8">
						    
				
				
					   <div class="input-group rounded">
  <input type="search" id="search" class="form-control rounded" placeholder="ابحث عن عروض" aria-label="Search"
    aria-describedby="search-addon" />
  <span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
  </span>
</div>
				
				</div>
					
						<div style="margin-top:2%" class="col-md-7 col-lg-12 col-xl-12 offer_content">
    						<div class="card">
									
    							<div class="card-header">
    								<h4 class="card-title">تصنيفات العروض</h4>
    							</div>

    							<div class="card-body">
    							    		<ul class="nav nav-tabs nav-tabs-solid nav-justified">
    							    		    	<li id="showall" data-filter="-1" class="nav-item showing "><a class="nav-link active" data-toggle="tab">الكل</a></li>
												<li id="showteeth" data-filter="1" class="nav-item showing"><a class="nav-link "  data-toggle="tab">الأسنان</a></li>
												<li id="showskin" data-filter="2" class="nav-item showing"><a class="nav-link " data-toggle="tab">التجميل والليزر</a></li>
											
											</ul> 
											<div class="tab-content">
											  <div class="cat-offers-tab" id="cat-offers-tab">
											      
											      <div class="row type1">
 
          <?php $break=0 ;
          
         
          
          ?>

          <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
          
         <?php if($cat->cat_type=="2" && $break=="0")
         {
             echo "</div>";
             
             
             echo '<div class="row type2">';
             $break=1;
         }
         ?>
          
          	
          <button style="margin-left:20px;margin-bottom:20px" id="" type="button" data-filter="<?php echo e($cat->cat_id); ?>" class="btn categ view-btn  btn-outline-primary filter-cat-offers maincategories"><?php echo e($cat->cat_name); ?></button>
          
           
	
		
		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
</div>
											
                                                       </div>
                                                    
                    								
											
											</div>

                                </div>
                            </div>
                            
                             <center><div id="noffers" style="color:red;font-size:30px;display:none;margin-bottom:1%">لا يوجد عروض الان</div></center>
                            
                            <div style="" id="alldata" class="row">
							    
							      <?php $__currentLoopData = $alloffers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							      
							     
							      
								<div data-type="<?php echo $offer->cat_type ?>" data-maincat="<?php echo $offer->cat_id ?>" data-category="<?php echo $offer->city_id ?>" class="col-md-12 col-lg-3 col-xl-3 product-custom">
									<div class="profile-widget" data-price="<?php echo $offer->offer_new_price ?>" data-views="<?php echo $offer->offer_view ?>" data-date="<?php echo $offer->offer_id ?>" data-match="<?php echo $offer->offer_score ?>" style="width: 100%; display: inline-block;">
									
									<div class="doc-img">
										<a href="<?php echo e(Route('offerdetails',$offer->offer_id)); ?>" tabindex="0">
											<img  class="img-fluid" alt="User Image" src="images/<?php echo e($offer->offer_photo); ?>">
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
									
										<a href="<?php echo e(Route('clinic',['id'=>$offer->clinic_id,'name'=>$offer->clinic_name])); ?>">
										<div > 
									    	<div class="avatar avatar-lg">
												<img class="avatar-img rounded-circle"  alt="<?php echo e($offer->clinic_name); ?>" src="images/<?php echo e($offer->clinic_logo); ?>">
											</div>
									    	<div class="avatar" style="width: 10rem;white-space:nowrap;">
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
										</a>
										<div class="row row-sm">
											<div class="col-6">
												<a href="<?php echo e(Route('offerdetails',$offer->offer_id)); ?>" class="btn view-btn" tabindex="0">عرض التفاصيل</a>
											</div>
											
											<form   action="<?php echo e(url('bookoffer')); ?>" method="post">
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
											
									                
													<a href="<?php echo e(Route('offerdetails',$offer->offer_id)); ?>" class="btn book-btn" tabindex="0"> حجز الان </a>

<!--												
													 <input class="btn book-btn" onclick="" value="احجز الان" type="submit" >
										-->
											</div>
                                               
                                                 </form>
                                      
											
											
										</div>
									</div>
								</div>
							   </div>
							   
							   
							  
						
							 
							 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                      
		                      
		                     
		                      
		                       <div id="pagination" style="display:none"><?php echo e($alloffers->links()); ?></div>
		                       
		                       
		                      
		                       
		                       

		                    
                         	</div>
                         	
                         	 <center style="margin-top:30px"><button id="showmore" onclick="paging();"  type="button" style="position: absolute;
    bottom: 6px;
    width: 25%;
    left: 50%;
    right: 40%;" class="btn btn-primary">المزيد</button></center>
                         	 
                         	 <center style="margin-bottom:30px"><div style="display:none" class="ajax-loading"><img width='150px' height='150px' src="<?php echo e(asset('images/loading.gif')); ?>" /></div><center>

						
                        
					</div>
				</div>
			</div>
		
			
	
		   
	   </div>
	   
	   	  
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	   <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
	   
	   
<script>



    


  var SITEURL = "<?php echo e(url('/')); ?>";
   var page = 1; //track user scroll as page number, right now page number is 1
 var pagetool=($('#pagination ul li').length)-2;
 
    if(pagetool==-2)
            {
               
                document.getElementById('showmore').style.display='none';
            }
 
   function paging()
   {
       
        $totaldivs =  $("#alldata > div").length

         if(pagetool==page && $totaldivs==0 )
         {
             
              document.getElementById('noffers').style.display='block';
               document.getElementById('showmore').style.display='none';
         }
         else if(pagetool==page)
            {
              
                document.getElementById('showmore').style.display='none';
                 document.getElementById('noffers').style.display='none';
            }
     else
     {
         
          document.getElementById('noffers').style.display='none';
          page++;
         
           load_more(page); 
     }
      
   }
  

    function load_more(page){
        
        
      
        $.ajax({
            url:"https://dentistpluss.com/offers?page=" + page,
           type: "get",
           datatype: "html",
           cache: false,
           contentType:"application/x-www-form-urlencoded",
           headers:{'cache-control':"no-cache"},
          
           beforeSend: function()
           { 
               
               
              $('.ajax-loading').show();
            },
        success: function(data)
        {
            

           var parsed = $.parseHTML(data);
           
         var filterColor = Cookies.get('city');
         
          var type = Cookies.get('type');
          
          var maincat = Cookies.get('main');
          
          var extracted=null;
          
          
           
        
         if(type!="-1" && filterColor!="-1" && maincat!="-1")
         {
            extracted=$(parsed).find(".product-custom").filter('[data-type = "' + type + '"]').filter('[data-category = "' + filterColor + '"]').filter('[data-maincat= "' + maincat + '"]'); 
            
             
            
          $('.ajax-loading').hide();
             $("#alldata").append(extracted); 
             
         }
         else if(type!="-1" && filterColor!="-1")
         {
             extracted=$(parsed).find(".product-custom").filter('[data-type = "' + type + '"]').filter('[data-category = "' + filterColor + '"]'); 

          $('.ajax-loading').hide();
             $("#alldata").append(extracted); 
         }
          else if(type!="-1" && maincat !="-1")
          
         {
             console.log("zone22");
             extracted=$(parsed).find(".product-custom").filter('[data-type = "' + type + '"]').filter('[data-maincat= "' + maincat + '"]'); 

          $('.ajax-loading').hide();
             $("#alldata").append(extracted); 
             
         }
          else if(type!="-1")
         {
             console.log("zone");
            
             console.log(type);
             extracted=$(parsed).find(".product-custom").filter('[data-type = "' + type + '"]'); 
             
             
           

          $('.ajax-loading').hide();
             $("#alldata").append(extracted); 
             
         }
         else if(filterColor!="-1" && maincat!="-1")
         {
            extracted=$(parsed).find(".product-custom").filter('[data-category = "' + filterColor + '"]').filter('[data-maincat= "' + maincat + '"]'); 
            
             
            
          $('.ajax-loading').hide();
             $("#alldata").append(extracted); 
         }
          else if(filterColor!="-1")
         {
             extracted=$(parsed).find(".product-custom").filter('[data-category = "' + filterColor + '"]'); 
             
            
            
          $('.ajax-loading').hide();
             $("#alldata").append(extracted); 
         }
           else if(maincat!="-1")
         {
             
             console.log("test");
             extracted=$(parsed).find(".product-custom").filter('[data-maincat= "' + maincat + '"]'); 
             
           
            
          $('.ajax-loading').hide();
             $("#alldata").append(extracted); 
         }
         else
         {
              extracted=$(parsed).find(".product-custom");
               console.log(extracted);
           $('.ajax-loading').hide();
            $("#alldata").append(extracted); 
            
         }
         
       
       
       $totaldivs =  $("#alldata > div").length
       
       
       if(extracted.length==0)
       {
           paging();
       }
       

       if($totaldivs<20) 
       {
           paging();
       }
        
    
        
        
          
          
         var sortingMethod = Cookies.get('sort');
  
  if(sortingMethod == 'l2h') {
    sortProductsPriceAscending();
  } else if (sortingMethod == 'h2l') {
    sortProductsPriceDescending();
  }
  else if(sortingMethod == 'views')
  {
      sortProductsViews();
  }
  else if(sortingMethod == 'recent')
  {
        sortProductsrecent();
  }
 else if(sortingMethod == 'match')
  {
        sortProductsmatch();
  }
 
    
         
        
           
       },
       error: function(XMLHttpRequest, textStatus, errorThrown) { 
           
       
    }       
      
    });
}


  function search_now(value){
      
      document.getElementById('noffers').style.display='none';
        
      $.ajaxSetup({ headers: { 'csrftoken' : '<?php echo e(csrf_token()); ?>' } });
      
        $.ajax({
            url:"https://dentistpluss.com/search_offers",
           type: "get",
           datatype: "html",
           cache: false,
           contentType:"application/x-www-form-urlencoded",
           headers:{'cache-control':"no-cache"},
           data:{'search':value},
           beforeSend: function()
           { 
               
               
              $('.ajax-loading').show();
            },
        success: function(data)
        {
            
             $('.ajax-loading').hide();
        
         
         if(data.length==0)
         {
             $("#alldata").empty();
               document.getElementById('noffers').style.display='block';
         }
         else
         {
              $("#alldata").empty();
              $("#alldata").append(data).hide().show('slow');
         }
           document.getElementById('showmore').style.display='none';
          
         
         

         
        
           
       },
       error: function(XMLHttpRequest, textStatus, errorThrown) { 
           
        
    }       
      
    });
}


$(document).on("click", "#search-addon", function(e) {
    
    $value=$("#search").val();
    
    search_now($value);

});

$("#search").on('keyup', function (e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
      $value=$("#search").val();
    
    search_now($value);
    }
});

$(document).on("click", ".sortbyprice", function(e) {
    
    
   
    
     e.preventDefault();
     
    var $this = $(this);
    
  var sortingMethod = $this.attr('data-filter');

  
  
  
    
     var $sr = $this.html();

     $("#sortbtn").html($sr);
  
Cookies.set('sort', sortingMethod);
  
  if(sortingMethod == 'l2h') {
    sortProductsPriceAscending();
  } else if (sortingMethod == 'h2l') {
    sortProductsPriceDescending();
  }
  else if(sortingMethod == 'views')
  {
      sortProductsViews();
  }
  else if(sortingMethod == 'recent')
  {
        sortProductsrecent();
  }
  else if(sortingMethod == 'match')
  {
        sortProductsmatch();
  }
 
});

function sortProductsPriceAscending() {
  var gridItems = $('.product-custom');

  gridItems.sort(function(a, b) {
    return $('.profile-widget', a).data("price") - $('.profile-widget', b).data("price");
  });
  

  
  
  $("#alldata").append(gridItems);
}


function sortProductsrecent() {
  var gridItems = $('.product-custom');

  gridItems.sort(function(a, b) {
    return $('.profile-widget', b).data("date") - $('.profile-widget', a).data("date");
  });
   $("#alldata").append(gridItems);
}

function sortProductsmatch() {
  var gridItems = $('.product-custom');

  gridItems.sort(function(a, b) {
    return $('.profile-widget', b).data("match") - $('.profile-widget', a).data("match");
  });
   $("#alldata").append(gridItems);
}
  
function sortProductsViews() {
  var gridItems = $('.product-custom');

  gridItems.sort(function(a, b) {
    return $('.profile-widget', b).data("views") - $('.profile-widget', a).data("views");
  });
  
  
  
  $("#alldata").append(gridItems);
}

function sortProductsPriceDescending() {
  var gridItems = $('.product-custom');
  


  gridItems.sort(function(a, b) {
    return $('.profile-widget', b).data("price") - $('.profile-widget', a).data("price");
  });
  


  $("#alldata").append(gridItems);
}
 


$(document).ready(function(){
    

   
    
    Cookies.set('sort', "");
     Cookies.set('city', "-1");
       Cookies.set('type', "-1");
       Cookies.set('main', "-1");
    
    $('#myNav').hide();
    
    
    $("#showteeth").click(function(){
  $(".type2").hide();
   $(".type1").show();
});

 $("#showall").click(function(){
   $(".type2").show();
   $(".type1").show();
});

$("#showskin").click(function(){
 $(".type1").hide();
 $(".type2").show();
});
    
    
 var $filters = $('.filter'),
 
  $Originalboxes = $('.product-custom');
 

    $boxes = $Originalboxes;
    
  

  $filters.on('click', function(e) {
      
      
      page=1;
      
        
   
    e.preventDefault();
    var $this = $(this);
    
    $filters.removeClass('active');
    $this.addClass('active');

    var $filterColor = $this.attr('data-filter');
    
     var $city = $this.html();
     
     
     
          var type = Cookies.get('type'); 

        
          var maincat = Cookies.get('main');
     
     $("#cityfilter").html($city);
    
    Cookies.set('city', $filterColor);

    if ($filterColor == 'all') {
        
         Cookies.set('city', "-1");
        
            if(type!="-1")
         {
             var finaldata=$boxes.filter('[data-type = "' + type + '"]');
              
             $("#alldata").empty();
             $("#alldata").append(finaldata); 
             
             
            
          $('.ajax-loading').hide();
            
         }
         else
         {
              $("#alldata").append($boxes); 
         }
   
      
    } else {
        

       if(type!="-1" && maincat!="-1")
         {
             var finaldata=$boxes.filter('[data-type = "' + type + '"]').filter('[data-category = "' + $filterColor + '"]').filter('[data-maincat = "' + maincat + '"]');
                if(finaldata.length<20)
             {
                 paging();
             }
             else
             {
                  document.getElementById('showmore').style.display='block';
             }
             $("#alldata").empty();
             $("#alldata").append(finaldata); 
           
          $('.ajax-loading').hide();
            
         }
         else if(type!="-1")
         {
             var finaldata=$boxes.filter('[data-type = "' + type + '"]').filter('[data-category = "' + $filterColor + '"]');
               if(finaldata.length<20)
             {
                 paging();
             }
             else
             {
                  document.getElementById('showmore').style.display='block';
             }
             $("#alldata").empty();
             $("#alldata").append(finaldata); 
           
          $('.ajax-loading').hide();
            
         }
           else if(maincat!="-1")
         {
             var finaldata=$boxes.filter('[data-type = "' + type + '"]').filter('[data-maincat = "' + maincat + '"]');
               if(finaldata.length<20)
             {
                 paging();
             }
             else
             {
                  document.getElementById('showmore').style.display='block';
             }
             $("#alldata").empty();
             $("#alldata").append(finaldata); 
           
          $('.ajax-loading').hide();
            
         }
         
         else
         {
             var finaldata = $boxes.filter('[data-category = "' + $filterColor + '"]');
           $("#alldata").empty();
            $('.ajax-loading').hide();
              if(finaldata.length<20)
             {
                 paging();
             }
             else
             {
                  document.getElementById('showmore').style.display='block';
             }
             $("#alldata").append(finaldata); 
         }
    
         
            
           
            
          
    }
  });
  
  
  
   var $filteration = $('.showing');
 


    
  

  $filteration.on('click', function(e) {
      
       Cookies.set('main', "-1");
      
         page=1;
         
        $( ".type1 button" ).removeClass( "active" )
         $( ".type2 button" ).removeClass( "active" )
      
    
      $cityitems = $Originalboxes;    
      
   
    e.preventDefault();
    var $this = $(this);
    
    $filteration.removeClass('active');
    $this.addClass('active');

    var $type = $this.attr('data-filter');
     var city = Cookies.get('city'); 
     Cookies.set('type', $type);

    if ($type == 'all') {
        
    
      $cityitems.removeClass('is-animated')
        .fadeOut().promise().done(function() {
          $cityitems.addClass('is-animated').fadeIn();
        });
    } else {
        
       
        
        if(city!="-1")
         {
                
               
             var finaldata=$cityitems.filter('[data-type = "' + $type + '"]').filter('[data-category = "' + city + '"]');
             
               console.log(finaldata.length);
             
              if(finaldata.length<20)
             {
                 paging();
             }
             else
             {
                  document.getElementById('showmore').style.display='block';
             }
            
             $("#alldata").empty();
             $("#alldata").append(finaldata); 
            
          $('.ajax-loading').hide();
            
         }
         else
         {
                
              var finaldata = $cityitems.filter('[data-type = "' + $type + '"]');
              
             console.log("test");
              
                if(finaldata.length<20)
             {
                 paging();
             }
             else
             {
                  document.getElementById('showmore').style.display='block';
             }
           $("#alldata").empty();
             $("#alldata").append(finaldata); 
         }
        
    
    }
  });
  

  var $filteration2 = $('.maincategories');
 


  $filteration2.on('click', function(e) {
      
       document.getElementById('showmore').style.display='block';
      
    
   $maincat = $Originalboxes;
   
   page=1;
   
        
   
    e.preventDefault();
    var $this = $(this);
    
    $filteration2.removeClass('active');
    $this.addClass('active');

    var maincat = $this.attr('data-filter');
     var city = Cookies.get('city'); 
     Cookies.set('main', maincat);

  
       
        
        if(city!="-1")
         {
             var finaldata=$maincat.filter('[data-maincat = "' + maincat + '"]').filter('[data-category = "' + city + '"]');
               if(finaldata.length<20)
             {
                 paging();
             }
             else
             {
                  document.getElementById('showmore').style.display='block';
             }
            
             $("#alldata").empty();
             $("#alldata").append(finaldata); 
            
          $('.ajax-loading').hide();
            
         }
         else
         {
             
            
             
              var finaldata = $maincat.filter('[data-maincat = "' + maincat + '"]');
              
              console.log(finaldata);
              
                if(finaldata.length<20)
             {
                 paging();
             }
             else
             {
                  document.getElementById('showmore').style.display='block';
             }
             
           $("#alldata").empty();
             $("#alldata").append(finaldata); 
         }
        
    
  
  });
  
  

});
</script>


	   
	   <?php $__env->stopSection(); ?>
	   

	   

<?php echo $__env->make('views.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/offers.blade.php ENDPATH**/ ?>