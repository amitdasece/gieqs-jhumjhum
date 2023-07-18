<!DOCTYPE html>
<html>
<title>
    <?php echo $page_title ?>
    
    </title>
<head> 
<meta charset="utf-8">
<?php //echo '<script src="' . $roothttp . 'includes/jquery.min.js"></script>';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<?php echo '<script src="' . $roothttp . 'includes/jquery.validate.js"></script>';?>


<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<script>
	
var waitForFinalEvent = (function () {
  var timers = {};
  return function (callback, ms, uniqueId) {
    if (!uniqueId) {
      uniqueId = "Don't call this twice without a uniqueId";
    }
    if (timers[uniqueId]) {
      clearTimeout (timers[uniqueId]);
    }
    timers[uniqueId] = setTimeout(callback, ms);
  };
})();	

//use unique event for each call as below in Jquery


$(document).ready(function() {
	
	var titleGraphic = $('.title').height();
	var titleBar = $('#menu').height();
	$('.title').css("height",(titleBar));	
	
	
	$(window).resize(function () {
    waitForFinalEvent(function(){
      //alert('Resize...');
      var titleGraphic = $('.title').height();
	  var titleBar = $('#menu').height();
	  $('.title').css("height",(titleBar));	
		
    }, 100, "Resize header");
		});
	
});
	
	
</script>

<!--<link rel="stylesheet" type="text/css" href="globalv1.css">-->

<?php
	
	
	//echo $roothttp;
	 echo '<link rel="stylesheet" type="text/css" href="'. $roothttp . '/styles%20image.css">';
	
	
	
	
?>
</head>

<div id="holder">
    <div id="menu">
	    
	 <?php echo '<img src="'. $roothttp . 'includes/ACEeLearningLogo.png" align="left" class="title">';
		 
		echo '<img src="'. $roothttp . 'includes/uz.png" align="right" class="otherimg">';
		 
	 ?>

    

    </div>


      


