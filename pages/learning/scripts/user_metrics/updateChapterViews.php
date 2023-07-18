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


$chapter_id = $data['chapter_id'];
//$user_id = $data['user_id'];


if ($debug){

print("<pre class=\"text-white\">".print_r($data,true)."</pre>");

}


if (isset($chapter_id)){

    if ($debug){

        echo 'All required parameters set';

    }


    $current_date = new DateTime('now', new DateTimeZone('UTC'));

$current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s');


        if ($usersMetricsManager->checkChapterUser($userid, $chapter_id) === false){

            //no current recorded chapter view from this user

            $usersVideoChapterProgress->setuser_id($userid);
            $usersVideoChapterProgress->setchapter_id($chapter_id);
            $usersVideoChapterProgress->setfirstView($current_date_sqltimestamp);
            $usersVideoChapterProgress->setrecentView($current_date_sqltimestamp);

            $usersVideoChapterProgress->prepareStatementPDO();

            echo 'Completion for User ' . $userid . ' recorded for ' . $chapter_id;
            echo PHP_EOL;
            echo 'Completion for video ' . $usersMetricsManager->getVideoForChapter($chapter_id) . ' is currently ' . $usersMetricsManager->userCompletionVideo($userid, $usersMetricsManager->getVideoForChapter($chapter_id));


        }elseif ($usersMetricsManager->checkChapterUser($userid, $chapter_id) === true){

            if ($info){

                echo 'User ' . $userid . ' has already viewed chapter ' . $chapter_id;

            }

            //get key

            $key = $usersMetricsManager->getKeyUserViewsChapterVideoMatch($userid, $chapter_id);

            if ($debug){

                echo 'Key is ' . $key;

            }

            $usersVideoChapterProgress->Load_from_key($key);
            $usersVideoChapterProgress->setrecentView($current_date_sqltimestamp);
            $usersVideoChapterProgress->prepareStatementPDOUpdate();

            echo 'Completion for User ' . $userid . ' recorded for ' . $chapter_id;
            echo PHP_EOL;
            echo 'Completion for video ' . $usersMetricsManager->getVideoForChapter($chapter_id) . ' is currently ' . $usersMetricsManager->userCompletionVideo($userid, $usersMetricsManager->getVideoForChapter($chapter_id));





        }






    

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