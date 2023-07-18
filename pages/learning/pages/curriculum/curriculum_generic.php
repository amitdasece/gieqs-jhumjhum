<?php require '../../includes/config.inc.php';?>



<head>

    <?php

define('WP_USE_THEMES', false);
spl_autoload_unregister ('class_loader');



require(BASE_URI . '/assets/wp/wp-blog-header.php');

spl_autoload_register ('class_loader');
//get_header(); 
/* 
function my_load_ajax_content () {

    //echo 'hello';
    $pid        = intval($_POST['post_id']);
    $the_query  = new WP_Query(array('p' => $pid));

    if ($the_query->have_posts()) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();

            $data = '
            <div class="post-container">
                <div id="project-content">
                    <h1 class="entry-title">'.get_the_title().'</h1>
                    <div class="entry-content">'.get_the_content().'</div>
                </div>
            </div>  
            ';

        }
    } 
    else {
        echo '<div id="postdata">'.__('Didnt find anything', THEME_NAME).'</div>';
    }
    wp_reset_postdata();


    echo '<div id="postdata">'.$data.'</div>';
    exit();
}

add_action ( 'wp_ajax_nopriv_load-content', 'my_load_ajax_content' );
add_action ( 'wp_ajax_load-content', 'my_load_ajax_content' );
 */

