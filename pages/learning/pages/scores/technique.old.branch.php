

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
    <title>GIEQs Online Endoscopy Trainer - Scores - Polypectomy Technique Scorer</title>

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


/* #sticky {
position: absolute !important;
top: 0px;
}  */



}

@media (min-width: 1200px) {
        #chapterSelectorDiv{

            
                
                top:-3vh;
            

        }
        #playerContainer{

                margin-top:-20px;

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
        <p class="h1 mt-10">Polypectomy Technique Scorer - Video Assessment Version</p>
      

    </div>
    <div class="d-flex align-items-end container">
        <p class="text-muted pl-4 mt-2">Towards careful, meticulous polypectomy practice</p>

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

       /*  var labels = $('#size, #location, #morphology, #paris').parent().prev();
        var arrayToHide = $('#size, #location, #morphology, #paris').parent();

        $(labels).show();
        $(arrayToHide).show();
        $('#demarcation_imaging').hide(); */


    }

    function demarcatedArea(){

        /* var labels = $('#size, #location, #morphology, #paris').parent().prev();
        var arrayToHide = $('#size, #location, #morphology, #paris').parent();

        $(labels).hide();
        $(arrayToHide).hide();
        $('#demarcation_imaging').show(); */

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


        function calculateDifficultyScore() {

            var site = $('#site').val();
            var size = $('#size').val();
            
            var morphology = $('#morphology').val();
            var access = $('#access').val();
            //var paris = $('#paris').val();

            if ((size == null) || (access == null) || (morphology == null) || (site == null)) {

                return 'Missing Variables - please enter all 4 further characteristics';


            }

            var sizeInt = +size;
            var accessInt = +access;
            var morphologyInt = +morphology;
            var siteInt = +site;

            if (isNaN(sizeInt) || isNaN(accessInt) || isNaN(morphologyInt) || isNaN(siteInt)) {

                return 'Issue with variables supplied, please check they are numbers';

            } else {

                var SMSA_total = sizeInt + accessInt + morphologyInt + siteInt;

                if (SMSA_total < 6){

                    SMSA_group = 1;

                }else if (SMSA_total < 9){

                    SMSA_group = 2;

                }else if (SMSA_total < 13){

                    SMSA_group = 3;

                }else if (SMSA_total > 12 ){

                    SMSA_group = 4;

                }

                return {

                    "size": sizeInt,
                    "access": accessInt,
                    "morphology": morphologyInt,
                    "site": siteInt,
                    "SMSA_total": SMSA_total,
                    "SMSA_group": SMSA_group,


                }
            }



        }

        function calculatePlusDifficultyScore() {

            var non_lifting = $('#non_lifting').val();
            var PANL = $('#PANL').val();
            
            var location_difficult = $('#location_difficult').val();
            var demarcation = $('#demarcation').val();
            //var paris = $('#paris').val();

            if ((non_lifting == null) || (PANL == null) || (location_difficult == null) || (demarcation == null)) {

                return 'Missing Variables - please enter all 4 further characteristics';


            }

            var non_liftingInt = +non_lifting;
            var PANLInt = +PANL;
            var location_difficultInt = +location_difficult;
            var demarcationInt = +demarcation;

            if (isNaN(non_liftingInt) || isNaN(PANLInt) || isNaN(location_difficultInt) || isNaN(demarcationInt)) {

                return 'Issue with variables supplied, please check they are numbers';

            } else {

                var SMSA_plus_total = non_liftingInt + PANLInt + location_difficultInt + demarcationInt;

                

                return {

                    "non_lifting": non_liftingInt,
                    "PANL": PANLInt,
                    "location_difficult": location_difficultInt,
                    "demarcation": demarcationInt,
                    "SMSA_plus_total": SMSA_plus_total,
                    


                }
            }


        }

        function calculateScore() {


            var scores = new Object;

            $(".score:not(:disabled)").each(function(){

               var name = $(this).attr('id');

                scores[name] = $(this).val();

                
            })

            console.dir(scores);


            /* $(scores).each(function(k,v){

                if (k == null){

                    return;
                }


            }) */

            var score_total = 0;

            var iterator = 0;

            var numberFilled = 0;

            $.each(scores, function(k,v){

                console.log(k + 'is k');
                console.log(v+ 'is v');

                if (v == null){

                    iterator = iterator + 1;
                return true;

                }

                var vInt = null;
                var vInt = +v;

                score_total = score_total + vInt;
                iterator = iterator + 1;


                numberFilled = numberFilled + 1;


            })

            return {

            
            "score_total": score_total,
            "score_denominator": numberFilled * 5,
            "elements": scores,


            }





        }

        function hideHotSnareFields(){

            $('.hot').each(function(){
                
                var label = null;
                var label = $(this).parent().prev();
                $(this).attr('disabled', true);
                $(this).parent().hide();
                $(label).hide().attr('disabled', true);

                //if section length = 0 hide heading


            })

            headingsHider();

             /* var labels = $('#size, #location, #morphology, #paris').parent().prev();
        var arrayToHide = $('#size, #location, #morphology, #paris').parent();

        $(labels).hide();
        $(arrayToHide).hide();
        $('#demarcation_imaging').show(); */

        /* $('#size, #location, #morphology, #paris').parent().hide(); */

        }

        function fullScoreUpdate(){

            var SMSA = calculateDifficultyScore();
            //remove the check from the tag removed

            if (isNaN(SMSA.SMSA_total) === false){

                $('#SMSA_total').text(SMSA.SMSA_total);
                $('#SMSA_group').text(SMSA.SMSA_group);

            };

            var SMSAplus = calculatePlusDifficultyScore();
            //remove the check from the tag removed

            if (isNaN(SMSAplus.SMSA_plus_total) === false){

                $('#numeratorSMSAplus').text(SMSAplus.SMSA_plus_total);
                $('#denominatorSMSAplus').text(4);

            };

            var score = calculateScore();
            //remove the check from the tag removed

            if (isNaN(score.score_total) === false){

            $('#numeratorSum').text(score.score_total);
            $('#denominatorSum').text(score.score_denominator);

            };




        }

        function showHotSnareFields(){


            $('.hot').each(function(){
                
                var label = null;
                var label = $(this).parent().prev();
                $(this).attr('disabled', false);
                $(this).parent().show();
                $(label).show().attr('disabled', false);

                //if section length = 0 hide heading


            })

            headingsHider();

        }

        function headingsHider(){


            $('.divider').each(function(){

                if ($(this).find('select:not(:disabled)').length == 0){

                    $(this).hide();
                }else{

                    $(this).show();
                }


            })


        }

        function copyFormClipboard(){

            var score = calculateScore();
				var difficulty = calculateDifficultyScore();
				var difficulty_plus = calculatePlusDifficultyScore();
                var type_polypectomy = $('#type_polypectomy').val();
				

                var overall_score = {

                    "type_polypectomy" : type_polypectomy,
                "score": score,
                
                "difficulty": difficulty,
                "difficulty_plus": difficulty_plus,


                }

                copyToClipboard(JSON.stringify(overall_score));

                //alert('Data copied to clipboard');

                $('#success').text('Data Copied to Clipboard.');
                    //$('div.error span').addClass('form-text text-danger');
                    //$('#errorWrapper').show();

                    $("#successWrapper").fadeTo(4000, 500).slideUp(500, function () {
                        $("#successWrapper").slideUp(500);
                    });

                return overall_score;

        }


	
		$(document).ready(function() {

            //difficulty score

            //standard score

           // demarcatedArea();

			/* $('.content').on('click', '#calculate', function(){

				var score = calculateScore();
				var difficulty = calculateDifficultyScore();
				var difficulty_plus = calculatePlusDifficultyScore();
				

                var overall_score = {

            
                "score": score,
                "difficulty": difficulty,
                "difficulty_plus": difficulty_plus,


                }

                copyToClipboard(JSON.stringify(overall_score));

                alert('Data copied to clipboard');

                return overall_score;

				

		}) */

    })
	
	</script>
	

</head>

<body>

	
	
    <div class='content'>
        <div class="row">
          


    <div id="right" class="col-lg-3 col-xl-3 border-right">
<!--         	<div class="h-100 p-4"> -->
        		<div id="sticky" data-toggle="sticky"  class="is_stuck pr-3 mr-3 pl-2 pt-2"
        			>
        			<div id="messageBox" class='text-left text-white pb-2 pl-2 pt-2'></div>
						<div
                                                class="d-flex flex-nowrap text-small text-muted text-right px-3 mt-1 mb-3 ">
                                                
                                                
                                               <!--  <div>
                                                    <i class="fas fa-scroll cursor-pointer mr-4" data-toggle="modal" data-target="#modal-POEM-ENG" id="showPOEMReport"></i>
                                                </div>
                                                <div>
                                                    <i id="hideNotRequired" onclick="hideNotRequired();" class="mr-4 fas fa-search-minus cursor-pointer"></i>
											  </div>
											  <div>
												<i id="saveesdLesion" class="fas fa-save cursor-pointer mr-4" onclick="saveesdLesionForm();"></i>
											</div>-->
                                                <div>
                                                <i id='reset-form' class="fas fa-undo cursor-pointer mr-4" title='Reset Form' data-toggle='tooltip' data-placement='right' >&nbsp;Reset Form</i>
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
              <h6 class="mt-3 mb-3 pl-2 h5">Navigation</h6>
              
              <ul class="section-nav">
              
                <!-- <li class="toc-entry toc-h2"><a href="#examples">Sections</a> -->
                  <!-- <ul> -->
                  <?php

echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#hot-or-cold">Type - Hot/Cold</a></li>';

                        echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#global">Global</a></li>';
                        echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#injection">Injection Technique</a></li>';
                        echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#snare">Snare Placement Technique</a></li>';
                        echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#safety">Safety Checks prior to Resection</a></li>';
                        echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#defect">Defect Assessment</a></li>';

                        echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#accessory">Accessory Techniques</a></li>';
                        echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#difficulty">Difficulty Scores</a></li>';
                        

                        //echo "<button type=\"button\" class=\"btn ".$sectionTitle[$x]. "\">".$sectionTitle[$x]."</button>";

                    

                            ?>
                             <!-- </ul> -->
                <!-- </li> -->
                </ul>
             

                <div class="d-none d-sm-inline-block align-items-center mt-4">
                    <div class="card p-3 py-3 pr-6">

                    <p class="h5">Scores</p>
				<P style="text-align:left;" class="strong h6">Overall: <span id="numeratorSum"></span>&nbsp;/&nbsp;<span id="denominatorSum"></span></P>

				<p style="text-align:left; mt-3" class="strong h6">SMSA: <span id="SMSA_total"></span></p>

                <p style="text-align:left;" class="strong h6">SMSA Group : <span id="SMSA_group"></span></p>

                <p style="text-align:left;" class="strong h6">SMSA+: <span id="numeratorSMSAplus"></span>&nbsp;/&nbsp;<span id="denominatorSMSAplus"></span></p>


</div>

<p><button id='calculate' type="button" class="btn btn-sm text-white btn-dark" name="calculate">Calculate and Copy Result to Clipboard</button></p>


                
                <!-- <p>Polypectomy Score </p>
                <p>Complexity Score </p>
                <p>Overall Score </p> -->

                </div>
            
            </div> <!--close sticky nav-->  
                                
            
        <!-- </div> --> <!--close right h-100 div-->
        </div> <!--close right column div-->

        <div class="col-lg-9">
        

            <?php
            
            //$requiredValues = array("Location","Morphology","Paris");
            
            //$values = array();
            //$values = $lesion->GetValuesSpecific($requiredValues);
            
            //print_r($values);
            
            ?>
            
                   
                            <!-- <p><h3><b>Risk for Submucosal Invasion within a given LSL </h3>[algorithm ala Burgess 2018 Gastroenterology]</b></p>
             -->
            
             
                            <p><button id="show-info" class="btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Show info
              </button></p>
              <div class="collapse" id="collapseExample">
            
                            <div class="card card-body">
            
                            <p class="h5">Pre-requisites:</p>
                            <p><ul>Colon Polyp  &ge; 10mm in size</ul><ul>Cold or Hot Snare</ul></p>
            
                            <p>This tool asks for your subjective assessment of multiple domains of deconstructed polypectomy where 1 is poor and 5 very good</p>
                            <p>Fill hot or cold first since different questions are asked for each.  <br/>The difficulty score consists of SMSA questions (4).  <br/>The difficulty+ score consists of SMSA+ questions (4) and applies only to hot snare.</p>
                            <p>Once completed press copy and a machine readable version will be copied to the clipboard.</p>

                            <p><a href="https://vimeo.com/562536661" data-fancybox="" data-toggle="tooltip"
                                data-placement="bottom" title=""
                                class=""
                                data-original-title="Watch Explainer Video">
                                
                                Watch Introductory Video&nbsp;<i class="fas fa-play gieqsGold"></i>
                            
                            </a></p>
            
            
                            <p>Hover over questions for more information</p>
            
                            <p><i class="fas fa-play gieqsGold "></i> indicates availability of a video demonstration for that statement.  click to view.</p>
            
            
                            </div>
            </div>
            
                    <br>
                    <div id='result' class='yellow'></div>
                    <br>
                    
                    <form id="polypectomy-form" action="adminGenerateUserEmail.php" method="post">
                        <fieldset>
            
                        <h2 id="hot-or-cold" class="mt-1">Hot / Cold Snare Polypectomy?</h2>
                            <?php
            
                            
            
                            $formv1->generateSelectCustomCancel ('Type of Polypectomy', 'type_polypectomy', 'branch_point', array('1' => 'Hot Snare - using diathermy', '2' => 'Cold Snare - without diathermy',), 'Select the Type of Polypectomy, cold without diathermy, hot with diathermy');
                            echo '<br/>';

                            

            
                            ?>
                            
                        </fieldset>
                            <fieldset class="divider">
            
                            <h2 id="global" class="mt-4">Global Competencies</h2>
            
                            <?php
                            $formv1->generateSelectCustomCancel ('Tip control:', 'tip_control', 'score', array('1' => '1 - Very Poor - Uncontrolled, shaky and undirected', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - Controlled, stable and purposeful'), 'How good is the tip control demonstrated throughout the video?');
                            echo '<br/>';

                            $formv1->generateSelectCustomCancel ('Fully appreciates / demonstrates extent of the polyp to be resected:', 'extent', 'score', array('1' => '1 - Very Poor - Focusses on one area, does not demonstrate appreciation of polyp margins', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - Clearly appreciates entire extent of polyp and approach and resection reflect this'), '');
                            echo '<br/>';
            
                            $formv1->generateSelectCustomCancel ('Positioning with respect to the polyp:', 'positioning', 'score', array('1' => '1 - Very Poor - Not at 6 \'o clock, far from the colonoscope, fluid covering lesion (poor use of gravity)', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - Lesion at or near 6 \'o clock, close to the colonoscope, fluid away from lesion (good use of gravity)'), 'How good is the position achieved by the endoscopist with respect to accessing the polyp?');
                            echo '<br/>';

                            $formv1->generateSelectCustomCancel ('Technique selected is appropriate for the polyp resected?', 'appropriate_technique', 'score', array('1' => '1 - Very Poor - No clear need for en-bloc if selected, lesion unsuitable for cold snare, hot snare for polyp smaller than 10mm', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - En-bloc versus piecemeal, hot versus cold appropriate for the polyp'), 'In terms of en-bloc versus piecemeal, hot versus cold');
                            echo '<br/>';
            
                            
            
                            ?>
                            </fieldset>
            
                            <fieldset class="divider">
                            
                            <h2 id="injection" class="mt-4">Injection Technique</h2>
            
                            <?php
            
                            $formv1->generateSelectCustomCancel ('Injection is performed in the correct plane:', 'injection_plane', 'score', array('1' => '1 - Very Poor - Injection infrequently results in sustained submucosal lifting (transmural / intramucosal injection)', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - injection rapidly results inn sustained mucosal lifting (needle in submucosa)'), 'Does the endoscopist quickly find the correct plane when injectiing or is there repeated injection too superficial or deep?', '561527824');
                            echo '<br/>';
            
                            $formv1->generateSelectCustomCancel ('Injection is performed dynamically:', 'injection_dynamic', 'score', array('1' => '1 - Very Poor - once the needle is situated in the submucosa there is no movement of the needle away from the muscularis', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - once the needle is in the submucosa there is graduated movement of the needle away from the muscularis'), 'Once the correct plane has been found does the endoscopist move the needle while injecting to adequately raise the lesion?', '561527824');
                            echo '<br/>';
            
            
                            $formv1->generateSelectCustomCancel ('Injection is used to improve lesion access:', 'injection_access', 'score', array('1' => '1 - Very Poor - dynamic injection is either not used, or does not facilitate access', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - dynamic injection is used to facilitate access'), 'Injection is used to improve lesion access', '561527824');
                            echo '<br/>';
            
            
            
            
            
                            ?>
                            </fieldset>
                            
                            <fieldset class="divider">
            
                            <h2 id="snare" class="mt-4">Snare Placement Technique</h2>
            
                            <?php

                            $formv1->generateSelectCustomCancel ('Appropriate Snare Size Selected:', 'snare_size', 'score', array('1' => '1 - Very Poor - snare clearly too large / small and of incorrect type (thin wire vs thick wire) for polyp', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - snare appropriate size and type for the polyp'), '', '');
                            echo '<br/>';
            
                            $formv1->generateSelectCustomCancel ('Stable positon with lesion at 6 \'o clock OR transformed to 6 \'o clock:', 'snare_position', 'score', array('1' => '1 - Very Poor - snare position is not consistently maintained at 6 \'o clock resulting in poor snare capture', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - snare position is consistently maintained at 6 \'o clock'), '', '561526772');
                            echo '<br/>';
            
                            $formv1->generateSelectCustomCancel ('Snare precisely visualised during placement and closure (V of the snare):', 'snare_visualised', 'score', array('1' => '1 - Very Poor - snare V at intersection with snare catheter not visualised during closure and far from the colonoscope', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - snare V visualised consistently during closure and near to the colonoscope'), '', '561525603');
                            echo '<br/>';
            
                            $formv1->generateSelectCustomCancel ('Residual tissue islands avoided if piecemeal resection OR Macroscopically complete if en-bloc resection attempted:', 'residual', 'score', array('1' => '1 - Very Poor - snare placement does not include normal margin (at edge) and does not use transected tissue edge (within lesion) as a guide', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - snare placement includes > 1mm normal margin (at edge) of tissue and uses transected tissue edge as a guide (within defect)'), '');
                            echo '<br/>';
            
                
            
            
            
                            ?>
                            </fieldset>
                            
                            <fieldset class="divider">
            
                            <h2 id="safety" class="mt-4">Safety Checks Prior to Resection (HOT snare only)</h2>
            
                            <?php
            
            
            /* $formv1->generateSelectCustomCancel ('Takes the snare and closes to 1cm, uses tactile feedback OR assistant closes snare to mark:', 'snare_closed', 'score hot', array('1' => '1 - Very Poor - does not take snare and close to 1cm after taking from assistant (or ask assistant to close to mark)', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - takes snare and closes to 1cm after taking from assistant (or asks assistant to close to mark)'), '');
            echo '<br/>';   not asessable on video */
            
            $formv1->generateSelectCustomCancel ('Moves the closed snare to confirm independent movement from deeper structures:', 'independent_movement', 'score hot', array('1' => '1 - Very Poor - does not check tissue mobility prior to transection with respeect to deeper structures', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - checks mobility prior to transection with respect to deeper structures'), '', '561529195');
            echo '<br/>';

            $formv1->generateSelectCustomCancel ('Lifts the snare away from the muscularis propria prior to application of diathermy:', 'lift_movement', 'score hot', array('1' => '1 - Very Poor - does not lift the snare prior to applying diathermy', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - lifts the snare away from the muscularis prior to the application of diathermy'), '', '');
            echo '<br/>';
            
            
            ?>
                            </fieldset>
            
            <fieldset class="divider">
            
            <h2 id="defect" class="mt-4">Defect Assessment After Resection</h2>
            
                            <?php
            
            $formv1->generateSelectCustomCancel ('MUCOSA - Looks for, detects and removes residual at margin and within defect:', 'mucosa', 'score', array('1' => '1 - Very Poor - does not ostensibly and systematically check for residual adenomatous tissue at margin or within defect', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - ostensibly and systematically checks for residual adenomatous tissue within defect and at margin'), 'Including residual muscularis mucosae');
            echo '<br/>';
            
            $formv1->generateSelectCustomCancel ('Thermal ablation of the POST EMR Margin:', 'thermal_ablation', 'score hot', array('1' => '1 - Very Poor - unsteady, areas of incomplete ablation, messy result', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - steady, systematic application, complete ablation of the entire margin achieved'), '');
            echo '<br/>';

            
            $formv1->generateSelectCustomCancel ('SUBMUCOSA - Looks for, detects and treats any bleeding vessels within the defect::', 'submucosa', 'score hot', array('1' => '1 - Very Poor - neither detects nor treats bleeding vessels in submucosa. treats benign submucosal appearances', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - detects and treats bleeding vessels in submucosa.  does not treat other submucosal appearances including herniating vessels.'), 'Does not treat non-bleeding herniating vessels. Does not treat other appearances of the submucosa detailed in Desomer et al. 2018 GIE', '561531789');
            echo '<br/>';
            
            $formv1->generateSelectCustomCancel ('MUSCULARIS - Looks for, detects and treats Deep Mural Injury &ge; 2 (Sydney Classification) :', 'muscularis', 'score hot', array('1' => '1 - Very Poor - misses signs of deep mural injury (types II-V) which require clip placement', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - detects and treats types II-V deep mural injury or confirms they are not present'), '', '561531084');
            echo '<br/>';
            
            
            
            
            ?>
                            </fieldset>
            
            <fieldset class="divider">
            
            <h2 id="accessory" class="mt-4">Accessory Techniques in Polypectomy</h2>
            
                            <?php
            
            $formv1->generateSelectCustomCancel ('Placement of Through the Scope CLIPS:', 'clip_placement', 'score hot', array('1' => '1 - Very Poor - poor tissue capture, poor use of suction and positioning to maximise orientation and amount of tissue capture', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - good use of suction, positioning and rotation to capture required tissue'), '');
            echo '<br/>';
            
            
            $formv1->generateSelectCustomCancel ('Use of Polyp Retrieval Device:', 'retrieval_device', 'score hot', array('1' => '1 - Very Poor - poor positioning, does not capture all pieces, does not use sequential place and retrieve', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - 6 \'o clock position, sequential place and retrieve, captures all pieces'), '', '561522933');
            echo '<br/>';
            
            
            $formv1->generateSelectCustomCancel ('Use of Coagulation grasper', 'coag_grasper', 'score hot', array('1' => '1 - Very Poor', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - uses water to identify vessel, confirms correct placement with cessation of bleeding, tents away to apply diathermy'), '');
            echo '<br/>';
            
            
            ?>
                            </fieldset>
            <fieldset class="divider">
            
            
            <h2 id="difficulty" class="mt-4">Difficulty Score (SMSA - EMR, SMSA +)
            </h2>
            
                            <?php
            
            
            $formv1->generateSelectCustomCancel ('Size:', 'size', 'SMSA', array('1' => '< 1cm', '3' => '1 - 1.9cm', '5' => '2 - 2.9cm', '7' => '3 - 3.9cm', '9' => '> 4cm'), '');
            echo '<br/>';
            
            $formv1->generateSelectCustomCancel ('Morphology:', 'morphology', 'SMSA', array('1' => 'Pedunculated', '2' => 'Sessile', '3' => 'Flat',), '');
            echo '<br/>';
            
            $formv1->generateSelectCustomCancel ('Site:', 'site', 'SMSA', array('1' => 'Left', '2' => 'Right',), '');
            echo '<br/>';
                        
            
            $formv1->generateSelectCustomCancel ('Access:', 'access', 'SMSA', array('1' => 'Easy', '3' => 'Difficult',), '');
            echo '<br/>';
            
            $formv1->generateSelectCustomCancel ('Non-lifting:', 'non_lifting', 'SMSAplus hot', array('0' => 'No', '1' => 'Yes', ), '');
            echo '<br/>';
                           
            $formv1->generateSelectCustomCancel ('Previous attempt:', 'PANL', 'SMSAplus hot', array('0' => 'No', '1' => 'Yes', ), '');
            echo '<br/>';
            
                           
            $formv1->generateSelectCustomCancel ('Direct ileocaecal valve, diverticular or appendiceal involvement:', 'location_difficult', 'SMSAplus hot', array('0' => 'No', '1' => 'Yes', ), '');
            echo '<br/>';
            
            
            $formv1->generateSelectCustomCancel ('Lesions with a regular-irregular demarcation zone:', 'demarcation', 'SMSAplus hot', array('0' => 'No', '1' => 'Yes', ), '');
            echo '<br/>';
            
            
            
            
            ?>
            </fieldset>
            
                            
                            
                        
                                                   
                            
            
                            
            
                            <!--conversion to newlines $(this).val().replace(/\r\n|\r|\n/g,"<br />")-->
            
                            <p></p>
                       
                    </form>
            
                    <p class="h5 mt-5">Definitions:</p>
                    <ul>
                    <li>Hot Snare - colon polyp removed using a snare with use of electrosurgical energy</li>
                    <li>Diathermy - electrosurgical energy</li>
                    <li>Cold Snare - colon polyp removed using a snare without electrosurgical energy</li>
                    
            
            
                    </ul>
                    
                    <P class="h5">References:</P>
                    <P>Original SMSA Score -- Gupta S, Miskovic D, Bhandari P, Dolwani S, McKaig B, Pullan R, Rembacken B, Riley S, Rutter MD, Suzuki N, Tsiamoulos Z, Valori R, Vance ME, Faiz OD, Saunders BP, Thomas-Gibson S. A novel method for determining the difficulty of colonoscopic polypectomy. Frontline Gastroenterol. 2013 Oct;4(4):244-248. doi: 10.1136/flgastro-2013-100331. Epub 2013 Jun 1. PMID: 28839733; PMCID: PMC5369843. </P>
            
                    <P>SMSA in Larger &ge; 20mm LNPCPs  -- Sidhu M, Tate DJ, Desomer L, Brown G, Hourigan LF, Lee EYT, Moss A, Raftopoulos S, Singh R, Williams SJ, Zanati S, Burgess N, Bourke MJ. The size, morphology, site, and access score predicts critical outcomes of endoscopic mucosal resection in the colon. Endoscopy. 2018 Jul;50(7):684-692. doi: 10.1055/s-0043-124081. Epub 2018 Jan 25. Erratum in: Endoscopy. 2018 Jul;50(7):C7. PMID: 29370584. </P>
                    <P>SMSA+ score -- Anderson J, Lockett M. Training in therapeutic endoscopy: meeting present and future challenges. Frontline Gastroenterol. 2019;10(2):135-140. doi:10.1136/flgastro-2018-101086</P>
               
            
                    <P>SMSA-EMR score -- <a href="https://www.giejournal.org/article/S0016-5107(18)32295-8/pdf">SMSA-EMR SCORE IS A NOVEL ENDOSCOPIC RISK ASSESSMENT TOOL FOR PREDICTING CRITICAL
            ENDOSCOPIC MUCOSAL RESECTION OUTCOMES</a> - Volume 87, No. 6S : 2018 GASTROINTESTINAL ENDOSCOPY AB467 </P>

            <p>Deep Mural Injury Score -- <a href="https://pubmed.ncbi.nlm.nih.gov/27464708/">Burgess NG, Bassan MS, McLeod D, Williams SJ, Byth K, Bourke MJ. Deep mural injury and perforation after colonic endoscopic mucosal resection: a new classification and analysis of risk factors. Gut. 2017 Oct;66(10):1779-1789. doi: 10.1136/gutjnl-2015-309848. Epub 2016 Jul 27. PMID: 27464708.</a></p>
                    <P>Score Adapted for GIEQs.com by David Tate:</P>
            
                         
                    <P>Unauthorised distribution of the code prohibited.  Copyright 2021 by the GIEQs Foundation.  All rights reserved </P>
                
                
                </div> <!--end col-9-->


    </div> <!--end row-->
    
    </div><!--end content-->

            
    </div> <!--end content-->



   
   
    

       
    </div> <!--end overall-->



    
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
    <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>


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

        function generateScore(){

            var demarcation = $('#demarcation').val();
				var size = $('#size').val();
				var location = $('#location').val();
				var morphology = $('#morphology').val();
				var paris = $('#paris').val();

                var COVERT = determineSMIC(demarcation, size, location, morphology, paris);




                            var score =  {
                    "demarcation": demarcation,
                    "size": size,
                    "location": location,
                    "morphology": morphology,
                    "paris": paris,
                    "risk": COVERT.risk,
                    "odds": COVERT.odds,
                    "text": COVERT.risk_text,
                    };

                    console.log(score);
                    console.log(JSON.stringify(score));

                    //copy to  clipboard

                    copyToClipboard(JSON.stringify(score));
            
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

            $('body').on('change', '.SMSA', function(){

            var SMSA = calculateDifficultyScore();
            //remove the check from the tag removed

            if (isNaN(SMSA.SMSA_total) === false){

                $('#SMSA_total').text(SMSA.SMSA_total);
                $('#SMSA_group').text(SMSA.SMSA_group);

            };

            

            })

            $('body').on('change', '.SMSAplus', function(){

                

                //alert('hello');
            var SMSAplus = calculatePlusDifficultyScore();
            //remove the check from the tag removed

            if (isNaN(SMSAplus.SMSA_plus_total) === false){

                $('#numeratorSMSAplus').text(SMSAplus.SMSA_plus_total);
                $('#denominatorSMSAplus').text(4);

            };



            })

            $('body').on('change', '.score', function(){

                            

            //alert('hello');
            var score = calculateScore();
            //remove the check from the tag removed

            if (isNaN(score.score_total) === false){

            $('#numeratorSum').text(score.score_total);
            $('#denominatorSum').text(score.score_denominator);

            };



            })

$('body').on('change', '#type_polypectomy', function(){

                    
    //hide the cold snare
    //alert('change');

   if ($(this).val() == 1){

    showHotSnareFields();

   }else if ($(this).val() == 2){

    hideHotSnareFields();

   }

   fullScoreUpdate();



})


$('body').on('click', '#reset-form', function(){

                    
//hide the cold snare
//alert('change');

location.reload();



})

$('body').on('click', '.cancel', function(event){

                    
//hide the cold snare
//alert('change');

event.preventDefault();

$(this).parent().find('select').val('please select');
fullScoreUpdate();


})

$('body').on('click', '#show-info', function(event){

                    
//hide the cold snare
//alert('change');

event.preventDefault();

$('#collapseExample').collapse('toggle');
//fullScoreUpdate();


})

$(document).on('click', '#calculate', function(event) {

event.preventDefault();
$('#polypectomy-form').submit();

})

$("#polypectomy-form").validate({

            invalidHandler: function (event, validator) {
                var errors = validator.numberOfInvalids();
                console.log("there were " + errors + " errors");
                if (errors) {
                    var message = errors == 1 ?
                        "1 field has been missed. It has been highlighted.\n Score not copied to clipboard." :
                        +errors + " fields have been missed. They have been highlighted.  Score not copied to clipboard.";


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
                type_polypectomy: {
                    required: true,

                },



                tip_control: {
                    required: true,

                },

                extent: {
                    required: true,

                },

                positioning: {
                    required: true,

                },

                appropriate_technique: {
                    required: true,

                },


                injection_plane: {

                    required: function (element) {
                        return $("#type_polypectomy").val() == "1";

                    }

                },

                injection_dynamic: {

                    required: function (element) {
                        return $("#type_polypectomy").val() == "1";

                    }

                },

                injection_access: {

                    required: function (element) {
                        return $("#type_polypectomy").val() == "1";

                    }

                },


                snare_size: {

                    required: true,

                },
                
                snare_position: {

                    required: true,

                },
                snare_visualised: {

                    required: true
                },

                residual: {

                    required: true,

                },
                independent_movement: {

                    required: function (element) {
                        return $("#type_polypectomy").val() == "1";

                    }
                },
                
                lift_movement: {

                    required: function (element) {
                        return $("#type_polypectomy").val() == "1";

                    }
                },

                snare_closed: {

                    required: function (element) {
                        return $("#type_polypectomy").val() == "1";

                    }
                },
                mucosa: {

                    required: true
                },
                submucosa: {

                    required: function (element) {
                        return $("#type_polypectomy").val() == "1";

                    }
                },
                muscularis: {

                    required: function (element) {
                        return $("#type_polypectomy").val() == "1";

                    }
                },
                size: {

                    required: true
                },
                morphology: {

                    required: true
                },
                site: {

                    required: true
                },
                access: {

                    required: true
                },

                non_lifting: {

                    required: function (element) {
                        return $("#type_polypectomy").val() == "1";

                    }
},
PANL: {

    required: function (element) {
                        return $("#type_polypectomy").val() == "1";

                    }
},
location_difficult: {

    required: function (element) {
                        return $("#type_polypectomy").val() == "1";

                    }
},
demarcation: {
    required: function (element) {
                        return $("#type_polypectomy").val() == "1";

                    }
},




},
messages: {

    type_polypectomy : {

        required: 'You must enter whether the polypectomy was performed hot or cold.  This will alter the available fields below.',

    }, 


},
submitHandler: function(form) {


    copyFormClipboard();
//console.log("submitted form");



}

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


           
           

         


        })
    </script>
</body>

</html>