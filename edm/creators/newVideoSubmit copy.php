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
$video = new video;

//print_r($_GET);

foreach ($_GET as $k=>$v){
	
	$sanitised = $general->sanitiseInput($v);
	$_GET[$k] = $sanitised;
	
	
}



if (isset($_GET['name'])){
	$name = $_GET['name'];
}else{
	echo 'Name was not passed';
	exit();
	
}

if (isset($_GET['url'])){
	$url = $_GET['url'];
}else{
	echo 'URL was not passed';
	exit();
	
}


if (isset($_GET['active'])){
	$active = $_GET['active'];
	
}else{
	echo 'active was not passed';
	exit();
	
}

if (isset($_GET['split'])){
	$split = $_GET['split'];
	
}else{
	echo 'split was not passed';
	exit();
	
}

	
//db query

//check the video does not already exist

//if does not enter a new video

print_r($video->newVideo($name, $url, $active, $split));

//update video









?>