<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 10-04-2020
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */
require_once 'DataBaseMysqlPDO.class.php';

Class values {

	private $comorbidity_major; //int(1)
	private $comorbidity_major_t; //varchar(14)
	private $diagnosis; //int(1)
	private $diagnosis_t; //varchar(25)
	private $GasFindings; //int(1)
	private $GasFindings_t; //varchar(18)
	private $IPEmphysema; //int(1)
	private $IPEmphysema_t; //varchar(17)
	private $Post_HRM_diagnosis; //int(1)
	private $Post_HRM_diagnosis_t; //varchar(25)
	private $Symptoms; //int(1)
	private $Symptoms_t; //varchar(13)
	private $Type_of_complication; //int(1)
	private $Type_of_complication_t; //varchar(11)
	private $Yes_no; //int(1)
	private $yes_no_t; //varchar(3)
	private $connection;

	public function __construct(){
		$this->connection = new DataBaseMysqlPDOEDM();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	public function New_values($comorbidity_major,$comorbidity_major_t,$diagnosis,$diagnosis_t,$GasFindings,$GasFindings_t,$IPEmphysema,$IPEmphysema_t,$Post_HRM_diagnosis,$Post_HRM_diagnosis_t,$Symptoms,$Symptoms_t,$Type_of_complication,$Type_of_complication_t,$Yes_no,$yes_no_t){
		$this->comorbidity_major = $comorbidity_major;
		$this->comorbidity_major_t = $comorbidity_major_t;
		$this->diagnosis = $diagnosis;
		$this->diagnosis_t = $diagnosis_t;
		$this->GasFindings = $GasFindings;
		$this->GasFindings_t = $GasFindings_t;
		$this->IPEmphysema = $IPEmphysema;
		$this->IPEmphysema_t = $IPEmphysema_t;
		$this->Post_HRM_diagnosis = $Post_HRM_diagnosis;
		$this->Post_HRM_diagnosis_t = $Post_HRM_diagnosis_t;
		$this->Symptoms = $Symptoms;
		$this->Symptoms_t = $Symptoms_t;
		$this->Type_of_complication = $Type_of_complication;
		$this->Type_of_complication_t = $Type_of_complication_t;
		$this->Yes_no = $Yes_no;
		$this->yes_no_t = $yes_no_t;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from values where comorbidity_major = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->comorbidity_major = $row["comorbidity_major"];
			$this->comorbidity_major_t = $row["comorbidity_major_t"];
			$this->diagnosis = $row["diagnosis"];
			$this->diagnosis_t = $row["diagnosis_t"];
			$this->GasFindings = $row["GasFindings"];
			$this->GasFindings_t = $row["GasFindings_t"];
			$this->IPEmphysema = $row["IPEmphysema"];
			$this->IPEmphysema_t = $row["IPEmphysema_t"];
			$this->Post_HRM_diagnosis = $row["Post_HRM_diagnosis"];
			$this->Post_HRM_diagnosis_t = $row["Post_HRM_diagnosis_t"];
			$this->Symptoms = $row["Symptoms"];
			$this->Symptoms_t = $row["Symptoms_t"];
			$this->Type_of_complication = $row["Type_of_complication"];
			$this->Type_of_complication_t = $row["Type_of_complication_t"];
			$this->Yes_no = $row["Yes_no"];
			$this->yes_no_t = $row["yes_no_t"];
		}
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Load_records_limit_json($y, $x=0){
$q = "Select * from `values` LIMIT " . $x . ", " . $y;
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["comorbidity_major"] = $row["comorbidity_major"];
			$rowReturn[$x]["comorbidity_major_t"] = $row["comorbidity_major_t"];
			$rowReturn[$x]["diagnosis"] = $row["diagnosis"];
			$rowReturn[$x]["diagnosis_t"] = $row["diagnosis_t"];
			$rowReturn[$x]["GasFindings"] = $row["GasFindings"];
			$rowReturn[$x]["GasFindings_t"] = $row["GasFindings_t"];
			$rowReturn[$x]["IPEmphysema"] = $row["IPEmphysema"];
			$rowReturn[$x]["IPEmphysema_t"] = $row["IPEmphysema_t"];
			$rowReturn[$x]["Post_HRM_diagnosis"] = $row["Post_HRM_diagnosis"];
			$rowReturn[$x]["Post_HRM_diagnosis_t"] = $row["Post_HRM_diagnosis_t"];
			$rowReturn[$x]["Symptoms"] = $row["Symptoms"];
			$rowReturn[$x]["Symptoms_t"] = $row["Symptoms_t"];
			$rowReturn[$x]["Type_of_complication"] = $row["Type_of_complication"];
			$rowReturn[$x]["Type_of_complication_t"] = $row["Type_of_complication_t"];
			$rowReturn[$x]["Yes_no"] = $row["Yes_no"];
			$rowReturn[$x]["yes_no_t"] = $row["yes_no_t"];
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
$q = "Select * from `values` WHERE `id` = $key";
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["comorbidity_major"] = $row["comorbidity_major"];
			$rowReturn[$x]["comorbidity_major_t"] = $row["comorbidity_major_t"];
			$rowReturn[$x]["diagnosis"] = $row["diagnosis"];
			$rowReturn[$x]["diagnosis_t"] = $row["diagnosis_t"];
			$rowReturn[$x]["GasFindings"] = $row["GasFindings"];
			$rowReturn[$x]["GasFindings_t"] = $row["GasFindings_t"];
			$rowReturn[$x]["IPEmphysema"] = $row["IPEmphysema"];
			$rowReturn[$x]["IPEmphysema_t"] = $row["IPEmphysema_t"];
			$rowReturn[$x]["Post_HRM_diagnosis"] = $row["Post_HRM_diagnosis"];
			$rowReturn[$x]["Post_HRM_diagnosis_t"] = $row["Post_HRM_diagnosis_t"];
			$rowReturn[$x]["Symptoms"] = $row["Symptoms"];
			$rowReturn[$x]["Symptoms_t"] = $row["Symptoms_t"];
			$rowReturn[$x]["Type_of_complication"] = $row["Type_of_complication"];
			$rowReturn[$x]["Type_of_complication_t"] = $row["Type_of_complication_t"];
			$rowReturn[$x]["Yes_no"] = $row["Yes_no"];
			$rowReturn[$x]["yes_no_t"] = $row["yes_no_t"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    

        public function Load_records_limit_json_datatables($y, $x = 0)
            {
            $q = "Select * from `values` LIMIT $x, $y";
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
		$result = $this->connection->RunQuery("Select * from `values` where `comorbidity_major` = '$key_row' ");
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
		return $this->connection->TotalOfRows('values');
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
if ($ov['comorbidity_major'] != ''){
			unset($ov['comorbidity_major']);
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
$q = "INSERT INTO `values` ($keys) VALUES ($keys2)";
		
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
if ($ov['comorbidity_major'] != ''){
			unset($ov['comorbidity_major']);
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
$q = "UPDATE `values` SET $implodeArray WHERE `comorbidity_major` = '$this->comorbidity_major'";

		
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
		$result = $this->connection->RunQuery("DELETE FROM `values` WHERE `comorbidity_major` = $key_row");
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
		$result = $this->connection->RunQuery("SELECT comorbidity_major from values order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["comorbidity_major"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return comorbidity_major - int(1)
	 */
	public function getcomorbidity_major(){
		return $this->comorbidity_major;
	}

	/**
	 * @return comorbidity_major_t - varchar(14)
	 */
	public function getcomorbidity_major_t(){
		return $this->comorbidity_major_t;
	}

	/**
	 * @return diagnosis - int(1)
	 */
	public function getdiagnosis(){
		return $this->diagnosis;
	}

	/**
	 * @return diagnosis_t - varchar(25)
	 */
	public function getdiagnosis_t(){
		return $this->diagnosis_t;
	}

	/**
	 * @return GasFindings - int(1)
	 */
	public function getGasFindings(){
		return $this->GasFindings;
	}

	/**
	 * @return GasFindings_t - varchar(18)
	 */
	public function getGasFindings_t(){
		return $this->GasFindings_t;
	}

	/**
	 * @return IPEmphysema - int(1)
	 */
	public function getIPEmphysema(){
		return $this->IPEmphysema;
	}

	/**
	 * @return IPEmphysema_t - varchar(17)
	 */
	public function getIPEmphysema_t(){
		return $this->IPEmphysema_t;
	}

	/**
	 * @return Post_HRM_diagnosis - int(1)
	 */
	public function getPost_HRM_diagnosis(){
		return $this->Post_HRM_diagnosis;
	}

	/**
	 * @return Post_HRM_diagnosis_t - varchar(25)
	 */
	public function getPost_HRM_diagnosis_t(){
		return $this->Post_HRM_diagnosis_t;
	}

	/**
	 * @return Symptoms - int(1)
	 */
	public function getSymptoms(){
		return $this->Symptoms;
	}

	/**
	 * @return Symptoms_t - varchar(13)
	 */
	public function getSymptoms_t(){
		return $this->Symptoms_t;
	}

	/**
	 * @return Type_of_complication - int(1)
	 */
	public function getType_of_complication(){
		return $this->Type_of_complication;
	}

	/**
	 * @return Type_of_complication_t - varchar(11)
	 */
	public function getType_of_complication_t(){
		return $this->Type_of_complication_t;
	}

	/**
	 * @return Yes_no - int(1)
	 */
	public function getYes_no(){
		return $this->Yes_no;
	}

	/**
	 * @return yes_no_t - varchar(3)
	 */
	public function getyes_no_t(){
		return $this->yes_no_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setcomorbidity_major($comorbidity_major){
		$this->comorbidity_major = $comorbidity_major;
	}

	/**
	 * @param Type: varchar(14)
	 */
	public function setcomorbidity_major_t($comorbidity_major_t){
		$this->comorbidity_major_t = $comorbidity_major_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setdiagnosis($diagnosis){
		$this->diagnosis = $diagnosis;
	}

	/**
	 * @param Type: varchar(25)
	 */
	public function setdiagnosis_t($diagnosis_t){
		$this->diagnosis_t = $diagnosis_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setGasFindings($GasFindings){
		$this->GasFindings = $GasFindings;
	}

	/**
	 * @param Type: varchar(18)
	 */
	public function setGasFindings_t($GasFindings_t){
		$this->GasFindings_t = $GasFindings_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setIPEmphysema($IPEmphysema){
		$this->IPEmphysema = $IPEmphysema;
	}

	/**
	 * @param Type: varchar(17)
	 */
	public function setIPEmphysema_t($IPEmphysema_t){
		$this->IPEmphysema_t = $IPEmphysema_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPost_HRM_diagnosis($Post_HRM_diagnosis){
		$this->Post_HRM_diagnosis = $Post_HRM_diagnosis;
	}

	/**
	 * @param Type: varchar(25)
	 */
	public function setPost_HRM_diagnosis_t($Post_HRM_diagnosis_t){
		$this->Post_HRM_diagnosis_t = $Post_HRM_diagnosis_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSymptoms($Symptoms){
		$this->Symptoms = $Symptoms;
	}

	/**
	 * @param Type: varchar(13)
	 */
	public function setSymptoms_t($Symptoms_t){
		$this->Symptoms_t = $Symptoms_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setType_of_complication($Type_of_complication){
		$this->Type_of_complication = $Type_of_complication;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setType_of_complication_t($Type_of_complication_t){
		$this->Type_of_complication_t = $Type_of_complication_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setYes_no($Yes_no){
		$this->Yes_no = $Yes_no;
	}

	/**
	 * @param Type: varchar(3)
	 */
	public function setyes_no_t($yes_no_t){
		$this->yes_no_t = $yes_no_t;
	}

    /**
     * Close mysql connection
     */
	public function endvalues(){
		$this->connection->CloseMysql();
	}

}