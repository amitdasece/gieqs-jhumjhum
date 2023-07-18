<?php require 'includes/config.inc.php';

error_reporting(E_NONE);
ini_set('display_errors', 0);

$light_theme = false;
      //define user access level
      if (substr_count($_SERVER['HTTP_USER_AGENT'],'Googlebot')){
        $openaccess = 1;
      }else{
        $openaccess = 0;
      }

      $requiredUserLevel = 6;    
      require BASE_URI . '/pages/learning/includes/head.php';
      require_once(BASE_URI . '/pages/learning/classes/general.class.php');
      $general = new general;
      $users = new users;

      require_once(BASE_URI . '/pages/learning/classes/usersViewsVideo.class.php');
$usersViewsVideo = new usersViewsVideo;  
      $usersSocial = new usersSocial;
      $usersLikeVideo = new usersLikeVideo;        
        $usersFavouriteVideo = new usersFavouriteVideo;
        require_once(BASE_URI . '/assets/scripts/classes/userFunctions.class.php');
$userFunctions = new userFunctions;
        require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;
        $assetManager = new assetManager;
        require(BASE_URI . '/vendor/autoload.php');
use Vimeo\Vimeo;
// Get this from your account
$vimeo_client_id = '47b9e04f8014da6dc06bbd4b5879d2f3dff2fc1c';
$vimeo_client_secret = '+7btjhyrrfEaZpAfLX81+pPrxOYlIS9A2d5Jj27GU7JyprVjwBGHK0+LE/XS0++3Ai060tT4msKZa4LbOQFOwOANa8JWqvz6D4k7XXFi4g8vEoBrH6Oh3RwQlaZUZCuP';

// This has to be generated on your site, plugin or theme
$vimeo_token = 'cc33c4732d5f31ff9b681b23591bd95d';
//error_reporting(E_ALL);

$client = new Vimeo($vimeo_client_id, $vimeo_client_secret, $vimeo_token);


if (isset($_GET["id"]) && is_numeric($_GET["id"])){
    $id = $_GET["id"];

}else{

    $id = null;

}


if (isset($_GET["chapternumber"]) && is_numeric($_GET["chapternumber"])){
    $chapternumber = $_GET["chapternumber"];

}else{

    $chapternumber = null;

}

$response = $client->request('/videos/' . $general->getVimeoID($id));

   
    $embedCode = $response['body']['embed']['html'];

    $playimg = $response['body']['pictures']['sizes'][5]['link_with_play_button'] . '?' . uniqid();

    //var_dump($embedCode);

    $scriptTagPattern = '/src\s*=\s*"(.+?)"/'; 

    preg_match($scriptTagPattern, $embedCode, $matches);
    
//print_r($matches);

    $requiredVimeoURL = $matches[1];

    $requiredVimeoURL = trim($requiredVimeoURL);

      ?>

    <!--Page title-->
     <!--Page title-->
     <title>GIEQs Online | <?php echo $general->getVideoTitle($id); ?></title>
    <meta name="description" content="<?php echo $general->getVideoSubTitle($id);?>">

    <meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@gieqs_symposium">
<meta name="twitter:creator" content="@djtate35">
<meta name="twitter:title" content="<?php echo $general->getVideoTitle($id);?>">
<meta name="twitter:description" content="<?php echo $general->getVideoSubTitle($id);?>">
<meta name="twitter:image" content="<?php echo $playimg;?>">

<meta property="og:type" content="website" />
<meta property="fb:app_id" content="493045018280075" />

<meta property="og:url" content="https://www.gieqs.com/free-videos/<?php echo $id;?>">
<meta property="og:title" content="<?php echo $general->getVideoTitle($id);?>">
<meta property="og:description" content="<?php echo $general->getVideoSubTitle($id);?>">
<meta property="og:image" content="<?php echo $playimg;?>">
    



    <script src=<?php echo BASE_URL . "/assets/js/jquery.vimeo.api.min.js"?>></script>
    <script src="<?php echo BASE_URL . "/node_modules/@vimeo/player/dist/player.js"?>"></script>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">
    <link href="<?php echo BASE_URL;?>/node_modules/bootstrap-tour/build/css/bootstrap-tour-standalone-gieqs.css"
        rel="stylesheet">


    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.css">
    <script src="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/autosize/dist/autosize.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/node_modules/bootstrap-tour/build/js/bootstrap-tour-standalone.min.js">


