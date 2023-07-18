<?php
$openaccess = 0;

$requiredUserLevel = 1;

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

foreach ($usersArray as $key => $value) {  //COMMENTED SINCE SCRIPT LONG

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

        if (!($assetManager->is_assetid_covered_by_user_subscription('13', $value, false))) {

            $subscription->New_subscriptions($value, 13, $current_date_sqltimestamp, $end_date_sqltimestamp, '1', '0', 'GIFT_GIEQSDIGITAL_SUBSCRIBERS');
            echo $subscription->prepareStatementPDO();

        } else {

            $assetManager->is_assetid_covered_by_user_subscription('13', $value, true);
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

}

//if has access to any of these then grant mail and update the user registration with a 1 month trial




echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
