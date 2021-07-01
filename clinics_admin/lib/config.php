<?php 
date_default_timezone_set('Asia/Riyadh');
$rout_config = 'http://localhost/eva_project/'; 
/*
	$main = array (
	'Home' => '', 'icon'=> '' , 'title' => '',
	'subList' 	=> array (
						'home' => array ('title' => 'الرئيسية' , 'dir'=> 'home' , 'icon'=>''), 
						'campaign' => array ('title'=> 'الحملات' , 'dir' => 'campaign', 'icon' => '') , 
						'stat' => array ('title' => 'إحصائيات' , 'dir'=> 'stat', 'icom'=>'' ) ,
						'points' => array ('title' => 'نقاطي' , 'dir'=> 'points', 'icom'=>'' ) 
						)
					);
					*/
	$config_actions = array (
		'login'=> array ('doLogin', 'forgetPass', 'register' ),  
		'main' => array ('orders') 
		); 
	//
	$config_dept = array (
					'GOPD'=>'GOPD',
					'ADL'=>'ADL',
					'GER'=>'GER',
					'RADIO' =>'RADIO',
					'1A'=>'1A',
					'1B'=>'1B',
					'1C'=>'1C',
					'PERI'=>'PERI',
					'OR'=>'OR',
					'NICU1'=>'NICU1',
					'NICU'=>'NICU',
					'2A'=>'2A',
					'NICU'=>'NICU',
					'2B'=>'2B',
					'ICU'=>'ICU',
					'DSU'=>'DSU',
					'2A'=>'2A',
					'2C'=>'2C',
					'3A'=>'3A',
					'3B'=>'3B',
					'3C'=>'3C',
					'TMS'=>'TMS',
					'NSU'=>'NSU',
					'POPD'=>'POPD',
					'PER'=>'PER',
					'PICU'=>'PICU',
					'NICU3'=>'NICU3',
					'PSU'=>'PSU',
					'P1'=>'P1',
					'P2'=>'P2',
					'ECHO'=>'ECHO',
					'DPC'=>'DPC',
					'ERT'=>'ERT',
				); 
		$config_forms = array (
					1 => array ('code'=>'IPSG 1 ' , 'title'=> 'IDENTIFY PATIENT CORRECTLY - Audit Tool'),
					2 => array ('code'=>'IPSG 2 ' , 'title'=> 'Effective Communication- Audit Tool'),
					3 => array ('code'=>'IPSG 3 ' , 'title'=> 'IMPROVE SAFETY OF HIGH ALERT DRUGS- AUDIT TOOL'),
					4 => array ('code'=>'IPSG 4 ' , 'title'=> 'ENSURE  CORRECT PATIENT, SITE AND PROCEDURE- AUDIT TOOL'),
					5 => array ('code'=>'IPSG 5 ' , 'title'=> 'REDUCE THE RISK OF HAI- AUDIT TOOL'),
					6 => array ('code'=>'IPSG 6 ' , 'title'=> 'REDUCE THE RISK OF PATIENT HARM RESULTING FROM FALL -AUDIT TOOL'),
				);
		$config_ques_type = array (
					/*1=> 'textarea' ,*/
					1=> array ( 1 => 'Yes' , 0 => 'No'  ,'null' => 'N/A' ) /*'yes/no'*/ ,
					5=> array ( 1 => '1' , 2 => '2' , 3=> '3', 4=>'4', 5=>'5', 'null'=>'N/A' ) /*'scale of 5'*/ ,
					3=> array( 1 => '1' , 2 => '2' , 3=> '3','null'=>'N/A' ) /*'scale of 3'*/ ,
					10=> array ( 1 => '1' , 2 => '2'  ,3=> '3', 4 => '4' , 5 => '5'  ,6=> '6',
							7=> '7', 8 => '8' , 9 => '9'  ,10=> '10','null'=>'N/A' ) /*'scale of 10'*/ ,
					);
				//	$choice = array ( 1 => 'Yes' , 0 => 'No'  ,'null' => 'N/A' ); 

#	form_id	dept	score	status	eva_date				
	$config_lang = array (
					'eva_id'=> 'id' , 
					'form_id'=> 'Form' , 
					'dept'=> 'Department' , 
					'score'=> 'Score' , 
					'status'=> 'Status' , 
					'eva_date'=> 'Date' 
				);
	$db = array (); 
	$db['server']= 'localhost'; 
	$db['user']= 'root'; 
	$db['password']= '' ; 
	$db['db']= 'db' ;
//IPSG 1 - IDENTIFY PATIENT CORRECTLY - Audit Tool
//IPSG 2 - Effective Communication- Audit Tool
//IPSG 3 - IMPROVE SAFETY OF HIGH ALERT DRUGS- AUDIT TOOL	
//IPSG 4 - ENSURE  CORRECT PATIENT, SITE AND PROCEDURE- AUDIT TOOL					
//IPSG 5 - REDUCE THE RISK OF HAI- AUDIT TOOL
//IPSG 6 - REDUCE THE RISK OF PATIENT HARM RESULTING FROM FALL -AUDIT TOOL

//GOPD 			ADL			GER			RADIO			1A			1B			1C			PERI			OR			NICU1			NICU 2A			NICU 2B			ICU			DSU			2A			2C			3A			3B			3C			TMS			NSU			POPD			PER			PICU			NICU3			PSU			P1			P2			ECHO			DPC			ERT		
//GOPD 			ADL			GER 		RADIO			1A			1B			1C			PERI			OR			NICU1			NICU 2A			NICU 2B			ICU			DSU			2A			2C			3A			3B			3C			TMS			NSU			POPD			PER			PICU			NICU3			PSU			P1			P2			ECHO			DPC			ERT		
//GOPD 			ADL			GER			RADIO			1A			1B			1C			PERI			OR			NICU1			NICU 2A			NICU 2B			ICU			DSU			2A			2C			3A			3B			3C			TMS			NSU			POPD			PER			PICU			NICU3			PSU			P1			P2			ECHO			DPC			ERT		
																																																																																																																																																																																																																																																																																				
?> 
