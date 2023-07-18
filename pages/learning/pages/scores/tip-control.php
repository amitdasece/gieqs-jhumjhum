
<meta name="viewport" content="width=device-width, initial-scale=1.0">


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
    <title>GIEQs Online Endoscopy Trainer - Tip-Control</title>



    <style>

    body {

        touch-action: pan-x pan-y;
             
    }

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
            height: 250px;
        }

        .card-placeholder {

            width: 204px;

        }


    }

    @media (min-width: 1200px) {
        #chapterSelectorDiv {



            top: -3vh;


        }

        #playerContainer {

            margin-top: -20px;

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



    <div class="main-content bg-gradient-dark">

        <!--Header CHANGEME-->



        <div class="container p-4">

            <div class="row">

                <p class="h1 mt-10">Tip Control Study</p>
                <p class="h6"></p>

            </div>
            <div class="row">

                <div class="col-sm-6">

                    <div class="row">

                        <div class="p-3">
                            <button id="startButton" class="btn btn-sm btn-primary m-1">Start</button>
                            <button id="stopButton" class="btn btn-sm btn-danger m-1">Stop</button>
                        </div>
                        <br /><br />
                        <div class="p-3">
                            <button id="correctButton" class="btn btn-lg btn-success m-1">Correct</button>
                            <button id="incorrectButton" class="btn btn-lg btn-warning m-1">Incorrect</button>
                        </div>
                    </div>

                  

                </div>
                <div class="col-sm-6">

                    <p class="h2 score">Accuracy is <span id="scoreResult"></span></p>
                    <p class="text-white segments mt-3">Timer&nbsp;<span id="timer-minutes"></span>&nbsp;<span
                            id="timer-seconds"></span></p>

                    <p class="text-white segments mt-3">Correct Hits <span id="correct"></span></p>
                    <p class="text-white segments mt-3">Incorrect Hits <span id="incorrect"></span></p>

                    <p class="text-white segments mt-3">Correct Hits / Second <span id="correctHitsPerSecond"></span>
                    </p>


                    <p class="text-white mt-3">This data is automatically copied to the clipboard</p>
                    <button class="btn btn-sm btn-dark mt-3"
                        onclick="TTimer.clearSession();location.reload(); ">Reset</button>


                </div>
            </div>
            <div class="row">

<p class="py-4" id="reportCard"></p>

