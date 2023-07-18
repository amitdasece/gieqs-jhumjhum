<?php
	
	$openaccess = 0;
	$requiredUserLevel = 4;
	require ('../../includes/config.inc.php');		
	require (BASE_URI1.'/scripts/headerScript.php');

$general = new general;



function ne($v) {
    return $v != '';
}

//required GET variables  update, identifierKey, identifier, table

// update 0 INSERT INTO

// update 1 UPDATE

// update 2 DELETE


//check count of get variables

if (count($_GET) > 0){

	


	
	//sanitise GET
	
	
	
	
	$data = $general->sanitiseGET($_GET);
	
	foreach ($data as $key=>$value){
		
		$GLOBALS[$key] = $value;
		
	}
	
	//print_r($GLOBALS);
	//print_r($data);
	
	if (!isset($table)){
		
		echo 'Table key not set';
		exit();	
		
	}
	
	if (!isset($update)){
		
		echo 'Update key not set';
		exit();	
		
	}
	
	if ($update == 1){
		
		if (!isset($identifierKey) || !isset($identifier)){
		
		echo 'Update identifier key not set';
		exit();	
		
		}
		
		if (!isset($joinIdentifierKey) || !isset($joinIdentifier)){
		
		echo 'Join Update identifier key not set';
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
		
		if (!isset($joinIdentifierKey) || !isset($joinIdentifier)){
		
		echo 'Join Update identifier key not set';
		exit();	
		
		}
		
		
	}
	
	//split name field into two
	
	
	
	//print_r($data);
	
	
	
	
	//print_r($keys);
	//print_r($values);
	
	
	//echo $hello;
	
	
		
	
	
	
	// if a new field
	
	if ($update == 0){
		
		unset($data['update']);
		unset($data['table']);
		unset($data['identifierKey']);
		unset($data['identifier']);
		

		$values = implode('\', \'', $data);
		$keys = array_keys($data);
		$keys = implode('`, `', $keys);
		
		
		$q = "INSERT INTO `$table` (`$keys`) VALUES ('$values')";
				
		echo $general->returnWithInsertID($q);
		
		
	}else if ($update == 1){
		
		//if this is an update check the id field exists
		
		$q = "SELECT `$identifierKey` FROM `$table` WHERE `$identifierKey` = $identifier";
		
		//echo $q;
		
		if ($general->returnYesNoDBQuery($q) == 1){
			
			unset($data['update']);
			unset($data['identifierKey']);
			unset($data['identifier']);
			unset($data['joinIdentifierKey']);
			unset($data['joinIdentifier']);
			unset($data['table']);

			
			foreach ($data as $key => $value) {
	        	$value = "'$value'";
	        	$key = "`$key`";
				$updates[] = "$key = $value";      
			}
			
			$set = implode(', ', $updates);
			
			$q = "UPDATE `$table` SET $set WHERE `$identifierKey` = $identifier" ;
			
			//echo $q;
			echo $general->returnYesNoDBQuery($q);
			
			//use returnYesNoDBQuery for this query
			
		}else{
			
			echo 'Invalid identifier or identifier key passed';
			
		}
		
		
	}else if ($update == 2){
		
		//if this is an delete check the id field exists
		unset($data['update']);
		unset($data['identifierKey']);
		unset($data['identifier']);
		unset($data['table']);
		
		$q = "SELECT `$identifierKey` FROM `$table` WHERE `$identifierKey` = $identifier";
		
		//echo $q;
		
		if ($general->returnYesNoDBQuery($q) == 1){
			
			
			$q = "DELETE FROM `$table` WHERE `$identifierKey` = $identifier" ;
			
			//echo $q;
			echo $general->returnYesNoDBQuery($q);
			//use returnYesNoDBQuery for this query
			
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
	
}

$general->endGeneral();

