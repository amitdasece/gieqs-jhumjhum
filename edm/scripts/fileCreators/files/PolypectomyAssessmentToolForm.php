
		
		
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
		    <title>PolypectomyAssessmentTool Form</title>
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
		                    <h2 style="text-align:left;">PolypectomyAssessmentTool Form</h2>
		                </div>
		
		                <div id="messageBox" class='col-3 yellow-light narrow center'>
		                    <p></p>
		                </div>
		            </div>
		
		
			        <p><?php
		
				        if ($id){
		
							$q = "SELECT  id  FROM  PolypectomyAssessmentTool  WHERE  id  = $id";
							if ($general->returnYesNoDBQuery($q) != 1){
								echo "Passed id does not exist in the database";
								exit();
		
							}
						}
		
		?></p>
		
		
			        <p>
		
					    <form id="PolypectomyAssessmentTool">
					    <?php echo $formv1->generateText('AGE', 'AGE', '', 'tooltip here');
echo $formv1->generateText('Sex', 'Sex', '', 'tooltip here');
echo $formv1->generateText('OnlyLesion', 'OnlyLesion', '', 'tooltip here');
echo $formv1->generateText('SMSASize', 'SMSASize', '', 'tooltip here');
echo $formv1->generateText('SMSAMorphology', 'SMSAMorphology', '', 'tooltip here');
echo $formv1->generateText('SMSASite', 'SMSASite', '', 'tooltip here');
echo $formv1->generateText('SMSAAccess', 'SMSAAccess', '', 'tooltip here');
echo $formv1->generateText('Paris', 'Paris', '', 'tooltip here');
echo $formv1->generateText('Location', 'Location', '', 'tooltip here');
echo $formv1->generateText('Morphology', 'Morphology', '', 'tooltip here');
echo $formv1->generateText('ColonCleanliness', 'ColonCleanliness', '', 'tooltip here');
echo $formv1->generateText('Dateofprocedure', 'Dateofprocedure', '', 'tooltip here');
echo $formv1->generateText('AssessorName', 'AssessorName', '', 'tooltip here');
echo $formv1->generateText('AssessorGrade', 'AssessorGrade', '', 'tooltip here');
echo $formv1->generateText('AssesseeName', 'AssesseeName', '', 'tooltip here');
echo $formv1->generateText('AssesseeGrade', 'AssesseeGrade', '', 'tooltip here');
echo $formv1->generateText('ExperienceAssessor', 'ExperienceAssessor', '', 'tooltip here');
echo $formv1->generateText('ExperienceAssessee', 'ExperienceAssessee', '', 'tooltip here');
echo $formv1->generateText('PatientConsentObtained', 'PatientConsentObtained', '', 'tooltip here');
echo $formv1->generateText('PatientComorbidity', 'PatientComorbidity', '', 'tooltip here');
echo $formv1->generateText('Anticoagulant', 'Anticoagulant', '', 'tooltip here');
echo $formv1->generateText('AnticoagulantTherapy', 'AnticoagulantTherapy', '', 'tooltip here');
echo $formv1->generateText('Antibiotics', 'Antibiotics', '', 'tooltip here');
echo $formv1->generateText('ProphylacticAntibiotics', 'ProphylacticAntibiotics', '', 'tooltip here');
echo $formv1->generateText('PatientCorrectlyPositioned', 'PatientCorrectlyPositioned', '', 'tooltip here');
echo $formv1->generateText('PlateOn', 'PlateOn', '', 'tooltip here');
echo $formv1->generateText('MetalImplant', 'MetalImplant', '', 'tooltip here');
echo $formv1->generateText('AccurateSizeDetermination', 'AccurateSizeDetermination', '', 'tooltip here');
echo $formv1->generateText('HighestKudoAssessor', 'HighestKudoAssessor', '', 'tooltip here');
echo $formv1->generateText('HighestKudoAssessee', 'HighestKudoAssessee', '', 'tooltip here');
echo $formv1->generateText('HighestNICEAssessor', 'HighestNICEAssessor', '', 'tooltip here');
echo $formv1->generateText('HighestNICEAssessee', 'HighestNICEAssessee', '', 'tooltip here');
echo $formv1->generateText('RiskSMICAssessor', 'RiskSMICAssessor', '', 'tooltip here');
echo $formv1->generateText('RiskSMICAssessee', 'RiskSMICAssessee', '', 'tooltip here');
echo $formv1->generateText('En-blocResection', 'En-blocResection', '', 'tooltip here');
echo $formv1->generateText('En-bloc', 'En-bloc', '', 'tooltip here');
echo $formv1->generateText('AttemptBeyondCapabilities', 'AttemptBeyondCapabilities', '', 'tooltip here');
echo $formv1->generateText('Piecemeal', 'Piecemeal', '', 'tooltip here');
echo $formv1->generateText('Access', 'Access', '', 'tooltip here');
echo $formv1->generateText('Pressure', 'Pressure', '', 'tooltip here');
echo $formv1->generateText('LesionPosition', 'LesionPosition', '', 'tooltip here');
echo $formv1->generateText('Retroflexion', 'Retroflexion', '', 'tooltip here');
echo $formv1->generateText('ScopeUsed', 'ScopeUsed', '', 'tooltip here');
echo $formv1->generateText('Insufflation', 'Insufflation', '', 'tooltip here');
echo $formv1->generateText('Cap', 'Cap', '', 'tooltip here');
echo $formv1->generateText('Antispasmodics', 'Antispasmodics', '', 'tooltip here');
echo $formv1->generateText('OptimisesAccess', 'OptimisesAccess', '', 'tooltip here');
echo $formv1->generateText('LiftAtOnce', 'LiftAtOnce', '', 'tooltip here');
echo $formv1->generateText('Sequential_Inj_Res', 'Sequential_Inj_Res', '', 'tooltip here');
echo $formv1->generateText('ImproveAccess', 'ImproveAccess', '', 'tooltip here');
echo $formv1->generateText('AirExpelled', 'AirExpelled', '', 'tooltip here');
echo $formv1->generateText('InjectionThroughMalignant', 'InjectionThroughMalignant', '', 'tooltip here');
echo $formv1->generateText('NeedleTangential', 'NeedleTangential', '', 'tooltip here');
echo $formv1->generateText('DynamicInjection', 'DynamicInjection', '', 'tooltip here');
echo $formv1->generateText('IntramucosalBlebs', 'IntramucosalBlebs', '', 'tooltip here');
echo $formv1->generateText('IntramucosalBlebsTreatment', 'IntramucosalBlebsTreatment', '', 'tooltip here');
echo $formv1->generateText('Lifting', 'Lifting', '', 'tooltip here');
echo $formv1->generateText('StopInjection', 'StopInjection', '', 'tooltip here');
echo $formv1->generateText('AppropriateLift', 'AppropriateLift', '', 'tooltip here');
echo $formv1->generateText('NarrowSegment', 'NarrowSegment', '', 'tooltip here');
echo $formv1->generateText('AppropriateSnare', 'AppropriateSnare', '', 'tooltip here');
echo $formv1->generateText('AppropriateSize', 'AppropriateSize', '', 'tooltip here');
echo $formv1->generateText('StartsAtTheEdge', 'StartsAtTheEdge', '', 'tooltip here');
echo $formv1->generateText('LongAxis', 'LongAxis', '', 'tooltip here');
echo $formv1->generateText('Aspiration', 'Aspiration', '', 'tooltip here');
echo $formv1->generateText('TipVisualisation', 'TipVisualisation', '', 'tooltip here');
echo $formv1->generateText('StopClosureSnare', 'StopClosureSnare', '', 'tooltip here');
echo $formv1->generateText('EndoscopistSnare', 'EndoscopistSnare', '', 'tooltip here');
echo $formv1->generateText('SnareClosure', 'SnareClosure', '', 'tooltip here');
echo $formv1->generateText('TissueMobility', 'TissueMobility', '', 'tooltip here');
echo $formv1->generateText('TactileFeedback', 'TactileFeedback', '', 'tooltip here');
echo $formv1->generateText('GoodResection_Piecemeal', 'GoodResection_Piecemeal', '', 'tooltip here');
echo $formv1->generateText('GoodResection_EnBloc', 'GoodResection_EnBloc', '', 'tooltip here');
echo $formv1->generateText('SpeedOfClosure', 'SpeedOfClosure', '', 'tooltip here');
echo $formv1->generateText('ColdSnare', 'ColdSnare', '', 'tooltip here');
echo $formv1->generateText('CorrectSettingsEnsured', 'CorrectSettingsEnsured', '', 'tooltip here');
echo $formv1->generateText('StablePosition', 'StablePosition', '', 'tooltip here');
echo $formv1->generateText('CheckHaemostatics', 'CheckHaemostatics', '', 'tooltip here');
echo $formv1->generateText('UsesDistension', 'UsesDistension', '', 'tooltip here');
echo $formv1->generateText('MobilityChecks', 'MobilityChecks', '', 'tooltip here');
echo $formv1->generateText('DiathermyApplication', 'DiathermyApplication', '', 'tooltip here');
echo $formv1->generateText('StopsIfNoTransection', 'StopsIfNoTransection', '', 'tooltip here');
echo $formv1->generateText('StopDiathermy', 'StopDiathermy', '', 'tooltip here');
echo $formv1->generateText('NLA', 'NLA', '', 'tooltip here');
echo $formv1->generateText('NLATreatment', 'NLATreatment', '', 'tooltip here');
echo $formv1->generateText('SecondLine', 'SecondLine', '', 'tooltip here');
echo $formv1->generateText('IPB', 'IPB', '', 'tooltip here');
echo $formv1->generateText('CauseOfBleedingIdentified', 'CauseOfBleedingIdentified', '', 'tooltip here');
echo $formv1->generateText('PatientPosition', 'PatientPosition', '', 'tooltip here');
echo $formv1->generateText('MildBleeding', 'MildBleeding', '', 'tooltip here');
echo $formv1->generateText('STSCNeeded', 'STSCNeeded', '', 'tooltip here');
echo $formv1->generateText('STSC', 'STSC', '', 'tooltip here');
echo $formv1->generateText('Coag', 'Coag', '', 'tooltip here');
echo $formv1->generateText('CoagForceps', 'CoagForceps', '', 'tooltip here');
echo $formv1->generateText('SevereBleeding', 'SevereBleeding', '', 'tooltip here');
echo $formv1->generateText('NotControlledBleeding', 'NotControlledBleeding', '', 'tooltip here');
echo $formv1->generateText('NotControlledBleeding_1', 'NotControlledBleeding_1', '', 'tooltip here');
echo $formv1->generateText('CompleteBleedingControl', 'CompleteBleedingControl', '', 'tooltip here');
echo $formv1->generateText('Perforation', 'Perforation', '', 'tooltip here');
echo $formv1->generateText('SydneyDMIScore', 'SydneyDMIScore', '', 'tooltip here');
echo $formv1->generateText('ClosureRequired', 'ClosureRequired', '', 'tooltip here');
echo $formv1->generateText('PriorClosure', 'PriorClosure', '', 'tooltip here');
echo $formv1->generateText('ClipUses', 'ClipUses', '', 'tooltip here');
echo $formv1->generateText('TTSTechnique', 'TTSTechnique', '', 'tooltip here');
echo $formv1->generateText('TTSNotUsed', 'TTSNotUsed', '', 'tooltip here');
echo $formv1->generateText('OTSCTechnique', 'OTSCTechnique', '', 'tooltip here');
echo $formv1->generateText('CompleteClosure', 'CompleteClosure', '', 'tooltip here');
echo $formv1->generateText('AntibioticsPostPerf', 'AntibioticsPostPerf', '', 'tooltip here');
echo $formv1->generateText('Ctscan', 'Ctscan', '', 'tooltip here');
echo $formv1->generateText('SurgicalReview', 'SurgicalReview', '', 'tooltip here');
echo $formv1->generateText('DifficultAccess', 'DifficultAccess', '', 'tooltip here');
echo $formv1->generateText('Position', 'Position', '', 'tooltip here');
echo $formv1->generateText('ScopeChanged', 'ScopeChanged', '', 'tooltip here');
echo $formv1->generateText('CapUsed', 'CapUsed', '', 'tooltip here');
echo $formv1->generateText('AntispasmodicsUsed', 'AntispasmodicsUsed', '', 'tooltip here');
echo $formv1->generateText('Retroflexionv2', 'Retroflexionv2', '', 'tooltip here');
echo $formv1->generateText('ExternalPressure', 'ExternalPressure', '', 'tooltip here');
echo $formv1->generateText('HoldTheScope', 'HoldTheScope', '', 'tooltip here');
echo $formv1->generateText('ICV', 'ICV', '', 'tooltip here');
echo $formv1->generateText('AppendicealOrfice', 'AppendicealOrfice', '', 'tooltip here');
echo $formv1->generateText('AnorectalJunction', 'AnorectalJunction', '', 'tooltip here');
echo $formv1->generateText('DefectInspection', 'DefectInspection', '', 'tooltip here');
echo $formv1->generateText('Chromoendoscopy', 'Chromoendoscopy', '', 'tooltip here');
echo $formv1->generateText('Margin', 'Margin', '', 'tooltip here');
echo $formv1->generateText('PolypTissueRemoved', 'PolypTissueRemoved', '', 'tooltip here');
echo $formv1->generateText('SubmucosaInspected', 'SubmucosaInspected', '', 'tooltip here');
echo $formv1->generateText('Fibrosis', 'Fibrosis', '', 'tooltip here');
echo $formv1->generateText('MPInspection', 'MPInspection', '', 'tooltip here');
echo $formv1->generateText('MPDescription', 'MPDescription', '', 'tooltip here');
echo $formv1->generateText('NonStainedSM', 'NonStainedSM', '', 'tooltip here');
echo $formv1->generateText('Uncertainty', 'Uncertainty', '', 'tooltip here');
echo $formv1->generateText('Photodocumentation', 'Photodocumentation', '', 'tooltip here');
echo $formv1->generateText('MarginTreatment', 'MarginTreatment', '', 'tooltip here');
echo $formv1->generateText('STSCTechnique', 'STSCTechnique', '', 'tooltip here');
echo $formv1->generateText('APCTechnique', 'APCTechnique', '', 'tooltip here');
?>
						    <button id="submitPolypectomyAssessmentTool">Submit</button>
		
					    </form>
		
				        </p>
		
		
		
		        </div>
		
		    </div>
		<script>
			var siteRoot = "http://localhost:90/dashboard/esd/";
		
			 PolypectomyAssessmentToolPassed = $("#id").text();
		
			if ( PolypectomyAssessmentToolPassed == ""){
		
				var edit = 0;
		
			}else{
		
				var edit = 1;
		
			}
		
		
		
		
		
			function fillForm (idPassed){
		
				disableFormInputs("PolypectomyAssessmentTool");
		
				PolypectomyAssessmentToolRequired = new Object;
		
				PolypectomyAssessmentToolRequired = getNamesFormElements("PolypectomyAssessmentTool");
		
				PolypectomyAssessmentToolString = '`id`=\''+idPassed+'\'';
		
				var selectorObject = getDataQuery ("PolypectomyAssessmentTool", PolypectomyAssessmentToolString, getNamesFormElements("PolypectomyAssessmentTool"), 1);
		
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
				    
				    $("#messageBox").text("Editing PolypectomyAssessmentTool id "+idPassed);
		
				    enableFormInputs("PolypectomyAssessmentTool");
		
				});
		
				try {
		
					$("form#PolypectomyAssessmentTool").find("button#deletePolypectomyAssessmentTool").length();
		
				}catch(error){
		
					$("form#PolypectomyAssessmentTool").find("button").after("<button id='deletePolypectomyAssessmentTool'>Delete</button>");
		
				}
		
			}
		
		
			//delete behaviour
		
			function deletePolypectomyAssessmentTool (){
		
				//PolypectomyAssessmentToolPassed is the current record, some security to check its also that in the id field
		
				if (PolypectomyAssessmentToolPassed != $("#id").text()){
		
					return;
		
				}
		
		
				if (confirm("Do you wish to delete this PolypectomyAssessmentTool?")) {
		
					disableFormInputs("PolypectomyAssessmentTool");
		
					var PolypectomyAssessmentToolObject = pushDataFromFormAJAX("PolypectomyAssessmentTool", "PolypectomyAssessmentTool", "id", PolypectomyAssessmentToolPassed, "2"); //delete PolypectomyAssessmentTool
		
					PolypectomyAssessmentToolObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("PolypectomyAssessmentTool deleted");
								edit = 0;
								PolypectomyAssessmentToolPassed = null;
								window.location.href = siteRoot + "scripts/forms/PolypectomyAssessmentToolTable.php";
								//go to PolypectomyAssessmentTool list
		
							}else {
		
							alert("Error, try again");
		
							enableFormInputs("PolypectomyAssessmentTool");
		
						    }
		
		
		
						}
		
		
					});
		
				}
		
		
			}
		
			function submitPolypectomyAssessmentToolForm (){
		
				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
				if (edit == 0){
		
					var PolypectomyAssessmentToolObject = pushDataFromFormAJAX("PolypectomyAssessmentTool", "PolypectomyAssessmentTool", "id", null, "0"); //insert new object
		
					PolypectomyAssessmentToolObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							alert ("New PolypectomyAssessmentTool no "+data+" created");
							edit = 1;
							$("#id").text(data);
							PolypectomyAssessmentToolPassed = data;
							fillForm(data);
		
		
		
		
						}else {
		
							alert("No data inserted, try again");
		
						}
		
		
					});
		
				} else if (edit == 1){
		
					var PolypectomyAssessmentToolObject = pushDataFromFormAJAX("PolypectomyAssessmentTool", "PolypectomyAssessmentTool", "id", PolypectomyAssessmentToolPassed, "1"); //insert new object
		
					PolypectomyAssessmentToolObject.done(function (data){
		
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
		
					fillForm(PolypectomyAssessmentToolPassed);
		
				}else{
					
					$("#messageBox").text("New PolypectomyAssessmentTool");
					
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
		
		
				$("#content").on('click', '#submitPolypectomyAssessmentTool', (function(event) {
			        event.preventDefault();
			        $('#PolypectomyAssessmentTool').submit();
		
		
			    }));
		
			    $("#content").on('click', '#deletePolypectomyAssessmentTool', (function(event) {
			        event.preventDefault();
			        deletePolypectomyAssessmentTool();
		
		
			    }));
		
				$("#PolypectomyAssessmentTool").validate({
		
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
		
			            submitPolypectomyAssessmentToolForm();
		
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