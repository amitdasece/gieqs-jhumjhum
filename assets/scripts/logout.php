<?php // Unset all of the session variables.
header('Access-Control-Allow-Origin: *');
$openaccess = 1;
//require ($_SERVER['DOCUMENT_ROOT'] .'/gieqs/assets/includes/config.inc.php');	
require ('../../assets/includes/config.inc.php');	
require (BASE_URI . '/assets/scripts/interpretUserAccess.php');	

require_once (BASE_URI . '/assets/scripts/classes/userActivity.class.php');
$userActivity = new userActivity;


//getcurrent UTC time
$date = new DateTime('now', new DateTimeZone('UTC'));
$sqltimestamp = date_format($date, 'Y-m-d H:i:s');

//add a logout event to the database

$userActivity->New_userActivity($userid, 99, null, $sqltimestamp);
$userActivity->prepareStatementPDO();


$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}


// Finally, destroy the session.
session_destroy();



?>