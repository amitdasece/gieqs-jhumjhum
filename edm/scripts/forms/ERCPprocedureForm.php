
		
		
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
		    <title>ERCP Procedure Entry</title>
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
		                    <h2 style="text-align:left;">ERCP Procedure Data Entry</h2>
		                </div>
		
		                <div id="messageBox" class='col-3 yellow-light narrow center'>
		                    <p></p>
		                </div>
		            </div>
		
		
			        <p><?php
		
				        if ($id){
		
							$q = "SELECT  id  FROM  ERCPprocedure  WHERE  id  = $id";
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
		
					    <form id="ERCPprocedure">
						    
						    <?php 
       
        include($root . "/scripts/FormFunctions.php");
       
       ?>
          
       
        <?php 
              $iterationForm = 1;
              $sectionTitle = array();
                    $sectionTitle[0] = "";
                    $sectionTitle[1] = "Pre-procedure";
                    $sectionTitle[2] = "Indication";
                    $sectionTitle[3] = "Procedural technical details";
                    $sectionTitle[4] = "Cannulation and procedural details";
                    $sectionTitle[5] = "Intraprocedural adverse events";
                    $sectionTitle[6] = "Late adverse events";
                    $sectionTitle[7] = "Outcomes";
                   				
			
			
			//generate the patient numbers array
			
			$patients = array();
			
			$q = 'SELECT id from ERCPpatient';

			$result = $general->connection->RunQuery($q);
			
			if ($result->num_rows > 0){
			
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
							
							$id = $row['id'];
							
					
							$patients[$id] = $id;
					
					}
			
			}else{
				
				$patients[0] = 'Please enter some patients into the patients table first';
				
			}
			
			echo $formv1->generateSelectCustom('Patient id', 'patientid', '', $patients, '');
			echo '<br><br>';
			
			
              for($x = 1; $x <= 7; $x++) {
                  echo "<fieldset class=\"".$sectionTitle[$x]."\"><h3 style='text-align:left;'>".$sectionTitle[$x]."</h3>";
                  echo "<table class=\"comorbidity\">";
                  include($root . "/scripts/iterateForm.php");
                  echo "</table><br/></fieldset><br>";
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
						    <button id="submitERCPprocedure">Submit</button>
		
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
		
			 ERCPprocedurePassed = $("#id").text();
		
			if ( ERCPprocedurePassed == ""){
		
				var edit = 0;
		
			}else{
		
				var edit = 1;
		
			}
		
		
		
		
		
			function fillForm (idPassed){
		
				disableFormInputs("ERCPprocedure");
		
				ERCPprocedureRequired = new Object;
		
				ERCPprocedureRequired = getNamesFormElements("ERCPprocedure");
		
				ERCPprocedureString = '`id`=\''+idPassed+'\'';
		
				var selectorObject = getDataQuery ("ERCPprocedure", ERCPprocedureString, getNamesFormElements("ERCPprocedure"), 1);
		
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
				    
				    $("#messageBox").text("Editing ERCPprocedure id "+idPassed);
		
				    enableFormInputs("ERCPprocedure");
		
				});
		
				try {
		
					$("form#ERCPprocedure").find("button#deleteERCPprocedure").length();
		
				}catch(error){
		
					$("form#ERCPprocedure").find("button").after("<button id='deleteERCPprocedure'>Delete</button>");
		
				}
		
			}
		
		
			//delete behaviour
		
			function deleteERCPprocedure (){
		
				//ERCPprocedurePassed is the current record, some security to check its also that in the id field
		
				if (ERCPprocedurePassed != $("#id").text()){
		
					return;
		
				}
		
		
				if (confirm("Do you wish to delete this ERCPprocedure?")) {
		
					disableFormInputs("ERCPprocedure");
		
					var ERCPprocedureObject = pushDataFromFormAJAX("ERCPprocedure", "ERCPprocedure", "id", ERCPprocedurePassed, "2"); //delete ERCPprocedure
		
					ERCPprocedureObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("ERCPprocedure deleted");
								edit = 0;
								ERCPprocedurePassed = null;
								window.location.href = siteRoot + "scripts/forms/ERCPprocedureTable.php";
								//go to ERCPprocedure list
		
							}else {
		
							alert("Error, try again");
		
							enableFormInputs("ERCPprocedure");
		
						    }
		
		
		
						}
		
		
					});
		
				}
		
		
			}
		
			function submitERCPprocedureForm (){
		
				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
				if (edit == 0){
		
					var ERCPprocedureObject = pushDataFromFormAJAX("ERCPprocedure", "ERCPprocedure", "id", null, "0"); //insert new object
		
					ERCPprocedureObject.done(function (data){
		
						console.log(data);
		
						if (data){
		
							alert ("New ERCPprocedure no "+data+" created");
							edit = 1;
							$("#id").text(data);
							ERCPprocedurePassed = data;
							fillForm(data);
		
		
		
		
						}else {
		
							alert("No data inserted, try again");
		
						}
		
		
					});
		
				} else if (edit == 1){
		
					var ERCPprocedureObject = pushDataFromFormAJAX("ERCPprocedure", "ERCPprocedure", "id", ERCPprocedurePassed, "1"); //insert new object
		
					ERCPprocedureObject.done(function (data){
		
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
		
					fillForm(ERCPprocedurePassed);
		
				}else{
					
					$("#messageBox").text("New ERCPprocedure");
					
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
		
		
				$("#content").on('click', '#submitERCPprocedure', (function(event) {
			        event.preventDefault();
			        $('#ERCPprocedure').submit();
		
		
			    }));
		
			    $("#content").on('click', '#deleteERCPprocedure', (function(event) {
			        event.preventDefault();
			        deleteERCPprocedure();
		
		
			    }));
		
				$("#ERCPprocedure").validate({
		
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
				        patientid: {required: true},
yearlyERCPvolumeCenter: { required: true },   
yearlyERCPvolumeEndoscopist: { required: true },   
agepatient: { required: true },   
dateprocedure: { required: true },   
informedconsent: { required: true },   
antibiotics: { required: true },   
anticoagulants: { required: true },   
pancreatitisprevention: { required: true },   
indication: { required: true },   
bismuth: { required: true },   
gradeddifficultyERCP: { required: true },   
previousfailedERCP: { required: true },   
durationERCP: { required: true },   
timetocannulation: { required: true },   
fluoroscopytime: { required: true },   
fluoroscopydose: { required: true },   
positioninfrontofpapilla: { required: true },   
positionERCPscope: { required: true },   
nativepapilla: { required: true },   
duodenaldiverticulum: { required: true },   
cannulationbileductindicated: { required: true },   
cannulationbileduct: { required: true },   
biliarypapillotomy: { required: true },   
cannulationwirsungindicatied: { required: true },   
cannulationwirsung: { required: true },   
pancreaticpapillotomy: { required: true },   
contrastwirsung: { required: true },   
difficultcannulationapproach: { required: true },   
lithiasispresent: { required: true },   
lithiasisremoved: { required: true },   
indicationstenting: { required: true },   
stenting: { required: true },   
stentinglocation: { required: true },   
brushing: { required: true },   
dilatation: { required: true },   
perproceduraladverseevents: { required: true },   
bleedingtreatment: { required: true },   
hemostasis: { required: true },   
perforationtype: { required: true },   
perforationtreatment: { required: true },   
latecomplications: { required: true },   
severitypancreatitislate: { required: true },   
bleedingtreatmentlate: { required: true },   
hemostasislate: { required: true },   
perforationtypelate: { required: true },   
perforationtreatmentlate: { required: true },   
technicalsuccess: { required: true },   
clinicalsuccess: { required: true },   
additionaltreatmentneeded: { required: true },   
durationhospitalisation: { required: true },   
},messages: {
yearlyERCPvolumeCenter: { required: 'this field is required' },   
yearlyERCPvolumeEndoscopist: { required: 'this field is required' },   
agepatient: { required: 'this field is required' },   
dateprocedure: { required: 'this field is required' },   
informedconsent: { required: 'this field is required' },   
antibiotics: { required: 'this field is required' },   
anticoagulants: { required: 'this field is required' },   
pancreatitisprevention: { required: 'this field is required' },   
indication: { required: 'this field is required' },   
bismuth: { required: 'this field is required' },   
gradeddifficultyERCP: { required: 'this field is required' },   
previousfailedERCP: { required: 'this field is required' },   
durationERCP: { required: 'this field is required' },   
timetocannulation: { required: 'this field is required' },   
fluoroscopytime: { required: 'this field is required' },   
fluoroscopydose: { required: 'this field is required' },   
positioninfrontofpapilla: { required: 'this field is required' },   
positionERCPscope: { required: 'this field is required' },   
nativepapilla: { required: 'this field is required' },   
duodenaldiverticulum: { required: 'this field is required' },   
cannulationbileductindicated: { required: 'this field is required' },   
cannulationbileduct: { required: 'this field is required' },   
biliarypapillotomy: { required: 'this field is required' },   
cannulationwirsungindicatied: { required: 'this field is required' },   
cannulationwirsung: { required: 'this field is required' },   
pancreaticpapillotomy: { required: 'this field is required' },   
contrastwirsung: { required: 'this field is required' },   
difficultcannulationapproach: { required: 'this field is required' },   
lithiasispresent: { required: 'this field is required' },   
lithiasisremoved: { required: 'this field is required' },   
indicationstenting: { required: 'this field is required' },   
stenting: { required: 'this field is required' },   
stentinglocation: { required: 'this field is required' },   
brushing: { required: 'this field is required' },   
dilatation: { required: 'this field is required' },   
perproceduraladverseevents: { required: 'this field is required' },   
bleedingtreatment: { required: 'this field is required' },   
hemostasis: { required: 'this field is required' },   
perforationtype: { required: 'this field is required' },   
perforationtreatment: { required: 'this field is required' },   
latecomplications: { required: 'this field is required' },   
severitypancreatitislate: { required: 'this field is required' },   
bleedingtreatmentlate: { required: 'this field is required' },   
hemostasislate: { required: 'this field is required' },   
perforationtypelate: { required: 'this field is required' },   
perforationtreatmentlate: { required: 'this field is required' },   
technicalsuccess: { required: 'this field is required' },   
clinicalsuccess: { required: 'this field is required' },   
additionaltreatmentneeded: { required: 'this field is required' },   
durationhospitalisation: { required: 'this field is required' },   
},
			        submitHandler: function(form) {
		
			            submitERCPprocedureForm();
		
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