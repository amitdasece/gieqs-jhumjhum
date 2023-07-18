<?php 

$openaccess = 0;

$requiredUserLevel = 1;

require ('../../includes/config.inc.php');	

require (BASE_URI . '/assets/scripts/login_functions.php');
     
     //place to redirect the user if not allowed access
     $location = BASE_URL . '/index.php';
 
     if (!($dbc)){
     require(DB);
     }
    
     
     require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$debug = true;

require(BASE_URI.'/vendor/autoload.php');    
     
     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\Exception;

//$debug = false;

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


if ($debug){
print_r($videoid);
print_r($taggerid);
echo '$userid is ' . $userid;
}



if ($videoid && $userid){


    //if the request is for the currently tag-locked user ignore
    $currentLockedUser = $video_moderation->getTagLockedUser($videoid, $debug);

    if ($debug){
        
        echo 'Current locked user is ' . $currentLockedUser[0];

    }

    //get data on the open invite

    if ($video_moderation->videoHasOpenTaggerInvite($videoid, $debug)){

        if ($debug){

            echo 'open user invite detected for user ' . $video_moderation->videoHasOpenTaggerInvite($videoid, $debug);
        }

        //close the invite
        $usersTagging->Load_from_key($video_moderation->videoHasOpenTaggerInviteReturnKey($videoid, $debug));
        $gmtTimezone = new DateTimeZone('GMT');
         $myDateTime = new DateTime('now', $gmtTimezone);
         $timestamp = $myDateTime->format('Y-m-d H:i:s');

         function addTimeUserReadable($userTimezone, $time, $addTime){

            //first add the date

            $myInterval2=DateInterval::createFromDateString($addTime);
            $myDateTime2=new DateTime($time, $gmtTimezone);
            $myDateTime2->add($myInterval2);

            $userTimezone = new DateTimeZone($userTimezone);
            $gmtTimezone = new DateTimeZone('GMT');
            $myDateTime = $myDateTime2;
            $offset = $userTimezone->getOffset($myDateTime);
            $myInterval=DateInterval::createFromDateString((string)$offset . 'seconds');
            $myDateTime->add($myInterval);
            $result = $myDateTime->format('d-m-y H:i:s');
            return $result;

        }
        
        $users->Load_from_key($currentLockedUser[0]);
        if ($users->gettimezone()){

            $userTimezoneDatabase = $users->gettimezone();

        }else{

            $userTimezoneDatabase = 'Europe/Brussels';
    
         }
        
        //send mail here
        
        $tagging_due = addTimeUserReadable($userTimezoneDatabase, $usersTagging->getinvite_tag(), '2 weeks');

        if ($debug){


            echo 'to second if';
        }


            //$users->Load_from_key($currentLockedUser[0]);

            $video->Load_from_key($videoid);


            //$users->Load_from_key($loggedInUser);
            $emailVaryarray['firstname'] = $users->getfirstname();
            
            $emailVaryarray['surname'] = $users->getsurname();
            $emailVaryarray['email'] = $users->getemail();
            // $email = array(0 => $users->getemail()); //original version
            $email = $users->getemail();
            $emailVaryarray['key'] = $users->getkey();
            
            $emailVaryarray['linkVideo'] = '<?php echo BASE_URL;?>/login?destination=tagvideo&videoid=' . $videoid;
            
            //$emailVaryarray['image'] = $video_moderation->getMailImage($videoid);
            $emailVaryarray['video_name'] = $video->getname();
            if ($debug){
                echo 'Tagging due on ' .  $tagging_due;
                echo 'Mail sent';

            }
            $emailVaryarray['tagging_due'] = $tagging_due;
            
            if ($debug){

                echo PHP_EOL;
                print_r($emailVaryarray);

            }

            $filename = '/assets/email/remindAcceptMailTagging.php';

            $subject = 'Overdue Tagging Request for GIEQs Online';

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

            //require(BASE_URI . '/assets/scripts/individualMailerGmailAPI.php');  //TEST MAIL

            echo 'An email was sent to the registered email address of the user.';

            if ($debug){

                

            }


        


       

        //send mail


    }

    //send a mail to remind

    //include the time 

    

    
 
}else{
    if ($debug){
        echo 'Missing data';
       }
    
    exit();
}

//$users->endusers();
//$usersTagging->endusersTagging;