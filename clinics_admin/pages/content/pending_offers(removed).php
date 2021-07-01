<?php 
 if (!isset($temp))
 {
	 exit; 
 }

?>

<?php 
	// 0 pennding , 1 approved , 2 reject , 3 expire 
	print_r($_POST);
	if(isset($_POST['approve_offer']))
	{
		$ofr_id = intval($_POST['approve_offer']);
		$data = array (
						'table'=>'offers' , 
						'feilds' => array (
						'offer_status' => 1
										),
						'where' => array (
										'offer_id' =>$ofr_id 
									)
						); 
		$db->db_update ($data);

	}
	if(isset($_POST['reject_offer']))
	{
			$ofr_id = intval($_POST['reject_offer']);
		$data = array (
						'table'=>'offers' , 
						'feilds' => array (
						'offer_status' => 2
										),
						'where' => array (
										'offer_id' =>$ofr_id 
									)
						); 
		$db->db_update ($data);
	}
	$offer_info = $db->data_query ("SELECT *FROM offers, category,clinics  WHERE offer_status='0'" ) ;
	$status = array (0 => 'pendding', 1 => 'approved', 2=> 'reject') ; 
	foreach ($offer_info as $key => $value ) 
		{
			$offer_info[$key]['offer_status'] = @$status[$value['offer_status']];
		}
	$trans = array (
	                    
						'offer_date'=> 'تاريخ العرض' ,
		'offer_details'=> 'تفاصيل العرض ' ,
		'offer_new_price'=> 'سعر العرض الجديد ' ,
		'offer_old_price'=> 'سعر العرض القديم ' ,
		'clinic_id'=> 'معرف العيادة ' ,
		'cat_id'=> 'معرف الصنف ');
	
	
	//action: approved,dis,detail
	$actions=array(
									array (
										'dir'=>'approved_offers',
										'title'=>'تأكيد العرض',
										'icon'=>'success',
										'style' => 'primary',
										'type'=>'link'
										),
										array (
										'dir'=>'reject_offers',
										'title'=>'رفض العرض ',
										'icon'=>'danger',
										'style' => 'primary',
										'type'=>'link'
										)
								); 
								$dt = $temp->DataTable($offer_info,$trans,$actions);
	echo $dt;
	
?> 
	
