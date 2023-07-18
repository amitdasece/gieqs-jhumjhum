
		
		
			<?php

			

			$openaccess = 0;
			$requiredUserLevel = 2;
			
			require ('../../includes/config.inc.php');		
			
			require (BASE_URI1.'/scripts/headerCreatorV2.php');
		
			//(1);
			//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');
		
			$formv1 = new formGenerator;
			$general = new general;
			$video = new video;
			$tagCategories = new tagCategories;
			$PolypectomyAssessmentTool = new PolypectomyAssessmentTool;
			
		
		
		
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
		    <title>PolypectomyAssessmentTool data entry Form</title>  <!-- CHANGE -->
            <style>.text-gieqsGold {

            	color: rgb(238, 194, 120);

            }

            .bg-gieqsGold {

            	background-color: rgb(238, 194, 120);

            }

            .pointer {

            	cursor: pointer;
            	display: none;
			}
			
			.cursor-pointer {

cursor: pointer;

}

.form-control:disabled, .form-control[readonly] {
    opacity: 0.10; 
    /*background-color: #edf2f9;*/
}

            @media only screen and (max-width: 992px) {

            	.pointer {

            		display: block;
            	}

            	#sticky {


            		border: rgb(238, 194, 120), 1px;
            		right: 1%;
            		display: none;

            		z-index: 10;

            		background-color: #162e4d;
            		top: 25%;
            		max-width: 50%;
            		min-width: 50%;



				}
				
				.close-popup {

display:block;

}

            }

            @media only screen and (min-width: 992px) {

            	.pointer {

            		display: none;
            	}

            	#sticky {


            		position: fixed;
            		display: block !important;
            		top: 25%;



				}
				.close-popup {

					display:none;

				}

            }



            }

            </style>
		</head>
		
		<?php
		//include($root . "/scripts/logobar.php");
		include(BASE_URI1 . "/includes/topbar.php");
		include(BASE_URI1 . "/includes/naviv2.php");
		?>
		
		<body>
		
			<div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>
		
		    <div id='content' class='content'>
		
		        <div class='responsiveContainer container'>
                
			        <div class='row pt-4 mt-0'>
		                <div class='col-lg-9 col-xl-9 pr-6 pl-2'>
		                    <h2 style="text-align:left;">Polypectomy Report Card</h2>
		                </div>
		
		                <!-- <div id="messageBox" class='col-2 text-center bg-secondary pt-2 pl-1'>
		                    <p>Enter some data here</p>
		                </div> -->
					</div>
					<div class='row pl-4 mt-0 d-flex justify-content-end'>
		                
						<a class="pointer"><i class="flip fas fa-chevron-down"></i><span class="h6 text-muted">&nbsp;show navigation</span></a>
		             
		
		                <!-- <div id="messageBox" class='col-2 text-center bg-secondary pt-2 pl-1'>
		                    <p>Enter some data here</p>
		                </div> -->
		            </div>

                    <div class="row pt-3">
                    <div id="left" class="col-lg-9 col-xl-9 pr-6 pl-4">
                    <div class="docs-content">
		
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
		
					    
						<?php 
						
						$tableNameValues = "valuesPolypectomyTool";
						$tableNameSheet = "pageLayoutPolypectomyTool";


						include(BASE_URI1 . "/scripts/FormFunctionsGenericWeight.php");

						$iterationForm = 1;
						$sectionTitle = array();
						//error_reporting(E_ALL);
                        //$sectionTitle[0] = "";
                        

//1 - Patient Details2 - SMSA3 - Lesion Details4 - Procedure5 - Patient preparation
//6 - Lesion Assessment7 - Technique: Facilitating access8 - Technique: Injection technique
//9 - Technique: Snare placement10 - Technique: Safety checks prior to snare resection
//11 - Adverse events: Management of IPB12 - Adverse events: Management of Perforation/
//13 - Difficult access14 - Specific polyps15 - Defect Inspection16 - Margin treatment
						$sectionTitle[1] = "Patient Details";
						$sectionTitle[2] = "SMSA Score";
						$sectionTitle[3] = "Lesion Details";
						$sectionTitle[4] = "Procedure";
						$sectionTitle[5] = "Patient Preparation";
						$sectionTitle[6] = "Lesion Assessment";
						$sectionTitle[7] = "Technique: Facilitating Access";
						$sectionTitle[8] = "Technique: Injection technique";
						$sectionTitle[9] = "Technique: Snare placement";
						$sectionTitle[10] = "Technique: Safety checks prior to snare resection";
                        $sectionTitle[11] = "Adverse events: Management of IPB";
                        $sectionTitle[12] = "Adverse events: Management of Perforation";
						$sectionTitle[13] = "Difficult Access";
						$sectionTitle[14] = "Specific Polyps";
						$sectionTitle[15] = "Defect Inspection";
						$sectionTitle[16] = "Margin Treatment";

						
					
					
						echo '<form id="esdLesion">';
					for($x = 1; $x <= 16; $x++) {
						
						if ($x == 3 || $x == 5 || $x == 7 || $x == 9){

							//echo "</div>";

						}
						echo "<div class=\"form-group text-left\">";
						//echo "<div class='row'>";
						//echo "<div class='col-5'>";
						echo "<fieldset id=\"".$sectionTitle[$x]."Section\" class=\"".$sectionTitle[$x]."\"><h4 style='text-align:left;'>".$sectionTitle[$x]."</h4>";
						echo "<div class='col-6' id='sectionScore$x'>";

								echo "</div>";
						//echo "<table class=\"comorbidity\">";
						include(BASE_URI1 . "/scripts/iterateFormGenericWeight.php");
						echo "<br/></fieldset><br>";
						//echo "</div>";
						//echo "<div class='col-1'>";
						//echo "</div>";
						if ($x == 2 || $x == 4 || $x === 6 || $x === 8){

							//echo "</div>";

						}
                        echo "<hr>";
                        echo "</div>";
						$iterationForm++;
					} 
						
		
