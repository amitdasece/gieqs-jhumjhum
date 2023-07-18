<?php

$host = substr($_SERVER['HTTP_HOST'], 0, 5);
if (in_array($host, array('local', '127.0', '192.1'))) {
    $local = TRUE;
} else {
    $local = FALSE;
}

if ($local){

    $root = $_SERVER['DOCUMENT_ROOT'].'/dashboard/esd/';
    $roothttp = 'http://' . $_SERVER['HTTP_HOST'].'/dashboard/esd/';
    require($_SERVER['DOCUMENT_ROOT'].'/dashboard/esd/includes/config.inc.php');
}else{
    $root = $_SERVER['DOCUMENT_ROOT'].'/esd/';
    $roothttp = 'http://' . $_SERVER['HTTP_HOST'].'/esd/';

    require($_SERVER['DOCUMENT_ROOT'].'/esd/includes/config.inc.php');

}
$location = $roothttp . 'elearn.php';

session_start();
if (!isset($_SESSION['user_id'])) {

    // Need the functions:
    require ($root . 'includes/login_functions.php');
    redirect_login($location);
}

?> 

<script src="<?php echo $roothttp . 'includes/generaljs.js'; ?>" type="text/javascript"></script>
<script src="<?php echo $roothttp . 'includes/jquery.min.js'; ?>" type="text/javascript"></script>



<?php

$formv1 = new formGenerator;
$general = new general;
$video = new video;
$tagCategories = new tagCategories;

//!change title

$page_title = 'Tag Editor';

// Include the header file:
include($root . '/includes/header.php');
include($root . '/includes/naviCreator.php');

foreach ($_GET as $k=>$v){
	
	$sanitised = $general->sanitiseInput($v);
	$_GET[$k] = $sanitised;
	
	
}


if (isset($_GET['database'])){
	$database = $_GET['database'];
}else{
	
	
}



// Page content
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<html>
<head>
    <title></title>
</head>

<body>
    <div id="content" class="content">
	    
        <div class="responsiveContainer white">
	        
	        <p>Script to get all fields in database</p>
	        
	        	        
	          <p>Database Tables</p>
		    
		    <p><?php 
			    
			    $columns = $formv1->getAllDatabaseTables();

				print_r($columns);
				
				echo '<table>';
				
				echo '<tr>';
				
				foreach ($columns as $key=>$value){
					
					foreach ($value as $k=>$v){
					
						echo '<th>' . $k . '</th>';
					
					}
					
					break;
				}
				
				echo '</tr>';
				
				
				
				foreach ($columns as $key=>$value){
					
					echo '<tr>';
					
					foreach ($value as $k=>$v){
						
						
						
						echo '<td>' . $v . '</td>';
						
						
					}
					
					echo '</tr>';
				
				}
				
				
				
				echo '</table>';
				
			    ?>
			    </p>
	        
	        
	        
		        
		        
	        
        </div>
        
    </div>
    
    
</body>




</html>