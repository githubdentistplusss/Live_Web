<?php 
 if (!isset($temp))
 {
	 exit; 
 }

?>


<?php 
	 $ticket_id = intval($params[1]);	
	 $clinic_info = $db->data_query ("SELECT * FROM tickets, clinics where tickets.clinic_id = clinics.clinic_id and  ticket_id = '{$ticket_id}' ") ;



	 
	$data = array (
			'table'=>'tickets' , 
			
			'where' => array (
								'ticket_id' =>$ticket_id , 
								
						)
			); 
	$ticket_details = $db->query ($data);
	if (!$ticket_details)
	{
		echo $temp->msg("لا توجد تذكرة بهذا الرقم", 'danger'); 
	}
	


	/// close ticket

	$sql ="SELECT * from tickets";

			$tickets = $db->data_query ($sql);

	$msg =''; 
	if(isset($_POST['close_ticket']))
	{

		

		

		if($tickets[$ticket_id]['ticket_status'] == 1){
			$msg = "التذكرة مغلقة بالفعل";
			echo $temp->msg($msg, 'danger'); 

		}
		else{

			$date = date('Y-m-d H:i:s');
		$data = array (
						'table'=>'tickets' , 
						'feilds' => array (
						'ticket_status' => 1,
						'ticket_closed_at' => $date
										),
						'where' => array (
											'ticket_id' =>$ticket_id , 
									)
						); 
		$db->db_update ($data);
		$msg= "تم إغلاق التذكرة رقم #$ticket_id بنجاح "; 
		echo $temp->msg($msg, 'success'); 
		
	}
}

?> 


						
							<!-- Basic Information -->
							<form action="<?php echo $rout_config .'/ticket/' . intval($params[1]);?>" method="POST" >
							<div class="card">
								<div class="card-body">
									<!-- <h4 class="card-title"></h4> -->

									<div class="row form-row">
										<div class="col-md-12">
                                        <h4 class="card-title"><?php echo 'تذكرة #'. $ticket_id . ":";?></h4>
                                        </div>
											
										</div>
										<div class="col-md-12">
											 <div class="form-group">
											
												<label><b>عنوان التذكرة:  </b></label>
												<input type="text" name="ticket_title" disabled value="<?php echo @$ticket_details[0]['ticket_title'];?>" class="form-control" >
											
										</div>
                                        </div>


										<div class="col-md-12">
											 <div class="form-group">
											
												<label><b>العيادة:  </b></label>
												<input type="text" name="ticket_title" disabled value="<?php echo @$clinic_info[$ticket_id]['clinic_name'] . " - [" . @$clinic_info[$ticket_id]['clinic_address'] . "]";?>" class="form-control" >
											
										</div>
                                        </div>


										<div class="col-md-12">
											 <div class="form-group">
											
												<label><b>الهاتف:  </b></label>
												<input type="text" name="ticket_title" disabled value="<?php echo @$clinic_info[$ticket_id]['clinic_phone'];?>" class="form-control" >
											
										</div>
                                        </div>
										
										
										
										
	
										<div class="col-md-12">
										
											<div class="form-group">
												<label><b>الرسالة:</b></label>
												<textarea class="form-control" rows="10"  name="ticket_message" disabled><?php echo @$ticket_details[0]['ticket_message'];?></textarea>
											</div>
										</div>
										
									
									<div class="submit-section submit-btn-bottom "  class="submit-section submit-btn-bottom">
                                    <a href="https://dentistpluss.com/clinics_admin/support" class="btn btn-info submit-btn" type="link" >رجوع</a> 
									<button type="submit" class="btn btn-primary submit-btn" name="close_ticket">إغلاق التذكرة</button>								
								</div>
								
							<!-- /Basic Information -->
						<!-- /Registrations -->
							
							
							
						
			