<?php 
 if (!isset($temp))
 {
	 exit; 
 }

?>

<?php
		$clinc_id = intval($_SESSION['userInfo']['clinic_id']); 
		$sql ="SELECT *, offer_booking.created_at FROM offer_booking, offers, users
				WHERE 
					offers.offer_id = offer_booking.offer_id 
					AND offers.clinic_id='{$clinc_id}'
					AND offer_booking.user_id = users.id
					order by offer_booking_id desc";
		$bookings = $db->data_query ($sql);
		// offer booking 
		// 0 = pendding 
		// 1 = confirm 
		// 2 = cancel 
		// 3 = show 
		// 4 = No show 
		$status = array (0 => 'في الإنتظار', 1 => 'تأكيد الموعد', 2=> 'تم الإلغاء' , 3=> 'تأكيد الحضور' , 4 => 'المريض لم يحضر'	) ; 
		$styl = array (0 => 'warning', 1 => 'success', 2=> 'danger'	, 3 => 'primary', 4 => 'danger'	) ;  
		foreach ($bookings as $key => $value ) 
		{
			$bookings[$key]['pateint_info'] = '
								<h2 class="table-avatar">
									<a href=""><b> '. $value['name'].' </b><span>'.$value['mobile'].'</span></a>
								</h2>';
			$bookings[$key]['offer_booking_status'] = '<span class="badge badge-pill bg-'. @$styl[$value['offer_booking_status']] .'-light"> ' .@$status[$value['offer_booking_status']] .'</span>';
 	    	if ($bookings[$key]['offer_booking_date'])
			{
				// $bookings[$key]['offer_booking_date'] = date("Y-m-d H:i", strtotime($bookings[$key]['offer_booking_date']));


				$day = date('d', strtotime($bookings[$key]['offer_booking_date']));
                                            $month = date('M', strtotime($bookings[$key]['offer_booking_date']));
                                            $dayName = date('l', strtotime($bookings[$key]['offer_booking_date']));

											$yearnum = date('Y', strtotime($bookings[$key]['offer_booking_date']));
                                            $am = date('A', strtotime($bookings[$key]['offer_booking_date']));
                                            $start_time = date('g', strtotime($bookings[$key]['offer_booking_date']));
											$minutes = date('i', strtotime($bookings[$key]['offer_booking_date']));

											$days = array("Wednesday"=>"الأربعاء", "Thursday"=>"الخميس", "Friday"=>"الجمعة");



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



											$bookings[$key]['offer_booking_date'] = $dayName . " " . $day ." ". $month. " ". $yearnum . ", " . $start_time . ":".$minutes . " " . $am;


			}

			// $bookings[$key]['created_at'] = date("Y-m-d", strtotime($bookings[$key]['created_at']));


			// foreach ($offers as $i => $offer)
                                       
                                          $day = date('d', strtotime($bookings[$key]['created_at']));
										 $yearnum = date('Y', strtotime($bookings[$key]['created_at']));
                                            $month = date('M', strtotime($bookings[$key]['created_at']));
                                            $dayName = date('l', strtotime($bookings[$key]['created_at']));
                                            $am = date('A', strtotime($bookings[$key]['created_at']));
                                            $start_time = date('g', strtotime($bookings[$key]['created_at']));




											
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




											$bookings[$key]['created_at'] = $dayName . ", " . $day ." ". $month ." " . $yearnum;
                                            


		}
		$trans = array (
						'pateint_info' => 'معلومات المريض' , 
						'offer_title'=>' اسم العرض' , 
						'offer_booking_price' =>' السعر ',
						'created_at'=> 'تاريخ الحجز ' ,
						'offer_booking_status'=>' حالة الحجز',						
						'offer_booking_date' => 'موعد الحجز',
 						) ; 
						//eye , times , check ,edit, trash-alt, clock
		$actions = array () ; 	
						
 
		$head = '<Br/>
				<h3 class="table_title"> قائمة الحجوزات</h3>';

		echo $temp->dataTable ($bookings ,$trans, $actions,$head);


?>