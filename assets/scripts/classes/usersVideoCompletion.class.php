<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 6-01-2021
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */


if ($_SESSION['debug'] == true){

error_reporting(E_ALL);

}else{

error_reporting(0);
	
}

Class usersVideoCompletion {

	private $id; //int(11)
	private $user_id; //int(11)
	private $complete; //varchar(50)
	private $pre_complete; //varchar(50)
	private $post_complete; //varchar(50)
	private $pre_score; //varchar(50)
	private $post_score; //varchar(50)
	private $connection;
   
    public function __construct(){
        require_once 'DatabaseMyssqlPDOLearning.class.php';
        $this->connection = new DataBaseMysqlPDOLearning();
       
}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	public function New_usersVideoCompletion($user_id,$complete,$pre_complete,$post_complete,$pre_score,$post_score){
		$this->user_id = $user_id;
		$this->complete = $complete;
		$this->pre_complete = $pre_complete;
		$this->post_complete = $post_complete;
		$this->pre_score = $pre_score;
		$this->post_score = $post_score;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from usersVideoCompletion where id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->id = $row["id"];
			$this->user_id = $row["user_id"];
			$this->complete = $row["complete"];
			$this->pre_complete = $row["pre_complete"];
			$this->post_complete = $row["post_complete"];
			$this->pre_score = $row["pre_score"];
			$this->post_score = $row["post_score"];
		}
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Load_records_limit_json($y, $x=0){
$q = "Select * from `usersVideoCompletion` LIMIT " . $x . ", " . $y;
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["user_id"] = $row["user_id"];
			$rowReturn[$x]["complete"] = $row["complete"];
			$rowReturn[$x]["pre_complete"] = $row["pre_complete"];
			$rowReturn[$x]["post_complete"] = $row["post_complete"];
			$rowReturn[$x]["pre_score"] = $row["pre_score"];
			$rowReturn[$x]["post_score"] = $row["post_score"];
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
$q = "Select * from `usersVideoCompletion` WHERE `id` = $key";
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["user_id"] = $row["user_id"];
			$rowReturn[$x]["complete"] = $row["complete"];
			$rowReturn[$x]["pre_complete"] = $row["pre_complete"];
			$rowReturn[$x]["post_complete"] = $row["post_complete"];
			$rowReturn[$x]["pre_score"] = $row["pre_score"];
			$rowReturn[$x]["post_score"] = $row["post_score"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    

        public function Load_records_limit_json_datatables($y, $x = 0)
            {
            $q = "Select * from `usersVideoCompletion` LIMIT $x, $y";
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
		$result = $this->connection->RunQuery("Select * from `usersVideoCompletion` where `id` = '$key_row' ");
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
		return $this->connection->TotalOfRows('usersVideoCompletion');
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
$q = "INSERT INTO `usersVideoCompletion` ($keys) VALUES ($keys2)";
		
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
$q = "UPDATE `usersVideoCompletion` SET $implodeArray WHERE `id` = '$this->id'";

		
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
		$result = $this->connection->RunQuery("DELETE FROM `usersVideoCompletion` WHERE `id` = $key_row");
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
		$result = $this->connection->RunQuery("SELECT id from usersVideoCompletion order by $column $order");
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
	 * @return complete - varchar(50)
	 */
	public function getcomplete(){
		return $this->complete;
	}

	/**
	 * @return pre_complete - varchar(50)
	 */
	public function getpre_complete(){
		return $this->pre_complete;
	}

	/**
	 * @return post_complete - varchar(50)
	 */
	public function getpost_complete(){
		return $this->post_complete;
	}

	/**
	 * @return pre_score - varchar(50)
	 */
	public function getpre_score(){
		return $this->pre_score;
	}

	/**
	 * @return post_score - varchar(50)
	 */
	public function getpost_score(){
		return $this->post_score;
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
	 * @param Type: varchar(50)
	 */
	public function setcomplete($complete){
		$this->complete = $complete;
	}

	/**
	 * @param Type: varchar(50)
	 */
	public function setpre_complete($pre_complete){
		$this->pre_complete = $pre_complete;
	}

	/**
	 * @param Type: varchar(50)
	 */
	public function setpost_complete($post_complete){
		$this->post_complete = $post_complete;
	}

	/**
	 * @param Type: varchar(50)
	 */
	public function setpre_score($pre_score){
		$this->pre_score = $pre_score;
	}

	/**
	 * @param Type: varchar(50)
	 */
	public function setpost_score($post_score){
		$this->post_score = $post_score;
	}

    /**
     * Close mysql connection
     */
	public function endusersVideoCompletion(){
		$this->connection->CloseMysql();
	}

}