<?php 
session_start();
//print_r($_SESSION) ; 
//include 'lib/core.php';
include 'lib/log.php';
include 'lib/temp.php';
include 'config/config.php';
include 'lib/sql.php';
$info = array(); 
$info ['page_title']= "Main Page";
$params = explode( "/", @$_GET['params'] );
//	print_r($params); exit;
$db = new cls_sql ($config_db); 
$log = new cls_log ($db) ; 
$temp = new cls_temp ; 
//print_r($_SESSION['userInfo']); exit; 

$log->check_login () ;
//Array ( [user_id] => 3 [username] => GOPD [fullname] => GOPD Department [position] => Head of Department [password] => Gopd@123 [type] => 2 )

//if ($log->isLogged) 
//$sql = "SELECT * FROM users  " ; 
//$users = $db->data_query ("SELECT * FROM USERS ") ; 
//$users = $db->data_query ($sql ) ; 
//print_r($users); 
/*

$data = array (
						'table' => 'evaluations',
						'where' => array ('eva_id'=>intval($id),),
						);
						
$eva_details = $db->query ($data) ;

*/
//$_SESSION['clinic_id'] = 1;

if ($log->isLogged) 
//if (true)
{
	include ('pages/layout/main.php');
}
else {
	include ('pages/layout/login.php');
}
function current_page() 
{
	$params = explode( "/", @$_GET['params'] );
	$current_page =''; 
	if(isset($params [0]))
	{
		$user = array ('dashboard', 'booking','offers','add_clinic','pending_offers','clinic_list','edit_clinic','support','ticket') ; 
		$current_page = $params [0]; 
		
		if (!in_array ($params [0], $user ))
		{
			$current_page ='dashboard';
		}

	}
	else
	{
		$current_page ='dashboard';
	}
	return $current_page;
}




?> 