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

require_once BASE_URI . '/assets/scripts/classes/programmeView.class.php';
$programmeView = new programmeView;

require_once BASE_URI . '/assets/scripts/classes/coin.class.php';
$coin = new coin;

require_once BASE_URI . '/assets/scripts/classes/coin_grant.class.php';
$coin_grant = new coin_grant;

require_once BASE_URI . '/assets/scripts/classes/coin_spend.class.php';
$coin_spend = new coin_spend;

error_reporting(E_ALL);


/*TEST SUB LENGTH*/

$subscription_id = '1024';

if ($debug) {

    echo 'Looking for subscription ' . $subscription_id;
    echo '<br/';

}

$debug = true;

error_reporting(E_ALL);

echo $subscription->matchRecord($subscription_id);

echo 'hello';

var_dump($subscription);


if ($subscription->matchRecord($subscription_id)) {

    $debug = true;

    if ($debug) {

        echo 'Found subscription ' . $subscription_id;
        echo '<br/';

    }

    $subscription->Load_from_key($subscription_id);

    var_dump($subscription);


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
        error_reporting(E_ALL);



        $lengthSubscription = $assetManager->getLengthSubscription($subscription_id, true);

        /*  if ($debug) {

            echo 'length of subscriptionn is  ' . $lengthSubscription . ' months';
            echo '<br/';

        }  */
        //write a useractivity 6 month coin grant

        //if > 6 months

        //GRANT AMOUNT
        //CHANGE ME

        echo 'hello';

        $coin_grant_amount = 50; //the amount credited every 6 months

        if ($debug) {

            echo 'amount to grant  is  ' . $coin_grant_amount . '';
            echo '<br/';

        }


        if (intval($lengthSubscription) >= 6) {


            echo 'in the length subscription loop';
            //check how many already given

            if ($debug){

               
            }

            $count = $userFunctions->returnRecentCoinGrantStandardSubscription($user_id_subscription, true);

            var_dump($count);

            $numberOfTimes = $count[0];

            if ($debug) {

                echo 'already given ($numberOfTimes) is' . $count . '';
                echo '<br/';

            }

            //if multiples work out

            //number should be

            $numberShouldBe = $lengthSubscription / 6;

            if ($debug) {

                echo 'number should be  ($numberShouldBe) is' . $numberShouldBe . '';
                echo '<br/';

            }

            if (($numberOfTimes > 0) && ($numberOfTimes < $numberShouldBe)) {

                if ($debug) {

                    echo 'Time to record another subscription and give coins';

                }

                $date = new DateTime('now', new DateTimeZone('UTC'));
                $sqltimestamp = date_format($date, 'Y-m-d H:i:s');

                $userActivity->New_userActivity($user_id_subscription, 'COIN_GRANT_STANDARD_SUBSCRIPTION_' . $lengthSubscription . 'MONTHS ' . $coin_grant_amount, '', $sqltimestamp);
                $userActivity->prepareStatementPDO();

                $coin_grant->New_coin_grant($sqltimestamp, $coin_grant_amount, $userid);
                $new_grant_id = $coin_grant->prepareStatementPDO();

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

die();

/*

//GIVE COINS TO USER

//get mysql date UTC
$date = new DateTime('now', new DateTimeZone('UTC'));
$sqltimestamp = date_format($date, 'Y-m-d H:i:s');

//check logged in done already in interpret user access
//with secure session id

//enter fake userid here

$userid = 595;

$amount_grant = 22;
$coin_grant->New_coin_grant($sqltimestamp, $amount_grant, $userid);
$coin_grant->prepareStatementPDO();

//get mysql date UTC
$date = new DateTime('now', new DateTimeZone('UTC'));
$sqltimestamp = date_format($date, 'Y-m-d H:i:s');

//SPEND COINS

$amount_spend = 22;
$asset_id = 6;

//check balance first
//if balance < amount_spend do not execute

$balance = $coin->current_balance($userid);

if ($balance >= $amount_spend){

$coin_spend->New_coin_spend($sqltimestamp, $amount_spend, $userid, $asset_id);
$transaction_id = $coin_spend->prepareStatementPDO(); // store and pass the id

echo 'We just spent ' . $amount_spend . ' coins for user ' . $userid . ' and the transaction id was '. $transaction_id;

}else{

echo 'Insufficient coins to make this transaction';
echo '<br/>';
echo "Requested amount was $amount_spend but userid $userid has only $balance remaining";

}

echo '<br/><br/><br/>';
echo '<br/><br/><br/>';

//check user number of coins

echo 'user with id ' . $userid . ' has ';
echo $coin->current_balance($userid);
echo ' coins';
//user  has coins
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';

$balance = $coin->user_has_coins($userid);
if ($balance){

$text = ' some ';
}else{

$text = ' no ';
}

echo 'user has ' . $text . ' coins';

//find the active programme
echo '<br/><br/><br/>';

 */

//STRUCTURE FOR TEMPORARY TRANSACTIONS THAT CAN BE RECALLED

//clicks use gieqs coin
//WITH TEMPORARY ARCHITECTURE

//record a coin use but somehow make it temporary
//that is record and store the id in useractitiv

$userid = 1;

$lengthSubscription = $assetManager->getLengthSubscription(1050, true);
echo $lengthSubscription;

echo 'user with id ' . $userid . ' has ';
echo $coin->current_balance($userid);
echo ' coins <br/><br/>';

//$amount_grant = 22;
/* $coin_grant->New_coin_grant($sqltimestamp, $amount_grant, $userid);
$coin_grant->prepareStatementPDO(); */

//get mysql date UTC
$date = new DateTime('now', new DateTimeZone('UTC'));
$sqltimestamp = date_format($date, 'Y-m-d H:i:s');

//SPEND COINS

$amount_spend = 22;
$asset_id = 6;

$balance = $coin->current_balance($userid);

//returnRecentCoinTransactionUserAll
//returns false if no recent transactions
//returns an array of all transactions starting at 1 if were recent transactions
//array[0]['count'] is number of recent transactions, we don't need this can count the array

//returnRecentCoinTransactionUserSingle
//returns false if none or more than 1
//if one returns the transaction_id

echo 'Debug >>>>>';
/* print_r($userFunctions->returnRecentCoinTransactionUserSingle($userid, false));
$singleArray = $userFunctions->returnRecentCoinTransactionUserAll($userid, false);
var_dump($singleArray); */
echo '<br/><br/>';
echo 'Checking before any transaction';

print_r($userFunctions->returnRecentCoinTransactionUserAll($userid, false));
$totalArray = $userFunctions->returnRecentCoinTransactionUserAll($userid, false);
var_dump($totalArray);

if ($totalArray[0]['count'] > 0) {

    echo 'Detected ' . $totalArray[0]['count'] . ' unfulfilled coin transactions';
    echo 'These should be deleted first';

    foreach ($totalArray as $key => $value) {

        if ($key > 0) {

            if (is_array($value)) {

                //use id
                //then delete the required useractivity

                echo 'we detected a recent transaction with id ' . $value['transaction_id'];

                //TODO
                //could check here if wqs previously reversed

                $userActivity->Load_from_key($value['id']);
                $userActivity->setsession_id('CANCELLED_COIN_FROM_TEMP ' . $value['transaction_id']);
                echo $userActivity->prepareStatementPDOUpdate();
                echo ' this record in useractivity was renamed';
                echo 'the coin transaction was reversed and credits applied to the user account';

                //get the transaction
                $coin_spend->Load_from_key($value['transaction_id']);

                //get the amount
                $transaction_amount = $coin_spend->getamount();

                //make a new transaction crediting this amount
                $coin_grant->New_coin_grant($sqltimestamp, $transaction_amount, $userid);
                $new_grant_id = $coin_grant->prepareStatementPDO();
                $userActivity->New_userActivity($userid, 'REFUND_COIN ' . $new_grant_id, '', $sqltimestamp);
                $userActivity->prepareStatementPDO();

            } else {

                echo 'no array  passed';
            }
        }

    }

} else {

    echo '<br/><br/>No outstanding coin transactions detected';
}
echo '<br/><br/>';
echo 'Debug >>>>>';

if (($userFunctions->returnRecentCoinTransactionUserSingle($userid, false)) === false) {; //check if user already has an outstandng temp spend

    echo 'User ' . $userid . ' currently has ' . $balance . ' coins remaining';
    echo '<br/><br/>';

    if ($balance >= $amount_spend) {

        $coin_spend->New_coin_spend($sqltimestamp, $amount_spend, $userid, $asset_id);
        $transaction_id = $coin_spend->prepareStatementPDO(); // store and pass the id

        echo 'We just recorded spend of ' . $amount_spend . ' coins for user ' . $userid . ' and the transaction id was ' . $transaction_id;

    } else {

        echo 'User does not have enough ( ' . $amount_spend . ' ) coins for this transaction';

    }

    //so write the useractivity for thiis

    //first check no other temporary spend recorded

    $userActivity->New_userActivity($userid, 'TEMP_COIN ' . $transaction_id, '', $sqltimestamp);
    $userActivity->prepareStatementPDO();

    if ($debug) {

        echo 'Spend recorded in useractivity';
    }

    //die();

} else {

    echo 'Recent temporary transaction detected that has not been finalised.  Should no longer occur.  Check with info@gieqs.com if you are seeing this message and we will make it right?';

}

//get back that there has been a temporary transaction

//TO MAKE DEFINNITIVE OR CANCEL

$transaction_id_check = $userFunctions->returnRecentCoinTransactionUserSingle($userid, false);

echo 'check for recent transactions finds <br/>';
var_dump($transaction_id_check);
echo '<br/><br/>';
//the one most recent
//if more than one?

/*    //to MAKE DEFINITIVE
if ($transaction_id_check){

//use id
//then delete the required useractivity

echo 'we detected a recent transaction with id ' . $transaction_id_check['transaction_id'];
$userActivity->Load_from_key($transaction_id_check['id']);
$userActivity->setsession_id('DEFINITIVE_COIN_FROM_TEMP ' . $transaction_id_check['transaction_id']);
echo $userActivity->prepareStatementPDOUpdate();
echo ' this record in useractivity was renamed';

}else{

echo 'no recent transaction';
}
 */

//TO CANCEL

if ($transaction_id_check) {

    //use id
    //then delete the required useractivity

    echo 'we detected a recent transaction with id ' . $transaction_id_check['transaction_id'];
    $userActivity->Load_from_key($transaction_id_check['id']);
    $userActivity->setsession_id('CANCELLED_COIN_FROM_TEMP ' . $transaction_id_check['transaction_id']);
    echo $userActivity->prepareStatementPDOUpdate();
    echo ' this record in useractivity was renamed';
    echo 'the coin transaction was reversed and credits applied to the user account';

    //get the transaction
    $coin_spend->Load_from_key($transaction_id_check['transaction_id']);

    //get the amount
    $transaction_amount = $coin_spend->getamount();

    //make a new transaction crediting this amount
    $coin_grant->New_coin_grant($sqltimestamp, $transaction_amount, $userid);
    $new_grant_id = $coin_grant->prepareStatementPDO();
    $userActivity->New_userActivity($userid, 'REFUND_COIN ' . $new_grant_id, '', $sqltimestamp);
    $userActivity->prepareStatementPDO();

} else {

    echo 'no recent transaction';
}

echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
echo '<br/><br/><br/>';
