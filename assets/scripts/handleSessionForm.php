<?php
//error_reporting(E_ALL);
//;
$openaccess = 1;
//echo 'hello';
//$requiredUserLevel = 4;
require ('../../assets/includes/config.inc.php');		
//echo 'hello2';
require (BASE_URI.'/assets/scripts/headerScript.php');

//echo 'hello3';sss
$general = new general;
//echo 'hello4';




function ne($v) {
    return $v != '';
}

//$connection = new DataBaseMysql();

//required GET variables  table, query, fieldsToGetObject, outputFormat

//e.g. with table

//1 jsonm
//2 table
//3 check data value exists
//4 check multiple values exist

/*

	http://localhost:90/dashboard/esd/scripts/masterAjaxDataReturnQuery.php?table=tags&outputFormat=2&Identifier%5C=id&1=tagName

	as shown the table header can be specified as the first part of the data string

*/

$data = json_decode(file_get_contents('php://input'), true);

//print_r($data);

//check count of get variables

if (count($data) > 0){

	//$data = $general->sanitiseGET($data);

	/*foreach ($data as $key=>$value){

		$GLOBALS[$key] = $value;

	}*/

	//print_r($GLOBALS);
	//print_r($data);

	if (!isset($data['table'])){

		echo 'Table key not set';
		exit();

	}else{

		$table = $data['table'];

	}



	eval('$esdLesion = new ' . $table . ';');

	if (!isset($data['update'])){

		echo 'Update key not set';
		exit();

	}else{

		$update = $data['update'];
		$identifierKey = $data['identifierKey'];
		$identifier = $data['identifier'];

	}

	if ($update == 1){
		
		if (!isset($identifierKey) || !isset($identifier)){
		
		echo 'Update identifier key not set';
		exit();	
		
		}
		
		if (!ne($identifierKey) || !ne($identifier)){
			
			exit();
			
		}
		
	}
	
	if ($update == 2){
		
		if (!isset($identifierKey) || !isset($identifier)){
		
		echo 'Update identifier key not set';
		exit();	
		
		}
		
		
	}
	
	//split name field into two
	
	
	
	//print_r($data);
	
	
	
	
	//print_r($keys);
	//print_r($values);
	
	//echo $hello;
	
	
	function rempty ($var)
	{
		return !($var == "" || $var == null);
	}
	
	
	
	// if a new field
	
	if ($update == 0){
		
		unset($data['update']);
		unset($data['table']);
		unset($data['identifierKey']);
		unset($data['identifier']);
		
		/*foreach ($data as $key=>$value){
			
			if ($value == ''){
				
				$data[$key] = 'NULL';
				
			}
			
		}*/

		

		// print_r($data);

		$data = array_filter($data, 'rempty');

		$values = implode('\', \'', $data);
		$keys = array_keys($data);
		/*foreach ($keys as $key => $value) {
			if ($value == ''){

				$value = 'NULL';

			}
		}*/

		// print_r($keys);

        
        //interact with the class

        //set the required features

        $log = array();

        foreach ($data as $key=>$value){

            $targetStatement = '$esdLesion->set' . $key . '("' . $value . '");';
            //echo $targetStatement;
            
            try {
              
                eval($targetStatement);
            
            }
            catch(Exception $e){

                $log[] = $e . 'could not be evaluated';

            }
            

        }

        echo $esdLesion->prepareStatementPDO();



	
		
		
		
	}else if ($update == 1){
		
		//if this is an update check the id field exists

		//$q = "SELECT `$identifierKey` FROM `$table` WHERE `$identifierKey` = $identifier";
		
		//echo $q;
        
        if ($esdLesion->matchRecord($identifier)){

            
            $esdLesion->Load_from_key($identifier);

			unset($data['update']);
			unset($data['identifierKey']);
			unset($data['identifier']);
			unset($data['table']);

            $data = array_filter($data, 'rempty'); //change
            
            $log = array();

            //load the original record from key

            

        foreach ($data as $key=>$value){

            $targetStatement = '$esdLesion->set' . $key . '("' . $value . '");';
            //echo $targetStatement;
            
            try {
              
                eval($targetStatement);
            
            }
            catch(Exception $e){

                $log[] = $e . 'could not be evaluated';

            }
            

        }

        echo $esdLesion->prepareStatementPDOUpdate();
			
			//note expecting 0 or 1
			
			//use returnYesNoDBQuery for this query
			
		}else{
			
			echo 'Invalid identifier or identifier key passed';
			
		}

		//print_r($log);
		
		
	}else if ($update == 2){
		
		//if this is a delete check the id field exists
		
		//echo 'delete entererd';
		//$q = "SELECT `$identifierKey` FROM `$table` WHERE `$identifierKey` = $identifier";
		
		//echo $q;
		
		if ($esdLesion->matchRecord($identifier)){
			
            
            echo $esdLesion->Delete_row_from_key($identifier);
            
			
			
		}else{
			
			echo 'Invalid identifier or identifier key passed';
			
		}
		
		
	}
	
	
	
	
	
	
	//remove the preset global variables
	
	foreach ($data as $key=>$value){
		
		unset($GLOBALS[$key]);
	
		
	}

}else{
	
	echo 'No variables passed';
	exit();
	
}

$general->endGeneral();
eval('$esdLesion->end' . $table . '();');





