<?php
session_start();
$host = substr($_SERVER['HTTP_HOST'], 0, 5);
$host_list = in_array($host, array('local', 'gieqs', '127.0', '192.1'));
$host_name = 'localhost';
$port = '3306';

if ($host_list) {
        $local = TRUE;
    } else {
        $local = FALSE;
    }
  
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    // Errors are emailed here:
    $contact_email = 'djtate@gmail.com'; 
    
    //turn off whole site
    
    $active = 1;
    
    if ($active == 0){
            
            echo 'Site closed for maintenance, please check back later';
            exit();	
    }
    
    //active superuser only, executed in interpretuseraccess
    
    $onlySuperuser = 0;
    if ($local) 
    {
    
        $document_root_main = $_SERVER['DOCUMENT_ROOT'];
        $url_main = 'http://gieqs.localhost';
        $database_connection_main = $_SERVER['DOCUMENT_ROOT'].'/mysqli_connect_gieqs.inc.php';


//if EDM used

        $document_root_edm = $_SERVER['DOCUMENT_ROOT'].'/edm';
        $url_edm = 'http://gieqs.localhost/edm';
        $database_connection_edm = $_SERVER['DOCUMENT_ROOT'].'/mysqli_connect_POEM.inc.php';

        ////wp db connection
        $wp_db_name = 'wordpress';
        $wp_db_username = 'root';
        $wp_db_password = '';



    }
    else
    {
        $document_root_main = $_SERVER['DOCUMENT_ROOT'];
        $url_main = 'https://www.gieqs.com';
        $database_connection_main = $_SERVER['DOCUMENT_ROOT'].'/mysqli_connect_gieqs.inc.php';


        //if EDM used

        $document_root_edm = $_SERVER['DOCUMENT_ROOT'].'/edm';
        $url_edm = 'https://www.gieqs.com/edm';
        $database_connection_edm = $_SERVER['DOCUMENT_ROOT'].'/mysqli_connect_edm.inc.php';

        ////wp db connection
        $wp_db_name = 'wordpress';
        $wp_db_username = 'djt35';
        $wp_db_password = 'nevira1pine';

    }

?>