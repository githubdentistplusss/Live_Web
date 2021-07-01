<?php

class cls_temp { 
public $page_content ; 
public $menu_list ; 

public $sql ; 
	
	function  __construct() {
		$this->setMenu () ; 
	}

	function setMenu () 
	{
		include 'config/config.php' ; 
		$menu =array();
		$this->menu_list ='';
		$user_menu = array (
							'Home' => array ('icon'=>'fe-home' ,'title'=>'Dashboard','dir'=> $rout_config.'dashboard' , 'subList'=>'') ,  
							'Evaluations' => array ('icon'=>'fe-layout' ,'title'=>'Evaluations','dir'=> $rout_config.'evaluations' , 'subList'=>'') ,  
							'Add_evaluation' => array ('icon'=>'fe-document' ,'title'=>'Add Evaluation','dir'=>$rout_config.'add_evalution' , 'subList'=>'') ,  
							'My_Profile' => array ('icon'=>'fe-user-plus' ,'title'=>'My Profile','dir'=>$rout_config.'profile' , 'subList'=>'') ,  
							);
		$admin_menu = $user_menu  ; 
		$admin_menu['users'] = array ('icon'=>'fe-user-plus' ,'title'=>'Users','dir'=> $rout_config.'users' , 'subList'=>'') ;  
  
		$dept_menu = array (
							'Home' => array ('icon'=>'fe-home' ,'title'=>'Dashboard','dir'=> $rout_config.'ddashboard' , 'subList'=>'') ,  
							'My_Profile' => array ('icon'=>'fe-home' ,'title'=>'My Profile','dir'=> $rout_config.'profile' , 'subList'=>'') ,  
							);
		if (@$_SESSION['userInfo']['type'] == 0 )
		{
			$menu = $user_menu; 
		}
		if (@$_SESSION['userInfo']['type'] == 1 )
		{
			$menu = $admin_menu; 
		}
		if (@$_SESSION['userInfo']['type'] == 2 )
		{
			$menu = $dept_menu; 
		}
		foreach ($menu  as $key => $value ) 
		{
			
		 $this->menu_list .= "<li class=''> 
								<a href='{$value['dir']}'><i class='fe {$value['icon']}'></i> <span>{$value['title']}</span></a>
							</li>";
		}
		//echo $current_act ; exit;
			
	}
	
