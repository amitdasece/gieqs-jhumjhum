<?php require '../../includes/config.inc.php';

define('WP_USE_THEMES', false);
     spl_autoload_unregister ('class_loader');
     
     require(BASE_URI . '/assets/wp/wp-load.php');
     
     spl_autoload_register ('class_loader');

      //define user access level

      $openaccess = 1;
      //$requiredUserLevel = 6;


      //require BASE_URI . '/pages/learning/includes/head.php';
      require BASE_URI . '/head_nocss.php';

      ?>



      <?php 

      $general = new general;

      $navigator = new navigator;

     

      require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
      $assetManager = new assetManager;

      require_once(BASE_URI . '/assets/scripts/classes/courseManager.class.php');
      $courseManager = new courseManager;

      require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
    $assets_paid = new assets_paid;

    require_once(BASE_URI . '/assets/scripts/classes/programmeView.class.php');

    $programmeView = new programmeView;

      /* load the asset */

      /* determine page variables */

      /* get the tagCategories for the contents of this asset */

      /* restricted only to those videos in the asset */


      ?>

    <!--Page title-->


    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/purpose.css" id="stylesheet">

<link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/gieqs.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">


    <style>
    .gieqsGold {

        color: rgb(238, 194, 120);


    }

    #videoCards img {

        /* max-height: 20vh; */
margin-left: auto;
display: block;
margin-right: auto;

    }

    .card-placeholder {

        width: 344px;

    }

    .break {
        flex-basis: 100%;
        height: 0;
    }

    .flex-even {
        flex: 0 0 40%;
        
        /*
        
        flex: 1;
         */
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
        /* box-sizing: border-box;
        height: 25.25vw;
        left: 50%;
        min-height: 100%;
        min-width: 100%;
        transform: translate(-50%, -50%);
        position: absolute;
        top: 50%;
        width: 100.77777778vh; */
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
            z-index: 10;
        }



    }
    </style>

<title>GIEQs Virtual-Live Courses | Deconstructed Endoscopy Education</title>
            <meta name="description" content="From starting out with colonoscopy to submucosal endoscopic procedures, GIEQs' deconstructed approach has you covered.  Free and Premium Content available.">
            <meta name="keywords" content="gastroscopy, colonoscopy, training, nurse endoscopist, endoscopy trainee, EMR, ESD, POEM">

</head>

<body>
    <header class="header header-transparent" id="header-main">

        <!-- Topbar -->

        <?php require BASE_URI . '/pages/learning/includes/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/nav.php';?>




    </header>



    <?php


        $debug = false;

        if ($debug){
          error_reporting(E_ALL);
          echo '<div class="main-content container mt-10">';

        }

		if (isset($_GET["assetid"]) && is_numeric($_GET["assetid"])){
			$assetid = $_GET["assetid"];
		
		}else{
		
			//$assetid = null;
		
        }

        //check for course assets

        //$courseManager->returnAllCourses('3', true);
        $courses = $courseManager->returnAllCourses('3', false);

        

        /* don't exit if no assetid provided */

        if (!isset($assetid)){
            ?>
   

        <?php            
            
        }


        /* determine access */

