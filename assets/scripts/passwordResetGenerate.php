<?php
error_reporting(E_ALL);
//;
$openaccess = 1;
//echo 'hello';
//$requiredUserLevel = 4;
require ('../../assets/includes/config.inc.php');		
//echo 'hello2';
require (BASE_URI.'/assets/scripts/headerScript.php');

//echo 'hello3';sss
$general = new general;
$users = new users;
$userFunctions = new userFunctions;
//echo 'hello4';

require(BASE_URI.'/vendor/autoload.php');    
     
     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\Exception;

$debug = false;

$mail = new PHPMailer;

function time_elapsed_string($datetime, $full = false) {
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);

  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = array(
      'y' => 'year',
      'm' => 'month',
      'w' => 'week',
      'd' => 'day',
      'h' => 'hour',
      'i' => 'minute',
      's' => 'second',
  );
  foreach ($string as $k => &$v) {
      if ($diff->$k) {
          $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      } else {
          unset($string[$k]);
      }
  }

  if (!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . ' ago' : 'just now';
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




function ne($v) {
    return $v != '';
}



$debug = false;
$explicit = false;
//echo 'hello';



$data = json_decode(file_get_contents('php://input'), true);

if ($debug){

print_r($data);

}

//check count of get variables

if (count($data) > 0){

    //check the user does not exist

    $desiredUserName = $data['email'];
    
    $userExists = $userFunctions->userExists($desiredUserName);
	
    if (($userExists)){

        //prepare a new key for the user

        
        $key = $userFunctions->generateRandomString('10');

        //load the user

        $userid = $userFunctions->getUserFromEmail($desiredUserName);

        if ($users->matchRecord($userid) === TRUE){

            //if user exists in the user database

            $users->Load_from_key($userid);

            //set a new key

            $users->setkey($key);

            if ($users->prepareStatementPDOUpdate() > 0){

            //send an email to the user

            $emailWorked = null;
            $reason = null;

            echo 'An email was sent with password reset instructions to your registered email address.';

            //generate an initial login link
            $emailVaryarray['firstname'] = $users->getfirstname();
            $emailVaryarray['surname'] = $users->getsurname();
            $emailVaryarray['email'] = $users->getemail();
            // $email = array(0 => $users->getemail()); //original version
            $email = $users->getemail();
            $emailVaryarray['key'] = $users->getkey();

            

            $filename = '/assets/email/emailPasswordReset.php';

            $subject = 'Password reset for your GIEQs online account';

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

             require(BASE_URI . '/assets/scripts/individualMailerGmailAPIPHPMailer.php');  //TEST MAIL

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

        if ($explicit){

            echo 'We do not recognise that email address.  You can create an account below.';
        }
    }
        
    
}else{
	if ($debug){
		echo 'data array empty';
		}
	
}