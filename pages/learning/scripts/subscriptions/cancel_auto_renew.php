<?php

$openaccess = 0;

$requiredUserLevel = 6;

require ('../../includes/config.inc.php');	

require (BASE_URI . '/assets/scripts/login_functions.php');
     
     //place to redirect the user if not allowed access
     $location = BASE_URL . '/index.php';
 
     if (!($dbc)){
     require(DB);
     }
    
     
     require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$debug = false;

if ($debug == true){
error_reporting(E_ALL);
}else{

error_reporting(0);
}

$general = new general;
$users = new users;
$users->Load_from_key($userid);


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;

$data = json_decode(file_get_contents('php://input'), true);

$subscription_id = $data['subscription_id'];
//$review = $data['review'];

require_once BASE_URI . "/vendor/autoload.php";
//error_reporting(E_ALL);

spl_autoload_unregister ('class_loader');
//error_reporting(E_ALL);

use Stripe\Stripe;

require(BASE_URI . '/scripts/stripe_api.php');



if ($debug){
print_r($subscription_id);
//print_r($review);
echo '$userid is ' . $userid;
}



if ($subscription->Return_row($subscription_id)){

    $subscription->Load_from_key($subscription_id);

    $subscription_key_stripe = $subscription->getgateway_transactionId();

    //check that the subscription is a subscription

    //then cancel with Stripe

    $subscription_stripe = \Stripe\Subscription::update(
        $subscription_key_stripe,
        [
          'cancel_at_period_end' => true,
        ]
      );


      //print_r($subscription_stripe);

    //if subscription exists

    $subscription->setauto_renew('0');

    echo $subscription->prepareStatementPDOUpdate();


}else{

    echo 'Subscription does not exist';
}






?>