<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 21-06-2022
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


Class curriculum_items {

	private $id; //int(11)
	private $section_id; //int(11)
	private $item_order; //int(11)
	private $type; //varchar(11)
	private $link_to_content; //varchar(1000)
	private $image_url; //varchar(400)
	private $statement; //text
	private $evidence_level; //varchar(200)
	private $created; //datetime
	private $updated; //datetime
	private $connection;

	public function __construct(){
            require_once 'DatabaseMyssqlPDOLearning.class.php';

		$this->connection = new DataBaseMysqlPDOLearning();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	public function New_curriculum_items($section_id,$item_order,$type,$link_to_content,$image_url,$statement,$evidence_level,$created,$updated){
		$this->section_id = $section_id;
		$this->item_order = $item_order;
		$this->type = $type;
		$this->link_to_content = $link_to_content;
		$this->image_url = $image_url;
		$this->statement = $statement;
		$this->evidence_level = $evidence_level;
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
		$result = $this->connection->RunQuery("Select * from curriculum_items where id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->id = $row["id"];
			$this->section_id = $row["section_id"];
			$this->item_order = $row["item_order"];
			$this->type = $row["type"];
			$this->link_to_content = $row["link_to_content"];
			$this->image_url = $row["image_url"];
			$this->statement = $row["statement"];
			$this->evidence_level = $row["evidence_level"];
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
$q = "Select * from `curriculum_items` LIMIT " . $x . ", " . $y;
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["section_id"] = $row["section_id"];
			$rowReturn[$x]["item_order"] = $row["item_order"];
			$rowReturn[$x]["type"] = $row["type"];
			$rowReturn[$x]["link_to_content"] = $row["link_to_content"];
			$rowReturn[$x]["image_url"] = $row["image_url"];
			$rowReturn[$x]["statement"] = $row["statement"];
			$rowReturn[$x]["evidence_level"] = $row["evidence_level"];
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
$q = "Select * from `curriculum_items` WHERE `id` = $key";
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["section_id"] = $row["section_id"];
			$rowReturn[$x]["item_order"] = $row["item_order"];
			$rowReturn[$x]["type"] = $row["type"];
			$rowReturn[$x]["link_to_content"] = $row["link_to_content"];
			$rowReturn[$x]["image_url"] = $row["image_url"];
			$rowReturn[$x]["statement"] = $row["statement"];
			$rowReturn[$x]["evidence_level"] = $row["evidence_level"];
			$rowReturn[$x]["created"] = $row["created"];
			$rowReturn[$x]["updated"] = $row["updated"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    

        public function Load_records_limit_json_datatables($y, $x = 0)
            {
            $q = "Select * from `curriculum_items` LIMIT $x, $y";
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
		$result = $this->connection->RunQuery("Select * from `curriculum_items` where `id` = '$key_row' ");
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
		return $this->connection->TotalOfRows('curriculum_items');
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
$q = "INSERT INTO `curriculum_items` ($keys) VALUES ($keys2)";
		
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
$q = "UPDATE `curriculum_items` SET $implodeArray WHERE `id` = '$this->id'";

		
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
		$result = $this->connection->RunQuery("DELETE FROM `curriculum_items` WHERE `id` = $key_row");
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
		$result = $this->connection->RunQuery("SELECT id from curriculum_items order by $column $order");
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
	 * @return section_id - int(11)
	 */
	public function getsection_id(){
		return $this->section_id;
	}

	/**
	 * @return item_order - int(11)
	 */
	public function getitem_order(){
		return $this->item_order;
	}

	/**
	 * @return type - varchar(11)
	 */
	public function gettype(){
		return $this->type;
	}

	/**
	 * @return link_to_content - varchar(1000)
	 */
	public function getlink_to_content(){
		return $this->link_to_content;
	}

	/**
	 * @return image_url - varchar(400)
	 */
	public function getimage_url(){
		return $this->image_url;
	}

	/**
	 * @return statement - text
	 */
	public function getstatement(){
		return $this->statement;
	}

	/**
	 * @return evidence_level - varchar(200)
	 */
	public function getevidence_level(){
		return $this->evidence_level;
	}

	/**
	 * @return created - datetime
	 */
	public function getcreated(){
		return $this->created;
	}

	/**
	 * @return updated - datetime
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
	 * @param Type: int(11)
	 */
	public function setsection_id($section_id){
		$this->section_id = $section_id;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setitem_order($item_order){
		$this->item_order = $item_order;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function settype($type){
		$this->type = $type;
	}

	/**
	 * @param Type: varchar(1000)
	 */
	public function setlink_to_content($link_to_content){
		$this->link_to_content = $link_to_content;
	}

	/**
	 * @param Type: varchar(400)
	 */
	public function setimage_url($image_url){
		$this->image_url = $image_url;
	}

	/**
	 * @param Type: text
	 */
	public function setstatement($statement){
		$this->statement = $statement;
	}

	/**
	 * @param Type: varchar(200)
	 */
	public function setevidence_level($evidence_level){
		$this->evidence_level = $evidence_level;
	}

	/**
	 * @param Type: datetime
	 */
	public function setcreated($created){
		$this->created = $created;
	}

	/**
	 * @param Type: datetime
	 */
	public function setupdated($updated){
		$this->updated = $updated;
	}

    /**
     * Close mysql connection
     */
	public function endcurriculum_items(){
		$this->connection->CloseMysql();
	}

}