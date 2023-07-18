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


//check subscriptionns

$usersError = $assetManager->getErroneousSubscriptionUsers();

print_r($usersError);

$emails = $userFunctions->returnEmails($usersError);

//generate a new subscription
/*
$current_date = new DateTime('now', new DateTimeZone('UTC'));

$current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s');

$interval = 'P3M';

$end_start_calculate_date = $current_date;

$end_start_calculate_date->add(new DateInterval($interval));

$end_date_sqltimestamp = date_format($end_start_calculate_date, 'Y-m-d H:i:s');

foreach ($usersError as $key=>$value){

if (!($assetManager->is_assetid_covered_by_user_subscription('17', $value, false))) {

    $subscription->New_subscriptions($value, 17, $current_date_sqltimestamp, $end_date_sqltimestamp, '1', '0', 'GIFT-ERROR-GIEQS');
    echo $subscription->prepareStatementPDO();

} else {

    $assetManager->is_assetid_covered_by_user_subscription('17', $value, true);
    echo '<br/>User already owns current subscription of this asset type';

}

}
*/

//use users to get emails




$assetArray = $assetManager->which_assets_contain_programme('32');

var_dump($assetArray);

var_dump($userid);

//all course array
echo '<br/><br/><br/>';
echo '<h2>Get all courses for a given asset type?</h2>';

$access = $courseManager->returnAllCourses('3', true);


var_dump($access);

$access = $assetManager->getSuperCategories();

var_dump($access);



echo '<br/><br/><br/>';


echo '<br/><br/><br/>';
echo '<br/><br/><br/>';





echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
