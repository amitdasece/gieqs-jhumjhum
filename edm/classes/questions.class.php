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

Class questions {

	private $id; //int(10)
	private $text; //varchar(300)
	private $type; //varchar(5)
	private $choice1; //varchar(50)
	private $choice2; //varchar(50)
	private $choice 3; //varchar(50)
	private $choice4; //varchar(50)
	private $choice5; //varchar(50)
	private $connection;

	public function questions(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don¥t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_questions($text,$type,$choice1,$choice2,$choice 3,$choice4,$choice5){
		$this->text = $text;
		$this->type = $type;
		$this->choice1 = $choice1;
		$this->choice2 = $choice2;
		$this->choice 3 = $choice 3;
		$this->choice4 = $choice4;
		$this->choice5 = $choice5;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from questions where id = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->id = $row["id"];
			$this->text = $row["text"];
			$this->type = $row["type"];
			$this->choice1 = $row["choice1"];
			$this->choice2 = $row["choice2"];
			$this->choice 3 = $row["choice 3"];
			$this->choice4 = $row["choice4"];
			$this->choice5 = $row["choice5"];
		}return $result; 
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$result = $this->connection->RunQuery("DELETE FROM questions WHERE id = $key_row");
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
				
		
			$q = "UPDATE questions SET $implodeArray WHERE id = \"$this->id\"";
	$result = $this->connection->RunQuery($q); 
	return $result; 
	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_RowNulls(){
		$result = $this->connection->RunQuery("UPDATE questions set text = \"$this->text\", type = \"$this->type\", choice1 = \"$this->choice1\", choice2 = \"$this->choice2\", choice 3 = \"$this->choice 3\", choice4 = \"$this->choice4\", choice5 = \"$this->choice5\" where id = \"$this->id\"");
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
        $q = "INSERT INTO questions ($keys_string) VALUES ('$implodeArray')";
		
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
	$result = $this->connection->RunQuery("Insert into questions (text, type, choice1, choice2, choice 3, choice4, choice5) values (\"$this->text\", \"$this->type\", \"$this->choice1\", \"$this->choice2\", \"$this->choice 3\", \"$this->choice4\", \"$this->choice5\")");
return $result; 	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT id from questions order by $column $order");
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
	 * @return text - varchar(300)
	 */
	public function gettext(){
		return $this->text;
	}

	/**
	 * @return type - varchar(5)
	 */
	public function gettype(){
		return $this->type;
	}

	/**
	 * @return choice1 - varchar(50)
	 */
	public function getchoice1(){
		return $this->choice1;
	}

	/**
	 * @return choice2 - varchar(50)
	 */
	public function getchoice2(){
		return $this->choice2;
	}

	/**
	 * @return choice 3 - varchar(50)
	 */
	public function getchoice 3(){
		return $this->choice 3;
	}

	/**
	 * @return choice4 - varchar(50)
	 */
	public function getchoice4(){
		return $this->choice4;
	}

	/**
	 * @return choice5 - varchar(50)
	 */
	public function getchoice5(){
		return $this->choice5;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setid($id){
		$this->id = $id;
	}

	/**
	 * @param Type: varchar(300)
	 */
	public function settext($text){
		$this->text = $text;
	}

	/**
	 * @param Type: varchar(5)
	 */
	public function settype($type){
		$this->type = $type;
	}

	/**
	 * @param Type: varchar(50)
	 */
	public function setchoice1($choice1){
		$this->choice1 = $choice1;
	}

	/**
	 * @param Type: varchar(50)
	 */
	public function setchoice2($choice2){
		$this->choice2 = $choice2;
	}

	/**
	 * @param Type: varchar(50)
	 */
	public function setchoice 3($choice 3){
		$this->choice 3 = $choice 3;
	}

	/**
	 * @param Type: varchar(50)
	 */
	public function setchoice4($choice4){
		$this->choice4 = $choice4;
	}

	/**
	 * @param Type: varchar(50)
	 */
	public function setchoice5($choice5){
		$this->choice5 = $choice5;
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
	public function endquestions(){
		$this->connection->CloseMysql();
	}

}