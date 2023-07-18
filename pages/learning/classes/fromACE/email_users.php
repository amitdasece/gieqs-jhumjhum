<?php

session_start( );

error_reporting(-1);

$folder = 'https://' . $_SERVER['HTTP_HOST'] . '/studyserver/PROSPER/';


require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/login_functions.php');

function class_loader($class) {
		
			require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/classes/'.$class.'.class.php');
		 	
		}
	
	
	spl_autoload_register ('class_loader');
	
	
	


//use the referring id as the user id to change the password for
//alternatively use a randomly generated string


$lesion = new Lesion;
$table = new tableGenerator;
$formv1 = new formGenerator;
$user = new users;
$user->Load_from_key($_SESSION['user_id']);

if ($user->getaccess_level() != 1){

	if (empty($_GET['id'])){
			
			
			if (empty($_POST['useridPrescribed'])){
			
				$entryKey = null;
				echo 'Check your email link or request another reset link';
				exit();
			
			}
			
		}else {
			
			$entryKey = $lesion->sanitiseInput($_GET['id']);
			
			
			//echo $entryKey;
			
			if ($user->getFromRandomKey($entryKey) == 1){
				
				
				$user->Load_from_key($user->getIDFromRandomKey($entryKey));
				
				echo 'Welcome ' . $user->getfirstname() . ' ' . $user->getsurname();
				
			}else{
				
				
				echo 'This user does not exist, please check your email link';
				exit();
			} 
			//get user from random key
			//if the user exists enter, otherwise exit
			
		}
	
}

//echo $user->generateRandomKey(10);


//emailPassword($dbc, '1');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {




	$lesion = new Lesion;
	$table = new tableGenerator;
	$formv1 = new formGenerator;
	$user = new users;
	
	
	
	
	$newPassword = "";
	$userid = "";
	$useridPrescribed = "";
	
	//echo 'New Password POST os ' . $_POST['newPassword'];

	if (empty($_POST['newPassword'])){
		
		$newPassword = null;
		
	}else {
		
		$newPassword = $lesion->sanitiseInput($_POST['newPassword']);
		
		
	}
	
	if (empty($_POST['newPasswordCheck'])){
		
		$newPassword = null;
		
	}else {
		
		$newPasswordCheck = $lesion->sanitiseInput($_POST['newPasswordCheck']);
		
		
	}
	
	
	if ($newPassword != $newPasswordCheck) {
		
		echo 'The passwords do not match, please reload the page and try again';
		exit();
		
		
	}
	
	if ($user->getaccess_level() == 1){

			
		$userid = $lesion->sanitiseInput($_POST['userid']);
			
			
		
	}else{
		
		$userid = $lesion->sanitiseInput($_POST['useridPrescribed']);
		
	}
		
	//echo $newPassword . ' = newPassword';
	
	//echo $userid . ' = userid';
	if ($user->getaccess_level() == 1){


		if ($newPassword && $userid){
	
			if ($user->setNewPassword ($userid, $newPassword) == 1){
				
				echo 'Password Updated';
				
			}else if ($user->setNewPassword ($userid, $newPassword) == 2){
				
				echo 'An error occurred, please try again';
				
			}else if ($user->setNewPassword ($userid, $newPassword) == 3){
				
				echo 'New password cannot match your old password';
				
			}else if ($user->setNewPassword ($userid, $newPassword) == '0'){
				
				echo 'No updates made; perhaps user does not exist';
				
			}
	
		} else {
			
			echo 'Please refresh the page and correct input';
			exit();
			
		}
	
	}else {
		
		if ($newPassword && $userid){
			
			$result = $user->setNewPassword ($userid, $newPassword);
	
			if ($result == 1){
				
				echo 'Password Updated';
				
			}else if ($result == 2){
				
				echo 'An error occurred, please try again';
				
			}else if ($result == 3){
				
				echo 'New password cannot match your old password';
				
			}else if ($result == '0'){
				
				echo 'No updates made; perhaps user does not exist';
				
			}
	
		} else {
			
			echo 'Please refresh the page and correct input';
			exit();
			
		}
		
		
		
		
		
	}

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<html>
<head>
    <title></title>
</head>

<body>
    <form action="email_users.php" method="post">
        <fieldset>

			<p><b>iACE user password reset page</b></p>

            <p>Enter your new password: <input type="text" name="newPassword" size="30" maxlength="80"></p>
            
             <p>Enter your new password again: <input type="text" name="newPasswordCheck" size="30" maxlength="80"></p>

			 <?php echo '<input type="text" name="useridPrescribed" style="display:none;" size="30" maxlength="80" value="' . $user->getIDFromRandomKey($entryKey) . '"></p>';?>

           <?php if ($user->getaccess_level() == 1){

	echo '<p>Enter the user id (admin): <input type="text" name="userid" size="30" maxlength="80"></p>';


}?>




            <p><input type="submit" name="submit" value="Submit"></p>

            <p></p>
        </fieldset>
    </form>
</body>
</html>
