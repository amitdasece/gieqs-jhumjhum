<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 13-09-2020
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */
require_once 'DataBaseMysqlPDO.class.php';

Class usersTagging {

	private $id; //int(11)
	private $user_id; //int(11)
	private $video_id; //int(11)
	private $inviting_user; //int(11)
	private $invite_tag; //timestamp
	private $accept_tag; //timestamp
	private $review_tag; //timestamp
	private $done_tag; //timestamp
	private $decline_tag; //timestamp
	private $connection;

	public function __construct(){
		$this->connection = new DataBaseMysqlPDOLearning();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	public function New_usersTagging($user_id,$video_id,$inviting_user,$invite_tag,$accept_tag,$review_tag,$done_tag,$decline_tag){
		$this->user_id = $user_id;
		$this->video_id = $video_id;
		$this->inviting_user = $inviting_user;
		$this->invite_tag = $invite_tag;
		$this->accept_tag = $accept_tag;
		$this->review_tag = $review_tag;
		$this->done_tag = $done_tag;
		$this->decline_tag = $decline_tag;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from usersTagging where id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->id = $row["id"];
			$this->user_id = $row["user_id"];
			$this->video_id = $row["video_id"];
			$this->inviting_user = $row["inviting_user"];
			$this->invite_tag = $row["invite_tag"];
			$this->accept_tag = $row["accept_tag"];
			$this->review_tag = $row["review_tag"];
			$this->done_tag = $row["done_tag"];
			$this->decline_tag = $row["decline_tag"];
		}
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Load_records_limit_json($y, $x=0){
$q = "Select * from `usersTagging` LIMIT " . $x . ", " . $y;
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["user_id"] = $row["user_id"];
			$rowReturn[$x]["video_id"] = $row["video_id"];
			$rowReturn[$x]["inviting_user"] = $row["inviting_user"];
			$rowReturn[$x]["invite_tag"] = $row["invite_tag"];
			$rowReturn[$x]["accept_tag"] = $row["accept_tag"];
			$rowReturn[$x]["review_tag"] = $row["review_tag"];
			$rowReturn[$x]["done_tag"] = $row["done_tag"];
			$rowReturn[$x]["decline_tag"] = $row["decline_tag"];
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
$q = "Select * from `usersTagging` WHERE `id` = $key";
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["user_id"] = $row["user_id"];
			$rowReturn[$x]["video_id"] = $row["video_id"];
			$rowReturn[$x]["inviting_user"] = $row["inviting_user"];
			$rowReturn[$x]["invite_tag"] = $row["invite_tag"];
			$rowReturn[$x]["accept_tag"] = $row["accept_tag"];
			$rowReturn[$x]["review_tag"] = $row["review_tag"];
			$rowReturn[$x]["done_tag"] = $row["done_tag"];
			$rowReturn[$x]["decline_tag"] = $row["decline_tag"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    

        public function Load_records_limit_json_datatables($y, $x = 0)
            {
            $q = "Select * from `usersTagging` LIMIT $x, $y";
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
		$result = $this->connection->RunQuery("Select * from `usersTagging` where `id` = '$key_row' ");
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
		return $this->connection->TotalOfRows('usersTagging');
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
$q = "INSERT INTO `usersTagging` ($keys) VALUES ($keys2)";
		
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
$q = "UPDATE `usersTagging` SET $implodeArray WHERE `id` = '$this->id'";

		
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
		$result = $this->connection->RunQuery("DELETE FROM `usersTagging` WHERE `id` = $key_row");
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
		$result = $this->connection->RunQuery("SELECT id from usersTagging order by $column $order");
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
	 * @return user_id - int(11)
	 */
	public function getuser_id(){
		return $this->user_id;
	}

	/**
	 * @return video_id - int(11)
	 */
	public function getvideo_id(){
		return $this->video_id;
	}

	/**
	 * @return inviting_user - int(11)
	 */
	public function getinviting_user(){
		return $this->inviting_user;
	}

	/**
	 * @return invite_tag - timestamp
	 */
	public function getinvite_tag(){
		return $this->invite_tag;
	}

	/**
	 * @return accept_tag - timestamp
	 */
	public function getaccept_tag(){
		return $this->accept_tag;
	}

	/**
	 * @return review_tag - timestamp
	 */
	public function getreview_tag(){
		return $this->review_tag;
	}

	/**
	 * @return done_tag - timestamp
	 */
	public function getdone_tag(){
		return $this->done_tag;
	}

	/**
	 * @return decline_tag - timestamp
	 */
	public function getdecline_tag(){
		return $this->decline_tag;
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
	public function setuser_id($user_id){
		$this->user_id = $user_id;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setvideo_id($video_id){
		$this->video_id = $video_id;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setinviting_user($inviting_user){
		$this->inviting_user = $inviting_user;
	}

	/**
	 * @param Type: timestamp
	 */
	public function setinvite_tag($invite_tag){
		$this->invite_tag = $invite_tag;
	}

	/**
	 * @param Type: timestamp
	 */
	public function setaccept_tag($accept_tag){
		$this->accept_tag = $accept_tag;
	}

	/**
	 * @param Type: timestamp
	 */
	public function setreview_tag($review_tag){
		$this->review_tag = $review_tag;
	}

	/**
	 * @param Type: timestamp
	 */
	public function setdone_tag($done_tag){
		$this->done_tag = $done_tag;
	}

	/**
	 * @param Type: timestamp
	 */
	public function setdecline_tag($decline_tag){
		$this->decline_tag = $decline_tag;
	}

    /**
     * Close mysql connection
     */
	public function endusersTagging(){
		$this->connection->CloseMysql();
	}

}