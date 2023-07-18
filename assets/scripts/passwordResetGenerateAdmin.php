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




function ne($v) {
    return $v != '';
}



$debug = $gigs_debug;
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

            //set a new key

            $users->setkey($key);

            if ($users->prepareStatementPDOUpdate() > 0){

            //send an email to the user

            $emailWorked = null;
            $reason = null;

            

            //generate an initial login link
            $emailVaryarray['firstname'] = $users->getfirstname();
            $emailVaryarray['surname'] = $users->getsurname();
            $emailVaryarray['email'] = $users->getemail();
            // $email = array(0 => $users->getemail()); //original version
            $email = $users->getemail();
            $emailVaryarray['key'] = $users->getkey();

            $filename = '/assets/email/emailPasswordResetWelcome.php';

            $subject = 'Login for your GIEQs online account.  Access the livestream here';

            require(BASE_URI . '/assets/scripts/individualMailerGmailAPI.php');  //TEST MAIL

            echo 'An email was sent to the registered email address of the user.';

            if ($debug){

                if ($emailWorked){

                    echo 'Email sent';
                }else{

                    echo 'Email failed ' . $reason;
                }

            }

            }

        }


        
    
}else{
	if ($debug){
		echo 'data array empty';
		}
	
}