
		
		
			<?php
		
			
		$openaccess = 0;
		$requiredUserLevel = 4;
		
		require ('../../includes/config.inc.php');		
		
		require (BASE_URI1.'/scripts/headerCreatorV2.php');

		
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
		
		include($root . "/includes/naviERCP.php");
		?>
		
		<body>
		
			<div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>
		
		    <div id='content' class='content'>
		
		        <div class='responsiveContainer'>
		
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
		
		
			      
						    
						     <div class='row'>
			  <div class='col-2'></div>
		                <div class='col-8'>

			        <p>
		
					    <form id="ERCPpatient">
						    
						    <?php 
       
        include($root . "/scripts/FormFunctions.php");
       
       ?>
          
       
        <?php 
              $iterationForm = 1;
              $sectionTitle = array();
                    $sectionTitle[0] = "";
                    $sectionTitle[1] = "Patient data";
                                      				
			
			
			//generate the patient numbers array
			
			
			
			
              for($x = 1; $x <= 1; $x++) {
                  echo "<fieldset class=\"".$sectionTitle[$x]."\"><h3>".$sectionTitle[$x]."</h3>";
                  echo "<table class=\"comorbidity\">";
                  include($root . "/scripts/iteratePatientForm.php");
                  echo "</table><br/></fieldset>";
                  $iterationForm++;
              } 
    
          
              
       ?>

						    
						    
						    
					    <?php /*echo $formv1->generateText('yearlyERCPvolumeCenter', 'yearlyERCPvolumeCenter', '', 'tooltip here');
echo $formv1->generateText('yearlyERCPvolumeEndoscopist', 'yearlyERCPvolumeEndoscopist', '', 'tooltip here');
echo $formv1->generateText('agepatient', 'agepatient', '', 'tooltip here');
echo $formv1->generateText('dateprocedure', 'dateprocedure', '', 'tooltip here');
echo $formv1->generateText('informedconsent', 'informedconsent', '', 'tooltip here');
echo $formv1->generateText('antibiotics', 'antibiotics', '', 'tooltip here');
echo $formv1->generateText('anticoagulants', 'anticoagulants', '', 'tooltip here');
echo $formv1->generateText('pancreatitisprevention', 'pancreatitisprevention', '', 'tooltip here');
echo $formv1->generateText('indication', 'indication', '', 'tooltip here');
echo $formv1->generateText('bismuth', 'bismuth', '', 'tooltip here');
echo $formv1->generateText('gradeddifficultyERCP', 'gradeddifficultyERCP', '', 'tooltip here');
echo $formv1->generateText('previousfailedERCP', 'previousfailedERCP', '', 'tooltip here');
echo $formv1->generateText('durationERCP', 'durationERCP', '', 'tooltip here');
echo $formv1->generateText('timetocannulation', 'timetocannulation', '', 'tooltip here');
echo $formv1->generateText('fluoroscopytime', 'fluoroscopytime', '', 'tooltip here');
echo $formv1->generateText('fluoroscopydose', 'fluoroscopydose', '', 'tooltip here');
echo $formv1->generateText('positioninfrontofpapilla', 'positioninfrontofpapilla', '', 'tooltip here');
echo $formv1->generateText('positionERCPscope', 'positionERCPscope', '', 'tooltip here');
echo $formv1->generateText('nativepapilla', 'nativepapilla', '', 'tooltip here');
echo $formv1->generateText('duodenaldiverticulum', 'duodenaldiverticulum', '', 'tooltip here');
echo $formv1->generateText('cannulationbileductindicated', 'cannulationbileductindicated', '', 'tooltip here');
echo $formv1->generateText('cannulationbileduct', 'cannulationbileduct', '', 'tooltip here');
echo $formv1->generateText('biliarypapillotomy', 'biliarypapillotomy', '', 'tooltip here');
echo $formv1->generateText('cannulationwirsungindicatied', 'cannulationwirsungindicatied', '', 'tooltip here');
echo $formv1->generateText('cannulationwirsung', 'cannulationwirsung', '', 'tooltip here');
echo $formv1->generateText('pancreaticpapillotomy', 'pancreaticpapillotomy', '', 'tooltip here');
echo $formv1->generateText('contrastwirsung', 'contrastwirsung', '', 'tooltip here');
echo $formv1->generateText('difficultcannulationapproach', 'difficultcannulationapproach', '', 'tooltip here');
echo $formv1->generateText('lithiasispresent', 'lithiasispresent', '', 'tooltip here');
echo $formv1->generateText('lithiasisremoved', 'lithiasisremoved', '', 'tooltip here');
echo $formv1->generateText('indicationstenting', 'indicationstenting', '', 'tooltip here');
echo $formv1->generateText('stenting', 'stenting', '', 'tooltip here');
echo $formv1->generateText('stentinglocation', 'stentinglocation', '', 'tooltip here');
echo $formv1->generateText('brushing', 'brushing', '', 'tooltip here');
echo $formv1->generateText('dilatation', 'dilatation', '', 'tooltip here');
echo $formv1->generateText('perproceduraladverseevents', 'perproceduraladverseevents', '', 'tooltip here');
echo $formv1->generateText('bleedingtreatment', 'bleedingtreatment', '', 'tooltip here');
echo $formv1->generateText('hemostasis', 'hemostasis', '', 'tooltip here');
echo $formv1->generateText('perforationtype', 'perforationtype', '', 'tooltip here');
echo $formv1->generateText('perforationtreatment', 'perforationtreatment', '', 'tooltip here');
echo $formv1->generateText('latecomplications', 'latecomplications', '', 'tooltip here');
echo $formv1->generateText('severitypancreatitislate', 'severitypancreatitislate', '', 'tooltip here');
echo $formv1->generateText('bleedingtreatmentlate', 'bleedingtreatmentlate', '', 'tooltip here');
echo $formv1->generateText('hemostasislate', 'hemostasislate', '', 'tooltip here');
echo $formv1->generateText('perforationtypelate', 'perforationtypelate', '', 'tooltip here');
echo $formv1->generateText('perforationtreatmentlate', 'perforationtreatmentlate', '', 'tooltip here');
echo $formv1->generateText('technicalsuccess', 'technicalsuccess', '', 'tooltip here');
echo $formv1->generateText('clinicalsuccess', 'clinicalsuccess', '', 'tooltip here');
echo $formv1->generateText('additionaltreatmentneeded', 'additionaltreatmentneeded', '', 'tooltip here');
echo $formv1->generateText('durationhospitalisation', 'durationhospitalisation', '', 'tooltip here');
*/?>
						    <button id="submitERCPpatient">Submit</button>
		
					    </form>
		
				        </p>
		                </div>
		                 <div class='col-2'></div>
		               

		 </div>
						    
						    
						    
					    		
		
		        </div>
		
		    </div>
		<script>
			switch (true) {
			case winLocation('gieqs.com'):

				var rootFolder = 'https://www.gieqs.com/edm/';
				break;

			case winLocation('localhost'):
				var rootFolder = 'http://localhost:90/dashboard/gieqs/edm/';
				break;

			default: // set whatever you want
				var rootFolder = 'https://www.gieqs.com/edm/';
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
					
					//console.dir(ERCPpatientObject);
		
					ERCPpatientObject.done(function (data){
		
						console.log(data);
		
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
			        },rules: {
Karnofsky: { required: true },   
WHO: { required: true },   
},messages: {
Karnofsky: { required: 'this field is required' },   
WHO: { required: 'this field is required' },   
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