<?php 
 if (!isset($temp))
 {
	 exit; 
 }

?>

<?php 
	 $ofr_id = intval($params[1]);	
	 $clinc_id =$_SESSION['userInfo']['clinic_id']; 

	$data = array (
			'table'=>'offers' , 
			
			'where' => array (
								'offer_id' =>$ofr_id , 
								'clinic_id' => $clinc_id 
						)
			); 
	$offer_details = $db->query ($data);
	if (!$offer_details)
	{
		echo $temp->msg("لا يوجد عرض بهذا الرقم", 'danger'); 
	}
	else
	{
	
		if (isset($_POST['add_offer']))
		{
			$error = ''; 
			if (@$_POST['offer_title'] =='')
			{
				$error .='<li> يجب إدخال عنوان العرض</li>';
			}
			if ($_POST['offer_end_date'] == '' )
			{
				$error .='<li> يرجى إدخال تاريخ نهاية العرض</li>';
			}
			else
			{
				$now = time(); // or your date as well
				$your_date = strtotime($_POST['offer_end_date']);
				$datediff =  $your_date - $now ;
				$days = round($datediff / (60 * 60 * 24));
				if ($days <= 29) 
				{
					$error .='<li>مدة العرض يجب أن لا تقل عن 30 يوم  </li>';
				}
			}
			if ($_POST['offer_cat_id'] == '' )
			{
				$error .='<li> يرجى إختيار أسم الصنف</li>';
			}
			if (intval($_POST['offer_price_before']) == '')
			{
				$error .='<li> يرجى إدخال السعر قبل</li>';
			}
			if (intval($_POST['offer_price_after'] )== '' )
			{
				$error .='<li>يرجى إدخال السعر بعد (سعر العرض)</li>';
			}
			if (intval($_POST['offer_price_after'] ) > intval($_POST['offer_price_before']) )
			{
				$error .='<li>يجب أن يكون سعر العرض اقل من السعر السابق</li>';
			}
			if (intval($_POST['offer_price_after']) <0)
		{
			$error .='<li>السعر بعد الخصم يجب أن يكون عددا موجباً </li>';
		}
				
				if (intval($_POST['offer_price_before']) <0)
		{
			$error .='<li> السعر قبل الخصم يجب أن يكون عددا موجباً</li>';
		}

			if ($error =='' )
			{
				$data = array (
						'table'=>'offers' , 
						'feilds' => array (
											'offer_title' => $_POST['offer_title'],
											'offer_sub_title' => $_POST['offer_sub_title'],
											'offer_end_date' => $_POST['offer_end_date'],
											'offer_old_price' => $_POST['offer_price_before'],
 											'offer_new_price' => $_POST['offer_price_after'],
											'cat_id' => $_POST['offer_cat_id'],
											'offer_description' => $_POST['offer_description'],
											'offer_details' => nl2br($_POST['offer_detials']),
											'offer_status' =>'0'
									
											),
						'where' => array (
											'offer_id' =>$ofr_id , 
											'clinic_id' => $clinc_id 
									)
						); 
				$db->db_update ($data);
				$data = array (
						'table'=>'offers' , 
						
						'where' => array (
											'offer_id' =>$ofr_id , 
											'clinic_id' => $clinc_id 
									)
						); 
				$offer_details = $db->query ($data);
				echo $temp->msg("تم التحديث بنجاح", 'success'); 

			}
			else
			{
				echo $temp->msg($error, 'danger'); 
			}
		
		}
				$sql  = "SELECT * FROM category";
				$category = $db->data_query ($sql ) ;
				$cat_options  =''; 
				foreach ($category as $key => $value ) 
				{
					$slc =''; 
					if ($offer_details[0]['cat_id'] == $key)
					{
						$slc= "selected";
					}
					$cat_options .= "<option $slc value='{$key}' >{$value['cat_name']}</option> "; 
				}
?> 


						
							<!-- Basic Information -->
							<form action="<?php echo $rout_config .'/edit_offer/' . intval($params[1]);?>" method="POST" >
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">تعديل العرض</h4>
									<h5 style="color:red">يتطلب موافقة إدارة التطبيق على التعديل ، سوف يتحول العرض الى حالة "في الإنتظار" عند التعديل</h5>
									<div class="row form-row">
										<div class="col-md-12">
											<div class="form-group">
												<div class="change-avatar">
													<div class="profile-img">
														<img src="<?php echo $upload_dir  . '/'. $offer_details[0]['offer_photo']; ?>" alt="User Image">
													</div>
													<!--
													<div class="upload-img">
													    
														<div class="change-photo-btn">
															<span><i class="fa fa-upload"></i> صورة العرض</span>
															<input type="file" name="offer_photo" class="upload">
														</div>
														<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
													</div>
													-->
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>عنوان العرض <span class="text-danger">*</span></label>
												<input type="text" name="offer_title" required value="<?php echo @$offer_details[0]['offer_title'];?>"  class="form-control">
											</div>	<div class="form-group">
												<label>العنوان الفرعي  </label>
												<input type="text" name="offer_sub_title" value="<?php echo @$offer_details[0]['offer_sub_title'];?>" class="form-control" >
											</div>
										</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>تاريخ انتهاء العرض <span class="text-danger">*</span></label>
												<input type="Date" name="offer_end_date"  value="<?php echo @$offer_details[0]['offer_end_date'];?>" class="form-control">
											</div>
										</div>
										<div class="col-md-12">
											<div class="col-md-6">
												<div class="form-group">
													<label>السعر قبل <span class="text-danger">*</span></label>
													<input type="number" name="offer_price_before" required value="<?php echo @$offer_details[0]['offer_old_price'];?>" class="form-control"> 
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>السعر بعد  <span class="text-danger">*</span></label>
													<input type="text"  name="offer_price_after" required value="<?php echo @$offer_details[0]['offer_new_price'];?>" class="form-control">
												</div>
											</div>
										</div>
										
											<div class="col-md-6">
												<div class="form-group">
													<label>تصنيف العرض</label>
													<select class="form-control select"  name="offer_cat_id">
														<?php echo $cat_options ; ?> 
													</select>
												</div>
											</div>
										<div class="col-md-8">
											<!-- <div class="form-group">
												<label>وصف العرض</label>
												<textarea class="form-control" rows="5"  name="offer_description"><?php echo @$offer_details[0]['offer_description'];?></textarea>
											</div> -->
											<div class="form-group">
												<label>تفاصيل و شروط العرض</label>
												<textarea class="form-control" rows="5"  name="offer_detials" required><?php echo preg_replace('#<br\s*/?>#i', " ", @$offer_details[0]['offer_details']);?></textarea>
											</div>
										</div>
										
									
									<div class="submit-section submit-btn-bottom">
										<button type="submit" class="btn btn-primary submit-btn" name="add_offer">تحديث العرض</button>
									</div>
								</div>
							</div>
							<!-- /Basic Information -->
						<!-- /Registrations -->
							
							
							
						
		<?php 
			} 
		?> 
					