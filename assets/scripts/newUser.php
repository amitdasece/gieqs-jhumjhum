<?php
header('Access-Control-Allow-Origin: *');
//error_reporting(E_ALL);
//;
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
$openaccess = 1;
//echo 'hello';
//$requiredUserLevel = 4;
//require '../../assets/includes/config.inc.php';
require ('../../assets/includes/config.inc.php');	
//echo 'hello2';
require BASE_URI . '/assets/scripts/headerScript.php';

//echo 'hello3';sss
$general = new general;
$users = new users;
$userFunctions = new userFunctions;
//echo 'hello4';

function ne($v)
{
    return $v != '';
}

//$debug = true;
//$_SESSION['debug'] = true;
$explicit = true;
//echo 'hello';

require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister('class_loader');

use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPMailer;

function get_include_contents($filename, $variablesToMakeLocal)
{
    extract($variablesToMakeLocal);
    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}

$data = json_decode(file_get_contents('php://input'), true);

if ($debug) {

    //print_r($data);

}

//check count of get variables

if (count($data) > 0) {

    //check the user does not exist

    $desiredUserName = $data['email'];

    $userExists = $userFunctions->userExists($desiredUserName);

    if (!($userExists)) {

        $ip = $_SERVER['REMOTE_ADDR'];
        $ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
        $ipInfo = json_decode($ipInfo);
        $timezone = $ipInfo->timezone;

        if ($debug) {

            //echo $timezone;

        }
/* date_default_timezone_set($timezone);
echo date_default_timezone_get();
echo date('Y/m/d H:i:s'); */

        $users->setemail($data['email']);
        $users->setfirstname($data['firstname']);
        $users->setsurname($data['surname']);
        $users->setgender($data['gender']);
        $users->setaccess_level(7); // user level 7 requires an email confirm
        $users->settimezone($timezone);
        $users->setcentreCountry($data['centreCountry']);
        $users->setendoscopistType($data['endoscopistType']);
        //var_dump($data);
        $users->settrainee('1');
        //echo 'hello';


        

        if (isset($data['checkMail'])){
            

                $users->setemailPreferences('1');
                $users->setemailAccount('1');
                $users->setemailServices('1');


            

         }else{

            $users->setemailPreferences('0');
            $users->setemailAccount('0');
            $users->setemailServices('0');


        } 



        $key = $userFunctions->generateRandomString('10');
        $users->setkey($key);
        $desiredPassword = $general->hash_password($data['password'], 'westmead');
        $users->setpassword($desiredPassword);

        

        if ($users->prepareStatementPDO() > 0) {

            $emailWorked = null;
            $reason = null;

            echo 'Your User Account was created.  Check your email for a link to login';

            //generate an initial login link
            $emailVaryarray['firstname'] = $data['firstname'];
            $emailVaryarray['surname'] = $data['surname'];
            $emailVaryarray['email'] = $data['email'];
            //$email = array(0 => $data['email']); //old
            $email = $data['email'];
            $emailVaryarray['key'] = $key;
            
            if (isset($data['access_token'])){

                $filename = '/assets/email/emailNewAccountHook.php';
                $emailVaryarray['signup_redirect'] = $data['signup_redirect'] . '&access_token=' . $data['access_token'];


            }elseif (isset($data['signup_redirect'])){

                if (is_numeric($data['signup_redirect']) === true){

                    if (isset($data['access_token'])){

                        $filename = '/assets/email/emailNewAccountHook.php';
                        $emailVaryarray['signup_redirect'] = $data['signup_redirect'] . '&access_token=8874101655';

                    }else{

                    $filename = '/assets/email/emailNewAccountHook.php';
                    $emailVaryarray['signup_redirect'] = $data['signup_redirect'];

                    }

                }elseif ($data['signup_redirect'] == 'gieqs_ii'){

                    if (isset($data['access_token'])){

                        $filename = '/assets/email/emailNewAccountHook.php';
                        $emailVaryarray['signup_redirect'] = 'gieqs_ii&access_token=8898601655';

                    }else{

                    $filename = '/assets/email/emailNewAccountHook.php';
                    $emailVaryarray['signup_redirect'] = 'gieqs_ii';

                    }

                } else {
    
                    $filename = '/assets/email/emailNewAccount.php';
    
                }
    
            } else {
    
                $filename = '/assets/email/emailNewAccount.php';
    
            }
           

            $subject = 'Welcome to your new GIEQs Online Account';

            $mail->CharSet = "UTF-8";
            $mail->Encoding = "base64";
            $mail->Subject = $subject;
            $mail->setFrom('u8l2e829uoi9@gieqs.co.uk', 'GIEQs Online');
            $mail->addAddress($emailVaryarray['email']);
            $mail->msgHTML(get_include_contents(BASE_URI . $filename, $emailVaryarray));
            $mail->AltBody = strip_tags((get_include_contents(BASE_URI . $filename, $emailVaryarray)));
            $mail->preSend();
            $mime = $mail->getSentMIMEMessage();
            $mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');

            if ($debug){
                
                //var_dump($mail);
                // die();

            }

            
            require BASE_URI . '/assets/scripts/individualMailerGmailAPIPHPMailer.php';
           
            //require(BASE_URI . '/assets/scripts/individualMailerGmailAPI.php');  //TEST MAIL

            if ($debug) {

                if ($emailWorked) {

                    echo 'Email sent';
                } else {

                    echo 'Email failed ' . $reason;
                }
                die();

            }

            //modify for forgot password link

        } else {

            echo 'There was a problem creating your account.  Please try again';
        }

    } else {

        if ($explicit) {

            echo 'That email address is already registered.  Please login below.';

        }

    }

} else {
    if ($debug) {
        echo 'data array empty';
    }

}
