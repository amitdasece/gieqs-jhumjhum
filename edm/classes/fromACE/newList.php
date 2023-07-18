<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="jquery.validate.js"></script>


<?php

set_include_path('../classes');

require 'formGenerator.class.php';
require 'Lesion.class.php';
require 'List.class.php';
require 'users.class.php';
require 'Centres.class.php';
require 'Endoscopist.class.php';

?>

<style>

form {
    
}

label, input, select, button {
    display: inline-block;
}

label {
    width: 30%;
    text-align: right;
}

label + input + select {
    width: 40%;
    margin: 0 20% 0 4%;
}

	.row {
		
		margin-bottom: 3;
		margin-top: 3;
	}

	button {
		text-align: center;
	}
	
label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }



</style>

<div id='content'>
<?php
;

//$sql = new DataBaseMysql;
//echo $sql->DataBaseMysql();
//var_dump($sql->RunQuery("Select * from Lesion"));
//var_dump($sql->returnSql());
	
//echo $sql->TotalOfRows('Lesion');	
//var_dump($sql->returnSql());

	
$lesion = new Lesion;
$lesion->Lesion();
//echo $lesion->GetKeysOrderBy('SMF', 'asc');

$centre = new Centres; 
$centre->Centres();
	//print_r($centre->Get_all_centres());
//echo $centre->Get_all_centres();
//echo $centre->GetKeysOrderBy('centreCode', 'asc');

$Endoscopists = new Endoscopist;
$Endoscopists->Endoscopist();

$form = new formGenerator;
var_dump($form->GetValues('Constituent'));

echo "<form id='createList'>";	
	
echo $form->generateDate('Predicted Date of List:', 'listDate', null, 'The date the list is planned (can be changed later)');	
	
echo $form->generateSelectCustom('Select Centre','centreID', null, $centre->Get_all_centres(), 'Select the centre which the list will be performed at');

echo $form->generateSelectCustom('Select Endoscopist','endoscopistID', null, array('default' => 'first select centre'), 'Select the responsible endoscopist');

echo $form->generateSelectCustom('Select Trainee','traineeID', null, array('default' => 'first select centre'), 'Select the participating trainee');
	
echo $form->generateText('Duration (mins):', 'Duration', null, 'Planned duration of the list in minutes');
	
echo $form->generateText('Start time (hh:mm), 24 hour clock:', 'StartTime', null, 'Planned start time of the list');
	
echo "<br>";
	
echo $form->generateSelect('CSP Descriptor', 'Descriptor', 'CSPfields', 'CSPDescriptor', 'The type of CSP study this lesion is enrolled in');
	
echo $form->generateSubmit('submitList', null, 'Submit', null);
	
echo "</form>";	


/*
$traineeSelect = $form->addElement('select', 'traineeID');
$traineeSelect->setLabel('Select Trainee');

	
$duration = $form->addElement('text', 'duration');
$duration->setLabel('Duration (mins)');
$duration->addFilter('trim');
$duration->addRule('required', 'list duration required', null,
                   HTML_QuickForm2_Rule::CLIENT);
$duration->addRule('gte', 'minimum duration 15 min', 
                   15 ,
                   HTML_QuickForm2_Rule::CLIENT);
$duration->addRule('lte', 'maximum duration 180 min', 
                   180,
                   HTML_QuickForm2_Rule::CLIENT);


$startTime = $form->addElement('text', 'startTime');
$startTime->setLabel('Start time of list (xx:xx), 24h clock');
$startTime->addFilter('trim');
$startTime->addRule('required', 'start time required', null,
                   HTML_QuickForm2_Rule::CLIENT);
$startTime->addRule('regex', 'Time only please', 
                   '/^[0-2][0-3]:[0-5][0-9]$/',
                   HTML_QuickForm2_Rule::CLIENT);

	*/
	
	//$endoscopistSelect->addRule('required', 'You must enter a list endoscopist.');
//needs a hierselect performing an Ajax Call based on tbe value of centre


//$date->addFilter('trim');
//$date->addRule('required', 'Please enter the procedure date.');



//print_r($centre->Get_all_centres());

//print_r($Endoscopists->Endoscopist_given_centre('16'));

