<?php require 'includes/config.inc.php';

define('WP_USE_THEMES', false);
spl_autoload_unregister ('class_loader');
require(BASE_URI . '/assets/wp/wp-load.php');
spl_autoload_register ('class_loader');

//error_reporting(E_ALL);


      //define user access level

      //$openaccess = 1;

      $requiredUserLevel = 6;

      //blank previous browsing
      require BASE_URI . '/pages/learning/includes/head.php';


      setcookie('browsing', null, time() + (365 * 24 * 60 * 60), '/');

      setcookie('browsing_id', null, time() + (365 * 24 * 60 * 60), '/');

      setcookie('browsing_array', null, time() + (365 * 24 * 60 * 60), '/');




      $general = new general;

      //require_once(BASE_URI . '/assets/scripts/classes/users.class.php');
      $users = new users;
      $userActivity = new userActivity;
      $userFunctions = new userFunctions;


      $navigator = new navigator;

      function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime('now', new DateTimeZone('UTC'));     
        $ago = new DateTime($datetime, new DateTimeZone('UTC'));
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }


      ?>

    <!--Page title-->
    <title>GIEQs Online Endoscopy Trainer</title>

    <script src=<?php echo BASE_URL . "/assets/js/jquery.vimeo.api.min.js"?>></script>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">



    <style>
    .gieqsGold {

        color: rgb(238, 195, 120);


    }

    .tagButton {

        cursor: pointer;

    }

    .tagCard {

        background-color: #1b385d75;



    }

    .tagCardHeader {

        background-color: #162e4d;

    }



    .cursor-pointer {

        cursor: pointer;

    }

    @supports ((position: -webkit-sticky) or (position: sticky)) {

        .sticky-top {
            position: -webkit-sticky !important;
            position: sticky !important;
            z-index: 1020;
            top: 0;
        }
    }


    @media (min-width: 992px) {
        .tagCard {


            left: -50vw;
            top: -20vh;


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

        #selectDropdown {


            z-index: 25;
        }

    }

    /*
 * Variables
 */
    :root {
        --card-padding: 24px;
        --card-height: 480px;
        --card-skeleton: linear-gradient(#193659 var(--card-height), transparent 0);
        --avatar-size: 32px;
        --avatar-position: var(--card-padding) var(--card-padding);
        --avatar-skeleton: radial-gradient(circle 16px at center, #162e4d 99%, transparent 0);
        --title-height: 32px;
        --title-width: 200px;
        --title-position: var(--card-padding) 180px;
        --title-skeleton: linear-gradient(#162e4d var(--title-height), transparent 0);
        --desc-line-height: 16px;
        --desc-line-skeleton: linear-gradient(#162e4d var(--desc-line-height), transparent 0);
        --desc-line-1-width: 230px;
        --desc-line-1-position: var(--card-padding) 242px;
        --desc-line-2-width: 180px;
        --desc-line-2-position: var(--card-padding) 265px;
        --footer-height: 40px;
        --footer-position: 0 calc(var(--card-height) - var(--footer-height));
        --footer-skeleton: linear-gradient(#162e4d var(--footer-height), transparent 0);
        --blur-width: 200px;
        --blur-size: var(--blur-width) calc(var(--card-height) - var(--footer-height));
    }

    /*
 * Card Skeleton for Loading
 */
    .card-skeleton {
        width: 280px;
        height: var(--card-height);
    }

    .card-skeleton:empty::after {
        content: "";
        display: block;
        width: 100%;
        height: 100%;
        border-radius: 6px;
        box-shadow: 0 10px 45px rgba(0, 0, 0, 0.1);
        background-image: linear-gradient(90deg, rgba(238, 195, 120, 0) 0, rgba(238, 195, 120, 0.8) 50%, rgba(238, 195, 120, 0) 100%), var(--title-skeleton), var(--desc-line-skeleton), var(--desc-line-skeleton), var(--avatar-skeleton), var(--footer-skeleton), var(--card-skeleton);
        background-size: var(--blur-size), var(--title-width) var(--title-height), var(--desc-line-1-width) var(--desc-line-height), var(--desc-line-2-width) var(--desc-line-height), var(--avatar-size) var(--avatar-size), 100% var(--footer-height), 100% 100%;
        background-position: -150% 0, var(--title-position), var(--desc-line-1-position), var(--desc-line-2-position), var(--avatar-position), var(--footer-position), 0 0;
        background-repeat: no-repeat;
        -webkit-animation: loading 1.5s infinite;
        animation: loading 1.5s infinite;
    }

    /*  background-image: linear-gradient(90deg, rgba(211, 211, 211, 0) 0, rgba(211, 211, 211, 0.8) 50%, rgba(211, 211, 211, 0) 100%), var(--title-skeleton), var(--desc-line-skeleton), var(--desc-line-skeleton), var(--avatar-skeleton), var(--footer-skeleton), var(--card-skeleton);
*/

    @-webkit-keyframes loading {
        to {
            background-position: 350% 0, var(--title-position), var(--desc-line-1-position), var(--desc-line-2-position), var(--avatar-position), var(--footer-position), 0 0;
        }
    }

    @keyframes loading {
        to {
            background-position: 350% 0, var(--title-position), var(--desc-line-1-position), var(--desc-line-2-position), var(--avatar-position), var(--footer-position), 0 0;
        }
    }

    .demo {
        margin: auto;
        width: 300px;
        height: 700px;
        /* change height to see repeat-y behavior */

        background-image:
            radial-gradient(circle 16px, white 99%, transparent 0),
            /* layer 1: title */
            /* white rectangle with 40px height */
            linear-gradient(white 40px, transparent 0),
            /* layer 0: card bg */
            /* gray rectangle that covers whole element */
            linear-gradient(gray 100%, transparent 0);

        background-repeat: no-repeat;

        background-size:
            32px 32px,
            /* avatar */
            200px 40px,
            /* title */
            100% 100%;
        /* card bg */

        background-position:
            24px 24px,
            /* avatar */
            24px 200px,
            /* title */
            0 0;
        /* card bg */

        animation: shine 1s infinite;
    }

    @keyframes shine {
        to {
            background-position:
                350% 0,
                200px
                /*var(--title-position)*/
                ,
                var(--desc-line-1-position),
                var(--desc-line-2-position),
                var(--avatar-position),
                var(--footer-position),
                0 0
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

        <?php
        $usersMetricsManager = new usersMetricsManager;
        $usersViewsVideo = new usersViewsVideo;
        $usersSocial = new usersSocial;

        require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
        $assetManager = new assetManager;

        require_once BASE_URI . '/assets/scripts/classes/coin.class.php';
        $coin = new coin;

        $video_PDO = new video_PDO;


        $debug = false;
    ?>






    </header>

    <?php
		if (isset($_GET["id"]) && is_numeric($_GET["id"])){
			$id = $_GET["id"];
		
		}else{
		
			$id = null;
		
		}

        
				        
                        
                        
		
        ?>

    <!-- load all video data -->

    <body>

        <div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>

        <div class="main-content pt-4 mt-10">

            
            <?php require BASE_URI . '/pages/learning/assets/upgradeNav.php';?>

            <?php require BASE_URI . '/pages/learning/assets/materialNav.php';?>



            <!-- GIEQs II Filler -->
<?php


if ($assetManager->doesUserHaveSameAssetAlready('95', $userid, false) === false){


?>


<section class="slice delimiter-bottom m-0 p-2" id="GIII">
    <div class="container pt-0 pt-lg-0">

        <div class="actions-toolbar py-2">
            <!--  <h5 class="mb-1">Your GIEQs Stats</h5>
                        <p class="text-sm text-muted mb-0">How GIEQy are you <?php //echo $_SESSION['firstname'];?>?</p> -->
        </div>

        <?php         if (($gieqs_iii_is_live === true)){?>

<div class="">
    <div class="row p-3">

        <p class="h4">GIEQs III is LIVE.  Click below for Immediate Access.</p>

        <p><a href="<?php echo BASE_URL;?>/pro-content/95&action=register" id="register" type="button"
            class="btn btn-small text-dark btn-fill-gieqsGold m-1 ml-4 py-1">Access Now (if registered)</a></p>

            <p class="h4">Not yet registered?  Get immediate access below.</p>

        <p style="font-size:1.25rem;"><a href="https://twitter.com/search/?q=%23GIEQs_III"
                target="_blank">#GIEQs_III</a> is the the Only Endoscopy Symposium focussed on Everyday
            Endoscopy Techniques.
            29/30 Sept '22. Join Michael Bourke, @JTA_Endo, @RolandValori, @RafBisschopsBE, @djtate, @PieterHindryckx.
        </p>

        <p style="font-size:1.25rem;"><a href="https://twitter.com/search/?q=%23GIEQs_III"
                target="_blank">#GIEQs_III</a> has been awarded <strong>16 CME Points</strong> by EACCME and is endorsed by the European Society of Gastrointestinal Endoscopy (ESGE) and the American Society of Gastrointestinal Endoscopy (ASGE).</p>
        
   
        <p><a href="<?php echo BASE_URL;?>/pro-content/95&action=register" id="register" type="button"
            class="btn btn-small text-dark btn-fill-gieqsGold m-1 ml-4 py-1">Register Here</a></p>
        

    </div>
</div>

<?php  }else{?>


    <div class="">
            <div class="row p-3">

                <p class="h4">We Streamed GIEQs III to > 500 Endoscopists and Captured it All in HD.</p>
        </div>
        <div class="row p-3">
                <p class="h4">Watch it in Full from 4/10.</p>

                <p style="font-size:1.25rem;"><a href="https://twitter.com/search/?q=%23GIEQs_III"
                        target="_blank">#GIEQs_III</a> is the the Only Endoscopy Symposium focussed on Everyday
                    Endoscopy Techniques.</p>
                    <p style="font-size:1.25rem;">On Demand sessions from Michael Bourke, @JTA_Endo, @RolandValori, @RafBisschopsBE, @djtate, @PieterHindryckx.
                </p>

                <a href="<?php echo BASE_URL;?>/login?destination=viewasset&assetid=95" id="register" type="button" class="btn btn-small text-dark btn-fill-gieqsGold m-1 ml-4 py-1">Immediate Access</a>
            
                

            </div>
        </div>


<?php } ?>


<?php

}else{

    if (($gieqs_iii_is_live === true)){   ?>





<section class="slice delimiter-bottom m-0 p-2" id="GIII">
    <div class="container pt-0 pt-lg-0">


<div class="">
    <div class="row p-3">

        <p class="h4">GIEQs III is LIVE.  Click here to enter the experience. </p>
        <p style="font-size:1.25rem;"><a href="https://twitter.com/search/?q=%23GIEQs_III"
                target="_blank">#GIEQs_III</a> (Twitter) and <a href="https://www.facebook.com/hashtag/gieqs_iii"
                target="_blank">#GIEQs_III</a> (Facebook) and  are the hashtags to keep track of the event on Twitter.
        </p>

        <p style="font-size:1.25rem;"><a href="https://twitter.com/search/?q=%23GIEQs_III"
                target="_blank">#GIEQs_III</a> has been awarded <strong>16 CME Points</strong> by EACCME and is endorsed by the European Society of Gastrointestinal Endoscopy (ESGE) and the American Society of Gastrointestinal Endoscopy (ASGE).</p>
        
   
        <p><a href="<?php echo BASE_URL;?>/login?destination=viewasset&assetid=95" id="register" type="button"
            class="btn btn-small text-dark btn-fill-gieqsGold m-1 ml-4 py-1">View the Live Stream Here</a></p>
        

    </div>
</div>


    </div>
</section>













<?php

    }


}

$content = apply_filters('the_content', get_post_field('post_content', '768'));

?>



<div class="container blog-container pt-4">

<?php
echo $content;

?>

</div>



            <!-- New material -->


          
             


        </div>

        <?php require BASE_URI . '/footer.php';?>

        <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
        <!-- <script src="assets/js/purpose.core.js"></script> -->
        <!-- Page JS -->



        <!-- Google maps -->

        <!-- Purpose JS -->
        <script src="../../assets/js/purpose.js"></script>
        <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
        <script>
        var videoPassed = $("#id").text();
        </script>

        <script>
        var signup = $('#signup').text();

        function getNew() {

            const dataToSend = {

            }

            const jsonString = JSON.stringify(dataToSend);
            console.log(jsonString);

            var request2 = $.ajax({
                url: siteRoot + "scripts/getNewVideos.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request2.done(function(data) {
                // alert( "success" );
                $('#whats-new').find('.placeholder').html(data);
                //$(document).find('.Thursday').hide();
            })


        }

        function getRecentViewed() {

            const dataToSend = {

            }

            const jsonString = JSON.stringify(dataToSend);
            console.log(jsonString);

            var request2 = $.ajax({
                url: siteRoot + "scripts/getRecentViewedVideos.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request2.done(function(data) {
                // alert( "success" );
                $('#catchup').find('.placeholder').html(data);
                //$(document).find('.Thursday').hide();
            })


        }

        function getTopVideos() {

const dataToSend = {

}

const jsonString = JSON.stringify(dataToSend);
console.log(jsonString);

var request2 = $.ajax({
    url: siteRoot + "scripts/getTopVideos.php",
    type: "POST",
    contentType: "application/json",
    data: jsonString,
});



request2.done(function(data) {
    // alert( "success" );
    $('#top6').find('.placeholder').html(data);
    //$(document).find('.Thursday').hide();
})


}

        function getNextSteps() {

            const dataToSend = {

            }

            const jsonString = JSON.stringify(dataToSend);
            console.log(jsonString);

            var request2 = $.ajax({
                url: siteRoot + "scripts/getNextStepsVideos.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request2.done(function(data) {
                // alert( "success" );
                $('#suggested').find('.placeholder').html(data);
                //$(document).find('.Thursday').hide();
            })


        }

        function getPopular() {

            const dataToSend = {

            }

            const jsonString = JSON.stringify(dataToSend);
            console.log(jsonString);

            var request2 = $.ajax({
                url: siteRoot + "scripts/getPopularVideos.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request2.done(function(data) {
                // alert( "success" );
                $('#popular').find('.placeholder').html(data);
                //$(document).find('.Thursday').hide();
            })


        }

        function submitPreRegisterForm() {

            var esdLesionObject = pushDataFromFormAJAX("pre-register", "preRegister", "id", null,
                "0"); //insert new object

            esdLesionObject.done(function(data) {

                console.log(data);

                var dataTrim = data.trim();

                console.log(dataTrim);

                if (dataTrim) {

                    try {

                        dataTrim = parseInt(dataTrim);

                        if (dataTrim > 0) {

                            alert("Thank you for your details.  We will keep you updated on everything GIEQs.");
                            $("[data-dismiss=modal]").trigger({
                                type: "click"
                            });

                        }

                    } catch (error) {

                        //data not entered
                        console.log('error parsing integer');
                        $("[data-dismiss=modal]").trigger({
                            type: "click"
                        });


                    }

                    //$('#success').text("New esdLesion no "+data+" created");
                    //$('#successWrapper').show();
                    /* $("#successWrapper").fadeTo(4000, 500).slideUp(500, function() {
                      $("#successWrapper").slideUp(500);
                    });
                    edit = 1;
                    $("#id").text(data);
                    esdLesionPassed = data;
                    fillForm(data); */




                } else {

                    alert("No data inserted, try again");

                }


            });
        }

        $(document).ready(function() {


            getNew();
            getRecentViewed();
            getNextSteps();
            getPopular();
            getTopVideos();

            if (videoPassed == 2345){

                $('.subscribe-now').click();


            }

            /* $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#collapseExample').length && 
                    $('#collapseExample').is(":visible")) {
                        $('#collapseExample').collapse('hide');
                    }        
            }); */

            $(document).click(function(event) {
                $target = $(event.target);

                if (!$target.closest('#selectDropdown').length &&
                    $('#selectDropdown').is(":visible")) {
                    $('#selectDropdown').collapse('hide');
                }
            });

            $(document).click(function(event) {
                $target = $(event.target);

                if (!$target.closest('#collapseExample2').length &&
                    $('#collapseExample2').is(":visible")) {
                    $('#collapseExample2').collapse('hide');
                }
            });

            $(document).click(function(event) {
                $target = $(event.target);

                if (!$target.closest('#collapseExample3').length &&
                    $('#collapseExample3').is(":visible")) {
                    $('#collapseExample3').collapse('hide');
                }
            });

            $(document).on('click', '.tagsClose', function() {

                $('#collapseExample').collapse('hide');

            })

            $('.referencelist').on('click', function() {


                //get the tag name

                var searchTerm = $(this).attr('data');

                //console.log("https://www.ncbi.nlm.nih.gov/pubmed/?term="+searchTerm);

                PopupCenter("https://www.ncbi.nlm.nih.gov/pubmed/?term=" + searchTerm,
                    'PubMed Search (endoWiki)', 800, 700);





            })

            $('.referencelist').on('mouseenter', function() {

                $(this).css('color', 'rgb(238, 194, 120)');
                $(this).css('cursor', 'pointer');

            })

            $('.referencelist').on('mouseleave', function() {

                $(this).css('color', 'white');
                $(this).css('cursor', 'default');

            })


        })
        </script>
    </body>

</html>