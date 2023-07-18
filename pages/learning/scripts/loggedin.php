<?php
$openaccess = 1;
error_reporting(E_ALL);
require_once '../../../assets/includes/config.inc.php';

error_reporting(E_ALL);

require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$general = new general;
$users = new users;
if(isset($userid))
{
    $users->Load_from_key($userid);
}
//$users->Load_from_key($userid);


error_reporting(E_ALL);

require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;



require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;



require_once BASE_URI . '/assets/scripts/classes/userFunctions.class.php';
$userFunctions = new userFunctions;

require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;

require_once BASE_URI . '/assets/scripts/classes/coin.class.php';
$coin = new coin;


require_once BASE_URI . '/assets/scripts/classes/coin_grant.class.php';
$coin_grant = new coin_grant;


require_once BASE_URI . '/assets/scripts/classes/coin_spend.class.php';
$coin_spend = new coin_spend;


//echo'hello';

//echo $users->getendoscopistType();
$data = json_decode(file_get_contents('php://input'), true);

$debug = false;

if ($debug){
var_dump($data);
}

$useriddefined = $data['userid'];


//if user is logged in and user id matched userdefined 1 otherwise 0

if (isset($userid)){

    if ($userid == $useriddefined){

        echo '1';
    }else{

        echo '0';
    }

}else{

    echo '0';
}




die();







 