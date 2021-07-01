<?php 
class cls_sql {
	public $db ; 
	public $where ='' ;
	public $preper_data ;
	public $method ;
	function  __construct($db) {
	
		$this->db  = new PDO("mysql:host={$db['server']};dbname={$db['db']}", "{$db['user']}", "{$db['password']}",   array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		 
	}
	/*
		- SELECT  - return data 
		- INSERT  - return id or null 
		- UPDATE  - confirmation or null 
		- DELETE  - confirmation or null 
	*/
	function db_query() 
	{
		//echo $this->db ; exit;
	}
	function fetch_data ($data) 
	{
		$db_keys = array () ; 
		foreach ($data['fields'] as $key => $field)
		{
			$db_keys [$field['dbname']]= $key ; 
		}
		return $db_keys;
	}
	function get_where ($data)  
	{
		$where = ''; 
		$preper_data = array (); 
		if ($this->method == 'GET')
		{
			foreach ($_GET as $key =>$value)
			{
				if (isset ($data['fields'][$key]))
				{
					$dbkey = $data['fields'][$key]['dbname'];
					if ($this->method =='GET')
					{
						$preper_data [":{$dbkey}"]  = "%" . $value . "%";	
						$where .= " {$dbkey} like :{$dbkey} AND"; 
					}
				}
			}
		}
		elseif ($this->method == 'PUT')
		{		
			parse_str(file_get_contents("php://input"), $_PUT);
			//foreach ( $data['primary'] as $prmValue)
			foreach ($_PUT as $key =>$value)
			{
				$dbkey = $data['fields'][$key]['dbname'];
				$preper_data [":{$dbkey}"]  =  $value ;	
				if (in_array( $key, $data['primary']))
				{
					$where .= " {$dbkey}= :{$dbkey} AND";
				}
			}
		}
		elseif ($this->method == 'DELETE')
		{		
			parse_str(file_get_contents("php://input"), $_DELETE);
			//foreach ( $data['primary'] as $prmValue)
			foreach ($_DELETE as $key =>$value)
			{
				if (in_array( $key, $data['primary']))
				{
				$dbkey = $data['fields'][$key]['dbname'];
				$preper_data [":{$dbkey}"]  =  $value ;	
				
					$where .= " {$dbkey}= :{$dbkey} AND";
				}
			}
		}
		if ($where){
			$where = substr ($where , 0 , -3);
			$where = "WHERE {$where}";
		}
		$this->where = $where; 
		$this->preper_data = $preper_data ; 
	}
	function data_query ($sql_query) 
	{
		  
		$statement = $this->db->prepare($sql_query);
		$statement->execute();
		//$result = $statement->fetchAll(PDO::FETCH_UNIQUE|PDO::FETCH_ASSOC);
		$result = $statement->fetchAll(PDO::FETCH_UNIQUE|PDO::FETCH_ASSOC);
		//fetchAll(PDO::FETCH_COLUMN
		return $result; 
		/*$i = 1; 
		foreach($result as $key => $row)
		{
			$sRow = array () ; 
			foreach ($row as $colum => $value)
			{
				if(isset($db_keys[$colum]))
				{
					$sRow[$db_keys[$colum]]= $value ;
				}
			}
			$output[] = $sRow;
			$i++;
		}*/
		
	}
	function db_PUT ($data)
	{
		parse_str(file_get_contents("php://input"), $_PUT);
		$this->get_where($data);
		$query = "UPDATE {$data['tables']} SET"; 
		foreach ($_PUT as $key => $value ) 
		{
			$dbkey = $data['fields'][$key]['dbname'];
			$query .= " $dbkey = :{$dbkey},";
		}
		$query = substr($query, 0,-1);
		$query = "{$query} {$this->where}"; 
		$statement = $this->db->prepare($query);
		$statement->execute($this->preper_data);
	}
	function db_insert ($data)
	{
		$this->preper_data =array();
 		$values = '';  
		$att = '';
		foreach ($data['feilds'] as $key => $value ) 
		{
				$values .= " :{$key},";  
				$att .= " $key,";
				$this->preper_data [":{$key}"]  =  $value ;	
		}
		$values = substr($values, 0,-1);
		$att = substr($att, 0,-1);		
		$query = "INSERT INTO {$data['table']} ($att) VALUES ($values) "; 
		$t =0 ;
		$statement = $this->db->prepare($query);
		$t = $statement->execute($this->preper_data);
		// print_r($statement->errorInfo());
		//return  $t;
		return  $this->db->lastInsertId();

	}
	function db_update ($data)
	{	
		$this->preper_data =array();
 		$values = '';  
		$att = '';
		foreach ($data['feilds'] as $key => $value ) 
		{
				//$values .= " :{$key},";  
				//$att .= " $key,";
				$att .= " {$key}= :{$key}," ; 
				$this->preper_data [":{$key}"]  =  $value ;	
		}
		$att = substr($att, 0,-1);	
//UPDATE `events` SET `treatment_id` = '1' WHERE `events`.`id` = 11;
		$where = ''; 
		foreach ($data ['where'] as $col => $value ) 
		{
			$where .= " {$col}=:{$col} AND" ;
			$this->preper_data [":{$col}"]  =  $value ;	
			
		}
		if ($where) 
		{
			$where = "WHERE {$where}";
			$where = substr($where, 0,-3);	

		}
		$t =0;
		$query = "UPDATE {$data['table']} SET $att  $where "; 
		$statement = $this->db->prepare($query);
		$statement->execute($this->preper_data);
		//print_r($statement->errorInfo()); //exit;
		return  $t;
	}
	function query ($data,$fetch ="" )
	{
		$this->preper_data =array();
		$where = ''; 
		foreach ($data ['where'] as $col => $value ) 
		{
			$where .= " {$col}=:{$col} AND" ;
			$this->preper_data [":{$col}"]  =  $value ;	
		}

		if ($where) 
		{
			$where = "WHERE {$where}";
			$where = substr($where, 0,-3);	

		}
		///print_r($this->preper_data);
		$query = "SELECT * FROM {$data['table']} $where";/// exit;
		$statement = $this->db->prepare($query);
		$statement->execute($this->preper_data);
		if( $fetch == "unq" )
		{
			$result = $statement->fetchAll(PDO::FETCH_UNIQUE|PDO::FETCH_ASSOC);
		}
		else{
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		}
		//print_r($statement->errorInfo());exit;
		return  $result;
	}
	
	function db_insert_old ($data) 
	{
		//INSERT INTO `clients` (`client_id`, `client_name`, `client_mobile`, `client_location`, `address`, `added_date`) 
		//VALUES (NULL, 'Haidar', '05400010005', '', 'Holilah ', 'current_timestamp()');
		$values = '';  
		$att = '';
		foreach ($data['fields'] as $key => $feild ) 
		{
			$values .= "'{$_POST[$key]}',";  
			$att .= "`{$feild['dbname']}`,";
		}
		$values= substr($values, 0, -1);
		$att= substr($att, 0, -1)	;	
		$sql = "INSERT INTO `{$data['tables']}` ({$att}) VALUES ({$values})"; 
		if ($this->db->query($sql)) 
		{
			$this->success () ; 
		}
		else 
		{
			$this->fail($this->db->error); 
		}
	}
	function db_DELETE ($data) 
	{
		echo 'here'; 
		$this->get_where ($data) ; 
		parse_str(file_get_contents("php://input"), $_DELETE);
		if ($this->where)
		{
			$query = "DELETE FROM {$data['tables']} {$this->where}";
			$statement = $this->db->prepare($query);
			$statement->execute($this->preper_data);
		}
	}

	function clear_post () 
	{
		if ($_POST) 
		{
			foreach ($_POST as $key => $value ) 
			{
				$_POST [$key] = $this->db->real_escape_string ($value) ; 
			}
		}
	}
	function success () 	
	{
		$msg = "Record has been added successfully" ; 
		echo  json_encode(array ('state' =>'success' , 'msg' => $msg)) ; 
		// echo "<div class='alert alert-success dark' role='alert'>{$msg}</div>";
	}
	function fail ($msg) 
	{
		$err_msg ="There's an error";
		echo  json_encode(array ('state' =>'fail' , 'msg' => "{$err_msg} .. {$msg}")) ; 
		//echo  "<div class='alert alert-warning dark' role='alert'>{$err_msg} .. {$msg}</div>";
	}
}


?>