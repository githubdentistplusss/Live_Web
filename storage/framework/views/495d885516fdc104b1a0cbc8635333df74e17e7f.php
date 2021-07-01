 <?php $__env->startSection('title','statistics'); ?> <?php $__env->startSection('content'); ?>

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
                                            <div class="widget-numbers fsize-3 text-muted"><?php echo e($service); ?></div>
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
                                            <div class="widget-numbers fsize-3 text-muted"><?php echo e($hospital); ?></div>
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
                                            <div class="widget-numbers fsize-3 text-muted"><?php echo e($dentist); ?></div>
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
                                            <div class="widget-numbers fsize-3 text-muted"><?php echo e($user); ?></div>
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
                                            <div class="widget-numbers fsize-3 text-muted"><?php echo e($order); ?></div>
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
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($checkup); ?> حجز </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">حشوات أسنان</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($fillings); ?> حجز </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">علاج عصب وجذور الاسنان</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($rootcanal); ?> حجز </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">  جراحة أسنان  </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($Extraction); ?> حجز </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">تنظيف أسنان</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($cleaning); ?> حجز </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d"> أسنان أطفال</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($Pediatric); ?> حجز </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">تركيبات ثابته </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($fixed); ?> حجز </span>
                                    </div>
                                </div>

                                 <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d ">زراعة اسنان </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($Implant); ?> حجز </span>
                                    </div>
                                </div>

                                <div>
                                   <div class="mt-3 row">
                                       <h5 class="col-md-8" style="float:left;color: #6c757d ">تقويم الاسنان </h5>
                                       <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($Orthodontics); ?> حجز </span>
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
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($dentistMale); ?>  </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">أنثى </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($dentistFemale); ?>  </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">سنه الدراسية 1 </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($dentist1); ?> </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">  سنه الدراسية 2  </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($dentist2); ?> </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                         <h5 class="col-md-8" style="float:left;color: #6c757d">  سنه الدراسية 3  </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($dentist3); ?> </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">  سنه الدراسية 4  </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($dentist4); ?> </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">  سنه الدراسية 5  </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($dentist5); ?> </span>
                                    </div>
                                </div>

                                 <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d "> سنه الدراسية 6 </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($dentist6); ?>  </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d "> امتياز </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($dentist7); ?>  </span>
                                    </div>
                                </div>

                              <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($c->city_id != 0): ?>
                                  <div>
                                      <div class="mt-3 row">
                                          <h5 class="col-md-8" style="float:left;color: #6c757d"><?php echo e(App\City::find($c->city_id)['city_name_ar']); ?> </h5>
                                          <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px">  ( <?php echo e($c->total); ?>)</span>
                                      </div>
                                  </div>
                                  <?php endif; ?>

                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($usersSud); ?> </span>
                                    </div>
                                </div>

                                 <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">غير سعودى</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($usersnotSud); ?>  </span>
                                    </div>
                                </div>

                                      <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">ذكر</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($usersMale); ?>  </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">أنثى </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($usersFemale); ?>  </span>
                                    </div>
                                </div>
                                <?php $__currentLoopData = $cityPation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cP): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($cP->city_id != 0): ?>
                                  <div>
                                      <div class="mt-3 row">
                                          <h5 class="col-md-8" style="float:left;color: #6c757d"><?php echo e(App\City::find($cP->city_id)['city_name_ar']); ?> </h5>
                                          <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px">  ( <?php echo e($cP->total); ?>)</span>
                                      </div>
                                  </div>
                                  <?php endif; ?>

                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($event2); ?> </span>
                                    </div>
                                </div> -->

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">المدينة الشرقية </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($esternEvents); ?> </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">  المدينة الغربية  </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($westEvents); ?> </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                         <h5 class="col-md-8" style="float:left;color: #6c757d">  المدينة الوسطى  </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($centeralEvents); ?> </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">  المدينة الشمالية  </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($northEvents); ?> </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d"> المدينة الجنوبية </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($southEvents); ?> </span>
                                    </div>
                                </div>

                                 <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">المواعيد المتاحة</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($pending); ?>  </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">مواعيد انتظار قبول الطبيب </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($waitDo); ?>  </span>
                                    </div>
                                </div>
                                 <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">مواعيد معتمده </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($DoneCl); ?>  </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">مواعيد تأكيد حضور المراجع  </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($DonOr); ?>  </span>
                                    </div>
                                </div>

                                 <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">مواعيد تسجيل الوصول الطبيب</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($upcoming); ?>  </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">مواعيد ملغيه  </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($cancel); ?>  </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">مواعيد قادمة </h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($upcoming); ?>  </span>
                                    </div>
                                </div>

                                 <div>
                                    <div class="mt-3 row">
                                        <h5 class="col-md-8" style="float:left;color: #6c757d">مواعيد سابقة</h5>
                                        <span class="col-md-3" style="float:right;color:#fff;background-color:#8c8082;padding-top:4px"> <?php echo e($prev); ?>  </span>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/backstage/statistics/index.blade.php ENDPATH**/ ?>