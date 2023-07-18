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



if (session_status() === PHP_SESSION_NONE) {
    session_start();
};
if (!isset($_SESSION['user_id'])) {
			 		
				    // Need the functions:
				     require ($root . 'includes/login_functions.php');
				     redirect_login($location);
			 }

$formv1 = new formGenerator;
$general = new general;
$video = new video;

?>

<script src="<?php echo $roothttp . 'includes/generaljs.js'; ?>" type="text/javascript"></script>

<?php

if ((isset($_GET['videoid'])) || (isset($_POST['videoid']))) { // there is a video specified in the command line 


	$checkVideo = $video->checkisValidVideo($_GET['videoid'], $_POST['videoid']);

	if ($checkVideo == 0){
		
		//show the blank input form
		//set video id null
		
		$videoid = null;
		
		
	}else{
		
		$videoid = $_GET['videoid'];
	    echo '<div style = "display:none;" id="videoidpassedget">' . $videoid . '</div>';
	    //pull the data to another dive
	    echo '<div style = "display:none;" id="videodatapassedget">' . $video->getVideoData($videoid) . '</div>';
		
		
	}
	
	
	
}

echo 'video id is ' . $videoid;


//!change title

$page_title = 'Create a new video';

// Include the header file:
include($root . '/includes/header.php');
include($root . '/includes/naviCreator.php');

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
            <div class="row">
                <div class="col-9">
                    <h2 style='text-align:left;'>Add a video</h2>

                    <fieldset>
                        <form id='videoEntryForm' style='text-align:left;'>
                            <?php

                            echo $formv1->generateText('Name of video:', 'name', null, 'Name of video, max characters 200');
                            echo '<br>';
                            echo $formv1->generateText('URL or Vimeo id:', 'url', null, 'URL of the video, either full vimeo embed url or local hosting full path');
                            echo '<br>';

                            echo $formv1->generateSelect('Active on Site?', 'active', '', 'Yes_No', 'Is this video visible on the site');
                            echo '<br>';

                            echo $formv1->generateSelect('Split into chapters?', 'split', '', 'Yes_No', 'Do you wish to define chapters for this video or present the whole video?');
                            echo '<br>';

                            echo $formv1->generateSubmit('submitList', null, 'Submit', null);






                            ?>
                        </form>
                    </fieldset>
                </div>

                <div id='messageBox' class="col-3 yellow-light narrow center">
                    <p>Adding a new video</p>
                </div>
            </div>

            <div class="row">
	            <div class="col-2">
	            </div>
                <div class="col-8" id='videoDisplayContainer'>
	                
	                
	                
	                
                </div>
                <div class="col-2">
	            </div>
            </div>
        </div>
    </div>  
    
    <script src="../dist/jquery.vimeo.api.min.js"></script>
    <script type="text/javascript">
	    
	    

	var edit = null;
	
	var videoConfirm = null;
	
	var siteRoot = 'http://localhost:90/dashboard/esd/';


	var videoid = $('#videoidpassedget').text();
	
	if (videoid){
		
		//alert(videoid);
		//set a flag that the page is an edit page
		
		var videoRawJSONData = $('#videodatapassedget').text();
		
		var videoData = $.parseJSON(videoRawJSONData);
		
		var edit = 1;
		
		if (isNormalInteger(videoData.url) === true){
			
			$('#videoDisplayContainer').append("<div class='videoWrapper' style='text-align: centre'><iframe id='videoChapter' src='https://player.vimeo.com/video/"+videoData.url+"' width='700' height='504' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>");
										//$('#videoDisplayContainer').vimeoLoad();

			
		}//else would load a local or other source video othr than vimeo
		
		//bring videoData onto the form
		
		
	}
	
	function isNormalInteger(str) {
    return /^\+?(0|[1-9]\d*)$/.test(str);
	}
	
	
	function preSubmitCheck () {
		
			var url = $('#url').val();
		
			if (isNormalInteger(url) === true){
			
			$('#videoDisplayContainer').append("<div class='videoWrapper' style='text-align: centre'><iframe id='videoChapter' src='https://player.vimeo.com/video/"+url+"' width='700' height='504' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>");
										//$('#videoDisplayContainer').vimeoLoad();
		    //set a flag
		    
		    videoConfirm = 1;
		    
		    $("#submitList").html('Confirm correct video');
			
			$("#messageBox").html('<p>Confirm correct video displayed below</p>');
			
			}else{
				
				alert('for now we require a vimeo id');
					
			}//else would load a local or other source video othr than vimeo
		
		
	}
	

    function submitVideoNew () {

	if (edit == 1){
		
		//disable inputs
	
	//$("#videoEntryForm :input").prop('disabled', true);

	$("#submitList").prop('disabled', true);
		
     $.ajax({
        url: 'updateVideoSubmit.php',
        type: 'GET',
        data: $('#videoEntryForm').serialize() + '&id=' + videoid,
        success:function(response)
       {
          console.log('response is '+response);
          if (response == 1){
          
	          $("#messageBox").html('<p>Video updated</p>');
	          
	         
	          
	          //re-enable inputs on done
            
          }if (response == 0 || response == 2){
          
	          alert('No data changed, no update occurred');
	          
	          //re-enable inputs on done
            
          
          }

       },
       error:function(exception){alert('Submission incomplete, please try again');}
    });
    
    	$("#submitList").prop('disabled', false);
		
		
		
		
	} else if (edit == null) {
	//disable inputs
	
	//$("#videoEntryForm :input").prop('disabled', true);

	$("#submitList").prop('disabled', true);
		
     $.ajax({
        url: 'newVideoSubmit.php',
        type: 'GET',
        data: $('#videoEntryForm').serialize(),
        success:function(response)
       {
          console.log('response is '+response);
          if (response){
          
	          //alert('Video Added');
	          
	           edit = 1;
	           
	           $("#submitList").html('Update video data');
			   
			   var split = $('#split').val();
			   
			   if (split == 1){
			   
			   $("#messageBox").html('<p>Video added.  New video id is '+response+'</p><p><button type="button" id="addChapters" class="" onclick="">Add Chapters to this Video</button></p>');
			   }
	           
	           videoid = response;
	          
			   //set video id to the last insert id
			   
	          //var edit = 1;
	          //re-enable inputs on done
            
          }else{
          
	          alert('Error, please reload');
	          
	          //re-enable inputs on done
            
          
          }
          
       },
       error:function(exception){alert('Submission incomplete, please try again');}
    });
    
    	$("#submitList").prop('disabled', false);
    	
    	//var edit = 1;
		
	 }

    }


    $(document).ready(function() {
	    
	    
	    
	if (videoData != "") {
    
    $(videoData).each(function(i,val){
    $.each(val,function(k,v){
        $('#'+k).val(v);  
        //console.log(k+" : "+ v);     
    });
        
    })};    
	    
	    

    $.validator.addMethod("valueNotEquals", function(value, element, arg){
    return arg !== value;
    }, "Value must not equal arg.");

    $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Please check your input."
    );




    $('#videoEntryForm').validate({

            invalidHandler: function(event, validator) {
                // 'this' refers to the form
                var errors = validator.numberOfInvalids();
                console.log('there were '+errors+'errors');
                if (errors) {
                  var message = errors == 1
                    ? 'You missed 1 field. It has been highlighted'
                    : 'You missed ' + errors + ' fields. They have been highlighted';
                  $("div.error span").html(message);
                  $("div.error").show();
                } else {
                  $("div.error").hide();
                }
              },
            rules:{

                name : { required : true,
                        },

                url : { required : true,
                        

                        },

                active : {required : true,

                           },

                split : {required : true,

                           },


            },
            messages:{

                name: {
                            required : 'please enter the name of the video',


                },

                url: {
                            required : 'Please enter the url of the video',

                },

                active: {
                            required : 'Please specify whether this video will be active on the site',

                            },

                split: {
                            required : 'Please indicate whether the video will be split into chapters',

                },



            },

            submitHandler: function(form) {
                    
                    if (edit == 1){
                    
                    submitVideoNew();
                    
                    }if (edit == null){
	                    
	                    if (videoConfirm == 1){
		                    
		                    if (confirm('Did the video display properly?')){
			                    
			                      submitVideoNew();

			                    
		                    } else {
			                    
			                    videoConfirm = null;
			                    
			                    alert('Please re-enter the video url and try again');
			                    
			                    $('#videoDisplayContainer').html('');
			                    
			                    $("#submitList").html('Submit');

			                    
		                    }
		                    
		                    
		                    
	                    }else {
	                    
							preSubmitCheck();    
	                    }
	                    
                    }
                    
                 }


            });


    $('#content').on("click", "#submitList", (function() {
        $("#videoEntryForm").submit();


    }));






    });


    </script><?php








    // Include the footer file to complete the template:
    include($root .'/includes/footer.php');




    ?>
</body>
</html>
