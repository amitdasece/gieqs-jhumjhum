
		
		
			<?php

			$openaccess = 0;
			$requiredUserLevel = 2;
			
			require ('../../../assets/includes/config.inc.php');		
			
			require (BASE_URI1.'/scripts/headerCreatorV2.php');
		
			//(1);
			//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');
		
			//echo 'hello';


    



spl_autoload_unregister ('class_loader');

require(BASE_URI . '/edm/classes/formGenerator.class.php');
$formv1 = new formGenerator;
require(BASE_URI . '/edm/classes/general.class.php');
$general = new general;



spl_autoload_register ('class_loader');
			
		
			//$video = new video;
			//$tagCategories = new tagCategories;
			
		
		
		
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
		    <title>ESD data entry Form</title>
            <style>
               
               .text-gieqsGold {

color: rgb(238, 194, 120);

               }
               .bg-gieqsGold {

background-color: rgb(238, 194, 120);

}

                    @media only screen and (max-width: 992px) {
                        
                        #right {

                            display: none;

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
		
		        <div class='responsiveContainer container-fluid bg-gradient-dark'>
                
			        <div class='row pt-4 mt-0'>
		                <div class='col-lg-9 col-xl-9 pr-6 pl-8'>
		                    <h2 style="text-align:left;">ESD data entry form</h2>
		                </div>
		
		                <!-- <div id="messageBox" class='col-2 text-center bg-secondary pt-2 pl-1'>
		                    <p>Enter some data here</p>
		                </div> -->
		            </div>

                    <div class="row pt-3">
                    <div id="left" class="col-lg-9 col-xl-9 pr-6 pl-8">
                    <div class="docs-content">
		
			        <p><?php
		
				        if ($id){
		
							$q = "SELECT  _k_lesion  FROM  esdLesion  WHERE  _k_lesion  = $id";
							if ($general->returnYesNoDBQuery($q) != 1){
								echo "Passed id does not exist in the database";
								exit();
		
							}
						}
		
		?></p>
		
		
			        <p>
		
					    
						<?php 
						
						$tableNameValues = "valuesESD";
						$tableNameSheet = "pageLayoutESD";


						include(BASE_URI1 . "/scripts/FormFunctionsGeneric.php");

						$iterationForm = 1;
						$sectionTitle = array();
						//$sectionTitle[0] = "";
						$sectionTitle[1] = "Patient Details";
						$sectionTitle[2] = "Pre-ESD";
						$sectionTitle[3] = "Procedural technical details";
						$sectionTitle[4] = "Lesion details";
						$sectionTitle[5] = "Adverse Events";
						$sectionTitle[6] = "Histology";
						$sectionTitle[7] = "Surgical data";
						$sectionTitle[8] = "First Surveillance";
						$sectionTitle[9] = "Second Surveillance";
						$sectionTitle[9] = "Most Recent Surveillance";
					
					
						echo '<form id="esdLesion">';
					for($x = 1; $x <= 9; $x++) {
						
						if ($x == 3 || $x == 5 || $x == 7 || $x == 9){

							//echo "</div>";

						}
						echo "<div class=\"form-group text-left\">";
						//echo "<div class='row'>";
						//echo "<div class='col-5'>";
						echo "<fieldset id=\"".$sectionTitle[$x]."Section\" class=\"".$sectionTitle[$x]."\"><h4 style='text-align:left;'>".$sectionTitle[$x]."</h4>";
						//echo "<table class=\"comorbidity\">";
						include(BASE_URI1 . "/scripts/iterateFormGeneric.php");
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
        <div data-toggle="sticky" data-sticky-offset="100" class="is_stuck pr-3 mr-3" style="position: fixed; top: 140px;">
        <div id="messageBox" class='text-left text-white pb-2'>
		                    
		                </div>
                        <div id="errorWrapper" class="error alert alert-warning alert-flush alert-dismissible collapse bg-gieqsGold" role="alert">
    <strong>Check the form!</strong> <span id="error"></span><button type="button" class="close" data-hide="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div id="successWrapper" class="success alert alert-success alert-flush alert-dismissible collapse" role="alert">
    <strong>Success!</strong> <span id="success"></span><button type="button" class="close" data-hide="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
                        <!-- <div class="error text-warning  text-left pb-2">
                
                </div> -->
              <h6 class="mb-3">Navigation</h6>
              
              <ul class="section-nav">
              
                <!-- <li class="toc-entry toc-h2"><a href="#examples">Sections</a> -->
                  <!-- <ul> -->
                  <?php

                    for($x = 1; $x <= 9; $x++) {
                        echo '<li class="toc-entry toc-h4"><a href="#'.$sectionTitle[$x].'Section">'.$sectionTitle[$x].'</a></li>';
                        //echo "<button type=\"button\" class=\"btn ".$sectionTitle[$x]."\">".$sectionTitle[$x]."</button>";

                    }

                            ?>
                             <!-- </ul> -->
                <!-- </li> -->
                
                <div class="d-none d-lg-inline-block align-items-center">
                <button class="btn btn-sm bg-translucent-primary mt-3 mb-3 mr-1" id="submitesdLesion">Submit</button>
                </div>
            
            </div> <!--close sticky nav-->  
                                
            
        </div> <!--close right h-100 div-->
        </div> <!--close right column div-->
        </div> <!--close the row-->
        </div> <!--close container-->
        </div> <!--close content-->
			
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
		
			if ( esdLesionPassed == ""){
		
				var edit = 0;
		
			}else{
		
				var edit = 1;
		
			}
		
		
		
		 
 
 // Parsley full doc is avalailable here : https://github.com/guillaumepotier/Parsley.js/
		
			function fillForm (idPassed){
		
				disableFormInputs("esdLesion");
		
				esdLesionRequired = new Object;
		
				esdLesionRequired = getNamesFormElements("esdLesion");
		
				esdLesionString = '`_k_lesion`=\''+idPassed+'\'';
		
				var selectorObject = getDataQuery ("esdLesion", esdLesionString, getNamesFormElements("esdLesion"), 1);
		
				//console.log(selectorObject);
		
				selectorObject.done(function (data){
		
					console.log(data);
		
					var formData = $.parseJSON(data);
		
		
				    $(formData).each(function(i,val){
					    $.each(val,function(k,v){
					        $("#"+k).val(v);
					        //console.log(k+' : '+ v);
					    });
		
				    });
				    
				    $("#messageBox").text("Editing ESD lesion ID "+idPassed);
		
				    enableFormInputs("esdLesion");
		
				});
		
				
		
					if ($("right").find("button#deleteesdLesion").length == 0){

                        $("#right").find("button:visible").after("<button class='btn btn-sm bg-dark-dark mt-3 mb-3 ml-0' id='deleteesdLesion'>Delete</button>");


                    }else{

                    }
		
				
		
			}
		
		
			//delete behaviour
		
			function deleteesdLesion (){
		
				//esdLesionPassed is the current record, some security to check its also that in the id field
		
				if (esdLesionPassed != $("#id").text()){
		
					return;
		
				}
		
		
				if (confirm("Do you wish to delete this esdLesion?")) {
		
					disableFormInputs("esdLesion");
		
					var esdLesionObject = pushDataFromFormAJAX("esdLesion", "esdLesion", "_k_lesion", esdLesionPassed, "2"); //delete esdLesion
		
					esdLesionObject.done(function (data){
		
						//console.log(data);
		
						if (data){
		
							if (data == 1){
		
								alert ("esdLesion deleted");
								edit = 0;
								esdLesionPassed = null;
								window.location.href = siteRoot + "scripts/forms/esdLesionTable.php";
								//go to esdLesion list
		
							}else {
		
							alert("Error, try again");
		
							enableFormInputs("esdLesion");
		
						    }
		
		
		
						}
		
		
					});
		
				}
		
		
			}
		
			function submitesdLesionForm (){
		
				//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)
		
				if (edit == 0){
		
					var esdLesionObject = pushDataFromFormAJAX("esdLesion", "esdLesion", "_k_lesion", null, "0"); //insert new object
		
					esdLesionObject.done(function (data){
		
						console.log(data);
		
						if (data){
		
                            //alert ("New esdLesion no "+data+" created");
                            $('#success').text("New esdLesion no "+data+" created");
			                //$('#successWrapper').show();
							$("#successWrapper").fadeTo(4000, 500).slideUp(500, function() {
								$("#successWrapper").slideUp(500);
							});
							edit = 1;
							$("#id").text(data);
							esdLesionPassed = data;
							fillForm(data);
		
		
		
		
						}else {
		
							alert("No data inserted, try again");
		
						}
		
		
					});
		
				} else if (edit == 1){
		
					var esdLesionObject = pushDataFromFormAJAX("esdLesion", "esdLesion", "_k_lesion", esdLesionPassed, "1"); //insert new object
		
					esdLesionObject.done(function (data){
		
						console.log(data);
		
						if (data){
		
							if (data == 1){
		
								$('#success').text("Data updated");
			                    $("#successWrapper").fadeTo(4000, 500).slideUp(500, function() {
								$("#successWrapper").slideUp(500);
							});
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
		
					fillForm(esdLesionPassed);
		
				}else{
					
					$("#messageBox").text("New esdLesion");
					
				}
		
				
				$(function(){
    $("[data-hide]").on("click", function(){
        $("." + $(this).attr("data-hide")).hide();
        // -or-, see below
        // $(this).closest("." + $(this).attr("data-hide")).hide();
    });
});
                

                $(window).scroll(function() {
                        var scrollDistance = $(window).scrollTop();

                    
                        // Assign active class to nav links while scolling
                        $('fieldset').each(function(i) {
                                if ($(this).position().top <= scrollDistance) {
                                        $('.section-nav a.text-gieqsGold').removeClass('text-gieqsGold');
                                        $('.section-nav a').eq(i).addClass('text-gieqsGold');
                                }
                        });
                }).scroll();
		
		
				
		
		
				$("#content").on('click', '#submitesdLesion', (function(event) {
			        event.preventDefault();
			        $('#esdLesion').submit();
		
		
			    }));
		
			    $("#content").on('click', '#deleteesdLesion', (function(event) {
			        event.preventDefault();
			        deleteesdLesion();
		
		
			    }));
                
                // override jquery validate plugin defaults
                $.validator.setDefaults({
                    highlight: function(element) {
                        $(element).closest('.form-control').addClass('bg-gieqsGold').addClass('text-white');
                    },
                    unhighlight: function(element) {
                        $(element).closest('.form-control').removeClass('bg-gieqsGold').removeClass('text-white');
                    },
                    errorElement: 'div',
                    errorClass: 'input-group-btn pb-2 text-gieqsGold',
                    errorPlacement: function(error, element) {
                        
                        
                        if(element.parent('.input-group').length) {
                            error.insertAfter(element.parent());
                        } else {
                            error.insertAfter(element);
                        }
                    }
                });
                
				$("#esdLesion").validate({
		
			        invalidHandler: function(event, validator) {
			            var errors = validator.numberOfInvalids();
			            console.log("there were " + errors + " errors");
			            if (errors) {
			                var message = errors == 1 ?
			                    "1 field contains errors. It has been highlighted" :
                                + errors + " fields contain errors. They have been highlighted";
                                
                            
                            $('#error').text(message);
                            //$('div.error span').addClass('form-text text-danger');
			                //$('#errorWrapper').show();
							
							 $("#errorWrapper").fadeTo(4000, 500).slideUp(500, function() {
								$("#errorWrapper").slideUp(500);
							}); 
			            } else {
			                $('#errorWrapper').hide();
			            }
			        },rules: {
                    AGE: { required: true, number: true, maxlength: 3, },   
					  
					},
			        submitHandler: function(form) {
		
			            submitesdLesionForm();
		
			          	console.log("submitted form");
		
		
		
			    }
		
		
		
		
		    });
		
		})
		
			</script>
		<?php
		
		    // Include the footer file to complete the template:
		    include(BASE_URI1 ."/includes/footer.php");
		
		
		
		
		    ?>
		</body>
		</html>