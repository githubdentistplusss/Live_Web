<?php $page="booking";?>

<?php $__env->startSection('content'); ?>


<?php



?>

<!-- Breadcrumb -->
<?php

  if(count($data)!=0)
  {
      
  

$coded = [
    'January',
    'Jan',
    'February',
    'March',
    'Mar',
    'April',
    'Apr',
    'May',
    'June',
    'Jun',
    'July',
    'Jul',
    'August',
    'Aug',
    'September',
    'Sep',
    'October',
    'Oct',
    'November',
    'Nov',
    'December',
    'Dec',
    'Saturday',
    'Saturday',
    'Sunday',
    'Sun',
    'Monday',
    'Mon',
    'Tuesday',
    'Tue',
    'Wednesday',
    'Wed',
    'Thursday',
    'Thu',
    'Friday',
    'Fri',
    'AM',
    'am',
    'PM',
    'pm'
  ];
  //ABV list
 $decoded = [
    'يناير',
    'يناير',
    'فبراير',
    'مارس',
    'مارس',
    'أبريل',
    'أبريل',
    'مايو',
    'يونيو',
    'يونيو',
    'يوليو',
    'يوليو',
    'أغسطس',
    'أغسطس',
    'سبتمبر',
    'سبتمبر',
    'أكتوبر',
    'أكتوبر',
    'نوفمبر',
    'نوفمبر',
    'ديسمبر',
    'ديسمبر',
    'السبت',
    'السبت',
    'الأحد',
    'الأحد',
    'الإثنين',
    'الإثنين',
    'الثلاثاء',
    'الثلاثاء',
    'الأربعاء',
    'الأربعاء',
    'الخميس',
    'الخميس',
    'الجمعة',
    'الجمعة',
    'صباحاً',
    'صباحاً',
    'مساءً',
    'مساءً'
  ]; //corresponding list


?>
<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
								
								</ol>
							</nav>
							<h2 class="breadcrumb-title">حجز الموعد</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">
				
					<div class="row">
						<div class="col-12">
						
							<div class="card">
								<div class="card-body">
									<div class="booking-doc-info">
									
										<div class="booking-info">
											<h4><a href="doctor-profile"><?php echo e($data[0][3][0]->hospital_name_ar); ?></a></h4>
										
											<p class="text-muted mb-0"><i class="fas fa-tooth"></i> <?php echo e($data[0][3][0]->service_name_ar); ?></p>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-12 col-sm-4 col-md-6">
									<h4 class="mb-1"><?php echo e(str_replace($coded,$decoded,date('d F, Y'))); ?></h4>
									<p class="text-muted"><?php echo e(str_replace($coded,$decoded,date("l"))); ?></p>
								</div>
								
                            </div>
							<!-- Schedule Widget -->
							<div class="card booking-schedule schedule-widget">
							
								<!-- Schedule Header -->
								<div class="schedule-header">
									<div class="row">
										<div class="col-md-12">
										
											<!-- Day Slot -->
											<div class="day-slot">
												<ul style="display:flex !important">
												    
												    <?php if(count($data)>7)
												    $count=7;
													else
													$count=count($data);
													
													?>
												
													
												
													
													<?php for($i=0;$i<$count;$i++): ?>
													<li>
													    <?php
													    
													   
                                                         $dayname = explode(",", $data[$i][0]);
                                                         
                                                         
                                                        

                                                        
                                                    
													    
													    ?>
														<span><?php echo e(str_replace($coded,$decoded,$dayname[0])); ?></span>
														<span class="slot-date"><?php echo e(str_replace($coded,$decoded,$data[$i][0])); ?></span>
													</li>
												
												     <?php endfor; ?>
													
												</ul>
											</div>
											<!-- /Day Slot -->
											
										</div>
									</div>
								</div>
								<!-- /Schedule Header -->
								
								<!-- Schedule Content -->
								<div class="schedule-cont">
									<div class="row">
										<div class="col-md-12">
										
											<!-- Time Slot -->
											<div class="time-slot">
												<ul style="display:flex !important" class="clearfix">
												    
												    	<?php for($i=0;$i<$count;$i++): ?>
												    	
												    
												    
													<li>
													    
													    	<?php for($j=0;$j<$data[$i][1];$j++): ?>
													    	  
													    	  <?php 
													    	  
                              $currentDateTime = $data[$i][2][$j];
                              $date = date('h:i A', strtotime($currentDateTime));

?>
													    	
													    <form action="<?php echo e(route('bookingdetails')); ?>" method="post" >
													        
													     <?php echo csrf_field(); ?>  
                                                            
                                                        <?php echo method_field('PUT'); ?>    
                                                        
                                                             <input type="text" value="<?php echo e($data[$i][3][0]->hospital_name_ar); ?>" name="hospital" hidden />
													    <input type="text" value="<?php echo e($data[$i][3][0]->service_name_ar); ?>" name="service" hidden />
													     <input type="text" value="<?php echo e(str_replace($coded,$decoded,$data[$i][0])); ?>" name="date" hidden />
													      <input type="text" value="<?php echo e(str_replace($coded,$decoded,$date)); ?>" name="time" hidden />
													       <input type="text" value="<?php echo e($data[$i][0]); ?>" name="date_raw" hidden />
													      <input type="text" value="<?php echo e($data[$i][2][$j]); ?>" name="time_raw" hidden />
													       <input type="text" value="<?php echo e($data[$i][3][0]->hospital_id); ?>" name="hospital_id" hidden />
													    <input type="text" value="<?php echo e($data[$i][3][0]->service_id); ?>" name="service_id" hidden />
													     <input type="text" value="<?php echo e($data[$i][3][0]->dentist_id); ?>" name="dentist_id" hidden />
													      
                                                         
													  
													  <input style="padding-left:5%;padding-left:5%;margin-bottom:10%;margin-right:22%" class="timing" type="submit" value="<?php echo e(str_replace($coded,$decoded,$date)); ?>" >
													  
													   
													         
													
													</form>
														<?php endfor; ?>
													</li>
													
													
													
												<?php endfor; ?>
												
												
												
												
												</ul>
											</div>
											<!-- /Time Slot -->
											
										</div>
									</div>
								</div>
								<!-- /Schedule Content -->
								
							</div>
							<!-- /Schedule Widget -->
							
						
							
						</div>
					</div>
				</div>

			</div>		
            <!-- /Page Content -->
</div>
<?php
}
else
{
    ?>
    	<div class="row">
						<div class="col-12">
						
							<div class="card">
								<div class="card-body">
									<div class="booking-doc-info">
									
										<div class="booking-info">
											<h4><a href="doctor-profile">لا يوجد مواعيد متاحة</a></h4>
										
										
										</div>
									</div>
								</div>
							</div>
								</div>
							</div>
<?php							
}
?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('views.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/booking.blade.php ENDPATH**/ ?>