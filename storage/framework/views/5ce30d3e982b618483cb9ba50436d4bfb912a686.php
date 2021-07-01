
<?php $__env->startSection('content'); ?>

            <div class="page-wrapper">
                <div class="content container-fluid">
				
					
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body custom-edit-service">
									
									<div class="row mb-5">
                                    <div class="col">
                                        <ul class="nav nav-tabs nav-tabs-solid">
                                         
                                            <li class="nav-item">
												<h2>
													
                                              حجز موعد
											
											</h2>
                                            </li>
                                        </ul>
                                    </div>
                                   
                                </div>
							
								<!-- Add Blog -->
								<form method="POST" enctype="multipart/form-data" autocomplete="off" id="update_service" action="<?php echo e(route('createReservation')); ?>">
									<input type="hidden" name="csrf_token_name" value="0146f123a4c7ae94253b39bca6bd5a5e">

                                         <?php echo csrf_field(); ?>  
                                           <?php echo method_field('PUT'); ?>                 
                                                        
									<div class="col-lg-12">
										<div class="form-group">
											<label>اسم المراجع <span class="text-danger">*</span></label>
											<input type="hidden" name="user_id"  value="<?php echo e($user_id); ?>">
											<input type="hidden" name="user"  value="0">
											<input class="form-control" type="text" name="name_title"  value="<?php echo e($name); ?>"
												readonly="" required="">
										</div>
									</div>

									<div class="col-lg-12">
										<div class="form-group">
											<label>تاريخ الموعد <span class="text-danger">*</span></label>
											<input type="hidden" name="date"  value="<?php echo e($date_raw); ?>">
											<input type="hidden" name="start"  value="<?php echo e($time_raw); ?>">
											<input class="form-control" type="text" name="date_title" 
												value="<?php echo e($date.' '.$time); ?>" readonly="" required="">
										</div>
									</div>

									<div class="col-lg-12">
										<div class="form-group">
											<label>العلاج المطلوب <span class="text-danger">*</span></label>
											<input type="hidden" name="service"  value="<?php echo e($service_id); ?>">
											<input class="form-control" type="text" name="service_title" id="service_title" value="<?php echo e($service); ?>"
												readonly="" required="">
										</div>
									</div>

									<div class="col-lg-12">
										<div class="form-group">
											<label>إسم المستشفى <span class="text-danger">*</span></label>
											<input type="hidden" name="hospital"  value="<?php echo e($hospital_id); ?>">
												<input type="hidden" name="dentist"  value="<?php echo e($dentist_id); ?>">
											<input class="form-control" type="text" name="service_title" id="service_title"
												value="<?php echo e($hospital); ?>" readonly="" required="">
										</div>
									</div>

										
	
									

									<div class="col-lg-12">
										<div class="form-group">
											<label>هل لديك امراض <span class="text-danger"></span></label>
											
											<input class="form-control" type="text" name="diseases"  value=""
												>
										</div>
									</div>

									<div class="col-lg-12">
										<div class="form-group">
											<label>هل تتناول ادويه <span class="text-danger"></span></label>
										
											<input class="form-control" type="text" name="drugs"  value=""
												 >
										</div>
									</div>

									<div class="col-lg-12">
										<div class="form-group">
											<label>ملاحظات <span class="text-danger"></span></label>
										
											<input class="form-control" type="text" name="notes"  value="ارغب بطبيب - ارغب بطبيبه"
												 >
										</div>
									</div>
									


									<div class="service-fields mb-3">
										<div class="row">
											<div class="col-lg-12">
												<div class="service-upload">
													<i class="fas fa-cloud-upload-alt"></i>
													<span>ارفاق صوره الأسنان</span>
													<input type="file" name="files[]" id="files" multiple="" required accept="image/jpeg, image/png, image/gif,">
												<div id="uploadPreview">
												
												</div>
												</div>	
													<ul class="upload-wrap" id="upload-wrap">
													
													
													</ul>
												
											</div>
											<div class="submit-section">
												<button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">حجز الموعد</button>
											</div>
										</div>
										
									</div>
							
									
								</form>
								<!-- /Add Blog -->


								</div>
							</div>
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->

				<!--نهايه حجز موعد-->
		
        </div>
		<!-- /Main Wrapper -->

		<!-- Model -->
		<div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="acc_title"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<p id="acc_msg"></p>
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-success si_accept_confirm">Yes</a>
						<button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="deleteNotConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="acc_title">Inactive Service?</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<p id="acc_msg">Service is Booked and Inprogress..</p>
					</div>
					<div class="modal-footer">
						
						<button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">OK</button>
					</div>
				</div>
			</div>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<script>
		    $(document).ready(function() {
		        
		       
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("#upload-wrap").append("<li style=\"display:inline\"><div class=\"upload-images\">" +
            "<img  src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span style=\"color:red\" class=\"remove\">مسح</span>" +
            "</div></li>");
          $(".remove").click(function(){
            $(this).parent(".upload-images").remove();
          });
          
														
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
		    
		    
		</script>
		
		
		<?php $__env->stopSection(); ?>
<?php echo $__env->make('views.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/client/reservation-appointment.blade.php ENDPATH**/ ?>