


<?php require 'includes/config.inc.php';?>


<head>

    <?php

error_reporting(E_NONE);


      //define user access level

      $openaccess = 1;

      //$requiredUserLevel = 6;

      require BASE_URI . '/pages/learning/includes/head.php';

      $general = new general;

      $users = new users;

      $usersViewsVideo = new usersViewsVideo;

      $usersSocial = new usersSocial;

      $usersLikeVideo = new usersLikeVideo;
        
        $usersFavouriteVideo = new usersFavouriteVideo;
        require(BASE_URI . '/vendor/autoload.php');
use Vimeo\Vimeo;
// Get this from your account
$vimeo_client_id = '47b9e04f8014da6dc06bbd4b5879d2f3dff2fc1c';
$vimeo_client_secret = '+7btjhyrrfEaZpAfLX81+pPrxOYlIS9A2d5Jj27GU7JyprVjwBGHK0+LE/XS0++3Ai060tT4msKZa4LbOQFOwOANa8JWqvz6D4k7XXFi4g8vEoBrH6Oh3RwQlaZUZCuP';

// This has to be generated on your site, plugin or theme
$vimeo_token = 'cc33c4732d5f31ff9b681b23591bd95d';
error_reporting(-1);

$client = new Vimeo($vimeo_client_id, $vimeo_client_secret, $vimeo_token);


      ?>


    <?php

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

    //echo $requiredVimeoURL;


    



?>


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
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.css">
    <script src="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/autosize/dist/autosize.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>



    

    <style>
        .gieqsGold {

        color: rgb(238, 194, 120) !important;


        }

        .close > span:not(.sr-only) {
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

        .tagCard {

        background-color: #1b385dde;



        }

        .tagCardHeader{

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

        .card-body ::-webkit-scrollbar{

        display: none;

        }

        .card-body {

        -ms-overflow-style : none;
        }

        @media (min-width: 992px) {
        .tagCard {


        left: -50vw;
        top: -20vh;
        min-width:30vw;


        }
        .video {
        box-sizing: border-box;
        height: 25.25vw;
        /* min-height: 100%;
        min-width: 100%; */
        transform: translate(-50%, -50%);
        position: absolute;
        left: 50%;
        top: 50%;
        width: 100.77777778vh;

        }
        #col-container{

        padding-left: 0px !important;
        padding-right: 0px !important;

        }
        }

        @media (max-width: 576px) {
        #videoDisplay{

        width: 100vw;
        position: relative;
        margin-left: -50vw;
        left: 50%;
        height: auto;

        }
        }

        @media (min-width: 1200px) {
        #chapterSelectorDiv{



        top:-3vh;


        }
        #playerContainer{

        margin-top:-20px;

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
        0% { opacity: 0; }
        100% { transform: translateY(0); opacity: 1; }
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
        bottom: 20px;
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
    </style>


</head>

