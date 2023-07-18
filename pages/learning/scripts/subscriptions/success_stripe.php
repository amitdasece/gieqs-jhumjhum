
<?php 

$openaccess = 1;

//$requiredUserLevel = 6;


error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';

error_reporting(E_ALL);

require(BASE_URI . '/assets/scripts/interpretUserAccess.php');


$general = new general;
$users = new users;
$users->Load_from_key($userid);


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/sessionView.class.php');
$sessionView = new sessionView;

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;

require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;

require_once(BASE_URI . '/assets/scripts/classes/userActivity.class.php');
$userActivity = new userActivity;

require_once BASE_URI . '/assets/scripts/classes/userFunctions.class.php';
$userFunctions = new userFunctions;

require_once BASE_URI . '/assets/scripts/classes/programme.class.php';
$programme = new programme;

require_once BASE_URI . '/assets/scripts/classes/coin.class.php';
$coin = new coin;

require_once BASE_URI . '/assets/scripts/classes/symposium.class.php';
$symposium = new symposium;


require_once BASE_URI . '/assets/scripts/classes/coin_grant.class.php';
$coin_grant = new coin_grant;


require_once BASE_URI . '/assets/scripts/classes/coin_spend.class.php';
$coin_spend = new coin_spend;

require_once BASE_URI . '/pages/learning/includes/give_asset_functions.inc.php';

$debug = false;

if ($debug){

    error_reporting(E_ALL);
}

function get_include_contents($filename, $variablesToMakeLocal) {
    extract($variablesToMakeLocal);
    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}


require_once BASE_URI . "/vendor/autoload.php";
//error_reporting(E_ALL);

spl_autoload_unregister ('class_loader');
error_reporting(E_ALL);

use Stripe\Stripe;

//CHANGE_TEST_TO_LIVE_STRIPE

//require(BASE_URI . '/../scripts/stripe_api.php');
//CHANGE FOR STRIPE TEST

if ($stripe_status_live === true){

    require(BASE_URI . '/scripts/stripe_api.php'); 

}else{

    \Stripe\Stripe::setApiKey('sk_test_51IsKqwEBnLMnXjoguHzjHquozIjRT1Wt5OuLAQqxJvkUvX6DwMebWAPwgXsWaW35r5WXk1m6CuxtkY72I6QNLpH200No1l1SwU');
    $stripe = new \Stripe\StripeClient(
        'sk_test_51IsKqwEBnLMnXjoguHzjHquozIjRT1Wt5OuLAQqxJvkUvX6DwMebWAPwgXsWaW35r5WXk1m6CuxtkY72I6QNLpH200No1l1SwU'
      ); 
    

}



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer;

error_reporting(E_ALL);

//print_r($_GET);

$session_id = $_GET['session_id'];
$log[] = 'Session id is (from Stripe)' . $session_id . PHP_EOL;


$session = \Stripe\Checkout\Session::retrieve($session_id);
$customer = \Stripe\Customer::retrieve($session->customer);
//$invoice = \Stripe\Invoice::retrieve($session->invoice);



/* print "<pre>";
print_r($session);
print "</pre>";
print "<pre>";
print_r($customer);
print "</pre>";
 */

//check if this is a subscription or a fixed price

