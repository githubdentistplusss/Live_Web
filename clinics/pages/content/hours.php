<?php 
 if (!isset($temp))
 {
	 exit; 
 }

?>


<?php

	/*
	Array ( [saturday] => السبت [saturday_from] => [saturday_to] => [sunday] => الأحد [sunday_from] => [sunday_to] => 
	[monday] => الأثنين [monday_form] => [monday_to] => [tuesday] => الثلاثاء [tuesday_form] => [tuesday_to] => 
	[wednesday] => الأربعاء [wednesday_form] => [wednesday_to] => [thursday] => الخميس [thursday_form] => [thursday_to] => 
	[friday] => الجمعة [friday_form] => [friday_to] => [btn_save] => )

	*/
	$id =  $_SESSION['clinic_id'];
	if (isset($_POST['btn_save']))
	{
			$db->data_query ("DELETE FROM clinic_business_hours WHERE clinic_id='{$id}'" ); 
			
			// Saturday ==============================================
			$data = array (
				'table' => 'clinic_business_hours',
				'feilds' =>  array ( 
									'bus_hr_day' => 'Saturday',
									'bus_hr_start' => $_POST['saturday_from'] ,
									'bus_hr_end' =>  $_POST['saturday_to'] ,
									'clinic_id' => $id 
									)
				);
			$uid = $db->db_insert ($data) ;
			// Sunday ==============================================
			$data = array (
				'table' => 'clinic_business_hours',
				'feilds' =>  array ( 
									'bus_hr_day' => 'Sunday',
									'bus_hr_start' => $_POST['sunday_from'] ,
									'bus_hr_end' =>  $_POST['sunday_to'] ,
									'clinic_id' => $id 
									)
				);
			$uid = $db->db_insert ($data) ;
			// Monday ==============================================
			$data = array (
				'table' => 'clinic_business_hours',
				'feilds' =>  array ( 
									'bus_hr_day' => 'Monday',
									'bus_hr_start' => $_POST['monday_form'] ,
									'bus_hr_end' =>  $_POST['monday_to'] ,
									'clinic_id' => $id 
									)
				);
			$uid = $db->db_insert ($data) ;
			// Tuesday ==============================================
			$data = array (
				'table' => 'clinic_business_hours',
				'feilds' =>  array ( 
									'bus_hr_day' => 'Tuesday',
									'bus_hr_start' => $_POST['tuesday_form'] ,
									'bus_hr_end' =>  $_POST['tuesday_to'] ,
									'clinic_id' => $id 
									)
				);
			$uid = $db->db_insert ($data) ;
			// Wednesday ==============================================
			$data = array (
				'table' => 'clinic_business_hours',
				'feilds' =>  array ( 
									'bus_hr_day' => 'Wednesday',
									'bus_hr_start' => $_POST['wednesday_form'] ,
									'bus_hr_end' =>  $_POST['wednesday_form'] ,
									'clinic_id' => $id 
									)
				);
			$uid = $db->db_insert ($data) ;
			// Thursday ==============================================
			$data = array (
				'table' => 'clinic_business_hours',
				'feilds' =>  array ( 
									'bus_hr_day' => 'Thursday',
									'bus_hr_start' => $_POST['tuesday_form'] ,
									'bus_hr_end' =>  $_POST['tuesday_to'] ,
									'clinic_id' => $id 
									)
				);
			$uid = $db->db_insert ($data) ;
			// Friday ==============================================
			$data = array (
				'table' => 'clinic_business_hours',
				'feilds' =>  array ( 
									'bus_hr_day' => 'Friday',
									'bus_hr_start' => $_POST['friday_form'] ,
									'bus_hr_end' =>  $_POST['friday_to'] ,
									'clinic_id' => $id 
									)
				);
			$uid = $db->db_insert ($data) ;
	}
	
	$sql = "SELECT * FROM `clinic_business_hours` WHERE clinic_id='{$id}' " ; 
	$clinic_hours = $db->data_query ($sql ) ;
	$hour = array () ; 
	foreach ($clinic_hours as $k => $value )
	{
		$hour [$value['bus_hr_day']] = array ('from'=> $value['bus_hr_start'], 'to'=> $value['bus_hr_end']) ; 
	}

	
?>
<style>
    
    .card
    {
        height:85% !important;
    }
    