?>


<script>

$(document).ready(function() {

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

/*$('#createList').submit(function () {
	
	$.ajax({
        url: 'addNewList.php',
        type: 'GET',
        data: $(this).serialize(),
        success:function(response)
       {
          console.log('response is '+response);
		  if (response !== 'null'){
		  var endoscopist = $.parseJSON(response);
          $('#endoscopistID').html('<option disabled value>select an endoscopist</option>');
		  $.each(endoscopist, function(key, value) {
     		$('#endoscopistID')
				.append($("<option></option>")
         		.attr("value",key)
				.text(key+' '+value));
		  	}); 
		  }else{
			$('#endoscopistID').html('<option value="default">No endoscopist defined for this centre</option>');  
			  
		  }
           
       },
       error:function(exception){alert('Submission incomplete, please try again');}
 	});	
	
});*/
	
	
$('#createList').validate({
			
			invalidHandler: function(event, validator) {
				// 'this' refers to the form
				var errors = validator.numberOfInvalids();
				console.log('there were '+errors+'errors');
				if (errors) {
				  var message = errors == 1
					? 'You missed 1 field. It has been highlighted'
					: 'You missed ' + errors + ' fields. They have been highlighted';
				  $("div.error span").html(message);
				  $("div.error").show();
				} else {
				  $("div.error").hide();
				}
			  },
			rules:{
				
				listDate : { required : true,
							 date: true
					
						},
				
				centreID : { required : true,
					
						},
				
				Duration : {required : true,
							min: 60,
							max: 600
						   },
				
				StartTime : {required : true,
							regex: "^[0-2][0-3]:[0-5][0-9]$"
						   },
				
				endoscopistID : {
								  valueNotEquals: "default"
							}
				
			},
			messages:{
				
				listDate: {
							required : 'Please enter a date',
							date: 'Ensure this is a valid date'
					
				},
				
				centreID: {
							required : 'Please identify the centre',
					
				},
				
				Duration: {
							required : 'Please enter a duration',
							min : 'Minimum duration 60 minutes',
							max : 'Maximum duration 600 minutes'
							},
				
				StartTime: {
							required : 'Please identify the start time',
							regex: 'Ensure the time is in form hh:mm'
					
				},
				
				endoscopistID : {valueNotEquals: "Please select an Endoscopist!"}
				
			},
			
			submitHandler: function(form) {
					$(form).Submit();
				 }
			  
		
			});
			
	
	$('#content').on("click", "#submitList", (function() {    
		$("#createList").submit()
		
	
	}));
	
	
	$('#content').on("change", "#centreID", (function() {    
     var centreID = $(this).val();
    
    $.ajax({
        url: 'ajaxCentre.php',
        type: 'GET',
        data: {
        'centreID': centreID,
        },
       success:function(response)//we got the response
       {
          console.log('response is '+response);
		  if (response !== 'null'){
		  var endoscopist = $.parseJSON(response);
          $('#endoscopistID').html('<option disabled value>select an endoscopist</option>');
		  $.each(endoscopist, function(key, value) {
     		$('#endoscopistID')
				.append($("<option></option>")
         		.attr("value",key)
				.text(key+' '+value));
		  	}); 
		  }else{
			$('#endoscopistID').html('<option value="default">No endoscopist defined for this centre</option>');  
			  
		  }
           
       },
       error:function(exception){alert('Exception:'+exception);}
 	})
		
	$.ajax({
        url: 'traineeCentre.php',
        type: 'GET',
        data: {
        'centreID': centreID,
        },
       success:function(response)//we got the response
       {
          console.log('response is '+response);
		  if (response !== 'null'){
		  var trainee = $.parseJSON(response);
          $('#traineeID').html('<option disabled value>select a trainee</option>');
		  $.each(trainee, function(key, value) {
     		$('#traineeID')
				.append($("<option></option>")
         		.attr("value",key)
				.text(key+' '+value));
		  	}); 
		  }else{
			$('#traineeID').html('<option value="default">No trainee defined for this centre</option>');  
			  
		  }
           
       },
       error:function(exception){alert('Exception:'+exception);}
 	})
    
}));
	
	
	
	
	
});




</script>
</div>