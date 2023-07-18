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
require_once 'DataBaseMysql.class.php';

Class slide {

	private $id; //int(10)
	private $constituentImageid; //int(10)
	private $consitutentAudioid; //int(10)
	private $consituentVideoid; //int(10)
	private $constituentQuestionid; //int(10)
	private $connection;

	public function slide(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don¥t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_slide($constituentImageid,$consitutentAudioid,$consituentVideoid,$constituentQuestionid){
		$this->constituentImageid = $constituentImageid;
		$this->consitutentAudioid = $consitutentAudioid;
		$this->consituentVideoid = $consituentVideoid;
		$this->constituentQuestionid = $constituentQuestionid;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from slide where id = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->id = $row["id"];
			$this->constituentImageid = $row["constituentImageid"];
			$this->consitutentAudioid = $row["consitutentAudioid"];
			$this->consituentVideoid = $row["consituentVideoid"];
			$this->constituentQuestionid = $row["constituentQuestionid"];
		}return $result; 
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$result = $this->connection->RunQuery("DELETE FROM slide WHERE id = $key_row");
return $result; 	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_Row(){


		
				$ov = get_object_vars($this);
		
				if ($ov['connection'] != ''){
				unset($ov['connection']);
				}
				if ($ov['id'] != ''){
				unset($ov['id']);
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
				
		
			$q = "UPDATE slide SET $implodeArray WHERE id = \"$this->id\"";
	$result = $this->connection->RunQuery($q); 
	return $result; 
	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_RowNulls(){
		$result = $this->connection->RunQuery("UPDATE slide set constituentImageid = \"$this->constituentImageid\", consitutentAudioid = \"$this->consitutentAudioid\", consituentVideoid = \"$this->consituentVideoid\", constituentQuestionid = \"$this->constituentQuestionid\" where id = \"$this->id\"");
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
				if ($ov['id'] != ''){
				unset($ov['id']);
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
        $q = "INSERT INTO slide ($keys_string) VALUES ('$implodeArray')";
		
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
	$result = $this->connection->RunQuery("Insert into slide (constituentImageid, consitutentAudioid, consituentVideoid, constituentQuestionid) values (\"$this->constituentImageid\", \"$this->consitutentAudioid\", \"$this->consituentVideoid\", \"$this->constituentQuestionid\")");
return $result; 	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT id from slide order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["id"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return id - int(10)
	 */
	public function getid(){
		return $this->id;
	}

	/**
	 * @return constituentImageid - int(10)
	 */
	public function getconstituentImageid(){
		return $this->constituentImageid;
	}

	/**
	 * @return consitutentAudioid - int(10)
	 */
	public function getconsitutentAudioid(){
		return $this->consitutentAudioid;
	}

	/**
	 * @return consituentVideoid - int(10)
	 */
	public function getconsituentVideoid(){
		return $this->consituentVideoid;
	}

	/**
	 * @return constituentQuestionid - int(10)
	 */
	public function getconstituentQuestionid(){
		return $this->constituentQuestionid;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setid($id){
		$this->id = $id;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setconstituentImageid($constituentImageid){
		$this->constituentImageid = $constituentImageid;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setconsitutentAudioid($consitutentAudioid){
		$this->consitutentAudioid = $consitutentAudioid;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setconsituentVideoid($consituentVideoid){
		$this->consituentVideoid = $consituentVideoid;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setconstituentQuestionid($constituentQuestionid){
		$this->constituentQuestionid = $constituentQuestionid;
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

    /**
     * Close mysql connection
     */
	public function endslide(){
		$this->connection->CloseMysql();
	}

}