@extends('layouts.app')

@if(isset($tasks))

    @section('title','تعديل العرض')

@endif

@section('title','اضافة العرض')

@section('content')

<?php $status=""; 


?>




    @if(isset($tasks) &&!empty($tasks))
        
   

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-content collapse show">

                            <div class="card-body">

                                <form enctype="multipart/form-data" id="offer_form" action="{{route('updateorder', $tasks->id)}}" class="form ls_form validate_form" method="post">

                                    {{ csrf_field() }}

                                    {{method_field('PUT')}}

                                    <div class="form-body">

                                        <h4 class="form-section"><i class="la la-paperclip"></i> تعديل الحجز</h4>
                                        
                                        
                                         <div class="form-group col-md-8">

                                            <label for="offer_name_ar">

                                               رقم الموعد

                                            </label>

                                            <input type="text" id="link" disabled class="form-control " name="dates" value="{{$tasks->id}}" autofocus disabled>

                                           </div>

                                      <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="nationality">اسم المراجع</label>
                                            <select class="form-control loginInput form-control-lg" name="dentist"
                                                    id="dentist" required disabled>
                                                <option value="">اسم المراجع</option>
                                                @foreach($users as $user)
                                        <option {{$tasks->user_id == $user['id'] ?'selected="selected"':""}} value="{{$user['id']}}">
                                       
                                            {{$user['name']}}                         
                                        </option>
                                                @endforeach
                                            </select>

                                            @if ($errors->has('dentist'))
                                                <span class="help-block">
                                                    <strong style="color: #FF0000;">{{ $errors->first('dentist') }}</strong>
                                                </span>
                                            @endif


                                        </div>

                                        <div class="form-group col-md-8">

                                            <label for="offer_name_ar">

                                               الامراض 

                                            </label>

                                            <input type="text" id="link"  class="form-control " name="diseases" value="{{$tasks->diseases=="" ?"لا يوجد" :$tasks->diseases }}" autofocus >

                                           </div>
                                          
                                           <div class="form-group col-md-8">

                                            <label for="offer_name_ar">

                                               الادوية 

                                            </label>
                                             

                                            <input type="text" id="link"  class="form-control " name="drug" value="{{$tasks->drug=="" ?"لا يوجد" :$tasks->drug }}" autofocus >

                                           </div>
                                           
                                             <div class="form-group col-md-8">

                                            <label for="offer_name_ar">

                                               الملاحظات 

                                            </label>
                                             

                                            <input type="text" id="link"  class="form-control " name="description" value="{{$tasks->description=="" ?"لا يوجد" :$tasks->description }}" autofocus >

                                           </div>

                                      @if($tasks->status=="5" || $tasks->status=="3" )
                                        
                                          <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="nationality">الطبيب</label>
                                            <select class="form-control loginInput form-control-lg" name="dentist"
                                                    id="dentist" required disabled>
                                                <option value="">الطبيب</option>
                                                @foreach($dentists as $dentist)
                                        <option {{$tasks->dentist_id == $dentist['id'] ?'selected="selected"':""}} value="{{$dentist['id']}}">
                                       
                                            {{$dentist['name']}} -- {{$dentist['hospital']}}                          
                                        </option>
                                                @endforeach
                                            </select>

                                            @if ($errors->has('dentist'))
                                                <span class="help-block">
                                                    <strong style="color: #FF0000;">{{ $errors->first('dentist') }}</strong>
                                                </span>
                                            @endif


                                        </div>
                                        
                                        <div class="form-group col-md-8">

                                            <label for="offer_name_ar">

                                               الموعد

                                            </label>

                                            <input type="date" id="link" disabled class="form-control " name="dates" value="{{$tasks->event_date}}" autofocus>

                                           

                                        </div>
                                        
                                        
                                             <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="nationality">
                                                الوقت
                                                   </label>
                                    <select disabled  class="form-control loginInput form-control-lg" name="event_time">
                                    	<option value="{{$tasks->start_time}}" >{{$tasks->start_time}}</option>
                                    	
									<option value="08:00:00" >08:00:00</option>
									
										<option value="09:00:00" >09:00:00</option>
																	
									<option value="10:00:00">10:00:00</option>
																	
									<option value="13:00:00">13:00:00</option>
																	
									<option value="14:00:00">14:00:00</option>
									<option value="15:00:00">15:00:00</option>
									</select> 
                                    
									
									</select> 

                                           

        
                                        </div>
                                      
                                        
                                        <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="nationality">الحالة</label>
                                            <select disabled class="form-control loginInput form-control-lg" name="status"
                                                    id="dentist" required>
                                              
                                                <?php echo $tasks->status ?>
                                                
                                             <?php if($tasks->status=="0")
                                                
                                                   $status="في الانتظار";

                                                elseif($tasks->status==1)
                                                
                                               $status="تم القبول من الطبيب";
                                                 
                                                 elseif($tasks->status==2)
                                               $status="تأكيد الحضور";
                                                elseif($tasks->status==5)
                                               $status="تأكيد الوصول";
                                                 elseif($tasks->status==3)
                                                 $status="ألغاء من الطبيب";
                                                 elseif($tasks->status==4)
                                                
                                                 $status="ألغاء من المريض";
                                                
                                                 elseif($tasks->status==8)
                                                $status="مؤجل الي بداية السمستر";
                                               ?>
                                                    <option viewonly value="{{$tasks->status}}"><?php echo $status ?></option>
                                                <option value="0">في الانتظار</option>
                                                  <option value="1">تم القبول من الطبيب</option>
                                                  <option value="2">تأكيد الحضور</option>
                                                  <option value="5">تأكيد الوصول</option>
                                                  
                                                  <option value="3">ألغاء من الطبيب</option>
                                                  <option value="4">ألغاء من المريض</option>
                                                  
                                                <option value="8">مؤجل الي بداية السمستر</option>
                                               
                                            </select>

                                          


                                        </div>
                                        
                                        
                                        
                                        
                                       <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="nationality">الخدمة</label>
                                            <select disabled class="form-control loginInput form-control-lg" name="service"
                                                    id="dentist" required>
                                                <option value="">الخدمة</option>
                                                @foreach($service as $service)
                                                    <option {{$tasks->treatment_id == $service->id ?'selected="selected"':""}} value="{{$service->id}}">@if( app()->getLocale()=='ar')
                                                            {{$service->service_name_ar}}
                                                        @elseif( app()->getLocale()=='en')
                                                            {{$service->service_name_en}}
                                                        @endif</option>
                                                @endforeach
                                            </select>

                                          


                                        </div>
                                        
                                        
                                       
                                      
 
                                        <div class="form-group col-md-8">

                                            <label for="offer_name_en">

                                               1 الصورة

                                            </label>

                                     
