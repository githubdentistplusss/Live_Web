<?php 

 if (!isset($temp))

 {

	 exit; 

 }



?>





<?php


// $clinic_id = intval($_SESSION['userInfo']['clinic_id']); 




// it  should be admin

	// $id = intval($_SESSION['userInfo']['id']); 
	
	if(isset($_POST['accept_offer']))
	{
		
		$ofr_id = intval($_POST['accept_offer']);

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

	



	

	

	  	

		/// Total number of offers "all clinics"	

		    $sql="SELECT count(offer_id) as 'offer' FROM offers";	

		$all_offer=$db->data_query ($sql) ;	

			

		///  Number of "active offers "all clinics"	

	    $sql="SELECT count(offer_id) as 'offer' FROM offers WHERE offer_status=1";	

		$offer=$db->data_query ($sql) ;	

			

		// Pending offers "all clinics"	

	    $sql="SELECT count(offer_id) as 'offer' FROM offers WHERE offer_status=0";	

		$offer_waiting=$db->data_query ($sql);

	
    $dir    = '../public/images/offers';
    $files1 = scandir($dir);
	

	?>
<style>
    .circle-bar > div canvas {
        width: 45px !important;
        height:45px !important;
    }
    .img-fluid {
    border-radius:50%;
    }
    
</style>
    <div class="row" >
                 

                                    <div class="card-body " style="width:19%" >

										<h3> العروض</h3>

													<div class="dash-widget dct-border-rht">

														<div class="circle-bar circle-bar1">

															<div class="circle-graph1" data-percent="75">

																<img src="assets/img/offer.png" class="img-fluid" alt="Patient">

															</div>

														</div>

														<div class="dash-widget-info">

															<h6>عدد العروض</h6>

															<h3><?php foreach($all_offer as $key =>$value){echo  $key ;}; ?></h3>

														</div>

													</div>

												

													<div class="dash-widget dct-border-rht">									

														<div class="circle-bar circle-bar2">

															<div class="circle-graph2" data-percent="65">

																<img src="assets/img/offer.png" class="img-fluid" alt="Patient">

															</div>

														</div>

														<div class="dash-widget-info">

															<h6>العروض  الفعالة</h6>

															<h3><?php foreach($offer as $key =>$value){echo  $key ;}; ?></h3>

														</div>

													</div>

													

												    <div class="dash-widget dct-border-rht">

														<div class="circle-bar circle-bar3">

															<div class="circle-graph3" data-percent="75">

																<img src="assets/img/offer.png" class="img-fluid" alt="patient">

															</div>

														</div>

														<div class="dash-widget-info">

															<h6>قيد الانتظار </h6>

															<h3><?php  foreach($offer_waiting as $key =>$value){echo  $key ;} ; ?></h3>

														</div>

													</div>

											

										

								    </div>

					

<?php



    $sql = "SELECT count(offer_booking_id) as 'total' FROM  offer_booking ";

	$appointment = $db->data_query ($sql ) ;



    $sql = "SELECT count(offer_booking_id) as 'total' FROM  offer_booking WHERE date(offer_booking_date) = curdate()";

	$appointmentD = $db->data_query ($sql ) ;



	$sql = "SELECT count(offer_booking_id) as 'total' FROM offer_booking WHERE date(offer_booking_date) >= CURDATE() and date(offer_booking_date) <= curdate() + interval 7 day";

	$appointmentW=$db->data_query ($sql) ;

	

	$sql = "SELECT count(offer_booking_id) as 'total' FROM offer_booking WHERE MONTH(offer_booking_date) = MONTH(CURRENT_DATE())";

	$appointmentM= $db->data_query ($sql ) ;

	



?>										

                                        <div class="card-body" style="width:19%">

												<h3> المواعيد</h3>

												

												<div class="dash-widget dct-border-rht">

														<div class="circle-bar circle-bar1">

															<div class="circle-graph1" data-percent="75">

																<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">

															</div>

														</div>

														<div class="dash-widget-info">

															<h6>المواعيد</h6>

															<h3><?php foreach($appointment  as $key =>$value){echo  $key ;}; ?></h3>

														</div>

													</div>

																												
                                                    <!--
													<div class="dash-widget dct-border-rht">

														<div class="circle-bar circle-bar1">

															<div class="circle-graph1" data-percent="75">

																<img src="assets/img/d1.png" class="img-fluid" alt="Patient">

															</div>

														</div>

														<div class="dash-widget-info">

															<h6>اليوم</h6>

															<h3><?php foreach($appointmentD  as $key =>$value){echo  $key ;}; ?></h3>

														</div>

													</div>
													-->

                                                

                                                   

												<!--

                                                    <div class="dash-widget dct-border-rht">

														<div class="circle-bar circle-bar2">

															<div class="circle-graph2" data-percent="75">

																<img src="assets/img/w1.png" class="img-fluid" alt="patient">

															</div>

														</div>

														<div class="dash-widget-info">

															<h6>  الاسبوع</h6>

															<h3><?php  foreach($appointmentW as $key =>$value){echo  $key ;} ; ?></h3>

														</div>

													</div>
                                                    -->
												

                                                    <div class="dash-widget dct-border-rht">

														<div class="circle-bar circle-bar3">

															<div class="circle-graph3" data-percent="75">

																<img src="assets/img/icon-01.png" class="img-fluid" alt="patient">

															</div>

														</div>

														<div class="dash-widget-info">

															<h6> الشهر</h6>

															<h3><?php  foreach($appointmentM as $key =>$value){echo  $key ;} ; ?></h3>

														</div>

													</div>

										</div>

										

<?php



    $sql = "SELECT count(offer_booking_id) as 'total' FROM offer_booking WHERE  offer_booking_status=3";

	$appointment = $db->data_query ($sql ) ;



    $sql = "SELECT count(offer_booking_id) as 'total' FROM offer_booking WHERE date(offer_booking_date) = curdate() AND offer_booking_status=3";

	$appointmentD = $db->data_query ($sql ) ;



	$sql = "SELECT count(offer_booking_id) as 'total' FROM offer_booking WHERE date(offer_booking_date) >= CURDATE() and date(offer_booking_date) <= curdate() + interval 7 day AND offer_booking_status=3";

	$appointmentW=$db->data_query ($sql) ;

	

	$sql = "SELECT count(offer_booking_id) as 'total' FROM offer_booking WHERE MONTH(offer_booking_date) = MONTH(CURRENT_DATE()) AND offer_booking_status=3";

	$appointmentM= $db->data_query ($sql ) ;

	



?>										

                                        <div class="card-body" style="width:19%">

												<h3>  المواعيد المكتملة</h3>



													<div class="dash-widget dct-border-rht">

														<div class="circle-bar circle-bar1">

															<div class="circle-graph1" data-percent="75">

																<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">

															</div>

														</div>

														<div class="dash-widget-info">

															<h6>المواعيد </h6>

															<h3><?php foreach($appointment as $key =>$value){echo  $key ;}; ?></h3>

														</div>

													</div>													

													<!--

													<div class="dash-widget dct-border-rht">

														<div class="circle-bar circle-bar1">

															<div class="circle-graph1" data-percent="75">

																<img src="assets/img/d1.png" class="img-fluid" alt="Patient">

															</div>

														</div>

														<div class="dash-widget-info">

															<h6>اليوم</h6>

															<h3><?php foreach($appointmentD  as $key =>$value){echo  $key ;}; ?></h3>

														</div>

													</div>
													-->

                                                



                                                    
                                                    <!--
                                                    <div class="dash-widget dct-border-rht">

														<div class="circle-bar circle-bar2">

															<div class="circle-graph2" data-percent="75">

																<img src="assets/img/w1.png" class="img-fluid" alt="patient">

															</div>

														</div>

														<div class="dash-widget-info">

															<h6>  الاسبوع</h6>

															<h3><?php  foreach($appointmentW as $key =>$value){echo  $key ;} ; ?></h3>

														</div>

													</div>
													-->

												

                                                    <div class="dash-widget dct-border-rht">

														<div class="circle-bar circle-bar3">

															<div class="circle-graph3" data-percent="75">

																<img src="assets/img/icon-01.png" class="img-fluid" alt="patient">

															</div>

														</div>

														<div class="dash-widget-info">

															<h6> الشهر</h6>

															<h3><?php  foreach($appointmentM as $key =>$value){echo  $key ;} ; ?></h3>

														</div>

													</div>

										</div>

																	

<?php



	// all appointments "bookings"	

		

	$sql="SELECT count(offer_booking_id) as 'total' FROM  offers natural join offer_booking natural join clinics"; 

	$all_booking=$db->data_query ($sql) ;


    $sql = "SELECT count(offer_booking_id) as 'total' FROM  offer_booking WHERE date(created_at) = curdate()";
	$bookingD = $db->data_query ($sql ) ;



	$sql = "SELECT count(offer_booking_id) as 'total' FROM offer_booking WHERE date(created_at) >= CURDATE() and date(created_at) <= curdate() + interval 7 day";

	$bookingW=$db->data_query ($sql) ;

	

	$sql = "SELECT count(offer_booking_id) as 'total' FROM offer_booking WHERE MONTH(created_at) = MONTH(CURRENT_DATE())";

	$bookingM= $db->data_query ($sql ) ;

	



?>										

                                        <div class="card-body" style="width:19%">

												<h3> الحجوزات</h3>

																												

										            <div class="dash-widget dct-border-rht">

														<div class="circle-bar circle-bar1">

															<div class="circle-graph1" data-percent="75">

																<img src="assets/img/ico4.png" class="img-fluid" alt="patient">

															</div>

														</div>

														<div class="dash-widget-info">

															<h6>عدد الحجوزات</h6>

															<h3><?php  foreach($all_booking as $key =>$value){echo  $key ;} ; ?></h3>

														</div>

										            </div>

                                                <!--

                                                    <div class="dash-widget dct-border-rht">

														<div class="circle-bar circle-bar2">

															<div class="circle-graph2" data-percent="75">

																<img src="assets/img/d1.png" class="img-fluid" alt="patient">

															</div>

														</div>

														<div class="dash-widget-info">

															<h6> حجوزات اليوم</h6>

															<h3><?php  foreach($bookingD as $key =>$value){echo  $key ;} ; ?></h3>

														</div>

													</div>   

													

												

                                                    <div class="dash-widget dct-border-rht">

														<div class="circle-bar circle-bar2">

															<div class="circle-graph2" data-percent="75">

																<img src="assets/img/w1.png" class="img-fluid" alt="patient">

															</div>

														</div>

														<div class="dash-widget-info">

															<h6> حجوزات الاسبوع</h6>

															<h3><?php  foreach($bookingW as $key =>$value){echo  $key ;} ; ?></h3>

														</div>

													</div>
-->
												

                                                    <div class="dash-widget dct-border-rht">

														<div class="circle-bar circle-bar3">

															<div class="circle-graph3" data-percent="75">

																<img src="assets/img/icon-01.png" class="img-fluid" alt="patient">

															</div>

														</div>

														<div class="dash-widget-info">

															<h6>حجوزات الشهر</h6>

															<h3><?php  foreach($bookingM as $key =>$value){echo  $key ;} ; ?></h3>

														</div>

													</div>
										</div>


<?php
//استعلام يعرض عدد العيادات
    $sql="SELECT COUNT(clinic_id) FROM clinics";
	$clinics=$db->data_query ($sql) ;
//استعلام يعرض عدد الحجوزات الملغية
	$sql="SELECT count(offer_booking_id) as 'total' FROM offer_booking WHERE offer_booking_status = 2";
	$booking_danger=$db->data_query ($sql) ;
//استعلام يعرض الارباح
    $sql="select Round(SUM(offer_booking_price*0.08),2)from offer_booking where offer_booking_status = 3";
	$earning=$db->data_query ($sql) ;
//استعلام يعرض ارباح الشهر
    $sql="select Round(SUM(offer_booking_price*0.08),2) from offer_booking where MONTH(offer_booking_date) = MONTH(CURRENT_DATE())
	AND offer_booking_status = 3";
	$earningM=$db->data_query ($sql) ;


?>

													

									<div class="card-body " style="width:19%" >

										 		<h3> العيادات</h3>



													<div class="dash-widget dct-border-rht">

														<div class="circle-bar circle-bar1">

															<div class="circle-graph1" data-percent="75">

																<img src="assets/img/ico4.png" class="img-fluid" alt="patient">

															</div>

														</div>

														<div class="dash-widget-info">

															<h6>عدد العيادات</h6>

															<h3><?php  foreach($clinics as $key =>$value){echo  $key ;} ; ?></h3>

														</div>

													</div>

													

					



													<div class="dash-widget dct-border-rht">

														<div class="circle-bar circle-bar2">

															<div class="circle-graph2" data-percent="75">

																<img src="assets/img/ico4.png" class="img-fluid" alt="patient">

															</div>

														</div>

														<div class="dash-widget-info">

															<h6>الحجوزات الملغية</h6>

															<h3><?php  foreach($booking_danger as $key =>$value){echo  $key ;} ; ?></h3>

														</div>

													</div>
													
													<div class="dash-widget dct-border-rht">

														<div class="circle-bar circle-bar3">

															<div class="circle-graph3" data-percent="75">

																<img src="assets/img/ico4.png" class="img-fluid" alt="patient">

															</div>

														</div>

														<div class="dash-widget-info">

															<h6>مجموع العمولة</h6>

															<h3><?php  foreach($earning as $key =>$value){echo  $key ;} ; ?></h3>

														</div>

													</div>
													
													<div class="dash-widget dct-border-rht">

														<div class="circle-bar circle-bar3">

															<div class="circle-graph3" data-percent="75">

																<img src="assets/img/ico4.png" class="img-fluid" alt="patient">

															</div>

														</div>

														<div class="dash-widget-info">

															<h6>عمولة الشهر</h6>

															<h3><?php  foreach($earningM as $key =>$value){echo  $key ;} ; ?></h3>

														</div>

													</div>

									</div>
									



    </div>
<!-- ===================================================== -->
    <div class="card">
        <?php 
            $sql="SELECT sum(offer_view) as 'views' FROM offers";
	$views =$db->data_query ($sql) ;
	echo "
	         <p> 
	        إجمالي عدد مشاهدات العروض: "; 
	        foreach($views as $key =>$value){echo $key;}
	        echo "
	        </p>
	";
        
        ?>
    <div class="card-body pt-0">

								

									<nav class="user-tabs ">

										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">

											<li class="nav-item">

												<a class="nav-link active" href="#pat_PendingOffers" data-toggle="tab">عروض بالانتظار</a>

											</li>

											<li class="nav-item">

												<a class="nav-link" href="#pat_booking" data-toggle="tab">  حجوزات بالإنتظار </a>

											</li>
											<li class="nav-item">

												<a class="nav-link" href="#pat_appointments" data-toggle="tab">  مواعيد بإنتظار التأكيد</a>

											</li>
											<li class="nav-item">

												<a class="nav-link" href="#pat_offer" data-toggle="tab">احصائيات العروض</a>

											</li>
											<li class="nav-item">

												<a class="nav-link" href="#pat_weekOffers" data-toggle="tab"> عروض تنتهي هذا الأسبوع</a>

											</li>											

										</ul>

									</nav>

									

		<div class="tab-content pt-0">

										

					<div id="pat_PendingOffers" class="tab-pane fade show active">
<?php
	$clinic_info = $db->data_query ("SELECT offer_id, clinic_name, clinic_address,offer_title,offer_sub_title,offer_photo,offer_status,offer_new_price,offer_old_price ,offer_end_date 
	FROM offers natural join clinics WHERE offer_status = 0 ") ;

	$status = array (0 => 'في الإنتظار', 1 => 'تم القبول', 2=> 'مرفوض'	, 3 => 'ملغي'	) ; 

	$styl = array (0 => 'warning', 1 => 'success', 2=> 'danger'	, 3 => 'danger'	) ; 



		foreach ($clinic_info as $key => $value ) 

		{

			$clinic_info[$key]['clinic_info'] = '

								<h2 class="table-avatar">

									<a href=""><b> '. $value['clinic_name'].' </b><span>'.$value['clinic_address'].'</span></a>

								</h2>';

			$clinic_info[$key]['offer_title'] ='

								<h2 class="table-avatar">

								<a href="'.$upload_dir .'/'.$value['offer_photo'].'"  data-fancybox="gallery" class="avatar avatar-sm mr-2">

										<img class="avatar-img rounded-circle" src="'.$upload_dir .'/'.$value['offer_photo'].'" >

										

									</a>

									<a href="offer_details/'.$key.'">'. $value['offer_title'].' <span>'.$value['offer_sub_title'].'</span></a>

								</h2>';

			

			$clinic_info[$key]['offer_discount'] ='<span style="color:red" > '.  round((($value['offer_old_price']-$value['offer_new_price'])/$value['offer_old_price']*100),0) .'% </span>';

									$day = date('d', strtotime($clinic_info[$key]['offer_end_date']));	

									$yearnum = date('Y', strtotime($clinic_info[$key]['offer_end_date']));	

									$month = date('M', strtotime($clinic_info[$key]['offer_end_date']));	

									$dayName = date('l', strtotime($clinic_info[$key]['offer_end_date']));	




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
	

		

			$clinic_info[$key]['offer_end_date'] = $dayName . ", " . $day ." ". $month. " " . $yearnum;

			$clinic_info[$key]['offer_status'] = '<span class="badge badge-pill bg-'. @$styl[$value['offer_status']] .'-light"> ' .@$status[$value['offer_status']] .'</span>';

		}

		$trans = array (

		    'clinic_info' => 'معلومات العيادة' ,

						'offer_title' => 'عنوان العرض' , 

						'offer_end_date' =>'  نهاية العرض',

						'offer_status'=>'حالة العرض', 

						'offer_new_price' =>'السعر الجديد',

						'offer_old_price' => 'السعر السابق',

						'offer_discount' => 'نسبة الخصم'

						) ; 

						//eye , times , check ,edit, trash-alt, clock

		

 $actions = array (

							array (

								'dir'=>'accept_offer',

								'title'=>'تاكيد',

								'icon'=>'calendar-check',

								'style'=>'success',

								'type'=>'button'

								)
						) ; 	
		echo $temp->dataTable ($clinic_info ,$trans,$actions);

	?>				
				</div>			
										

				<div class="tab-pane fade " id="pat_offer">										
<?php
	$msg =''; 
		$clinic_info = $db->data_query ("SELECT clinics.clinic_id, COUNT(DISTINCT offers.offer_id) as 'offer_id' , COUNT(offer_booking.offer_booking_id) as 'offer_booking_id'
		,clinics.clinic_name as 'clinic_name' FROM offers left join offer_booking on offers.offer_id = offer_booking.offer_id join clinics on offers.clinic_id = clinics.clinic_id 
		GROUP BY clinics.clinic_id, clinics.clinic_name") ;	

foreach ($clinic_info as $key => $value ) 

		{
			$clinic_info[$key]['clinic_name'] ='<h2 class="table-avatar">'. $value['clinic_name'].'</h2>';				

			$clinic_info[$key]['offer_id'] = '<h2 class="table-avatar">'.$value['offer_id'] .'</h2>' ;

			$clinic_info[$key]['offer_booking_id'] ='<h2 class="table-avatar">'.$value['offer_booking_id'] .'</h2>' ;

		}

		$trans = array (

						'clinic_name' => ' اسم العيادة' , 

						'offer_id'=>'عدد العروض ', 

						'offer_booking_id' =>'عدد الحجوزات '
						) ; 

						//eye , times , check ,edit, trash-alt, clock

		$actions = array () ; 	
		echo $temp->dataTable ($clinic_info ,$trans, $actions);

	?>		

			
				</div>	

										

				<div class="tab-pane fade " id="pat_booking">										
<?php
	//AND date(offer_booking_date) <= CURDATE() 
		$clinic_info = $db->data_query ("SELECT * , offer_booking.created_at as 'b_created_at' FROM offer_booking, offers, users, clinics WHERE offers.offer_id = offer_booking.offer_id AND 
		offer_booking.user_id = users.id and offers.clinic_id = clinics.clinic_id AND  offer_booking_status =0  order by date( offer_booking.created_at), time( offer_booking.created_at)");
		$status = array (0 => 'في الإنتظار', 1 => 'تأكيد الموعد', 2=> 'تم الإلغاء' , 3=> 'تأكيد الحضور' , 4 => 'المريض لم يحضر'	) ; 
		$styl = array (0 => 'warning', 1 => 'success', 2=> 'danger'	, 3 => 'danger'	) ; 
		foreach ($clinic_info as $key => $value ) 
		{

			$clinic_info[$key]['clinic_info'] = '

								<h2 class="table-avatar">

									<a href=""><b> '. $value['clinic_name'].' </b><span>'.$value['clinic_address'].'</span></a>

								</h2>';
			$clinic_info[$key]['offer_title'] ='
								<h2 class="table-avatar">
								<a href="'.$upload_dir .'/'.$value['offer_photo'].'"  data-fancybox="gallery" class="avatar avatar-sm mr-2">
								<img class="avatar-img rounded-circle" src="'.$upload_dir .'/'.$value['offer_photo'].'" >

									</a>
									<a href="offer_details/'.$key.'">'. $value['offer_title'].' <span>'.$value['offer_sub_title'].'</span></a>
								</h2>';
			$clinic_info[$key]['pateint_info'] = '<h2 class="table-avatar">
									<a href=""><b> '. $value['name'].' </b><span>'.$value['mobile'].'</span></a>
								</h2>';
			$clinic_info[$key]['offer_booking_price'] ='<span style="color:red" > '. $value['offer_booking_price'].'</span>';
			$clinic_info[$key]['offer_booking_status'] = '<span class="badge badge-pill bg-'. @$styl[$value['offer_booking_status']] .'-light"> ' .@$status[$value['offer_booking_status']] .'</span>';



				// offer_booking_date format:
					$day = date('d', strtotime($clinic_info[$key]['b_created_at']));
					$month = date('M', strtotime($clinic_info[$key]['b_created_at']));
					$dayName = date('l', strtotime($clinic_info[$key]['b_created_at']));

					$yearnum = date('Y', strtotime($clinic_info[$key]['b_created_at']));
					$am = date('A', strtotime($clinic_info[$key]['b_created_at']));
					$start_time = date('g', strtotime($clinic_info[$key]['b_created_at']));
					$minutes = date('i', strtotime($clinic_info[$key]['b_created_at']));

					$days = array("Wednesday"=>"الأربعاء", "Thursday"=>"الخميس", "Friday"=>"الجمعة");


			

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

// am - pm
switch($am){
	case "PM":
		$am = "مساءً";
	break;

	case "AM":
		$am = "صباحًا";
}


$clinic_info[$key]['offer_booking_date'] = $dayName . " " . $day ." ". $month. " ". $yearnum . ", " . $start_time . ":".$minutes . " " . $am;





		}
		$trans = array ( 
						'pateint_info'=>'معلومات المريض', 
						'offer_title' => 'عنوان العرض' , 
						'clinic_info' => 'العيادة' ,
						'offer_booking_price'=>' السعر',						
						'offer_booking_date' =>'  تاريخ الحجز',
						'offer_booking_status'=>'حالة الحجز', 
						
						) ; 
		$actions = array (
							
						) ; 	
		echo $temp->dataTable ($clinic_info ,$trans, $actions);
	?>							
				</div>	

				<div class="tab-pane fade " id="pat_appointments">										
<?php
	//AND date(offer_booking_date) <= CURDATE() 
		$clinic_info = $db->data_query ("SELECT * FROM offer_booking, offers, users, clinics WHERE offers.offer_id = offer_booking.offer_id AND 
		offer_booking.user_id = users.id and offers.clinic_id = clinics.clinic_id AND  offer_booking_status =1  order by date(offer_booking_date), time(offer_booking_date)");
		$status = array (0 => 'في الإنتظار', 1 => 'تأكيد الموعد', 2=> 'تم الإلغاء' , 3=> 'تأكيد الحضور' , 4 => 'المريض لم يحضر'	) ; 
		$styl = array (0 => 'warning', 1 => 'success', 2=> 'danger'	, 3 => 'danger'	) ; 
		foreach ($clinic_info as $key => $value ) 
		{

			$clinic_info[$key]['clinic_info'] = '

								<h2 class="table-avatar">

									<a href=""><b> '. $value['clinic_name'].' </b><span>'.$value['clinic_address'].'</span></a>

								</h2>';
			$clinic_info[$key]['offer_title'] ='
								<h2 class="table-avatar">
								<a href="'.$upload_dir .'/'.$value['offer_photo'].'"  data-fancybox="gallery" class="avatar avatar-sm mr-2">
								<img class="avatar-img rounded-circle" src="'.$upload_dir .'/'.$value['offer_photo'].'" >

									</a>
									<a href="offer_details/'.$key.'">'. $value['offer_title'].' <span>'.$value['offer_sub_title'].'</span></a>
								</h2>';
			$clinic_info[$key]['pateint_info'] = '<h2 class="table-avatar">
									<a href=""><b> '. $value['name'].' </b><span>'.$value['mobile'].'</span></a>
								</h2>';
			$clinic_info[$key]['offer_booking_price'] ='<span style="color:red" > '. $value['offer_booking_price'].'</span>';
			$clinic_info[$key]['offer_booking_status'] = '<span class="badge badge-pill bg-'. @$styl[$value['offer_booking_status']] .'-light"> ' .@$status[$value['offer_booking_status']] .'</span>';



				// offer_booking_date format:
					$day = date('d', strtotime($clinic_info[$key]['offer_booking_date']));
					$month = date('M', strtotime($clinic_info[$key]['offer_booking_date']));
					$dayName = date('l', strtotime($clinic_info[$key]['offer_booking_date']));

					$yearnum = date('Y', strtotime($clinic_info[$key]['offer_booking_date']));
					$am = date('A', strtotime($clinic_info[$key]['offer_booking_date']));
					$start_time = date('g', strtotime($clinic_info[$key]['offer_booking_date']));
					$minutes = date('i', strtotime($clinic_info[$key]['offer_booking_date']));

					$days = array("Wednesday"=>"الأربعاء", "Thursday"=>"الخميس", "Friday"=>"الجمعة");


			

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

// am - pm
switch($am){
	case "PM":
		$am = "مساءً";
	break;

	case "AM":
		$am = "صباحًا";
}


$clinic_info[$key]['offer_booking_date'] = $dayName . " " . $day ." ". $month. " ". $yearnum . ", " . $start_time . ":".$minutes . " " . $am;





		}
		$trans = array ( 
						'pateint_info'=>'معلومات المريض', 
						'offer_title' => 'عنوان العرض' , 
						'clinic_info' => 'العيادة' ,
						'offer_booking_price'=>' السعر',						
						'offer_booking_date' =>' تاريخ الموعد',
						'offer_booking_status'=>'حالة الحجز', 
						
						) ; 
		$actions = array (
							
						) ; 	
		echo $temp->dataTable ($clinic_info ,$trans, $actions);
	?>							
				</div>	



				<div class="tab-pane fade " id="pat_weekOffers">										
				
	<?php
				$clinic_info = $db->data_query ("SELECT offers.offer_id,offers.offer_title,offers.offer_sub_title, offers.offer_end_date,offers.offer_new_price,
				offers.offer_old_price, offers.offer_status, category.cat_name,offers.offer_photo, clinic_name, clinic_address FROM offers, category, clinics WHERE offers.cat_id = category.cat_id and clinics.clinic_id = offers.clinic_id and date(offers.offer_end_date) >= CURDATE() 
				and date(offers.offer_end_date) <= curdate() + interval 7 day ORDER BY date(offers.offer_end_date)") ;
		$status = array (0 => 'في الإنتظار', 1 => 'تم القبول', 2=> 'مرفوض'	, 3 => 'ملغي'	) ; 
		$styl = array (0 => 'warning', 1 => 'success', 2=> 'danger'	, 3 => 'danger'	) ; 
		foreach ($clinic_info as $key => $value ) 
		{
			$clinic_info[$key]['offer_title'] = '
								<h2 class="table-avatar">
								<a href="'.$upload_dir .'/'.$value['offer_photo'].'"  data-fancybox="gallery" class="avatar avatar-sm mr-2">
								<img class="avatar-img rounded-circle" src="'.$upload_dir .'/'.$value['offer_photo'].'" >
									</a>
									<a href="offer_details/'.$key.'">'. $value['offer_title'].' <span>'.$value['offer_sub_title'].'</span></a>
								</h2>';


			$clinic_info[$key]['clinic_info'] = '

								<h2 class="table-avatar">

									<a href=""><b> '. $value['clinic_name'].' </b><span>'.$value['clinic_address'].'</span></a>

								</h2>';
			$clinic_info[$key]['offer_status'] = '<span class="badge badge-pill bg-'. @$styl[$value['offer_status']] .'-light"> ' .@$status[$value['offer_status']] .'</span>';
			$clinic_info[$key]['offer_discount'] ='<span style="color:red" > '.  round((($value['offer_old_price']-$value['offer_new_price'])/$value['offer_old_price']*100),0) .'% </span>';






			
				// offer_end_date format:
					$day = date('d', strtotime($clinic_info[$key]['offer_end_date']));
					$month = date('M', strtotime($clinic_info[$key]['offer_end_date']));
					$dayName = date('l', strtotime($clinic_info[$key]['offer_end_date']));

					$yearnum = date('Y', strtotime($clinic_info[$key]['offer_end_date']));
					




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

	$clinic_info[$key]['offer_end_date'] = $dayName . ", " . $day ." ". $month. " " . $yearnum;


}


		
		$trans = array (
						'offer_title' => 'عنوان العرض' , 
						'clinic_info' => 'العيادة' , 
						'offer_status'=>'حالة العرض', 
						'offer_end_date'=> 'نهاية العرض' ,
						'cat_name'=>'تصنيف العرض',						
						'offer_new_price' =>'السعر الجديد',
						'offer_old_price' => 'السعر السابق',
						'offer_discount' => 'نسبة الخصم'
						) ; 
						//eye , times , check ,edit, trash-alt, clock
		$actions = array (
						) ; 	
		echo $temp->dataTable ($clinic_info ,$trans, $actions);
				?>
				
				</div>	


								

	</div>
	</div>
	</div>
