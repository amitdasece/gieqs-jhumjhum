<?php


$host = substr($_SERVER['HTTP_HOST'], 0, 5);
$host_list = in_array($host, array('local', '127.0', '192.1'));
//$host_name = 'gieqs-1.cylal756awqn.eu-west-3.rds.amazonaws.com';
$host_name = 'localhost';
$port = '3306';

$debug = FALSE;
$gigs_debug = FALSE;

//$relative_path = $_SERVER['DOCUMENT_ROOT'];

$relative_path = '';
global $relative_path;
$_SESSION['relative'] = $relative_path;
$rootfolder = '/gieqs';
$_SESSION['rootfolder'] = $rootfolder;



// ini_set('display_errors', 1);
// error_reporting(E_ALL);

   $path = $_SERVER['REQUEST_URI'];     



if ($host_list) {
        $local = TRUE;
    } else {
        $local = FALSE;
    }


if ($local){

        /*
         *  
         * Set variables for local and online setup
         *
         * 
         */

        $mysqli_gieqs_db_name = 'gieqs';
        $mysqli_gieqs_db_username = 'root';
        $mysqli_gieqs_db_password = '';

        if($_SESSION['relative'])
        {
                $document_root_main = $_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['relative'];
                $url_main = 'http://gieqs.localhost';
                $database_connection_main = $_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['relative'].'/mysqli_connect_gieqs.inc.php';
               
               
               //if EDM used
               
               $document_root_edm = $_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['relative'].'/edm';
               $url_edm = 'http://gieqs.localhost/edm';
               $database_connection_edm = $_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['relative'].'/mysqli_connect_POEM.inc.php';
               

        }
        else{
                $document_root_main = $_SERVER['DOCUMENT_ROOT'].$rootfolder;
                $url_main = 'http://localhost/gieqs';
                $database_connection_main = $_SERVER['DOCUMENT_ROOT'].$rootfolder.'/mysqli_connect_gieqs.inc.php';
               
               
               //if EDM used
               
               $document_root_edm = $_SERVER['DOCUMENT_ROOT'].'/gieqs/edm';
               $url_edm = 'http://localhost/gieqs/edm';
               $database_connection_edm = $_SERVER['DOCUMENT_ROOT'].$rootfolder.'/mysqli_connect_POEM.inc.php';
               
        }
        
        
        
        
               ///learning DB local connenction
             $learning_db_name = 'learningToolv1';
             $learning_db_username = 'root';
             $learning_db_password = '';
        
        
        ///gieqs DB local connenction
        
                $gieqs_db_name = 'gieqs';
                $gieqs_db_username = 'root';
                $gieqs_db_password = ''; 
                
        
        
        ///ESD DB local connenction
        
                $esd_db_name = 'ESD';
                $esd_db_username = 'root';
                $esd_db_password = '';
                
        
        ///ESDV DB local connenction
        
                $esdv_db_name = 'esdv1';
                $esdv_db_username = 'root';
                $esdv_db_password = ''; 
                
        
        
        ///xcrud DB local connenction
        
                $xcrud_db_name = 'gieqs';
                $xcrud_learning_db_name = 'learningtoolv1';
                $xcrud_db_username = 'root';
                $xcrud_db_password = '';   
        
        ///WP
        
        //in assets/wp/wp-config
         ////wp db connection
         $wp_db_name = 'wordpress';
         $wp_db_username = 'root';
         $wp_db_password = '';
        
        
        }else{
        
                /*
                *  
                * Set variables for local and online setup
                *
                * 
                */
                $mysqli_gieqs_db_name = 'gieqs';
                $mysqli_gieqs_db_username = 'djt35';
                $mysqli_gieqs_db_password = 'nevira1pine';
        
                $document_root_main = $_SERVER['DOCUMENT_ROOT'].$rootfolder;
                //$url_main = 'https://gieqs.co.uk';
                $url_main = 'http://alb-gieqs-stage-new-1097212869.eu-west-3.elb.amazonaws.com/gieqs';
                
                $database_connection_main = $_SERVER['DOCUMENT_ROOT'].$rootfolder.'/mysqli_connect_gieqs.inc.php';
        
        
                //if EDM used
        
                $document_root_edm = $_SERVER['DOCUMENT_ROOT'].$rootfolder.'/edm';
                $url_edm = 'http://alb-gieqs-stage-new-1097212869.eu-west-3.elb.amazonaws.com/gieqs/edm';
                $database_connection_edm = $_SERVER['DOCUMENT_ROOT'].$rootfolder.'/mysqli_connect_edm.inc.php';
        
        
                $port = '3306';  //port of mysql
        
        
        ///learning DB live connection/////////
                $learning_db_name = 'learnToolv1';
                $learning_db_username = 'djt35';
                $learning_db_password = 'nevira1pine';
        
        ///gieqs DB live connection/////////
        
                $gieqs_db_name = 'gieqs';
                $gieqs_db_username = 'djt35';
                $gieqs_db_password = 'nevira1pine';
        
        ///ESD DB live connection/////////
        
                $esd_db_name = 'ESD';
                $esd_db_username = 'djt';
                $esd_db_password = 'nevira1pine';
        
        ///ESDV DB live connection/////////
        
                $esdv_db_name = 'esdv2';
                $esdv_db_username = 'djt35';
                $esdv_db_password = 'nevira1pine';
        
        
        ///xcrud DB live connection/////////
        
                $xcrud_db_name = 'gieqs';
                $xcrud_learning_db_name = 'learnToolv1';
                $xcrud_db_username = 'djt35';
                $xcrud_db_password = 'nevira1pine';    
        
        
        
        ///WP
        
        //in assets/wp/wp-config
        ////wp db connection
        $wp_db_name = 'wordpress';
        $wp_db_username = 'djt35';
        $wp_db_password = 'nevira1pine';
        
        
        }









?>