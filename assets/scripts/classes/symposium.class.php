<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 6-06-2022
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */if (session_status() == PHP_SESSION_NONE) { //if there's no session_start yet...
            session_start(); //do this
          }
          
          if ($_SESSION){
          
          if ($_SESSION['debug'] == true){
          
          error_reporting(E_ALL);
          
          }else{
          
          error_reporting(0);
          
          }
          }


Class symposium {

	private $id; //int(11)
	private $user_id; //varchar(11)
	private $asset_id; //varchar(11)
	private $partial_registration; //varchar(11)
	private $early_bird; //varchar(11)
	private $group_registration; //varchar(11)
	private $registrationType; //varchar(11)
	private $includeGIEQsPro; //varchar(11)
	private $longTermProMemberDiscount; //varchar(11)
	private $full_registration_date; //timestamp
	private $title; //varchar(11)
	private $interestReason; //varchar(11)
	private $professionalMember; //varchar(11)
	private $professionalMemberDiscount; //varchar(11)
	private $professionalMemberNumber; //varchar(11)
	private $informedHow; //varchar(11)
	private $notes; //text
	private $connection;

	public function __construct(){
        require_once 'DataBaseMysqlPDO.class.php';

		$this->connection = new DataBaseMysqlPDO();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	public function New_symposium($user_id,$asset_id,$partial_registration,$early_bird,$group_registration,$registrationType,$includeGIEQsPro,$longTermProMemberDiscount,$full_registration_date,$title,$interestReason,$professionalMember,$professionalMemberDiscount,$professionalMemberNumber,$informedHow,$notes){
		$this->user_id = $user_id;
		$this->asset_id = $asset_id;
		$this->partial_registration = $partial_registration;
		$this->early_bird = $early_bird;
		$this->group_registration = $group_registration;
		$this->registrationType = $registrationType;
		$this->includeGIEQsPro = $includeGIEQsPro;
		$this->longTermProMemberDiscount = $longTermProMemberDiscount;
		$this->full_registration_date = $full_registration_date;
		$this->title = $title;
		$this->interestReason = $interestReason;
		$this->professionalMember = $professionalMember;
		$this->professionalMemberDiscount = $professionalMemberDiscount;
		$this->professionalMemberNumber = $professionalMemberNumber;
		$this->informedHow = $informedHow;
		$this->notes = $notes;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from symposium where id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->id = $row["id"];
			$this->user_id = $row["user_id"];
			$this->asset_id = $row["asset_id"];
			$this->partial_registration = $row["partial_registration"];
			$this->early_bird = $row["early_bird"];
			$this->group_registration = $row["group_registration"];
			$this->registrationType = $row["registrationType"];
			$this->includeGIEQsPro = $row["includeGIEQsPro"];
			$this->longTermProMemberDiscount = $row["longTermProMemberDiscount"];
			$this->full_registration_date = $row["full_registration_date"];
			$this->title = $row["title"];
			$this->interestReason = $row["interestReason"];
			$this->professionalMember = $row["professionalMember"];
			$this->professionalMemberDiscount = $row["professionalMemberDiscount"];
			$this->professionalMemberNumber = $row["professionalMemberNumber"];
			$this->informedHow = $row["informedHow"];
			$this->notes = $row["notes"];
		}
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Load_records_limit_json($y, $x=0){
$q = "Select * from `symposium` LIMIT " . $x . ", " . $y;
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["user_id"] = $row["user_id"];
			$rowReturn[$x]["asset_id"] = $row["asset_id"];
			$rowReturn[$x]["partial_registration"] = $row["partial_registration"];
			$rowReturn[$x]["early_bird"] = $row["early_bird"];
			$rowReturn[$x]["group_registration"] = $row["group_registration"];
			$rowReturn[$x]["registrationType"] = $row["registrationType"];
			$rowReturn[$x]["includeGIEQsPro"] = $row["includeGIEQsPro"];
			$rowReturn[$x]["longTermProMemberDiscount"] = $row["longTermProMemberDiscount"];
			$rowReturn[$x]["full_registration_date"] = $row["full_registration_date"];
			$rowReturn[$x]["title"] = $row["title"];
			$rowReturn[$x]["interestReason"] = $row["interestReason"];
			$rowReturn[$x]["professionalMember"] = $row["professionalMember"];
			$rowReturn[$x]["professionalMemberDiscount"] = $row["professionalMemberDiscount"];
			$rowReturn[$x]["professionalMemberNumber"] = $row["professionalMemberNumber"];
			$rowReturn[$x]["informedHow"] = $row["informedHow"];
			$rowReturn[$x]["notes"] = $row["notes"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Return_row($key){
$q = "Select * from `symposium` WHERE `id` = $key";
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["user_id"] = $row["user_id"];
			$rowReturn[$x]["asset_id"] = $row["asset_id"];
			$rowReturn[$x]["partial_registration"] = $row["partial_registration"];
			$rowReturn[$x]["early_bird"] = $row["early_bird"];
			$rowReturn[$x]["group_registration"] = $row["group_registration"];
			$rowReturn[$x]["registrationType"] = $row["registrationType"];
			$rowReturn[$x]["includeGIEQsPro"] = $row["includeGIEQsPro"];
			$rowReturn[$x]["longTermProMemberDiscount"] = $row["longTermProMemberDiscount"];
			$rowReturn[$x]["full_registration_date"] = $row["full_registration_date"];
			$rowReturn[$x]["title"] = $row["title"];
			$rowReturn[$x]["interestReason"] = $row["interestReason"];
			$rowReturn[$x]["professionalMember"] = $row["professionalMember"];
			$rowReturn[$x]["professionalMemberDiscount"] = $row["professionalMemberDiscount"];
			$rowReturn[$x]["professionalMemberNumber"] = $row["professionalMemberNumber"];
			$rowReturn[$x]["informedHow"] = $row["informedHow"];
			$rowReturn[$x]["notes"] = $row["notes"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    

        public function Load_records_limit_json_datatables($y, $x = 0)
            {
            $q = "Select * from `symposium` LIMIT $x, $y";
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
		$result = $this->connection->RunQuery("Select * from `symposium` where `id` = '$key_row' ");
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
		return $this->connection->TotalOfRows('symposium');
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
$q = "INSERT INTO `symposium` ($keys) VALUES ($keys2)";
		
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
$q = "UPDATE `symposium` SET $implodeArray WHERE `id` = '$this->id'";

		
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
		$result = $this->connection->RunQuery("DELETE FROM `symposium` WHERE `id` = $key_row");
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
		$result = $this->connection->RunQuery("SELECT id from symposium order by $column $order");
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
	 * @return user_id - varchar(11)
	 */
	public function getuser_id(){
		return $this->user_id;
	}

	/**
	 * @return asset_id - varchar(11)
	 */
	public function getasset_id(){
		return $this->asset_id;
	}

	/**
	 * @return partial_registration - varchar(11)
	 */
	public function getpartial_registration(){
		return $this->partial_registration;
	}

	/**
	 * @return early_bird - varchar(11)
	 */
	public function getearly_bird(){
		return $this->early_bird;
	}

	/**
	 * @return group_registration - varchar(11)
	 */
	public function getgroup_registration(){
		return $this->group_registration;
	}

	/**
	 * @return registrationType - varchar(11)
	 */
	public function getregistrationType(){
		return $this->registrationType;
	}

	/**
	 * @return includeGIEQsPro - varchar(11)
	 */
	public function getincludeGIEQsPro(){
		return $this->includeGIEQsPro;
	}

	/**
	 * @return longTermProMemberDiscount - varchar(11)
	 */
	public function getlongTermProMemberDiscount(){
		return $this->longTermProMemberDiscount;
	}

	/**
	 * @return full_registration_date - timestamp
	 */
	public function getfull_registration_date(){
		return $this->full_registration_date;
	}

	/**
	 * @return title - varchar(11)
	 */
	public function gettitle(){
		return $this->title;
	}

	/**
	 * @return interestReason - varchar(11)
	 */
	public function getinterestReason(){
		return $this->interestReason;
	}

	/**
	 * @return professionalMember - varchar(11)
	 */
	public function getprofessionalMember(){
		return $this->professionalMember;
	}

	/**
	 * @return professionalMemberDiscount - varchar(11)
	 */
	public function getprofessionalMemberDiscount(){
		return $this->professionalMemberDiscount;
	}

	/**
	 * @return professionalMemberNumber - varchar(11)
	 */
	public function getprofessionalMemberNumber(){
		return $this->professionalMemberNumber;
	}

	/**
	 * @return informedHow - varchar(11)
	 */
	public function getinformedHow(){
		return $this->informedHow;
	}

	/**
	 * @return notes - text
	 */
	public function getnotes(){
		return $this->notes;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setid($id){
		$this->id = $id;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setuser_id($user_id){
		$this->user_id = $user_id;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setasset_id($asset_id){
		$this->asset_id = $asset_id;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setpartial_registration($partial_registration){
		$this->partial_registration = $partial_registration;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setearly_bird($early_bird){
		$this->early_bird = $early_bird;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setgroup_registration($group_registration){
		$this->group_registration = $group_registration;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setregistrationType($registrationType){
		$this->registrationType = $registrationType;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setincludeGIEQsPro($includeGIEQsPro){
		$this->includeGIEQsPro = $includeGIEQsPro;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setlongTermProMemberDiscount($longTermProMemberDiscount){
		$this->longTermProMemberDiscount = $longTermProMemberDiscount;
	}

	/**
	 * @param Type: timestamp
	 */
	public function setfull_registration_date($full_registration_date){
		$this->full_registration_date = $full_registration_date;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function settitle($title){
		$this->title = $title;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setinterestReason($interestReason){
		$this->interestReason = $interestReason;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setprofessionalMember($professionalMember){
		$this->professionalMember = $professionalMember;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setprofessionalMemberDiscount($professionalMemberDiscount){
		$this->professionalMemberDiscount = $professionalMemberDiscount;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setprofessionalMemberNumber($professionalMemberNumber){
		$this->professionalMemberNumber = $professionalMemberNumber;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setinformedHow($informedHow){
		$this->informedHow = $informedHow;
	}

	/**
	 * @param Type: text
	 */
	public function setnotes($notes){
		$this->notes = $notes;
	}

    /**
     * Close mysql connection
     */
	public function endsymposium(){
		$this->connection->CloseMysql();
	}

}