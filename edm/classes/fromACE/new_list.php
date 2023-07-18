<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="jquery.validate.js"></script>


<?php


require '../classes/Lesion.class.php';
require '../classes/List.class.php';
require '../classes/users.class.php';
require '../classes/Centres.class.php';
require '../classes/Endoscopist.class.php';



set_include_path('../../../../php');
require 'HTML/QuickForm2.php';
require_once 'HTML/QuickForm2/Renderer.php';
//require_once 'HTML/AJAX/Helper.php';
//require_once './support/hierselect-loader.php';


?>

<style>

form {
    
}

.label, .element {
    display: inline-block;
}

.label {
    width: 30%;
    text-align: right;
}

.label + .element {
    width: 40%;
    margin: 0 20% 0 4%;
}

.error {
	color: red;
}




</style>

<div id='content'>
<?php
;

$lesion = new Lesion;
$lesion->Lesion();

$centre = new Centres; 
$centre->Centres();

$Endoscopists = new Endoscopist;
$Endoscopists->Endoscopist();


$form = new HTML_QuickForm2 ('newList');

$date = $form->addElement(
    'date', 'listDate', null,
    array('format' => 'd-F-Y', 'minYear' => date('Y', strtotime('+1 year')), 'maxYear' => 2016)
);
$date->setLabel('Predicted Date of List');


$centreSelect = $form->addElement('select', 'centreID')
              ->loadOptions($centre->Get_all_centres());
$centreSelect->setLabel('Select Centre');
	
$endoscopistSelect = $form->addElement('select', 'endoscopistID');
$endoscopistSelect->setLabel('Select Endoscopist');
$endoscopistSelect->addRule('required', 'Endoscopist is required', null,
                   HTML_QuickForm2_Rule::CLIENT);
	
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

	
	
	//$endoscopistSelect->addRule('required', 'You must enter a list endoscopist.');
//needs a hierselect performing an Ajax Call based on tbe value of centre


//$date->addFilter('trim');
//$date->addRule('required', 'Please enter the procedure date.');

$form->addElement('submit', 'submit', array('value'=>'Submit'));
	

// Check for a form submission:
  if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form submission

      // Validate the form data:
     if ($form->validate()) {

         echo 'Correctly filled the form';
		 print_r($_POST);

	 }
  }



$renderer = HTML_QuickForm2_Renderer::factory('default');
	

$form->render($renderer);
	



echo $renderer->getJavascriptBuilder()->getLibraries(true, true);
	
echo "<fieldset>";		
echo $renderer;
	echo "</fieldset>";

//print_r($centre->Get_all_centres());

//print_r($Endoscopists->Endoscopist_given_centre('16'));

?>


<script>

$(document).ready(function() {
	
	
	$('#content').on("change", "#centreID-0", (function() {    
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
		  if (response !== null){
		  var endoscopist = $.parseJSON(response);
         
		  $.each(endoscopist, function(key, value) {
     		$('#endoscopistID-0')
				.html($("<option></option>")
         		.attr("value",key)
				.text(value));
		  	}); 
		  }else{
			$('#endoscopistID-0').html('<option value="0">No endoscopist defined for this centre</option>');  
			  
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
		  if (response !== null){
		  var trainee = $.parseJSON(response);
         
		  $.each(trainee, function(key, value) {
     		$('#traineeID-0')
				.html($("<option></option>")
         		.attr("value",key)
				.text(value));
		  	}); 
		  }else{
			$('#traineeID-0').html('<option value="0">No trainee defined for this centre</option>');  
			  
		  }
           
       },
       error:function(exception){alert('Exception:'+exception);}
 	})
    
}));
	
	
	
	
	
});




</script>
</div>