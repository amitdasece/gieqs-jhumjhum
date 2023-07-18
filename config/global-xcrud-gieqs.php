<?php
$host = substr($_SERVER['HTTP_HOST'], 0, 5);

include "global-config.php";

if ($host_list) {
    $local = TRUE;
} else {
    $local = FALSE;
}
$xcrud = Xcrud::get_instance(); //instantiate xCRUD

//$xcrud->connection('root','nevira1pine','learningToolv1','localhost');


if ($local){

    $username = $gieqs_db_username;
    $password = $gieqs_db_password;
    $dbname = $gieqs_db_name;
    $host = $host_name;



}else{

    $username = $gieqs_db_username;
    $password = 'nevira1pine';
    $dbname = $gieqs_db_name;
    $host = $host_name;


    //$xcrud->connection('djt35','nevira1pine','learningtoolv1','localhost');


}

?>