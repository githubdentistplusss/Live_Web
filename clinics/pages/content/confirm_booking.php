<?php 
 if (!isset($temp))
 {
	 exit; 
 }

?>

<?php 
	 $bk_id = intval($params[1]);	
	 $clinc_id = intval( $_SESSION['userInfo']['clinic_id']); 

		$clinc_id = intval( $_SESSION['userInfo']['clinic_id']); 
	$sql ="SELECT * FROM offer_booking, offers, users , clinics
				WHERE 
					offers.offer_id = offer_booking.offer_id 
					AND offers.clinic_id='{$clinc_id}'
					AND offer_booking.user_id = users.id
					AND offer_booking_id={$bk_id}";
		$bookings = $db->data_query ($sql);
	if (!$bookings)
	{
		echo $temp->msg("لا يوجد لديكم حجز بهذا الرقم #$bk_id", 'danger'); 
	}
	elseif($bookings[$bk_id]['offer_booking_status'])
	{
		echo $temp->msg("لقد تم تأكيد هذا الحجز من قبل ، حجز رقم #$bk_id", 'danger'); 

	}
	else
	{
	
		if (isset($_POST['confirm_booking']))
		{
			$error = ''; 
			
			if ($_POST['booking_date'] == '' || $_POST['booking_time'] == '')
			{
				$error .='<li>يرجى إدخال تاريخ و وقت الموعد</li>';
			}
			else
			{
				$now = time(); // or your date as well
				$your_date = strtotime($_POST['booking_date']);
				$datediff =  $your_date - $now ;
				$days = round($datediff / (60 * 60 * 24));
				if ($days < -1 ) 
				{
					$error .='<li>يجب أن لا يكون تاريخ الحجز في وقت ماضي</li>';
				}
			}
			if ($error =='' )
			{
				$data = array (
						'table'=>'offer_booking' , 
						'feilds' => array (
											'offer_booking_status' => 1,
											'offer_booking_date' => "{$_POST['booking_date']} {$_POST['booking_time']}",
									
											),
						'where' => array (
											'offer_booking_id' =>$bk_id  
									)
						); 
						$db->db_update ($data);
						
						
				
						
			$body = ' لقد تم تأكيد الحجز رقم   #.' . $bk_id . ' بتاريخ ' . $bookings[$bk_id]['offer_booking_date'] . 'في عيادة' . $bookings[$bk_id]['clinic_name'];
											
									 $content = array(
        "en" => $body
        );
        
        $header = array(
        "en" => "اسنان بلس"
        );
        
        

    $fields = array(
        'app_id' => "963c6d5d-e9c2-448c-a9cc-9074edd06842",
        'include_player_ids' => array($bookings[$bk_id]['device_id']),
        'android_channel_id'=>"c44de74c-20b1-4d25-99a0-d30e85e39bd5",
        "headings" => $header,
        'content_available' => true,
        'contents' => $content,
        
    );

    $fields = json_encode($fields);
   
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);
    
    
            $contents = array(
        "en" => $body
        );
        
        $headers = array(
        "en" => "اسنان بلس"
        );
        
        

    $fields = array(
        'app_id' => "8594d9ac-3416-48f4-9290-3d957ee332ac",
        'include_player_ids' => array($bookings[$bk_id]['device_id']),

        "headings" => $headers,
        'content_available' => true,
        'contents' => $contents,
        
    );

    $fields = json_encode($fields);
   
    $chs = curl_init();
    curl_setopt($chs, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($chs, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
    curl_setopt($chs, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($chs, CURLOPT_HEADER, FALSE);
    curl_setopt($chs, CURLOPT_POST, TRUE);
    curl_setopt($chs, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($chs, CURLOPT_SSL_VERIFYPEER, FALSE);

    $responses = curl_exec($chs);
    curl_close($chs);
    
    	
					
					
						
						
						
						
				
				/*
				$data = array (
						'table'=>'offers' , 
						
						'where' => array (
											'offer_booking_id' =>$bk_id , 
											'clinic_id' => $clinc_id 
									)
						); 
				$bookings = $db->query ($data);
				*/
				
				?>
											<form action="<?php echo $rout_config .'/confirm_booking/' . intval($params[1]);?>" method="POST" >
								<div class="card-body">
									
									<?php
													echo $temp->msg("تم تأكيد حجز الموعد بنجاح", 'success'); 

									?>
									<h3 >تأكيد حجز العرض</h3>
									
									<div class="row form-row">
									<br/>
										<div class="col-md-12">
											<div class="form-group">
												<h4> معلومات العرض </h4>
												<div class="change-avatar">
													<div class="profile-img">
														<img src="<?php echo $upload_dir .'/'. $bookings[$bk_id]['offer_photo']; ?>" alt="User Image">
													</div>
													<div class="upload-img">
															<h4><?php echo @$bookings[$bk_id]['offer_title'];?></h4>
														<small class="form-text text-muted"><?php echo @$bookings[$bk_id]['offer_sub_title'];?></small>
														<div>
															<span style="color:red;font-size:25px;"><?php echo @$bookings[$bk_id]['offer_booking_price'];?> ريال</span> 
															<span> <s> <?php echo @$bookings[$bk_id]['offer_old_price'];?> ريال</s></span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6"><div class="form-group">
												<label><b/>رقم الحجز </b>:</label>
												<span><?php echo $bk_id;?></span>
											</div>
											<div class="form-group">
												<label><b>اسم المريض  </b>:</label>
												<span><?php echo @$bookings[$bk_id]['name'];?></span>
											</div>	
											<div class="form-group">
												<label><b/>رقم الجوال </b>:</label>
												<span><?php echo @$bookings[$bk_id]['mobile'];?></span>
											</div>
										</div>
										</div>
																				<div class="col-md-6">
											<div class="form-group">
									<label><b/>تاريخ الموعد</b>:</label>

												
										 <!-- <label><?php echo @$_POST['booking_date']; echo @$_POST['booking_time'];?></label> -->
												 <label><?php 


											$day = date('d', strtotime(@$_POST['booking_date']));
                                             $month = date('M', strtotime(@$_POST['booking_date']));
                                            $dayName = date('l', strtotime(@$_POST['booking_date']));
                                             $am = date('A', strtotime(@$_POST['booking_time']));
                                             $start_time = date('g', strtotime(@$_POST['booking_time']));
											 $minutes = date('i', strtotime(@$_POST['booking_time']));



											 // days
											if($dayName == "Sunday"){
												$dayName = "الأحد";

											}

											elseif($dayName == "Monday"){
												$dayName = "الاثنين";
											
											}
											elseif($dayName == "Tuesday"){
												$dayName = "الثلاثاء";
											
											}
											elseif($dayName == "Wednesday"){
												$dayName = "الأربعاء";
											
											}
											elseif($dayName == "Thursday"){
												$dayName = "الخميس";
											
											}
											elseif($dayName == "Friday"){
												$dayName = "الجمعة";
											
											}
											elseif($dayName == "Saturday"){
												$dayName = "السبت";
											
											}

											//
											switch($month){
												case "Jan":
													$month = "يناير";
												break;

												case "Feb":
													$month = "فبراير";
												break;


												case "Mar":
													$month = "مارس";
												break;

												case "Apr":
													$month = "ابريل";
												break;

												case "May":
													$month = "مايو";
												break;

												case "Jun":
													$month = "يونيو";
												break;

												case "Jul":
													$month = "يوليو";
												break;

												case "Aug":
													$month = "أغسطس";
												break;

												case "Sep":
													$month = "سبتمبر";
												break;
												
												case "Oct":
													$month = "أكتوبر";
												break;

												case "Nov":
													$month = "نوفمبر";
												break;

												case "Dec":
													$month = "ديسمبر";
												break;
											}

											// am - pm
											switch($am){
												case "PM":
													$am = "مساءً";
												break;

												case "AM":
													$am = "صباحًا";
											}






											@$_POST['booking_date'] = $dayName . " " . $day ." ". $month. ", ";
											@$_POST['booking_time'] = $start_time . ":" . $minutes . " " . $am;






											echo @$_POST ['booking_date']; echo @$_POST['booking_time'];
											?>
											</label>
											</div>
										</div>
									<div class="submit-section submit-btn-bottom">
		               <a href="<?php echo $rout_config;?>" class="btn btn-info submit-btn" type="submit" >  الصفحة الرئيسية</a> 
									</div>
										</div>		
						
						
								
					<?php	
				
				exit;

			}
			else
			{
				echo $temp->msg($error, 'danger'); 
			}
		
		}
				
				$category = $db->data_query ("SELECT * FROM category") ;
				$cat_options  =''; 
				foreach ($category as $key => $value ) 
				{
					$slc =''; 
					if ($bookings[$bk_id]['cat_id'] == $key)
					{
						$slc= "selected";
					}
					$cat_options .= "<option $slc value='{$key}' >{$value['cat_name']}</option> "; 
				}
?> 


						
							<!-- Basic Information -->
							<form action="<?php echo $rout_config .'/confirm_booking/' . intval($params[1]);?>" method="POST" >
								<div class="card-body">
									<h3 >تأكيد حجز العرض</h3>
									<Br/>
									<?php
									
									?>
									
									<div class="row form-row">
									<br/>
										<div class="col-md-12">
											<div class="form-group">
												<h4> معلومات العرض </h4>
												<div class="change-avatar">
													<div class="profile-img">
														<img src="<?php echo $upload_dir  . '/'. $bookings[$bk_id]['offer_photo']; ?>" alt="User Image">
													</div>
													<div class="upload-img">
															<h4><?php echo @$bookings[$bk_id]['offer_title'];?></h4>
														<small class="form-text text-muted"><?php echo @$bookings[$bk_id]['offer_sub_title'];?></small>
														<div>
															<span style="color:red;font-size:25px;"><?php echo @$bookings[$bk_id]['offer_booking_price'];?> ريال</span> 
															<span> <s> <?php echo @$bookings[$bk_id]['offer_old_price'];?> ريال</s></span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6"><div class="form-group">
												<label><b/>رقم الحجز </b>:</label>
												<span><?php echo $bk_id;?></span>
											</div>
											<div class="form-group">
												<label><b>اسم المريض  </b>:</label>
												<span><?php echo @$bookings[$bk_id]['name'];?></span>
											</div>	
											<div class="form-group">
												<label><b/>رقم الجوال </b>:</label>
												<span><?php echo @$bookings[$bk_id]['mobile'];?></span>
											</div>
										</div>
										</div>
																				<div class="col-md-6">
											<div class="form-group">
												<label>تاريخ الموعد <span class="text-danger">*</span></label>
												<input type="Date" name="booking_date"  value="<?php echo @$_POST['booking_date'];?>" class="form-control">
												<input type="time" name="booking_time"  value="<?php echo @$_POST['booking_time'];?>" class="form-control">
											</div>
										</div>
									<div class="submit-section submit-btn-bottom">
										<button type="submit" class="btn btn-primary submit-btn" name="confirm_booking">تأكيد الحجز</button>
									</div>
										</div>
										

							<!-- /Basic Information -->
						<!-- /Registrations -->
							
							
						
		<?php 
			} 
		?>