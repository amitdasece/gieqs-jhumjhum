<?php
error_reporting(E_ALL);
//;
$requiredUserLevel = 1;
//$openaccess = 1;
//echo 'hello';
//$requiredUserLevel = 4;
require ('../../assets/includes/config.inc.php');		
//echo 'hello2';
require (BASE_URI.'/assets/scripts/headerScript.php');

//echo 'hello3';sss
$general = new general;
$users = new users;
$userFunctions = new userFunctions;
//echo 'hello4';




function ne($v) {
    return $v != '';
}



$debug = $gigs_debug;
$explicit = false;
//echo 'hello';



//$data = json_decode(file_get_contents('php://input'), true);

if ($debug){

print_r($data);

}

echo $userFunctions->printUserEmailsConsent1();

echo '<br/><br/>';
echo '<hr>';

echo $userFunctions->printUserEmailsConsent2();

echo '<br/><br/>';
echo '<hr>';

echo $userFunctions->printUserEmailsConsent3();
