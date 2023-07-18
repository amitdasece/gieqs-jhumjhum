

<?php require '../../includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      $openaccess = 1;
      /* $requiredUserLevel = 5; */


      require BASE_URI . '/head.php';

      $general = new general;

      $navigator = new navigator;

      $formv1 = new formGenerator;

      ?>

    <!--Page title-->
    <title>GIEQs Online Endoscopy Trainer - Scores - SMIC calculator</title>

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">


    <style>
       
        .gieqsGold {

            color: rgb(238, 194, 120);


        }

        .card-placeholder{

            width: 344px;

        }

        .break {
  flex-basis: 100%;
  height: 0;
}

.flex-even {
  flex: 1;
}

.flex-nav {
  flex: 0 0 18%;
}


        
        .gieqsGoldBackground {

background-color: rgb(238, 194, 120);


}

        .tagButton {

            cursor: pointer;

        }

        

        

        iframe {
  box-sizing: border-box;
    height: 25.25vw;
    left: 50%;
    min-height: 100%;
    min-width: 100%;
    transform: translate(-50%, -50%);
    position: absolute;
    top: 50%;
    width: 100.77777778vh;
}
.cursor-pointer {

    cursor: pointer;

}

@media (max-width: 768px) {

    .flex-even {
  flex-basis: 100%;
}
}

@media (max-width: 768px) {

.card-header {
    height:250px;
}

.card-placeholder{

    width: 204px;

}


}

@media (min-width: 1200px) {
        #chapterSelectorDiv{

            
                
                top:-3vh;
            

        }
        #playerContainer{

                margin-top:-20px;

        }
        #collapseExample {

            position: absolute; 
            max-width: 50vh; 
            z-index: 25;
        }

        

}
    </style>


</head>

<body>
    <header class="header header-transparent" id="header-main">

        <!-- Topbar -->

        <?php require BASE_URI . '/pages/learning/includes/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/pages/learning/includes/nav.php';?>

        


    </header>

    <?php
		if (isset($_GET["id"]) && is_numeric($_GET["id"])){
			$id = $_GET["id"];
		
		}else{
		
			$id = null;
		
		}
				    
                        
                        
		
        ?>
        
        <!-- load all video data -->

        <div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>

        <!--- specifiy the tag Categories required for display  CHANGEME-->

        <?php
        $requiredTagCategories = ['66', '105'];

        ?>

        <div id="requiredTagCategories" style="display:none;"><?php echo json_encode($requiredTagCategories);?></div>

       

                    <!--CONSTRUCT TAG DISPLAY-->

                    <!--GET TAG CATEGORY NAME 
                    
                    <?php

                    //define the page for referral info

                    //$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
                    $url =  "{$_SERVER['REQUEST_URI']}";

                    $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );

                    ?>
-->

        <div id="escaped_url" style="display:none;"><?php echo $escaped_url;?></div>

<!--
                    
                TODO see other videos with similar tags, see videos with this tag, tag jump the video,
                list of chapters with associated tags [toggle view by category, chapter]
                
                -->


    <!-- Omnisearch -->
   
    <div class="main-content bg-gradient-dark">

        <!--Header CHANGEME-->

    <div class="d-flex align-items-end container">
        <p class="h1 mt-10">Mucosal Visualisation Score</p>

    </div>
    <div class="d-flex align-items-end container">
        <p class="text-muted pl-4 mt-2"></p>

    </div>


        <!--Navigation-->

    <!-- <div id="navigationZone">
    <?php //require(BASE_URI . '/pages/learning/includes/navigation.php'); ?>
    </div> -->
    


        <!--Video Display-->


    <div class="container mt-3">
            