if ($session['mode'] == 'payment'){

    $log[] = 'New Payment Detected' . PHP_EOL;


    $payment_intent = $session['payment_intent']; //check is set
    //print $payment_intent;
    $subscription_id = $session['metadata']['subscription_id'];  //check is set
    $amount = $session['amount_total'];
    $amount = intval($amount) / 100;
    $currency = strtoupper($session['currency']);

    $log[] = 'Current action involves subscription id '. $subscription_id . ' and ' . $amount . ' ' . $currency . PHP_EOL;


}elseif ($session['mode'] == 'subscription'){

    $log[] = 'New Subscription Mode Detected' . PHP_EOL;

    if ($debug){

        print_r($session['metadata']);
        print_r($session);
        

    }

    //die();

    if ($session['metadata']['alreadyHasSiteWide'] == 'true'){

        //handle old subscription (for if this is a subscription, for congress see below)

                //get the subscription object of the sitewide subscription

                $log[] = 'User already has Subscription for SiteWide' . PHP_EOL;



                $sitewidesubscriptonid = $session['metadata']['oldSubscriptionid'];

                $log[] = 'SiteWide id is currently ' . $session['metadata']['oldSubscriptionid'] . PHP_EOL;

                if ($subscription->Return_row($sitewidesubscriptonid)){
            
                    $subscription->Load_from_key($sitewidesubscriptonid);
                    $stripe_subscription_id = $subscription->getgateway_transactionId();
        
        
                    $old_subscription = \Stripe\Subscription::retrieve($stripe_subscription_id);
        
                    $old_subscription_status = $stripe->subscriptions->cancel(
                        $stripe_subscription_id,
                        ['prorate' => true,]
                      );
                    
            
                      if ($debug){
                      print_r($old_subscription_status);
                      //die();
                    }
            
                    $log[] = 'Result of old subscription status is ' . $old_subscription_status . PHP_EOL;
            
                        if ($old_subscription_status->status == 'cancelled'){
            
                            //$old_subscription->cancel();
            
                        
                            $subscription->setauto_renew('0');
            
                            $subscription->setactive('0');
            
                            echo $subscription->prepareStatementPDOUpdate();

                            if ($debug){
                            echo 'Old subscription cancelled';
                            $log[] = 'Old subscription cancelled';

                            }


                        }

                    }
        


    }else{


        $log[] = 'No sitewide subscription detected already for the user who is purchasing subscription ' . PHP_EOL; 
    }

    $current_date = new DateTime('now', new DateTimeZone('UTC'));

    $current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s'); 


    $payment_intent = $session['subscription']; //check is set
    $subscription_id = $session['metadata']['subscription_id'];  //check is set
    $currency = strtoupper($session['currency']);





$debug = false;


    if ($session['metadata']['free_trial'] == true){

        $log[] = 'Free trial recorded' . PHP_EOL;

        if ($session['metadata']['subscription_type'] == 1){

            $userActivity->New_userActivity($userid, 'FREE_TRIAL_PRO', null, $current_date_sqltimestamp);
            echo $userActivity->prepareStatementPDO();
            $amount = 'FREE TRIAL';

            $log[] = 'Free trial recorded for STANDARD' . PHP_EOL;
            if ($debug){

            echo 'free trial recorded';
        
            }

        }elseif ($session['metadata']['subscription_type'] == 2){

            $userActivity->New_userActivity($userid, 'FREE_TRIAL_PREMIUM', null, $current_date_sqltimestamp);
            echo $userActivity->prepareStatementPDO();
            $amount = 'FREE TRIAL';
            $log[] = 'Free trial recorded for PRO' . PHP_EOL;
    
            if ($debug){
    
               echo 'free trial recorded';
        
            }

        }



    }else{

        //not a free trial
        //record some coins here
        //also in webhooks on the first renewal

        $log[] = 'NOT a free Trial' . PHP_EOL;
        //get mysql date UTC
        if ($session['metadata']['subscription_type'] == 1){        //only if a subscription type 1, type 2 has full acccess
            //not clear to me why we are coin granting here

        $date = new DateTime('now', new DateTimeZone('UTC'));
        $sqltimestamp = date_format($date, 'Y-m-d H:i:s');

        $amount_grant = 50;
        $coin_grant->New_coin_grant($sqltimestamp, $amount_grant, $userid);

            $log[] = 'COIN GRANT 50 coins performed here, need to understand reasons why';

        $coin_grant->prepareStatementPDO();

        }




        $amount = $session['amount_total'];
        $amount = intval($amount) / 100;

        if ($debug){

            echo 'else recorded';
     
        }



    
    }

    if ($debug){

    die();

    }


}





if ($subscription->Return_row($subscription_id)){ //if the subscription already exists

    //we created a new subscription for the renewal
    $log[] = 'Subscription ' . $subscription_id . ' opened for editing' . PHP_EOL;

    //with the required term
    //store the paypal ref only, no personal details stored

    $subscription->Load_from_key($subscription_id);

    //now we just need to activate it

    //then reload the previous page with a popup that it was successful

    $subscription->setactive('1');
    $subscription->setgateway_transactionId($payment_intent);
    
    
    if ($subscription->prepareStatementPDOUpdate() == 1){

        echo 'Subscription activated';

        $log[] = 'Subscription activated ' . $subscription_id . PHP_EOL;


    }else{

        //updating the subscription went wrong
        echo 'error in subscription updating';
        $log[] = 'Error activating the following subscription id ' . $subscription_id . PHP_EOL;


    }
    

}




