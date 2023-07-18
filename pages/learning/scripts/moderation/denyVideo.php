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

//allow login with tag
//change tag

//

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
//$review = $data['review'];



if ($debug){
print_r($videoid);
//print_r($review);
echo '$userid is ' . $userid;
}



if ($videoid && $userid){


    //if the request is for the currently tag-locked user ignore
    $currentLockedUser = $video_moderation->getTagLockedUser($videoid, $debug);

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
        
        $users->Load_from_key($currentLockedUser);
        if ($users->gettimezone()){

            $userTimezoneDatabase = $users->gettimezone();

        }else{

            $userTimezoneDatabase = 'Europe/Brussels';
    
         }
        
        //send mail here
        
        //$tagging_due = addTimeUserReadable($userTimezoneDatabase, $usersTagging->getinvite_tag(), '2 weeks');

        //update the database with the done date

        $gmtTimezone = new DateTimeZone('GMT');
        $myDateTime2=new DateTime('now', $gmtTimezone);
        $result = $myDateTime2->format('d-m-y H:i:s');

        $usersTagging->setdone_tag($result);
        
        $result = $usersTagging->prepareStatementPDOUpdate();

        if ($result){

            echo 'Database updated with done';

            //TODO add a descriptor column
            

        }

        //update video status

        $video->Load_from_key($videoid);

        if ($video->getid()){


            $video->setactive('0');
            $result = $video->Save_Active_Row();
            //echo $result;
            
            if ($result){

                echo 'Video updated with inactive status';

            }

            if ($debug){
            print_r($result);
            }

        }

        $video->endvideo();

        //send mail informing user that it will not be used


        




        if ($result){

            if ($debug){
                echo 'Tagging due on ' .  $tagging_due;
                echo 'Review Request sent';

            }
        }

        //if mail sent and all went well


        $usersTagging->endusersTagging;

        


    }else{

        echo 'No open invitation.  Cannot deny';
    }

    //send a mail to remind

    //include the time 
    
    //if a current invitation exits remove it

    
 
}else{
    if ($debug){
        echo 'Missing data';
       }
    
    exit();
}

$users->endusers();
