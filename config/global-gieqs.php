<?php
$host = substr($_SERVER['HTTP_HOST'], 0, 5);

include "global-config.php";

if ($host_list) {
    $local = TRUE;
} else {
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
        $this->conn = new PDO('mysql:host='.$host_name.';port='.$port.';dbname='.$gieqs_db_name.';charset=utf8',$gieqs_db_username,$gieqs_db_password,array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ));
    }catch(PDOException $pe){
        echo $pe->getMessage();
        die;
    }

}

?>