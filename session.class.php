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

Class session {

	private $id; //int(11)
	private $timeFrom; //varchar(100)
	private $timeTo; //varchar(100)
	private $title; //varchar(400)
	private $subtitle; //varchar(400)
	private $description; //varchar(800)
	private $connection;

	public function __construct(){
		$this->connection = new DataBaseMysqlPDO();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	public function New_session($timeFrom,$timeTo,$title,$subtitle,$description){
		$this->timeFrom = $timeFrom;
		$this->timeTo = $timeTo;
		$this->title = $title;
		$this->subtitle = $subtitle;
		$this->description = $description;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from session where id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->id = $row["id"];
			$this->timeFrom = $row["timeFrom"];
			$this->timeTo = $row["timeTo"];
			$this->title = $row["title"];
			$this->subtitle = $row["subtitle"];
			$this->description = $row["description"];
		}
	}

	/**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
	public function Return_row($key_row){
		$q = "Select * from session where id = \"$key_row\" ";
		echo $q;
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["timeFrom"] = $row["timeFrom"];
			$rowReturn[$x]["timeTo"] = $row["timeTo"];
			$rowReturn[$x]["title"] = $row["title"];
			$rowReturn[$x]["subtitle"] = $row["subtitle"];
			$rowReturn[$x]["description"] = $row["description"];
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
	public function Load_records_limit_json($y, $x=0){
$q = "Select * from `session` LIMIT " . $x . ", " . $y;
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["timeFrom"] = $row["timeFrom"];
			$rowReturn[$x]["timeTo"] = $row["timeTo"];
			$rowReturn[$x]["title"] = $row["title"];
			$rowReturn[$x]["subtitle"] = $row["subtitle"];
			$rowReturn[$x]["description"] = $row["description"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}

	public function Load_records_limit($y, $x=0){
		$q = "Select * from `session` LIMIT " . $x . ", " . $y;
				$result = $this->connection->RunQuery($q);
									$rowReturn = array();
								$x = 0;
								$nRows = $result->rowCount();
								if ($nRows > 0){
		
							while($row = $result->fetch(PDO::FETCH_ASSOC)){
					$rowReturn[$x]["id"] = $row["id"];
					$rowReturn[$x]["timeFrom"] = $row["timeFrom"];
					$rowReturn[$x]["timeTo"] = $row["timeTo"];
					$rowReturn[$x]["title"] = $row["title"];
					$rowReturn[$x]["subtitle"] = $row["subtitle"];
					$rowReturn[$x]["description"] = $row["description"];
				$x++;		}return json_encode($rowReturn);}
		
					else{return FALSE;
					}
					
			}
    

        public function Load_records_limit_json_datatables($y, $x = 0)
            {
            $q = "Select * from `session` LIMIT $x, $y";
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
		$q = "Select * from `session` where `id` = '$key_row'";
		//echo $q;
		$result = $this->connection->RunQuery($q);
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
		return $this->connection->TotalOfRows('session');
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
$q = "INSERT INTO `session` ($keys) VALUES ($keys2)";
		
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
$q = "UPDATE `session` SET $implodeArray WHERE `id` = '$this->id'";

		
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
		$this->connection->RunQuery("DELETE FROM `session` WHERE `id` = $key_row");
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
		$result = $this->connection->RunQuery("SELECT id from session order by $column $order");
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
	 * @return timeFrom - varchar(100)
	 */
	public function gettimeFrom(){
		return $this->timeFrom;
	}

	/**
	 * @return timeTo - varchar(100)
	 */
	public function gettimeTo(){
		return $this->timeTo;
	}

	/**
	 * @return title - varchar(400)
	 */
	public function gettitle(){
		return $this->title;
	}

	/**
	 * @return subtitle - varchar(400)
	 */
	public function getsubtitle(){
		return $this->subtitle;
	}

	/**
	 * @return description - varchar(800)
	 */
	public function getdescription(){
		return $this->description;
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
	public function settimeFrom($timeFrom){
		$this->timeFrom = $timeFrom;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function settimeTo($timeTo){
		$this->timeTo = $timeTo;
	}

	/**
	 * @param Type: varchar(400)
	 */
	public function settitle($title){
		$this->title = $title;
	}

	/**
	 * @param Type: varchar(400)
	 */
	public function setsubtitle($subtitle){
		$this->subtitle = $subtitle;
	}

	/**
	 * @param Type: varchar(800)
	 */
	public function setdescription($description){
		$this->description = $description;
	}

    /**
     * Close mysql connection
     */
	public function endsession(){
		$this->connection->CloseMysql();
	}

}