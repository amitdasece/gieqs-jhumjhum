<?php
error_reporting(E_ALL);
//;
$requiredUserLevel = 3;
//$openaccess = 1;
//echo 'hello';
//$requiredUserLevel = 4;
require ('../../assets/includes/config.inc.php');		
//echo 'hello2';
require (BASE_URI.'/assets/scripts/headerScript.php');

//echo 'hello3';sss
$general = new general;
$users = new users;
$userFunctions = new userFunctions;
//echo 'hello4';


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




function ne($v) {
    return $v != '';
}



$debug = false;
$explicit = false;
//echo 'hello';



$data = json_decode(file_get_contents('php://input'), true);

if ($debug){

print_r($data);
error_reporting(E_ALL);

}

//check count of get variables

if (count($data) > 0){

    //check the user does not exist

    $desiredUserName = $data['passedUserid'];

    if ($debug){

        print_r($desiredUserName);
        
        }
    
    
	
    

        

        if ($users->matchRecord($desiredUserName) === TRUE){

            
            $users->Load_from_key($desiredUserName);

            //set a new key

            $coin_grant_amount = 10; //the amount credited every 6 months


            $date = new DateTime('now', new DateTimeZone('UTC'));
                $sqltimestamp = date_format($date, 'Y-m-d H:i:s');

                $userActivity->New_userActivity($users->getuser_id(), 'COIN_GRANT_GIFT_USER_CONSOLE_GRANTING_USER_' . $userid . ' AMOUNT '. $coin_grant_amount, '', $sqltimestamp);
                $userActivity->prepareStatementPDO();

                $coin_grant->New_coin_grant($sqltimestamp, $coin_grant_amount, $users->getuser_id());
                $new_grant_id = $coin_grant->prepareStatementPDO();

                if (is_numeric($new_grant_id) && intval($new_grant_id) > 0){

                    echo 'Coins Granted Successfully';
                    echo PHP_EOL;
                    echo 'User now has ' . $coin->current_balance($users->getuser_id()) . ' coins (+10)';

                }else{

                    echo 'There was a problem.  Please try again';
                }

                if ($debug) {

                    echo 'coins granted';
                    echo '<br/>';
    
                }

            

        }


        
    
}else{
	if ($debug){
		echo 'data array empty';
		}
	
}