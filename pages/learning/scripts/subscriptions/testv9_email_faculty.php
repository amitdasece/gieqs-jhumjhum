<?php
//$openaccess = 1;

$requiredUserLevel = 3;

error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';
require (BASE_URI.'/assets/scripts/headerScript.php');

$location = BASE_URL . '/index.php';


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$debug = false;
$_SESSION['debug'] == false;

$general = new general;
$users = new users;

$users->Load_from_key($userid);

error_reporting(E_ALL);

require_once(BASE_URI . '/assets/scripts/classes/courseManager.class.php');
$courseManager = new courseManager;

require_once BASE_URI . '/assets/scripts/classes/programme.class.php';
$programme = new programme;

require_once BASE_URI . '/assets/scripts/classes/sessionView.class.php';
$sessionView = new sessionView;

require_once BASE_URI . '/assets/scripts/classes/sessionView.class.php';
$sessionView = new sessionView;

require_once BASE_URI . '/assets/scripts/classes/assetManager.class.php';
$assetManager = new assetManager;

require_once BASE_URI . '/assets/scripts/classes/assets_paid.class.php';
$assets_paid = new assets_paid;

require_once BASE_URI . '/assets/scripts/classes/subscriptions.class.php';
$subscription = new subscriptions;

require_once BASE_URI . '/assets/scripts/classes/userFunctions.class.php';
$userFunctions = new userFunctions;
//error_reporting(E_ALL);

require_once BASE_URI . '/pages/learning/classes/navigator.class.php';
$navigator = new navigator;

require_once BASE_URI . '/assets/scripts/classes/userFunctions.class.php';
$userFunctions = new userFunctions;

require_once BASE_URI . '/assets/scripts/classes/programmeView.class.php';
$programmeView = new programmeView;


require_once BASE_URI . '/pages/learning/classes/usersMetricsManager.class.php';
$usersMetricsManager = new usersMetricsManager;


require_once BASE_URI . '/assets/scripts/classes/curriculae.class.php';
$curriculae = new curriculae;

require_once BASE_URI . '/assets/scripts/classes/curriculum_items.class.php';
$curriculum_items = new curriculum_items;

require_once BASE_URI . '/assets/scripts/classes/curriculum_references.class.php';
$curriculum_references = new curriculum_references;

require_once BASE_URI . '/assets/scripts/classes/curriculum_sections.class.php';
$curriculum_sections = new curriculum_sections;

require_once BASE_URI . '/assets/scripts/classes/curriculum_tags.class.php';
$curriculum_tags = new curriculum_tags;

require_once BASE_URI . '/assets/scripts/classes/curriculum_manager.class.php';
$curriculum_manager = new curriculum_manager;

require_once BASE_URI . '/assets/scripts/classes/symposium_manager.class.php';
$symposium_manager = new symposium_manager;

require_once BASE_URI . '/assets/scripts/classes/symposium.class.php';
$symposium = new symposium;

$sessionView = new sessionView;
$programmeReports = new programmeReports;
$sessionItem = new sessionItem;


//error_reporting(E_ALL);

//$_SESSION['debug'] == true;

//echo 'hello';

// Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys

require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister ('class_loader');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$debug=true;

//start the completion table 
//have variable run in last 24 hours , if not run last 24 hours

$user_id = 1;
echo '<pre>';
var_dump($curriculum_manager->curriculum_completion_stats_user($user_id));
echo '</pre>';
exit();


//foreach user

$all_videos = $usersMetricsManager->getAllVideosWatchedUser($user_id);

//GET AND WRITE COMPLETION FOR EACH VIDEO

$video_completion_user = [];

$overall_video_completion = 0;

foreach ($all_videos as $key => $value){

    $completion = null;

    $completion = round($usersMetricsManager->userCompletionVideo($userid, $value), 1);

    $video_completion_user[$value] = $completion;

    $overall_video_completion += $completion;


}

//can now write to db with $key = video_id and $value = completion %

var_dump($video_completion_user);

//%completion of videos started
$overall_video_completion = $overall_video_completion / count($all_videos);

//%completion of available videos

$total_video_completion = $usersMetricsManager->userCompletionVideos($userid)['completion'];

var_dump($overall_video_completion);

var_dump($total_video_completion);


//CURRICULA

//number of opens per curriculum

//get all curriculae

$curriculum_manager->getAllActiveCurricula();

//get all curriculae opens ever, return curriculum id, for specific user, count = number of opens

/* SELECT c.`id` FROM `usersViewsCurriculumStatement` as a INNER JOIN `curriculum_sections` AS b ON b.`id` = a.`curriculum_section_id` INNER JOIN `curriculae` AS c ON c.`id` = `b`.`curriculum_id` WHERE `user_id` = '$user_id' GROUP BY c.`id` ORDER BY `recentView` DESC; */

//get user opens for specfic curriculum