?>
						    
		
					    
		
				        </p>
		
		
                        </form>
		        </div>
                </div>
				 
		
		    
			
        
        <div id="right" class="col-lg-3 col-xl-3 border-left">
        	<div class="h-100 p-4">
        		<div id="sticky" data-toggle="sticky" data-sticky-offset="100" class="is_stuck pr-3 mr-3 pl-2 pt-2"
        			style="position: fixed; top: 100px;">
        			<div id="messageBox" class='text-left text-white pb-2 pl-2 pt-2'></div><button type="button"
        				class="close closeNav close-popup" data-hide="#sticky" aria-label="Close">
						<span aria-hidden="true" style="color:white !important;">&times;</span></button>
						<div
                                                class="d-flex flex-nowrap text-small text-muted text-right px-3 mt-1 mb-3 ">
                                                
                                                
                                                <div>
                                                    <i class="fas fa-scroll cursor-pointer mr-4" data-toggle="modal" data-target="#modal-POEM-ENG" id="showPOEMReport"></i>
                                                </div>
                                                <div>
                                                    <i id="hideNotRequired" onclick="hideNotRequired();" class="mr-4 fas fa-search-minus cursor-pointer"></i>
											  </div>
											  <div>
												<i id="saveesdLesion" class="fas fa-save cursor-pointer mr-4" onclick="saveesdLesionForm();"></i>
											</div>
                                                <div>
                                                <i id='video-forward' class="fas fa-trash cursor-pointer mr-4"></i>
                                                </div>
                                                
                                            
                                                
                                                
                                                
                                            </div>


        			<div id="errorWrapper"
        				class="error alert alert-warning alert-flush alert-dismissible collapse bg-gieqsGold"
        				role="alert">
        				<strong>Check the form!</strong> <span id="error"></span><button type="button" class="close"
        					data-hide="alert" aria-label="Close">
        					<span aria-hidden="true">&times;</span>
        				</button>
        			</div>
        			<div id="successWrapper" class="success alert alert-success alert-flush alert-dismissible collapse"
        				role="alert">
        				<strong>Success!</strong> <span id="success"></span><button type="button" class="close"
        					data-hide="alert" aria-label="Close">
        					<span aria-hidden="true">&times;</span>
        				</button>
					</div>
					
					<div id="warningWrapper" class="warning alert alert-warning alert-flush alert-dismissible collapse"
        				role="alert">
        				<strong>Warning!</strong> <span id="warning"></span><button type="button" class="close"
        					data-hide="alert" aria-label="Close">
        					<span aria-hidden="true">&times;</span>
        				</button>
        			</div>
                        <!-- <div class="error text-warning  text-left pb-2">
                
                </div> -->
              <h6 class="mb-3 pl-2">Navigation</h6>
              
              <ul class="section-nav">
              
                <!-- <li class="toc-entry toc-h2"><a href="#examples">Sections</a> -->
                  <!-- <ul> -->
                  <?php

                    for($x = 1; $x <= 16; $x++) {
                        echo '<li class="toc-entry toc-h4" style="font-size:0.8rem;"><a class="text-muted" href="#'.$sectionTitle[$x].'Section">'.$sectionTitle[$x].'</a></li>';
                        //echo "<button type=\"button\" class=\"btn ".$sectionTitle[$x]. "\">".$sectionTitle[$x]."</button>";

                    }

                            ?>
                             <!-- </ul> -->
                <!-- </li> -->
                </ul>
                <ul class="section-nav">
				
                <div class="d-none d-sm-inline-block align-items-center">
				<button class="btn btn-sm py-1 px-2 bg-dark-light mt-3 mb-3 mr-3" id="submitesdLesion">Validate</button>

				<button class="btn btn-sm py-1 px-2 bg-dark-light mt-3 mb-3 mr-3" data-toggle="modal" data-target="#modal-POEM-DUTCH" id="showPOEMReportDutch">Show Report (NED)</button>

                </div>
                </ul>
                <ul class="section-nav">

                <div class="d-none d-sm-inline-block align-items-center mt-4">
				<h4 style="text-align:center;" class="strong">Overall Score<br/><span id="numeratorSum"></span>&nbsp;/&nbsp;<span id="denominatorSum"></span></h4>

                
                <!-- <p>Polypectomy Score </p>
                <p>Complexity Score </p>
                <p>Overall Score </p> -->

                </div>
                </ul>
            
            </div> <!--close sticky nav-->  
                                
            
        </div> <!--close right h-100 div-->
        </div> <!--close right column div-->
        </div> <!--close the row-->
        </div> <!--close container-->
		</div> <!--close content-->
		<!-- Modal -->

		<div id='modalHolder'>
		<?php //require BASE_URI1 . '/scripts/display/popupPOEMReport.php';?>
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

			esdLesionPassed = $("#id").text();

			if (esdLesionPassed == "") {

				var edit = 0;

			} else {

				var edit = 1;

			}


			var checkedInputs = [];



			// Parsley full doc is avalailable here : https://github.com/guillaumepotier/Parsley.js/

			function showAll() {


				$('#content').find(':input').not('button').each(function () {

					//console.log(this);

					$(this).parent().show();

					var label = $("label[for='" + $(this).attr('id') + "']");

					//console.log(label);

					if (label.length >= 0) {

						$(label).show();
					}


					$('#content').find('fieldset').each(function () {

						$(this).show();



						$(this).next().next().show();









						//console.log($(this).parent().prev());


					})


					$('#hideNotRequired').attr('onclick', 'hideNotRequired();');

					$('#hideNotRequired').removeClass('fa-search-plus').addClass('fa-search-minus');




				})

			}

			function hideNotRequired() {

				var required = ["MRN", "DOB", "diagnosis", "ProcedureDate", "POEM_complication", "POEM_knife", "myotomy_bottom", "myotomy_top", "POEM_incision_distance", "POEM_incision_position", "submucosal_tunnel_bottom", "myotomy_top", "myotomy_full_thickness_length_distal", "POEM_number_clips", "POEM_duration_total"];

				$('#content').find(':input').not('button').each(function () {

					//console.log(this);

					var search = $(this).attr('id');

					//console.log(search);

					if (required.indexOf(search) > -1) {

						//found a match

						//don't hide, otherwise hide

					} else {

						$(this).parent().hide();

						var label = $("label[for='" + $(this).attr('id') + "']");

						//console.log(label);

						if (label.length >= 0) {

							$(label).hide();
						}

						//hide empty fieldsets

						//for each fieldset  TODO SWITCH TO JS, NO DO IN BACKGROUND GET THIS ARRAY, THEN JUST USE
						/*var fieldsets = $('#content').find('fieldset');

						var l = fieldsets.length;

						for (var i=0;i<l; i++) {
							

							var fieldsetContents = $(this).children().find(':input').filter(':visible');

							console.dir (fieldsetContents);

						}*/

						$('#content').find('fieldset').each(function () {

							var fieldsetContents = $(this).children().find(':input').filter(':visible');

							console.log(fieldsetContents);

							if (fieldsetContents.length <= 0) {

								$(this).hide();

								$(this).next().next().hide();

							}



						})

						$('#hideNotRequired').addClass('fa-search-plus').removeClass('fa-search-minus');


						$('#hideNotRequired').attr('onclick', 'showAll();');

						//console.log($(this).parent().prev());


					}

				})




			}

			function fillForm(idPassed) {

				disableFormInputs("esdLesion");

				esdLesionRequired = new Object;

				esdLesionRequired = getNamesFormElements("esdLesion");

				esdLesionString = '`id`=\'' + idPassed + '\''; //CHANGE

				var selectorObject = getDataQuery("PolypectomyAssessmentTool", esdLesionString, getNamesFormElements("esdLesion"), 1); //CHANGE FIRST

				//console.log(selectorObject);

				selectorObject.done(function (data) {

					console.log('FORMDATA IS' + data);

					var formData = $.parseJSON(data);


					$(formData).each(function (i, val) {
						$.each(val, function (k, v) {

							if ($("#" + k).is(':checkbox')) {

								if (v == 1) {

									$("#" + k).prop("checked", true);
									checkedInputs.push("#" + k);

								} else {

									$("#" + k).prop("checked", false);

								}


							} else if ($("#" + k).attr('id') == 'validated') {
								
								$("#" + k).val(v);

								console.log('found a validate and v is ' + v);

								//disable the save button if validated

								if (v == '1'){

								$("#saveesdLesion").hide();

								}

								
							} else {


								$("#" + k).val(v);

							}
							//console.log(k+' : '+ v);
						});

					});

					$("#messageBox").text("Editing PolypectomyAssessmentTool ID " + idPassed);

					enableFormInputs("esdLesion");

				});



				if ($("right").find("button#deleteesdLesion").length == 0) {

					$("#right").find("button#submitesdLesion").after(
						"<button class='btn btn-sm py-1 px-2 bg-dark-light mt-3 mb-3 ml-0' id='deleteesdLesion'>Delete</button>"
						);


				} else {

				}



			}


			//delete behaviour

			function deleteesdLesion() {

				//esdLesionPassed is the current record, some security to check its also that in the id field

				if (esdLesionPassed != $("#id").text()) {

					return;

				}


				if (confirm("Do you wish to delete this Polypectomy Report?")) {

					disableFormInputs("esdLesion");

					var esdLesionObject = pushDataFromFormAJAX("esdLesion", "PolypectomyAssessmentTool", "id", esdLesionPassed,
					"2"); //CHANGE 2 and identifier

					esdLesionObject.done(function (data) {

						//console.log(data);

						if (data) {

							if (data == 1) {

								alert("PolypectomyAssessmentTool deleted"); //CHANGE
								edit = 0;
								esdLesionPassed = null;
								window.location.href = siteRoot + "scripts/forms/PolypectomyReportTablev2.php"; //CHANGE
								//go to esdLesion list

							} else {

								alert("Error, try again");

								enableFormInputs("esdLesion");

							}



						}


					});

				}


			}

			function submitesdLesionForm() {

				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)

				if (edit == 0) {

					var esdLesionObject = pushDataFromFormAJAX("esdLesion", "PolypectomyAssessmentTool", "id", null,
					"0"); //insert new object //CHANGE 2,3

					esdLesionObject.done(function (data) {

						console.log(data);

						if (data) {

							//alert ("New esdLesion no "+data+" created");
							$('#success').text("New PolypectomyAssessmentTool no " + data + " created");
							//$('#successWrapper').show();
							$("#successWrapper").fadeTo(4000, 500).slideUp(500, function () {
								$("#successWrapper").slideUp(500);
							});
							edit = 1;
							$("#id").text(data);
							esdLesionPassed = data;
							fillForm(data);
							refreshReport();




						} else {

							alert("No data inserted, try again");

						}


					});

				} else if (edit == 1) {

					var esdLesionObject = pushDataFromFormAJAX("esdLesion", "PolypectomyAssessmentTool", "id", esdLesionPassed,
					"1"); //insert new object //CHANGE 2,3

					esdLesionObject.done(function (data) {

						console.log(data);

						if (data) {

							if (data == 1) {

								$('#success').text("Data updated");
								$("#successWrapper").fadeTo(4000, 500).slideUp(500, function () {
									$("#successWrapper").slideUp(500);
								});
								edit = 1;
								refreshReport();

							} else if (data == 0) {

								$('#warning').text("No changes to data detected");
								$("#warningWrapper").fadeTo(4000, 500).slideUp(500, function () {
									$("#warningWrapper").slideUp(500);
								});

							} else if (data == 2) {

								alert("Error, try again");

							}



						}


					});




				}


			}

			function saveesdLesionForm() {

				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)

				if (edit == 0) {



					$('#validated').val('0');

					var esdLesionObject = pushDataFromFormAJAX("esdLesion", "PolypectomyAssessmentTool", "id", null,
					"0"); //insert new object //CHANGE 2,3

					esdLesionObject.done(function (data) {

						console.log(data);

						if (data) {

							//alert ("New esdLesion no "+data+" created");
							$('#success').text("New PolypectomyAssessmentTool no " + data + " saved");
							//$('#successWrapper').show();
							$("#successWrapper").fadeTo(4000, 500).slideUp(500, function () {
								$("#successWrapper").slideUp(500);
							});
							edit = 1;
							$("#id").text(data);
							esdLesionPassed = data;
							fillForm(data);
							refreshReport();




						} else {

							alert("No data inserted, try again");

						}


					});

				} else if (edit == 1) {
					//$('#validated').val('0');

					var esdLesionObject = pushDataFromFormAJAX("esdLesion", "PolypectomyAssessmentTool", "id", esdLesionPassed,
					"1"); //insert new object //CHANGE 2,3

					esdLesionObject.done(function (data) {

						console.log(data);

						if (data) {

							if (data == 1) {

								$('#success').text("Data saved");
								$("#successWrapper").fadeTo(4000, 500).slideUp(500, function () {
									$("#successWrapper").slideUp(500);
								});
								edit = 1;
								refreshReport();

							} else if (data == 0) {

								$('#warning').text("No changes to data detected");
								$("#warningWrapper").fadeTo(4000, 500).slideUp(500, function () {
									$("#warningWrapper").slideUp(500);
								});

							} else if (data == 2) {

								alert("Error, try again");

							}



						}


					});




				}


			}

			//new ajax function

			function refreshReport() {


				var key = $('#id').text();

				const dataToSend = {

					key: key,

				}

				const jsonString = JSON.stringify(dataToSend);
				console.log(jsonString);
				console.log(siteRoot + "/scripts/display/popupPolypectomyReport.php");

				var request2 = $.ajax({
					beforeSend: function () {


					},
					url: siteRoot + "/scripts/display/popupPolypectomyReport.php",
					type: "POST",
					contentType: "application/json",
					data: jsonString,
				});



				request2.done(function (data) {
					// alert( "success" );
					$('#modalHolder').html(data);
					//$(document).find('.Thursday').hide();
				})
			}

			$(document).ready(function () {

				if (edit == 1) {

					fillForm(esdLesionPassed);

				} else {

					$("#messageBox").text("New PolypectomyAssessmentTool");

				}


				$(function () {
					$("[data-hide]").on("click", function () {
						$("." + $(this).attr("data-hide")).hide();
						// -or-, see below
						// $(this).closest("." + $(this).attr("data-hide")).hide();
					});
				});


				$(window).scroll(function () {
					var scrollDistance = $(window).scrollTop();


					// Assign active class to nav links while scolling
					$('fieldset').each(function (i) {
						if ($(this).position().top <= scrollDistance) {
							$('.section-nav a.text-gieqsGold').removeClass('text-gieqsGold').addClass(
								'text-muted');
							$('.section-nav a').eq(i).addClass('text-gieqsGold').removeClass(
								'text-muted');
						}
					});
				}).scroll();

				refreshReport();





				$("#content").on('click', '#submitesdLesion', (function (event) {
					event.preventDefault();
					$('#esdLesion').submit();


				}));

				$("#content").on('click', '#deleteesdLesion', (function (event) {
					event.preventDefault();
					deleteesdLesion();


				}));

				$("#content").on('click', '.pointer', (function (event) {

					$('#sticky').toggle();


				}));

				$("#content").on('click', '.closeNav', (function (event) {

					$('#sticky').hide();


				}));

				// override jquery validate plugin defaults
				$.validator.setDefaults({
					highlight: function (element) {
						$(element).closest('.form-control').addClass('is-invalid');
					},
					unhighlight: function (element) {
						$(element).closest('.form-control').removeClass('is-invalid');
					},
					errorElement: 'div',
					errorClass: 'input-group-btn pt-0 mt-0 pb-2 text-gieqsGold',
					errorPlacement: function (error, element) {


						if (element.parent('.input-group').length) {
							error.insertAfter(element.parent());
						} else if (element.parent('.custom-control').length) {
							error.insertAfter(element.parent());
						} else {
							error.insertAfter(element);
						}
					}
				});

				$.validator.addMethod("checkIndividual", function (value, element, desired) {

					if (value == desired) {

						return true;
					} else {

						return false;
					}

				});

				$("#esdLesion").validate({




					invalidHandler: function (event, validator) {
						var errors = validator.numberOfInvalids();
						console.log("there were " + errors + " errors");
						if (errors) {
							var message = errors == 1 ?
								"1 field contains errors. It has been highlighted" :
								+errors + " fields contain errors. They have been highlighted";


							$('#error').text(message);
							//$('div.error span').addClass('form-text text-danger');
							//$('#errorWrapper').show();

							$("#errorWrapper").fadeTo(4000, 500).slideUp(500, function () {
								$("#errorWrapper").slideUp(500);
							});
						} else {
							$('#errorWrapper').hide();
						}
					},
					rules: {
						MRN: {
							required: true,
							//number: true,
							maxlength: 13,
						}, //OF COURSE CHANGE




						DOB: {

							required: true,
							number: true,
						},



						comorbidity: {


						},

						POEM_knife:{

							required : true,

						},

						myotomy_bottom:{

							required : true,

						},

						myotomy_top : {

							required: true,
						},



						comorbidity_other: {

							required: function (element) {
								return $("#comorbidity").val() == "4";

							}

						},



						weight: {


						},



						medication_aspirin: {


						},



						medication_clopidogrel: {


						},



						medication_warfarin: {


						},



						medication_other: {


						},



						previous_treatment_PPI: {


						},



						previous_treatment_CACB: {


						},



						previous_treatment_NITR: {


						},



						previous_treatment_SSRI: {


						},



						previous_treatment_Dilatation: {


						},



						previous_treatment_botulinum: {


						},



						weight_loss: {


						},



						symptoms_regurg: {


						},



						symptoms_dysphagia: {


						},



						symptoms_chestpain: {


						},



						symptoms_heartburn: {


						},



						symptoms_other: {


						},



						Eckart_prior: {


						},



						prev_hrm: {



						},



						prev_hrm_rp: {

							number: true,
							maxlength: 4,
							required: function (element) {

								if ($("#prev_hrm").prop("checked") == true) {
									return true;

								} else {

									return false;
								}

							},

						},



						prev_hrm_relaxLES: {
							number: true,
							maxlength: 4,

						},



						prev_hrm_UES: {
							number: true,
							maxlength: 4,

						},



						prev_hrm_diagnosis: {

							required: function (element) {

								if ($("#prev_hrm").prop("checked") == true) {
									return true;

								} else {

									return false;
								}

							},

						},






						barium_swallow_date: {
							date: true,

						},



						barium_swallow_result: {


						},



						gastroscopy_prev: {




						},



						POEM_duration_total: {

							required: true,
							number: true,
							maxlength: 3,

						},



						POEM_duration_tunnel: {

							number: true,
							maxlength: 3,
						},



						POEM_GOJ_distance: {
							number: true,
							maxlength: 3,

						},



						POEM_incision_distance: {

							required: true,
							number: true,
							maxlength: 3,
						},

						submucosal_tunnel_bottom: {

							required: true,

						},



						POEM_incision_position: {

							number: true,
							maxlength: 2,
						},



						POEM_myotomy_length: {
							number: true,
							maxlength: 3,

						},

						myotomy_full_thickness_length_distal: {

							required: true,

						},



						POEM_perforation: {


						},



						POEM_IPB: {



						},



						POEM_current: {


						},



						POEM_number_clips: {

							required: true,
						},



						POEM_glucagon: {


						},



						POEM_buscopan: {


						},



						POEM_antibiotics: {


						},



						POEM_complication: {



						},



						POEM_complication_type: {


						},



						POEM_admission_days: {


						},



						post_symptoms: {


						},



						post_Eckart: {


						},



						post_HRM_resting: {


						},



						post_HRM_GOJ: {


						},



						_k_patient: {


						},



						post_HRM_relaxLOS: {


						},



						post_HRM_UESnormal: {


						},



						post_HRM_diagnosis: {


						},



						post_bariumswallow_date: {


						},



						post_bariumswallow_diagnosis: {


						},



						post_gastroscopy: {


						},



						post_gastroscopy_result: {


						},



						post_datecollected: {


						},



						current_weight: {


						},



						diagnosis: {

							required: true,

						},



						barium_swallow_done: {


						},



						ComplicationDetails: {
							required: function (element) {

								if (($("#POEM_complication").val() == "1") && (($("#IPSubcutEmphysema").prop(
										"checked") == false) && ($("#tunnel_exit").prop("checked") ==
										false) && ($("#ComplicationDetails").val() == ''))) {
									return true;

								} else {

									return false;
								}

							},

						},



						ProcedureDate: {
							required: true,

						},



						CompleteFUCheck: {


						},



						Referrer: {


						},



						ReferrerFax: {


						},



						ReferrerEmail: {


						},



						Firstname: {


						},



						Surname: {


						},



						IPSubcutEmphysema: {

							required: function (element) {

								if (($("#POEM_complication").val() == "1") && (($("#IPSubcutEmphysema").prop(
										"checked") == false) && ($("#tunnel_exit").prop("checked") ==
										false) && ($("#ComplicationDetails").val() == ''))) {
									return true;

								} else {

									return false;
								}

							},

						},

						tunnel_exit: {

							required: function (element) {

								if (($("#POEM_complication").val() == "1") && (($("#IPSubcutEmphysema").prop(
										"checked") == false) && ($("#tunnel_exit").prop("checked") ==
										false) && ($("#ComplicationDetails").val() == ''))) {
									return true;

								} else {

									return false;
								}

							},

						},

						tunnel_exit_solution: {

							required: function (element) {

								if ($("#tunnel_exit").prop("checked") == true) {
									return true;

								} else {

									return false;
								}

							},

						},



						IPSubcutEmphysemaMx: {

							required: function (element) {

								if ($("#IPSubcutEmphysema").prop("checked") == true) {
									return true;

								} else {

									return false;
								}

							},




						},



						gastroscopy_prevdilated: {


						},



						gastroscopy_prevresistance: {


						},



						gastroscopy_prevopenCOJ: {


						},



						gastroscopy_prevspasm: {


						},



						gastroscopy_prevother: {


						},



						post_Eckart_dysphagia: {


						},



						post_Eckart_regurgitation: {


						},



						post_Eckart_pain: {


						},



						post_Eckart_wtloss: {


						},



						pre_Eckart_dysphagia: {


						},



						pre_Eckart_regurgitation: {


						},



						pre_Eckart_wtloss: {


						},



						pre_Eckart_pain: {


						},

					},
					submitHandler: function (form) {


						//ADD THE VALIDATED TAG TO THE DATABASE [only if not present]

						

						$('#validated').val('1');

						

						submitesdLesionForm();

						console.log("submitted form");



					},
					messages: {

						IPSubcutEmphysema: {

							required: 'one adverse event must be selected',

						},
						tunnel_exit: {

							required: 'one adverse event must be selected',

						},
						ComplicationDetails: {

							required: 'details can be entered here for an adverse event',

						},

					},




				});


				//custom form control

				//each pair has a timeout to load if negative at entry and the code for the affected checkboxes
				//these will be negative at load and will not submit

				$('#content').on('click', '#gastroscopy_prev', function () {

					if ($('#gastroscopy_prev').is(':checked')) {
						$('#gastroscopy_prevdilated').prop('disabled', false);
						$('#gastroscopy_prevresistance').prop('disabled', false);
						$('#gastroscopy_prevopenCOJ').prop('disabled', false);
						$('#gastroscopy_prevspasm').prop('disabled', false);
					} else {

						$('#gastroscopy_prevdilated').prop('disabled', true);
						$('#gastroscopy_prevresistance').prop('disabled', true);
						$('#gastroscopy_prevopenCOJ').prop('disabled', true);
						$('#gastroscopy_prevspasm').prop('disabled', true);
					}


				})

				setTimeout(
					function () {
						$('#content').find('#gastroscopy_prev').each(function () {

							if ($(this).is(':checked')) {
								$('#gastroscopy_prevdilated').prop('disabled', false);
								$('#gastroscopy_prevresistance').prop('disabled', false);
								$('#gastroscopy_prevopenCOJ').prop('disabled', false);
								$('#gastroscopy_prevspasm').prop('disabled', false);
							} else {

								$('#gastroscopy_prevdilated').prop('disabled', true);
								$('#gastroscopy_prevresistance').prop('disabled', true);
								$('#gastroscopy_prevopenCOJ').prop('disabled', true);
								$('#gastroscopy_prevspasm').prop('disabled', true);
							}


						})
					}, 1000);





				$('#content').on('click', '#POEM_IPB', function () {

					if ($('#POEM_IPB').is(':checked')) {
						$('#IPB_solution').prop('disabled', false);

					} else {

						$('#IPB_solution').prop('disabled', true);
						$('#IPB_solution').val('');

					}


				})

				setTimeout(
					function () {
						$('#content').find('#POEM_IPB').each(function () {

							if ($('#POEM_IPB').is(':checked')) {
								$('#IPB_solution').prop('disabled', false);

							} else {

								$('#IPB_solution').prop('disabled', true);


							}


						})
					}, 1000);

				$('#content').on('click', '#POEM_complication', function () {

					if ($(this).is(':checked')) {
						$('#IPSubcutEmphysema').prop('disabled', false);
						$('#IPSubcutEmphysemaMx').prop('disabled', false);
						$('#tunnel_exit').prop('disabled', false);
						$('#tunnel_exit_solution').prop('disabled', false);
						$('#ComplicationDetails').prop('disabled', false);



					} else {

						$('#IPSubcutEmphysema').prop('disabled', true);
						$('#IPSubcutEmphysemaMx').prop('disabled', true);
						$('#tunnel_exit').prop('disabled', true);
						$('#tunnel_exit_solution').prop('disabled', true);
						$('#ComplicationDetails').prop('disabled', true);

					}


				})

				setTimeout(
					function () {
						$('#content').find('#POEM_complication').each(function () {

							if ($(this).is(':checked')) {
								$('#IPSubcutEmphysema').prop('disabled', false);
								$('#IPSubcutEmphysemaMx').prop('disabled', false);
								$('#tunnel_exit').prop('disabled', false);
								$('#tunnel_exit_solution').prop('disabled', false);
								$('#ComplicationDetails').prop('disabled', false);



							} else {

								$('#IPSubcutEmphysema').prop('disabled', true);
								$('#IPSubcutEmphysemaMx').prop('disabled', true);
								$('#tunnel_exit').prop('disabled', true);
								$('#tunnel_exit_solution').prop('disabled', true);
								$('#ComplicationDetails').prop('disabled', true);

							}


						})
					}, 1000);



				$('#content').on('click', '#IPSubcutEmphysema', function () {

					if ($(this).is(':checked')) {
						$('#IPSubcutEmphysemaMx').prop('disabled', false);

					} else {

						$('#IPSubcutEmphysemaMx').prop('disabled', true);
						$('#IPSubcutEmphysemaMx').val('');

					}


				})

				setTimeout(
					function () {
						$('#content').find('#IPSubcutEmphysema').each(function () {

							if ($(this).is(':checked')) {
								$('#IPSubcutEmphysemaMx').prop('disabled', false);

							} else {

								$('#IPSubcutEmphysemaMx').prop('disabled', true);

							}


						})
					}, 1000);

				$('#content').on('click', '#tunnel_exit', function () {

					if ($(this).is(':checked')) {
						$('#tunnel_exit_solution').prop('disabled', false);

					} else {

						$('#tunnel_exit_solution').prop('disabled', true);
						$('#tunnel_exit_solution').val('');

					}


				})

				setTimeout(
					function () {
						$('#content').find('#tunnel_exit').each(function () {

							if ($(this).is(':checked')) {
								$('#tunnel_exit_solution').prop('disabled', false);

							} else {

								$('#tunnel_exit_solution').prop('disabled', true);

							}


						})
					}, 1000);

				$('#content').on('click', '#prev_hrm', function () {

					if ($(this).is(':checked')) {
						$('#prev_hrm_rp').prop('disabled', false);
						$('#prev_hrm_relaxLES').prop('disabled', false);
						$('#prev_hrm_UES').prop('disabled', false);
						$('#prev_hrm_diagnosis').prop('disabled', false);

					} else {

						$('#prev_hrm_rp').prop('disabled', true);
						$('#prev_hrm_relaxLES').prop('disabled', true);
						$('#prev_hrm_UES').prop('disabled', true);
						$('#prev_hrm_diagnosis').prop('disabled', true);
						$('#tunnel_exit_solution').val('');
						$('#prev_hrm_rp').val('');
						$('#prev_hrm_relaxLES').val('');
						$('#prev_hrm_UES').val('');
						$('#prev_hrm_diagnosis').val('');

					}


				})

				setTimeout(
					function () {
						$('#content').find('#prev_hrm').each(function () {

							if ($(this).is(':checked')) {
								$('#prev_hrm_rp').prop('disabled', false);
								$('#prev_hrm_relaxLES').prop('disabled', false);
								$('#prev_hrm_UES').prop('disabled', false);
								$('#prev_hrm_diagnosis').prop('disabled', false);

							} else {

								$('#prev_hrm_rp').prop('disabled', true);
								$('#prev_hrm_relaxLES').prop('disabled', true);
								$('#prev_hrm_UES').prop('disabled', true);
								$('#prev_hrm_diagnosis').prop('disabled', true);
								$('#tunnel_exit_solution').val('');
								$('#prev_hrm_rp').val('');
								$('#prev_hrm_relaxLES').val('');
								$('#prev_hrm_UES').val('');
								$('#prev_hrm_diagnosis').val('');

							}


						})
					}, 1000);



				$('#content').on('click', '#post_symptoms',
			function () { //TODO GENERALISE THIS IS THE CODE FOR A PARENT SELECTOR

					//console.log($(this).parent().parent().find(':input'));

					if ($(this).is(':checked')) {


						$(this).parent().parent().find(':input').each(function () {

							if ($(this).attr('id') == 'post_symptoms') {

								//skip

							} else if ($(this).is(':checkbox')) {

								$(this).prop('disabled', false);
								//$(this).prop('clicked', false);


							} else { //other elements

								$(this).prop('disabled', false);
								//$(this).val('');

							}


						});

					} else {

						$(this).parent().parent().find(':input').each(function () {

							if ($(this).attr('id') == 'post_symptoms') {

								//skip

							} else if ($(this).is(':checkbox')) {

								$(this).prop('disabled', true);
								$(this).prop('clicked', false);


							} else { //other elements

								$(this).prop('disabled', true);
								$(this).val('');

							}


						});


					}



				})

				setTimeout(
					function () {
						$('#content').find('#post_symptoms').each(function () {

							if ($(this).is(':checked')) {


								$(this).parent().parent().find(':input').each(function () {

									if ($(this).attr('id') == 'post_symptoms') {

										//skip

									} else if ($(this).is(':checkbox')) {

										$(this).prop('disabled', false);
										//$(this).prop('clicked', false);


									} else { //other elements

										$(this).prop('disabled', false);
										//$(this).val('');

									}


								});

							} else {

								$(this).parent().parent().find(':input').each(function () {

									if ($(this).attr('id') == 'post_symptoms') {

										//skip

									} else if ($(this).is(':checkbox')) {

										$(this).prop('disabled', true);
										$(this).prop('clicked', false);


									} else { //other elements

										$(this).prop('disabled', true);
										$(this).val('');

									}


								});


							}


						})
					}, 1000);




				//post_symptoms

			})


			//polypectomy score js

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

			



	
		
		


			});


		</script>
		<?php
		
		    // Include the footer file to complete the template:
		    include(BASE_URI1 ."/includes/footer.php");
		
		
		
		
		    ?>
		</body>
		<!-- </html> -->