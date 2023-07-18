
<?php
//;
//error_reporting(E_ALL);

$openaccess = 1;
//echo 'hello';
//$requiredUserLevel = 4;
require ('../../../assets/includes/config.inc.php');		
//echo 'hello2';
require (BASE_URI.'/assets/scripts/headerScript.php');



//echo 'hello3';
//$general = new general;
$userFunctions = new userFunctions;
//echo 'hello4';




function ne($v) {
    return $v != '';
}

//required GET variables  update, identifierKey, identifier, table

// update 0 INSERT INTO

// update 1 UPDATE

// update 2 DELETE


//check count of get variables

$data = $userFunctions->sanitiseGET($_GET);
	
foreach ($data as $key=>$value){
    
    $GLOBALS[$key] = $value;
    
}

                
	$response =  $userFunctions->select2_all_users($search);

	echo $response;
    
    


	$userFunctions->enduserFunctions();

      