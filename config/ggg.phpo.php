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
    
    //other variables moved to global-config.php
    if ($local) {
    
        $document_root_main = $_SERVER['DOCUMENT_ROOT'];
        $url_main = 'http://gieqs.localhost';
        $database_connection_main = $_SERVER['DOCUMENT_ROOT'].'/mysqli_connect_gieqs.inc.php';


//if EDM used

        $document_root_edm = $_SERVER['DOCUMENT_ROOT'].'/edm';
        $url_edm = 'http://gieqs.localhost/edm';
        $database_connection_edm = $_SERVER['DOCUMENT_ROOT'].'/mysqli_connect_POEM.inc.php';


        // define('BASE_URI', $document_root_main);
        // define('BASE_URL', $url_main);
        // define('DB', $database_connection_main);
        // define('BASE_URI1', $document_root_edm);
    
        // define('BASE_URL1', $url_edm);
    
        // define('DB1', $database_connection_edm);
        
        // function class_loader($class) {
                    
        //         require_once($_SERVER['DOCUMENT_ROOT'].'/assets/scripts/classes/'.$class.'.class.php');
        //     }
            
        //     spl_autoload_register ('class_loader');

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

                ////wp db connection
                $wp_db_name = 'wordpress';
                $wp_db_username = 'root';
                $wp_db_password = '';
            
        
    } else {

        $document_root_main = $_SERVER['DOCUMENT_ROOT'];
        $url_main = 'https://www.gieqs.com';
        $database_connection_main = $_SERVER['DOCUMENT_ROOT'].'/mysqli_connect_gieqs.inc.php';


        //if EDM used

        $document_root_edm = $_SERVER['DOCUMENT_ROOT'].'/edm';
        $url_edm = 'https://www.gieqs.com/edm';
        $database_connection_edm = $_SERVER['DOCUMENT_ROOT'].'/mysqli_connect_edm.inc.php';


    
        // define('BASE_URI', $document_root_main);
        // define('BASE_URL', $url_main);
        // define('DB', $database_connection_main);
        // define('BASE_URI1', $document_root_edm);
    
        // define('BASE_URL1', $url_edm);
    
        // define('DB1', $database_connection_edm);

        ///learning DB live connection/////////
        $learning_db_name = 'learningToolv1';
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
        $xcrud_learning_db_name = 'learningtoolv1';
        $xcrud_db_username = 'djt35';
        $xcrud_db_password = 'nevira1pine';    

        ////wp db connection
        $wp_db_name = 'wordpress';
        $wp_db_username = 'djt35';
        $wp_db_password = 'nevira1pine';



               


        
        // function class_loader($class) {
                    
        //     require_once($_SERVER['DOCUMENT_ROOT'].'/assets/scripts/classes/'.$class.'.class.php');
                             
                             
        //     }
            
            
        //     spl_autoload_register ('class_loader');





        
    }
    
    
    
    
    
    
    
    // $root = BASE_URI . '/';
    // $roothttp = BASE_URL . '/';
    
    // //define('redirect_location', BASE_URL . '/index.php');
    // //echo redirect_location;
    
    // # ******************** #
    // # ***** PURCHASING ***** #
    
    // $stripe_status_live = true;  //true is live keys, false is testing
    
    
    // # ******************** #
    // # ***** LIVE EVENT ***** #
    
    // //make GIEQs conference live
    
    // $liveTestingUsers = array(1, 2, 3 , 4, 5, 6, 7, 8, 9, 10, 11, 12, 14, 15, 16, 84, 23, 25, 628, 629, 469, 3207);
    
    // $live = 1;
    
    //  //MORE LIVE TIME SETTINGS
    
    //  $serverTimeZone = new DateTimeZone('Europe/Brussels');
            
    //  $currentTime = new DateTime('now', $serverTimeZone);
     
    //  $desiredTimeWednesdayFrom = new DateTime('2020-10-07 07:00:00', $serverTimeZone);
    
    //  $desiredTimeWednesdayTo = new DateTime('2020-10-07 19:30:00', $serverTimeZone);
    
    //  $desiredTimeThursdayFrom = new DateTime('2020-10-08 07:00:00', $serverTimeZone);
    
    //  $desiredTimeThursdayTo = new DateTime('2020-10-08 19:30:00', $serverTimeZone);
    
    
    
    
        
    
    // /* 
    //  *  Most important setting!
    //  *  The $debug variable is used to set error management.
    //  *  To debug a specific page, add this to the index.php page:
    
    // if ($p == 'thismodule') $debug = TRUE;
    // require('./includes/config.inc.php');
    
    //  *  To debug the entire site, do
    
    // $debug = TRUE;
    
    //  *  before this next conditional.
    //  */
    
    // $debug = false;
    // //$_SESSION['debug'] = true;
    
    // // Assume debugging is off. 
    // if (!isset($debug)) {
    //     $debug = FALSE;
    // }
    
    // # ***** SETTINGS ***** #
    // # ******************** #
    
    // //error_reporting(E_ALL);
    
    // # **************************** #
    // # ***** ERROR MANAGEMENT ***** #
    
    
    // // Create the error handler:
    // function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars) {
    
    //     global $debug, $contact_email;
        
    //     // Build the error message:
    //     $message = "An error occurred in script '$e_file' on line $e_line: $e_message";
        
    //     // Append $e_vars to the $message:
    //     $message .= print_r($e_vars, 1);
        
    //     if ($debug) { // Show the error.
        
    //         echo '<div class="error">' . $message . '</div>';
    //         debug_print_backtrace();
            
    //     } else { 
    
    //         // Log the error:
    //        // error_log ($message, 1, $contact_email); // Send email.
    
    //         // Only print an error message if the error isn't a notice or strict.
    //         //if ( ($e_number != E_NOTICE) && ($e_number < 2048)) {
    //         //    echo '<div class="error">A system error occurred. We apologize for the inconvenience.</div>';
    //        // }
    
    //     } // End of $debug IF.
    
    // } // End of my_error_handler() definition.
    
    // // Use my error handler:
    // //set_error_handler('my_error_handler');
    
    // # ***** ERROR MANAGEMENT ***** #
    // # **************************** #
    
    // //error_reporting(E_ERROR | E_WARNING | E_PARSE);
    // if ($debug){
        
    
    //     $_SESSION['debug'] = true;
    //     error_reporting(E_ALL);
    
    // }else{
    
    //     $_SESSION['debug'] = false;
    //     error_reporting(0);
    //     ini_set('display_errors', 0);
    
    // }
    
    // $_SESSION['debug'] = false;
    // error_reporting(0);
    // ini_set('display_errors', 0);
   




?>