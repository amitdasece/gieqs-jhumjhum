
<?php
//;
error_reporting(0);

$openaccess = 1;
//echo 'hello';
//$requiredUserLevel = 4;
require ('../../../assets/includes/config.inc.php');		
//echo 'hello2';
require (BASE_URI.'/assets/scripts/headerScript.php');



//echo 'hello3';
//$general = new general;
$assetManager = new assetManager;
//echo 'hello4';




function ne($v) {
    return $v != '';
}

//required GET variables  update, identifierKey, identifier, table

// update 0 INSERT INTO

// update 1 UPDATE

// update 2 DELETE


//check count of get variables

$data = $assetManager->sanitiseGET($_GET);
	
foreach ($data as $key=>$value){
    
    $GLOBALS[$key] = $value;
    
}

                
	$response =  $assetManager->select2_all_assets($search);

	echo $response;
    
    


	$assetManager->endassetManager();

      