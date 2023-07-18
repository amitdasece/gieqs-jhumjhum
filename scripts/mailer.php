<?php
$openaccess = 1;
die();

error_reporting(E_ALL);
die(); //test remove

echo 'hello';
//require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/config.inc.php';
echo 'hello2';

    define('BASE_URI', '/home/u8l2e829uoi9/public_html');

    define('BASE_URL', 'https://www.gieqs.com');


$location = BASE_URL . '/index.php';

//require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$_SESSION['debug'] = false;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(BASE_URI . '/assets/scripts/classes/general.class.php');
$general = new general;
require_once(BASE_URI . '/assets/scripts/classes/users.class.php');
$users = new users;
//$users->Load_from_key($userid);
require_once(BASE_URI . '/assets/scripts/classes/userFunctions.class.php');
$userFunctions = new userFunctions;


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;

require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;

require_once(BASE_URI . '/assets/scripts/classes/user_email.class.php');
$user_email = new user_email;


//require_once BASE_URI .'/../scripts/config.php'; // KEY CODE TO REPLICATE

require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister ('class_loader');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer;



$debug = TRUE;

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


        //set some basics FOR THE EMAIL

        $filename = '/assets/email/subscriptions/free_gieqs_upgrade.php';
        $email_id = 'free_gieqs_upgrade';
        $subject = 'A gift to say thanks for joining GIEQs Digital';
        $preheader = 'This morning we activated another month of GIEQs Digital online access for your account.  To beat the COVID blues!';
        //$page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;

        //define the population

        $populationDenom = $userFunctions->getMailListServices(); // LIVE SERVICE ONLY
        
         $populationDenom = $userFunctions->getMailListAll(); // LIVE SERVICE ONLY

        $removePopulation = $userFunctions->getMailListAlreadyMailed($email_id);

        if (is_array($removePopulation)){

        $population_overall = array_diff($populationDenom, $removePopulation);

        $population = array_slice($population_overall, 0, 25);  

        }else{

            $population = array_slice($populationDenom, 0, 25);
        }

        //$population = ['1', '5', '10', '11', '23']; //TEST USER IDs

        //$population = ['1']; //blank while the script is on the server

        if ($debug){
        
        print_r($population);

        }

        foreach ($population as $key=>$value){

            $users->Load_from_key($value);
            $emailVaryarray['firstname'] = $users->getfirstname();
            $emailVaryarray['surname'] = $users->getsurname();
            $emailVaryarray['email'] = $users->getemail();
            $email = $users->getemail();
            $emailVaryarray['key'] = $users->getkey();
            $emailVaryarray['preheader'] = $preheader;
        

            
            if ($debug){

                echo PHP_EOL;
                print_r($emailVaryarray);

            }

            //$filename = '/assets/email/subscriptions/renewSubscriptionMail.php';
    
            //$subject = 'Thank-you for Renewing Your Subscription on GIEQS Online';

            $mail->ClearAllRecipients();
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


           

            

            
            if ($debug){

                echo('email would now be sent');

                //print_r($mime);
                
            }else{


                require(BASE_URI . '/assets/scripts/individualMailerGmailAPIPHPMailer.php');
                echo 'email to ' . $emailVaryarray['firstname'] . ' ' . $emailVaryarray['surname'] . ' was sent. <br/><br/>'; 
                //track which user_id has received
                //emails received id, email_id, user_id
                $user_email->New_user_email($value, $email_id);
                $user_email->prepareStatementPDO();

            }

        } 

    

        
    

        
    




   
