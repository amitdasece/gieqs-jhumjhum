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
//;
		
Class DataBaseMysqlPDOEDM {

	public $conn;

	public function __construct(){
		// $host = substr($_SERVER['HTTP_HOST'], 0, 5);
		// if (in_array($host, array('local', '127.0', '192.1'))) {
		//     $local = TRUE;
		// } else {
		//     $local = FALSE;
		// }
		
		// if ($local){
        //     //echo 'hello';

            
        //     try{
        //         $this->conn = new PDO('mysql:host=localhost;port=3306;dbname=esdv1;charset=utf8','root','',array(
        //             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        //         ));
        //         //var_dump($this->conn);
        //         //echo "Connected successfully";
        //     }catch(PDOException $pe){
        //         echo $pe->getMessage();
        //     }
                
        //         //$this->conn = new mysqli("localhost", "root", "nevira1pine", "esdv1");
        //         //$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //         //var_dump($this->conn);
		// 		//if($this->conn->connect_error){
		// 		//	echo "Error connect to mysql";die;
		// 		//}
		// }else{
			
		// //	$this->conn = new mysqli("localhost", "djt", "nevira1pine", "esdv1");
		// //		if($this->conn->connect_error){
		// //			echo "Error connect to mysql";die;
		// //		}
		// try{
		// 	$this->conn = new PDO('mysql:host=localhost;port=3306;dbname=esdv2;charset=utf8','djt35','nevira1pine',array(
		// 		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		// 	));
		// 	//var_dump($this->conn);
		// 	//echo "Connected successfully";
		// }catch(PDOException $pe){
		// 	echo $pe->getMessage();
		// }
			
		// }

		//require($_SERVER['DOCUMENT_ROOT'].'/config/global-pdo-esdv1.php');
		if($_SESSION['relative'])
		{
			require($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['relative'].'/config/global-pdo-esdv1.php');	
		}
		else
		{
			require($_SERVER['DOCUMENT_ROOT'].'/config/global-pdo-esdv1.php');

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