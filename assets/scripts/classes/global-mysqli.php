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
            $this->conn = new mysqli("localhost", "root", "", "gieqs");
            if($this->conn->connect_error){
                echo "Error connect to mysql";die;
            }
    }else{
        
        $this->conn = new mysqli("localhost", "djt35", "nevira1pine", "gieqs");
            if($this->conn->connect_error){
                echo "Error connect to mysql";die;
            }else{

                //echo "connected to SQL";
            }
        
        
    }
?>