<br/>
                                    

                                        @if($tasks->photo!="")
                                        <a href="{{asset('/images/'.$tasks->photo)}}" target="_blank"> 
                                      <img class="img-thumbnail img-responsive" width="70" height="70" src="{{asset('/images/'.$tasks->photo)}}" alt="">
                                      </a>
                                     
                                         @endif  
                                          
                                          <input disabled type="file"   class="form-control" name="photo" >
                                   
                                        </div>
                                        
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_en">

                                               2 الصورة

                                            </label>
                                              <br/>

                                        @if($tasks->photo2!="")
                                           <a href="{{asset('/images/'.$tasks->photo2)}}" target="_blank"> 
                                      <img class="img-thumbnail img-responsive" width="70" height="70" src="{{asset('/images/'.$tasks->photo2)}}" alt="">
                                            </a>
                                          @endif
                                          <input disabled type="file"   class="form-control" name="photo2" >
                                        
                                        </div>
                                        
                                        
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_en">

                                               3 الصورة

                                            </label>
                                              <br/>

                                         @if($tasks->photo3!="")
                                            <a href="{{asset('/images/'.$tasks->photo3)}}" target="_blank"> 
                                      <img class="img-thumbnail img-responsive" width="70" height="70" src="{{asset('/images/'.$tasks->photo3)}}" alt="">
                                      </a>
                                        @endif
                                          <input disabled type="file"   class="form-control" name="photo3" >
                                        </div>
                                        
                                        
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_en">

                                               4 الصورة

                                            </label>