<body>
    <header class="header header-transparent" id="header-main">

        <!-- Topbar -->

        <?php require BASE_URI . '/pages/learning/includes/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/pages/learning/includes/navTest.php';?>

        


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
		
							}else {

                                if ($general->checkVideoFree($id) == '3'){

                                    //video is available free
                                }else{

                                    echo '<div class="container mt-10 mb-10">';
                                    echo "Video not freely available.  Return <a href='https://www.gieqs.com'>home</a>";
                                    echo '</div>';
                                    include(BASE_URI . "/footer.php");
                                    exit();

                                }
                                //check that the id is a free video
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

                        if (!isset($currentUserLevel)){

                            $currentUserLevel = 1;

                        }
                        
                        
		
        ?>
        
        <!-- load all video data -->

        <div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>

        <div id="chapternumber" style="display:none;"><?php if ($chapternumber){echo $chapternumber;}?></div>


        <div id="vimeoid" style="display:none;"><?php echo $general->getVimeoID($id);?></div>

					<div id="videoChapterData" style="display:none;"><?php echo $general->getVideoAndChapterDatav1($id);?>
					</div>

					<div id="videoChapterTagData" style="display:none;"><?php echo $general->getVideoAndChapterData($id);?>
					</div>

                    <div id="videoData" style="display:none;"><?php $videoDataMod = $general->getVideoDataMod($id);
                        
                        //print_r($videoDataMod);
                        
                        $author = $videoDataMod[0]['author'];


                        //echo $author;

                        $authorText = $users->getUserName($author);

                        $users->Load_from_key($author);

                        $videoDataMod[0]['author'] = $authorText;
                        $videoDataMod[0]['authorid'] = $author;
                        $videoDataMod[0]['centreName'] = $users->getcentreName($author);
                        $videoDataMod[0]['centreCity'] = $users->getcentreCity($author);
                        $country = $users->getcentreCountry($author);
                        $videoDataMod[0]['centreCountry'] = $general->getCountryName($country);

                        $users->endusers();
                        

                        echo json_encode($videoDataMod);

                        
                        ?></div>
                    
                    <div id="tagsData" style="display:none;"><?php echo $general->getTagsVideo($id);?></div>

                    <div id="tagCategories" style="display:none;"><?php $allCategories = $general->getAllTagCategories(); print_r($allCategories);?></div>


                    <!--RECORD THE USER DETAILS AND VIEW-->
<?php

//echo $userid; echo $id; echo 'hello';
                        /* if ($usersViewsVideo->matchRecord2way($userid, $id) === false){  
                            
                            //if not recorded already

                            echo $userid; echo $id;
                $usersViewsVideo->setuser_id($userid);
                $usersViewsVideo->setvideo_id($id);
                $usersViewsVideo->prepareStatementPDO();
            } */

?>

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

                                           $tagBox .= '<span class="badge bg-gray-800 mx-2 mb-1 tagButton" id="tag' . $value1['id'] . '">' . $value1['tagName'] . '</span>'; 

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
    <div id="omnisearch" class="omnisearch">
        <div class="container">
            <!-- Search form -->
            <form class="omnisearch-form">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-flush">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Type and hit enter ...">
                    </div>
                </div>
            </form>
            <div class="omnisearch-suggestions">
                <h6 class="heading">Search Suggestions</h6>
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>macbook pro</span> in Laptops
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>iphone 8</span> in Smartphones
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>macbook pro</span> in Laptops
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>beats pro solo 3</span> in Headphones
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>smasung galaxy 10</span> in Phones
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="main-content bg-gradient-dark">

    

        <div class="d-flex align-items-end">
            <div class="container mt-10 mt-lg-10 pt-4 pt-lg-4">
            <nav aria-label="breadcrumb" class="mb-3">
                            <ol class="breadcrumb breadcrumb-links p-0 m-0">
                                <li class="breadcrumb-item"><a>GIEQs online</a></li>
                                <li class="breadcrumb-item"><a>Video Search</a></li>
                                <li class="breadcrumb-item active" aria-current="page">GIEQs Demonstration Viewer</li>
                            </ol>
                        </nav>
                        <div class="row" style="margin-right:15px; margin-left:15px;">
                        <span class="h3 mb-0 text-white d-block w-lg-75 w-xl-75"><?php echo $general->getVideoTitle($id)?></span>
                        </div>
                        <!-- <div class="row" style="margin-right:15px; margin-left:15px;">
                        <span class="col-xl-8 text-muted text-md d-block my-2" id="videoDescription">Video subtitle</span> -->
                        <div class="row" style="margin-right:15px; margin-left:15px;">
                    <span class="col-xl-8 text-muted text-md d-block my-2" id="videoDescription"><?php echo $videoDataMod[0]['description'];?></span>
                </div>

                <a class="dropdown-item gieqsGold" id="descriptionDropdownButton" data-toggle="collapse"
                                href="#collapseDescription" aria-expanded="false" aria-controls="collapseDescription">
                                <i class="fas fa-chevron-circle-up"></i> show Summary (new, AI driven!)
                            </a>
                <div id="collapseDescription" class="collapse row" style="margin-right:15px; margin-left:15px;">
                    <div class="col-xl-8 text-muted text-md d-block my-2" id="videoSummary">

                    <h3>In brief</h3>
                    
                    <?php echo $videoDataMod[0]['summary'];?>

                    <h3>Detailed Summary</h3>

                    <?php echo $videoDataMod[0]['detailedSummary'];?>

                
                </div>
                    </div>

                <div class="row">
                    <div class="col-lg-7 mb-0 mb-lg-0 pl-lg-5">
                        
                       
                        <div class="col text-left mt-0 align-items-center">
                                                    <div class="actions">
                                                        <a class="action-item p-0 m-0 pr-4 likes" data="<?php echo $id;?>">
                                                            <i class="fas fa-heart mr-1 pr-1 text-muted" data-toggle="tooltip" data-placement="bottom" title="favourite"></i> <span
                                                                id="likesNumber"><?php echo $usersSocial->countFavourites($id);?></span></a>
                                                            
                                                        <a class="action-item p-0 m-0 pr-4 views" data="<?php echo $id;?>">
                                                            <i class="fas fa-thumbs-up mr-1 text-muted" data-toggle="tooltip"
                                                            data-placement="bottom" title="like"></i> <span
                                                                id="viewsNumber"><?php echo $usersSocial->countLikes($id);?></span></a>

                                                        <a class="action-item p-0 m-0 pr-4 views"><i
                                                                class="fas fa-eye mr-1" data-toggle="tooltip"
                                                                data-placement="bottom" title="views"></i> <span
                                                                id="viewsNumber"><?php echo $usersSocial->countViews($id);?></span></a>
                                                        <a class="action-item p-0 m-0 pr-1 text-wrap"><i
                                                                class="fas fa-user mr-1"></i>
                                                            <!-- <span id="videoAuthor" class="flex-grow"></span> -->
                                                        </a>

                                                    </div>
                                                </div>
</div>
                            <div class="col-lg-2 mb-0 mb-lg-0 align-self-center">
                                <div class="text-right ">
                                
                                                        <!--//TODO ADD TAGS DISPLAUY TEXT HERE-->
                                                    
                                    <a class="dropdown-item" data-toggle="collapse" href="#collapseExample"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-chevron-circle-up"></i> show tags
                                    </a>
                                    <a class="dropdown-item" data-toggle="collapse" href="#selectDropdown"
                                        aria-expanded="false" aria-controls="selectDropdown">
                                        <i class="fas fa-chevron-circle-up"></i> show chapters
                                    </a>
                                   
                                    

</div>
                                <div class="collapse mb-0" id="collapseExample">
                                    <div class="card mb-0 tagCard">
                                    <div class="card-header tagCardHeader mb-0">
                                    <i style="float:right;" class="fas fa-times tagsClose cursor-pointer"></i>
                        <span class="h6">Tags <br/></span><span class="text-sm">(click to filter)</span><span class="text-sm text-right"> <a style="float:right;" class="cursor-pointer" onclick="undoFilterByTag();"><i class="fas fa-undo"></i>  Undo Filter</a></span>
                    </div>
                                        <div class="card-body mt-0 pt-0">
                                            
                                                <div id="tagsDisplay">
                                                <?php echo $tagBox;?>
                                                </div>
                                                
                                            
                                        </div>
                                    </div>


                                </div>
                                <div class="collapse card mb-0 p-2 flex-row"  id="selectDropdown">
                            <div class="container">
                                <div class="row">
                                <span class="mb-0 pl-2 pt-2 flex-grow-1">Choose chapter</span>
                                <button type="button" class="close text-right text-white" data-toggle="collapse" href="#selectDropdown" aria-label="Close">
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
                                            <a href="#" class="action-item"><i class="fas fa-sync" data-toggle="tooltip" data-placement="bottom" title="restart video"></i></a>

                                            <!-- <a class="action-item" data-toggle="collapse" href="#selectDropdown"><i
                                                    class="fas fa-ellipsis-h" data-toggle="tooltip" data-placement="bottom" title="show chapters"></i></a> -->

                                            <?php if ($isSuperuser == 1){?>
                                            
                                            <a href="<?php echo BASE_URL; ?>/pages/learning/scripts/forms/videoChapterForm.php?id=<?php echo $id;?>" class="action-item"><i class="fas fa-edit" data-toggle="tooltip" data-placement="bottom" title="edit video"></i></a>

                                            <?php }?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="list-group">


                                <a class="list-group-item p-0">

                                    <div class="d-flex align-items-center justify-content-between">

                                        <div class="flex-fill p-2 text-limit">
                                            <h6 id="chapterHeadingControl" class="progress-text mb-1 text-sm d-block text-limit text-left">No chapter selected
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
                                                <i id='video-forward' class="fas fa-step-forward cursor-pointer"></i>
                                                </div>
                                                <div>
                                                    <span id='currentChapterTime'></span>

                                                </div>
                                            
                                                
                                               <!--  <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1"></label>
                                                </div> -->
                                                
                                                <div class="font-weight-bold gieqsGold">
                                                    <span id="currentChapter">x</span> / <span id="totalChapters">y</span>
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
                    <span id="chapterHeading" class="h6 mb-0 text-white d-block">No chapter selected</span>
</div>
<div class="card-body" style="padding-right: 0.2em;
    padding-left: 0.2em;
    padding-bottom: 0.2em;
  
    padding-top: 0.5em; max-height: 40vh; overflow-y: scroll;">
                    <span id="chapterDescription" class="mt-2 p-2 d-block text-left"></span>
</div>
<div class="card-footer tagFilterDisplayArea">
</div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex align-items-end bg-gradient-dark">
        <div class="container mt-4 pt-0 pt-lg-0">
            <div class="row">
                <div class="col-lg-9 mb-0 mb-lg-0">
                    <p class="text-left d-flex align-items-left">
                    <!-- <a class="dropdown-item" data-toggle="collapse" href="#collapseExamplenotyet" aria-expanded="false"
                            aria-controls="collapseExample2">
                            <i class="fas fa-chevron-circle-up"></i> show histopathology result
                        </a> -->
                        <a class="dropdown-item" data-toggle="collapse" href="#collapseExample2" aria-expanded="false"
                            aria-controls="collapseExample3">
                            <i class="fas fa-chevron-circle-up"></i> show references
                        </a>
                        <a class="dropdown-item" onclick="alert('Comments are disabled for the demonstration version');" aria-expanded="false"
                            aria-controls="collapseExample3">
                            <i class="fas fa-chevron-circle-up"></i> show comments
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample2">
                        <div class="card">
                            <div class="card-footer">
                            <span class="h5 mb-4">References</span>
                                <div class="flex-row mt-2">
                                
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

                                            <a class="action-item"><i class="fas fa-info mr-1" data-toggle="tooltip" title="click on the references to go to PubMed"></i></a>
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



    </div>
    </div>
     <!-- Modal Flyer-->
 <div class="modal fade" id="modal-flyer" tabindex="-1" role="dialog" aria-labelledby="modal-flyer"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dark" role="document">
                <div class="modal-content p-1">
                <div class="modal-header">
                        <h5 class="modal-title" id="accreditationLabel" style="color: rgb(238, 194, 120);">Want more like this? Then join us for GIEQs IV</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="text-white" aria-hidden="false">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body p-5 text-center">
                    <a href="<?php echo BASE_URL;?>/iv"><img class="w-100" src="<?php echo BASE_URL;?>/assets/img/flyer/gieqs_iv_flyer.jpg"/></a>



 </div>
 <div class="modal-footer">
                                <button type="button" class="btn-small rounded-pill bg-gieqsGold text-dark"
                                    data-dismiss="modal">Close</button>

                            </div>

                    </div>

                    
            </div>
        </div>
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

    <div class="modal fade" id="teaser-videos" tabindex="-1" role="dialog" aria-labelledby="teaser-videos"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dark" role="document">
                <div class="modal-content p-1">
                    <div class="modal-header">
                        <h5 class="display-4 modal-title" id="accreditationLabel" style="color: rgb(238, 194, 120);">
                            Join us for GIEQs II</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="text-white" aria-hidden="false">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div id="videoDisplay mb-3" class="">

                            <div class="row">
                                <p class="h5 mt-2">Released prior to the early bird deadline these 6, 1-2 minute video
                                    snippets
                                    demonstrate the attention to detail, deconstructed approach and rock solid evidence
                                    base of the GIEQs Approach. <br /> <br /></p>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="https://vimeo.com/544320202" data-fancybox>
                                            <img alt="video image"
                                                src="https://i.vimeocdn.com/video/1126934937-431df118afeb15456f5df6bfc5408fef149204256f9eca13e74093f4052b4151-d_1280x720?r=pad"
                                                class="img-fluid mt-2">
                                        </a>
                                    </div>
                                    <div class="col-sm-6">

                                        <p class="ml-3"><span class="h4">1 - Over the Scope Clip for Upper
                                                Gastrointestinal Bleeding</span><br /><span class="text-muted">Use of
                                                OTSC as first-line for life
                                                threatening upper gastrointestinal haemorrhage.</span>
                                        </p>

                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <a href="https://vimeo.com/554318938/c7ca7d7344" data-fancybox>
                                            <img alt="video image"
                                                src="https://i.vimeocdn.com/video/1148126009-af8e7fba76a227c1fb6fd5e68c06f45bafb260b84d72ed86914cfee72fc65c28-d_1280x720?r=pad"
                                                class="img-fluid mt-2">
                                        </a>
                                    </div>
                                    <div class="col-sm-6">

                                        <p class="ml-3"><span class="h4">2 - Early Gastric Cancer</span><br /><span
                                                class="text-muted">Can you
                                                identify and characterise
                                                this early gastric cancer? Watch the video for more information
                                                including endoscopic resectability</span>
                                        </p>

                                    </div>

                                </div>


                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <a href="https://vimeo.com/558060403/60a0e3b128" data-fancybox>
                                            <img alt="video image"
                                                src="https://i.vimeocdn.com/video/1209723683-ed47dceb6a8abdb974cca06274a57fcb9c0acd68cd422407c137d22e8b074aed-d_1280x720?r=pad"
                                                class="img-fluid mt-2">
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="ml-3"><span class="h4">3 - The Demarcated Area as a Predictor of
                                                Submucosal Invasion in Colon Polyps</span><br /> <span
                                                class="text-muted">the Demarcated Area has emerged as a stable predictor
                                                of submucosal invasive cancer. Find out more here.</span>
                                        </p>

                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <a href="https://vimeo.com/566734386/dab5d063ba" data-fancybox>
                                            <img alt="video image"
                                                src="https://i.vimeocdn.com/video/1209716933-d150591044edd917d12667056cb66eeedd88f42eab3c12a5a5adcca7715201fc-d_1280x720?r=pad"
                                                class="img-fluid mt-2">
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="ml-3"><span class="h4">4 - Dealing with Adverse Events at Colonic
                                                Polypectomy</span><br /><span class="text-muted">
                                                To be able to competently perform colonic polypectomy you must be able
                                                to deal with adverse events. A deconstructed example is shown
                                                here.</span>
                                        </p>

                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <a href="https://vimeo.com/569339891/d436733eba" data-fancybox>
                                            <img alt="video image"
                                                src="https://i.vimeocdn.com/video/1177464087-059ac4984d142abe0951667787fa04cdc8cb1c18089f4f7d823334eaba70ed0a-d_1280x720?r=pad"
                                                class="img-fluid mt-2">
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="ml-3"><span class="h4">5 - Complex EUS applications to make Everyday
                                                ERCP easier</span><br /><span class="text-muted">Endoscopic Ultrasound
                                                is radically changing the way we approach biliary intervention and can
                                                make a difference to everyday endoscopic problems.</span>
                                        </p>

                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <a href="https://vimeo.com/570805121/11be30d98a" data-fancybox>
                                            <img alt="video image"
                                                src="https://i.vimeocdn.com/video/1180469446-bd411e0544f5de5035f20ff63e77f17323f63a5eefefa432e43c3d75e1bf32af-d_1280x720?r=pad"
                                                class="img-fluid mt-2">
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="ml-3"><span class="h4">6 - Decision Making after Large perforation and
                                                life threatening Bleeding during Polypectomy</span><br /><span
                                                class="text-muted">Many of the GIEQs faculty spend their normal working
                                                lives on complex endoscopy. Learning the lessons and approach from these
                                                procedures, deconstructing them and bringing them to the everyday is a
                                                crucial part of the GIEQs approach.</span>
                                        </p>

                                    </div>
                                </div>





                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn-small rounded-pill bg-gieqsGold text-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   



<div id="requiredVimeoURL" style="display:none;"><?php echo $requiredVimeoURL;?></div>



    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="assets/js/purpose.core.js"></script> -->
    <!-- Page JS -->
    <script src="assets/libs/swiper/dist/js/swiper.min.js"></script>
    <script src="assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <script src="assets/libs/typed.js/lib/typed.min.js"></script>
    <script src="assets/libs/isotope-layout/dist/isotope.pkgd.min.js"></script>
    <script src="assets/libs/jquery-countdown/dist/jquery.countdown.min.js"></script>
    <!-- Google maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBuyKngB9VC3zgY_uEB-DKL9BKYMekbeY"></script>
    <!-- Purpose JS -->
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>
    <!-- <script src="assets/js/generaljs.js"></script> -->
    <script src="assets/js/demo.js"></script>
    <script>
    var videoPassed = $("#id").text();

    var chapternumber = $("#chapternumber").text();

                    </script>

    <script src=<?php echo BASE_URL . "/pages/learning/includes/endowiki-player.js"?>></script>
    <script>
        var signup = $('#signup').text();

        function submitPreRegisterForm() {

            var esdLesionObject = pushDataFromFormAJAX("pre-register", "preRegister", "id", null,
            "0"); //insert new object

            esdLesionObject.done(function (data) {

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

        function getComments(){

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
                    beforeSend: function () {


                    },
                    url: siteRoot + "scripts/queries/getCommentsVideo.php",
                    type: "POST",
                    contentType: "application/json",
                    data: jsonString,
                    });



                    request2.done(function (data) {
                    // alert( "success" );
                    if (data){
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

        function hideTagBar(){



        }
        
        function submitCommentForm(){


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
                    beforeSend: function () {


                    },
                    url: siteRoot + "scripts/useractions/addUserComment.php",
                    type: "POST",
                    contentType: "application/json",
                    data: jsonString,
                    });



                    request2.done(function (data) {
                    // alert( "success" );
                    if (data == 1){
                        //show green tick

                        $('#comment').val('')
                        getComments();
                        //$('#notification-services').delay('1000').addClass('is-valid');
                        
                            
                        

                    }else if (data == 0){

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

        $(document).ready(function () {

            


            waitForFinalEvent(function() {

//if there is no chapter set in the url

if (chapternumber != ''){

    console.log('chapternumber is set and is ' + chapternumber);
    skipToChapter(chapternumber);


}

}, 200, "wait for most recent Video");
            //getComments();

            var isshow = localStorage.getItem('isshow');
            if (isshow == null) {
                localStorage.setItem('isshow', 1);  //to make it show once

                // Show popup here
                setTimeout(function() {
                    $('#modal-flyer').modal('show');
                }, 5000);

            }

            // Show popup here // removed for now
         setTimeout(function() {
                    $('#modal-flyer').modal('show');
                }, 5000);
            

            $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#selectDropdown').length && 
                    $('#selectDropdown').is(":visible")) {
                        $('#selectDropdown').collapse('hide');
                    }        
            });

            $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#collapseExample').length && 
                    $('#collapseExample').is(":visible")) {
                        $('#collapseExample').collapse('hide');
                    }        
            });
            
            $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#collapseExample2').length && 
                    $('#collapseExample2').is(":visible")) {
                        $('#collapseExample2').collapse('hide');
                    }        
            });

            

            $(document).on('click', '.tagsClose', function(){

                $('#collapseExample').collapse('hide');

            })

            $('.referencelist').on('click', function (){
		
		
		

		
		PopupCenter("https://www.ncbi.nlm.nih.gov/pubmed/?term="+searchTerm, 'PubMed Search (endoWiki)', 800, 700);

		
		
		
		
	})

	$('.referencelist').on('mouseenter', function (){

		$(this).css('color', 'rgb(238, 194, 120)');
		$(this).css('cursor', 'pointer');

	})

	$('.referencelist').on('mouseleave', function (){

		$(this).css('color', 'white');
		$(this).css('cursor', 'default');

    })
    
    $(document).on('click', '.action-like', function () {

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
            beforeSend: function () {


            },
            url: siteRoot + "scripts/useractions/updateUserLike.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request2.done(function (data) {
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

    $(document).on('click', '.action-favorite', function () {

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
            beforeSend: function () {


            },
            url: siteRoot + "scripts/useractions/updateUserFavourite.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request2.done(function (data) {
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

    $(document).on('click', '#submitComment', function () {

        event.preventDefault();

        $('#commentForm').submit();

    })



    $("#commentForm").validate({

        invalidHandler: function (event, validator) {
            var errors = validator.numberOfInvalids();
            console.log("there were " + errors + " errors");
            if (errors) {
                var message = errors == 1 ?
                    "1 field contains errors. It has been highlighted" :
                    +errors + " fields contain errors. They have been highlighted";


                $('#error').text(message);
                //$('div.error span').addClass('form-text text-danger');
                //$('#errorWrapper').show();

                $("#errorWrapper").fadeTo(4000, 500).slideUp(500, function () {
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
        submitHandler: function (form) {

            //submitPreRegisterForm();

            submitCommentForm();

            //TODO submit changes
            //TODO reimport the array at the top
            //TODO redraw the table



        }




    });


        })
    </script>
</body>

</html>