<?php

/* File to generate a table JSON at top of page programmeEdit */

//$openaccess = 1;

require ('../../../assets/includes/config.inc.php');		

//require (BASE_URI.'/assets/scripts/headerScript.php');


$session = new session;
$sessionView = new sessionView;

$response =  $sessionView->Load_records_session_programme_limit_json_datatables(900000);

echo $response;

//echo ltrim($response)f;

$session->endsession();