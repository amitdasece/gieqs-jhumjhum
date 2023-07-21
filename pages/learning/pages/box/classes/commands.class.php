<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 26-06-2023
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


Class commands {

	private $id; //int(11)
	private $spoken_word; //varchar(400)
	private $description; //varchar(400)
	private $global; //int(11)
	private $created; //timestamp
	private $updated; //timestamp
	private $connection;

	public function __construct(){
            require_once 'DataBaseMysqlPDO.class.php';

		$this->connection = new DataBaseMysqlPDOGIEQsBox();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	public function New_commands($spoken_word,$description,$global,$created,$updated){
		$this->spoken_word = $spoken_word;
		$this->description = $description;
		$this->global = $global;
		$this->created = $created;
		$this->updated = $updated;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from commands where id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->id = $row["id"];
			$this->spoken_word = $row["spoken_word"];
			$this->description = $row["description"];
			$this->global = $row["global"];
			$this->created = $row["created"];
			$this->updated = $row["updated"];
		}
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Load_records_limit_json($y, $x=0){
$q = "Select * from `commands` LIMIT " . $x . ", " . $y;
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["spoken_word"] = $row["spoken_word"];
			$rowReturn[$x]["description"] = $row["description"];
			$rowReturn[$x]["global"] = $row["global"];
			$rowReturn[$x]["created"] = $row["created"];
			$rowReturn[$x]["updated"] = $row["updated"];
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
$q = "Select * from `commands` WHERE `id` = $key";
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["spoken_word"] = $row["spoken_word"];
			$rowReturn[$x]["description"] = $row["description"];
			$rowReturn[$x]["global"] = $row["global"];
			$rowReturn[$x]["created"] = $row["created"];
			$rowReturn[$x]["updated"] = $row["updated"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    

        public function Load_records_limit_json_datatables($y, $x = 0)
            {
            $q = "Select * from `commands` LIMIT $x, $y";
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
		$result = $this->connection->RunQuery("Select * from `commands` where `id` = '$key_row' ");
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
		return $this->connection->TotalOfRows('commands');
	}

    /**
		* Insert statement using PDO
		*/
 public function prepareStatementPDO () { 	
		//need to only update those which are set 
		$ov = get_object_vars($this); 
		if ($ov['connection'] != ''){
			unset($ov['connection']);
		} 
		if ($ov['id'] != '') {
			unset($ov['id']);
		} 
		$ovMod = array(); 
		foreach ($ov as $key=>$value){
			if ($value != '') {
				$key = '`' . $key . '`';
				$ovMod[$key] = $value;
			}
		}

		$ovMod2 = array(); 
		foreach ($ov as $key=>$value) {
			if ($value != '') {
				$key = '' . $key . '';
				$ovMod2[$key] = $value;
			}
		} 

		$ovMod3 = array(); 
		foreach ($ov as $key=>$value) {
			if ($value != '') {
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

		foreach ($ovMod as $key=>$value) {

			$termsToInsert .= ( $x !== ($numberOfTerms -1) ) ? "? ," : " ?";

			$x++;

		} 
		$q = "INSERT INTO `commands` ($keys) VALUES ($keys2)";
				
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
$q = "UPDATE `commands` SET $implodeArray WHERE `id` = '$this->id'";

		
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
		$result = $this->connection->RunQuery("DELETE FROM `commands` WHERE `id` = $key_row");
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
		$result = $this->connection->RunQuery("SELECT id from commands order by $column $order");
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
	 * @return spoken_word - varchar(400)
	 */
	public function getspoken_word(){
		return $this->spoken_word;
	}

	/**
	 * @return description - varchar(400)
	 */
	public function getdescription(){
		return $this->description;
	}

	/**
	 * @return global - int(11)
	 */
	public function getglobal(){
		return $this->global;
	}

	/**
	 * @return created - timestamp
	 */
	public function getcreated(){
		return $this->created;
	}

	/**
	 * @return updated - timestamp
	 */
	public function getupdated(){
		return $this->updated;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setid($id){
		$this->id = $id;
	}

	/**
	 * @param Type: varchar(400)
	 */
	public function setspoken_word($spoken_word){
		$this->spoken_word = $spoken_word;
	}

	/**
	 * @param Type: varchar(400)
	 */
	public function setdescription($description){
		$this->description = $description;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setglobal($global){
		$this->global = $global;
	}

	/**
	 * @param Type: timestamp
	 */
	public function setcreated($created){
		$this->created = $created;
	}

	/**
	 * @param Type: timestamp
	 */
	public function setupdated($updated){
		$this->updated = $updated;
	}

    /**
     * Close mysql connection
     */
	public function endcommands(){
		$this->connection->CloseMysql();
	}

	public function saveCommandData()
	{
		$ov = get_object_vars($this); 
		if ($ov['connection'] != ''){
			unset($ov['connection']);
		} 
		if ($ov['id'] != '') {
			unset($ov['id']);
		} 
		$ovMod = array(); 
		foreach ($ov as $key=>$value){
			if ($value != '') {
				$key = '`' . $key . '`';
				$ovMod[$key] = $value;
			}
		}

		$ovMod2 = array(); 
		foreach ($ov as $key=>$value) {
			if ($value != '') {
				$key = '' . $key . '';
				$ovMod2[$key] = $value;
			}
		} 

		$ovMod3 = array(); 
		foreach ($ov as $key=>$value) {
			if ($value != '') {
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

		foreach ($ovMod as $key=>$value) {

			$termsToInsert .= ( $x !== ($numberOfTerms -1) ) ? "? ," : " ?";

			$x++;

		} 
		 $q = "INSERT INTO `commands` ($keys,`status`) VALUES ($implodeArray,1)";
				
		$result = $this->connection->RunQuery($q);    

		if ($result) {		 
  
		  return $this->connection->conn->lastInsertId();  
		  
  
		}
	}

}