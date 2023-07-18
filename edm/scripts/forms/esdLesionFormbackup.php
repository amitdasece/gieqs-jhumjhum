
		
		
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
		    <title>esdLesion Form</title>
		</head>
		
		<?php
		//include($root . "/scripts/logobar.php");
		
		include($root . "/includes/naviERCP.php");
		?>
		
		<body>
		
			<div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>
		
		    <div id='content' class='content'>
		
		        <div class='responsiveContainer'>
		
			        <div class='row'>
		                <div class='col-9'>
		                    <h2 style="text-align:left;">Enter a new lesion for Upper GI ESD</h2>
		                </div>
		
		                <div id="messageBox" class='col-3 yellow-light narrow center'>
		                    <p></p>
		                </div>
		            </div>
		
		
			        <p><?php
		
				        if ($id){
		
							$q = "SELECT  _k_lesion  FROM  esdLesion  WHERE  _k_lesion  = $id";
							if ($general->returnYesNoDBQuery($q) != 1){
								echo "Passed id does not exist in the database";
								exit();
		
							}
						}
		
		?></p>
		
		
			        <p>
		
					    
						<?php 
						
						include($root . "/scripts/FormFunctionsESD.php");

						$iterationForm = 1;
						$sectionTitle = array();
						//$sectionTitle[0] = "";
						$sectionTitle[1] = "Patient Details";
						$sectionTitle[2] = "Pre-ESD";
						$sectionTitle[3] = "Procedural technical details";
						$sectionTitle[4] = "Lesion details";
						$sectionTitle[5] = "Adverse Events";
						$sectionTitle[6] = "Histology";
						$sectionTitle[7] = "Surgical data";
						$sectionTitle[8] = "First Surveillance";
						$sectionTitle[9] = "Second Surveillance";
						$sectionTitle[9] = "Most Recent Surveillance";
					
					
						echo '<form id="esdLesion">';
					for($x = 1; $x <= 9; $x++) {
						
						if ($x == 3 || $x == 5 || $x == 7 || $x == 9){

							echo "</div>";

						}
						
						echo "<div class='row'>";
						echo "<div class='col-5'>";
						echo "<fieldset class=\"".$sectionTitle[$x]."\"><h3 style='text-align:left;'>".$sectionTitle[$x]."</h3>";
						echo "<table class=\"comorbidity\">";
						include($root . "/scripts/iterateFormESD.php");
						echo "</table><br/></fieldset><br>";
						echo "</div>";
						echo "<div class='col-1'>";
						echo "</div>";
						if ($x == 2 || $x == 4 || $x === 6 || $x === 8){

							echo "</div>";

						}
						
						$iterationForm++;
					} 
						
		
?>
						    <button id="submitesdLesion">Submit</button>
		
					    
		
				        </p>
		
		
		
		        </div>
				 
		
		    </div>
			</form>
			
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
		
			 esdLesionPassed = $("#id").text();
		
			if ( esdLesionPassed == ""){
		
				var edit = 0;
		
			}else{
		
				var edit = 1;
		
			}
		
		
		
		
		
			function fillForm (idPassed){
		
				disableFormInputs("esdLesion");
		
				esdLesionRequired = new Object;
		
				esdLesionRequired = getNamesFormElements("esdLesion");
		
				esdLesionString = '`_k_lesion`=\''+idPassed+'\'';
		
				var selectorObject = getDataQuery ("esdLesion", esdLesionString, getNamesFormElements("esdLesion"), 1);
		
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
				    
				    $("#messageBox").text("Editing esdLesion id "+idPassed);
		
				    enableFormInputs("esdLesion");
		
				});
		
				try {
		
					$("form#esdLesion").find("button#deleteesdLesion").length();
		
				}catch(error){
		
					$("form#esdLesion").find("button").after("<button id='deleteesdLesion'>Delete</button>");
		
				}
		
			}
		
		
			//delete behaviour
		
			function deleteesdLesion (){
		
				//esdLesionPassed is the current record, some security to check its also that in the id field
		
				if (esdLesionPassed != $("#id").text()){
		
					return;
		
				}
		
		
				if (confirm("Do you wish to delete this esdLesion?")) {
		
					disableFormInputs("esdLesion");
		
					var esdLesionObject = pushDataFromFormAJAX("esdLesion", "esdLesion", "_k_lesion", esdLesionPassed, "2"); //delete esdLesion
		
					esdLesionObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("esdLesion deleted");
								edit = 0;
								esdLesionPassed = null;
								window.location.href = siteRoot + "scripts/forms/esdLesionTable.php";
								//go to esdLesion list
		
							}else {
		
							alert("Error, try again");
		
							enableFormInputs("esdLesion");
		
						    }
		
		
		
						}
		
		
					});
		
				}
		
		
			}
		
			function submitesdLesionForm (){
		
				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
				if (edit == 0){
		
					var esdLesionObject = pushDataFromFormAJAX("esdLesion", "esdLesion", "_k_lesion", null, "0"); //insert new object
		
					esdLesionObject.done(function (data){
		
						console.log(data);
		
						if (data){
		
							alert ("New esdLesion no "+data+" created");
							edit = 1;
							$("#id").text(data);
							esdLesionPassed = data;
							fillForm(data);
		
		
		
		
						}else {
		
							alert("No data inserted, try again");
		
						}
		
		
					});
		
				} else if (edit == 1){
		
					var esdLesionObject = pushDataFromFormAJAX("esdLesion", "esdLesion", "_k_lesion", esdLesionPassed, "1"); //insert new object
		
					esdLesionObject.done(function (data){
		
						console.log(data);
		
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
		
					fillForm(esdLesionPassed);
		
				}else{
					
					$("#messageBox").text("New esdLesion");
					
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
		
		
				$("#content").on('click', '#submitesdLesion', (function(event) {
			        event.preventDefault();
			        $('#esdLesion').submit();
		
		
			    }));
		
			    $("#content").on('click', '#deleteesdLesion', (function(event) {
			        event.preventDefault();
			        deleteesdLesion();
		
		
			    }));
		
				$("#esdLesion").validate({
		
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
			        },rules: {
					Karnofsky: { required: true },   
					WHO: { required: true },   
					},messages: {
					Karnofsky: { required: 'this field is required' },   
					WHO: { required: 'this field is required' },   
					},
			        submitHandler: function(form) {
		
			            submitesdLesionForm();
		
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