

<?php require '../../includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      $openaccess = 0;
      $requiredUserLevel = 6;


      require BASE_URI . '/head.php';

      $general = new general;

      $navigator = new navigator;

      $formv1 = new formGenerator;

      $users = new users;


      require_once(BASE_URI . '/assets/scripts/classes/gpat_score.class.php'); 
      $gpat_score = new gpat_score();

      require_once(BASE_URI . '/assets/scripts/classes/gpat_glue.class.php'); 
      $gpat_glue = new gpat_glue();
      

   
      ?>

    <!--Page title-->
    <title>GPAT Help</title>

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">


    <style>
    .divider-icon::before {

        border-bottom: 1px solid #6e84a3 !important;
    }

    .divider-icon::after {

        border-bottom: 1px solid #6e84a3 !important;
    }

    .gieqsGold {

        color: rgb(238, 194, 120);


    }

    .text-container p {

        font-size: 1.3rem !important;
        padding-left: 1.5rem;
    }

    .text-container h2 {

        margin-top: 4rem;
        color: rgb(238, 194, 120);
       
    }

    .text-container h3 {

        display: list-item;          /* This has to be "list-item"                                               */
    list-style-type: disc;       /* See https://developer.mozilla.org/en-US/docs/Web/CSS/list-style-type     */
    list-style-position: inside; /* See https://developer.mozilla.org/en-US/docs/Web/CSS/list-style-position */

margin-top: 2rem;

padding-left: 1rem;
}

    .text-container p strong {

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

        if (isset($userid)){
        $users->Load_from_key($userid);

        }else{

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

    
    $debug = false;
    $_SESSION['debug'] = false;

    ?>



    <div class="main-content bg-gradient-dark mt-10">

        <!--Header CHANGEME-->

        <div class="d-flex align-items-end container">
            <p class="h1 mt-5">GIEQs Online User Guide</p>


        </div>
        <div class="d-flex align-items-end container">
            <p class="text-muted pl-4 mt-2">User Reference for GIEQs Online</p>

        </div>









        <div class="container mt-3">



            <script>
            function round(value, precision) {
                var multiplier = Math.pow(10, precision || 0);
                return Math.round(value * multiplier) / multiplier;
            }








            $(document).ready(function() {







            })
            </script>


            </head>

            <body>



                <div class='content'>
                    <div class="row">



                        <div id="right" class="col-lg-3 col-xl-3 border-right">
                            <!--         	<div class="h-100 p-4"> -->
                            <div id="sticky" data-toggle="sticky" class="is_stuck pr-3 mr-3 pl-2 pt-2">
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


                            <?php
          
            
            ?>




                           

<h1>Using the GIEQS online creation system</h1>
<h2>Tagging</h2>
<p><u>Where to</u><u> find?</u></p>
<p>Go to Gieqs Online, Creator, pop up the menu and click on &lsquo;View my tagging Tasks&rsquo;.</p>
<p>Content:</p>
<p>This is for people who are running the site, could invite you to look to videos and add tags to them. If you scroll to the list, then you can accept the tagging, do the climate tagging. With a click on the cross, you can add a tag.</p>
<p>You can also go directly tot he video edit page.</p>
<p><u>New tag:</u></p>
<p>This you can find when you pop out the creator menu. Here you can add a new tag, if you have access to this.</p>
<p><u>New category:</u></p>
<p>You can also find this in the creator menu. You can make a new tagcategory.</p>
<p>If you want to make new tags or new categories, please discuss this with the Supermoderators of the website. Only if you are selected for this, you&rsquo;ll have access.</p>
<p>&nbsp;</p>
<p>You can also consult the video guide to tagging below</p>
<div class = "embed-responsive embed-16by9">
<div style="padding:64.67% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/682997986?h=e71fb93bc0&title=0&byline=0&portrait=0&speed=0&badge=0&autopause=0&player_id=0&app_id=58479/embed" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen frameborder="0" style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe></div>
        </div>
<h2>Chapters</h2>
<p><u>Where to find?</u></p>
<p>Go to Gieqs Online, Creator, pop up the menu, Video Table. Select a video and click on &lsquo;Edit chapters&rsquo;.</p>
<p><u>Content:</u></p>
<p>When you go to the editing page, you can see the video displayed. Down below you will see either a blank screen, if the video has no chapters. But increasingly we&rsquo;re trying to add this for you. All that you need to do, is add tags to the videos. Tags describe ideas that run the structure of the website and can be searched for.</p>
<p>For example: users can search for videos that contain Kudo V, endoscopic imaging of a colorectal polyp, a demarcated area in an upper GI lesion, &hellip; They can also search for combinations, so they can very quickly find what they want.</p>
<p>To add a new chapter: go the bottom of the screen and press &lsquo;new chapter&rsquo;.</p>
<p>This will add a new chapter with a number after the chapter that is already there. If you want to add more then 1 chapter, you have to press and wait untill every chapter is there. Then you have a couple of options. If you go to the first chapter, you can fill in 0 in the box &lsquo;time from&rsquo;. Then select from te video where you want the chapter to end and press &lsquo;+video time&rsquo; (underneath the &lsquo;time to&rsquo; box). Give your chapter a name and a description. If you&rsquo;ll finding it difficult to see the name box, you can refresh te page. The next chapter that you add, could have a time directly after the chapter before. To achieve that: once you add another chapter, press &lsquo;+ previous chapter end time&rsquo;. This will insert a time which is just after the chapter time in the &lsquo;time to&rsquo; of the previous chapter. So you can go on untill the last chapter. In the last chapter all you have to do, is press the same thing as the previous chapter end time. In the last box, you just drag the video to the very end, press pause and press &lsquo;+video time&rsquo;. Sometimes you have to press &lsquo;+video time&rsquo; button a few times to get the correct time, but once it becames correct, this will not change anymore.</p>
<p>Now you see the video displayed, you can add headings and tags.</p>
<p>To add a tag, there are a couple of ways.</p>
<ul>
<li>Structured way: Press &lsquo;add tag&rsquo;. Then you have all the tags that are available on the website. You can click on the blue buttons (on the top). You can click trough them, dive into the categories (by clicking on the category) and then assigne them.</li>
<li>Faster way: Press &lsquo;add tag (Search)&rsquo;. Here you can simply typ into the box to find your tag. Press enter on the keybord and it&rsquo;s automatically added. You can just keep doing it.</li>
</ul>
<p>After that, you have links to the tag manager. This is where you can see the structure of the site, all the tags and the linked references, which you can also update. This is an important concept with tags, that they are also linked to academical references (PubMed), which can quickly pulled in.</p>
<h2>Status of the learning tool</h2>
<p><u>Where to find?</u></p>
<p>Go to the Creator menu. There you can find &lsquo;Video Table&rsquo;. Click on &lsquo;Edit chapters&rsquo; of the movie that you want to edit. In the right upper corner, you can find &lsquo;Video Status&rsquo;. It depends on your level of access if this will work or not work.</p>
<p><u>Content:</u></p>
<p>You can change the video between status:</p>
<table>
<tbody>
<tr>
<td width="274">
<p>Not shown, not tagged Inactive video</p>
</td>
<td width="278">
<p>on the background; is never shown when users are looking around the site</p>
</td>
</tr>
<tr>
<td width="274">
<p>Needs tagging</p>
</td>
<td width="278">
<p>the video fits in a list for tagging, but is never shown on the live website</p>
</td>
</tr>
<tr>
<td width="274">
<p>Shown on live site</p>
</td>
<td width="278">
<p>shows the movie immediately on the website</p>
</td>
</tr>
<tr>
<td width="274">
<p>Shown on live site and avaibable FREE</p>
</td>
<td width="278">
<p>the freeplay link will also work</p>
</td>
</tr>
<tr>
<td width="274">
<p>Submit for moderation prior to LIVE site</p>
</td>
<td width="278">
<p>Your access is too low to change the live site status and therefore you can submit it supermoderation before moderation is shown on live site (minute 7:00)</p>
<p>&nbsp;</p>
<p>Your changes will not be lost, but you will loose access to tagging the video once you&rsquo;ve selected that to make sure that it&rsquo;s referred.</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p><u>View in player:</u></p>
<p>This shows you the video in his nature form on the site, so you can see what it will look like.</p>
<p><u>View/edit video data:</u></p>
<p>Here you can edit the title and other important information about the movie. You should also have a look on that before you submit your video.</p>
<p><u>Display chapter data:</u></p>
<p>This shows in an easy form to all the chapters, with times in seconds.</p>
<p><u>Vimeo profile:</u></p>
<p>Only if you have access, you can go to Vimeo to see and edit the movie.</p>
<p><u>Edit Chapter data:</u></p>
<p>If you have access, you can go to the Vimeo profile and edit the chapter data.</p>
<p>If the video is titled and chaptered already, then you can import those from Vimeo. This is actually the way to do it.</p>
<h2>New video</h2>
<p><u>Where to find?</u></p>
<p>Go to the creator menu, drop the menu down and click on &lsquo;new video&rsquo;</p>
<p><u>Content:</u></p>
<p>&lsquo;New video&rsquo; is a way to add a new video on the website. If you have a video on Vimeo (it needs to be on Vimeo on the GIEQS team account) and you want to add it on the website, you just have to enter&nbsp; the numerical value of the Vimeo URL. So when you play video on Vimeo, you get a link. If you have a Vimeo URL, you only need the long number in the URL.</p>
<p>When you insert the number, it probably will say that the movie cannot be shown, but don&rsquo;t worry about that, just continue. Edit the data and then it will be added to the video table.</p>
<p>You can&rsquo;t edit the status of an important video until you have reloaded it on the video table. Once you&rsquo;ve done everything and saved, you go to the video table (it will be the top video on the list). If you want to edit the details, just click on the name. If you want to edit the chapters, just click on it (on the right).</p>
<p>The video table, allows you to search all the videos added on the site.</p>
<h2>References</h2>
<p><u>Where to find?</u></p>
<p>Go to the Creator menu. There you can find references.</p>
<p><u>Content:</u></p>
<p>That&rsquo;s where you can edit a new references. Go to view references (in the upper right corner) and have a look to the table of references.</p>
<h2>Supermoderation</h2>
<p>If you want to send out invitations for tagging: all the videos which are available on the website, are listed in the manage videos. The creator can send out invitations if you click on the pensil and invite new tagger (at the bottom), by selecting a user. Once you have invited a user, you have a load of options. The user will get emails and be entered in the management system. Be aware that the user has the correct permission (needs to be user level 2).</p>
<p>If you want to check to user access, you have to go into the administration menu. Drop down the menu by pressing the programme button and select users (access). Adding a user level is only possible to add your own user level or less.</p>
<p>If you want to see what&rsquo;s going on in tagging, you can put on moderate tagging in process and you can see what&rsquo;s going on. These are all videos that people have moderated and if there&rsquo;s a tag which says tagging reviewed, changes required, &hellip; You can all manage this from here. By clicking, you can send a message, send a review mail, approve the video if you want to show it on the live site and remove it from this table. Moderate completed tagging which is videos which have been completed and which people have submitted. You can check that and approve it or send a message to the user from here.</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
                            


                        </div>
                        <!--end col-9-->


                    </div>
                    <!--end row-->

                </div>
                <!--end content-->


        </div>
        <!--end content-->








    </div>
    <!--end overall-->




    <!-- Modal -->


    <?php require BASE_URI . '/footer.php';?>



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

    var siteRoot = rootFolder;

    esdLesionPassed = $("#id").text();

    if (esdLesionPassed == "") {

        var edit = 0;

    } else {

        var edit = 1;

    }


    function generateTOC() {

        var statement = '';

        //get all h1s
        //get all h2s before the next h1 -> second line
        //get all h3s before the next h2 -> 3rd line

        var x=15;
        $('h2').each(function() {

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


       generateTOC();
        //refreshNavAndTags();

        waitForFinalEvent(function(){
            generateTOC();

			
	    }, 1000, "Resize header");

        if (edit == 1) {

            fillForm(esdLesionPassed);
        }

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



        $(window).scroll(function() {
            var scrollDistance = $(window).scrollTop();


            // Assign active class to nav links while scolling
            $('fieldset').each(function(i) {
                if ($(this).position().top <= scrollDistance) {
                    $('.section-nav a.text-gieqsGold').removeClass('text-gieqsGold').addClass(
                        'text-muted');
                    $('.section-nav a').eq(i).addClass('text-gieqsGold').removeClass(
                        'text-muted');
                }
            });
        }).scroll();












    })
    </script>
</body>

</html>