//error_reporting(E_ALL);


      //define user access level

      $openaccess = 1;
      //$requiredUserLevel = 6;


      require BASE_URI . '/head.php';

      $general = new general;

      $navigator = new navigator;

      $formv1 = new formGenerator;

      $users = new users;


      require_once(BASE_URI . '/assets/scripts/classes/gpat_score.class.php'); 
      $gpat_score = new gpat_score();

      require_once(BASE_URI . '/assets/scripts/classes/gpat_glue.class.php'); 
      $gpat_glue = new gpat_glue();
      

      require_once BASE_URI . '/assets/scripts/classes/curriculae.class.php';
      $curriculae = new curriculae;

      require_once BASE_URI . '/pages/learning/classes/general.class.php';
      $general = new general;
      
      require_once BASE_URI . '/assets/scripts/classes/curriculum_items.class.php';
      $curriculum_items = new curriculum_items;
      
      require_once BASE_URI . '/assets/scripts/classes/curriculum_references.class.php';
      $curriculum_references = new curriculum_references;
      
      require_once BASE_URI . '/assets/scripts/classes/curriculum_sections.class.php';
      $curriculum_sections = new curriculum_sections;
      
      require_once BASE_URI . '/assets/scripts/classes/curriculum_tags.class.php';
      $curriculum_tags = new curriculum_tags;
      
      require_once BASE_URI . '/assets/scripts/classes/curriculum_manager.class.php';
      $curriculum_manager = new curriculum_manager;
      
   
      ?>

    <!--Page title-->

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">
    <script src="<?php echo BASE_URL;?>/pages/learning/includes/generaljs.js"></script>


    <style>

    ::-webkit-scrollbar {
        width: 12px;
    }
    
    /* Track */
    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
        -webkit-border-radius: 10px;
        border-radius: 10px;
        background: rgba(238, 194, 120, 0.8); 
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
    }
    ::-webkit-scrollbar-thumb:window-inactive {
        background: rgba(238, 194, 120,0.4); 
    }

    .divider-icon::before {

        border-bottom: 1px solid #6e84a3 !important;
    }

    .divider-icon::after {

        border-bottom: 1px solid #6e84a3 !important;
    }

    .gieqsGold {

        color: rgb(238, 194, 120);


    }

    /*   #left {
  float: left;
  width: 75%;
  height: 100vh;
  overflow-y: scroll;
  text-align: center;
}

#right {
  float: left;
  overflow-y: scroll;
  height: 100vh;
  width: 25%;
  text-align: center;
} */




    body {

        background-color: #0b1625 !important
    }

    #loading {
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0.9;
        background-color: #162A4C;
        z-index: 99;
        flex-direction: column;
    }

    #loading-image {
        z-index: 100;
    }


    .text-container {

        font-family: 'nunito', sans-serif;
        font-size: 1.3rem !important;
        font-weight: 300;
        line-height: 1.5 !important;
        text-align: left !important;
        color: #95aac9;
    }

    .text-container strong {

        font-weight: 500;
        color: #e3ebf6;
    }

    /*  .text-container p {

        font-size: 1.2rem !important;
        padding-left: 1.1rem;
    } */

    .text-container h1 {

margin-top: 4rem !important;

}

    .text-container h2 {

        margin-top: 4rem;
        color: rgb(238, 194, 120);

    }

    .text-container h3 {

        display: list-item;
        /* This has to be "list-item"                                               */
        list-style-type: disc;
        /* See https://developer.mozilla.org/en-US/docs/Web/CSS/list-style-type     */
        list-style-position: inside;
        /* See https://developer.mozilla.org/en-US/docs/Web/CSS/list-style-position */

        margin-top: 2rem;

        padding-left: 1rem;
    }

    /* .text-container p strong {

        color: rgb(238, 194, 120);
    } */

    .text-container ul {

        font-size: 1.3rem !important;
        padding-left: 5rem;

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

    ol {

        padding-inline-start: 20px;

    }

    .break {
        flex-basis: 100%;
        height: 0;
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

        if (isset($id)){
        $curriculae->Load_from_key($id);

        }else{

            echo 'No id passed to display curriculum';
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
    //include(BASE_URI . '/pages/learning/assets/gpatNav.php');
        // ini_set('display_errors', 1);
// error_reporting(E_ALL);
    
    $debug = false;
    $_SESSION['debug'] = false;


    if (isset($userid)){

        echo "<div id='logged-in'>1</div>";


    }else{

        echo "<div id='logged-in'>0</div>";

    }

    //getcurrent UTC time
    $date = new DateTime('now', new DateTimeZone('UTC'));
    $sqltimestamp = date_format($date, 'Y-m-d H:i:s');
    
    //add a login event to the database

    if (isset($userid)){

        $userActivity->New_userActivity($userid, 'CURRICULUM_VIEW ' . $id , '', $sqltimestamp);
        $userActivity->prepareStatementPDO();

    }

    ?>



    <div class="main-content container bg-dark-dark mt-10">

        <!--Header CHANGEME-->

        <div class="container pt-4">

            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb breadcrumb-links p-0 m-0">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL . '/pages/learning/index.php'?>"
                            target="_blank">GIEQs
                            Online</a></li>
                    <li class="breadcrumb-item"><a href="#"">GIEQs Living Curriculum Viewer</a></li>
                        <li class=" breadcrumb-item active"
                            aria-current="page"><?php echo $curriculae->getlong_name();?></li>
                </ol>
                <div class="alert alert-dark d-none sticky-top" role="alert" style="position:absolute !important;">
                </div>
            </nav>

            <p class="h1 my-4"><?php echo $curriculae->getlong_name();?></p>



            <title><?php echo $curriculae->getlong_name();?> - GIEQs Curriculum</title>


        </div>
        <div class="container-fluid text-container my-4">
            <p class="pl-4 mt-2"><?php echo $curriculae->getdescription(); ?></p>

        </div>









        <div class="container-fluid mt-3">



            <script>
            function round(value, precision) {
                var multiplier = Math.pow(10, precision || 0);
                return Math.round(value * multiplier) / multiplier;
            }

            function isInView(elem){
   return $(elem).offset().top - $(window).scrollTop() < $(elem).height() ;
}







            $(document).ready(function() {

                $.fn.isInViewport = function() {
                    var elementTop = $(this).offset().top;
                    var elementBottom = elementTop + $(this).outerHeight();

                    var viewportTop = $(window).scrollTop();
                    var viewportBottom = viewportTop + $(window).height();

                    return elementBottom > viewportTop && elementTop < viewportBottom;
                };


/* 
                $(window).scroll(function() {
                    var scrollDistance = $(window).scrollTop();
                    //console.log(scrollDistance);


                    // Assign active class to nav links while scolling
                    $('h2').each(function(i) {
                        if ($(this).position().top <= scrollDistance + 2000) {
                            $('.section-nav a.text-gieqsGold').removeClass('text-gieqsGold')
                                .addClass(
                                    'text-muted');
                            $('.section-nav a').eq(i).addClass('text-gieqsGold').removeClass(
                                'text-muted');
                        }
                    });
                }).scroll(); */




            })
            </script>


            </head>

            <body>

                <div id="loading">
                    <div class="d-flex" style="opacity: 1.0; align-items:center; margin-bottom:2rem;">
                        <div class="spinner-grow mr-3" style="width: 3rem; height: 3rem;" role="status">
                            <span class="sr-only gieqsGold">Loading...</span>
                        </div>
                        <div class="display-4 gieqsGold">Loading GIEQs Living Curriculum Viewer</div>
                    </div>
                    <div class="d-flex">

                        <div class="col-10 container">
                            <p class="text-dark bg-gieqsGold p-3" style="opacity: 1;"><i class="fa fa-info-circle mr-3"
                                    aria-hidden="true"></i>It takes a lot of processing to deliver a Live Curriculum.
                                Every time you reload this page a new curriculum is built. If we added a reference or
                                tag it will be visible once you reload. </p>
                            <p class="text-dark bg-gieqsGold p-3" style="opacity: 1;">We suggest leaving the curriculum
                                open once it loads and using tags to browse GIEQs Online</p>

                                <p class="text-dark bg-gieqsGold p-3" style="opacity: 1;">If you are not logged into GIEQs Online you can view the curriculum, check references but major functionality (tag jumping, viewing demonstration videos) is disabled.  GIEQs Online logins can be obtained free at <a href="https://www.gieqs.com/online" target="_blank">gieqs.com/online</a></p>
                        </div>
                    </div>





                </div>


                <div class='content mt-5'>
                    <div class="row">



                        <div id="left" class="col-lg-3 col-xl-3 border-right">
                            <!--         	<div class="h-100 p-4"> -->
                            <div id="sticky" data-toggle="sticky" class="is_stuck pr-3 mr-3 pl-2 pt-2">


                            
                                <h6 class="mt-0 mb-3 pl-0 h5 text-left"><?php echo $curriculae->getlong_name();?></h6>
                                
                                <h6 class="mt-0 mb-3 pl-0 h5 text-left">Jump to Section</h6>

                                <a class="collapse-all hover-text-gold cursor-pointer">Collapse All</a>
                                <div class="break"></div>
                                <a class="return-top hover-text-gold cursor-pointer">Return to Top</a>

                                <div class="section-scroller" style="overflow-y: scroll; max-height: 60vh;">
                                    <ul class="section-nav ml-0 pl-0">



                                    </ul>
                                </div>

                                <h6 class="mt-4 mb-3 pl-0 h5 text-left">How to Use</h6>

                                <a class="quickstart hover-text-gold cursor-pointer mb-2">Quickstart</a>
                                <div class="break"></div>
                                <a class="living-curriculum hover-text-gold cursor-pointer mb-2">What is a Living
                                    Curriculum?</a>
                                <div class="break"></div>
                                <a class="methodology hover-text-gold cursor-pointer mb-2">Methodology</a>










                            </div>

                        </div>

                        <div id="right" class="right col-lg-9 text-container">


                            <?php
          
          //$id = 1;

//get the required curriculum

//$curriculae->Load_from_key($id);

//echo the title

//echo '<h1>' . $curriculae->getlong_name() . '</h1>';
//change <<title>> tag

//description
//echo $curriculae->getdescription();

//get all tag categories

$y = 1;
        $z = 2;

$allCategories = $general->getAllTagCategories();

if ($debug){

    print_r($allCategories);

}


$sections = $curriculum_manager->getsectionscurriculum($id);

if ($debug){

var_dump($sections);

}

$x=1;

$section_heading = true;

$section_counter = 1;

$minor_section_counter = 1;


foreach ($sections as $section_key=>$section_value){


    $curriculum_sections->Load_from_key($section_value);


    //foreach section echo the blocks

    $items = $curriculum_manager->getitemssection($section_value);


    if (!is_array($items)){

        if ($section_heading === false){
        echo '</div>';
        $section_heading = true;

        }

        echo '<div class="curriculum-section">'; //section heading do this

        echo '<h1 class="mt-3 toc-marker super-section" tocid="' . $curriculum_sections->getid() . '" data="' . $section_counter . '. ' . $curriculum_sections->getname() . '">' . $section_counter . '. ' . $curriculum_sections->getlong_name() . '</h1>';  //section

        $section_counter++;


        $minor_section_counter = 1;


    }else{

        $section_heading = false;

        $minor_section_counter++;

           /*  echo '<div class="curriculum-section">'; //section heading do this
            $section_heading = true;
 */

        

        echo '<h2 class="ml-3 toc-marker minor-section" tocid="' . $curriculum_sections->getid() . '" data="' . ($section_counter - 1) . '.' . ($minor_section_counter - 1) . ' ' .  $curriculum_sections->getname() . '">' . ($section_counter - 1) . '.' . ($minor_section_counter - 1) . '. ' . $curriculum_sections->getlong_name() . '</h2>';  //section


    }




    if ($debug){

        var_dump($items);
        echo '<br/><br/>This item has ' . count($items) . ' sections';
        echo '<br/>$items is array ' . var_dump(is_array($items));
        
        }

     if(!empty($items)) 
     {

      

    foreach ($items as $items_key=>$items_value){

        $curriculum_items->Load_from_key($items_value);
        $number_tags = null;
        $number_references = null;
        $number_videos = null;
        $number_tags = $curriculum_manager->counttagscurriculumitem($curriculum_items->getid());
        $number_references = $curriculum_manager->countReferences($curriculum_items->getid());
        $number_videos = $curriculum_manager->countBestPracticeVideos($curriculum_items->getid());
        $tags_binary = ($number_tags > 0) ? 1 : 0;
        $videos_binary = ($number_videos > 0) ? 1 : 0;
        $references_binary = ($number_references > 0) ? 1 : 0;

        $number_visible = $tags_binary + $videos_binary + $references_binary;


        echo '<div class="curriculum-top-card mb-2 mt-3 bg-dark-dark">';
        echo '<div class="curriculum-card-body pb-0 mt-3" style="padding-bottom:0px !important;">';

        echo '<div class="actions d-flex justify-content-end" style="font-size:1rem;">';

        echo '<div class="cursor-pointer feedback hover-text-gold mx-2 mr-auto" data-statement-id="' . $curriculum_items->getid() . '"><i class="fa fa-comment" aria-hidden="true"></i> Feedback</div>';

        if ($number_videos > 0){
        echo '<div class="cursor-pointer demonstration-video hover-text-gold mx-2" data-video-id="' . $curriculum_manager->getVideoCurriculum($curriculum_items->getid()) . '" data-chapter-id="' . $curriculum_manager->getChapterNumberCurriculum($curriculum_manager->getChapterCurriculum($curriculum_items->getid())) . '"><i class="fa fa-play" aria-hidden="true"></i> Best-Practice Video</div>|';
        }

        if ($number_tags > 0){
        echo '<div class="cursor-pointer tag-icon hover-text-gold mx-2" data-toggle="collapse"
        href="#multiCollapseExample' . $y. '"><i  class="fas fa-tag mx-1"></i>' . $curriculum_manager->counttagscurriculumitem($curriculum_items->getid()) . ' Tag(s)</div>';
        if ($references_binary == 1){

            echo '|';

        }

        }else{
            //echo '<div class="mx-2"><i  class="fas fa-tag mx-1"></i> No Tags</div>|';

        }
        if ($number_references > 0){
        echo '<div class="reference-icon hover-text-gold cursor-pointer mx-2" data-toggle="collapse"
        href="#multiCollapseExample' . $z. '""><i class="fas fa-graduation-cap mx-1"></i>' . $curriculum_manager->countReferences($curriculum_items->getid()) . ' Reference(s)</div>';
        }else{

            //echo '<div class="mx-2"><i class="fas fa-graduation-cap mx-1"></i> No References</div>'; 
        }
        echo '</div>';
        echo'</div>';
        echo '</div>'; //end first card div
        echo '<div class="curriculum-lower-card bg-dark">';
        echo '<div class="card-body mt-1 mb-0 pb-1">';



        if ($curriculum_items->gettype() == '1'){

            $statement_text = $curriculum_items->getstatement();
            preg_replace('/<span[^>]+\>|<\/span>/i', '', $statement_text); //1. my answer
             echo $statement_text;

        }elseif ($curriculum_items->gettype() == '3'){

            echo '<figure class="img-responsive text-center my-3">';
            echo '<img class="w-75" src="' . BASE_URL . '/assets/img/uploads/' . $curriculum_items->getimage_url() . '">';
            echo '<figcaption class="my-2">' . $curriculum_items->getstatement() . '</figcaption>';
            echo '</figure>';
    
        }elseif ($curriculum_items->gettype() == '4'){?>

                            <!-- //code for embedded video with popup -->
                            <div class="embed-responsive embed-16by9">
                                <div style="padding:64.67% 0 0 0;position:relative;"><iframe
                                        src="<?php echo $curriculum_items->getlink_to_content();?>"
                                        allow="autoplay; fullscreen; picture-in-picture" allowfullscreen frameborder="0"
                                        style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe></div>
                            </div>
                            <?php
        }elseif ($curriculum_items->gettype() == '3'){

            //code for link to GIEQS ONLINE VID
    
        }


        ?>

                            <!-- <div id="accordion-<?php ///echo $x;?>" class="accordion accordion-stacked my-3">
            
            <div class="card">
                <div class="card-header py-4" id="heading-1-1" data-toggle="collapse" role="button" data-target="#collapse-1-1" aria-expanded="false" aria-controls="collapse-1-1">
                    <h6 class="mb-0"><i class="fas fa-file-pdf mr-3"></i>Tags</h6>
                </div>
                <div id="collapse-1-1" class="collapse" aria-labelledby="heading-1-1" data-parent="#accordion-<?php echo $x;?>">
                    <div class="card-body">
                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header py-4" id="heading-1-2" data-toggle="collapse" role="button" data-target="#collapse-1-2" aria-expanded="false" aria-controls="collapse-1-2">
                    <h6 class="mb-0"><i class="fas fa-lock mr-3"></i>References</h6>
                </div>
                <div id="collapse-1-2" class="collapse" aria-labelledby="heading-1-2" data-parent="#accordion-<?php echo $x;?>">
                    <div class="card-body">
                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                    </div>
                </div>
            </div>
            
            
            
        </div> -->

                            <?php
        //get references item

        $x++;

        echo '<div class="references" data-id="' . $items_value . '">';

        $references = $curriculum_manager->getreferences($curriculum_manager->getreferencescurriculumitem($items_value));
        
        if ($debug){

            var_dump($references);
            
            }
        


        echo '</div>';

        echo '<div class="tags" data-id="' . $items_value . '">';

        
        $tags = $curriculum_manager->gettagscurriculumitem($items_value);

        if ($debug){

            echo '<br/><br/>Tags Are</br>';

            var_dump($tags);
            
            }

            
            $a = 0;
            $tagBox = null;


        foreach ($allCategories as $key=>$value){
            //check category (we have the id as value)

            //get all the matching tags 

            $tags_this_category = null;

            $tags_this_category = [];
            $x = 0;
           
            foreach ($tags as $key2=>$value2){

                //echo '<br/><br/>' . $general->getCategoryforTagNumeric($value2) . '</br></br>';

                if ($general->getCategoryforTagNumeric($value2) == $value['id']){

                    $tags_this_category[$x] = $value2;

                             


                    $x++;
                    $a++;

                }

            }

            //if the array is empty skip this loop


            if (count($tags_this_category) > 0){

         
                //now have all the tags which match this category

                //echo category name

                $tagBox .= '<div class="row align-items-left">';
                                        
                $tagBox .= '<span class="h6 mt-1"> ' . $value['tagCategoryName'] . '</span>';
    
                $tagBox .=  '</div>';

                $tagBox .= '<div class="row align-items-left">';

                foreach ($tags_this_category as $key3=>$value3){

                    $tagBox .= '<span class="badge bg-dark-dark hover-text-gold mx-2 mb-1 tagButton tagTagsboxButton" data-tag-id="' . $value3 . '" id="tag' . $value3 . '">' . $general->getTagName($value3) . '</span>'; 

                    


                }
                $tagBox .=  '</div>';

            }else{

                //echo 'Never makes the tag cat > 0';
            }

            //echo the category name and tags underneath


            

        }

        if ($a == 0){

            $tagBox = '<p style="font-size:1.0rem;">No Tags Yet</p>';


        } 
       
       
        
?>



                            <!--  <div class="d-flex">

                                <a class="dropdown-item" style="font-size:1rem !important;" data-toggle="collapse"
                                    href="#multiCollapseExample<?php echo $y;?>" role="button" aria-expanded="false"
                                    aria-controls="multiCollapseExample<?php echo $y;?>"><i
                                        class="fas fa-chevron-circle-up"></i>&nbsp;Show Tags</a>
                                <a class="dropdown-item" style="font-size:1rem !important;" data-toggle="collapse" href="javascript;"
                                    data-target="#multiCollapseExample<?php echo $z;?>" aria-expanded="false"
                                    aria-controls="multiCollapseExample<?php echo $z;?>"><i
                                        class="fas fa-chevron-circle-up"></i>&nbsp;Show References</a>
                            </div> -->
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample<?php echo $y;?>">


                                        <div class="card card-body bg-dark">
                                            <!--  <span class="h5 mb-4">Tags</span> -->

                                            <div class="py-2 px-2 flex-row flex-wrap">
                                                <?php         echo $tagBox;
                        ?>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample<?php echo $z;?>">
                                        <div class="card card-body bg-dark">
                                            <!--    <span class="h5 mb-4">References</span> -->
                                            <div class="flex-row flex-wrap">
                                                <?php         echo $curriculum_manager->getFullReferenceListCurriculumItem($curriculum_items->getid());
                        ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>



                            <?php

        $z++;
        $z++;
        $y++;
        $y++;
        echo '</div>';


        echo '</div>';

        echo '</div>';




        //get tags item


    }


} 

}

/* 

get sections
$curriculum_manager->getsectionscurriculum($id);

for each section
    echo each block dependent on whether text or
    table is a table

    depending on what 'type' is

    <option value="1" selected="">text</option>
<option value="2">table</option>
<option value="3">figure</option>
<option value="4">video</option>
<option value="5">gieqs online asset</option>

    video is vimeo link like blog link_to_content

    photo is photo like blog [this is ok, now there is link_to_content]  image_url

    [add image upload field]

    gieqs ref is id number link_to_content

*/






//var_dump($assets3);


//do they occur in the past? that is type 2 and 3 only

//then create a new subscription for the user for them with the tag PRO_ASSET

//GET AN ARRAY OF PRO USERS



//WHERE (`gateway_transactionId` LIKE '%TOKEN_ID=PRO_SUBSCRIPTION%

            
            ?>










                        </div>
                        <!--end col-9-->


                    </div>
                    <!--end row-->

                </div>
                <!--end content-->


        </div>
        <!--end content-->



    </div>




    </div>
    <!--end overall-->




    <!-- Modal -->


    <?php require BASE_URI . '/footer.php';?>


    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title h4" id="myExtraLargeModalLabel">
                        <?php echo $title = get_post_field('post_title', 325);?></h4>
                    <button type="button" class="close bg-gieqsGold" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="quickstart" class="blog-container">

                        <?php     echo $content = apply_filters('the_content', get_post_field('post_content', 325));?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade living-curriculum-modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title h4" id="myExtraLargeModalLabel">
                        <?php echo $title = get_post_field('post_title', 350);?></h4>
                    <button type="button" class="close bg-gieqsGold" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="quickstart" class="blog-container">

                        <?php     echo $content = apply_filters('the_content', get_post_field('post_content', 350));?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade methodology-modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title h4" id="myExtraLargeModalLabel">
                        <?php echo $title = get_post_field('post_title', 362);?></h4>
                    <button type="button" class="close bg-gieqsGold" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="quickstart" class="blog-container">

                        <?php     echo $content = apply_filters('the_content', get_post_field('post_content', 362));?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal feedback-modal fade" id="feedback_modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">We value your feedback</h5>
                <button type="button" class="bg-gieqsGold close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Please let us know what type of feedback you wish to leave?</strong></p>
               
            </div>
            <div class="modal-footer" style="flex-direction: column;
    align-content: center;">
               
                <button type="button" class="btn btn-dark" onclick="giveFeedback(1);">New Tag Suggestion (for this statement)</button>
                <button type="button" class="btn btn-dark" onclick="giveFeedback(2);">New Reference Suggestion (for this statement)</button>
                <button type="button" class="btn btn-dark" onclick="giveFeedback(3);">Incorrect Statement/Reference</button>
                <button type="button" class="btn btn-dark" onclick="giveFeedback(4);">Something else?</button>


            </div>
            <!-- <div class="modal-footer">
            <p><a
                        class="key-features cursor-pointer btn-sm bg-gieqsGold btn-icon rounded-pill hover-translate-y-n3 mt-5">
                        <span class="btn-inner--icon">
                            <i class="fas fa-fire text-dark"></i>
                        </span>
                        <span class="btn-inner--text text-dark">Show Key Features of each Plan</span>
                    </a></p>
            </div> -->
            <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


    



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

    var statement_id = null;

    var siteRoot = rootFolder;

    esdLesionPassed = $("#id").text();

    if (esdLesionPassed == "") {

        var edit = 0;

    } else {

        var edit = 1;

    }

    function isElementInViewport (el) {

// Special bonus for those using jQuery
if (typeof jQuery === "function" && el instanceof jQuery) {
    el = el[0];
}

var rect = el.getBoundingClientRect();

return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && /* or $(window).height() */
    rect.right <= (window.innerWidth || document.documentElement.clientWidth) /* or $(window).width() */
);
}

    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }

    function Utils() {

    }

    Utils.prototype = {
        constructor: Utils,
        isElementInView: function(element, fullyInView) {
            var pageTop = $(window).scrollTop();
            var pageBottom = pageTop + $(window).height();
            var elementTop = $(element).offset().top;
            var elementBottom = elementTop + $(element).height();

            if (fullyInView === true) {
                return ((pageTop < elementTop) && (pageBottom > elementBottom));
            } else {
                return ((elementTop <= pageBottom) && (elementBottom >= pageTop));
            }
        }
    };

    var Utils = new Utils();

    function giveFeedback(id){


        if (id == 1){

            window.location.href = "mailto:admin@gieqs.com?subject=new%20tag%20suggestion%20for%20Curriculum%20statement%20id%20" + statement_id + "%20from%20user%20id%20<?php echo $userid;?>&body=Please%20describe%20the%20tag%20you%20think%20we%20should%20add%20for%20this%20curriculum%20statement%20here:%0D%0A%0D%0A%0D%0A%0D%0AThank%20you%20for%20your%20feedback";

        }

        if (id==2){

            window.location.href = "mailto:admin@gieqs.com?subject=new%20reference%20suggestion%20for%20Curriculum%20statement%20id%20" + statement_id + "%20from%20user%20id%20<?php echo $userid;?>&body=Please%20describe%20the%20reference%20you%20think%20we%20should%20add%20for%20this%20curriculum%20statement%20here%20including%20DOI:%0D%0A%0D%0A%0D%0A%0D%0AThank%20you%20for%20your%20feedback";


        }

        if (id==3){

            window.location.href = "mailto:admin@gieqs.com?subject=Incorrect%20Statement%20Report%20for%20Curriculum%20statement%20id%20" + statement_id + "%20from%20user%20id%20<?php echo $userid;?>&body=Please%20describe%20the%20issue%20with%20the%20curriculum%20statement%20as%20clearly%20as%20possible%20here:%0D%0A%0D%0A%0D%0A%0D%0AThank%20you%20for%20your%20feedback";

        }

        if (id==4){

            window.location.href = "mailto:admin@gieqs.com?subject=User%20Comment%20for%20Curriculum%20statement%20id%20" + statement_id + "%20from%20user%20id%20<?php echo $userid;?>&body=Please%20comment%20here:%0D%0A%0D%0A%0D%0A%0D%0AThank%20you%20for%20your%20feedback";

            }

    }


    function generateTOC() {

        var statement = '';

        //get all h1s
        //get all h2s before the next h1 -> second line
        //get all h3s before the next h2 -> 3rd line

        var x = 15;
        var y = 1;



        $('.super-section').each(function() {

            var id = null;


            id = $(this).attr('tocid');
            $(this).attr('id', id);
            console.log(id);
            text = $(this).attr('data');
            statement +=
                '<div class="toc-section"><li tocid="' + id +
                '" class="toc-entry super-section-toc toc-h4 mt-4" style="font-size:1.3rem; list-style-type:none;"><a class="text-muted hover-text-gold" href="#' +
                id +
                '">' + text +
                '</a><i class="fa fa-plus-circle cursor-pointer hover-text-gold fold-up-major-section ml-2" style="z-index: 1000;" aria-hidden="true"></i></li>';


            statement += '<ol class="minor-list d-none" style=\'list-style: none;\'>';
            //console.log($(this).parent().find('.minor-section'));  
            $(this).parent().find('.minor-section').each(function() {
                x++;


                var id = null;
                var text = null;
                //$(this).attr('id', x);
                id = $(this).attr('tocid');
                $(this).attr('id', id);

                text = $(this).attr('data');
                statement +=
                    '<li tocid="' + id +
                    '" class="toc-entry toc-h4" style="font-size:1.0rem; list-style-type:none; text-align:left;"><a class="text-muted  hover-text-gold" href="#' +
                    id +
                    '">' + text + '</a></li>';




            });

            statement += '</ol></div>';




            x++;

        })

        $('.section-nav').html(statement);



    }

    function generateTOCold() {

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

        $(window).on('load', function() {


            //$('#loading').hide();
        })




        generateTOC();
        //refreshNavAndTags();

        waitForFinalEvent(function() {
            generateTOC();



        }, 1000, "Resize header");



        $('.referencelist').on('click', function() {


            //get the tag name

            var searchTerm = $(this).attr('data');

            //console.log("https://www.ncbi.nlm.nih.gov/pubmed/?term="+searchTerm);

            PopupCenter("https://www.ncbi.nlm.nih.gov/pubmed/?term=" + searchTerm,
                'PubMed Search (endoWiki)', 800, 700);





        })

        $('.referencelist').on('mouseenter', function() {

            $(this).css('color', 'rgb(238, 194, 120)');
            //$(this).css('cursor', 'pointer');

        })

        $('.referencelist').on('mouseleave', function() {

            $(this).css('color', '#95aac9');
            //$(this).css('cursor', 'default');

        })

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



       $(document).scroll(function() {
            var scrollDistance = $('#right').scrollTop();
            //scrollDistance = scrollDistance - 500;

            // Assign active class to nav links while scolling
            $('.toc-marker').each(function(i) {

//console.log(this);
                //console.log('i is ' + i);

                //is this in view?

                var idElement = $(this).attr('id');
                var isElementInView = isElementInViewport($('#' + idElement));

                if (isElementInView) {

                   // console.log(idElement + ' is in view');

                }
               if (isElementInView) {

                    /* console.log('element id in view is ' + idElement);
                    console.log('element name is ' + $(this).text());

                    console.log('scroll distance is ' + scrollDistance);
                    console.log('top of this element is ' + $(this).position().top);
                    console.log('is it in view is ' + isElementInView);
                    console.log('.section-nav li [tocid=' + idElement + ']'); */

                    $('.section-nav li a.text-gieqsGold').removeClass('text-gieqsGold')
                        .addClass(
                            'text-muted');
                    $('.section-nav li[tocid=' + idElement + ']').find('a').addClass(
                        'text-gieqsGold').removeClass(
                        'text-muted');

               /*          $('.section-nav').find('.super-section-toc').removeClass('text-gieqsGold')
                        .addClass(
                            'text-muted');

                        $('.section-nav li[tocid=' + idElement + ']').parent().find('.super-section-toc').addClass('text-gieqsGold').removeClass(
                        'text-muted');

                        var element_to_scroll = $('.section-nav li[tocid=' + idElement + ']');

                        if (isElementInViewport(element_to_scroll) === false){

                            $(element_to_scroll)[0].scrollIntoView(false);

                        } */

                } else {


                } 

            });

        }).scroll();

        $(document).on('click', '.tag-icon', function() {

            //alert('clicked tag icon');

            if ($(this).hasClass('text-gieqsGold') === true) {

                $(this).removeClass('text-gieqsGold').addClass('text-muted');

            } else {
                $(this).addClass('text-gieqsGold').removeClass('text-muted');


            }

            $('.tag-icon').not(this).each(function() {

                $(this).removeClass('text-gieqsGold').addClass('text-muted');


            })

            // do something…
        })


        $(document).on('click', '.reference-icon', function() {

            //alert('clicked reference icon');

            if ($(this).hasClass('text-gieqsGold') === true) {

                $(this).removeClass('text-gieqsGold').addClass('text-muted');

            } else {
                $(this).addClass('text-gieqsGold').removeClass('text-muted');


            }


            $('.reference-icon').not(this).each(function() {

                $(this).removeClass('text-gieqsGold').addClass('text-muted');


            })

            // do something…
        })

        $(document).on('click', '.tagButton', function() {

            var idElement = $(this).attr('data-tag-id');

            //alert(idElement);


            //get the first video with this tag, code from viewer.php line 2698 showTagBar(selectedTag)





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
                tag: idElement,
                browsing_array: browsing_array,


            }

            const jsonString = JSON.stringify(dataToSend);
            //console.log(jsonString);
            //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

            var request2 = $.ajax({
                beforeSend: function() {


                },
                url: siteRoot + "scripts/tagnavigation/get_tag_navigation_info_curriculum.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request2.done(function(data) {
                // alert( "success" );
                if (data) {
                    //show green tick

                    try {
                        
                        var result = JSON.parse(data);

                    } catch (error) {
                        
                        alert('Login Required for Tag Functionality.  You can create an account at gieqs.com/online');
                        return;
                    }

                    console.dir(result);

                    if (result.videos == '0') {

                        alert('No videos for this Tag Yet.  Submit a request?:-)');

                    }

                    if (result.videos == '1') {

                        window.localStorage.setItem('selectedTag', idElement);

                        window.localStorage.setItem('restricted', false);

                        window.open(rootFolder + '/viewer.php?id=' + result.first_video,
                            '_blank').focus();


                    }








                }

            })


            

            request2.fail(function(xhr, status, error) {
                alert("Login Required for Tag Functionality");
            })


















            //end code port





            /* 
                        setcookie("selectedTag", idElement, time() - 3600);

            setcookie("restricted", false, time() - 3600); */


            //redirect to viewer page


            //writer cookies


        })



        $(document).on('click', '.fold-up-major-section', function(event) {

            //console.dir($(this).parent().parent().find('ol'));



            var check_element = $(this).parent().parent().find('ol');

            console.dir(check_element);

            //d-none

            if ($(check_element).is(":visible") === true) {

                $(check_element).addClass('d-none');

                //change to a plus

                $(this).addClass('fa-plus-circle').removeClass('fa-minus-circle');



            } else {


                $(check_element).removeClass('d-none');

                $(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');


                //change to a minus




            }





        })




        /*  $(document).find('.minor-list').each( function(){

$(this).hide();


}); */


        $(document).on('click', '.toc-entry', function(event) {

            //jump to yhe correct section

            //event.preventDefault();

            //highlight that item
            var idElement = $(this).attr('tocid');

            $('.section-nav li[tocid=' + idElement + ']').find('a').addClass('text-gieqsGold')
                .removeClass('text-muted');

            $('.section-nav li').find('a').not('.section-nav li[tocid=' + idElement + ']').removeClass(
                'text-gieqsGold').addClass('text-muted');




        })

        $(document).on('click', '.return-top', function(event) {

            window.scrollTo(0, 0);



        })

        $(document).on('click', '.collapse-all', function(event) {


            $('.section-nav').find('ol').each(function() {

                if ($(this).is(":visible") === true) {

                    $(this).addClass('d-none');

                    //change to a plus

                    console.dir($(this).siblings('li').find('.fold-up-major-section'));

                    $(this).siblings('li').find('.fold-up-major-section').addClass(
                        'fa-plus-circle').removeClass('fa-minus-circle');



                } else {





                    //change to a minus




                }
            })



        })

        $(document).on('click', '.quickstart', function(event) {



            $('.bd-example-modal-lg').modal('show');

            /* var postid = 122;

            $.ajax({
                    type: 'POST',
                    url: '<?php //echo BASE_URL . '/assets/wp/wp-admin/admin-ajax.php';?>',
                    dataType: "json", // add data type
                    data: { action : 'my_load_ajax_content', post_id: postid },
                    success: function( response ) {
                        console.log( response );

                        $( '#quickstart' ).html( response ); 
                    }
            }); */





        })
        
        $(document).on('click', '.living-curriculum', function(event) {



            $('.living-curriculum-modal').modal('show');

            /* var postid = 122;

            $.ajax({
                    type: 'POST',
                    url: '<?php //echo BASE_URL . '/assets/wp/wp-admin/admin-ajax.php';?>',
                    dataType: "json", // add data type
                    data: { action : 'my_load_ajax_content', post_id: postid },
                    success: function( response ) {
                        console.log( response );

                        $( '#quickstart' ).html( response ); 
                    }
            }); */





        })

        $(document).on('click', '.methodology', function(event) {



$('.methodology-modal').modal('show');

/* var postid = 122;

$.ajax({
        type: 'POST',
        url: '<?php //echo BASE_URL . '/assets/wp/wp-admin/admin-ajax.php';?>',
        dataType: "json", // add data type
        data: { action : 'my_load_ajax_content', post_id: postid },
        success: function( response ) {
            console.log( response );

            $( '#quickstart' ).html( response ); 
        }
}); */





})

$(document).on('click', '.feedback', function(event) {

statement_id = $(this).attr('data-statement-id');

$('.feedback-modal').modal('show');

/* var postid = 122;

$.ajax({
        type: 'POST',
        url: '<?php //echo BASE_URL . '/assets/wp/wp-admin/admin-ajax.php';?>',
        dataType: "json", // add data type
        data: { action : 'my_load_ajax_content', post_id: postid },
        success: function( response ) {
            console.log( response );

            $( '#quickstart' ).html( response ); 
        }
}); */





})

$(document).on('click', '.demonstration-video', function(event){

    var video_id = $(this).attr('data-video-id');
    var chapter_id = $(this).attr('data-chapter-id');

    var statement = (chapter_id == '') ? video_id : video_id + '&chapternumber=' + chapter_id;

    window.open(rootFolder + '/viewer.php?id=' + statement,
                            '_blank').focus();





})

        $(document).on('shown.bs.collapse', function(event){
        //console.log( "in! print e: " +event.type);
        if (isElementInViewport(event.target) === false){

            event.target.scrollIntoView(false);

        }
        
    });












    })
    </script>
</body>

</html>