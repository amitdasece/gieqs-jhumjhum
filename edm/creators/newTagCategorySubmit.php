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

session_start( );

//need to require login functions


$general = new general;
$tagCategories = new tagCategories;

//print_r($_GET);

foreach ($_GET as $k=>$v){
	
	$sanitised = $general->sanitiseInput($v);
	$_GET[$k] = $sanitised;
	
	
}



if (isset($_GET['tagCategoryName'])){
	$name = $_GET['tagCategoryName'];
}else{
	echo 'Name was not passed';
	exit();
	
}


if (isset($_GET['active'])){
	$active = $_GET['active'];
	
}else{
	echo 'active was not passed';
	exit();
	
}

	
//db query

//check the video does not already exist

//if does not enter a new video

print_r($tagCategories->newTagCategory($name, $active));

//update video









?>