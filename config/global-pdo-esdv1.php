<?php
$host = substr($_SERVER['HTTP_HOST'], 0, 5);

include "global-config.php";

if ($host_list) {
    $local = TRUE;
} else {
    $local = FALSE;
}

if ($local){
    //echo 'hello';

    
    try{
        $this->conn = new PDO('mysql:host='.$host_name.';port='.$port.';dbname='.$esdv_db_name.';charset=utf8',$esdv_db_username,$esdv_db_password,array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ));
        //var_dump($this->conn);
        //echo "Connected successfully";
    }catch(PDOException $pe){
        echo $pe->getMessage();
    }
        
        //$this->conn = new mysqli("localhost", "root", "nevira1pine", "esdv1");
        //$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //var_dump($this->conn);
        //if($this->conn->connect_error){
        //	echo "Error connect to mysql";die;
        //}
}else{
    
//	$this->conn = new mysqli("localhost", "djt", "nevira1pine", "esdv1");
//		if($this->conn->connect_error){
//			echo "Error connect to mysql";die;
//		}
try{
    $this->conn = new PDO('mysql:host='.$host_name.';port='.$port.';dbname='.$esdv_db_name.';charset=utf8',$esdv_db_username,$esdv_db_password,array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ));
    //var_dump($this->conn);
    //echo "Connected successfully";
}catch(PDOException $pe){
    echo $pe->getMessage();
}
    
}
?>