<br/>
                                         @if($tasks->photo4!="")
                                            <a href="{{asset('/images/'.$tasks->photo4)}}" target="_blank"> 
                                      <img class="img-thumbnail img-responsive" width="70" height="70" src="{{asset('/images/'.$tasks->photo4)}}" alt="">
                                      </a>
                                        @endif
                                          <input disabled type="file"   class="form-control" name="photo4" >
                                        </div>
                                        
                                        
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_en">

                                               5 الصورة

                                            </label><br/>

                                         @if($tasks->photo5!="")
                                            <a href="{{asset('/images/'.$tasks->photo5)}}" target="_blank"> 
                                      <img class="img-thumbnail img-responsive" width="70" height="70" src="{{asset('/images/'.$tasks->photo5)}}" alt="">
                                      </a>
                                        @endif
                                          <input disabled type="file"   class="form-control" name="photo5" >
                                        </div>
 
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_ar">

                                               ملاحظات خدمة العملاء

                                            </label>

                                             <textarea type="date" id="link" class="form-control " name="note"  autofocus>{{$tasks->note}}</textarea>
                                        </div>
                                        
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_ar">

                                               الخطة العلاجية

                                            </label>

                                             <textarea type="date" id="link" class="form-control " name="treatment"  autofocus>{{$tasks->treatment}}</textarea>

                                             @else
                                             
                                             <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="nationality">الطبيب</label>
                                            <select class="form-control loginInput form-control-lg" name="dentist"
                                                    id="dentist" required>
                                                <option value="">الطبيب</option>
                                                @foreach($dentists as $dentist)
                                        <option {{$tasks->dentist_id == $dentist['id'] ?'selected="selected"':""}} value="{{$dentist['id']}}">
                                       
                                            {{$dentist['name']}} -- {{$dentist['hospital']}}                          
                                        </option>
                                                @endforeach
                                            </select>

                                            @if ($errors->has('dentist'))
                                                <span class="help-block">
                                                    <strong style="color: #FF0000;">{{ $errors->first('dentist') }}</strong>
                                                </span>
                                            @endif


                                        </div>
                                        
                                        <div class="form-group col-md-8">

                                            <label for="offer_name_ar">

                                               الموعد

                                            </label>

                                            <input type="date" id="link" class="form-control " name="dates" value="{{$tasks->event_date}}" autofocus>

                                           

                                        </div>
                                        
                                        
                                             <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="nationality">
                                                الوقت
                                                   </label>
                                    <select   class="form-control loginInput form-control-lg" name="event_time">
                                    	<option value="{{$tasks->start_time}}" >{{$tasks->start_time}}</option>
									<option value="08:00:00" >08:00:00</option>
									
										<option value="09:00:00" >09:00:00</option>
																	
									<option value="10:00:00">10:00:00</option>
																	
									<option value="13:00:00">13:00:00</option>
																	
									<option value="14:00:00">14:00:00</option>
									<option value="15:00:00">15:00:00</option>
									</select> 

                                           

        
                                        </div>
                                      
                                        
                                        <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="nationality">الحالة</label>
                                            <select class="form-control loginInput form-control-lg" name="status"
                                                    id="dentist" required>
                                              
                                                <?php echo $tasks->status ?>
                                                
                                             <?php if($tasks->status=="0")
                                                
                                                   $status="في الانتظار";

                                                elseif($tasks->status==1)
                                                
                                               $status="تم القبول من الطبيب";
                                                 
                                              
                                                 elseif($tasks->status==2)
                                               $status="تأكيد الحضور";
                                                elseif($tasks->status==5)
                                               $status="تأكيد الوصول";
                                                 elseif($tasks->status==3)
                                                 $status="ألغاء من الطبيب";
                                                 elseif($tasks->status==4)
                                                
                                                 $status="ألغاء من المريض";
                                                
                                                 elseif($tasks->status==8)
                                                $status="مؤجل الي بداية السمستر";
                                               ?>
                                                <option viewonly value="{{$tasks->status}}"><?php echo $status ?></option>
                                                 
                                                <option value="0">في الانتظار</option>
                                                  <option value="1">تم القبول من الطبيب</option>
                                                  <option value="2">تأكيد الحضور</option>
                                                  <option value="5">تأكيد الوصول</option>
                                                  
                                                  <option value="3">ألغاء من الطبيب</option>
                                                  <option value="4">ألغاء من المريض</option>
                                                  
                                                <option value="8">مؤجل الي بداية السمستر</option>
                                               
                                            </select>

                                          


                                        </div>
                                        
                                        
                                        
                                        
                                       <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="nationality">الخدمة</label>
                                            <select class="form-control loginInput form-control-lg" name="service"
                                                    id="dentist" required>
                                                <option value="">الخدمة</option>
                                                @foreach($service as $service)
                                                    <option {{$tasks->treatment_id == $service->id ?'selected="selected"':""}} value="{{$service->id}}">@if( app()->getLocale()=='ar')
                                                            {{$service->service_name_ar}}
                                                        @elseif( app()->getLocale()=='en')
                                                            {{$service->service_name_en}}
                                                        @endif</option>
                                                @endforeach
                                            </select>

                                          


                                        </div>
                                        
                                        
                                       
                                      
 
                                        <div class="form-group col-md-8">

                                            <label for="offer_name_en">

                                               1 الصورة

                                            </label>

                                     
