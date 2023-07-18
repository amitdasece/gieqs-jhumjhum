<?php
$openaccess = 1;

//$requiredUserLevel = 6;


error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';
require_once BASE_URI . '/assets/scripts/login_functions.php';


$location = BASE_URL . '/index.php';

$debug = false;

//cancel ay pending coin transaction
if (isset($_GET['url'])){



$url = base64_decode($_GET['url']);

}else{

    $url = '/pages/learning/index.php';
}



if ($debug){

echo $url;
echo base64_decode($url);
die();

}


//cancel coin transaction if outstanding

include(BASE_URI . '/pages/learning/scripts/subscriptions/coin/coin_transact_reverse.php');



//echo $location;

//require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

/* 
$general = new general;
$users = new users; */
//$users->Load_from_key($userid);


/* require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;

require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions; */

redirect_login(BASE_URL . $url . '&action=register');

