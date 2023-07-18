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



$debug = $gigs_debug;
$explicit = true;
//echo 'hello';

$data = json_decode(file_get_contents('php://input'), true);

if ($debug){

print_r($data);

}

//check count of get variables

if (count($data) > 0){

    if ($debug){

        print_r($data);
        
        }


    //look up the user

    $userid = $userFunctions->getUserFromKey($data['identifierKey']);

    //echo $userid;

    //switch the userLevel to 6

    if ($users->matchRecord($userid)){

    $users->Load_from_key($userid);
    //$users->setaccess_level(6);
    
        //get a new key

        $key = $userFunctions->generateRandomString('10');
        $users->setkey($key);
        $newPassword = $general->hash_password($data['password'], 'westmead');
        $users->setpassword($newPassword);

        //commit changes to DB

        if ($users->prepareStatementPDOUpdate() > 0){

            echo 'Your password was successfully reset.  You can now login from the main page';



        }else{

            //failed to update user account
            //show error
            echo 'Your password was not reset, please try again';

        }


    //log the user in
    }else{

        echo 'Your user record was not found.  Did you already change your password?';

        if ($debug){

            echo 'No such user found';
        }
    }

    
}else{

    if ($debug){
		echo 'data array empty';
		}
}

