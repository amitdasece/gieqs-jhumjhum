<?php 


$openaccess = 0;

$requiredUserLevel = 2;

require ('../../includes/config.inc.php');	

require (BASE_URI . '/assets/scripts/login_functions.php');
     
     //place to redirect the user if not allowed access
     $location = BASE_URL . '/index.php';
 
     if (!($dbc)){
     require(DB);
     }
    
     
     require(BASE_URI . '/assets/scripts/interpretUserAccess.php');


$debug = false;

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
    echo '$videoid is';
print_r($videoid);
echo '$userid is ' . $userid;
}

         

//load user from token

if ($videoid && $userid){


    $loggedInUser = $userFunctions->getUserFromKey($userid);

    $currentLockedUser = $video_moderation->getTagLockedUser($videoid, $debug);


    

if ($loggedInUser != $currentLockedUser){

            
        



        //check user key combination



        $usersTagging->Load_from_key($video_moderation->videoHasOpenTaggerInviteReturnKey($videoid, $debug));


        //$usersTagging->Load_from_key($id);
        $videoid = $usersTagging->getvideo_id();

        $video->Load_from_key($videoid);

        $gmtTimezone = new DateTimeZone('GMT');
         $myDateTime = new DateTime('now', $gmtTimezone);
         $timestamp = $myDateTime->format('Y-m-d H:i:s');
         $usersTagging->setaccept_tag($timestamp);
         $result = $usersTagging->prepareStatementPDOUpdate();

         if ($result){


            echo 'Thank you for your response.  Please try to complete tagging within 2 weeks.';
         }


    }else{

        echo 'User does not match that in the tagging key.  Contact administrator';
        exit();

    }


}else{
    
    echo 'Invalid data.  Links can only be used once.';
    exit();
}

//$users->Load_from_key($currentLockedUser);

//if user exists, update the tagging status

//display message

//look for 



$users->endusers();?>


