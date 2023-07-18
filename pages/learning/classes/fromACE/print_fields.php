<?php

error_reporting(1);

$folder = 'https://' . $_SERVER['HTTP_HOST'] . '/studyserver/PROSPER/';

require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/script_header.php');

require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/login_functions.php');


//use the referring id as the user id to change the password for
//alternatively use a randomly generated string


$lesion = new Lesion;
//$table = new tableGenerator;
//$formv1 = new formGenerator;
//$user = new users;
//$user->Load_from_key($_SESSION['user_id']);


print_r($lesion->printFieldNames());

?>