<br/>
                                    

                                        @if($tasks->photo!="")
                                        <a href="{{asset('/images/'.$tasks->photo)}}" target="_blank"> 
                                      <img class="img-thumbnail img-responsive" width="70" height="70" src="{{asset('/images/'.$tasks->photo)}}" alt="">
                                      </a>
                                    <a style="color:red" href="{{url('home/orders/photo/photo/id/'.$tasks->id )}}">Delete</a>
                                         @endif  
                                          
                                          <input type="file"   class="form-control" name="photo" >
                                   
                                        </div>
                                        
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_en">

                                               2 الصورة

                                            </label>
                                              <br/>

                                        @if($tasks->photo2!="")
                                           <a href="{{asset('/images/'.$tasks->photo2)}}" target="_blank"> 
                                      <img class="img-thumbnail img-responsive" width="70" height="70" src="{{asset('/images/'.$tasks->photo2)}}" alt="">
                                            </a>
                                        <a style="color:red" href="{{url('home/orders/photo/photo2/id/'.$tasks->id )}}">Delete</a>
                                          @endif
                                          <input type="file"   class="form-control" name="photo2" >
                                        
                                        </div>
                                        
                                        
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_en">

                                               3 الصورة

                                            </label>
                                              <br/>

                                         @if($tasks->photo3!="")
                                            <a href="{{asset('/images/'.$tasks->photo3)}}" target="_blank"> 
                                      <img class="img-thumbnail img-responsive" width="70" height="70" src="{{asset('/images/'.$tasks->photo3)}}" alt="">
                                      </a>
                                       <a style="color:red" href="{{url('home/orders/photo/photo3/id/'.$tasks->id )}}">Delete</a>
                                        @endif
                                          <input type="file"   class="form-control" name="photo3" >
                                        </div>
                                        
                                        
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_en">

                                               4 الصورة

                                            </label>
<br/>
                                         @if($tasks->photo4!="")
                                            <a href="{{asset('/images/'.$tasks->photo4)}}" target="_blank"> 
                                      <img class="img-thumbnail img-responsive" width="70" height="70" src="{{asset('/images/'.$tasks->photo4)}}" alt="">
                                      </a>
                                       <a style="color:red" href="{{url('home/orders/photo/photo4/id/'.$tasks->id )}}">Delete</a>
                                        @endif
                                          <input type="file"   class="form-control" name="photo4" >
                                        </div>
                                        
                                        
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_en">

                                               5 الصورة

                                            </label><br/>

                                         @if($tasks->photo5!="")
                                            <a href="{{asset('/images/'.$tasks->photo5)}}" target="_blank"> 
                                      <img class="img-thumbnail img-responsive" width="70" height="70" src="{{asset('/images/'.$tasks->photo5)}}" alt="">
                                      </a>
                                       <a style="color:red" href="{{url('home/orders/photo/photo5/id/'.$tasks->id )}}">Delete</a>
                                        @endif
                                          <input type="file"   class="form-control" name="photo5" >
                                        </div>
 
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_ar">

                                               ملاحظات خدمة العملاء

                                            </label>

                                             <textarea type="date" id="link" class="form-control " name="note"  autofocus>{{$tasks->note}}</textarea>
                                        </div>
                                        
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_ar">

                                               الخطة العلاجية

                                            </label>

                                             <textarea type="date" id="link" class="form-control " name="treatment"  autofocus>{{$tasks->treatment}}</textarea>

                                           @endif

                                        </div>

 
                                    </div>

                                    <div class="form-actions text-center">

                                        <button type="submit" class="btn btn-primary  box-shadow-1 ml-1">تعديل</button>

                                        <a  href="{{route('showoffer')}}" class="btn btn-warning box-shadow-1 mr-1"> <i class="ft-x"></i>

                                            عوده

                                        </a> </div>

                                </form>



                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



    @endif

@endsection