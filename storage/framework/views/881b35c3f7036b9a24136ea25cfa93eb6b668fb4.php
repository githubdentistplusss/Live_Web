<?php $__env->startSection('content'); ?>
<!-- Main Content-->

    <main class="main-content">
      <div class="home-back"></div>
      <!--banner section-->
      <!--modal-->
      <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="days">
                <ul class="nav nav-pills nav-justified">
                  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#day1">1</a></li>
                  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#day2">2</a></li>
                  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#day3">3</a></li>
                  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#day4">4</a></li>
                  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#day5">5</a></li>
                  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#day6">6</a></li>
                  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#day7">7</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane" role="tabpanel" id="day1">
                    <div class="time-available"><span>8:30</span></div>
                    <div class="time-notAvailable"><span>9:30</span></div>
                    <div class="time-available"><span>10:30</span></div>
                    <div class="time-available"><span>11:30</span></div>
                    <div class="time-available"><span>12:30</span></div>
                  </div>
                  <div class="tab-pane" role="tabpanel" id="day2">
                    <div class="time-available"><span>8:30</span></div>
                    <div class="time-notAvailable"><span>9:30</span></div>
                    <div class="time-available"><span>10:30</span></div>
                    <div class="time-available"><span>11:30</span></div>
                    <div class="time-available"><span>12:30</span></div>
                  </div>
                  <div class="tab-pane" role="tabpanel" id="day3">
                    <div class="time-available"><span>8:30</span></div>
                    <div class="time-notAvailable"><span>9:30</span></div>
                    <div class="time-available"><span>10:30</span></div>
                    <div class="time-available"><span>11:30</span></div>
                    <div class="time-available"><span>12:30</span></div>
                  </div>
                  <div class="tab-pane active" role="tabpanel" id="day4">
                    <div class="time-available"><span>8:30</span></div>
                    <div class="time-notAvailable"><span>9:30</span></div>
                    <div class="time-available"><span>10:30</span></div>
                    <div class="time-available"><span>11:30</span></div>
                    <div class="time-available"><span>12:30</span></div>
                  </div>
                  <div class="tab-pane" role="tabpanel" id="day5">
                    <div class="time-available"><span>8:30</span></div>
                    <div class="time-notAvailable"><span>9:30</span></div>
                    <div class="time-available"><span>10:30</span></div>
                    <div class="time-available"><span>11:30</span></div>
                    <div class="time-available"><span>12:30</span></div>
                  </div>
                  <div class="tab-pane" role="tabpanel" id="day6">
                    <div class="time-available"><span>8:30</span></div>
                    <div class="time-notAvailable"><span>9:30</span></div>
                    <div class="time-available"><span>10:30</span></div>
                    <div class="time-available"><span>11:30</span></div>
                    <div class="time-available"><span>12:30</span></div>
                  </div>
                  <div class="tab-pane" role="tabpanel" id="day7">
                    <div class="time-available"><span>8:30</span></div>
                    <div class="time-notAvailable"><span>9:30</span></div>
                    <div class="time-available"><span>10:30</span></div>
                    <div class="time-available"><span>11:30</span></div>
                    <div class="time-available"><span>12:30</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="home-content">
        <div class="container">
          <div class="bannerContent" style='padding:10px'>
         <a href="https://play.google.com/store/apps/details?id=com.freedentist" target='_blank'>  <img src="<?php echo e(url('img/and.png')); ?>" width="300" alt="Dentist Pluss"></a>
         <a href="https://apps.apple.com/us/app/dentist-plus/id1510940485" target='_blank'>  <img  src="<?php echo e(url('img/ios.png')); ?>" width="330" height="110" alt="Dentist Pluss"></a>
        </div>
          <div class="bannerRow">
			 <form method="GET" action="<?php echo e(route('searchReservation')); ?>" enctype="multipart/form-data">
            <div class="row">
                        <?php echo csrf_field(); ?>
						   <div class="col-md-3 padd0">

                  <select class="form-control selectdd" name="service_id" id="service_id" required="required">
                  <option class="locate" selected disabled data-image="<?php echo e(asset('assets/imgs/home/doctor.svg')); ?>"><?php echo app('translator')->getFromJson('home.service'); ?></option>
				    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <option <?php echo e((old('service_id') == $service->id)?'selected="selected"':""); ?> value="<?php echo e($service->id); ?>"><?php if( app()->getLocale()=='ar'): ?>
					<?php echo e($service->service_name_ar); ?>

					<?php elseif( app()->getLocale()=='en'): ?>
					<?php echo e($service->service_name_en); ?>

					<?php endif; ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>

              </div>
              <div class="col-md-3 padd0">
                <select class="form-control" style="height: 59px;color:#C7C7C7;border-radius:0;width:284px;border:none;-webkit-appearance: none;
    -moz-appearance: none;
    text-indent: 1px;
    text-overflow: ''; " required name="city" id="city_id">
                  <option class="locate" selected disabled data-image="<?php echo e(asset('assets/imgs/home/location.svg')); ?>"><?php echo app('translator')->getFromJson('home.city'); ?>  </option>
                    <!-- <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option  value="<?php echo e($city->id); ?>"><?php if( app()->getLocale()=='ar'): ?>
					<?php echo e($city->city_name_ar); ?>

					<?php elseif( app()->getLocale()=='en'): ?>
					<?php echo e($city->city_name_en); ?>

					<?php endif; ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                </select>
              </div>
              <div class="col-md-3 padd0" >
                <select style="height: 59px;color:#C7C7C7;border-radius:0;width:284px;border:none;-webkit-appearance: none;
    -moz-appearance: none;
    text-indent: 1px;
    text-overflow: ''; " class="form-control" name="hospital_id" id="hospital_id" required>
                  <option class="locate"  selected disabled  data-image="<?php echo e(asset('assets/imgs/home/location.svg')); ?>"><span style="color:#C7C7C7;"><?php echo app('translator')->getFromJson('home.center'); ?> </span></option>

                </select>
              </div>
          <!-- <input class="form-control datetimepickerDate-input" type="text" id="#datepicker11" autocomplete="off" name="date" placeholder="<?php echo app('translator')->getFromJson('home.time'); ?>">
              -->
               <div class="col-md-2 padd0">
               <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                 <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datepicker">
                   <div class="input-group-text"><img src="<?php echo e(asset('assets/imgs/home/calender.svg')); ?>"></div>
                 </div>
                 <input class="form-control datepicker-input" type="text" data-target="#datetimepicker1" name="date" placeholder=" <?php echo app('translator')->getFromJson('home.time'); ?>">

               </div>
              </div>
			   <input class="form-control datepicker-input" value='' type="hidden" id="date_id">
              <div class="col-md-1 padd0">

				 <button type="submit" class="btn-banner">
                                  <?php echo app('translator')->getFromJson('home.save'); ?>
                                </button>
			   </form>
              </div>
            </div>
          </div>
          <div class="stepsRow">
            <div class="squareStart"></div>
            <div class="row">
              <div class="col-md-3">
                <div class="step step1"><img src="<?php echo e(asset('assets/imgs/home/location2.svg')); ?>">
                  <div class="stepSquare"></div>
                  <h4><?php echo app('translator')->getFromJson('home.feature1'); ?></h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="step step2">
                  <div class="stepSquare"></div><img src="<?php echo e(asset('assets/imgs/home/hospital.png')); ?>">
                  <h4><?php echo app('translator')->getFromJson('home.feature2'); ?></h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="step step1"><img src="<?php echo e(asset('assets/imgs/home/calender2.svg')); ?>">
                  <div class="stepSquare"></div>
                  <h4><?php echo app('translator')->getFromJson('home.feature3'); ?></h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="step step2">
                  <div class="stepSquare"></div><img src="<?php echo e(asset('assets/imgs/home/teeth.svg')); ?>">
                  <h4><?php echo app('translator')->getFromJson('home.feature4'); ?></h4>
                </div>
              </div>
            </div>
            <div class="squareEnd"></div>
          </div>
        </div>
      </div>
    </main>
    <!-- End Main Content-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
 <script>
        $('#service_id').on('change', function(event) {

            var service_id = $(this).val();
//alert(service_id);

            var token = $("input[name='_token']").val();

            $.ajax({

                url: "<?php echo route('select-city') ?>",

                method: 'POST',

                data: {service_id:service_id, _token:token},

                success: function(data) {
                  //console.log(data);
                    $("select[name='city']").html('');

                    $("select[name='city']").html(data.options);
//alert(data.options);
                }

            });

        });
       $('#city_id').on('change', function(event) {
		  var service_id = document.getElementById('service_id').value ;
            var city_id = $(this).val();
//alert(city_id);

            var token = $("input[name='_token']").val();

            $.ajax({

                url: "<?php echo route('select-hospital') ?>",

                method: 'POST',

                data: {city_id:city_id,service_id:service_id, _token:token},

                success: function(data) {

                    $("select[name='hospital_id']").html('');

                    $("select[name='hospital_id']").html(data.options);
//alert(data.options);
                }

            });

        });
		  $('#hospital_id').on('change', function(event) {
		 var service_id = document.getElementById('service_id').value ;
            var hospital_id = $(this).val();

            $("#date_id").val("");
            $("#datetimepicker1").datepicker("destroy");

            var token = $("input[name='_token']").val();

            $.ajax({

                url: "<?php echo route('select-date') ?>",

                method: 'POST',

                data: {hospital_id:hospital_id,service_id:service_id, _token:token},

                success: function(data) {

               //     $("select[name='hospital_id']").html('');
document.getElementById('date_id').value=data.dates ;
                  //  $("input[name='date_id']").html(data.dates);
				  var date_id = document.getElementById('date_id').value ;
 // alert(date_id);

  $('#datetimepicker1').datepicker({
 	 startDate: new Date(),
		beforeShowDay: function(date) {

			//var hilightedDays = ["2019-8-21","2019-8-24","2019-7-27"];
			//var hilightedDays = [date_id];
			console.log(data.dates);
//var b = JSON.parse(JSON.stringify(data.dates));
		//var b =	JSON.stringify(data.dates);
			var columns = jQuery.parseJSON(data.dates);
			var hilightedDays = columns;
	//	alert(hilightedDays);


			 var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
            for (i = 0; i < hilightedDays.length; i++) {
                if($.inArray(y + '-' + (m+1) + '-' + d,hilightedDays) != -1) {
                    //return [false];
                   return {classes: 'highlight', tooltip: 'Title'};
		}
		}
		}
		});

//alert(data.dates);
                },
/**/
  error: function() {

        <?php if (app()->getLocale()=='ar') {?>
  alert('لايوجد موعد متاح');
 <?php } else {?>
  alert('No appointment available');
  <?php } ?>
//alert(data.dates);
                }
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bsamat/public_html/demo/dentistplus/resources/views/index.blade.php ENDPATH**/ ?>