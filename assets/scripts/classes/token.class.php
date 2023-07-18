<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 10-04-2022
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


Class token {

	private $id; //int(11)
	private $asset_id; //int(11)
	private $cipher; //varchar(20)
	private $created; //timestamp
	private $remaining; //varchar(20)
	private $partner; //int(11)
	private $sponsor; //int(11)
	private $institutional_id; //int(11)
	private $length; //int(11)
	private $cost; //int(11)
	private $connection;

	public function __construct(){
            require_once 'DatabaseMyssqlPDOLearning.class.php';

		$this->connection = new DataBaseMysqlPDOLearning();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	public function New_token($asset_id,$cipher,$created,$remaining,$partner,$sponsor,$institutional_id,$length,$cost){
		$this->asset_id = $asset_id;
		$this->cipher = $cipher;
		$this->created = $created;
		$this->remaining = $remaining;
		$this->partner = $partner;
		$this->sponsor = $sponsor;
		$this->institutional_id = $institutional_id;
		$this->length = $length;
		$this->cost = $cost;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from token where id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->id = $row["id"];
			$this->asset_id = $row["asset_id"];
			$this->cipher = $row["cipher"];
			$this->created = $row["created"];
			$this->remaining = $row["remaining"];
			$this->partner = $row["partner"];
			$this->sponsor = $row["sponsor"];
			$this->institutional_id = $row["institutional_id"];
			$this->length = $row["length"];
			$this->cost = $row["cost"];
		}
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Load_records_limit_json($y, $x=0){
$q = "Select * from `token` LIMIT " . $x . ", " . $y;
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["asset_id"] = $row["asset_id"];
			$rowReturn[$x]["cipher"] = $row["cipher"];
			$rowReturn[$x]["created"] = $row["created"];
			$rowReturn[$x]["remaining"] = $row["remaining"];
			$rowReturn[$x]["partner"] = $row["partner"];
			$rowReturn[$x]["sponsor"] = $row["sponsor"];
			$rowReturn[$x]["institutional_id"] = $row["institutional_id"];
			$rowReturn[$x]["length"] = $row["length"];
			$rowReturn[$x]["cost"] = $row["cost"];
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
$q = "Select * from `token` WHERE `id` = $key";
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["asset_id"] = $row["asset_id"];
			$rowReturn[$x]["cipher"] = $row["cipher"];
			$rowReturn[$x]["created"] = $row["created"];
			$rowReturn[$x]["remaining"] = $row["remaining"];
			$rowReturn[$x]["partner"] = $row["partner"];
			$rowReturn[$x]["sponsor"] = $row["sponsor"];
			$rowReturn[$x]["institutional_id"] = $row["institutional_id"];
			$rowReturn[$x]["length"] = $row["length"];
			$rowReturn[$x]["cost"] = $row["cost"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    

        public function Load_records_limit_json_datatables($y, $x = 0)
            {
            $q = "Select * from `token` LIMIT $x, $y";
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
		$result = $this->connection->RunQuery("Select * from `token` where `id` = '$key_row' ");
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
		return $this->connection->TotalOfRows('token');
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
$q = "INSERT INTO `token` ($keys) VALUES ($keys2)";
		
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
$q = "UPDATE `token` SET $implodeArray WHERE `id` = '$this->id'";

		
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
		$result = $this->connection->RunQuery("DELETE FROM `token` WHERE `id` = $key_row");
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
		$result = $this->connection->RunQuery("SELECT id from token order by $column $order");
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
	 * @return asset_id - int(11)
	 */
	public function getasset_id(){
		return $this->asset_id;
	}

	/**
	 * @return cipher - varchar(20)
	 */
	public function getcipher(){
		return $this->cipher;
	}

	/**
	 * @return created - timestamp
	 */
	public function getcreated(){
		return $this->created;
	}

	/**
	 * @return remaining - varchar(20)
	 */
	public function getremaining(){
		return $this->remaining;
	}

	/**
	 * @return partner - int(11)
	 */
	public function getpartner(){
		return $this->partner;
	}

	/**
	 * @return sponsor - int(11)
	 */
	public function getsponsor(){
		return $this->sponsor;
	}

	/**
	 * @return institutional_id - int(11)
	 */
	public function getinstitutional_id(){
		return $this->institutional_id;
	}

	/**
	 * @return length - int(11)
	 */
	public function getlength(){
		return $this->length;
	}

	/**
	 * @return cost - int(11)
	 */
	public function getcost(){
		return $this->cost;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setid($id){
		$this->id = $id;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setasset_id($asset_id){
		$this->asset_id = $asset_id;
	}

	/**
	 * @param Type: varchar(20)
	 */
	public function setcipher($cipher){
		$this->cipher = $cipher;
	}

	/**
	 * @param Type: timestamp
	 */
	public function setcreated($created){
		$this->created = $created;
	}

	/**
	 * @param Type: varchar(20)
	 */
	public function setremaining($remaining){
		$this->remaining = $remaining;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setpartner($partner){
		$this->partner = $partner;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setsponsor($sponsor){
		$this->sponsor = $sponsor;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setinstitutional_id($institutional_id){
		$this->institutional_id = $institutional_id;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setlength($length){
		$this->length = $length;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setcost($cost){
		$this->cost = $cost;
	}

    /**
     * Close mysql connection
     */
	public function endtoken(){
		$this->connection->CloseMysql();
	}

}