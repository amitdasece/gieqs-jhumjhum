<?php
$host = substr($_SERVER['HTTP_HOST'], 0, 5);

include "global-config.php";

if ($host_list) {
    $local = TRUE;
} else {
    $local = FALSE;
}

if ($local){
        $this->conn = new mysqli($host_name, $esd_db_username, $esd_db_password, $esd_db_name);
        if($this->conn->connect_error){
            echo "Error connect to mysql";die;
        }
}else{
    
    $this->conn = new mysqli($host_name, $esd_db_username, $esd_db_password, $esd_db_name);
        if($this->conn->connect_error){
            echo "Error connect to mysql";die;
        }
    
    
}
?>