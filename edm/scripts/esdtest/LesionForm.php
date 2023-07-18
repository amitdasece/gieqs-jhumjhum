
		
		
			<?php
		
			

$host = substr($_SERVER['HTTP_HOST'], 0, 5);
		if (in_array($host, array('local', '127.0', '192.1'))) {
		    $local = TRUE;
		} else {
		    $local = FALSE;
		}
		
		if ($local){
			
			require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');
			
			
		}else{
			
			require ($_SERVER['DOCUMENT_ROOT'].'/esd/scripts/headerCreator.php');;
		}
		
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
		    <title>Lesion Form</title>
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
		                    <h2 style="text-align:left;">Lesion Form</h2>
		                </div>
		
		                <div id="messageBox" class='col-3 yellow-light narrow center'>
		                    <p></p>
		                </div>
		            </div>
		
		
			        <p><?php
		
				        if ($id){
		
							$q = "SELECT  _k_lesion  FROM  ESD.Lesion  WHERE  _k_lesion  = $id";
							if ($general->returnYesNoDBQuery($q) != 1){
								echo "Passed id does not exist in the database";
								exit();
		
							}
						}
		
		?></p>
		
		
			        <p>
		
					    <form id="Lesion">
					    <?php echo $formv1->generateText('_k_lesion', '_k_lesion', '', 'tooltip here');
