<?php
error_reporting(E_ALL);
//;
$requiredUserLevel = 3;
//$openaccess = 1;
//echo 'hello';
//$requiredUserLevel = 4;
require ('../../assets/includes/config.inc.php');		
//echo 'hello2';
require (BASE_URI.'/assets/scripts/headerScript.php');

//echo 'hello3';sss
$general = new general;
$users = new users;
$userFunctions = new userFunctions;
require_once(BASE_URI . '/assets/scripts/classes/emails.class.php');
$emails = new emails;
require_once(BASE_URI . '/assets/scripts/classes/emailLink.class.php');
$emailLink = new emailLink;

//echo 'hello4';

require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister ('class_loader');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer;

function get_include_contents($filename, $variablesToMakeLocal) {
    extract($variablesToMakeLocal);
    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}


function ne($v) {
    return $v != '';
}

$data = json_decode(file_get_contents('php://input'), true);




$debug = false;
$explicit = false;
//echo 'hello';

//specify the email

 $emailid = '71';

$emails->Load_from_key($emailid);


//$_GET['emailid'] = $emailid;

//create a file
ob_start();

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

$debug = false;
if ($debug){
    
    echo $file;
    
}



//set some basics FOR THE EMAIL
$filename = $file;




if ($debug){

print_r($data);

}

//check count of get variables

if (count($data) > 0){

    //check the user does not exist

    $desiredUserName = $data['passedUserid'];

    if ($debug){

        print_r($desiredUserName);
        
        }
    
    
	
    

        

        if ($users->matchRecord($desiredUserName) === TRUE){

            $key = $userFunctions->generateRandomString('10');

            //if user exists in the user database

            $users->Load_from_key($desiredUserName);

            //set a new key

            $users->setkey($key);

            if ($users->prepareStatementPDOUpdate() > 0){

            //send an email to the user

            $emailWorked = null;
            $reason = null;

            

            //generate an initial login link
            $emailVaryarray['firstname'] = $users->getfirstname();
            $emailVaryarray['surname'] = $users->getsurname();
            $emailVaryarray['email'] = $users->getemail();
            // $email = array(0 => $users->getemail()); //original version
            $email = $users->getemail();
            $emailVaryarray['key'] = $users->getkey();

        $filename = $file;

            $subject = 'Welcome to GIEQs III.  Joining Information Enclosed.';

            $mail->ClearAllRecipients();
            $mail->CharSet = "UTF-8";
            $mail->Encoding = "base64";
            $mail->Subject = $subject;
            $mail->setFrom('admin@gieqs.com', 'The GIEQs Foundation');
            $mail->addAddress($emailVaryarray['email']);
            $mail->msgHTML(get_include_contents(BASE_URI . $filename, $emailVaryarray));
            $mail->AltBody = strip_tags((get_include_contents(BASE_URI . $filename, $emailVaryarray)));
            $mail->preSend();
            $mime = $mail->getSentMIMEMessage();
            $mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');

            print_r($mail);

            //require(BASE_URI . '/assets/scripts/individualMailerGmailAPI.php');  //TEST MAIL
            require(BASE_URI . '/assets/scripts/individualMailerGmailAPIPHPMailer.php');


            echo 'An email was sent to the registered email address of the user.';

            if ($debug){

                if ($emailWorked){

                    echo 'Email sent';
                }else{

                    echo 'Email failed ' . $reason;
                }

            }

            }

        }


        
    
}else{
	if ($debug){
		echo 'data array empty';
		}
	
}