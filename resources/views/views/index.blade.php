@extends('views.layout.mainlayout')
@section('content')
<!-- Home Banner -->
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


<!--
<a class="btn share_btn" data-toggle="modal" data-target="#myModal"><i class="fa fa-share-alt" aria-hidden="true"></i> Click to Share</a>
-->

<style>
    
     .carouselOfImages{
  position: relative;
  margin: auto;
  overflow: visible;
  width: 100%;
}



.carouselImage {
    position: relative;
  
   width:20%;
   height:450px;
   
   margin:10px;
    counter-increment: carousel-cell;
    text-align: right;
    vertical-align: right;
    transition: transform 0.5s;
    font-size: 1.2em;
  }
@media only screen and (max-width: 1300px){
    .carouselImage{
        width: 23%;
    }
}

@media only screen and (max-width: 1100px){
    .carouselImage{
        width: 32%;
    }
}
@media only screen and (max-width: 640px){
    .carouselImage{
        width: 60%;
    }

}
@media only screen and (max-width: 490px){
    .carouselImage{
        width: 75%;
        padding: 15px;
    }

}
@media only screen and (max-width: 380px){
    .carouselImage{
        width: 83%;
        padding: 15px;
    }

}


.carouselImage.is-selected {

border: 1.5px solid #1c598F !important;
color:#1c598F !important;
  z-index:10;
  transform: scale(1);
}
.carouselImage.nextToSelectedLeft, .carouselImage.nextToSelectedRight {
  transform: scale(1);
  z-index:5;
}

/*! Flickity v2.0.5
https://flickity.metafizzy.co
---------------------------------------------- */

.flickity-enabled {
  position: relative;
}

/* .flickity-enabled:focus { outline: none; } */

.flickity-viewport {
  overflow: hidden;
  position: relative;
  height: 100%;
}

.flickity-slider {
  position: absolute;
  width: 100%;
  height: 100%;
}

/* draggable */

