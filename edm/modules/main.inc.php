    
</div>
<script src="dist/jquery.vimeo.api.min.js"></script>
<script src="includes/jquery-ui.js"></script>

<style>

	.content {
			min-height: 0;
			max-height: 1000%;
	}
	
	
	
</style>

<script>
	
   
</script>


<body>   
<div class="content">

	
			<?php    
			// (0);
				//define ('MYSQL', '../mysqli_connect_learning.php');
				//require (DB);
			
	?>

	<h1>Welcome to the iACE wiki</h1>
	
	
	<div class='videoWrapper' style='text-align: centre'><iframe id='video13' src='https://player.vimeo.com/video/231129388'  frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>
	
	<hr>
	
	<div class='topic'>
	<h2>Are you confident about the detection of an endoscopic resection scar or detection of recurrence at a scar?</h2>
	<div id='frontPageImage'><img src='includes/Scars.jpg' href='' class='mainImage'></div>
	
	<h3>Visit our learning tool on <a href="">scar assessment</a></h3>
	
	</div>
	
	<hr>
	
	<div class='topic'>	
	
	<h2>How do you deal with problematic bleeding during colonic Endoscopic Mucosal Resection?</h2>
		<div id='IPB'><a href="index.php?p=IPB"><img src='includes/ipb.jpg' class='mainImage'></a></div>
	<h3>Visit our learning tool on <a href="index.php?p=IPB">Intra-procedural Bleeding</a></h3>
	</div>
	
	
	<div class="img2text" style="color:white; display:none;">
				<h1>Paris 0-IIaIs LSL extending over a colonic fold</h1>
					<h3> removed by EMR dissection technique</h3>

				</div> 
	
<div id="Style1" style="display:none;">
			
	</div>
 
  <div id="Style2"> 
			
	</div> 
  
 <div id="Style3" style="display:none;">
    

</div>
    
    </div>
</body>
<script>

//$("#video13").vimeo("play");
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

var audioStatus = 1;	
		
function missingErrors (inputArray) {
    
  //  if required selects are empty
  //    print a message in the field
    
    //then check all message fields, if all empty allow submit.
    var x;
    var errors = 0;
    for (x in inputArray) {
        if ($(inputArray[x]).val() == '' || $(inputArray[x]).val() == null) {
                    errors++;
        }}

	return errors;
        
}; 
	
function inViewport($el) {
    var elH = $el.outerHeight(),
        H   = $(window).height(),
        r   = $el[0].getBoundingClientRect(), t=r.top, b=r.bottom;
    return Math.max(0, t>0? Math.min(elH, H-t) : (b<H?b:H));
}
	
//var audio = new Audio('includes/hello.mp3');

	
	