$log[] = 'Proceeding to determine user and assets for sub id ' . $subscription_id . PHP_EOL;

/* $isPaymentExist = $db->query("SELECT * FROM payments WHERE payment_id = '".$payment_id."'");

if($isPaymentExist->num_rows == 0) { 
    $insert = $db->query("INSERT INTO payments(payment_id, payer_id, payer_email, amount, currency, payment_status) VALUES('". $payment_id ."', '". $payer_id ."', '". $payer_email ."', '". $amount ."', '". $currency ."', '". $payment_status ."')");
} */

echo "Payment is successful. Your transaction id is: ". $payment_intent;
$log[] = "Payment is successful. Your transaction id is: ". $payment_intent . PHP_EOL;


$asset_id = $assetManager->getAssetid($subscription_id);

$assets_paid->Load_from_key($asset_id);

if ($users->gettimezone()){

    $timezone = $users->gettimezone();
}else{

    $timezone = 'UTC';
}

$end_date = new DateTime($subscription->getexpiry_date(), new DateTimeZone($timezone));

$end_date_user_readable = date_format($end_date, 'd/m/Y');

$start_date = new DateTime($subscription->getstart_date(), new DateTimeZone($timezone));

$start_date_user_readable = date_format($start_date, 'd/m/Y');

if ($assetManager->isSitewidePRO($asset_id) === true){

    $log[] = "The asset with id $asset_id is a sitewide PRO asset and so we proceed to give other assets " . PHP_EOL;


    //do stuff to give the assets, //check this

   

    $log = [];

    //DEFINE USER ID 
    $defined_userid = $userid;

    $log[] = "Userid determined as $defined_userid " . PHP_EOL;

    //define assets future
    $assets = getPastAdvertisedAssets($assetManager, $sessionView, $programme);

    //DEFINE DATES
    //today
    $current_date = new DateTime('now', new DateTimeZone('UTC'));
    $current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s');

    //after 1 year
    $interval = 'P12M';

    //add interval to today
    $end_start_calculate_date = new DateTime('now', new DateTimeZone('UTC'));
    $end_start_calculate_date->add(new DateInterval($interval));
    $end_date_sqltimestamp = date_format($end_start_calculate_date, 'Y-m-d H:i:s');



    foreach ($assets as $assetkey=>$assetvalue){
        //iterate through advertised assets


        //check if user already owns

        //if not give a 1 year  access 

        //$value is userid

        //$assetvalue is assetid

        if ($assetManager->doesUserHaveSameAssetAlready($assetvalue, $defined_userid, false) === false){

            $log[] = 'User no ' . $defined_userid . ' does not currently own asset ' . $assetvalue;


        $subscription->New_subscriptions($defined_userid, $assetvalue, $current_date_sqltimestamp, $end_date_sqltimestamp, '1', '0', 'TOKEN_ID=PRO_SUBSCRIPTION');

        $newSubscriptionid = $subscription->prepareStatementPDO();

        //$newSubscriptionid = ' fake subscription id';


        $log[] = 'User no ' . $defined_userid . ' granted access to assetid ' . $assetvalue . '. New subscription no = ' . $newSubscriptionid;


        }else{
            
            $log[] = 'User no ' . $defined_userid . ' already owns asset ' . $assetvalue;


        }




    }



}

//figure out

//what this payment was for

$asset_type = $assetManager->getAssetType($subscription_id);

//was it a renewal

$isRenewal = $assetManager->isRenewal($asset_id, $userid, $debug);

//check if 2xasset_id on 2 subscriptions = renewal

//clean up other unsuccessful purchases for this type

//based on asset_type set some parameters

/* 

        $filename = ''; // link to email that needs to be sent
        $subject = ''; // subject of mail
        $preheader = ''; //preheader text of mail
        $page = '';  //where to locate to after success


*/

//set some basics

$filename = '/assets/email/subscriptions/renewSubscriptionMail.php';
$subject = 'Thank-you for Renewing Your Subscription on GIEQS Online';
$preheader = 'Your subscription has been renewed.  Thank you for your support of GIEQs Online';
$page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;


