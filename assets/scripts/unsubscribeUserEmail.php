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
$emailList = new emailList;
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

    

    

    if ($userFunctions->getUserFromEmail($data['key'])){

        $userid = $userFunctions->getUserFromEmail($data['key']);
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
        
    
        
    }else if ($userFunctions->isUserInEmailDatabase($data['key']) != FALSE) { //check against email database

        //get the emailList record

        $emailListid = $userFunctions->isUserInEmailDatabase($data['key']);

        
        
        $emailList->Load_from_key($emailListid);
        $emailList->setoptOut('1');
        if ($emailList->prepareStatementPDOUpdate() > 0){

            echo 'Your preferences for email contact were updated';
            die();


        }else{

            echo 'We had a problem updating your email preferences.  Please contact us at admin@gieqs.com and request your removal from our database.  We will action this request immediately';
            die();


        }
        

        //upodate the optOut



    }else{
        
        
            echo 'Your email preferences were updated.';
            die();
            


    }


    //log the user in


    
}else{

    if ($debug){
		echo 'Invalid link.  Please try again.';
		}
}

