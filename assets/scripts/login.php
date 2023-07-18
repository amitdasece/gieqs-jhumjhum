<?php
	 header('Access-Control-Allow-Origin: *');
	 $openaccess = 1;
	 
	 require ('../../assets/includes/config.inc.php');	
	 require_once BASE_URI . '/assets/scripts/classes/userActivity.class.php';
	 require_once BASE_URI . '/assets/scripts/classes/userFunctions.class.php';
	 
	 $userActivity = new userActivity;
	 $userFunctions = new userFunctions;
	 





// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Need two helper files:

	require (BASE_URI.'/assets/scripts/login_functions.php');
	
	require (DB);

	// Check the login:
	//print_r($_POST);
	list ($check, $data) = check_login($dbc,
		$_POST['username'], $_POST['password']);

	if ($check) { // OK!

		//check no duplicate login

		if ($userFunctions->recentUserLogin($data['user_id'])){

			if ($data['access_level'] == 7){

				echo '3';
				exit();
			}

			// Set the session data:
			$_SESSION['user_id'] = $data['user_id'];
			$_SESSION['firstname'] = $data['firstname'];
			$_SESSION['surname'] = $data['surname'];
			$_SESSION['access_level'] = $data['access_level'];
			$_SESSION['siteKey'] = 'TxsvAb6KDYpmdNk';

			
			
			//getcurrent UTC time
			$date = new DateTime('now', new DateTimeZone('UTC'));
			$sqltimestamp = date_format($date, 'Y-m-d H:i:s');
			
			//add a login event to the database

			$userActivity->New_userActivity($data['user_id'], null, $sqltimestamp, null);
			$userActivity->prepareStatementPDO();

			// Redirect:
			echo '1';
			exit();

		}else{ // recent activity

			echo '4';
			exit();


		}
		
	} else { // Unsuccessful!
		
		echo '0';
        // Assign $data to $errors for
        
        if ($debug){
		$errors = $data;
		foreach ($errors as $msg) {
			echo " - $msg<br />\n";
		
        }
        }

		
		

	} // End of the main submit conditional.
}

mysqli_close($dbc); // Close the database connection.
// Create the page:
?>
