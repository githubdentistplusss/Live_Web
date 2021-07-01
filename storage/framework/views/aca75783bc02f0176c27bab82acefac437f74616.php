<?php $__env->startSection('content'); ?>
<main class="main-content">
 <section class="reserve">
        <div class="title">
          <div class="container">
            <h2><?php echo app('translator')->getFromJson('home.reserv'); ?></h2>
          </div>
        </div>
                  
                        <?php echo csrf_field(); ?>


 <div class="container">
          <div class="contentWrap">
            <div class="content2">
 <div class="" id="myModal">
        <div class="">
          <div class="">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="days">
                <ul class="nav nav-pills nav-justified">
                 
                 <li><?php echo app('translator')->getFromJson('login.mesg2'); ?>  <a href="<?php echo e(route('index')); ?>"><?php echo app('translator')->getFromJson('login.back'); ?></a></li>
                  
                </ul>
              
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
<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shahin/Sites/dentist-backend/resources/views/event/notValid.blade.php ENDPATH**/ ?>