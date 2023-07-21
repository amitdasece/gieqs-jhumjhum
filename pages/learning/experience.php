<?php require 'includes/config.inc.php';

define('WP_USE_THEMES', false);
spl_autoload_unregister ('class_loader');
require(BASE_URI . '/assets/wp/wp-load.php');
spl_autoload_register ('class_loader');

error_reporting(E_ALL);


      //define user access level

      //$openaccess = 1;

      $requiredUserLevel = 6;
        //echo BASE_URI;
      //blank previous browsing
      require BASE_URI . '/pages/learning/includes/head.php';
      require_once(BASE_URI . '/assets/scripts/classes/pages.class.php');
     $pages = new pages;

      setcookie('browsing', null, time() + (365 * 24 * 60 * 60), '/');

      setcookie('browsing_id', null, time() + (365 * 24 * 60 * 60), '/');

      setcookie('browsing_array', null, time() + (365 * 24 * 60 * 60), '/');

      

      

     

      require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
      $assetManager = new assetManager;

      require_once(BASE_URI . '/assets/scripts/classes/courseManager.class.php');
      $courseManager = new courseManager;

      require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
    $assets_paid = new assets_paid;

    require_once(BASE_URI . '/assets/scripts/classes/programmeView.class.php');

    $programmeView = new programmeView;

    

    

    require_once BASE_URI . '/assets/scripts/classes/userActivity.class.php';
      $userActivity = new userActivity;

      require_once BASE_URI . '/assets/scripts/classes/responses.class.php';
      $responses = new responses;

      require_once BASE_URI . '/assets/scripts/classes/sessionView.class.php';
    $sessionView = new sessionView;

    require_once BASE_URI . '/pages/learning/classes/usersMetricsManager.class.php';
    $usersMetricsManager = new usersMetricsManager;





      

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

    <link
        href="<?php echo BASE_URL;?>/node_modules/bootstrap-tour/build/css/bootstrap-tour-standalone-gieqs.css"
        rel="stylesheet">

    <!--             <script src="<?php //echo BASE_URL;?>/assets/js/purpose.core.js"></script>
    -->
    <script
        src="<?php echo BASE_URL; ?>/node_modules/bootstrap-tour/build/js/bootstrap-tour-standalone.min.js">
    </script>

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/purpose.css" id="stylesheet">

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/gieqs.css">

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

        //////Today//////

       
    
       



