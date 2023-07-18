<?php
	
			$openaccess = 0;
			$requiredUserLevel = 4;
			require ('../../assets/includes/config.inc.php');		
			
			require (BASE_URI.'/assets/scripts/headerScript.php');


$general = new general;



function ne($v) {
    return $v != '';
}



//$connection = new DataBaseMysql();

//required GET variables  update, identifierKey, identifier, table

// update 0 INSERT INTO

// update 1 UPDATE

// update 2 DELETE


//check count of get variables

if (count($_GET) > 0){

	

	
	$data = $general->sanitiseGET($_GET);
	
	foreach ($data as $key=>$value){
		
		$GLOBALS[$key] = $value;
		
	}
	
	//print_r($GLOBALS);
	
	
	if (!isset($table)){
		
		echo 'Table key not set';
		exit();	
		
	}
	
	
		
	if (!isset($identifierKey) || !isset($identifier)){
	
	echo 'Update identifier key not set';
	exit();	
	
	}
	
	//echo $identifier;
	//echo $identifierKey;
	
	//echo ne($identifier);
	
	if (!ne($identifierKey) || !ne($identifier)){
		
		echo 'identifiers empty';
		exit();
		
	}
		
		
	unset($data['identifierKey']);
	unset($data['identifier']);
	unset($data['table']);

	
	foreach($data as $key=>$value)
		{
		    if(is_null($value) || $value == '' || $value == 'undefined')
		        unset($data[$key]);
		}
	
	//print_r($data);
	
	
	$dataString2 = implode('` , `', $data);
	
	

	//echo $dataString2;
	
	//SELECT the required fields from the database
		
		
	$q = "SELECT `$dataString2` FROM `$table` WHERE `$identifierKey` = $identifier";
	
	//echo $q;
	
	$result = $general->connection->RunQuery($q);
		
		if ($result->num_rows == 1){
			
				$returnArray = array();
			
				while($row = $result->fetch_array(MYSQLI_ASSOC)){
		
					foreach($data as $key=>$value){
						
						$returnArray[$value] = $row[$value];
						
					}
								
				}
				
			echo json_encode($returnArray);	
				
			}else{
				
				return NULL;
				
			}	
		
		
	
	
	
	
	//remove the preset global variables
	
	foreach ($data as $key=>$value){
		
		unset($GLOBALS[$key]);
	
		
	}

}else{
	
	echo 'No variables passed';
	
}

$general->endGeneral();