/*
        $access = null;

        $access = $assetManager->is_assetid_covered_by_user_subscription($assetid, $userid, $debug);

        if (!$access){

            ?>
        <div class="main-content container mt-10">

            <?php            
            echo 'You do not have access to this subscribable material.  You can buy a subscription from <a href="' . BASE_URL .  '/pages/learning/pages/account/billing.php">My Account</a>';
            echo '<br/><br/>Return <a href="' . BASE_URL .  '/pages/learning/">home</a>';
            //redirect_user(BASE_URL . '/pages/learning/');
            die();


        }else{

            if ($debug){

                $log[] =  'user has access';
            }
        }

        /*
              /* load all assets */

        /* if ($assets_paid->Return_row($assetid)){

            $assets_paid->Load_from_key($assetid); 

        }else{

            if ($debug){

                $log[] =  'issue loading the asset';
            }

        } */

        /* define the page variables */

        $page_title = 'Curated Virtual/Live Experiences';?>

        


            <?php
        $page_description = $assets_paid->getdescription();
        $videoset = null;

        
        //get all blog thumbnails

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

        //then for each number remaining get the wp id
        
        //echo "<br/><br/><br/>";
        //var_dump($wp_ids);
        //echo $wp_thumnails_j;
        //exit();

        
        $gieqsDigital = false;  //?remove

        /* is this a programme / set of videos */

        if ($assets_paid->getasset_type() == '2' || $assets_paid->getasset_type() == '3'){

            //is a course
            $course = 1;
            


            //is a conference
            if ($assets_paid->getasset_type() == '2'){
            $videoset = 2;
            if ($debug){

                echo '<br/><br/>';
                echo 'is a conference';
                echo '<br/><br/>';

            }
            }elseif ($assets_paid->getasset_type() == '3'){
            $videoset = 3; //IS A STANDARD COURSE
            if ($debug){

                echo '<br/><br/>';
                echo 'is a standard course';
                echo '<br/><br/>';

            }
            }else{
            $videoset = 3;

            if ($debug){

                echo '<br/><br/>';
                echo 'not data set, assuming is a course';
                echo '<br/><br/>';

            }

            }

            if ($videoset == 2){

            $videosForSessions = array();

            //get programme / session info

            $programmes = $assetManager->returnCombinationAssetProgramme($assetid);

            if ($debug){

                echo '<br/><br/>';
                echo 'prgrammes array for asset id ' . $assetid;

            }
            
            if ($debug){

                var_dump($programmes);
            }

            foreach ($programmes as $key=>$value){


            $sessions = $programmeView->getSessions($value['programme_id']);


            if ($debug){

                echo '<br/><br/>';
                echo 'sessions array for programme id ' . $value['programme_id'];

            }
                if ($debug){

                    var_dump($sessions);
                }

                //get programmeid for asset
                foreach ($sessions as $key2=>$value2){

                    if (isset($value2['sessionid'])){

                        $videosForSessions[] = $programmeView->getVideoURL($value2['sessionid']);

                    }

                }

             }

             //if debug show the videos

             if ($debug){

                echo '<br/><br/>';
                echo 'videos array for all programmes';

            }

             if ($debug){

                var_dump($videosForSessions);

             }

            }elseif ($videoset == 3){


                $videosForSessions = array();

            //get programme / session info

            $programmes = $assetManager->returnCombinationAssetProgramme($assetid);

            if ($debug){

                echo '<br/><br/>';
                echo 'prgrammes array for asset id ' . $assetid;

            }
            
            if ($debug){

                var_dump($programmes);
            }

            foreach ($programmes as $key=>$value){


            $sessions = $programmeView->getSessions($value['programme_id']);


            if ($debug){

                echo '<br/><br/>';
                echo 'sessions array for programme id ' . $value['programme_id'];

            }
                if ($debug){

                    var_dump($sessions);
                }

                //get programmeid for asset
                foreach ($sessions as $key2=>$value2){

                    if (isset($value2['sessionid'])){

                        $videosForSessions2data = array();
                        $videosForSessions2data = $programmeView->getVideoURLAll($value2['sessionid']);

                        foreach ($videosForSessions2data as $key3=>$value3){

                            $videosForSessions[$x] = $value3;
                            $x++;

                        }

                        
                    }

                }

             }

             //if debug show the videos

             if ($debug){

                echo '<br/><br/>';
                echo 'videos array for all programmes';

            }

             if ($debug){

                var_dump($videosForSessions);

             }




            }

            //get the tagCategories for these programmes

            if ($debug){

                echo '<br/><br/>';
                echo 'tag categories array for all these programmes';

            }


            $tagCategories = $assetManager->getVideoTagCategories($videosForSessions, $debug);



            

            //get sessionid for asset -> get the videos from this



        }elseif ($assets_paid->getasset_type() == '4'){

            //is a videoset
            $videoset = 1;

            //get videos associated with this asset

            $videos = $assetManager->returnVideosAsset($assetid);
            
            


            if ($debug){
            print_r($videos);
            }

            //get their tagCategories

            $tagCategories = $assetManager->getVideoTagCategories($videos, $debug);
    


        }







				    
                        
                        
		
        ?>

            <!-- Omnisearch data -->

            <div id="omnisearch" class="omnisearch">
                <div class="container">
                    <!-- Search form -->
                    <form class="omnisearch-form">
                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search mr-2"></i></span>
                                </div>
                                <!--                     <input type="text" class="form-control" placeholder="Searching within <?php //echo $page_title;?>">
 -->
                                <select id="tags" type="text" data-toggle="select" class="custom-select form-control"
                                    name="tags" placeholder="Searching within <?php echo $page_title;?>">
                                    <?php

                                            


                                        //echo $general->generateTagStructure();


                                            