//////End Today/////////////



        $video_PDO = new video_PDO;
        $debug = $gigs_debug;
        $page_title = $pages->gettitle();
    ?>






    </header>

    <?php
		if (isset($_GET["id"]) && is_numeric($_GET["id"])){
			$id = $_GET["id"];
		
		}else{
		
			$id = null;
		
		}

        $pageDeatails = $assetManager->getPageDetails($id);

        $pageid = $pageDeatails[0]['id'];
         //get videos array
        

        $videos = $assetManager->getExperiencePageVideosList($pageid);
        
        $requiredVideos = $videos;  
        ///////2nd section//////////
        $assetsid_list = $assetManager->getExperiencePageAssetsList($pageid);
        $assetid =   $assetsid_list;
        
        
        $wp_ids = $courseManager->returnAllCoursesThumbnails();

        //remove nulls

        foreach ($wp_ids as $key => $value) {
            if ($value == NULL){

                unset($wp_ids[$key]);

            }
        }

        //create an array which has key as wp id as key and url of thumbnail as value

        $wp_thumnails = [];

        foreach ($wp_ids as $key => $value) {

            $wp_thumnails[$value] = get_the_post_thumbnail_url($value);
            


        }

        $wp_thumnails_j = json_encode($wp_thumnails);
       
        //////3rd section - tag category///
        $tag_list = $assetManager->getExperiencePageTagCategoryList($pageid);
        $requiredTags = $tag_list;

		
        ?>

    <!-- load all video data -->

    <body>

        <div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>
        <div id="requiredVideos" style="display:none;"><?php echo json_encode($requiredVideos);?></div>
        <div id="requiredAssets" style="display:none;"><?php echo json_encode($assetid);?></div>
        <div id="requiredTags" style="display:none;"><?php echo json_encode($requiredTags);?></div>

        <div class="main-content">
        <!-- ////Start title//// -->
        <div class="d-flex flex-wrap container pt-9 mt-3 mb-5">
            <div class="h1 w-100 pt-3"><?php echo $pageDeatails[0]['page_title']; ?></div>  
            <p><?php echo $pageDeatails[0]['page_description']; ?></p>
            <nav aria-label="breadcrumb" class="align-self-center">
                <ol class="breadcrumb breadcrumb-links p-0 m-0">
                    <li class="breadcrumb-item"><a
                            href="<?php echo BASE_URL . '/pages/learning/index.php'?>">GIEQs
                            online</a></li>

                   
                    <li class="breadcrumb-item">Subscribable Courses</li>
                    

                   
                    <li class="breadcrumb-item">
                        Endoscopy
                    </li>
                    <li class="breadcrumb-item gieqsGold" aria-current="page"><?php echo $page_title;?>
                    </li>
                </ol>
            </nav>

            


        </div>
        <!-- ////End title//// -->
        
        <!-- Header (account) -->
           
            <!-- Top 6 videos -->
            <section id="top6" class="slice slice-lg bg-section-secondary delimiter-top m-0 p-2">
                <div class="container pt-0 pt-lg-0">
                    <div class="actions-toolbar py-2 mb-4 ">


                        <h4 class="mb-1  mt-2"><?php echo $pageDeatails[0]['section_one_title']; ?></h4>
                        <p class="text-sm text-muted mb-0"><?php echo $pageDeatails[0]['section_one_subtitle']; ?> </p>
                    </div>
                    <!-- <div id="videoCards" class="flex-wrap">


                            <div class="d-flex align-items-center">
                                <strong>Loading...</strong>
                                <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
                            </div>




                        </div> -->
                    <div class="placeholder">
                        <div class="card-deck flex-column flex-lg-row mb-5">
                            <div class="card card-skeleton"></div>
                            <div class="card card-skeleton"></div>
                            <div class="card card-skeleton"></div>
                        </div>
                        <div class="card-deck flex-column flex-lg-row mb-5">
                            <div class="card card-skeleton"></div>
                            <div class="card card-skeleton"></div>
                            <div class="card card-skeleton"></div>
                        </div>
                    </div>

                    

                    </div> <!-- end new material div-->
                </div> <!-- end container div-->

            </section>

                        <!-- Whats new  -->

            <section class="slice delimiter-bottom m-0 p-2" id="courses">

                <div class="container pt-0 pt-lg-0">
                    <div class="actions-toolbar py-2 mb-4 ">


                        <h4 class="mb-1  mt-2"><?php echo $pageDeatails[0]['section_two_title']; ?></h4>
                        <p class="text-sm text-muted mb-0"><?php echo $pageDeatails[0]['section_two_subtitle']; ?></p>
                    </div>
                    
                    <div class="placeholder">
                        <div class="card-deck flex-column flex-lg-row mb-5">
                            <div class="card card-skeleton"></div>
                            <div class="card card-skeleton"></div>
                            <div class="card card-skeleton"></div>
                        </div>
                    </div>

                </div>

            </section>

           

            <!-- Finish watching videos -->




            

            <!-- Suggested videos -->


            

            <!-- Popular videos -->


            <section id="popular" class="slice slice-lg bg-section-secondary delimiter-top m-0 p-2">
                <div class="container pt-0 pt-lg-0">
                    <div class="actions-toolbar py-2 mb-4 ">


                        <h4 class="mb-1  mt-2"><?php echo $pageDeatails[0]['section_three_title']; ?></h4>
                        <p class="text-sm text-muted mb-0"><?php echo $pageDeatails[0]['section_three_subtitle']; ?></p>
                    </div>
                    <div class="placeholder">
                        <div class="card-deck flex-column flex-lg-row mb-5">
                            <div class="card card-skeleton"></div>
                            <div class="card card-skeleton"></div>
                            <div class="card card-skeleton"></div>
                        </div>
                    </div>

                    

                    </div> <!-- end new material div-->
                </div> <!-- end container div-->

            </section>

            <!-- Favourites videos **NOT YET IMPLEMENTED*** -->


            <!-- <section id="favourites" class="slice slice-lg bg-section-secondary delimiter-top m-0 p-2">
                <div class="container pt-0 pt-lg-0">
                    <div class="actions-toolbar py-2 mb-4 ">


                        <h4 class="mb-1  mt-2">Your Favourited Videos</h4>
                        <p class="text-sm text-muted mb-0">Videos you previously favourited.</p>
                    </div>
                    <div class="placeholder">
                        <div class="card-deck flex-column flex-lg-row mb-5">
                            <div class="card card-skeleton"></div>
                            <div class="card card-skeleton"></div>
                            <div class="card card-skeleton"></div>
                        </div>
                    </div>

                    

                    </div> 
                </div> 

            </section>
 --> 
             


        </div>

        <!-- //////Add by subhra///// -->
        <div class="modal fade" id="modal-statistics" tabindex="-1" role="dialog" aria-labelledby="modal-change-username"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content mc1 bg-dark border" style="border-color:rgb(238, 194, 120) !important;">
                        <div class="modal-header">
                            <div class="modal-title d-flex align-items-left" id="modal-title-change-username">
                                <div>
                                    <div class="icon bg-dark icon-sm icon-shape icon-info rounded-circle shadow mr-3">
                                        <img src="../../assets/img/icons/gieqsicon.png">
                                    </div>
                                </div>
                                <div class="text-left">
                                    <h5 class="mb-0">Find My Next Experience</h5>
                                    <span class="mb-0"></span>
                                </div>

                            </div>
                            
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="text-white" aria-hidden="true">&times;</span>
                            </button>

                        </div>
                       

                        <div class="modal-body">

                            <div class="faculty-body">
                                <form id="faculty-form">
                                    <div class="form-group">
                                    <!-- EDIT -->

                                    
                                    

                                        <label for="type">I am Looking For</label>
                                        <div class="input-group mb-3">
                                            <select id="lookingtype" class="form-control" name="lookingType">
                                            <option value="" selected disabled hidden>please select an option</option>
                                            <option value="1">Gastroscopy</option>
                                            <option value="2">Colonoscopy</option>
                                            <option value="3">Endoscopic Imaging</option>
                                            <option value="4">Polypectomy</option>
                                            <option value="5">Submucosal Endoscopy</option>
                                            <option value="6">Training in Endoscopy</option>
                                            <option value="7">EUS</option>
                                            <option value="8">ERCP</option>
                                            </select>
                                        </div>

                                        <div id="gastroscopy" style="display:none;">
                                            <label for="type">i am a </label>
                                            <div class="input-group mb-3">
                                                <select id="gastroscopytype" class="form-control" name="lookingType">
                                                <option value="" selected disabled hidden>please select an option</option>
                                                <option value="1">practitioner who never performed gastroscopy </option>
                                                <option value="2">trainee</option>
                                                <option value="3">experienced performer of gastroscopy looking for upskilling</option>
                                                
                                                </select>
                                            </div>
                                        </div>
                                        <div id="colonoscopy" style="display:none;">
                                            <label for="type">i am a practitioner who </label>
                                            <div class="input-group mb-3">
                                                <select id="colonoscopytype" class="form-control" name="lookingType">
                                                <option value="" selected disabled hidden>please select an option</option>
                                                <option value="1">Has never performed colonoscopy </option>
                                                <option value="2">Is a starter (0-50 colonoscopies)</option>
                                                <option value="3">Is a beginner (50-200 colonoscopies)</option>
                                                <option value="3">Is an intermediate (200-1000) colonoscopies</option>
                                                <option value="3">Is an experienced colonoscopist in independent practise looking for upskilling</option>
                                                                                                
                                                </select>
                                            </div>
                                        </div>
                                        <div id="endoscopic" style="display:none;">
                                            <label for="type">i am looking for </label>
                                            <div class="input-group mb-3">
                                                <select id="endoscopictype" class="form-control" name="lookingType">
                                                    <option value="" selected disabled hidden>please select an option</option>
                                                    <option value="1">imaging of normal anatomy </option>
                                                    <option value="2">upper GI imaging (lesions)</option>
                                                    <option value="3">lower GI imaging (lesions)</option>                                                                                                                                                
                                                </select>
                                            </div>
                                        </div>
                                        <div id="polypectomy" style="display:none;">
                                            <label for="type">i am looking for  </label>
                                            <div class="input-group mb-3">
                                                <select id="polypectomytype" class="form-control" name="lookingType">
                                                    <option value="" selected disabled hidden>please select an option</option>
                                                    <option value="1">polyp assessment (cancer / no cancer) </option>
                                                    <option value="2">polyp assessment (difficulty of resection)</option>
                                                    <option value="3">cold snare polypectomy (en bloc)</option>                                                     
                                                    <option value="4">cold snare polypectomy (piecemeal)</option>  
                                                    <option value="5">hot snare polypectomy (en bloc)</option>  
                                                    <option value="6">hot snare polypectomy (piecemeal, endoscopic mucosal resection), easy (SMSA 1/2)</option>  
                                                    <option value="7">intermediate (SMSA 3)</option>  
                                                    <option value="8">difficult (SMSA 4, SMSA+)</option>  
                                                    <option value="9">non-lifting polyps</option> 
                                                    <option value="10">Management of adverse events</option> 
                                                </select>
                                            </div>
                                        </div>

                                        

                                        



                                    </div>
                                </form>

                               
                            </div>
                            <div class="modal-footer">
                               
                            </div>
                        </div>
                    </div>
            </div>

        </div>



        <!-- ////////End modal//////// -->



        <?php require BASE_URI . '/footer.php';?>

        <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
        <!-- <script src="assets/js/purpose.core.js"></script> -->
        <!-- Page JS -->
        



        <!-- Google maps -->

        <!-- Purpose JS -->
        <script src="../../assets/js/purpose.js"></script>
        <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
        <script>
            $(document).ready(function(){
                $(".gieqsstat").on("click", function(){
                    $('#modal-statistics').modal('show');   
                    $('#modal-statistics').animate({
                            scrollTop: 0
                        }, 'slow');
                    })

            });

            $(document).on("change", "#lookingtype", function(){
                
                var val = $(this).val();
                
                if(val == 1)
                {
                    $("#colonoscopy").css('display', 'none');
                    $("#endoscopic").css('display', 'none');
                    $("#polypectomy").css('display', 'none');
                    $("#gastroscopy").css('display', 'block');
                   // window.location = siteRoot + "gastroscopy.php" ;

                }
                else if(val == 2)
                {
                    $("#gastroscopy").css('display', 'none');
                    $("#endoscopic").css('display', 'none');
                    $("#polypectomy").css('display', 'none');
                    $("#colonoscopy").css('display', 'block');
                    //window.location = siteRoot + "colonoscopy.php" ;
                }
                else if(val == 3)
                {
                    $("#gastroscopy").css('display', 'none');
                    $("#colonoscopy").css('display', 'none');
                    $("#polypectomy").css('display', 'none');
                    $("#endoscopic").css('display', 'block');
                    //window.location = siteRoot + "endoscopic-imaging.php" ;
                }
                else if(val == 4)
                {
                    $("#gastroscopy").css('display', 'none');
                    $("#colonoscopy").css('display', 'none');
                    $("#endoscopic").css('display', 'none');
                    $("#polypectomy").css('display', 'block');
                    
                    //window.location = siteRoot + "polypectomy.php" ;
                }
                else if(val == 5)
                {
                    window.location = siteRoot + "submucosal-endoscopy.php" ;
                }
                else if(val == 6)
                {
                    window.location = siteRoot + "training-in-endoscopy.php" ;
                }
                else if(val == 7)
                {
                    window.location = siteRoot + "pages/eus/eus.php" ;
                }
                else
                {
                    window.location = siteRoot + "pages/ercp/ercp.php" ;
                }
            })
            
        </script>
        
        
        <script>
        var videoPassed = $("#id").text();
        </script>

        <script>
        var signup = $('#signup').text();
        var loadedRequired = 1;
        var requiredVideosText = $("#requiredVideos").text();

        var requiredVideos = JSON.parse(requiredVideosText);
        
        var requiredAssetsText = $("#requiredAssets").text();
        var requiredAssets = JSON.parse(requiredAssetsText);

        
        var requiredTagsText = $("#requiredTags").text();
        var requiredTags = JSON.parse(requiredTagsText);
        

        function getNew() {

            const dataToSend = {

            }

            const jsonString = JSON.stringify(dataToSend);
            console.log(jsonString);

            var request2 = $.ajax({
                url: siteRoot + "scripts/getNewVideos.php",
                crossDomain: true,
                headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                },
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
                crossDomain: true,
                headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                },
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
        
        function getTopCourses(){
          
        
            const dataToSend = {
                requiredAssets: requiredAssets,                        
                thumbnails : [<?php echo $wp_thumnails_j;?>],
                loadedRequired : loadedRequired,
                    }
                    
                    const jsonString = JSON.stringify(dataToSend);
                    console.log(jsonString);

                    var request6 = $.ajax({
                        url: siteRoot + "scripts/getExperienceCourses.php",
                        crossDomain: true,
                        headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                        },
                        type: "POST",
                        contentType: "application/json",
                        data: jsonString,
                    });



                    request6.done(function(data) {
                        //alert( "success" );
                        $('#courses').find('.placeholder').html(data);
                        //$(document).find('.Thursday').hide();
                    })
        }
        function getTopExperienceVideos(){
            const dataToSend = {
                requiredVideos: requiredVideos,
                loadedRequired : loadedRequired,
                    }

                    const jsonString = JSON.stringify(dataToSend);
                    console.log(jsonString);

                    var request5 = $.ajax({
                        url: siteRoot + "scripts/getExperienceVideos.php",
                        crossDomain: true,
                        headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                        },
                        type: "POST",
                        contentType: "application/json",
                        data: jsonString,
                    });



                    request5.done(function(data) {
                        // alert( "success" );
                        $('#top6').find('.placeholder').html(data);
                        //$(document).find('.Thursday').hide();
                    })
        }

        function getTagVideo() {

            const dataToSend = {
                requiredTags: requiredTags,
                loadedRequired : loadedRequired,
            }

            const jsonString = JSON.stringify(dataToSend);
            console.log(jsonString);

            var request2 = $.ajax({
                url: siteRoot + "scripts/getTagVideos.php",
                crossDomain: true,
                headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                },
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





        function getTopVideos() {

                const dataToSend = {

                }

                const jsonString = JSON.stringify(dataToSend);
                console.log(jsonString);

                var request2 = $.ajax({
                    url: siteRoot + "scripts/getTopVideos.php",
                    crossDomain: true,
                    headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                    },
                    type: "POST",
                    contentType: "application/json",
                    data: jsonString,
                });



                request2.done(function(data) {
                    // alert( "success" );
                    //$('#top6').find('.placeholder').html(data);
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
                crossDomain: true,
                headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                },
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
            
            getTopExperienceVideos();
            getTopCourses();
            getTagVideo();
            getNew();
            getRecentViewed();
            getNextSteps();
            
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