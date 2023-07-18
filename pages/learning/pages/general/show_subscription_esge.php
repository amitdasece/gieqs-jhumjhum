<?php require '../../includes/config.inc.php';

//$debugUserAccess = true;


      //define user access level

    //$openaccess = 1;
      $requiredUserLevel = 6;

      

      //require BASE_URI . '/pages/learning/includes/head.php';
      require BASE_URI . '/head_nocss.php';

      $general = new general;

      $navigator = new navigator;

      //$courseTest = false;

      //$navigation = new navigation;

      require_once(BASE_URI . '/assets/scripts/classes/navigation.class.php');
      $navigation = new navigation;


      require_once(BASE_URI . '/assets/scripts/classes/programmeReports.class.php');
      $programmeReports = new programmeReports;

      require_once(BASE_URI . '/assets/scripts/classes/programme.class.php');
      $programme = new programme;

      require_once(BASE_URI . '/assets/scripts/classes/navigationManager.class.php');
      $navigationManager = new navigationManager;


     

      require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
      $assetManager = new assetManager;

     


      require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
    $assets_paid = new assets_paid;

    require_once(BASE_URI . '/assets/scripts/classes/pages.class.php');
    $pages = new pages;

    require_once(BASE_URI . '/assets/scripts/classes/programmeView.class.php');

    $programmeView = new programmeView;

      /* load the asset */

      /* determine page variables */

      /* get the tagCategories for the contents of this asset */

      /* restricted only to those videos in the asset */


      ?>

    <!--Page title-->




    <?php


        $debug = false;

        require_once BASE_URI . '/pages/learning/includes/gieqs_iii_settings.php';


        if ($debug){
          error_reporting(E_ALL);
          echo '<div class="main-content container mt-10">';

        }

		if (isset($_GET["assetid"]) && is_numeric($_GET["assetid"])){
			$assetid = $_GET["assetid"];
		
		}else{
		
			//$assetid = null;
		
        }

        if (isset($_GET["page_id"]) && is_numeric($_GET["page_id"])){
            $pageid = $_GET["page_id"];
            
            if ($debug){

                echo 'Page id set';
            }
		
		}else{
		
            //$assetid = null;
            if ($debug){

                echo 'Page id not set';
            }
		
        }

        /* exit if no assetid provided */

        if ((!isset($assetid)) && (!isset($pageid))){

            setcookie("browsing", "", time() - 3600);
            setcookie("browsing_id", "", time() - 3600);

            ?>


    <div class="main-content container mt-10">

        <?php            
            echo 'This page requires an asset or page id';
            echo '<br/><br/>Return <a href="' . BASE_URL .  '/pages/learning/">home</a>';
            //redirect_user(BASE_URL . '/pages/learning/');

            die();
        }

        //then check other structures

        //supercategory
        //


        /* determine access */



        $debug = false;
      
        if ($debug){

            ?>
        
            <div class="p-4" style='font-size: 0.75rem; position: fixed; top: 0; left: 0; z-index:999; color: black; background-color: white;'>
            <span id="debug" class='d-none'>true</span>
            <p>Debug info: (what JS currently knows)</p>
            <p>Cookie [selectedTag] <span id='debugCookieselectedTag'></span></p>
            <p>localStorage [selectedTag] <span id='debugLocalselectedTag'></span></p>
        <br/>
            <p>Cookie [restricted] <span id='debugCookierestricted'></span></p>
            <p>localStorage [restricted] <span id='debugLocalrestricted'></span></p>
        <br/>
            <p>Cookie [browsing] <span id='debugCookiebrowsing'></span></p>
            <p>Cookie [browsing_last] <span id='debugCookiebrowsing_last'></span></p>
            <p>Cookie [browsing_array] <span id='debugCookiebrowsing_array'></span></p>
            <p>Cookie [browsing_id] <span id='debugCookiebrowsing_id'></span></p>
        
        
            
            </div>
            
        
        <?php
        
        
        }
        
        $debug=false;
    



              /* load the asset */

              if (isset($assetid)){




                
       

        $access = null;

        if ($isSuperuser == 1){

            $fullAccess = true;
        
        }elseif ($sitewide_status == 2){ //PRO subscription
        
            $fullAccess = true;
        
        }else{
        
            $fullAccess = false;


        
        }


        //check access needs faking for assetid 137, 138, 139, 140 to check 95

        $fakeArray = ['137', '138', '139', '140'];

        if (in_array($assetid, $fakeArray)){

            $access = $assetManager->is_assetid_covered_by_user_subscription('171', $userid, $debug, $fullAccess);



        }else{
            
            $access = $assetManager->is_assetid_covered_by_user_subscription($assetid, $userid, $debug, $fullAccess);


        }


        //fix for 95 **GIEQs III

        if ($assetid == '171'){
            //echo 'Assetid is ' . $gieqs_iii_is_live;

            //die();


            if ($gieqs_iii_is_live == '1'){

                

                //set the plenary asset

                $assetid = $gieqs_iii_plenary_link;

                echo 'Assetid is ' . $assetid;
                //die();

            }


        }

        if (!$access){

            setcookie("browsing", "", time() - 3600);
            setcookie("browsing_id", "", time() - 3600);


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



        if ($assets_paid->Return_row($assetid)){

            $assets_paid->Load_from_key($assetid); 

        }else{

            
            if ($debug){

                $log[] =  'issue loading the asset';
            }

            setcookie("browsing", "", time() - 3600);
            setcookie("browsing_id", "", time() - 3600);

            ?>
            <div class="main-content container mt-10">

                <?php            
            echo 'Failed Asset Loading</a>';
            echo '<br/><br/>Return <a href="' . BASE_URL .  '/pages/learning/">home</a>';
            //redirect_user(BASE_URL . '/pages/learning/');

            die();



           

        }


        /* define the page variables */

        $page_title = $assets_paid->getname();?>



                <?php
        $page_description = $assets_paid->getdescription();
        $videoset = null;

        

        
        $gieqsDigital = false;  //?remove

        /* is this a programme / set of videos */

        if ($assets_paid->getasset_type() == '2' || $assets_paid->getasset_type() == '3'){

            //is a course
            $course = 1;
            



            //is a conference
            if ($assets_paid->getasset_type() == '2'){
            $videoset = 2;
            setcookie('browsing', '2', time() + (365 * 24 * 60 * 60), '/');
            setcookie('browsing_id', $assetid, time() + (365 * 24 * 60 * 60), '/');


            if ($debug){

                echo '<br/><br/>';
                echo 'is a conference';
                echo '<br/><br/>';

            }
            }elseif ($assets_paid->getasset_type() == '3'){
            $videoset = 3; //IS A STANDARD COURSE
            setcookie('browsing', '3', time() + (365 * 24 * 60 * 60), '/'); //1year
            setcookie('browsing_id', $assetid, time() + (365 * 24 * 60 * 60), '/');


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
                echo 'programmes array for asset id ' . $assetid;

            }
            
            if ($debug){

                print("<pre class=\"text-white\">".print_r($programmes,true)."</pre>");

                //var_dump($programmes);
            }

            foreach ($programmes as $key=>$value){


            $sessions = $programmeView->getSessions($value['programme_id']);


            if ($debug){

                echo '<br/><br/>';
                echo 'sessions array for programme id ' . $value['programme_id'];

            }
                if ($debug){
                    print("<pre class=\"text-white\">".print_r($sessions,true)."</pre>");


                    //var_dump($sessions);
                }

                //get programmeid for asset
                foreach ($sessions as $key2=>$value2){

                    if (isset($value2['sessionid'])){

                        $videoToEnter = $programmeView->getVideoURL($value2['sessionid']);

                        if ($videoToEnter != ''){

                        $videosForSessions[] = $programmeView->getVideoURL($value2['sessionid']);

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

                print("<pre class=\"text-white\">".print_r($videosForSessions,true)."</pre>");

                //var_dump($videosForSessions);

             }

             setcookie('browsing_array', json_encode($videosForSessions), time() + (365 * 24 * 60 * 60), '/');


            }elseif ($videoset == 3){


                $videosForSessions = array();

            //get programme / session info

            $programmes = $assetManager->returnCombinationAssetProgramme($assetid);

            if ($debug){

                echo '<br/><br/>';
                echo 'prgrammes array for asset id ' . $assetid;

            }
            
            if ($debug){

                print("<pre class=\"text-white\">".print_r($programmes,true)."</pre>");


                //var_dump($programmes);
            }

            foreach ($programmes as $key=>$value){


            $sessions = $programmeView->getSessions($value['programme_id']);


            if ($debug){

                echo '<br/><br/>';
                echo 'sessions array for programme id ' . $value['programme_id'];

            }
                if ($debug){

                    //var_dump($sessions);
                    print("<pre class=\"text-white\">".print_r($sessions,true)."</pre>");
                    /* foreach($sessions as $child) {
                        echo $child . "\n";
                     } */
                }

                //get programmeid for asset
                $x = 0;
                foreach ($sessions as $key2=>$value2){

                    if (isset($value2['sessionid'])){

                        $videosForSessions2data = array();
                        $videosForSessions2data = $programmeView->getVideoURLAll($value2['sessionid']);

                        if ($debug){

                            //var_dump($sessions);
                            print("<pre class=\"text-white\">".print_r($videosForSessions2data,true)."</pre>");
                            /* foreach($sessions as $child) {
                                echo $child . "\n";
                             } */
                        }
                        

                        foreach ($videosForSessions2data as $key3=>$value3){


                            if ($value3 == NULL){

                                continue;
                            }

                            $videosForSessions[$x] = $value3;
                            $x++;

                        }

                        
                    }

                }

             }

             setcookie('browsing_array', json_encode($videosForSessions), time() + (365 * 24 * 60 * 60), '/');


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
            setcookie('browsing', '4', time() + (365 * 24 * 60 * 60), '/');
            setcookie('browsing_id', $assetid, time() + (365 * 24 * 60 * 60), '/');




            //get videos associated with this asset

            $videos = $assetManager->returnVideosAsset($assetid);

            setcookie('browsing_array', json_encode($videos), time() + (365 * 24 * 60 * 60), '/');

            
            


            if ($debug){
            print_r($videos);
            }

            //get their tagCategories

            $tagCategories = $assetManager->getVideoTagCategories($videos, $debug);
    


        }

    }

    if (isset($pageid)){

        //check the page id exists

        //get the page details

        //get the required tagcategories or videos
       


        if ($pages->Return_row($pageid)){

            $pages->Load_from_key($pageid); 

            if ($debug){

                echo 'page loaded ok';
            }

        }else{

            
            if ($debug){

                $log[] =  'issue loading the page';
            }
            ?>
                <div class="main-content container mt-10">

                    <?php            
            echo 'Failed Page Loading</a>';
            echo '<br/><br/>Return <a href="' . BASE_URL .  '/pages/learning/">home</a>';
            //redirect_user(BASE_URL . '/pages/learning/');

            setcookie("browsing", "", time() - 3600);
            setcookie("browsing_id", "", time() - 3600);
            die();



           

        }


        /* define the page variables */

        $page_title = $pages->gettitle();?>

                    <title>ESGE Endoscopy Trainer - <?php echo $page_title;?></title>


                    <?php
        $page_description = $pages->getdescription();
        $videoset = null;

        

        
        $gieqsDigital = false;  //?remove

        if ($pages->getsimple() == '0'){

            //tag categories should already be defined

            $tagCategories = $assetManager->getTagsPage($pageid);

            if ($debug){

                echo 'tag categories';
                print_r($tagCategories);
            }

            $data4 = $navigator->getVideosTagCategories($tagCategories);

            if ($debug){

                echo 'data 4 categories';
                print_r($data4);
            }

            $videosDenominator = $assetManager->determineVideoAccessNonAsset($data4, $isSuperuser, $userid, false);


            setcookie('browsing', '5', time() + (365 * 24 * 60 * 60), '/');
            setcookie('browsing_id', $pageid, time() + (365 * 24 * 60 * 60), '/');
            setcookie('browsing_array', json_encode($videosDenominator), time() + (365 * 24 * 60 * 60), '/');
    



        }elseif ($pages->getsimple() == '1'){

            $simple = 1;

            //get videos array

            $videos = $assetManager->getVideosPage($pageid);

            //then get the tag categories

            $tagCategories = $assetManager->getVideoTagCategories($videos, $debug);

            if ($debug){

                echo 'videos';
                print_r($videos);
                echo 'tag categories';
                print_r($tagCategories);
            }

            setcookie('browsing', '5', time() + (365 * 24 * 60 * 60), '/');
            setcookie('browsing_id', $pageid, time() + (365 * 24 * 60 * 60), '/');
            setcookie('browsing_array', json_encode($videos), time() + (365 * 24 * 60 * 60), '/');



        }else{

            if ($debug){

                echo 'Error, simple tag not set';

            }

            setcookie('browsing', '5', time() + (365 * 24 * 60 * 60), '/');
            setcookie('browsing_id', null, time() + (365 * 24 * 60 * 60), '/');
            setcookie('browsing_array', null, time() + (365 * 24 * 60 * 60), '/');



        }

        


        

    }

    







				    
                        
                        
		
        ?>
                    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">
            <link href="<?php echo BASE_URL;?>/node_modules/bootstrap-tour/build/css/bootstrap-tour-standalone-gieqs.css" rel="stylesheet">

            <script src="<?php echo BASE_URL;?>/assets/js/purpose.core.js"></script>

<script src="<?php echo BASE_URL; ?>/node_modules/bootstrap-tour/build/js/bootstrap-tour-standalone.min.js"></script>

<link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/purpose_esge.css" id="stylesheet">

<link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/esge.css">


                    <style>
                    .gieqsGold {

                        color: #BD9635;


                    }

                    .navbar-brand small {
                        display: block;
                        font-size: 10px;
                    }

                    .card-placeholder {

                        width: 344px;

                    }

                    .break {
                        flex-basis: 100%;
                        height: 0;
                    }

                    .flex-even {
                        flex: 0 0 30%;

                        /*
    
    flex: 1;
     */
                    }

                    .flex-nav {
                        flex: 0 0 18%;
                    }



                    .gieqsGoldBackground {

                        background-color: #BD9635;


                    }

                    .tagButton {

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



/* For Tour*/

.popover-title {

background-color: #BD9635;
color: #162e4d;
font-size: 1rem;
}

.popover {

background-color: #193659;

}

.popover.right>.arrow::after {

border-right-color: #BD9635;
;
}

.btn {

padding: 2px 6px;


}

.tour-backdrop {

opacity: .3;
filter: alpha(opacity=30);


}

                    /* iframe {
    box-sizing: border-box;
    height: 25.25vw;
    left: 50%;
    min-height: 100%;
    min-width: 100%;
    transform: translate(-50%, -50%);
    position: absolute;
    top: 50%;
    width: 100.77777778vh;
} */

                    .cursor-pointer {

                        cursor: pointer;

                    }

                    @keyframes fade-in-up {
            0% {
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fade-in-up {
            0% {
                opacity: 0;
            }

            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
                opacity: 1;
            }
        }

        .video.stuck {
            z-index: 25;
            position: fixed;
            bottom: -320px;
            right: 20px;
            -webkit-transform: translateY(100%);
            transform: translateY(100%);
            width: 300px !important;

            -webkit-animation: fade-in-up .25s ease forwards;
            animation: fade-in-up .25s ease forwards;
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

                        #slido {

                            min-height: 500px !important;
                            padding-top: 1rem;

                        }


                    }

                    @media (min-width: 1200px) {
                        #chapterSelectorDiv {



                            top: -3vh;


                        }

                        /* #playerContainer {

        margin-top: -20px;

    } */

                        #collapseExample {

                            position: absolute;
                            max-width: 50vh;
                            z-index: 25;
                        }



                    }
                    </style>
                    <title>ESGE Endoscopy Trainer - <?php echo $page_title;?></title>

</head>


<header class="header header-transparent" id="header-main">

    <!-- Topbar -->

    <?php require BASE_URI . '/topbar_esge.php';?>

    <!-- Main navbar -->

    <?php require BASE_URI . '/nav_esge.php';?>




</header>




<body>





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
                <h6 class="heading">Search within this Subscription. Search is within the filtered set of
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
        $requiredVideos = $videos;

        ?>

    <div id="requiredTagCategories" style="display:none;"><?php echo json_encode($requiredTagCategories);?></div>
    <div id="requiredVideos" style="display:none;"><?php echo json_encode($requiredVideos);?></div>





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


    <div class="main-content ">


        <?php 
    
    //if an asset

    $debug = false;


    
    $partnerAsset = $assets_paid->getpartner();

    if ($debug){


        echo '<br/><br/><br/><br/>';
        var_dump($assets_paid);

        echo $partnerAsset . ' is partnerAsset';
    }

    $sponsorAsset = $assets_paid->getsponsor();

    if ($partnerAsset != ''){

        require_once(BASE_URI . '/assets/scripts/classes/partner.class.php');
        $partner = new partner;
        //get the logo from partner

        $partner->Load_from_key($partnerAsset);

        $partner_logo_check = $partner->getlogo_src();

        if ($partner_logo_check != ''){

            $partner_src = $partner_logo_check;
        }else{

            $partner_src = FALSE;
            
        }

        if ($debug){


            echo '<br/><br/><br/><br/>';
            var_dump($partner);
    
            echo $partner_logo_check . ' is partner_logo_check';
            echo $partner_src . ' is partner_src';
        }

        //store the src

        //echo below

    }

    if ($sponsorAsset != ''){

        require_once(BASE_URI . '/assets/scripts/classes/sponsor.class.php');
        $sponsor = new sponsor;
        //get the logo from partner

        $sponsor->Load_from_key($sponsorAsset);


        $sponsor_logo_check = $sponsor->getlogo_src();

        if ($sponsor_logo_check != ''){

            $sponsor_src = $sponsor_logo_check;
        }else{

            $sponsor_src = FALSE;
            
        }

        //store the src

        //echo below

    }
    
   // $debug = false;
    
    
    ?>

        <!--Header CHANGEME-->






        <div class="d-flex flex-wrap container pt-9 mt-3">
            <div class="h1 w-100 pt-3"><?php echo $page_title;?></div>

            <?php  if ($videoset != 2){?>

            <div class="d-flex flex-column m-2">

                <?php if ($partner_src){?>
                <div class="h4 p-3">In partnership with</div><img class="bg-white p-2" height="75px"
                    src='<?php echo $partner_src;?>'>
                <?php }?>
            </div>
            <div class="d-flex flex-column m-2">

                <?php if ($sponsor_src){?>
                <div class="h4 p-3">Proudly supported by</div><img class="bg-white p-2" height="75px"
                    src='<?php echo $sponsor_src;?>'>
                <?php }?>
            </div>


            <nav aria-label="breadcrumb" class="ml-auto align-self-center">
                <ol class="breadcrumb breadcrumb-links p-0 m-0">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL . '/pages/learning/index.php'?>">ESGE
                            </a></li>

                    <?php if ($videoset == 2 || $videoset == 3){?>
                    <li class="breadcrumb-item">Subscribable Courses</li>
                    <?php }
                    
                    if (isset($pageid)){ ?>
                    <li class="breadcrumb-item">
                        <?php $navigationName = $navigationManager->getNavigationPage($pageid, false); $navigation->Load_from_key($navigationName); echo $navigation->gettitle();?>
                    </li>


                    <?php }?>

                    <li class="breadcrumb-item gieqsGold" aria-current="page"><?php echo $page_title;?></li>
                </ol>
            </nav>

            <?php     } ?>
            

        </div>

      


        <?php
    
    //on the day of a course

    if ($videoset == 3 || $videoset  == 2){

        //echo the same as for the GIEQs conference

        

        $programme_array = $assetManager->returnProgrammesAsset($assetid);
                $programme_id = $programme_array[0];
                $programme->Load_from_key($programme_id);

                $serverTimeZoneNav = new DateTimeZone('Europe/Brussels'); //because this is where course is held


                $currentNavTime = new DateTime('now', $serverTimeZoneNav);  //test for gieqs ii

                //if the programme array is gieqs ii day 1 or 2
                //and if the user is a superuser
                //show the live view anyway, unless we are after the date of GII

                if ($programme_id == '47' || $programme_id == '48'|| $programme_id == '49' || $programme_id == '50'){

                    $isGIEQs3 = true;

                    if ($isSuperuser == 1 || $currentUserLevel == 2){

                        $courseTest = true; //CHANGE THIS FOR TESTING SYMPOSIA SUPERUSER TESTING

                    }else{

                        $courseTest = false; //STANDARD USER TESTING
                        
                    }

                }else{

                    $courseTest = false;

                    $isGIEQs3 = false;
                }

                //$courseTest = false; change this if issues


                if ($courseTest == true){

                    $currentNavTime = new DateTime($programme->getdate(), $serverTimeZoneNav);


                }


                $courseDate = new DateTime($programme->getdate(), $serverTimeZoneNav); //get course date from Programme

                $firstDate = $currentNavTime->format('Y-m-d');
                $secondDate = $courseDate->format('Y-m-d');


        if ($firstDate == $secondDate){




        ?>




        <!-- <li class="nav-item">
                    <a id="chapterNavTour" class="nav-link nav-link-icon" data-toggle="collapse" href="#selectDropdown">

                        <span class="nav-link-inner--text ">Show Chapters</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a id="tourTagNav" class="nav-link nav-link-icon" data-toggle="collapse" href="#collapseExample">

                        <span class="nav-link-inner--text ">Show Tags</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a id="jumpTimeLine" class="nav-link nav-link-icon cursor-pointer">

                        <span class="nav-link-inner--text ">Timeline</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a id="jumpComments" class="nav-link nav-link-icon cursor-pointer">


                        <span class="nav-link-inner--text ">Comments</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a id="jumpReferences" class="nav-link nav-link-icon" data-toggle="collapse"
                        href="#collapseExample2">

                        <span class="nav-link-inner--text">References</span>
                    </a>
                </li> -->


        <!-- <li class="nav-item">
                   
                   <a class="nav-link nav-link-icon"
                       >
                       <span class="badge badge-pill bg-gieqsGold text-dark badge-floating border-dark mr-2" style="z-index: -1 !important;">LEVEL 4</span>
                       <span class="nav-link-inner--text ">GIEQs Pro Member</span></a>
                     
                   
                   
                   


                          


                                <span class="nav-link-inner--text ">Complex</span>
                           
               </li> -->
        <!-- <li class="nav-item">
                    <a class="nav-link nav-link-icon"
                        href="/pages/learning/pages/live/nursing.php">

                        <span class="nav-link-inner--text ">Nursing</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" target="_blank"
                        href="/pages/learning/pages/live/programLive.php">

                        <span class="nav-link-inner--text ">Live Programme</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" target="_blank" href="https://facebook.com/gieqs">
                        <i class="fab fa-facebook-square"></i>
                        <span class="nav-link-inner--text d-lg-none">Share</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" target="_blank" href="https://twitter.com/gieqs_symposium">
                        <i class="fab fa-twitter"></i>
                        <span class="nav-link-inner--text d-lg-none">Tweet</span>
                    </a>
                </li> -->



        <div id="live-player-container" class="container">
        
        <?php 
        
        //error_reporting(E_ALL);
        require(BASE_URI . '/pages/learning/pages/general/live_nav.php'); ?>


            <?php if ($videoset == 3){//only show this if a course ?>
            <div class="row d-flex flex-row-reverse flex-wrap py-1 px-6">





                <a class="btn btn-sm text-dark gieqsGoldBackground mr-lg-3 m-1" role="button"
                    href="<?php echo $programme->geturl_zoom();?>" target="_blank">LIVE - Access Zoom Meeting</a>
                <a class="btn btn-sm text-dark gieqsGoldBackground mr-lg-3 m-1" role="button" href="#programme-display">View
                    Programme</a>


            </div>

            <?php } ?>


            <div class="row d-flex flex-wrap align-items-lg-stretch py-lg-4">

                <?php //fix for chat window 

            
            
            if ($programme->geturl_slido() != ''){?>

                <?php
                echo '<div class="col-lg-9" style="padding:0% 0 0 0;">';
                ?>
                <div  style="padding:56.25% 0 0 0;position:relative;">






                    <iframe class="video" src="<?php echo $programmeReports->getVimeoURLProgramme($programme_id); ?>" frameborder="0"
                        allow="autoplay; fullscreen; picture-in-picture" allowfullscreen
                        style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>




                </div>
            </div>
            <div class="col-lg-3 py-lg-2 m-0" id="slido">
                <iframe src="<?php echo $programme->geturl_slido();?>" height="100%" width="100%" frameBorder="0"
                    title="Slido"></iframe>



            </div>


            <?php

            }else{


                //not using slido
                //fix for GIEQs III

                /* <iframe src="https://eau2022.live-events.live/live/5NgxE3arqSmfQ8rEb" scrolling="no" width="1280" height="720" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe> */
               

                if ($isGIEQs3){

                    echo '<div class="col-lg-12">';
                    ?> <div style="padding:56.25% 0 0 0;position:relative;"><iframe
                         src="<?php echo $programmeReports->getVimeoURLProgramme($programme_id); ?>" scrolling="no" frameborder="0"
                         allow="autoplay; fullscreen; picture-in-picture" allowfullscreen
                         style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe></div>
            
                        </div>
             <?php

                }else{


                
                

                echo '<div class="col-lg-12">';
               ?> <div style="padding:56.25% 0 0 0;position:relative;"><iframe
                    src="<?php echo $programmeReports->getVimeoURLProgramme($programme_id); ?>" frameborder="0"
                    allow="autoplay; fullscreen; picture-in-picture" allowfullscreen
                    style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe></div>
        </div>
        <?php
                }
            }
            
            ?>





        <!--    <div class="col-lg-9">

<div style="padding:56.25% 0 0 0;position:relative;"><iframe
        src="https://vimeo.com/event/910289/embed/8a7dee8af0" frameborder="0"
        allow="autoplay; fullscreen; picture-in-picture" allowfullscreen
        style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe></div>
</div>

<div class="col-lg-3 p-0 m-0">
<iframe src="https://vimeo.com/event/910289/chat/8a7dee8af0" width="100%" height="100%"
    frameborder="0"></iframe>
</div>
 -->
    </div>
    </div>
    </div>



    <?php

                    }

    }
    
    
    
    ?>



    <!--Navigation-->

    <?php if (!isset($simple)){?>

    <div id="navigationZone" class="pt-3">
        <?php require(BASE_URI . '/pages/learning/includes/navigation.php'); ?>
    </div>

    <?php }?>

   



    <!--Video Display-->

    <div class="container mt-3">
        <div class="text-justify m-4">
            <p class="lead lh-180 pb-3"><?php echo $page_description;?></p>
            <div class="text-right">
<!--             <a class="btn btn-fill-gieqsGold btn-lg mx-2 my-3" href="">Give Feedback on this Course</a>  //FEEDBACK LINK SUBSCRIPTION $assetid
 -->    </div>



        </div>
        <div id="videoCards" class="flex-wrap">


            <div class="d-flex align-items-center">
                <strong>Loading...</strong>
                <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
            </div>




        </div>

    </div>


    <!--Programme Display, Cuurently Courses only, now also Conferences day by day-->



    <hr>
    <div id="program-tour" class="container mt-3">
    <?php if ((($firstDate == $secondDate)) && ($videoset == 2 || $videoset == 3)){?>

        <div class="row d-flex flex-row-reverse flex-wrap py-1 px-6">

        <a class="btn btn-sm text-dark gieqsGoldBackground mr-3 py-1 px-2" role="button"
                    href="#live-player-container">Back to Live View</a>
    </div>
        <?php } ?>
        <!-- <div class="text-justify m-4">
            <p class="h3"><?php //echo 'Course Programme'?></p>  



            </div> -->
        <div id="programme-display" class="p-lg-2 px-lg-6 flex-wrap">







        </div>
        <?php if ((($firstDate == $secondDate)) && ($videoset == 2 || $videoset == 3)){?>

<div class="row d-flex flex-row-reverse flex-wrap pb-5 px-6">

<a class="btn btn-sm text-dark gieqsGoldBackground mr-3 mr-3 py-1 px-2" role="button"
            href="#live-player-container">Back to Live View</a>
</div>
<?php } ?>

    </div>





    </div>

    <div id="bootstrapTour"></div>




    <!-- Modal -->


    <?php require BASE_URI . '/footer_esge.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="assets/js/purpose.core.js"></script> -->
    <!-- Page JS -->
    <!-- Google maps -->

    <!-- Purpose JS -->
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>
    <script src="<?php echo BASE_URL . "/assets/js/generaljs.js"?>"></script>
    <script src="<?php echo BASE_URL;?>/assets/libs/select2/dist/js/select2.min.js"></script>



    <script>
    var videoPassed = $("#id").text();
    </script>

    <script src=<?php echo BASE_URL . "/pages/learning/includes/social.js"?>></script>

    <script>
    //the number that are actually loaded
    var loaded = 1;

    <?php
    
    if ($isGIEQs3 === true){

       
        ?>
         var GIEQs3 = true;
        <?php
    }else{
?>
 var GIEQs3 = false;

<?php

    }
    ?>

    //the number the user wants
    var loadedRequired = 1;

    var firstTime = 1;

    var activeStatus = 1;

    var requiredTagCategoriesText = $("#requiredTagCategories").text();

    var requiredTagCategories = JSON.parse(requiredTagCategoriesText);

    var requiredVideosText = $("#requiredVideos").text();

    var requiredVideos = JSON.parse(requiredVideosText);
    if ($('#debug').text() == 'true'){
var t=setInterval(writeDebugInfo,1000);
}

    function writeDebugInfo () {

//what js currently knows

$('#debugCookieselectedTag').text(getCookie('selectedTag'));
$('#debugLocalselectedTag').text(localStorage.selectedTag);
$('#debugCookierestricted').text(getCookie('restricted'));
$('#debugLocalrestricted').text(localStorage.restricted);
$('#debugCookiebrowsing').text(getCookie('browsing'));
$('#debugCookiebrowsing_last').text(getCookie('browsing_last'));
$('#debugCookiebrowsing_array').text(getCookie('browsing_array'));
$('#debugCookiebrowsing_id').text(getCookie('browsing_id'));

}

    function close_omnisearch() {


        //target = $this.data('target');
        $('[data-action="search-open"]').removeClass('active');
        $('#omnisearch').removeClass('show');
        $('body').removeClass('omnisearch-open').find('.mask-body').remove();


    }

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

    function refreshProgrammeView() {



        const dataToSend = {

            programmeid: <?php if (is_array($programmes)){echo $programmes[0]['programme_id'];}else{echo 'null';}?>,

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
    }

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


    function refreshNavAndTags(tagid = null) {

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
            requiredVideos: requiredVideos,
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


                //ALSO SET THE LOCALSTORAGE TO THIS TAG

                //if count tags >0

                if (tags.length > 0) {

                    //window.localStorage.setItem('selectedTag', tagid);

                }



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
                requiredVideos: requiredVideos,
                referringUrl: $('#escaped_url').text(),
                active: activeStatus,
                videoset: '<?php echo $videoset;?>',
                assetid: '<?php echo $assetid;?>',
                gieqsDigital: '<?php echo $gieqsDigital;?>',
                color: 'white',
                partner: 'esge',



            }

            const jsonString2 = JSON.stringify(dataToSend);




            const jsonString = JSON.stringify(tags);

            console.dir(jsonString2);


            var request3 = $.ajax({
                beforeSend: function() {


                },
                url: siteRoot + "/pages/learning/scripts/getVideos.php",
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

    function checkTagFiltering() {

        var overallTagAvailable = window.localStorage.getItem('selectedTag');

        if (overallTagAvailable && overallTagAvailable != '') {

            $(document).find('.tag').each(function() {

                if ($(this).attr('data') == overallTagAvailable) {

                    $(this).click();

                    $('#navigatorCollapse').collapse('show');

                }

            })
            /* waitForFinalEvent(function() {
                //alert('Resize...');
                

            }, 200, "filter by overall tag available"); */



        }


    }

    var tourShort = new Tour({
        name: "tourShort",
        steps: [

            {
                
                title: "Welcome to GIEQs II.  Thanks for registering.  Its great to have you with us.  ",
                content: "<p>Let us take a few minutes to show you around.</p><p>For best viewing results we recommend using Chrome / Safari and a Desktop computer</p>",
            },


            {
                element: ".video",
                title: "Main Conference Player",
                content: "<p>Here you can view the conference in high definition.  Pause and restart as you wish.</p>",
            },

            {
                element: "#slido",
                title: "Ask the Expert",
                content: "<p>Here you can pose questions live to the experts.  You can also participate in polls / competitions.</p>",
                placement: "auto left",
            },

            {
                element: "#videoBar",
                title: "Navigation",
                content: "<p>This navigation bar lets you navigate around the conference</p><p>There are 2 rooms running simultaneously. </p> <p><strong>Plenary</strong> and <strong>Complex</strong></p>",
                placement: "auto bottom",
            },
            {
                onShow: function(tour) {

                    $('#navbarDropdown').collapse('show');
                    //$('#selectDropdown').find('select').attr('size', 6);


                },

                element: "#programMenu",
                placement: "auto left",
                title: "View the Program",
                content: "<p>Here you can view the program for the conference.</p>",

                onHidden: function(tour) {
                    $('#navbarDropdown').collapse('hide');
                    //$('#selectDropdown').find('select').attr('size', 1);



                }

            },
            {
                onShow: function(tour) {

                    $('#navbarDropdown2').collapse('show');
                    //$('#selectDropdown').find('select').attr('size', 6);


                },

                element: "#changeRoom",
                placement: "auto left",
                title: "Change Room",
                content: "<p>Here you can switch between the plenary and complex room / stream.</p>",

                onHidden: function(tour) {
                    $('#navbarDropdown2').collapse('hide');
                    //$('#selectDropdown').find('select').attr('size', 1);



                }

            },

            {
                onShow: function(tour) {

                   // $('#navbarDropdown2').collapse('show');
                    //$('#selectDropdown').find('select').attr('size', 6);


                },

                element: "#sponsors",
                placement: "auto left",
                title: "View Sponsor Pages",
                content: "<p>Here you can view information from our valued Sponsors.</p>",

                onHidden: function(tour) {
                    //$('#navbarDropdown2').collapse('hide');
                    //$('#selectDropdown').find('select').attr('size', 1);



                }

            },

            {
                onShow: function(tour) {

                   // $('#navbarDropdown2').collapse('show');
                    //$('#selectDropdown').find('select').attr('size', 6);


                },

                element: "#twitter-tour",
                placement: "auto left",
                title: "Like us on Social Media",
                content: "<p>Visit our Twitter Page to keep up with the Latest Throughout the conference.</p><p>Like what you see? Like us on Twitter!</p>",

                onHidden: function(tour) {
                    //$('#navbarDropdown2').collapse('hide');
                    //$('#selectDropdown').find('select').attr('size', 1);



                }

            },

            {
                onShow: function(tour) {

                   // $('#navbarDropdown2').collapse('show');
                    //$('#selectDropdown').find('select').attr('size', 6);


                },

                element: "#support-tour",
                placement: "auto left",
                title: "Having Problems?",
                content: "<p>Connect with us in real-time here</p>",

                onHidden: function(tour) {
                    //$('#navbarDropdown2').collapse('hide');
                    //$('#selectDropdown').find('select').attr('size', 1);



                }

            },

            {
                onShow: function(tour) {

                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#videoCards").offset().top
                    }, 1000);

                },

                element: "#videoCards",
                placement: "auto top",
                title: "Catch-up",
                content: "<p>As soon as they are ready, catch-up materials will appear here.  Give us a week or two and these will be fully tagged and linked to our other content.</p>",

                onHidden: function(tour) {
                    //$('#navbarDropdown2').collapse('hide');
                    //$('#selectDropdown').find('select').attr('size', 1);



                }

            },{
                onShow: function(tour) {

                   // $('#navbarDropdown2').collapse('show');
                    //$('#selectDropdown').find('select').attr('size', 6);
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#program-tour").offset().top
                    }, 1000);

                },

                element: "#programme-display",
                placement: "auto top",
                title: "Program Live",
                content: "<p>Here you can view a live version of the program updated in real-time.</p>",

                onHidden: function(tour) {
                    //$('#navbarDropdown2').collapse('hide');
                    //$('#selectDropdown').find('select').attr('size', 1);



                }

            },




            





        ],

        animation: true,
        container: "#bootstrapTour",
        smartPlacement: true,
        keyboard: true,
        storage: window.localStorage,
        debug: true,
        backdrop: true,
        backdropContainer: 'body',
        backdropPadding: 10,
        redirect: true,
        orphan: true,
        duration: false,
        delay: false,
        template: "<div class='popover tour'><div class='arrow'></div><h3 class='popover-title'></h3><div class='popover-content'></div><div class='popover-navigation'><button class='btn btn-default' data-role='prev'>« Prev</button><button class='btn btn-default' data-role='next'>Next »</button><button class='btn btn-default' data-role='end'>End tour</button></div></div>",
        afterGetState: function(key, value) {},
        afterSetState: function(key, value) {},
        afterRemoveState: function(key, value) {},
        onStart: function(tour) {},
        onEnd: function(tour) {

            //tour.restart();

        },
        onShow: function(tour) {},
        onShown: function(tour) {},
        onHide: function(tour) {},
        onHidden: function(tour) {},
        onNext: function(tour) {},
        onPrev: function(tour) {},
        onPause: function(tour, duration) {},
        onResume: function(tour, duration) {},
        onRedirectError: function(tour) {}


    });

    $(document).ready(function() {

if (GIEQs3){
        tourShort.init();

        // Start the tour
        tourShort.start();
}

        checkTagFiltering();


        $('[data-toggle="select"]').select2({

            //dropdownParent: $(".modal-content"),
            theme: "classic",

        });

        $(document).find('#navigatorCollapse').collapse();

        refreshNavAndTags();


        refreshProgrammeView();

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

            var tagClicked = $(this).attr('data');

            window.localStorage.setItem('selectedTag', tagClicked);

            refreshNavAndTags(tagClicked);


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


        $(document).on('click', '.showMeAround', function() {

// Initialize the tour
tourShort.init();

tourShort.start();

// Start the tour
tourShort.restart();

})













    })
    </script>
</body>

</html>