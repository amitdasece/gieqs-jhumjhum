<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 26-10-2020
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */
//error_reporting(E_ALL);

require_once 'DataBaseMysqlPDO.class.php';


Class subscriptions {

	private $id; //int(11)
	private $user_id; //int(11)
	private $asset_id; //int(11)
	private $start_date; //timestamp
	private $expiry_date; //timestamp
	private $active; //varchar(50)
	private $auto_renew; //varchar(11)
	private $gateway_transactionId; //varchar(100)
	private $connection;

	public function __construct(){
        require_once 'DatabaseMyssqlPDOLearning.class.php';
		$this->connection = new DataBaseMysqlPDOLearning();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	public function New_subscriptions($user_id,$asset_id,$start_date,$expiry_date,$active,$auto_renew,$gateway_transactionId){
		$this->user_id = $user_id;
		$this->asset_id = $asset_id;
		$this->start_date = $start_date;
		$this->expiry_date = $expiry_date;
		$this->active = $active;
		$this->auto_renew = $auto_renew;
		$this->gateway_transactionId = $gateway_transactionId;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from subscriptions where id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->id = $row["id"];
			$this->user_id = $row["user_id"];
			$this->asset_id = $row["asset_id"];
			$this->start_date = $row["start_date"];
			$this->expiry_date = $row["expiry_date"];
			$this->active = $row["active"];
			$this->auto_renew = $row["auto_renew"];
			$this->gateway_transactionId = $row["gateway_transactionId"];
		}
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Load_records_limit_json($y, $x=0){
$q = "Select * from `subscriptions` LIMIT " . $x . ", " . $y;
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["user_id"] = $row["user_id"];
			$rowReturn[$x]["asset_id"] = $row["asset_id"];
			$rowReturn[$x]["start_date"] = $row["start_date"];
			$rowReturn[$x]["expiry_date"] = $row["expiry_date"];
			$rowReturn[$x]["active"] = $row["active"];
			$rowReturn[$x]["auto_renew"] = $row["auto_renew"];
			$rowReturn[$x]["gateway_transactionId"] = $row["gateway_transactionId"];
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
$q = "Select * from `subscriptions` WHERE `id` = $key";
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["user_id"] = $row["user_id"];
			$rowReturn[$x]["asset_id"] = $row["asset_id"];
			$rowReturn[$x]["start_date"] = $row["start_date"];
			$rowReturn[$x]["expiry_date"] = $row["expiry_date"];
			$rowReturn[$x]["active"] = $row["active"];
			$rowReturn[$x]["auto_renew"] = $row["auto_renew"];
			$rowReturn[$x]["gateway_transactionId"] = $row["gateway_transactionId"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    

        public function Load_records_limit_json_datatables($y, $x = 0)
            {
            $q = "Select * from `subscriptions` LIMIT $x, $y";
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
	public function matchRecord($key_row, $debug=false){
		
		
		$q = "Select * from `subscriptions` where `id` = '$key_row' ";
		$result = $this->connection->RunQuery($q);
		if ($debug){
		
		echo $q;

		}
		$nRows = $result->rowCount();

		
			if ($nRows == 1){
				if ($debug){

				echo 'result is true';

				}
				return TRUE;
			}else{
				return FALSE;
			}
	}

    /**
		* Return the number of rows
		*/
	public function numberOfRows(){
		return $this->connection->TotalOfRows('subscriptions');
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
$q = "INSERT INTO `subscriptions` ($keys) VALUES ($keys2)";
		
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
$q = "UPDATE `subscriptions` SET $implodeArray WHERE `id` = '$this->id'";

		
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
		$result = $this->connection->RunQuery("DELETE FROM `subscriptions` WHERE `id` = $key_row");
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
		$result = $this->connection->RunQuery("SELECT id from subscriptions order by $column $order");
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
	 * @return asset_id - int(11)
	 */
	public function getasset_id(){
		return $this->asset_id;
	}

	/**
	 * @return start_date - timestamp
	 */
	public function getstart_date(){
		return $this->start_date;
	}

	/**
	 * @return expiry_date - timestamp
	 */
	public function getexpiry_date(){
		return $this->expiry_date;
	}

	/**
	 * @return active - varchar(50)
	 */
	public function getactive(){
		return $this->active;
	}

	/**
	 * @return auto_renew - varchar(11)
	 */
	public function getauto_renew(){
		return $this->auto_renew;
	}

	/**
	 * @return gateway_transactionId - varchar(100)
	 */
	public function getgateway_transactionId(){
		return $this->gateway_transactionId;
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
	public function setasset_id($asset_id){
		$this->asset_id = $asset_id;
	}

	/**
	 * @param Type: timestamp
	 */
	public function setstart_date($start_date){
		$this->start_date = $start_date;
	}

	/**
	 * @param Type: timestamp
	 */
	public function setexpiry_date($expiry_date){
		$this->expiry_date = $expiry_date;
	}

	/**
	 * @param Type: varchar(50)
	 */
	public function setactive($active){
		$this->active = $active;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setauto_renew($auto_renew){
		$this->auto_renew = $auto_renew;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setgateway_transactionId($gateway_transactionId){
		$this->gateway_transactionId = $gateway_transactionId;
	}

    /**
     * Close mysql connection
     */
	public function endsubscriptions(){
		$this->connection->CloseMysql();
	}

}