<script>

	function round(value, precision) {
		var multiplier = Math.pow(10, precision || 0);
		return Math.round(value * multiplier) / multiplier;
	}

	function determineCOVERT (location, morphology, paris) {
			
			if ((location === null) || (morphology === null) || (paris ===null)){
		
				COVERT = '-';
				return COVERT;

			}else{
				
				
				var locationInt = +location;
				var morphologyInt = +morphology;
				var parisInt = +paris;
				
				
				if (isNaN(locationInt) || isNaN(morphologyInt) || isNaN(parisInt)){

				COVERT = '-';
				return COVERT;

				}else{
				
				
				var locationCategory;
				var morphologyCategory;
				var parisCategory;

				//need colon site
				//need morphology
				//need paris

				//convert to the required format

				//location proximal 9-13 others distal //category 1 distal 2 proximal

				
				if (locationInt < 9){
					locationCategory = 1;
				}else{
					locationCategory = 2;
				}
					
				if (morphologyInt == 1){
					
					morphologyCategory = 1; //granular
				}else if (morphologyInt == 2){
					
					morphologyCategory = 2; // non-granular
					
				}else if (morphologyInt > 2){  //can't calculate the score as serrated and mixed not supported
					
					COVERT = '-';
					return COVERT;
					
				}
					
					
				if (parisInt == 2){
					
					parisCategory = 1; // 0-IIa
					
				}else if (parisInt == 6){
					
					parisCategory = 2; // 0-IIa/Is
					
				}else if (parisInt == 1){
					
					parisCategory = 3; //0-Is
					
				}else{ // unsupported Paris class
					
					COVERT = '-';
					return COVERT;
				}	
			
			
				//now have categorical variables available only if they are correct type for this score	
					
				if (locationCategory == 2 && morphologyCategory == 1 && parisCategory == 1){
					
					COVERT = '0.7%';
				}else if (locationCategory == 1 && morphologyCategory == 1 && parisCategory == 1){
					
					COVERT = '1.2%';
				}else if (locationCategory == 2 && morphologyCategory == 1 && parisCategory == 2){
					
					COVERT = '4.2%';
				}else if (locationCategory == 1 && morphologyCategory == 1 && parisCategory == 2){
					
					COVERT = '10.1%';
				}else if (locationCategory == 2 && morphologyCategory == 1 && parisCategory == 3){
					
					COVERT = '2.3%';
				}else if (locationCategory == 1 && morphologyCategory == 1 && parisCategory == 3){
					
					COVERT = '5.7%';
				}else if (locationCategory == 2 && morphologyCategory == 2 && parisCategory == 1){
					
					COVERT = '3.8%';
				}else if (locationCategory == 1 && morphologyCategory == 2 && parisCategory == 1){
					
					COVERT = '6.4%';
				}else if (locationCategory == 2 && morphologyCategory == 2 && parisCategory == 2){
					
					COVERT = '12.7%';
				}else if (locationCategory == 1 && morphologyCategory == 2 && parisCategory == 2){
					
					COVERT = '15.9%';
				}else if (locationCategory == 2 && morphologyCategory == 2 && parisCategory == 3){
					
					COVERT = '12.3%';
				}else if (locationCategory == 1 && morphologyCategory == 2 && parisCategory == 3){
					
					COVERT = '21.4%';
				}				
					
				return COVERT;	
					
				}
			
			}
            
			//surely there should be a version involving size...

            
		}

    //hie below if demarcated area = yes

    function noDemarcatedArea(){

        var labels = $('#size, #location, #morphology, #paris').parent().prev();
        var arrayToHide = $('#size, #location, #morphology, #paris').parent();

        $(labels).show();
        $(arrayToHide).show();
        $('#demarcation_imaging').val('Please select...');

        $('#demarcation_imaging').hide();
        $('#demarcation_imaging').parent().prev().hide();



    }

    function demarcatedArea(){

        var labels = $('#size, #location, #morphology, #paris').parent().prev();
        var arrayToHide = $('#size, #location, #morphology, #paris').parent();

        $(labels).hide();
        $(arrayToHide).hide();
        $('#demarcation_imaging').show();
        $('#demarcation_imaging').parent().prev().show();


        /* $('#size, #location, #morphology, #paris').parent().hide(); */

    }



	function determineSMIC (demarcation, size, location, morphology, paris, debug=true) {
			
			if ((demarcation == null)){

				return 'Was there a demarcated area?';



            }else if ((demarcation == 1)){

                return {

                "risk_text" : 'Very High Risk',
                "risk": 17.6,
                "odds": 16,


                }
                
             
                
            }else if ((size == null) || (location == null) || (morphology == null) || (paris == null)){
		
				return 'Missing Variables - please enter all 4 further characteristics';


			}else{
				
				//var demarcation = +demarcation;
				var sizeInt = +size;
				var locationInt = +location;
				var morphologyInt = +morphology;
				var parisInt = +paris;
				
				
				if (isNaN(sizeInt) || isNaN(locationInt) || isNaN(morphologyInt) || isNaN(parisInt) ){

					return 'Issue with variables supplied, please check they are numbers';

				}else{
				
					var SMICriskOR = 0;
					var SMICriskactual = 1.1;


					if (sizeInt == 2){
						//>=30mm
						SMICriskOR = SMICriskOR + 1.12;

					}else if (sizeInt == 3){
						//>=40mm
						SMICriskOR = SMICriskOR + 2*(1.12);

					}else if (sizeInt == 4){
						//>=-50mm
						SMICriskOR = SMICriskOR + 3*(1.12);

					}else if (sizeInt == 5){
						//>=60mm
						SMICriskOR = SMICriskOR + 4*(1.12);

					}else if (sizeInt == 6){
						//>=70mm
						SMICriskOR = SMICriskOR + 5*(1.12);

					}else if (sizeInt == 7){
						//>=80mm
						SMICriskOR = SMICriskOR + 6*(1.12);

					}else if (sizeInt == 8){
						//>=90mm
						SMICriskOR = SMICriskOR + 7*(1.12);

					}else if (sizeInt == 9){
						//>=100mm
						SMICriskOR = SMICriskOR + 8*(1.12);

					}
					
					if (locationInt == 1){

						SMICriskOR = SMICriskOR + 1.91;

					}

					
					
					if (paris == 2){

					SMICriskOR = SMICriskOR + 2.73;

					}else if (paris == 3){

					SMICriskOR = SMICriskOR + 2.49;

					}

					if (morphology == 2){

						SMICriskOR = SMICriskOR + 2.8;

						}else if (morphology == 3){

						SMICriskOR = SMICriskOR + 0.72;

						}
						
					//round(SMICriskOR, 1);

					if (SMICriskOR == 0){

						SMICriskOR = 1;

					}

					if (SMICriskOR == -0.28){

						SMICriskOR = 0.72;

					}

					var SMICnumeric = SMICriskOR * SMICriskactual;

					SMICriskOR = round(SMICriskOR, 1);

					SMICnumeric = round(SMICnumeric, 1);

                    if (SMICnumeric < 10){

                        var text = 'Low Risk';

                    }else if (SMICnumeric >= 10){


                        var text = 'High Risk';

                    }

                    //return an object

                    return {

                        "risk_text" : text,
                        "risk": SMICnumeric,
                        "odds": SMICriskOR,


                    }

					//return  '<h3> ' + text + '</h3><h4>' + SMICnumeric + '% </h4> <br><br>(or ' + SMICriskOR + 'x the risk of a granular 0-IIa 20-29mm LSL in the colon proximal to the sigmoid without a demarcated area or depression, risk 1.1%)<br>';
	
					
				}
			
			}
			
			
		}

        function determineSMICnew (demarcation, size, location, morphology, paris, debug=true) {
			
			if ((demarcation == null)){

				return 'Was there a demarcated area?';



            }else if ((demarcation == 1)){

                return {

                "risk_text" : 'OVERT Risk',
                "risk": 22.1,
                "odds": 22.1,


                }
                
             
                
            }else if ((size == null) || (location == null) || (morphology == null) || (paris == null)){
		
				return 'Missing Variables - please enter all 4 further characteristics';


			}else{
				
				//var demarcation = +demarcation;
				var sizeInt = +size;
				var locationInt = +location;
				var morphologyInt = +morphology;
				var parisInt = +paris;
				
				
				if (isNaN(sizeInt) || isNaN(locationInt) || isNaN(morphologyInt) || isNaN(parisInt) ){

return 'Issue with variables supplied, please check they are numbers';

}else{

var SMICriskOR = -4.498799;
var SMICriskactual = 1.1;

/* if (kudovInt == 1){

    SMICriskOR = SMICriskOR + 2.653242;

}

if (depressionInt == 1){

    if (debug){

        console.log(SMICriskOR);

    }

    SMICriskOR = SMICriskOR + 0.5877867;

} */

if (sizeInt == 2){
    //>=30mm
    SMICriskOR = SMICriskOR + 0.1133287;

}else if (sizeInt == 3){
    //>=40mm
    SMICriskOR = SMICriskOR + 2*(0.1133287);

}else if (sizeInt == 4){
    //>=-50mm
    SMICriskOR = SMICriskOR + 3*(0.1133287);

}else if (sizeInt == 5){
    //>=60mm
    SMICriskOR = SMICriskOR + 4*(0.1133287);

}else if (sizeInt == 6){
    //>=70mm
    SMICriskOR = SMICriskOR + 5*(0.1133287);

}else if (sizeInt == 7){
    //>=80mm
    SMICriskOR = SMICriskOR + 6*(0.1133287);

}else if (sizeInt == 8){
    //>=90mm
    SMICriskOR = SMICriskOR + 7*(0.1133287);

}else if (sizeInt == 9){
    //>=100mm
    SMICriskOR = SMICriskOR + 8*(0.1133287);

}

if (locationInt == 1){

    SMICriskOR = SMICriskOR + 0.6471032;

}



if (paris == 2){

SMICriskOR = SMICriskOR + 1.004302;

}else if (paris == 3){

SMICriskOR = SMICriskOR + 0.9122827;

}

if (morphology == 2){

    SMICriskOR = SMICriskOR + 1.029619;

    }else if (morphology == 3){

    SMICriskOR = SMICriskOR - 0.3285041;

    }
    
//round(SMICriskOR, 1);

/* if (SMICriskOR == 0){

    SMICriskOR = 1;

}

if (SMICriskOR == -0.28){

    SMICriskOR = 0.72;

} */

//SMICOR includes b0
//formula to get cnacer is exp(x)/1+(exp(x))


//return SMICriskOR + '%';


SMIrisk = ((Math.exp(SMICriskOR))/(1+Math.exp(SMICriskOR)))*100;

SMIrisk = round(SMIrisk, 1);


//var SMICnumeric = SMICriskOR * SMICriskactual;

				/* 	SMICriskOR = round(SMICriskOR, 1);

					SMICnumeric = round(SMICnumeric, 1);
 */
                    if (SMIrisk < 10){

                        var text = 'Low Risk';

                    }else if (SMIrisk >= 10){


                        var text = 'High Risk';

                    }

                    //return an object

                    return {

                        "risk_text" : text,
                        "risk": SMIrisk,
                        "odds": SMIrisk,


                    }

/* var SMICnumeric = SMICriskOR * SMICriskactual;

SMICriskOR = round(SMICriskOR, 1);

SMICnumeric = round(SMICnumeric, 1);

return SMICnumeric + '%  <br>(or ' + SMICriskOR + 'x the risk of a granular 0-IIa 20-29mm LSL in the colon proximal to the sigmoid without a demarcated area or depression, risk 1.1%)<br>';
*/

}
			
			
		}

    }   


    //NEW WINDOW TRANSMITTING CODE

