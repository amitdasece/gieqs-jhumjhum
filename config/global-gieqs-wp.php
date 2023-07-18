<?php
if (isset($_SERVER['HTTP_HOST']))
{

    $host = substr($_SERVER['HTTP_HOST'], 0, 5);

    include "global-config.php";

    if ($host_list) {
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
        
        $this->conn = new PDO('mysql:host='.$host_name.';port='.$port.';dbname='.$gieqs_db_name.';charset=utf8',$gieqs_db_username,$gieqs_db_password,array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ));
    }catch(PDOException $pe){
        echo $pe->getMessage();
        die;
    }

} else {
    try{

        //edit remote database name, password and port here
        // echo 'host:'.$host_name."<br/>";
        // echo 'dbname:'.$gieqs_db_name."<br/>";
        // echo 'dbuser:'.$gieqs_db_username."<br/>";
        // echo 'dbpass:'.$gieqs_db_password."<br/>";
        $this->conn = new PDO('mysql:host='.$host_name.';port='.$port.';dbname='.$gieqs_db_name.';charset=utf8',$gieqs_db_username,$gieqs_db_password,array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ));
    }catch(PDOException $pe){
        echo $pe->getMessage();
        die;
    }

}


?>