/* SELECT
    c.`id`
FROM
    `usersViewsCurriculumStatement` as a
INNER JOIN `curriculum_sections` AS b
        ON
            b.`id` = a.`curriculum_section_id`
        INNER JOIN `curriculae` AS c
        ON
            c.`id` = `b`.`curriculum_id`
        WHERE `user_id` = '$user_id' AND c.`id` = '$curriculum_id'
        GROUP BY c.`id`
        ORDER BY `recentView` DESC; */


//set curriculum_id

$curriculum_id = 4;

//sections read

//list all sections

/* SELECT
    a.`id`,
    `curriculum_id`,
    `section_order`,
    a.`name`,
    a.`long_name`
FROM
    `curriculum_sections` as a 
INNER JOIN 
	`curriculae` as b on `b`.`id` = `a`.`curriculum_id`
WHERE
    b.`id` = '$curriculum_id'; */

//which sections has user viewed

/* SELECT
    b.`id`
FROM
    `usersViewsCurriculumStatement` as a
INNER JOIN `curriculum_sections` AS b
        ON
            b.`id` = a.`curriculum_section_id`
        INNER JOIN `curriculae` AS c
        ON
            c.`id` = `b`.`curriculum_id`
        WHERE `user_id` = '$user_id' AND c.`id` = '$curriculum_id'
        GROUP BY b.`id`
        ORDER BY `recentView` DESC; */









//total references per curriculum

        $references = $curriculum_manager->getAllCurriculumReferences($curriculum_id);

        $total_references = count($references);
        
        echo '<br/><br/>Total references is ' . $total_references;


//references clicked [needs new db] per curriculum

/* SELECT
    a.`id`,
    a.`user_id`,
    a.`reference_id`
FROM
    `usersViewsReferences` as a 
INNER JOIN
	`curriculum_references` as b on `b`.`reference_id` = a.`reference_id`
INNER JOIN
	`references` as c on c.`id` = `b`.`reference_id`
INNER JOIN
	`curriculum_items` as d on `d`.`id` = `b`.`curriculum_item_id`
INNER JOIN 
	`curriculum_sections` as e on `e`.`id` = `d`.`section_id`
INNER JOIN
	`curriculae` as f on `f`.`id` = e.`curriculum_id`
WHERE `a`.`user_id` = '$user_id' AND f.`id` = '$curriculum_id'
GROUP BY c.`id`
ORDER BY `a`.`recentView` DESC
     */








//videos per tag, use script above replace $all_videos with the array of videos in the curriculum


$userid=1;

$tagged_videos = $curriculum_manager->getAllCurriculumVideos($curriculum_id);

$tagged_videos_denominator = count($tagged_videos);

var_dump($tagged_videos);

$video_completion_user = [];

$overall_video_completion = 0;


foreach ($tagged_videos as $key => $value){

    $completion = null;

    $completion = round($usersMetricsManager->userCompletionVideo($userid, $value), 1);

    $video_completion_user[$value] = $completion;

    $overall_video_completion += $completion;

}

$overall_video_completion = $overall_video_completion / $tagged_videos_denominator;

//can now write to db with $key = video_id and $value = completion %

echo '<br/><br/>Overall Completion Tagged Videos ' . round($overall_video_completion, 1) . '<br/><br/>';

var_dump($video_completion_user);








//best practice video define and metrics


$userid=1;

$best_practice_videos = $curriculum_manager->getAllBestPracticeCurriculumVideos($curriculum_id);

$best_practice_videos_denominator = count($best_practice_videos);

var_dump($best_practice_videos);

$video_completion_user = [];

$overall_video_completion = 0;


foreach ($best_practice_videos as $key => $value){

    $completion = null;

    $completion = round($usersMetricsManager->userCompletionVideo($userid, $value), 1);

    $video_completion_user[$value] = $completion;

    $overall_video_completion += $completion;

}

$overall_video_completion = $overall_video_completion / $best_practice_videos_denominator;

//can now write to db with $key = video_id and $value = completion %

echo '<br/><br/>Overall Completion Best Practice ' . $overall_video_completion;

var_dump($video_completion_user);









exit();



$curriculum = $userFunctions->accessedAnyCurriculum($userid, false);


//$curriculum = $userFunctions->accessedCurriculumSpecific($userid, $curriculum_id, false);

var_dump($curriculum);





exit();

var_dump($usersMetricsManager->userCompletionAsset(1, 84, false));

var_dump($assetManager->getVideosAnyAsset(84));

exit();

//which sort of asset is this

$asset_type = $assetManager->getAssetTypeAsset($assetid);

print_r($asset_type);

$courses = ['1', '2', '3'];

var_dump($courses);

$video_sets = ['4'];

if (in_array($asset_type, $courses)){

    $videosForSessions = array();

    //get programme / session info for this asset

    $programmes = $assetManager->returnCombinationAssetProgramme($assetid);
    
    if ($debug){

        //var_dump($programmes);
    }

    foreach ($programmes as $key=>$value){


        $sessions = $programmeView->getSessions($value['programme_id']);

            if ($debug){

                //var_dump($sessions);
            }

            //get programmeid for asset
            foreach ($sessions as $key2=>$value2){

                if ($value2['sessionid'] != ''){

                    $video_id = null;
                    $video_id = $programmeView->getVideoURL($value2['sessionid']);

                    if ($video_id != null){

                        $videosForSessions[] = $video_id;

                    }


                }

            }

        }

        var_dump($videosForSessions);
        return $videosForSessions;


}else{ //is a videoset

    $videosForSessions = $assetManager->returnVideosAsset($assetid);

    var_dump($videosForSessions);

    return $videosForSessions;



}




