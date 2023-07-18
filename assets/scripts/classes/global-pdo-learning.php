<?php
if (isset($_SERVER['HTTP_HOST'])){

    $host = substr($_SERVER['HTTP_HOST'], 0, 5);
    if (in_array($host, array('local', '127.0', '192.1'))) {
        $local = TRUE;
        //echo 'local';
    } else {
        $local = FALSE;
        //echo 'not local';
    }

}else{

    //assume script on remote server

    $local = FALSE;

    

}

if ($local){
    //echo 'hello';

    
    try{
        $this->conn = new PDO('mysql:host=localhost;port=3306;dbname=learningToolv1;charset=utf8','root','',array(
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
    $this->conn = new PDO('mysql:host=localhost;port=3306;dbname=learningtoolv1;charset=utf8','djt35','nevira1pine',array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ));
    //var_dump($this->conn);
    //echo "Connected successfully";
}catch(PDOException $pe){
    echo $pe->getMessage();
}
    
}

?>