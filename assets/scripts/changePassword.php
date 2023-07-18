<?php
error_reporting(E_ALL);
//;
$openaccess = 1;
//echo 'hello';
//$requiredUserLevel = 4;
require ('../../assets/includes/config.inc.php');		
//echo 'hello2';
require (BASE_URI.'/assets/scripts/headerScript.php');

//echo 'hello3';sss
$general = new general;
$users = new users;
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

	//$data = $general->sanitiseGET($data);

	/*foreach ($data as $key=>$value){

		$GLOBALS[$key] = $value;

	}*/

	//check the user matching the passed user_id is making the request [happens in interpretuseraccess]

	$useridpassed = $data['identifierKey'];



	if (($useridpassed == $userid) || ($isSuperuser == 1)){

		if ($debug){

			echo 'User id matches user id set in the session. Or user is a superuser';

		}

		$users->Load_from_key($useridpassed);

		$oldPassword = $general->hash_password($data['oldPassword'], 'westmead');

		if ($debug){

			echo "Old password is $oldPassword";

		}

		if ($oldPassword == $users->getpassword()){
				//check the old password against the db user_id

				if ($debug){

					echo 'Entered password matches the password for the current user';
		
				}

				$newPassword = $general->hash_password($data['newPassword'], 'westmead');

				if ($newPassword != $users->getpassword()){


						//check the old password and the new are not the same
						if ($debug){

							echo 'Database old password is NOT the same as the entered new password';
				
						}


						if (strlen($data['newPassword']) > 5){

							//write the new password to the db

						$users->setpassword($newPassword);

						if ($users->prepareStatementPDOUpdate() == 1){

							echo 'Password Changed Successfully'; 

						}else{

							echo 'Password was not Updated.  Try again';
						}

						}else{
							
							if ($explicit){

								echo 'New password must be > 6 characters long';
					
							}
							
						}




					



				}else{

					if ($explicit){

						echo 'The password cannot be the same as your old password';
			
					}

				}


		}else{

			if ($explicit){

				echo 'Entered old password does not match the password for the current user';
	
			}

		}

	}else{

		if ($debug){

			echo 'User id is not the same as user id set in the session. Or user is not a superuser';

		}
	}

	//check the old password against the db user_id




	//come back with reply

	
    
}else{
	if ($debug){
		echo 'data array empty';
		}
	
}