/*     let newWindow;
const response = document.getElementById('response');
window.addEventListener('message', (event) => {
    if(event.data?.foo) {
        response.innerText = event.data.foo;
    }
    if(event.data?.msg) {
        response.innerText = event.data.msg;
    }
})

const sendMessage = () => {
    newWindow.postMessage({foo: 'bar'}, '*');
}



const closeWindow = (message) => {
    window.opener.postMessage({msg: message}, '*');
    window.close();
} */

const openNewWindow = () => {
    const params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=800,height=600`;
    newWindow = window.open(siteRoot + "scores/caecum", 'sub', params);
}

window.addEventListener('message', function(event) {
    if (event.data) {
        console.dir(event.data);

        try {
        var score = JSON.parse(event.data);
        console.log(score);


        $.each(score, function(k, v) {


            var a = 0;
            var b = 0;

            if (v == 'Yes'){

                v = 1;


            }else if (v == 'No') {

                v = 0;


            }

                $('#' + k).val(v);

            });

        }catch{



        }

        //console.log(event.source, 'is saying hello!');




    }
});
        
	
		$(document).ready(function() {

            demarcatedArea();

			$('.content').on('click', '#calculate', function(){

                    
                    var score = generateScore();

                    $('#result').html('<h3 class="gieqsGold"> Score Copied to Clipboard</h3>');
                   
                    $('#result').addClass('gieqsGold');






                
                
                $('html, body').animate({
                    scrollTop: eval($('#result').offset().top - 200)
                }, 150);
			})
			
            
            $('.content').on('click', '#launch-cecum', function(event){

                event.preventDefault();
                    
                openNewWindow();

			})

            $('.content').on('change', '.formInputs', function(){


                $('#result').html('');


            })

            $('.content').on('change', '#demarcation, #demarcation_imaging', function(){

                

                var demarcation = null;
                var demarcation_field = $('#demarcation').val();
                var true_demarcation = null;
                var showImagingWithoutDemarcation = false;


                if ($('#demarcation_imaging').val() == '1' || $('#demarcation_imaging').val() == '2'){

                    true_demarcation = false;

                }else if ($('#demarcation_imaging').val() == '3' || $('#demarcation_imaging').val() == '4'){

                    true_demarcation = true;

                }

                console.log('Demarcation field is ' + demarcation_field + ' true_demarcation = ' + true_demarcation);

                if (demarcation_field == 0){

                    demarcation = 0;

                }else if (demarcation_field == 1 && true_demarcation == false){

                    demarcation = 0;
                    showImagingWithoutDemarcation = true;

                }else if (demarcation_field == 1 && true_demarcation == true){

                    demarcation = 1;

                }else if (demarcation_field == 1 && true_demarcation == null){

                    demarcation = 1;
                
                }


                if (demarcation == 0){


                    noDemarcatedArea();

                    if (showImagingWithoutDemarcation == true){


                        $('#demarcation_imaging').show();
                         $('#demarcation_imaging').parent().prev().show();

                    }


                }else if (demarcation == 1){

                    demarcatedArea();

                    $('#demarcation_imaging').parent().show();

                    


                }

                })

		})
	
	</script>
	

</head>

<body>

	
	
    <div class='content'>
        

<?php

//$requiredValues = array("Location","Morphology","Paris");

//$values = array();
//$values = $lesion->GetValuesSpecific($requiredValues);

//print_r($values);

?>

       
                <!-- <p><h3><b>Risk for Submucosal Invasion within a given LSL </h3>[algorithm ala Burgess 2018 Gastroenterology]</b></p>
 -->
                
		<br>
		<div id='result' class='yellow'></div>
		<br>
		
		<form action="adminGenerateUserEmail.php" method="post">
            <fieldset>

                <h3 class="section-score">Caecum</h3>
               
                <?php
                $formv1->generateSelectCustom2 ('1. Distension:', 'distention_caecum', 'factor distension', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'Degree of Distension');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('2. BBPS segment:', 'bbps_caecum', 'factor bbps', array('0'=>'Inadequate', '1'=>'Poor', '2'=>'Average','3'=>'Good',), 'How good was the bowel preparation of the described segment?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('3. Estimated Percent Visualisation?:', 'percent_visualisation_caecum', 'factor percent_visualisation', array('1'=>'100%', '2'=>'90%', '3'=>'80%','4'=>'70%','5'=>'60%', '6'=>'50%', '7'=>'40%', '8'=>'30%','9'=>'20%','10'=>'10%', '11'=>'0%'), 'How well was mucosa visualised overall?');
				echo '<br/>';

                ?>
                         

                <p>
                <button id="launch-cecum">Launch Caecum Score</button></p>

                <?php


                $formv1->generateSelectCustom2 ('4. OQ1:', 'OQ1', 'factor cecum-score', array('0'=>'No', '1'=>'Yes',), 'OQ1 visualised');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('5. OQ2:', 'OQ2', 'factor cecum-score', array('0'=>'No', '1'=>'Yes',), 'OQ2 visualised');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('6. OQ3:', 'OQ3', 'factor cecum-score', array('0'=>'No', '1'=>'Yes',), 'OQ3 visualised');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('7. OQ4:', 'OQ4', 'factor cecum-score', array('0'=>'No', '1'=>'Yes',), 'OQ4 visualised');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('8. TF1:', 'TF1', 'factor cecum-score', array('0'=>'No', '1'=>'Yes',), 'TF1 visualised');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('9. TF2:', 'TF2', 'factor cecum-score', array('0'=>'No', '1'=>'Yes',), 'TF2 visualised');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('10. TF3:', 'TF3', 'factor cecum-score', array('0'=>'No', '1'=>'Yes',), 'TF3 visualised');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('11. AO:', 'AO', 'factor cecum-score', array('0'=>'No', '1'=>'Yes',), 'AO visualised');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('12. Score:', 'Score', 'factor cecum-score', array('0'=>'0', '1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6', '7'=>'7', '8'=>'8',), 'AO visualised');
				echo '<br/>';

                ?>
               
      



                <h3 class="section-score">Ascending Colon</h3>
				<?php

				$formv1->generateSelectCustom2 ('1. Distension:', 'distention_ascending', 'factor distension', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'Degree of Distension');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('2. BBPS segment:', 'bbps_ascending', 'factor bbps', array('0'=>'Inadequate', '1'=>'Poor', '2'=>'Average','3'=>'Good',), 'How good was the bowel preparation of the described segment?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('3. Folds Deflected / Amount of Mucosa Visualisation behind Folds?:', 'fold_deflection_ascending', 'factor behind_folds', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'How well was mucosa behind folds visualised?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('4. Estimated Percent Visualisation?:', 'percent_visualisation_ascending', 'factor percent_visualisation', array('1'=>'100%', '2'=>'90%', '3'=>'80%','4'=>'70%','5'=>'60%', '6'=>'50%', '7'=>'40%', '8'=>'30%','9'=>'20%','10'=>'10%', '11'=>'0%'), 'How well was mucosa visualised overall?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('5. Was retroflexion performed?:', 'retroflexion_ascending', 'factor retroflexion', array('0'=>'No', '1'=>'Yes',), 'Was retroflexion performed?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('6. Adequacy of Retroflexion View of Ascending Colon?:', 'adequacy_retroflexion_ascending', 'factor adequacy_retroflexion', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'What was the adequacy of the visualised ascending colon in retroflexion?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('7. Was 2 pass assessment performed?:', 'two_pass_ascending', 'factor two_pass', array('0'=>'No', '1'=>'Yes',), 'Was the segement examined twice?');
				echo '<br/>';

                ?>

                <h3 class="section-score">Hepatic Flexure</h3>
				<?php

				$formv1->generateSelectCustom2 ('1. Distension:', 'distention_hepatic_flexure', 'factor distension', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'Degree of Distension');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('2. BBPS segment:', 'bbps_hepatic_flexure', 'factor bbps', array('0'=>'Inadequate', '1'=>'Poor', '2'=>'Average','3'=>'Good',), 'How good was the bowel preparation of the described segment?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('3. Folds Deflected / Amount of Mucosa Visualisation behind Folds?:', 'fold_deflection_hepatic_flexure', 'factor behind_folds', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'How well was mucosa behind folds visualised?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('4. Estimated Percent Visualisation?:', 'percent_visualisation_hepatic_flexure', 'factor percent_visualisation', array('1'=>'100%', '2'=>'90%', '3'=>'80%','4'=>'70%','5'=>'60%', '6'=>'50%', '7'=>'40%', '8'=>'30%','9'=>'20%','10'=>'10%', '11'=>'0%'), 'How well was mucosa visualised overall?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('5. Was 2 pass assessment performed?:', 'two_pass_hepatic_flexure', 'factor two_pass', array('0'=>'No', '1'=>'Yes',), 'Was the segement examined twice?');
				echo '<br/>';

                ?>


                <h3 class="section-score">Tranvserse Colon PROXIMAL</h3>
				<?php

				$formv1->generateSelectCustom2 ('1. Distension:', 'distention_transverse_proximal', 'factor distension', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'Degree of Distension');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('2. BBPS segment:', 'bbps_transverse_proximal', 'factor bbps', array('0'=>'Inadequate', '1'=>'Poor', '2'=>'Average','3'=>'Good',), 'How good was the bowel preparation of the described segment?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('3. Folds Deflected / Amount of Mucosa Visualisation behind Folds?:', 'fold_deflection_transverse_proximal', 'factor behind_folds', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'How well was mucosa behind folds visualised?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('4. Estimated Percent Visualisation?:', 'percent_visualisation_transverse_proximal', 'factor percent_visualisation', array('1'=>'100%', '2'=>'90%', '3'=>'80%','4'=>'70%','5'=>'60%', '6'=>'50%', '7'=>'40%', '8'=>'30%','9'=>'20%','10'=>'10%', '11'=>'0%'), 'How well was mucosa visualised overall?');
				echo '<br/>';


                ?>

                <h3 class="section-score">Tranvserse Colon DISTAL</h3>
				<?php

				$formv1->generateSelectCustom2 ('1. Distension:', 'distention_transverse_distal', 'factor distension', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'Degree of Distension');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('2. BBPS segment:', 'bbps_transverse_distal', 'factor bbps', array('0'=>'Inadequate', '1'=>'Poor', '2'=>'Average','3'=>'Good',), 'How good was the bowel preparation of the described segment?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('3. Folds Deflected / Amount of Mucosa Visualisation behind Folds?:', 'fold_deflection_transverse_distal', 'factor behind_folds', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'How well was mucosa behind folds visualised?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('4. Estimated Percent Visualisation?:', 'percent_visualisation_transverse_distal', 'factor percent_visualisation', array('1'=>'100%', '2'=>'90%', '3'=>'80%','4'=>'70%','5'=>'60%', '6'=>'50%', '7'=>'40%', '8'=>'30%','9'=>'20%','10'=>'10%', '11'=>'0%'), 'How well was mucosa visualised overall?');
				echo '<br/>';


                ?>

                <h3 class="section-score">Splenic Flexure</h3>
				<?php

				$formv1->generateSelectCustom2 ('1. Distension:', 'distention_splenic_flexure', 'factor distension', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'Degree of Distension');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('2. BBPS segment:', 'bbps_splenic_flexure', 'factor bbps', array('0'=>'Inadequate', '1'=>'Poor', '2'=>'Average','3'=>'Good',), 'How good was the bowel preparation of the described segment?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('3. Folds Deflected / Amount of Mucosa Visualisation behind Folds?:', 'fold_deflection_splenic_flexure', 'factor behind_folds', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'How well was mucosa behind folds visualised?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('4. Estimated Percent Visualisation?:', 'percent_visualisation_splenic_flexure', 'factor percent_visualisation', array('1'=>'100%', '2'=>'90%', '3'=>'80%','4'=>'70%','5'=>'60%', '6'=>'50%', '7'=>'40%', '8'=>'30%','9'=>'20%','10'=>'10%', '11'=>'0%'), 'How well was mucosa visualised overall?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('5. Was 2 pass assessment performed?:', 'two_pass_splenic_flexure', 'factor two_pass', array('0'=>'No', '1'=>'Yes',), 'Was the segement examined twice?');
				echo '<br/>';

                ?>

                <h3 class="section-score">Descending Colon</h3>
				<?php

				$formv1->generateSelectCustom2 ('1. Distension:', 'distention_descending', 'factor distension', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'Degree of Distension');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('2. BBPS segment:', 'bbps_descending', 'factor bbps', array('0'=>'Inadequate', '1'=>'Poor', '2'=>'Average','3'=>'Good',), 'How good was the bowel preparation of the described segment?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('3. Folds Deflected / Amount of Mucosa Visualisation behind Folds?:', 'fold_deflection_descending', 'factor behind_folds', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'How well was mucosa behind folds visualised?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('4. Estimated Percent Visualisation?:', 'percent_visualisation_descending', 'factor percent_visualisation', array('1'=>'100%', '2'=>'90%', '3'=>'80%','4'=>'70%','5'=>'60%', '6'=>'50%', '7'=>'40%', '8'=>'30%','9'=>'20%','10'=>'10%', '11'=>'0%'), 'How well was mucosa visualised overall?');
				echo '<br/>';


                ?>

                <h3 class="section-score">Sigmoid Colon</h3>
				<?php

				$formv1->generateSelectCustom2 ('1. Distension:', 'distention_sigmoid', 'factor distension', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'Degree of Distension');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('2. BBPS segment:', 'bbps_sigmoid', 'factor bbps', array('0'=>'Inadequate', '1'=>'Poor', '2'=>'Average','3'=>'Good',), 'How good was the bowel preparation of the described segment?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('3. Folds Deflected / Amount of Mucosa Visualisation behind Folds?:', 'fold_deflection_sigmoid', 'factor behind_folds', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'How well was mucosa behind folds visualised?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('4. Estimated Percent Visualisation?:', 'percent_visualisation_sigmoid', 'factor percent_visualisation', array('1'=>'100%', '2'=>'90%', '3'=>'80%','4'=>'70%','5'=>'60%', '6'=>'50%', '7'=>'40%', '8'=>'30%','9'=>'20%','10'=>'10%', '11'=>'0%'), 'How well was mucosa visualised overall?');
				echo '<br/>';


                ?>
<h3 class="section-score">Rectosigmoid Junction</h3>
				<?php

				$formv1->generateSelectCustom2 ('1. Distension:', 'distention_rectosigmoid', 'factor distension', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'Degree of Distension');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('2. BBPS segment:', 'bbps_rectosigmoid', 'factor bbps', array('0'=>'Inadequate', '1'=>'Poor', '2'=>'Average','3'=>'Good',), 'How good was the bowel preparation of the described segment?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('3. Folds Deflected / Amount of Mucosa Visualisation behind Folds?:', 'fold_deflection_rectosigmoid', 'factor behind_folds', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'How well was mucosa behind folds visualised?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('4. Estimated Percent Visualisation?:', 'percent_visualisation_rectosigmoid', 'factor percent_visualisation', array('1'=>'100%', '2'=>'90%', '3'=>'80%','4'=>'70%','5'=>'60%', '6'=>'50%', '7'=>'40%', '8'=>'30%','9'=>'20%','10'=>'10%', '11'=>'0%'), 'How well was mucosa visualised overall?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('5. Was 2 pass assessment performed?:', 'two_pass_rectosigmoid', 'factor two_pass', array('0'=>'No', '1'=>'Yes',), 'Was the segement examined twice?');
				echo '<br/>';
                ?>
               
                <h3 class="section-score">Rectum</h3>
				<?php

				$formv1->generateSelectCustom2 ('1. Distension:', 'distention_rectum', 'factor distension', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'Degree of Distension');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('2. BBPS segment:', 'bbps_rectum', 'factor bbps', array('0'=>'Inadequate', '1'=>'Poor', '2'=>'Average','3'=>'Good',), 'How good was the bowel preparation of the described segment?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('3. Folds Deflected / Amount of Mucosa Visualisation behind Folds?:', 'fold_deflection_rectum', 'factor behind_folds', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'How well was mucosa behind folds visualised?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('4. Estimated Percent Visualisation?:', 'percent_visualisation_rectum', 'factor percent_visualisation', array('1'=>'100%', '2'=>'90%', '3'=>'80%','4'=>'70%','5'=>'60%', '6'=>'50%', '7'=>'40%', '8'=>'30%','9'=>'20%','10'=>'10%', '11'=>'0%'), 'How well was mucosa visualised overall?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('5. Was retroflexion performed?:', 'retroflexion_rectum', 'factor retroflexion', array('0'=>'No', '1'=>'Yes',), 'Was retroflexion performed?');
				echo '<br/>';

                $formv1->generateSelectCustom2 ('6. Adequacy of Retroflexion View of Distal Rectum?:', 'adequacy_retroflexion_rectum', 'factor adequacy_retroflexion', array('1'=>'Very Poor', '2'=>'Poor', '3'=>'Average','4'=>'Good','5'=>'Very Good',), 'What was the adequacy of the visualised distal rectum in retroflexion?');
				echo '<br/>';

                ?>
                
               

               

                
				
			
									   
				

                <p><button id='calculate' type="button" name="calculate">Calculate and Copy Result to Clipboard</button></p>

                <!--conversion to newlines $(this).val().replace(/\r\n|\r|\n/g,"<br />")-->

                <p></p>
            </fieldset>
        </form>

		<p class="mt-6">Definitions:</p>
        <p>Hover over titles for definitions</p>
        
    </div>

            
    </div>



   
   
    

       
    </div>



    
    <!-- Modal -->
    

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="assets/js/purpose.core.js"></script> -->
    <!-- Page JS -->
     <!-- Google maps -->
    
    <!-- Purpose JS -->
    <script src=<?php echo BASE_URL . "/assets/js/purpose.js"?>></script>
    <!-- <script src=<?php echo BASE_URL . "/assets/js/generaljs.js"?>></script> -->
    <script>
    var videoPassed = $("#id").text();
                    </script>

    <script src=<?php echo BASE_URL . "/pages/learning/includes/social.js"?>></script>

    <script>
        
        //the number that are actually loaded
        var loaded = 1;

        //the number the user wants
        var loadedRequired = 1;

        var firstTime = 1; var activeStatus = 1;

        var requiredTagCategoriesText = $("#requiredTagCategories").text();

        var requiredTagCategories = JSON.parse(requiredTagCategoriesText);

        function copyToClipboard(text) {
    if (window.clipboardData && window.clipboardData.setData) {
        // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
        return window.clipboardData.setData("Text", text);

    }
    else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
        var textarea = document.createElement("textarea");
        textarea.textContent = text;
        textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in Microsoft Edge.
        document.body.appendChild(textarea);
        textarea.select();
        try {
            return document.execCommand("copy");  // Security exception may be thrown by some browsers.
        }
        catch (ex) {
            console.warn("Copy to clipboard failed.", ex);
            return false;
        }
        finally {
            document.body.removeChild(textarea);
        }
    }
}


//EDITED BLINK

        function generateScore(){

                var location_tip = $('#location_tip').val();
				var location_loop = $('#location_loop').val();
				var loop_name = $('#loop_name').val();
				var loop_lateral = $('#loop_lateral').val();
				var loop_ap = $('#loop_ap').val();
                var distal_part_relative_loop = $('#distal_part_relative_loop').val();

                //var COVERT = determineSMIC(demarcation, size, location, morphology, paris);


                var score = new Object();
                
                $(document).find('.factor').each(function(){

                    var id = $(this).attr('id');
                    console.log(id);
                    var value = $(this).val();
                    console.log(value);

                   score[id] = value;

                })

                            

                    console.log(score);
                    console.log(JSON.stringify(score));

                    //copy to  clipboard

                    copyToClipboard(JSON.stringify(score));
                    return score;
            
        }
        

        function refreshNavAndTags(){

            var screenTop = $(document).scrollTop();

            //console.log(top);

            var tags = [];

                $('.tag').each(function(){

                    if ($(this).is(":checked")){
                        tags.push($(this).attr('data'));
                    }


                })

                

                //push how many loaded, use loaded variable

                console.dir(tags);

                /*var key = $(this).attr('data');

				const dataToSend = {

					key: key,

				}*/var dataToSend = {

                    tags: tags,
                    requiredTagCategories: requiredTagCategories,
                    active: activeStatus,

                    }

                    //const jsonString2 = JSON.stringify(dataToSend);

				const jsonString = JSON.stringify(dataToSend);
				////console.log(jsonString);
				//console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

				var request2 = $.ajax({
					beforeSend: function () {

                        $('#videoCards').html("<div class=\"d-flex align-items-center\"><strong>Loading...</strong><div class=\"spinner-border ml-auto\" role=\"status\" aria-hidden=\"true\"></div></div>");
                        //for each tags array push the badges to the tags shown area
                        var html = '';
                        $.each(tags, function(k,v){

                            //HERE WE HAVE THE TAGID
                            
                            var tagid = v;

                            //get the name and category

                            var tagName = $('body').find('#navigationZone').find('#tag'+v).siblings().text();

                            var tagCategory = $('body').find('#navigationZone').find('#tag'+v).parent().parent().parent().parent().find('span').text();

                            html += '<span class="badge bg-gieqsGold text-dark mx-2 my-2 tagButton" data="'+v+'">'+tagCategory+ ' / ' +tagName+' <i style="float:right;" class="fas fa-times removeTag cursor-pointer ml-1" data="'+v+'"></i></span>';

                        });
                        $('body').find('#navigationZone').find('#shown-tags').html(html);

					},
					url: siteRoot + "/pages/learning/scripts/getNavv2.php",
					type: "POST",
					contentType: "application/json",
					data: jsonString,
				});



				request2.done(function (data) {
                    // alert( "success" );
                    if (data != '[]'){
                        var toKeep = $.parseJSON(data.trim());
                        //alert(data.trim());
                        console.dir(toKeep);
                        
                             
                            $('.tag').each(function(){

                                var tagid = $(this).attr('data');

                                if (toKeep.indexOf(tagid) > -1){

                                    $(this).attr('disabled', false);

                                }else{

                                    $(this).attr('disabled', true);
                                }

                            })    

                      
                    }
					//$(document).find('.Thursday').hide();
                })
                
                request2.then(function (data) {
                    var tags = [];

                    $('.tag').each(function(){

                        if ($(this).is(":checked")){
                            tags.push($(this).attr('data'));
                        }


                    })

                    //TODO ADD ABILITY TO PASS A PARAMETER HERE INDICATING NUMBER LOADED
                    //THEN MODIFY LAYOUT AND NUMBER LOADED

                    console.dir(tags);

                    var dataToSend = {

                        tags: tags,
                        loaded: loaded,
                        loadedRequired: loadedRequired,
                        requiredTagCategories: requiredTagCategories,
                        referringUrl: $('#escaped_url').text(), active: activeStatus,


                    }

                    const jsonString2 = JSON.stringify(dataToSend);

                  

                    
                    const jsonString = JSON.stringify(tags);

                    console.dir(jsonString2);


                    var request3 = $.ajax({
					beforeSend: function () {


					},
					url: siteRoot + "/pages/learning/scripts/getVideos.php",
					type: "POST",
					contentType: "application/json",
					data: jsonString2,
                    });
                    request3.done(function (data) {
                    // alert( "success" );
                    if (data){
                        //var toKeep = $.parseJSON(data.trim());
                        //alert(data.trim());
                        //console.dir(toKeep);

                        $('#videoCards').html(data);
                        $('body').find('#itemCount').each(function(){

                            var count = $('body').find('.individualVideo').length;
                            $(this).text(count);


                        })


                        if (firstTime == 1){
                        $('body').on('click', '#loadMore', function () {

                        loadedRequired = loadedRequired + 1;

            
                        refreshNavAndTags();

                        })
                        }

                        

                        if (firstTime > 1 && loadedRequired > 1){

                                var loadedRequiredMultiple = ((loadedRequired-1) * 10)-3;

                                //console.log(loadedRequiredMultiple);

                                //scroll to current level

                            
                                $("body,html").animate(
                                {
                                    scrollTop: $('body').find('.individualVideo:eq('+loadedRequiredMultiple +')').offset().top
                                },
                                2 //speed
                                );
                        }
                       
                        
                        firstTime = firstTime + 1;
                        //$('body').find('.individualVideo:eq('+loadedRequiredMultiple +')').scrollTop(300);
                        
                        
                               

                      
                    }
					//$(document).find('.Thursday').hide();
                })


				})


        }

        $(document).ready(function () {

           

            //refreshNavAndTags();

            $('#refreshNavigation').click(function(){


                firstTime = 1;
                 //the number that are actually loaded
                loaded = 1;

                //the number the user wants
                loadedRequired = 1;
                
                $('.tag').each(function(){

                    if ($(this).is(":checked")){
                        
                        $(this).prop('checked', false);
                    }


                })

                refreshNavAndTags();

            })

            //on load check if any are checked, if so load the videos

            //if none are checked load 10 most recent videos for these categories

            $('.tag').click(function(){

                refreshNavAndTags();

            })

            $('body').on('click', '.removeTag', function(){

                var tagToRemove = $(this).attr('data');
                //remove the check from the tag removed

                $('.tag').each(function(){

                if ($(this).attr("data") == tagToRemove){
                    
                    $(this).prop('checked', false);

                }


                })


                refreshNavAndTags();

            })
            //active behaviour

            $('body').on('change', '#active', function(){

                var active = $(this).children("option:selected").val();
                //remove the check from the tag removed

                activeStatus = active;

                refreshNavAndTags();

            })

            


           
           

         


        })
    </script>
</body>

</html>