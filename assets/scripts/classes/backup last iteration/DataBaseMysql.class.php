<?php

/*
 * Author: Rafael Rocha - www.rafaelrocha.net - info@rafaelrocha.net
 * 
 * Create Date: 8-02-2018
 * 
 * Version of MYSQL_to_PHP: 1.1
 * 
 * License: LGPL 
 * 
 */
		
Class DataBaseMysql {

	public $conn;

	public function __construct(){
		$host = substr($_SERVER['HTTP_HOST'], 0, 5);
		if (in_array($host, array('local', '127.0', '192.1'))) {
			$local = TRUE;
			//echo 'local';
		} else {
			$local = FALSE;
			//echo 'not local';
		}
		
		if ($local){
				$this->conn = new mysqli("localhost", "root", "", "gieqs");
				if($this->conn->connect_error){
					echo "Error connect to mysql";die;
				}
		}else{
			
			$this->conn = new mysqli("localhost", "djt35", "nevira1pine", "gieqs");
				if($this->conn->connect_error){
					echo "Error connect to mysql";die;
				}else{

					//echo "connected to SQL";
				}
			
			
		}
	}
	
	public function RunQuery($q){
			
			$result = $this->conn->query($q);
			return $result;
			
	}

	public function prepare($q){
			
		$result = $this->conn->prepare($q) or die("Error SQL prepare->". mysql_error());;
		//var_dump($stmt);
		return $result;
		
	}
	
	public function RunQueryDebug($query_tag){
		$result = $this->conn->query($query_tag) or die("Error SQL query-> $query_tag  ". mysql_error());
		return $result;
	}
	

	public function TotalOfRows($table_name){
		$result = $this->RunQuery("Select * from $table_name");
		return $result->num_rows;
	}

	public function CloseMysql(){
		$this->conn->close();
	}

}

?>