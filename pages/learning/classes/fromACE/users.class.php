<?php
/*
 * Author: David Tate 
 * 
 * Create Date: 8-02-2018
 * 
 * Version of MYSQL_to_PHP: 1.1
 * 
 * License: LGPL 
 * 
 
 
 things to add
 
 ability to tell administrator
 
 ability to log all requests and updates
 
 this will require another linking table since many to many relationship
 
 
 
 
 */
require_once 'DataBaseMysql.class.php';

Class users {

	private $user_id; //int(10)
	private $firstname; //varchar(30)
	private $surname; //varchar(30)
	private $email; //varchar(70)
	private $password; //varchar(200)
	private $centre; //tinyint(2)
	private $registered_date; //date
	private $last_login; //timestamp(6)
	private $previous_login; //timestamp(6)
	private $timezone; //varchar(50)
	private $access_level; //int(3)
	private $contactPhone; //varchar(40)
	private $connection;

	public function users(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don¥t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_users($firstname,$surname,$email,$password,$centre,$registered_date,$last_login,$previous_login,$timezone,$access_level,$contactPhone){
		$this->firstname = $firstname;
		$this->surname = $surname;
		$this->email = $email;
		$this->password = $password;
		$this->centre = $centre;
		$this->registered_date = $registered_date;
		$this->last_login = $last_login;
		$this->previous_login = $previous_login;
		$this->timezone = $timezone;
		$this->access_level = $access_level;
		$this->contactPhone = $contactPhone;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from users where user_id = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->user_id = $row["user_id"];
			$this->firstname = $row["firstname"];
			$this->surname = $row["surname"];
			$this->email = $row["email"];
			$this->password = $row["password"];
			$this->centre = $row["centre"];
			$this->registered_date = $row["registered_date"];
			$this->last_login = $row["last_login"];
			$this->previous_login = $row["previous_login"];
			$this->timezone = $row["timezone"];
			$this->access_level = $row["access_level"];
			$this->contactPhone = $row["contactPhone"];
		}
		
		if ($result->num_rows === 1){
			
			return TRUE;
		}else {
			
			return FALSE;
			
		}
		
		
		
	}
	


    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$this->connection->RunQuery("DELETE FROM users WHERE user_id = $key_row");
	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_Row(){
		$this->connection->RunQuery("UPDATE users set firstname = \"$this->firstname\", surname = \"$this->surname\", email = \"$this->email\", password = \"$this->password\", centre = \"$this->centre\", registered_date = \"$this->registered_date\", last_login = \"$this->last_login\", previous_login = \"$this->previous_login\", timezone = \"$this->timezone\", access_level = \"$this->access_level\", contactPhone = \"$this->contactPhone\" where user_id = \"$this->user_id\"");
	}

    /**
     * Save the active var class as a new row on table
     */
	public function Save_Active_Row_as_New(){
		$this->connection->RunQuery("Insert into users (firstname, surname, email, password, centre, registered_date, last_login, previous_login, timezone, access_level, contactPhone) values (\"$this->firstname\", \"$this->surname\", \"$this->email\", \"$this->password\", \"$this->centre\", \"$this->registered_date\", \"$this->last_login\", \"$this->previous_login\", \"$this->timezone\", \"$this->access_level\", \"$this->contactPhone\")");
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT user_id from users order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["user_id"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return user_id - int(10)
	 */
	public function getuser_id(){
		return $this->user_id;
	}

	/**
	 * @return firstname - varchar(30)
	 */
	public function getfirstname(){
		return $this->firstname;
	}

	/**
	 * @return surname - varchar(30)
	 */
	public function getsurname(){
		return $this->surname;
	}

	/**
	 * @return email - varchar(70)
	 */
	public function getemail(){
		return $this->email;
	}

	/**
	 * @return password - varchar(200)
	 */
	public function getpassword(){
		return $this->password;
	}

	/**
	 * @return centre - tinyint(2)
	 */
	public function getcentre(){
		return $this->centre;
	}

	/**
	 * @return registered_date - date
	 */
	public function getregistered_date(){
		return $this->registered_date;
	}

	/**
	 * @return last_login - timestamp(6)
	 */
	public function getlast_login(){
		return $this->last_login;
	}

	/**
	 * @return previous_login - timestamp(6)
	 */
	public function getprevious_login(){
		return $this->previous_login;
	}

	/**
	 * @return timezone - varchar(50)
	 */
	public function gettimezone(){
		return $this->timezone;
	}

	/**
	 * @return access_level - int(3)
	 */
	public function getaccess_level(){
		return $this->access_level;
	}

	/**
	 * @return contactPhone - varchar(40)
	 */
	public function getcontactPhone(){
		return $this->contactPhone;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setuser_id($user_id){
		$this->user_id = $user_id;
	}

	/**
	 * @param Type: varchar(30)
	 */
	public function setfirstname($firstname){
		$this->firstname = $firstname;
	}

	/**
	 * @param Type: varchar(30)
	 */
	public function setsurname($surname){
		$this->surname = $surname;
	}

	/**
	 * @param Type: varchar(70)
	 */
	public function setemail($email){
		$this->email = $email;
	}

	/**
	 * @param Type: varchar(200)
	 */
	public function setpassword($password){
		$this->password = $password;
	}

	/**
	 * @param Type: tinyint(2)
	 */
	public function setcentre($centre){
		$this->centre = $centre;
	}

	/**
	 * @param Type: date
	 */
	public function setregistered_date($registered_date){
		$this->registered_date = $registered_date;
	}

	/**
	 * @param Type: timestamp(6)
	 */
	public function setlast_login($last_login){
		$this->last_login = $last_login;
	}

	/**
	 * @param Type: timestamp(6)
	 */
	public function setprevious_login($previous_login){
		$this->previous_login = $previous_login;
	}

	/**
	 * @param Type: varchar(50)
	 */
	public function settimezone($timezone){
		$this->timezone = $timezone;
	}

	/**
	 * @param Type: int(3)
	 */
	public function setaccess_level($access_level){
		$this->access_level = $access_level;
	}

	/**
	 * @param Type: varchar(40)
	 */
	public function setcontactPhone($contactPhone){
		$this->contactPhone = $contactPhone;
	}
	
	//!get user centre
	
	public function getUserCentre ($userid){
		
		//echo $userid;
		
		if ($this->Load_from_key($userid) === TRUE){
		
			
			$userCentre = $this->centre;
			
			//use UserCentre in a database query to return centre number or text
			
			$q = "SELECT centre_name FROM Centres WHERE _k_centre = $userCentre";
			
			$result = $this->connection->RunQuery($q);
			
			while($row = $result->fetch_array(MYSQLI_ASSOC)){

				
				$foundCentreName = $row['centre_name'];
				
			}
			
			echo $foundCentreName;
			//print_r($result);
			
			
			
			
		}else{
			
			echo 'Invalid User';
			$_SESSION = array();

			// If it's desired to kill the session, also delete the session cookie.
			// Note: This will destroy the session, and not just the session data!
			if (ini_get("session.use_cookies")) {
			    $params = session_get_cookie_params();
			    setcookie(session_name(), '', time() - 42000,
			        $params["path"], $params["domain"],
			        $params["secure"], $params["httponly"]
			    );
			}
			
			// Finally, destroy the session.
			session_destroy();
						exit();
		}
				
					
		
	}
	
	public function getUserCentreID ($userid){
		
		//echo $userid;
		
		if ($this->Load_from_key($userid) === TRUE){
		
			
			$userCentre = $this->centre;
			
			//use UserCentre in a database query to return centre number or text
			
			$q = "SELECT centre_name, centreCode FROM Centres WHERE _k_centre = $userCentre";
			
			$result = $this->connection->RunQuery($q);
			
			while($row = $result->fetch_array(MYSQLI_ASSOC)){

				
				$foundCentreName = $row['centreCode'];
				
			}
			
			return $foundCentreName;
			//print_r($result);
			
			
			
			
		}else{
			
			echo 'Invalid User';
			$_SESSION = array();

			// If it's desired to kill the session, also delete the session cookie.
			// Note: This will destroy the session, and not just the session data!
			if (ini_get("session.use_cookies")) {
			    $params = session_get_cookie_params();
			    setcookie(session_name(), '', time() - 42000,
			        $params["path"], $params["domain"],
			        $params["secure"], $params["httponly"]
			    );
			}
			
			// Finally, destroy the session.
			session_destroy();
						exit();
		}
				
					
		
	}

	
	
	
	
	
	//!get user admin level
	
	
	
	
	public function isAdmin ($userid){
		
		$this->Load_from_key($userid);
		
		if ($this->getaccess_level() == '2' || $this->getaccess_level() == '1'){
			
			return TRUE;
			
			
		} else {
			
			return FALSE;
			
		}
		
		
		
	}
	
	public function isSuperuser ($userid){
		
		$this->Load_from_key($userid);
		
		if ($this->getaccess_level() == '1'){
			
			return TRUE;
			
			
		} else {
			
			return FALSE;
			
		}
		
		
		
	}
	
	
	public function hash_password($password, $salt) {
	    $salted_password = substr($password, 0, 4) . $salt . substr($password, 4);
	    return hash('sha512', $salted_password);
	}	
	
	
	//!Random String Generator for PHP
	//Usage $a = random_str(32);
	//$b = random_str(8, 'abcdefghijklmnopqrstuvwxyz');
	
	public function generateRandomString($length) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	
	
	public function setNewPassword ($userid, $desiredPassword){
		
		$this->Load_from_key($userid);
		
		//if password same as current give error
		
		if (($this->getpassword()) == $this->hash_password($desiredPassword, 'westmead')){
			
			return 3; // 2 means password same
			
			
		}else{
			
			$newPassword = $this->hash_password($desiredPassword, 'westmead');
			
			$q = 'UPDATE `users` SET `password` = "' . $newPassword . '" WHERE `user_id` = "' . $userid . '"';
			
			//echo $q;
			
			return $this->returnYesNoDBQuery($q);
			
			
		} 
		
		
		
		
		
	}
	
	public function returnYesNoDBQuery ($q){
		
		
		//print_r($q);
		
		
		$result = $this->connection->RunQuery($q);

		//print_r($result);
		
			//IF THERE is a database error return 2
			
			//IF THERE are no rows affected but no errors return 0
			
			//IF THERE is one row affected return 1
			
			if ($result){
			
			
				//print_r($this->connection->conn->affected_rows);
		
				//print_r($this->connection->conn, there is plenty else in this object including error_list as an array and connect_error);
		
				if ($this->connection->conn->affected_rows == 1){
					
					return 1;
		
				} else {
		
					return 0;
		
				}
			
			} else {
				
				return 2;
				
			}

	}
	
	public function generateUserUpdate ($type, $identifier, $user_id, $databaseQuery){
		
		
		if ($type){
			
			if ($type == 1) { // Patient table update
				
				//$result = $this->connection->RunQuery('SET @@session.time_zone=\'+00:00\';');
				$q = 'INSERT INTO `userUpdates` (`user_id`, `_k_patient`, `change`) VALUES (' . $user_id . ',' . $identifier . ', "' . $databaseQuery . '")';
				
				//echo $q;
				
				$result = $this->connection->RunQuery($q);
				
				//echo $this->connection->conn->affected_rows . " rows updated";
				
				
			}
			else if ($type == 2) { // Procedure table update
				
				
				$q = 'INSERT INTO `userUpdates` (`user_id`, `_k_procedure`, `change`) VALUES (' . $user_id . ',' . $identifier . ', "' . $databaseQuery . '")';
				
				//echo $q;
				
				$result = $this->connection->RunQuery($q);
				
				
			}
			else if ($type == 3) { // Lesion table update
				
				$q = 'INSERT INTO `userUpdates` (`user_id`, `_k_lesion`, `change`) VALUES (' . $user_id . ',' . $identifier . ', "' . $databaseQuery . '")';
				
				//echo $q;
				
				$result = $this->connection->RunQuery($q);
				
				
				
			}
			else if ($type == 4) { // Image table update
				
				$q = 'INSERT INTO `userUpdates` (`user_id`, `_k_image`, `change`) VALUES (' . $user_id . ',' . $identifier . ', "' . $databaseQuery . '")';
				
				//echo $q;
				
				$result = $this->connection->RunQuery($q);
				
				
				
			}
			else if ($type == 5) { // other table query or update
				
				$q = 'INSERT INTO `userUpdates` (`user_id`, `other`, `change`) VALUES (' . $user_id . ',' . $identifier . ', "' . $databaseQuery . '")';
				
				//echo $q;
				
				$result = $this->connection->RunQuery($q);
				
				
				
			}
			
			
			
		}
		
		
		
		
		
		
	} 
	
	//!User Random Key generator
	
	public function generateRandomKey($user_id){
		
		$key = $this->generateRandomString(15);
		
		$q = 'UPDATE `users` SET `key` =\'' . $key . '\' WHERE `user_id` = ' . $user_id;
		
		//echo $key;
		
		//echo $q;
		
		$result = $this->connection->RunQuery($q);
		
		if ($this->connection->conn->affected_rows == 1){
					
					return 1;
		
				} else {
		
					return 0;
		
				}
		
		
	}
	
	//!function to refresh ALL user keys
	
	public function generateRandomKeyAllUsers(){
		
		
		$q1 = "SELECT `user_id` FROM `users`";
		
		$result1 = $this->connection->RunQuery($q1);
		
		while ($row = $result1->fetch_array(MYSQLI_ASSOC)){
			
				$key = $this->generateRandomString(15);
				
				$rowid = $row['user_id'];
		
		$q = 'UPDATE `users` SET `key` =\'' . $key . '\' WHERE `user_id` = ' . $rowid;
		
		//echo $key;
		
		//echo $q;
		
		$result = $this->connection->RunQuery($q);
		
		/*if ($this->connection->conn->affected_rows == 1){
					
					return 1;
		
				} else {
		
					return 0;
		
				}*/
			
			
		}
		
		
	
		
		
	}
	
	
	public function getFromRandomKey($key){
		
		$q = "SELECT `user_id` FROM users WHERE `key` = '$key'";
		
		//echo $q;
		
		if ($this->returnYesNoDBQuery($q) == 1){
			
			return 1;
			
			
			}else{
				
				
				return 0;
			}
		
		
		
	}
	
	public function getIDFromRandomKey($key){
		
		$q = "SELECT `user_id` FROM users WHERE `key` = '$key'";
		
		//echo $q;
		
		$result = $this->connection->RunQuery($q);
		
		if ($this->returnYesNoDBQuery($q) == 1){
		
			while ($row = $result->fetch_array(MYSQLI_ASSOC)){
				
				$user_id = $row['user_id']; 
				
			}
			
			return $user_id;
			
		}else{
			
			return null;
			
		}
		
		
	}
	
	public function generateResetEmail ($user_id){
		
		$q = "SELECT `firstname`, `surname`, `email`, `key` FROM users WHERE `user_id` = '$user_id'";
		
		//echo $q;

		$result = $this->connection->RunQuery($q);
		
		if ($this->returnYesNoDBQuery($q) == 1){
			
			
			while ($row = $result->fetch_array(MYSQLI_ASSOC)){
				
				$firstname = $row['firstname'];
				$surname = $row['surname'];
				$email = $row['email'];
				$key = $row['key'];
				
				
				$email = "Dear $firstname $surname <br><br> Here is the link to reset your password for iACE<br><br><a href='https://www.acestudy.net/studyserver/PROSPER/scripts/emailResetForm.php?id=$key' >reset link </a> <br><br> iACE administraor";
				
			}
			
		return $email;
			
		}else{
			
			return null;
		}
		
		
		
		
	}
	
	public function validatePassword ($pwd){
		

		if( strlen($pwd) < 8 ) {
		$error .= "Password too short! 
		";
		}
		
		if( strlen($pwd) > 20 ) {
		$error .= "Password too long! 
		";
		}
		
		if( strlen($pwd) < 8 ) {
		$error .= "Password too short! 
		";
		}
		
		if( !preg_match("#[0-9]+#", $pwd) ) {
		$error .= "Password must include at least one number! 
		";
		}
		
		if( !preg_match("#[a-z]+#", $pwd) ) {
		$error .= "Password must include at least one letter! 
		";
		}
		
		if( !preg_match("#[A-Z]+#", $pwd) ) {
		$error .= "Password must include at least one CAPS! 
		";
		}
		
		if($error){
		return "Password validation failure: $error";
		} else {
		return 1;;
		}
		
		
		
		
		
	}
	
	
	
	
	
	
	//!set user session including password
	

    /**
     * Close mysql connection
     */
	public function endusers(){
		$this->connection->CloseMysql();
	}

}