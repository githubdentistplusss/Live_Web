<?php

class cls_core { 
	public $current_act =''; 
	function run () 
	{
		
		include 'lib/log.php';
		include 'lib/temp.php';
		$log = new cls_log ; 
		$temp= new cls_temp; 
		$log->check_login () ;
		$this->check_action () ;		
		
		if ($log->isLogged) 
		{
			$temp->view($this->current_act); 
		}
		else {
			$temp->view_login($this->current_act);
		}
	}
	
	function check_action () 
	{	
		include 'lib/config.php' ;
 		if (isset ($_GET['act'] )) 
		{
			foreach ($actions as $layout => $acts ) 
			{
				if (in_array($_GET['act'], $acts))
				{
					$this->current_act = $_GET['act']; 
					return true ; 
				}
			}
			$this->current_act = '' ; 
			return false;
		}
		else{
			$this->current_act = '' ; 
			return false ;
		}
	}
}


?> 