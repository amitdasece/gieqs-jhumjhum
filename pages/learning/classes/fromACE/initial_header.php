<?php 

    session_start( );

	$unavailable = null;

  ?>

<!DOCTYPE html>
<html>
<title>
    <?php echo "$page_title"; ?>
    
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
    $("#Age").blur(function(){
        if $("Age").val < "18" {
          $("Age").append("This value cannot be under 18");
        }})
       ;
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
    
    <?php if ($unavailable){
	    
	    echo '<div id="navi">';
        echo '<li class="active"><a href="PROSPER.php">Login page for iACE Server</a></li>';
        echo '<li><a href="../../index.php">Back to main ACE site</a></li>';

		echo '</div>';
    
		echo '</div>';
		echo '</header>';
	    
	    echo '<div class="content">';
	    
	    echo '<h2>iACE is undergoing data maintenance and is not currently available.</h2>  <p>We apologise for the inconvenience. Please check back later</p>';
	    
	    echo '</div>';
	    
	    include('footer.html');
	    
	    exit();
	    
	   }
	    
    
      