function loadImages () {
	var lesionid=$('#lesionid')
	 .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
	
	if (lesionid) {
	
	$.ajax({
        url: 'get_images_view.php',
        type: 'POST',
        data: 'LesionID='+lesionid,
        cache: false,
        success: function(data, textStatus, jqXHR)
        {
            if(typeof data.error === 'undefined')
            {
                console.log('SUCCESS: grabbed images ' + data);
				$('#Style2').html(data);
            }
            else
            {
                // Handle errors here
                console.log('ERRORS: ' + data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Handle errors here
            console.log('ERRORS: ' + textStatus);
        },
        complete: function()
        {
            // STOP LOADING SPINNER
        }
    });
	}
	
	
}
	
function updateScore () {
	
	var userID = $("#userID").clone().children().remove().end().text(); 
	var pretestScore = $('#pretestScore').clone().children().remove().end().text(); 
	var posttestScore = $('#posttestScore').clone().children().remove().end().text();
	var changeScore = $('#changeScore').clone().children().remove().end().text();
	var percentImprovement = $('#percentImprovement').clone().children().remove().end().text();
	
	request = $.ajax({
				url: "submitscores.php",
				type: "post",
				data: "&userid="+userID+"&overallPre="+pretestScore+"&overallPost="+posttestScore+"&changeScore="+changeScore+"&percentImprovement="+percentImprovement   	 		
			});

			request.done(function (response, textStatus, jqXHR){
				if (response == 1){
				console.log('scores saved');
				return;
				}else{
				console.log('scores not saved '+response);
				}
			});

			request.fail(function (jqXHR, textStatus, errorThrown){
				console.error(
					"The following error occurred: "+
					textStatus, errorThrown
				);
			});
	
	
	
	
}
	
	function checkSummarySubmit () {

	if ($('#pageShowing').html() == '42'){
		
		request = $.ajax({
				url: "checkSubmit.php",
				type: "post",
				data: "&userid="+userID  	 		
			});

			request.done(function (response, textStatus, jqXHR){
				if (response == 1){
					updateScore();
					console.log('score updated');
				}else{
					
					console.log('no need to update score');
				}
			});

			request.fail(function (jqXHR, textStatus, errorThrown){
				console.error(
					"The following error occurred: "+
					textStatus, errorThrown
				);
			});
		
		
	}else{
		console.log('triggered but page not 42');
	}


}
	
	
$(document).ready(function() {
	

	var titleGraphic = $('.title').height();
	var titleBar = $('#menu').height();
	$('.title').css("height",(titleBar));	
	
	var mainPageGraphicWidth = inViewport($('.content'));
	$('.mainImage').css("height",(mainPageGraphicWidth*0.7));
	
	/*$('#IPB').on("click", function() {
		
		window.location = "index.php?p=" + this.id;
		
	});*/
	

	
	
	$('#video13').css("height",(mainPageGraphicWidth*0.7));
	$('.videoWrapper').css("height",(mainPageGraphicWidth*0.7));
	$('.videoWrapper').css("padding",50);

	
	$(window).resize(function () {
    waitForFinalEvent(function(){
      //alert('Resize...');
      var titleGraphic = $('.title').height();
	  var titleBar = $('#menu').height();
	  $('.title').css("height",(titleBar));	
		
    }, 100, "Resize header");
		});
	
	$(window).on("scroll resize", function(){
  		var contentHeight = inViewport($('.content')); // n px in viewport
	});
	
	$(document).ajaxStart(function(){
        $("#loader").css("display", "block");
    });
    $(document).ajaxComplete(function(){
        $("#loader").css("display", "none");
    });
    

	
$('#startShow').on('click', function() {

	$('#intro').hide();
	$('#1').show();
	$('#pageShowing').html('1');
	 $("#video1").vimeo("play");

})
	
$('.back').on('click', function() {

	var currentPage = $('#pageShowing').html();
	console.log('Current page defined as'+currentPage);
	targetPage = currentPage - 1;
	console.log('Target page defined as'+targetPage);
	
	
	
	if (targetPage == 0) {
		targetPage = 'intro';
		$('.audio').trigger('pause');

	}
	
	$('.audio').trigger('pause');
	$('#'+currentPage).hide();
	$('#'+targetPage).show();
	
	if($("#audio" + currentPage).length > 0) {
	$('#audio'+currentPage).trigger('pause');
	$('#audio'+currentPage).prop("currentTime",0);
	}
	
	if($("#audio" + targetPage).length > 0) {
		if (audioStatus == '1'){
		$('#audio'+targetPage).trigger('play');
		}
	}
	
	if($("#video" + currentPage).length > 0) {
	$('#video'+currentPage).vimeo('pause');
	}
	
	
	if($("#video" + targetPage).length > 0) {
	$('#video'+targetPage).vimeo('play');
	}
	
	$('#pageShowing').html(targetPage);
	
	if (audioStatus=='1'){
		$('.audioStatus option[value=1]').prop('selected', 'selected');
	}
	if (audioStatus=='0'){
		$('.audioStatus option[value=0]').prop('selected', 'selected');
	}
	
	checkSummarySubmit();

})

$('.next').on('click', function() {

	var currentPage = $('#pageShowing').html();
	var lastPage = $('#lastPage').html();
	lastPage++;
	console.log('Current page defined as'+currentPage);
	targetPage = +currentPage + 1;
	console.log('Target page defined as'+targetPage);
	
	if (targetPage == lastPage) {
		alert('End of the Learning Tool.  Please select another link');
		$('.audio').trigger('pause');

		return;
	}
	
	
	$('#'+currentPage).hide();
	$('#'+targetPage).show();
	
	if($("#audio" + currentPage).length > 0) {
	$('#audio'+currentPage).trigger('pause');
	$('#audio'+currentPage).prop("currentTime",0);
	}
	
	if($("#audio" + targetPage).length > 0) {
	if (audioStatus == '1'){
		$('#audio'+targetPage).trigger('play');
		}
	}
	
	
	if($("#video" + currentPage).length > 0) {
	$('#video'+currentPage).vimeo('pause');
	}
	
	
	if($("#video" + targetPage).length > 0) {
	$('#video'+targetPage).vimeo('play');
	}
	

	$('#pageShowing').html(targetPage);
	
	
	if (audioStatus=='1'){
		$('.audioStatus option[value=1]').prop('selected', 'selected');
	}
	if (audioStatus=='0'){
		$('.audioStatus option[value=0]').prop('selected', 'selected');
	}
	
	
	checkSummarySubmit();

})
	
$('.q1').on('click', function() {

	$('.darkClass').show();
	$('#pretest1').show();


})	
	
$('.close').on('click', function() {

	$('.dropdown-content').hide();
	$('.darkClass').hide();


})	
	
	
$('.submitQuestion1').on('click', function() {

	var formInputs = $('.question1select');
		var post = formInputs.serialize();
	 	var userID = $("#userID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
		console.log('post contains '+post);
  
	var errors = 0;
	$.each(formInputs, function() {
		
		if ($(this).val() == null || $(this).val() == '') {
			errors++;
		}
		
		return errors;
		
	})
	
	if (errors > 0) {
		$('#errorq1').html('Please answer both questions to proceed').css("color","red");
	}else{
		request = $.ajax({
				url: "submitquestions_initial.php",
				type: "post",
				data: "&userid="+userID+"&"+post   	 		
			});

			request.done(function (response, textStatus, jqXHR){
				if (response == 1){
				alert('Answers saved');
				/*$('#errorq1').html('Answers Saved').css("color","red").delay(100);*/
				$('.dropdown-content').hide();
				$('.darkClass').hide();
				$('.question1').hide();
				$('.answered1').show();
				$('#2').hide();
				$('#3').show();
				$('#pageShowing').html(3);
				return;
				}
				else{
				$('#errorq1').html('Something went wrong, try again').css("color","red");
				}
			});

			request.fail(function (jqXHR, textStatus, errorThrown){
				console.error(
					"The following error occurred: "+
					textStatus, errorThrown
				);
			});
		
	}
	

})	
	
$('.q2').on('click', function() {

	$('.darkClass').show();
	$('#pretest2').show();


})		
	
	
$('.submitQuestion2').on('click', function() {

	var formInputs = $('.question2select');
		var post = formInputs.serialize();
	 	var userID = $("#userID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
		console.log('post contains '+post);
  
	var errors = 0;
	$.each(formInputs, function() {
		
		if ($(this).val() == null || $(this).val() == '') {
			errors++;
		}
		
		return errors;
		
	})
	
	if (errors > 0) {
		$('#errorq2').html('Please answer the question to proceed').css("color","red");
	}else{
		request = $.ajax({
				url: "submitquestions.php",
				type: "post",
				data: "&userid="+userID+"&"+post   	 		
			});

			request.done(function (response, textStatus, jqXHR){
				if (response == 1){
				alert('Answer saved');
				$('.dropdown-content').hide();
				$('.darkClass').hide();
				$('.question1').hide();
				$('.answered1').show();
				$('#3').hide();
				$('#4').show();
				$('#pageShowing').html(4);
				return;
				}else{
					
				$('#errorq2').html('Something went wrong, please try again').css("color","red");	
				}
			});

			request.fail(function (jqXHR, textStatus, errorThrown){
				console.error(
					"The following error occurred: "+
					textStatus, errorThrown
				);
			});
		
	}


})	
	
$('.q3').on('click', function() {

	$('.darkClass').show();
	$('#pretest3').show();


})		
	
	
$('.submitQuestion3').on('click', function() {

        var formInputs = $('.question3select');
		var post = formInputs.serialize();
	 	var userID = $("#userID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
		console.log('post contains '+post);
  
	var errors = 0;
	$.each(formInputs, function() {
		
		if ($(this).val() == null || $(this).val() == '') {
			errors++;
		}
		
		return errors;
		
	})
	
	if (errors > 0) {
		$('#errorq3').html('Please answer the question to proceed').css("color","red");
	}else{
		request = $.ajax({
				url: "submitquestions.php",
				type: "post",
				data: "&userid="+userID+"&"+post   	 		
			});

			request.done(function (response, textStatus, jqXHR){
				if (response == 1){
				alert('Answer saved');
				$('.dropdown-content').hide();
				$('.darkClass').hide();
				$('.question3').hide();
				$('.answered3').show();
				$('#4').hide();
				$('#5').show();
				$('#pageShowing').html(5);
				return;
				}else{
					
				$('#errorq3').html('Something went wrong, please try again').css("color","red");	
				}
			});

			request.fail(function (jqXHR, textStatus, errorThrown){
				console.error(
					"The following error occurred: "+
					textStatus, errorThrown
				);
			});
		
	}

})
	
$('.q1post').on('click', function() {

	$('.darkClass').show();
	$('#posttest1').show();


})
	
$('.submitQuestion1post').on('click', function() {

	var formInputs = $('.question1postselect');
		var post = formInputs.serialize();
	 	var userID = $("#userID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
		console.log('post contains '+post);
  
	var errors = 0;
	$.each(formInputs, function() {
		
		if ($(this).val() == null || $(this).val() == '') {
			errors++;
		}
		
		return errors;
		
	})
	
	if (errors > 0) {
		$('#errorq1post').html('Please answer the question to proceed').css("color","red");
	}else{
		request = $.ajax({
				url: "submitquestions.php",
				type: "post",
				data: "&userid="+userID+"&"+post   	 		
			});

			request.done(function (response, textStatus, jqXHR){
				if (response == 1){
				alert('Answer saved');
				$('.dropdown-content').hide();
				$('.darkClass').hide();
				$('.question1post').hide();
				$('.answered1post').show();
				$('#36').hide();
				$('#37').show();
				$('#pageShowing').html(37);
				return;
				}else{
					
				$('#errorq1post').html('Something went wrong, please try again').css("color","red");	
				}
			});

			request.fail(function (jqXHR, textStatus, errorThrown){
				console.error(
					"The following error occurred: "+
					textStatus, errorThrown
				);
			});
		
	}


})	
	
$('.q2post').on('click', function() {

	$('.darkClass').show();
	$('#posttest2').show();


})
	
$('.submitQuestion2post').on('click', function() {

	var formInputs = $('.question2selectpost');
		var post = formInputs.serialize();
	 	var userID = $("#userID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
		console.log('post contains '+post);
  
	var errors = 0;
	$.each(formInputs, function() {
		
		if ($(this).val() == null || $(this).val() == '') {
			errors++;
		}
		
		return errors;
		
	})
	
	if (errors > 0) {
		$('#errorq2post').html('Please answer the question to proceed').css("color","red");
	}else{
		request = $.ajax({
				url: "submitquestions.php",
				type: "post",
				data: "&userid="+userID+"&"+post   	 		
			});

			request.done(function (response, textStatus, jqXHR){
				if (response == 1){
				alert('Answer saved');
				$('.dropdown-content').hide();
				$('.darkClass').hide();
				$('.question2post').hide();
				$('.answered2post').show();
				$('#38').hide();
				$('#39').show();
				$('#pageShowing').html(39);
				return;
				}else{
					
				$('#errorq2post').html('Something went wrong, please try again').css("color","red");
				console.log(response);
				}
			});

			request.fail(function (jqXHR, textStatus, errorThrown){
				console.error(
					"The following error occurred: "+
					textStatus, errorThrown
				);
			});
		
	}


})
	
$('.q3post').on('click', function() {

	$('.darkClass').show();
	$('#posttest3').show();


})

$('.submitQuestion3post').on('click', function() {

	var formInputs = $('.question3selectpost');
		var post = formInputs.serialize();
	 	var userID = $("#userID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
		console.log('post contains '+post);
  
	var errors = 0;
	$.each(formInputs, function() {
		
		if ($(this).val() == null || $(this).val() == '') {
			errors++;
		}
		
		return errors;
		
	})
	
	if (errors > 0) {
		$('#errorq3post').html('Please answer the question to proceed').css("color","red");
	}else{
		request = $.ajax({
				url: "submitquestions.php",
				type: "post",
				data: "&userid="+userID+"&"+post   	 		
			});

			request.done(function (response, textStatus, jqXHR){
				if (response == 1){
				alert('Answer saved');
				$('.dropdown-content').hide();
				$('.darkClass').hide();
				$('.question3post').hide();
				$('.answered3post').show();
				$('#40').hide();
				$('#41').show();
				$('#pageShowing').html(41);
				return;
				}else{
					
				$('#errorq3post').html('Something went wrong, please try again').css("color","red");	
				}
			});

			request.fail(function (jqXHR, textStatus, errorThrown){
				console.error(
					"The following error occurred: "+
					textStatus, errorThrown
				);
			});
		
	}


})	
	
$('.play').on('click', function() {

	var page = $('#pageShowing').html();
	var audiotoPlay = '#audio'+page;
	$(audiotoPlay).trigger('play');
	$('.play').prop('disabled = true');
	$('.pause').prop('disabled = false');



})	

$('.pause').on('click', function() {
	var page = $('#pageShowing').html();
	var audiotoPlay = '#audio'+page;
	$(audiotoPlay).trigger('pause');
	$('.play').prop('disabled =-false');
	$('.pause').prop('disabled = true');

})		

$('.restartAudio').on('click', function() {
	var page = $('#pageShowing').html();
	var audiotoPlay = '#audio'+page;
	$(audiotoPlay).trigger('pause');
	$(audiotoPlay).prop("currentTime",0);
	$('.play').prop('disabled =-false');
	$('.pause').prop('disabled = false');

})	
	
$('.audioStatus').on('change', function() {
	var page = $('#pageShowing').html();
	var audiotoPlay = '#audio'+page;
	var audioRequiredStatus = $(this).val();
	if (audioRequiredStatus == '1'){
		audioStatus = '1';
		$(audiotoPlay).trigger('play');
		
	}
	if (audioRequiredStatus == '0'){
		audioStatus = '0';
		$(audiotoPlay).trigger('pause');
	}

})	

$('.restartShow').on('click', function() {
	$('#pageShowing').html('intro');
	$('#44').hide();
	$('#intro').show();

})	

	
	
	
	
	
	
});
	
	

	
	
    
    


</script>


</html>

