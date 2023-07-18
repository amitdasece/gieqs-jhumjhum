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
		
Class DataBaseMysqlERCP {

	public $conn;

	public function __construct(){

		
		//require(__DIR__.'../../../../config/global-esd.php');
		if($_SESSION['relative'])
		{
			require($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['relative'].'/config/global-esd.php');	
		}
		else
		{
			require($_SERVER['DOCUMENT_ROOT'].'/config/global-esd.php');	

		}
		


	}
	
	public function RunQuery($q){
			
			$result = $this->conn->query($q);
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