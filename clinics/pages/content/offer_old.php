<?php 
	if (!isset($temp))
	{
		exit; 
	}

?>

<?php 

 
$id =$_SESSION['userInfo']['clinic_id'];
if(isset($_POST['btn_submit']))
{
	$data = array (
				'table' => 'clinics',
				'feilds' =>  array ( 
									'clinic_phone' => $_POST['phone'],
									'clinic_2nd_phone' => $_POST['2nd_phone'] ,
									'clinic_address' =>  $_POST['address'] ,
									'clinic_description' =>  $_POST['description'] ,
									), 
				'where' => array ( 'clinic_id' => $id ) 
				);
	$uid = $db->db_update ($data) ;
}

$sql = "SELECT * FROM `clinics` WHERE clinic_id='{$id}' " ; 
$clinic_info = $db->data_query ($sql ) ;
/*
Array ( [1] => Array ( [clinic_name] => عيادة رام الطبي -فرع البحيرة [clinic_phone] => 054001000 
[clinic_2nd_phone] => 01354444 
[clinic_description] => عيادات رام مخصصة في الرعاية الطبية ونوفر خدمات ذات جودة عالية تحت سقف واحد بأحدث التقنيات المتقدمة في جميع التخصصات ( أسنان – جلدية – طبي ). 
[city_id] => 9 [clinic_address] => الدمام - حي البحيرة - شارع الخليج [clinic_map_location] => 26.4685133,50.0560048 [clinic_logo] => ram_logo.png ) )
*/

//print_r($clinic_info);exit;
?> 
<div class="col-md-7 col-lg-8 col-xl-9">

	<!-- Basic Information -->
	<div class="card">
		<div class="card-body">
			<form action="./info" method="POST" > 
			<h4 class="card-title">معلومات المنشأة</h4>
			<div class="row form-row">
				<div class="col-md-12">
					<div class="form-group">
						<div class="change-avatar">
							<div class="profile-img">
								<img src="images/<?php echo $clinic_info[$id]['clinic_logo'];?>" alt="User Image">
							</div>
							<div class="upload-img">
								<div class="change-photo-btn">
									<span><i class="fa fa-upload"></i> شعار العيادة</span>
									<input type="file" class="upload">
								</div>
								<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>أسم العيادة <span class="text-danger">*</span></label>
						<input type="text" class="form-control" readonly="" value="<?php echo $clinic_info[$id]['clinic_name'];?>">
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<!--
						<label>Email <span class="text-danger">*</span></label>
						<input type="email" class="form-control" readonly="">
						-->
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<label>رقم الهاتف \ الجوال (1)<span class="text-danger">*</span></label>
						<input type="text" class="form-control" required name="phone" value="<?php echo $clinic_info[$id]['clinic_phone'];?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>رقم الجوال (للأشعارات و التنبيهات)<span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="2nd_phone" value="<?php echo $clinic_info[$id]['clinic_2nd_phone'];?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>العنوان</label>
						<input type="text" class="form-control" required  name="address" value="<?php echo $clinic_info[$id]['clinic_address'];?>">
					</div>
				</div>
				<!--
				<div class="col-md-6">
					<div class="form-group">
						<label>المدينة</label>
						<select class="form-control select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
							<option data-select2-id="3">Select</option>
							<option>Male</option>
							<option>Female</option>
						</select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-6rw8-container"><span class="select2-selection__rendered" id="select2-6rw8-container" role="textbox" aria-readonly="true" title="Select">Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
					</div>
				</div>
				-->
				
			</div>
		</div>
	</div>
	<!-- /Basic Information -->
	
	<!-- About Me -->
	<div class="card">
		<div class="card-body">
			<div class="form-group mb-0">
				<label>وصف العيادة</label>
				<textarea class="form-control" required rows="5" name="description"><?php echo $clinic_info[$id]['clinic_description'];?></textarea>
			</div>
		</div>
	</div>
	<!-- /About Me -->
	
	<div class="submit-section submit-btn-bottom">
		<button type="submit" class="btn btn-primary submit-btn" name="btn_submit">حفــظ</button>
	</div>
	
</div>