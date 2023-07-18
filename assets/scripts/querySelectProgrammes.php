
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

$data = $general->sanitiseGET($_GET);
	
foreach ($data as $key=>$value){
    
    $GLOBALS[$key] = $value;
    
}

                
	$response =  $queries->select2_programme_match($search);

	echo $response;
    
    


	$queries->endqueries();

      