<?php 
 if (!isset($temp))
 {
	 exit; 
 }

?>
<?php 
//$2y$10$4HA9z31Otr6ht.6XOk31vOSuxf0uCNNJWo34AKegzs8WfGlXaaIQG
// 123456
	$id = $_SESSION['userInfo']['clinic_id']; 
	$msg =''; 
	if(isset($_POST['dis_offer']))
	{
		//include ('./pages/content/edit_offer.php');
		//offer status 
		// 0 = pendding
		// 1= approved 
		// 2 = reject 
		// 3 = disable/cancel /hold
		
		// Category 
		// 1 = active 
		// 0 = not active 
		
		// offer booking 
		// 0 = pendding 
		// 1 = confirm 
		// 2 = cancel 
		// 3 = show 
		// 4 = No show 
		$ofr_id = intval($_POST['dis_offer']);
		$data = array (
						'table'=>'offers' , 
						'feilds' => array (
						'offer_status' => 3
										),
						'where' => array (
											'offer_id' =>$ofr_id , 
											'clinic_id' => $id 
									)
						); 
		$db->db_update ($data);
		$msg= "تم إلغاء عرض رقم #$id بنجاح "; 
		echo $temp->msg($msg, 'success'); 

		
	}
		$clinic_info = $db->data_query ("SELECT 
											offer_id,offer_title, offer_sub_title, 
											offer_end_date, offer_new_price,offer_old_price,
											offer_status, cat_name	,offer_photo
										FROM offers, category WHERE  offers.cat_id = category.cat_id AND clinic_id={$id}
										order by offers.offer_id desc") ;
		$status = array (0 => 'في الإنتظار', 1 => 'تم القبول', 2=> 'مرفوض'	, 3 => 'ملغي'	) ; 
		$styl = array (0 => 'warning', 1 => 'success', 2=> 'danger'	, 3 => 'danger'	) ; 
		foreach ($clinic_info as $key => $value ) 
		{
			$clinic_info[$key]['offer_title'] = '
								<h2 class="table-avatar">
									<a href="images/'.$value['offer_photo'].'" data-fancybox="gallery" class="avatar avatar-sm mr-2">
										<img class="avatar-img rounded-circle" src="'. $upload_dir. '/'.$value['offer_photo'].'" >
									</a>
									<a href="offer_details/'.$key.'">'. $value['offer_title'].' <span>'.$value['offer_sub_title'].'</span></a>
								</h2>';
			$clinic_info[$key]['offer_status'] = '<span class="badge badge-pill bg-'. @$styl[$value['offer_status']] .'-light"> ' .@$status[$value['offer_status']] .'</span>';
			$clinic_info[$key]['offer_discount'] ='<span style="color:red" > '.  round((($value['offer_old_price']-$value['offer_new_price'])/$value['offer_old_price']*100),0) .'% </span>';
			
			
				$day = date('d', strtotime($clinic_info[$key]['offer_end_date']));
			$yearnum = date('Y', strtotime($clinic_info[$key]['offer_end_date']));
			   $month = date('M', strtotime($clinic_info[$key]['offer_end_date']));
			   $dayName = date('l', strtotime($clinic_info[$key]['offer_end_date']));
			//    $am = date('A', strtotime($clinic_info[$key]['offer_end_date']));
			//    $start_time = date('g', strtotime($clinic_info[$key]['offer_end_date']));




			   
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




			   $clinic_info[$key]['offer_end_date'] = $dayName . ", " . $day ." ". $month ." " . $yearnum;
			   



		}
		$trans = array (
						'offer_title' => 'عنوان العرض' , 
						'offer_status'=>'حالة العرض', 
						'offer_end_date'=> 'نهاية العرض' ,
						'cat_name'=>'تصنيف العرض',						
						'offer_new_price' =>'السعر الجديد',
						'offer_old_price' => 'السعر السابق',
						'offer_discount' => 'نسبة الخصم'
						) ; 
						//eye , times , check ,edit, trash-alt, clock
		$actions = array (
							array (
								'dir'=>'edit_offer',
								'title'=>'تعديل',
								'icon'=>'edit',
								'style'=>'success',
								'type'=> 'link'
								), 
								array (
								'dir'=>'dis_offer',
								'title'=>'إلغاء',
								'icon'=>'clock',
								'style'=>'danger',
								'type'=>'button'
								)
						) ; 	
						
 
		$head = '<div class="text-right" >		
					<a href="./add_offer" class="add-new-btn"  >إضافة عرض</a>
				</div>
				<h3 class="table_title"> قائمة العروض</h3>';

		echo $temp->dataTable ($clinic_info ,$trans, $actions,$head);
	
?>