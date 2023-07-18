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
		
		
		if($_SESSION['relative'])
		{
			require($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['relative'].'/config/global-esdv1.php');	
		}
		else
		{
			require($_SERVER['DOCUMENT_ROOT'].'/config/global-esdv1.php');

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