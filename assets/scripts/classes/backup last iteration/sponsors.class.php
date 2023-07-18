<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 25-01-2020
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */
require_once 'DataBaseMysqlPDO.class.php';

Class sponsors {

	private $id; //int(11)
	private $title; //varchar(100)
	private $firstname; //varchar(200)
	private $surname; //varchar(200)
	private $email; //varchar(200)
	private $phone; //varchar(200)
	private $company; //varchar(200)
	private $optOut; //int(11)
	private $connection;

	public function __construct(){
		$this->connection = new DataBaseMysqlPDO();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	public function New_sponsors($title,$firstname,$surname,$email,$phone,$company,$optOut){
		$this->title = $title;
		$this->firstname = $firstname;
		$this->surname = $surname;
		$this->email = $email;
		$this->phone = $phone;
		$this->company = $company;
		$this->optOut = $optOut;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from sponsors where id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->id = $row["id"];
			$this->title = $row["title"];
			$this->firstname = $row["firstname"];
			$this->surname = $row["surname"];
			$this->email = $row["email"];
			$this->phone = $row["phone"];
			$this->company = $row["company"];
			$this->optOut = $row["optOut"];
		}
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Load_records_limit_json($y, $x=0){
$q = "Select * from `sponsors` LIMIT " . $x . ", " . $y;
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["title"] = $row["title"];
			$rowReturn[$x]["firstname"] = $row["firstname"];
			$rowReturn[$x]["surname"] = $row["surname"];
			$rowReturn[$x]["email"] = $row["email"];
			$rowReturn[$x]["phone"] = $row["phone"];
			$rowReturn[$x]["company"] = $row["company"];
			$rowReturn[$x]["optOut"] = $row["optOut"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    

        public function Load_records_limit_json_datatables($y, $x = 0)
            {
            $q = "Select * from `sponsors` LIMIT $x, $y";
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
		$result = $this->connection->RunQuery("Select * from `sponsors` where `id` = '$key_row' ");
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
		return $this->connection->TotalOfRows('sponsors');
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
if ($ov['id'] != ''){
			unset($ov['id']);
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
$q = "INSERT INTO `sponsors` ($keys) VALUES ($keys2)";
		
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
if ($ov['id'] != ''){
			unset($ov['id']);
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
$q = "UPDATE `sponsors` SET $implodeArray WHERE `id` = '$this->id'";

		
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
		$this->connection->RunQuery("DELETE FROM `sponsors` WHERE `id` = $key_row");
		$result->rowCount();
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT id from sponsors order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["id"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return id - int(11)
	 */
	public function getid(){
		return $this->id;
	}

	/**
	 * @return title - varchar(100)
	 */
	public function gettitle(){
		return $this->title;
	}

	/**
	 * @return firstname - varchar(200)
	 */
	public function getfirstname(){
		return $this->firstname;
	}

	/**
	 * @return surname - varchar(200)
	 */
	public function getsurname(){
		return $this->surname;
	}

	/**
	 * @return email - varchar(200)
	 */
	public function getemail(){
		return $this->email;
	}

	/**
	 * @return phone - varchar(200)
	 */
	public function getphone(){
		return $this->phone;
	}

	/**
	 * @return company - varchar(200)
	 */
	public function getcompany(){
		return $this->company;
	}

	/**
	 * @return optOut - int(11)
	 */
	public function getoptOut(){
		return $this->optOut;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setid($id){
		$this->id = $id;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function settitle($title){
		$this->title = $title;
	}

	/**
	 * @param Type: varchar(200)
	 */
	public function setfirstname($firstname){
		$this->firstname = $firstname;
	}

	/**
	 * @param Type: varchar(200)
	 */
	public function setsurname($surname){
		$this->surname = $surname;
	}

	/**
	 * @param Type: varchar(200)
	 */
	public function setemail($email){
		$this->email = $email;
	}

	/**
	 * @param Type: varchar(200)
	 */
	public function setphone($phone){
		$this->phone = $phone;
	}

	/**
	 * @param Type: varchar(200)
	 */
	public function setcompany($company){
		$this->company = $company;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setoptOut($optOut){
		$this->optOut = $optOut;
	}

    /**
     * Close mysql connection
     */
	public function endsponsors(){
		$this->connection->CloseMysql();
	}

}