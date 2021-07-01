<?php 
 if (!isset($temp))
 {
	 exit; 
 }

?>

<?php 
	

	$sql  = "SELECT * FROM category ORDER BY `cat_id` ASC";
	$category = $db->data_query ($sql ) ;
	$cat_options  =''; 
		 $clinc_id = $_SESSION['userInfo']['clinic_id']; 
    $cat_options .= "<optgroup label='تصنيفات الأسنان'>";
	foreach ($category as $key => $value ) 
	{
	    $slct = "";
	   if (isset($_POST['offer_cat_id']) && $_POST['offer_cat_id']== $key){
	    $slct = "selected";
	   }
	   if ($value['cat_type']==1)
		$cat_options .= "<option {$slct} value='{$key}' >{$value['cat_name']}</option> "; 
	}
	 $cat_options .= "</optgroup>";
	     $cat_options .= "<optgroup label='تصنيفات الجلدية'>";
	foreach ($category as $key => $value ) 
	{
	    $slct = "";
	   if (isset($_POST['offer_cat_id']) && $_POST['offer_cat_id']== $key){
	    $slct = "selected";
	   }
	   if ($value['cat_type']==2)
		$cat_options .= "<option {$slct} value='{$key}' >{$value['cat_name']}</option> "; 
	}
	 $cat_options .= "</optgroup>";
	if (isset($_POST['add_offer']))
	{
		$error = ''; 
		if (@$_POST['offer_title'] =='')
		{
			$error .='<li> يجب إدخال عنوان العرض</li>';
		}
		if (@$_POST['offer_title'] =='')
		{
			$error .='<li>يجب إدخال العنوان الفرعي للعرض</li>';
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
		if ($_POST['offer_cat_id'] == '' || !isset($category[$_POST['offer_cat_id']]))
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
		$img_name = 'offers/'. time() .'_' . $_FILES["offer_photo"]["name"]; 
		$error .= $temp->upload_img(	$img_name, 'offer_photo','offers/' );
	
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
											'offer_date' => date("Y-m-d H:m:s") ,
											'offer_photo' => $img_name , 
											'offer_status' => '0', 
											'clinic_id' => $clinc_id 

											)
						); 
				$db->db_insert ($data);
				echo $temp->msg("تمت الإضافة بنجاح", 'success'); 
				unset($_POST);
		}
		else
		{
			echo $temp->msg($error, 'danger'); 
		}
			
	}

    $end_date  = date('Y-m-d', strtotime("+1 months", strtotime("NOW"))); 
    if (isset($_POST['offer_end_date']))
    {
        $end_date = $_POST['offer_end_date'];
    }
?> 


						
							<!-- Basic Information -->
							<form action="./add_offer" method="POST" enctype="multipart/form-data">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">إضافة عرض</h4>
									<div class="row form-row">
										<div class="col-md-12">
											<div class="form-group">
												<div class="change-avatar">
													<div class="profile-img">
													    
															    
													<div class="upload-img">
														<div class="change-photo-btn">
															<span><i class="fa fa-upload"></i> صورة العرض</span>
															<input type="file" name="offer_photo" id="files" class="upload">
														</div>
														<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														
															<ul class="upload-wrap" id="upload-wrap">
													
													
													</ul>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>عنوان العرض <span class="text-danger">*</span></label>
												<input type="text" name="offer_title" placeholder="مثال: عروض شهر فبراير لتبيض الأسنان ، عروض اليوم الوطني لليزر " required value="<?php echo @$_POST['offer_title'];?>"  class="form-control">
											</div>	<div class="form-group">
											    
												<label>العنوان الفرعي  </label>
											<span class="text-danger">*</span>
												<input type="text" name="offer_sub_title" placeholder="كشف + فحص + تنظيف مجاناً ، العرض يشمل ثلاث جلسات ليزر كامل الجسم" value="<?php echo @$_POST['offer_sub_title'];?>" class="form-control" >
											</div>
										</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>تاريخ انتهاء العرض <span class="text-danger">*</span></label>
												<input type="Date" name="offer_end_date"  value="<?php echo @$end_date;?>" class="form-control">
											</div>
										</div>
										<div class="col-md-12">
											<div class="col-md-6">
												<div class="form-group">
													<label>السعر قبل <span class="text-danger">*</span></label>
													<input type="number" name="offer_price_before" required value="<?php echo @$_POST['offer_price_before'];?>" class="form-control"> 
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>السعر بعد  <span class="text-danger">*</span></label>
													<input type="text"  name="offer_price_after" placeholder="مثال 2590، 990، 495 ... " required value="<?php echo @$_POST['offer_price_after'];?>" class="form-control">
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
												<textarea class="form-control" rows="5"  name="offer_description"><?php echo @$_POST['offer_description'];?></textarea>
											</div> -->
											<div class="form-group">
												<label>تفاصيل و شروط العرض</label>
												<textarea class="form-control" rows="5"  name="offer_detials"placeholder="15% ظريبة القيمة المضافة للغير المواطنين" required><?php echo @$_POST['offer_detials'];?></textarea>
											</div>
										</div>
										
									</div>
								</div>
							<!-- /Basic Information -->
						<!-- /Registrations -->
							
							<div class="submit-section submit-btn-bottom">
								<button type="submit" class="btn btn-primary submit-btn" name="add_offer">إضافة العرض</button>
							</div>
							
						</div>
						
						
						
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
		
		
		
					