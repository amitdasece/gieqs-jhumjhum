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

require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/sessionView.class.php');
$sessionView = new sessionView;

require_once BASE_URI . '/assets/scripts/classes/programme.class.php';
$programme = new programme;

require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;


require_once BASE_URI . '/pages/learning/includes/give_asset_functions.inc.php';




function ne($v) {
    return $v != '';
}



$debug = false;
$explicit = false;
//echo 'hello';



$data = json_decode(file_get_contents('php://input'), true);

if ($debug){

print_r($data);

}

//check count of get variables

if (count($data) > 0){

    //check the user does not exist

    $desiredUserName = $data['passedUserid'];

    if ($debug){

        print_r($desiredUserName);
        
        }
    
    
	
    

        

        if ($users->matchRecord($desiredUserName) === TRUE){

            $key = $userFunctions->generateRandomString('10');

            //if user exists in the user database

            $users->Load_from_key($desiredUserName);

            $defined_userid = $desiredUserName;

            
            $sitewidesubscriptonid = $assetManager->getSiteWideSubscription($desiredUserName, false);

            echo 'User has an active sitewide subscription, id #' . $sitewidesubscriptonid;
            echo '<br/><br/>';


            if ($sitewidesubscriptonid != false){

                    $asset_id = $assetManager->getAssetid($sitewidesubscriptonid);


                    if ($assetManager->isSitewidePRO($asset_id)){

                        //if the user has a sitewide subscription and it is pro

                        echo 'User has an active PRO sitewide subscription, id #' . $sitewidesubscriptonid;
                        echo '<br/><br/>';



                        //$log = [];
                    
                        //DEFINE USER ID 
                        $defined_userid = $desiredUserName;
                        //define assets future
                        $assets = getPastAdvertisedAssets($assetManager, $sessionView, $programme);

                        print_r($assets);

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
                    
                                $log[] = 'User no ' . $defined_userid . ' does not currently own asset ' . $assetvalue . PHP_EOL;
                                //echo 'User no ' . $defined_userid . ' does not currently own asset ' . $assetvalue . PHP_EOL;
                    
                    
                            $subscription->New_subscriptions($defined_userid, $assetvalue, $current_date_sqltimestamp, $end_date_sqltimestamp, '1', '0', 'TOKEN_ID=PRO_SUBSCRIPTION GRANT_USER_PANEL USER_GRANT='.$userid);
                    
                            $newSubscriptionid = $subscription->prepareStatementPDO();
                    
                            //$newSubscriptionid = ' fake subscription id';
                    
                    
                            $log[] = 'User no ' . $defined_userid . ' granted access to assetid ' . $assetvalue . '. New subscription no = ' . $newSubscriptionid . PHP_EOL;
                    
                    
                            }else{
                                
                                $log[] = 'User no ' . $defined_userid . ' already owns asset ' . $assetvalue . PHP_EOL;
                    
                    
                            }
                    
                    
                    
                    
                        }

                        print_r($log);





                    }else{

                        echo 'User has sitewide subscription but it is not a PRO subscription.  To rectify most problems create a sitewide subscription in PRO category and then run this script again';
                        die();


                    }

            }else{

                //user has no sitewide

                echo 'User has no sitewide subscription.  To rectify most problems create a sitewide subscription in PRO category and then run this script again';
                die();


            }


            
            
            
            

        }else{

            echo 'Error:  User does not exist';

        }


        
    
}else{
	if ($debug){
		echo 'data array empty';
		}

    echo 'Data Integrity Error.  Please try again';
	
}