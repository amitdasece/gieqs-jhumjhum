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

 //error_reporting(E_ALL);
 

if ($_SESSION['debug'] == true){

error_reporting(E_ALL);

}else{

error_reporting(0);
	
}


require_once 'DataBaseMysql.class.php';

Class video {

	private $id; //int(10)
	private $name; //varchar(200)
	private $url; //varchar(200)
	private $active; //int(10)
	private $connection;

	public function __construct(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don¥t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_video($name,$url,$active){
		$this->name = $name;
		$this->url = $url;
		$this->active = $active;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$q= "Select * from video where `id` = \"$key_row\"";
		//echo $q;
		$result = $this->connection->RunQuery($q);
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->id = $row["id"];
			$this->name = $row["name"];
			$this->url = $row["url"];
			$this->active = $row["active"];
		}return $result; 
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$result = $this->connection->RunQuery("DELETE FROM video WHERE id = $key_row");
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
				
		
			//$q = "UPDATE video SET $implodeArray WHERE id = \"$this->id\"";
			$q = "UPDATE `video` SET $implodeArray WHERE `id` = {$this->id}";
			//echo $q;
	$result = $this->connection->RunQuery($q); 
	return $result; 
	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_RowNulls(){
		$result = $this->connection->RunQuery("UPDATE video set name = \"$this->name\", url = \"$this->url\", active = \"$this->active\" where id = \"$this->id\"");
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
        $q = "INSERT INTO video ($keys_string) VALUES ('$implodeArray')";
		
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
	$result = $this->connection->RunQuery("Insert into video (name, url, active) values (\"$this->name\", \"$this->url\", \"$this->active\")");
return $result; 	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT id from video order by $column $order");
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
	 * @return name - varchar(200)
	 */
	public function getname(){
		return $this->name;
	}

	/**
	 * @return url - varchar(200)
	 */
	public function geturl(){
		return $this->url;
	}

	/**
	 * @return active - int(10)
	 */
	public function getactive(){
		return $this->active;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setid($id){
		$this->id = $id;
	}

	/**
	 * @param Type: varchar(200)
	 */
	public function setname($name){
		$this->name = $name;
	}

	/**
	 * @param Type: varchar(200)
	 */
	public function seturl($url){
		$this->url = $url;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setactive($active){
		$this->active = $active;
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
				
				
	public function newVideo($name, $url, $active, $split) {
		
		$q = "INSERT INTO video SET name = '$name', url = '$url', active = '$active', split = '$split'";
		
		
		//return $this->returnYesNoDBQuery($q);
		
		$result = $this->connection->RunQuery($q);
		
		if ($this->returnYesNoDBQuery($q) == 1){
			
			return $this->connection->conn->insert_id;
			
		}else{
			
			
			return false;
			
		}
		
		//$result = $this->connection->RunQuery($q);
		
		
		
		
		
	}
	
	public function updateVideo($name, $url, $active, $split, $videoid) {
		
		$q = "UPDATE video SET name = '$name', url = '$url', active = '$active', split = '$split'  WHERE id=$videoid";
		
		
		//echo $q;
		
		return $this->returnYesNoDBQuery($q);
		
		//$result = $this->connection->RunQuery($q);
		
		//return $this->connection->conn;
		
		
		
	}
	
	public function checkisValidVideo ($videoid){

		$result1 = $this->Load_from_key($videoid);
		if ($result1->num_rows == '1'){
			return 1;
		} else {
			$lesionid = NULL;
			return 0;   }

	}
	
	public function getVideoData($videoid){
		
		$data = array();
		$result = $this->connection->RunQuery("SELECT name, url, active, split from video where id = $videoid");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$data['name'] = $row["name"];
				$data['url'] = $row["url"];
				$data['active'] = $row["active"];
				$data['split'] = $row["split"];
			}
		return json_encode($data);
		
		
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
	public function endvideo(){
		$this->connection->CloseMysql();
	}

}