if ($isRenewal){

    $log[] = "Asset is being renewed" . PHP_EOL;


    if ($asset_type == '1'){ //site wide

        $filename = '/assets/email/subscriptions/renewSubscriptionMail.php';
        $subject = 'Thank-you for Renewing Your Subscription on GIEQS Online';
        $preheader = 'Your subscription has been renewed.  Thank you for your support of GIEQs Online';
        $page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;



    }else if ($asset_type == '2'){ //GIEQs Congress Subscription

        $filename = '/assets/email/subscriptions/renewSubscriptionMail.php';
        $subject = 'Thank-you for Renewing Your Subscription on GIEQS Online';
        $preheader = 'Your subscription has been renewed.  Thank you for your support of GIEQs Online';
        $page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;


    }else if ($asset_type == '3'){ //GIEQs Virtual / Live Course

        //need to add text for course renewal

        $filename = '/assets/email/subscriptions/renewSubscriptionMail.php';
$subject = 'Thank-you for Renewing Your Subscription on GIEQS Online';
$preheader = 'Your subscription has been renewed.  Thank you for your support of GIEQs Online';
$page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;

    }else if ($asset_type == '4'){ //video set / area of site

        $filename = '/assets/email/subscriptions/renewSubscriptionMail.php';
        $subject = 'Thank-you for Renewing Your Subscription on GIEQS Online';
        $preheader = 'Your subscription has been renewed.  Thank you for your support of GIEQs Online';
        $page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;


    }

}else if ($isRenewal === false){

    $log[] = "Asset is NOT being renewed" . PHP_EOL;

    if ($asset_type == '1'){ //site wide

        //GIVE THE SITE WIDE SUBSCRIPTIONS HERE

        $filename = '/assets/email/subscriptions/renewSubscriptionMail.php';  //to change
        $subject = 'Thank-you for Your Subscription on GIEQS Online';
        $preheader = 'Your new subscription awaits!  Thank you for your support of GIEQs Online';
        $page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;


    }else if ($asset_type == '2'){ //GIEQs Congress Subscription
        
        $filename = '/assets/email/subscriptions/gieqs_iv_onboarding.php';
        $subject = 'Thank-you for Your GIEQs IV Registration';
        $preheader = 'Your congress subscription was successful!  Thank you for your support of GIEQs';
        $page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;

        $symposium_id = $userFunctions->getSymposiumidUseridSpecificSymposium($userid, $asset_id, false);

        $debug = false;

        $sitewide_cancellation_string = null;

        $log[] = "Asset is a symposium registration" . PHP_EOL;
        


        if ($symposium_id != false){

            $log[] = "Symposium id recognised for user $userid as $symposium_id" . PHP_EOL;


            $symposium->Load_from_key($symposium_id);

            //update the final registration date //DEFINE DATES
            //today
            $current_date = new DateTime('now', new DateTimeZone('UTC'));
            $current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s');


            $symposium->setfull_registration_date($current_date_sqltimestamp);
            $symposium->setpartial_registration('0');

            $log[] = "Updated symposium as full registration" . PHP_EOL;



            $symposium->prepareStatementPDOUpdate();

            if ($symposium->getincludeGIEQsPro() == '1'){ 

                $log[] = "Detected that the user included GIEQs PRO " . PHP_EOL;

                
                $debug = false;
                
                if ($debug){
                    
                    //purchased a Pro subscription alongside

                    echo 'purchased a Pro subscription alongside';

                }

                //cancel any old

                if ($assetManager->getSiteWideSubscription($userid, false) != false){


                    //handle old subscription (for if this is a subscription, for congress see below)
            
                            //get the subscription object of the sitewide subscription
            
                            $sitewidesubscriptonid = $assetManager->getSiteWideSubscription($userid, false);

                            $log[] = 'detected a sitewide subscription with id ' . $sitewidesubscriptonid . PHP_EOL;

                            if ($debug){


                                echo 'detected a sitewide subscription with id ' . $sitewidesubscriptonid;


                            }
            
                            if ($subscription->Return_row($sitewidesubscriptonid)){
                        
                                $subscription->Load_from_key($sitewidesubscriptonid);
                                $stripe_subscription_id = $subscription->getgateway_transactionId();
                    
                                if ($debug){


                                    echo 'and with gateway transaction id ' . $stripe_subscription_id;
    
                                }

                                try {
                                   
                                    $old_subscription = \Stripe\Subscription::retrieve($stripe_subscription_id);

                                    $old_subscription_status = $stripe->subscriptions->cancel(
                                        $stripe_subscription_id,
                                        ['prorate' => true,]
                                      );
                                    
                                      $log[] = 'Cancelled this subscription with Stripe' . PHP_EOL;

                            
                                      if ($debug){
                                      //print_r($old_subscription_status);
                                      //die();
                                    }

                                } catch (\Throwable $th) {
                                
                                    //stripe doesn't recognise this id, simply inactivate the subscription since we already matched it and are planning to create a new one from now
                                    $subscription->setauto_renew('0');
                        
                                        $subscription->setactive('0');
                        
                                        echo $subscription->prepareStatementPDOUpdate();
            
                                        if ($debug){
                                        echo 'Old subscription cancelled';
            
                                        }

                                        $userActivity->New_userActivity($userid, 'CANCEL_SUB_SYMPOSIUM ID ' . $sitewidesubscriptonid, null, $current_date_sqltimestamp);
                                        echo $userActivity->prepareStatementPDO();

                                        $sitewide_cancellation_string = 'Old GIEQs Online subscription ID #' . $sitewidesubscriptonid . ' was cancelled and prorata refund requested via Stripe.  Please verify you have received a refund.';

                                        $log[] = $sitewide_cancellation_string . PHP_EOL;


                                        //track this change

                                }
                    
                                
                        
                                
                        
                                    if ($old_subscription_status->status == 'cancelled'){
                        
                                        //$old_subscription->cancel();
                        
                                    
                                        $subscription->setauto_renew('0');
                        
                                        $subscription->setactive('0');
                        
                                        echo $subscription->prepareStatementPDOUpdate();
            
                                        if ($debug){
                                        echo 'Old subscription cancelled';
            
                                        }

                                        $userActivity->New_userActivity($userid, 'CANCEL_SUB_SYMPOSIUM ID ' . $sitewidesubscriptonid, null, $current_date_sqltimestamp);
                                        echo $userActivity->prepareStatementPDO();

                                        $sitewide_cancellation_string = 'Old GIEQs Online subscription ID #' . $sitewidesubscriptonid . ' was cancelled and prorata refund requested via Stripe.  Please verify you have received a refund.';

                                        $log[] = $sitewide_cancellation_string . PHP_EOL;

            
                                    }
            
                                }
                    
            
            
                }


                //setup the subscription

                //start now
                //end 12 m

                //DEFINE DATES
                //today
                $current_date = new DateTime('now', new DateTimeZone('UTC'));
                $current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s');

                //after 1 year
                $interval = 'P12M';

                //add interval to today
                $end_start_calculate_date = new DateTime('now', new DateTimeZone('UTC'));
                $end_start_calculate_date->add(new DateInterval($interval));
                $end_date_sqltimestamp = date_format($end_start_calculate_date, 'Y-m-d H:i:s');

                $start_date_gieqs_online = date_format($current_date, 'd-m-Y');
                $end_date_gieqs_online = date_format($end_start_calculate_date, 'd-m-Y');
                
                //asset id 
                $registrationTypeConverter = [ //array to convert registration type from the symposium table to sitewide asset id

                    1 => 18,
                    2 => 19,
                    3 => 19,
                    4 => 20,
                    5 => 20,
                
                
                ];


                $subscription->New_subscriptions($userid, $registrationTypeConverter[$symposium->getregistrationType()], $current_date_sqltimestamp, $end_date_sqltimestamp, '1', '0', $payment_intent);

                $newsitewideSubscriptionid = $subscription->prepareStatementPDO();

                if ($newsitewideSubscriptionid > 0){

                    if ($debug){

                        echo 'New subscription (sitewide) setup with id ' . $newsitewideSubscriptionid;



                    }

                    $log[] = 'New subscription (sitewide) setup with id ' . $newsitewideSubscriptionid . PHP_EOL;


                

                    if ($assetManager->isSitewidePRO($registrationTypeConverter[$symposium->getregistrationType()]) === true){

                        //do stuff to give the assets, //check this
                    
                        $log[] = 'Giving pro assets in symposium context' . PHP_EOL;


                        //$log = [];
                    
                        //DEFINE USER ID 
                        $defined_userid = $userid;
                        //define assets future
                        $assets = getPastAdvertisedAssets($assetManager, $sessionView, $programme);
                    
                        //DEFINE DATES
                        //today
                        $current_date = new DateTime('now', new DateTimeZone('UTC'));
                        $current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s');
                    
                        //after 1 year
                        $interval = 'P12M';
                    
                        //add interval to today
                        $end_start_calculate_date = new DateTime('now', new DateTimeZone('UTC'));
                        $end_start_calculate_date->add(new DateInterval($interval));
                        $end_date_sqltimestamp = date_format($end_start_calculate_date, 'Y-m-d H:i:s');
                    
                    
                    
                        foreach ($assets as $assetkey=>$assetvalue){
                            //iterate through advertised assets
                    
                    
                            //check if user already owns
                    
                            //if not give a 1 year  access 
                    
                            //$value is userid
                    
                            //$assetvalue is assetid
                    
                            if ($assetManager->doesUserHaveSameAssetAlready($assetvalue, $defined_userid, false) === false){
                    
                                $log[] = 'User no ' . $defined_userid . ' does not currently own asset ' . $assetvalue . PHP_EOL;
                    
                    
                            $subscription->New_subscriptions($defined_userid, $assetvalue, $current_date_sqltimestamp, $end_date_sqltimestamp, '1', '0', 'TOKEN_ID=PRO_SUBSCRIPTION');
                    
                            $newSubscriptionid = $subscription->prepareStatementPDO();
                    
                            //$newSubscriptionid = ' fake subscription id';
                    
                    
                            $log[] = 'User no ' . $defined_userid . ' granted access to assetid ' . $assetvalue . '. New subscription no = ' . $newSubscriptionid . PHP_EOL;
                    
                    
                            }else{
                                
                                $log[] = 'User no ' . $defined_userid . ' already owns asset ' . $assetvalue . PHP_EOL;
                    
                    
                            }
                    
                    
                    
                    
                        }

                        if ($debug){

                            print_r($log);

                        }
                    
                    
                    
                    }

                }else{
                    
                    if ($debug){

                        echo 'Failed in setup of new sitewide subscription';

                    }

                    $log[] = 'Failed in setup of new sitewide subscription';

                }



                //it will end after without continued billing
                //maybe an email reminder before timeout (autorenew 0)

                //using registration type choose which one



                //then setup


                





            }

            
            
        }else{
         
            if ($debug){

                echo 'Error. No symposium record detected for user and purchasing a symposium';

            }

            $log[] = 'Error. No symposium record detected for user ' . $userid . ' and purchasing a symposium';


        }
        
        //too late for discount
        //here we need to handle GIEQs Pro giving

        //check if user already has sitewide






    }else if ($asset_type == '3'){ //GIEQs Virtual / Live Course

        $log[] = 'Asset type 3 detected' . PHP_EOL;


        //$filename = '/assets/email/subscriptions/newSubscriptionCourse.php'; REINSTATE IF VIRTUAL, TODO DETERMINE THIS
        $filename = '/assets/email/subscriptions/onboarding_course_Zoom.php';
        $subject = 'Thank-you for Your GIEQs Online Course Purchase';
        $preheader = 'Your course awaits! Check out this mail for information on joining and catch-up. Thank you for your support of GIEQs Online';
        $page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;
        $programme_array = $assetManager->returnProgrammesAsset($asset_id);
        $programmeid = $programme_array[0];
        //$programmeid = $programmes[0]['programmeid'];
        $programmes3 = $sessionView->getProgrammeTimes([0=>['id'=>$programmeid,]], false);  
        $programmes4 = $sessionView->convertProgrammeTimes($programmes3, false);
        $start_time = $programmes4[0];
        
        $emailVaryarray['programme_start_time'] = $start_time;




    }else if ($asset_type == '4'){ //video set / area of site


        $log[] = 'Asset type 4 detected' . PHP_EOL;

    }

}











