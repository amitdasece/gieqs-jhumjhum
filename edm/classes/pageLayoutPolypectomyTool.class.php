<?php
/*
 * Author: David Tate  - www.endoscopy.wiki 
 * 
 * Create Date: 30-10-2019
 * 
 * DJT 2019
 * 
 * License: LGPL 
 * 
 */
require_once 'DataBaseMysqlPDO.class.php';

Class pageLayoutPolypectomyTool {

	private $id; //int(11)
	private $?Number; //varchar(10)
	private $Name; //varchar(26)
	private $Position; //int(2)
	private $Order; //int(3)
	private $Type; //int(1)
	private $textType; //int(1)
	private $Value1; //varchar(25)
	private $Value2; //varchar(27)
	private $Weight; //int(1)
	private $Value3; //varchar(32)
	private $Value4; //varchar(37)
	private $Text; //varchar(242)
	private $Link; //varchar(10)
	private $Message_t; //varchar(17)
	private $ForVideo; //int(1)
	private $SelectMultiple; //int(1)
	private $AlwaysRequired; //int(1)
	private $RequiredIfCondition; //int(1)
	private $Condition; //varchar(17)
	private $T; //varchar(11)
	private $connection;

	public function __construct(){
		$this->connection = new DataBaseMysqlPDOEDM();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_pageLayoutPolypectomyTool($?Number,$Name,$Position,$Order,$Type,$textType,$Value1,$Value2,$Weight,$Value3,$Value4,$Text,$Link,$Message_t,$ForVideo,$SelectMultiple,$AlwaysRequired,$RequiredIfCondition,$Condition,$T){
		$this->?Number = $?Number;
		$this->Name = $Name;
		$this->Position = $Position;
		$this->Order = $Order;
		$this->Type = $Type;
		$this->textType = $textType;
		$this->Value1 = $Value1;
		$this->Value2 = $Value2;
		$this->Weight = $Weight;
		$this->Value3 = $Value3;
		$this->Value4 = $Value4;
		$this->Text = $Text;
		$this->Link = $Link;
		$this->Message_t = $Message_t;
		$this->ForVideo = $ForVideo;
		$this->SelectMultiple = $SelectMultiple;
		$this->AlwaysRequired = $AlwaysRequired;
		$this->RequiredIfCondition = $RequiredIfCondition;
		$this->Condition = $Condition;
		$this->T = $T;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from pageLayoutPolypectomyTool where id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->id = $row["id"];
			$this->?Number = $row["?Number"];
			$this->Name = $row["Name"];
			$this->Position = $row["Position"];
			$this->Order = $row["Order"];
			$this->Type = $row["Type"];
			$this->textType = $row["textType"];
			$this->Value1 = $row["Value1"];
			$this->Value2 = $row["Value2"];
			$this->Weight = $row["Weight"];
			$this->Value3 = $row["Value3"];
			$this->Value4 = $row["Value4"];
			$this->Text = $row["Text"];
			$this->Link = $row["Link"];
			$this->Message_t = $row["Message_t"];
			$this->ForVideo = $row["ForVideo"];
			$this->SelectMultiple = $row["SelectMultiple"];
			$this->AlwaysRequired = $row["AlwaysRequired"];
			$this->RequiredIfCondition = $row["RequiredIfCondition"];
			$this->Condition = $row["Condition"];
			$this->T = $row["T"];
		}
	}

    /**
     * Checks if the specified record exists
     *
     * @param key_table_type $key_row
     *
     */
	public function matchRecord($key_row){
		$result = $this->connection->RunQuery("Select * from pageLayoutPolypectomyTool where id = \'$key_row\' ");
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
		return $this->connection->TotalOfRows('pageLayoutPolypectomyTool');
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
$q = "INSERT INTO `pageLayoutPolypectomyTool` ($keys) VALUES ($keys2)";
		
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
$q = "UPDATE `pageLayoutPolypectomyTool` SET $implodeArray WHERE `id` = '$this->id'";

		
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
		$this->connection->RunQuery("DELETE FROM pageLayoutPolypectomyTool WHERE id = $key_row");
		$result->rowCount();
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT id from pageLayoutPolypectomyTool order by $column $order");
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
	 * @return ?Number - varchar(10)
	 */
	public function get?Number(){
		return $this->?Number;
	}

	/**
	 * @return Name - varchar(26)
	 */
	public function getName(){
		return $this->Name;
	}

	/**
	 * @return Position - int(2)
	 */
	public function getPosition(){
		return $this->Position;
	}

	/**
	 * @return Order - int(3)
	 */
	public function getOrder(){
		return $this->Order;
	}

	/**
	 * @return Type - int(1)
	 */
	public function getType(){
		return $this->Type;
	}

	/**
	 * @return textType - int(1)
	 */
	public function gettextType(){
		return $this->textType;
	}

	/**
	 * @return Value1 - varchar(25)
	 */
	public function getValue1(){
		return $this->Value1;
	}

	/**
	 * @return Value2 - varchar(27)
	 */
	public function getValue2(){
		return $this->Value2;
	}

	/**
	 * @return Weight - int(1)
	 */
	public function getWeight(){
		return $this->Weight;
	}

	/**
	 * @return Value3 - varchar(32)
	 */
	public function getValue3(){
		return $this->Value3;
	}

	/**
	 * @return Value4 - varchar(37)
	 */
	public function getValue4(){
		return $this->Value4;
	}

	/**
	 * @return Text - varchar(242)
	 */
	public function getText(){
		return $this->Text;
	}

	/**
	 * @return Link - varchar(10)
	 */
	public function getLink(){
		return $this->Link;
	}

	/**
	 * @return Message_t - varchar(17)
	 */
	public function getMessage_t(){
		return $this->Message_t;
	}

	/**
	 * @return ForVideo - int(1)
	 */
	public function getForVideo(){
		return $this->ForVideo;
	}

	/**
	 * @return SelectMultiple - int(1)
	 */
	public function getSelectMultiple(){
		return $this->SelectMultiple;
	}

	/**
	 * @return AlwaysRequired - int(1)
	 */
	public function getAlwaysRequired(){
		return $this->AlwaysRequired;
	}

	/**
	 * @return RequiredIfCondition - int(1)
	 */
	public function getRequiredIfCondition(){
		return $this->RequiredIfCondition;
	}

	/**
	 * @return Condition - varchar(17)
	 */
	public function getCondition(){
		return $this->Condition;
	}

	/**
	 * @return T - varchar(11)
	 */
	public function getT(){
		return $this->T;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setid($id){
		$this->id = $id;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function set?Number($?Number){
		$this->?Number = $?Number;
	}

	/**
	 * @param Type: varchar(26)
	 */
	public function setName($Name){
		$this->Name = $Name;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setPosition($Position){
		$this->Position = $Position;
	}

	/**
	 * @param Type: int(3)
	 */
	public function setOrder($Order){
		$this->Order = $Order;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setType($Type){
		$this->Type = $Type;
	}

	/**
	 * @param Type: int(1)
	 */
	public function settextType($textType){
		$this->textType = $textType;
	}

	/**
	 * @param Type: varchar(25)
	 */
	public function setValue1($Value1){
		$this->Value1 = $Value1;
	}

	/**
	 * @param Type: varchar(27)
	 */
	public function setValue2($Value2){
		$this->Value2 = $Value2;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setWeight($Weight){
		$this->Weight = $Weight;
	}

	/**
	 * @param Type: varchar(32)
	 */
	public function setValue3($Value3){
		$this->Value3 = $Value3;
	}

	/**
	 * @param Type: varchar(37)
	 */
	public function setValue4($Value4){
		$this->Value4 = $Value4;
	}

	/**
	 * @param Type: varchar(242)
	 */
	public function setText($Text){
		$this->Text = $Text;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setLink($Link){
		$this->Link = $Link;
	}

	/**
	 * @param Type: varchar(17)
	 */
	public function setMessage_t($Message_t){
		$this->Message_t = $Message_t;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setForVideo($ForVideo){
		$this->ForVideo = $ForVideo;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setSelectMultiple($SelectMultiple){
		$this->SelectMultiple = $SelectMultiple;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setAlwaysRequired($AlwaysRequired){
		$this->AlwaysRequired = $AlwaysRequired;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setRequiredIfCondition($RequiredIfCondition){
		$this->RequiredIfCondition = $RequiredIfCondition;
	}

	/**
	 * @param Type: varchar(17)
	 */
	public function setCondition($Condition){
		$this->Condition = $Condition;
	}

	/**
	 * @param Type: varchar(11)
	 */
	public function setT($T){
		$this->T = $T;
	}

    /**
     * Close mysql connection
     */
	public function endpageLayoutPolypectomyTool(){
		$this->connection->CloseMysql();
	}

}