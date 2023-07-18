<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 26-01-2020
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */
require_once 'DataBaseMysqlPDO.class.php';

Class users {

	private $user_id; //int(10)
	private $firstname; //varchar(30)
	private $surname; //varchar(30)
	private $email; //varchar(70)
	private $password; //varchar(200)
	private $centre; //int(10)
	private $centreName; //varchar(200)
	private $registered_date; //date
	private $last_login; //timestamp(6)
	private $previous_login; //timestamp(6)
	private $timezone; //varchar(50)
	private $access_level; //int(3)
	private $contactPhone; //varchar(40)
	private $key; //varchar(200)
	private $centreCity; //varchar(200)
	private $centreCountry; //varchar(200)
	private $trainee; //int(10)
	private $yearsIndependent; //int(10)
	private $endoscopyTrainingProgramme; //int(10)
	private $yearsEndoscopy; //int(11)
	private $specialistInterest; //int(11)
	private $emailPreferences; //int(11)
	private $connection;

	public function __construct(){
		$this->connection = new DataBaseMysqlPDO();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	public function New_users($firstname,$surname,$email,$password,$centre,$centreName,$registered_date,$last_login,$previous_login,$timezone,$access_level,$contactPhone,$key,$centreCity,$centreCountry,$trainee,$yearsIndependent,$endoscopyTrainingProgramme,$yearsEndoscopy,$specialistInterest,$emailPreferences){
		$this->firstname = $firstname;
		$this->surname = $surname;
		$this->email = $email;
		$this->password = $password;
		$this->centre = $centre;
		$this->centreName = $centreName;
		$this->registered_date = $registered_date;
		$this->last_login = $last_login;
		$this->previous_login = $previous_login;
		$this->timezone = $timezone;
		$this->access_level = $access_level;
		$this->contactPhone = $contactPhone;
		$this->key = $key;
		$this->centreCity = $centreCity;
		$this->centreCountry = $centreCountry;
		$this->trainee = $trainee;
		$this->yearsIndependent = $yearsIndependent;
		$this->endoscopyTrainingProgramme = $endoscopyTrainingProgramme;
		$this->yearsEndoscopy = $yearsEndoscopy;
		$this->specialistInterest = $specialistInterest;
		$this->emailPreferences = $emailPreferences;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from users where user_id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->user_id = $row["user_id"];
			$this->firstname = $row["firstname"];
			$this->surname = $row["surname"];
			$this->email = $row["email"];
			$this->password = $row["password"];
			$this->centre = $row["centre"];
			$this->centreName = $row["centreName"];
			$this->registered_date = $row["registered_date"];
			$this->last_login = $row["last_login"];
			$this->previous_login = $row["previous_login"];
			$this->timezone = $row["timezone"];
			$this->access_level = $row["access_level"];
			$this->contactPhone = $row["contactPhone"];
			$this->key = $row["key"];
			$this->centreCity = $row["centreCity"];
			$this->centreCountry = $row["centreCountry"];
			$this->trainee = $row["trainee"];
			$this->yearsIndependent = $row["yearsIndependent"];
			$this->endoscopyTrainingProgramme = $row["endoscopyTrainingProgramme"];
			$this->yearsEndoscopy = $row["yearsEndoscopy"];
			$this->specialistInterest = $row["specialistInterest"];
			$this->emailPreferences = $row["emailPreferences"];
		}
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Load_records_limit_json($y, $x=0){
$q = "Select * from `users` LIMIT " . $x . ", " . $y;
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["user_id"] = $row["user_id"];
			$rowReturn[$x]["firstname"] = $row["firstname"];
			$rowReturn[$x]["surname"] = $row["surname"];
			$rowReturn[$x]["email"] = $row["email"];
			$rowReturn[$x]["password"] = $row["password"];
			$rowReturn[$x]["centre"] = $row["centre"];
			$rowReturn[$x]["centreName"] = $row["centreName"];
			$rowReturn[$x]["registered_date"] = $row["registered_date"];
			$rowReturn[$x]["last_login"] = $row["last_login"];
			$rowReturn[$x]["previous_login"] = $row["previous_login"];
			$rowReturn[$x]["timezone"] = $row["timezone"];
			$rowReturn[$x]["access_level"] = $row["access_level"];
			$rowReturn[$x]["contactPhone"] = $row["contactPhone"];
			$rowReturn[$x]["key"] = $row["key"];
			$rowReturn[$x]["centreCity"] = $row["centreCity"];
			$rowReturn[$x]["centreCountry"] = $row["centreCountry"];
			$rowReturn[$x]["trainee"] = $row["trainee"];
			$rowReturn[$x]["yearsIndependent"] = $row["yearsIndependent"];
			$rowReturn[$x]["endoscopyTrainingProgramme"] = $row["endoscopyTrainingProgramme"];
			$rowReturn[$x]["yearsEndoscopy"] = $row["yearsEndoscopy"];
			$rowReturn[$x]["specialistInterest"] = $row["specialistInterest"];
			$rowReturn[$x]["emailPreferences"] = $row["emailPreferences"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    

        public function Load_records_limit_json_datatables($y, $x = 0)
            {
            $q = "Select * from `users` LIMIT $x, $y";
            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();
            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn['data'][] = array_map('utf8_encode', $row);
                }
            
                return json_encode($rowReturn);

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                $rowReturn['data'] = [];
                
                return json_encode($rowReturn);
            }

        }

    /**
     * Checks if the specified record exists
     *
     * @param key_table_type $key_row
     *
     */
	public function matchRecord($key_row){
		$result = $this->connection->RunQuery("Select * from `users` where `user_id` = '$key_row' ");
		$nRows = $result->rowCount();
			if ($nRows == 1){
				return TRUE;
			}else{
				return FALSE;
			}
	}

    /**
		* Return the number of rows
		*/
	public function numberOfRows(){
		return $this->connection->TotalOfRows('users');
	}

    /**
		* Insert statement using PDO
		*/
 public function prepareStatementPDO (){ 
 //need to only update those which are set 
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

				$key = '`' . $key . '`';

				$ovMod[$key] = $value;
			}

			}
$ovMod2 = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '' . $key . '';

				$ovMod2[$key] = $value;
			}

		} 
