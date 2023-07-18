
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<?php require '../../includes/config.inc.php';?>


<head>

<!--

Readme

All fields required for hot snare

Limited required for cold snare

SMSA always required

SMSA plus determined upon whether hot or cold
if hot, =/4
if cold, =/2









-->

    <?php

//error_reporting(E_ALL);


      //define user access level

      $openaccess = 1;
      //$requiredUserLevel = 6;


      require BASE_URI . '/head.php';

      $general = new general;

      $navigator = new navigator;

      $formv1 = new formGenerator;

      require_once(BASE_URI . '/assets/scripts/classes/gpat_score.class.php'); 
      $gpat_score = new gpat_score();

      require_once(BASE_URI . '/assets/scripts/classes/gpat_glue.class.php'); 
      $gpat_glue = new gpat_glue();

      ?>

    <!--Page title-->
    <meta charset="utf-8">
 <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Global Online Endoscopy Trainer - Scores - Global Polypectomy Assessment Tool</title>
    <meta name="description"
        content="The first global training score for colorectal polypectomy.">
    <meta name="author" content="David Tate">
    <meta name="keywords" content="colonoscopy, gastroscopy, ERCP, quality, polyp, colon cancer, polypectomy, EMR, endoscopic imaging, colorectal cancer, endoscopy, gieqs, GIEQS, training, digital endoscopy event, digital symposium, ghent, gent, endoscopy quality, quality in endoscopy, training, polyp assessment, polypectomy, certification, credentialling, credentialling in polypectomy">
 


    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/flatpickr/dist/flatpickr.min.css">

    <style>
    
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

    $debug = false;

    if ($debug){

        echo 'here';
    }

		/* if (isset($_GET["id"]) && is_numeric($_GET["id"])){
			
            $id = $_GET["id"];

            if ($debug){

                echo 'id is ' . $id;
            }

            error_reporting(E_ALL);
            $_SESSION['debug'] = true;

            //check this id belongs to the logged in user unless it is a superuser

            if ($isSuperuser != 1){

                if ($debug){

                    echo 'superuser is not equal to 1';
                    echo 'userid is ' . $userid;
                }

                 if (!$gpat_glue->checkUserOwnsGPAT($userid, $id, $debug)){

                    echo '<div class="container main-content mt-8 bg-gradient-dark">';
                    echo 'This GPAT does not belong to the logged in user.  Return to your Logbook <a href="' . BASE_URL . '/pages/learning/pages/scores/logbook-gpat.php">here</a>';
                    echo '</div>';
                    die();

                 }else{


                 }

            }


		
		}else{
		
			$id = null;
		
		} */

        $id=null;
				    
                        
                        
		
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

    <?php

    include(BASE_URI . '/pages/learning/assets/gpatNav.php');

    ?>

    <div class="main-content bg-gradient-dark">

        <!--Header CHANGEME-->

        <div class="d-flex align-items-end container">
            <p class="h1 mt-5 mr-auto">Polypectomy Report Card (GPAT)</p>
            <p class="h3 gieqsGold complete"></p>
            


        </div>
        <div class="d-flex align-items-end container">
            <p class="text-muted pl-4 mt-2">Video Assessment Version</p>

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

            function determineCOVERT(location, morphology, paris) {

                if ((location === null) || (morphology === null) || (paris === null)) {

                    COVERT = '-';
                    return COVERT;

                } else {


                    var locationInt = +location;
                    var morphologyInt = +morphology;
                    var parisInt = +paris;


                    if (isNaN(locationInt) || isNaN(morphologyInt) || isNaN(parisInt)) {

                        COVERT = '-';
                        return COVERT;

                    } else {


                        var locationCategory;
                        var morphologyCategory;
                        var parisCategory;

                        //need colon site
                        //need morphology
                        //need paris

                        //convert to the required format

                        //location proximal 9-13 others distal //category 1 distal 2 proximal


                        if (locationInt < 9) {
                            locationCategory = 1;
                        } else {
                            locationCategory = 2;
                        }

                        if (morphologyInt == 1) {

                            morphologyCategory = 1; //granular
                        } else if (morphologyInt == 2) {

                            morphologyCategory = 2; // non-granular

                        } else if (morphologyInt > 2) { //can't calculate the score as serrated and mixed not supported

                            COVERT = '-';
                            return COVERT;

                        }


                        if (parisInt == 2) {

                            parisCategory = 1; // 0-IIa

                        } else if (parisInt == 6) {

                            parisCategory = 2; // 0-IIa/Is

                        } else if (parisInt == 1) {

                            parisCategory = 3; //0-Is

                        } else { // unsupported Paris class

                            COVERT = '-';
                            return COVERT;
                        }


                        //now have categorical variables available only if they are correct type for this score	

                        if (locationCategory == 2 && morphologyCategory == 1 && parisCategory == 1) {

                            COVERT = '0.7%';
                        } else if (locationCategory == 1 && morphologyCategory == 1 && parisCategory == 1) {

                            COVERT = '1.2%';
                        } else if (locationCategory == 2 && morphologyCategory == 1 && parisCategory == 2) {

                            COVERT = '4.2%';
                        } else if (locationCategory == 1 && morphologyCategory == 1 && parisCategory == 2) {

                            COVERT = '10.1%';
                        } else if (locationCategory == 2 && morphologyCategory == 1 && parisCategory == 3) {

                            COVERT = '2.3%';
                        } else if (locationCategory == 1 && morphologyCategory == 1 && parisCategory == 3) {

                            COVERT = '5.7%';
                        } else if (locationCategory == 2 && morphologyCategory == 2 && parisCategory == 1) {

                            COVERT = '3.8%';
                        } else if (locationCategory == 1 && morphologyCategory == 2 && parisCategory == 1) {

                            COVERT = '6.4%';
                        } else if (locationCategory == 2 && morphologyCategory == 2 && parisCategory == 2) {

                            COVERT = '12.7%';
                        } else if (locationCategory == 1 && morphologyCategory == 2 && parisCategory == 2) {

                            COVERT = '15.9%';
                        } else if (locationCategory == 2 && morphologyCategory == 2 && parisCategory == 3) {

                            COVERT = '12.3%';
                        } else if (locationCategory == 1 && morphologyCategory == 2 && parisCategory == 3) {

                            COVERT = '21.4%';
                        }

                        return COVERT;

                    }

                }

                //surely there should be a version involving size...


            }

            //hie below if demarcated area = yes

            function noDemarcatedArea() {

                /*  var labels = $('#size, #location, #morphology, #paris').parent().prev();
                 var arrayToHide = $('#size, #location, #morphology, #paris').parent();

                 $(labels).show();
                 $(arrayToHide).show();
                 $('#demarcation_imaging').hide(); */


            }

            function demarcatedArea() {

                /* var labels = $('#size, #location, #morphology, #paris').parent().prev();
                var arrayToHide = $('#size, #location, #morphology, #paris').parent();

                $(labels).hide();
                $(arrayToHide).hide();
                $('#demarcation_imaging').show(); */

                /* $('#size, #location, #morphology, #paris').parent().hide(); */

            }



            function determineSMIC(demarcation, size, location, morphology, paris, debug = true) {

                if ((demarcation == null)) {

                    return 'Was there a demarcated area?';



                } else if ((demarcation == 1)) {

                    return {

                        "risk_text": 'Very High Risk',
                        "risk": 17.6,
                        "odds": 16,


                    }



                } else if ((size == null) || (location == null) || (morphology == null) || (paris == null)) {

                    return 'Missing Variables - please enter all 4 further characteristics';


                } else {

                    //var demarcation = +demarcation;
                    var sizeInt = +size;
                    var locationInt = +location;
                    var morphologyInt = +morphology;
                    var parisInt = +paris;


                    if (isNaN(sizeInt) || isNaN(locationInt) || isNaN(morphologyInt) || isNaN(parisInt)) {

                        return 'Issue with variables supplied, please check they are numbers';

                    } else {

                        var SMICriskOR = 0;
                        var SMICriskactual = 1.1;


                        if (sizeInt == 2) {
                            //>=30mm
                            SMICriskOR = SMICriskOR + 1.12;

                        } else if (sizeInt == 3) {
                            //>=40mm
                            SMICriskOR = SMICriskOR + 2 * (1.12);

                        } else if (sizeInt == 4) {
                            //>=-50mm
                            SMICriskOR = SMICriskOR + 3 * (1.12);

                        } else if (sizeInt == 5) {
                            //>=60mm
                            SMICriskOR = SMICriskOR + 4 * (1.12);

                        } else if (sizeInt == 6) {
                            //>=70mm
                            SMICriskOR = SMICriskOR + 5 * (1.12);

                        } else if (sizeInt == 7) {
                            //>=80mm
                            SMICriskOR = SMICriskOR + 6 * (1.12);

                        } else if (sizeInt == 8) {
                            //>=90mm
                            SMICriskOR = SMICriskOR + 7 * (1.12);

                        } else if (sizeInt == 9) {
                            //>=100mm
                            SMICriskOR = SMICriskOR + 8 * (1.12);

                        }

                        if (locationInt == 1) {

                            SMICriskOR = SMICriskOR + 1.91;

                        }



                        if (paris == 2) {

                            SMICriskOR = SMICriskOR + 2.73;

                        } else if (paris == 3) {

                            SMICriskOR = SMICriskOR + 2.49;

                        }

                        if (morphology == 2) {

                            SMICriskOR = SMICriskOR + 2.8;

                        } else if (morphology == 3) {

                            SMICriskOR = SMICriskOR + 0.72;

                        }

                        //round(SMICriskOR, 1);

                        if (SMICriskOR == 0) {

                            SMICriskOR = 1;

                        }

                        if (SMICriskOR == -0.28) {

                            SMICriskOR = 0.72;

                        }

                        var SMICnumeric = SMICriskOR * SMICriskactual;

                        SMICriskOR = round(SMICriskOR, 1);

                        SMICnumeric = round(SMICnumeric, 1);

                        if (SMICnumeric < 10) {

                            var text = 'Low Risk';

                        } else if (SMICnumeric >= 10) {


                            var text = 'High Risk';

                        }

                        //return an object

                        return {

                            "risk_text": text,
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

                    if (SMSA_total < 6) {

                        SMSA_group = 1;

                    } else if (SMSA_total < 9) {

                        SMSA_group = 2;

                    } else if (SMSA_total < 13) {

                        SMSA_group = 3;

                    } else if (SMSA_total > 12) {

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

                if ($('#non_lifting').prop('disabled') === false) {
                    var non_lifting = $('#non_lifting').val();
                } else {
                    var non_lifting = null;
                }


                if ($('#location_difficult').prop('disabled') === false) {
                    var location_difficult = $('#location_difficult').val();
                } else {
                    var location_difficult = null;
                }
                //var location_difficult = $('#location_difficult').val();
                //var demarcation = $('#demarcation').val();
                //var paris = $('#paris').val();


                if ($('#size_40_smsaplus').prop('disabled') === false) {
                    var size_40_smsaplus = $('#size_40_smsaplus').val();
                } else {
                    var size_40_smsaplus = null;
                }

                //var size_40_smsaplus = $('#size_40_smsaplus').val();

                if ($('#nongranular_smsaplus').prop('disabled') === false) {
                    var nongranular_smsaplus = $('#nongranular_smsaplus').val();
                } else {
                    var nongranular_smsaplus = null;
                }


                

                //extra for hot versus cold

                if (hotOrCold == 0) {

                    if ((size_40_smsaplus == null) || (
                        nongranular_smsaplus == null)) {

                    return 'Missing Variables - please enter all 2 characteristics';


                }

               
                var size_40_smsaplusInt = +size_40_smsaplus;
               
                var nongranular_smsaplusInt = +nongranular_smsaplus;

                    if (isNaN(size_40_smsaplusInt) || isNaN(nongranular_smsaplusInt)) {

                        return 'Issue with variables supplied, please check they are numbers';

                    } else {

                        var SMSA_plus_total = size_40_smsaplusInt + nongranular_smsaplusInt;



                        return {


                            "size_40": size_40_smsaplusInt,
                            "nongranular": nongranular_smsaplusInt,
                            "SMSA_plus_total": SMSA_plus_total,



                        }
                    }

                } else {

                    //var nongranular_smsaplus = $('#nongranular_smsaplus').val();

                if ((non_lifting == null) || (location_difficult == null) || (size_40_smsaplus == null) || (
                        nongranular_smsaplus == null)) {

                    return 'Missing Variables - please enter all 4 further characteristics';


                }

                var non_liftingInt = +non_lifting;
                var size_40_smsaplusInt = +size_40_smsaplus;
                var location_difficultInt = +location_difficult;
                var nongranular_smsaplusInt = +nongranular_smsaplus;

                    if (isNaN(non_liftingInt) || isNaN(size_40_smsaplusInt) || isNaN(location_difficultInt) || isNaN(
                            nongranular_smsaplusInt)) {

                        return 'Issue with variables supplied, please check they are numbers';

                    } else {

                        var SMSA_plus_total = non_liftingInt + size_40_smsaplusInt + location_difficultInt +
                            nongranular_smsaplusInt;



                        return {

                            "non_lifting": non_liftingInt,
                            "size_40": size_40_smsaplusInt,
                            "location_difficult": location_difficultInt,
                            "nongranular": nongranular_smsaplusInt,
                            "SMSA_plus_total": SMSA_plus_total,



                        }
                    }

                }


            }

            function calculateScore() {


                var scores = new Object;

                $(".score:not(:disabled)").each(function() {

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

                $.each(scores, function(k, v) {

                    

                    if (v == null) {

                        iterator = iterator + 1;
                        return true;

                    }

                    var vInt = null;
                    var vInt = +v;

                    score_total = score_total + vInt;
                    iterator = iterator + 1;


                    numberFilled = numberFilled + 1;


                })

                var fraction = (score_total) / (numberFilled * 5);

                var fraction_weighted = weight_fraction_score(fraction);


                var outputObject = new Object;

                outputObject = {


                    "score_total": score_total,
                    "score_denominator": numberFilled * 5,
                    "weighted_fraction": fraction_weighted,
                    "fraction": fraction,
                    "elements": scores,
                    "sections": {

                        

                    },


                }

                //to get individual component scores
                var sections = ['global', 'injection', 'snare', 'safety', 'defect', 'accessory'];

                var section_map = new Object;

                $.each(sections, function(k, v) {

                    var section_array = null;
                    var section_array = new Object;
                    section_map[v] = new Object;
                    //console.log(k + 'is k');
                    //console.log(v + 'is v');
                    $('#'+v+'').parent().parent().find('.score:not(:disabled)').each(function() {

                        //console.log(this);
                        var name = $(this).attr('id');

                //scores[name] = $(this).val();
                        section_array[name] = $(this).val();
                     })

                     //for each section array determine the score and fraction

                            var score_total_section = 0;

                            var iterator_section = 0;

                            var numberFilled_section = 0;

                            $.each(section_array, function(k, v) {

                                

                                if (v == null) {

                                    iterator_section = iterator_section + 1;
                                    return true;

                                }

                                var vInt = null;
                                var vInt = +v;

                                score_total_section = score_total_section + vInt;
                                iterator_section = iterator_section + 1;


                                numberFilled_section = numberFilled_section + 1;


                            })

                            section_array['score_total_section'] = score_total_section;
                            section_array['iterator_section'] = iterator_section;
                            section_array['numberFilled_section'] = numberFilled_section * 5;
                            //*5 because the score is /5 and here we count only the number

                     section_map[v] = section_array;

                     outputObject["sections"][v] = new Object;

                     outputObject["sections"][v] = {

                   

                        "numerator" : section_array.score_total_section, 
                        "denominator" : section_array.numberFilled_section,




                     };
                     
                    


                })

                console.dir(outputObject);
                
                return outputObject;

                /* return {


                    "score_total": score_total,
                    "score_denominator": numberFilled * 5,
                    "weighted_fraction": fraction_weighted,
                    "fraction": fraction,
                    "elements": scores,
                    "sections": {

                        "global" : { 

                            "numerator" : section_map.global.score_total_section, 
                            "denominator" : section_map.global.numberFilled_section,

                        },

                    },


                } */





            }

            function hideHotSnareFields() {

                $('.hot').each(function() {

                    var label = null;
                    var label = $(this).parent().prev();
                    $(this).attr('disabled', true);
                    $(this).parent().hide();
                    $(label).hide().attr('disabled', true);

                    //if section length = 0 hide heading


                })

                hotOrCold = 0; // hot = 1, cold = 0

                headingsHider();

                /* var labels = $('#size, #location, #morphology, #paris').parent().prev();
        var arrayToHide = $('#size, #location, #morphology, #paris').parent();

        $(labels).hide();
        $(arrayToHide).hide();
        $('#demarcation_imaging').show(); */

                /* $('#size, #location, #morphology, #paris').parent().hide(); */

            }

            function fullScoreUpdate() {

                var SMSA = calculateDifficultyScore();
                //remove the check from the tag removed

                if (isNaN(SMSA.SMSA_total) === false) {

                    $('#SMSA_total').text(SMSA.SMSA_total);
                    $('#SMSA_group').text(SMSA.SMSA_group);

                }else{

                    $('#SMSA_total').text('');
                    $('#SMSA_group').text('');

                }

                var SMSAplus = calculatePlusDifficultyScore();
                //remove the check from the tag removed

                if (isNaN(SMSAplus.SMSA_plus_total) === false) {

                    $('#numeratorSMSAplus').text(SMSAplus.SMSA_plus_total);
                    if (hotOrCold == 0){
                    $('#denominatorSMSAplus').text(2);
                    }else{
                        $('#denominatorSMSAplus').text(4);

                    }

                }else{

                    $('#numeratorSMSAplus').text('');
                    $('#denominatorSMSAplus').text('');

                    //special case cold snare there is only one
                }

                var score = calculateScore();
                //remove the check from the tag removed

                console.dir(score);

                if (isNaN(score.score_total) === false) {

                    $('#numeratorSum').text(score.score_total);
                    $('#denominatorSum').text(score.score_denominator);
                    $('#fraction').text(score.fraction.toFixed(2));

                    $.each(score.sections, function(k, v) {

                        var section = k;

                        $('#'+k).parent().find('.section-numerator').text(v.numerator);
                        $('#'+k).parent().find('.section-denominator').text(v.denominator);

                    });
                    

                    if (isNaN(SMSA.SMSA_total) === false && isNaN(SMSAplus.SMSA_plus_total) === false){
                    $('#weighted_fraction').text(+score.weighted_fraction.toFixed(2));
                    }else{
                        $('#weighted_fraction').text('*fill SMSA first*');

                    }
                    

                };

                if (complete == 1){

                    $('.complete').text('Complete');
                }else if (complete == 0){

                    $('.complete').text('Incomplete');


                }




            }

            function showHotSnareFields() {


                $('.hot').each(function() {

                    var label = null;
                    var label = $(this).parent().prev();
                    $(this).attr('disabled', false);
                    $(this).parent().show();
                    $(label).show().attr('disabled', false);

                    //if section length = 0 hide heading


                })

                hotOrCold = 1; //cold = 0, hot = 1;

                headingsHider();

            }

            function headingsHider() {


                $('.divider').each(function() {

                    if ($(this).find('select:not(:disabled)').length == 0) {

                        $(this).hide();
                    } else {

                        $(this).show();
                    }


                })


            }

            function copyFormClipboard() {

                var score = calculateScore();
                var difficulty = calculateDifficultyScore();
                var difficulty_plus = calculatePlusDifficultyScore();
                var type_polypectomy = $('#type_polypectomy').val();


                var overall_score = {

                    "type_polypectomy": type_polypectomy,
                    "score": score,

                    "difficulty": difficulty,
                    "difficulty_plus": difficulty_plus,


                }

                copyToClipboard(JSON.stringify(overall_score));

                //alert('Data copied to clipboard');

                $('#success').text('Data Copied to Clipboard.');
                //$('div.error span').addClass('form-text text-danger');
                //$('#errorWrapper').show();

                $("#successWrapper").fadeTo(4000, 500).slideUp(500, function() {
                    $("#successWrapper").slideUp(500);
                });

                return overall_score;

            }

            function getFieldsToSaveScoreOnly() {

                var names = {};

                $('.score').each(function() {

                    var name = null;

                    var value = null;

                    name = $(this).attr("name");

                    value = $(this).val();


                    names[name] = value;



                });

                return names;

            }

            function getFieldsToSavePlusSMSA() {


                var names = {};

                $('.details, .score, .SMSA, .SMSAplus').each(function() {

                    var name = null;

                    var value = null;

                    name = $(this).attr("id");

                    value = $(this).val();


                    names[name] = value;



                });

                $('.result').each(function() {

                    var name = null;

                    var value = null;

                    name = $(this).attr("id");

                    value = $(this).text();


                    names[name] = value;



                });

                $('.section-numerator').each(function() {

                    var name = null;

                    var value = null;

                    name = $(this).parent().parent().find('h2').attr("id");

                    name += '_numerator';

                    value = $(this).text();


                    names[name] = value;



                });

                $('.section-denominator').each(function() {

                    var name = null;

                    var value = null;

                    name = $(this).parent().parent().find('h2').attr("id");

                    name += '_denominator';

                    value = $(this).text();


                    names[name] = value;



                });

                names['edit'] = edit;
                names['complete'] = complete;

                if (edit == 1) {

                    names['id'] = esdLesionPassed;


                }


                return names;


            }

            //function to push the user into the array or do on the server side, do on the server side.

            //push this to a script php

            function updateDatabase(fields) {


                const jsonString = JSON.stringify(fields);
                console.log(jsonString);

                /*         const jsonString = JSON.stringify(dataToSend);
                        console.log(jsonString); */

                var request = $.ajax({
                    beforeSend: function() {

                    },
                    url: siteRoot + "assets/scripts/scores/updatePolypectomyTable.php",
                    type: "POST",
                    contentType: "application/json",
                    data: jsonString,

                });



                request.done(function(data) {



                    console.log(data);

                    if (data) {

                        alert('Updated');


                    }







                })

                return request;

            }

            function saveScoreUser(fields) {

                /*  const dataToSend = {



                 fields
                 //options: myOpts,

                 } */

                const jsonString = JSON.stringify(fields);
                console.log(jsonString);



                var request = $.ajax({
                    beforeSend: function() {

                        disableFormInputs('polypectomy-form');
                        $('.submit-buttons').each(function(){

                            $(this).prop('disabled', true);

                        })


                    },
                    url: siteRoot + "assets/scripts/scores/saveScoreUser.php",
                    type: "POST",
                    contentType: "application/json",
                    data: jsonString,

                });



                request.done(function(data) {



                    console.log(data);

                    if (data) {


                        var parsedData = $.parseJSON(data);
                        console.dir(parsedData);

                        if (parsedData.updated == 1) {

                            alert('Report Card Updated');

                        } else if (parsedData.updated == 1) {

                            alert('Report Card Updated');

                        } else if (parsedData.newid) {

                            alert('New Report Card Created');
                            edit = 1;
                            esdLesionPassed = parsedData.newid;
                            userReportCardid = parsedData.user_report_card_id;
                            denominator = parsedData.denominator;
                            $('#user_report_card_numerator').text(userReportCardid);
                            $('#user_report_card_denominator').text(denominator);
                            $('#gpat_id').text(parsedData.id);

                            $('#successWrapper').collapse('toggle');


                        }


                    }

                    enableFormInputs('polypectomy-form');
                    //the edoscopist field needs to stay disabled
                    $('#endoscopist').prop('disabled', true);
                    $('.submit-buttons').each(function(){

                    $(this).prop('disabled', false);

                    fullScoreUpdate();

                    })








                })

                return request;




            }

            function fillForm(id) {

                const dataToSend = {




                    id: id,

                }

                const jsonString = JSON.stringify(dataToSend);
                console.log(jsonString);



                var request = $.ajax({
                    beforeSend: function() {

                    },
                    url: siteRoot + "assets/scripts/scores/getScoreDataSpecific.php",
                    type: "POST",
                    contentType: "application/json",
                    data: jsonString,

                });



                request.done(function(data) {



                    console.log(data);

                    if (data) {


                        var parsedData = $.parseJSON(data);
                        console.log('Data Parse Follows');
                        console.dir(parsedData);

                        $(parsedData).each(function(i, val) {
                            $.each(val, function(k, v) {

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

                                    if (v == '1') {

                                        $("#saveesdLesion").hide();

                                    }


                                } else {

                                    if (v == 'null'){

                                        //do nothing 


                                    }else{


                                    $("#" + k).val(v);

                                    }

                                }
                                //console.log(k+' : '+ v);
                            });

                        });


                        esdLesionPassed = id;

                        edit = 1;

                        complete = parsedData.complete;

                        //esdLesionPassed = parsedData.newid;
                            userReportCardid = parsedData.user_gpat_score_id;
                            denominator = parsedData.user_number_records;
                            $('#user_report_card_numerator').text(userReportCardid);
                            $('#user_report_card_denominator').text(denominator);
                            $('#gpat_id').text(parsedData.id);


                            $('#successWrapper').collapse('toggle');

                            fullScoreUpdate()


                        //put the data in the right place

                        //if it matches the name of an element do things for input
                        //if it matches id do things for id  

                        /* if (parsedData.updated == 1) {

                            alert('Data Updated');

                        } else if (parsedData.updated == 1) {

                            alert('Data Updated');

                        } else if (parsedData.newid) {

                            alert('New Report Card Created');
                            edit = 1;
                            esdLesionPassed = parsedData.newid;

                        } */


                    }







                })

                return request;




            }

            function weight_fraction_score(fraction) {

                var SMSAscore = calculateDifficultyScore();
                var SMSAplus = calculatePlusDifficultyScore();

                if (isNaN(SMSAscore.SMSA_total) === false && isNaN(SMSAplus.SMSA_plus_total) === false){

                    if (SMSAplus.SMSA_plus_total > 0){

                        SMSA = 5;
                        
                    }else if (SMSAscore.SMSA_group > 1 && SMSAscore.SMSA_group < 5){

                        SMSA = SMSAscore.SMSA_group;
                    
                    }else{

                        return false;
                    }

                if (SMSA == 1) {

                    return false;
                } else if (SMSA == 2) {

                    weightedFraction = fraction * 0.25;

                } else if (SMSA == 3) {

                    weightedFraction = fraction * 0.5;

                } else if (SMSA == 4) {

                    weightedFraction = fraction * 0.75;

                } else if (SMSA == 5) {

                    weightedFraction = fraction;

                } else {

                    return false;
                }

                return weightedFraction;

                }else{

                    return false;
                }


            }



            //more required methods

            //generate score per section

            //chartupdate

            //dashboard page separate



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

                var options = {
                    animationEnabled: true,
                    backgroundColor: null,
                    title: {
                        text: "GPAT",
                        fontColor: "#eec378",
                        fontFamily: "arial",


                    },
                    axisY: {
                        title: "GPAT",
                        suffix: "",
                        gridColor: "gray",
                        fontColor: "white",
                        tickColor: "white",
                        lineThickness: 1,
                        lineColor: "white",
                        titleFontColor: "white",
                        labelFontColor: "white",




                    },
                    axisX: {
                        title: "Scores",
                        gridColor: "gray",
                        fontColor: "white",
                        tickColor: "white",
                        lineThickness: 1,
                        lineColor: "white",
                        titleFontColor: "white",
                        labelFontColor: "white",





                    },
                    data: [{
                        type: "column",
                        yValueFormatString: "#,##0.0#" % "",
                        dataPoints: [{
                                label: "Proficiency",
                                y: 10.09
                            },
                            {
                                label: "Difficulty",
                                y: 9.40
                            },
                            {
                                label: "Fraction",
                                y: 8.50
                            },


                        ]
                    }]
                };
                $("#chartContainer").CanvasJSChart(options);

                /*  var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "World Energy Consumption by Sector - 2012"
	},
	data: [{
		type: "pie",
		indexLabel: "{y}",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 18,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php //echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
  */


            })
            </script>


            </head>

            <body>



                <div class='content'>
                    <div class="row">



                        <div id="right" class="col-lg-3 col-xl-3 border-right">
                            <!--         	<div class="h-100 p-4"> -->
                            <div id="sticky" data-toggle="sticky" class="is_stuck pr-3 mr-3 pl-2 pt-2">
                                <div id="messageBox" class='text-left text-white pb-2 pl-2 pt-2'></div>
                                <div class="d-flex flex-nowrap text-small text-muted text-right px-3 mt-1 mb-3 ">


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
                                        <i id='reset-form' class="fas fa-undo cursor-pointer mt-2" title='Reset Form (enter new report)'
                                            data-toggle='tooltip' data-placement='right'>&nbsp;Reset Form</i>
                                            <i id='reload-form' class="fas fa-undo cursor-pointer mt-2" title='Reload Saved Data'
                                            data-toggle='tooltip' data-placement='right'>&nbsp;Reload Saved Form</i>
                                    </div>





                                </div>


                                <div id="errorWrapper"
                                    class="error alert alert-warning alert-flush alert-dismissible collapse bg-gieqsGold"
                                    role="alert">
                                    <strong>Check the form!</strong> <span id="error"></span><button type="button"
                                        class="close" data-hide="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="successWrapper"
                                    class="success alert alert-success alert-flush alert-dismissible collapse gieqsGold bg-dark"
                                    role="alert">
                                    <!-- <strong>Saved!</strong> --> <span id="success"></span><!-- <button type="button"
                                        class="close" data-hide="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                                    <p>Report Card <span id="user_report_card_numerator">1</span> / <span id="user_report_card_denominator">1</span></p>
                                    <?php if ($isSuperuser = 1){?>

                                        <p>GPAT id <span id="gpat_id"></span></p>


                                    <?php }?>
                                </div>

                                <div id="warningWrapper"
                                    class="warning alert alert-warning alert-flush alert-dismissible collapse"
                                    role="alert">
                                    <strong>Warning!</strong> <span id="warning"></span><button type="button"
                                        class="close" data-hide="alert" aria-label="Close">
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
                                        <P style="text-align:left;" class="strong h6">Overall: <span id="numeratorSum"
                                                class="result"></span>&nbsp;/&nbsp;<span id="denominatorSum"
                                                class="result"></span>
                                        </P>
                                        <P style="text-align:left;" class="strong h6">Fraction: <span id="fraction"
                                                class="result"></span></P>
                                        
                                                

                                        <p style="text-align:left; mt-3" class="strong h6">SMSA: <span id="SMSA_total"
                                                class="result"></span></p>

                                        <p style="text-align:left;" class="strong h6">SMSA Group : <span id="SMSA_group"
                                                class="result"></span></p>

                                        <p style="text-align:left;" class="strong h6">SMSA+: <span
                                                id="numeratorSMSAplus" class="result"></span>&nbsp;/&nbsp;<span
                                                id="denominatorSMSAplus" class="result"></span></p>

                                                <P style="text-align:left;" class="strong h6">Weighted Fraction: <span id="weighted_fraction"
                                                class="result"></span></P>

                                    </div>

                                

                                    <p><button id='calculate' type="button" class="btn btn-sm text-white btn-dark submit-buttons"
                                            name="calculate">Calculate Score (and copy to clipboard)</button></p>

                                    <?php if ($isSuperuser == 1){?>

                                    <p><button id='updateDatabase' type="button"
                                            class="btn btn-sm text-white btn-dark">Update Database Fields</button></p>


                                    <?php } ?>



                                    <!-- <p>Polypectomy Score </p>
                <p>Complexity Score </p>
                <p>Overall Score </p> -->

                                </div>

                            </div>
                            <!--close sticky nav-->


                            <!-- </div> -->
                            <!--close right h-100 div-->
                        </div>
                        <!--close right column div-->

                        <div class="col-lg-9">


                            <?php
            
            //$requiredValues = array("Location","Morphology","Paris");
            
            //$values = array();
            //$values = $lesion->GetValuesSpecific($requiredValues);
            
            //print_r($values);
            
            ?>


                            <!-- <p><h3><b>Risk for Submucosal Invasion within a given LSL </h3>[algorithm ala Burgess 2018 Gastroenterology]</b></p>
             -->


                            <p><button id="show-info" class="btn btn-dark" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample" aria-expanded="false"
                                    aria-controls="collapseExample">
                                    Show info
                                </button></p>
                            <div class="collapse" id="collapseExample">

                                <div class="card card-body">

                                    <p class="h5">Pre-requisites:</p>
                                    <p>
                                    <ul>Colon Polyp &ge; 10mm in size</ul>
                                    <ul>Cold or Hot Snare</ul>
                                    </p>

                                    <p>This tool asks for your subjective assessment of multiple domains of
                                        deconstructed polypectomy where 1 is poor and 5 very good</p>
                                    <p>Fill hot or cold first since different questions are asked for each. <br />The
                                        difficulty score consists of SMSA questions (4). <br />The difficulty+ score
                                        consists of SMSA+ questions (4) and applies only to hot snare.</p>
                                    <p>Once completed press copy and a machine readable version will be copied to the
                                        clipboard.</p>

                                    <p><a href="https://vimeo.com/562536661" data-fancybox="" data-toggle="tooltip"
                                            data-placement="bottom" title="" class=""
                                            data-original-title="Watch Explainer Video">

                                            Watch Introductory Video&nbsp;<i class="fas fa-play gieqsGold"></i>

                                        </a></p>


                                    <p>Hover over questions for more information</p>

                                    <p><i class="fas fa-play gieqsGold "></i> indicates availability of a video
                                        demonstration for that statement. click to view.</p>


                                </div>
                            </div>

                            <br>
                            <div id='result' class='yellow'></div>
                            <br>
                            <!--                             <div id="chartContainer" class="mb-4" style="height: 370px; width: 100%;"></div>
 -->
                            <form id="polypectomy-form" method="post">
                                <fieldset>
                                <h2 id="details" class="mr-auto">Demographic Details</h2>
                                <?php //$formv1->generateTextDisabled ('Endoscopist', 'endoscopist', '', 'Not modifiable.  To change details  use my account', $userFunctions->getUserName($userid));
                            //echo '<br/>'; ?>
                               <?php $formv1->generateDate ('Date of Procedure', 'date_procedure', 'details', 'Enter the date of the procedure');
                            echo '<br/>'; ?>

                                    <h2 id="hot-or-cold" class="mt-1">Hot / Cold Snare Polypectomy?</h2>
                                    <?php
            
          
            
                            $formv1->generateSelectCustomCancel ('Type of Polypectomy', 'type_polypectomy', 'branch_point details', array('1' => 'Hot Snare - using diathermy', '2' => 'Cold Snare - without diathermy',), 'Select the Type of Polypectomy, cold without diathermy, hot with diathermy');
                            echo '<br/>';
                           

                            

            
                            ?>

                                </fieldset>
                                <fieldset class="divider">
                                <div class="d-flex flex-row mt-4">
                                    <h2 id="global" class="mr-auto">Global Competencies</h2>
<p>Score: <span class="section-numerator"></span>/<span class="section-denominator"></span></p>
                                    </div>
                                  
                                    

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
                                <div class="d-flex flex-row mt-4">
                                    <h2 id="injection" class="mr-auto">Injection Technique</h2>
<p>Score: <span class="section-numerator"></span>/<span class="section-denominator"></span></p>
                                    </div>
                                   

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

                                <div class="d-flex flex-row mt-4">
                                    <h2 id="snare" class="mr-auto">Snare Placement Technique</h2>
<p>Score: <span class="section-numerator"></span>/<span class="section-denominator"></span></p>
                                    </div>
                                    

                                    <?php

                            $formv1->generateSelectCustomCancel ('Appropriate Snare Size Selected:', 'snare_size', 'score', array('1' => '1 - Very Poor - snare clearly too large / small and of incorrect type (thin wire vs thick wire) for polyp', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - snare appropriate size and type for the polyp'), '', '');
                            echo '<br/>';
            
                            $formv1->generateSelectCustomCancel ('Stable positon with lesion at 6 \'o clock OR transformed to 6 \'o clock:', 'snare_position', 'score', array('1' => '1 - Very Poor - snare position is not consistently maintained at 6 \'o clock resulting in poor snare capture', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - snare position is consistently maintained at 6 \'o clock'), '', '561526772');
                            echo '<br/>';

                            $formv1->generateSelectCustomCancel ('Maximises Tissue Capture:', 'snare_capture', 'score', array('1' => '1 - Very Poor - poor capture of tissue/scrapes the surface of the polyp/ no use of downward pressure/no use of gas aspiration 
                            results in incomplete mucosal layer excision', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - good capture of polyp tissue within snare/ use of downward pressure/use of gas aspiration resulting in compete excision of captured tissue'), '', '561526772');
                            echo '<br/>';
            
                            $formv1->generateSelectCustomCancel ('Snare precisely visualised during placement and closure (V of the snare):', 'snare_visualised', 'score', array('1' => '1 - Very Poor - snare V at intersection with snare catheter not visualised during closure and far from the colonoscope', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - snare V visualised consistently during closure and near to the colonoscope'), '', '561525603');
                            echo '<br/>';
            
                            $formv1->generateSelectCustomCancel ('Residual tissue islands avoided if piecemeal resection OR Macroscopically complete if en-bloc resection attempted:', 'residual', 'score', array('1' => '1 - Very Poor - snare placement does not include normal margin (at edge) and does not use transected tissue edge (within lesion) as a guide', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - snare placement includes > 2-3mm normal margin (at edge) of tissue and uses transected tissue edge as a guide (within defect)'), '');
                            echo '<br/>';
            
                
            
            
            
                            ?>
                                </fieldset>

                                <fieldset class="divider">

                                    <div class="d-flex flex-row mt-4">
                                    <h2 id="safety" class="mr-auto">Safety Checks Prior to Resection (HOT snare only)</h2>
<p>Score: <span class="section-numerator"></span>/<span class="section-denominator"></span></p>
                                    </div>

                                    <?php
            
            
            /* $formv1->generateSelectCustomCancel ('Takes the snare and closes to 1cm, uses tactile feedback OR assistant closes snare to mark:', 'snare_closed', 'score hot', array('1' => '1 - Very Poor - does not take snare and close to 1cm after taking from assistant (or ask assistant to close to mark)', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - takes snare and closes to 1cm after taking from assistant (or asks assistant to close to mark)'), '');
            echo '<br/>';   not asessable on video */
            
            $formv1->generateSelectCustomCancel ('Moves the closed snare to confirm independent movement from deeper structures:', 'independent_movement', 'score hot', array('1' => '1 - Very Poor - does not check tissue mobility prior to transection with respect to deeper structures', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - checks mobility prior to transection with respect to deeper structures'), '', '561529195');
            echo '<br/>';

            $formv1->generateSelectCustomCancel ('Lifts the snare away from the muscularis propria prior to application of diathermy:', 'lift_movement', 'score hot', array('1' => '1 - Very Poor - does not lift the snare prior to applying diathermy', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - lifts the snare away from the muscularis prior to the application of diathermy'), '', '');
            echo '<br/>';
            
            
            ?>
                                </fieldset>

                                <fieldset class="divider">

                                <div class="d-flex flex-row mt-4">
                                    <h2 id="defect" class="mr-auto">Defect Assessment After Resection</h2>
<p>Score: <span class="section-numerator"></span>/<span class="section-denominator"></span></p>
                                    </div>
                                    <?php
            
            $formv1->generateSelectCustomCancel ('MUCOSA - Looks for, detects and removes residual at margin and within defect:', 'mucosa', 'score', array('1' => '1 - Very Poor - does not ostensibly and systematically check for residual adenomatous tissue at margin or within defect', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - ostensibly and systematically checks for residual adenomatous tissue within defect and at margin'), 'Including residual muscularis mucosae');
            echo '<br/>';
            
            $formv1->generateSelectCustomCancel ('Thermal ablation of the POST EMR Margin:', 'thermal_ablation', 'score hot', array('1' => '1 - Very Poor - unsteady, ablates visible polyp tissue, areas of incomplete ablation, messy result', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - steady, systematic application, does not ablate visible polyp tissue, complete ablation of the entire margin achieved'), '');
            echo '<br/>';

            
            $formv1->generateSelectCustomCancel ('SUBMUCOSA - Looks for, detects and treats any bleeding vessels within the defect::', 'submucosa', 'score hot', array('1' => '1 - Very Poor - neither detects nor treats bleeding vessels in submucosa. treats benign submucosal appearances', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - detects and treats bleeding vessels in submucosa.  does not treat other submucosal appearances including herniating vessels.'), 'Does not treat non-bleeding herniating vessels. Does not treat other appearances of the submucosa detailed in Desomer et al. 2018 GIE', '561531789');
            echo '<br/>';
            
            $formv1->generateSelectCustomCancel ('MUSCULARIS - Looks for, detects and treats Deep Mural Injury &ge; 2 (Sydney Classification) :', 'muscularis', 'score hot', array('1' => '1 - Very Poor - misses signs of deep mural injury (types II-V) which require clip placement', '2' => '2 - Poor', '3' => '3 - Average', '4' => '4 - Good', '5' => '5- Very Good - detects and treats types II-V deep mural injury or confirms they are not present'), '', '561531084');
            echo '<br/>';
            
            
            
            
            ?>
                                </fieldset>

                                <fieldset class="divider">
                                <div class="d-flex flex-row mt-4">
                                    <h2 id="accessory" class="mr-auto">Accessory Techniques in Polypectomy</h2>
<p>Score: <span class="section-numerator"></span>/<span class="section-denominator"></span></p>
                                    </div>

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


                                    <h2 id="difficulty" class="mt-4">Difficulty Score (SMSA - EMR, SMSA+)</h2>

                                    <h3 class="mt-4">SMSA</h3>

                                    <?php
            

            
            
            $formv1->generateSelectCustomCancel ('Size:', 'size', 'SMSA', array('1' => '< 1cm', '3' => '1 - 1.9cm', '5' => '2 - 2.9cm', '7' => '3 - 3.9cm', '9' => '&ge; 4cm'), '');
            echo '<br/>';
            
            $formv1->generateSelectCustomCancel ('Morphology:', 'morphology', 'SMSA', array('1' => 'Pedunculated', '2' => 'Sessile', '3' => 'Flat',), '');
            echo '<br/>';
            
            $formv1->generateSelectCustomCancel ('Site:', 'site', 'SMSA', array('1' => 'Left', '2' => 'Right',), '');
            echo '<br/>';
                        
            
            $formv1->generateSelectCustomCancel ('Access:', 'access', 'SMSA', array('1' => 'Easy', '3' => 'Difficult',), '');
            echo '<br/>';
            
?>

                                    <h3 class="mt-4">SMSA +</h3>

                                    <?php 
            $formv1->generateSelectCustomCancel ('Size &ge; 40mm:', 'size_40_smsaplus', 'SMSAplus', array('0' => 'No', '1' => 'Yes', ), '');
            echo '<br/>';

            $formv1->generateSelectCustomCancel ('Non-granular morphology:', 'nongranular_smsaplus', 'SMSAplus', array('0' => 'No', '1' => 'Yes', ), '');
            echo '<br/>';
            
            
            $formv1->generateSelectCustomCancel ('Non-lifting / Previous Attempt:', 'non_lifting', 'SMSAplus hot', array('0' => 'No', '1' => 'Yes', ), '');
            echo '<br/>';
                           
           /*  $formv1->generateSelectCustomCancel ('Previous attempt:', 'PANL', 'SMSAplus hot', array('0' => 'No', '1' => 'Yes', ), '');
            echo '<br/>';same as non-lifting */
                           
            $formv1->generateSelectCustomCancel ('Direct ileocaecal valve, diverticular or appendiceal involvement:', 'location_difficult', 'SMSAplus hot', array('0' => 'No', '1' => 'Yes', ), '');
            echo '<br/>';
            
            //flexures
            
            /* $formv1->generateSelectCustomCancel ('Lesions with a regular-irregular demarcation zone:', 'demarcation', 'SMSAplus hot', array('0' => 'No', '1' => 'Yes', ), '');
            echo '<br/>'; should be before starting*/
            
            
            
            
            ?>
                                </fieldset>


                                <!-- <input type="hidden" id="user_id" class="details" value="<?php //echo $userid;?>"> -->






                                <!--conversion to newlines $(this).val().replace(/\r\n|\r|\n/g,"<br />")-->

                                <p></p>

                            </form>

                            <p class="h5 mt-5">Definitions:</p>
                            <ul>
                                <li>Hot Snare - colon polyp removed using a snare with use of electrosurgical energy
                                </li>
                                <li>Diathermy - electrosurgical energy</li>
                                <li>Cold Snare - colon polyp removed using a snare without electrosurgical energy</li>



                            </ul>

                            
                            <P>Score Adapted for GIEQs.com by David Tate:</P>


                            <P>Unauthorised distribution of the code prohibited. Copyright 2021 by the GIEQs Foundation.
                                All rights reserved </P>


                        </div>
                        <!--end col-9-->


                    </div>
                    <!--end row-->

                </div>
                <!--end content-->


        </div>
        <!--end content-->








    </div>
    <!--end overall-->




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

    <script src="<?php echo BASE_URL; ?>/assets/libs/flatpickr/dist/flatpickr.min.js"></script>






    <script>
    //the number that are actually loaded

    var complete = 0;
    var siteRoot = rootFolder;

    esdLesionPassed = $("#id").text();

    if (esdLesionPassed == "") {

        var edit = 0;

    } else {

        var edit = 1;

    }

    var loaded = 1;

    //the number the user wants
    var loadedRequired = 1;

    var firstTime = 1;
    var activeStatus = 1;

    var hotOrCold = null;

    var requiredTagCategoriesText = $("#requiredTagCategories").text();

    var requiredTagCategories = JSON.parse(requiredTagCategoriesText);

    function copyToClipboard(text) {
        if (window.clipboardData && window.clipboardData.setData) {
            // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
            return window.clipboardData.setData("Text", text);

        } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
            var textarea = document.createElement("textarea");
            textarea.textContent = text;
            textarea.style.position = "fixed"; // Prevent scrolling to bottom of page in Microsoft Edge.
            document.body.appendChild(textarea);
            textarea.select();
            try {
                return document.execCommand("copy"); // Security exception may be thrown by some browsers.
            } catch (ex) {
                console.warn("Copy to clipboard failed.", ex);
                return false;
            } finally {
                document.body.removeChild(textarea);
            }
        }
    }

    function generateScore() {

        var demarcation = $('#demarcation').val();
        var size = $('#size').val();
        var location = $('#location').val();
        var morphology = $('#morphology').val();
        var paris = $('#paris').val();

        var COVERT = determineSMIC(demarcation, size, location, morphology, paris);




        var score = {
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


   

    $(document).ready(function() {



        //refreshNavAndTags();

        if (edit == 1) {

            fillForm(esdLesionPassed);
        }

        var options = {
			enableTime: false,
			allowInput: true
		};
    $("#date_procedure").flatpickr(options);

       
        //on load check if any are checked, if so load the videos

        //if none are checked load 10 most recent videos for these categories

      

        $('body').on('change', '.SMSA', function() {

           /*  var SMSA = calculateDifficultyScore();
            //remove the check from the tag removed

            if (isNaN(SMSA.SMSA_total) === false) {

                $('#SMSA_total').text(SMSA.SMSA_total);
                $('#SMSA_group').text(SMSA.SMSA_group);

            }; */

            //check that 40 is equal

            var SMSA40 = $('#size').val();
            var SMSAplus40 = $('#size_40_smsaplus').val();

            //if smsa plus is 1 then make sure smsa size = 9 and vice versa

            if (SMSA40 == 9){

                $('#size_40_smsaplus').val('1');

            }else if (SMSA40 > 1 && SMSA40 < 9){

                if ($('#size_40_smsaplus').val() == 1){

                    $('#size_40_smsaplus').val('0');

                }

            }

            fullScoreUpdate();



        })

        $('body').on('change', '.SMSAplus', function() {



            /* //alert('hello');
            var SMSAplus = calculatePlusDifficultyScore();
            //remove the check from the tag removed

            if (isNaN(SMSAplus.SMSA_plus_total) === false) {

                $('#numeratorSMSAplus').text(SMSAplus.SMSA_plus_total);
                $('#denominatorSMSAplus').text(4);

            }; */

            //check that 40 is equal

            var SMSA40 = $('#size').val();
            var SMSAplus40 = $('#size_40_smsaplus').val();

            //if smsa plus is 1 then make sure smsa size = 9 and vice versa

            if (SMSAplus40 == 1){

                $('#size').val('9');

            }else if (SMSAplus40 == 0){

                if ($('#size').val() == 9){

                    $('#size').val('');

                }

            }

            fullScoreUpdate();




        })

        $('body').on('change', '.score', function() {



           /*  //alert('hello');
            var score = calculateScore();
            //remove the check from the tag removed

            if (isNaN(score.score_total) === false) {

                $('#numeratorSum').text(score.score_total);
                $('#denominatorSum').text(score.score_denominator);
                $('#fraction').text(+score.fraction.toFixed(2));

                //numb = +numb.toFixed(2);

            }; */

            fullScoreUpdate();



        })

        $('body').on('change', '#type_polypectomy', function() {


            //hide the cold snare
            //alert('change');

            if ($(this).val() == 1) {

                showHotSnareFields();

            } else if ($(this).val() == 2) {

                hideHotSnareFields();

            }

            fullScoreUpdate();



        })


        $('body').on('click', '#reset-form', function() {


            //hide the cold snare
            //alert('change');

            if (confirm("Are you sure?  This will lose unnsaved data!") == true) {
                window.location.href = siteRoot + '/pages/learning/pages/scores/technique.php';

  } else {
    return false;
  }




        })

        $('body').on('click', '#reload-form', function() {


        //hide the cold snare
        //alert('change');

        location.reload();



        })

        $('body').on('click', '.cancel', function(event) {


            //hide the cold snare
            //alert('change');

            event.preventDefault();

            $(this).parent().find('select').val('please select');
            fullScoreUpdate();


        })

        $('body').on('click', '#show-info', function(event) {


            //hide the cold snare
            //alert('change');

            event.preventDefault();

            $('#collapseExample').collapse('toggle');
            //fullScoreUpdate();


        })

        $('body').on('click', '#updateDatabase', function(event) {


            //hide the cold snare
            //alert('change');

            event.preventDefault();
            var fields = getFieldsToSavePlusSMSA();
            updateDatabase(fields);



        })

        $('body').on('click', '#saveScore', function(event) {


            //hide the cold snare
            //alert('change');

            event.preventDefault();
            var fields = getFieldsToSavePlusSMSA();
            saveScoreUser(fields);




        })

        $(document).on('click', '#calculate', function(event) {

            event.preventDefault();
            $('#polypectomy-form').submit();

        })

        $("#polypectomy-form").validate({

            invalidHandler: function(event, validator) {
                var errors = validator.numberOfInvalids();
                console.log("there were " + errors + " errors");
                if (errors) {
                    var message = errors == 1 ?
                        "1 field has been missed. It has been highlighted.\n Score not saved." :
                        +errors +
                        " fields have been missed. They have been highlighted.  Score not saved.";


                    $('#error').text(message);
                    //$('div.error span').addClass('form-text text-danger');
                    //$('#errorWrapper').show();

                    $("#errorWrapper").fadeTo(4000, 500).slideUp(500, function() {
                        $("#errorWrapper").slideUp(500);
                    });
                } else {
                    $('#errorWrapper').hide();
                }
            },
            rules: {
                date_procedure : {

                    required: true,

                },
                
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

                    required: function(element) {
                        return $("#type_polypectomy").val() == "1";

                    }

                },

                injection_dynamic: {

                    required: function(element) {
                        return $("#type_polypectomy").val() == "1";

                    }

                },

                injection_access: {

                    required: function(element) {
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

                snare_capture: {

                    required: true,

                },

                residual: {

                    required: true,

                },
                independent_movement: {

                    required: function(element) {
                        return $("#type_polypectomy").val() == "1";

                    }
                },

                lift_movement: {

                    required: function(element) {
                        return $("#type_polypectomy").val() == "1";

                    }
                },

                /* snare_closed: {

                    required: function(element) {
                        return $("#type_polypectomy").val() == "1";

                    }
                }, */
                mucosa: {

                    required: true
                },
                thermal_ablation: {

                    /* currently not required as not done all the time*/
                },
                submucosa: {

                    required: function(element) {
                        return $("#type_polypectomy").val() == "1";

                    }
                },
                muscularis: {

                    required: function(element) {
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

                    required: function(element) {
                        return $("#type_polypectomy").val() == "1";

                    }
                },
                PANL: {

                    required: function(element) {
                        return $("#type_polypectomy").val() == "1";

                    }
                },
                size_40_smsaplus: {

                    required: true,
                    
                },
                nongranular_smsaplus: {
                    required: function(element) {
                        return $("#type_polypectomy").val() == "1";

                    }
                },




            },
            messages: {

                type_polypectomy: {

                    required: 'You must enter whether the polypectomy was performed hot or cold.  This will alter the available fields below.',

                },


            },
            submitHandler: function(form) {


                //copyFormClipboard();
                complete = 1;
                /* var fields = getFieldsToSavePlusSMSA();
                saveScoreUser(fields); */

                copyFormClipboard();

                //console.log("submitted form");



            }

        });


        $(window).scroll(function() {
            var scrollDistance = $(window).scrollTop();


            // Assign active class to nav links while scolling
            $('fieldset').each(function(i) {
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