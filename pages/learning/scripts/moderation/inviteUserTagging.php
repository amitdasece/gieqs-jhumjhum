<?php 

$openaccess = 0;

$requiredUserLevel = 2;

error_reporting(0);

require ('../../includes/config.inc.php');	

require (BASE_URI . '/assets/scripts/login_functions.php');
     
     //place to redirect the user if not allowed access
     $location = BASE_URL . '/index.php';
 
     if (!($dbc)){
     require(DB);
     }
    
     
     require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$debug = false;

function get_include_contents($filename, $variablesToMakeLocal) {
    extract($variablesToMakeLocal);
    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}

require(BASE_URI.'/vendor/autoload.php');
use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

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

//require (BASE_URI.'/scripts/headerCreatorV2.php');

//(1);
//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');




/* spl_autoload_unregister ('class_loader');

//$users = new users; //must be users from GIEQs
require(BASE_URI .'/assets/scripts/classes/users.class.php'); */
$users = new users;

/* spl_autoload_register ('class_loader'); */

$general = new general;
//$usersCommentsVideo = new usersCommentsVideo;
//$usersSocial = new usersSocial;
$usersTagging = new usersTagging;
$video_moderation = new video_moderation;
$video = new video;


$data = json_decode(file_get_contents('php://input'), true);

$videoid = $data['videoid'];
$taggerid = $data['taggerid'];


if ($debug){
print_r($videoid);
print_r($taggerid);
echo '$userid is ' . $userid;
}



if ($videoid && $taggerid && userid){


    //if the request is for the currently tag-locked user ignore
    $currentLockedUser = $video_moderation->getTagLockedUser($videoid, $debug);

    if ($currentLockedUser[0] == $taggerid){

        echo 'Cannot re-invite the current tagger';
        exit();
    }
    
    //if a current invitation exits remove it

    if ($video_moderation->videoHasOpenTaggerInvite($videoid, $debug)){

        if ($debug){

            echo 'open user invite detected for user ' . $video_moderation->videoHasOpenTaggerInvite($videoid, $debug);
        }


        $rememberAlreadyTagged = true;

        //identify the currently identified user


        //close the invite
        $usersTagging->Load_from_key($video_moderation->videoHasOpenTaggerInviteReturnKey($videoid, $debug));
        $gmtTimezone = new DateTimeZone('GMT');
         $myDateTime = new DateTime('now', $gmtTimezone);
         $timestamp = $myDateTime->format('Y-m-d H:i:s');
        $usersTagging->setdecline_tag($timestamp);
        $result = $usersTagging->prepareStatementPDOUpdate();
        
        
        if ($result){

            if ($debug){

                echo 'Decline tag set';

            }

            //send mail to declined user

        $declinedUser = $video_moderation->videoHasOpenTaggerInvite($videoid, $debug);

        if ($debug){

            echo 'Decline user ' . $currentLockedUser[0];

        }

        $users->Load_from_key($currentLockedUser[0]);
        $emailVaryarray['firstname'] = $users->getfirstname();
        $emailVaryarray['surname'] = $users->getsurname();
        $emailVaryarray['email'] = $users->getemail();
        // $email = array(0 => $users->getemail()); //original version
        $email = $users->getemail();
        $emailVaryarray['key'] = $users->getkey();
        //$emailVaryarray['linkVideo'] = BASE_URL . '/pages/learning/scripts/forms/videoChapterForm.php?id=' . $videoid;
        $video->Load_from_key($videoid);
        $emailVaryarray['image'] = $video_moderation->getMailImage($videoid);
        $emailVaryarray['video_name'] = $video->getname();
        $emailVaryarray['videoid'] = $videoid;

        if ($debug){

            echo PHP_EOL;
            print_r($emailVaryarray);

        }

        $filename = '/assets/email/declineMailTagging.php';

        $subject = 'You no longer need to tag video ' . $videoid . ' on GIEQs Online';

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



        require_once(BASE_URI . '/assets/scripts/individualMailerGmailAPIPHPMailer.php');

        //require_once(BASE_URI . '/assets/scripts/individualMailerGmailAPI.php');  //TEST MAIL

        echo 'An email was sent to the registered email address of previous tagging user informing them that they no longer need to tag.';

        if ($debug){

            

        }

        //$usersTagging->endusersTagging;
        //$users->endusers;
        $users = new users;
    $usersTagging = new usersTagging;
        }

        
        
        
        


    }else{

        //insert only
    }
    
    
    $emailVaryarray = null;
    $emailVaryarray = array();
    //insert an invitation row
    //use UTC for insertion
    $gmtTimezone = new DateTimeZone('GMT');
    $myDateTime = new DateTime('now', $gmtTimezone);
    $timestamp = $myDateTime->format('Y-m-d H:i:s');
    //$timestamp = date("Y-m-d H:i:s");
    $usersTagging->New_usersTagging($taggerid, $videoid, $userid, $timestamp, null, null, null, null);
    $result = $usersTagging->prepareStatementPDO();

    if ($result){

        echo "User {$userFunctions->getUserName($taggerid)} Invited";

        //send mail to accepted user

        if ($debug){

            echo PHP_EOL;
            echo 'Result which should contain last insert id is ';
            print_r($result);
            echo PHP_EOL;
        }

        $users->Load_from_key($taggerid);
        $emailVaryarray['firstname'] = $users->getfirstname();
        $emailVaryarray['surname'] = $users->getsurname();
        $emailVaryarray['email'] = $users->getemail();
        // $email = array(0 => $users->getemail()); //original version
        $email = $users->getemail();
        $key = $users->getkey();
        $emailVaryarray['key'] = $key;
        $emailVaryarray['linkConfirm'] = '<?php echo BASE_URL;?>/pages/learning/scripts/moderation/acceptTagging.php?id=' . $result . '&key=' . $key;
        $emailVaryarray['linkDecline'] = '<?php echo BASE_URL;?>/pages/learning/scripts/moderation/declineTagging.php?id=' . $result . '&key=' . $key;

        $emailVaryarray['image'] = $video_moderation->getMailImage($videoid);
        $video->Load_from_key($videoid);
        $emailVaryarray['video_name'] = $video->getname();
        $emailVaryarray['videoid'] = $videoid;
        
        if ($debug){

            echo PHP_EOL;
            print_r($emailVaryarray);

        }

        $filename = null;
        $filename = '/assets/email/inviteMailTagging.php';

        $subject = null;
        $subject = 'You are invited to tag a video on GIEQs Online';

        $mail = new PHPMailer;
        $mime = null;

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

        if ($rememberAlreadyTagged){

        
            $client = getClient();

            $service = new \Google_Service_Gmail($client);

            $message = new Google_Service_Gmail_Message();

            $message->setRaw($mime);

        //$messageText2 = get_include_contents(BASE_URI . $filename, $emailVaryarray);

        //$message2 = createMessage('admin@gieqs.com', $email, $subject, $mime);

            sendMessage($service, $user, $message);

        }else{

            //$filename = '/assets/email/inviteMailTagging.php';

            //$subject = 'You are invited to tag a video on GIEQs Online';
            


            require_once(BASE_URI . '/assets/scripts/individualMailerGmailAPIPHPMailer.php');


        }

        //require(BASE_URI . '/assets/scripts/individualMailerGmailAPI.php');  //TEST MAIL

        echo 'An email was sent to the registered email address of the new invited tagger.';

        if ($debug){

            

        }
    }

    // send a mail to the invited user

 
}else{
    if ($debug){
        echo 'Missing data';
       }
    
    exit();
}

//$users->endusers();
