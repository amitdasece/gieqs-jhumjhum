<?php
header('Access-Control-Allow-Origin: *');
$openaccess = 0;

//must have a user account

$requiredUserLevel = 6;



//error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';


$location = BASE_URL . '/index.php';

require_once(BASE_URI . '/assets/scripts/interpretUserAccess.php');




$general = new general;
$users = new users;
$users->Load_from_key($userid);


error_reporting(0);

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

require_once BASE_URI . '/assets/scripts/classes/userFunctions.class.php';
$userFunctions = new userFunctions;


//error_reporting(E_ALL);
require_once BASE_URI .'/scripts/config.php';
//check the user is logged in
//check the correct user
//check the subscription exists

require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister ('class_loader');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer;



$debug = false;

if ($debug){

    error_reporting(E_ALL);
    //var_dump($GLOBALS);
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

$data = json_decode(file_get_contents('php://input'), true);

if ($debug){

print_r($data);

}

if (isset($data['subscription_id'])){

    $subscription_id = $data['subscription_id'];


}

if (isset($data['asset_id'])){

    $asset_id = $data['asset_id'];


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

$coin_used = true;



if (isset($asset_id)){

//get the required asset data

//old subscription
$subscription_to_return = array();

//already has subscription?

if ($assetManager->doesUserHaveSameAssetAlready($asset_id, $userid, false)){ //if a subscription to this asset already exists

    echo 'You already own this asset and it is active, so you can\'t purchase it again. <br/>';
    echo 'Return <a href="www.gieqs.com">home</a>';
    $returnArray['error'] = 1;    
    echo json_encode($returnArray);

    die();

}



$assets_paid->Load_from_key($asset_id);



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

    $end_start_calculate_date->add(new DateInterval($interval));
    
    $end_date_sqltimestamp = date_format($end_start_calculate_date, 'Y-m-d H:i:s');

    //check there are tokens remaining for this asset

    if ($coin_used){

        if ($debug){

            echo 'detected gieqs coin used so no need to check tokens';
        }

        $subscription->New_subscriptions($userid, $subscription_to_return['asset_id'], $current_date_sqltimestamp, $end_date_sqltimestamp, '1', '0', 'FULL COIN PAYMENT SUBSCRIPTION NO EURO PAYMENT');

        if ($debug){
        var_dump($subscription);

        }

        $newSubscriptionid = $subscription->prepareStatementPDO();



    }else{


        if ($debug){

            echo 'did not detect gieqs coin used so check tokens';
        }

        if ($assetManager->checkTokensRemainingAsset($asset_id, false) == true){

            $subscription->New_subscriptions($userid, $subscription_to_return['asset_id'], $current_date_sqltimestamp, $end_date_sqltimestamp, '1', '0', 'TOKEN SUBSCRIPTION NO PAYMENT');

            $newSubscriptionid = $subscription->prepareStatementPDO();

    
    
        }else{
    
            echo 'Error, no tokens remaining for this asset.  Please contact us and quote this error';
            die();
    

        
        }

    }




    //record which user is doing this in user activity

    //error if no tokens remaining


//working but sort out the interaction   
//die();


    if ($newSubscriptionid > 0){

        //decrease by 1 the number of tokens remaining for this assset which was freely generated

        //get the token id

        //$tokenid = $assetManager->getTokenid($asset_id);

        $date = new DateTime('now', new DateTimeZone('UTC'));
		$sqltimestamp = date_format($date, 'Y-m-d H:i:s');


        //New_userActivity($user_id,$session_id,$login_time,$activity_time)
        $userActivity->New_userActivity($userid, 'GIEQS_COIN_PURCHASE_FULL ('. $subscription_to_return['cost'] . ' GIEQS COIN PAID) SUBSCRIPTION_ID_' . $newSubscriptionid, null, $sqltimestamp);
        
		$userActivity->prepareStatementPDO();




        //decrease tokens by 1

        //$token->Load_from_key($tokenid);
        //$remaining = $token->getremaining();

        //$new_remaining = intval($remaining) - 1;

        //$token->setremaining($new_remaining);
        //$token->prepareStatementPDOUpdate();




        //inserted from success.php , modified here does not modify there

        $subscription_id = $newSubscriptionid;

        $asset_id = $assetManager->getAssetid($subscription_id);

        $assets_paid->Load_from_key($asset_id);



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

            if ($asset_type == '1'){ //site wide

                $filename = '/assets/email/subscriptions/renewSubscriptionMail.php';  //to change
                $subject = 'Thank-you for Your Subscription on GIEQS Online';
                $preheader = 'Your new subscription awaits!  Thank you for your support of GIEQs Online';
                $page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;


            }else if ($asset_type == '2'){ //GIEQs Congress Subscription
                
                $filename = '/assets/email/subscriptions/renewSubscriptionMail.php';
                $subject = 'Thank-you for Your Subscription on GIEQS Online';
                $preheader = 'Your new subscription awaits!  Thank you for your support of GIEQs Online';
                $page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;




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

        //make coin transaction definitive

        $transaction_id_check = $userFunctions->returnRecentCoinTransactionUserSingle($userid, false);

    if ($debug){
        echo 'check for recent transactions finds <br/>';
    var_dump($transaction_id_check);
    echo '<br/><br/>';

    }
   

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
        $emailVaryarray['cost'] = '&euro; 0 via GIEQS COIN ('. $subscription_to_return['cost'] . ' GIEQS COIN PAID)';
        $emailVaryarray['key'] = $users->getkey();
        $emailVaryarray['gateway_transactionId'] = 'FULL GIEQS COIN PAYMENT ('. $subscription_to_return['cost'] . ' GIEQS COIN PAID) SUBSCRIPTION NO EURO PAYMENT';
        $emailVaryarray['preheader'] = $preheader;
    

        
        if ($debug){

            echo PHP_EOL;
            print_r($emailVaryarray);

        }

        //die();


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
        
        $returnArray['redirect'] = $page;
        $returnArray['complete'] = true;

        echo json_encode($returnArray);
        
        //header("Location: $page");
        //die();



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

 
