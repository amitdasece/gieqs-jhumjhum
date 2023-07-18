<?php
$openaccess = 1;

//$requiredUserLevel = 6;

error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';

$location = BASE_URL . '/index.php';

require BASE_URI . '/assets/scripts/interpretUserAccess.php';

$debug = false;

$general = new general;
$users = new users;

$users->Load_from_key($userid);

error_reporting(E_ALL);

require_once(BASE_URI . '/assets/scripts/classes/courseManager.class.php');
$courseManager = new courseManager;


require_once BASE_URI . '/assets/scripts/classes/sessionView.class.php';
$sessionView = new sessionView;

require_once BASE_URI . '/assets/scripts/classes/assetManager.class.php';
$assetManager = new assetManager;

require_once BASE_URI . '/assets/scripts/classes/assets_paid.class.php';
$assets_paid = new assets_paid;

require_once BASE_URI . '/assets/scripts/classes/subscriptions.class.php';
$subscription = new subscriptions;
error_reporting(E_ALL);

require_once BASE_URI . '/pages/learning/classes/navigator.class.php';
$navigator = new navigator;

require_once BASE_URI . '/assets/scripts/classes/userFunctions.class.php';
$userFunctions = new userFunctions;

require_once BASE_URI . '/assets/scripts/classes/programmeView.class.php';
$programmeView = new programmeView;

error_reporting(E_ALL);

echo 'hello';

$assetArray = $assetManager->which_assets_contain_programme('32');

var_dump($assetArray);

var_dump($userid);

//for a given programme id does the user have access [active subscription]
echo '<br/><br/><br/>';
echo '<h2>Does a given userid have access to a given programmeid via a subscription?</h2>';

$access = $assetManager->programme_owned_by_user('32', $userid, true);

var_dump($access);

//for a given asset id does the user have access [active subscription]

echo '<br/><br/><br/>';
echo '<h2>Does a given userid have access to a given assetid via a subscription?</h2>';

$access = null;

$access = $assetManager->is_assetid_covered_by_user_subscription('9', $userid, true);

var_dump($access);

//for a given video id does the user have access [active subscription] or is the video free....

$videoid = '78';
echo '<br/><br/><br/>';
echo '<h2>Does a given userid have access to a given videoid via a subscription?</h2>';

echo 'Does user id ' . $userid . ' have accesss to video id ' . $videoid . ' via a subscription? <br/>';

$access = null;

$access = $assetManager->video_owned_by_user($videoid, $userid, true);

var_dump($access);

//does this video require a subscription
echo '<br/><br/><br/>';

$videoid = '77';
echo '<h2>Does a given video require a subscription?</h2>';

echo 'Does video ' . $videoid . ' require a subscription? <br/>';

$access = null;

$access = $assetManager->video_requires_subscription($videoid, true);

var_dump($access);

//does this video require a subscription
echo '<br/><br/><br/>';

echo '<h2>Return start and end times for programme elements (sessions)</h2>';

$programmes = null;

$programmes = $sessionView->getProgrammeTimes([0=>['id'=>33],], false);



//for one program

$programmes2 = $sessionView->convertProgrammeTimes($programmes, $debug);
var_dump($programmes2);

$breaks = $sessionView->getProgrammeBreaks([0=>['id'=>33],], false);

$breaks2 = $sessionView->convertProgrammeTimesBreaks($breaks, $debug);


//get array of session times

//get array of break times

//var_dump($programmes);
//var_dump($breaks);

var_dump($programmes2);
var_dump($breaks2);


echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';

$videos = array('77', '78');
///$videoid = '77';
echo '<h2>Return tag categories for given video array</h2>';

echo 'The tag categories for ' . print_r($videos);

$access = null;

$access = $assetManager->getVideoTagCategories($videos, true);

var_dump($access);

//find the active programme
echo '<br/><br/><br/>';

$serverTimeZone = new DateTimeZone('Europe/Brussels');
$currentTime = new DateTime('now', $serverTimeZone);

//test

$currentTime = new DateTime('2020-10-07', $serverTimeZone);

///$videoid = '77';
echo '<h2>Return programmes with start and end times for ' . $currentTimeCET . '</h2>';

//echo 'The tag categories for ' . print_r($videos);

$debug = true;

$access = null;

//$programmes = $assetManager->returnLiveProgrammesArray($currentTime, true);

