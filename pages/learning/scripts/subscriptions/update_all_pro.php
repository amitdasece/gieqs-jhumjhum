<?php
$openaccess = 1;

//$requiredUserLevel = 6;

error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';

$location = BASE_URL . '/index.php';





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

error_reporting(E_ALL);

echo 'hello';

// Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys

require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister ('class_loader');

?>

<?php

$assets = $assetManager->returnProPurchasedAssetsUser(1, false); 
var_dump($assets);

echo $assetManager->extendProAssetsUser(1, true);

$assets = $assetManager->returnProPurchasedAssetsUser(1, false); 
var_dump($assets);

echo '<br><br>';


//INSTITUTION TABLE PREPARATION

echo 'Assets that are owned by token id xx related to institution ';

$assets = null;
$assets = $assetManager->provideInstitutionalData(18, true);
var_dump($assets);

//load the subscription

$subscription->Load_from_key($assets[0]);
echo $subscription->getstart_date(); //start date 
echo $subscription->getexpiry_date(); //end date
$dateToday = new DateTime('now', new DateTimeZone('UTC'));
$dateExpiry = new DateTime($subscription->getexpiry_date(), new DateTimeZone('UTC'));

//get the difference between today and the subscription date
echo $dateToday->diff($dateExpiry)->format("%a"); //days remaining

//get completion of all videos

var_dump($usersMetricsManager->userCompletionVideos('1', false)); //completion of all videos where shown on live site

//get completion of all pro assets , these are assets which are advertised_for_purchase

//step 1 , get all asset ids advertised for purchase
//use $userMetricsManager->userCompletionAsset($userid, $assetid, $debug)
//then use the method in usercompletionvideos to calculate


//last login/activity
//$q2 = "SELECT `session_id`, `activity_time` FROM `userActivity` WHERE `user_id` = '$userid' ORDER BY `activity_time` DESC LIMIT 1";
echo $userFunctions->defineLastLogin('1', false);


//PREPARATION FOR UPGRADING AND DOWNGRADING ALL SUBSCRIPTIONS

//for each current pro user create a subscription for all advertised assets that occur in the past
//each time a pro subscription is created do this for all advertised assets in the past

echo '<br/><br/>';
echo 'Asset Arrays';
//var_dump($assetManager->returnAdvertisedAssets(2, false));
//var_dump($assetManager->returnAdvertisedAssets(3, false));
//var_dump($assetManager->returnAdvertisedAssets(4, false));

//function to get starttime of a programme

function getProgrammeStartTime($assetid, $assetManager, $sessionView, $programme){

    $programme_array = $assetManager->returnProgrammesAsset($assetid);
    $programme_defined = $programme_array[0];
    $access = [0=>['id'=>$programme_defined],];
    $access1 = null;
    $access1 = $sessionView->getStartAndEndProgrammes($access, $debug);
    $access2 = null;
    $access2 = $sessionView->getStartEndProgrammes($access1, $debug);
    $programme->Load_from_key($programme_defined);
    $serverTimeZone = new DateTimeZone('Europe/Brussels');
    $programmeDate = new DateTime($programme->getdate(), $serverTimeZone);
    $humanReadableProgrammeDate = date_format($programmeDate, "l jS F Y");
    $startTime = new DateTime($programme->getdate() . ' ' . $access2[0]['startTime'], $serverTimeZone);
    $endTime = new DateTime($programme->getdate() . ' ' . $access2[0]['endTime'], $serverTimeZone);
    $humanStartTime = date_format($startTime, "H:i");
    $humanEndTime = date_format($endTime, "H:i T");
    return $startTime;

}

function getStatusUser($userid, $assetManager, $userFunctions, $debug=false){

    $siteWideSubscriptionid = $assetManager->getSiteWideSubscription($userid, $debugUserAccess);
    
          if ($debug){
            echo 'SUBSCRIPTION ID IS ' . $siteWideSubscriptionid;
            }
    
          //find out which asset
    
          $assetid_subscription = $assetManager->getAssetid($siteWideSubscriptionid);
    
          if ($debug){
            echo 'ASSET ID IS ' . $assetid_subscription;
            }
    
          //allocate umber based on 6 FREE, 5 STANDARD, 4 PRO

          if ($userFunctions->isSuperuser($userid) === true){

            $sitewide_status = '2';


          }else{
    
          $sitewide_status = $assetManager->getMembershipStatusAssetid($assetid_subscription);
    
          if ($debug){
            echo 'SITE WIDE STATUS IS ' . $sitewide_status;
            }
        }


        return $sitewide_status;
}