?>
                                </select>

                            </div>
                        </div>
                    </form>
                    <div class="omnisearch-suggestions">
                        <h6 class="heading">Search within courses. Search is within the filtered set of
                            results.</h6>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a class="list-link" href="">
                                            <i class="fas fa-search"></i>
                                            <span>try searching</span> training, loops etc
                                        </a>
                                    </li>
                                    <li>
                                        <a class="list-link" href="">
                                            <i class="fas fa-search"></i>
                                            <span>or try searching a specific phrase</span> e.g. performance enhancing
                                            feedback
                                        </a>
                                    </li>
                                    <li>
                                        <a class="list-link" id="refreshNavSearch" href="">
                                            <i class="fas fa-search"></i>
                                            <span>to reset the search click here</span> search is otherwise within the
                                            filtered set of results
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- load all video data -->

            <div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>

            <!--- specifiy the tag Categories required for display  CHANGEME-->

            <?php
        $requiredTagCategories = $tagCategories;

        ?>

            <div id="requiredTagCategories" style="display:none;"><?php echo json_encode($requiredTagCategories);?>
            </div>

            <div id="courses" style="display:none;"><?php echo json_encode($courses);?>
            </div>



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

                <div class="d-flex flex-wrap container pt-9 mt-3">
                <p class="display-4 my-3">GIEQs Premium Content</p>
                    <p class="lead lh-180 pb-3" style="font-size:1.25rem;">The best content on GIEQs Online.  Symposia, Courses and Webinars.  Sorted by specialist area.  High definition, curated experiences that you can access immediately</p>

                    <nav aria-label="breadcrumb" class="align-self-center">
                       <ol class="breadcrumb breadcrumb-links p-0 m-0">
                            <li class="breadcrumb-item"><a
                                    href="<?php echo BASE_URL . '/pages/learning/index.php'?>">GIEQs
                                    Online</a></li>
                            <li class="breadcrumb-item">Premium Content</li>
                            <li class="breadcrumb-item gieqsGold" aria-current="page"><?php echo $page_title;?></li>
                        </ol>
                    </nav>

                </div>



                <!--Navigation-->

               <!--  <div id="navigationZone" class="pt-3">
                    <?php //require(BASE_URI . '/pages/learning/includes/navigation.php'); ?>
                </div> -->



                <!--Video Display-->


                <div class="container mt-3">
                    <div class="text-justify m-4">

                       <!--  <p class="lead lh-180 pb-3"><?php //echo $page_description;?></p> -->



                    </div>
                    <div class="row">



<div id="right" class="col-lg-3 col-xl-3 border-right">
    <!--         	<div class="h-100 p-4"> -->
    <div id="sticky" data-toggle="sticky" class="pr-3 mr-3 pl-2 pt-2 sticky-top">
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
<div id="videoCards" class="flex-wrap">


                        <div class="d-flex align-items-center">
                            <strong>Loading...</strong>
                            <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
                        </div>




                    </div>
    </div>

    </div>
                    


               