$ovMod3 = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = ':' . $key;

				$ovMod3[$key] = $value;
			}

		} 
foreach ($ovMod as $key => $value) {

            $value = addslashes($value);
			$value = "'$value'";
			$updates[] = "$value";

		} 
$implodeArray = implode(', ', $updates); 
//get number of terms in update
					//need only the keys first

					$keys = implode(", ", array_keys($ovMod));
					$keys2 = implode(", ", array_keys($ovMod3));
			
//get number of keys

				$numberOfTerms = count($ovMod);
		
//echo $numberOfTerms;

		$termsToInsert = ''; 
$x=0;

		foreach ($ovMod as $key=>$value){

			$termsToInsert .= ( $x !== ($numberOfTerms -1) ) ? "? ," : " ?";

			$x++;

		} 
$q = "INSERT INTO `users` ($keys) VALUES ($keys2)";
		
 $stmt = $this->connection->prepare($q); 
$stmt->execute($ovMod3); 
return $this->connection->conn->lastInsertId(); 
	}

    /**
		* Update statement using PDO
		*/
 public function prepareStatementPDOUpdate (){ 
 //need to only update those which are set 
 $ov = get_object_vars($this); 
if ($ov['connection'] != ''){
			unset($ov['connection']);
		} 
if ($ov['user_id'] != ''){
			unset($ov['user_id']);
		} 
if ($ov['updated'] != ''){
			unset($ov['updated']);
		} 
$ovMod = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '`' . $key . '`';

				$ovMod[$key] = $value;
			}

			}
