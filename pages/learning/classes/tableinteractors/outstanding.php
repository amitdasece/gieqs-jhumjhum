<?php

/* File to generate a table JSON at top of page programmeEdit */

$openaccess = 0;

$requiredUserLevel = 1;

require ('../../includes/config.inc.php');		

//require (BASE_URI.'/assets/scripts/headerScript.php');
require (BASE_URI . '/assets/scripts/login_functions.php');
     
     //place to redirect the user if not allowed access
     $location = BASE_URL . '/index.php';
 
     if (!($dbc)){
     require(DB);
     }
    
     
     require(BASE_URI . '/assets/scripts/interpretUserAccess.php');



$video_PDO = new video_PDO;
$video_moderation = new video_moderation;
$users = new users;

//echo 'could load video class';

$responsePre =  $video_moderation->getOutstandingTable();

//print_r($responsePre);

$response = array();

//get user timezone

function convertTimeSQL($userTimezone, $time){

    $userTimezone = new DateTimeZone($userTimezone);
    $gmtTimezone = new DateTimeZone('GMT');
    $myDateTime = new DateTime($time, $gmtTimezone);
    $offset = $userTimezone->getOffset($myDateTime);
    $myInterval=DateInterval::createFromDateString((string)$offset . 'seconds');
    $myDateTime->add($myInterval);
    $result = $myDateTime->format('Y-m-d H:i:s');
    return $result;

}

function convertTimeUserReadable($userTimezone, $time){

    $userTimezone = new DateTimeZone($userTimezone);
    $gmtTimezone = new DateTimeZone('GMT');
    $myDateTime = new DateTime($time, $gmtTimezone);
    $offset = $userTimezone->getOffset($myDateTime);
    $myInterval=DateInterval::createFromDateString((string)$offset . 'seconds');
    $myDateTime->add($myInterval);
    $result = $myDateTime->format('d-m-y H:i:s');
    return $result;

}

function addTimeUserReadable($userTimezone, $time, $addTime){

    //first add the date

    $gmtTimezone = new DateTimeZone('GMT');
    $myInterval2=DateInterval::createFromDateString($addTime);
    $myDateTime2=new DateTime($time, $gmtTimezone);
    $myDateTime2->add($myInterval2);

    $userTimezone = new DateTimeZone($userTimezone);
    
    $myDateTime = $myDateTime2;
    $offset = $userTimezone->getOffset($myDateTime);
    $myInterval=DateInterval::createFromDateString((string)$offset . 'seconds');
    $myDateTime->add($myInterval);
    $result = $myDateTime->format('d-m-y H:i:s');
    return $result;

}

$users->Load_from_key($userid);
if ($users->gettimezone()){

    $userTimezoneDatabase = $users->gettimezone();

}else{

    $userTimezoneDatabase = 'Europe/Brussels';

 }



foreach ($responsePre as $key1=>$value1){

    //modify the dates

    foreach ($value1 as $key=>$value){

        //print_r($key);
        //print_r($value);

    

        /* $reponse['data'][$key]['date'] = convertTimeUserReadable($userTimezoneDatabase, $value['date']); */

        $responsePre[$key1][$key]['date'] = convertTimeUserReadable($userTimezoneDatabase, $value['date']);
        $responsePre[$key1][$key]['author'] = $userFunctions->getUserName($value['author']);

        

        //if expires is true


        if ($value['expires'] == true){
 
        $responsePre[$key1][$key]['expires'] = addTimeUserReadable($userTimezoneDatabase, $value['date'], '2 weeks');

        }


        /* $addContainer = false;

        if ($value['status'] == 'Accepted Tagging' || $value['status'] == 'Tagging Reviewed.  Changes required'){

            $addContainer = '<div class="d-flex align-items-center justify-content-end">';
            $addContainer .= '<div class="actions ml-3"><a class="fill-modal action-item mr-2" data-toggle="tooltip" title="tag this video"';
            $addContainer .=  'data-original-title="Edit"> <i class="fas fa-pencil-alt"></i> </a>';
            $addContainer .=  '</div>';
            $addContainer .= '<div class="actions ml-3"><a class="decline-invite-check action-item mr-2" data-toggle="tooltip" title="decline invite"';
            $addContainer .=  'data-original-title="Edit"> <i class="fas fa-times"></i> </a>';
            $addContainer .=  '</div>';
            $addContainer .= '</div>';
            $addContainer .=  '</div>';


        }

        if ($value['status'] == 'Invitation'){

            $addContainer = '<div class="d-flex align-items-center justify-content-end">';
            $addContainer .= '<div class="actions ml-3"><a class="accept-invite action-item mr-2" data-toggle="tooltip" title="accept invite"';
            $addContainer .=  'data-original-title="Edit"> <i class="fas fa-check"></i> </a>';
            $addContainer .=  '</div>';
            $addContainer .= '<div class="actions ml-3"><a class="decline-invite action-item mr-2" data-toggle="tooltip" title="decline invite"';
            $addContainer .=  'data-original-title="Edit"> <i class="fas fa-times"></i> </a>';
            $addContainer .=  '</div>';
            $addContainer .= '</div>';
            $addContainer .=  '</div>';
    
        }

        


        $addContainerEmpty = '<div class="d-flex align-items-center justify-content-end">';
        $addContainerEmpty .=  '</div>';


           
   
        if ($addContainer){
        $responsePre[$key1][$key]['addContainer'] = $addContainer; 
        }else{
            $responsePre[$key1][$key]['addContainer'] = $addContainerEmpty;
        } */
        

        




 

        //$reponse['data'][$key] = $value;


    
}

    //update the expired


}

//print_r($responsePre);

echo json_encode($responsePre);

//echo ltrim($response);

$video_PDO->endvideo_PDO();
$video_moderation->endvideo_moderation();