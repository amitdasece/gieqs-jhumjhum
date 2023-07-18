<?php
header('Access-Control-Allow-Origin: *');
$openaccess = 1;

//$requiredUserLevel = 6;


error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';

error_reporting(E_ALL);

require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$general = new general;
$users = new users;
$users->Load_from_key($userid);


error_reporting(E_ALL);

require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;



require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;



require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;

//echo'hello';

//echo $users->getendoscopistType();
$data = json_decode(file_get_contents('php://input'), true);


$subscriptionType = $data['subscriptionType'];

if ($subscriptionType != ''){

$endoscopistType = [];

if ($users->getendoscopistType() == ''){

    $endoscopistType['typeFilled'] = false;

}else if (is_numeric(intval($users->getendoscopistType()))){

    $endoscopistType['typeFilled'] = true;

    if ($users->gettrainee() == ''){

        $endoscopistType['endoscopistType'] = $users->getendoscopistType();


        $endoscopistType['traineeFilled'] = false;


    }else if (is_numeric(intval($users->gettrainee()))){

        $endoscopistType['endoscopistType'] = $users->getendoscopistType();
        $endoscopistType['trainee'] = $users->gettrainee();


    }

}else{

    $endoscopistType['typeFilled'] = false;
}


//determine which asset

if (($endoscopistType['endoscopistType'] == '1' || $endoscopistType['endoscopistType'] == '2') && $endoscopistType['trainee'] == '1'){

    if ($subscriptionType == 1){

    $endoscopistType['asset'] = 5;

    }elseif ($subscriptionType == 2){

        $endoscopistType['asset'] = 19;
    
        }

}elseif (($endoscopistType['endoscopistType'] == '1' || $endoscopistType['endoscopistType'] == '2') && $endoscopistType['trainee'] != '1'){

    if ($subscriptionType == 1){

        $endoscopistType['asset'] = 4;
    
        }elseif ($subscriptionType == 2){
    
            $endoscopistType['asset'] = 18;
        
            }

}elseif ($endoscopistType['typeFilled'] === true /* && $endoscopistType['traineeFilled'] === true */){

    if ($subscriptionType == 1){

        $endoscopistType['asset'] = 6;
    
        }elseif ($subscriptionType == 2){
    
            $endoscopistType['asset'] = 20;
        
            }

}else{

    //do nothing
}



echo json_encode($endoscopistType);

}else{


    echo 'Error, no subscription type provided';

}





 