<?php require BASE_URI . '/assets/scripts/purchase.php';?>

    




    <style>
    .gieqsGold {

        color: rgb(238, 194, 120) !important;


    }

    /* Tag highlighting */

    .badge {

        font-weight: 550 !important;
    }

    .unhighlightedTag {

        color: #95aac9 !important;
        background-color: #162e4d !important;

    }

    .highlightedTag {

        color: rgb(238, 194, 120) !important;
        background-color: #162e4d !important;

    }

    .selectedTag {

        color: #162e4d !important;
        background-color: rgb(238, 194, 120) !important;

    }


    .indigo {

        background-color: #6e00ff !important;

    }

    .alert {

        z-index: 25;
    }

    .close>span:not(.sr-only) {
        color: white !important;
    }

    .collapsing {
        -webkit-transition: none;
        transition: none;
        display: none;
    }

    .tagButton {

        cursor: pointer;

    }

    .showMeAround {

        cursor: pointer;

    }

    .chapterSkip {

        cursor: pointer;

    }

    .tagCard {

        background-color: #1b385dde;



    }

    .tagCardHeader {

        background-color: #162e4d;

    }


    .video {


        box-sizing: border-box;
        /* height: 25.25vw; */
        /* min-height: 100%;
    min-width: 100%; */
        transform: translate(-50%, -50%);
        position: absolute;

    }

    .cursor-pointer {

        cursor: pointer;

    }

    .card-body ::-webkit-scrollbar {

        display: none;

    }

    .card-body {

        -ms-overflow-style: none;
    }

    

    @media (min-width: 992px) {
        .tagCard {


            left: -50vw;
            top: -20vh;
            min-width: 30vw;


        }

        .video {
            box-sizing: border-box;
            height: 25.25vw;
            /* min-height: 100%;
    min-width: 100%; */
/*             transform: translate(-50%, -50%);
 */            position: absolute;
            left: 50%;
            top: 50%;
            width: 100.77777778vh;

        }

        #col-container {

            padding-left: 0px !important;
            padding-right: 0px !important;

        }
    }

    @media (max-width: 576px) {
        #videoDisplay {

            width: 100vw;
            position: relative;
            margin-left: -50vw;
            left: 50%;
            height: auto;

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
            width: 200%;
            position: absolute;
        }



    }

    @media (min-width: 577px) {
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

        .video-wrap {
            text-align: center;
        }

        .video iframe {
            max-width: 100%;
            max-height: 100%;
        }

        .video.stuck {
            z-index: 25;
            position: fixed;
            bottom: -300px;
            right: 20px;
            -webkit-transform: translateY(100%);
            transform: translateY(100%);
            width: 400px !important;

            -webkit-animation: fade-in-up .25s ease forwards;
            animation: fade-in-up .25s ease forwards;
        }
    }

    /* swal-text {
  background-color: #162e4d;
  padding: 17px;
  border: 1px solid #F0E1A1;
  display: block;
  margin: 22px;
  text-align: center;
  color: #162e4d;
} */


    /* html, body {
    background-color: #222C32;
    height: 100%;
    font-family: 'Open Sans', sans-serif;
    box-sizing: border-box;
} */

    /* sticky fix*/
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



    .cd-container {
        width: 90%;
        max-width: 1080px;
        margin: 0 auto;

        padding: 0 10%;
        border-radius: 2px;
        box-sizing: border-box;
    }

    .cd-container::after {
        content: '';
        display: table;
        clear: both;
    }

    /* -------------------------------- Main components -------------------------------- */
    #cd-timeline {
        position: relative;
        padding: 2em 0;
        margin-top: 2em;
        margin-bottom: 2em;
    }

    #cd-timeline::before {
        content: '';
        position: absolute;
        top: 0;
        left: 25px;
        height: 100%;
        width: 4px;
        background: rgba(255, 255, 255, 0.7);
    }

    @media only screen and (min-width: 1170px) {
        #cd-timeline {
            margin-top: 3em;
            margin-bottom: 3em;
        }

        #cd-timeline::before {
            left: 50%;
            margin-left: -2px;
        }
    }

    .cd-timeline-block {
        position: relative;
        margin: 2em 0;
    }

    .cd-timeline-block:after {
        content: "";
        display: table;
        clear: both;
    }

    .cd-timeline-block:first-child {
        margin-top: 0;
    }

    .cd-timeline-block:last-child {
        margin-bottom: 0;
    }

    @media only screen and (min-width: 1170px) {
        .cd-timeline-block {
            margin: 4em 0;
        }

        .cd-timeline-block:first-child {
            margin-top: 0;
        }

        .cd-timeline-block:last-child {
            margin-bottom: 0;
        }
    }

    .cd-timeline-img {
        position: absolute;
        top: 8px;
        left: 12px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        box-shadow: 0 0 0 4px #eec278, inset 0 2px 0 rgba(0, 0, 0, 0.08), 0 3px 0 4px rgba(0, 0, 0, 0.05);
    }

    .cd-timeline-img {
        background: #12263f;
    }

    @media only screen and (min-width: 1170px) {
        .cd-timeline-img {
            width: 30px;
            height: 30px;
            left: 50%;
            margin-left: -15px;
            margin-top: 15px;
            /* Force Hardware Acceleration in WebKit */
            -webkit-transform: translateZ(0);
            -webkit-backface-visibility: hidden;
        }
    }

    .cd-timeline-content {
        position: relative;
        margin-left: 60px;
        margin-right: 30px;
        background: #193659;
        border-radius: 2px;
        padding: 1em;
    }

    .timeline-active {

        border: 5px solid rgb(238, 195, 120) !important;

    }

    .cd-date-active {

        color: rgb(238, 195, 120) !important;

    }

    .cd-timeline-content .timeline-content-info {
        background: #162e4d;
        padding: 5px 10px;
        color: rgba(255, 255, 255, 0.7);
        font-size: 12px;
        box-shadow: inset 0 2px 0 rgba(0, 0, 0, 0.08);
        border-radius: 2px;
    }

    .cd-timeline-content .timeline-content-info i {
        margin-right: 5px;
    }

    .cd-timeline-content .timeline-content-info .timeline-content-info-title,
    .cd-timeline-content .timeline-content-info .timeline-content-info-date {
        width: calc(50% - 2px);
        display: inline-block;
    }

    @media (max-width: 500px) {

        .cd-timeline-content .timeline-content-info .timeline-content-info-title,
        .cd-timeline-content .timeline-content-info .timeline-content-info-date {
            display: block;
            width: 100%;
        }
    }

    .cd-timeline-content .content-skills {
        font-size: 12px;
        padding: 0;
        margin-bottom: 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .cd-timeline-content .content-skills li {
        background: #162e4d;
        border-radius: 2px;
        border-color: #eec278;
        display: inline-block;
        padding: 2px 10px;
        color: #95aac9;
        margin: 3px 2px;
        text-align: center;
        flex-grow: 1;
    }

    .cd-timeline-content:after {
        content: "";
        display: table;
        clear: both;
    }

    .cd-timeline-content h2 {
        color: rgba(255, 255, 255, .9);
        margin-top: 0;
        margin-bottom: 5px;
    }

    .cd-timeline-content p,
    .cd-timeline-content .cd-date {
        color: rgba(255, 255, 255, .7);
        font-size: 13px;
        font-size: 0.8125rem;
    }

    .cd-timeline-content .cd-date {
        display: inline-block;
    }

    .cd-timeline-content p {
        margin: 1em 0;
        line-height: 1.6;
    }

    .cd-timeline-content::before {
        content: '';
        position: absolute;
        top: 16px;
        right: 100%;
        height: 0;
        width: 0;
        border: 7px solid transparent;
        border-right: 7px solid #333c42;
    }

    @media only screen and (min-width: 768px) {
        .cd-timeline-content h2 {
            font-size: 20px;
            font-size: 1.25rem;
        }

        .cd-timeline-content p {
            font-size: 16px;
            font-size: 1rem;
        }

        .cd-timeline-content .cd-read-more,
        .cd-timeline-content .cd-date {
            font-size: 14px;
            font-size: 0.875rem;
        }
    }

    @media only screen and (min-width: 1170px) {
        .cd-timeline-content {
            color: white;
            margin-left: 0;
            padding: 1.6em;
            width: 36%;
            margin: 0 5%;
        }

        .cd-timeline-content::before {
            top: 24px;
            left: 100%;
            border-color: transparent;
            border-left-color: #333c42;
        }

        .cd-timeline-content .cd-date {
            position: absolute;
            width: 100%;
            left: 135% !important;
            top: 6px;
            font-size: 16px;
            font-size: 1rem;
        }

        .cd-timeline-block:nth-child(even) .cd-timeline-content {
            float: right;
        }

        .cd-timeline-block:nth-child(even) .cd-timeline-content::before {
            top: 24px;
            left: auto !important;
            right: 100%;
            border-color: transparent;
            border-right-color: #333c42;
        }

        .cd-timeline-block:nth-child(even) .cd-timeline-content .cd-read-more {
            float: right;
        }

        .cd-timeline-block:nth-child(even) .cd-timeline-content .cd-date {
            left: auto !important;
            right: 135% !important;
            text-align: right;
        }
    }
    </style>


</head>

<body class="bg-gradient-dark">
    <header class="header header-transparent" id="header-main">
        <!-- Topbar -->
        <?php require BASE_URI . '/pages/learning/includes/topbar.php';?>
        <!-- Main navbar -->

        <?php require BASE_URI . '/pages/learning/includes/nav.php';?>
    </header>
    <?php
        if ($id){

            $q = "SELECT  `id`  FROM  `video`  WHERE  `id`  = $id";
            if ($general->returnYesNoDBQuery($q) != 1){
                echo '<div class="container mt-10 mb-10">';
                echo "Passed id does not exist in the database";
                echo '</div>';
                include(BASE_URI . "/footer.php");
                exit();

            }
        }else {
            echo '<div class="container mt-10 mb-10">';
            echo "This page requires the id of a video existing in the database to be passed";
            echo '</div>';
            include(BASE_URI . "/footer.php");
            exit();
            
        }


        if (isset($_GET["referid"])){
            $referid = $_GET["referid"];
        
        }else{
        
            $referid = null;
        
        }

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
        ?>
                        
    

    <!-- load all video data -->

    <div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>

    <div id="chapternumber" style="display:none;"><?php if ($chapternumber){echo $chapternumber;}?></div>




    <div id="vimeoid" style="display:none;"><?php echo $general->getVimeoID($id);?></div>

   


    <div id="videoChapterData" style="display:none;">
        <?php $chapterData = $general->getVideoAndChapterDatav1php($id); echo $general->getVideoAndChapterDatav1($id);?>
    </div>

    <div id="videoChapterTagData" style="display:none;"><?php echo $general->getVideoAndChapterData($id);?>
    </div>

    <div id="TagDataPerChapter" style="display:none;"><?php echo $general->getTagDataPerChapter($id);?>
    </div>

    <div id="videoData" style="display:none;"><?php $videoDataMod = $general->getVideoDataMod($id);
                        
                        //print_r($videoDataMod);

                        echo '<br/><br/>' . $videoDataMod[0]['description'] . '</br>';
                        
                        $author = $videoDataMod[0]['author'];
                        $tagger = $videoDataMod[0]['tagger'];
                        $recorder = $videoDataMod[0]['recorder'];
                        $editor = $videoDataMod[0]['editor'];

                        //$videoDataMod[0]['description'] = 


                        //echo $author;

                        $authorText = $users->getUserName($author);

                        if ($tagger){
                        $taggerText = $users->getUserName($videoDataMod[0]['tagger']);
                        }

                        if ($recorder){
                        $recorderText = $users->getUserName($videoDataMod[0]['recorder']);
                        }

                        if ($editor){
                        $editorText = $users->getUserName($videoDataMod[0]['editor']);
                        }

                        $users->Load_from_key($author);

                        $videoDataMod[0]['author'] = $authorText;
                        $videoDataMod[0]['tagger'] = $taggerText;
                        $videoDataMod[0]['recorder'] = $recorderText;
                        $videoDataMod[0]['editor'] = $editorText;
                        $videoDataMod[0]['authorid'] = $author;
                        $videoDataMod[0]['taggerid'] = $tagger;
                        $videoDataMod[0]['recorderid'] = $recorder;
                        $videoDataMod[0]['editorid'] = $editor;
                        $videoDataMod[0]['centreName'] = $users->getcentreName($author);
                        $videoDataMod[0]['centreCity'] = $users->getcentreCity($author);
                        $country = $users->getcentreCountry($author);
                        $videoDataMod[0]['centreCountry'] = $general->getCountryName($country);

                        $users->endusers();
                        

                        echo json_encode($videoDataMod);

                        
                        ?></div>

    <div id="tagsData" style="display:none;"><?php echo $general->getTagsVideo($id);?></div>

    <div id="tagCategories" style="display:none;">
        <?php $allCategories = $general->getAllTagCategories(); //print_r($allCategories);
        ?>
    </div>


    

    <!--GET TAG CATEGORY NAME 
                    
                    <?php

                        $tagBox = null;

                        foreach ($allCategories as $key=>$value){

                            //display the header only if a match

                            //database query, is there a tag in this category associated with this video

                            if ($general->isThisTagCategoryRepresentedInVideo($id, $value['id'])){
                                
                                $tagBox .= '<div class="row align-items-left">';
                                    
                                    $tagBox .= '<span class="h6 mt-1"> ' . $value['tagCategoryName'] . '</span>';

                                    $tagsRequired = $general->getTagsVideoWithCategoryNonJSON($id);

                                    //print_r($tagsRequired);

                                    $tagBox .=  '</div>';
                                    
                                    $tagBox .= '<div class="row align-items-left">';

                                    foreach ($tagsRequired as $key1=>$value1){

                                        if ($value1['tagCategories_id'] == $value['id']){

                                            //remove clickability if user is above 4

                                            if ($currentUserLevel > 4){

                                                $tagBox .= '<span class="badge bg-dark mx-2 mb-1" data-tag-id="' . $value1['id'] . '" id="tag' . $value1['id'] . '">' . $value1['tagName'] . '</span>'; 

                                            }else{

                                           $tagBox .= '<span class="badge bg-dark mx-2 mb-1 tagButton tagTagsboxButton" data-tag-id="' . $value1['id'] . '" id="tag' . $value1['id'] . '">' . $value1['tagName'] . '</span>'; 
                                            }
                                        }

                                    }

                                    

                                $tagBox .=  '</div>';

                                //$('#tagsDisplay').append('<span class="badge badge-info mx-2 my-2 tagButton" id="tag' + id + '">' + tagName + '</span>');

                                //echo $tagBox;

                            }else{

                                continue;
                            }
                            //if so display the card section

                            //if not continue
                            //look in the tagsVideo array
                            //check if any match 

                            


                        }


?>
                    
                TODO see other videos with similar tags, see videos with this tag, tag jump the video,
                list of chapters with associated tags [toggle view by category, chapter]
                
                -->


    <!-- Omnisearch -->

    <div class="main-content  pt-8">

        <?php require BASE_URI . '/pages/learning/assets/videoNav.php';?>
        <?php require BASE_URI . '/pages/learning/assets/tagNav.php';?>

        <?php


        //check access

        //set superuser if there is a pro subscription
        //fix here

        

        if ($isSuperuser){

            $fullAccess = true;

        }elseif ($sitewide_status == 2){ //PRO subscription

            $fullAccess = true;

        }else{

            $fullAccess = false;
        }

if ($assetManager->determineVideoAccessSingleVideo($id, $fullAccess, $userid, false) === false){

    require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
    $assets_paid = new assets_paid;


    echo '<div class="container">';
                    echo "<p class='mt-4'>This learning tool requires a subscription or upgrade.  Your options for getting access are: <br/><br/> </p> ";

?>

<div class="card m-4">
<div class="card-header">
    <h5 class="card-title mb-0">Get a better GIEQs Online Experience - <span class="gieqsGold"> Never see this screen again!</span></h5>
    <span class="text-muted text-sm">Sign up for GIEQs Pro and never be interrupted by these screens again.</span>
</div>
<div class="card-body">

    <p class="mb-0 text-white">
        When browsing on GIEQs Online if you own a GIEQs Pro Subscription you have access to all content and will never be interrupted by this screen again.  This means you can seamlessly browse all our best content by tag without having to navigate around these messages.  The endoscopic learning you want.  When you want it.

    </p>
    
</div>
<div class="card-footer">

  

<a href="<?php echo BASE_URL . '/pages/learning/upgrade.php';?>" data-assetid="<?php echo $value2; ?>"
                                class="more-info btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon px-2">
                                <span class="btn-inner--text text-dark">Find our More about GIEQs Pro</span>
                                <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                            </a>
  


</div>

</div>


<?php


                    $availableAssets = $assetManager->getAccessVideo($id, false);
                    foreach ( $availableAssets as $key=>$value){

                        foreach ($value as $key2=>$value2){
                        //echo $value2;
                        $assets_paid->Load_from_key($value2);
                        ?>



<div class="card m-4">
<div class="card-header">
    <h5 class="card-title mb-0"><?php echo $assets_paid->getname();?></h5>
    <span class="text-muted text-sm">Access is immediate after concluding registration</span>
</div>
<div class="card-body">

    <p class="mb-0 text-white">
        <?php echo $assets_paid->getdescription();?>
    </p>
    
</div>
<div class="card-footer">
<a data-assetid="<?php echo $value2; ?>"
                                class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon px-2">
                                <span class="btn-inner--text text-dark">Buy Now for &euro;<?php echo $assets_paid->getcost();?></span>
                                <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                            </a>
  

<a href="<?php echo BASE_URL . '/pro-content/' . $value2;?>" data-assetid="<?php echo $value2; ?>"
                                class="more-info btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon px-2">
                                <span class="btn-inner--text text-dark">More info</span>
                                <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                            </a>
  

<a href="mailto:admin@gieqs.com"
                                class="btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon px-2">
                                <span class="btn-inner--text text-dark">Help with an Issue</span>
                                <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                            </a>
  
</div>

</div>
<?php
                        }
                    }
                    ?>
                    
<?php
                    echo '</div>';
                    echo '</div>';
                    ?>
                    <script src="../../assets/js/purpose.core.js"></script>
                    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>
                    <script src="<?php echo BASE_URL;?>/node_modules/jquery-validation/dist/jquery.validate.js"></script>
                    <script src="../../assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
                
                
                    <script src=<?php echo BASE_URL . "/assets/js/generaljs.js"?>></script>
                
                  <?php
                
              require BASE_URI . '/assets/scripts/purchase.php';


                    include(BASE_URI . "/footer.php");
                    exit();

}

//RECORD THE USER DETAILS AND VIEW
  

//echo $userid; echo $id; echo 'hello';
$debug = false;

if ($debug){

    echo '<br/>Debug Cookie Information</br>';
    echo '<pre style="color:white">';
    var_dump($_COOKIE);
    echo '</pre>';
    echo '<div id="cookiedebug"></div>';
    echo '<br/>Debug Cookie Information</br>';
}

$current_date = new DateTime('now', new DateTimeZone('UTC'));

$current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s');


                        if ($usersViewsVideo->matchRecord2way($userid, $id) === false){  
                            
                            //if not recorded already

                            //echo $userid; echo $id;
                $usersViewsVideo->setuser_id($userid);
                $usersViewsVideo->setvideo_id($id);


                $usersViewsVideo->setfirstView($current_date_sqltimestamp);
                $usersViewsVideo->setrecentView($current_date_sqltimestamp);


                $usersViewsVideo->prepareStatementPDO();

            

                
            }elseif ($usersViewsVideo->matchRecord2way($userid, $id) === true) {

                //already viewed
                //update most recent view time
                //increment view counter
                //get the key

                $key = $usersMetricsManager->getKeyUserViewsVideoMatch($userid, $id);


                if ($debug){

                    echo $key . 'is key';
                }

                $usersViewsVideo->Load_from_key($key);


                if ($debug){

                    echo $usersViewsVideo->getid();
                    echo $current_date_sqltimestamp;
                }


                $usersViewsVideo->setrecentView($current_date_sqltimestamp);

                $usersViewsVideo->prepareStatementPDOUpdate();



            }




                

?>




        <div class="d-flex align-items-end">
            <div class="container pt-4 pt-lg-4" id="mainContainer">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb breadcrumb-links p-0 m-0">
                        <li class="breadcrumb-item"><a href="<?php echo BASE_URL . '/pages/learning/index.php'?>">GIEQs
                                online</a></li>
                        <li class="breadcrumb-item"><a
                                href="<?php echo 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}" . $referid?>">Video
                                Search</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Video Viewer</li>
                    </ol>
                    <div class="alert alert-dark d-none sticky-top" role="alert" style="position:absolute !important;">
                    </div>
                </nav>
                <div class="row" id="videoTitleTour" style="margin-right:15px; margin-left:15px;">
                    <spa class="h3 mb-0 text-white d-block w-lg-75 w-xl-75">
                        <?php echo $general->getVideoTitle($id)?></span>
                </div>

                <div class="row" style="margin-right:15px; margin-left:15px;">
                    <span class="col-xl-8 text-muted text-md d-block my-2" id="videoDescription"><?php echo $videoDataMod[0]['description'];?></span>
                </div>

                <a class="dropdown-item gieqsGold" id="descriptionDropdownButton" data-toggle="collapse"
                                href="#collapseDescription" aria-expanded="false" aria-controls="collapseDescription">
                                <i class="fas fa-chevron-circle-up"></i> show Summary (new, AI driven!)
                            </a>
                <div id="collapseDescription" class="collapse row" style="margin-right:15px; margin-left:15px;">
                    <div class="col-xl-8 text-muted text-md d-block my-2" id="videoSummary" style="text-align: justify;">

                    <h3>In brief</h3>
                    
                    <?php echo $videoDataMod[0]['summary'];?>

                    <h3>Detailed Summary</h3>

                    <?php echo $videoDataMod[0]['detailedSummary'];?>

                
                </div>
                </div>

                <div class="row">
                    <div class="col-lg-7 mb-0 mb-lg-0 pl-lg-5">

                        <div class="row">
                            <div id="actionsTour" class="col text-left mt-0 align-items-center">
                                <div class="actions">
                                    <a class="action-item action-favorite p-0 m-0 pr-4 likes" data="<?php echo $id;?>">
                                        <i class="fas fa-heart mr-1 pr-1 <?php if ($usersFavouriteVideo->matchRecord2way($userid, $id) === true){echo 'gieqsGold';}else{echo 'text-muted';}?>"
                                            data-toggle="tooltip" data-placement="bottom"
                                            title="click to favourite"></i> <span
                                            id="favouritesNumber"><?php echo $usersSocial->countFavourites($id);?></span></a>

                                            <a class="action-item action-stars p-0 m-0 pr-4 stars" data="<?php echo $id;?>">
                                            <i class="fas fa-star star1" mr-1 pr-1 <?php if ($usersFavouriteVideo->matchRecord2way($userid, $id) === true){echo 'gieqsGold';}else{echo 'text-muted';}?>"
                                            ></i><i class="fas fa-star star2"></i><i class="fas fa-star star3"></i><i class="fas fa-star star4"></i><i class="fas fa-star star5"></i></a>

                                    <a class="action-item action-like p-0 m-0 pr-4 views" data="<?php echo $id;?>">
                                        <i class="fas fa-thumbs-up mr-1 <?php if ($usersLikeVideo->matchRecord2way($userid, $id) === true){echo 'gieqsGold';}else{echo 'text-muted';}?>"
                                            data-toggle="tooltip" data-placement="bottom" title="click to like"></i>
                                        <span id="likesNumber"><?php echo $usersSocial->countLikes($id);?></span></a>

                                    <a class="action-item p-0 m-0 pr-4 views"><i class="fas fa-eye mr-1"
                                            data-toggle="tooltip" data-placement="bottom" title="views"></i> <span
                                            id="viewsNumber"><?php echo $usersSocial->countViews($id);?></span></a>
                                    <a class="action-item p-0 m-0 pr-1 text-wrap"><i class="fas fa-user mr-1"></i>
                                        <span id="videoAuthor" class="flex-grow"></span>
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="row" style="height:120px; overflow-y: hidden;">
                            <div class="col text-left mt-0 align-items-center">
                                <div class="tagsActive d-flex flex-wrap mt-3 mb-4">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 mb-0 mb-lg-0 align-self-center">
                        <div class="text-right ">


                            <?php if ($currentUserLevel < 6){ // message to upgrade if basic?>
                            <a class="dropdown-item" id="tagDropdownButton" data-toggle="collapse"
                                href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-chevron-circle-up"></i> show tags
                            </a>


                            <?php }else{?>
                            <a class="dropdown-item" onclick="alert('Upgrade to view tags');" aria-expanded="false"
                                aria-controls="collapseExample">
                                <i class="fas fa-chevron-circle-up"></i> show tags
                            </a>


                            <?php }?>
                            <a class="dropdown-item" id="chapterDropdownButton" data-toggle="collapse"
                                href="#selectDropdown" aria-expanded="false" aria-controls="selectDropdown">
                                <i class="fas fa-chevron-circle-up"></i> show chapters
                            </a>


                        </div>
                        <div class="collapse mb-0" id="collapseExample">
                            <div class="card mb-0 tagCard">
                                <div class="card-header tagCardHeader mb-0">
                                    <i style="float:right;" class="fas fa-times tagsClose cursor-pointer"></i>
                                    <span id="tagsTitleTour" class="h6">Tags <br /></span><span id="tagsFilterTour"
                                        class="text-sm">(click to
                                        filter)</span><span class="text-sm text-right"> <a style="float:right;"
                                            id="tagsCloseTour" class="cursor-pointer" onclick="undoFilterByTag();"><i
                                                class="fas fa-undo"></i> Undo Filter</a></span>
                                </div>
                                <div class="card-body mt-0 pt-0">

                                    <div id="tagsDisplay" class="flex-wrap">
                                        <?php echo $tagBox;?>
                                    </div>


                                </div>
                            </div>


                        </div>
                        <div class="collapse card mb-0 p-2 flex-row" id="selectDropdown">
                            <div class="container">
                                <div class="row">
                                    <span class="mb-0 pl-2 pt-2 flex-grow-1">Choose chapter</span>
                                    <button type="button" class="close text-right text-white" data-toggle="collapse"
                                        href="#selectDropdown" aria-label="Close">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="row">
                                    <?php
                                if ($currentUserLevel == 1){}?>
                                    <?php echo $general->getChapterSelector($id);?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id='chapterSelectorDiv' class="col-lg-3 mb-0 mb-lg-0 mt-2 py-0 text-center vertical-align-top">

                        <div class="card mb-0">
                            <div class="card-header" style="    padding-right: 0.5em;
    padding-left: 1.5em;
    padding-bottom: 0.5em;
    padding-top: 0.5em;">
                                <div class="d-flex justify-content-between align-items-center p-0">
                                    <div>
                                        <h6 class="mb-0">Chapter Navigation</h6>
                                    </div>
                                    <div class="text-right">
                                        <div class="actions">
                                            <a href="#" class="action-item"><i class="fas fa-sync" data-toggle="tooltip"
                                                    data-placement="bottom" title="restart video"></i></a>

                                            <!-- <a class="action-item" data-toggle="collapse" href="#selectDropdown"><i
                                                    class="fas fa-ellipsis-h" data-toggle="tooltip" data-placement="bottom" title="show chapters"></i></a> -->

                                            <?php if ($currentUserLevel < 3){?>

                                            <a href="<?php echo BASE_URL; ?>/pages/learning/scripts/forms/videoChapterForm.php?id=<?php echo $id;?>"
                                                class="action-item"><i class="fas fa-edit" data-toggle="tooltip"
                                                    data-placement="bottom" title="edit video"></i></a>

                                            <?php }?>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="list-group">


                                <a class="list-group-item p-0">

                                    <div class="d-flex align-items-center justify-content-between">

                                        <div class="flex-fill p-2 text-limit">
                                            <h6 id="chapterHeadingControl"
                                                class="progress-text mb-1 text-sm d-block text-limit text-left">Video
                                                Credits
                                            </h6>
                                            <div id="myProgress" class="progress progress-xs mb-0">
                                                <div id="myBar" class="progress-bar bg-gieqsGold" role="progressbar"
                                                    style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                            <div
                                                class="d-flex justify-content-between text-xs text-muted text-right mt-1">

                                                <div>
                                                    <i id='video-back' class="fas fa-step-backward cursor-pointer"></i>
                                                </div>
                                                <div>
                                                    <i id='video-start-pause' class="fas fa-play cursor-pointer"></i>
                                                </div>
                                                <div>
                                                    <i id='video-stop' class="fas fa-stop cursor-pointer"></i>
                                                </div>
                                                <div>
                                                    <i id='video-forward'
                                                        class="fas fa-step-forward cursor-pointer"></i>
                                                </div>
                                                <div>
                                                    <span id='currentChapterTime'></span>

                                                </div>


                                                <!--  <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1"></label>
                                                </div> -->

                                                <div class="font-weight-bold gieqsGold">
                                                    <span id="currentChapter">x</span> / <span
                                                        id="totalChapters">y</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>







        <div id="playerContainer" class="d-flex align-items-end" style="padding-left:15px; padding-right:15px;">
            <div class="container mt-2 mb-2 py-0">
                <div class="row">
                    <div id="col-container" class="col-lg-9 mb-0 mb-lg-0 pr-lg-3">



                        <div class="container">
                            <div id="videoDisplay" class="embed-responsive embed-responsive-16by9 video-wrap">

                            </div>
                        </div>
                    </div>
                    <div class="card p-0 col-lg-3 bg-dark mt-2 mt-lg-0 mb-0 mb-lg-0 text-center vertical-align-center">
                        <div class="card-header" style="padding-right: 0.5em;
    padding-left: 0.5em;
    padding-bottom: 0.5em;
    padding-top: 0.5em;">
                            <span id="chapterHeading" class="h6 mb-0 text-white d-block">Video Credits</span>
                        </div>
                        <div class="card-body" style="padding-right: 0.2em;
    padding-left: 0.2em;
    padding-bottom: 0.2em;
  
    padding-top: 0.5em; max-height: 40vh; overflow-y: hidden;">
                            <span id="chapterDescription" class="mt-2 p-2 d-block text-left">
                                <table class="w-100 text-sm">
                                    <tr>
                                        <td>Performed by : </td>
                                        <td><span class="text-white"><a class="text-white"
                                                    href="<?php echo BASE_URL;?>/pages/learning/pages/account/public-profile.php?id=<?php echo $videoDataMod[0]['authorid']?>"><?php echo $videoDataMod[0]['author'];?></a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php if ($videoDataMod[0]['recorder']){?>
                                        <td>Filmed by : </td>
                                        <td><span class="text-white"><a class="text-white"
                                                    href="<?php echo BASE_URL;?>/pages/learning/pages/account/public-profile.php?id=<?php echo $videoDataMod[0]['recorderid']?>"><?php echo $videoDataMod[0]['recorder'];?></a></span>
                                        </td>
                                        <?php }?>
                                    </tr>
                                    <tr>
                                        <?php if ($videoDataMod[0]['editor']){?>
                                        <td>Cut by : </td>
                                        <td><span class="text-white"><a class="text-white"
                                                    href="<?php echo BASE_URL;?>/pages/learning/pages/account/public-profile.php?id=<?php echo $videoDataMod[0]['editorid']?>"><?php echo $videoDataMod[0]['editor'];?></a></span>
                                        </td>
                                        <?php }?>
                                    </tr>
                                    <tr>
                                        <?php if ($videoDataMod[0]['recorder']){?>
                                        <td>Tagged by : </td>
                                        <td><span class="text-white"><a class="text-white"
                                                    href="<?php echo BASE_URL;?>/pages/learning/pages/account/public-profile.php?id=<?php echo $videoDataMod[0]['taggerid']?>"><?php echo $videoDataMod[0]['tagger'];?></a></span>
                                        </td>
                                        <?php }?>
                                    </tr>
                                </table>

                            </span>
                        </div>
                        <div class="card-footer tagFilterDisplayArea">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-end ">
            <div class="container mt-4  pt-0 pt-lg-0">
                <div class="row">
                    <div class="col-lg-9 mb-0 mb-lg-0">
                        <p class="text-left d-flex align-items-left">
                            <!-- <a class="dropdown-item" data-toggle="collapse" href="#collapseExamplenotyet" aria-expanded="false"
                            aria-controls="collapseExample2">
                            <i class="fas fa-chevron-circle-up"></i> show histopathology result
                        </a> -->


                                            <!-- Add text track box here -->

                            <?php if ($currentUserLevel< 5){ // message to upgrade if standard?>

                            <a class="dropdown-item" id="referencesTour" data-toggle="collapse" href="#collapseExample2"
                                aria-expanded="false" aria-controls="collapseExample3">
                                <i class="fas fa-chevron-circle-up"></i> show references
                            </a>
                            <?php }else{?>
                            <a class="dropdown-item" id="referencesTour"
                                onclick="alert('Upgrade to view references for tags');" aria-expanded="false"
                                aria-controls="collapseExample3">
                                <i class="fas fa-chevron-circle-up"></i> show references
                            </a>
                            <?php } ?>


                            <?php if ($currentUserLevel <6){ ?>
                            <a class="dropdown-item" id="commentsTour" data-toggle="collapse" href="#collapseExample3"
                                aria-expanded="false" aria-controls="collapseExample3">
                                <i class="fas fa-chevron-circle-up"></i> show comments
                            </a>
                            <?php }else{// message to upgrade if basic?>

                            <a class="dropdown-item" id="commentsTour" onclick="alert('Upgrade to comment on cases');"
                                aria-expanded="false" aria-controls="collapseExample3">
                                <i class="fas fa-chevron-circle-up"></i> show comments
                            </a>


                            <?php } ?>
                        </p>

                        <div class="collapse" id="collapseExample2">
                            <div class="card">
                                <div class="card-footer">
                                    <span class="h5 mb-4">References</span>
                                    <div class="flex-row flex-wrap mt-2">

                                        <div>
                                            <?php echo $general->getFullReferenceListVideo($id);?>
                                            <!-- 
                                        <span class="badge badge-primary mx-2">
                                            ref 1
                                        </span>
                                        <span class="badge badge-primary mx-2">
                                            ref 2
                                        </span>
                                    
                                    
                                    -->
                                        </div>
                                        <div class="text-right text-right">

                                            <div class="actions">

                                                <a class="action-item"><i class="fas fa-info mr-1" data-toggle="tooltip"
                                                        title="click on the references to go to PubMed"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collapse" id="collapseExample3">
                            <div class="card">
                                <div class="card-header pt-4 pb-2">
                                    <div class="d-flex align-items-center">
                                        <a class="avatar bg-gieqsGold text-dark avatar-md rounded-circle mr-3 p-1">
                                            <?php echo $userFunctions->getUserInitials($userid);?>
                                        </a>
                                        <div class="avatar-content">
                                            <h6 class="mb-0">Comments</h6>
                                            <div class="d-flex">
                                                <!--                     <small class="d-block text-muted mr-2"><i class="fas fa-clock mr-2"></i>Profile updated : 3 hrs ago</small>
 --> <small class="d-block text-muted mr-2"><i class="fas fa-pen mr-2"></i>Commenting Publicly as
                                                    <?php echo $userFunctions->getUserName($userid);?></small>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Comments-->
                                    <div class="mb-3">
                                        <div id="commentsArea">

                                            <!-- <div class="media media-comment">
                    <img alt="Image placeholder" class="rounded-circle shadow mr-4" src="../../assets/img/theme/light/team-3-800x800.jpg" style="width: 64px;">
                    <div class="media-body">
                      <div class="media-comment-bubble left-top">
                        <h6 class="mt-0">Tom Cruise</h6>
                        <p class="text-sm lh-160">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                        <div class="icon-actions">
                          <a href="#" class="love active">
                            <i class="fas fa-heart"></i>
                            <span class="text-muted">20 likes</span>
                          </a>
                          <a href="#">
                            <i class="fas fa-comment"></i>
                            <span class="text-muted">3 replies</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div> -->
                                        </div>
                                        <div class="media mt-3 media-comment align-items-center">
                                            <a
                                                class="avatar bg-gieqsGold text-dark avatar-md rounded-circle mr-3 p-1"><?php echo $userFunctions->getUserInitials($userid);?></a>
                                            <div class="media-body">
                                                <form id="commentForm" validate>
                                                    <div class="form-group mb-0">
                                                        <div class="input-group input-group-merge">
                                                            <textarea class="form-control" id="comment" name="comment"
                                                                data-toggle="autosize" placeholder="Write your comment"
                                                                rows="1"></textarea>
                                                            <div class="input-group-append">
                                                                <button id="submitComment" class="btn btn-primary"
                                                                    type="button">
                                                                    <span class="far fa-paper-plane"></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row align-items-left p-2">
                                        <span class="small text-muted">Comments are moderated for inapropriate content.
                                            Offending users will have their commenting priveledges blocked and may be
                                            removed from the site. Maximum 5 comments per video.</span>
                                        <!-- <div class="col">
                                        <span class="badge badge-primary mx-2">
                                            comment 1
                                        </span>
                                        <span class="badge badge-primary mx-2">
                                            comment 2
                                        </span>
                                    </div> -->
                                        <div class="col text-right text-right">
                                            <div class="actions">
                                                <a href="#" class="action-item"><i class="fas fa-info mr-1"></i></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </div>



        <?php
    
    $response = $client->request('/videos/' . $general->getVimeoID($id));

    //print_r($response);

    $embedCode = $response['body']['embed']['html'];

    //var_dump($embedCode);

    $scriptTagPattern = '/src\s*=\s*"(.+?)"/'; 

    preg_match($scriptTagPattern, $embedCode, $matches);
    
//print_r($matches);

    $requiredVimeoURL = $matches[1];

    $requiredVimeoURL = trim($requiredVimeoURL);

    //echo $requiredVimeoURL;


    



?>

<div id="requiredVimeoURL" style="display:none;"><?php echo $requiredVimeoURL;?></div>


        <!--

    get chapters in order
    get tags per chapter

chapterData
                        -->
        <div id="cd-timeline" class="cd-container ">
            <h1 id="timeLineTitleTour">Video Timeline</h1>

            <?php foreach ($chapterData as $key=>$value){?>

            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-picture">
                </div>

                <div class="cd-timeline-content chapterBox" data-chapter-id="<?php echo $value['chapterid'];?>"
                    style="border-radius:8px !important;">
                    <h2 class="chapterSkip" data-id="<?php echo $value['chapterid'];?>">
                        <?php echo $value['chaptername']; ?></h2>
                    <span class="cd-date chapterSkip" data-id="<?php echo $value['chapterid'];?>">Chapter
                        <?php echo $value['number'] . ' ' . gmdate("i:s", intval($value['timeFrom'])); ?></span>
                    <div class="timeline-content-info">
                        <span class="timeline-content-info-title chapterSkip"
                            data-id="<?php echo $value['chapterid'];?>">
                            <i class="fa fa-certificate" aria-hidden="true"></i>
                            Chapter <?php echo $value['number']; ?>
                        </span>
                        <span class="timeline-content-info-date">
                            <i class="fa fa-calendar-o" aria-hidden="true"></i>
                            <?php echo gmdate("i:s", intval($value['timeFrom'])) . ' - ' . gmdate("i:s", intval($value['timeTo'])); ?>
                        </span>
                    </div>
                    <p><?php echo $value['description']; ?></p>
                    <?php $tagsChapter = null; $tagsChapter = $general->getTagsChapter($value['chapterid']);?>
                    <ul class="content-skills">

                        <?php foreach ($tagsChapter as $key2=>$value2){?>
                        <li class="tagButton tagTimeline" data-tag-id="<?php echo $value2['tagid'];?>"
                            id="tag<?php echo $value2['tagid'];?>"><?php echo $value2['tagName'];?>
                        </li>

                        <?php } ?>
                    </ul>
                </div> <!-- cd-timeline-content -->
            </div> <!-- cd-timeline-block -->

            <?php } ?>

        </div>
        <!-- </section> -->
        <!-- cd-timeline -->

    </div> <!-- end main-content div-->

    </div>

    <div id="bootstrapTour"></div>
    <!-- Modal -->
    <div class="modal fade" id="registerInterest" tabindex="-1" role="dialog" aria-labelledby="registerInterestLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerInterestLabel" style="color: rgb(238, 194, 120);">Thank-you for
                        your interest in GIEQs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="false">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span class="h6">Registration will open in late January 2020. <br /> </span><span>Prior to this you
                        can register your interest below and we will keep you updated on everything GIEQs.</span>
                    <hr>
                    <form id='pre-register'>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <div class="input-group mb-3">
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="please enter your name">
                            </div>
                            <label for="email">Email address:</label>
                            <div class="input-group mb-3">
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="please enter your email address">
                            </div>
                        </div>
                    </form>
                    <hr>
                    <span>Your email address will only be used to update you on GIEQs</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-small btn-secondary" data-dismiss="modal">Close</button>
                    <button id="submitPreRegister" type="button" class="btn-small text-black"
                        style="background-color: rgb(238, 194, 120);">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="assets/js/purpose.core.js"></script> -->
    <!-- Page JS -->

    <!-- Google maps -->
    <!-- Purpose JS -->
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>
    <!-- <script src="assets/js/generaljs.js"></script> -->
    <script>
    var videoPassed = $("#id").text();

    var chapternumber = $("#chapternumber").text();


    
    </script>

    <script src=<?php echo BASE_URL . "/pages/learning/includes/endowiki-player.js"?>></script>
    <script>
    
    
    
    var getJSON = async (url) => {
  try {
    var response = await fetch(url);
    if (!response.ok)
      // check if response worked (no 404 errors etc...)
      throw new Error(response.statusText);

    var data = await response.json(); // get JSON from the response
    return data; // returns a promise, which resolves to this data value
  } catch (error) {
    return error;
  }
};

if ($('#debug').text() == 'true'){
var t=setInterval(writeDebugInfo,1000);
}


    
    
    
    var signup = $('#signup').text();

    var browsingBeforeExpand = readCookie('browsing');

    if (browsingBeforeExpand != '99') {
        createCookie('browsing_last', browsingBeforeExpand, '2');
    }

    var browsing_idBeforeExpand = readCookie('browsing_id');
    var browsing_arrayBeforeExpand = $('#browsing_array').text();


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

    function getComments() {

        var videoid = videoPassed;

        //alert(videoid);
        //$(this).children('.fa-thumbs-up').addClass('gieqsGold');
        //$(this).children('.fa-thumbs-up').removeClass('text-muted');

        //AJAX to add the like



        //change state

        //ajax to a script to update






        var dataToSend = {

            videoid: videoid,



        }

        //const jsonString2 = JSON.stringify(dataToSend);

        const jsonString = JSON.stringify(dataToSend);
        //console.log(jsonString);
        //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

        var request2 = $.ajax({
            beforeSend: function() {


            },
            url: siteRoot + "scripts/queries/getCommentsVideo.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request2.done(function(data) {
            // alert( "success" );
            if (data) {
                //show green tick
                console.log(data);

                $('#commentsArea').html(data);


                //$('#notification-services').delay('1000').addClass('is-valid');




            }
            //$(document).find('.Thursday').hide();
            //$(icon).prop("disabled", false);
        })


        //$(this).('.fa-thumbs-up').first().addClass("gieqsGold");
        //remove the check from the tag removed


    }

    // Instance the tour
    var tourLong = new Tour({
        name: "tourLong",
        steps: [

            {
                element: "#start_tour",
                title: "Welcome to the GIEQs Online Experience Player!",
                content: "<p>Welcome to the detailed tour.  This will help you get the most out of GIEQs online and we <b>highly recommend it</b> before viewing.</p><p>This video player is specifically designed for Endoscopy Education.</p><p>Click next to quickly understand its novel features.</p>",
            },

            {
                element: ".action-favorite",
                title: "Favourite Videos for Quick Access Later",
                content: "<p>Click the &nbsp;<i class=\"fas fa-heart\"></i>&nbsp; to <b>favourite</b> this video.  It is then available in the account &nbsp;<i class=\"fas fa-user-circle\"></i> menu at the top right of the screen for quick access. </p><p>The number of people that favourited this video is displayed to the right. </p>",
            },
            {
                element: ".action-like",
                title: "Video Likes",
                content: "<p>Click the thumbs up to <b>let us know you</b> liked this video.  </p><p>The number of people that liked this video is displayed to the right. </p>",
            },
            {
                element: "#viewsNumber",
                title: "Video Views",
                content: "<p>The number of unique views this video has had on GIEQS.com. </p>",
            },
            {
                element: "#chapterDropdownButton",
                title: "Chapters",
                content: "<p>All videos on GIEQs Online are divided into Chapters for ease of moving between ideas.</p><p>Click here to show Chapters.</p>",
            },
            {
                onShow: function(tour) {

                    $('#selectDropdown').collapse('show');
                    $('#selectDropdown').find('select').attr('size', 6);


                },

                element: "#selectDropdown",
                placement: "auto left",
                title: "Chapter Selection",
                content: "<p>This dropdown shows all the chapters in the video.</p>  <p>Video chapters indicate steps in a procedure or ideas in a lecture.</p>",

                onHidden: function(tour) {
                    $('#selectDropdown').collapse('hide');
                    $('#selectDropdown').find('select').attr('size', 1);



                }

            },
            {
                element: "#chapterNavTour",
                title: "Chapters",
                content: "<p>You can also activate the chapter menu by clicking here.</p>",
            },

            {
                element: "#chapterSelectorDiv",
                placement: "auto left",
                title: "Chapter Navigation",
                content: "<p>This area allows navigation <b>WITHIN the current chapter</b></p><p>It is not active until the video starts playing</p>",
            },

            {
                element: "#chapterHeadingControl",
                placement: "auto left",
                title: "Chapter Name",
                content: "<p>The name of the current chapter is displayed here</p>",
            },

            {
                element: "#myProgress",
                placement: "auto left",
                title: "Chapter Progress Bar",
                content: "<p>The bar displays progress through the current chapter</p>",
            },
            {
                element: "#video-back",
                placement: "auto left",
                title: "Restart the Chapter",
                content: "<p>Click to go back to the start of the current chapter</p>",
            },

            {
                element: "#video-forward",
                placement: "auto left",
                title: "Skip to the next Chapter",
                content: "<p>Click to skip to the next chapter</p><p>If you have selected a tag this will skip between all the chapters with that tag</p>",
            },

            {
                element: "#video-stop",
                placement: "auto left",
                title: "Stop and restart",
                content: "<p>Click to stop the video and return to the start</p><p>If you have selected a tag this will cancel that selection</p>",
            },

            {
                element: "#video-start-pause",
                placement: "auto left",
                title: "Play / Pause",
                content: "<p>Click here to start / pause the video at any time.</p><p>This button is also active before the video has started playing.</p>",
            },

            {
                element: "#currentChapter",
                placement: "auto left",
                title: "Position in Video",
                content: "<p>This tells you which chapter / total chapters is currently playing.</p>",
            },

            {
                element: "#tagDropdownButton",
                placement: "auto left",
                title: "Tags",
                content: "<p>Content on GIEQs.com is tagged.</p><p class=\"gieqsGold\">  A tag is an idea in endoscopy.</p>  You can use tags to quickly jump between similar ideas and find information you are looking for.</p>",
            },

            {
                element: "#tagDropdownButton",
                placement: "auto left",
                title: "Tags",
                content: "<p>click here to open the tag window for this video</p>",



            },

            {

                element: ".tagCardHeader",
                placement: "auto right",
                title: "Tag Window",
                content: "<p>This is the tag window.  It contains a categorised list of all the ideas in the video.</p><p><span class=\"h6\">Tag Categories</span> are listed alphabetically.</p><p>A tag is grey if it is not currently being shown in the active video chapter or the video is not playing <br/>( e.g. <span class=\"badge bg-gray-800 mx-2 mb-1 tagButton\">Inactive Tag</span>) </p><p>A tag is gold if it is contained within the current active chapter <br/>( e.g. <span class=\"badge bg-gieqsGold text-dark mx-2 mb-1 tagButton\">Active Tag</span> )</p>",
                onShow: function(tour) {

                    $('#collapseExample').collapse('show');
                    //$('#collapseExample').find('select').attr('size',6);


                },

            },

            {
                element: "#tourTagNav",
                placement: "auto left",
                title: "Tag Window",
                content: "<p>you can also click here to access the tags window</p>",



            },
            {

                element: "#tagsDisplay .tagButton:first",
                placement: "auto right",
                title: "Filtering by Tag",
                content: "<p>Clicking on an inactive tag allows you to see all examples of that tag / idea within the video.</p><p>The video will play only chapters containing that tag and will skip between them.</p><p>Skip controls will skip between these chapters only</p>",
                onShow: function(tour) {

                    $('#collapseExample').collapse('show');
                    //$('#collapseExample').find('select').attr('size',6);


                },
                onHidden: function(tour) {
                    $('#collapseExample').collapse('hide');
                    //$('#selectDropdown').find('select').attr('size',1);



                }
            },
            {

                element: ".tagFilterDisplayArea",
                placement: "left",
                title: "Filtering by Tag",
                content: "<p>The filtered tag will display here in gold.</p>",
                onShow: function(tour) {


                    //$('#collapseExample').find('select').attr('size',6);
                    $('.tagFilterDisplayArea').addClass('bg-gieqsGold').addClass('text-dark').addClass(
                        'text-sm');
                    $('body').find('.tagFilterDisplayArea').html('Filtered by highlighted tag');



                },
                onHidden: function(tour) {
                    $('.tagFilterDisplayArea').removeClass('bg-gieqsGold').removeClass('text-dark')
                        .removeClass('text-sm');
                    $('body').find('.tagFilterDisplayArea').html('');
                    //$('#selectDropdown').find('select').attr('size',1);



                }
            },
            {

                element: "#referencesTour",
                placement: "right",
                title: "Academic References",
                content: "<p>Clicking here opens the reference panel for this video</p><p>The <span class=\"badge bg-gray-800 mx-2 mb-1 tagButton\">button</span> after the reference shows the linked tag category / tag</p><p>You can click on any reference to open the abstract in PubMed and access fulltext directly depending on your institution.</p>",
                onShow: function(tour) {

                    $('body').animate({
                        scrollTop: $('#referencesTour').offset().top
                    }, 500);

                    $('#collapseExample2').collapse('show');
                    //$('#collapseExample').find('select').attr('size',6);


                },

            },

            {

                element: "#commentsTour",
                placement: "right",
                title: "Comments",
                content: "<p>Clicking here opens the comments panel for this video</p><p>Please keep comments constructive.  You can only comment 5 times per video.</p><p>Comments which violate common-sense norms of politeness or decency will be removed and we reserve the right to cancel your account without recourse to appeal if you violate these.</p>",
                onShow: function(tour) {

                    $('#collapseExample3').collapse('show');
                    /* $([document.documentElement, document.body]).animate({
                            scrollTop: $("#collapseExample3").offset().top
                        }, 1000); */
                    //$('#collapseExample').find('select').attr('size',6);


                },

            },

            {

                element: "#cd-timeline",
                placement: "right",
                title: "Timeline",
                content: "<p>Here you can view the chapters with tags and texts as one overview.  Clicking on a chapter will skip the video.  The video continues to play on the right lower aspect of the screen.</p>",
                onShow: function(tour) {


                    //$('#collapseExample').find('select').attr('size',6);


                },

            },

            {


                placement: "auto",
                title: "Thanks for taking the Tour",
                content: "<p>We hope this gave you a broad overview of how to use the GIEQs Online Player.</p><p>Questions? Don't hesitate to contact us!</p>",
                onShow: function(tour) {

                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#selectDropdown").offset().top
                    }, 1000);
                    //$('#collapseExample').find('select').attr('size',6);


                },

            },





        ],

        animation: false,
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

    var tourShort = new Tour({
        name: "tourShort",
        steps: [

            {

                title: "Welcome to the GIEQs Online Experience Viewer",
                content: "<p>If you have never used the player we recommend following this short tour first.</p><p>Content on GIEQs.com is organised by <span class=\"gieqsGold\">Chapters</span> and <span class=\"gieqsGold\">Tags</span>.</p><p>Content may have associated <span class=\"gieqsGold\">academic references</span> and supports <span class=\"gieqsGold\">user comments</span>.</p>",
            },


            {
                element: "#chapterDropdownButton",
                title: "Chapters",
                content: "<p>All videos on GIEQs Online are divided into Chapters for ease of moving between ideas.</p><p>Click here to show available Chapters.</p>",
            },
            {
                onShow: function(tour) {

                    $('#selectDropdown').collapse('show');
                    $('#selectDropdown').find('select').attr('size', 6);


                },

                element: "#selectDropdown",
                placement: "auto left",
                title: "Chapter Selection",
                content: "<p>This dropdown shows all the chapters in the video.</p>  <p>Video chapters indicate steps in a procedure or ideas in a lecture.</p><p>Quickly jump to a chapter by clicking on it.</p>",

                onHidden: function(tour) {
                    $('#selectDropdown').collapse('hide');
                    $('#selectDropdown').find('select').attr('size', 1);



                }

            },




            {
                element: "#tagDropdownButton",
                placement: "auto left",
                title: "Tags",
                content: "<p>Content on GIEQs.com is tagged.</p><p class=\"gieqsGold\">  A tag is an idea in endoscopy education.</p>  You can use tags to quickly jump between similar ideas and find information you are looking for.</p><p>click here to open the tag window for this video</p>",
            },

            {

                element: ".tagCardHeader",
                placement: "auto right",
                title: "Tag Window",
                content: "<p>This is the tag window.  It contains a categorised list of all the ideas in the video.</p><p><span class=\"h6\">Tag Categories</span> are listed alphabetically.</p><p>A tag is grey if it is not currently being shown in the active video chapter or the video is not playing <br/>( e.g. <span class=\"badge bg-gray-800 mx-2 mb-1 tagButton\">Inactive Tag</span>) </p><p>A tag is gold if it is contained within the current active chapter <br/>( e.g. <span class=\"badge bg-gieqsGold text-dark mx-2 mb-1 tagButton\">Active Tag</span> )</p><p>Clicking on an inactive tag allows you to see all examples of that tag / idea within the video.</p><p>The video will play only chapters containing that tag and will skip between them.</p>",
                onShow: function(tour) {

                    $('#collapseExample').collapse('show');
                    //$('#collapseExample').find('select').attr('size',6);


                },

            },


            {

                element: ".tagFilterDisplayArea",
                placement: "left",
                title: "Filtering by Tag",
                content: "<p>The filtered tag will display here in gold.</p>",
                onShow: function(tour) {


                    //$('#collapseExample').find('select').attr('size',6);
                    $('.tagFilterDisplayArea').addClass('bg-gieqsGold').addClass('text-dark').addClass(
                        'text-sm');
                    $('body').find('.tagFilterDisplayArea').html('Filtered by highlighted tag');



                },
                onHidden: function(tour) {
                    $('.tagFilterDisplayArea').removeClass('bg-gieqsGold').removeClass('text-dark')
                        .removeClass('text-sm');
                    $('body').find('.tagFilterDisplayArea').html('');
                    //$('#selectDropdown').find('select').attr('size',1);



                }
            },
            {

                element: "#referencesTour",
                placement: "right",
                title: "Academic References",
                content: "<p>Clicking here opens the reference panel for this video</p><p>The <span class=\"badge bg-gray-800 mx-2 mb-1 tagButton\">button</span> after the reference shows the linked tag category / tag</p><p>You can click on any reference to open the abstract in PubMed and access fulltext directly depending on your institution.</p>",
                onShow: function(tour) {

                    $('body').animate({
                        scrollTop: $('#referencesTour').offset().top
                    }, 500);

                    $('#collapseExample2').collapse('show');
                    //$('#collapseExample').find('select').attr('size',6);


                },

            },

            {

                element: "#commentsTour",
                placement: "right",
                title: "Comments",
                content: "<p>Clicking here opens the comments panel for this video</p><p>Please keep comments constructive.  You can only comment 5 times per video.</p><p>Comments which violate common-sense norms of politeness or decency will be removed and we reserve the right to cancel your account without recourse to appeal if you violate these.</p>",
                onShow: function(tour) {

                    $('#collapseExample3').collapse('show');
                    /* $([document.documentElement, document.body]).animate({
                            scrollTop: $("#collapseExample3").offset().top
                        }, 1000); */
                    //$('#collapseExample').find('select').attr('size',6);


                },

            },

            {

                element: "#timeLineTitleTour",
                placement: "right",
                title: "Timeline",
                content: "<p>Here you can view the chapters with tags and texts as one overview.</p><p>Clicking on a chapter will skip the video.  The video continues to play on the right lower aspect of the screen.</p>",
                onShow: function(tour) {


                    //$('#collapseExample').find('select').attr('size',6);


                },

            },

            {


                placement: "auto",
                title: "Thanks for taking the Tour",
                content: "<p>We hope this gave you a broad overview of how to use the GIEQs Online Player.</p><p>Questions? Don't hesitate to contact us!</p><p>For more detail take the <a class=\"showMeAroundLongEndTour cursor-pointer\">detailed tour</a></p>",
                onShow: function(tour) {

                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#selectDropdown").offset().top
                    }, 1000);
                    //$('#collapseExample').find('select').attr('size',6);


                },

            },





        ],

        animation: false,
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

    //new cookie functions

    function createCookie(name, value, days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            var expires = "; expires=" + date.toGMTString();
        } else {
            var expires = "";
        }
        document.cookie = name + "=" + value + expires + "; path=/";
    }

    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1, c.length);
            }
            if (c.indexOf(nameEQ) == 0) {
                return c.substring(nameEQ.length, c.length);
            }
        }
        return null;
    }

    function eraseCookie(name) {
        createCookie(name, "", -1);
    }



    function submitCommentForm() {


        //console.log('reached submit');

        //alert('hello');

        var videoid = videoPassed;
        var type = 1;
        var comment = $('#comment').val();
        //alert(videoid);
        //$(this).children('.fa-thumbs-up').addClass('gieqsGold');
        //$(this).children('.fa-thumbs-up').removeClass('text-muted');

        //AJAX to add the like

        var icon = $('#submitComment');
        $(icon).prop("disabled", true);

        //change state

        //ajax to a script to update






        var dataToSend = {

            videoid: videoid,
            type: type,
            comment: comment,


        }

        //const jsonString2 = JSON.stringify(dataToSend);

        const jsonString = JSON.stringify(dataToSend);
        //console.log(jsonString);
        //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

        var request2 = $.ajax({
            beforeSend: function() {


            },
            url: siteRoot + "scripts/useractions/addUserComment.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request2.done(function(data) {
            // alert( "success" );
            if (data == 1) {
                //show green tick

                $('#comment').val('')
                getComments();
                //$('#notification-services').delay('1000').addClass('is-valid');




            } else if (data == 0) {

                Swal.fire({
                    type: 'error',
                    title: 'Further comments not allowed',
                    text: 'You cannot comment more than 5 times on the same video.',
                    background: '#162e4d',
                    confirmButtonText: 'ok',
                    confirmButtonColor: 'rgb(238, 194, 120)',

                }).then((result) => {
                    $('#comment').val('')
                    getComments();

                })

            }
            //$(document).find('.Thursday').hide();
            $(icon).prop("disabled", false);
        })


        //$(this).('.fa-thumbs-up').first().addClass("gieqsGold");
        //remove the check from the tag removed


    }

    //new code for tagbar

    function showTagBar(selectedTag) {


        $('#tagBar').removeClass('d-none');
        window.localStorage.setItem('selectedTag', selectedTag);
        //window.localStorage.setItem('restricted', true);

        createCookie('selectedTag', selectedTag, '2');

        //set the cookie to the same as local storage since this follows js here

        var localStoragerestrictedvalue = localStorage.restricted;
        createCookie('restricted', localStoragerestrictedvalue , '2');



        //get tags to parse data

        try {

            var JSONtoParse = $('#tagsData').text();
            var tagsData = $.parseJSON(JSONtoParse);

        } catch (error) {

            //console.log ('caught');

        }

        console.dir(tagsData);

        var tagNameBar;

        $(tagsData).each(function(k, v) {

            //console.log(k);
            //console.log(v);
            if (v.id == selectedTag) {

                tagNameBar = v.tagName;

            }

        })

        console.log(tagNameBar);

        $('#tagNameBar').text(tagNameBar);

        //use ajax to send

        if ($('#browsing_id').attr('data-browsing-id') != '') {

            var browsing_id = $('#browsing_id').attr('data-browsing-id');

        } else {

            var browsing_id = '';


        }

        if ($('#browsing').attr('data-browsing') != '') {

            var browsing = $('#browsing').attr('data-browsing');

        } else {

            var browsing = '';


        }

        if ($('#browsing_array').text() != '') {

            var browsing_array = $('#browsing_array').text();

        } else {

            var browsing_array = '';


        }


        var dataToSend = {

            videoid: videoPassed,
            browsing_id: browsing_id,
            browsing: browsing,
            tag: selectedTag,
            browsing_array: browsing_array,


        }

        const jsonString = JSON.stringify(dataToSend);
        //console.log(jsonString);
        //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

        var request2 = $.ajax({
            beforeSend: function() {


            },
            url: siteRoot + "scripts/tagnavigation/get_tag_navigation_info.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request2.done(function(data) {
            // alert( "success" );
            if (data) {
                //show green tick

                var result = JSON.parse(data);

                console.dir(result);

                $(result).each(function(k, v) {

                    $('#videoNumeratorTagNav').text(v.postion);
                    $('#videoDenomTagNav').text(v.numberOfVideos);
                    $('.previousTagNav').attr('href', siteRoot + 'viewer.php?id=' + v.previousVideo);
                    $('.nextTagNav').attr('href', siteRoot + 'viewer.php?id=' + v.nextVideo);

                    if (v.firstVideo === true) {

                        $('.previousTagNav').addClass('disabled');


                    } else {

                        $('.previousTagNav').removeClass('disabled');

                    }




                    if (v.outside_asset === true) {

                        $('.expandSearch').addClass('disabled').addClass('text-muted');


                    } else {

                        $('.expandSearch').removeClass('disabled').removeClass('text-muted');


                    }

                    if (v.lastVideo === true) {

                        $('.nextTagNav').addClass('disabled');


                    } else {

                        $('.nextTagNav').removeClass('disabled');

                    }



                })

                refreshVideoBar();


                //$('#notification-services').delay('1000').addClass('is-valid');




            }
            //$(document).find('.Thursday').hide();

        })



        //  context (as video bar)
        //  id of context  
        //  video id current

        //get back
        //  array of videos within that tag context 
        // number
        // total number









    }

    function refreshVideoBar() {

        //gets video bar again from AJAX to reflect most recent changes

        //added passing localstorage

        var dataToSend = {

            identifier: 'refresh',
            videoid: videoPassed,
            localrestricted: localStorage.restricted,
            localselectedTag: localStorage.selectedTag,



        }

        const jsonString2 = JSON.stringify(dataToSend);

        //const jsonString = JSON.stringify(dataToSend);
        //console.log(jsonString);
        //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

        var request2 = $.ajax({
            beforeSend: function() {


            },
            url: siteRoot + "assets/videoNav.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString2,

        });



        request2.done(function(data) {
            // alert( "success" );
            if (data) {
                //show green tick
                //console.log(data);

                $('#videoBar').replaceWith(data);


                //$('#notification-services').delay('1000').addClass('is-valid');




            }
            //$(document).find('.Thursday').hide();
            //$(icon).prop("disabled", false);
        })


    }

    function updateVideoBar() {

        //unused

        var restricted = window.localStorage.getItem('restricted');

        if (restricted == 'false' || restricted === null) {

            //alter the video bar

            refreshVideoBar();


        } else if (restricted == 'true') {



        }

    }

    function checkTagFiltering() {

        // check tag filtering

        var overallTagAvailable = window.localStorage.getItem('selectedTag');

        if (overallTagAvailable != 'null') {

            selectedTag = overallTagAvailable;

            showTagBar(overallTagAvailable);

            //and remove the video text if restricted == false



            waitForFinalEvent(function() {
                //alert('Resize...');
                filterByTag(overallTagAvailable);

            }, 200, "filter by overall tag available");



        } else {


            //check if there is a recent chapter and jump to it, does nothing if no recent chapter

            //window.localStorage.setItem('selectedTag', null);
            //window.localStorage.setItem('restricted', false);


            waitForFinalEvent(function() {

                //if there is no chapter set in the url

                if (chapternumber != ''){

                    console.log('chapternumber is set and is ' + chapternumber);
                    skipToChapter(chapternumber);


                }else{

                    console.log('chapternumber is not set');


                    //alert('Resize...');
                    viewedVideoRecentChapter();

                    showAlert(
                        'Started from where you finished last time. To <a href=\"javascript:jumpToTime(0);\">restart click here</a>.'
                    );

                }

            }, 200, "wait for most recent Video");








            //has user viewed video before, if so which chapter, if not false



        }



    }

    function viewedVideoRecentChapter() {

        var dataToSend = {

            videoid: videoPassed,

        }

        const jsonString2 = JSON.stringify(dataToSend);

        //const jsonString = JSON.stringify(dataToSend);
        //console.log(jsonString);
        //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

        var request2 = $.ajax({


            beforeSend: function() {


            },
            url: siteRoot + "scripts/user_metrics/getRecentChapter.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString2,

        });

        request2.done(function(data) {

            if (data) {

                var recentChapter = $.parseJSON(data);

                console.log(recentChapter);

                if (recentChapter != false) {

                    var requiredReturn = null;

                    $(videoChapterData).each(function(i, val) {

                        console.log(val.chapterid);
                        console.log(recentChapter.recentChapter);
                        if (val.chapterid == recentChapter.recentChapter) {

                            //console.log(i);
                            //console.log(val);
                            //console.log(recentChapter.recentChapter);
                            requiredReturn = val.timeFrom;

                        }



                    })

                    console.log('required return is ' + requiredReturn);

                    requiredReturn = parseInt(requiredReturn);



                    if (requiredReturn != null) {
                        jumpToTime(requiredReturn);
                    }
                }
            }


        })

        return request2;


    }

    function hideTagBar() {

        $('#tagBar').addClass('d-none');
        window.localStorage.setItem('selectedTag', null);
        createCookie('selectedTag', null, '2');
        refreshVideoBar();




    }

    $(document).ready(function() {

        $(document).on('click', '.exitTagNav', function() {

            hideTagBar();
            undoFilterByTag();


        })

    })

    function restrictTagStatusBar() {

        var restricted = getCookie('restricted');
        var browsing = getCookie('browsing');

        if (browsing == '' || browsing == '99' || browsing == 'false'){

            //alert('browsing false');
            $('.expandSearch').text('');
        

        }else{

            if (restricted == 'false') {

            var browsing_last = getCookie('browsing_last');
            createCookie('browsing', browsing_last, '2');

            //put original page values back

            $('#browsing').attr('data-browsing', browsing_last);
            //$('#browsing_id').attr('data-browsing-id', browsing_idBeforeExpand); //need to blank these?
            //$('#browsing_array').text(browsing_arrayBeforeExpand);

            $('.expandSearch').attr('restricted', 1);
            $('.expandSearch').text('Expand Search');

            //put here

            window.localStorage.setItem('restricted', "true");
            createCookie('restricted', 'true', '2');

            showTagBar();

            }
            
        }



    }

    function checkExpandedStatusTagBar() {

        //if 99 or no browsing then this should just remove expand search

        var browsing = getCookie('browsing');

        if (browsing == '' || browsing == '99' || browsing == 'false'){

            //alert('browsing false');
            $('.expandSearch').text('');
            window.localStorage.setItem('restricted', false);
			createCookie('restricted', false, '2');

        

        }else{

        var restricted = window.localStorage.getItem('restricted');
        console.log('restricted is ' + restricted);

        //$('.expandSearch').removeClass('heartBeat');
        //set the cookie 99

        if (restricted == "false") {

            console.log('Entered restricted = false loop');

            $('.expandSearch').attr('restricted', 0);
            $('.expandSearch').text('Restrict Search');



        } else if (restricted == "true") {


            $('.expandSearch').attr('restricted', 1);
            $('.expandSearch').text('Expand Search');




        }

    }

        // showTagBar(selectedTag);


        //$('.expandSearch').addClass('heartBeat');

    }

    function toggleExpandedStatusTagBar() {

        var restricted = window.localStorage.getItem('restricted');
        console.log('restricted is ' + restricted);

        $('.expandSearch').removeClass('heartBeat');
        //set the cookie 99

        if (restricted == "false") {

            console.log('Entered restricted = false loop');


            //put original values back

            //createCookie('browsing', browsingBeforeExpand, '2');
            //createCookie('browsing_id', browsing_idBeforeExpand, '2');
            //createCookie('browsing_array', browsing_arrayBeforeExpand, '2');

            var browsing_last = getCookie('browsing_last');
            createCookie('browsing', browsing_last, '2');

            //put original page values back

            $('#browsing').attr('data-browsing', browsing_last);
            //$('#browsing_id').attr('data-browsing-id', browsing_idBeforeExpand); //need to blank these?
            //$('#browsing_array').text(browsing_arrayBeforeExpand);

            $('.expandSearch').attr('restricted', 1);
            $('.expandSearch').text('Expand Search');

            //put here

            window.localStorage.setItem('restricted', "true");
            createCookie('restricted', 'true', '2');


        } else if (restricted == "true") {

            createCookie('browsing', '99', '2');

            $('#browsing').attr('data-browsing', '99');

            //$('#browsing_id').attr('data-browsing-id', ''); //need to blank these?

            //$('#browsing_array').text('');


            $('.expandSearch').attr('restricted', 0);
            $('.expandSearch').text('Restrict Search');

            window.localStorage.setItem('restricted', "false");
            createCookie('restricted', 'false', '2');


        } else {

            //first click

            $('.expandSearch').removeClass('heartBeat');
            //set the cookie 99

            createCookie('browsing', '99', '2');

            //update the page references

            $('#browsing').attr('data-browsing', '99');
            //$('#browsing_id').attr('data-browsing-id', ''); //need to blank these?
            //$('#browsing_array').text('');


            $('.expandSearch').attr('restricted', 0);
            $('.expandSearch').text('Restrict Search');
            window.localStorage.setItem('restricted', "false");
            createCookie('restricted', 'false', '2');



        }



    }

    function checkResize(){
        if (
            document.fullscreenElement ||
            document.webkitFullscreenElement ||
            document.mozFullScreenElement ||
            document.msFullscreenElement
        ){
            // action for fullscreen enable set the css to translate
            //console.log('fullscreen');
            //$(".video").css({ 'transform' : ''});
            $("#videoChapter").removeClass('video');

        }else{
            // action for fullscreen disable set the css to translate
            //console.log('not fullscreen');
            $("#videoChapter").addClass('video');

        }
    }

    $(document).ready(function() {

        $(window).resize(checkResize);


        $(document).on('click', '.expandSearch', function() {

            toggleExpandedStatusTagBar();

            showTagBar(selectedTag);


            $('.expandSearch').addClass('heartBeat');

            


        })

    })



    $(document).ready(function() {


        checkTagFiltering();

        checkExpandedStatusTagBar();

        //$('.expandSearch').trigger('click');

        getComments();

        // Initialize the tour
        tourShort.init();

        // Start the tour
        tourShort.start();

      

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

            if (!$target.closest('#collapseExample').length &&
                $('#collapseExample').is(":visible")) {
                $('#collapseExample').collapse('hide');
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

        $(document).on('click', '.action-like', function() {

            //alert('hello');

            var videoid = $(this).attr('data');
            //alert(videoid);
            //$(this).children('.fa-thumbs-up').addClass('gieqsGold');
            //$(this).children('.fa-thumbs-up').removeClass('text-muted');

            //AJAX to add the like

            var icon = $(this).children('.fa-thumbs-up');
            $(icon).prop("disabled", true);

            //change state

            //ajax to a script to update

            if ($(icon).hasClass('gieqsGold')) {
                var liked = 1; // already liked
                /* $(icon).addClass('text-muted');
                $(icon).removeClass('gieqsGold'); */

            } else {
                var liked = 0; // not liked yet
                /* $(icon).removeClass('text-muted');
                $(icon).addClass('gieqsGold'); */
            }

            $(icon).prop("disabled", false);

            if (liked == 0) {

                var type = 1;

            } else if (liked == 1) {

                var type = 2;

            }

            var dataToSend = {

                videoid: videoid,
                type: type,


            }

            //const jsonString2 = JSON.stringify(dataToSend);

            const jsonString = JSON.stringify(dataToSend);
            //console.log(jsonString);
            //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

            var request2 = $.ajax({
                beforeSend: function() {


                },
                url: siteRoot + "scripts/useractions/updateUserLike.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request2.done(function(data) {
                // alert( "success" );
                if (data == 1) {
                    //show green tick

                    if (liked == 1) {

                        $(icon).addClass('text-muted');
                        $(icon).removeClass('gieqsGold');
                        $(icon).removeClass('animated');
                        $(icon).removeClass('heartBeat');

                    } else if (liked == 0) {

                        $(icon).removeClass('text-muted');
                        $(icon).addClass('gieqsGold');
                        $(icon).addClass('animated');
                        $(icon).addClass('heartBeat');


                    }

                    //$('#notification-services').delay('1000').addClass('is-valid');




                }
                //$(document).find('.Thursday').hide();
                $(icon).prop("disabled", false);
            })


            //$(this).('.fa-thumbs-up').first().addClass("gieqsGold");
            //remove the check from the tag removed


        })

        $(document).on('click', '.action-favorite', function() {

            //alert('hello');

            var videoid = $(this).attr('data');
            //alert(videoid);
            //$(this).children('.fa-thumbs-up').addClass('gieqsGold');
            //$(this).children('.fa-thumbs-up').removeClass('text-muted');

            //AJAX to add the like

            var icon = $(this).children('.fa-heart');
            $(icon).prop("disabled", true);

            //change state

            //ajax to a script to update

            if ($(icon).hasClass('gieqsGold')) {
                var liked = 1; // already liked
                /* $(icon).addClass('text-muted');
                $(icon).removeClass('gieqsGold'); */

            } else {
                var liked = 0; // not liked yet
                /* $(icon).removeClass('text-muted');
                $(icon).addClass('gieqsGold'); */
            }

            $(icon).prop("disabled", false);

            if (liked == 0) {

                var type = 1;

            } else if (liked == 1) {

                var type = 2;

            }

            var dataToSend = {

                videoid: videoid,
                type: type,


            }

            //const jsonString2 = JSON.stringify(dataToSend);

            const jsonString = JSON.stringify(dataToSend);
            //console.log(jsonString);
            //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

            var request2 = $.ajax({
                beforeSend: function() {


                },
                url: siteRoot + "scripts/useractions/updateUserFavourite.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request2.done(function(data) {
                // alert( "success" );
                if (data == 1) {
                    //show green tick

                    if (liked == 1) {

                        $(icon).addClass('text-muted');
                        $(icon).removeClass('gieqsGold');
                        $(icon).removeClass('animated');
                        $(icon).removeClass('heartBeat');

                    } else if (liked == 0) {

                        $(icon).removeClass('text-muted');
                        $(icon).addClass('gieqsGold');
                        $(icon).addClass('animated');
                        $(icon).addClass('heartBeat');


                    }

                    //TODO update views and likes number here

                    //$('#notification-services').delay('1000').addClass('is-valid');




                }
                //$(document).find('.Thursday').hide();
                $(icon).prop("disabled", false);
            })


            //$(this).('.fa-thumbs-up').first().addClass("gieqsGold");
            //remove the check from the tag removed


        })

        $(document).on('click', '#submitComment', function() {

            event.preventDefault();

            $('#commentForm').submit();

        })

        $(document).on('click', '.showMeAround', function() {

            // Initialize the tour
            tourShort.init();

            // Start the tour
            tourShort.restart();

        })

        $(document).on('click', '.showMeAroundLong', function() {

            // Initialize the tour
            tourLong.init();

            // Start the tour
            tourLong.restart();

        })

        $(document).on('click', '.showMeAroundLongEndTour', function() {

            tourShort.end();
            // Initialize the tour
            tourLong.init();

            // Start the tour
            tourLong.restart();

        })



        $("#commentForm").validate({

            invalidHandler: function(event, validator) {
                var errors = validator.numberOfInvalids();
                console.log("there were " + errors + " errors");
                if (errors) {
                    var message = errors == 1 ?
                        "1 field contains errors. It has been highlighted" :
                        +errors + " fields contain errors. They have been highlighted";


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
            ignore: [],
            rules: {

                //EDIT







                comment: {
                    required: true,
                    maxlength: 600,
                    minlength: 25,

                },





















            },
            submitHandler: function(form) {

                //submitPreRegisterForm();

                submitCommentForm();

                //TODO submit changes
                //TODO reimport the array at the top
                //TODO redraw the table



            }




        });

        $(document).on('click', '#jumpTimeLine', function() {

            $('html, body').animate({
                scrollTop: $("#cd-timeline").offset().top - 100
            }, 500);


        })

        $(document).on('click', '#jumpComments', function() {


            $('#collapseExample3').collapse('show');
            $('#collapseExample3').on('shown.bs.collapse', function(e) {
                $('html,body').animate({
                    scrollTop: $('#collapseExample3').offset().top - 80
                }, 500);
            });



        })

        $(document).on('click', '#jumpReferences', function() {


            $('#collapseExample2').collapse('show');
            $('#collapseExample2').on('shown.bs.collapse', function(e) {
                $('html,body').animate({
                    scrollTop: $('#collapseExample2').offset().top - 80
                }, 500);
            });

        })

        $(document).on('click', '#tourTagNav', function() {


            $('#collapseExample').collapse('show');
            $('#collapseExample').on('shown.bs.collapse', function(e) {
                $('html,body').animate({
                    scrollTop: $('#collapseExample').offset().top - 250
                }, 500);
            });

        })

        $(document).on('click', '#chapterNavTour', function() {


            $('#selectDropdown').collapse('show');
            $('#selectDropdown').on('shown.bs.collapse', function(e) {
                $('html,body').animate({
                    scrollTop: $('#selectDropdown').offset().top - 250
                }, 500);
            });



        })

        $(document).on('click', '#start_tour', function() {



            $('html,body').animate({
                scrollTop: $('#videoDisplay').offset().top - 250
            }, 500);



        })


    })
    </script>


</body>

</html>