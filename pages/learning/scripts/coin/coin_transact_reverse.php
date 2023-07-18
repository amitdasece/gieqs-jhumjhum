<?php
//$openaccess = 1;
header('Access-Control-Allow-Origin: *');
$requiredUserLevel = 6;


error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';

error_reporting(E_ALL);

require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$general = new general;
$users = new users;
$users->Load_from_key($userid);


error_reporting(E_ALL);

require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;



require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;



require_once BASE_URI . '/assets/scripts/classes/userFunctions.class.php';
$userFunctions = new userFunctions;

require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;

require_once BASE_URI . '/assets/scripts/classes/coin.class.php';
$coin = new coin;


require_once BASE_URI . '/assets/scripts/classes/coin_grant.class.php';
$coin_grant = new coin_grant;


require_once BASE_URI . '/assets/scripts/classes/coin_spend.class.php';
$coin_spend = new coin_spend;


//echo'hello';

//echo $users->getendoscopistType();
$data = json_decode(file_get_contents('php://input'), true);

$debug = false;

if ($debug){
var_dump($data);
}



//do coin stuff

//confirm user is user, done already in interpretuseraccess

//confirm balance

//get mysql date UTC
$date = new DateTime('now', new DateTimeZone('UTC'));
$sqltimestamp = date_format($date, 'Y-m-d H:i:s');

//SPEND COINS


$balance = $coin->current_balance($userid);







//returnRecentCoinTransactionUserAll
//returns false if no recent transactions
//returns an array of all transactions starting at 1 if were recent transactions
//array[0]['count'] is number of recent transactions, we don't need this can count the array

//returnRecentCoinTransactionUserSingle
//returns false if none or more than 1
//if one returns the transaction_id

if ($debug){
echo 'Debug >>>>>';
/* print_r($userFunctions->returnRecentCoinTransactionUserSingle($userid, false));
$singleArray = $userFunctions->returnRecentCoinTransactionUserAll($userid, false);
var_dump($singleArray); */
echo '<br/><br/>';
echo 'Checking before any transaction';
}

if ($debug){
print_r($userFunctions->returnRecentCoinTransactionUserAll($userid, false));
}
$totalArray = $userFunctions->returnRecentCoinTransactionUserAll($userid, false);
if ($debug){

var_dump($totalArray);
}

if ($totalArray[0]['count'] > 0){

    if ($debug){


    echo 'Detected ' .    $totalArray[0]['count']. ' unfulfilled coin transactions';
    echo 'These should be deleted first';

    }

    foreach ($totalArray as $key=>$value){

        if ($key > 0){


            if (is_array($value)){

                //use id
                //then delete the required useractivity
                if ($debug){


                echo 'we detected a recent transaction with id ' . $value['transaction_id'];

                }
                //TODO
                //could check here if wqs previously reversed

                $userActivity->Load_from_key($value['id']);
                $userActivity->setsession_id('CANCELLED_COIN_FROM_TEMP ' . $value['transaction_id']);
                $userActivity->prepareStatementPDOUpdate();
                if ($debug){

                echo ' this record in useractivity was renamed';
                echo 'the coin transaction was reversed and credits applied to the user account';
                }

                //get the transaction
                $coin_spend->Load_from_key($value['transaction_id']);
                
                
                //get the amount
                $transaction_amount = $coin_spend->getamount();

                //make a new transaction crediting this amount
                $coin_grant->New_coin_grant($sqltimestamp, $transaction_amount, $userid);
                $new_grant_id = $coin_grant->prepareStatementPDO();
                $userActivity->New_userActivity($userid, 'REFUND_COIN ' . $new_grant_id , '', $sqltimestamp);
                $userActivity->prepareStatementPDO();

                $returnArray['outcome'] = true;



            }else{
                if ($debug){


                echo 'no array  passed';
                }
                $returnArray['outcome'] = false;

            }
        }


    }


}else{
    if ($debug){


    echo '<br/><br/>No outstanding coin transactions detected';


    }

    $returnArray['outcome'] = false;
}
if ($debug){

echo '<br/><br/>';
echo 'Debug >>>>>';
}




echo json_encode($returnArray);




die();







 