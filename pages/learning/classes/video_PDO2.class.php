<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 21-07-2021
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


Class video {

	private $id; //int(10)
	private $name; //varchar(200)
	private $url; //varchar(200)
	private $active; //int(10)
	private $split; //int(10)
	private $created; //timestamp
	private $updated; //timestamp
	private $superCategory; //varchar(11)
	private $author; //int(10)
	private $editor; //varchar(20)
	private $tagger; //varchar(20)
	private $recorder; //varchar(20)
	private $description; //varchar(800)
	private $duration; //int(11)
	private $thumbnail; //varchar(300)
	private $connection;

	public function __construct(){
            require_once 'DatabaseMyssqlPDOLearning.class.php';

		$this->connection = new DataBaseMysqlPDOLearning();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	public function New_video($name,$url,$active,$split,$created,$updated,$superCategory,$author,$editor,$tagger,$recorder,$description,$duration,$thumbnail){
		$this->name = $name;
		$this->url = $url;
		$this->active = $active;
		$this->split = $split;
		$this->created = $created;
		$this->updated = $updated;
		$this->superCategory = $superCategory;
		$this->author = $author;
		$this->editor = $editor;
		$this->tagger = $tagger;
		$this->recorder = $recorder;
		$this->description = $description;
		$this->duration = $duration;
		$this->thumbnail = $thumbnail;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from video where id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->id = $row["id"];
			$this->name = $row["name"];
			$this->url = $row["url"];
			$this->active = $row["active"];
			$this->split = $row["split"];
			$this->created = $row["created"];
			$this->updated = $row["updated"];
			$this->superCategory = $row["superCategory"];
			$this->author = $row["author"];
			$this->editor = $row["editor"];
			$this->tagger = $row["tagger"];
			$this->recorder = $row["recorder"];
			$this->description = $row["description"];
			$this->duration = $row["duration"];
			$this->thumbnail = $row["thumbnail"];
		}
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Load_records_limit_json($y, $x=0){
$q = "Select * from `video` LIMIT " . $x . ", " . $y;
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["name"] = $row["name"];
			$rowReturn[$x]["url"] = $row["url"];
			$rowReturn[$x]["active"] = $row["active"];
			$rowReturn[$x]["split"] = $row["split"];
			$rowReturn[$x]["created"] = $row["created"];
			$rowReturn[$x]["updated"] = $row["updated"];
			$rowReturn[$x]["superCategory"] = $row["superCategory"];
			$rowReturn[$x]["author"] = $row["author"];
			$rowReturn[$x]["editor"] = $row["editor"];
			$rowReturn[$x]["tagger"] = $row["tagger"];
			$rowReturn[$x]["recorder"] = $row["recorder"];
			$rowReturn[$x]["description"] = $row["description"];
			$rowReturn[$x]["duration"] = $row["duration"];
			$rowReturn[$x]["thumbnail"] = $row["thumbnail"];
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
$q = "Select * from `video` WHERE `id` = $key";
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["name"] = $row["name"];
			$rowReturn[$x]["url"] = $row["url"];
			$rowReturn[$x]["active"] = $row["active"];
			$rowReturn[$x]["split"] = $row["split"];
			$rowReturn[$x]["created"] = $row["created"];
			$rowReturn[$x]["updated"] = $row["updated"];
			$rowReturn[$x]["superCategory"] = $row["superCategory"];
			$rowReturn[$x]["author"] = $row["author"];
			$rowReturn[$x]["editor"] = $row["editor"];
			$rowReturn[$x]["tagger"] = $row["tagger"];
			$rowReturn[$x]["recorder"] = $row["recorder"];
			$rowReturn[$x]["description"] = $row["description"];
			$rowReturn[$x]["duration"] = $row["duration"];
			$rowReturn[$x]["thumbnail"] = $row["thumbnail"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    

        public function Load_records_limit_json_datatables($y, $x = 0)
            {
            $q = "Select * from `video` LIMIT $x, $y";
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
		$result = $this->connection->RunQuery("Select * from `video` where `id` = '$key_row' ");
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
		return $this->connection->TotalOfRows('video');
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
$q = "INSERT INTO `video` ($keys) VALUES ($keys2)";
		
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
$q = "UPDATE `video` SET $implodeArray WHERE `id` = '$this->id'";

		
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
		$result = $this->connection->RunQuery("DELETE FROM `video` WHERE `id` = $key_row");
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
	 * @return split - int(10)
	 */
	public function getsplit(){
		return $this->split;
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
	 * @return superCategory - varchar(11)
	 */
	public function getsuperCategory(){
		return $this->superCategory;
	}

	/**
	 * @return author - int(10)
	 */
	public function getauthor(){
		return $this->author;
	}

	/**
	 * @return editor - varchar(20)
	 */
	public function geteditor(){
		return $this->editor;
	}

	/**
	 * @return tagger - varchar(20)
	 */
	public function gettagger(){
		return $this->tagger;
	}

	/**
	 * @return recorder - varchar(20)
	 */
	public function getrecorder(){
		return $this->recorder;
	}

	/**
	 * @return description - varchar(800)
	 */
	public function getdescription(){
		return $this->description;
	}

	/**
	 * @return duration - int(11)
	 */
	public function getduration(){
		return $this->duration;
	}

	/**
	 * @return thumbnail - varchar(300)
	 */
	public function getthumbnail(){
		return $this->thumbnail;
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
	 * @param Type: int(10)
	 */
	public function setsplit($split){
		$this->split = $split;
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
	 * @param Type: varchar(11)
	 */
	public function setsuperCategory($superCategory){
		$this->superCategory = $superCategory;
	}

	/**
	 * @param Type: int(10)
	 */
	public function setauthor($author){
		$this->author = $author;
	}

	/**
	 * @param Type: varchar(20)
	 */
	public function seteditor($editor){
		$this->editor = $editor;
	}

	/**
	 * @param Type: varchar(20)
	 */
	public function settagger($tagger){
		$this->tagger = $tagger;
	}

	/**
	 * @param Type: varchar(20)
	 */
	public function setrecorder($recorder){
		$this->recorder = $recorder;
	}

	/**
	 * @param Type: varchar(800)
	 */
	public function setdescription($description){
		$this->description = $description;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setduration($duration){
		$this->duration = $duration;
	}

	/**
	 * @param Type: varchar(300)
	 */
	public function setthumbnail($thumbnail){
		$this->thumbnail = $thumbnail;
	}

    /**
     * Close mysql connection
     */
	public function endvideo(){
		$this->connection->CloseMysql();
	}

}