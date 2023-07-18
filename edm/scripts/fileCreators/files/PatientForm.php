
		
		
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
		    <title>Patient Form</title>
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
		                    <h2 style="text-align:left;">Patient Form</h2>
		                </div>
		
		                <div id="messageBox" class='col-3 yellow-light narrow center'>
		                    <p></p>
		                </div>
		            </div>
		
		
			        <p><?php
		
				        if ($id){
		
							$q = "SELECT  _k_patient  FROM  Patient  WHERE  _k_patient  = $id";
							if ($general->returnYesNoDBQuery($q) != 1){
								echo "Passed id does not exist in the database";
								exit();
		
							}
						}
		
		?></p>
		
		
			        <p>
		
					    <form id="Patient">
					    <?php echo $formv1->generateText('_k_patient', '_k_patient', '', 'tooltip here');
echo $formv1->generateText('_k_referrer', '_k_referrer', '', 'tooltip here');
echo $formv1->generateText('Sex', 'Sex', '', 'tooltip here');
echo $formv1->generateText('Age', 'Age', '', 'tooltip here');
echo $formv1->generateText('Institution', 'Institution', '', 'tooltip here');
echo $formv1->generateText('ProspectiveEthics', 'ProspectiveEthics', '', 'tooltip here');
echo $formv1->generateText('Family_Hx', 'Family_Hx', '', 'tooltip here');
echo $formv1->generateText('Number_affected_FH', 'Number_affected_FH', '', 'tooltip here');
echo $formv1->generateText('Relationship_1', 'Relationship_1', '', 'tooltip here');
echo $formv1->generateText('Age_1_FH', 'Age_1_FH', '', 'tooltip here');
echo $formv1->generateText('Relationship_2', 'Relationship_2', '', 'tooltip here');
echo $formv1->generateText('Age_2_FH', 'Age_2_FH', '', 'tooltip here');
?>
						    <button id="submitPatient">Submit</button>
		
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
		
			 PatientPassed = $("#id").text();
		
			if ( PatientPassed == ""){
		
				var edit = 0;
		
			}else{
		
				var edit = 1;
		
			}
		
		
		
		
		
			function fillForm (idPassed){
		
				disableFormInputs("Patient");
		
				PatientRequired = new Object;
		
				PatientRequired = getNamesFormElements("Patient");
		
				PatientString = '`_k_patient`=\''+idPassed+'\'';
		
				var selectorObject = getDataQuery ("Patient", PatientString, getNamesFormElements("Patient"), 1);
		
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
				    
				    $("#messageBox").text("Editing Patient id "+idPassed);
		
				    enableFormInputs("Patient");
		
				});
		
				try {
		
					$("form#Patient").find("button#deletePatient").length();
		
				}catch(error){
		
					$("form#Patient").find("button").after("<button id='deletePatient'>Delete</button>");
		
				}
		
			}
		
		
			//delete behaviour
		
			function deletePatient (){
		
				//PatientPassed is the current record, some security to check its also that in the id field
		
				if (PatientPassed != $("#id").text()){
		
					return;
		
				}
		
		
				if (confirm("Do you wish to delete this Patient?")) {
		
					disableFormInputs("Patient");
		
					var PatientObject = pushDataFromFormAJAX("Patient", "Patient", "_k_patient", PatientPassed, "2"); //delete Patient
		
					PatientObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("Patient deleted");
								edit = 0;
								PatientPassed = null;
								window.location.href = siteRoot + "scripts/forms/PatientTable.php";
								//go to Patient list
		
							}else {
		
							alert("Error, try again");
		
							enableFormInputs("Patient");
		
						    }
		
		
		
						}
		
		
					});
		
				}
		
		
			}
		
			function submitPatientForm (){
		
				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
				if (edit == 0){
		
					var PatientObject = pushDataFromFormAJAX("Patient", "Patient", "_k_patient", null, "0"); //insert new object
		
					PatientObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							alert ("New Patient no "+data+" created");
							edit = 1;
							$("#id").text(data);
							PatientPassed = data;
							fillForm(data);
		
		
		
		
						}else {
		
							alert("No data inserted, try again");
		
						}
		
		
					});
		
				} else if (edit == 1){
		
					var PatientObject = pushDataFromFormAJAX("Patient", "Patient", "_k_patient", PatientPassed, "1"); //insert new object
		
					PatientObject.done(function (data){
		
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
		
					fillForm(PatientPassed);
		
				}else{
					
					$("#messageBox").text("New Patient");
					
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
		
		
				$("#content").on('click', '#submitPatient', (function(event) {
			        event.preventDefault();
			        $('#Patient').submit();
		
		
			    }));
		
			    $("#content").on('click', '#deletePatient', (function(event) {
			        event.preventDefault();
			        deletePatient();
		
		
			    }));
		
				$("#Patient").validate({
		
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
		
			            submitPatientForm();
		
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