
		
		
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
		    <title>Procedure Form</title>
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
		                    <h2 style="text-align:left;">Procedure Form</h2>
		                </div>
		
		                <div id="messageBox" class='col-3 yellow-light narrow center'>
		                    <p></p>
		                </div>
		            </div>
		
		
			        <p><?php
		
				        if ($id){
		
							$q = "SELECT  _k_procedure  FROM  Procedure  WHERE  _k_procedure  = $id";
							if ($general->returnYesNoDBQuery($q) != 1){
								echo "Passed id does not exist in the database";
								exit();
		
							}
						}
		
		?></p>
		
		
			        <p>
		
					    <form id="Procedure">
					    <?php echo $formv1->generateText('_k_procedure', '_k_procedure', '', 'tooltip here');
echo $formv1->generateText('_k_patient', '_k_patient', '', 'tooltip here');
echo $formv1->generateText('Institution', 'Institution', '', 'tooltip here');
echo $formv1->generateText('ProcedureDate', 'ProcedureDate', '', 'tooltip here');
echo $formv1->generateText('Age', 'Age', '', 'tooltip here');
echo $formv1->generateText('Consultant', 'Consultant', '', 'tooltip here');
echo $formv1->generateText('Endoscopist', 'Endoscopist', '', 'tooltip here');
echo $formv1->generateText('Complete_Colon', 'Complete_Colon', '', 'tooltip here');
echo $formv1->generateText('TertiaryReferral', 'TertiaryReferral', '', 'tooltip here');
echo $formv1->generateText('RefDocType', 'RefDocType', '', 'tooltip here');
echo $formv1->generateText('ASA', 'ASA', '', 'tooltip here');
echo $formv1->generateText('MajorComorb_Simple', 'MajorComorb_Simple', '', 'tooltip here');
echo $formv1->generateText('MajorComorbNone', 'MajorComorbNone', '', 'tooltip here');
echo $formv1->generateText('MajorComorbIHD', 'MajorComorbIHD', '', 'tooltip here');
echo $formv1->generateText('MajorComorbCCF', 'MajorComorbCCF', '', 'tooltip here');
echo $formv1->generateText('MajorComorbHT', 'MajorComorbHT', '', 'tooltip here');
echo $formv1->generateText('MajorComorbCVA', 'MajorComorbCVA', '', 'tooltip here');
echo $formv1->generateText('MajorComorbChronicResp', 'MajorComorbChronicResp', '', 'tooltip here');
echo $formv1->generateText('MajorComorbChronicRenal', 'MajorComorbChronicRenal', '', 'tooltip here');
echo $formv1->generateText('MajorComorbMajorRheum', 'MajorComorbMajorRheum', '', 'tooltip here');
echo $formv1->generateText('MajorComorbLiverDisease', 'MajorComorbLiverDisease', '', 'tooltip here');
echo $formv1->generateText('MajorComorbCirrhosis', 'MajorComorbCirrhosis', '', 'tooltip here');
echo $formv1->generateText('MajorComorbActiveCa', 'MajorComorbActiveCa', '', 'tooltip here');
echo $formv1->generateText('MajorComorbDM1', 'MajorComorbDM1', '', 'tooltip here');
echo $formv1->generateText('MajorComorbDM2', 'MajorComorbDM2', '', 'tooltip here');
echo $formv1->generateText('MajorComorbHaem', 'MajorComorbHaem', '', 'tooltip here');
echo $formv1->generateText('MajorComorbObese', 'MajorComorbObese', '', 'tooltip here');
echo $formv1->generateText('MajorComorbOther', 'MajorComorbOther', '', 'tooltip here');
echo $formv1->generateText('MajorComorb_OtherNotes', 'MajorComorb_OtherNotes', '', 'tooltip here');
echo $formv1->generateText('Reg_Antithromb', 'Reg_Antithromb', '', 'tooltip here');
echo $formv1->generateText('Reg_Antithromb_1', 'Reg_Antithromb_1', '', 'tooltip here');
echo $formv1->generateText('Reg_Antithromb_1Other', 'Reg_Antithromb_1Other', '', 'tooltip here');
echo $formv1->generateText('Discontinuation1', 'Discontinuation1', '', 'tooltip here');
echo $formv1->generateText('Reg_Antithromb_2', 'Reg_Antithromb_2', '', 'tooltip here');
echo $formv1->generateText('Reg_Antithromb_2Other', 'Reg_Antithromb_2Other', '', 'tooltip here');
echo $formv1->generateText('Discontinuation2', 'Discontinuation2', '', 'tooltip here');
echo $formv1->generateText('Reg_Antithromb_7daySum', 'Reg_Antithromb_7daySum', '', 'tooltip here');
echo $formv1->generateText('MainIndic', 'MainIndic', '', 'tooltip here');
echo $formv1->generateText('MainIndic_Other', 'MainIndic_Other', '', 'tooltip here');
echo $formv1->generateText('Height', 'Height', '', 'tooltip here');
echo $formv1->generateText('Weight', 'Weight', '', 'tooltip here');
echo $formv1->generateText('AbdoCirc', 'AbdoCirc', '', 'tooltip here');
echo $formv1->generateText('Smoking100CigsEver', 'Smoking100CigsEver', '', 'tooltip here');
echo $formv1->generateText('SmokingCigsPerDay', 'SmokingCigsPerDay', '', 'tooltip here');
echo $formv1->generateText('AlcoholCurrent', 'AlcoholCurrent', '', 'tooltip here');
echo $formv1->generateText('AlcoholEver', 'AlcoholEver', '', 'tooltip here');
echo $formv1->generateText('Bowel_preparation', 'Bowel_preparation', '', 'tooltip here');
echo $formv1->generateText('Pain', 'Pain', '', 'tooltip here');
echo $formv1->generateText('MultipleESDs', 'MultipleESDs', '', 'tooltip here');
echo $formv1->generateText('DirectAdmit', 'DirectAdmit', '', 'tooltip here');
echo $formv1->generateText('DirectAdmitReason', 'DirectAdmitReason', '', 'tooltip here');
echo $formv1->generateText('DirectAdmit_Other', 'DirectAdmit_Other', '', 'tooltip here');
echo $formv1->generateText('DirectAdmit_NoNights', 'DirectAdmit_NoNights', '', 'tooltip here');
echo $formv1->generateText('DirectAdmit_NonSocialYN', 'DirectAdmit_NonSocialYN', '', 'tooltip here');
echo $formv1->generateText('DelayedAdmit', 'DelayedAdmit', '', 'tooltip here');
echo $formv1->generateText('DelayedAdmit_Reason', 'DelayedAdmit_Reason', '', 'tooltip here');
echo $formv1->generateText('DelayedAdmit_ReasonOther', 'DelayedAdmit_ReasonOther', '', 'tooltip here');
echo $formv1->generateText('DelayedAdmit_NoNights', 'DelayedAdmit_NoNights', '', 'tooltip here');
echo $formv1->generateText('AnyAdmit', 'AnyAdmit', '', 'tooltip here');
echo $formv1->generateText('TotalInpatientNights', 'TotalInpatientNights', '', 'tooltip here');
echo $formv1->generateText('AnyAdmitNotes', 'AnyAdmitNotes', '', 'tooltip here');
?>
						    <button id="submitProcedure">Submit</button>
		
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
		
			 ProcedurePassed = $("#id").text();
		
			if ( ProcedurePassed == ""){
		
				var edit = 0;
		
			}else{
		
				var edit = 1;
		
			}
		
		
		
		
		
			function fillForm (idPassed){
		
				disableFormInputs("Procedure");
		
				ProcedureRequired = new Object;
		
				ProcedureRequired = getNamesFormElements("Procedure");
		
				ProcedureString = '`_k_procedure`=\''+idPassed+'\'';
		
				var selectorObject = getDataQuery ("Procedure", ProcedureString, getNamesFormElements("Procedure"), 1);
		
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
				    
				    $("#messageBox").text("Editing Procedure id "+idPassed);
		
				    enableFormInputs("Procedure");
		
				});
		
				try {
		
					$("form#Procedure").find("button#deleteProcedure").length();
		
				}catch(error){
		
					$("form#Procedure").find("button").after("<button id='deleteProcedure'>Delete</button>");
		
				}
		
			}
		
		
			//delete behaviour
		
			function deleteProcedure (){
		
				//ProcedurePassed is the current record, some security to check its also that in the id field
		
				if (ProcedurePassed != $("#id").text()){
		
					return;
		
				}
		
		
				if (confirm("Do you wish to delete this Procedure?")) {
		
					disableFormInputs("Procedure");
		
					var ProcedureObject = pushDataFromFormAJAX("Procedure", "Procedure", "_k_procedure", ProcedurePassed, "2"); //delete Procedure
		
					ProcedureObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("Procedure deleted");
								edit = 0;
								ProcedurePassed = null;
								window.location.href = siteRoot + "scripts/forms/ProcedureTable.php";
								//go to Procedure list
		
							}else {
		
							alert("Error, try again");
		
							enableFormInputs("Procedure");
		
						    }
		
		
		
						}
		
		
					});
		
				}
		
		
			}
		
			function submitProcedureForm (){
		
				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
				if (edit == 0){
		
					var ProcedureObject = pushDataFromFormAJAX("Procedure", "Procedure", "_k_procedure", null, "0"); //insert new object
		
					ProcedureObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							alert ("New Procedure no "+data+" created");
							edit = 1;
							$("#id").text(data);
							ProcedurePassed = data;
							fillForm(data);
		
		
		
		
						}else {
		
							alert("No data inserted, try again");
		
						}
		
		
					});
		
				} else if (edit == 1){
		
					var ProcedureObject = pushDataFromFormAJAX("Procedure", "Procedure", "_k_procedure", ProcedurePassed, "1"); //insert new object
		
					ProcedureObject.done(function (data){
		
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
		
					fillForm(ProcedurePassed);
		
				}else{
					
					$("#messageBox").text("New Procedure");
					
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
		
		
				$("#content").on('click', '#submitProcedure', (function(event) {
			        event.preventDefault();
			        $('#Procedure').submit();
		
		
			    }));
		
			    $("#content").on('click', '#deleteProcedure', (function(event) {
			        event.preventDefault();
			        deleteProcedure();
		
		
			    }));
		
				$("#Procedure").validate({
		
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
		
			            submitProcedureForm();
		
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