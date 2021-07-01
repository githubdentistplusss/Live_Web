@extends('views.client.client')

@section('innercontent')





    <!--dateDetails section-->
    <section class="card">

        <div class="card-body">
            <h4>تفاصيل الحجز</h4>
            
            <div class="date-det pb-3">
                    <h5 class="grey3">صورة العرض</h5>
                    <div class="attach-image">

                        @if (!empty($offers[0]->offer_photo))
                            <a href="{{ asset('images/' . $offers[0]->offer_photo) }}" target="_blank">
                                <img height"100" width="100" src="{{ asset('images/' . $offers[0]->offer_photo) }}"></a>
                        @endif

                      

                    </div>
            
            <div class="content pt-4 pb-4">
                <div class="date-det pb-3">
                    <h5 class="grey3">رقم الحجز</h5>
                    <input class="form-control loginInput" name="name" required type="text"
                        value="#{{$offers[0]->offer_booking_id}}" readonly>
                </div>
               
                 <div class="date-det pb-3">
                    <h5 class="grey3">العرض</h5>
                    <input class="form-control loginInput" name="name" required type="text"
                        value="{{$offers[0]->offer_title}}" readonly>
                </div>
                
                    <div class="date-det pb-3">
                    <h5 class="grey3">تفاصيل العرض</h5>
                    <texarea class="form-control loginInput" name="name" required type="text"
                        value="" readonly>{{$offers[0]->offer_description}}</textarea>
                </div>
               
                <div class="date-det pb-3">
                    <h5 class="grey3">اسم العيادة</h5>
                    <input class="form-control loginInput" name="name" required type="text"
                        value="{{$offers[0]->clinic_name}}" readonly>
                </div>
                
                 <div class="date-det pb-3">
                    <h5 class="grey3">@lang('resrv.satus')</h5>
                    
                    
                    
                   @if ($offers[0]->offer_booking_status == 0)
                                                        <span
                                                            class="badge badge-pill bg-warning-light">في انتظار تأكيد الحجز من العيادة</span>

                                                    @elseif($offers[0]->offer_booking_status == 1)
                                                        <span
                                                            class="badge badge-pill bg-success-light">تم تأكيد الحجز</span>

                                                    @elseif($offers[0]->offer_booking_status == 2)
                                                        <span
                                                            class="badge badge-pill bg-danger-light">تم الغاء الحجز من المراجع</span>

                                                    @elseif($offers[0]->offer_booking_status == 3)
                                                        <span
                                                            class="badge badge-pill bg-success-light">تم حضور المراجع  </span>

                                                    @else
                                                     <span
                                                            class="badge badge-pill bg-danger-light">لم يتم حضور المراجع  </span>

                                                    @endif

                </div>
               
                 <div class="date-det pb-3">
                    <h5 class="grey3">السعر قبل العرض</h5>
                    <input class="form-control loginInput" name="name" required type="text"
                        value="{{$offers[0]->offer_old_price}}" readonly>
                </div>
                
                  <div class="date-det pb-3">
                    <h5 class="grey3">السعر بعد العرض</h5>
                    <input class="form-control loginInput" name="name" required type="text"
                        value="{{$offers[0]->offer_booking_price}}" readonly>
                </div>
               
                                                                                                                         
              

                <div class="date-det pb-3">
                    <h5 class="grey3">رقم العيادة</h5>
                    <input class="form-control loginInput" name="name" required type="text" 
                    value="{{$offers[0]->clinic_phone}}"
                    readonly>

                </div>
                
                 <div class="date-det pb-3">
                    <h5 class="grey3">عنوان العيادة</h5>
                    <input class="form-control loginInput" name="name" required type="text" 
                    value="{{$offers[0]->clinic_address}}"
                    readonly>

                </div>

                
<div class="btns">
                            <a href="{{ route('offerNeglect', $offers[0]->offer_booking_id) }}"
                                class="btn btn-danger btn-md login-btn">الغاء الحجز
                            </a>
                        </div>

              
                

            </div>
        </div>
    </section>








@endsection
