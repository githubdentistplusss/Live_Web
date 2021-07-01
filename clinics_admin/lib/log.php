<?php

class cls_log { 

	public $isLogged = false ; 
	public $logError = '' ; 
	public $logSucc = '' ; 
	public $username = '';
	public $password = '';
	public $params = '';
	public $db = '' ; 
	
	function  __construct($db) {
		$this->params = explode( "/", @$_GET['params'] );
		$this->db = $db ; 
		if (isset($this->params[0]))
		{
			if ($this->params[0] == 'logout' )
			{
				$this->logout();
				return false;
			}
			if ($this->params[0] == 'login' )
			{
				//echo 'here';exit;
				$this->doLogin();
				return false;
			}
		}
		
		if (isset($_SESSION['username']) && isset($_SESSION['password']) && $_SESSION['username'] != '' & $_SESSION['password'] != '' )
		{
			$this->username = $_SESSION['username'];
			$this->password = $_SESSION['password'];
		}
		if ($this->username =='' || $this->password =='') 
		{
			$this->isLogged= false ; 
		}
		else{
			$this->check_login(); 
		}

	}
	function check_login () 
	{
			if(isset($_POST['btn_chng_pass']))
			{
				$this->change_pass() ; 
			}
			if ( $this->username == '' || $this->password == '')
			{
				$this->isLogged = false; 
				return ; 
			}	
				$data = array (
							'table' => 'users', 
							'where' => array ('email'=>$this->username ,
											   'admin' => '0'
											),
							);
							//password_verify($pass, $hash)
							// 'password' => hash($_POST['password'])

			$userInfo = $this->db->query ($data) ;
	//		echo $this->password ; echo '<br/>';
	//	print_r($userInfo );exit;
			//username= admin , password=123
			 if ($userInfo && ($this->password === $userInfo[0]['password']) ) 
			 {
				$_SESSION ['adminInfo'] = $userInfo[0]; 
				$_SESSION ['username'] = $userInfo[0]['email']; 
				$_SESSION['password'] = $userInfo[0]['password'];
				$_SESSION['id'] = $userInfo[0]['id'] ;
				
				$this->isLogged = true; 
				
			 }
			 else
			 {
				//$this->logError = "Incorrect username and password " ; 
				$this->isLogged = false; 

			 }
			 return $this->isLogged ;
	}
	function logout() 
	{
		$_SESSION ['username']='';
		$_SESSION ['password']='';
		$_SESSION ['adminInfo'] ='';
		$_SESSION ['id'] ='';
		unset ($_SESSION ['adminInfo']); 
		unset ($_SESSION ['username']); 
		unset ($_SESSION ['password']) ;
		unset ($_SESSION ['id']) ;
		header('Location: ./');
		return false;
	}
	function doLogin () 
	{
		 /*$this->isLogged = true; 
		 $_SESSION ['username'] = 'admin' ; 
		$_SESSION['password'] ='123123';
		header('Location: ./');
		 
		 return true;
		 */
		if ((isset ($_POST['username']) && isset($_POST['password'])) && ($_POST['username']!='' || $_POST['password']!='') ) 
		{
		//	include 'lib/sql.php';
			$data = array (
							'table' => 'users', 
							'where' => array ('email'=> $_POST['username'],
											   'admin' => '0'
											),
							);
							//password_verify($pass, $hash)
							// 'password' => hash($_POST['password'])

			$userInfo = $this->db->query ($data) ;
		//	print_r($userInfo );exit;
			//username= admin , password=123
			 if ($userInfo && password_verify($_POST['password'], $userInfo[0]['password']) ) 
			 {
				 
				$_SESSION ['adminInfo'] = $userInfo[0]; 
				$_SESSION ['username'] = $userInfo[0]['email']; 
				$_SESSION['password'] = $userInfo[0]['password'];
				$_SESSION['id'] = $userInfo[0]['id'] ;
				
				 $this->isLogged = true; 
				//header('Location: ./');
			    echo '
			            <meta http-equiv="Refresh" content="0; url=\'./\'" />
				        <center> 
				            <img src="https://www.autopricemanager.com/img/widget-loader-lg-en.gif" /> 
				        </center>
			            ';
			            exit;
				return true; 
			 }
			 else
			 {
				//$this->logError = "Incorrect username and password " ; 
				$this->logError = "اسم المستخدم أو كلمة المرور غير صحيحة " ; 
			 }
		}
		else
		{
		//	$this->logError = "Please enter username and password" ; 
			$this->logError = "يرجى إدخال إسم المستخدم وكلمة المرور" ; 
		}
	}
	function verify_login () 
	{
		
	}
	function change_pass () 
	{
		if (!@$_POST['old_pass'] || !@$_POST['new_pass'] || !@$_POST['cnfrm_new_pass'] )
		{
			$this->logError ="Please fill all fields";
			return false ;
		}
		elseif (@$_POST['old_pass'] != @$_SESSION['userInfo']['password'] )
		{
			$this->logError ="old password is not correct ";
			return false ;
		}
		elseif (@$_POST['new_pass'] != @$_POST['cnfrm_new_pass'] )
		{
			$this->logError ="Please new password and confirm new password doesn't match";
			return false ;
		}
		else
		{
			$data = array (
							'table' => 'users',
							'feilds' => array(
											'password' => $_POST['new_pass']
											),
							
							'where' => array ('user_id'=>$_SESSION['userInfo']['user_id'],
											),
							);
			$this->db->db_update ($data);
			$data = array (
						'table' => 'users',
						'where' => array ('user_id'=>$_SESSION['userInfo']['user_id'],),
						);
			$userInfo = $this->db->query ($data) ;
			
			if ($userInfo[0]['password'] == $_POST['new_pass'])
			{
				$this->password = $_POST['new_pass'];
				$this->logSucc ="Password updates successfully!"; 
			}
			else {
				$this->logError ="There's error, password didn't updated";

			}
		}
	}
	
}


?> 