.flickity-enabled.is-draggable {
  -webkit-tap-highlight-color: transparent;
/*           tap-highlight-color: transparent; */
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

.flickity-enabled.is-draggable .flickity-viewport {
  cursor: move;
  cursor: -webkit-grab;
  cursor: grab;
}

.flickity-enabled.is-draggable .flickity-viewport.is-pointer-down {
  cursor: -webkit-grabbing;
  cursor: grabbing;
}
.flickity-viewport {
    margin: 0px;
    width: 100%;
    margin-bottom: 100px;
}

    
</style>


<section class="section section-search">
    <div class="container-fluid">
        <div class="banner-wrapper">
            <div class="banner-header text-center">
                <h1>@lang('home.search_appnt_now')</h1>
                <p>@lang('home.discover_services')</p>
            </div>

            <!-- Search -->
            <div class="search-box" >
                <form method="GET" action="{{ Route('searchAppointment') }}" enctype="multipart/form-data">
                    <div class="form-group search-service" class="col-sm-12">
                        <!-- <input type="text" class="f"orm-control" placeholder="Search Location"> -->
                        <select class="form-control" required name="service_id" id="service_id">
                            <option class="locate" selected disabled data-image="{{ asset('assets/imgs/home/location.svg') }}">@lang('home.service')
                            </option>
                            @foreach ($services as $service)
                            <option value="{{ $service->id }}">
                                @if (app()->getLocale() == 'ar')
                                {{ $service->service_name_ar }}
                                @elseif( app()->getLocale()=='en')
                                {{ $service->service_name_en }}
                                @endif
                            </option>
                            @endforeach
                        </select>
                        <span class="form-text">@lang('home.services_check_up')</span>
                    </div>
                    <div class="form-group search-location">
                       
                        <select class="form-control" required name="city" id="city_id">
                            <option class="locate" selected disabled data-image="{{ asset('assets/imgs/home/location.svg') }}">@lang('home.city')
                            </option>
                            </select>
                        <span class="form-text">@lang('home.based_location')</span>
                    </div>
                    
                    <div class="form-group search-doctor">
                       
                        
                        <select class="form-control" required name="hospital_id" id="hospital_id">
                            <option class="locate" selected disabled data-image="{{ asset('assets/imgs/home/location.svg') }}">@lang('home.hospital')
                            </option>
                            
                        </select>
                        <span class="form-text">@lang('home.based_location_hos')</span>
                    </div>
                    {{--<div class="form-group search-info">
                            <input type="text" class="form-control"
                                placeholder="Search Doctors, Clinics, Hospitals, Diseases Etc">
                            <span class="form-text">@lang('home.services_check_up')</span>
                        </div> --}}
                    <button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"> </i>
                        <span>@lang('home.search')</span></button>
                </form>
            </div>
            <!-- /Search -->

        </div>
    </div>
</section>
<!-- /Home Banner -->


 
			<!-- Popular Section -->
		
			<section class="section section-doctor">
			    	 <div class = " offer text-center">
			    <h2>@lang('home.offer_trend')</h2>
			    </div>
			    
			   
			    	<div class="section-header">
			    	    <!-- 
								<h2>أحجز أفضل العروض</h2>
							-->	
							</div>
				<div class="container-fluid">
				   <div class="row">
						<div class="col-lg-3" class="col-sm-3">
						    <!-- 
							<div class="section-header ">
								<h2>أحجز أفضل العروض</h2>
								-->
							</div>
							<!-- 
							<div class="about-content">
								<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>
								<p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes</p>					
								
							</div>
								-->
						</div>
						
					 
					 
						    <div class="carouselContainer">
        <div class="carouselOfImages">
               
                 @foreach ($offers as $offer)
          

							<div style="" class="profile-widget carouselImage">
    									<div class="doc-img">
    										<a href="offerdetails/{{$offer->offer_id}}">
    										    
    											<img style="width:250px !important;height:150px !important" class="img-fluid" alt="{{$offer->offer_title}}" src="images/{{$offer->offer_photo}}">
    										</a>
    										 <div style="width:60px;height:30px;background-color:red;position:absolute;color:white;font-size:20px;top:0px">
											        
											       <center> {{getpercentage($offer->offer_old_price,$offer->offer_new_price)}} % </center>
											       
											    </div>
											    
											    
					
											    
											    
    									</div>
    									<div class="pro-content">
										<h3 class="title">
											<a href="{{ Route('offerdetails',$offer->offer_id) }}" tabindex="0">{{$offer->offer_title}}</a> 
											<i style="display:none" class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">{{$offer->offer_sub_title}}</p>
									
										<ul class="available-info">
											<li>
												<i class="far fa-money-bill-alt"></i> <span style="font-size:20px;color:red;"> {{$offer->offer_new_price}} </span><del>{{$offer->offer_old_price}}</del>ريال
											
											</li>
										</ul>
										<div> 
									    	<div style="position:relative;top:-15px" class="avatar avatar-lg">
												<img class="avatar-img rounded-circle"  alt="{{$offer->clinic_name}}" src="images/{{$offer->clinic_logo}}">
											</div>
									    	<div class="avatar" style="width: 10rem;white-space:nowrap; overflow:hidden;">
									    	   	<ul class="available-info">
									    	   	    <li>
									    	   	        <b>  {{$offer->clinic_name}}</b>
									    	   	    </li>
        											<li>
            												<i class="fas fa-map-marker-alt"></i>{{$offer->clinic_address}}
        											</li>
        										</ul>
											</div>
										</div>
										<div class="row row-sm">
											<div class="col-6">
												<a href="{{ Route('offerdetails',$offer->offer_id) }}" class="btn view-btn" tabindex="0">عرض التفاصيل</a>
											</div>
											
											<form id="f<?php echo $offer->offer_id?>" action="{{url('bookoffer')}}" method="post">
											    @csrf  

                                             @method('PUT')
                                              <input type="text" value="{{$offer->offer_id}}" name="offer_id" hidden />
                                             
                                               <input type="text" value="{{$offer->offer_new_price}}" name="offer_booking_price" hidden />
                                               @if (isset(Auth::guard('client')->user()->id))
                                                <input type="text" value="{{ Auth::guard('client')->user()->id }}" name="user_id" hidden />
                                               @else
                                                <input type="text" value="-1" name="user_id" hidden />
                                               
                                               @endif
                                             
                                                 <div class="col-6">
												    <input class="btn book-btn" onclick="" value="احجز الان" type="submit" >
										    	</div>
                                               
                                                 </form>
										</div>
    									</div>
    								</div>
    								<!-- /Doctor Widget -->
    								
    								
    						
    								
    						    @endforeach
    						    
    						    	</div>
					
				   </div>
					
						<div class="col-lg-12" class="col-sm-12">
						
							
							<div class = "text-center">
							<a href="offers" class="btn book-btn1 mb-4" class="text-center"> @lang('home.view_all_offers') </a>
							</div>
						</div>
					
				   </div>
				   
				   
				      
                             	
                         	
				   			

				</div>

			</section>
			
						<!-- /Popular Section -->
			
			
		   
<!--
<section class="section home-tile-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="section-header text-center">
                    <h2>Popular Offers</h2>
                </div>
                
                
             
               
              

                <div class="offer-slider slider">
                     @foreach ($offers as $offer)
                     
                     <?php echo $offer->offer_photo ?>
                     
                    
                    <div class="offer-widget">
                        <div class="card text-center doctor-book-card">
                            <img height="250" width="500" src="images/{{$offer->offer_photo}}" alt="" class="img-fluid">

                        </div>
                        <div class="pro-content">
                            <h3 class="title">
                                <a href="offerdetails/{{$offer->offer_id}}">{{$offer->clinic_name}}</a>
                               <i style="display:none" class="fas fa-check-circle verified"></i>
                            </h3>
                            <p class="speciality">{{$offer->offer_sub_title}}</p>
                           
                            <ul class="available-info">
                                <li>
                                    <i class="fas fa-map-marker-alt"></i> {{$offer->clinic_address}}
                                </li>
                               
                                <li>
                                    <i class="far fa-money-bill-alt"></i> {{$offer->offer_new_price}}
                                  
                                </li>
                            </ul>
                            <div class="row row-sm">
                            	<div class="col-6">
												<a href="{{ Route('offerdetails',$offer->offer_id) }}" class="btn view-btn" tabindex="0">عرض التفاصيل</a>
											</div>
											
												<form action="{{url('bookoffer')}}" method="post">
											    @csrf  

                                             @method('PUT')
                                              <input type="text" value="{{$offer->offer_id}}" name="offer_id" hidden />
                                             
                                               <input type="text" value="{{$offer->offer_new_price}}" name="offer_booking_price" hidden />
                                               @if (isset(Auth::guard('client')->user()->id))
                                                <input type="text" value="{{ Auth::guard('client')->user()->id }}" name="user_id" hidden />
                                               @else
                                                <input type="text" value="-1" name="user_id" hidden />
                                               
                                               @endif
                                             
                                              <div class="col-6">
											
									
												
												 <input class="btn book-btn" onclick="javascript:return confirm('هل تريد حجز هذا العرض');" value="احجز الان" type="submit" >
											</div>
                                               
                                                 </form>
                                                 
                                                 </div>
                        </div>
                    </div>
                   
                    @endforeach
                </div>

            </div>
        </div>
        <div class="view-all text-center">
            <a href="offers" class="btn btn-primary">View All Offers</a>
        </div>
    </div>
</section>
-->


<!-- Availabe Features -->


<!-- Modal -->




<section style="padding-bottom:130px" class="section section-features">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-12 features-img">
                
                <iframe style="width:100%" height="315" src="https://www.youtube.com/embed/DWES4wFD_a4?controls=0" frameborder="0" allow="picture-in-picture"  allowfullscreen></iframe>
                <!-- 
                <img src="assets/assets/img/features/feature.png" class="img-fluid" alt="Feature">
                -->
            </div>
            <div class="col-md-6">
                <div class="section-header text-center">
                    <h2 class="mt-2">@lang('home.ios_android')</h2>
                    <!--
                    <p>Download & Vist today </p>
                    -->
                </div>
                <div class="bannerContent" style="padding:10px">
                    <a href="https://play.google.com/store/apps/details?id=com.dentistpluss.patient&hl=ar&gl=US" target="_blank"> <img src="https://dentistpluss.com/img/and.png" width="49%"  alt="Dentist Pluss"></a>
                    <a href="https://apps.apple.com/us/app/%D8%A7%D8%B3%D9%86%D8%A7%D9%86-%D8%A8%D9%84%D8%B3/id1563244825" target="_blank"> <img src="https://dentistpluss.com/img/ios.png" width="45%"  alt="Dentist Pluss"></a>
            <b>
<p> 
نفتخر بكوننا أول منصة مختصة في خدمات طب الأسنان. نسعى في أسنان بلس لتوظيف التقنية لإيصال خدمات ‍طب 
الأسنان لجميع أفراد المج‍تمع عن طريق المستشفيات الجامعية وعيادات طب الأسنان في القطاع الخاص
 </p>
</b>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Availabe Features -->

</div>
@endsection

@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.pkgd.min.js" integrity="sha512-cA8gcgtYJ+JYqUe+j2JXl6J3jbamcMQfPe0JOmQGDescd+zqXwwgneDzniOd3k8PcO7EtTW6jA7L4Bhx03SXoA==" crossorigin="anonymous"></script>
<script>
    
    //CAROUSEL SETTINGS
var $imagesCarousel = jQuery('.carouselOfImages').flickity({
  /* options, defaults listed */

  accessibility: false,
  /* enable keyboard navigation, pressing left & right keys */

  autoPlay: false,
  pauseAutoPlayOnHover: false,
  /* advances to the next cell
  if true, default is 3 seconds
  or set time between advances in milliseconds
  i.e. `autoPlay: 1000` will advance every 1 second */

  cellAlign: 'center',
  /* alignment of cells, 'center', 'left', or 'right'
  or a decimal 0-1, 0 is beginning (left) of container, 1 is end (right) */

  // cellSelector: '.topic-switcher__item',
  /* specify selector for cell elements */

  contain: false,
  /* will contain cells to container
  so no excess scroll at beginning or end
  has no effect if wrapAround is enabled */

  draggable: true,
  /* enables dragging & flickin
  freeScroll: false,
  enables content to be freely scrolled and flicked
  without aligning cells */

  friction: 0.2,
  /* smaller number = easier to flick farther */

  initialIndex: 0,
  /* zero-based index of the initial selected cell */

  lazyLoad: false,
  /* enable lazy-loading images
  set img data-flickity-lazyload="src.jpg"
  set to number to load images adjacent cells */

  percentPosition: true,
  /* sets positioning in percent values, rather than pixels
  Enable if items have percent widths
  Disable if items have pixel widths, like images */

  prevNextButtons: false,
  /* creates and enables buttons to click to previous & next cells */

  pageDots: false,
  /* create and enable page dots */

  resize: true,
  /* listens to window resize events to adjust size & positions */

  rightToLeft: false,
  /* enables right-to-left layout */

  setGallerySize: true,
  /* sets the height of gallery
  disable if gallery already has height set with CSS */

  watchCSS: false,
  /* watches the content of :after of the element
  activates if #element:after { content: 'flickity' }
  IE8 and Android 2.3 do not support watching :after
  set watch: 'fallbackOn' to enable for these browsers */

  wrapAround: true
    /* at end of cells, wraps-around to first for infinite scrolling */
});

function resizeCells() {
  var flkty = $imagesCarousel.data('flickity');
  var $current = flkty.selectedIndex;
  var $length = flkty.cells.length;
  var $imageNumLimit = 1;
  if ($length < $imageNumLimit) {
    $imagesCarousel.flickity('destroy');
  }
  jQuery('.carouselOfImages .carouselImage').removeClass("nextToSelectedLeft");
  jQuery('.carouselOfImages .carouselImage').removeClass("nextToSelectedRight");
  jQuery('.carouselOfImages .carouselImage').removeClass("nextToSelectedLeft2");
  jQuery('.carouselOfImages .carouselImage').removeClass("nextToSelectedRight2");
  jQuery('.carouselOfImages .carouselImage').eq($current - 1).addClass("nextToSelectedLeft");
  jQuery('.carouselOfImages .carouselImage').eq($current - 2).addClass("nextToSelectedLeft2");
  var $endCell;
  if ($current + 1 == $length) {
    $endCell = "0";
  } else {
    $endCell = $current + 1;
  }
  jQuery('.carouselOfImages .carouselImage').eq($endCell).addClass("nextToSelectedRight");
  if($endCell + 1 < $imageNumLimit){
    jQuery('.carouselOfImages .carouselImage').eq($endCell + 1).addClass("nextToSelectedRight2"); 
  } else {
    jQuery('.carouselOfImages .carouselImage').eq(0).addClass("nextToSelectedRight2");
  }
}
resizeCells();

$imagesCarousel.on('scroll.flickity', function() {
  resizeCells();
});


//HOVER FUNCTIONS
$('.carouselImage').bind("mouseover", function(){
  if (this.className === 'carouselImage nextToSelectedLeft') {
    $imagesCarousel.flickity('playLeftSlowPlayer');
  } else if (this.className === 'carouselImage nextToSelectedLeft2') {
    $imagesCarousel.flickity('playLeftFastPlayer');
  } else if (this.className === 'carouselImage nextToSelectedRight') {
    $imagesCarousel.flickity('playRightSlowPlayer');
  } else if (this.className === 'carouselImage nextToSelectedRight2') {
    $imagesCarousel.flickity('playRightFastPlayer');
  }
});

$('.carouselImage').bind("mouseout", function(){
  $imagesCarousel.flickity('pausePlayer');
});
    
</script>

<script>




$( document ).ready(function() {
  //custom button for homepage
     $( ".share-btn" ).click(function(e) {
       $('.networks-5').not($(this).next( ".networks-5" )).each(function(){
          $(this).removeClass("active");
       });
     
            $(this).next( ".networks-5" ).toggleClass( "active" );
    });   
});

function test(x)
{
   
  event.preventDefault();

 swal({
  title: "تنبيه",
  text: "هل تريد حجز هذا العرض",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
      var f = '#f'+x;
      
     $(f).submit();
  } 
});
}
    
    $('#service_id').on('change', function(event) {

        var service_id = $(this).val();

        var token = $('meta[name=csrf-token]').attr('content');

        $.ajax({

            url: "{{Route('select-city')}}",

            method: 'POST',

            data: {service_id:service_id, _token:token},

            success: function(data) {
             
                $("select[name='city']").html('');

                $("select[name='city']").html(data.options);

            }

        });

    });

    $('#city_id').on('change', function(event) {
          var service_id = document.getElementById('service_id').value ;
            var city_id = $(this).val();
            var token = $('meta[name=csrf-token]').attr('content');
            $.ajax({
                url: "{{Route('select-hospital')}}",
                method: 'POST',
                data: {city_id:city_id,service_id:service_id, _token:token},
                success: function(data) {
                    $("select[name='hospital_id']").html('');
                    $("select[name='hospital_id']").html(data.options);
                }

            });

        });

       
        
        
</script>

@endsection
