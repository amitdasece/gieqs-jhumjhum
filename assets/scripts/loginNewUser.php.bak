<?php
error_reporting(E_ALL);

$openaccess = 1;

require ('../../assets/includes/config.inc.php');		

require (BASE_URI.'/assets/scripts/headerScript.php');


$general = new general;
$users = new users;
$userFunctions = new userFunctions;

function ne($v) {
    return $v != '';
}

$debug = true;
$explicit = true;

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
    

    if ($userFunctions->getUserFromKey($data['key'])){

        $userid = $userFunctions->getUserFromKey($data['key']);
        echo $userid;


        $users->Load_from_key($userid);
        $users->setaccess_level(6);
    

        if ($users->prepareStatementPDOUpdate() > 0){


            $_SESSION['user_id'] = $users->getuser_id();
            $_SESSION['firstname'] = $users->getfirstname();
            $_SESSION['surname'] = $users->getsurname();
            $_SESSION['access_level'] = $users->getaccess_level();
            $_SESSION['siteKey'] = 'TxsvAb6KDYpmdNk';

        
            if ($access_token){

                redirect_login(BASE_URL . '/pages/authentication/welcomeNewUser.php?signup_redirect=' . $signup_redirect . '&access_token=' . $access_token);


            }else{

            
            redirect_login(BASE_URL . '/pages/authentication/welcomeNewUser.php?signup_redirect=' . $signup_redirect);

            }


        }else{


            echo 'User updating failed.  Ensure you are using Chrome, Safari or Firefox.  If you keep receiving this error please go to <a href="' . BASE_URL . '/login">login</a> and click forgot password.'

        }


    }else{
        
        if ($explicit){
            echo 'Invalid Key.  You probably clicked the linked twice.  Please go to <a href="' . BASE_URL . '/login">login</a> and click forgot password.  Enter your email address for a password reset link.  You can always contact us if you are still having trouble.';
            }


    }

    
}else{

    if ($debug){
		echo 'data array empty';
		}
}