function getPastAdvertisedAssets ($assetManager, $sessionView, $programme) {

    $assets = [];


    $assets2 = $assetManager->returnAdvertisedAssets(2, false);
    $assets3 = $assetManager->returnAdvertisedAssets(3, false);
    $assets4 = $assetManager->returnAdvertisedAssets(4, false);


    //define date today
    $today = new DateTime('now');

    //add them all to an array

    foreach ($assets2 as $key=>$value){
        
        foreach ($value as $key2=>$value2){

            //add the id to the array ONLY if the start time is not in the future
            if (getProgrammeStartTime($value['id'], $assetManager, $sessionView, $programme) < $today){
                    $assets[] = $value['id']; 
                    break;
            }

        }
        


    }

    foreach ($assets3 as $key=>$value){

        foreach ($value as $key2=>$value2){
            //var_dump($value['id']);

            //add the id to the array ONLY if the start time is not in the future

            if (getProgrammeStartTime($value['id'], $assetManager, $sessionView, $programme) < $today){
                $assets[] = $value['id']; 
                break;

            }

        }


    }

    foreach ($assets4 as $key=>$value){

        //no dates in these assets

        foreach ($value as $key2=>$value2){
            //var_dump($value['id']);

            $assets[] = $value['id'];
            break;


        }


    }

    return $assets;


}


$assets = getPastAdvertisedAssets($assetManager, $sessionView, $programme);
echo '<br/><br/><br/>';
echo '<pre>';
var_dump($assets);
echo '</pre>';


echo '<br/>';
echo '<br/>';

//******************** */
//START SCRIPT TO ADD ALL CURRENT PRO USER ASSETS
$log=[];
$debug = true;

//iterate all users

$users = $userFunctions->getAllUsers();


//if user pro add assets

$assets = getPastAdvertisedAssets($assetManager, $sessionView, $programme);


//DEFINE DATES
//today
$current_date = new DateTime('now', new DateTimeZone('UTC'));
$current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s');

//after 1 year
$interval = 'P12M';

//add interval to today
$end_start_calculate_date = new DateTime('now', new DateTimeZone('UTC'));
$end_start_calculate_date->add(new DateInterval($interval));
$end_date_sqltimestamp = date_format($end_start_calculate_date, 'Y-m-d H:i:s');



foreach ($users as $key=>$value){

    if (getStatusUser($value, $assetManager, $userFunctions, false) == '2'){
        //if a pro user
        $log[] = 'User no ' . $value . ' is a PRO user with current status';

        //give access to all assets which does not expire, or which expires

        foreach ($assets as $assetkey=>$assetvalue){
            //iterate through advertised assets


            //check if user already owns

            //if not give a 1 year  access 

            //$value is userid

            //$assetvalue is assetid

            if ($assetManager->doesUserHaveSameAssetAlready($assetvalue, $value, false) === false){

                $log[] = 'User no ' . $value . ' does not currently own asset ' . $assetvalue;


              $subscription->New_subscriptions($value, $assetvalue, $current_date_sqltimestamp, $end_date_sqltimestamp, '1', '0', 'TOKEN_ID=PRO_SUBSCRIPTION');

              $newSubscriptionid = $subscription->prepareStatementPDO();

              //$newSubscriptionid = ' fake subscription id';


              $log[] = 'User no ' . $value . ' granted access to assetid ' . $assetvalue . '. New subscription no = ' . $newSubscriptionid;


            }else{
                
                $log[] = 'User no ' . $value . ' already owns asset ' . $assetvalue;


            }




        }



    }else{

        $log[] = 'User no ' . $value . ' is not a pro user';


    }


}

echo '<pre>';
var_dump($log);
echo '</pre>';

//*****END SCRIPT FOR ALL USERS */

//******************** */
//START SCRIPT TO UPDATE A NEW PRO USER

/*$log = [];

//DEFINE USER ID 
$defined_userid = '1';
//define assets future
$assets = getPastAdvertisedAssets($assetManager, $sessionView, $programme);

//DEFINE DATES
//today
$current_date = new DateTime('now', new DateTimeZone('UTC'));
$current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s');

//after 1 year
$interval = 'P12M';

//add interval to today
$end_start_calculate_date = new DateTime('now', new DateTimeZone('UTC'));
$end_start_calculate_date->add(new DateInterval($interval));
$end_date_sqltimestamp = date_format($end_start_calculate_date, 'Y-m-d H:i:s');



foreach ($assets as $assetkey=>$assetvalue){
    //iterate through advertised assets


    //check if user already owns

    //if not give a 1 year  access 

    //$value is userid

    //$assetvalue is assetid

    if ($assetManager->doesUserHaveSameAssetAlready($assetvalue, $defined_userid, false) === false){

        $log[] = 'User no ' . $defined_userid . ' does not currently own asset ' . $assetvalue;


      $subscription->New_subscriptions($defined_userid, $assetvalue, $current_date_sqltimestamp, $end_date_sqltimestamp, '1', '0', 'TOKEN_ID=PRO_SUBSCRIPTION');

      $newSubscriptionid = $subscription->prepareStatementPDO();

      //$newSubscriptionid = ' fake subscription id';


      $log[] = 'User no ' . $defined_userid . ' granted access to assetid ' . $assetvalue . '. New subscription no = ' . $newSubscriptionid;


    }else{
        
        $log[] = 'User no ' . $defined_userid . ' already owns asset ' . $assetvalue;


    }




}


echo '<pre>';
var_dump($log);
echo '</pre>'; */











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
