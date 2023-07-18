

<?php require '../../includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      $openaccess = 0;
      $requiredUserLevel = 6;


      require BASE_URI . '/head.php';

      $general = new general;

      $navigator = new navigator;

      $formv1 = new formGenerator;

      $users = new users;


      require_once(BASE_URI . '/assets/scripts/classes/gpat_score.class.php'); 
      $gpat_score = new gpat_score();

      require_once(BASE_URI . '/assets/scripts/classes/gpat_glue.class.php'); 
      $gpat_glue = new gpat_glue();
      

   
      ?>

    <!--Page title-->
    <title>Dashboard</title>

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">


    <style>
    .gieqsGold {

        color: rgb(238, 194, 120);


    }

    .card-placeholder {

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
            height: 250px;
        }

        .card-placeholder {

            width: 204px;

        }


        /* #sticky {
position: absolute !important;
top: 0px;
}  */



    }

    @media (min-width: 1200px) {
        #chapterSelectorDiv {



            top: -3vh;


        }

        #playerContainer {

            margin-top: -20px;

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

        if (isset($userid)){
        $users->Load_from_key($userid);

        }else{

            die();
        }
				    
                        
                        
		
        ?>

    <!-- load all video data -->

    <div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>

    <!--- specifiy the tag Categories required for display  CHANGEME-->

    

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
    //error_reporting(E_ALL);
    include(BASE_URI . '/pages/learning/assets/gpatNav.php');

    
    $debug = false;
    $_SESSION['debug'] = false;

    ?>



    <div class="main-content bg-gradient-dark">

        <!--Header CHANGEME-->

        <div class="d-flex align-items-end container">
            <p class="h1 mt-5">Dashboard</p>


        </div>
        <div class="d-flex align-items-end container">
            <p class="text-muted pl-4 mt-2">Chart Your Progress with GPAT</p>

        </div>






    


        <div class="container mt-3">



            <script>
            function round(value, precision) {
                var multiplier = Math.pow(10, precision || 0);
                return Math.round(value * multiplier) / multiplier;
            }

            


        



            $(document).ready(function() {

               

               

                

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
                                    class="success alert alert-success alert-flush alert-dismissible collapse"
                                    role="alert">
                                    <strong>Success!</strong> <span id="success"></span><button type="button"
                                        class="close" data-hide="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div id="warningWrapper"
                                    class="warning alert alert-warning alert-flush alert-dismissible collapse"
                                    role="alert">
                                    <strong>Warning!</strong> <span id="warning"></span><button type="button"
                                        class="close" data-hide="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                              
                                <h6 class="mt-3 mb-3 pl-2 h5">Navigation</h6>

                                <ul class="section-nav">

                                 
                                    <?php

echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#summary">Summary</a></li>';

echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#difficulty">Procedures Stratified by Difficulty</a></li>';

                        echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#domains">Domains</a></li>';
                        echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#certification">Certification</a></li>';
                       
                        

                       

                            ?>
                                   
                                </ul>


                           



                            

                             

                            </div>
                        
                        </div>
                  
                        <div class="col-lg-9">


                            <?php
          
            
            ?>


                          

                            <?php $statement=$gpat_glue->howDoICertify($userid);?>

                            <span id="summary"
                                class="d-block h1 text-white mr-2 mb-1"><?php echo $userFunctions->getUserName($userid);?></span>
                               
                                    
                                    
                                    <?php 
                                    
                                    $string = '';

                                    if ($users->gettrainee() == 1){
                        
                                        $string .= " Trainee";
                                    
                                    }else{
            
                                        $string .= ' Independent';
                                    }
                                    
                                    
                                    if ($users->getendoscopistType() == 1){$string .= " Medical Endoscopist";}
                        if ($users->getendoscopistType() == 2){$string .= " Surgical Endoscopist";}
                        if ($users->getendoscopistType() == 3){$string .= " Nurse Endoscopist";}
                        if ($users->getendoscopistType() == 4){$string .= " Endoscopy Nurse (assistant)";}
                        if ($users->getendoscopistType() == 5){$string .= " Medical Student";}
                        if ($users->getendoscopistType() == 6){$string .= " Nursing Student";}
                        
                                                
                       

                        if ($users->getyearsEndoscopy() != ''){
                        
                            $string .= ' with ' . $users->getyearsEndoscopy() . ' years experience.';
                        
                        }

                        if ($debug)
                        {

                            echo 'string = ' . $string;
                            print_r($users);
                        }
                        
                        ?>
                        
                    
                    
                        <span class="d-block text-white mb-3"><?php echo $string;?>
                    </span>
                            <span id="statusText" class="d-block gieqsGold mr-2 mb-1"
                                style="font-size:1.5rem;"><?php echo $statement['currentcertificationstatus'];?></span>

                            <div class="d-flex justify-content-between">





                                <div class="card-body">
                                    <div class="d-flex">

                                        <div class="pl-4">

                                            <span class="d-block h3 text-white mr-2 mb-1 mt-2"></span>

                                            <span class="d-block h3 text-white mr-2 mb-1 mt-4">Procedures :
                                                <?php echo $gpat_glue->determineNumberofCompleteReportCards($userid);?></span>

                                            <span class="d-block text-muted mr-2 mb-1 mt-0"
                                                style="font-size:1.5rem;">Incomplete GPATs :
                                                <?php echo $gpat_glue->determineNumberofIncompleteReportCards($userid);?></span>


                                           
                                        </div>
                                    </div>
                                </div>



                                <div class="card-body ml-5">
                                    <div class="d-flex">
                                      
                                        <div class="pl-4">
                                            <table>
                                                <tr>
                                                    <td> <span
                                                            class="d-block h1 text-white mr-2 mb-1">GPAT<sub>unweighted</sub></span>
                                                    </td>
                                                    <td><span id="gpat_unweighted"
                                                            class="ml-2 d-block h1 text-white mr-2 mb-1"><?php echo $gpat_glue->averageArray($gpat_glue->getUserFractionNonWeighted($userid, 3, false), false);?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> <span
                                                            class="d-block h1 text-white mr-2 mb-1 mt-2">GPAT<sub>weighted</sub></span>
                                                    </td>
                                                    <td><span id="gpat_weighted"
                                                            class="ml-2 d-block h1 text-white mr-2 mb-1 mt-2"><?php echo $gpat_glue->averageArray($gpat_glue->getUserFractionWeighted($userid, 3, false), false);?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> <span class="d-block h1 text-white mr-2 mb-1 mt-2">&Delta; 
                                                            GPAT<sub>1-month</sub></span></td>
                                                    <td><span id="gpat_delta"
                                                            class="ml-2 d-block h1 text-white mr-2 mb-1 mt-2"><?php echo $gpat_glue->getDeltaWeightedFraction($userid, 2, false);?></span>
                                                    </td>
                                                </tr>
                                            </table>
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="d-block h1 text-dark mr-2 mt-3 mb-0 p-3 bg-gieqsGold">

                                <p class="text-center mb-0"><?php echo $gpat_glue->statusText($userid); ?></p>
                            </div>





                            <hr class="divider divider-icon my-8" />
                            <p id="difficulty" class="section d-block h1 gieqsGold mr-2 mb-1 mt-0">Procedures Stratified
                                by Difficulty
                            </p>

                            <?php
                            $dataPoints = $gpat_glue->getSMSAUserReportCards($userid, 3, 1, 2, false);

?>

                            <div class="d-flex justify-content-end">

                                <p><?php $SMSAscores = $gpat_glue->getSMSAUserReportCards($userid, 3, 2, 1); //print_r($SMSAscores);?>
                                </p>
                                <table>
                                    <tr>
                                        <td> <span class="d-block h2 text-white mr-2 mb-1">SMSA<sub>2</sub>
                                                GPAT<sub>unweighted</sub></span>
                                        </td>
                                        <td><span id="gpat_unweighted"
                                                class="ml-2 d-block h1 text-white mr-2 mb-1"><?php echo $SMSAscores['SMSA2weightedgpat'];?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <span class="d-block h2 text-white mr-2 mb-1 mt-2">SMSA<sub>3</sub>
                                                GPAT<sub>unweighted</sub></span>
                                        </td>
                                        <td><span id="gpat_weighted"
                                                class="ml-2 d-block h1 text-white mr-2 mb-1 mt-2"><?php echo $SMSAscores['SMSA3weightedgpat'];?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <span class="d-block h2 text-white mr-2 mb-1 mt-2">SMSA<sub>4</sub>
                                                GPAT<sub>unweighted</sub></span>
                                        </td>
                                        <td><span id="gpat_weighted"
                                                class="ml-2 d-block h1 text-white mr-2 mb-1 mt-2"><?php echo $SMSAscores['SMSA4weightedgpat']?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <span class="d-block h2 text-white mr-2 mb-1 mt-2">SMSA<sub>+</sub>
                                                GPAT<sub>unweighted</sub></span>
                                        </td>
                                        <td><span id="gpat_weighted"
                                                class="ml-2 d-block h1 text-white mr-2 mb-1 mt-2"><?php echo $SMSAscores['SMSAplusweightedgpat'];?></span>
                                        </td>
                                    </tr>


                                </table>
                            </div>
                            <div id="chartContainer2" class="mb-4 mt-5" style="min-height: 370px; width: 100%;"></div>

                            <?php
                            $check3monthsSMSA = $gpat_glue->getSMSAUserReportCards($userid, 2, 2, 2, false);

                            if ($debug){

                                echo 'check3monthsSMSA is ';
                                var_dump($check3monthsSMSA);
                            }


                            if ($check3monthsSMSA){


                                $dataPoints5 = $gpat_glue->getSMSAUserReportCards($userid, 2, 2, 2, false);
                                $dataPoints6 = $gpat_glue->getSMSAUserReportCards($userid, 1, 2, 2, false);


                            }else{
                             $dataPoints5 = $gpat_glue->getSMSAUserReportCards($userid, 3, 2, 2, false);
                            
                            }
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             ?>





                            <div id="chartContainer4" class="mb-4 mt-5" style="min-height: 370px; width: 100%;"></div>

                            <?php

                            //get the last 3 month data ONLY IF the data for 3 months previous is available

                            //so check is there any data for 3 months ago?

                          

                            $check3months = $gpat_glue->getDomainSpecificsReportCards($userid, 2, false);

                            if ($debug){

                                echo 'check3months is ';
                                var_dump($check3months);
                            }

                            if ($check3months){

                                //unless false

                                

                                $dataPoints3 = $gpat_glue->getDomainSpecificsReportCards($userid, 2, false); //array specifics before last 3
                                $dataPoints4 = $gpat_glue->getDomainSpecificsReportCards($userid, 1, false); //array specifics last 3
                                
                                //chart to compare
                                //set the chart type here, probably a switch

                                if ($debug){

                                    echo 'both arrays shown <br/><br/>';
                                    echo '<pre>';
                                    var_dump($dataPoints3);
                                    echo '</pre>';
                                    echo '<br/><br/>';
                                    echo '<pre>';
                                    var_dump($dataPoints4);
                                    echo '</pre>';


                                }
    
                            }else{

                                //if false
                                $dataPoints3 = $gpat_glue->getDomainSpecificsReportCards($userid, 3, false); //array specifics all time

                            }

                            //$dataPoints4 = $gpat_glue->getDomainSpecificsReportCards($userid, 1, false); //array specifics last 3


?>
                            <hr class="divider divider-icon my-8" />

                            <p id="domains" class="section d-block h1 text-white mr-2 mb-1">Domain Specific Progress</p>


                            <div id="chartContainer3" class="mb-4 mt-5" style="min-height: 370px; width: 100%;"></div>




                            

                            <hr class="divider divider-icon my-8" />

                            <p id="certification" class="section d-block h1 text-white mr-2 mb-1">Certification</p>

                            <div class="d-flex justify-content-between mb-8">





                                <div class="card-body">
                                    <div class="d-flex">

                                        <div class="pl-4">


                                            <span class="d-block h3 text-white mr-2 mb-1 mt-2"></span>

                                            <span class="d-block h3 text-white mr-2 mb-1 mt-4">Current Status
                                            </span>

                                            <span class="d-block gieqsGold mr-2 mb-1 mt-0" style="font-size:1.5rem;">
                                                <?php echo $statement['currentcertificationstatus'];?></span>

                                            <span class="d-block h3 text-white mr-2 mb-1 mt-4">How do I become eligible
                                                for the next step in certification?
                                            </span>

                                            <span class="d-block gieqsGold mr-2 mb-1 mt-0" style="font-size:1.5rem;">
                                                <?php  echo $statement['howdoi'];?></span>


                                          
                                        </div>
                                    </div>
                                </div>



                                <div class="card-body ml-5">
                                    <div class="d-flex">
                                        
                                        <div class="pl-4">
                                            <table>
                                                <tr>
                                                    <td> <span
                                                            class="d-block h1 text-white mr-2 mb-1 mt-2">GPAT<sub>weighted</sub></span>
                                                    </td>
                                                    <td><span id="gpat_weighted"
                                                            class="ml-2 d-block h1 text-white mr-2 mb-1 mt-2"><?php echo $gpat_glue->averageArray($gpat_glue->getUserFractionWeighted($userid, 3, false), false);?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> <span class="d-block h1 text-white mr-2 mb-1 mt-2">required &Delta;
                                                            GPAT</sub></span></td>
                                                    <td><span id="gpat_delta"
                                                            class="ml-2 d-block h1 text-white mr-2 mb-1 mt-2"><?php echo $statement['deltagpat'];?></span>
                                                    </td>
                                                </tr>
                                            </table>
                                          
                                        </div>
                                    </div>
                                </div>

                            </div>







                            <div id="testing" class="d-none">
                                <p id="progress" class="section display-3">Progress</p>
                                <p><?php
                            
                            echo 'Testing';
                            echo '<br/><br/>';
                            var_dump($gpat_glue->getUserFractionNonWeighted($userid, 3, false));
                            echo '<br/><br/>';
                            var_dump($gpat_glue->getUserFractionWeighted($userid, 3, false));
                            echo '<br/><br/>';

                            $array = [0=>'0.25', 1=>'0.3'];

                            echo $gpat_glue->averageArray($gpat_glue->getUserFractionNonWeighted($userid, 3, false), true);
                            echo '<br/><br/>';
                            echo $gpat_glue->averageArray($gpat_glue->getUserFractionWeighted($userid, 3, false), true);

                            echo '<br/><br/>';
                            echo '<br/><br/>';

                            echo $gpat_glue->getDeltaWeightedFraction($userid, 2, true);

                            
                            ?></p>




                              

                            </div>

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

    

    <!-- Purpose JS -->
    <script src=<?php echo BASE_URL . "/assets/js/purpose.js"?>></script>
    <!-- <script src=<?php echo BASE_URL . "/assets/js/generaljs.js"?>></script> -->
    <script>
    var videoPassed = $("#id").text();
    </script>

    <script src=<?php echo BASE_URL . "/pages/learning/includes/social.js"?>></script>
    <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/js/canvasjs.min.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/js/jquery.canvasjs.min.js"></script>





    <script>
    //the number that are actually loaded

    var siteRoot = rootFolder;

    esdLesionPassed = $("#id").text();

    if (esdLesionPassed == "") {

        var edit = 0;

    } else {

        var edit = 1;

    }

    /*  CanvasJS.addColorSet("gieqsGold",
                 [//colorSet Array

                 "#2F4F4F",
                 "#008080",
                 "#2E8B57",
                 "#3CB371",
                 "#90EE90"                
                 ]); */

//chart colour scheme

                 CanvasJS.addColorSet("gieqsGold",
        [ //colorSet Array

            "#893101",
            "#CC5801",
            "#ED820E",
            "#DD571C",

        ]);

    

    var chart2 = new CanvasJS.Chart("chartContainer2", { //chart of SMSA
        animationEnabled: true,
        colorSet: "gieqsGold",
        backgroundColor: null,
        dataPointWidth: 40,

        title: {
            text: "SMSA of Complete Report Cards",
            fontColor: "#eec378",
            fontFamily: "arial",


        },
        axisY: {
            title: "Complete Report Cards (n)",
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
            title: "SMSA",
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

            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart2.render();

    function toggleDataSeriesChart3(e){
	
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart3.render();
    }
   

    var chart3 = new CanvasJS.Chart("chartContainer3", {  //chart for domains
        animationEnabled: true,
        colorSet: "gieqsGold",
        backgroundColor: null,
        dataPointWidth: 40,


        title: {
            text: "Domain Specific unweighted GPAT Scores",
            fontColor: "#eec378",
            fontFamily: "arial",


        },
        legend:{
		cursor: "pointer",
        fontColor: "white",
/* 		verticalAlign: "center",
		horizontalAlign: "right", */
		itemclick: toggleDataSeriesChart3
	},
        axisY: {
            title: "Domain Specific GPAT",
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
            title: "Domains",
            gridColor: "gray",
            fontColor: "white",
            tickColor: "white",
            lineThickness: 1,
            lineColor: "white",
            titleFontColor: "white",
            labelFontColor: "white",






        },
        data: [
        {
            showInLegend: true,
            type: "column",
            <?php if ($check3months){
                
                echo 'name: "Results > 3 months old",';

            }else{


                echo 'name: "All Time",';


            }
                
                ?>

            dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
        },
        <?php if ($check3months){?>
            {
            
            showInLegend: true,
            type: "column",
            name: "Recent results",

            dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
             },

        <?php } ?>

    
    ]
    });

    chart3.render();

    function toggleDataSeriesChart4(e){
	
    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
}
else{
    e.dataSeries.visible = true;
}
chart4.render();
}

    var chart4 = new CanvasJS.Chart("chartContainer4", {  //chart for SMSA stratified non-weighted GPAT
        animationEnabled: true,
        colorSet: "gieqsGold",
        backgroundColor: null,
        dataPointWidth: 40,


        title: {
            text: "SMSA stratified unweighted GPAT Scores",
            fontColor: "#eec378",
            fontFamily: "arial",


        },
        legend:{
		cursor: "pointer",
        fontColor: "white",
/* 		verticalAlign: "center",
		horizontalAlign: "right", */
		itemclick: toggleDataSeriesChart4
	},
        axisY: {
            title: "unweighted GPAT",
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
            title: "SMSA score",
            gridColor: "gray",
            fontColor: "white",
            tickColor: "white",
            lineThickness: 1,
            lineColor: "white",
            titleFontColor: "white",
            labelFontColor: "white",






        },
        data: [{
            showInLegend: true,
            type: "column",
            <?php if ($check3monthsSMSA){
                
                echo 'name: "Results > 3 months old",';

            }else{


                echo 'name: "All Time",';


            }
                
                ?>

            dataPoints: <?php echo json_encode($dataPoints5, JSON_NUMERIC_CHECK); ?>
        },
        <?php if ($check3monthsSMSA){?>
            {
            
            showInLegend: true,
            type: "column",
            name: "Recent results",

            dataPoints: <?php echo json_encode($dataPoints6, JSON_NUMERIC_CHECK); ?>
             },

        <?php } ?>]
    });

    chart4.render();

    

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

  

    $(document).ready(function() {



        //refreshNavAndTags();

        if (edit == 1) {

            fillForm(esdLesionPassed);
        }

        $('#refreshNavigation').click(function() {


            firstTime = 1;
            //the number that are actually loaded
            loaded = 1;

            //the number the user wants
            loadedRequired = 1;

            $('.tag').each(function() {

                if ($(this).is(":checked")) {

                    $(this).prop('checked', false);
                }


            })

            refreshNavAndTags();

        })

        //on load check if any are checked, if so load the videos

        //if none are checked load 10 most recent videos for these categories

        

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