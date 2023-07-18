<?php



$openaccess = 0;

$requiredUserLevel = 1;

error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';
require BASE_URI . '/assets/scripts/interpretUserAccess.php';

$location = BASE_URL . '/index.php';

spl_autoload_unregister('class_loader');
require BASE_URI . '/assets/scripts/pdocrud/script/pdocrud.php';
$pdocrud = new PDOCrud();
spl_autoload_register('class_loader');

require_once BASE_URI . '/assets/scripts/classes/sessionView.class.php';

$debug = true;
//$_SESSION['debug'] = true;

$general = new general;
$users = new users;

$users->Load_from_key($userid);

error_reporting(E_ALL);

require_once BASE_URI . '/assets/scripts/classes/courseManager.class.php';
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

require_once BASE_URI . '/assets/scripts/classes/userActivity.class.php';
$userActivity = new userActivity;

//require_once BASE_URI . '/assets/scripts/classes/programmeView.class.php';
//$programmeView = new programmeView;

require_once BASE_URI . '/assets/scripts/classes/coin.class.php';
$coin = new coin;

require_once BASE_URI . '/assets/scripts/classes/coin_grant.class.php';
$coin_grant = new coin_grant;

require_once BASE_URI . '/assets/scripts/classes/coin_spend.class.php';
$coin_spend = new coin_spend;

$csv = array_map('str_getcsv', file('files/registrations.csv'));

//var_dump($csv);
?>
<pre><?php print_r($csv)?></pre>




<?php

$debug = true;

//so the csv needs first email (same as used for the GIEQs registration)
//second day 1 yes 1 no 0
//third day 2 yes 1 no 0 


//some new
//generate a sql command to make an asset for all program items for a certain session


//get sessions

$assets_paid->New_assets_paid($name,$description,$asset_type,$superCategory,$linked_blog,$cost,$renew_frequency,$partner,$sponsor,$advertise_for_purchase);





//then

