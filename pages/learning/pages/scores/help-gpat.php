

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
    <title>GPAT Help</title>

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">


    <style>
    .divider-icon::before {

        border-bottom: 1px solid #6e84a3 !important;
    }

    .divider-icon::after {

        border-bottom: 1px solid #6e84a3 !important;
    }

    .gieqsGold {

        color: rgb(238, 194, 120);


    }

    .text-container p {

        font-size: 1.3rem !important;
    }

    .text-container p strong {

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
            <p class="h1 mt-5">GPAT Explainer</p>


        </div>
        <div class="d-flex align-items-end container">
            <p class="text-muted pl-4 mt-2">All the information you need to progress in your Polypectomy Practice with
                GPAT</p>

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


                                   
                                </ul>










                            </div>

                        </div>

                        <div class="col-lg-9 text-container">


                            <?php
          
            
            ?>




                            <?php $statement=$gpat_glue->howDoICertify($userid);?>

                            <!--Heading -->
                            <span id="whatisgpat" data-toc="What is GPAT?" class="d-block h1 text-white mr-2 mb-3 toc-item">What is GPAT?</span>

                            <p>GPAT (or Global Polypectomy Assessment Tool) is an online scoring system to determine
                                proficiency at, and the difficulty of, colorectal polypectomy.</p>


                            <hr class="divider divider-icon my-6 text-muted" />


                            <!--Heading -->
                            <span id="underlyingidea" data-toc="The Underlying Idea" class="d-block h1 text-white mr-2 mb-3 toc-item">What is the
                                underlying idea?</span>

                            <p>GPAT provides multiple outputs to give insight into proficiency at polypectomy, whilst
                                respecting the fact that competency and training are very dependent upon the difficulty
                                of the polyp being attempted.</p>

                            <p>To this end all GPAT outp
                                ts are stratified by validated instruments to determine the
                                difficulty of polypetomy (namely the SMSA score <sup>(1,2)</sup> and the SMSA + score
                                <sup>(3,4)</sup>).
                            </p>

                            <p>Unlike other scoring systems the GPAT is specifically designed to be applicable to all
                                types of colorectal polyp. Whilst we develop GPAT outputs for cold snare (diminutive)
                                are limited as are those for pedunculated polypectomy. Development of these will occur
                                over time.</p>

                            <!--Gold Block -->
                            <div class="d-block h1 text-dark mr-2 my-5 p-3 bg-gieqsGold">
                                <p class="text-center mb-0">GPAT outputs a weighted and unweighted fraction score
                                    (GPAT<sub>w</sub> and GPAT<sub>unw</sub>)</p>
                            </div>


                            <span id="main_outputs" data-toc="What do the Outputs Mean?" class="d-block h1 text-white mr-2 mb-3 toc-item">What do the main outputs
                                of GPAT mean?</span>

                            <p style="font-size:1.3rem;">The unweighted GPAT (GPAT<sub>unw</sub>) recognises proficiency
                                in the <strong>same way across all difficulties
                                    of polypectomy</strong>. It is useful to track progress over time within domains and
                                within different categories of difficulty.</p>

                                <p>The weighted GPAT (GPAT<sub>w</sub>) recognises proficiency <strong>in the context of difficulty</strong>.  One of the
                            major problems in comparing proficiency across a broad range of polyp resections is accounting for difficulty.  
                        The weighted GPAT makes this possible by decreasing the proficiency score over a range of easier SMSA scores.  For example
                    scores for SMSA 2 are multiplied by 0.25, SMSA 3 by 0.5 etc.</p>

                    <p>Of course your GPAT will not be reliable after 1 procedure.  This is why we have set a threshold of 30 procedures to determine
                        the GPAT for certification purposes.  All of these endpoints are subject to ongoing research and by using this platform
                        you <strong>explicitly consent to the use of your anonymised data for research</strong> to make the score and platform better
                    </p>

                            <hr class="divider divider-icon my-6 text-muted" />

                            <span id="references" data-toc="References" class="d-block h1 text-white mr-2 mb-3 toc-item">References</span>

                            <P><sup>1</sup> SMSA Score -- Gupta S, Miskovic D, Bhandari P, Dolwani S, McKaig B, Pullan
                                R,
                                Rembacken B, Riley S, Rutter MD, Suzuki N, Tsiamoulos Z, Valori R, Vance ME, Faiz OD,
                                Saunders BP, Thomas-Gibson S. A novel method for determining the difficulty of
                                colonoscopic polypectomy. Frontline Gastroenterol. 2013 Oct;4(4):244-248. doi:
                                10.1136/flgastro-2013-100331. Epub 2013 Jun 1. PMID: 28839733; PMCID: PMC5369843. </P>

                            <P><sup>2</sup> SMSA in Larger &ge; 20mm LNPCPs -- Sidhu M, Tate DJ, Desomer L, Brown G,
                                Hourigan LF, Lee
                                EYT, Moss A, Raftopoulos S, Singh R, Williams SJ, Zanati S, Burgess N, Bourke MJ. The
                                size, morphology, site, and access score predicts critical outcomes of endoscopic
                                mucosal resection in the colon. Endoscopy. 2018 Jul;50(7):684-692. doi:
                                10.1055/s-0043-124081. Epub 2018 Jan 25. Erratum in: Endoscopy. 2018 Jul;50(7):C7. PMID:
                                29370584. </P>
                            <P><sup>3</sup> SMSA+ score (expert opinion) -- Anderson J, Lockett M. Training in
                                therapeutic endoscopy: meeting present
                                and future challenges. Frontline Gastroenterol. 2019;10(2):135-140.
                                doi:10.1136/flgastro-2018-101086</P>


                            <P><sup>4</sup>SMSA-EMR score (data driven, abstract only) -- <a
                                    href="https://www.giejournal.org/article/S0016-5107(18)32295-8/pdf">SMSA-EMR SCORE
                                    IS A NOVEL ENDOSCOPIC RISK ASSESSMENT TOOL FOR PREDICTING CRITICAL
                                    ENDOSCOPIC MUCOSAL RESECTION OUTCOMES</a> - Volume 87, No. 6S : 2018
                                GASTROINTESTINAL ENDOSCOPY AB467 </P>

                            <!--  <p>Deep Mural Injury Score -- <a href="https://pubmed.ncbi.nlm.nih.gov/27464708/">Burgess
                                    NG, Bassan MS, McLeod D, Williams SJ, Byth K, Bourke MJ. Deep mural injury and
                                    perforation after colonic endoscopic mucosal resection: a new classification and
                                    analysis of risk factors. Gut. 2017 Oct;66(10):1779-1789. doi:
                                    10.1136/gutjnl-2015-309848. Epub 2016 Jul 27. PMID: 27464708.</a></p>
 -->

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





    <script>
    //the number that are actually loaded

    var siteRoot = rootFolder;

    esdLesionPassed = $("#id").text();

    if (esdLesionPassed == "") {

        var edit = 0;

    } else {

        var edit = 1;

    }


    function generateTOC() {

        var statement = '';

        $('.toc-item').each(function() {

            var id = null;
            id = $(this).attr('id');
            text = $(this).attr('data-toc');
            statement +=
                '<li class="toc-entry toc-h4" style="font-size:1.1rem;"><a class="text-muted" href="#' + id +
                '">' + text + '</a></li>';

        })

        $('.section-nav').html(statement);



    }



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


       generateTOC();
        //refreshNavAndTags();

        waitForFinalEvent(function(){
            generateTOC();

			
	    }, 1000, "Resize header");

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