if ($access = $sessionView->programmesActiveToday($currentTime, $debug) == true) {

    $access = $sessionView->programmesActiveToday($currentTime, $debug);

    var_dump($access);

    echo '<br/><br/>now get the start and end times<br/><br/>';

    $access1 = null;

    $access1 = $sessionView->getStartAndEndProgrammes($access, $debug);

    var_dump($access1);

    echo '<br/><br/>now get the start and end times in a single array<br/><br/>';

    $access2 = null;

    $access2 = $sessionView->getStartEndProgrammes($access1, $debug);

    var_dump($access2);

    echo '<br/><br/>does user have access to the programme<br/><br/>';

    $access3 = null;

//first one

    $access3 = $assetManager->programme_owned_by_user($access2[0]['programmeid'], $userid, $debug);

//do other things with second one if required

    var_dump($access3);

} else {

    if ($debug) {
        echo '<br/><br/>No programmes active<br/><br/>';
    }

    return false;

}

echo '<br/><br/>United Form in 2 classes<br/>';

$debug = false;

$programmes = null;

$programmes = $sessionView->returnLiveProgrammesArray($currentTime, $debug);

$access3 = null;

$access3 = $assetManager->programme_owned_by_user($programmes[0]['programmeid'], $userid, $debug);

var_dump($access3);

echo '<br/><br/><br/>';
//does this video require a subscription
echo '<br/><br/><br/>';

//$videos = array('77', '78');
///
$videoid = '350';

echo '<h2>Is video contained within a subscribable programme</h2>';

echo 'The video ' . $videoid;

$access = null;

$access = $assetManager->isVideoContainedWithinAnySubscribableProgramme($videoid, true);

var_dump($access);

//$videos = array('77', '78');
///
$videoid = '350';

echo '<h2>Return asset id for videoid (not a programme approach)</h2>';

echo 'The video ' . $videoid;

$access = null;

$access = $assetManager->returnAssetidforVideoidStraight($videoid, true);

var_dump($access);

echo '<br/><br/><br/>';

$videoid = '56';

echo '<h2>Check programme id for video</h2>';

echo 'The video ' . $videoid;

$access = null;
$access2 = null;

$debug = true;

/* if ($assetManager->isVideoContainedWithinAnySubscribableProgramme($videoid, false)){

$access = $assetManager->isVideoContainedWithinAnySubscribableProgramme($videoid, false);

$access2 = $assetManager->getProgrammeidVideo($access, $videoid, $debug);

if (is_array($access2)){

$access3 = $assetManager->userAssetsAccessArray($access2, $userid, false);

if ($access3 === true){

return true;
}else{

return false;
}

}else{

//no array returned

}

}else{

//video is not in a subscribable
return false;

} */

var_dump($access2);

//check the asset ids against whether user has access
//if any positive grant

var_dump($access3);

echo '<br/><br/><br/>';

echo '<h2>Unified version</h2>';

$debug = true;
$access = null;
$access = $assetManager->checkVideoProgrammeAspect($videoid, $userid, $debug);
var_dump($access);

echo '<br/><br/><br/>';
echo 'check a given video array';

$requiredTags = ["47", "48", "50", "55"];

$requiredTagCategories = $requiredTags;

$videos = [];

$x = 0;

$data2 = $navigator->getVideoData($requiredTagCategories, $tagsToMatch, $debug, $active, $gieqsDigitalv1);

$videos = $data2;