</style>
<div class="col-md-7 col-lg-8 col-xl-9">
		<!-- Education -->
		<div class="card">
			<div class="card-body">

				
				<div class="education-info">
				<form action="./hours" method="POST"> 
					<div class="row form-row education-cont">
						<div class="col-12 col-md-10 col-lg-11">
										

							<div class="row form-row">
								<div class="col-12 col-md-6 col-lg-4">
								

									<div class="form-group">

													<h4 class="card-title">أوقات العمل</h4>
		
																

									</div> 
								</div>
								
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">

										من
									</div> 
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
إلى
									</div> 
								</div>
							</div>
							
							<div class="row form-row">
								<div class="col-12 col-md-6 col-lg-4">
								

									<div class="form-group">

											<input type="text" name="saturday" class="form-control" value="السبت" readonly>
																

									</div> 
								</div>
								
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">

										<input type="time" name="saturday_from" value="<?php echo @$hour['Saturday']['from'];?>" class="form-control" placeholder="من" >
									</div> 
								</div>
								
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">

										<input type="time" name="saturday_to"  value="<?php echo @$hour['Saturday']['to'];?>"class="form-control" placeholder="الى" >
									</div> 
								</div>
							</div>
						
							<div class="row form-row">
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
											<input type="text" name="sunday"  class="form-control" value="الأحد" readonly>
									</div> 
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
										<input type="time" name="sunday_from" value="<?php echo @$hour['Sunday']['from'];?>" class="form-control" placeholder="من">
									</div> 
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
										<input type="time" name="sunday_to"  value="<?php echo @$hour['Sunday']['to'];?>" class="form-control" placeholder="الى">
									</div> 
								</div>
							</div>
						
							<div class="row form-row">
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
											<input type="text" name="monday"  class="form-control" value="الأثنين" readonly>
									</div> 
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
										<input type="time" name="monday_form" value="<?php echo @$hour['Monday']['from'];?>" class="form-control" placeholder="من">
									</div> 
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
										<input type="time" name="monday_to" value="<?php echo @$hour['Monday']['to'];?>" class="form-control" placeholder="الى">
									</div> 
								</div>
							</div>
						
							<div class="row form-row">
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
											<input type="text" name="tuesday" class="form-control" value="الثلاثاء" readonly>
									</div> 
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
										<input type="time" name="tuesday_form" value="<?php echo @$hour['Tuesday']['from'];?>" class="form-control" placeholder="من">
									</div> 
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
										<input type="time" name="tuesday_to" value="<?php echo @$hour['Tuesday']['to'];?>" class="form-control" placeholder="الى">
									</div> 
								</div>
							</div>
						
							<div class="row form-row">
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
											<input type="text" name="wednesday" class="form-control" value="الأربعاء" readonly>
									</div> 
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
										<input type="time" name="wednesday_form" value="<?php echo @$hour['Wednesday']['from'];?>" class="form-control" placeholder="من">
									</div> 
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
										<input type="time" name="wednesday_to" value="<?php echo @$hour['Wednesday']['to'];?>" class="form-control" placeholder="الى">
									</div> 
								</div>
							</div>
						
							<div class="row form-row">
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
											<input type="text"name="thursday"  class="form-control" value="الخميس" readonly>
									</div> 
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
										<input type="time" name="thursday_form" value="<?php echo @$hour['Thursday']['from'];?>" class="form-control" placeholder="من">
									</div> 
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
										<input type="time" name="thursday_to" value="<?php echo @$hour['Thursday']['to'];?>" class="form-control" placeholder="الى">
									</div> 
								</div>
							</div>
												
							<div class="row form-row">
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
											<input type="text" name="friday" class="form-control" value="الجمعة" readonly>
									</div> 
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
										<input type="time" name="friday_form" value="<?php echo @$hour['Friday']['from'];?>" class="form-control" placeholder="من">
									</div> 
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
										<input type="time" name="friday_to" value="<?php echo @$hour['Friday']['to'];?>" class="form-control" placeholder="الى">
									</div> 
								</div>
							</div>
						
						
						</div>
					</div>
						<div style="margin-bottom:10%" class="submit-section submit-btn-bottom">
			<button type="submit" class="btn btn-primary submit-btn" name="btn_save">حفظ</button>
		</div>
				</div>
				
			</div>
			
		</div>
		<!-- /Education -->
	
	
		</form>
</div>
