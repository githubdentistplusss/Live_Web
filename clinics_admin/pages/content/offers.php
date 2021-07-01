<?php 
 if (!isset($temp))
 {
	 exit; 
 }

?>
<?php 


$sql ="SELECT * from offers";

			$offers = $db->data_query ($sql);

	$msg =''; 
	if(isset($_POST['reject_offer']))
	{

		$ofr_id = intval($_POST['reject_offer']);

		if($offers[$ofr_id]['offer_status'] == 3){
			$msg = "لقد تم رفض هذا العرض من قبل";
			echo $temp->msg($msg, 'danger'); 

		}
		else{

		$data = array (
						'table'=>'offers' , 
						'feilds' => array (
						'offer_status' => 3
										),
						'where' => array (
											'offer_id' =>$ofr_id , 
									)
						); 
		$db->db_update ($data);
		$msg= "تم رفض عرض رقم #$ofr_id بنجاح "; 
		echo $temp->msg($msg, 'success'); 
		
	}
}


	if(isset($_POST['accept_offer']))
	{
		
		$ofr_id = intval($_POST['accept_offer']);

		if($offers[$ofr_id]['offer_status'] == 1){

			
				$msg = "لقد تم قبول هذا العرض من قبل";
			echo $temp->msg($msg, 'danger'); 
		
			
		}
	else{


		$data = array (
						'table'=>'offers' , 
						'feilds' => array (
						'offer_status' => 1
										),
						'where' => array (
											'offer_id' =>$ofr_id , 
									)
						); 
		$db->db_update ($data);
		$msg= "تم قبول العرض رقم #$ofr_id بنجاح "; 
		echo $temp->msg($msg, 'success'); 
		
	}

	}



$where = '' ; 

if (isset($_POST['status']))
{
    $sid= intval ($_POST['status']);
    if ($sid)
    {
        if ($sid==5)
        {
            $where = "AND offer_status='0'" ; 
        }
        else
        {
            $where = "AND offer_status='{$sid}'" ; 
        }
       
    }
    if ($_POST['end_date'])
    {
        if ($_POST['end_date']==1)
        {
            $where .= 'AND offer_end_date<=CURRENT_DATE' ; 

        }
        elseif ($_POST['end_date']==2)
        {
            $where .= 'AND offer_end_date>=CURRENT_DATE' ; 
        }
    }
}




		$offers_info = $db->data_query ("SELECT 
		offer_id, clinic_name, clinic_address, offer_title, offer_sub_title, 
		offer_end_date, offer_new_price,offer_old_price,
		offer_status, cat_name	,offer_photo, offer_view
	    FROM offers, category, clinics WHERE  offers.cat_id = category.cat_id and clinics.clinic_id = offers.clinic_id {$where} order by offers.offer_id") ;

		$status = array (0 => 'في الإنتظار', 1 => 'تم القبول', 2=> 'مرفوض'	, 3 => 'ملغي'	) ; 
		$styl = array (0 => 'warning', 1 => 'success', 2=> 'danger'	, 3 => 'danger'	) ; 
		foreach ($offers_info as $key => $value ) 
		{
			$offers_info[$key]['offer_title'] = '
								<h2 class="table-avatar">
									<a href="'.$upload_dir .'/'.$value['offer_photo'].'"  data-fancybox="gallery" class="avatar avatar-sm mr-2">
									<img class="avatar-img rounded-circle" src="'.$upload_dir .'/'.$value['offer_photo'].'" >
									</a>
									<a href="offer_details/'.$key.'">'. $value['offer_title'].' <span>'.$value['offer_sub_title'].'</span></a>
								</h2>';

			$offers_info[$key]['clinic_info'] = '

								<h2 class="table-avatar">

									<a href=""><b> '. $value['clinic_name'].' </b><span>'.$value['clinic_address'].'</span></a>

								</h2>';
			$offers_info[$key]['offer_status'] = '<span class="badge badge-pill bg-'. @$styl[$value['offer_status']] .'-light"> ' .@$status[$value['offer_status']] .'</span>';
			$offers_info[$key]['offer_discount'] ='<span style="color:red" > '.  round((($value['offer_old_price']-$value['offer_new_price'])/$value['offer_old_price']*100),0) .'% </span>';


			$day = date('d', strtotime($offers_info[$key]['offer_end_date']));
			$yearnum = date('Y', strtotime($offers_info[$key]['offer_end_date']));
			   $month = date('M', strtotime($offers_info[$key]['offer_end_date']));
			   $dayName = date('l', strtotime($offers_info[$key]['offer_end_date']));
			   $am = date('A', strtotime($offers_info[$key]['offer_end_date']));
			   $start_time = date('g', strtotime($offers_info[$key]['offer_end_date']));




			   
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




			   $offers_info[$key]['offer_end_date'] = $dayName . ", " . $day ." ". $month ." " . $yearnum;

		}
		$trans = array (
						'clinic_info' => 'معلومات العيادة' ,
						'offer_title' => 'معلومات العرض' , 
						'offer_status'=>'حالة العرض', 
						'offer_end_date'=> 'نهاية العرض' ,
						'cat_name'=>'تصنيف العرض',		
						'offer_old_price' => 'السعر السابق',				
						'offer_new_price' =>'السعر الجديد',
						'offer_discount' => 'نسبة الخصم',
						'offer_view'=> 'عدد المشاهدات'

						) ; 
						//eye , times , check ,edit, trash-alt, clock
		$actions = array (
							array (
								'dir'=>'accept_offer',
								'title'=>'قبول',
								'icon'=>'calendar-check',
								'style'=>'success',
								'type'=> 'button'
								), 
								array (
								'dir'=>'reject_offer',
								'title'=>'رفض',
								'icon'=>'clock',
								'style'=>'danger',
								'type'=>'button'
								)
						) ; 	
			
			echo '<div style="padding:5px;margin:5px;">
			<form action="./offers" name="form" method="POST"> 
			
			        الحالة: 
			        <select name="status">
			            <option value="0"> الكل </option>
			            <option value="5"> في الانتظار </option>
			            
			            <option value="1"> تم القبول </option>
			            <option value="3"> ملغي </option>
			           <option value="2">  مرفوض </option>


			        </select> 

			        تاريخ الانتهاء: 
			        <select name="end_date">
			            <option value="0">الكل </option>
			            <option value="1"> منتهي </option>
			            <option value="2"> لم ينتهي </option>
			        </select>
			        <input type="submit" name="filter"  >  
			</form>
			        </div>';		

		echo $temp->dataTable ($offers_info ,$trans, $actions);
	
?> 
	