echo $formv1->generateText('_k_procedure', '_k_procedure', '', 'tooltip here');
echo $formv1->generateText('?Patientcode', '?Patientcode', '', 'tooltip here');
echo $formv1->generateText('Firstname', 'Firstname', '', 'tooltip here');
echo $formv1->generateText('Surname', 'Surname', '', 'tooltip here');
echo $formv1->generateText('MRN', 'MRN', '', 'tooltip here');
echo $formv1->generateText('DOB', 'DOB', '', 'tooltip here');
echo $formv1->generateText('AGE', 'AGE', '', 'tooltip here');
echo $formv1->generateText('Ethnicity', 'Ethnicity', '', 'tooltip here');
echo $formv1->generateText('Dateofprocedure', 'Dateofprocedure', '', 'tooltip here');
echo $formv1->generateText('Duplicate', 'Duplicate', '', 'tooltip here');
echo $formv1->generateText('UseForLesion', 'UseForLesion', '', 'tooltip here');
echo $formv1->generateText('UseForPatient', 'UseForPatient', '', 'tooltip here');
echo $formv1->generateText('Gender', 'Gender', '', 'tooltip here');
echo $formv1->generateText('IndicationforESD', 'IndicationforESD', '', 'tooltip here');
echo $formv1->generateText('Preresectionbiopsydone', 'Preresectionbiopsydone', '', 'tooltip here');
echo $formv1->generateText('PreresectionHistology', 'PreresectionHistology', '', 'tooltip here');
echo $formv1->generateText('Scopetype', 'Scopetype', '', 'tooltip here');
echo $formv1->generateText('Knifetype', 'Knifetype', '', 'tooltip here');
echo $formv1->generateText('Injectate', 'Injectate', '', 'tooltip here');
echo $formv1->generateText('Length_min', 'Length_min', '', 'tooltip here');
echo $formv1->generateText('ASAscore', 'ASAscore', '', 'tooltip here');
echo $formv1->generateText('GAvssedation', 'GAvssedation', '', 'tooltip here');
echo $formv1->generateText('Admitted', 'Admitted', '', 'tooltip here');
echo $formv1->generateText('Complications', 'Complications', '', 'tooltip here');
echo $formv1->generateText('comp_IPB', 'comp_IPB', '', 'tooltip here');
echo $formv1->generateText('Prophylaxis_bleed', 'Prophylaxis_bleed', '', 'tooltip here');
echo $formv1->generateText('comp_perf', 'comp_perf', '', 'tooltip here');
echo $formv1->generateText('comp_DB', 'comp_DB', '', 'tooltip here');
echo $formv1->generateText('Mortality', 'Mortality', '', 'tooltip here');
echo $formv1->generateText('lesionlocation', 'lesionlocation', '', 'tooltip here');
echo $formv1->generateText('lesionlocationdetail', 'lesionlocationdetail', '', 'tooltip here');
echo $formv1->generateText('lesion_Paris', 'lesion_Paris', '', 'tooltip here');
echo $formv1->generateText('ulceration', 'ulceration', '', 'tooltip here');
echo $formv1->generateText('lesionsize_mm', 'lesionsize_mm', '', 'tooltip here');
echo $formv1->generateText('En_bloc', 'En_bloc', '', 'tooltip here');
echo $formv1->generateText('Historemarks', 'Historemarks', '', 'tooltip here');
echo $formv1->generateText('Numberofresectionspecimens', 'Numberofresectionspecimens', '', 'tooltip here');
echo $formv1->generateText('Completeendoscopicresectionachieved', 'Completeendoscopicresectionachieved', '', 'tooltip here');
echo $formv1->generateText('Histology', 'Histology', '', 'tooltip here');
echo $formv1->generateText('HistologyHGD', 'HistologyHGD', '', 'tooltip here');
echo $formv1->generateText('Completepathologicalresection_R0', 'Completepathologicalresection_R0', '', 'tooltip here');
echo $formv1->generateText('MarginVerticalPos', 'MarginVerticalPos', '', 'tooltip here');
echo $formv1->generateText('MarginHorizPos', 'MarginHorizPos', '', 'tooltip here');
echo $formv1->generateText('ClinicalCriteria', 'ClinicalCriteria', '', 'tooltip here');
echo $formv1->generateText('SurgicalRefBasedonHisto', 'SurgicalRefBasedonHisto', '', 'tooltip here');
echo $formv1->generateText('SurgDueToFail', 'SurgDueToFail', '', 'tooltip here');
echo $formv1->generateText('UnderwentSurgeryatIndex', 'UnderwentSurgeryatIndex', '', 'tooltip here');
echo $formv1->generateText('SurgeryDuringSurveillance', 'SurgeryDuringSurveillance', '', 'tooltip here');
echo $formv1->generateText('NoSurgerySoSurveillance', 'NoSurgerySoSurveillance', '', 'tooltip here');
echo $formv1->generateText('DeclinedSurgery', 'DeclinedSurgery', '', 'tooltip here');
echo $formv1->generateText('AwaitingSurgOutcome', 'AwaitingSurgOutcome', '', 'tooltip here');
echo $formv1->generateText('WhyDeclinedSurgery', 'WhyDeclinedSurgery', '', 'tooltip here');
echo $formv1->generateText('SurgResidual', 'SurgResidual', '', 'tooltip here');
echo $formv1->generateText('SurgLN', 'SurgLN', '', 'tooltip here');
echo $formv1->generateText('SurgTStage', 'SurgTStage', '', 'tooltip here');
echo $formv1->generateText('SurgNotes', 'SurgNotes', '', 'tooltip here');
echo $formv1->generateText('SMI', 'SMI', '', 'tooltip here');
echo $formv1->generateText('SMDepth', 'SMDepth', '', 'tooltip here');
echo $formv1->generateText('Differentiation', 'Differentiation', '', 'tooltip here');
echo $formv1->generateText('LVI', 'LVI', '', 'tooltip here');
echo $formv1->generateText('WhyNoSC1', 'WhyNoSC1', '', 'tooltip here');
echo $formv1->generateText('CompletedSE1', 'CompletedSE1', '', 'tooltip here');
echo $formv1->generateText('SE_1date', 'SE_1date', '', 'tooltip here');
echo $formv1->generateText('SE_time_new', 'SE_time_new', '', 'tooltip here');
echo $formv1->generateText('SE_1endo_Rec_Res', 'SE_1endo_Rec_Res', '', 'tooltip here');
echo $formv1->generateText('SE_1HISTO_Rec_Res', 'SE_1HISTO_Rec_Res', '', 'tooltip here');
echo $formv1->generateText('SE_1Treatment', 'SE_1Treatment', '', 'tooltip here');
echo $formv1->generateText('CompletedSE2', 'CompletedSE2', '', 'tooltip here');
echo $formv1->generateText('WhyNoSC2', 'WhyNoSC2', '', 'tooltip here');
echo $formv1->generateText('DueSC2', 'DueSC2', '', 'tooltip here');
echo $formv1->generateText('ExplainSC2', 'ExplainSC2', '', 'tooltip here');
echo $formv1->generateText('SE_2date', 'SE_2date', '', 'tooltip here');
echo $formv1->generateText('SE_2endo_Rec_Res', 'SE_2endo_Rec_Res', '', 'tooltip here');
echo $formv1->generateText('SE_2HISTO_Rec_Res', 'SE_2HISTO_Rec_Res', '', 'tooltip here');
echo $formv1->generateText('SE_2Treatment', 'SE_2Treatment', '', 'tooltip here');
echo $formv1->generateText('MonthsToSEMostRecent', 'MonthsToSEMostRecent', '', 'tooltip here');
echo $formv1->generateText('SE_MostRecentdate', 'SE_MostRecentdate', '', 'tooltip here');
echo $formv1->generateText('SE_MostRecentendo_Rec_Res', 'SE_MostRecentendo_Rec_Res', '', 'tooltip here');
echo $formv1->generateText('SE_MostRecentHISTO_Rec_Res', 'SE_MostRecentHISTO_Rec_Res', '', 'tooltip here');
echo $formv1->generateText('SE_MostRecentTreatment', 'SE_MostRecentTreatment', '', 'tooltip here');
echo $formv1->generateText('clearofdiseaseonlatestSE', 'clearofdiseaseonlatestSE', '', 'tooltip here');
echo $formv1->generateText('Numberoffollow_upscopes', 'Numberoffollow_upscopes', '', 'tooltip here');
echo $formv1->generateText('Monthsindextolastscope', 'Monthsindextolastscope', '', 'tooltip here');
echo $formv1->generateText('Ultimateoutcome', 'Ultimateoutcome', '', 'tooltip here');
echo $formv1->generateText('FullThicknessPerf', 'FullThicknessPerf', '', 'tooltip here');
echo $formv1->generateText('Historemarks2', 'Historemarks2', '', 'tooltip here');
echo $formv1->generateText('SMIdyn', 'SMIdyn', '', 'tooltip here');
echo $formv1->generateText('HistologyCriteriaLGDNew_old', 'HistologyCriteriaLGDNew_old', '', 'tooltip here');
echo $formv1->generateText('HistologyCriteriaLGDNew_oldv2', 'HistologyCriteriaLGDNew_oldv2', '', 'tooltip here');
echo $formv1->generateText('HistologyCriteriaLGDNew', 'HistologyCriteriaLGDNew', '', 'tooltip here');
echo $formv1->generateText('AgeCategory', 'AgeCategory', '', 'tooltip here');
echo $formv1->generateText('SizeCategory', 'SizeCategory', '', 'tooltip here');
echo $formv1->generateText('LocationCategory', 'LocationCategory', '', 'tooltip here');
echo $formv1->generateText('DurationCategory', 'DurationCategory', '', 'tooltip here');
?>
						    <button id="submitLesion">Submit</button>
		
					    </form>
		
				        </p>
		
		
		
		        </div>
		
		    </div>
		<script>
			switch (true) {
				case winLocation('gieqs.com'):

				var rootFolder = 'https://www.gieqs.com/edm/';
				break;

				case winLocation('localhost'):
				var rootFolder = 'http://localhost/gieqs/edm/';
				break;

				default: // set whatever you want
				var rootFolder = window.location.origin +'/edm/';
				break;
		}
			
