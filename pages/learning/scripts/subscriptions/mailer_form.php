<?php
$openaccess = 0;

$requiredUserLevel = 1;


error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';

$location = BASE_URL . '/index.php';

require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

//$_SESSION['debug'] = true;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$general = new general;
$users = new users;
//$users->Load_from_key($userid);
$userFunctions = new userFunctions;


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;

require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;

require_once(BASE_URI . '/assets/scripts/classes/user_email.class.php');
$user_email = new user_email;


//require_once BASE_URI .'/../scripts/config.php'; //KEY CODE TO REPLICATE

require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister ('class_loader');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer;



$debug = true;

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

?>
<form id="mail" action="mailer_formbased.php" method ="post">

Subject : <textarea type="text" name="subject"></textarea>
<br/><br/>
Preheader : <textarea type="text" name="preheader"></textarea>
<br/><br/>
Email_id : <input type="text" name="email_id">
<br/><br/>
File to attach : <input type="file" name="filename">
<br/><br/>
Frequency to attempt send : 
<select name="frequency">
<option hidden selected>select send frequency</option>
<option>1 min</option>
<option>5 min</option>
<option>20 min</option>
</select>

<br/><br/><input type="submit" name="submit_email">





</form>


<?php
        //set some basics FOR THE EMAIL

        $filename = '/assets/email/courses/basic_colon/first_teaser.php';
        $email_id = 'first_teaser';
        $subject = 'GIEQs Basic Colonoscopy Skills Course';
        $preheader = 'Limited endoscopy education because of COVID-19?  Try our new virtual / live hybrid courses';
        //$page = BASE_URL . '/pages/learning/pages/account/billing.php?showresult=' . $subscription_id;

        //define the population

        /* $populationDenom = $userFunctions->getMailListServices(); // LIVE

        $removePopulation = $userFunctions->getMailListAlreadyMailed($email_id);

        if (is_array($removePopulation)){

        $population_overall = array_diff($populationDenom, $removePopulation);

        $population = array_slice($population_overall, 0, 25);  

        }else{

            $population = array_slice($populationDenom, 0, 25);
        } */   //LIVE COMMENT

        //$population = ['1', '5', '10', '11', '23']; //TEST USER IDs

        $population = ['1']; //blank while the script is on the server

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


                //require(BASE_URI . '/assets/scripts/individualMailerGmailAPIPHPMailer.php');
                echo 'email to ' . $emailVaryarray['firstname'] . ' ' . $emailVaryarray['surname'] . ' was sent. <br/><br/>'; 
                //track which user_id has received
                //emails received id, email_id, user_id
                
                //$user_email->New_user_email($value, $email_id);
                //$user_email->prepareStatementPDO();

            }

        } 

    

        
    

        
    




   