$users->Load_from_key($userid);
$emailVaryarray['firstname'] = $users->getfirstname();
$emailVaryarray['surname'] = $users->getsurname();
$emailVaryarray['email'] = $users->getemail();
$email = $users->getemail();
$emailVaryarray['assetid'] = $asset_id;
$emailVaryarray['subscription_id'] = $subscription_id;
$emailVaryarray['asset_name'] = $assetManager->getAssetName($subscription_id);
$emailVaryarray['asset_type'] = $assetManager->getAssetTypeText($assetManager->getAssetType($subscription_id));
$emailVaryarray['renew_frequency'] = $assets_paid->getrenew_frequency();
$emailVaryarray['expiry_date'] = $end_date_user_readable;
$emailVaryarray['cost'] = $amount . ' ' . $currency;
$emailVaryarray['key'] = $users->getkey();
$emailVaryarray['gateway_transactionId'] = $payment_intent;
$emailVaryarray['preheader'] = $preheader;

//symposium specific

$registrationType = [

    1 => 'Doctor',
    2 => 'Doctor in Training',
    3 => 'Nurse Endoscopist',
    4 => 'Endoscopy Nurse',
    5 => 'Medical Student',


];

//$start_date_gieqs_online = 'start date';
//$end_date_gieqs_online = 'end date';

