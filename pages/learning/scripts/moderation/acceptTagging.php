<?php 

$openaccess = 1;

//$requiredUserLevel = 2;

//$tokenaccess = 1;

require ('../../includes/config.inc.php');	

require BASE_URI . '/head.php';

//error_reporting(E_ALL);

$debug = false;

$_SESSION['debug'] == false;


$users = new users;


$general = new general;
$usersTagging = new usersTagging;
$video_moderation = new video_moderation;
$video = new video;
//$userFunctions = new userFunctions;
require_once(BASE_URI .'/assets/scripts/classes/userFunctions.class.php');

$userFunctions = new userFunctions;

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

if ($debug){
}

//GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

}

if (isset($_GET['key'])) {

    $key = $_GET['key'];

}
?>
<div class="main-content">
  <div class="container h-100vh d-flex align-items-center">
    <div class="col">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5 col-xl-4">
          <div>
            <div class="mb-5 text-center">
              <h6 class="h3">Tagging Administration</h6>
            </div>
            <p class="text-center">
           
         
  <?php    

//load user from token

//var_dump($userFunctions);

if ($userFunctions->getUserFromKey($key)){

    if ($debug){

        echo 'user checks out';
    }

    $loggedInUser = $userFunctions->getUserFromKey($key);

    if ($video_moderation->checkModerationKeyExists($id)){

        if ($debug){

            echo 'moderation key checks out';
        }

        //check user key combination



        $usersTagging->Load_from_key($id);
        $videoid = $usersTagging->getvideo_id();

        $video->Load_from_key($videoid);

        $gmtTimezone = new DateTimeZone('GMT');
         $myDateTime = new DateTime('now', $gmtTimezone);
         $timestamp = $myDateTime->format('Y-m-d H:i:s');
         $usersTagging->setaccept_tag($timestamp);
         $result = $usersTagging->prepareStatementPDOUpdate();

         if ($result){


            echo 'Thank you for your response.  Please try to complete tagging within 2 weeks.';
            $userFunctions->generateNewKey($loggedInUser);

            //generate an initial login link
            $users->Load_from_key($loggedInUser);
            $emailVaryarray['firstname'] = $users->getfirstname();
            $emailVaryarray['surname'] = $users->getsurname();
            $emailVaryarray['email'] = $users->getemail();
            // $email = array(0 => $users->getemail()); //original version
            $email = $users->getemail();
            $emailVaryarray['key'] = $users->getkey();
            $emailVaryarray['linkVideo'] = '<?php echo BASE_URL;?>/login?destination=tagvideo&videoid=' . $videoid;
            $emailVaryarray['image'] = $video_moderation->getMailImage($videoid);
            $emailVaryarray['video_name'] = $video->getname();
            
            if ($debug){

                echo PHP_EOL;
                print_r($emailVaryarray);

            }

            $filename = '/assets/email/acceptMailTagging.php';

            $subject = 'Thanks for agreeing to tag!';

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

            echo 'An email was sent to your registered email address with a link to the video.';

            if ($debug){

                

            }

         }



    }else{

      echo 'Moderation key is not valid';

    }


}else{
    
    echo 'Invalid link.  Links can only be used once.';
    exit();
}

//$users->Load_from_key($currentLockedUser);

//if user exists, update the tagging status

//display message

//look for 



//$users->endusers();?>
</p> 
</div>
        </div>
      </div>
    </div>
  </div>
</div>
    <?php require BASE_URI . '/footer.php';?>

