<?php

$openaccess = 0;

$requiredUserLevel = 6;

require_once ('../../includes/config.inc.php');	

require (BASE_URI . '/assets/scripts/login_functions.php');
     
     //place to redirect the user if not allowed access
     $location = BASE_URL . '/index.php';
 
     if (!($dbc)){
     require(DB);
     }
    
     
     require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$debug = false;
$info = true;

if ($debug == true){
error_reporting(E_ALL);
}else{

error_reporting(0);
}

$general = new general;
$users = new users;
$users->Load_from_key($userid);


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;

require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;

require_once(BASE_URI . '/assets/scripts/classes/pages.class.php');
$pages = new pages;

require_once(BASE_URI . '/pages/learning/classes/navigator.class.php');
$navigator = new navigator;

require_once(BASE_URI . '/pages/learning/classes/usersMetricsManager.class.php');
$usersMetricsManager = new usersMetricsManager;

require_once(BASE_URI . '/assets/scripts/classes/usersVideoChapterProgress.class.php');
$usersVideoChapterProgress = new usersVideoChapterProgress;

$data = json_decode(file_get_contents('php://input'), true);


$videoid = $data['videoid'];
//$user_id = $data['user_id'];


if ($debug){

print("<pre class=\"text-white\">".print_r($data,true)."</pre>");

}


if (isset($videoid)){

    if ($debug){

        echo 'All required parameters set';

    }

    $recentChapter =  $usersMetricsManager->getMostRecentPosition($videoid, $userid);

    $returnArray = ['recentChapter' => $recentChapter];

    echo json_encode($returnArray);









    

    //check user logged inn is this user


    //update the % and chapters viewed

    

            /* $returnArray = [

                'postion' => $position+1,
                'numberOfVideos' => $numberOfVideos,
                'nextVideo' => $nextVideo,
                'previousVideo' => $previousVideo,
                'firstVideo' => $firstVideo,
                'lastVideo' => $lastVideo,
                'outside_asset' => $outside_asset,


            ];

            echo json_encode($returnArray); */

    

}else{

    if ($debug){

        echo 'one of required parameters  not set ';

    }

    //delete the others?
}











?>