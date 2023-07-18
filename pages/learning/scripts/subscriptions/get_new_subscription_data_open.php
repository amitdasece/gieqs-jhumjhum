<?php

$openaccess = 1;

//$requiredUserLevel = 6;

require ('../../includes/config.inc.php');	

require (BASE_URI . '/assets/scripts/login_functions.php');
     
     //place to redirect the user if not allowed access
     $location = BASE_URL . '/index.php';
 
     if (!($dbc)){
     require(DB);
     }
    
     
     require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$debug = FALSE;

if ($debug == true){
error_reporting(E_ALL);
}else{

error_reporting(0);
}

$general = new general;
$users = new users;
//$users->Load_from_key($userid);


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;

require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;

$data = json_decode(file_get_contents('php://input'), true);

$asset_id = $data['asset_id'];
//$review = $data['review'];
$isSymposium = $data['isSymposium'];



if ($debug){
print_r($asset_id);
print_r($isSymposium);

//print_r($review);
echo '$userid is ' . $userid;
}

//does the asset exist?

if ($assets_paid->Return_row($asset_id)){


    $assets_paid->Load_from_key($asset_id);
    $asset_type = $assets_paid->getasset_type();



}else{

    if ($debug){
            
        //print_r($review);
        echo 'ERROR: asset does not exist';
        }


    die();

    
}





    //if subscription exists

    $subscription_to_return = array();

    $subscription_to_return['asset_name'] = $assets_paid->getname();
    $subscription_to_return['asset_type'] = $assetManager->getAssetTypeText($assets_paid->getasset_type());
    $subscription_to_return['asset_id'] = $assets_paid->getid();

    if ($isSymposium == 'true'){

        $subscription_to_return['cost'] = '';
        $subscription_to_return['symposium'] = true;



    }else{

        $subscription_to_return['cost'] = $assets_paid->getcost();

    }

    //$subscription_to_return['cost'] = $assets_paid->getcost();
    $subscription_to_return['description'] = $assets_paid->getdescription();
    $subscription_to_return['renew_frequency'] = $assets_paid->getrenew_frequency();

    $subscription_to_return['user_id'] = $userid;

    echo json_encode($subscription_to_return);
    //echo $subscription->getexpiry_date();


    //json encode the result

    //need the description
    //need the cost from subtable
    //need to check that it is ending soon
    //need to set renewal date for new subscription the number of days remaining +









?>