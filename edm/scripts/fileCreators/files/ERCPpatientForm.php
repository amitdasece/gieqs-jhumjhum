
		
		
			<?php
		
			require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');
		
			$formv1 = new formGenerator;
			$general = new general;
			$video = new video;
			$tagCategories = new tagCategories;
		
		
		
		foreach ($_GET as $k=>$v){
		
			$sanitised = $general->sanitiseInput($v);
			$_GET[$k] = $sanitised;
		
		
		}
		
		if (isset($_GET["id"]) && is_numeric($_GET["id"])){
			$id = $_GET["id"];
		
		}else{
		
			$id = null;
		
		}
		
		
		
		//TERMINATE THE SCRIPT IF NOT A SUPERUSER
		
		
		
		// Page content
		?>
		<!DOCTYPE html PUBLIC '-//W3C//DTD HTML 4.01//EN'>
		
		<html>
		<head>
		    <title>ERCPpatient Form</title>
		</head>
		
		<?php
		include($root . "/scripts/logobar.php");
		
		include($root . "/includes/naviCreator.php");
		?>
		
		<body>
		
			<div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>
		
		    <div id='content' class='content'>
		
		        <div class='responsiveContainer white'>
		
			        <div class='row'>
		                <div class='col-9'>
		                    <h2 style="text-align:left;">ERCPpatient Form</h2>
		                </div>
		
		                <div id="messageBox" class='col-3 yellow-light narrow center'>
		                    <p></p>
		                </div>
		            </div>
		
		
			        <p><?php
		
				        if ($id){
		
							$q = "SELECT  id  FROM  ERCPpatient  WHERE  id  = $id";
							if ($general->returnYesNoDBQuery($q) != 1){
								echo "Passed id does not exist in the database";
								exit();
		
							}
						}
		
		?></p>
		
		
			        <p>
		
					    <form id="ERCPpatient">
					    <?php echo $formv1->generateText('Karnofsky', 'Karnofsky', '', 'tooltip here');
