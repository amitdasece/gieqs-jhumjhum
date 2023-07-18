<?php

/*
 * Author: David Tate
 * 
 * Create Date: 8-02-2018
 * 
 * Version of MYSQL_to_PHP: 1.1
 * 
 * License: LGPL 
 * 
 */
		
Class DataBaseMysqlLearning {

	public $conn;

	public function __construct(){
		
		
		if($_SESSION['relative'])
		{
			require($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['relative'].'/config/global-learning.php');	
		}
		else
		{
			require($_SERVER['DOCUMENT_ROOT'].'/config/global-learning.php');	

		}
		//require($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['relative'].'/../config/global-learning.php');
	}
	
	public function RunQuery($q){
			
			$result = $this->conn->query($q);
			return $result;
			
	}

	public function escapeString($str){

		$result = $this->con->real_escape_string($str);
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