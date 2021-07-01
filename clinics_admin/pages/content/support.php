<?php 
 if (!isset($temp))
 {
	 exit; 
 }

?>
<?php 



		$ticket_info = $db->data_query ("SELECT * FROM tickets, clinics where tickets.clinic_id = clinics.clinic_id ") ;
		$status = array (0 => 'مفتوحة', 1 => 'مغلقة') ; 
		$styl = array (1 => 'warning', 0 => 'success') ; 
		foreach ($ticket_info as $key => $value ) 
		{

            $ticket_info[$key]['clinic_info'] ='

            <h2 class="table-avatar">

									<a href=""><b> '. $value['clinic_name'].' </b><span>'.$value['clinic_address'].'</span></a>

								</h2>';

			
			$ticket_info[$key]['clinic_info'] = '
								<h2 class="table-avatar">
								<a href="'.$upload_dir .'/'.$value['clinic_logo'].'"  data-fancybox="gallery" class="avatar avatar-sm mr-2">
								<img class="avatar-img rounded-circle" src="'.$upload_dir .'/'.$value['clinic_logo'].'" >
									</a>
									<a href="offer_details/'.$key.'">'. $value['clinic_name'].' <span>'.$value['clinic_address'].'</span></a>
								</h2>';

			
			$ticket_info[$key]['ticket_status'] = '<span class="badge badge-pill bg-'. @$styl[$value['ticket_status']] .'-light"> ' .@$status[$value['ticket_status']] .'</span>';

			$day = date('d', strtotime($ticket_info[$key]['created_at']));
			$yearnum = date('Y', strtotime($ticket_info[$key]['created_at']));
			   $month = date('M', strtotime($ticket_info[$key]['created_at']));
			   $dayName = date('l', strtotime($ticket_info[$key]['created_at']));
			    // $am = date('A', strtotime($ticket_info[$key]['created_at']));
			    // $start_time = date('g', strtotime($ticket_info[$key]['created_at']));




			   
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




			   $ticket_info[$key]['created_at'] = $dayName . ", " . $day ." ". $month ." " . $yearnum;
			   






			   

 if ($ticket_info[$key]['ticket_closed_at']){
			$day = date('d', strtotime($ticket_info[$key]['ticket_closed_at']));
			$yearnum = date('Y', strtotime($ticket_info[$key]['ticket_closed_at']));
			   $month = date('M', strtotime($ticket_info[$key]['ticket_closed_at']));
			   $dayName = date('l', strtotime($ticket_info[$key]['ticket_closed_at']));
			    // $am = date('A', strtotime($ticket_info[$key]['ticket_closed_at']));
			    // $start_time = date('g', strtotime($ticket_info[$key]['ticket_closed_at']));




			   
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




			   $ticket_info[$key]['ticket_closed_at'] = $dayName . ", " . $day ." ". $month ." " . $yearnum;
			   

 }



		}
		$trans = array (
						'ticket_title' => 'عنوان التذكرة ' , 
                        'clinic_info' => 'العيادة' , 
                        'clinic_phone' => 'الهاتف' , 
						'ticket_status'=>'حالة التذكرة', 				
						'created_at' =>'تاريخها',
						'ticket_closed_at' => 'تاريخ الاغلاق ',
						
						) ; 
						//eye , times , check ,edit, trash-alt, clock
		$actions = array (
							array (
								'dir'=>'ticket',
								'title'=>'تفاصيل',
								'icon'=>'eye',
								'style'=>'success',
								'type'=> 'link'
								), 
						) ; 	
						
 
		


		echo $temp->dataTable ($ticket_info ,$trans, $actions);

	
?>