
		
		
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
			<title>Polypectomy Assessment Tool Form</title>
			
			<style>
				select{
    
    text-overflow: ellipsis;
}
				
				</style>

		</head>
		
		<?php
		//include($root . "/scripts/logobar.php");
		
		include($root . "/includes/naviERCP.php");
		?>
		
		<body>
		<div class='responsiveContainer'>
		<div id='navigateBar' class='row fixed' style="width:100vw;">
						<div class='col-9'>
						<h3 style="text-align:left;">Navigate</h3>
						<div id='buttons'></div> 
						</div>
						<div class='col-3'>
						<h3 style="text-align:center;" class="strong">Overall Score<br/><span id="numeratorSum"></span>&nbsp;/&nbsp;<span id="denominatorSum"></span></h3>
		                </div>
					</div>
</div>
		
			<div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>
		
		    <div id='content' class='content'>
		
		        <div class='responsiveContainer'>
		
				

			        <div class='row'>
		                <div class='col-9'>
		                    <h2 style="text-align:left;">Polypectomy Assessment Tool Form</h2>
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
		
		
			    
		
					<?php 
						
						$table = "PolypectomyAssessmentTool";
						$tableNameValues = "valuesPolypectomyTool";
						$tableNameSheet = "pageLayoutPolypectomyTool";


						include(BASE_URI1 . "/scripts/FormFunctionsGenericWeight.php");

						$iterationForm = 1;
						$sectionTitle = array();
						//$sectionTitle[0] = "";
						$sectionTitle[1] = "Patient Details";
						$sectionTitle[2] = "SMSA";
						$sectionTitle[3] = "Lesion Details";
						$sectionTitle[4] = "Procedure";
						$sectionTitle[5] = "Patient preparation";
						$sectionTitle[6] = "Lesion Assessment";
						$sectionTitle[7] = "Technique: Facilitating access";
						$sectionTitle[8] = "Technique: Injection technique";
						$sectionTitle[9] = "Technique: Snare placement";
						$sectionTitle[10] = "Technique: Safety checks prior to snare resection";
						$sectionTitle[11] = "Adverse events: Management of IPB";
						$sectionTitle[12] = "Adverse events: Management of Perforation";
						$sectionTitle[13] = "Difficult access";
						$sectionTitle[14] = "Specific polyps";
						$sectionTitle[15] = "Defect Inspection";
						$sectionTitle[16] = "Margin treatment";
						
						//pass to javascriptjson_encode($yourObject, JSON_FORCE_OBJECT)

						echo "<div id='sectionTitle' style='display: none;'>" . json_encode($sectionTitle, JSON_FORCE_OBJECT) . "</div>";
					
						echo '<form id="PolypectomyAssessmentTool">';
						for($x = 1; $x <= 16; $x++) {
						
							if ($x == 1 || $x == 3 || $x == 5 || $x == 7 || $x == 9|| $x == 11|| $x == 13|| $x == 15){
								echo "<div class='row'>";
							//echo "</div>";

							}
						
						
						echo "<div class='col-5'>";
						echo "<fieldset class=\"section$x\">";
							echo "<div class='row'>";
								echo "<div class='col-6'>";
								echo "<h3 style='text-align:left;'>".$sectionTitle[$x]."</h3>";
								echo "</div>";
								echo "<div class='col-6' id='sectionScore$x'>";

								echo "</div>";
							echo "</div>";
						
						echo "<table class=\"comorbidity\">";
						include(BASE_URI1 . "/scripts/iterateFormGenericWeight.php");
						echo "</table><br/></fieldset><br>";
						echo "</div>";
						echo "<div class='col-1'>";
						echo "</div>";
						if ($x == 2 || $x == 4 || $x == 6 || $x == 8|| $x == 10|| $x == 12|| $x == 14|| $x == 16){

							echo "</div>";

						}
						
						$iterationForm++;
					} 
						
		
