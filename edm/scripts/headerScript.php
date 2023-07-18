<?php
	
   //error_reporting;

    require (BASE_URI1 . '/includes/login_functions.php');
    
    //place to redirect the user if not allowed access
    $location = BASE_URL1 . '/index.php';

    if (!($dbc)){
    require(DB);
    }
   
    
    require(BASE_URI1 . '/scripts/interpretUserAccess.php');
?>