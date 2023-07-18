
	<?php 
	
	    session_start( );
		
		$folder = 'https://' . $_SERVER['HTTP_HOST'] . '/studyserver/PROSPER/';
		$absoluteFolder = $_SERVER['DOCUMENT_ROOT'];	
		$includePath = $absoluteFolder . '/studyserver/PROSPER';

	
	    // If no session value is present, redirect the user:
	     if (!isset($_SESSION['user_id'])) {
	
	    // Need the functions:
		     require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/login_functions.php');
		     redirect_user( );
	     }
	     
		function class_loader($class) {
		
			require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/classes/'.$class.'.class.php');
		 	
		}
	
	
	spl_autoload_register ('class_loader');
	
	
	
	  ?>