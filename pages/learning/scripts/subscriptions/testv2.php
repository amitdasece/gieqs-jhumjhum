<?php
$openaccess = 1;

//$requiredUserLevel = 6;

error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';

$location = BASE_URL . '/index.php';


spl_autoload_unregister ('class_loader');
require BASE_URI . '/assets/scripts/pdocrud/script/pdocrud.php';
$pdocrud = new PDOCrud();
spl_autoload_register ('class_loader');

require_once BASE_URI . '/assets/scripts/classes/sessionView.class.php';


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


echo $pdocrud->dbTable("usersViewsVideo")->render();


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

echo 'programmes  is <br/><br/>';
var_dump($programmes);

//for one program

$programmes2 = $sessionView->convertProgrammeTimes($programmes, $debug);
echo 'programme 2 is <br/><br/>';
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




echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