?>

						    <button id="submitPolypectomyAssessmentTool">Submit</button>
		
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
		
						console.log(data);
		
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

			//specific js
			var sectionTitle = new Object;

			var sectionTitleText = $('#sectionTitle').text();

			try {

				sectionTitle = JSON.parse(sectionTitleText);

			}catch(Error){


			}

			var scoreBars;

			function defineDenominator(selects) {
				var scoreSection = 0;
				$(selects).each(function () {
					//console.dir($(this));
					var valueWithoutWeight = $(this).children("option:selected").val();
					//console.dir('value without weight' + valueWithoutWeight);
					var valueWithWeight = $(this).children("option:selected").data('weight');
					//console.dir(valueWithWeight);



					//valueWithWeight will be undefined if no weight

					/**
					 * so the score is for those with ValueWithWeight undefined +valueWithoutWeight
					 * for those where an object results, add the denominator from object
					 */

					if (valueWithWeight) {

						var denominator = valueWithWeight.denominator;
						denominator = parseInt(denominator);

						var scoreOption = denominator;
						


					} else if (valueWithoutWeight) {

						// var scoreOption = parseInt(valueWithoutWeight); not correct, needs to be 1
						var scoreOption = 1;

					} else{

						var scoreOption = 0;

					}

					scoreSection = scoreSection + scoreOption;
					//console.log('scoreSection is '+scoreSection);

					


				})

				return scoreSection;

			}

			function defineNumerator(selects) {
				var scoreSection = 0;
				$(selects).each(function () {
					console.dir($(this));
					var valueWithoutWeight = $(this).children("option:selected").val();
					console.dir('value without weight' + valueWithoutWeight);
					var valueWithWeight = $(this).children("option:selected").data('weight');
					console.dir(valueWithWeight);



					//valueWithWeight will be undefined if no weight

					/**
					 * so the score is for those with ValueWithWeight undefined +valueWithoutWeight
					 * for those where an object results, add the denominator from object
					 */

					if (valueWithWeight) {

						var numerator = valueWithWeight.weight;
						numerator = parseInt(numerator);

						var scoreOption = numerator;
						


					} else if (valueWithoutWeight) {

						var scoreOption = parseInt(valueWithoutWeight);
						//var scoreOption = 1;

					} else{

						var scoreOption = 0;

					}

					scoreSection = scoreSection + scoreOption;
					console.log('scoreSection is '+scoreSection);

					


				})

				return scoreSection;

			}
			
		
			$(document).ready(function() {
		
				if (edit == 1){
		
					fillForm(PolypectomyAssessmentToolPassed);

					waitForFinalEvent(function () {
						
						var fieldsets = $('.content').find('fieldset');

						$.each(fieldsets, function () {
							var selects = $(this).find('select');
							//console.dir(selects);
							var denominator = defineDenominator(selects);
							var numerator = defineNumerator(selects);

							$(this).find('.denominator').text(denominator);
							$(this).find('.numerator').text(numerator);

							var addDenominators = 0;
				$('fieldset').find('.denominator').each(function () {

					var denominator = $(this).text();
					//console.dir(denominator);
					if (denominator) {
						denominator = parseInt(denominator);
						addDenominators = addDenominators + denominator;
					} else {

						addDenominators = addDenominators + 0;
					}


				});

				$('#denominatorSum').text(addDenominators);

				var addNumerators = 0;
				$('fieldset').find('.numerator').each(function () {

					var numerator = $(this).text();
					//console.dir(numerator);
					if (numerator) {
						numerator = parseInt(numerator);
						addNumerators = addNumerators + numerator;
					} else {

						addNumerators = addNumerators + 0;
					}


				});

				$('#numeratorSum').text(addNumerators);
						});

					}, 500, "anotyher unique string");

					

					
				//console.log(denominator);

				//console.dir($(this).parents().closest('fieldset').find('.denominator'));
				

				//add denominator total

				
		
				}else{
					
					$("#messageBox").text("New PolypectomyAssessmentTool");
					
				}
		
				//set the position of the navigate bar
		
				var navBarHeight = $('.navBar').css("height");
				
				var navigateBarHeight = $('#navigateBar').height();
				navigateBarHeight = navigateBarHeight + 50;
				navigateBarHeight = navigateBarHeight + 'px';
				
				$("#navigateBar").css({transform: 'translateY('+navBarHeight+')'});
				
				$(".content").css({transform: 'translateY('+navigateBarHeight+')'});
				

				$(window).resize(function () {
					waitForFinalEvent(function () {
						var navBarHeight = $('.navBar').css("height");
						var navigateBarHeight = $('#navigateBar').height();
						navigateBarHeight = navigateBarHeight + 50;
						navigateBarHeight = navigateBarHeight + 'px';
						
						$("#navigateBar").css({
							transform: 'translateY(' + navBarHeight + ')'
						});

						$(".content").css({
							transform: 'translateY(' + navigateBarHeight + ')'
						});

					}, 500, "some unique string");
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

			//specific polypoectomy tool js

			//chop the select texts to fit

			var maxLength = 30;
			$('select > option').text(function (i, text) {
				if (text.length > maxLength) {
					return text.substr(0, maxLength) + '...';
				}
			});

			//get the section score divs to enter score
			
			scoreBars = $("[id^=sectionScore]");
			scoreBars = scoreBars.filter(function () {
				//return true to keep it, false to discard it
				//the logic is up to you.
				//console.dir($(this));
				var id = $(this).attr('id');
				console.dir(id);
				if ((id.endsWith("sectionScore1") === true) || id.endsWith("sectionScore3") === true || id.endsWith("sectionScore4") === true) {
					return false;

				} else {
					return true;
				}

			});

			$(scoreBars).each(function(){
				$(this).addClass('strong');
				$(this).html('<h3>Score<br/><span class="numerator"></span>&nbsp;/&nbsp;<span class="denominator"></span></h3>'); 
			})

			$("#content").on('change', '.formInputs', (function(event) {
			        
				var selects = $(this).parents().closest('fieldset').find('select'); //returns the select elements for the whole fieldset where the change occurred
				var denominator = defineDenominator(selects);
				var numerator = defineNumerator(selects);
				//console.log(denominator);

				//console.dir($(this).parents().closest('fieldset').find('.denominator'));
				$(this).parents().closest('fieldset').find('.denominator').text(denominator);
				$(this).parents().closest('fieldset').find('.numerator').text(numerator);

				//add denominator total

				var addDenominators = 0;
				$('fieldset').find('.denominator').each(function () {

					var denominator = $(this).text();
					console.dir(denominator);
					if (denominator) {
						denominator = parseInt(denominator);
						addDenominators = addDenominators + denominator;
					} else {

						addDenominators = addDenominators + 0;
					}


				});

				$('#denominatorSum').text(addDenominators);

				var addNumerators = 0;
				$('fieldset').find('.numerator').each(function () {

					var numerator = $(this).text();
					//console.dir(numerator);
					if (numerator) {
						numerator = parseInt(numerator);
						addNumerators = addNumerators + numerator;
					} else {

						addNumerators = addNumerators + 0;
					}


				});

				$('#numeratorSum').text(addNumerators);
		
			}));

			//generate buttons for navigation

			var xSection=1;

			$.each(sectionTitle, function (key, value) {
				//alert( key + ": " + value );

				var text = '';
				/*if (xSection == 1 || xSection == 7 || xSection == 11){

					text += '<div class="row">';
					text += '<div class="col-12">';

				}*/
				
				text += '<button class="buttonNavigate" onclick=\'var scroll = $(".section' + key + '").offset().top; scroll = scroll-250; window.scrollTo({top: scroll});\'>' + key + ' - ' + value + '</button>';
				$('#buttons').append(text);
				
				/*if (xSection == 6 || xSection == 10 || xSection == 16){
					text += '</div>';
					text += '</div>';

				}*/
				

				xSection++;

			});

			



	
		
		})
		
			</script>
		<?php
		
		    // Include the footer file to complete the template:
		    include($root ."/includes/footer.php");
		
		
		
		
		    ?>
		</body>
		</html>