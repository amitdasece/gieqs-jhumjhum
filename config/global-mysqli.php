<?php
if (isset($_SERVER['HTTP_HOST'])){

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
            $this->conn = new mysqli($host_name, $gieqs_db_username, $gieqs_db_password, $gieqs_db_name);
            if($this->conn->connect_error){
                echo "Error connect to mysql";die;
            }
    }else{
        
        $this->conn = new mysqli($host_name, $gieqs_db_username, $gieqs_db_password, $gieqs_db_name);
            if($this->conn->connect_error){
                echo "Error connect to mysql";die;
            }else{

                //echo "connected to SQL";
            }
        
        
    }
?>