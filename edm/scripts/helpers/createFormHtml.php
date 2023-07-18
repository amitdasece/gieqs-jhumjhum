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


if (isset($_GET['table'])){
	$table = $_GET['table'];
}else{
	echo 'table name was not passed';
	exit();
	
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
	        
	        <p>Script to generate the database fields from a specified table</p>
	        
	        <p>echo $formv1->generateSelectCustom('Tag', 'tag', '', array('default' => 'first select category'), 'Tag name');</p>
	        
	          <p>Database fields</p>
		    
		    <p><?php 
			    
			    $columns = $formv1->getDatabaseColumns($table);

			    
			    foreach ($columns as $key=>$value){
				    
				 echo $value['name']. ', ';
				 
				    
				}
			    echo '<br><br>';
			    
			    
			    
		    ?></p>
	        
	        
	        <p><?php 
		        
		        //print_r($formv1->getDatabaseColumns($table));
		        
		        		        
		        foreach ($columns as $key=>$value){
			        
			        echo 'echo $formv1->generateSelectCustom(\'text here\', \'';
			        
			        foreach ($value as $k=>$v){
				        
				        if ($k == 'name'){
					        
					        echo $v . '\', ';
					        
				        }
				        
				        
			        }
			        
			        echo '\'\', \'options here\', \'tooltip here\');';
			        
			        echo '<br>';
			        
			        
		        }
		        
		        
		        ?></p>
		        
				<p><?php 
		        
		        //print_r($formv1->getDatabaseColumns($table));
		        
		        $columns = $formv1->getDatabaseColumns($table);
		        
		        foreach ($columns as $key=>$value){
			        
			        echo 'echo $formv1->generateText(\'text here\', \'';
			        
			        foreach ($value as $k=>$v){
				        
				        if ($k == 'name'){
					        
					        echo $v . '\', ';
					        
				        }
				        
				        
			        }
			        
			        echo '\'\', \'tooltip here\');';
			        
			        echo '<br>';
			        
			        
		        }
		        
		        
		        ?></p>
		        
		        
	        
        </div>
        
    </div>
    
    
</body>




</html>