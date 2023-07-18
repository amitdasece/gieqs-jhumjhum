<?php

/* File to generate a table JSON at top of page programmeEdit */

//$openaccess = 1;

require ('../../../assets/includes/config.inc.php');		

//require (BASE_URI.'/assets/scripts/headerScript.php');


$Delegate = new Delegate;

$response =  $Delegate->Load_records_limit_json_datatables(200);

echo $response;

//echo ltrim($response);

$Delegate->endDelegate();