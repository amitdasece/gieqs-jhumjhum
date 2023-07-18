<?php
	
   //error_reporting;

    require_once (BASE_URI . '/assets/scripts/login_functions.php');
    
    //place to redirect the user if not allowed access
    $location = BASE_URL . '/index.php';

    if (!($dbc)){
    require(DB);
    }
   
    
    require(BASE_URI . '/assets/scripts/interpretUserAccess.php');
?>