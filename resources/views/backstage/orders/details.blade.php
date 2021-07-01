@extends('layouts.app')

@section('title','Orders')

@section('content')




    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="card">


                    <div class="card-content collapse show">

                        <div class="card-body">
                            <div class="table-responsive ls-table">

                                <table class="table table-bordered table-striped" style="">
                                    <tr>
                                        <td>@lang('resrv.detailsID')</td>
                                        <td>#{{  $object[0]->event_id }}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('resrv.patient')</td>
                                        <td> @if($follower)
                                                {{ $follower[0]->name}}
                                            @else
                                                {{ $object[0]->Uname }}
                                            @endif</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('about.dentist')</td>
                                        <td>
                                            <b>
                                             @foreach($name as $doc)
                                                {{ $doc}}  ||
                                             @endforeach
                                            {{--@if($object[0]->status !="0")--}}

                                            {{--@endif--}}
                                            </b>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>ارشفة الاطباء </td>
                                        <td>
                                             @foreach($b_name as $doc)
                                                {{ $doc}}  ||
                                             @endforeach
                                            {{--@if($object[0]->status !="0")--}}

                                            {{--@endif--}}
                                        </td>
                                    </tr>
                                       
                                    <tr>
                                        <td>@lang('resrv.satus')</td>
                                        <td>
                                                                                    @if($object[0]->status=="0")
                                                @lang('resrv.satus0')
                                            @elseif($object[0]->status=="1")
                                                @lang('resrv.satus1')
                                            @elseif($object[0]->status=="2")
                                                @lang('resrv.satus2')
                                            @elseif($object[0]->status=="3")
                                                @lang('resrv.satus3')
                                            @elseif($object[0]->status=="4")
                                                @lang('resrv.satus4')
                                            @elseif($object[0]->status=="5")
                                                @lang('resrv.satus5')
                                           @elseif($object[0]->status=="6")
                                                @lang('resrv.satus6')
                                           @elseif($object[0]->status=="7")
                                                @lang('resrv.satus7')
                                           @elseif($object[0]->status=="8")
                                                @lang('resrv.satus8')
                                                 
                                            @endif


                                        </td>
                                    </tr>
                                    <tr>
                                        <td>حالة القبول</td>
                                        <td>
                                           <b style="color:red">
                                                                               @if($object[0]->dentist_approved=="0")
                                               لم يتم قبول الموعد قط
                                    @elseif($object[0]->dentist_approved=="1")
                                                تم قبول الموعد من الطبيب 
                                    @elseif($object[0]->dentist_approved=="2")
                                              الموعد تم إنشاءه من قبل الطبيب
                                     @endif
                                    </b>

                                        </td>
                                    </tr>
           
                                    <tr>
                                        <td>@lang('resrv.dateTime')</td>

                                        <td><?php
                                            $start_time = date('h:i', strtotime($object[0]->start_time));
                                            $am = date('A', strtotime($object[0]->start_time));
                                            ?>  {{  $object[0]->event_date }} |
                                             {{  $object[0]->start_time }}
                                            {{$am}}
                                        </td>
                                    </tr>
                                                           
                                    <tr>
                                        <td>@lang('login.hospital')</td>
                                        <td>  {{  $object[0]->hospital_name_ar }}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('resrv.trate')</td>
                                        <td>  {{  $object[0]->service_name_ar }}</td>
                                    </tr>
                                   <tr>
                                        <td>@lang('resrv.attachments')</td>
                                        <td>   @if($object[0]->event_photo != null || $object[0]->photo2 != null ||
                                             $object[0]->photo3 != null || $object[0]->photo4 != null || $object[0]->photo5 != null)

                                             @if($object[0]->event_photo != null)
                                                <a href="{{asset('public/images/'.$object[0]->event_photo)}}"
                                                   target="_blank"> <img
                                                            src="{{asset('public/images/'.$object[0]->event_photo)}}"></a>
                                                            @endif
                                                            @if($object[0]->photo2 != null)
                                                            <a href="{{asset('public/images/'.$object[0]->photo2)}}"
                                                   target="_blank"> <img
                                                            src="{{asset('public/images/'.$object[0]->photo2)}}"></a>
                                                            @endif
                                                            @if($object[0]->photo3 != null)
                                                            <a href="{{asset('public/images/'.$object[0]->photo3)}}"
                                                   target="_blank"> <img
                                                            src="{{asset('public/images/'.$object[0]->photo3)}}"></a>
                                                            @endif
                                                            @if($object[0]->photo4 != null)
                                                            <a href="{{asset('public/images/'.$object[0]->photo4)}}"
                                                   target="_blank"> <img
                                                            src="{{asset('public/images/'.$object[0]->photo4)}}"></a>
                                                            @endif
                                                            @if($object[0]->photo5 != null)
                                                            <a href="{{asset('public/images/'.$object[0]->photo5)}}"
                                                   target="_blank"> <img
                                                            src="{{asset('public/images/'.$object[0]->photo5)}}"></a>
                                                            @endif
                                            @else
                                                @lang('resrv.notfound')
                                            @endif</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('resrv.diseases')</td>
                                        <td>  @if(!empty($object[0]->diseases))
                                                {{$object[0]->diseases}}
                                            @else
                                                @lang('resrv.notfound')
                                            @endif</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('resrv.drugs')</td>
                                        <td>   @if(!empty($object[0]->drugs))
                                                {{$object[0]->drugs}}
                                            @else
                                                @lang('resrv.notfound')
                                            @endif</td>
                                    </tr>
                                    <tr>
                                        <td>ملاحظات خدمة العملاء </td>
                                        <td> <pre style="
    font-family: auto;
    font-size: 13px;
">{{$object[0]->note}} </pre>  </td>
                                    </tr>
                                    <tr>
    <td> لخطة العلاجية </td>
    <td> <pre style="
    font-family: auto;
    font-size: 13px;
">{{$object[0]->treatment}} </pre> </td>
</tr>
                                </table>


                                <!--<div class="date-det">
                                  <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="alarm" name="alarmCheck">
                                    <label class="custom-control-label blue" for="alarm">تفعيل التنبية</label>
                                  </div>
                                </div>-->


                            <!-- <div class="btns">
              <a href="{{ route('messages.create')  }}" class="navBtn">ارسال رسالة </a>
             
            </div>
		-->
                                
                               


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection