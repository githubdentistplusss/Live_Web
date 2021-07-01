@extends('layouts.app') @section('title','statistics') @section('content')

<div class="container">
    <br>
    <br>

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class='mb-3 card'>
                <div class="card-header-tab card-header">
                    <div class="card-header-title"><i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>إحصاء المشروع  </div>
                </div>
                <div class="pt-2 card-body">
                    <div class="mt-3 row">
                        <div class="col-md-4">
                            <div class="widget-content">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="widget-numbers fsize-3 text-muted">{{$service}}</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="text-muted opacity-6">الخدمات</div>
                                        </div>
                                    </div>
                                    <div class="widget-progress-wrapper mt-1">
                                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="widget-content">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="widget-numbers fsize-3 text-muted">{{$hospital}}</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="text-muted opacity-6">المستشفيات</div>
                                        </div>
                                    </div>
                                    <div class="widget-progress-wrapper mt-1">
                                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100" style="width: 27%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="widget-content">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="widget-numbers fsize-3 text-muted">{{$dentist}}</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="text-muted opacity-6">الأطباء</div>
                                        </div>
                                    </div>
                                    <div class="widget-progress-wrapper mt-1">
                                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="200" aria-valuemin="0" aria-valuemax="1000" style="width: 71%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="widget-content">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="widget-numbers fsize-3 text-muted">{{$user}}</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="text-muted opacity-6">المرضى </div>
                                        </div>
                                    </div>
                                    <div class="widget-progress-wrapper mt-1">
                                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="1000" aria-valuemin="0" aria-valuemax="10000" style="width: 80%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="widget-content">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="widget-numbers fsize-3 text-muted">{{$order}}</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="text-muted opacity-6"> المواعيد</div>
                                        </div>
                                    </div>
                                    <div class="widget-progress-wrapper mt-1">
                                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="1000" style="width: 41%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class='mb-3 card'>
                <div class="card-header-tab card-header">
                    <div class="card-header-title"><i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>إحصاء المشروع بالتفصيل   </div>
                </div>
                <div class="pt-2 card-body">
                    <div class="mt-3 row">

                        <!------------------------------------>

                        <div class="col-md-12 col-lg-4">
                            <div style="border:1px solid #f4516c" class='mb-3 card'>
                                <div style="background-color:#f4516c ;border:1px solid #f4516c ;color:#fff" class="card-header-tab card-header">
                                    <div class="card-header-title"><i class="header-icon lnr-rocket icon-gradient bg-danger"> </i>الخدمات    </div>
                                </div>
                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">كشف</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$checkup}} حجز </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">حشوات أسنان</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$fillings}} حجز </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">علاج عصب وجذور الاسنان</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$rootcanal}} حجز </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">  جراحة أسنان  </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$Extraction}} حجز </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">تنظيف أسنان</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$cleaning}} حجز </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d"> أسنان أطفال</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$Pediatric}} حجز </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">تركيبات ثابته </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$fixed}} حجز </span>
                                    </div>
                                </div>

                                 <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d ">زراعة اسنان </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$Implant}} حجز </span>
                                    </div>
                                </div>

                                <div>
                                   <div class="mt-3 row">
                                       <h5 class="col-md-8" style="float:left;color: #6c757d ">تقويم الاسنان </h5>
                                       <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$Orthodontics}} حجز </span>
                                   </div>
                               </div>

                                <div>
                                    <br>
                                    <div class="mt-3 row"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-4">
                            <div style="border:1px solid #36a3f7 " class='mb-3 card'>
                                <div style="background-color:#36a3f7  ;border:1px solid #36a3f7  ;color:#fff" class="card-header-tab card-header">
                                    <div class="card-header-title"><i class="header-icon lnr-rocket icon-gradient bg-info"> </i>الأطباء     </div>
                                </div>
                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">ذكر</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$dentistMale}}  </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">أنثى </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$dentistFemale}}  </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">سنه الدراسية 1 </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$dentist1}} </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">  سنه الدراسية 2  </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$dentist2}} </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                         <h5 class="col-md-8" style="float:left;color: #6c757d">  سنه الدراسية 3  </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$dentist3}} </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">  سنه الدراسية 4  </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$dentist4}} </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">  سنه الدراسية 5  </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$dentist5}} </span>
                                    </div>
                                </div>

                                 <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d "> سنه الدراسية 6 </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$dentist6}}  </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d "> امتياز </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$dentist7}}  </span>
                                    </div>
                                </div>

                              @foreach($city as $c)
                                @if($c->city_id != 0)
                                  <div>
                                      <div class="mt-3 row">
                                          <h5 class="col-md-8" style="float:left;color: #6c757d">{{App\City::find($c->city_id)['city_name_ar']}} </h5>
                                          <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px">  ( {{$c->total}})</span>
                                      </div>
                                  </div>
                                  @endif

                                  @endforeach
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-4">
                            <div style="border:1px solid #5867dd " class='mb-3 card'>
                                <div style="background-color:#5867dd  ;border:1px solid #5867dd  ;color:#fff" class="card-header-tab card-header">
                                    <div class="card-header-title"><i class="header-icon lnr-rocket icon-gradient bg-danger"> </i>المرضى    </div>
                                </div>
                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">سعودى</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$usersSud}} </span>
                                    </div>
                                </div>

                                 <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">غير سعودى</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$usersnotSud}}  </span>
                                    </div>
                                </div>

                                      <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">ذكر</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$usersMale}}  </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">أنثى </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$usersFemale}}  </span>
                                    </div>
                                </div>
                                @foreach($cityPation as $cP)
                                @if($cP->city_id != 0)
                                  <div>
                                      <div class="mt-3 row">
                                          <h5 class="col-md-8" style="float:left;color: #6c757d">{{App\City::find($cP->city_id)['city_name_ar']}} </h5>
                                          <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px">  ( {{$cP->total}})</span>
                                      </div>
                                  </div>
                                  @endif

                                  @endforeach

                            </div>
                        </div>

                        <br><br>

                        <div class="col-md-12 col-lg-4">
                            <div style="border:1px solid #ffb822  " class='mb-3 card'>
                                <div style="background-color:#ffb822   ;border:1px solid #ffb822   ;color:#fff" class="card-header-tab card-header">
                                    <div class="card-header-title"><i class="header-icon lnr-rocket icon-gradient bg-danger"> </i>المواعيد    </div>
                                </div>

                                <!-- <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">عدد المواعيد </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$event2}} </span>
                                    </div>
                                </div> -->

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">المدينة الشرقية </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$esternEvents}} </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">  المدينة الغربية  </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$westEvents}} </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                         <h5 class="col-md-8" style="float:left;color: #6c757d">  المدينة الوسطى  </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$centeralEvents}} </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">  المدينة الشمالية  </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$northEvents}} </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d"> المدينة الجنوبية </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$southEvents}} </span>
                                    </div>
                                </div>

                                 <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">المواعيد المتاحة</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$pending}}  </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">مواعيد انتظار قبول الطبيب </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$waitDo}}  </span>
                                    </div>
                                </div>
                                 <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">مواعيد معتمده </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$DoneCl}}  </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">مواعيد تأكيد حضور المراجع  </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$DonOr}}  </span>
                                    </div>
                                </div>

                                 <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">مواعيد تسجيل الوصول الطبيب</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$upcoming}}  </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">مواعيد ملغيه  </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$cancel}}  </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">مواعيد قادمة </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$upcoming}}  </span>
                                    </div>
                                </div>

                                 <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">مواعيد سابقة</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> {{$prev}}  </span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--------------------------------------------->
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

@endsection
