<?php 
session_start();

//require_once(__DIR__.'../../../../../config/global-config.php');
// $relative_path = '';
// $_SESSION['relative'] = $relative_path;
// global $relative_path;
//$rpath = $_SERVER['REQUEST_URI'];
$rpath = '';
if($rpath != '')
{
     $dbp = explode('/', $rpath);
     $db_splice =  array_splice($dbp, 1, -1);
     $implod = implode('/', $db_splice);
     //echo $implod;
     require($_SERVER['DOCUMENT_ROOT'].'/'.$implod.'/config/global-config.php');
}
else
{
    require($_SERVER['DOCUMENT_ROOT'].'/config/global-config.php');
}




/* 

 *  
 *  Configuration file does the following things:
 *  - Has site settings in one location.
 *  - Stores URLs and URIs as constants.
 *  - Sets how errors will be handled.
 * 
 * 
 */


# ******************** #
# ***** SETTINGS ***** #

// Errors are emailed here:
$contact_email = 'djtate@gmail.com'; 

$active = 1;

if ($active == 0){
	
	echo 'Site closed for maintenance, please check back later';
	exit();	
}




// Determine location of files and the URL of the site:
// Allow for development on different servers.
if ($local) {

    // Always debug when running locally:
   // $debug = TRUE;
    
    // Define the constants:
    // define('BASE_URI', '/Applications/XAMPP/xamppfiles/htdocs/dashboard/gieqs');
    // define('BASE_URL', 'http://localhost:90/dashboard/gieqs');
    // define('DB', '/Applications/XAMPP/xamppfiles/htdocs/dashboard/mysqli_connect_gieqs.inc.php');

    define('BASE_URI', $document_root_main);
    define('BASE_URL', $url_main);
    define('DB', $database_connection_main);
    
    function class_loader($class) {
		
			require_once($_SERVER['DOCUMENT_ROOT'].$_SESSION['rootfolder'].'/pages/learning/classes/'.$class.'.class.php');
		 	
	}
	
	
	spl_autoload_register ('class_loader');
	
    
} else {

    define('BASE_URI', $document_root_main);
    define('BASE_URL', $url_main);
    define('DB', $database_connection_main);
    
    function class_loader($class) {
		
        require_once($_SERVER['DOCUMENT_ROOT'].$_SESSION['rootfolder'].'/pages/learning/classes/'.$class.'.class.php');
		 	
		 	
	}
	
	
	spl_autoload_register ('class_loader');
    
}

$root = BASE_URI . '/';
$roothttp = BASE_URL . '/';

//define('redirect_location', BASE_URL . '/index.php');
//echo redirect_location;
    
# ******************** #
# ***** LIVE EVENT ***** #

//make GIEQs conference live

$liveTestingUsers = array(1, 2, 3 , 4, 5, 6, 7, 8, 9, 12, 14, 15, 16, 84, 25, 3207);

$live = 1;



 //MORE LIVE TIME SETTINGS

 $serverTimeZone = new DateTimeZone('Europe/Brussels');
        
 $currentTime = new DateTime('now', $serverTimeZone);
 
 $desiredTimeWednesdayFrom = new DateTime('2020-10-07 07:00:00', $serverTimeZone);

 $desiredTimeWednesdayTo = new DateTime('2020-10-07 19:30:00', $serverTimeZone);

 $desiredTimeThursdayFrom = new DateTime('2020-10-08 07:00:00', $serverTimeZone);

 $desiredTimeThursdayTo = new DateTime('2020-10-08 19:30:00', $serverTimeZone);



 # ******************** #
# ***** PURCHASING ***** #

$stripe_status_live = false;  //true is live keys, false is testing





/* 
 *  Most important setting!
 *  The $debug variable is used to set error management.
 *  To debug a specific page, add this to the index.php page:

if ($p == 'thismodule') $debug = TRUE;
require('./includes/config.inc.php');

 *  To debug the entire site, do

$debug = TRUE;

 *  before this next conditional.
 */

$debug = $gigs_debug;

// // Assume debugging is off. 
// if (!isset($debug)) {
//     $debug = FALSE;
// }

# ***** SETTINGS ***** #
# ******************** #

//error_reporting(E_ALL);

# **************************** #
# ***** ERROR MANAGEMENT ***** #

// Create the error handler:
function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars) {

    global $debug, $contact_email;
    
    // Build the error message:
    $message = "An error occurred in script '$e_file' on line $e_line: $e_message";
    
    // Append $e_vars to the $message:
    $message .= print_r($e_vars, 1);
    
    if ($debug) { // Show the error.
    
        echo '<br/><br/>';
        echo '<div class="error">' . $message . '</div>';
        debug_print_backtrace();
        echo '<br/><br/>';
        
    } else { 

        // Log the error:
       // error_log ($message, 1, $contact_email); // Send email.

        // Only print an error message if the error isn't a notice or strict.
        //if ( ($e_number != E_NOTICE) && ($e_number < 2048)) {
        //    echo '<div class="error">A system error occurred. We apologize for the inconvenience.</div>';
       // }

    } // End of $debug IF.

} // End of my_error_handler() definition.

// Use my error handler:
//set_error_handler('my_error_handler');

# ***** ERROR MANAGEMENT ***** #
# **************************** #

//error_reporting(E_ERROR | E_WARNING | E_PARSE);

/* 
function errHandle($errNo, $errStr, $errFile, $errLine) {
    $msg = "$errStr in $errFile on line $errLine";
    if ($errNo == E_NOTICE || $errNo == E_WARNING) {
        throw new ErrorException($msg, $errNo);
    } else {
        echo $msg;
    }
}

set_error_handler('errHandle'); */

if ($debug){
    

    $_SESSION['debug'] = true;
    error_reporting(E_ALL);

}else{

    $_SESSION['debug'] = false;
    error_reporting(0);
    ini_set('display_errors', 0);

}

$_SESSION['debug'] = false;
error_reporting(0);
ini_set('display_errors', 0);
