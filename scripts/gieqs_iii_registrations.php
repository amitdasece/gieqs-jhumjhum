<?php
error_reporting(E_ALL);
echo 'hello';
session_start();
$openaccess = 1;

echo 'hello';



//echo 'hello';
//echo 'hello2';

    define('BASE_URI', '/home/u8l2e829uoi9/public_html');

    define('BASE_URL', 'https://www.gieqs.com');


$location = BASE_URL . '/index.php';

//require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$_SESSION['debug'] = FALSE;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(BASE_URI . '/assets/scripts/classes/general.class.php');
$general = new general;
require_once(BASE_URI . '/assets/scripts/classes/users.class.php');
$users = new users;



require_once(BASE_URI . '/assets/scripts/classes/programme.class.php');
$programme = new programme;
require_once(BASE_URI . '/assets/scripts/classes/sessionView.class.php');
$sessionView = new sessionView;
require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;




//$users->Load_from_key($userid);
require_once(BASE_URI . '/assets/scripts/classes/userFunctions.class.php');
$userFunctions = new userFunctions;


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;

/* require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions; */

require_once(BASE_URI . '/assets/scripts/classes/user_email.class.php');
$user_email = new user_email;

require_once(BASE_URI . '/assets/scripts/classes/emails.class.php');
$emails = new emails;
require_once(BASE_URI . '/assets/scripts/classes/emailLink.class.php');
$emailLink = new emailLink;

require_once BASE_URI . '/assets/scripts/classes/symposium_manager.class.php';
$symposium_manager = new symposium_manager;

require_once BASE_URI . '/assets/scripts/classes/symposium.class.php';
$symposium = new symposium;


//require_once BASE_URI .'/../scripts/config.php'; // KEY CODE TO REPLICATE

require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister ('class_loader');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer;



$debug = FALSE;

if ($debug){

    error_reporting(E_ALL);
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

//create a file
ob_start();
/* PERFORM COMLEX QUERY, ECHO RESULTS, ETC. */
include(BASE_URI . '/pages/learning/scripts/subscriptions/count_registration_gieqs_iii.php');

$page = ob_get_contents();
//$fakeArray = ['firstname' => ''];
//$page = get_include_contents(BASE_URI . '/assets/scripts/courses/generateEmailScript.php', $fakeArray);

ob_end_clean();

if ($debug){
    
    echo $page;
    
}



        //set some basics FOR THE EMAIL
        $filename = BASE_URI . '/assets/email/subscriptions/free_gieqs_upgrade.php';
        $email_id = 'GIEQs III Registration Update'; //unique id
        $subject = 'GIEQs III Registration Update. CONFIDENTIAL.';
        $preheader = 'Latest Data for GIEQs III Registrations Included';

        


            //standard variables
            //$users->Load_from_key($value);
            //$emailVaryarray['firstname'] = $users->getfirstname();
            //$emailVaryarray['surname'] = $users->getsurname();
            $emailVaryarray['text'] = $page;
            //$email = $value;
            //$emailVaryarray['key'] = $email;
            //$emailVaryarray['preheader'] = $preheader;
        
            //other variables specific for this script
           /*  $currency = 'Euro';
            if ($users->gettimezone()){

                $timezone = $users->gettimezone();
            }else{
    
                $timezone = 'UTC';
            }
            $subscription->Load_from_key($assetManager->get_subscription_id_asset($assetid, $value));
            $end_date = new DateTime($subscription->getexpiry_date(), new DateTimeZone($timezone));
            $end_date_user_readable = date_format($end_date, 'd/m/Y');

            $emailVaryarray['assetid'] = $assets_paid->getid();
            $emailVaryarray['asset_name'] = $assets_paid->getname();
            $emailVaryarray['programme_date'] = date_format($courseDateFull, 'd/m/Y'); //from programme array
            $emailVaryarray['subscription_id'] = $assetManager->get_subscription_id_asset($assetid, $value); //from sub_asset_paid using assetid and userid
            $emailVaryarray['programme_start_time'] = $courseDateFull_user_readable; //from programme array above
            $emailVaryarray['asset_type'] = $assetManager->getAssetTypeText($assets_paid->getasset_type());
            $emailVaryarray['renew_frequency'] = $assets_paid->getrenew_frequency();;
            $emailVaryarray['cost'] = $assets_paid->getcost() . ' ' . $currency;
            $emailVaryarray['expiry_date'] = $end_date_user_readable; //from subscription see success.php
 */



            
            if ($debug){

                echo PHP_EOL;
                print_r($emailVaryarray);

            }

         

            $mail->ClearAllRecipients();
            $mail->CharSet = "UTF-8";
            $mail->Encoding = "base64";
            $mail->Subject = $subject;
            $mail->setFrom('admin@gieqs.com', 'GIEQs');
            $mail->addAddress('djtate@gmail.com');
            $mail->msgHTML(get_include_contents($filename, $emailVaryarray));
            $mail->AltBody = strip_tags((get_include_contents($filename, $emailVaryarray)));
            $mail->preSend();
            $mime = $mail->getSentMIMEMessage();
            $mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');


           

            

            
            if ($debug){
                
                //print_r($mail);

                echo('email would now be sent');

                //print_r($mime);
                
            }else{


                require(BASE_URI . '/assets/scripts/individualMailerGmailAPIPHPMailer.php');  //ENABLE FOR LIVE
                echo 'email sent. <br/><br/>'; 
                
                //track which user_id has received
                //emails received id, email_id, user_id
                
                

            }

        

    
        
    

        
    




   
