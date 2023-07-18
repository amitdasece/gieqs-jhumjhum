<?php

require_once 'DataBaseMysql.class.php';



//spl_autoload_unregister ('class_loader');
		
		//require('/Applications/XAMPP/xamppfiles/htdocs/dashboard/learning/scripts/autoload.php');
		//use Vimeo\Vimeo;

class helpers {


	public $connection;

	public function __construct (){
		$this->connection = new DataBaseMysql();
	}

	

	 public function formIterator ($iterationForm, $tableNameSheet){

		$q = "SELECT `Name`, `Type`, `textType`, `Value1`, `Value2`, `Text`, `Message_t` FROM `$tableNameSheet` WHERE position=".$iterationForm." AND Type IS NOT NULL ORDER BY `Order` ASC";
		//echo $q;
		$result = $this->connection->RunQuery($q);
		//print_r($result);

		
		$returnArray = array();

		if ($result){
			while ($row = $result->fetch_array(MYSQLI_ASSOC)){

				$returnArray[] = $row;

			}
			return $returnArray;
		}

		


	 }

	 public function formIteratorWeight ($iterationForm, $tableNameSheet){

		$q = "SELECT `Name`, `Type`, `textType`, `Value1`, `Value2`, `Text`, `Message_t`, `Weight`, `ForVideo`, `AlwaysRequired`, `RequiredIfCondition`, `Condition` FROM `$tableNameSheet` WHERE position=".$iterationForm." AND Type IS NOT NULL ORDER BY `Order` ASC";
		//echo $q;
		$result = $this->connection->RunQuery($q);
		//print_r($result);

		
		$returnArray = array();

		if ($result){
			while ($row = $result->fetch_array(MYSQLI_ASSOC)){

				$returnArray[] = $row;

			}
			return $returnArray;
		}

		


	 }

	 public function getValueText($svalue1, $requiredIndex, $tableNameValues){

		$q = "SELECT `".$svalue1."_t` FROM `$tableNameValues` WHERE `".$svalue1."` = ".$requiredIndex."";
		//echo $q;
		$result = $this->connection->RunQuery($q);
		//print_r($result);

		$returnString = "";

		if ($result){
			while($row = $result->fetch_array(MYSQLI_ASSOC)){



				$returnString .= $row[$svalue1 . '_t'];
				
			
			}
		}

		return $returnString;

	 }


	 //database manipulations

	 //update orders in pageLayout file
	 public function editValuesPosition(){

		for($x = 11; $x >= 5; $x=$x-1) {

			$y = $x + 1;

			//echo $y;

			$q = "UPDATE `pageLayoutPOEM` SET `Position` = '$y' WHERE `Position` = $x";

			//echo $q;

			//$result = $this->connection->RunQuery($q);
		
			print_r($result);

			if ($result == 1){
				
				echo $q . ' update performed <br/><br/>';

			}
			
		
		}

		
		
		

		//return $returnString;

	 }	
	 
	 public function insert_a_space($database, $position, $insert_at){

		//GET ARRAY OF THE ORDERRS AT THAT POSITION

		$q = "SELECT `Order` FROM `$database` WHERE `position`='$position' ORDER BY `Order` ASC";
		//echo $q;
		$result = $this->connection->RunQuery($q);
		//print_r($result);

		
		$returnArray = array();

		if ($result){
			while ($row = $result->fetch_array(MYSQLI_ASSOC)){

				$returnArray[] = $row['Order'];

			}
			
		}

		//GET THE LAST VALUE OF THE ARRAY

		print_r($returnArray);

		echo $lastValue = end($returnArray);

		//echo 'hello';

		//USE IT BELOW

		

		for($x = $lastValue; $x >= $insert_at; $x=$x-1) {

			$y = $x + 1;

			//echo $y;

			$q = "UPDATE `$database` SET `Order` = '$y' WHERE `Position` = '$position' AND `Order` = $x";

			//echo $q;

			$result = $this->connection->RunQuery($q);
		
			//print_r($result);

			if ($result){
				
				echo $q . ' update performed <br/><br/>';

			}
			
		
		}

		
		
		

		//return $returnString;

	 }	

	 public function updateToVARCHAR($arrayFieldNames){

		foreach($arrayFieldNames as $key=>$value) {

			

			//echo $y;

			$q = "ALTER TABLE `POEM` CHANGE `$value` `$value` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;";

			//echo $q;

			$result = $this->connection->RunQuery($q);
		
			print_r($result);

			if ($result == 1){
				
				echo $q . ' update performed <br/><br/>';

			}else{

				echo $q . ' update NOT performed <br/><br/>';
			}
			
		
		}

		
		
		

		//return $returnString;

     }	
     
     public function endHelpers (){

		$this->connection->CloseMysql();


	}


}



?>