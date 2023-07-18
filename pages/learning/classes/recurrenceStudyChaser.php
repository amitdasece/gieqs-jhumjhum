
 <?php  
        $page_title='Recurrence Study Manager';
        $page_header='Recurrence Study Manager';
        require ('/home/djt35/public_html/studyserver/PROSPER/scroll_header.php');
		
         
	

?> 



	
  	<body>
	
	<style>
		
	#content {
    	display: none;
	}
	#loading {
	    display: block;
	    position: absolute;
	    top: 0;
	    left: 0;
	    z-index: 100;
	    width: 100vw;
	    height: 100vh;
	    background-color: rgba(192, 192, 192, 0.5);
	    background-image: url("https://www.acestudy.net/studyserver/PROSPER/scripts/loader.gif");
	    background-repeat: no-repeat;
	    background-position: center;
	}
	
	#searchArea{
		background-color: #b2ccff;
		padding: 8px;
		margin-bottom: 20px;
		overflow: hidden;
	}
	
	.searchBoxes {
		
		float: left;
		padding: 5px;
		padding-right: 15px;
		
	}
	
	#table {
    text-align: left;
    /*max-height: 50vh;
	min-height: 50vh;
    overflow-y: auto;
	overflow-x: auto;*/
	overflow: auto;
    height: 60vh;
	
    }

	th.sorted.ascending:after {
		content: "  \2191";
	}

	th.sorted.descending:after {
		content: " \2193";
	}
	
	th:hover {
		
		cursor: pointer;
	}
	
	.patientRow:hover {background-color: #f75345; color: white; cursor: pointer;}
	
	


	
		
	</style>
	
	<!-- include the necessary JavaScript libraries-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://www.acestudy.net/studyserver/PROSPER/includes/moment-with-locales.js" type="text/javascript"></script>
	<script src="https://www.acestudy.net/studyserver/PROSPER/includes/jquery.tablesort.js" type="text/javascript"></script>
	<script src="https://www.acestudy.net/studyserver/PROSPER/scripts/colResizable.min.js" type="text/javascript"></script>
	<script src="https://www.acestudy.net/studyserver/PROSPER/papaparse.js" type="text/javascript"></script>
	<script src="https://www.acestudy.net/studyserver/PROSPER/includes/jquery.validate.js"></script>

	
  
	<!-- include the custom iACE libraries-->
	
	<script src="<?php echo $folder?>includes/tableCode.js" type="text/javascript"></script>
	<script src="<?php echo $folder?>scripts/iACEfunctions.js" type="text/javascript"></script>

	
	<div id="loading">
	
	</div>
	
	<div class="darkClass">
	
	</div>
	
	<div class="modal">
		
		<div class='modalContent'>
			
		</div>
		<div class='modalClose'>
			<p><br><button onclick="$('.modal, .darkClass').hide();">Close this window</button></p>
		</div>
		
	</div>
	

<?php
	
	
	
	include ($includePath . '/navi.php');
	//load the classes that provide the data
	
	$lesion = new Lesion;
	$table = new tableGenerator;
	$formv1 = new formGenerator;
	$user = new users;
	$user->Load_from_key($_SESSION['user_id']);
	
?>
	
	<div id="content" class="content">

<?php
		echo "<div id='helpArea'></div>";
	echo '<button id="identifyData" style="float: right;">Identify the data (requires iACEkey file)</button>';
	echo '<input type="file" id="csv-file" accept=".csv" style="float: right;" name="files"/>';
	echo "<div id='identifiedData' style='display:none;'>0</div>";
	//include("../centres.php");
?>
	
	<!--<h1>This is the table template</h1>-->
	<div id='intro'>
	<p>This page browses the recurrence database.  Only attempted and successful EMR are shown here.</p>
	
	<p>The number of lesions over the study period that did not recur is <?php echo $lesion->countRecurrenceLesionsNoRecur();?></p>
	
	</div>
	
<?php	
	
	error_reporting(0);
	
	
	
	//create the page data

	echo "<div id='data' style='display: none;'>";
	
	$requiredPatientFields = array('_k_patient', 'Referrer');
	$requiredProcedureFields = array('ProcedureDate');  // works without k procedure
	$requiredLesionFields = array('_k_lesion', 'Size', 'SuccessfulEMR', 'ActualPredominantProcedure','EMRAttempted','Paris', 'Location', 'Dysplasia', 'IPBleed', 'Morphology', 'FollowUp2Weeks', 'inPROSPER', 'FirstFU', 'FirstFURecurrence', 'FirstFURecurrenceRx', 'FirstFURecurHisto', 'FirstFURecurrenceNotes', 'SecondFU', 'SecondFURecurrence', 'ThirdFU', 'FourthFU');


	print_r($lesion->getRecurrenceLesions($requiredPatientFields, $requiredProcedureFields, $requiredLesionFields)); // gets lesion data for only the required fields
	
	//print_r($lesion->getLesionsCentre('16'));  gets all the lesion data from this centre
	echo "</div>";
	
	//value list data here
	
	echo '<div id="values" style="display: none;">';
	
	// $values = $lesion->GetValuesAll(); - gets all values
	
	
	$requiredValues = array("Paris", "Location", "Morphology", "Called", "ActualPredominantProcedureShort", "EMRAttempted", "FirstFU", "Yes_No", "FirstFURecurrenceRXNew", "FURecurHisto"); // just gets those required fields reducing data pull
	$values = $lesion->GetValuesSpecific($requiredValues);
	$overallvalues = $lesion->GetValuesArray($values);
	$json = json_encode($overallvalues);
	$error = json_last_error();
			if ($error !== JSON_ERROR_NONE) {
				echo json_last_error_msg();
			} else {
				echo $json;
			}

	
	//echo $lesion->getValuesv2();
	echo "</div>";
?>

		
	<div id="searchArea">
		
		<?php
		//echo $includePath . '/scripts/tableSearchBox.php';
		require($includePath . '/includes/tableSearchBox.php');	
		
		?>
	
	</div>
	
	<div id='table'>
		
		
	</div>
	
	
	</div>
	
	
	
	<script>
		
	//part of the loading function
		
		try {
			
			var data = new Object;
            
            data.data = JSON.parse(sessionStorage.data);
			
		}catch{
			
			var data;
			
		}
		
				
		var lesions = $.parseJSON($('#data').text());
		var valueList = $.parseJSON($('#values').text());
		
		var siteRoot = 'https://www.acestudy.net/studyserver/PROSPER/';
		
		var headers = { _k_lesion: { name: 'Lesion ID', tooltip: '', display: 1, usesDatabase: 1, usesValueList: 0, valueListName: null, values:null, function:0 }, 
		
					    _k_patient: { name: 'Study ID', tooltip: '', display: 0, usesDatabase: 1, usesValueList: 0, valueListName: null, values:null, function:0 },
					    
					    ProcedureDate: { name: 'Procedure Date', display: 1, tooltip: '', usesDatabase: 1, usesValueList: 0, valueListName: null, values:null, function:'moment(value).format("D MMM YYYY")' }, 
					    ActualPredominantProcedure: { name: 'Procedure', display: 1, tooltip: '', usesDatabase: 1, usesValueList: 1, valueListName: 'ActualPredominantProcedureShort', values:null, function:null },
					    
					    					    
					    Size: { name: 'Size', display: 1, tooltip: '', usesDatabase: 1, usesValueList: 0, valueListName: null, values:null, function:null },
					    
					    FollowUp2Weeks: { name: '2 week check', display: 1, tooltip: '', usesDatabase: 1, usesValueList: 1, valueListName: 'Called', values:null, function:null },
					    
					   					    
					    FirstFU: { name: 'First FU', display: 1, tooltip: '', usesDatabase: 1, usesValueList: 1, valueListName: 'FirstFU', values:null, function: null },
					    
					    FirstFUDue: { name: 'Due', display: 1, tooltip: '', usesDatabase: 0, usesValueList: 0, valueListName: null, values:null, function:'surveillanceCheck (lesionArray.FirstFU, \'FirstFU\', lesionArray.ProcedureDate, calculateSC1(lesionArray.ProcedureDate, lesionArray.inPROSPER , determineSERT(lesionArray.Size, lesionArray.Dysplasia, lesionArray.IPBleed)))' },
					    
					    FirstFURecurrence: { name: 'Endo Recurrence SC1', display: 1, tooltip: '', usesDatabase: 1, usesValueList: 1, valueListName: 'Yes_No', values:null, function:null },
					    
					    
					    SecondFU: { name: 'Second FU', display: 1, tooltip: '', usesDatabase: 1, usesValueList: 1, valueListName: 'FirstFU', values:null, function:null },
					    
					    SecondFUDue: { name: 'Due', display: 1, tooltip: '', usesDatabase: 0, usesValueList: 0, valueListName: null, values:null, function:'surveillanceCheck (lesionArray.SecondFU, \'FirstFU\', lesionArray.ProcedureDate, calculateSC2(lesionArray.ProcedureDate, lesionArray.inPROSPER , determineSERT(lesionArray.Size, lesionArray.Dysplasia, lesionArray.IPBleed)))' },
					    
					    ThirdFU: { name: 'Third FU', display: 1, tooltip: '', usesDatabase: 1, usesValueList: 1, valueListName: 'FirstFU', values:null, function:null },
					    
					    ThirdFUDue: { name: 'Due', display: 1, tooltip: '', usesDatabase: 0, usesValueList: 0, valueListName: null, values:null, function:'surveillanceCheck (lesionArray.ThirdFU, \'FirstFU\', lesionArray.ProcedureDate, calculateSC3(lesionArray.ProcedureDate, lesionArray.inPROSPER , determineSERT(lesionArray.Size, lesionArray.Dysplasia, lesionArray.IPBleed)))' },
					    
					    FourthFU: { name: 'Fourth FU', display: 1, tooltip: '', usesDatabase: 1, usesValueList: 1, valueListName: 'FirstFU', values:null, function:null },
					    
					    FourthFUDue: { name: 'Due', display: 1, tooltip: '', usesDatabase: 0, usesValueList: 0, valueListName: null, values:null, function:'surveillanceCheck (lesionArray.FourthFU, \'FirstFU\', lesionArray.ProcedureDate, calculateSC4(lesionArray.ProcedureDate, lesionArray.inPROSPER , determineSERT(lesionArray.Size, lesionArray.Dysplasia, lesionArray.IPBleed)))' },
					    
					    Referrer: { name: 'Referrer', tooltip: '', display: 1, usesDatabase: 1, usesValueList: 0, valueListName: null, values:null, function:0 },
					    
					     };
		
	function handleFileSelect(evt) {
		    var file = evt.target.files[0];
		 
		    Papa.parse(file, {
		      header: true,
		      dynamicTyping: true,
		      complete: function(results) {
		        data = results;
				//console.log(data);
		      }
		    });
		  }
		  
		  
	function selectReferrer(_k_patient){
		
		var studyID = _k_patient;
				
		$('.darkClass').show();
		
		request = $.ajax({
			        url: siteRoot+"scripts/getReferrerTable.php",
			        type: "get",
			        data: '_k_patient='+studyID
				    });
				
				request.done(function (response, textStatus, jqXHR){
				        //console.log(response);
				        
				        $('.modal').show();
				        $('.modal').css('max-height', 800);
				        $('.modal').css('max-width', 800);
				        $('.modal').css('overflow', 'scroll');
				        
				       
					        	
						$('.modal').find('.modalContent').html('<h3>Choose Referrer</h3><p>Select referrer for patient '+studyID+' </p><br><p>'+response+'</p>');
						
						
						
						$('.modal').find('#referrers').before('<p><button onclick=\'editReferrer("'+studyID+'")\'>Edit referrer list</button></p>');
						
						$('.modal').find('.modalContent').prepend('<p><button onclick=\'$(".modal, .darkClass").hide();\'>Close Window</button></p>');
						
						$('.modal').find('#referrers').before('<p><button onclick=\'$(".modal, .darkClass").hide();insertReferrerFormIntoModal();\'><b>Add New Referrer</b></button>');
				        
				       });
		
		

		
		
		
		
	}
	
	function editReferrer (_k_patient) {
		
		var studyID = _k_patient;
				
		$('.darkClass').show();
		
		request = $.ajax({
			        url: siteRoot+"scripts/getReferrerTableEdit.php",
			        type: "get",
			        data: '_k_patient='+studyID
				    });
				
				request.done(function (response, textStatus, jqXHR){
				        //console.log(response);
				        
				        $('.modal').show();
				        $('.modal').css('max-height', 800);
				        $('.modal').css('max-width', 800);
				        $('.modal').css('overflow', 'scroll');
				        
				       
					        	
						$('.modal').find('.modalContent').html('<h3>Choose Referrer</h3><p>Select referrer for patient '+studyID+' </p><br><p>'+response+'</p>');
						
						$('.modal').find('.modalContent').append('<p><button onclick=\'addReferrer("'+studyID+'")\'>Add new referrer</button></p>');
						
						$('.modal').find('.modalContent').prepend('<p><button onclick=\'$(".modal, .darkClass").hide();\'>Close Window</button></p>');
						
						$('.modal').find('#referrers').before('<p><button onclick=\'$(".modal, .darkClass").hide();insertReferrerFormIntoModal();\'><b>Add New Referrer</b></button>');
				        
				        tr = $('#referrers').find("tr");
						$(tr).each(function(){
							
							$(this).removeClass('refTableRow');
							$(this).addClass('refEditTableRow');
							
							
							
							
						})
				        
				        
				       });
				       
				      
		
		
		
	}
	
	function updateReferrerDB(referrerid, studyID){
		
		//query to insert the new referrer id into the patient database
		
		if(confirm("Are you sure you wish to update the referrer for patient "+studyID))
				{
					
					request = $.ajax({
			        url: siteRoot+"scripts/updateReferrerDB.php",
			        type: "get",
			        data: '_k_patient='+studyID+'&Referrerid='+referrerid
				    });
				
					request.done(function (response, textStatus, jqXHR){
					        
					        
					        //console.log(response);
					        if (response == 1){
						        alert('Referrer for patient '+studyID+' updated.');
						        $('.modal, .darkClass').hide();
						        modifyTableCellData(studyID, 15, referrerid);
					        
					        }else{
						    
							     alert('Referrer for patient '+studyID+' NOT updated.');
    
						     
					        }
					        
					        
					        
					})
					
					
					
				}
				else
				{
					e.preventDefault();
				}

		
		
		

		
		
		
	}	  
	
	function insertReferrerFormIntoModal () {
		
		
		
		$.ajax({
		     type: 'GET',
		     url: siteRoot+"scripts/forms/referrerEntryForm.html",
		     success: function(data) {
		          $('.modal').find('.modalContent').html(data);
		          $('.modal').find('.modalContent').prepend('<h3>Referrer Data Entry</h3>');
		          $('.modal').find('.modalContent').prepend('<div id="updateReferrer" style="display:none;">0</div>');
		          $('.modal, .darkClass').show();
		          
		          $('#referrerEntryForm').validate(
			          
			           {
					        
					        groups: {
					            names: "telephone fax email"
					        },
					        
					        
					        rules:
					        {
					          address: {required:true
					                      },
					                      
					          firstname: {required:true
					                      },
					                      
					          surname: {required:true
					                      },
					                      
					          title: {required:true
					                      },
					                      
					          telephone: {required:true
					                      }


					        },
			          
						}
			          
		          );
		          
		          
     
		          
		         /*| $('form#referrerEntryForm :input').each(function() {
		                $(this).rules("add", 
		                    {
		                        required: true
		                    })
		            }); */
		     }
		});
		
		
		
	}
	
	function insertReferrerFormIntoModalForEdit (referrerid) {
		
		
		
		$.ajax({
		     type: 'GET',
		     url: siteRoot+"scripts/forms/referrerEntryForm.html",
		     success: function(data) {
		          $('.modal').find('.modalContent').html(data);
		          $('.modal').find('.modalContent').prepend('<h3>Referrer Data Edit</h3>');
		          $('.modal').find('.modalContent').prepend('<div id="updateReferrer" style="display:none;">1</div>');
		          var appendString = '<div id="Referrerid" style="display:none;">'+referrerid+'</div>';
		          $('.modal').find('.modalContent').prepend(appendString);
		          $('.modal, .darkClass').show();
		          
		          $('#referrerEntryForm').validate(
			          
			           {
					        
					        groups: {
					            names: "telephone fax email"
					        },
					        
					        
					        rules:
					        {
					          address: {required:true
					                      },
					                      
					          firstname: {required:true
					                      },
					                      
					          surname: {required:true
					                      },
					                      
					          title: {required:true
					                      },
					                      
					          telephone: {required:true
					                      }


					        },
			          
						}
			          
		          );
		          
		      getDataForForm ('Referrer', 'Referrerid', referrerid, getNamesFormElements('referrerEntryForm'));
		      
		      $('#updateReferrer').text('1');    
     
				  
		      
		      
		      
		      
		      
		     }
		});
		
		
		
	}
	
	
	
	function submitReferrerFormNew(){
		
		console.log('new Referrer submission triggered');
		
		request = $.ajax({
			        url: siteRoot+"scripts/masterAjaxDatabaseUpdateScript.php",
			        type: "get",
			        data: $('#referrerEntryForm').serialize() + '&update=0&table=Referrer'
				    });
				
					request.done(function (response, textStatus, jqXHR){
					        
					        
					        console.log(response);
					        if (response == 1){
						        alert('New referrer created');
						        $('.modal, .darkClass').hide();
						        //modifyTableCellData(studyID, 15, referrerid);
					        
					        }					        
					        
					        
					})
		
		
	}
	
	function submitReferrerFormEdit(){
		
		var Referrerid = $('#Referrerid').text();
		
		console.log('update Referrer submission triggered');
		
		request = $.ajax({
			        url: siteRoot+"scripts/masterAjaxDatabaseUpdateScript.php",
			        type: "get",
			        data: $('#referrerEntryForm').serialize() + '&update=1&table=Referrer&identifierKey=Referrerid&identifier='+Referrerid
				    });
				
					request.done(function (response, textStatus, jqXHR){
					        
					        
					        console.log(response);
					        if (response == 1){
						        alert('Referrer edited');
						        $('.modal, .darkClass').hide();
						        //modifyTableCellData(studyID, 15, referrerid);
					        
					        }else if (response == 0){
						        
						        alert('Data not changed');
					        }					        
					        
					        
					})
		
		
		
	}
	
	function findMissingSurveillance() {
		
		if ($('#identifiedData').text() == '1'){
					filterTablev1colourmultiple('#patientTable', '11', '14', '16', '18');
				}else{
					filterTablev1colourmultiple('#patientTable', '7', '10', '12', '14');
					
				} 
				
				var missing = $('tbody>tr:visible').length;
				
				$('#intro').append('<p>There are '+missing+' lesions missing some form of surveillance</p>');
				
				$('#missingAnySurveillance').prop('disabled', true);
		
		
	}

	
	
	
	
	//check referrer form
	
	//submit referrer form
	
	//name must be filled
	//address must be filled
	//one of tel fax email must be filled
		
		
	$(document).ready(function() {	  
		  
	//!Click on .lesioncell to go to lesion at point of histology
			$('.content').on("click", ".lesionCell", (function() {    
			   
			   var cellClicked = $(this);
			   
			   goToLesionSurveillance(cellClicked);
			   //goToStudies(cellClicked);
			   //goToPatient(cellClicked);
			    
			}));
			
			
			//!Add a button to allow resize rather than activating by default
			$('#searchArea').find('.searchBoxes').last().after('<div class="searchBoxes"><button type="button" id="allowResize" class="searchButton">Allow Resize</button></div>');
			
			$('#searchArea').on('click', '#allowResize', function(){
				   $("#patientTable").colResizable({partialRefresh:true, resizeMode:'flex', marginLeft:'10px', marginRight:'10px'});
				   
				   $(this).attr('disabled', 'disabled');

			})
			
			
			tr = $('#patientTable').find("tr");
			$(tr).each(function(){
				
				td = $(this).find("td").last();
				$(td).removeClass('lesionCell');
				$(td).addClass('referrer');
				
			})
			
			//setTimeout(findMissingSurveillance(), 5000);

			
			
			
			$.validator.addMethod("valueNotEquals", function(value, element, arg){
			    return arg !== value;
			    }, "Value must not equal arg.");
			
			    $.validator.addMethod(
			        "regex",
			        function(value, element, regexp) {
			            var re = new RegExp(regexp);
			            return this.optional(element) || re.test(value);
			        },
			        "Please check your input."
			    );
			    
			    
			$('#loading').bind('ajaxStart', function(){
			    $(this).show();
			}).bind('ajaxStop', function(){
			    $(this).hide();
			});
			    			    
			//!Form validation for referrer
			
		    $('.modal').on('submit', '#referrerEntryForm', function(event) {
					
					//console.log('this fires');
					
					event.preventDefault();
					
							
		            // test if form is valid 
		            if($('#referrerEntryForm').validate().form()) {
		                
		                var updateReferrer = $('#updateReferrer').text();

		                
		                //if new referrer
		                if (updateReferrer == '0'){
			                
			                submitReferrerFormNew();
			                
			                
		                }else if (updateReferrer == '1'){
			                
			                
			                submitReferrerFormEdit();
			                
		                }
		                
		                
		                
		                
		            } else {
		                console.log("does not validate");
		            }
		            
		         
						
		   });
			
			
			$('.content').on('click', '.referrer', function(){
			
				var cellClicked = $(this);
				
				var lesionID = $(cellClicked).closest('tr').find('td:eq(0)').text();
				
				var studyID = $(cellClicked).closest('tr').find('td:eq(1)').text();
				
				$('.darkClass').show();
				
				request = $.ajax({
			        url: siteRoot+"scripts/getReferrer.php",
			        type: "get",
			        data: '_k_patient='+studyID
				    });
				
				request.done(function (response, textStatus, jqXHR){
				        //console.log(response);
				        
				        try{
				        
				        	var returnedData = $.parseJSON(response);
				        	}catch{
					        	
					        	$('.modal').show();
					        	
					        	$('.modal').find('.modalContent').html('<h3>Referrer Details</h3><p>The referrer for lesion'+lesionID+', patient '+studyID+' is not yet defined</p><br><br><p>Would you like to select the referrer now?</p><br><p><button class=\'selectReferrer\' onClick=\'selectReferrer("'+studyID+'")\'>Select Referrer</button></p>');
					        	
					        	return;
					        	
				        	}
				        
				        if (returnedData.title == null){
					        
					        returnedData.title = 'Dr';
					        
					        
				        }
				        
				        
				        $('.modal').show();
				
				
						$('.modal').find('.modalContent').html('<h3>Referrer Details</h3><p>The referrer for '+lesionID+', patient '+studyID+' is below</p><br><br>');
						
						$('.modal').find('.modalContent').append('<p>Name: '+returnedData.title+' '+returnedData.firstname+' '+returnedData.surname+' </p>');
						
						$('.modal').find('.modalContent').append('<p>Address: '+returnedData.address+'</p>');
						
						$('.modal').find('.modalContent').append('<p>Phone: '+returnedData.telephone+'</p>');

						$('.modal').find('.modalContent').append('<p>Fax: '+returnedData.fax+'</p>');
						
						$('.modal').find('.modalContent').append('<p>Email: '+returnedData.email+'</p>');
						
						$('.modal').find('.modalContent').append('<p><button onclick=\'$(".modal, .darkClass").hide();selectReferrer("'+studyID+'")\'>Change Referrer</button></p>');



						
				        
				   });
				
				request.fail(function (jqXHR, textStatus, errorThrown){
				        
				        console.log('ajax failed');
				        $('.darkClass').hide();
				        return;
				        
				        	    });
				
				request.always(function () {
				        // Reenable the inputs
				       
				    });
				    
				
				
				
				
			
			})
			
			
			
			
			
			//!A delete function
			
			$("table").on("click", ".delete", function ( event ) {
			    // Get index of parent TD among its siblings (add one for nth-child)
			    var ndx = $(this).parent().index() + 1;
			    // Find all TD elements with the same index
			    $("td", event.delegateTarget).remove(":nth-child(" + ndx + ")");			
			    
			});
			
			//!Add a button to find missing surveillance
			
			$('#searchArea').append("<p><button id='missingAnySurveillance'><b>Find Missing Any SC</b></button></p>");
			
			
			$('#searchArea').on('click', '#missingAnySurveillance', function(){
				
					findMissingSurveillance()	
								
			})
			
			
			
			
			
			
			
			
			//for the referrer table
			
			$('.modal').on('click', '.refTableRow', function(){
				
				//get the referrer id
				var referrerid = $(this).attr("id");
				
				var studyID = $(this).parent().parent().parent().find("div").attr("id", "_k_patient").text();
				
				//console.log(studyID);
				
				//console.log(referrerid);
				
				updateReferrerDB(referrerid, studyID);
				
				
			})
			
			$('.modal').on('click', '.refEditTableRow', function(){
				
				//get the referrer id
				var referrerid = $(this).attr("id");
				
				var studyID = $(this).parent().parent().parent().find("div").attr("id", "_k_patient").text();
				
				//console.log(studyID);
				
				//console.log(referrerid);
				
				insertReferrerFormIntoModalForEdit (referrerid);
				
				
			})
			
			if (data.data){
                
                
                identifyData();
                
                
            }
			
			
			
		
				  
	})	
	
	
	</script>
	<!-- Extra table code for iACE tables only follows-->
	
	<script src="<?php echo $folder?>includes/extraTableCode.js" type="text/javascript">
		
	</script>
	
 </body>
     <?php include ($includePath . '/footer.html'); ?>	
	
	
	</html>