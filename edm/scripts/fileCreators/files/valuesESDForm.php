
		
		
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
		    <title>valuesESD Form</title>
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
		                    <h2 style="text-align:left;">valuesESD Form</h2>
		                </div>
		
		                <div id="messageBox" class='col-3 yellow-light narrow center'>
		                    <p></p>
		                </div>
		            </div>
		
		
			        <p><?php
		
				        if ($id){
		
							$q = "SELECT  id  FROM  valuesESD  WHERE  id  = $id";
							if ($general->returnYesNoDBQuery($q) != 1){
								echo "Passed id does not exist in the database";
								exit();
		
							}
						}
		
		?></p>
		
		
			        <p>
		
					    <form id="valuesESD">
					    <?php echo $formv1->generateText('Admit_reason', 'Admit_reason', '', 'tooltip here');
echo $formv1->generateText('Admit_reason_t', 'Admit_reason_t', '', 'tooltip here');
echo $formv1->generateText('AdjuvantTreatment', 'AdjuvantTreatment', '', 'tooltip here');
echo $formv1->generateText('AdjuvantTreatment_t', 'AdjuvantTreatment_t', '', 'tooltip here');
echo $formv1->generateText('Antiplatelet', 'Antiplatelet', '', 'tooltip here');
echo $formv1->generateText('Antiplatelet_t', 'Antiplatelet_t', '', 'tooltip here');
echo $formv1->generateText('Bleeding_severity', 'Bleeding_severity', '', 'tooltip here');
echo $formv1->generateText('Bleeding_severity_t', 'Bleeding_severity_t', '', 'tooltip here');
echo $formv1->generateText('Comp_other', 'Comp_other', '', 'tooltip here');
echo $formv1->generateText('Comp_other_t', 'Comp_other_t', '', 'tooltip here');
echo $formv1->generateText('Comp_perf', 'Comp_perf', '', 'tooltip here');
echo $formv1->generateText('Comp_perf_t', 'Comp_perf_t', '', 'tooltip here');
echo $formv1->generateText('Complications', 'Complications', '', 'tooltip here');
echo $formv1->generateText('Complications_t', 'Complications_t', '', 'tooltip here');
echo $formv1->generateText('ClinicalCriteria', 'ClinicalCriteria', '', 'tooltip here');
echo $formv1->generateText('ClinicalCriteria_t', 'ClinicalCriteria_t', '', 'tooltip here');
echo $formv1->generateText('Differentiation', 'Differentiation', '', 'tooltip here');
echo $formv1->generateText('Differentiation_t', 'Differentiation_t', '', 'tooltip here');
echo $formv1->generateText('Ethnicity', 'Ethnicity', '', 'tooltip here');
echo $formv1->generateText('Ethnicity_t', 'Ethnicity_t', '', 'tooltip here');
echo $formv1->generateText('Fellow', 'Fellow', '', 'tooltip here');
echo $formv1->generateText('Fellow_t', 'Fellow_t', '', 'tooltip here');
echo $formv1->generateText('GA', 'GA', '', 'tooltip here');
echo $formv1->generateText('GA_t', 'GA_t', '', 'tooltip here');
echo $formv1->generateText('Hemostatic_method_DB', 'Hemostatic_method_DB', '', 'tooltip here');
echo $formv1->generateText('Hemostatic_method_DB_t', 'Hemostatic_method_DB_t', '', 'tooltip here');
echo $formv1->generateText('Histology', 'Histology', '', 'tooltip here');
echo $formv1->generateText('Histology_t', 'Histology_t', '', 'tooltip here');
echo $formv1->generateText('Indication', 'Indication', '', 'tooltip here');
echo $formv1->generateText('Indication_t', 'Indication_t', '', 'tooltip here');
echo $formv1->generateText('Injectate', 'Injectate', '', 'tooltip here');
echo $formv1->generateText('Injectate_t', 'Injectate_t', '', 'tooltip here');
echo $formv1->generateText('IPB_tx', 'IPB_tx', '', 'tooltip here');
echo $formv1->generateText('IPB_tx_t', 'IPB_tx_t', '', 'tooltip here');
echo $formv1->generateText('Knife', 'Knife', '', 'tooltip here');
echo $formv1->generateText('Knife_t', 'Knife_t', '', 'tooltip here');
echo $formv1->generateText('location', 'location', '', 'tooltip here');
echo $formv1->generateText('location_t', 'location_t', '', 'tooltip here');
echo $formv1->generateText('Paris', 'Paris', '', 'tooltip here');
echo $formv1->generateText('Paris_t', 'Paris_t', '', 'tooltip here');
echo $formv1->generateText('Perf_tx', 'Perf_tx', '', 'tooltip here');
echo $formv1->generateText('Perf_tx_t', 'Perf_tx_t', '', 'tooltip here');
echo $formv1->generateText('pre_resect_histo', 'pre_resect_histo', '', 'tooltip here');
echo $formv1->generateText('pre_resect_histo_t', 'pre_resect_histo_t', '', 'tooltip here');
echo $formv1->generateText('Prophylaxis_bleed', 'Prophylaxis_bleed', '', 'tooltip here');
echo $formv1->generateText('Prophylaxis_bleed_t', 'Prophylaxis_bleed_t', '', 'tooltip here');
echo $formv1->generateText('R0', 'R0', '', 'tooltip here');
echo $formv1->generateText('R0_t', 'R0_t', '', 'tooltip here');
echo $formv1->generateText('ScopeType', 'ScopeType', '', 'tooltip here');
echo $formv1->generateText('ScopeType_t', 'ScopeType_t', '', 'tooltip here');
echo $formv1->generateText('SE_Rx', 'SE_Rx', '', 'tooltip here');
echo $formv1->generateText('SE_Rx_t', 'SE_Rx_t', '', 'tooltip here');
echo $formv1->generateText('SE_HISTO_Rec_Res', 'SE_HISTO_Rec_Res', '', 'tooltip here');
echo $formv1->generateText('SE_HISTO_Rec_Res_t', 'SE_HISTO_Rec_Res_t', '', 'tooltip here');
echo $formv1->generateText('Sex', 'Sex', '', 'tooltip here');
echo $formv1->generateText('Sex_t', 'Sex_t', '', 'tooltip here');
echo $formv1->generateText('SMIDepth', 'SMIDepth', '', 'tooltip here');
echo $formv1->generateText('SMIDepth_t', 'SMIDepth_t', '', 'tooltip here');
echo $formv1->generateText('SurgTStage', 'SurgTStage', '', 'tooltip here');
echo $formv1->generateText('SurgTStage_t', 'SurgTStage_t', '', 'tooltip here');
echo $formv1->generateText('SurgLN', 'SurgLN', '', 'tooltip here');
echo $formv1->generateText('SurgLN_t', 'SurgLN_t', '', 'tooltip here');
echo $formv1->generateText('SurgM', 'SurgM', '', 'tooltip here');
echo $formv1->generateText('SurgM_t', 'SurgM_t', '', 'tooltip here');
echo $formv1->generateText('SurgicalRefBasedonHisto', 'SurgicalRefBasedonHisto', '', 'tooltip here');
echo $formv1->generateText('SurgicalRefBasedonHisto_t', 'SurgicalRefBasedonHisto_t', '', 'tooltip here');
echo $formv1->generateText('UltimateOutcome', 'UltimateOutcome', '', 'tooltip here');
echo $formv1->generateText('UltimateOutcome_t', 'UltimateOutcome_t', '', 'tooltip here');
echo $formv1->generateText('Yes_no', 'Yes_no', '', 'tooltip here');
echo $formv1->generateText('Yes_no_t', 'Yes_no_t', '', 'tooltip here');
?>
						    <button id="submitvaluesESD">Submit</button>
		
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
		
			 valuesESDPassed = $("#id").text();
		
			if ( valuesESDPassed == ""){
		
				var edit = 0;
		
			}else{
		
				var edit = 1;
		
			}
		
		
		
		
		
			function fillForm (idPassed){
		
				disableFormInputs("valuesESD");
		
				valuesESDRequired = new Object;
		
				valuesESDRequired = getNamesFormElements("valuesESD");
		
				valuesESDString = '`id`=\''+idPassed+'\'';
		
				var selectorObject = getDataQuery ("valuesESD", valuesESDString, getNamesFormElements("valuesESD"), 1);
		
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
				    
				    $("#messageBox").text("Editing valuesESD id "+idPassed);
		
				    enableFormInputs("valuesESD");
		
				});
		
				try {
		
					$("form#valuesESD").find("button#deletevaluesESD").length();
		
				}catch(error){
		
					$("form#valuesESD").find("button").after("<button id='deletevaluesESD'>Delete</button>");
		
				}
		
			}
		
		
			//delete behaviour
		
			function deletevaluesESD (){
		
				//valuesESDPassed is the current record, some security to check its also that in the id field
		
				if (valuesESDPassed != $("#id").text()){
		
					return;
		
				}
		
		
				if (confirm("Do you wish to delete this valuesESD?")) {
		
					disableFormInputs("valuesESD");
		
					var valuesESDObject = pushDataFromFormAJAX("valuesESD", "valuesESD", "id", valuesESDPassed, "2"); //delete valuesESD
		
					valuesESDObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("valuesESD deleted");
								edit = 0;
								valuesESDPassed = null;
								window.location.href = siteRoot + "scripts/forms/valuesESDTable.php";
								//go to valuesESD list
		
							}else {
		
							alert("Error, try again");
		
							enableFormInputs("valuesESD");
		
						    }
		
		
		
						}
		
		
					});
		
				}
		
		
			}
		
			function submitvaluesESDForm (){
		
				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
				if (edit == 0){
		
					var valuesESDObject = pushDataFromFormAJAX("valuesESD", "valuesESD", "id", null, "0"); //insert new object
		
					valuesESDObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							alert ("New valuesESD no "+data+" created");
							edit = 1;
							$("#id").text(data);
							valuesESDPassed = data;
							fillForm(data);
		
		
		
		
						}else {
		
							alert("No data inserted, try again");
		
						}
		
		
					});
		
				} else if (edit == 1){
		
					var valuesESDObject = pushDataFromFormAJAX("valuesESD", "valuesESD", "id", valuesESDPassed, "1"); //insert new object
		
					valuesESDObject.done(function (data){
		
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
		
					fillForm(valuesESDPassed);
		
				}else{
					
					$("#messageBox").text("New valuesESD");
					
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
		
		
				$("#content").on('click', '#submitvaluesESD', (function(event) {
			        event.preventDefault();
			        $('#valuesESD').submit();
		
		
			    }));
		
			    $("#content").on('click', '#deletevaluesESD', (function(event) {
			        event.preventDefault();
			        deletevaluesESD();
		
		
			    }));
		
				$("#valuesESD").validate({
		
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
		
			            submitvaluesESDForm();
		
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