$ovMod2 = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '' . $key . '';

				$ovMod2[$key] = $value;
			}

		} 
$ovMod3 = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = ':' . $key;

				$ovMod3[$key] = $value;
			}

		} 
foreach ($ovMod as $key => $value) {

            $value = addslashes($value);
			$value = "'$value'";
			$updates[] = "$key=$value";

		} 
$implodeArray = implode(', ', $updates); 
//get number of terms in update
					//need only the keys first

					$keys = implode(", ", array_keys($ovMod));
					$keys2 = implode(", ", array_keys($ovMod3));
			
//get number of keys

				$numberOfTerms = count($ovMod);
		
//echo $numberOfTerms;

		$termsToInsert = ''; 
$x=0;

		foreach ($ovMod as $key=>$value){

			$termsToInsert .= ( $x !== ($numberOfTerms -1) ) ? "? ," : " ?";

			$x++;

		} 
$q = "UPDATE `users` SET $implodeArray WHERE `user_id` = '$this->user_id'";

		
 $stmt = $this->connection->RunQuery($q); 
 return $stmt->rowCount(); 
	}


    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$result = $this->connection->RunQuery("DELETE FROM `users` WHERE `user_id` = $key_row");
		return $result->rowCount();
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
	 * @return centre - int(10)
	 */
	public function getcentre(){
		return $this->centre;
	}

	/**
	 * @return centreName - varchar(200)
	 */
	public function getcentreName(){
		return $this->centreName;
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
	 * @return centreCity - varchar(200)
	 */
	public function getcentreCity(){
		return $this->centreCity;
	}

	/**
	 * @return centreCountry - varchar(200)
	 */
	public function getcentreCountry(){
		return $this->centreCountry;
	}

	/**
	 * @return trainee - int(10)
	 */
	public function gettrainee(){
		return $this->trainee;
	}

	/**
	 * @return yearsIndependent - int(10)
	 */
	public function getyearsIndependent(){
		return $this->yearsIndependent;
	}

	/**
	 * @return endoscopyTrainingProgramme - int(10)
	 */
	public function getendoscopyTrainingProgramme(){
		return $this->endoscopyTrainingProgramme;
	}

	/**
	 * @return yearsEndoscopy - int(11)
	 */
	public function getyearsEndoscopy(){
		return $this->yearsEndoscopy;
	}

	/**
	 * @return specialistInterest - int(11)
	 */
	public function getspecialistInterest(){
		return $this->specialistInterest;
	}

	/**
	 * @return emailPreferences - int(11)
	 */
	public function getemailPreferences(){
		return $this->emailPreferences;
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
	 * @param Type: varchar(200)
	 */
	public function setcentreName($centreName){
		$this->centreName = $centreName;
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
	 * @param Type: varchar(200)
	 */
	public function setcentreCity($centreCity){
		$this->centreCity = $centreCity;
	}

	/**
	 * @param Type: varchar(200)
	 */
	public function setcentreCountry($centreCountry){
		$this->centreCountry = $centreCountry;
	}

	/**
	 * @param Type: int(10)
	 */
	public function settrainee($trainee){
		$this->trainee = $trainee;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setyearsIndependent($yearsIndependent){
		$this->yearsIndependent = $yearsIndependent;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setendoscopyTrainingProgramme($endoscopyTrainingProgramme){
		$this->endoscopyTrainingProgramme = $endoscopyTrainingProgramme;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setyearsEndoscopy($yearsEndoscopy){
		$this->yearsEndoscopy = $yearsEndoscopy;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setspecialistInterest($specialistInterest){
		$this->specialistInterest = $specialistInterest;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setemailPreferences($emailPreferences){
		$this->emailPreferences = $emailPreferences;
	}

    /**
     * Close mysql connection
     */
	public function endusers(){
		$this->connection->CloseMysql();
	}

}