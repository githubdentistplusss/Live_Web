<?php $__env->startSection('content'); ?>
<main class="main-content">
 <section class="reserve">
        <div class="title">
          <div class="container">
            <h2><?php echo app('translator')->getFromJson('home.reserv'); ?></h2>
          </div>
        </div>
                  
                        <?php echo csrf_field(); ?>

<?php if($error): ?>

<?php echo e($error); ?>

	

<?php endif; ?>
 <div class="container">
          <div class="contentWrap">
            <div class="content2">
 <div class="" id="myModal">
        <div class="">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="days">
                <ul class="nav nav-pills nav-justified">
                <!-- <?php $__currentLoopData = $other_times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other_time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				 <?php if($other_time->start_date < $date ): ?>
				 
				 <?php endif; ?>
				 <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#day4"><?php echo e($other_time->start_date); ?></a></li>
				<?php echo e($other_time->start_time); ?>

				 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#day4"><?php echo e($date); ?></a></li>
                  
                </ul>
                <div class="tab-content">
                 
                  <div class="tab-pane active" role="tabpanel" id="day4">
				  <?php if($times): ?>
	

<?php $__currentLoopData = $times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
<?php
 $time1 = date('h:i', strtotime($time->start_time));
 $am = date('A', strtotime($time->start_time));
 $today=date('Y-m-d');
 
 
 
 if(time() > strtotime($time->start_time) &&  $today == $date){
  ?>
     <div class="time-notAvailable"> <span style="text-decoration-line: line-through;">  <?php echo e($time1); ?>  <?php echo e($am); ?></span></div>  

  <?php
  }else{

  $dates = DB::table('events')
                ->where('event_date', '=', $date)
                ->where('start_time', '=', $time->start_time)
                ->where('hospital_id', '=', $_GET['hospital_id'])
                ->where('status', '=', 0)
                ->count();
                
            if($dates==0)
            {
                 ?>
             <a href=" <?php echo e(url('/search/start/'.$time->start_time.'/hospital/'.$hospital_id.'/service/'.$service_id.'/date/'.$date.'/dentist/'.$time->dentist_id)); ?>"><div class="time-available"> <span>  <?php echo e($time1); ?>  <?php echo e($am); ?></span></div> </a>   
             <?php 

           }
 

  }
?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
         
	<?php endif; ?>
                    
                   
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
	
					
	</section>         
</main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
 <script>

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
<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/event/reservationFormRest.blade.php ENDPATH**/ ?>