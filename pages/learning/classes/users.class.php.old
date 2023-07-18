<?php
/*
 * Author: David Tate
 * 
 * Create Date: 22-07-2018
 * 
 * Version of MYSQL_to_PHP: 1.1
 * 
 * License: Restricted 
 * 
 */
 
 //user access levels
 
 //1 superuser
 //2 creator [backend] and can access all
 //3 non creator but can access all
 //4 standard user, needs to purchase extra content
 
 
require_once 'DataBaseMysql.class.php';

Class users {

	private $user_id; //int(10)
	private $firstname; //varchar(30)
	private $surname; //varchar(30)
	private $email; //varchar(70)
	private $password; //varchar(200)
	private $centre; //int(10)
	private $registered_date; //date
	private $last_login; //timestamp(6)
	private $previous_login; //timestamp(6)
	private $timezone; //varchar(50)
	private $access_level; //int(3)
	private $contactPhone; //varchar(40)
	private $key; //varchar(200)
	private $connection;

	public function users(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don¥t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_users($firstname,$surname,$email,$password,$centre,$registered_date,$last_login,$previous_login,$timezone,$access_level,$contactPhone,$key){
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
		$this->key = $key;
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
			$this->key = $row["key"];
		}return $result; 
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$result = $this->connection->RunQuery("DELETE FROM users WHERE user_id = $key_row");
return $result; 	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_Row(){


		
				$ov = get_object_vars($this);
		
				if ($ov['connection'] != ''){
				unset($ov['connection']);
				}
				if ($ov['user_id'] != ''){
				unset($ov['user_id']);
				}
				
				
				//print_r($ov);
				$ovMod = array();
				foreach ($ov as $key=>$value){

					if ($value != ''){

						$ovMod[$key] = $value;
					}

				}

				foreach ($ovMod as $key => $value) {

					$value = "'$value'";
					$updates[] = "$key = $value";      

				}

				 $implodeArray = implode(', ', $updates);
				
		
			$q = "UPDATE users SET $implodeArray WHERE user_id = \"$this->user_id\"";
	$result = $this->connection->RunQuery($q); 
	return $result; 
	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_RowNulls(){
		$result = $this->connection->RunQuery("UPDATE users set firstname = \"$this->firstname\", surname = \"$this->surname\", email = \"$this->email\", password = \"$this->password\", centre = \"$this->centre\", registered_date = \"$this->registered_date\", last_login = \"$this->last_login\", previous_login = \"$this->previous_login\", timezone = \"$this->timezone\", access_level = \"$this->access_level\", contactPhone = \"$this->contactPhone\", key = \"$this->key\" where user_id = \"$this->user_id\"");
	return $result; 
	}

    /**
     * Save the active var class as a new row on table
     */
	public function Save_Active_Row_as_New(){
		
		
		$ov = get_object_vars($this);
		
				if ($ov['connection'] != ''){
				unset($ov['connection']);
				}
				if ($ov['user_id'] != ''){
				unset($ov['user_id']);
				}
		
		$ovMod = array();
				foreach ($ov as $key=>$value){

					if ($value != ''){

						$ovMod[$key] = $value;
					}

				}
		
		
	 foreach ($ovMod as $key => $value) {
        
        $updates[$key] = $value;      
    }
        
        //var_dump($updates);
        $implodeArray = implode('\', \'', $updates);
        //var_dump($implodeArray);
        $keys = array_keys($updates);
        $keys_string = implode(', ', $keys);
        $q = "INSERT INTO users ($keys_string) VALUES ('$implodeArray')";
		
		$result = $this->connection->RunQuery($q);
		$last_id = $this->connection->insertID();
		
		if ($result == 1){
			
			return $last_id;
		}else {
			
			return $result;
			
		}
		
	
	}

    /**
     * Save the active var class as a new row on table
     */
	public function Save_Active_Row_as_New_OLD(){
	$result = $this->connection->RunQuery("Insert into users (firstname, surname, email, password, centre, registered_date, last_login, previous_login, timezone, access_level, contactPhone, key) values (\"$this->firstname\", \"$this->surname\", \"$this->email\", \"$this->password\", \"$this->centre\", \"$this->registered_date\", \"$this->last_login\", \"$this->previous_login\", \"$this->timezone\", \"$this->access_level\", \"$this->contactPhone\", \"$this->key\")");
return $result; 	}

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
	 * @return centre - int(10)
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
	 * @return key - varchar(200)
	 */
	public function getkey(){
		return $this->key;
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
	 * @param Type: int(10)
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

	/**
	 * @param Type: varchar(200)
	 */
	public function setkey($key){
		$this->key = $key;
	}

    /**
     * Setter for multiple variables
     */
	public function setMultiple($entryArray){
		unset($entryArray['connection']);
		foreach ($entryArray as $key=>$value){
		//$this->$key = NULL;
		if ($value != ''){
		$this->$key = $value;
		}else {
		$this->$key = NULL;
	}
	}
	}

    /**
     * Setter for multiple variables from GET
     */
	public function setFromGet($getArray){
		
		//unset($entryArray['connection']);
		foreach ($getArray as $key=>$value){
			
			
			if ($value != ''){
			
			$this->$key = $value;
			//echo 'set this->'.$key.' to'. $value . '<br>';
			//need some way of not setting all to 0 here
				
			}
		}
		
	}

    /**
     * Create function to return all variables as javascript
     */
	public function JS_var(){
							$result = get_object_vars($this);
							return json_encode($result);
						}

    /**
		!Use this for all returns to Javascript requiring knowledge of whether row updated or not*/

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

    /**
     * Create function to return all variables 
     */
	public function all_var(){
							$result = get_object_vars($this);
							return ($result);
						}
						
						
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
	
	public function getUserAccessLevel ($userid) {
		
		$q = "SELECT `access_level` FROM `users` WHERE `user_id` = $userid";

		//echo $q;

		$result = $this->connection->RunQuery($q);

		if ($result->num_rows == 1){
			
			while($row = $result->fetch_array(MYSQLI_ASSOC)){

				$accesslevel = $row['access_level'];
				
				
	
			}
			
			return $accesslevel;
			
		}else{
			
			return FALSE;	
		
		}
		
		
		
	}
	
	
	public function getUsers (){
		
		$q = "SELECT `user_id`, `firstname`, `surname` FROM `users`";

		//echo $q;

		$result = $this->connection->RunQuery($q);

		if ($result->num_rows > 0){
			

			$users = array();

			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				
				$id = $row['user_id'];
				$firstname = $row['firstname'];
				$surname = $row['surname'];
				
				$users[$id] = $firstname . ' ' . $surname;
				
				
			}
		
			return $users;
		}
	}
	
	public function getUserName ($id){
		
		$q = "SELECT `firstname`, `surname` FROM `users` WHERE `user_id` = $id";

		//echo $q;

		$result = $this->connection->RunQuery($q);

		if ($result->num_rows == 1){

			
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				
				$firstname = $row['firstname'];
				$surname = $row['surname'];
				
				$user = $firstname . ' ' . $surname;
				
				
			}
		
			return $user;
		}else{
			
			return null;
		}
	}
	
	public function generateRandomString($length) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	

    /**
     * Close mysql connection
     */
	public function endusers(){
		$this->connection->CloseMysql();
	}

}