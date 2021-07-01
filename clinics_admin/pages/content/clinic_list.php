<?php 
 if (!isset($temp))
 {
	 exit; 
 }

?>
<?php


$sql ="SELECT * from clinics";

$clinics = $db->data_query ($sql);

$msg =''; 

if(isset($_POST['disable_clinic']))
{

$clinic_id = intval($_POST['disable_clinic']);

if($clinics[$clinic_id]['clinic_status'] != 1){
$msg = "العيادة #$clinic_id معطلة بالفعل";
echo $temp->msg($msg, 'danger'); 



}
else{

$data = array (
		   'table'=>'clinics' , 
		   'feilds' => array (
		   'clinic_status' => 0
						   ),
		   'where' => array (
							   'clinic_id' =>$clinic_id , 
					   )
		   ); 
$db->db_update ($data);
$msg= "تم تعطيل العيادة رقم #$clinic_id بنجاح "; 
echo $temp->msg($msg, 'success'); 

}
}
	 


	
$clinic_info = $db->data_query ("SELECT * FROM clinics order by clinic_id ");
$clinic_views  = $db->data_query ("SELECT clinic_id, sum(offer_view) as 'views'  FROM offers GROUP BY clinic_id ");
//echo '<pre>';
//print_r($clinic_views);exit;



$status = array (0 => 'معطلة', 1 => 'نشطة', 2 => 'مرحلة التأكيد') ; 
$styl = array ( 1 => 'success', 0=> 'danger', 2=>'warning'	) ; 
	foreach ($clinic_info as $key => $value ) 
	{
	    $clinic_info[$key]['total_views'] = @$clinic_views[$key]['views'];
		$clinic_info[$key]['clinic_status'] ='<span class="badge badge-pill bg-'. @$styl[$value['clinic_status']] .'-light"> ' .@$status[$value['clinic_status']] .'</span>';
	}

											
$trans = array (
						'clinic_name' => 'اسم العياده' , 
						'clinic_status'=> 'حالة العيادة',
						'clinic_phone' => 'هاتف العيادة' , 
						'clinic_2nd_phone'=> 'هاتف العيادة الثاني' ,
						'clinic_address' => 'عنوان العيادة',
						'total_views' => 'مجموع المشاهدات'
						
						// 'clinic_email' => 'إيميل العيادة',
);
					
						
				$actions =  array(
							array (
								'dir'=>'edit_clinic',
								'title'=>'تعديل العيادة',
								'icon'=>'primary',
								'style' => 'primary',
								'type'=> 'link'
								),

								array (
									'dir'=>'disable_clinic',
									'title'=>'تعطيل العيادة',
									'icon'=>'primary',
									'style' => 'danger',
									'type'=> 'button'
									),

								); 
								
		
	 $dt = $temp->dataTable($clinic_info,$trans,$actions );
	echo $dt;


?>
