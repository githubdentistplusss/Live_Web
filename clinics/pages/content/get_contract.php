<?php
header("Content-type:application/pdf");
header("Content-Disposition:attachment;filename='screen-shot.pdf'");
	if (!isset($temp))
	{
		exit; 
	}

?>

<!DOCTYPE html> 
<html lang="ar">
<head>
		<meta charset="utf-8">
		<title>عقد العيادات الخاصة</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
</head>
<body>
<?php 

	$id = $_SESSION['userInfo']['clinic_id'];

	
	$sql = "SELECT * FROM `contracts` WHERE clinic_id='{$id}' " ; 
	$clinic_info = $db->data_query ($sql ) ;

	if ($clinic_info)
	{
		$id = 1;
		foreach($clinic_info as $k => $v)
		{
		    $id = $k; break;
		}
		include  "./terms.php";
	}
	
?> 
</body>
</html>
