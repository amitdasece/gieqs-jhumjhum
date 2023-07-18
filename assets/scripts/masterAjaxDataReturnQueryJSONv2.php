<?php

header('Access-Control-Allow-Origin: *');
$openaccess = 1;
//echo 'hello';
//$requiredUserLevel = 4;
require ('../../assets/includes/config.inc.php');		
//echo 'hello2';
require (BASE_URI.'/assets/scripts/headerScript.php');

//echo 'hello3';sss
$general = new general;
$userFunctions = new userFunctions;
//echo 'hello4';




function ne($v) {
    return $v != '';
}



$debug = false;
//error_reporting(E_ALL);

//echo 'hello';

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

if ($debug){

print_r($data);

}

//check count of get variables

if (count($data) > 0){

	//$data = $general->sanitiseGET($data);

	/*foreach ($data as $key=>$value){

		$GLOBALS[$key] = $value;

	}*/

	if ($debug){
	print_r($GLOBALS);
	print_r($data);
	}

	if (!isset($data['table'])){

		echo 'Table key not set';
		exit();

	}else{

		$table = $data['table'];

	}



	eval('$esdLesion = new ' . $table . ';');

	if ($debug){

		echo '$esdLesion = new ' . $table . ';';

	}

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
		

		if ($data['table'] == 'users'){

			$desiredUserName = $data['email'];
    
			$userExists = $userFunctions->userExists($desiredUserName);
			
			if ($userExists){

				echo 'User NOT CREATED.  Username already exists';
				exit();

			}

		}

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

		// print_r($keys); TODO make hashing work here

		/* function hash_password($password, $salt) {
			$salted_password = substr($password, 0, 4) . $salt . substr($password, 4);
			return hash('sha512', $salted_password);} */

		//transform a password field

		/* if ($table == 'users'){

			$data['password'] = hash_password($data['password'], 'westmead');

		} */
        
        //interact with the class

        //set the required features

        $log = array();

        foreach ($data as $key=>$value){

            $targetStatement = '$esdLesion->set' . $key . '("' . $value . '");';
			
			if ($debug){
			echo $targetStatement;
			}
            
            try {
              
                eval($targetStatement);
            
            }
            catch(Exception $e){

                $log[] = $e . 'could not be evaluated';

            }
            

        }

        echo $esdLesion->prepareStatementPDO();

		if ($debug){

			print_r($log);

		}

	
		
		
		
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

            $data = array_filter($data, 'rempty'); //change CONSIDER IMPACT TODO
            
            $log = array();

			$log[] = $data;

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
		if ($debug){

			print_r($log);

		}

		
		
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
		
		
	}else if ($update == 3){
		
		//if this is a delete check the id field exists
		//then copy to historical database
		
		//echo 'delete entererd';
		//$q = "SELECT `$identifierKey` FROM `$table` WHERE `$identifierKey` = $identifier";
		
		//echo $q;
		
		if ($esdLesion->matchRecord($identifier)){

			if ($general->check_login($data['email'], $data['password'])){
			
			//archive the table //TODO future make this explicit per class
			
			$general->archiveTableRow($table, $identifier);


            echo $esdLesion->Delete_row_from_key($identifier);
			
			}else{

				echo '3';
			}
			
			
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

if ($debug){


	var_dump($log);
}





