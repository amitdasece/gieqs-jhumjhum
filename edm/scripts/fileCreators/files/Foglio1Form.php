
		
		
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
		    <title>Foglio1 Form</title>
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
		                    <h2 style="text-align:left;">Foglio1 Form</h2>
		                </div>
		
		                <div id="messageBox" class='col-3 yellow-light narrow center'>
		                    <p></p>
		                </div>
		            </div>
		
		
			        <p><?php
		
				        if ($id){
		
							$q = "SELECT  Position  FROM  Foglio1  WHERE  Position  = $id";
							if ($general->returnYesNoDBQuery($q) != 1){
								echo "Passed id does not exist in the database";
								exit();
		
							}
						}
		
		?></p>
		
		
			        <p>
		
					    <form id="Foglio1">
					    <?php echo $formv1->generateText('Position', 'Position', '', 'tooltip here');
echo $formv1->generateText('Text', 'Text', '', 'tooltip here');
?>
						    <button id="submitFoglio1">Submit</button>
		
					    </form>
		
				        </p>
		
		
		
		        </div>
		
		    </div>
		<script>
			var siteRoot = "http://localhost:90/dashboard/esd/";
		
			 Foglio1Passed = $("#id").text();
		
			if ( Foglio1Passed == ""){
		
				var edit = 0;
		
			}else{
		
				var edit = 1;
		
			}
		
		
		
		
		
			function fillForm (idPassed){
		
				disableFormInputs("Foglio1");
		
				Foglio1Required = new Object;
		
				Foglio1Required = getNamesFormElements("Foglio1");
		
				Foglio1String = '`Position`=\''+idPassed+'\'';
		
				var selectorObject = getDataQuery ("Foglio1", Foglio1String, getNamesFormElements("Foglio1"), 1);
		
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
				    
				    $("#messageBox").text("Editing Foglio1 id "+idPassed);
		
				    enableFormInputs("Foglio1");
		
				});
		
				try {
		
					$("form#Foglio1").find("button#deleteFoglio1").length();
		
				}catch(error){
		
					$("form#Foglio1").find("button").after("<button id='deleteFoglio1'>Delete</button>");
		
				}
		
			}
		
		
			//delete behaviour
		
			function deleteFoglio1 (){
		
				//Foglio1Passed is the current record, some security to check its also that in the id field
		
				if (Foglio1Passed != $("#id").text()){
		
					return;
		
				}
		
		
				if (confirm("Do you wish to delete this Foglio1?")) {
		
					disableFormInputs("Foglio1");
		
					var Foglio1Object = pushDataFromFormAJAX("Foglio1", "Foglio1", "Position", Foglio1Passed, "2"); //delete Foglio1
		
					Foglio1Object.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("Foglio1 deleted");
								edit = 0;
								Foglio1Passed = null;
								window.location.href = siteRoot + "scripts/forms/Foglio1Table.php";
								//go to Foglio1 list
		
							}else {
		
							alert("Error, try again");
		
							enableFormInputs("Foglio1");
		
						    }
		
		
		
						}
		
		
					});
		
				}
		
		
			}
		
			function submitFoglio1Form (){
		
				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
				if (edit == 0){
		
					var Foglio1Object = pushDataFromFormAJAX("Foglio1", "Foglio1", "Position", null, "0"); //insert new object
		
					Foglio1Object.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							alert ("New Foglio1 no "+data+" created");
							edit = 1;
							$("#id").text(data);
							Foglio1Passed = data;
							fillForm(data);
		
		
		
		
						}else {
		
							alert("No data inserted, try again");
		
						}
		
		
					});
		
				} else if (edit == 1){
		
					var Foglio1Object = pushDataFromFormAJAX("Foglio1", "Foglio1", "Position", Foglio1Passed, "1"); //insert new object
		
					Foglio1Object.done(function (data){
		
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
		
					fillForm(Foglio1Passed);
		
				}else{
					
					$("#messageBox").text("New Foglio1");
					
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
		
		
				$("#content").on('click', '#submitFoglio1', (function(event) {
			        event.preventDefault();
			        $('#Foglio1').submit();
		
		
			    }));
		
			    $("#content").on('click', '#deleteFoglio1', (function(event) {
			        event.preventDefault();
			        deleteFoglio1();
		
		
			    }));
		
				$("#Foglio1").validate({
		
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
		
			            submitFoglio1Form();
		
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