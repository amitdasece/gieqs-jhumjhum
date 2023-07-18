

<?php require 'includes/config.inc.php';?>



<?php

define('WP_USE_THEMES', false);
spl_autoload_unregister ('class_loader');



//require(BASE_URI . '/assets/wp/wp-blog-header.php');
require(BASE_URI . '/assets/wp/wp-load.php');
spl_autoload_register ('class_loader');

?>

<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      $openaccess = 1;

      //$requiredUserLevel = 6;

      //blank previous browsing

      



      require BASE_URI . '/pages/learning/includes/head.php';

      $general = new general;

      //require_once(BASE_URI . '/assets/scripts/classes/users.class.php');
      $users = new users;
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
    <title>GIEQs Online Endoscopy Blog</title>

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

        require_once(BASE_URI . '/assets/scripts/classes/settings_manager.class.php');
        $settings_manager = new settings_manager;

        require_once(BASE_URI . '/assets/scripts/classes/blogs.class.php');
        $blogs = new blogs;

        require_once(BASE_URI . '/assets/scripts/classes/blogLink.class.php');
        $blogLink = new blogLink;


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

        <div class="main-content">
            <!-- Header (account) -->
            <section class="page-header bg-dark-dark d-flex align-items-end pt-8 mt-10"
                style="background-image: url('<?php echo BASE_URL;?>/assets/img/backgrounds/gent_wall_blue_v2.png'); background-repeat: no-repeat; background-size: cover; background-position: center center;"
                data-offset-top="#header-main">


                <!-- Header container -->
                <div class="container pt-0 pt-lg-0">
                    <div class="row">
                        <div class=" col-lg-12">
                            <!-- Salute + Small stats -->
                            <div class="row align-items-center mb-4">
                                <div class="col-auto mb-4 mb-md-0">
                                    <span class="h2 mb-0 text-white text-bold d-block">The GIEQs Online Blog.
                                        <?php //echo $_SESSION['firstname'] . ' ' . $_SESSION['surname']?></span>
                                    <span class="text-white">Everyday Endoscopy. Updated weekly.</span>
                                </div>
                                <!-- video -->
                                <div class="col-auto flex-fill d-none d-xl-block">
                                    <!-- <div id="videoDisplay" class="embed-responsive embed-responsive-16by9">
                <iframe  id='videoChapter' class="embed-responsive-item"
                    src='https://player.vimeo.com/video/398791515' allow='autoplay'
                    webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div> -->
                                </div>
                            </div>
                            <!-- Account navigation -->


                        </div>
                    </div>
                </div>
            </section>

             <?php 


            if (isset($userid)){
            require BASE_URI . '/pages/learning/assets/upgradeNav.php';
            
            }?>

            <?php if ($settings_manager->isBlogActive() === true){?>
            <section class="slice slice-lg bg-section-secondary delimiter-top delimiter-bottom pt-0 pt-5 pb-5">
               
               <div class="row d-flex flex-wrap align-items-lg-stretch py-4 px-6">
                    <h1 class="pl-10 display-5 w-100">GIEQs Live Blog</h1>
                    <p class="pl-10">We are currently broadcasting live from the Endoscopy Room.  Usually these events are archived for you to enjoy later on GIEQs Online.</p>
                    </div>
                    <div class="row d-flex flex-wrap align-items-lg-stretch py-4 px-6">

                    <div class="col-lg-1 pt-0">
                    </div>

                    <div class="col-lg-10 pt-0 p-4">

                        <div style="padding:56.25% 0 0 0;position:relative;"><iframe
                                src="https://vimeo.com/event/910289/embed/8a7dee8af0" frameborder="0"
                                allow="autoplay; fullscreen; picture-in-picture" allowfullscreen
                                style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe></div>
                    </div>
                    <div class="col-lg-1 pt-0">
                    </div>
                    </div>

            </section>

            <?php } ?>

            <section class="slice bg-section-secondary delimiter-top delimiter-bottom">
            <div class="container">

                <div class="mb-5 text-center">
<!--                     <h3 class=" mt-4">Latest from the blog</h3>
 -->                    <div class="fluid-paragraph mt-3">
                        <p class="lead lh-180">Little nuggets of learning focussed on Everyday techniques. Weekly LIVE blogs archived here, Monthly evening
                            round-ups.</p>
                    </div>
                </div>

                <?php





$maxToShow = 24;
$featuredFirst = true;




require(BASE_URI. '/pages/learning/scripts/show_blogs_wp.php');

?>





                </div>
        </section>

            <!-- <section class="slice slice-lg">
                <div class="container">
                    <div class="mb-5 text-center">
                        <h3 class=" mt-4">Subscribe for weekly updates from GIEQs</h3>
                        <div class="fluid-paragraph mt-3">
                            <p class="lead lh-180">Improving your knowledge of everyday endoscopy has never been easier.
                            </p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-7">
                            <form class="mt-4">
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-lg input-group-merge rounded-pill bg-dark">
                                        <input type="email" class="form-control form-control-flush" name="email"
                                            placeholder="Enter your email address"
                                            aria-label="Enter your email address">
                                        <div class="input-group-append">
                                            <button class="btn btn-dark" type="button">
                                                <span class="fas fa-paper-plane"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section> -->





        </div>

        <?php require BASE_URI . '/footer.php';?>

        <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
        <!-- <script src="assets/js/purpose.core.js"></script> -->
        <!-- Page JS -->



        <!-- Google maps -->

        <!-- Purpose JS -->
        <script src="../../assets/js/purpose.js"></script>
        <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
        <!-- <script src="assets/js/generaljs.js"></script> -->
        <script>
        var videoPassed = $("#id").text();
        </script>

        <script>
        var signup = $('#signup').text();



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