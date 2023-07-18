<?php
header('Access-Control-Allow-Origin: *');
$openaccess = 0;

//must have a user account

$requiredUserLevel = 6;




require_once '../../../../assets/includes/config.inc.php';


$location = BASE_URL . '/index.php';


require_once(BASE_URI . '/assets/scripts/interpretUserAccess.php');




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

require_once(BASE_URI . '/assets/scripts/classes/token.class.php');
$token = new token;

require_once(BASE_URI .'/assets/scripts/classes/userActivity.class.php');

$userActivity = new userActivity;

require_once BASE_URI . '/assets/scripts/classes/programme.class.php';
$programme = new programme;

require_once BASE_URI . '/assets/scripts/classes/userFunctions.class.php';
$userFunctions = new userFunctions;

require_once BASE_URI . '/assets/scripts/classes/symposium.class.php';
$symposium = new symposium;

require_once BASE_URI . '/pages/learning/includes/give_asset_functions.inc.php';

//echo "before";

//error_reporting(E_ALL);
require_once BASE_URI .'/scripts/config.php';
//check the user is logged in
//check the correct user
//check the subscription exists
// echo "after";
// exit;
require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister ('class_loader');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer;

$data = json_decode(file_get_contents('php://input'), true);


$debug = false;

if ($debug){

    error_reporting(E_ALL);
    print_r($data);
}else{
    error_reporting(0);

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



if (isset($data['subscription_id'])){

    $subscription_id = $data['subscription_id'];


}

if (isset($data['asset_id'])){

    $asset_id = $data['asset_id'];

    if ($debug){

        echo 'asset id set';
    }

}

if (isset($data['cipher_hidden'])){

    $cipher_hidden = $data['cipher_hidden'];


    if ($debug){

        echo '<br/><br/> Cipher Hidden is ' . $cipher_hidden;

    }

    //do the token math

    $token_from_cipher = $assetManager->getTokenidfromCipher($cipher_hidden, false);

    $is_pro_subscriber = false;

    if ($token_from_cipher === false){

        //options this is an invalid token

        //or it is a pro subscriber

        if ($userid){
            if ($isSuperuser == 1){
            
              $fullAccess = true;
              $proMember = false;
            
            }elseif ($sitewide_status == 2){ //PRO subscription
            
              $fullAccess = true;
              $proMember = true;
            
            }else{
            
              $fullAccess = false;
              $proMember = false;
            }
            }else{
            
              $fullAccess = false;
              $proMember = false;
            }
        
            if ($fullAccess === true || $proMember === true){


                $is_pro_subscriber = true;


            }else{

                $is_pro_subscriber = false;
            }


    }

                                if (is_numeric($token_from_cipher)){

                               $token->Load_from_key($token_from_cipher);

                               // get if institutional

                               $institutional_id = $token->getinstitutional_id();

                               //get length 

                               $token_length = $token->getlength();

                               //make some booleans

                               if ((!isset($institutional_id)) || $institutional_id === NULL || $institutional_id == 0){

                                $is_institutional = false;

                               }elseif (isset($institutional_id) && is_numeric($institutional_id)) {

                                $is_institutional = true;

                               }else{

                                $is_institutional = false;

                               }

                               

                               if ($debug){

                                echo 'We detected a valid access code ' . $cipher_hidden;
                                echo '<br><br>';
                                var_dump($is_institutional);
                                echo 'Is_Institutional = : ' . $is_institutional;
                                echo '<br><br>';
                                echo 'Institutional id was  : ' . $institutional_id;
                                echo '<br><br>';
                                echo 'Token length id was  : ' . $token_length;


                               }
                            }else{

                                if ($debug){

                                    echo 'Issue with the token loading';
                                }

                            }



}

//TODO add security check of token here

//if both are set reject

if (isset($subscription_id) && isset($asset_id)){

    if ($debug){

        echo 'both subscription id and asset id set';
    }

    die();
}

if (!isset($subscription_id) && !isset($asset_id)){

    if ($debug){

        echo 'neither subscription id or asset id set';
    }

    die();
}



//die();



if (isset($asset_id)){

//get the required asset data

//old subscription
$subscription_to_return = array();

//already has subscription?

if ($assetManager->doesUserHaveSameAssetAlready($asset_id, $userid, false)){ //if a subscription to this asset already exists

    echo 'You already own this asset and it is active, so you can\'t purchase it again';
    echo 'Return <a href="www.gieqs.com">home</a>';
    die();

}



$assets_paid->Load_from_key($asset_id);

if ($debug){

    echo 'asset dump is ';
    var_dump($assets_paid);

}


$subscription_to_return['asset_name'] = $assets_paid->getname();
$subscription_to_return['asset_type'] = $assetManager->getAssetTypeText($assets_paid->getasset_type());
$subscription_to_return['asset_id'] = $assets_paid->getid();

$subscription_to_return['cost'] = $assets_paid->getcost();
$subscription_to_return['description'] = $assets_paid->getdescription();
$subscription_to_return['renew_frequency'] = $assets_paid->getrenew_frequency();

$subscription_to_return['user_id'] = $userid;

//make a new subscription

//new subscription
    //ADD THE RENEW FREQUENCY TO THE DATE TODAY PLUS COURSE DATE



    //START DATE NOW

    $current_date = new DateTime('now', new DateTimeZone('UTC'));

    $current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s');

    if ($users->gettimezone()){

        $timezone = $users->gettimezone();

    }else{

        $timezone = 'UTC';
    }

    if (isset($data['course_date'])){

        $course_date = new DateTime($data['course_date'], new DateTimeZone('UTC'));

        //$end_start_calculate_date = new DateTime($data['course_date'], new DateTimeZone('UTC'));

        if ($current_date >= $course_date){

            $end_start_calculate_date = new DateTime('now', new DateTimeZone('UTC'));

        }else{


            $end_start_calculate_date = $course_date;

        }

    }else{

        $end_start_calculate_date = new DateTime('now', new DateTimeZone('UTC'));
        
    }

    //$end_date = new DateTime($subscription_to_return['expiry_date'], new DateTimeZone('UTC'));

    $interval = 'P' . $subscription_to_return['renew_frequency'] . 'M';

    if ($is_institutional){

        if (isset($token_length) && is_numeric($token_length)){

         $interval = 'P' . $token_length . 'M';

        }

    }

    $end_start_calculate_date->add(new DateInterval($interval));
    
    $end_date_sqltimestamp = date_format($end_start_calculate_date, 'Y-m-d H:i:s');

    //check there are tokens remaining for this asset

    //$tokenid = $assetManager->getTokenid($asset_id); OLD LINE

    $tokenid = $token->getid();

    if ($is_institutional){

        $text = 'TOKEN_PURCHASE TOKEN_ID='. $tokenid . ' INSTITUTIONAL_ID='. $institutional_id;
    }elseif ($is_pro_subscriber === true){

        $text = 'TOKEN_PURCHASE TOKEN_ID=PRO_SUBSCRIPTION';

    }else{

        $text = 'TOKEN_PURCHASE TOKEN_ID='. $tokenid;


    }

  
    
    $subscription->New_subscriptions($userid, $subscription_to_return['asset_id'], $current_date_sqltimestamp, $end_date_sqltimestamp, '1', '0', $text);

    

    //record which user is doing this in user activity

    

    //error if no tokens remaining

    $newSubscriptionid = $subscription->prepareStatementPDO();

    



    if ($newSubscriptionid > 0){

        //decrease by 1 the number of tokens remaining for this assset which was freely generated

        //get the token id


        $date = new DateTime('now', new DateTimeZone('UTC'));
		$sqltimestamp = date_format($date, 'Y-m-d H:i:s');


        //New_userActivity($user_id,$session_id,$login_time,$activity_time)
        

        $userActivity->New_userActivity($userid, $text, null, $sqltimestamp);
        
		$userActivity->prepareStatementPDO();

        //decrease tokens by 1

        $token->Load_from_key($tokenid);
        $remaining = $token->getremaining();

        $new_remaining = intval($remaining) - 1;

        if ($debug){

            echo '<br/>Token id was '. $tokenid;
            echo '<br/>remaining was ' . $remaining . 'and is now ' . $new_remaining;

        }

        if ($new_remaining == 0){

            $assetManager->zero_token($tokenid);
            //workaround since 0 does not update the class

        }else{

        $token->setremaining($new_remaining);

        //var_dump($token);
        $token->prepareStatementPDOUpdate();


        }
        
        //check if a pro subscription
        //if so make sure they have access to the pro assets





        //inserted from success.php , modified here does not modify there

        $subscription_id = $newSubscriptionid;

        $asset_id = $assetManager->getAssetid($subscription_id);

        $assets_paid->Load_from_key($asset_id);

        if ($assetManager->isSitewidePRO($asset_id) === true){

            //do stuff to give the assets, //check this

            require_once BASE_URI . '/pages/learning/includes/give_asset_functions.inc.php';


            $log = [];

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
            //again set the interval from token if present
            if ($is_institutional){

                if (isset($token_length) && is_numeric($token_length)){
        
                 $interval = 'P' . $token_length . 'M';
        
                }
        
            }

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

            if ($asset_type == '1'){ //site wide

                $filename = '/assets/email/subscriptions/renewSubscriptionMail.php';
                $subject = 'Thank-you for Renewing Your Subscription on GIEQS Online';
                $preheader = 'Your subscription has been renewed.  Thank you for your support of GIEQs Online';
                $page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;



            }else if ($asset_type == '2'){ //GIEQs Congress Subscription

                $filename = '/assets/email/subscriptions/gieqs_iii_onboarding.php';
                $subject = 'Thank-you for Your GIEQs III Registration';
                $preheader = 'Your congress subscription was successful!  Thank you for your support of GIEQs';
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

            if ($asset_type == '1'){ //site wide

                $filename = '/assets/email/subscriptions/renewSubscriptionMail.php';  //to change
                $subject = 'Thank-you for Your Subscription on GIEQS Online';
                $preheader = 'Your new subscription awaits!  Thank you for your support of GIEQs Online';
                $page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;


            }else if ($asset_type == '2'){ //GIEQs Congress Subscription
                
                $filename = '/assets/email/subscriptions/gieqs_iii_onboarding.php';
                $subject = 'Thank-you for Your GIEQs III Registration';
                $preheader = 'Your congress subscription was successful!  Thank you for your support of GIEQs';
                $page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;

                $symposium_id = $userFunctions->getSymposiumidUserid($userid, false);

                //$debug = true;

                $sitewide_cancellation_string = null;

                if ($symposium_id != false){

                    $symposium->Load_from_key($symposium_id);
        
                    //update the final registration date //DEFINE DATES
                    //today
                    $current_date = new DateTime('now', new DateTimeZone('UTC'));
                    $current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s');
        
        
                    $symposium->setfull_registration_date($current_date_sqltimestamp);
                    $symposium->setpartial_registration('0');
        
                    $symposium->prepareStatementPDOUpdate();
        
                    if ($symposium->getincludeGIEQsPro() == '1'){ 
                        
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
                                            
                                    
                                              if ($debug){
                                              //print_r($old_subscription_status);
                                              //die();
                                            }
        
                                        } catch (\Throwable $th) {
                                        
                                            //stripe doesn't recognise this id, simply inactivate the subscription since we already matched it and are planning to create a new one from now
                                            $subscription->setauto_renew('0');
                                
                                                $subscription->setactive('0');
                                
                                                $subscription->prepareStatementPDOUpdate();
                    
                                                if ($debug){
                                                echo 'Old subscription cancelled';
                    
                                                }
        
                                                $userActivity->New_userActivity($userid, 'CANCEL_SUB_SYMPOSIUM ID ' . $sitewidesubscriptonid, null, $current_date_sqltimestamp);
                                                $userActivity->prepareStatementPDO();
        
                                                $sitewide_cancellation_string = 'Old GIEQs Online subscription ID #' . $sitewidesubscriptonid . ' was cancelled and prorata refund requested via Stripe.  Please verify you have received a refund.';
        
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
        
        
                        $subscription->New_subscriptions($userid, $registrationTypeConverter[$symposium->getregistrationType()], $current_date_sqltimestamp, $end_date_sqltimestamp, '1', '0', $text);
        
                        $newsitewideSubscriptionid = $subscription->prepareStatementPDO();
        
                        if ($newsitewideSubscriptionid > 0){
        
                            if ($debug){
        
                                echo 'New subscription (sitewide) setup with id ' . $newsitewideSubscriptionid;
        
                            }
        
                            $log=[];
        
                            if ($assetManager->isSitewidePRO($registrationTypeConverter[$symposium->getregistrationType()]) === true){
        
                                //do stuff to give the assets, //check this
                            
                               
                            
                                $log = [];
                            
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
                            
                                        $log[] = 'User no ' . $defined_userid . ' does not currently own asset ' . $assetvalue;
                            
                            
                                    $subscription->New_subscriptions($defined_userid, $assetvalue, $current_date_sqltimestamp, $end_date_sqltimestamp, '1', '0', 'TOKEN_ID=PRO_SUBSCRIPTION');
                            
                                    $newSubscriptionid = $subscription->prepareStatementPDO();
                            
                                    //$newSubscriptionid = ' fake subscription id';
                            
                            
                                    $log[] = 'User no ' . $defined_userid . ' granted access to assetid ' . $assetvalue . '. New subscription no = ' . $newSubscriptionid;
                            
                            
                                    }else{
                                        
                                        $log[] = 'User no ' . $defined_userid . ' already owns asset ' . $assetvalue;
                                        
                                        //get the asset
                                        //update the end date to the end date of this subscription
                                        $subscription_to_update = $assetManager->get_subscription_id_asset($assetvalue, $defined_userid, false);
                                        $log[] = 'The subscription id is ' . $subscription_to_update;
                                        $subscription->Load_from_key($subscription_to_update);
                                        $subscription->setexpiry_date($end_date_sqltimestamp);
                                        $log[] = 'Updated end date to ' . $end_date_sqltimestamp;
                                        $subscription->prepareStatementPDOUpdate();
                            
                            
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
        
                }


            }else if ($asset_type == '3'){ //GIEQs Virtual / Live Course

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



            }

        }






        if ($users->gettimezone()){

            $timezone = $users->gettimezone();
        }else{

            $timezone = 'UTC';
        }

        $end_date = new DateTime($subscription->getexpiry_date(), new DateTimeZone($timezone));

        $end_date_user_readable = date_format($end_date, 'd/m/Y');
    
    

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
        $emailVaryarray['cost'] = '&euro; 0 via FREE CODE';
        $emailVaryarray['key'] = $users->getkey();
        $emailVaryarray['gateway_transactionId'] = $text;
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

        
        if ($debug){

            echo PHP_EOL;
            print_r($emailVaryarray);

        }

        //$filename = '/assets/email/subscriptions/renewSubscriptionMail.php';
 
        //$subject = 'Thank-you for Renewing Your Subscription on GIEQS Online';


        $mail->CharSet = "UTF-8";
        $mail->Encoding = "base64";
        $mail->Subject = $subject;
        $mail->setFrom('admin@gieqs.com', 'GIEQs Online');
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
        
        $return_array = ['page'=>true, 'page_url'=>$page];
        echo json_encode($return_array);
        die();
        



    }else{  //no new subscription created

        if ($debug){

            echo 'Could not create the subscription';

        }


    }


}else{

    if ($debug){
        echo 'Asset does not exist';
        }
}

 
