<?php

/*
 * Author: David Tate
 * 
 
 * 
 */
//;
		
Class DataBaseMysqlPDO {

	public $conn;

	public function __construct(){
		

		
        if($_SESSION['relative'])
		{
			require($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['relative'].'/config/global-learning-pdo.php');	
		}
		else
		{
			require($_SERVER['DOCUMENT_ROOT'].'/config/global-learning-pdo.php');	

		}



        


	}
    
    public function RunQuery ($q){

        $stmt = $this->conn->prepare($q);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //$result = $stmt->fetch(PDO::FETCH_ASSOC);
        //var_dump($result);
        return $stmt;


    }


	public function prepare($q){
			
		$result = $this->conn->prepare($q);
		return $result;
		
	}
	
	

	public function TotalOfRows($table_name){

        $q = "SELECT count(*) FROM $table_name";
        $result = $this->RunQuery($q);
        //var_dump($result);
        $number_of_rows = $result->fetchColumn(); 
        //var_dump($number_of_rows);
        return $number_of_rows;
	
	}

	public function CloseMysql(){
		$this->conn = null;
	}

}

?>