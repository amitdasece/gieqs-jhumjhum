<?php
error_reporting(E_ALL);
//;
$openaccess = 1;
//echo 'hello';
//$requiredUserLevel = 4;
require ('../../assets/includes/config.inc.php');		
//echo 'hello2';
require (BASE_URI.'/assets/scripts/headerScript.php');

//require (BASE_URI.'/assets/scripts/login_functions.php');

//echo 'hello3';sss
$general = new general;
$users = new users;
$userFunctions = new userFunctions;
//echo 'hello4';




function ne($v) {
    return $v != '';
}



$debug = false;
$explicit = false;
//echo 'hello';

if (count($_GET) > 0){

	if ($debug){

        print_r($_GET);
    }

	
	$data = $general->sanitiseGET($_GET);
	
	foreach ($data as $key=>$value){
		
		$GLOBALS[$key] = $value;
		
    }

    if ($debug){

        print_r($data);
        
        }


    //look up the user

    

    

    if ($userFunctions->getUserFromKey($data['key'])){

        $userid = $userFunctions->getUserFromKey($data['key']);
        //echo $userid;

    //switch the userLevel to 6

        $users->Load_from_key($userid);
    

        //remove the promotional mails

        $users->setemailServices('0');

        //RESET THE KEY

        $key = $userFunctions->generateRandomString('10');
        $users->setkey($key);

        if ($users->prepareStatementPDOUpdate() > 0){

            echo 'Your preferences for email contact were updated';
            die();

        }else{

            echo 'We had a problem updating your email preferences.  Please go to your account in GIEQs online 
            and update your preferences from there.';
            die();
        }
        
    
        
    }else{
        
        
            echo 'We had a problem updating your email preferences.  Please go to your account in GIEQs online 
            and update your preferences from there.';
            die();
            


    }


    //log the user in


    
}else{

    if ($debug){
		echo 'Invalid link.  Please try again.';
		}
}

