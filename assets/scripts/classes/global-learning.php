<?php
$host = substr($_SERVER['HTTP_HOST'], 0, 5);
if (in_array($host, array('local', '127.0', '192.1'))) {
    $local = TRUE;
} else {
    $local = FALSE;
}

if ($local){
        $this->conn = new mysqli("localhost", "root", "", "learningToolv1");
        if($this->conn->connect_error){
            echo "Error connect to mysql";die;
        }
}else{
    
    $this->conn = new mysqli("localhost", "djt35", "nevira1pine", "learningtoolv1");
        if($this->conn->connect_error){
            echo "Error connect to mysql";die;
        }
    
    
}

?>