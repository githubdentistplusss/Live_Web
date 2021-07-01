@extends('views.client.client')

@section('innercontent')
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
    <div class="card">
        <div class="card-body pt-0">
            <!-- Tab Menu -->
            <nav class="user-tabs mb-4">
                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                  
                  
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('bookedoffers') }}"><span
                                class="med-records">@lang('resrv.uDate')</span></a>
                    </li>
                    
                      <li class="nav-item">
                        <a class="nav-link " href="{{ route('bookedservices') }}"><span
                                class="med-records">مواعيد الخدمات</span></a>
                    </li>
                  
                </ul>
            </nav>
            <!-- /Tab Menu -->
            <!-- Tab Content -->
            <div class="row">
              
                       
                                     @if (count($offers) != 0)
                                        @foreach ($offers as $i => $offer)
                                        <?php
                                         $day = date('d', strtotime($offer->offer_booking_date));
                                            $month = date('M', strtotime($offer->offer_booking_date));
                                            $dayName = date('l', strtotime($offer->offer_booking_date));
                                            $am = date('A', strtotime($offer->offer_booking_date));
                                            $start_time = date('g', strtotime($offer->offer_booking_date));
                                            ?>
                                            
                                           
                                            
                                            
                                            <div class="col-md-4 col-lg-4 col-xs-12 product-custom">
									<div class="profile-widget" style="width: 100%; display: inline-block;padding:0px !important">
									
									<div style="background-color:#1c598F !important;height:30px">
									    
									    <div style="padding:5px 20px 0px 0px" class="row" >
									    
									   <div style="width:20%;color:white">#{{$offer->offer_booking_id}}</div>
									   
									    @if($offer->offer_booking_status==1)
                                                
                                               <div style="color:white"> {{ $dayName }} {{ $day }} {{ $month }} {{$start_time}} {{$am}}</div>
                                                
                                                @else
                                                
                                               <div></div>
                                                
                                                @endif
									   
									  
									   
									   </div>
									   
									</div>
								
									<div style="padding:15px !important" class="pro-content">
									
											<i style="color:#1c598F !important" class="fas fa-clinic-medical"></i> <span style="font-size:17px;color:black;font-wight:bold;">{{ isset($offer->clinic_name) ? $offer->clinic_name : '' }}
									
										
										<hr>
								
										<i style="color:#1c598F !important" class="fas fa-award"></i> <span style="font-size:14px;color:black;">{{ $offer->offer_title }} 
											<br>
										
										<hr>
										
											
									
										<i class="fa fa-money" aria-hidden="true"></i>
											<i style="color:#1c598F !important" class="fas fa-money-bill-alt"></i> <span style="font-size:14px;color:black;"> {{$offer->offer_booking_price}} ريال
											<br>
										
										<hr>
										 
										 
										
										
										 @if ($offer->offer_booking_status == 0)
                                                          <span
                                                            class="badge badge-pill bg-warning-light">في انتظار تأكيد الحجز من العيادة</span>


                                                    @elseif($offer->offer_booking_status == 1)
                                                        <span
                                                            class="badge badge-pill bg-success-light">تم تأكيد الحجز</span>

                                                    @elseif($offer->offer_booking_status == 2)
                                                        <span
                                                            class="badge badge-pill bg-danger-light">تم الغاء الحجز من المراجع</span>

                                                    @elseif($offer->offer_booking_status  == 3)
                                                 
                                                    <span
                                                            class="badge badge-pill bg-success-light">تم حضور المراجع  </span>
                                                            
                                                               @else
                                                     <span
                                                            class="badge badge-pill bg-danger-light">لم يتم حضور المراجع  </span>
                                                    @endif
                                                    
                                                    
                                                    	<br>
									
										<hr>
								
								
                                                      <center>   <a href="{{ url('/offerbookdetails/' . $offer->offer_booking_id) }}" class="btn btn-sm bg-info-light">
                                                            
                                                            <i class="far fa-eye"></i> @lang('resrv.view')
                                                        </a>
                                                        </center>
                                                   
									</div>
								</div>
							   </div>
                                        @endforeach
                                    @else
                                      
                                                <div style="text-align: -webkit-center;">
                                                    <h2 style="color: red;">@lang('resrv.NotFound')</h2>
                                                </div>
                                          
                                    @endif
                            
                           
                     
                    </div>
             
        </div>
    </div>

@endsection