	function dataTable ($data, $trans, $actions,$head='') 
	{
		$params = explode( "/", @$_GET['params'] );

		$this->page_content = '<div class="card card-table mb-0">
								<div class="card-body">
									'.$head.'
									<div class="table-responsive">
									<form action="./'.$params[0].'" method="POST">
										<table class="table table-hover table-center mb-0">
											<thead>'; 
		foreach ($data as $value )
		{
			$this->page_content .= "<th>#</th>"; 
			foreach ($trans as $col => $dta)
			{  
				$this->page_content .= "<th>{$dta}</th>";	
			}
			break; 
		}
		$this->page_content .= '<th class="text-center">  </th>
								</tr>
								</thead> 
								<tbody>';
		foreach ($data as $id=>$value )
		{
			$this->page_content .= "<tr> <td>{$id}</td>";
			foreach ($trans as $col => $dta)
			{
				$this->page_content .= "<td>{$value[$col]} </td>"; 
			}
			$this->page_content .=
				"<td class='text-right'>
					<div class='table-action'>";
			foreach ($actions as $act ) 
			{
				if(isset($act['type']) && $act['type']=='button')
				{
					$this->page_content .= '<button style="margin-left: 3px;" value='.$id.' name="' . $act['dir'] .'" class="btn btn-sm bg-'. $act['style'] .'-light">
												<i class="far fa-'.$act['icon'].'"></i> '. $act['title'] .'
											</button> ';
				}
				else
				{
				$this->page_content .= "<a style='margin-left: 3px;' href='{$act['dir']}/{$id}' class='btn btn-sm bg-{$act['style']}-light'>
										<i class='far fa-{$act['icon']}'></i> {$act['title']}
									</a>";
				}
				/*
				if ($act['delete'] =='Yes' ) 
				{
					$this->page_content .= "<a href='{$act['dir']}/{$id}' class='btn btn-sm bg-danger-light'>
											<i class='fe fe-pencil'></i> {$act['title']}
										</a>";
				}
				else
				{
					$this->page_content .= "<a href='{$act['dir']}/{$id}' class='btn btn-sm bg-success-light mr-2'>
											<i class='fe fe-pencil'></i> {$act['title']}
										</a>";
				}
				*/				
			}
						

			$this->page_content .="</div>
				</td>";
			$this->page_content .= '</tr>';
		}	
		$this->page_content .= '
			</tbody>
		</table>	
		</form>
	</div>
  </div>
</div>';
		return $this->page_content ;	
		
	}
	function msg ($msg , $type='', $bol = true)
	{
		if ($msg || $bol)
		{
			$types = array ('primary','secondary','warning','danger','success','info','light','dark');
			if (in_array($type, $types ))
			{
				return '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">
									'. $msg .'
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>';						
			}
			else
			{
				return '<div class="alert alert-primary alert-dismissible fade show" role="alert">
								'. $msg .'
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>';
			}
		}
	}
	function setDataTable ($data,$actions) 
	{
		include 'lib/config.php'; 
		$this->page_content = '<table id="table1" class="table table-stripped">
									<thead>
										<tr>'; 
		foreach ($data as $value )
		{
			$this->page_content .= "<th>#</th>"; 
			foreach ($value as $col => $dta)
			{
				if (isset($config_lang [$col]))
				{
					$this->page_content .= "<th>{$config_lang [$col]}</th>"; 
				}
				else
				{
					$this->page_content .= "<th>{$col}</th>"; 
				}
			}
			break; 
		}
		$this->page_content .= '<th> Actions </th>
								</tr>
								</thead> 
								<tbody>';
		foreach ($data as $id=>$value )
		{
			$this->page_content .= "<tr> <td>{$id}</td>";
			foreach ($value as $col => $dta)
			{
				$this->page_content .= "<td>{$dta} </td>"; 
			}
			$this->page_content .=
				"<td class=t'ext-right'>
					<div class='actions'>";
			foreach ($actions as $act ) 
			{
				if ($act['delete'] =='Yes' ) 
				{
					$this->page_content .= "<a href='{$act['dir']}/{$id}' class='btn btn-sm bg-danger-light'>
											<i class='fe fe-pencil'></i> {$act['title']}
										</a>";
				}
				else
				{
					$this->page_content .= "<a href='{$act['dir']}/{$id}' class='btn btn-sm bg-success-light mr-2'>
											<i class='fe fe-pencil'></i> {$act['title']}
										</a>";
				}						
			}
						

			$this->page_content .="</div>
				</td>";
			$this->page_content .= '</tr>';
		}	
		$this->page_content .= '</tbody></table>';
		return $this->page_content ;	

/*
<a href="view_eva.html" class="btn btn-sm bg-success-light mr-2">
							<i class="fe fe-pencil"></i> View
						</a>
						<a data-toggle="modal" href="#edit_invoice_report" class="btn btn-sm bg-success-light mr-2">
							<i class="fe fe-pencil"></i> Edit
						</a>
						<a class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal">
							<i class="fe fe-trash"></i> Delete
						</a>
*/		
	}
	function upload_img($img_name, $postname='file',$path='' )
	{
		$error_msg =''; 
		 $target_dir = "../public/images/{$path}";
		$target_file = $target_dir . basename($img_name);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		
		  $check = getimagesize($_FILES[$postname]["tmp_name"]);
		  if($check !== false) {
			//$error_msg .= "<br/>File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		  } else {
			$error_msg .= "<br/>File is not an image.";
			$uploadOk = 0;
		  }
		// Check if file already exists
		if (file_exists($target_file)) {
		  $error_msg .= "<br/>Sorry, file already exists.";
		  $uploadOk = 0;
		}

		// Check file size
		if ($_FILES[$postname]["size"] > 2000000) {
		  $error_msg .= "<br/>Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  $error_msg .= "<br/>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			return $error_msg .= "<br/>Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
				} else {
				  if (move_uploaded_file($_FILES[$postname]["tmp_name"], $target_file)) {
					//return "The file ". htmlspecialchars( basename( $_FILES[$postname]["name"])). " has been uploaded.";
					return false;
				  } else {
					return $error_msg .= "<br/>Sorry, there was an error uploading your file. <Br/> 	$target_file";
				  }
			}	
	}
	
}



?> 