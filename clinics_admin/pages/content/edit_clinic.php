<?php 
 if (!isset($temp))
 {
	 exit; 
 }

?>



<?php 
	 $clinic_id = intval($params[1]);	
	//  $clinic_id = $_SESSION['clinic_id']; 





	$data = array (
			'table'=>'clinics' , 
			
			'where' => array (
								'clinic_id' =>$clinic_id , 
								
						)
			); 
	$clinic_details = $db->query ($data);


	if (!$clinic_details)
	{
		echo $temp->msg("لا توجد عيادة بهذا الرقم", 'danger'); 
	}
	else
	{
	
		if (isset($_POST['edit_clinic']))
		{
			$error = ''; 
	
		// $img_name = 'logos/'.$_FILES["clinic_logo"]["name"]; 
		// $error .=$temp->upload_img(	$img_name, 'clinic_logo','logos/' );

		// if ($_FILES["clinic_logo"]["name"])
		// {
		// 	$img_name = time() . $_FILES["clinic_logo"]["name"]; 	
		// 		$img_name = $string = str_replace(' ', '', $img_name);	
		// 		$img_name = $string = str_replace(')', '', $img_name);	
	    //     	$img_name = $string = str_replace('(', '', $img_name);	
		
		// 		$error .=$temp->upload_img(	$img_name, 'clinic_logo','clinics/' );
		// }


		if ($_POST['clinic_name'] == '' )
		{
			$error .='<li> يرجى إدخال أسم العيادة</li>';
		}
		if ($_POST['clinic_username'] == '' )
		{
			$error .='<li> يرجى إدخال أسم المستخدم</li>';
		}
		if ($_POST['clinic_password'] == '' )
		{
			$error .='<li> يرجى إدخال كلمة المرور</li>';
		}
		if ($_POST['clinic_address'] == '' )
		{
			$error .='<li> يرجى إدخال عنوان العيادة</li>';
		}
		
		if (intval($_POST['city_id'])==0)
		{
			$error .='<li> يرجى تحديد المدينة</li>';
		}
			$img_name='';
		if (isset($_FILES["clinic_logo"]["name"]) &&  $_FILES["clinic_logo"]["name"]!='')
		{
			$img_name = time() . $_FILES["clinic_logo"]["name"]; 
			$img_name = $string = str_replace(' ', '', $img_name);
			$img_name = $string = str_replace(')', '', $img_name);
        	$img_name = $string = str_replace('(', '', $img_name);

			$error .=$temp->upload_img(	$img_name, 'clinic_logo','clinics/' );
		}
		 
		if ($error =='' )
		{
					$data = array (
						'table'=>'clinics' , 
						'feilds' => array (
											'clinic_name' => $_POST['clinic_name'],
											'clinic_username' => $_POST['clinic_username'],
											'clinic_email' => $_POST['clinic_email'],
											
											'clinic_password' => $_POST['clinic_password'],
											'clinic_phone' => $_POST['clinic_phone'],
 											'clinic_2nd_phone' => $_POST['clinic_2nd_phone'],
											'city_id' => intval($_POST['city_id']),
											'clinic_address' => $_POST['clinic_address'],
											'clinic_map_lang' => $_POST['clinic_map_lang'],
											'clinic_map_lat' => $_POST['clinic_map_lat'],
											'clinic_map_link' => $_POST['clinic_map_link'],
											'place_id' => $_POST['place_id'],
											// 'clinic_logo' => 'clinics/'.@$img_name , 
											'clinic_description' => $_POST['clinic_description']

						),

											'where' => array (
												'clinic_id' =>$clinic_id 
												
										)
						); 
						if ($img_name)
						{
						    $data['feilds']['clinic_logo'] =  'clinics/'.$img_name ;
						}
				$db->db_update ($data);
				$data = array (
					'table'=>'clinics' , 
					
					'where' => array (
										
										'clinic_id' => $clinic_id 
								)
					); 
				$clinic_details = $db->query ($data);
				echo $temp->msg("تم التحديث بنجاح", 'success'); 
				
				// unset($_POST);
		}
		else
		{
			 

			echo $temp->msg($error, 'danger'); 
		}
			
	}

	$sql  = "SELECT * FROM cities";
	$cities = $db->data_query ($sql ) ;
	$cit_options  =''; 
	foreach ($cities as $key => $value ) 
	{
		$slc =''; 
					if ($clinic_details[0]['city_id'] == $key)
					{
						$slc= "selected";
					}
		$cit_options .= "<option $slc value='{$key}' >{$value['city_name_ar']}</option> ";
		
	}

?> 


						







						 <!-- <form action="./edit_clinic" method="POST" enctype="multipart/form-data">  -->
						<form action="<?php echo $rout_config .'/edit_clinic/' . intval($params[1]);?>" method="POST" enctype="multipart/form-data" >
						
						

						<div class="col-md-7 col-lg-8 col-xl-9">
						
							<!-- Basic Information -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title"><?php
									// $status = array (0 => 'معطلة', 1 => 'نشطة') ; 
									// $stat =  @$clinic_details[0]['clinic_status'];

									// switch ($stat){
									// 	case "0":
									// 		$stat = "معطلة";
									// 		break;
									// 	case "1":
									// 		$stat = "نشطة";
									// 		break;
									// }
									
									echo " #$clinic_id " .  @$clinic_details[0]['clinic_name'];?></h4>
									<div class="row form-row">
										<div class="col-md-12">
											<div class="form-group">
												<div class="change-avatar">
													<div class="profile-img">
													<img src="<?php echo $upload_dir  . '/'. $clinic_details[0]['clinic_logo']; ?>" alt="User Image">

													</div>
													<div class="upload-img">
														<div class="change-photo-btn">
															<span><i class="fa fa-upload"></i> تعديل </span>
															<input type="file" name="clinic_logo"  id="files" class="upload">
															
														</div>
														<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														<div  id="upload-wrap">
														</div>
													</div>
												
												</div>
											</div>
										</div>
											<div class="col-md-6">
											<div class="form-group">
												<label> اسم العياده <span class="text-danger">*</span></label>
												<input type="text" name="clinic_name"  value="<?php echo @$clinic_details[0]['clinic_name'];?>"  class="form-control">
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label> اسم المستخدم <span class="text-danger">*</span></label>
												<input type="text" name="clinic_username" required value="<?php echo @$clinic_details[0]['clinic_username'];?>" class="form-control">
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label> الإيميل <span class="text-danger"></span></label>
												<input type="text" name="clinic_email" value="<?php echo @$clinic_details[0]['clinic_email'];?>" class="form-control">
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label> كلمة المرور <span class="text-danger">*</span></label>
												<input type="text" name="clinic_password" required value="<?php echo @$clinic_details[0]['clinic_password'];?>" class="form-control">
											</div>
										</div>
									
										<div class="col-md-6">
											<div class="form-group">
												<label> هاتف العيادة <span class="text-danger">*</span></label>
												<input type="text" name="clinic_phone" required value="<?php echo @$clinic_details[0]['clinic_phone'];?>" class="form-control">
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label>  هاتف ثاني <span class="text-danger"></span></label>
												<input type="text" name="clinic_2nd_phone" value="<?php echo @$clinic_details[0]['clinic_2nd_phone'];?>" class="form-control"> 
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label> المدينة </label>
												<select class="form-control select" name="city_id" >
													<?php echo $cit_options ; ?> 
												</select> 
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label> عنوان العيادة <span class="text-danger">*</span></label>
												<input type="text" name="clinic_address"  value="<?php echo @$clinic_details[0]['clinic_address'];?>" class="form-control">
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label> خط الطول <span class="text-danger"></span></label>
												<input type="text" name="clinic_map_lang"  value="<?php echo @$clinic_details[0]['clinic_map_lang'];?>" class="form-control">
											</div>
										</div>
									
										<div class="col-md-6">
											<div class="form-group">
												<label> خط العرض <span class="text-danger"></span></label>
												<input type="text" name="clinic_map_lat"  value="<?php echo @$clinic_details[0]['clinic_map_lat'];?>" class="form-control">
											</div>
										</div>
																			
										<div class="col-md-6">
											<div class="form-group">
												<label> map link <span class="text-danger"></span></label>
												<input type="text" name="clinic_map_link"  value="<?php echo @$clinic_details[0]['clinic_map_link'];?>" class="form-control">
											</div>
										</div>
									
										<div class="col-md-6">
											<div class="form-group">
												<label> place id <span class="text-danger"></span></label>
												<input type="text" name="place_id"  value="<?php echo @$clinic_details[0]['place_id'];?>" class="form-control">
											</div>
										</div>
									

										<div class="col-md-12">
											<div class="form-group">
												<label> وصف العيادة </label>
												<textarea class="form-control" rows="5"  name="clinic_description" ><?php echo @$clinic_details[0]['clinic_description'];?></textarea>


											</div>
										</div>
										
									</div>
								</div>
							</div>
							<!-- /Basic Information -->
						<!-- /Registrations -->
							
							<div class="submit-section submit-btn-bottom" style="text-align: center;">
								<button type="submit" class="btn btn-primary submit-btn" name="edit_clinic"> حفظ </button>
							</div>
							
						</div>

							

							
							
						
		<?php 
			} 
		?> 
					


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<script>
		    $(document).ready(function() {
		        
		       
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("#upload-wrap").append("<li style=\"display:inline\"><div class=\"upload-images\">" +
            "<img  src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span style=\"color:red\" class=\"remove\">مسح</span>" +
            "</div></li>");
          $(".remove").click(function(){
            $(this).parent(".upload-images").remove();
          });
          
														
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
		    
		    
		</script>
		
					
							