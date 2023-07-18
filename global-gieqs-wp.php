<?php
if (isset($_SERVER['HTTP_HOST']))
{

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


?>