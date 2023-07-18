<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 1-12-2020
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */

if (session_status() == PHP_SESSION_NONE) { //if there's no session_start yet...
  session_start(); //do this
}

if ($_SESSION){

if ($_SESSION['debug'] == true){

error_reporting(E_ALL);

}else{

error_reporting(0);

}
}



Class blogs {

	private $id; //int(11)
	private $blog_id; //varchar(200)
	private $name; //varchar(200)
	private $subject; //varchar(800)
	private $preheader; //varchar(800)
	private $active; //varchar(11)
	private $audience; //varchar(11)
	private $audience_specify; //varchar(1000)
    private $author; //varchar(11)
	private $created; //timestamp
	private $updated; //timestamp
	private $featured; //varchar(11)
	private $connection;

	public function __construct(){
    require_once 'DatabaseMyssqlPDOLearning.class.php';
        $this->connection = new DataBaseMysqlPDOLearning();

       

		//$this->connection = new DataBaseMysqlPDO();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	public function New_blogs($blog_id,$name,$subject,$preheader,$active,$audience,$audience_specify,$author,$created,$updated,$featured){
		$this->blog_id = $blog_id;
		$this->name = $name;
		$this->subject = $subject;
		$this->preheader = $preheader;
		$this->active = $active;
		$this->audience = $audience;
		$this->audience_specify = $audience_specify;
		$this->author = $author;
		$this->created = $created;
		$this->updated = $updated;
		$this->featured = $featured;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from blogs where id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->id = $row["id"];
			$this->blog_id = $row["blog_id"];
			$this->name = $row["name"];
			$this->subject = $row["subject"];
			$this->preheader = $row["preheader"];
			$this->active = $row["active"];
			$this->audience = $row["audience"];
			$this->audience_specify = $row["audience_specify"];
			$this->author = $row["author"];
			$this->created = $row["created"];
			$this->updated = $row["updated"];
			$this->featured = $row["featured"];
		}
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Load_records_limit_json($y, $x=0){
$q = "Select * from `blogs` LIMIT " . $x . ", " . $y;
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["blog_id"] = $row["blog_id"];
			$rowReturn[$x]["name"] = $row["name"];
			$rowReturn[$x]["subject"] = $row["subject"];
			$rowReturn[$x]["preheader"] = $row["preheader"];
			$rowReturn[$x]["active"] = $row["active"];
			$rowReturn[$x]["audience"] = $row["audience"];
			$rowReturn[$x]["audience_specify"] = $row["audience_specify"];
			$rowReturn[$x]["author"] = $row["author"];
			$rowReturn[$x]["created"] = $row["created"];
			$rowReturn[$x]["updated"] = $row["updated"];
			$rowReturn[$x]["featured"] = $row["featured"];
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
$q = "Select * from `blogs` WHERE `id` = $key";
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["blog_id"] = $row["blog_id"];
			$rowReturn[$x]["name"] = $row["name"];
			$rowReturn[$x]["subject"] = $row["subject"];
			$rowReturn[$x]["preheader"] = $row["preheader"];
			$rowReturn[$x]["active"] = $row["active"];
			$rowReturn[$x]["audience"] = $row["audience"];
			$rowReturn[$x]["audience_specify"] = $row["audience_specify"];
			$rowReturn[$x]["author"] = $row["author"];
			$rowReturn[$x]["created"] = $row["created"];
			$rowReturn[$x]["updated"] = $row["updated"];
			$rowReturn[$x]["featured"] = $row["featured"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    

        public function Load_records_limit_json_datatables($y, $x = 0)
            {
            $q = "Select * from `blogs` LIMIT $x, $y";
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
		$result = $this->connection->RunQuery("Select * from `blogs` where `id` = '$key_row' ");
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
		return $this->connection->TotalOfRows('blogs');
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
$q = "INSERT INTO `blogs` ($keys) VALUES ($keys2)";

		
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
$q = "UPDATE `blogs` SET $implodeArray WHERE `id` = '$this->id'";

		
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
		$result = $this->connection->RunQuery("DELETE FROM `blogs` WHERE `id` = $key_row");
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
		$result = $this->connection->RunQuery("SELECT id from blogs order by $column $order");
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
	 * @return blog_id - varchar(200)
	 */
	public function getblog_id(){
		return $this->blog_id;
	}

	/**
	 * @return name - varchar(2000)
	 */
	public function getname(){
		return $this->name;
	}

	/**
	 * @return subject - varchar(800)
	 */
	public function getsubject(){
		return $this->subject;
	}

	/**
	 * @return preheader - varchar(2000)
	 */
	public function getpreheader(){
		return $this->preheader;
	}

	/**
	 * @return active - varchar(11)
	 */
	public function getactive(){
		return $this->active;
	}

	/**
	 * @return audience - varchar(11)
	 */
	public function getaudience(){
		return $this->audience;
	}

	/**
	 * @return audience_specify - varchar(1000)
	 */
	public function getaudience_specify(){
		return $this->audience_specify;
	}

	/**
	 * @return author - varchar(11)
	 */
	public function getauthor(){
		return $this->author;
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
	 * @return featured - varchar(11)
	 */
	public function getfeatured(){
		return $this->featured;
	}


	/**
	 * @param Type: int(11)
	 */
	public function setid($id){
		$this->id = $id;
	}

	/**
	 * @param Type: varchar(200)
	 */
	public function setblog_id($blog_id){
		$this->blog_id = $blog_id;
	}

	/**
	 * @param Type: varchar(2000)
	 */
	public function setname($name){
		$this->name = $name;
	}

	/**
	 * @param Type: varchar(800)
	 */
	public function setsubject($subject){
		$this->subject = $subject;
	}

	/**
	 * @param Type: varchar(2000)
	 */
	public function setpreheader($preheader){
		$this->preheader = $preheader;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setactive($active){
		$this->active = $active;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setaudience($audience){
		$this->audience = $audience;
	}

	/**
	 * @param Type: varchar(1000)
	 */
	public function setaudience_specify($audience_specify){
		$this->audience_specify = $audience_specify;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setauthor($author){
		$this->author = $author;
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
	public function setfeatured($featured){
		$this->featured = $featured;
	}


    /**
     * Close mysql connection
     */
	public function endblogs(){
		$this->connection->CloseMysql();
	}

}