
<?php
//error_reporting(0);
//;
$openaccess = 1;
//echo 'hello';
//$requiredUserLevel = 4;
require ('../../assets/includes/config.inc.php');		
//echo 'hello2';
require (BASE_URI.'/assets/scripts/headerScript.php');

//echo 'hello3';
$general = new general;
$queries = new queries;
//echo 'hello4';




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
	
	// print_r($GLOBALS);
	// print_r($data);
	
	if (!isset($table)){
		
		echo 'Table key not set';
		exit();	
		
	}

	if (!isset($field)){
		
		echo 'Field key not set';
		exit();	
		
	}


                
	$response =  $queries->select2_simplequery($field, $table);

	echo $response;


	$queries->endqueries();

}           