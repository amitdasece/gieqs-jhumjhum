<?php
require ('../assets/includes/config.inc.php');

require_once(BASE_URI . '/assets/scripts/classes/general.class.php');
$general = new general;
require_once(BASE_URI . '/assets/scripts/classes/users.class.php');
$users = new users;

$paypaldetails= $general->getSecretDetails(google);


$dert[web] = [ 'web' =>[
    'client_id' => $paypaldetails['client_id'],
    'project_id' => $paypaldetails['project_id'],
    'auth_uri' => $paypaldetails['auth_uri'],
    'token_uri' => $paypaldetails['token_uri'],

]];
echo json_encode($dert[web]);
echo "<pre>";
print_r(json_encode($dert[web]));
$jcode = json_encode($dert[web]);
// echo json_decode($jcode);


?>