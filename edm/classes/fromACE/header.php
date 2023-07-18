<?php 

    session_start( );
    
    // If no session value is present, redirect the user:
    if (!isset($_SESSION['user_id'])) {

    // Need the functions:
     require ('login_functions.php');
     redirect_user( );

  } ?>

<!DOCTYPE html>
<html>
<title>
    <?php echo $page_title ?>
    
    </title>
<head> 
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("input").focus(function(){
        $(this).css("background-color", "#ffffff");
    });
    $("input").blur(function(){
        $(this).css("background-color", "#ffffff");
    })
  
});
</script>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<header>
<div id="holder">
    <div id="menu">
        <?php echo $page_header ?>
        <img src="includes/USL.png" width="175px" align="right">
    </div>
      
      


