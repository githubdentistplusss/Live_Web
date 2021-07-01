<?php $__env->startSection('content'); ?>
 <main class="main-content">
      <!--flollowerModal-->
      <div class="modal" id="flollowerModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			 <form method="POST" action="<?php echo e(route('createFollower')); ?>">
                        <?php echo csrf_field(); ?>

              <div class="form-group">
                <div class="row">
                  <div class="col-2">
                    <div class="icon"><img src="<?php echo e(asset('assets/imgs/reserve/user.svg')); ?>"></div>
                  </div>
                  <div class="col-10">
                    <h4 class="grey3"><?php echo app('translator')->getFromJson('login.fName'); ?></h4>
                    <input class="form-control loginInput"  name="name" required type="text">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-2">
                    <div class="icon"><img src="<?php echo e(asset('assets/imgs/account/lang.svg')); ?>"></div>
                  </div>
                  <div class="col-10">
                    <h4 class="grey3"><?php echo app('translator')->getFromJson('login.nationality'); ?></h4>

					 <select class="form-control loginInput" name="nationality" id="nationality" required>
                                                    <option value=""><?php echo app('translator')->getFromJson('login.nationality'); ?></option>
                                                    <?php $__currentLoopData = $nationalitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nationality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option  value="<?php echo e($nationality->id); ?>">
					<?php if( app()->getLocale()=='ar'): ?>
					<?php echo e($nationality->nationality_name_ar); ?>

					<?php elseif( app()->getLocale()=='en'): ?>
					<?php echo e($nationality->nationality_name_en); ?>

					<?php endif; ?>
					</option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-2">
                    <div class="icon"><img src="<?php echo e(asset('assets/imgs/account/lang.svg')); ?>"></div>
                  </div>
                  <div class="col-10">
                    <h4 class="grey3"><?php echo app('translator')->getFromJson('login.birthdate'); ?></h4>
                   <input class="form-control loginInput" type="text" id="datetimepickerDate1" value="" name="birthdate" data-toggle="datetimepicker" data-target="#datetimepickerDate1">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <h4 class="grey3"><?php echo app('translator')->getFromJson('login.gender'); ?></h4>
                <div class="row">
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" value="Male" type="radio" name="gender">
						<?php echo app('translator')->getFromJson('login.male'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" value="Female" type="radio" name="gender"><?php echo app('translator')->getFromJson('login.female'); ?>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <d iv class="form-group">
                <h4 class="grey3"><?php echo app('translator')->getFromJson('login.relation'); ?></h4>
                <div class="row">
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="friend" name="relation"><?php echo app('translator')->getFromJson('login.friend'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="brother" name="relation"><?php echo app('translator')->getFromJson('login.brother'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" value="wife" type="radio" name="relation"><?php echo app('translator')->getFromJson('login.wife'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="husband" name="relation"><?php echo app('translator')->getFromJson('login.husband'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="son" name="relation"><?php echo app('translator')->getFromJson('login.son'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="daughter" name="relation"><?php echo app('translator')->getFromJson('login.daughter'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="father" name="relation"><?php echo app('translator')->getFromJson('login.father'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="mother" name="relation"><?php echo app('translator')->getFromJson('login.mother'); ?>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button class="navBtn" type="submit"><?php echo app('translator')->getFromJson('login.addf'); ?> </button>
              </div>
			  </form>
            </div>
          </div>
        </div>
      </div>
      <!--end flollowerModal-->
      <!--reserve section-->
      <section class="reserve">
        <div class="title">
          <div class="container">
            <h2><?php echo app('translator')->getFromJson('home.reserv'); ?></h2>
          </div>
        </div>
		<form method="POST" action="<?php echo e(route('createReservation')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>


                    	<input  type="hidden" value="<?php echo $start; ?>" name="start"/>
						<input  type="hidden" value="<?php echo $end; ?>" name="end"/>
						<input  type="hidden" value="<?php echo $hospital; ?>" name="hospital"/>
						<input  type="hidden" value="<?php echo $service; ?>" name="service"/>
						<input  type="hidden" value="<?php echo $date; ?>" name="date"/>
						<input  type="hidden" value="<?php echo $dentist; ?>" name="dentist"/>



						<!--<input  type="hidden" value="<?php echo $start; ?>" name="start"/>-->
						<!--<input  type="hidden" value="<?php echo $end; ?>" name="end"/>-->
						<!--<input  type="hidden" value="<?php echo $hospital; ?>" name="hospital"/>-->
						<!--<input  type="hidden" value="<?php echo $service; ?>" name="service"/>-->
						<!--<input  type="hidden" value="<?php echo $date; ?>" name="date"/>-->
						<!--<input  type="hidden" value="<?php echo $dentist; ?>" name="dentist"/>-->
        <div class="container">
          <div class="contentWrap">
            <div class="content2">
              <div class="row">
                <div class="col-3 col-md-2 col-lg-1">
                  <div class="icon"><img src="<?php echo e(asset('assets/imgs/reserve/user.svg')); ?>"></div>
                </div>
                <div class="col-9 col-md-10 col-lg-11">
                  <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.ill'); ?></h5>
                  <h4 class="blue2">

                                <input id="name" type="radio" class="form-check-input" name="user"  onclick="hidefollowers();" value="0" required  ><?php echo e($user_name); ?></h4>
                                <input type="radio" class="form-check-input" name="user" onclick="showfollowers();" value="1" required ><?php echo app('translator')->getFromJson('resrv.follower'); ?>


                    <div  style="display: none;" id="followers">

												<div class="col-md-6">
												<?php if (count($followers)==0) {?>
										 <a data-toggle="modal" href="#" data-target="#flollowerModal"><?php echo app('translator')->getFromJson('resrv.addFollower'); ?></a>

													<?php } else {?>
                                                <select class="form-control loginInput" name="follower_id" id="follower_id" >
                                                   <!-- <option value=""><?php echo app('translator')->getFromJson('Select followers'); ?></option>-->
                                                    <?php $__currentLoopData = $followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php echo e((old('follower') == $follower->id)?'selected="selected"':""); ?> value="<?php echo e($follower->id); ?>">
					<?php echo e($follower->name); ?>

					</option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
<?php } ?>
                                                <?php if($errors->has('follower_id')): ?>
                                                    <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('follower_id')); ?></strong>
                                                </span>
                                                <?php endif; ?>

                                            </div>
                                            </div>
                </div>
              </div>
            </div>
            <div class="content2">
              <div class="row">
                <div class="col-3 col-md-2 col-lg-1">
                  <div class="icon"><img src="<?php echo e(asset('assets/imgs/reserve/broken-tooth.svg')); ?>"></div>
                </div>
                <div class="col-9 col-md-10 col-lg-11">
                  <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.treatment'); ?></h5>
                  <h4 class="blue2"><?php echo e($service_name[0]->service_name_ar); ?></h4>
                </div>
              </div>
            </div>
            <div class="accordion" id="accordion">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <div class="row">
                    <div class="col-3 col-md-2 col-lg-1">
                      <div class="icon"><img src="<?php echo e(asset('assets/imgs/reserve/location.svg')); ?>"></div>
                    </div>
                    <div class="col-9 col-md-10 col-lg-11">
                      <div class="row">
                        <div class="col-10">
                          <h5 class="grey3"> <?php echo app('translator')->getFromJson('login.hospital'); ?> </h5>
                          <h4 class="blue2"><?php echo e($hospital_name[0]->hospital_name_ar); ?></h4>
                        </div>
                        <div class="col-2">
                          <div class="requiredF"><span>*</span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-3 col-md-2 col-lg-1"></div>
                      <div class="col-9 col-md-10 col-lg-11">
                        <div class="hospitalChoose">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="radio" name="hospital" value="طيبة"> طيبة
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="radio" name="hospital" value="طيبة 2">طيبة 2
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="content2">
              <div class="row">
                <div class="col-3 col-md-2 col-lg-1">
                  <div class="icon"><img src="<?php echo e(asset('assets/imgs/reserve/time.svg')); ?>"></div>
                </div>
                <div class="col-9 col-md-10 col-lg-11">
                  <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.time'); ?></h5>

				  
        <h5 class="grey3"> <?php echo app('translator')->getFromJson('resrv.dateTime'); ?></h5>
<?php  $start_time = date('g', strtotime($start));
$am=date('A', strtotime($start));
        ?>
        <h4 class="blue2"><?php echo e($date); ?> /  <?php echo e($start_time); ?>    <?php echo e($am); ?></h4>


                  <h4 class="blue2"><?php echo e($start_time); ?> <?php echo e($date); ?>  </h4>
                </div>
              </div>
            </div>
            <div class="accordion" id="accordion2">
              <div class="card">
                <div class="card-header" id="teethHeading">
                  <div class="row">
                    <div class="col-3 col-md-2 col-lg-1">
                      <div class="icon"><img src="<?php echo e(asset('assets/imgs/reserve/image.svg')); ?>"></div>
                    </div>
                    <div class="col-9 col-md-10 col-lg-11">
                      <div class="row">
                        <div class="col-10">
                          <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.attach'); ?>  </h5>
                          <h4 class="blue2">
                            <button  type="button" class="btn btn-link collapsed" id="teethImg" data-toggle="collapse" data-target="#teethCollapse" aria-expanded="true" aria-controls="teethCollapse"><?php echo app('translator')->getFromJson('resrv.pic1'); ?> </button>
                          </h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="collapse" id="teethCollapse" aria-labelledby="teethHeading" data-parent="#accordion">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-3 col-md-2 col-lg-1 preview"> </div>
                      <div class="col-9 col-md-10 col-lg-11 custom-upload">
                        <div class="custom-file">
                          <input class="custom-file-input teethImg" type="file" name="photo" id="customFile">
                          <label class="custom-file-label loginInput customFile" data-text="Browse" for="customFile"><?php echo app('translator')->getFromJson('resrv.attachpic'); ?> </label>
                          <div class="modal fade" id="iframe-photo" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                              </div>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-3 col-md-2 col-lg-1 preview"></div>
                      <div class="col-9 col-md-10 col-lg-11 custom-upload">
                        <div class="custom-file">
                          <input class="custom-file-input teethImg" type="file" name="photo2" id="customFile2">
                          <label class="custom-file-label loginInput customFile2" data-text="Browse" data-text="Browse" for="customFile2"><?php echo app('translator')->getFromJson('resrv.attachpic'); ?> </label>
                          <div class="modal fade" id="iframe-photo2" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                              </div>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-3 col-md-2 col-lg-1 preview"></div>
                      <div class="col-9 col-md-10 col-lg-11 custom-upload">
                        <div class="custom-file">
                          <input class="custom-file-input teethImg" type="file" name="photo3" id="customFile3">
                          <label class="custom-file-label loginInput customFile3" data-text="Browse" for="customFile3"><?php echo app('translator')->getFromJson('resrv.attachpic'); ?> </label>
                          <div class="modal fade" id="iframe-photo3" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                              </div>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-3 col-md-2 col-lg-1 preview"></div>
                      <div class="col-9 col-md-10 col-lg-11 custom-upload">
                        <div class="custom-file">
                          <input class="custom-file-input teethImg" type="file" name="photo4" id="customFile4">
                          <label class="custom-file-label loginInput customFile4" data-text="Browse" for="customFile4"><?php echo app('translator')->getFromJson('resrv.attachpic'); ?> </label>
                          <div class="modal fade" id="iframe-photo4" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                              </div>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-3 col-md-2 col-lg-1 preview"></div>
                      <div class="col-9 col-md-10 col-lg-11 custom-upload">
                        <div class="custom-file">
                          <input class="custom-file-input teethImg" type="file" name="photo5" id="customFile5">
                          <label class="custom-file-label loginInput customFile5" data-text="Browse" for="customFile5"><?php echo app('translator')->getFromJson('resrv.attachpic'); ?> </label>
                          <div class="modal fade" tabindex="-1" id="iframe-photo5" role="dialog">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
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
           <!-- <div class="accordion" id="accordion3">
              <div class="card">
                <div class="card-header" id="recordHeading">
                  <div class="row">
                    <div class="col-3 col-md-2 col-lg-1">
                      <div class="icon"><img src="assets/imgs/reserve/voice.svg"></div>
                    </div>
                    <div class="col-9 col-md-10 col-lg-11">
                      <div class="row">
                        <div class="col-10">
                          <h5 class="grey3"> أرفاق </h5>
                          <h4 class="blue2">
                            <button class="btn btn-link collapsed" id="teethImg" data-toggle="collapse" data-target="#recordCollapse" aria-expanded="true" aria-controls="recordCollapse">تسجيل صوتى لوصف الحالة </button>
                          </h4>
                        </div>
                        <div class="col-2">
                          <div class="requiredF"><span>*</span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="collapse" id="recordCollapse" aria-labelledby="recordHeading" data-parent="#accordion">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-3 col-md-2 col-lg-1"></div>
                      <div class="col-9 col-md-10 col-lg-11">
                        <div id="controls">
                          <button id="recordButton">تسجيل</button>
                          <button id="pauseButton" disabled>ايقاف موقت</button>
                          <button id="stopButton" disabled>ايقاف</button>
                        </div>
                        <div id="formats">
                          <p>ابدا بالضغط علي تسجيل</p>
                        </div>
                        <ol id="recordingsList"></ol>
                      </div>
                    </div>
                  </div>
                </div>
              </div>-->
              <div class="content2 checkList">
                <div class="row">
                  <div class="col-3 col-md-2 col-lg-1"></div>
                  <div class="col-9 col-md-10 col-lg-11">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="disease" name="is_diseases">
                      <label class="custom-control-label" for="disease"><?php echo app('translator')->getFromJson('resrv.que1'); ?></label>
                    </div>
                  </div>
                  <div class="col-3 col-md-2 col-lg-1"></div>
                  <div class="col-9 col-md-10 col-lg-11">
                    <input class="form-control loginInput disease" name="diseases" type="text" placeholder="<?php echo app('translator')->getFromJson('resrv.que2'); ?>">
                  </div>
                </div>
              </div>
              <div class="content2 checkList">
                <div class="row">
                  <div class="col-3 col-md-2 col-lg-1"></div>
                  <div class="col-9 col-md-10 col-lg-11">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="medicine" name="is_drugs">
                      <label class="custom-control-label" for="medicine"><?php echo app('translator')->getFromJson('resrv.que3'); ?></label>
                    </div>
                  </div>
                  <div class="col-3 col-md-2 col-lg-1"></div>
                  <div class="col-9 col-md-10 col-lg-11">
                    <input class="form-control loginInput medicine" name="drugs" type="text" placeholder="<?php echo app('translator')->getFromJson('resrv.que4'); ?>">
                  </div>
                </div>
              </div>
              <div class="reserveBtn">
                <div class="row">
                  <div class="col-3 col-md-2 col-lg-1"></div>
                  <div class="col-9 col-md-10 col-lg-11">
                    <button class="navBtn" type="submit">حجز موعد</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

		<!--<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button  class="btn btn-primary">
                                    <?php echo e(__('Add')); ?>

                                </button>
                            </div>
                        </div>-->
                    </form>

      </section>
    </main>






<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

 <script>

$(document).on('click', '.delbtn', function(){
		var input = $(this).parent().find('input');

		$(this).parent().find('.custom-file').attr('style','width:100%');
		$('head').append("<style>."+input.attr('id')+"::after{ display: block !important }</style>");
		$(this).parent().find('label').text("<?php echo e(__('resrv.attachpic')); ?>");
		$(this).parent().parent().find('.preview').empty();
        $(this).parent().find('input').val('');
		$(this).remove();
	});

       $('#hospital_id').on('change', function(event) {

            var hospital_id = $(this).val();
//alert(hospital_id);

            var token = $("input[name='_token']").val();

            $.ajax({

                url: "<?php echo route('select-ajax2') ?>",

                method: 'POST',

                data: {hospital_id:hospital_id, _token:token},

                success: function(data) {

                    $("select[name='service_id']").html('');

                    $("select[name='service_id']").html(data.options);
//alert(data.options);
                }

            });

        });
		 $('#service_id').on('change', function(event) {

            var service_id = $(this).val();

		var hospital_id=$("#hospital_id").val();
//alert(hospital_id);

            var token = $("input[name='_token']").val();

            $.ajax({

                url: "<?php echo route('select-day') ?>",

                method: 'POST',

                data: {service_id:service_id,hospital_id:hospital_id, _token:token},

                success: function(data) {

                    $("select[name='day']").html('');

                    $("select[name='day']").html(data.options);
//alert(data.options);
                }

            });

        });
 $('#day').on('change', function(event) {

            var day = $(this).val();
            var service_id = $("#service_id").val();

		var hospital_id=$("#hospital_id").val();
//alert(hospital_id);

            var token = $("input[name='_token']").val();

            $.ajax({

                url: "<?php echo route('select-date') ?>",

                method: 'POST',

                data: {service_id:service_id,hospital_id:hospital_id,day:day, _token:token},

                success: function(data) {

                    $("select[name='date']").html('');

                    $("select[name='date']").html(data.options);
                    $("select[name='time']").html('');
                    $("select[name='time']").html(data.options2);

//alert(data.options);
                }

            });

        });

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shahin/Sites/dentist-backend/resources/views/event/reservationFormFinish.blade.php ENDPATH**/ ?>