$includeGIEQsPro = [

    0 => 'Not included',
    1 => 'Included.  Subscription id # ' . $newsitewideSubscriptionid . '. Starts ' . $start_date_gieqs_online . ' Ends ' . $end_date_gieqs_online . '. ' . $sitewide_cancellation_string,



];


$emailVaryarray['registrationType'] = $registrationType[$symposium->getregistrationType()];
$emailVaryarray['includeGIEQsPro'] = $includeGIEQsPro[$symposium->getincludeGIEQsPro()];

$emailVaryarray['start_date'] = $start_date_user_readable;

$debug = false;

if ($debug){

    echo PHP_EOL;
    print_r($emailVaryarray);

}

foreach ($emailVaryarray as $key=>$value){

    $log[] = $key . ' - ' . $value . PHP_EOL;


}


//PRIOR TO MAIL SEND UPDATE THE COIN STATUS IF PRESENT
//MAKE DEFINITIVE


if ($debug){

    echo '<br/><br/>coin used in session meta was ' . $session['metadata']['coin_used'];
}

if ($session['metadata']['coin_used'] === true){

    $transaction_id_check = $userFunctions->returnRecentCoinTransactionUserSingle($userid, false);

    echo 'check for recent transactions finds <br/>';
    var_dump($transaction_id_check);
    echo '<br/><br/>';
   

    //to MAKE DEFINITIVE
            if ($transaction_id_check){

                //use id
                //then delete the required useractivity

                if ($debug){
                echo 'we detected a recent transaction with id ' . $transaction_id_check['transaction_id'];
                }
                $userActivity->Load_from_key($transaction_id_check['id']);
                $userActivity->setsession_id('DEFINITIVE_COIN_FROM_TEMP ' . $transaction_id_check['transaction_id']);
                $userActivity->prepareStatementPDOUpdate();
                
                if ($debug){
                echo ' this record in useractivity was renamed';

                }

            }else{

                if ($debug){

                echo 'no recent transaction to make definitive.  This is a problem!';

                }
            }



}