var siteRoot = rootFolder;
		
			 LesionPassed = $("#id").text();
		
			if ( LesionPassed == ""){
		
				var edit = 0;
		
			}else{
		
				var edit = 1;
		
			}
		
		
		
		
		
			function fillForm (idPassed){
		
				disableFormInputs("Lesion");
		
				LesionRequired = new Object;
		
				LesionRequired = getNamesFormElements("Lesion");
		
				LesionString = '`_k_lesion`=\''+idPassed+'\'';
		
				var selectorObject = getDataQuery ("ESD.Lesion", LesionString, getNamesFormElements("Lesion"), 1);
		
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
				    
				    $("#messageBox").text("Editing Lesion id "+idPassed);
		
				    enableFormInputs("Lesion");
		
				});
		
				try {
		
					$("form#Lesion").find("button#deleteLesion").length();
		
				}catch(error){
		
					$("form#Lesion").find("button").after("<button id='deleteLesion'>Delete</button>");
		
				}
		
			}
		
		
			//delete behaviour
		
			function deleteLesion (){
		
				//LesionPassed is the current record, some security to check its also that in the id field
		
				if (LesionPassed != $("#id").text()){
		
					return;
		
				}
		
		
				if (confirm("Do you wish to delete this Lesion?")) {
		
					disableFormInputs("Lesion");
		
					var LesionObject = pushDataFromFormAJAX("Lesion", "Lesion", "_k_lesion", LesionPassed, "2"); //delete Lesion
		
					LesionObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("Lesion deleted");
								edit = 0;
								LesionPassed = null;
								window.location.href = siteRoot + "scripts/forms/LesionTable.php";
								//go to Lesion list
		
							}else {
		
							alert("Error, try again");
		
							enableFormInputs("Lesion");
		
						    }
		
		
		
						}
		
		
					});
		
				}
		
		
			}
		
			function submitLesionForm (){
		
				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
				if (edit == 0){
		
					var LesionObject = pushDataFromFormAJAX("Lesion", "Lesion", "_k_lesion", null, "0"); //insert new object
		
					LesionObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							alert ("New Lesion no "+data+" created");
							edit = 1;
							$("#id").text(data);
							LesionPassed = data;
							fillForm(data);
		
		
		
		
						}else {
		
							alert("No data inserted, try again");
		
						}
		
		
					});
		
				} else if (edit == 1){
		
					var LesionObject = pushDataFromFormAJAX("Lesion", "Lesion", "_k_lesion", LesionPassed, "1"); //insert new object
		
					LesionObject.done(function (data){
		
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
		
					fillForm(LesionPassed);
		
				}else{
					
					$("#messageBox").text("New Lesion");
					
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
		
		
				$("#content").on('click', '#submitLesion', (function(event) {
			        event.preventDefault();
			        $('#Lesion').submit();
		
		
			    }));
		
			    $("#content").on('click', '#deleteLesion', (function(event) {
			        event.preventDefault();
			        deleteLesion();
		
		
			    }));
		
				$("#Lesion").validate({
		
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
		
			            submitLesionForm();
		
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