</div>

            <div class="row">
                <small>Click Start. Each time a correct application is made on the margin click correct. If an
                    application is made outside the margin click incorrect. When finished click stop.</small>
            </div>
        </div>
    </div>
    <!-- Omnisearch -->






    <!-- Modal -->


    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="assets/js/purpose.core.js"></script> -->
    <!-- Page JS -->
    <!-- Google maps -->

    <!-- Purpose JS -->
    <script src="<?php echo BASE_URL . "/assets/js/purpose.js";?>"></script>
    <!-- <script src=<?php echo BASE_URL . "/assets/js/generaljs.js";?>></script> -->


    <script>
    var incorrect = 0;
    var correct = 0;

    var start = false;
    var stop = false;

    var scoreResult = 0;


    function roundToTwo(num) {
        return +(Math.round(num + "e+2") + "e-2");
    }

    

    //var totalScore = 0;

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

    var TTimer = {
        startedTime: new Date(),
        restoredFromSession: false,
        started: false,
        minutes: 0,
        seconds: 0,
        tick: function tick() {
            // Since setInterval is not reliable in inactive windows/tabs we are using date diff.
            var diffInSeconds = Math.floor((new Date() - this.startedTime) / 1000);
            this.minutes = Math.floor(diffInSeconds / 60);
            this.seconds = diffInSeconds - this.minutes * 60;
            this.render();
            this.updateSession();
        },
        utilities: {
            pad: function pad(number) {
                return number < 10 ? "0" + number : number;
            }
        },
        container: function container() {
            return $(document);
        },
        render: function render() {
            this.container()
                .find("#timer-minutes")
                .text(this.utilities.pad(this.minutes));
            this.container()
                .find("#timer-seconds")
                .text(this.utilities.pad(this.seconds));
        },
        updateSession: function updateSession() {
            sessionStorage.setItem("timerStartedTime", this.startedTime);
        },
        clearSession: function clearSession() {
            sessionStorage.removeItem("timerStartedTime");
        },
        restoreFromSession: function restoreFromSession() {
            // Using sessionsStorage to make the timer persistent
            if (typeof Storage == "undefined") {
                console.log("No sessionStorage Support");
                return;
            }

            if (sessionStorage.getItem("timerStartedTime") !== null) {
                this.restoredFromSession = true;
                this.startedTime = new Date(sessionStorage.getItem("timerStartedTime"));
            }
        },
        start: function start() {
            /* this.restoreFromSession(); */
            this.startedTime = new Date();
            this.stop();
            this.started = true;
            this.tick();
            this.timerId = setInterval(this.tick.bind(this), 1000);
        },
        stop: function stop() {
            this.started = false;
            clearInterval(this.timerId);
            this.render();
        }
    };





    function updateScore() {


        //var totalScore = OQ1 + OQ2 + OQ3 + OQ4 + TF1 + TF2 + TF3 + AO;

        var fractionScore = correct / scoreResult;
        fractionScore = roundToTwo(fractionScore);

        $('#scoreResult').text(fractionScore * 100 + '%');
        $('#correct').text(correct);
        $('#incorrect').text(incorrect);

        timeMinutes = TTimer.minutes;
        timeSeconds = TTimer.seconds;

        var hitsPerSecond = correct / ((timeMinutes * 60) + timeSeconds);
        hitsPerSecond = roundToTwo(hitsPerSecond);

        $('#correctHitsPerSecond').text(hitsPerSecond);




        /* var visualisedSegments = OQ1visualised ? 'OQ1, ' : '';
        visualisedSegments += OQ2visualised ? 'OQ2, ' : '';
        visualisedSegments += OQ3visualised ? 'OQ3, ' : '';
        visualisedSegments += OQ4visualised ? 'OQ4, ' : '';
        visualisedSegments += TF1visualised ? 'TF1, ' : '';
        visualisedSegments += TF2visualised ? 'TF2, ' : '';
        visualisedSegments += TF3visualised ? 'TF3, ' : '';
        visualisedSegments += AOvisualised ? 'AO, ' : ''; */

        //create an object

        var scoreObject = {

            "Accuracy": fractionScore,
            "Total Time": ((timeMinutes * 60) + timeSeconds),
            "Correct Hits Per Second": hitsPerSecond,
            "Correct": correct,
            "Incorrect": incorrect,
            "Total": correct + incorrect,




        }

        var report = "Tip Control Report: <br/> Accuracy was " + (fractionScore * 100) +
            " %.<br/>  Total time elapsed was " + ((timeMinutes * 60) + timeSeconds) + " seconds. <br/>" + correct +
            " of " + (correct + incorrect) + " (" + (fractionScore * 100) +
            " %) of hits were on target.<br/>  There were " + hitsPerSecond + " on-target hits per second.";

        //console.log(report);

        $('#reportCard').html(report);


        console.log(JSON.stringify(scoreObject));

        copyToClipboard(JSON.stringify(scoreObject));



        /*         OQ3visualised ? 'OQ3' : '' + OQ4visualised ? 'OQ4' : '' + TF1visualised ? 'TF1' : '' + TF2visualised ? 'TF2' : '' + TF3visualised ? 'TF3' : '' + AOvisualised ? 'AO' : '';
         */ //$('#segments').text(visualisedSegments);


    }
    </script>


    <script>
    //the number that are actually loaded


    $(document).ready(function() {



        TTimer.stop();
        TTimer.clearSession();


        $('#correctButton').click(function() {

            if (TTimer.started === false) {

                TTimer.clearSession();

                TTimer.start();



            };

            //TTimer.start();
            correct = correct + 1;
            scoreResult = correct + incorrect;
            updateScore();

        })

        $('#incorrectButton').click(function() {

            if (TTimer.started === false) {

                TTimer.start();



            };
            incorrect = incorrect + 1;
            scoreResult = correct + incorrect;
            updateScore();


        })

        $('#startButton').click(function() {

            if (TTimer.started === false && stop === false) {

                TTimer.clearSession();

                TTimer.start();

                start = true;

                $('#startButton').attr('disabled', true);




            };



        })

        $('#stopButton').click(function() {

            if (TTimer.started === true) {

                TTimer.stop();

                updateScore();

                TTimer.clearSession();

                stop = true;

                $('#startButton').attr('disabled', true);

                $('#correctButton').attr('disabled', true);


                $('#incorrectButton').attr('disabled', true);


                $(this).attr('disabled', true);



            };



        })



       




        //refreshNavAndTags();

       









    })
    </script>
</body>

</html>