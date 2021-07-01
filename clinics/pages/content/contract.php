<?php 
	if (!isset($temp))
	{
		exit; 
	}

?>

<?php 

	 
	$id = $_SESSION['userInfo']['clinic_id'];
	if(isset($_POST['btn_submit']))
	{
	//	echo '<pre>';
	//	print_r($_POST);exit;
		/*
		$folderPath = "contracts/";
		$image_parts = explode(";base64,", $_POST['signed']);
		$image_type_aux = explode("image/", $image_parts[0]);
		$image_type = $image_type_aux[1];
		$image_base64 = base64_decode($image_parts[1]);
		$file = $folderPath . uniqid() . '.'.$image_type;
		file_put_contents($file, $image_base64);
		*/
		$data = array (
					'table' => 'contracts',
					'feilds' =>  array ( 
										'clinic_id' => $id,
										'cr_title' => $_POST['cr_title'] ,
										'cr_number' =>  $_POST['cr_number'] ,
										'cr_date' =>  $_POST['cr_date'] ,
										'cr_city' =>  $_POST['cr_city'] ,
										'cr_signer_name' =>  $_POST['cr_signer_name'] ,
										'cr_signer_designation' =>  $_POST['cr_signer_designation'] ,
										'signature' =>  $_POST['signed'] ,
										), 
					);
		$uid = $db->db_insert ($data) ;
		echo $temp->msg("تم توثيق العقد بنجاح", 'success');

		
	}
	
		$sql = "SELECT * FROM `contracts` WHERE clinic_id='{$id}' " ; 
		$clinic_info = $db->data_query ($sql ) ;
	//	echo '<pre>';	print_r(	$clinic_info);
		if ($clinic_info)
		{
			$id = 1;
			foreach($clinic_info as $k => $v)
			{
			    $id = $k; break;
			}
			include  "./terms.php";
	
?> 
	
		

<?php
		}
	else
	{
?>
	
<div class="col-12">

	<!-- Basic Information -->
	<div class="card">
		<div class="card-body">
		<iframe src="<?php echo $rout_config; ?>/terms.html" width="100%" height="300px;" title="W3Schools Free Online Web Tutorials">
		
		</iframe>
		</div>
	<!-- /Basic Information -->
	
	<!-- About Me -->
	<div class="card">
		<div class="card-body">
			<form action="./contract" method="POST" > 
			<h4 class="card-title">معلومات المنشأة</h4>
			<div class="row form-row">
				<div class="col-md-6">
					<div class="form-group">
						<label>أسم العيادة (مطابق للسجل التجاري)<span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="cr_title" value="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>رقم السجل التجاري<span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="cr_number" value="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>المركز الرئيسي (حسب السجل التجاري)<span class="text-danger">*</span></label>
						<input type="text" class="form-control" required  name="cr_city" value="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>تاريخ السجل التجاري <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required  name="cr_date" value="">
					</div>
				</div>				
			</div>
			<hr/>
			<div class="row form-row">
				<div class="col-md-6">
					<div class="form-group">
						<label>ممثل العيادة <span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="cr_signer_name" value="">
					</div>
					<div class="form-group">
						<label>صفته <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="cr_signer_designation" value="">
					</div>
				</div>
				<div class="col-md-6">
					<div> 
							<label class="" for="">  التوقيع:</label> <span class="text-danger">*</span
							<br/>

							<div id="sig" ></div>

							<br/>

							<button id="clear">مسح التوقيع</button>

							<textarea id="signature64" name="signed" required style="display: none"></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="submit-section submit-btn-bottom">
			<button type="submit" class="btn btn-primary submit-btn" name="btn_submit">حفــظ</button>
		</div>
		</form>

	</div>
	<!-- /About Me -->
</div>
	<?php
	}
	?>