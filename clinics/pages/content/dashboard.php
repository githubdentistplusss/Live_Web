<?php 
 if (!isset($temp))
 {
	 exit; 
 }

?>

<?php
	$clinic_id=intval($_SESSION['userInfo']['clinic_id']);
	
	
	
	$id = $_SESSION['userInfo']['clinic_id']; 
	$msg =''; 
	if(isset($_POST['show']))
	{
		$ofr_id = intval($_POST['show']);
		
		$data = array (
						'table'=>'offer_booking' , 
						'feilds' => array (
						'offer_booking_status'	=>3	),
						'where' => array (
											'offer_booking_id' =>$ofr_id , 
									)
						); 
		$db->db_update ($data);
		$msg= "تم تأكيد حضور المريض للموعد رقم #$ofr_id "; 
		echo $temp->msg($msg, 'success'); 
		
		
			$sql ="SELECT * FROM offer_booking, offers, users , clinics
				WHERE 
					offers.offer_id = offer_booking.offer_id 
				    AND offers.clinic_id = clinics.clinic_id
					AND offer_booking.user_id = users.id
					AND offer_booking_id={$ofr_id}";
		$bookings = $db->data_query ($sql);
		
	 
		
		$body = ' لقد تم تأكيد حضور المريض لحجز رقم  #.' . $bookings[$ofr_id]['offer_booking_id'] . ' بتاريخ ' . $bookings[$ofr_id]['offer_booking_date'] . 'في ' . $bookings[$ofr_id]['clinic_name'];
									
								
        				
        		$content = array(
                "en" => $body
                );
                
                $header = array(
                "en" => "اسنان بلس"
                );
                
                
        
            $fields = array(
                'app_id' => "963c6d5d-e9c2-448c-a9cc-9074edd06842",
                'include_player_ids' => array($bookings[$ofr_id]['device_id']),
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
        
        		
	}
	if(isset($_POST['noshow']))
	{
		$ofr_id = intval($_POST['noshow']);
		$data = array (
						'table'=>'offer_booking' , 
						'feilds' => array (
						'offer_booking_status'	=>4	),
						'where' => array (
											'offer_booking_id' =>$ofr_id , 
									)
						); 
		$db->db_update ($data);
		
		  
		
		$msg= "تم تأكيد عدم حضور المريض للموعد رقم #$ofr_id"; 
		echo $temp->msg($msg, 'success'); 
		
		
			$sql ="SELECT * FROM offer_booking, offers, users , clinics
				WHERE 
					offers.offer_id = offer_booking.offer_id 
				    AND offers.clinic_id = clinics.clinic_id
					AND offer_booking.user_id = users.id
					AND offer_booking_id={$ofr_id}";
		$bookings = $db->data_query ($sql);
		
	  
		
			$body = ' لقد تم تأكيد حضور المريض لحجز رقم  #.' . $bookings[$ofr_id]['offer_booking_id'] . ' بتاريخ ' . $bookings[$ofr_id]['offer_booking_date'] . 'في عيادة' . $bookings[$ofr_id]['clinic_name'];
										
									
				
						$content = array(
        "en" => $body
        );
        
        $header = array(
        "en" => "اسنان بلس"
        );
        
        

    $fields = array(
        'app_id' => "963c6d5d-e9c2-448c-a9cc-9074edd06842",
        'include_player_ids' => array($bookings[$ofr_id]['device_id']),
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
		
	}
	
	
	$sql="SELECT count(offer_id) as 'offer' FROM offers WHERE offer_status=1 And offers.clinic_id='{$clinic_id}'" ;
	$offer=$db->data_query ($sql) ;
	
	$sql="SELECT count(offer_booking_id) as 'total' FROM  offers natural join offer_booking natural join clinics where  clinic_id = '{$clinic_id}'"; 
	$all_booking=$db->data_query ($sql) ;
	
	$sql="SELECT COUNT(offer_booking_id) as'waiting' FROM offer_booking natural join offers WHERE offer_booking_status=0 and clinic_id = '{$clinic_id}'";
	$booking_waiting=$db->data_query ($sql) ;
	
	$yesterday = date("Y-m-d" );
	 $sql="SELECT COUNT(offer_booking_date) as'today' FROM offer_booking natural join offers WHERE date(offer_booking_date) = curdate() and offer_booking_status = 1 and clinic_id = '{$clinic_id}' ";
	
	// $sql="SELECT COUNT(offer_booking_date) as'today' FROM offer_booking natural join offers WHERE offer_booking_date>'{$yesterday}' and clinic_id = '{$clinic_id}' ";
	$day=$db->data_query ($sql) ; 
	
	
?>		
<div>
										<div class="row">
										<div class="card-body " >
										<div class="row">
													<div class="dash-widget dct-border-rht ">
														<div class="circle-bar circle-bar1">
															<div class="circle-graph1" data-percent="50">
																<img src="assets/img/offer.png" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6> العروض المفعلة</h6>
															<h3><?php foreach($offer as $key =>$value){echo  $key ;}; ?></h3>
														</div>
													</div>

                                                    <div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar2">
															<div class="circle-graph2" data-percent="75">
																<img src="assets/img/ico4.png" class="img-fluid" alt="patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>عدد الحجوزات</h6>
															<h3><?php  foreach($all_booking as $key =>$value){echo  $key ;} ; ?></h3>
														</div>
													</div>

													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar3">
															<div class="circle-graph3" data-percent="75">
																<img src="assets/img/icont.png" class="img-fluid" alt="patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6> الحجوزات في الانتظار</h6>
															<h3><?php foreach($booking_waiting as $key =>$value){echo $key ;}; ?></h3>
														</div>
													</div>

													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar1">
															<div class="circle-graph1" data-percent="75">
																<img src="assets/img/d1.png" class="img-fluid" alt="patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>  مواعيد اليوم</h6>
															<h3><?php foreach($day as $key =>$value){echo $key ;}; ?></h3>
														</div>
													</div>

										</div>
									  	</div>												
									  	</div>
										
    <div class="card">

								<div class="card-body pt-0">
								
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab">المواعيد</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#pat_prescriptions" data-toggle="tab">الحجوزات بالانتظار</a>
											</li>											
										</ul>
									</nav>
									
									<div class="tab-content pt-0">
										
										<div id="pat_appointments" class="tab-pane fade show active">
												
													<div >													
												<?php

		$clinic_info = $db->data_query ("SELECT offer_booking.offer_booking_id as'booking_id',offer_booking.offer_booking_price,offers.offer_title , offers.offer_photo, offers.offer_sub_title, users.name as'name',users.mobile as'mobile',
	offer_booking.offer_booking_status ,offer_booking.offer_booking_date  FROM	users,offer_booking,offers WHERE  offers.clinic_id='{$clinic_id}' AND users.id=offer_booking.user_id AND 
	offer_booking.offer_id =offers.offer_id and date(offer_booking_date) <= curdate()  and offer_booking_status = 1 ORDER BY offer_booking_date desc") ;
		$status = array (0 => 'في الإنتظار', 1 => 'تأكيد الموعد', 2=> 'تم الإلغاء' , 3=> 'تأكيد الحضور' , 4 => 'المريض لم يحضر'	) ; 
		$styl = array (0 => 'warning', 1 => 'success', 2=> 'danger'	, 3 => 'danger'	) ; 
		foreach ($clinic_info as $key => $value ) 
		{
		$clinic_info[$key]['offer_title'] ='
								<h2 class="table-avatar">
									<a href="images/'.$value['offer_photo'].'" data-fancybox="gallery" class="avatar avatar-sm mr-2">
										<img class="avatar-img rounded-circle" src="'.$upload_dir .'/'.$value['offer_photo'].'" >
									</a>
									<a href="offer_details/'.$key.'">'. $value['offer_title'].' <span>'.$value['offer_sub_title'].'</span></a>
								</h2>';
			$clinic_info[$key]['pateint_info'] = '<h2 class="table-avatar">
									<a href=""><b> '. $value['name'].' </b><span>'.$value['mobile'].'</span></a>
								</h2>';
			$clinic_info[$key]['offer_booking_price'] ='<span style="color:red" > '. $value['offer_booking_price'].'</span>';
			// if ($clinic_info[$key]['offer_booking_date'])
			// {
			// 	$clinic_info[$key]['offer_booking_date'] = date("Y-m-d H:m A");
			// }
			$clinic_info[$key]['offer_booking_status'] = '<span class="badge badge-pill bg-'. @$styl[$value['offer_booking_status']] .'-light"> ' .@$status[$value['offer_booking_status']] .'</span>';
			
			
			// date format 
			$day = date('d', strtotime($clinic_info[$key]['offer_booking_date']));
			$yearnum = date('Y', strtotime($clinic_info[$key]['offer_booking_date']));
                                            $month = date('M', strtotime($clinic_info[$key]['offer_booking_date']));
                                            $dayName = date('l', strtotime($clinic_info[$key]['offer_booking_date']));
                                            $am = date('A', strtotime($clinic_info[$key]['offer_booking_date']));
                                            $start_time = date('g', strtotime($clinic_info[$key]['offer_booking_date']));
											$minutes = date('i', strtotime($clinic_info[$key]['offer_booking_date']));



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

											$clinic_info[$key]['offer_booking_date'] = $dayName . " " . $day ." ". $month. " " . $yearnum . ", " . $start_time . ":".$minutes . " " . $am;
		

		}
		$trans = array (
						'offer_title' => 'عنوان العرض' , 
						'pateint_info'=>'معلومات المريض', 
						'offer_booking_price'=>' السعر',						
						'offer_booking_date' =>' تاريخ الموعد',
						
						) ; 
						//eye , times , check ,edit, trash-alt, clock
		$actions = array (
							array (
								'dir'=>'show',
								'title'=>'تأكيد الحضور',
								'icon'=>'calendar-check',
								'style'=>'success',
								'type'=> 'button'
								), 
								array (
								'dir'=>'noshow',
								'title'=>'المريض لم يحضر',
								'icon'=>'clock',
								'style'=>'danger',
								'type'=>'button'
								)
						) ; 	
						
 
		
		echo $temp->dataTable ($clinic_info ,$trans, $actions);
	?>
													</div>			
										</div>
										
										<div class="tab-pane fade" id="pat_prescriptions">										
											
													<div >
														
														
<?php
     
	$appointment=$db->data_query ($sql);

	$msg =''; 

		$clinic_info = $db->data_query ("SELECT offer_booking.offer_booking_id as'booking_id',offer_booking.offer_booking_price ,offers.offer_title , offers.offer_photo, offers.offer_sub_title, users.name,users.mobile as'mobile',
	offer_booking.offer_booking_status , offer_booking.created_at FROM users,offer_booking,offers WHERE   users.id=offer_booking.user_id
	AND offer_booking.offer_id =offers.offer_id and offer_booking_status = 0 and clinic_id = '{$clinic_id}'  ORDER BY offer_booking.created_at asc") ;
		$status = array (0 => 'في الإنتظار', 1 => 'تأكيد الموعد', 2=> 'تم الإلغاء' , 3=> 'تأكيد الحضور' , 4 => 'المريض لم يحضر'	) ; 
		$styl = array (0 => 'warning', 1 => 'success', 2=> 'danger'	, 3 => 'danger'	) ; 
		foreach ($clinic_info as $key => $value ) 
		{
			$clinic_info[$key]['offer_title'] ='
								<h2 class="table-avatar">
									<a href="'.$upload_dir .'/'.$value['offer_photo'].'" data-fancybox="gallery" class="avatar avatar-sm mr-2">
										<img class="avatar-img rounded-circle" src="'.$upload_dir .'/'.$value['offer_photo'].'" >
									</a>
									<a href="offer_details/'.$key.'">'. $value['offer_title'].' <span>'.$value['offer_sub_title'].'</span></a>
								</h2>';
			$clinic_info[$key]['pateint_info'] = '<h2 class="table-avatar">
									<a href=""><b> '. $value['name'].' </b><span>'.$value['mobile'].'</span></a>
								</h2>';
			$clinic_info[$key]['offer_booking_price'] ='<span style="color:red" > '. $value['offer_booking_price'].'</span>';
			// if ($clinic_info[$key]['created_at'])
			// {
			// 	$clinic_info[$key]['created_at'] = date("Y-m-d H:m A");
			// }
			$clinic_info[$key]['offer_booking_status'] = '<span class="badge badge-pill bg-'. @$styl[$value['offer_booking_status']] .'-light"> ' .@$status[$value['offer_booking_status']] .'</span>';
			
			
		
//date format
			$day = date('d', strtotime($clinic_info[$key]['created_at']));
			$yearnum = date('Y', strtotime($clinic_info[$key]['created_at']));
                                            $month = date('M', strtotime($clinic_info[$key]['created_at']));
                                            $dayName = date('l', strtotime($clinic_info[$key]['created_at']));
                                            $am = date('A', strtotime($clinic_info[$key]['created_at']));
                                            $start_time = date('g', strtotime($clinic_info[$key]['created_at']));


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
											$clinic_info[$key]['created_at'] = $dayName . " " . $day ." ". $month . " " . $yearnum;

		}
		$trans = array (
						'offer_title' => 'عنوان العرض' , 
						'pateint_info'=>'معلومات المريض', 
						'offer_booking_price'=>' السعر',						
						'created_at' =>' تاريخ الحجز',
						
						) ; 
						//eye , times , check ,edit, trash-alt, clock
		$actions = array (
							array (
								'dir'=>'confirm_booking',
								'title'=>'  تأكيد ',
								'icon'=>'calendar-check',
								'style'=>'success',
								'type'=> 'link'
								), 
						) ; 	
						
 

		echo $temp->dataTable ($clinic_info ,$trans, $actions);
	?>				
							
															
													</div>	
																
											
										</div>
								
									</div>
								</div>
	</div>
<?php
/*$id = $_SESSION['clinic_id']; 
	$msg =''; 
	if(isset($_POST['dis_booking']))
	{
		$ofr_id = intval($_POST['dis_offer']);
		$data = array (
						'table'=>'offer_booking' , 
						'feilds' => array (
						'offer_booking_status'	=>4			),
						'where' => array (
											'offer_booking_id' =>$ofr_id , 
											'clinic_id' => $id 
									)
						); 
		$db->db_update ($data);
		$msg= "المريض لم يحضر "; 
		echo $temp->msg($msg, 'success'); 

		
	}
		$clinic_info = $db->data_query ("SELECT offer_booking.offer_booking_id as'booking_id',offer_booking.offer_booking_price,offers.offer_title , users.name as'name',users.mobile as'mobile',
	offer_booking.offer_booking_status ,offer_booking.offer_booking_date  FROM	users,offer_booking,offers WHERE  offers.clinic_id='{$clinic_id}' AND users.id=offer_booking.user_id AND 
	offer_booking.offer_id =offers.offer_id and date(offer_booking_date) <= curdate()  and offer_booking_status = 1 ORDER BY offer_booking_date asc") ;
		$status = array (0 => 'في الإنتظار', 1 => 'تأكيد الموعد', 2=> 'تم الإلغاء' , 3=> 'تأكيد الحضور' , 4 => 'المريض لم يحضر'	) ; 
		$styl = array (0 => 'warning', 1 => 'success', 2=> 'danger'	, 3 => 'danger'	) ; 
		foreach ($clinic_info as $key => $value ) 
		{
			$clinic_info[$key]['offer_title'] = '
								<h2 class="table-avatar">
									<a href="offer_details/'.$key.'">'. $value['offer_title'].' </a>
								</h2>';
			$clinic_info[$key]['pateint_info'] = '<h2 class="table-avatar">
									<a href=""><b> '. $value['name'].' </b><span>'.$value['mobile'].'</span></a>
								</h2>';
			$clinic_info[$key]['offer_booking_price'] ='<span style="color:red" > '. $value['offer_booking_price'].'</span>';
			if ($clinic_info[$key]['offer_booking_date'])
			{
				$clinic_info[$key]['offer_booking_date'] = date("Y-m-d H:m A");
			}
			$clinic_info[$key]['offer_booking_status'] = '<span class="badge badge-pill bg-'. @$styl[$value['offer_booking_status']] .'-light"> ' .@$status[$value['offer_booking_status']] .'</span>';
		}
		$trans = array (
						'offer_title' => 'عنوان العرض' , 
						'pateint_info'=>'معلومات المريض', 
						'offer_booking_price'=>' السعر',						
						'offer_booking_date' =>' تاريخ الموعد',
						
						) ; 
						//eye , times , check ,edit, trash-alt, clock
		$actions = array (
							array (
								'dir'=>'show',
								'title'=>'تأكيد حضور المريض',
								'icon'=>'check',
								'style'=>'success',
								'type'=> 'button'
								), 
								array (
								'dir'=>'dis_booking',
								'title'=>'المريض لم يحضر',
								'icon'=>'clock',
								'style'=>'danger',
								'type'=>'button'
								)
						) ; 	
						
 
		$head ='<h3 class="table_title"> قائمة العروض</h3>';

		echo $temp->dataTable ($clinic_info ,$trans, $actions,$head);
	*/?>
	</div>



		<!-- <script src="assets/js/jquery.min.js">	</script>		
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		<script src="assets/js/circle-progress.min.js"></script>	
		<script src="assets/js/script.js"></script> -->
		
	
