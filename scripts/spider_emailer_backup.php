<?php
session_start();
$openaccess = 1;

error_reporting(E_ALL);

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



//require_once BASE_URI .'/../scripts/config.php'; // KEY CODE TO REPLICATE

require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister ('class_loader');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer;



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


//SPIDER

//EMAILS



//ARE THERE EMAILS THAT HAVE NOT BEEN SENT



$allEmails = $emailLink->getActiveEmails();  //ACTIVE AND NOT LINKED

//$unlinkedMails = $userFunctions->getUnlinkedMails($allEmails);

//$emailsToSend = $emailLink->getUnsentEmails($audienceMembers);  //ACTIVE AND NOT LINKED

if (!($allEmails)){
    
    echo 'no emails to send';
    die();
}

if (count($allEmails) < 1){

    
    echo 'no emails to send';
    die();

}

$emailid = $allEmails[0]['id'];
$emails->Load_from_key($emailid);






//DATE HANDLING, WORK ONLY BETWEEN 0700 AND 2100 IN EUROPE

$serverTimeZoneNav = new DateTimeZone('Europe/Brussels'); //because this is where course is held
$currentNavTime = new DateTime('now', $serverTimeZoneNav);


//test time

    //$currentNavTime = new DateTime('2020-11-13 05:30:00', $serverTimeZoneNav);
    //$currentNavTime = new DateTime('2020-11-14 07:30:00', $serverTimeZoneNav);


if ($debug){
    
    print_r($currentNavTime);
    //$currentNavTime = new DateTime('2020-11-14 07:30:00', $serverTimeZoneNav);
    
}





$parameterStartTimeCET = new DateTime('06:30:00', $serverTimeZoneNav);
$parameterEndTimeCET = new DateTime('21:00:00', $serverTimeZoneNav);

if ($debug){
    
    print_r($parameterStartTimeCET);
        print_r($parameterEndTimeCET);

    //$currentNavTime = new DateTime('2020-11-14 07:30:00', $serverTimeZoneNav);
    
}

//$timeToSendMail = new DateTime('now', $serverTimeZoneNav);

if (($currentNavTime > $parameterStartTimeCET) && ($currentNavTime < $parameterEndTimeCET)){
   //if current time is within range on today


        //CREATE THE EMAIL FILE ONCE

        //$_GET['emailid'] = $emailid;

        //create a file
        ob_start();
        /* PERFORM COMLEX QUERY, ECHO RESULTS, ETC. */
        include(BASE_URI . '/assets/scripts/courses/generateEmailScript.php');
        
        $page = ob_get_contents();
        //$fakeArray = ['firstname' => ''];
        //$page = get_include_contents(BASE_URI . '/assets/scripts/courses/generateEmailScript.php', $fakeArray);

        ob_end_clean();
        $file = BASE_URI . '/assets/scripts/courses/generatedEmail.php';
        @chmod($file,0755);
        $fw = fopen($file, "w") or die ('Unable to open file for writing');
        fputs($fw,$page, strlen($page));
        fclose($fw);
        
        if ($debug){
            
            echo $file;
            
        }



        //set some basics FOR THE EMAIL
        $filename = $file;
        $email_id = $emails->getemail_id(); //unique id
        $subject = $emails->getsubject();
        $preheader = $emails->getpreheader();
        //$page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;

        
        

        
        
        
        //define the population

        $audience = $emailLink->getAudienceEmail($emailid, false);
        
        if ($debug){
        echo '<br><br>';
        print_r($audience);
        }

//create a value list for this
// 1 all users
// 2 services users
//3 Expanded Mailing List + Users (Mailing List Services)</option>
                                   /* <option value="4">Expanded Mailing List Only</option>
                                    <option value="5">Specific Course Recipients</option>
                                    <option value="6">Specific Recipients, Listed below, Comma separated</option>*///TODO
                                    
                                    
                                    //value is email address

if ($audience){

    if ($audience == '1'){
        
        if ($debug){
            
            echo '<br/><br/>Audience is All Users';
        }

        $audienceMembers = $userFunctions->getMailListAll(); 
    }else if ($audience == '2'){

        $audienceMembers = $userFunctions->getMailListServices(); 
        
         if ($debug){
            
            echo '<br/><br/>Audience is All Users opting for Service Mails';
        }

    }else if ($audience == '3'){

        $audienceMembers = $userFunctions->getMailListServices(); 
        //now add the emailList members
        $audienceMembersAdded = $userFunctions->getMailListExpandedNoOptOut();
        
         if ($debug){
            
            echo '<br/><br/>Expanded Mailing List + Users (Mailing List Services)';
        }

    }else if ($audience == '4'){

        $audienceMembers = $userFunctions->getMailListServices(); 
         //now add the emailList members
        $audienceMembersAdded = $userFunctions->getMailListExpandedNoOptOut();
        
         if ($debug){
            
            echo '<br/><br/>Expanded Mailing List Only';
        }

    }else if ($audience == '5'){
        
        //check audiencespecify is an integer
        
        

        $audienceMembers = $assetManager->getOwnersAssetPlainArray($emails->getaudience_specify());
        
         if ($debug){
             
             print_r($audienceMembers);
            
            echo '<br/><br/>Audience is All Users for course';
        }

    }else if ($audience == '6'){

        $audienceMembers = $emails->getaudience_specify();
        preg_match_all("/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)/gi", $audienceMembers, $matches);
        
         if ($debug){
            
            print_r($matches);
            echo '<br/><br/>Audience is Specific Recipients';
        }

    }else{

    $audienceMembers = $userFunctions->getMailListServices(); 

}


        $populationDenom = $audienceMembers;
        
        if ($debug){
            
            print_r($populationDenom);
            
        }

        $populationDenom = ['1']; //TEST REMOVE FOR LIVE

        $removePopulation = $userFunctions->getMailListAlreadyMailed($email_id);

        if (is_array($removePopulation)){

        $population_overall = array_diff($populationDenom, $removePopulation);

        $population = array_slice($population_overall, 0, 25);  

        }else{

            $population = array_slice($populationDenom, 0, 25);
        }
        
        

        
        
        //$population = ['1']; //TEST USER IDs

        

        if ($debug){
        
        print_r($population);

        }
        
        
        //test if is array
        
        if (count($population) == 0){
            
            //check email active = 0
        
        $emails->setactive('0');
        $emails->prepareStatementPDOUpdate();
        
        if ($debug){
        
        echo 'no users remaining';
        
        
        

        }
            
            die();
            
            
        }
        
        //if not stop
        
        

        foreach ($population as $key=>$value){


            //standard variables
            $users->Load_from_key($value);
            $emailVaryarray['firstname'] = $users->getfirstname();
            $emailVaryarray['surname'] = $users->getsurname();
            $emailVaryarray['email'] = $users->getemail();
            $email = $users->getemail();
            $emailVaryarray['key'] = $users->getkey();
            $emailVaryarray['preheader'] = $preheader;
        
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
            $mail->setFrom('admin@gieqs.com', 'GIEQs Online');
            $mail->addAddress($emailVaryarray['email']);
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


                require(BASE_URI . '/assets/scripts/individualMailerGmailAPIPHPMailer.php');
                echo 'email to ' . $emailVaryarray['firstname'] . ' ' . $emailVaryarray['surname'] . ' was sent. <br/><br/>'; 
                //track which user_id has received
                //emails received id, email_id, user_id
                $user_email->New_user_email($value, $email_id);
                $user_email->prepareStatementPDO();

            }

        }

    }else{//end if date is correct

        

            echo 'outside sending time parameter';

        
    } 

    
    
        
    
}
        
    




   