//$filename = '/assets/email/subscriptions/renewSubscriptionMail.php';

//$subject = 'Thank-you for Renewing Your Subscription on GIEQS Online';


$mail->CharSet = "UTF-8";
$mail->Encoding = "base64";
$mail->Subject = $subject;
$mail->setFrom('admin@gieqs.com', 'the GIEQs Foundation');
$mail->addAddress($emailVaryarray['email']);
$mail->msgHTML(get_include_contents(BASE_URI . $filename, $emailVaryarray));
$mail->AltBody = strip_tags((get_include_contents(BASE_URI . $filename, $emailVaryarray)));
$mail->preSend();
$mime = $mail->getSentMIMEMessage();
$mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');


require(BASE_URI . '/assets/scripts/individualMailerGmailAPIPHPMailer.php');



if ($debug){

    die();
}
//redirect to page with positive outcome

//$page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;


//new log file writing


$dataLogFile = implode(" - ", $log);

//Add a newline onto the end.
$dataLogFile .= PHP_EOL;

if ($debugPrint){

    var_dump($dataLogFile);
}


//Log the data to your file using file_put_contents.
$myfile = fopen(BASE_URI . '/pages/learning/scripts/subscriptions/paid_subscription_setup_log.log', "a");
fwrite($myfile, "\n New Log, at " . $current_date_sqltimestamp . "\n");
fwrite($myfile, $dataLogFile);
fclose($myfile);


//file_put_contents(BASE_URI . '/pages/learning/scripts/subscriptions/paid_subscription_setup_log.log', $dataLogFile, FILE_APPEND);



header("Location: $page");
die();



?>

