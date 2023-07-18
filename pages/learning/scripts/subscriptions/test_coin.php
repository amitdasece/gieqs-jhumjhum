<?php
$openaccess = 1;

//$requiredUserLevel = 6;

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


/*TEST SUB LENGTH*/

$subscription_id = '1024';

if ($debug) {

    echo 'Looking for subscription ' . $subscription_id;
    echo '<br/';

}

$debug = true;

error_reporting(E_ALL);

//echo $subscription->matchRecord($subscription_id);

//echo 'hello';

//var_dump($subscription);


if ($subscription->matchRecord($subscription_id)) {

   

    if ($debug) {

        echo 'Found subscription ' . $subscription_id;
        echo '<br/';

    }

    $subscription->Load_from_key($subscription_id);

    //var_dump($subscription);


    if ($subscription->getactive() == '1') {

        if ($debug) {

            echo 'subscription ' . $subscription_id . ' is active';
            echo '<br/';

        }

        //subscription already active
        //give subcription make sure autorenew is 1
        $subscription->setauto_renew('1');
        echo $subscription->prepareStatementPDOUpdate();

        //get the user id

        $user_id_subscription = $subscription->getuser_id();

        if ($debug) {

            echo 'user id is  ' . $user_id_subscription . '';
            echo '<br/';

        }

        //TODO SOON TODO
        //length (months) of subscription
        //error_reporting(E_ALL);

       // var_dump($assetManager);

        $subscription_length = $assetManager->getLengthSubscription($subscription_id, false);

        if ($debug) {

            echo 'length of subscriptionn s  ' . $subscription_length . ' months';
            echo '<br/';

        } 

    

        //echo 'hello';

        $coin_grant_amount = 30; //the amount credited every 6 months

      if ($debug) {

            echo 'amount to grant  is  ' . $coin_grant_amount . '';
            echo '<br/';

        }

        //var_dump(lengthSubscription);

        if ($subscription_length > 5) {


            
            if ($debug){

                echo 'in the length subscription loop';
                //check how many already given
                   
            }

            $count = $userFunctions->returnRecentCoinGrantStandardSubscription($user_id_subscription, false);

            //var_dump($count);

            if (is_array($count)){

                $numberOfTimes = $count[0]['count'];


            }else if ($count === false) {

                $numberOfTimes = 0;

            }


            if ($debug) {

                echo 'already given ($numberOfTimes) is' . $numberOfTimes . '';
                echo '<br/';

            }

            //var_dump(lengthSubscription);


            //if multiples work out

            //number should be

            $numberShouldBe = $subscription_length / 6;

            if ($debug) {

                echo 'number should be  ($numberShouldBe) is' . $numberShouldBe . '';
                echo '<br/';

            }

            var_dump(lengthSubscription);


            if (($numberOfTimes == 0) || (($numberOfTimes > 0) && ($numberOfTimes < $numberShouldBe))) {

                if ($debug) {

                    echo 'Time to record another subscription and give coins';

                }

                $date = new DateTime('now', new DateTimeZone('UTC'));
                $sqltimestamp = date_format($date, 'Y-m-d H:i:s');

                $userActivity->New_userActivity($user_id_subscription, 'COIN_GRANT_STANDARD_SUBSCRIPTION_' . $subscription_length . 'MONTHS ' . $coin_grant_amount, '', $sqltimestamp);
                $userActivity->prepareStatementPDO();

                $coin_grant->New_coin_grant($sqltimestamp, $coin_grant_amount, $userid);
                $new_grant_id = $coin_grant->prepareStatementPDO();

                if ($debug) {

                    echo 'coins granted';
                    echo '<br/>';
    
                }

            } else {

                if ($debug) {

                    echo 'NOT TIME to record another subscription or give coins OR ALREADY DONE';
    
                }



            }

        } else {

            if ($debug) {

                echo 'NOT TIME to record another subscription and give coins OR ALREADY DONE';

            }

        }

    } else {

        //subscription is inactive but should be active
        //should autorenew since this is a subscription

        $subscription->setactive('1');
        $subscription->setauto_renew('1');
        $subscription->prepareStatementPDOUpdate();

    }

    //detect the previous useractivity if >6, 2 if over 12 etc
    //if first or 6 months grant coins if it is a STANDARD
    //pro gives everything

    //could send mail thanks for updating payment information

} else {

    //cannot find subscription or is not active

    echo 'Cannot find subscription';

}

echo 'end';




echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
