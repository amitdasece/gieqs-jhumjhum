
		
		
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
		    <title>valuesercp Form</title>
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
		                    <h2 style="text-align:left;">valuesercp Form</h2>
		                </div>
		
		                <div id="messageBox" class='col-3 yellow-light narrow center'>
		                    <p></p>
		                </div>
		            </div>
		
		
			        <p><?php
		
				        if ($id){
		
							$q = "SELECT  ?id  FROM  valuesercp  WHERE  ?id  = $id";
							if ($general->returnYesNoDBQuery($q) != 1){
								echo "Passed id does not exist in the database";
								exit();
		
							}
						}
		
		?></p>
		
		
			        <p>
		
					    <form id="valuesercp">
					    <?php echo $formv1->generateText('?id', '?id', '', 'tooltip here');
echo $formv1->generateText('karnofsky', 'karnofsky', '', 'tooltip here');
echo $formv1->generateText('karnofsky_t', 'karnofsky_t', '', 'tooltip here');
echo $formv1->generateText('WHO', 'WHO', '', 'tooltip here');
echo $formv1->generateText('WHO_t', 'WHO_t', '', 'tooltip here');
echo $formv1->generateText('indication', 'indication', '', 'tooltip here');
echo $formv1->generateText('indication_t', 'indication_t', '', 'tooltip here');
echo $formv1->generateText('location', 'location', '', 'tooltip here');
echo $formv1->generateText('location_t', 'location_t', '', 'tooltip here');
echo $formv1->generateText('bismuth', 'bismuth', '', 'tooltip here');
echo $formv1->generateText('bismuth_t', 'bismuth_t', '', 'tooltip here');
echo $formv1->generateText('gradedifficultyERCP', 'gradedifficultyERCP', '', 'tooltip here');
echo $formv1->generateText('gradedifficultyERCP_t', 'gradedifficultyERCP_t', '', 'tooltip here');
echo $formv1->generateText('previousfailedERCP', 'previousfailedERCP', '', 'tooltip here');
echo $formv1->generateText('previousfailedERCP_t', 'previousfailedERCP_t', '', 'tooltip here');
echo $formv1->generateText('informedconsent', 'informedconsent', '', 'tooltip here');
echo $formv1->generateText('informedconsent_t', 'informedconsent_t', '', 'tooltip here');
echo $formv1->generateText('antibiotics', 'antibiotics', '', 'tooltip here');
echo $formv1->generateText('antibiotics_t', 'antibiotics_t', '', 'tooltip here');
echo $formv1->generateText('anticoagulants', 'anticoagulants', '', 'tooltip here');
echo $formv1->generateText('anticoagulants_t', 'anticoagulants_t', '', 'tooltip here');
echo $formv1->generateText('pancreatitisprevention', 'pancreatitisprevention', '', 'tooltip here');
echo $formv1->generateText('pancreatitisprevention_t', 'pancreatitisprevention_t', '', 'tooltip here');
echo $formv1->generateText('yearlyERCPvolumeCenter', 'yearlyERCPvolumeCenter', '', 'tooltip here');
echo $formv1->generateText('yearlyERCPvolumeCenter_t', 'yearlyERCPvolumeCenter_t', '', 'tooltip here');
echo $formv1->generateText('yearlyERCPvolumeEndoscopist', 'yearlyERCPvolumeEndoscopist', '', 'tooltip here');
echo $formv1->generateText('yearlyERCPvolumeEndoscopist_t', 'yearlyERCPvolumeEndoscopist_t', '', 'tooltip here');
echo $formv1->generateText('positioninfrontofpapilla', 'positioninfrontofpapilla', '', 'tooltip here');
echo $formv1->generateText('positioninfrontofpapilla_t', 'positioninfrontofpapilla_t', '', 'tooltip here');
echo $formv1->generateText('positionERCPscope_t', 'positionERCPscope_t', '', 'tooltip here');
echo $formv1->generateText('positionERCPscope', 'positionERCPscope', '', 'tooltip here');
echo $formv1->generateText('nativepapilla', 'nativepapilla', '', 'tooltip here');
echo $formv1->generateText('nativepapilla_t', 'nativepapilla_t', '', 'tooltip here');
echo $formv1->generateText('duodenaldiverticulum', 'duodenaldiverticulum', '', 'tooltip here');
echo $formv1->generateText('duodenaldiverticulum_t', 'duodenaldiverticulum_t', '', 'tooltip here');
echo $formv1->generateText('cannulationbileductindicated', 'cannulationbileductindicated', '', 'tooltip here');
echo $formv1->generateText('cannulationbileductindicated_t', 'cannulationbileductindicated_t', '', 'tooltip here');
echo $formv1->generateText('cannulationbileduct', 'cannulationbileduct', '', 'tooltip here');
echo $formv1->generateText('cannulationbileduct_t', 'cannulationbileduct_t', '', 'tooltip here');
echo $formv1->generateText('biliarypapillotomy', 'biliarypapillotomy', '', 'tooltip here');
echo $formv1->generateText('biliarypapillotomy_t', 'biliarypapillotomy_t', '', 'tooltip here');
echo $formv1->generateText('cannulationwirsungindicated', 'cannulationwirsungindicated', '', 'tooltip here');
echo $formv1->generateText('cannulationwirsungindicated_t', 'cannulationwirsungindicated_t', '', 'tooltip here');
echo $formv1->generateText('cannulationwirsung', 'cannulationwirsung', '', 'tooltip here');
echo $formv1->generateText('cannulationwirsung_t', 'cannulationwirsung_t', '', 'tooltip here');
echo $formv1->generateText('pancreaticpapillotomy', 'pancreaticpapillotomy', '', 'tooltip here');
echo $formv1->generateText('pancreaticpapillotomy_t', 'pancreaticpapillotomy_t', '', 'tooltip here');
echo $formv1->generateText('contrastwirsung', 'contrastwirsung', '', 'tooltip here');
echo $formv1->generateText('constrastwirsung_t', 'constrastwirsung_t', '', 'tooltip here');
echo $formv1->generateText('difficultcannulationapproach', 'difficultcannulationapproach', '', 'tooltip here');
echo $formv1->generateText('difficultcannulationapproach_t', 'difficultcannulationapproach_t', '', 'tooltip here');
echo $formv1->generateText('lithiasispresent', 'lithiasispresent', '', 'tooltip here');
echo $formv1->generateText('lithiasispresent_t', 'lithiasispresent_t', '', 'tooltip here');
echo $formv1->generateText('lithiasisremoved', 'lithiasisremoved', '', 'tooltip here');
echo $formv1->generateText('lithiasisremoved_t', 'lithiasisremoved_t', '', 'tooltip here');
echo $formv1->generateText('indicationstenting', 'indicationstenting', '', 'tooltip here');
echo $formv1->generateText('indicationstenting_t', 'indicationstenting_t', '', 'tooltip here');
echo $formv1->generateText('stenting', 'stenting', '', 'tooltip here');
echo $formv1->generateText('stenting_t', 'stenting_t', '', 'tooltip here');
echo $formv1->generateText('stentinglocation', 'stentinglocation', '', 'tooltip here');
echo $formv1->generateText('stentinglocation_t', 'stentinglocation_t', '', 'tooltip here');
echo $formv1->generateText('brushing', 'brushing', '', 'tooltip here');
echo $formv1->generateText('brushing_t', 'brushing_t', '', 'tooltip here');
echo $formv1->generateText('dilatation', 'dilatation', '', 'tooltip here');
echo $formv1->generateText('dilatation_t', 'dilatation_t', '', 'tooltip here');
echo $formv1->generateText('perproceduraladverseevents', 'perproceduraladverseevents', '', 'tooltip here');
echo $formv1->generateText('perproceduraladverseevents_t', 'perproceduraladverseevents_t', '', 'tooltip here');
echo $formv1->generateText('bleedingtreatment', 'bleedingtreatment', '', 'tooltip here');
echo $formv1->generateText('bleedingtreatment_t', 'bleedingtreatment_t', '', 'tooltip here');
echo $formv1->generateText('hemostasis', 'hemostasis', '', 'tooltip here');
echo $formv1->generateText('hemostasis_t', 'hemostasis_t', '', 'tooltip here');
echo $formv1->generateText('perforationtype', 'perforationtype', '', 'tooltip here');
echo $formv1->generateText('perforationtype_t', 'perforationtype_t', '', 'tooltip here');
echo $formv1->generateText('perforationtreatment', 'perforationtreatment', '', 'tooltip here');
echo $formv1->generateText('perforationtreatment_t', 'perforationtreatment_t', '', 'tooltip here');
echo $formv1->generateText('latecomplications', 'latecomplications', '', 'tooltip here');
echo $formv1->generateText('latecomplications_t', 'latecomplications_t', '', 'tooltip here');
echo $formv1->generateText('severitypancreatitis', 'severitypancreatitis', '', 'tooltip here');
echo $formv1->generateText('severitypancreatitis_t', 'severitypancreatitis_t', '', 'tooltip here');
echo $formv1->generateText('technicalsuccess', 'technicalsuccess', '', 'tooltip here');
echo $formv1->generateText('technicalsuccess_t', 'technicalsuccess_t', '', 'tooltip here');
echo $formv1->generateText('clinicalsucces', 'clinicalsucces', '', 'tooltip here');
echo $formv1->generateText('clinicalsucces_t', 'clinicalsucces_t', '', 'tooltip here');
echo $formv1->generateText('additionaltreatmentneeded', 'additionaltreatmentneeded', '', 'tooltip here');
echo $formv1->generateText('additionaltreatmentneeded_t', 'additionaltreatmentneeded_t', '', 'tooltip here');
?>
						    <button id="submitvaluesercp">Submit</button>
		
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
		
			 valuesercpPassed = $("#id").text();
		
			if ( valuesercpPassed == ""){
		
				var edit = 0;
		
			}else{
		
				var edit = 1;
		
			}
		
		
		
		
		
			function fillForm (idPassed){
		
				disableFormInputs("valuesercp");
		
				valuesercpRequired = new Object;
		
				valuesercpRequired = getNamesFormElements("valuesercp");
		
				valuesercpString = '`?id`=\''+idPassed+'\'';
		
				var selectorObject = getDataQuery ("valuesercp", valuesercpString, getNamesFormElements("valuesercp"), 1);
		
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
				    
				    $("#messageBox").text("Editing valuesercp id "+idPassed);
		
				    enableFormInputs("valuesercp");
		
				});
		
				try {
		
					$("form#valuesercp").find("button#deletevaluesercp").length();
		
				}catch(error){
		
					$("form#valuesercp").find("button").after("<button id='deletevaluesercp'>Delete</button>");
		
				}
		
			}
		
		
			//delete behaviour
		
			function deletevaluesercp (){
		
				//valuesercpPassed is the current record, some security to check its also that in the id field
		
				if (valuesercpPassed != $("#id").text()){
		
					return;
		
				}
		
		
				if (confirm("Do you wish to delete this valuesercp?")) {
		
					disableFormInputs("valuesercp");
		
					var valuesercpObject = pushDataFromFormAJAX("valuesercp", "valuesercp", "?id", valuesercpPassed, "2"); //delete valuesercp
		
					valuesercpObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("valuesercp deleted");
								edit = 0;
								valuesercpPassed = null;
								window.location.href = siteRoot + "scripts/forms/valuesercpTable.php";
								//go to valuesercp list
		
							}else {
		
							alert("Error, try again");
		
							enableFormInputs("valuesercp");
		
						    }
		
		
		
						}
		
		
					});
		
				}
		
		
			}
		
			function submitvaluesercpForm (){
		
				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
				if (edit == 0){
		
					var valuesercpObject = pushDataFromFormAJAX("valuesercp", "valuesercp", "?id", null, "0"); //insert new object
		
					valuesercpObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							alert ("New valuesercp no "+data+" created");
							edit = 1;
							$("#id").text(data);
							valuesercpPassed = data;
							fillForm(data);
		
		
		
		
						}else {
		
							alert("No data inserted, try again");
		
						}
		
		
					});
		
				} else if (edit == 1){
		
					var valuesercpObject = pushDataFromFormAJAX("valuesercp", "valuesercp", "?id", valuesercpPassed, "1"); //insert new object
		
					valuesercpObject.done(function (data){
		
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
		
					fillForm(valuesercpPassed);
		
				}else{
					
					$("#messageBox").text("New valuesercp");
					
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
		
		
				$("#content").on('click', '#submitvaluesercp', (function(event) {
			        event.preventDefault();
			        $('#valuesercp').submit();
		
		
			    }));
		
			    $("#content").on('click', '#deletevaluesercp', (function(event) {
			        event.preventDefault();
			        deletevaluesercp();
		
		
			    }));
		
				$("#valuesercp").validate({
		
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
		
			            submitvaluesercpForm();
		
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