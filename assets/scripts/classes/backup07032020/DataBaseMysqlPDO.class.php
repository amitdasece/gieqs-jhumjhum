<?php

/*
 * Author: David Tate  - www.endoscopy.wiki 
 * 
 * Create Date: 27-12-2019
 * 
 * DJT 2019
 * 
 * License: LGPL 
 * 
 */
		
Class DataBaseMysqlPDO {

	public $conn;

	public function __construct(){
		
		//require BASE_URI . '/global-pdo.php';
		
		$host = substr($_SERVER['HTTP_HOST'], 0, 5);
		if (in_array($host, array('local', '127.0', '192.1'))) {
		    $local = TRUE;
		} else {
		    $local = FALSE;
		}

		if ($local){
			try{

				//edit local database name, password and port here
				$this->conn = new PDO('mysql:host=localhost;port=3306;dbname=gieqs;charset=utf8','root','',array(
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				));
			}catch(PDOException $pe){
				echo $pe->getMessage();
				die;
            }

		} else {
			try{

				//edit remote database name, password and port here
				$this->conn = new PDO('mysql:host=localhost;port=3306;dbname=gieqs;charset=utf8','djt35','nevira1pine',array(
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				));
			}catch(PDOException $pe){
				echo $pe->getMessage();
				die;
            }

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