//if a programme type then do this, otherwise check individual videos




            

             //if debug show the videos

             if ($debug){

                var_dump($videosForSessions);

             }

exit();

?>

<!-- 

Queries

//REGISTRATIONS
SELECT COUNT(`id`) FROM `symposium` WHERE `partial_registration` = '0';

//REGISTRATIONS PER CATEGORY
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '1');
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '2');
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '3');
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '4');
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '5');


//REDUCE SYMPOSIUM INCOME BY 20% FOR THIS NUMBER WHO HAVE PROFESSIONAL REGISTRATIONS
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '1' AND `professionalMember` = '1');  //DOCTORS WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '2' AND `professionalMember` = '1');  //TRAINEES WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '3' AND `professionalMember` = '1');  //NENDO WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '4' AND `professionalMember` = '1');  //N WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '5' AND `professionalMember` = '1');  //M STUDENTS WITH REDUCTION

//REDUCE SYMPOSIUM INCOME BY 20% FOR LONG TERM GIEQS PRO MEMBERS
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '1' AND `longTermProMemberDiscount` = '1'); //DOCTORS WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '2' AND `longTermProMemberDiscount` = '1'); //TRAINEES WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '3' AND `longTermProMemberDiscount` = '1'); //NENDO WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '4' AND `longTermProMemberDiscount` = '1'); //N WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '5' AND `longTermProMemberDiscount` = '1'); //M STUDENTS WITH REDUCTION

//ALSO FOR GIEQS PRO
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '1' AND `includeGIEQsPro` = '1'); // DOCTORS WITH GIEQS PRO TOO
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '2' AND `includeGIEQsPro` = '1'); // TRAINEES WITH GIEQS PRO TOO
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '3' AND `includeGIEQsPro` = '1'); // NENDO WITH GIEQS PRO TOO
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '4' AND `includeGIEQsPro` = '1'); // N WITH GIEQS PRO TOO
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '5' AND `includeGIEQsPro` = '1'); // M STUDENTS WITH GIEQS PRO TOO

SELECT COUNT(`id`) FROM `symposium` WHERE `partial_registration` = '1'; // INCOMPLETE REGISTRATIONS





 -->
<style>
 th, td {
  padding: 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>
                    


<?php

//registration manager

//->countAllRegistrations

//->countTraineeReg , Nurse Reg, Doctor Reg, NE Reg

//->countincomplete reg

echo "<h2>Personal Program Links, GIEQs III</h2>";

$facultyMembers = $programmeReports->LoadAllFaculty();

foreach ($facultyMembers as $key3=>$value3){

    $facultyid = $value3;

    $faculty = $sessionView->getFacultyName($facultyid);


                //get session data    

                $response =  $programmeReports->generateReportv2($facultyid, [0=>47, 1=>48, 2=>49, 3=>50]);
                $response2 = $programmeReports->returnModeration($facultyid, [0=>47, 1=>48, 2=>49, 3=>50]);
                $response3 = array_merge($response, $response2);
                //usort($response3, function ($a, $b) {     return strcmp($a["date"], $b["date"]); });

                array_multisort(array_column($response3, 'date'),  SORT_ASC,
                array_column($response3, 'timeFrom'), SORT_ASC,
                $response3);
                
                //TODO this gets only the sessionItems

                if (empty($response3)){

                    continue;

                }





echo $faculty['title'] . ' ' . $faculty['firstname'] . ' ' . $faculty['surname'];

echo "<br/>";

echo "<a href='<?php echo BASE_URL;?>/pages/backend/printProgramAllv2.php?id=$facultyid'> Link to Personal Program for " . $faculty['title'] . " " . $faculty['firstname'] . " " . $faculty['surname'] . "</a>";

echo "<br/><br/>";

}



/* 

get sections
$curriculum_manager->getsectionscurriculum($id);

for each section
    echo each block dependent on whether text or
    table is a table

    depending on what 'type' is

    <option value="1" selected="">text</option>
<option value="2">table</option>
<option value="3">figure</option>
<option value="4">video</option>
<option value="5">gieqs online asset</option>

    video is vimeo link like blog link_to_content

    photo is photo like blog [this is ok, now there is link_to_content]  image_url

    [add image upload field]

    gieqs ref is id number link_to_content

*/






//var_dump($assets3);


//do they occur in the past? that is type 2 and 3 only

//then create a new subscription for the user for them with the tag PRO_ASSET

//GET AN ARRAY OF PRO USERS



//WHERE (`gateway_transactionId` LIKE '%TOKEN_ID=PRO_SUBSCRIPTION%



echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';