echo $formv1->generateText('WHO', 'WHO', '', 'tooltip here');
?>
						    <button id="submitERCPpatient">Submit</button>
		
					    </form>
		
				        </p>
		
		
		
		        </div>
		
		    </div>
		<script>
			switch (true) {
	case winLocation('endoscopy.wiki'):

		var rootFolder = 'https://www.endoscopy.wiki/esd/';
		break;
	case winLocation('localhost'):
		var rootFolder = 'http://localhost:90/dashboard/esd/';
		break;
	default: // set whatever you want
		var rootFolder = 'https://www.endoscopy.wiki/esd/';
		break;
}

			var siteRoot = rootFolder;
		
			 ERCPpatientPassed = $("#id").text();
		
			if ( ERCPpatientPassed == ""){
		
				var edit = 0;
		
			}else{
		
				var edit = 1;
		
			}
		
		
		
		
		
			function fillForm (idPassed){
		
				disableFormInputs("ERCPpatient");
		
				ERCPpatientRequired = new Object;
		
				ERCPpatientRequired = getNamesFormElements("ERCPpatient");
		
				ERCPpatientString = '`id`=\''+idPassed+'\'';
		
				var selectorObject = getDataQuery ("ERCPpatient", ERCPpatientString, getNamesFormElements("ERCPpatient"), 1);
		
				//console.log(selectorObject);
		
				selectorObject.done(function (data){
		
					//console.log(data);
		
					var formData = $.parseJSON(data);
		
		
				    $(formData).each(function(i,val){
					    $.each(val,function(k,v){
					        $("#"+k).val(v);
					        //console.log(k+' : '+ v);
					    });
		
				    });
				    
				    $("#messageBox").text("Editing ERCPpatient id "+idPassed);
		
				    enableFormInputs("ERCPpatient");
		
				});
		
				try {
		
					$("form#ERCPpatient").find("button#deleteERCPpatient").length();
		
				}catch(error){
		
					$("form#ERCPpatient").find("button").after("<button id='deleteERCPpatient'>Delete</button>");
		
				}
		
			}
		
		
			//delete behaviour
		
			function deleteERCPpatient (){
		
				//ERCPpatientPassed is the current record, some security to check its also that in the id field
		
				if (ERCPpatientPassed != $("#id").text()){
		
					return;
		
				}
		
		
				if (confirm("Do you wish to delete this ERCPpatient?")) {
		
					disableFormInputs("ERCPpatient");
		
					var ERCPpatientObject = pushDataFromFormAJAX("ERCPpatient", "ERCPpatient", "id", ERCPpatientPassed, "2"); //delete ERCPpatient
		
					ERCPpatientObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("ERCPpatient deleted");
								edit = 0;
								ERCPpatientPassed = null;
								window.location.href = siteRoot + "scripts/forms/ERCPpatientTable.php";
								//go to ERCPpatient list
		
							}else {
		
							alert("Error, try again");
		
							enableFormInputs("ERCPpatient");
		
						    }
		
		
		
						}
		
		
					});
		
				}
		
		
			}
		
			function submitERCPpatientForm (){
		
				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
				if (edit == 0){
		
					var ERCPpatientObject = pushDataFromFormAJAX("ERCPpatient", "ERCPpatient", "id", null, "0"); //insert new object
		
					ERCPpatientObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							alert ("New ERCPpatient no "+data+" created");
							edit = 1;
							$("#id").text(data);
							ERCPpatientPassed = data;
							fillForm(data);
		
		
		
		
						}else {
		
							alert("No data inserted, try again");
		
						}
		
		
					});
		
				} else if (edit == 1){
		
					var ERCPpatientObject = pushDataFromFormAJAX("ERCPpatient", "ERCPpatient", "id", ERCPpatientPassed, "1"); //insert new object
		
					ERCPpatientObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("Data updated");
								edit = 1;
		
							} else if (data == 0) {
		
							alert("No change in data detected");
		
						    } else if (data == 2) {
		
							alert("Error, try again");
		
						    }
		
		
		
						}
		
		
					});
		
		
		
		
				}
		
		
			}
		
			$(document).ready(function() {
		
				if (edit == 1){
		
					fillForm(ERCPpatientPassed);
		
				}else{
					
					$("#messageBox").text("New ERCPpatient");
					
				}
		
				
		
			  	var titleGraphic = $(".title").height();
				var titleBar = $("#menu").height();
				$(".title").css('height',(titleBar));
		
		
				$(window).resize(function () {
			    waitForFinalEvent(function(){
			      //alert("Resize...");
			      var titleGraphic = $(".title").height();
				  var titleBar = $("#menu").height();
				  $(".title").css('height',(titleBar));
		
			    }, 100, 'Resize header');
					});
		
		
				$("#content").on('click', '#submitERCPpatient', (function(event) {
			        event.preventDefault();
			        $('#ERCPpatient').submit();
		
		
			    }));
		
			    $("#content").on('click', '#deleteERCPpatient', (function(event) {
			        event.preventDefault();
			        deleteERCPpatient();
		
		
			    }));
		
				$("#ERCPpatient").validate({
		
			        invalidHandler: function(event, validator) {
			            var errors = validator.numberOfInvalids();
			            console.log("there were " + errors + "errors");
			            if (errors) {
			                var message = errors == 1 ?
			                    "You missed 1 field. It has been highlighted" :
			                    "You missed " + errors + " fields. They have been highlighted";
			                $('div.error span').html(message);
			                $('div.error').show();
			            } else {
			                $('div.error').hide();
			            }
			        },
			        submitHandler: function(form) {
		
			            submitERCPpatientForm();
		
			          	console.log("submitted form");
		
		
		
			    }
		
		
		
		
		    });
		
		})
		
			</script>
		<?php
		
		    // Include the footer file to complete the template:
		    include($root ."/includes/footer.php");
		
		
		
		
		    ?>
		</body>
		</html>