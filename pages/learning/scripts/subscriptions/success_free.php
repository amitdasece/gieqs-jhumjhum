<?php
$openaccess = 0;

$requiredUserLevel = 6;


error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';

$location = BASE_URL . '/index.php';

require(BASE_URI . '/assets/scripts/interpretUserAccess.php');


$general = new general;
$users = new users;
$users->Load_from_key($userid);


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;

require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;


require_once BASE_URI .'/scripts/config.php'; //KEY CODE TO REPLICATE

require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister ('class_loader');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer;



$debug = FALSE;

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

// Once the transaction has been approved, we need to complete it.
if (array_key_exists('paymentId', $_GET) && array_key_exists('PayerID', $_GET)) {
    $transaction = $gateway->completePurchase(array(
        'payer_id'             => $_GET['PayerID'],
        'transactionReference' => $_GET['paymentId'],
    ));
    $response = $transaction->send();
 
    if ($response->isSuccessful()) {
        // The customer has successfully paid.
        $arr_body = $response->getData();

        
        if ($debug){
        print("<pre>".print_r($arr_body, true)."</pre>");
        }
        //print_r($arr_body);
 
        $payment_id = $arr_body['id'];
        $payer_id = $arr_body['payer']['payer_info']['payer_id'];
        $payer_email = $arr_body['payer']['payer_info']['email'];
        $amount = $arr_body['transactions'][0]['amount']['total'];
        $currency = PAYPAL_CURRENCY;
        $payment_status = $arr_body['state'];
        $description = $arr_body['transactions'][0]['description'];
        $subscription_id = $arr_body['transactions'][0]['invoice_number'];

       // print_r($subscription_id);

 
        // Insert transaction data into the database

        if ($subscription->Return_row($subscription_id)){ //if the subscription already exist

            //we created a new subscription for the renewal
            //with the required term
            //store the paypal ref only, no personal details stored

            $subscription->Load_from_key($subscription_id);

            //now we just need to activate it

            //then reload the previous page with a popup that it was successful
    
            $subscription->setactive('1');
            $subscription->setgateway_transactionId($payment_id);
            
            
            if ($subscription->prepareStatementPDOUpdate() == 1){


            }else{

                //updating the subscription went wrong
                echo 'error in subscription updating';

            }
            

        }

        

        /* $isPaymentExist = $db->query("SELECT * FROM payments WHERE payment_id = '".$payment_id."'");
 
        if($isPaymentExist->num_rows == 0) { 
            $insert = $db->query("INSERT INTO payments(payment_id, payer_id, payer_email, amount, currency, payment_status) VALUES('". $payment_id ."', '". $payer_id ."', '". $payer_email ."', '". $amount ."', '". $currency ."', '". $payment_status ."')");
        } */
 
        echo "Payment is successful. Your transaction id is: ". $payment_id;

        
       


        
        
        //send mail

        //get required data

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

                $filename = '/assets/email/subscriptions/newSubscriptionCourse.php';
                $subject = 'Thank-you for Your GIEQs Online Course Purchase';
                $preheader = 'Your course awaits! Check out this mail for information on joining and catch-up. Thank you for your support of GIEQs Online';
                $page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;





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
        $emailVaryarray['cost'] = $amount . ' ' . $currency;
        $emailVaryarray['key'] = $users->getkey();
        $emailVaryarray['gateway_transactionId'] = $payment_id;
        $emailVaryarray['preheader'] = $preheader;
    

        
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
        header("Location: $page");
        die();




    } else {
        echo $response->getMessage();
    }
} else {
    echo 'Transaction is declined';
}