foreach ($csv as $key=>$value){

    //$value is the array
    //$value[0] is email
    //$value[1] is day 1 yes no
    //$value[2] is day 2 yes no

    $email = null;
    $email = trim($value[0]);
    $day1 = null;
    $day1 = trim($value[1]);
    $day2 = null;
    $day2 = trim($value[2]);

    if ($debug){

        var_dump($email);
        var_dump($day1);
        var_dump($day2);

    }

    $detectedUser = null;

    $detectedUser = $userFunctions->getUserFromEmail($email);

    if ($debug){

        var_dump($detectedUser);

    }


    if ($detectedUser === false){

        if ($debug){

            echo 'User with email ' . $email . ' not detected in the user database.  Aborting';
    
        }
        echo '<br/><br/>';

        continue;


    }else{

        if ($debug){

            echo 'User with email ' . $email . ' detected.  Proceeding to grant subscriptions';
    
        }


        if (($day1 == '0') || ($day1 == '1')){


            

    

        }else{

            if ($debug){
                echo 'Day 1 is ' . var_dump($day1);
                echo 'Day 1 not in correct format.  Aborting.';
        
            }

            echo '<br/><br/>';

            continue;


        }

        if (($day2 == '0') || ($day2 == '1')){


            


    

        }else{

            if ($debug){

                echo 'Day 2 not in correct format.  Aborting.';
        
            }

            echo '<br/><br/>';

            continue;
        }

        $users->Load_from_key($detectedUser);

        $newSubscriptionid1 = null;
        $newSubscriptionid2 = null;
        $newSubscriptionid3 = null;
        $newSubscriptionid4 = null;
        $newSubscriptionid5 = null;
        $newSubscriptionid6 = null;
        $ranProGrant = false;

        if ($day1 == '1'){


            //grant subscriptions for day 1

            $current_date = new DateTime('now', new DateTimeZone('UTC'));
    
            $current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s');
    
        
    
            $end_date = new DateTime('2021-09-30 21:00:00', new DateTimeZone('UTC')); //end of GIEQs II Day I
            $end_date_pro = new DateTime('2021-09-30 21:00:00', new DateTimeZone('UTC')); //end of GIEQs II Day I

    
            $interval = 'P3M';
            $interval2 = 'P1M'; //pro subscription
    
            $end_date->add(new DateInterval($interval));
        
            $end_date_sqltimestamp = date_format($end_date, 'Y-m-d H:i:s');

            $end_date_pro->add(new DateInterval($interval2));
        
            $end_date_pro_sqltimestamp = date_format($end_date_pro, 'Y-m-d H:i:s');
    
            if ($assetManager->doesUserHaveSameAssetAlready('24', $detectedUser, false) === false){

                $subscription->New_subscriptions($detectedUser, '24', $current_date_sqltimestamp, $end_date_sqltimestamp, '1', '0', 'gii subscription, payment via Seauton');
                $newSubscriptionid1 = $subscription->prepareStatementPDO();



            }else{

                echo '<br/>';
                echo 'User has an active subscription to asset 24 already';
            }
    
    

            if ($assetManager->doesUserHaveSameAssetAlready('25', $detectedUser, false) === false){

                $subscription->New_subscriptions($detectedUser, '25', $current_date_sqltimestamp, $end_date_sqltimestamp, '1', '0', 'gii subscription, payment via Seauton');
    
                $newSubscriptionid2 = $subscription->prepareStatementPDO();

            }else{

                echo '<br/>';
                echo 'User has an active subscription to asset 25 already';
            }

            
            if ($assetManager->doesUserHaveSameAssetAlready('18', $detectedUser, false) === false){

                $subscription->New_subscriptions($detectedUser, '18', $current_date_sqltimestamp, $end_date_pro_sqltimestamp, '1', '0', 'gii subscription, 1 mo trial, payment via Seauton');
    
                $newSubscriptionid5 = $subscription->prepareStatementPDO();

                

            }else{

                echo '<br/>';
                echo 'User has an active subscription to asset 18 already (pro)';
            }
    
            $ranProGrant = true;
          


        }

        if ($day2 == '1'){

            //grant subscriptions for day 2

            $current_date = new DateTime('now', new DateTimeZone('UTC'));
    
            $current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s');
    
        
    
            $end_date = new DateTime('2021-09-30 21:00:00', new DateTimeZone('UTC')); //end of GIEQs II Day I
    
    
            $interval = 'P3M';
    
            $end_date->add(new DateInterval($interval));

            $end_date_sqltimestamp = date_format($end_date, 'Y-m-d H:i:s');
    
    
            if ($assetManager->doesUserHaveSameAssetAlready('26', $detectedUser, false) === false){

                $subscription->New_subscriptions($detectedUser, '26', $current_date_sqltimestamp, $end_date_sqltimestamp, '1', '0', 'gii subscription, payment via Seauton');
    
                $newSubscriptionid3 = $subscription->prepareStatementPDO();
    

            }else{

                echo '<br/>';
                                echo 'User has an active subscription to asset 26 already';
            }



            if ($assetManager->doesUserHaveSameAssetAlready('27', $detectedUser, false) === false){

                

                $subscription->New_subscriptions($detectedUser, '27', $current_date_sqltimestamp, $end_date_sqltimestamp, '1', '0', 'gii subscription, payment via Seauton');
        
                $newSubscriptionid4 = $subscription->prepareStatementPDO();
    

            }else{

                echo '<br/>';
                echo 'User has an active subscription to asset 27 already';


            }

            if ($ranProGrant === false){

            if ($assetManager->doesUserHaveSameAssetAlready('18', $detectedUser, false) === false){

                $subscription->New_subscriptions($detectedUser, '18', $current_date_sqltimestamp, $end_date_pro_sqltimestamp, '1', '0', 'gii subscription, 1 mo trial, payment via Seauton');
    
                $newSubscriptionid6 = $subscription->prepareStatementPDO();

            }else{

                echo '<br/>';
                echo 'User has an active subscription to asset 18 already (pro)';
            }

        }
            



        }

        if ($debug){

            echo '<br/>';
            echo 'Result of subscriptions for user ' . $detectedUser . ' is : Day 1 ' .$newSubscriptionid1 . ' Day 2 ' .$newSubscriptionid2 . ' Day 3 ' .$newSubscriptionid3 . ' Day 4 ' .$newSubscriptionid4 . ' Pro Subscription ' . $newSubscriptionid5 . ' OR ' . $newSubscriptionid6;
        }






    }

    echo '<br/><br/>';


}





/* $courseTest = true;

var_dump($assetManager->hasAccessGIEQsII($assetManager->whichDay($courseTest,false), $userid, true));



var_dump($assetManager->whichDay(true, false));






echo '<br/><br/><br/>';

var_dump($assetManager->programme_owned_by_user (36, 1, true)); */
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