<!-- 
<p class="display-2 my-3">Colonoscopy</p>
<p class="pl-4">Unpacking the Black Box of Colonoscopy Training</p>
<p class="display-2 my-3">Polypectomy</p>
<p class="display-2 my-3">Endoscopic Imaging</p>
<p class="display-2 my-3">Polypectomy</p> -->
     </div>


                <!--Programme Display, Cuurently Courses only-->

                <?php if ($videoset == 3){?>
                <hr>
                <div class="container mt-3">
                    <!-- <div class="text-justify m-4">
            <p class="h3"><?php //echo 'Course Programme'?></p>  



            </div> -->
                    <div id="programme-display" class="p-6 flex-wrap">







                    </div>

                </div>
                <?php } ?>




            </div>
            




            <!-- Modal -->


            <?php require BASE_URI . '/footer.php';?>

            <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
            <!-- <script src="assets/js/purpose.core.js"></script> -->
            <!-- Page JS -->
            <!-- Google maps -->

            <!-- Purpose JS -->
            <script src="<?php echo BASE_URL;?>/assets/js/purpose.core.js"></script>
            <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>
            <script src="<?php echo BASE_URL;?>/assets/js/generaljs.js"></script>
            <script src="<?php echo BASE_URL;?>/assets/libs/select2/dist/js/select2.min.js"></script>


            <script>
            var videoPassed = $("#id").text();
            </script>

            <script src="<?php echo BASE_URL; ?>/pages/learning/includes/social.js"></script>

            <script>
            //the number that are actually loaded
            var loaded = 1;

            //the number the user wants
            var loadedRequired = 1;

            var firstTime = 1;

            var activeStatus = 1;

            var requiredTagCategoriesText = $("#requiredTagCategories").text();

            var requiredTagCategories = JSON.parse(requiredTagCategoriesText);

            $.fn.isInViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
};

            function close_omnisearch() {


                //target = $this.data('target');
                $('[data-action="search-open"]').removeClass('active');
                $('#omnisearch').removeClass('show');
                $('body').removeClass('omnisearch-open').find('.mask-body').remove();


            }

            var waitForFinalEvent = (function () {
	  var timers = {};
	  return function (callback, ms, uniqueId) {
	    if (!uniqueId) {
	      uniqueId = "Don't call this twice without a uniqueId";
	    }
	    if (timers[uniqueId]) {
	      clearTimeout (timers[uniqueId]);
	    }
	    timers[uniqueId] = setTimeout(callback, ms);
	  };
	})();

            function resetNavigation() {

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

            }

            function generateTOC() {

var statement = '';

//get all h1s
//get all h2s before the next h1 -> second line
//get all h3s before the next h2 -> 3rd line

var x=15;
$('.toc-item').each(function() {

    var id = null;
    
    $(this).attr('id', x);
    id = $(this).attr('id');
    text = $(this).text();
    statement +=
        '<li class="toc-entry toc-h4" style="font-size:1.1rem;"><a class="text-muted" href="#' + id +
        '">' + text + '</a></li>';
    x++;

})

$('.section-nav').html(statement);



}

            /* function refreshProgrammeView() {



                const dataToSend = {

                    programmeid: <?php echo isset($programmes) ? $programmes[0]['programme_id'] : 'null';?>,

                }

                const jsonString = JSON.stringify(dataToSend);
                console.log(jsonString);

                var request2 = $.ajax({
                    url: siteRoot + "assets/scripts/classes/generateProgrammeCurrent.php",
                    type: "POST",
                    contentType: "application/json",
                    data: jsonString,
                });



                request2.done(function(data) {
                    // alert( "success" );
                    $('#programme-display').html(data);
                    //$(document).find('.Thursday').hide();
                })
            } */

            function refreshSearch() {

                var tags = [];

                $('.tag').each(function() {

                    if ($(this).is(":not(:disabled)")) {
                        tags.push($(this).attr('data'));
                    }




                })

                //now array of not disabled tags with ids

                const dataToSend = {

                    tags: tags,

                }

                const jsonString = JSON.stringify(dataToSend);
                console.log(jsonString);

                var request2 = $.ajax({
                    url: siteRoot + "pages/learning/scripts/get_omnisearch.php",
                    crossDomain: true,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    type: "POST",
                    contentType: "application/json",
                    data: jsonString,
                });



                request2.done(function(data) {
                    // alert( "success" );
                    $('#tags').html(data);
                    $('#tags').trigger('change');
                    //$(document).find('.Thursday').hide();
                })


            }


            function refreshNavAndTags() {

                var screenTop = $(document).scrollTop();

                //console.log(top);

                var tags = [];

                $('.tag').each(function() {

                    if ($(this).is(":checked")) {
                        tags.push($(this).attr('data'));
                    }


                })



                //push how many loaded, use loaded variable

                console.dir(tags);

                /*var key = $(this).attr('data');

				const dataToSend = {

					key: key,

				}*/
                var dataToSend = {

                    tags: tags,
                    requiredTagCategories: requiredTagCategories,
                    active: activeStatus,
                    videoset: '<?php echo $videoset;?>',
                    assetid: '<?php echo $assetid;?>',


                }

                //const jsonString2 = JSON.stringify(dataToSend);

                const jsonString = JSON.stringify(dataToSend);
                ////console.log(jsonString);
                //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

                var request2 = $.ajax({
                    beforeSend: function() {

                        $('#videoCards').html(
                            "<div class=\"d-flex align-items-center\"><strong>Loading...</strong><div class=\"spinner-border ml-auto\" role=\"status\" aria-hidden=\"true\"></div></div>"
                        );
                        //for each tags array push the badges to the tags shown area
                        var html = '';
                        $.each(tags, function(k, v) {

                            //HERE WE HAVE THE TAGID

                            var tagid = v;

                            //get the name and category

                            var tagName = $('body').find('#navigationZone').find('#tag' + v)
                                .siblings()
                                .text();

                            var tagCategory = $('body').find('#navigationZone').find('#tag' + v)
                                .parent()
                                .parent().parent().parent().find('span').text();

                            html +=
                                '<span class="badge bg-gieqsGold text-dark mx-2 my-2 tagButton" data="' +
                                v + '">' + tagCategory + ' / ' + tagName +
                                ' <i style="float:right;" class="fas fa-times removeTag cursor-pointer ml-1" data="' +
                                v + '"></i></span>';

                        });
                        $('body').find('#navigationZone').find('#shown-tags').html(html);

                    },
                    url: siteRoot + "/pages/learning/scripts/getNavv2.php",
                    crossDomain: true,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    type: "POST",
                    contentType: "application/json",
                    data: jsonString,
                });



                request2.done(function(data) {
                    // alert( "success" );
                    if (data != '[]') {
                        var toKeep = $.parseJSON(data.trim());
                        //alert(data.trim());
                        console.dir(toKeep);


                        $('.tag').each(function() {

                            var tagid = $(this).attr('data');

                            if (toKeep.indexOf(tagid) > -1) {

                                $(this).attr('disabled', false);

                            } else {

                                $(this).attr('disabled', true);
                            }

                        })


                    }
                    //$(document).find('.Thursday').hide();
                })

                request2.then(function(data) {
                    var tags = [];

                    $('.tag').each(function() {

                        if ($(this).is(":checked")) {
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
                        referringUrl: $('#escaped_url').text(),
                        active: activeStatus,
                        videoset: '<?php echo $videoset;?>',
                        assetid: '<?php echo $assetid;?>',
                        gieqsDigital: '<?php echo $gieqsDigital;?>',
                        thumbnails : [<?php echo $wp_thumnails_j;?>],


                    }

                    const jsonString2 = JSON.stringify(dataToSend);




                    const jsonString = JSON.stringify(tags);

                    console.dir(jsonString2);


                    var request3 = $.ajax({
                        beforeSend: function() {


                        },
                        url: siteRoot + "pages/learning/scripts/getCourses.php",
                        crossDomain: true,
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        type: "POST",
                        contentType: "application/json",
                        data: jsonString2,
                    });
                    request3.done(function(data) {
                        // alert( "success" );
                        if (data) {
                            //var toKeep = $.parseJSON(data.trim());
                            //alert(data.trim());
                            //console.dir(toKeep);

                            $('#videoCards').html(data);
                            refreshSearch();
                            $('body').find('#itemCount').each(function() {

                                var count = $('body').find('.individualVideo').length;
                                $(this).text(count);


                            })


                            if (firstTime == 1) {
                                $('body').on('click', '#loadMore', function() {

                                    loadedRequired = loadedRequired + 1;


                                    refreshNavAndTags();


                                })
                            }



                            if (firstTime > 1 && loadedRequired > 1) {

                                var loadedRequiredMultiple = ((loadedRequired - 1) * 10) - 3;

                                //console.log(loadedRequiredMultiple);

                                //scroll to current level


                                $("body,html").animate({
                                        scrollTop: $('body').find('.individualVideo:eq(' +
                                            loadedRequiredMultiple + ')').offset().top
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

            $(document).ready(function() {

                //generateTOC();

                waitForFinalEvent(function(){
            generateTOC();

			
	    }, 1000, "Resize header");

                $('[data-toggle="select"]').select2({

                    //dropdownParent: $(".modal-content"),
                    theme: "classic",

                });

                //$(document).find('#navigatorCollapse').collapse();

                refreshNavAndTags();


                //refreshProgrammeView();

                $('#refreshNavigation').click(function() {


                    resetNavigation();


                })

                $('body').on('#refreshNavSearch', 'click', function(event) {

                    event.preventDefault();

                    resetNavigation();


                })

                //on load check if any are checked, if so load the videos

                //if none are checked load 10 most recent videos for these categories

                $('.tag').click(function() {

                    refreshNavAndTags();


                })

                $('body').on('click', '.removeTag', function() {

                    var tagToRemove = $(this).attr('data');
                    //remove the check from the tag removed

                    $('.tag').each(function() {

                        if ($(this).attr("data") == tagToRemove) {

                            $(this).prop('checked', false);

                        }


                    })


                    refreshNavAndTags();

                })

                //active behaviour

                $('body').on('change', '#active', function() {

                    var active = $(this).children("option:selected").val();
                    //remove the check from the tag removed

                    activeStatus = active;

                    refreshNavAndTags();


                })

                $('body').on('select2:select', '#tags', function() {

                    var selected = $(this).val();

                    var selected_tag = '#tag' + selected;

                    console.log(selected);
                    console.log(selected_tag);

                    $(selected_tag).trigger('click');

                    close_omnisearch();
                    //remove the check from the tag removed

                    //trigger a click on the tag of this


                })

                












            })
            </script>
<!--             <script src="//code.tidio.co/60umwbfdkgadwfebvct2iq22o3mgbxpl.js" async></script>
 -->
</body>

</html>