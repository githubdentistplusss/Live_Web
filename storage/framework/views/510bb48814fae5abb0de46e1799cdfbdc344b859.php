

<?php $__env->startSection('innercontent'); ?>
<?php if(Session::has('message')): ?>
<p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
<?php endif; ?>
    <div class="card">
        <div class="card-body pt-0">
            <!-- Tab Menu -->
            <nav class="user-tabs mb-4">
                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                   
                  
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo e(route('bookedoffers')); ?>"><span
                                class="med-records"><?php echo app('translator')->getFromJson('resrv.uDate'); ?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo e(route('bookedservices')); ?>"><span
                                class="med-records">مواعيد الخدمات</span></a>
                    </li>
                  
                </ul>
            </nav>
            <!-- /Tab Menu -->
            <!-- Tab Content -->
            <div class="row">
          
                        
                        
                    
                      
                    
                       
                                     <?php if(count($services) != 0): ?>
                                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                         $day = date('d', strtotime($service->serv_booking_date));
                                            $month = date('M', strtotime($service->serv_booking_date));
                                            $dayName = date('l', strtotime($service->serv_booking_date));
                                            $am = date('A', strtotime($service->serv_booking_date));
                                            $start_time = date('g', strtotime($service->serv_booking_date));
                                            ?>
                                            
                                           
                                            
                                            
                                            <div class="col-md-4 col-lg-4 col-xs-12 product-custom">
									<div class="profile-widget" style="width: 100%; display: inline-block;padding:0px !important">
									
									<div style="background-color:#1c598F !important;height:30px">
									    
									    <div style="padding:5px 20px 0px 0px" class="row" >
									    
									   <div style="width:20%;color:white">#<?php echo e($service->serv_booking_id); ?></div>
									   
									    <?php if($service->serv_booking_status==1): ?>
                                                
                                               <div style="color:white"> <?php echo e($dayName); ?> <?php echo e($day); ?> <?php echo e($month); ?> <?php echo e($start_time); ?> <?php echo e($am); ?></div>
                                                
                                                <?php else: ?>
                                                
                                               <div></div>
                                                
                                                <?php endif; ?>
									   
									  
									   
									   </div>
									   
									</div>
								
									<div style="padding:15px !important" class="pro-content">
									
											<i style="color:#1c598F !important" class="fas fa-clinic-medical"></i> <span style="font-size:17px;color:black;font-wight:bold;"><?php echo e(isset($service->clinic_name) ? $service->clinic_name : ''); ?>

									
										
										<hr>
								
										<i style="color:#1c598F !important" class="fas fa-award"></i> <span style="font-size:14px;color:black;"><?php echo e($service->private_serv_name); ?> 
											<br>
										
										<hr>
										
											
									
										<i class="fa fa-money" aria-hidden="true"></i>
											<i style="color:#1c598F !important" class="fas fa-money-bill-alt"></i> <span style="font-size:14px;color:black;"> <?php echo e($service->serv_booking_price); ?> ريال
											<br>
										
										<hr>
										 
										 
										
										
										 <?php if($service->serv_booking_status == 0): ?>
                                                          <span
                                                            class="badge badge-pill bg-warning-light">في انتظار تأكيد الحجز من العيادة</span>


                                                    <?php elseif($service->serv_booking_status == 1): ?>
                                                        <span
                                                            class="badge badge-pill bg-success-light">تم تأكيد الحجز</span>

                                                    <?php elseif($service->serv_booking_status == 2): ?>
                                                        <span
                                                            class="badge badge-pill bg-danger-light">تم الغاء الحجز من المراجع</span>

                                                    <?php elseif($service->serv_booking_status  == 3): ?>
                                                 
                                                    <span
                                                            class="badge badge-pill bg-success-light">تم حضور المراجع  </span>
                                                            
                                                               <?php else: ?>
                                                     <span
                                                            class="badge badge-pill bg-danger-light">لم يتم حضور المراجع  </span>
                                                    <?php endif; ?>
                                                    
                                                    
                                                    	<br>
									
										<hr>
								
								
                                                      <center>   <a href="<?php echo e(url('/serviceNeglect/' . $service->serv_booking_id)); ?>" class="btn btn-sm bg-danger-light">
                                                            
                                                            <i class="far fa-wrong"></i> الغاء الحجز
                                                        </a>
                                                        </center>
                                                   
									</div>
								</div>
							   </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                      
                                                <div style="text-align: -webkit-center;">
                                                    <h2 style="color: red;"><?php echo app('translator')->getFromJson('resrv.NotFound'); ?></h2>
                                                </div>
                                          
                                    <?php endif; ?>
                            
                           
                     
                    </div>
            
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('views.client.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/client/bookedservices.blade.php ENDPATH**/ ?>