foreach ($videos as $key => $value) {

    //does it require subscription?

    $array_key = $key;

    //check there is no access via a programme

    $access3 = $assetManager->checkVideoProgrammeAspect($value['id'], $userid, false);

    if ($access3 === false) { //contained within a programme and no access to this programme

        if ($debug) {

            echo 'user id ' . $userid . ' has no access to video id ' . $value['id'] . ' via a programme';
            echo 'now checking access via videoset';
            echo '<br/><br/>';

        }

        $access = $assetManager->video_requires_subscription($value['id'], false);

        if ($access) { //requires subscription via videoset (is in a videoset)

            $access2 = $assetManager->video_owned_by_user($value['id'], $userid, false);

            if ($access2 === false) { //in videoset, not owned by user

                //remove this video from the array
                unset($videos[$key]);
                if ($debug) {

                    echo 'user id ' . $userid . ' has no access to video id ' . $value['id'];
                    echo '<br/><br/>';

                }

            } else {

                if ($debug) {

                    echo 'user id ' . $userid . ' has access to video id ' . $value['id'];
                    echo '<br/><br/>';

                }

                //user has access to this video via videoset.  despite no access via programme grant
            }

        } else { //is not in a videoset (but is contained within a programme)

            if ($debug) {

                echo 'video id ' . $value['id'] . ' requires a programme subscription and is not covered by a videoset';
                echo 'video id ' . $value['id'] . ' removed from array';
                echo '<br/><br/>';

            }

            unset($videos[$key]);

        }

    } elseif ($access3 === true) {

        if ($debug) {

            echo 'user id ' . $userid . ' has access to video id ' . $value['id'] . ' via a programme';
            echo 'access granted';
            echo '<br/><br/>';

        }

    } else {

        //not contained within a programme
        //check if contained within a videoset
        $access = $assetManager->video_requires_subscription($value['id'], false);

        if ($access) { //requires subscription via videoset (is in a videoset)

            $access2 = $assetManager->video_owned_by_user($value['id'], $userid, false);

            if ($access2 === false) { //in videoset, not owned by user

                //remove this video from the array
                unset($videos[$key]);
                if ($debug) {

                    echo 'user id ' . $userid . ' has no access to video id ' . $value['id'];
                    echo '<br/><br/>';

                }

            } else {

                if ($debug) {

                    echo 'user id ' . $userid . ' has access to video id ' . $value['id'];
                    echo '<br/><br/>';

                }

                //user has access to this video via videoset.  despite no access via programme grant
            }

        } else {

            //not in programme or videoset

            if ($debug) {

                echo 'video ' . $value['id'] . ' is freely available';

                echo 'user id ' . $userid . ' has access to video id ' . $value['id'];
                echo '<br/><br/>';

            }

        }

    }

}

$subscription = new subscriptions;

echo '<br/><br/><br/>';

echo '<h2>Testing Update of Subscriptions to GIEQs Digital Registrants</h2>';

//a script to update bulk registrations based on the old system


$requiredArray = ['23', '25', '29', '30', '31']; //all GIEQs digital registrants

//print_r($requiredArray);

//print_r($liveAccess);

//get all users

$usersArray = $userFunctions->getMailListAll();

//$usersArray = ['598'];//test

/* foreach ($usersArray as $key => $value) {  //COMMENTED SINCE SCRIPT LONG

    $access = null;
    $access = $userFunctions->enrolmentPatternLive($value);

    var_dump($access);

    $bFound = (count(array_intersect($access, $requiredArray))) ? true : false;

//if (in_array($liveAccess, 25)){
    if ($bFound) {

        echo $value . ' has access';
        //update database

        $current_date = new DateTime('now', new DateTimeZone('UTC'));

        $current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s');

        $interval = 'P1M';

        $end_start_calculate_date = $current_date;

        $end_start_calculate_date->add(new DateInterval($interval));

        $end_date_sqltimestamp = date_format($end_start_calculate_date, 'Y-m-d H:i:s');

        if (!($assetManager->is_assetid_covered_by_user_subscription('9', $value, false))) {

            $subscription->New_subscriptions($value, 9, $current_date_sqltimestamp, $end_date_sqltimestamp, '1', '0', 'GIFT_GIEQSDIGITAL_SUBSCRIBERS');
            echo $subscription->prepareStatementPDO();

        } else {

            $assetManager->is_assetid_covered_by_user_subscription('9', $value, true);
            echo '<br/>User already owns current subscription of this asset type';

        }

        if (!($assetManager->is_assetid_covered_by_user_subscription('4', $value, false)) && !($assetManager->is_assetid_covered_by_user_subscription('3', $value, false))) {

            $subscription->New_subscriptions($value, 4, $current_date_sqltimestamp, $end_date_sqltimestamp, '1', '0', 'GIFT_GIEQSDIGITAL_SUBSCRIBERS');
            echo $subscription->prepareStatementPDO();

        } else {

            $assetManager->is_assetid_covered_by_user_subscription('4', $value, true);
            echo '<br/>User already owns current subscription of this asset type';

        }

        echo 'Subscriptions update status above <br/><br/>';

        //echo '<br/><br/>would update so now \$subscription->New_subscriptions(' . $value . ', 9, ' . $current_date_sqltimestamp . ', ' . $end_date_sqltimestamp . ', \'1\', \'0\', \'GIFT_GIEQSDIGITAL_SUBSCRIBERS\'); <br/><br/>';

    } else {

        echo $value . ' has NO access<br/><br/>';

    }

} */

//if has access to any of these then grant mail and update the user registration with a 1 month trial

$currentTime = new DateTime('now', $serverTimeZone);

echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo 'Participants';

//get array of participants 

$assetid = 8;

$owners = $assetManager->getOwnersAsset($assetid);

foreach ($owners as $key=>$value){

    //push if active
    if (!($assetManager->isSubscriptionActive($value['id'], $currentTime, false))){

        unset($owners[$value]);

    }

}

print_r($owners);

echo '<table>';

echo '<tr>';
echo '<th>Name</th>';
echo '<th>Gender</th>';
echo '<th>Role</th>';
echo '<th>Country</th>';
echo '</tr>';



foreach ($owners as $key=>$value){
    echo '<tr>';

    $users->Load_from_key($value);

    echo "<td>{$users->getfirstname()} {$users->getsurname()}</td>";
    echo "<td>{$users->getgender()}</td>";
    echo "<td>{$users->getendoscopistType()}</td>";
    echo "<td>{$general->getCountryName($users->getcentreCountry())}</td>";

    echo '</tr>';


}



echo '</table>';



echo '<br/><br/><br/>';
echo '<br/><br/><br/>';

echo '<br/><br/><br/>';

echo '<h2>Adding a specific subscription to a specific group of users</h2>';

//a script to update bulk registrations based on the old system


//$requiredArray = ['23', '25', '29', '30', '31']; //all GIEQs digital registrants

//print_r($requiredArray);

//print_r($liveAccess);

//get all users

//$usersArray = $userFunctions->getMailListAll();
$usersArray = NULL;//test

$asset_to_add = NULL; //the asset for which access should be added

$interval = NULL; //length of time valid

$reference = NULL;

//$usersArray = ['1', '2', '5', '4', '9', '10', '11', '12', '14', '15', '21', '23', '24', '29', '55', '22', '581', '219', '353', '355', '50', '471'];//test ALL PARTICIPANTS 2ND DAY

$usersArray = ['1', '5', '4', '9', '10', '11', '12', '14', '15', '21', '23', '24', '22', '581', '219', '353', '355', '471'];//test FIRST DAY


$asset_to_add = '7'; //the asset for which access should be added

$interval = 'P3M'; //length of time valid

$reference = 'GIFTUZSTAFF';

//does it auto-renew?

foreach ($usersArray as $key => $value) {  //COMMENTED SINCE SCRIPT LONG



        echo $value . ' was in the array';
        //update database

        $current_date = new DateTime('now', new DateTimeZone('UTC'));

        $current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s');


        $end_start_calculate_date = $current_date;

        $end_start_calculate_date->add(new DateInterval($interval));

        $end_date_sqltimestamp = date_format($end_start_calculate_date, 'Y-m-d H:i:s');

        if (!($assetManager->is_assetid_covered_by_user_subscription($asset_to_add, $value, false))) {

            $subscription->New_subscriptions($value, $asset_to_add, $current_date_sqltimestamp, $end_date_sqltimestamp, '1', '0', $reference);
            echo $subscription->prepareStatementPDO();

        } else {

            $assetManager->is_assetid_covered_by_user_subscription($asset_to_add, $value, true);
            echo '<br/>User already owns current subscription of this asset type';

        }

        

        echo 'Subscriptions update status above <br/><br/>';

        //echo '<br/><br/>would update so now \$subscription->New_subscriptions(' . $value . ', 9, ' . $current_date_sqltimestamp . ', ' . $end_date_sqltimestamp . ', \'1\', \'0\', \'GIFT_GIEQSDIGITAL_SUBSCRIBERS\'); <br/><br/>';

    

} 

//if has access to any of these then grant mail and update the user registration with a 1 month trial


echo '<br/><br/><br/>';
echo '<br/><br/><br/>';

$sessions = null;
$sessions = $programmeView->getSessions('23');
print_r($sessions);


$videosForSessions = array();
foreach ($sessions as $key2=>$value2){

    if (isset($value2['sessionid'])){

        $videosForSessions[] = $programmeView->getVideoURL($value2['sessionid']);

    }

}


//now shows all session items

$videosForSessions2 = array();
$x = 0;
foreach ($sessions as $key2=>$value2){

    if (isset($value2['sessionid'])){

        $videosForSessions2data = array();
        $videosForSessions2data = $programmeView->getVideoURLAll($value2['sessionid']);

        foreach ($videosForSessions2data as $key3=>$value3){

            $videosForSessions2[$x] = $value3;
            $x++;

        }

        
    }

}


//if debug show the videos

if ($debug){

var_dump($videosForSessions2);

}


echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
