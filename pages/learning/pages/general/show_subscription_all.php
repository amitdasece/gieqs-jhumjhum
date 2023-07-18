<?php require '../../includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      //$openaccess = 1;
      $requiredUserLevel = 6;

      

      //require BASE_URI . '/pages/learning/includes/head.php';
      require BASE_URI . '/headNoPurposeCore.php';

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


        $debug = FALSE;

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


              /* load the asset */

              if (isset($assetid)){
       

        $access = null;

        if ($isSuperuser){

            $fullAccess = true;
        
        }elseif ($sitewide_status == 2){ //PRO subscription
        
            $fullAccess = true;
        
        }else{
        
            $fullAccess = false;
        }

        $access = $assetManager->is_assetid_covered_by_user_subscription($assetid, $userid, $debug, $fullAccess);

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

                    <title>GIEQs Online Endoscopy Trainer - <?php echo $page_title;?></title>


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
       



<style>
.gieqsGold {

    color: rgb(238, 194, 120);


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

/* For Tour*/

.popover-title {

background-color: rgb(238, 194, 120);
color: #162e4d;
font-size: 1rem;
}

.popover {

background-color: #193659;

}

.popover.right>.arrow::after {

border-right-color: rgb(238, 194, 120);
;
}

.btn {

padding: 2px 6px;


}

.tour-backdrop {

opacity: .3;
filter: alpha(opacity=30);


}


.gieqsGoldBackground {

    background-color: rgb(238, 194, 120);


}

.tagButton {

    cursor: pointer;

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
                <title>GIEQs Online Endoscopy Trainer - <?php echo $page_title;?></title>

</head>


<header class="header header-transparent" id="header-main">

    <!-- Topbar -->

    <?php require BASE_URI . '/pages/learning/includes/topbar.php';?>

    <!-- Main navbar -->

    <?php require BASE_URI . '/pages/learning/includes/nav.php';?>




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

                                            


                                       // echo $general->generateTagStructure();


                                            


?>
                        </select>

                    </div>
                </div>
            </form>
            <div class="omnisearch-suggestions">
                <h6 class="heading">Search Everything on GIEQs Online.  Just click above and start typing.</h6>
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="list-unstyled mb-0">
                            <!-- <li>
                                <a class="list-link">
                                    <i class="fas fa-search"></i>
                                    <span>try searching</span> training, loops etc
                                </a>
                            </li>
                            <li>
                                <a class="list-link">
                                    <i class="fas fa-search"></i>
                                    <span>or try searching a specific phrase</span> e.g. performance enhancing
                                    feedback
                                </a>
                            </li> -->
                            <li>
                                <a class="list-link" id="refreshNavSearch">
                                    <i class="fas fa-search"></i>
                                    <span>to reset the search click here</span> (search is otherwise within the
                                    search results from any previous search or filter)
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

    <!--- specifiy the tag Categories required for display  CHANGEME AND CHANGED HERE FOR ALL SHOWING-->

    <?php
        $requiredTagCategories = $general->getAllTagCategoriesUsedOnSite(); //GET ALL SHOWABLE TAG CATEGORIES IE >47
        //print_r($requiredTagCategories);
        //var_dump($requiredTagCategories);
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

    <div class="main-content bg-gradient-dark">


    <?php 
    
    //if an asset

    //$debug = true;


    
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
            <div class="d-flex flex-column m-2">

            <?php if ($partner_src){?>
            <div class="h4 p-3">In partnership with</div><img class="bg-white p-2" height="75px" src='<?php echo $partner_src;?>'>
            <?php }?>
            </div>
            <div class="d-flex flex-column m-2">

            <?php if ($sponsor_src){?>
            <div class="h4 p-3">Proudly supported by</div><img class="bg-white p-2" height="75px" src='<?php echo $sponsor_src;?>'>
            <?php }?>
            </div>
            <nav aria-label="breadcrumb" class="ml-auto align-self-center">
                <ol class="breadcrumb breadcrumb-links p-0 m-0">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL . '/pages/learning/index.php'?>">GIEQs
                            online</a></li>

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

        </div>

        <?php
    
    //on the day of a course

    if ($videoset == 3){

        //echo the same as for the GIEQs conference

        $programme_array = $assetManager->returnProgrammesAsset($assetid);
                $programme_id = $programme_array[0];
                $programme->Load_from_key($programme_id);

                $serverTimeZoneNav = new DateTimeZone('Europe/Brussels'); //because this is where course is held


                $currentNavTime = new DateTime('now', $serverTimeZoneNav);


                if ($courseTest == true){

                    $currentNavTime = new DateTime($programme->getdate(), $serverTimeZoneNav);


                }


                $courseDate = new DateTime($programme->getdate(), $serverTimeZoneNav); //get course date from Programme

                $firstDate = $currentNavTime->format('Y-m-d');
                $secondDate = $courseDate->format('Y-m-d');


        if ($firstDate == $secondDate){




        ?>

        <div class="container-fluid ">
            <div class="row d-flex flex-wrap py-1 px-6">


                <h5 class="text-gieqsGold mr-auto ml-8">GIEQs Live Course View</h5>




                <a class="btn btn-sm text-dark gieqsGoldBackground" role="button"
                    href="<?php echo $programme->geturl_zoom();?>" target="_blank">LIVE - Access Zoom Meeting</a>
                <a class="btn btn-sm text-dark gieqsGoldBackground" role="button" href="#programme-display">View
                    Programme</a>


            </div>
            <div class="row d-flex flex-wrap align-items-lg-stretch py-4 px-6">

            <?php //fix for chat window 

            
            
            if ($programme->geturl_slido() != ''){?>

<?php
                echo '<div class="col-lg-9">';
                ?>
                <div style="padding:56.25% 0 0 0;position:relative;"><iframe
        src="<?php echo $programmeReports->getVimeoURLProgramme($programme_id); ?>" frameborder="0"
        allow="autoplay; fullscreen; picture-in-picture" allowfullscreen
        style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe></div>
</div>
<div class="col-lg-3 p-0 m-0">
<iframe src="<?php echo $programme->geturl_slido();?>" width="100%" height="100%"
    frameborder="0"></iframe>
</div>


<?php

            }else{

                

                echo '<div class="col-lg-12">';xw
               ?> <div style="padding:56.25% 0 0 0;position:relative;"><iframe
        src="<?php echo $programmeReports->getVimeoURLProgramme($programme_id); ?>" frameborder="0"
        allow="autoplay; fullscreen; picture-in-picture" allowfullscreen
        style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe></div>
</div>
<?php
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



        </div>
        <div id="videoCards" class="flex-wrap">


            <div class="d-flex align-items-center">
                <strong>Loading...</strong>
                <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
            </div>




        </div>

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
    <script src="<?php echo BASE_URL . "/assets/js/generaljs.js"?>"></script>
    <script src="<?php echo BASE_URL;?>/assets/libs/select2/dist/js/select2.min.js"></script>


    <script>
    var videoPassed = $("#id").text();
    </script>

    <script src=<?php echo BASE_URL . "/pages/learning/includes/social.js"?>></script>

    <script>
    //the number that are actually loaded
    var loaded = 1;

    //the number the user wants
    var loadedRequired = 1;

    var firstTime = 1;

    var activeStatus = 1;

    var requiredTagCategoriesText = $("#requiredTagCategories").text();

    var requiredTagCategories = JSON.parse(requiredTagCategoriesText);

    var requiredVideosText = $("#requiredVideos").text();

    var requiredVideos = JSON.parse(requiredVideosText);


    function close_omnisearch() {


        //target = $this.data('target');
        $('[data-action="search-open"]').removeClass('active');
        $('#omnisearch').removeClass('show');
        $('body').removeClass('omnisearch-open').find('.mask-body').remove();


    }

    function open_omnisearch() {


//target = $this.data('target');
$('[data-action="search-open"]').addClass('active');
$('#omnisearch').addClass('show');
$('#omnisearch').find('.form-control').focus();
$('#omnisearch').closest(".select2-container").siblings('select:enabled').select2('open');
$('body').addClass('omnisearch-open').append('<div class="mask-body mask-body-dark" data-action="omnisearch-close" data-target="#omnisearch" />');
//$('#tags').select2('open');
                //what is required


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

                    window.localStorage.setItem('selectedTag', tagid);

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

                    //$('#navigatorCollapse').collapse('show');  //change here to prevent the dropdown

                }

            })
            /* waitForFinalEvent(function() {
                //alert('Resize...');
                

            }, 200, "filter by overall tag available"); */



        }

    }


    $(document).ready(function() {


        open_omnisearch();

        checkTagFiltering();

        // on first focus (bubbles up to document), open the menu
/* $(document).on('focus', '.select2-selection.select2-selection--single', function (e) {
  $(this).closest(".select2-container").siblings('select:enabled').select2('open');
}); */

/* // steal focus during close - only capture once and stop propogation
$('select.select2').on('select2:closing', function (e) {
  $(e.target).data("select2").$selection.one('focus focusin', function (e) {
    e.stopPropagation();
  });
}); */


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

        $(document).on('click', '#refreshNavSearch', function(event) {

            //event.preventDefault();

            alert('Search Reset.  Type again to search in all content.');

            resetNavigation();

            $('#omnisearch').find('.form-control').focus();



        })

        //on load check if any are checked, if so load the videos

        //if none are checked load 10 most recent videos for these categories

        $('.tag').click(function() {

            var tagClicked = $(this).attr('data');

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

// Start the tour
tourShort.restart();

})












    })
    </script>
</body>

</html>