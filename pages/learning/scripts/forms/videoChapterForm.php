

<?php require '../../includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      $requiredUserLevel = 2;

      require BASE_URI . '/pages/learning/includes/head.php';

      $general = new general;

      $navigator = new navigator;

      $usersTagging = new usersTagging;

      $video_moderation = new video_moderation;

      //if user is not superuser

      //check for a link to tag

      //if no link for this video allow

      //if an open invite deny unless that user

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

    <!--Page title-->
    <title>GIEQs Online Backend - Video Table</title>

    <script src=<?php echo BASE_URL . "/assets/js/jquery.vimeo.api.min.js"?>></script>
    <!-- Datatables -->
    <script src="<?php echo BASE_URL; ?>/node_modules/datatables.net/js/jquery.datatables.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/autosize/dist/autosize.min.js"></script>

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/datatables/datatables.min.css">
    <style>
    .gieqsGold {

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



    .gieqsGoldBackground {

        background-color: rgb(238, 194, 120);


    }

    .tagButton {

        cursor: pointer;

    }





    iframe {
        box-sizing: border-box;
        height: 25.25vw;
        left: 50%;
        min-height: 100%;
        min-width: 100%;
        transform: translate(-50%, -50%);
        position: absolute;
        top: 50%;
        width: 100.77777778vh;
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
            z-index: 25;
        }



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
        width: 400px;

        -webkit-animation: fade-in-up .25s ease forwards;
        animation: fade-in-up .25s ease forwards;
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
				    
                    
	
		$formv1 = new formGenerator;
		$general = new general;
		$video = new video;
		$tagCategories = new tagCategories;
		
		
		
		foreach ($_GET as $k=>$v){
		
			$sanitised = $general->sanitiseInput($v);
			$_GET[$k] = $sanitised;
		
		
		}
		
		if (isset($_GET["id"]) && is_numeric($_GET["id"])){
			$id = $_GET["id"];
		
		}else{
		
			$id = null;
		
		}
		
		
		
        //TERMINATE THE SCRIPT IF NOT A SUPERUSER
        
        
		
		
		
		// Page content
		?>


    <script src=<?php echo BASE_URL . "/dist/jquery.vimeo.api.min.js"?>></script>





    <?php
		//include(BASE_URI . "/scripts/logobar.php");
		
		
		?>




    <div id="categoryModal" class="modal fade docs-example-modal-xl" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class='modalContent modal-content p-3'>

            </div>
            <div class='modalClose modal-footer'>
                <p><br><button class="py-0 my-2 btn btn-small bg-dark" onclick="$('.modal, .darkClass').hide();">Close
                        this window</button></p>
            </div>
        </div>
    </div>



    <div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>

    <?php
    
    $response = $client->request('/videos/' . $general->getVimeoID($id));

    //print_r($response);

    $embedCode = $response['body']['embed']['html'];

    $titleVimeoVideo = $response['body']['name'];

    $descriptionVimeoVideo = $response['body']['description'];


    //var_dump($embedCode);

    $scriptTagPattern = '/src\s*=\s*"(.+?)"/'; 

    preg_match($scriptTagPattern, $embedCode, $matches);
    
//print_r($matches);

    $requiredVimeoURL = $matches[1];

    $requiredVimeoURL = trim($requiredVimeoURL);

    //echo $requiredVimeoURL;


    



?>

    <div id="requiredVimeoURL" style="display:none;"><?php echo $requiredVimeoURL;?></div>

    <div id="titleVimeoVideo" style="display:none;"><?php echo $titleVimeoVideo;?></div>


    <div id="descriptionVimeoVideo" style="display:none;"><?php echo $descriptionVimeoVideo;?></div>


    <div id='content' class='content mt-10'>

        <div class='responsiveContainer container white'>

            <?php
                
                if ($id){

                    if ($isSuperuser == 0){
    
                        //terminate if there is an open invite
            
                        $openInvite =  $video_moderation->videoHasOpenTaggerInvite($id, $debug);
            
                        if ($openInvite){
            
                            $currentLockedUser = $video_moderation->getTagLockedUser($id, $debug);
            
                            if ($currentLockedUser[0] != $userid){
            
                                echo 'This video is locked for tagging to another user<br/>';
                                echo 'Return to <a href="' . BASE_URL .  '/pages/learning/pages/myTagging.php">My Tagging</a>';
                                exit();
                            }

                            //if the video is under review

                            //set as 2

                            if ($video_moderation->isVideoUnderReview($id)){

                                echo 'This video is awaiting review<br/>';
                                echo 'Return to <a href="' . BASE_URL .  '/pages/learning/pages/myTagging.php">My Tagging</a>';
                                exit();

                            }


            
                        }
    
                        //if the video is live requires a supeuser to edit
                        // this is currently disabled
    
                        /* if ($video_moderation->isVideoLive($id)){
    
                            echo 'This video is locked for tagging as it has been designated live on the site<br/>';
                            echo '<a href="mailto:admin@gieqs.com?subject=please unlock video ' . $id . ' for editing">Contact a Superuser</a> to unlock if you need to edit further<br/>';
                            echo 'Return to <a href="' . BASE_URL .  '/pages/learning/pages/myTagging.php">My Tagging</a>';
                            exit();
    
    
                        } */
    
            
            
                        //and the logged in user is not that user
            
                    }
    
    
                }
                
                ?>
            <div class="text-right">

                <div class="actions">

                    <?php if ($currentUserLevel < 3){?>
                    <form class="d-flex">

                        <div class="form-group ml-auto">
                            <label class="form-control-label">Video Status</label>
                            <div class="input-group input-group-merge">
                                <select name="active" id="active" class="form-control form-control-sm">
                                    <option hidden inactive>choose status</option>

                                    <?php if ($currentUserLevel == 1){?>
                                    <option value="0">Not shown, not tagged, inactive video</option>

                                    <?php } ?>
                                    <option value="2">Needs tagging</option>

                                    <?php if ($currentUserLevel == 1){?>
                                    <option value="1">Shown on Live site</option>
                                    <option value="3">Shown on Live site and available FREE</option>
                                    <?php }?>

                                    <option value="4">Submit for moderation prior to Live Site</option>

                                </select>

                            </div>
                        </div>


                    </form>
                    <a href="<?php echo BASE_URL; ?>/videos/<?php echo $id;?>"
                        class="action-item"><i class="fas fa-eye" data-toggle="tooltip" data-placement="bottom"
                            title="watch video in viewer"></i> View in player</a>
                    <a href="<?php echo BASE_URL; ?>/pages/learning/scripts/videoUploadForm.php?id=<?php echo $id;?>"
                        class="action-item"><i class="fas fa-eye" data-toggle="tooltip" data-placement="bottom"
                            title="watch video in viewer"></i> View/edit video data</a>





                    <?php }?>

                </div>
                <div class="actions">



                    <?php if ($currentUserLevel < 3){?>

                    <a href="" class="action-item exportChapterSummary"><i class="fas fa-file-export"
                            data-toggle="tooltip" data-placement="bottom" title="open window chapter data"></i> Display
                        Chapter Data</a>

                    <a href="https://vimeo.com/manage/<?php echo $general->getVimeoID($id);?>/general" target="_blank"
                        class="action-item"><i class="fab fa-vimeo" data-toggle="tooltip" data-placement="bottom"
                            title="open vimeo chapter page"></i> Vimeo Profile</a>


                    <a href="https://vimeo.com/manage/<?php echo $general->getVimeoID($id);?>/interaction-tools#chapters"
                        target="_blank" class="action-item"><i class="fab fa-vimeo" data-toggle="tooltip"
                            data-placement="bottom" title="open vimeo chapter page"></i> Edit Chapter Data</a>

                    <a href="" class="action-item importChapters"><i class="fab fa-vimeo" data-toggle="tooltip"
                            data-placement="bottom" title="copy chapters from vimeo"></i>Import Chapters from Vimeo </a>


                    <a href="" class="action-item getTitle"><i class="fab fa-vimeo" data-toggle="tooltip"
                            data-placement="bottom" title="open vimeo chapter page"></i>Copy Title from Vimeo </a>






                    <?php }?>

                </div>
            </div>
            <div class='row'>
                <div class='col-12'>
                    <h2 style="text-align:left;">Video Chapter, Tag Form</h2>
                    <button class="btn btn-sm btn-outline-gieqsGold mr-5" type="button" onclick='window.open("https://vimeo.com/682997986/e71fb93bc0");'>HOW TO TAG Explainer Video (opens in new window)</button>
                </div>



            </div>


            <p><?php
		
				        if ($id){
		
							$q = "SELECT  `id`  FROM  `video`  WHERE  `id`  = $id";
							if ($general->returnYesNoDBQuery($q) != 1){
								echo "Passed id does not exist in the database";
								echo '</div></div>';
								include(BASE_URI . "/includes/footer.html");
								exit();
		
							}
						}else {
							
							echo "This page requires the id of a video existing in the database to be passed";
							echo '</div></div>';
							include(BASE_URI . "/includes/footer.html");
							exit();
							
						}
		
		?></p>

            <div id="vimeoid" style="display:none;"><?php echo $general->getVimeoID($id);?></div>



            <div class='row'>

                <div class='col-12'>
                    <div id='videoDisplay' class='video-wrap'>

                    </div>

                </div>

            </div>
        </div>


        <div class='container-fluid mb-10'>
            <div id="messageBox" class="alert alert-info alert-dismissible alert-flush mt-3" role="alert">
                <strong>Heads up!</strong> This is a info alert with <a href="#" class="alert-link">an example link</a>
                — check it out!
            </div>
            <div class='row'>
                <!--<div class='col-1'>
					</div>-->
                <div class='col-12'>

                    <div id='images' class='standardBack'>

                    </div>
                    <!--<<form id="imageUpload">
					    
					    input name="files[]" type="file" multiple="multiple" accept=".jpg, .jpeg, .bmp"/>-->

                    <!--<button id="submitimagefiles">Submit</button>
		
					    </form>-->
                </div>
                <!--<div class='col-1'>
					</div>-->
            </div>

        </div>

        <div class="modal fade" id="newTagModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Tag (search method)</h5>
                        



                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        
                    </div>
                    <p class="px-4 py-2" style="height:25px;">Press a to search.  Enter to save when selected.</p>
                    <p class="gieqsGold px-4 py-2 m-0" style="height:25px;" id="messageArea"></p>
                    <div class="modal-body pt-0">
                        <label for="tags" class="mb-3 mt-1">Tags (search)</label>
                        <div class="input-group ">
                            <select id="tags" type="text" data-toggle="select" class="form-control" name="tags">
                                <?php

                                            


                                        echo $general->generateTagStructure();


                                            


?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                        <button id="saveTagChapter" type="button" class="btn btn-sm btn-secondary">Save and Close</button>

                        <button id="saveTagChapterNoClose" type="button" class="btn btn-sm btn-primary">Save and Add More</button>

                    </div>
                    <hr>
                    <button type="button" id="openTagManager" class="btn btn-sm btn-secondary mx-6 my-2">Tag Manager</button>
                        <button type="button" id="openNewTag" class="btn btn-sm btn-secondary mx-6 my-2">New Tag</button>
                        <button type="button" id="openNewCategory" class="btn btn-sm btn-secondary mx-6 my-2">New Category</button>
                        <button type="button" id="openCategorySelect" class="btn btn-sm btn-secondary mx-6 my-2 mb-5">Open Category Selection</button>

                </div>
            </div>
        </div>


        <?php require BASE_URI . '/footer.php';	?>
    </div>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="assets/js/purpose.core.js"></script> -->
    <!-- Page JS -->
    <script src="<?php echo BASE_URL . "/node_modules/@vimeo/player/dist/player.js"?>"></script>

    <script src=<?php echo BASE_URL . "/assets/libs/swiper/dist/js/swiper.min.js"?>></script>
    <script src=<?php echo BASE_URL . "/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"?>></script>
    <script src=<?php echo BASE_URL . "/assets/libs/typed.js/lib/typed.min.js"?>></script>
    <script src=<?php echo BASE_URL . "/assets/libs/isotope-layout/dist/isotope.pkgd.min.js"?>></script>
    <script src=<?php echo BASE_URL . "/assets/libs/jquery-countdown/dist/jquery.countdown.min.js"?>></script>
    <!-- Google maps -->

    <!-- Purpose JS -->
    <script src=<?php echo BASE_URL . "/assets/js/purpose.js"?>></script>
    <!-- <script src=<?php echo BASE_URL . "/assets/js/generaljs.js"?>></script> -->
    <!-- <script src=<?php echo BASE_URL . "/assets/js/demo.js"?>></script> -->
    <script>
    var siteRoot = rootFolder;

    var imagesPassed = "";

    var videoDataDefined;

    var vimeoID;

    var chapteridstored;

    vimeoID = $("#vimeoid").text();

    correctVimeoURL = $("#requiredVimeoURL").text();

    encodedcorrectVimeoURL = encodeURI(correctVimeoURL);

    videoPassed = $("#id").text();

    if (videoPassed == "") {

        var edit = 0;

        videoDataDefined = 0;

    } else {

        var edit = 1;

        //$('#imageUpload').hide();

        videoDataDefined = 1;


        videoDisplay(vimeoID);



        //constructEditTable;

    }

    var files;

    var imageID;

    var singleTag;

    var images = new Object();

    var textAreas = new Object();

    var textAreas2 = new Object();

    var selects = new Object();

    var selects2 = new Object();

    var selects3 = new Object();

    var player = null;




    function videoDisplay(url) {



        if (isNormalInteger(url) === true) {

            //$('#videoDisplay').html("<div class='videoWrapper' style='text-align: centre'><iframe id='videoChapter' src='https://player.vimeo.com/video/"+url+"' width='400' height='288' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>");
            $('#videoDisplay').html(
                " <div id=\"videoWrapper\" class=\"embed-responsive video embed-responsive-16by9\"><iframe id='videoChapter' class=\"embed-responsive-item\" style=\"left:50%; top:50%;\" src='" +
                encodedcorrectVimeoURL +
                "' allow='autoplay' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>");


            $('#submitimagefiles').prop('disabled', true);
            $('#video').prop('disabled', true);
            $('#resetVideoSubmit').show();
            $('#videoForm').show();
            $('#url').val(url);

            waitForFinalEvent(function() {
                //alert("Resize...");
                var $window = $(window);
                var $videoWrap = $('#content').find('.video-wrap');
                console.log($videoWrap);
                var $video = $('#content').find('.video');
                console.log($video);
                var videoHeight = $video.outerHeight();

                $window.on('scroll', function() {
                    var windowScrollTop = $window.scrollTop();
                    var videoBottom = videoHeight + $videoWrap.offset().top - 200;

                    if (windowScrollTop > videoBottom) {
                        $videoWrap.height(videoHeight);
                        $video.addClass('stuck');
                    } else {
                        $videoWrap.height('auto');
                        $video.removeClass('stuck');
                    }
                });

                var iframe = document.querySelector('#videoChapter');

                player = new Vimeo.Player(iframe);

                player.on('loaded', function(data) {
                    addCuePoints();


                });

            }, 100, 'Wrapper Video');





        } else {


            alert('Invalid vimeo id in record');

        }




    }

    function constructEditTable(idPassed) {

        //imagesPassed, ajax the id to get a table in the format of the previous

        //get the images

        //get all the tags for the images


        //$('#imageUpload').hide();

        imagesRequired = new Object;

        //imagesRequired = getNamesFormElements("images");  JSONStraightDataQuery (table, query, outputFormat)

        imagesString = '`id`=\'' + idPassed + '\'';

        query =
            "SELECT a.`id`, a.`split`, a.`active`, b.`id` as `chapterid`, b.`name`, b.`timeFrom`, b.`timeTo`, b.`number`, b.`name` AS `chaptername`, b.`description` FROM `video` as a INNER JOIN `chapter` as b ON a.`id` = b.`video_id` WHERE a.`id` = " +
            idPassed + " ORDER BY ISNULL(b.`number`), b.`number` ASC";

        var selectorObject = JSONStraightDataQuery("video", query, 7); //to here

        //console.log(selectorObject);

        selectorObject.done(function(data) {



            try {

                var formData = $.parseJSON(data);

            } catch (error) {

                console.log('caught');

            }

            if (formData == null) {

                $("#images").html(
                    '<p>No chapter yet defined for this video</p><br><button class="py-0 my-2 btn btn-small bg-dark" id="newChapter" type="button" onclick="newChapterRow();"	>New Chapter</button>'
                );
                return;

            }

            //console.log(formData);

            var active = formData[0]['active'];
            console.log(active);
            $('#active').val(active);


            var html = "<table id=\"imagesTable\" class=\"table imageTable\" style=\"width:100%\">";


            html += "<tr>";
            html += '<th>Chapter Number</th>';
            html += '<th>Time from:</th>';
            html += '<th>Time to:</th>';
            html += '<th>Name</th>';
            html += '<th>Description</th>';
            html += '<th></th>';
            html += '<th>Tags</th>';
            html += '<th></th>';
            html += '</tr>';



            $(formData).each(function(i, val) { //FOR EACH EXISTING CHAPTER


                var id = val.id;
                var chapterid = val.chapterid;
                var number = val.number;
                var timeFrom = val.timeFrom;
                var timeTo = val.timeTo;
                var name = val.chaptername;
                var description = val.description;
                console.log('Description is ' + val.description);
                console.log('Description is ' + val.active);





                // to here

                html += '<tr class="file" id="chapter' + chapterid + '">';
                html += "<td id='" + chapterid + "' style='display:none;'></td>";
                //html += "<td><img src='"+siteRoot+"/"+url+"' style=\"width:240px;\"></td>";


                html += "<td><select name='chapternumber" + chapterid + "' id='chapternumber" +
                    chapterid +
                    "' class='order form-control form-control-sm w-100 px-1 py-0'><option hidden selected>";

                var i;
                for (i = 1; i <= Object.keys(formData).length; i++) {
                    html += "<option value='" + i + "'>" + i + "</option>";
                }


                html += "</select></td>";




                html += "<td><input id='chaptertimefrom" + chapterid +
                    "' type='text' class='form-control form-control-sm w-100 px-1 py-0'></input><br><button class='py-0 my-2 btn btn-small bg-dark' type='button' onclick='getVideoTime(" +
                    chapterid +
                    ", 0)'> + video time</button><br><button type='button' class='jumpToTime py-0 my-2 btn btn-small bg-dark'>seek video</button><br><button id='previousButton" +
                    chapterid +
                    "' class='py-0 my-2 btn btn-small bg-dark' type='button' onclick='enterPreviousEndTime(" +
                    chapterid + ", this.id)'> + previous chapter end time</button></td>";
                html += "<td><input id='chaptertimeto" + chapterid +
                    "' type='text' class='form-control form-control-sm w-100 px-1 py-0'><br><button class='m-2 py-0 my-2 btn btn-small bg-dark' type='button' onclick='getVideoTime(" +
                    chapterid +
                    ", 1)'> + video time</button></input><br><button type='button' class='jumpToTime py-0 my-2 btn btn-small bg-dark'>seek video</button></td>";

                html += "<td class='chapterDesc' style='width:50%'><input id='chaptername" + chapterid +
                    "' class='form-control form-control-sm w-100 px-1 py-0'></input></td>";

                html += "<td class='chapterDesc' style='width:50%'><textarea id='chapterdescription" +
                    chapterid +
                    "' class='name form-control form-control-sm w-100 px-1 py-0' rows='3' cols='70' data-toggle='autosize'></textarea></td>";

                html +=
                    "<td><button class='addTag m-2 py-0 my-2 btn btn-small bg-dark'>Add Tag</button><br/>";
                html +=
                    "<button class='addTagSearch m-2 py-0 my-2 btn btn-small bg-dark'>Add Tag (Search)</button></td>";

                html += "<td class='chapterTag' id='tag" + chapterid + "'></td>";

                //html += "<td><select name='imageorder"+image_id+"' id='imageorder"+image_id+"' class='order'><option hidden selected>";
                /*
                var i;
                for (i = 1; i <= Object.keys(formData).length; i++) { 
                    html += "<option value='"+i+"'>"+i+"</option>";
                }
                
                
                html += "</select></td>";
                */
                html += "<td class='deleteImage'>&#x2718;</td>";
                html += '</tr>';


            });

            html += '</table>';
            html += '<p>';
            html +=
                '<button id="newChapter" class="m-2 py-0 my-2 btn btn-small bg-dark" type="button" onclick="newChapterRow();">New Chapter</button>&nbsp;&nbsp;';
            html +=
                "<button class='addTagAll m-2 py-0 my-2 btn btn-small bg-dark'> Add tag to all chapters</button>&nbsp;&nbsp;";
            html +=
                "<button class='save m-2 py-0 my-2 btn btn-small bg-dark' onclick='fn60sec();'> Save data </button>";
            html += '</p>';

            $("#messageBox").text("Editing video with video id " + idPassed);
            $("#images").html(html);

            $(formData).each(function(i, val) {

                var id = val.id;
                var chapterid = val.chapterid;
                var number = $.trim(val.number);
                console.log('chapter number is ' + number);
                var timeFrom = val.timeFrom;
                var timeTo = val.timeTo;
                var name = val.chaptername;
                var description = val.description;
                //var order = $.trim(val.order);
                //console.log('Type for image id '+image_id+' is '+type);
                //console.log('Order for image id '+image_id+' is '+order);


                $("#chaptername" + chapterid + "").val(name);

                $("#chapterdescription" + chapterid + "").val(description);

                //$("#chapternumber"+chapterid+"").val(number);

                $("#chaptertimefrom" + chapterid + "").val(timeFrom);

                $("#chaptertimeto" + chapterid + "").val(timeTo);

                //$("#imagetype"+image_id+" option[value='"+type+"']").attr('selected', 'selected');

                //$('#content').find("#chaptertimeto"+chapterid+"").val(timeTo);

                //$('#content').find("#chapternumber"+chapterid+"").val(number);

                $('#content').find("#chapternumber" + chapterid + " option[value='" + number + "']")
                    .attr('selected', 'selected');




            });

            //query = "SELECT b.`image_id`, c.`url`, c.`name`, c.`type`, e.`tagName`, d.`id` as imagesTagid, d.`tags_id` FROM `imageSet` as a INNER JOIN `imageImageSet` as b ON a.`id` = b.`imageSet_id` INNER JOIN `images` as c on b.`image_id` = c.`id` INNER JOIN `imagesTag` as d ON c.`id` = d.`images_id` INNER JOIN `tags` as e ON d.`tags_id` = e.`id` WHERE a.`id` = "+idPassed;

            var selectorObject = JSONStraightDataQuery(idPassed, "selectChapterSet", 9);

            //console.log(selectorObject);

            selectorObject.done(function(data) {

                console.log(data);

                try {

                    var formData = $.parseJSON(data);

                } catch (error) {

                    console.log('No ajax data received');

                }

                var ab = 0;

                $(formData).each(function(i, val) {

                    var id = val.id;
                    var image_id = val.chapterid;
                    var tags_id = val.tags_id;
                    var imagesTagid = val.chapterTagid;
                    var tagName = val.tagName;
                    var type = val.type;

                    /* if (ab % 2 === true){

                    $("#tag"+image_id+"").append('<br/>');

                } */
                    $("#tag" + image_id + "").append('<button id="' + imagesTagid + '" data="' +
                        tags_id + '" class="tagButton py-0 my-2 btn btn-small bg-dark">' +
                        tagName + '</button><br/>');

                    /*  ab = ab + 1; */

                    //console.log('ab is ' + ab);

                });

                updatePreValues();

            });


            //enableFormInputs("images");

        });

        /*try {

            $("form#images").find("button#deleteimages").length();

        } catch (error) {

            $("form#images").find("button").after("<button id='deleteimages'>Delete</button>");

        }*/
        /*
        echo '<table id="imagesTable" class="imageTable">';
        	echo '<tr>';
        		echo '<th></th>';
        		echo '<th></th>';
        		echo '<th>Tags</th>';
        		echo '<th>Description</th>';
        		echo '<th>Rank</th>';
        		echo '</tr>';
        	foreach ($filearray as $key=>$value){
        		
        		$insert = $value['id'];
        		$file = $value['filename'];
        		
        		
        		echo '<tr class="file">';
        		echo "<td id='$insert' style='display:none;'>$file</td>";
        		echo "<td><img src='BASE_URL/$file' style=\"width:240px;\"></td>";
        		echo "<td><button class='addTag'>Add Tag</button></td>";
        		echo "<td class='imageTag'></td>";
        		echo "<td class='imageDesc'><textarea name='imagename$insert' id='imagename$insert' class='name' rows='4' cols='30'></textarea></td>";
        		echo "<td class='imageRank'><select name='imagetype$insert' id='imagetype$insert' class='type'><option hidden selected></option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select></td>";

        		
        		echo '</tr>';
        	}
        	echo '</table>';
        	echo '<p>';
        	echo "<button class='addTagAll'> Add tag to all chapters</button>&nbsp;&nbsp;";
        	echo "<button class='save' onclick='fn60sec();'> Save data </button>";
        	echo '</p>';*/

    }

    function deleteImage(imageRowClicked) {


        //get the image id

        console.log(imageRowClicked);

        var imageID = $(imageRowClicked).closest('tr').find('td:eq(0)').attr('id');


        //query = "DELETE FROM `images` WHERE `id` = "+imageID+"";


        var selectorObject = JSONStraightDataQuery(imageID, 'deleteChapter', 9);

        //console.log(selectorObject);

        selectorObject.done(function(data) {

            console.log(data);

            if (data) {


                if (data == 1) {

                    //console.log('now remove the table row');

                    $(imageRowClicked).closest('tr').hide();

                } else {

                    alert(
                        'Chapter not deleted.  Perhaps there are still tags attached.  You cannot delete a chapter until all tags are removed.  Click on tags to remove them.'
                    );

                }

            }


        });

    }

    function showCategoryModal() {

        var selectorObject = getDataQuery('tagCategories', '\`superCategory\` IS NOT NULL', {
            'id': 'id',
            'Focus': 'superCategory',
            'Category Name': 'tagCategoryName'
        }, 2);

        //console.log(selectorObject);

        selectorObject.done(function(data) {

            //console.log(data);

            $('#categoryModal').modal('show');

            //$('#categoryModal').show();




            $('#categoryModal').find('.modalContent').html('<h3>Choose Tag Category</h3>');

            //$('#categoryModal').find('.modalContent').append('<span class="text-white">Quick Links</span> <div class="d-flex flex-wrap"><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 0 ).draw(); window.localStorage.setItem(\'superCategory\', \'0\');" class="btn btn-sm m-1 p-1 btn-primary">' + 'Video Navigation' + '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 1 ).draw(); window.localStorage.setItem(\'superCategory\', \'1\');" class="btn btn-sm m-1 p-1 btn-primary">' + 'Colon Tutor' + '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.column( 1 ).search( 2 ).draw();" class="btn btn-sm m-1 p-1 btn-primary">' + 'Polypectomy Tutor' + '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 3 ).draw();" class="btn btn-sm m-1 p-1 btn-primary">' + 'Imaging in Polypectomy' + '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 4 ).draw();" class="btn btn-sm m-1 p-1 btn-primary">' + 'Other Resection' + '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 5 ).draw();" class="btn btn-sm m-1 p-1 btn-primary">' + 'Other GIEQs topics' + '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 6 ).draw();" class="btn btn-sm m-1 p-1 btn-primary">' + 'Nursing Topics' + '</button><div class="break"></div><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 7 ).draw();" class="btn btn-sm m-1 p-1 btn-primary">' + 'ERCP' + '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 8 ).draw();" class="btn btn-sm m-1 p-1 btn-primary">' + 'EUS' + '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 9 ).draw();" class="btn btn-sm m-1 p-1 btn-primary">' + 'Therapeutic EUS' + '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 10 ).draw();" class="btn btn-sm m-1 p-1 btn-primary">' + 'Complex endoscopic resection' + '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 11 ).draw();" class="btn btn-sm m-1 p-1 btn-primary">' + 'Submucosal endoscopy' + '</button><button onclick="var dt = $(\'#dataTable2\').DataTable().search(\'\').columns().search(\'\').draw();" class="btn btn-sm m-1 p-1 btn-primary">' + 'Reset' + '</button></div>');
            $('#categoryModal').find('.modalContent').append(
                '<span class="text-white">Quick Links</span><div class="d-flex flex-wrap"><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 0 ).draw(); window.localStorage.setItem(\'superCategory\', \'0\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                'Video Navigation' +
                '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 1 ).draw(); window.localStorage.setItem(\'superCategory\', \'1\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                'Colon Tutor' +
                '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.column( 1 ).search( 2 ).draw(); window.localStorage.setItem(\'superCategory\', \'2\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                'Polypectomy Tutor' +
                '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 3 ).draw(); window.localStorage.setItem(\'superCategory\', \'3\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                'Imaging in Polypectomy' +
                '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 4 ).draw(); window.localStorage.setItem(\'superCategory\', \'4\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                'Gastroscopy' +
                '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 5 ).draw(); window.localStorage.setItem(\'superCategory\', \'5\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                'Other GIEQs topics' +
                '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 6 ).draw(); window.localStorage.setItem(\'superCategory\', \'6\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                'Nursing Topics' +
                '</button><div class="break"></div><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 7 ).draw(); window.localStorage.setItem(\'superCategory\', \'7\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                'ERCP' +
                '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 8 ).draw(); window.localStorage.setItem(\'superCategory\', \'8\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                'EUS' +
                '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 9 ).draw(); window.localStorage.setItem(\'superCategory\', \'9\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                'Therapeutic EUS' +
                '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 10 ).draw(); window.localStorage.setItem(\'superCategory\', \'10\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                'Complex endoscopic resection' +
                '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 11 ).draw(); window.localStorage.setItem(\'superCategory\', \'11\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                'Submucosal endoscopy' +
                '</button><button onclick="var dt = $(\'#dataTable2\').DataTable().search(\'\').columns().search(\'\').draw();" class="btn btn-sm m-1 p-1 btn-primary">' +
                'Reset' + '</button></div>');


            $('#categoryModal').find('.modalContent').append('<p>' + data + '</p>');

            $('#categoryModal').find('.modalContent').append(
                '<button class="btn btn-sm bg-primary py-0" id="newTagCategory">Add new tag category</button>'
            );


            var $table = $('#categoryModal').find('#dataTable2');


            //var $table = $("#demo table");
            $table.DataTable({
                "sScrollY": "600px",
                "fnDrawCallback": function(oSettings) {
                    var total_count = oSettings.fnRecordsTotal();
                    var columns_in_row = $(this).children('thead').children('tr').children('th')
                        .length;
                    var show_num = oSettings._iDisplayLength;
                    var tr_count = $(this).children('tbody').children('tr').length;
                    var missing = show_num - tr_count;
                    if (show_num < total_count && missing > 0) {
                        for (var i = 0; i < missing; i++) {
                            $(this).append(' ');
                        }
                    }
                    if (show_num > total_count) {
                        for (var i = 0; i < (total_count - tr_count); i++) {
                            $(this).append(' ');
                        }
                    }
                },
                "pageLength": 20,
            });

            //here set the value

            var superCategory = window.localStorage.getItem('superCategory');
            var dt = $('#dataTable2').DataTable();
            dt.draw();
            dt.column(1).search(superCategory).draw();
            //highlight which one is selected

            waitForFinalEvent(function() {

                $(document).find('.modalContent').find('button').each(function(index) {

                    //console.log(index);

                    if (index == superCategory) {

                        $(this).addClass('gieqsGoldBackground');

                    } else {

                        $(this).removeClass('gieqsGoldBackground');

                    }


                })

            }, 300, 'Highlight SuperCategory');





            //find the nth button
            //highlight






            return;



        })

    }


    function fn60sec() {

        //console.log('fired');

        //!get imageids

        //number
        //name
        //timeFrom
        //timeTo

        var overallObject = new Object();

        var detectedNull = null;

        x = 0;

        var xy = 1;

        $('#imagesTable').find('tr').find('td:eq(1)').find('select').each(function() {

            var xy = 1;

            console.log(this);

            var selectValue = $(this).val();

            //enter null if there is a skip tag


            /* 
                    $(this).parent().parent().find('td:eq(7)').find('button').each(function(){

                        console.log($(this).attr('data'));

                        if ($(this).attr('data') == '90'){

                            xy = null;

                            detectedNull = 1;

                        }

                    })

                    if (xy != null){ */


            selects[x] = selectValue;

            x++;

            /* }else{

                selects[x] = '';

                x++;
            } */


        })

        console.dir(selects);

        x = 0;

        $('#imagesTable').find('tr').find('td:eq(0)').each(function() {

            //console.log(this);

            var fileid = $(this).attr('id');

            images[x] = fileid;

            x++;


        })

        //get array of textareas

        x = 0;

        $('#imagesTable').find('tr').find('td:eq(4)').find('input').each(function() {

            console.log(this);

            var textareaText2 = $(this).val();

            textAreas2[x] = $.trim(textareaText2);

            x++;


        })

        x = 0;

        $('#imagesTable').find('tr').find('td:eq(5)').find('textarea').each(function() {



            var textareaText = $(this).val();

            console.log(textareaText);

            textAreas[x] = $.trim(textareaText);

            x++;


        })



        x = 0;

        $('#imagesTable').find('tr').find('td:eq(2)').find('input').each(function() {

            console.log(this);

            var selectValue = $(this).val();

            selects2[x] = $.trim(selectValue);

            x++;


        })

        x = 0;

        $('#imagesTable').find('tr').find('td:eq(3)').find('input').each(function() {

            console.log(this);

            var selectValue = $(this).val();

            selects3[x] = $.trim(selectValue);

            x++;


        })

        console.dir(images);
        console.dir(textAreas);
        console.dir(selects);
        console.dir(selects2);
        console.dir(selects3);


        //these need the field names

        overallObject['id'] = images;
        overallObject['number'] = selects;
        overallObject['timeFrom'] = selects2;
        overallObject['timeTo'] = selects3;
        overallObject['name'] = textAreas2;
        overallObject['description'] = textAreas;

        console.dir(overallObject);


        var tagsImagesObject = JSONDataQuery('chapter', overallObject, 6); //update new object

        tagsImagesObject.done(function(data) {

            console.log('tagsImagesObject = ' + data);

            if (data) {

                if (data == 1) {

                    $('#messageBox').html('Saved at ' + new Date().toLocaleTimeString('en-GB', {
                        hour: "numeric",
                        minute: "numeric"
                    })).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);;

                }

            }

        })

        //table
        //updateType 6 (not insert)
        //array

        //get array of dropdowns

        //enter this in the field name

        /*
			        
			        imageID = $(cellClicked).closest('tr').find('td:eq(0)').attr('id');
			        
			        var text = $(this).val();
		
					var imagesObject = pushDataAJAX('images', 'id', imageID, 1, {'name':text}); //delete images
		
					imagesObject.done(function (data){
		
						console.log(data);
		
						if (data){
		
							if (data == 1){
		
								//alert ("tag connection deleted");
								console.log('textarea data updated');
								
								//edit = 0;
								//imagesPassed = null;
								//window.location.href = siteRoot + "scripts/forms/imagesTable.php";
								//go to images list
		
							}else {
		
								console.log('textarea data not updated');
		
							//enableFormInputs("images");
		
						    }
		
		
		
						}
		
		
					});
			   */

        // runs every 60 sec and runs on init.
    }
    //!reenable to start timed save
    //setInterval(fn60sec, 60 * 1000);


    function addImageTagAll(event) {
        event.preventDefault();

        //get all the table rows with class file

        //launch the tag modal

        //once tag selected, come back and insert required keys

        //collect the data needed for the tag table	

        //display keys below

    }

    function newChapterRow() {

        //video id]]

        fn60sec();

        query = 'newChapterRow';

        var selectorObject = JSONStraightDataQuery(videoPassed, query, 9);

        selectorObject.done(function(data) {


            location.reload();


        })


        //TODO FIX

        /*
	query = 'newChapterRow';
	
	var selectorObject = JSONStraightDataQuery(videoPassed, query, 9);
	
	//insert into command for database
	
	selectorObject.done(function(data) {
        
            

            //TODO IF THERE IS ONLY ONE ROW DO THE ABOVE

            var noTrs = $('#content').find('tr').length;

            if (noTrs < 2){

                location.reload();

            }else{

 //OTHERWISE

			console.log(data);
		
			var html = '<tr class="file" id="chapter'+data+'">';
			html += "<td id='"+data+"' style='display:none;'></td>";
			//html += "<td><img src='"+siteRoot+"/"+url+"' style=\"width:240px;\"></td>";
			
			
			html += "<td><select name='chapternumber"+data+"' id='chapternumber"+data+"' class='order form-control form-control-sm w-100 px-1 py-0'><option hidden selected>";
			
			var i;
			var notrs = $('#imagesTable').find('tr').length;
			for (i = 1; i <= notrs; i++) {  //actually count no of trs
			    html += "<option value='"+i+"'>"+i+"</option>";
			}
			
			
			html += "</select></td>";
			
			
			
			
			html += "<td><input class='form-control form-control-sm w-100 px-1 py-0' id='chaptertimefrom"+data+"' type='text'></input><br><button class='py-0 my-2 btn btn-small bg-dark' type='button' onclick='getVideoTime("+data+", 0)'> + video time</button><br><button type='button' class='jumpToTime py-0 my-2 btn btn-small bg-dark'>seek video</button><br><button id='previousButton"+data+"' class='py-0 my-2 btn btn-small bg-dark' type='button' onclick='enterPreviousEndTime("+data+", this.id)'> + previous chapter end time</button></td>";
			html += "<td><input class='form-control form-control-sm w-100 px-1 py-0' id='chaptertimeto"+data+"' type='text'><br><button class='py-0 my-2 btn btn-small bg-dark' type='button' onclick='getVideoTime("+data+", 1)'> + video time</button></input><br><button type='button' class='jumpToTime py-0 my-2 btn btn-small bg-dark'>seek video</button></td>";
			
			html += "<td class='chapterDesc'><input class='form-control form-control-sm w-100 px-1 py-0' id='chapterdescription"+data+"'></input></td>";
			
			html += "<td class='chapterDesc'><textarea name='chaptername' id='chaptername"+data+"' class='form-control form-control-sm w-100 px-1 py-0 name' rows='2' cols='70'></textarea></td>";
			
			html += "<td><button class='addTag py-0 my-2 btn btn-small bg-dark'>Add Tag</button></td>";
			html += "<td class='chapterTag' id='tag"+data+"'></td>";

			//html += "<td><select name='imageorder"+image_id+"' id='imageorder"+image_id+"' class='order'><option hidden selected>";
			
			var i;
			for (i = 1; i <= Object.keys(formData).length; i++) { 
			    html += "<option value='"+i+"'>"+i+"</option>";
			}
			
			
			html += "</select></td>";
			//*
			html += "<td class='deleteImage'>&#x2718;</td>";
			html += '</tr>';
			
			var tablePresent = $('#imagesTable').find('tr').length;
			
			if (tablePresent > 0){
			
				$('#imagesTable').find('tr').last().after(html);
				
				$('#content').find("#chapternumber"+data+" option[value='"+notrs+"']").attr('selected', 'selected');
				
			} else {
				
				var html2 = "<table id=\"imagesTable\" class=\"imageTable\">";
				html2 += "<tr>";
				html2 += '<th>Chapter Number</th>';
				html2 += '<th>Time from:</th>';
				html2 += '<th>Time to:</th>';
				html2 += '<th>Description</th>';
				html2 += '<th></th>';
				html2 += '<th>Tags</th>';
				html2 += '<th></th>';
				html2 += '</tr>';
				html2 += '</table>';
				
				
				$("#images").html(html2);
				
				$('#imagesTable').find('tr').last().after(html);
				
				$('#content').find("#chapternumber"+data+" option[value='"+notrs+"']").attr('selected', 'selected');
				
				
			} 

            }

           
		
	})
	
	//use the insert id to 
	
	*/


    }


    function prepareUpload(event) {
        files = event.target.files;
    }



    // Catch the form submit and upload the files
    function uploadFiles(event) {
        event.stopPropagation(); // Stop stuff happening
        event.preventDefault(); // Totally stop stuff happening

        // START A LOADING SPINNER HERE

        disableFormInputs("imageUpload");
        // Create a formdata object and add the files
        var data = new FormData();
        $.each(files, function(key, value) {
            data.append(key, value);
        });

        request = $.ajax({
            url: 'files_upload.php?files',
            type: 'POST',
            data: data,
            cache: false,
            //dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request


            success: function(data, textStatus, jqXHR) {
                if (typeof data.error === 'undefined') {

                    $('#images').html(data);


                    console.log(data);
                    //submitForm(event, data);
                } else {
                    // Handle errors here
                    console.log('ERRORS: ' + data.error);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle errors here
                console.log('ERRORS: ' + textStatus);
                // STOP LOADING SPINNER
            }
        });


    }




    function fillForm(idPassed) {

        disableFormInputs("images");

        imagesRequired = new Object;

        imagesRequired = getNamesFormElements("images");

        imagesString = '`id`=\'' + idPassed + '\'';

        var selectorObject = getDataQuery("images", imagesString, getNamesFormElements("images"), 1);

        //console.log(selectorObject);

        selectorObject.done(function(data) {

            //console.log(data);

            var formData = $.parseJSON(data);


            $(formData).each(function(i, val) {
                $.each(val, function(k, v) {
                    $("#" + k).val(v);
                    //console.log(k+' : '+ v);
                });

            });

            $("#messageBox").text("Editing images id " + idPassed);

            enableFormInputs("images");

        });

        try {

            $("form#images").find("button#deleteimages").length();

        } catch (error) {

            $("form#images").find("button").after("<button id='deleteimages'>Delete</button>");

        }

    }

    function copyVimeoChaptersDatabase() {


        const dataToSend = {

            videoid: videoPassed,
            chapters: chaptersVimeo,

        }


        const jsonString = JSON.stringify(dataToSend);
        console.log(jsonString);

        var request2 = $.ajax({
            url: siteRoot + "../../assets/scripts/classes/generateChaptersVimeo.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request2.done(function(data) {
            // alert( "success" );
            console.dir(data);
            //$(document).find('.Thursday').hide();
        })


    }

    var titleVimeoVideo = $('#titleVimeoVideo').text();
    var descriptionVimeoVideo = $('#descriptionVimeoVideo').text();

    function copyVimeoTitleAndDescription() {


        const dataToSend = {

            videoid: videoPassed,
            title: titleVimeoVideo,
            description: descriptionVimeoVideo,

        }


        const jsonString = JSON.stringify(dataToSend);
        console.log(jsonString);

        var request2 = $.ajax({
            url: siteRoot + "../../assets/scripts/classes/generateTitleVimeo.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request2.done(function(data) {
            // alert( "success" );
            console.dir(data);
            //$(document).find('.Thursday').hide();
        })


    }


    //delete behaviour

    function deleteimages() {

        //imagesPassed is the current record, some security to check its also that in the id field

        if (imagesPassed != $("#id").text()) {

            return;

        }


        if (confirm("Do you wish to delete this images?")) {

            disableFormInputs("images");

            var imagesObject = pushDataFromFormAJAX("images", "images", "id", imagesPassed, "2"); //delete images

            imagesObject.done(function(data) {

                //console.log(data);

                if (data) {

                    if (data == 1) {

                        alert("images deleted");
                        edit = 0;
                        imagesPassed = null;
                        window.location.href = siteRoot + "scripts/forms/imagesTable.php";
                        //go to images list

                    } else {

                        alert("Error, try again");

                        enableFormInputs("images");

                    }



                }


            });

        }


    }

    function updatePreValues() {


        $('.order').each(function() {

            //console.log(this);

            $(this).data('pre', $(this).val());

            //var hello = $(this).data('pre');

            //console.log(hello);

        })



    }

    function submitimagesForm() {

        //pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)

        if (edit == 0) {

            var imagesObject = pushDataFromFormAJAX("images", "images", "id", null, "0"); //insert new object

            imagesObject.done(function(data) {

                //console.log(data);

                if (data) {

                    alert("New images no " + data + " created");
                    edit = 1;
                    $("#id").text(data);
                    imagesPassed = data;
                    fillForm(data);




                } else {

                    alert("No data inserted, try again");

                }


            });

        } else if (edit == 1) {

            var imagesObject = pushDataFromFormAJAX("images", "images", "id", imagesPassed, "1"); //insert new object

            imagesObject.done(function(data) {

                //console.log(data);

                if (data) {

                    if (data == 1) {

                        alert("Data updated");
                        edit = 1;

                    } else if (data == 0) {

                        alert("No change in data detected");

                    } else if (data == 2) {

                        alert("Error, try again");

                    }



                }


            });




        }


    }

    //!video seek functions

    function getVideoTime(chapterid, type) {

        $("#videoChapter").vimeo("getCurrentTime", function(data) {

            //$('#videoTime').html("<p class='p-2'>Current time is "+data+" seconds</p>");

            if (type == 0) { //from

                $('#chaptertimefrom' + chapterid).val(data);

            } else if (type == 1) { //from

                $('#chaptertimeto' + chapterid).val(data);
            }

            console.log("Current time", data);
        })





    }

    function enterPreviousEndTime(chapterid, thisObj) {

        //if chapter 1 say so // PICKUP HERE

        console.log(thisObj);

        //var chapterid = $('#'+thisObj).parent().parent().find('td:eq(0)').attr('id');

        var thisRow = $('#' + thisObj).parent().parent();

        var previousRow = $('#' + thisObj).parent().parent().prev();

        if ($(previousRow).hasClass('file') === true) {



        } else {

            alert('No previous chapter');
            return;

        }

        var time = $(previousRow).find('td:eq(3)').find('input').val();

        console.log(time);

        var intTime = parseFloat(time, 10);

        var newTime = intTime + 0.001;

        if (newTime == NaN) {

            newTime = null;

        }

        $(thisRow).find('td:eq(2)').find('input').val(newTime);







    }

    function jumpToTime(time) {


        $("#videoChapter").vimeo("seekTo", time);

    }

    var chaptersVimeo = new Object;

    function getChaptersFromVimeoAPI() {

        player.getChapters().then(function(chapters) {
            chaptersVimeo = chapters;
            return true;
        }).catch(function(error) {
            // an error occurred
            return false;
        });


    }

    $(document).ready(function() {

        if (edit == 1) {

            constructEditTable(videoPassed);
            $("#messageBox").text("Editing Video " + videoPassed);

        } else {

            $("#messageBox").text("New Video Entry");

        }


        //!modify navbar to include page specific links

        /*     var navBarEntry = '<div class="dropdown"><button class="dropbtn activeButton">Video Creators</button><div class="dropdown-content"><a href="' + siteRoot + 'scripts/forms/videoUploadForm.php">New Video</a><hr><a href="' + siteRoot + 'scripts/forms/videoTable.php">Video Table</a></div></div>';
         */
        /*     $('.navbar').find('.dropdown:eq(3)').after(navBarEntry);
         */


        $('input[type=file]').on('change', prepareUpload);

        $('#loading').bind('ajaxStart', function() {
            $(this).show();
        }).bind('ajaxStop', function() {
            $(this).hide();
        });







        $("#content").on('click', '#submitimages', (function(event) {
            event.preventDefault();
            $('#images').submit();


        }));

        $("#content").on('click', "#submitimagefiles", function() {
            //event=$(this);
            if (files == null) {
                alert('No files selected');
                return;
            } else {
                uploadFiles(event);
            }

        });

        //!Add new tag to single image

        $('.content').on('click', '.addTag', function() {


            event.preventDefault();

            var cellClicked = $(this);

            imageID = $(cellClicked).closest('tr').find('td:eq(0)').attr('id');

            console.log('Chapter id is' + imageID);

            singleTag = 1;

            //$('.darkClass').show();



            var selectorObject = getDataQuery('tagCategories', '\`superCategory\` IS NOT NULL', {
                'id': 'id',
                'Focus': 'superCategory',
                'Category Name': 'tagCategoryName'
            }, 2);

            //console.log(selectorObject);

            selectorObject.done(function(data) {

                //console.log(data);

                $('#categoryModal').modal('show');

                //$('#categoryModal').show();




                $('#categoryModal').find('.modalContent').html(
                    '<div class="container"><h3>Choose Tag Category</h3>');

                $('#categoryModal').find('.modalContent').append(
                    '<span class="text-white">Quick Links</span><div class="d-flex flex-wrap"><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 0 ).draw(); window.localStorage.setItem(\'superCategory\', \'0\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                    'Video Navigation' +
                    '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 1 ).draw(); window.localStorage.setItem(\'superCategory\', \'1\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                    'Colon Tutor' +
                    '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.column( 1 ).search( 2 ).draw(); window.localStorage.setItem(\'superCategory\', \'2\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                    'Polypectomy Tutor' +
                    '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 3 ).draw(); window.localStorage.setItem(\'superCategory\', \'3\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                    'Imaging in Polypectomy' +
                    '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 4 ).draw(); window.localStorage.setItem(\'superCategory\', \'4\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                    'Gastroscopy' +
                    '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 5 ).draw(); window.localStorage.setItem(\'superCategory\', \'5\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                    'Other GIEQs topics' +
                    '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 6 ).draw(); window.localStorage.setItem(\'superCategory\', \'6\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                    'Nursing Topics' +
                    '</button><div class="break"></div><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 7 ).draw(); window.localStorage.setItem(\'superCategory\', \'7\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                    'ERCP' +
                    '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 8 ).draw(); window.localStorage.setItem(\'superCategory\', \'8\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                    'EUS' +
                    '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 9 ).draw(); window.localStorage.setItem(\'superCategory\', \'9\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                    'Therapeutic EUS' +
                    '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 10 ).draw(); window.localStorage.setItem(\'superCategory\', \'10\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                    'Complex endoscopic resection' +
                    '</button><button onclick="var dt = $(\'#dataTable2\').DataTable(); dt.draw(); dt.column( 1 ).search( 11 ).draw(); window.localStorage.setItem(\'superCategory\', \'11\');" class="btn btn-sm m-1 p-1 btn-primary">' +
                    'Submucosal endoscopy' +
                    '</button><button onclick="var dt = $(\'#dataTable2\').DataTable().search(\'\').columns().search(\'\').draw();" class="btn btn-sm m-1 p-1 btn-primary">' +
                    'Reset' + '</button></div>');

                $('#categoryModal').find('.modalContent').append('<p>' + data + '</p>');

                $('#categoryModal').find('.modalContent').append(
                    '<button class="btn btn-sm bg-primary py-0" id="newTagCategory">Add new tag category</button></div>'
                );


                var $table = $('#categoryModal').find('#dataTable2');

                //var $table = $("#demo table");
                $table.DataTable({
                    "sScrollY": "600px",
                    "fnDrawCallback": function(oSettings) {
                        var total_count = oSettings.fnRecordsTotal();
                        var columns_in_row = $(this).children('thead').children(
                            'tr').children('th').length;
                        var show_num = oSettings._iDisplayLength;
                        var tr_count = $(this).children('tbody').children('tr')
                            .length;
                        var missing = show_num - tr_count;
                        if (show_num < total_count && missing > 0) {
                            for (var i = 0; i < missing; i++) {
                                $(this).append(' ');
                            }
                        }
                        if (show_num > total_count) {
                            for (var i = 0; i < (total_count - tr_count); i++) {
                                $(this).append(' ');
                            }
                        }
                    },
                    "pageLength": 20,
                });

                var superCategory = window.localStorage.getItem('superCategory');
                var dt = $('#dataTable2').DataTable();
                dt.draw();
                dt.column(1).search(superCategory).draw();
                //highlight which one is selected

                waitForFinalEvent(function() {

                    $(document).find('.modalContent').find('button').each(function(
                        index) {

                        //console.log(index);

                        if (index == superCategory) {

                            $(this).addClass('gieqsGoldBackground');

                        } else {

                            $(this).removeClass('gieqsGoldBackground');

                        }


                    })

                }, 300, 'Highlight SuperCategory');

                return;



            })

        })

        $('#categoryModal').on('click', '.tagCategoriesrow', function() {

            event.preventDefault();

            var cellClicked = $(this);

            var tagCategoryID = $(cellClicked).closest('tr').find('td:eq(0)').text();

            //console.log('File id is'+fileID);

            //$('.darkClass').show();



            var selectorObject = getDataQuery('tags', 'tagCategories_id =\'' + tagCategoryID +
                '\' ORDER BY\`tagName\` ASC', {
                    'id': 'id',
                    'Tag Name': 'tagName'
                }, 2);

            //console.log(selectorObject);

            selectorObject.done(function(data) {

                //console.log(data);

                $('#categoryModal').modal('show');





                $('#categoryModal').find('.modalContent').html('<h3>Choose Tag</h3>');

                $('#categoryModal').find('.modalContent').append(
                    '<button onclick="showCategoryModal()" class="btn btn-sm m-1 p-1 btn-primary w-25">' +
                    'Return to Base list' + '</button>');

                $('#categoryModal').find('.modalContent').append('<p>' + data + '</p>');

                $('#categoryModal').find('.modalContent').append(
                    '<button id="newTag">Add new tag </button>');

                var $table = $('#categoryModal').find('#dataTable2');

                //var $table = $("#demo table");
                var dt = $table.DataTable({
                    "sScrollY": "600px",
                    "fnDrawCallback": function(oSettings) {
                        var total_count = oSettings.fnRecordsTotal();
                        var columns_in_row = $(this).children('thead').children(
                            'tr').children('th').length;
                        var show_num = oSettings._iDisplayLength;
                        var tr_count = $(this).children('tbody').children('tr')
                            .length;
                        var missing = show_num - tr_count;
                        if (show_num < total_count && missing > 0) {
                            for (var i = 0; i < missing; i++) {
                                $(this).append(' ');
                            }
                        }
                        if (show_num > total_count) {
                            for (var i = 0; i < (total_count - tr_count); i++) {
                                $(this).append(' ');
                            }
                        }
                    },
                    "pageLength": 20,
                });
                dt.order([2, 'asc']).draw();
                /* $table.DataTable({
                    "order": [[ 1, 'desc' ]]
                }); */
                return;



            })

        })

        $('#categoryModal').on('click', '.tagsrow', function() {

            //!commit the tag to the database

            event.preventDefault();

            var cellClicked = $(this);

            var tagID = $(cellClicked).closest('tr').find('td:eq(0)').text();

            //console.log('File id is'+fileID);

            //$('.darkClass').show();

            //collect objects imageID, tagID and insert into imageTags

            //check connections do not already exist

            //query imagesTag for where images_id = imageID and tags_id = tagID

            //3 new tag for matching a row

            if (singleTag == 1) {

                var selectorObject = getDataQuery('chapterTag', '`chapter_id` = ' + imageID +
                    ' and `tags_id` = ' + tagID + '', {
                        '0': 'chapter_id',
                        '1': 'tags_id'
                    }, 3);

                //console.log(selectorObject);
                var alreadyExists;

                selectorObject.done(function(data) {



                    if (data) {

                        console.log('important data is' + data);

                        if (data == 1) {

                            alert('This image tag combination already exists');
                            alreadyExists = 1;
                            $('#categoryModal').modal('hide');

                            // $('.darkClass').hide();

                        } else {

                            alreadyExists = 0;
                        }

                    }

                    if (alreadyExists == 0) {

                        var tagsImagesObject = pushDataAJAX('chapterTag', 'id', '', 0, {
                            'chapter_id': imageID,
                            'tags_id': tagID
                        }); //insert new object

                        tagsImagesObject.done(function(data) {

                            console.log('tagsImagesObject = ' + data);

                            if (data) {

                                if (isNormalInteger(data)) {

                                    //alert ("Tag added");

                                    //add the tag to the table

                                    $('.file').find('td[id=' + imageID + ']').closest(
                                        'tr').find('td:eq(7)').append(
                                        '<button class="tagButton py-0 my-2 btn btn-small bg-dark" id="' +
                                        data + '">' + $(cellClicked).closest('tr')
                                        .find('td:eq(1)').text() + '</button>');

                                    $('#categoryModal').modal('hide');

                                    //$('.darkClass').hide();

                                    return;


                                } else {

                                    alert("Error, try again");

                                }



                            }


                        });

                    }


                })


            } else if (singleTag == 0) {

                //table, outputformat, array containing pairs to insert

                //combine the objects

                //fileList {0: 'id', 1: 'id2'} etc

                //tag same in each case tagID

                var tagImages = new Object();

                $.each(images, function(k, v) {

                    console.log(k);
                    console.log(v);

                    tagImages[k] = {
                        'chapter_id': v,
                        'tags_id': tagID
                    };



                })

                console.dir(tagImages);

                //imageTag = {0 = Object {images_id : id, tags_id : tagID

                var selectorObject = JSONDataQuery('chapterTag', tagImages,
                    4); //check these don't already exist

                //console.log(selectorObject);
                var alreadyExists;

                selectorObject.done(function(data) {



                    if (data) {

                        console.log('important data is' + data);

                        if (data == 1) {

                            alert(
                                'One of these chapters is already tagged with this tag, select individually'
                            );
                            alreadyExists = 1;
                            $('#categoryModal').modal('hide');



                        } else {

                            alreadyExists = 0;
                        }

                    }

                    if (alreadyExists == 0) {

                        var tagsImagesObject = JSONDataQuery('chapterTag', tagImages,
                            5); //insert new object

                        tagsImagesObject.done(function(data) {

                            console.log('tagsImagesObject = ' + data);

                            if (data) {

                                if (data != 0) {

                                    //alert ("Tag added");

                                    var returnedData = $.parseJSON(data);

                                    console.dir(returnedData);

                                    //add the tag to the table rows

                                    var xy = 0;

                                    $('#imagesTable').find('tr').find('td:eq(7)').each(
                                        function() {


                                            $(this).append('<button id="' +
                                                returnedData[xy] +
                                                '" class="tagButton py-0 my-2 btn btn-small bg-dark">' +
                                                $(cellClicked).closest('tr')
                                                .find('td:eq(1)').text() +
                                                '</button>');

                                            xy++;

                                        })



                                    $('#categoryModal').modal('hide');

                                    return;


                                } else {

                                    alert("Error, try again");

                                }



                            }


                        });

                    }

                })

            }

        })


        //!Add new tag to all images uploaded

        $('.content').on('click', '.addTagAll', function() {


            event.preventDefault();

            var cellClicked = $(this);

            //get an array of the required image id's

            //var images = new Object();

            x = 0;

            $('#imagesTable').find('tr').find('td:eq(0)').each(function() {

                //console.log(this);

                var fileid = $(this).attr('id');

                images[x] = fileid;

                x++;


            })

            singleTag = 0;


            console.dir(images);

            $('.darkClass').show();



            var selectorObject = getDataQuery('tagCategories', '\`superCategory\` IS NOT NULL', {
                'id': 'id',
                'Focus': 'superCategory',
                'Category Name': 'tagCategoryName',
            }, 2);

            //console.log(selectorObject);

            selectorObject.done(function(data) {

                //console.log(data);

                $('#categoryModal').modal('show');





                $('#categoryModal').find('.modalContent').html('<h3>Choose Tag Category</h3>');


                $('#categoryModal').find('.modalContent').append('<p>' + data + '</p>');

                $('#categoryModal').find('.modalContent').append(
                    '<button class="py-0 my-2 btn btn-small bg-dark" id="newTagCategory">Add new tag category</button>'
                );

                return;



            })

        })






        $("#content").on('click', '.deleteImage', (function(event) {


            event.preventDefault();

            if (confirm("Do you wish to delete this chapter?")) {
                deleteImage($(this));
            }



        }));

        $("#content").on('click', '.tagButton', (function(event) {

            var button = $(this);

            var tagImageid = $(this).attr('id');

            console.log(tagImageid);

            if (confirm("Do you wish to delete this tag from the video/chapter?")) {

                //disableFormInputs("images");

                var imagesObject = pushDataAJAX('chapterTag', 'id', tagImageid, 2,
                    ''); //delete images

                imagesObject.done(function(data) {

                    console.log(data);

                    if (data) {

                        if (data == 1) {

                            //alert ("tag connection deleted");
                            $(button).remove();

                            //edit = 0;
                            //imagesPassed = null;
                            //window.location.href = siteRoot + "scripts/forms/imagesTable.php";
                            //go to images list

                        } else {

                            alert("Error, tag not deleted. Try again");

                            //enableFormInputs("images");

                        }



                    }


                });

            }


        }));

        $('#categoryModal').on('click', '#newTagCategory', function() {

            $('#categoryModal').modal('hide');

            // $('.darkClass').hide();

            PopupCenter(siteRoot + "scripts/forms/tagCategoriesForm.php", 'New Tag Category', 600, 700);

            //window.open(, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,width=600,height=700");



        })

        $('#categoryModal').on('click', '#newTag', function() {

            $('#categoryModal').modal('hide');

            // $('.darkClass').hide();

            PopupCenter(siteRoot + "scripts/forms/tagsForm.php", 'New Tag', 600, 700);


            //window.open(siteRoot + "scripts/forms/tagsForm.php", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,width=600,height=700");



        })







        $('#content').on('change', '.order', function() {

            //prevents two of the same numbers in order
            var before_change = $(this).data('pre');

            //get value of this order

            orderValue = $(this).val(); //new value of clicked select

            orderid = $(this).attr('id');

            $('.order').each(function() {

                if ($(this).attr('id') != orderid) {


                    if ($(this).val() == orderValue) {

                        $(this).val(before_change);

                        $(this).data('pre', $(this).val());

                    }

                }



            })

            $(this).data('pre', $(this).val());




        })

        //!functions for video timings

        $('.content').on("focusout", "#endTime", (function(event) {

            //event.preventDefault();

            // get the endTime just entered by the user

            var time = $(this).val();

            //find the chapter row

            var chapterRow = $(this).parent().parent();

            //get the next row

            var targetChapterRow = $(chapterRow).next();

            //find the target box startTime within the next row

            var targetBox = $(targetChapterRow).find('.startTime');


            //on the next row insert the same time in the first box

            $(targetBox).val(time);



        }));


        $('#getCurrentVideoChapterTime').on('click', function(event) {

            event.preventDefault();
            $("#videoChapter").vimeo("getCurrentTime", function(data) {

                $('#videoTime').html("<p class='p-2'>Current time is " + data + " seconds</p>");

                $focussed.val(data);

                console.log("Current time", data);
            })


        })

        $('.content').on("click", ".jumpToTime", (function(event) {

            //event.preventDefault();
            var tagRow = $(this).parent().find('input').val();
            //var tagRow = $(this).parent().find(':input').val();
            jumpToTime(tagRow);
            console.log(tagRow);


        }));


        function seekVideo(tagRow) {




            var startTime = $(tagRow).find('input[name="startTime"]').val();
            console.log(startTime);

            jumpToTime(startTime, '#videoTag');


        }

        $('.content').on('click', '.getTitle', function() {

            event.preventDefault();

            $(this).attr('disabled', true);

            if (confirm(
                    'Are you sure you want to import Vimeo title and description data? This will overwrite the existing title and description'
                )) {

                copyVimeoTitleAndDescription();

                waitForFinalEvent(function() {

                    location.reload();


                }, 200, 'Wrapper Video 755422');








            }

            $(this).attr('disabled', false);

        })

        $('.content').on('click', '.importChapters', function() {

            event.preventDefault();

            $(this).attr('disabled', true);

            if (confirm(
                    'Are you sure you want to import Vimeo chapters? This will insert new chapters and potentially disrupt the existing chapter structure.  Only continue if no chapters currently exist'
                )) {

                getChaptersFromVimeoAPI();

                waitForFinalEvent(function() {

                    copyVimeoChaptersDatabase();

                    waitForFinalEvent(function() {

                        location.reload();

                    }, 200, 'Wrapper Video 74');


                }, 200, 'Wrapper Video 7554');








            }

            $(this).attr('disabled', false);

        })


        $('.content').on('click', '.exportChapterSummary', function() {


            event.preventDefault();

            //get, in the modal, a summary of all chapters time (mm:ss, name) on each new line
            //use ajax

            //can just get from page

            //get all tr

            var chapters = [];

            $('#content').find('.file').each(function() {

                var chapterNumber = $(this).find('td:eq(1)').find('.order option:selected')
                    .val();
                var chapterTimeFrom = $(this).find('td:eq(2)').find('input').val();
                var chapterName = $(this).find('td:eq(4)').find('input').val();

                //console.log(chapterNumber);
                //TODO FIX TIMINGS HERE

                //var minutes = Math.floor(chapterTimeFrom / 60);

                //var seconds = ((chapterTimeFrom - (minutes * 60)) / 60) * 100;

                function secondsToHmsReturnMin(d) {
                    d = Number(d);
                    var h = Math.floor(d / 3600);
                    var m = Math.floor(d % 3600 / 60);
                    var s = Math.floor(d % 3600 % 60);

                    var hDisplay = h > 0 ? h + (h == 1 ? " hour, " : " hours, ") : "";
                    var mDisplay = m > 0 ? m + (m == 1 ? " minute, " : " minutes, ") : "";
                    var sDisplay = s > 0 ? s + (s == 1 ? " second" : " seconds") : "";
                    return m;
                }

                function secondsToHmsReturnSec(d) {
                    d = Number(d);
                    var h = Math.floor(d / 3600);
                    var m = Math.floor(d % 3600 / 60);
                    var s = Math.floor(d % 3600 % 60);

                    var hDisplay = h > 0 ? h + (h == 1 ? " hour, " : " hours, ") : "";
                    var mDisplay = m > 0 ? m + (m == 1 ? " minute, " : " minutes, ") : "";
                    var sDisplay = s > 0 ? s + (s == 1 ? " second" : " seconds") : "";
                    return s;
                }

                /* function str_pad_left(string,pad,length) {
                    return (new Array(length+1).join(pad)+string).slice(-length);
                } */

                //var finalTime = str_pad_left(minutes,'0',2)+':'+str_pad_left(seconds,'0',2);

                var minutes = secondsToHmsReturnMin(chapterTimeFrom);

                var seconds = secondsToHmsReturnSec(chapterTimeFrom);

                var finalTime = minutes + ':' + seconds;


                chapters[chapterNumber] = {
                    "name": chapterName,
                    "timeFrom": finalTime,
                };

            });

            console.dir(chapters);

            //for each find start time and end time
            //add to an object

            $('#categoryModal').modal('show');





            $('#categoryModal').find('.modalContent').html('<h3>Chapter Data for Vimeo</h3>');

            $('#categoryModal').addClass('text-center');


            $('#categoryModal').find('.modalContent').append('<p style="text-align:center;">');

            // VERY USEFUL ARRAY ITERATION CODE JAVASCIPT USEFUL

            //THIS TO GET KEYS FROM SECOND ARRAY

            /* for (i=0; i<chapters.length; i++) {
                for (var key in chapters[i]) {
                    if (chapters[i].hasOwnProperty(key)){
                        console.log(chapters[i][key]);

                        $('#categoryModal').find('.modalContent').append(key + ' ' + chapters[i][key]);

                    }
                 }
                //$('#categoryModal').find('.modalContent').append('chapters[i]');
                
            } */

            //THIS TO GET KEYS FROM FIRST ARRAY

            for (i = 0; i < chapters.length; i++) {
                for (var key in chapters[i]) {
                    if (chapters[i].hasOwnProperty(key)) {
                        console.log(chapters[i][key]);

                        $('#categoryModal').find('.modalContent').append('Chapter ' + i + ' ' +
                            chapters[i][key] + '<br/>');

                    }
                }
                //$('#categoryModal').find('.modalContent').append('chapters[i]');

            }

            $('#categoryModal').find('.modalContent').append('</p>');

            //$('#categoryModal').find('.modalContent').append('<button class="py-0 my-2 btn btn-small bg-dark" id="newTagCategory">Add new tag category</button>');

            console.log(chapters);






        })

        //scrolling video code


        //TODO code to fix table width for large columns 
        /* $('#content').find('tr').each(function(){
            
         $(this).find('td:eq(1)').each(function(){

           $(this).css('width', '5%');

         })  
           
           
        }) */

        //2020-05-26 code to enable video status box

        $('#active').change(function(event) {

            //ajax to a script to update

            var active = $(this);


            var selectedStatus = $(this).children("option:selected").val();

            if (selectedStatus == '4') {

                var r = confirm(
                    "Are you sure? This will submit for moderation and lock the video for further editing!"
                );
                if (r == true) {

                    var dataToSend = {

                        active: selectedStatus,
                        videoid: videoPassed,


                    }

                    //const jsonString2 = JSON.stringify(dataToSend);

                    const jsonString = JSON.stringify(dataToSend);
                    console.log(jsonString);
                    //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

                    var request2 = $.ajax({
                        beforeSend: function() {

                            $('#active').removeClass('is-valid');

                        },
                        url: siteRoot + "scripts/updateActive.php",
                        type: "POST",
                        contentType: "application/json",
                        data: jsonString,
                    });



                    request2.done(function(data) {
                        // alert( "success" );
                        if (data == '1') {
                            //show green tick


                            $('#active').delay('1000').addClass('is-valid');
                        }
                        //$(document).find('.Thursday').hide();
                    })

                    request2.complete(function(data) {
                        window.location.href = siteRoot + 'pages/myTagging.php';

                    })

                } else {
                    event.preventDefault();
                    $('#active').removeClass('is-valid');
                    $(this).children("option:selected").val(selectedStatus);

                    //go to my tagging


                    return false;
                }
            } else {


                var dataToSend = {

                    active: selectedStatus,
                    videoid: videoPassed,


                }

                //const jsonString2 = JSON.stringify(dataToSend);

                const jsonString = JSON.stringify(dataToSend);
                console.log(jsonString);
                //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

                var request2 = $.ajax({
                    beforeSend: function() {

                        $('#active').removeClass('is-valid');

                    },
                    url: siteRoot + "scripts/updateActive.php",
                    type: "POST",
                    contentType: "application/json",
                    data: jsonString,
                });



                request2.done(function(data) {
                    // alert( "success" );
                    if (data == '1') {
                        //show green tick


                        $('#active').delay('1000').addClass('is-valid');




                    }
                    //$(document).find('.Thursday').hide();
                })

            }


        })

        $(document).on('click', '.btn', function() {

            $(this).addClass('gieqsGoldBackground');

            $('.btn').not(this).each(function() {

                $(this).removeClass('gieqsGoldBackground');

            })




        })

        $('#tags').select2({
            dropdownParent: $('#newTagModal')
        });

        $(document).on('click', '.addTagSearch', function() {

            event.preventDefault();

            var cellClicked = $(this);

            imageID = $(cellClicked).closest('tr').find('td:eq(0)').attr('id');

            console.log('Chapter id is' + imageID);

            singleTag = 1;

            chapteridstored = null;

            chapteridstored = imageID;

            //define chapter under edit


            $('#newTagModal').modal('show');

            /* waitForFinalEvent(function() {
                $('#tags').select2('open');


            }, 100, 'Wrapper Video 3'); */

        })

        $(document).on('click', '#saveTagChapter', function() {

            event.preventDefault();


            var button = $(this);
            $(this).prop('disabled', true);

            //we have chapter id

            //now also need tagid

            var currentTagid = $(document).find('#newTagModal').children().find('#tags').val();
            var currentTagtext = $(document).find('#newTagModal').children().find('#tags option:selected').text();






            //pass chapter under edit and tag id to ajax

            var dataToSend = {

                chapterid: chapteridstored,
                videoid: videoPassed,
                tagid: currentTagid,


            }

            //const jsonString2 = JSON.stringify(dataToSend);

            const jsonString = JSON.stringify(dataToSend);
            console.log(jsonString);
            //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

            var request2 = $.ajax({
                beforeSend: function() {

                    //$('#active').removeClass('is-valid');

                },
                url: siteRoot + "scripts/saveTagChapter.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request2.done(function(data) {
                // alert( "success" );
                try {

                    var formData = $.parseJSON(data);
                    
                } catch (error) {
                    
                }
                console.dir(formData);
                if (formData.success == true) {
                    //show green tick
                    //alert('working')
                    


                    $('.file').find('td[id=' + chapteridstored + ']').closest(
                                        'tr').find('td:eq(7)').append(
                                        '<button class="tagButton py-0 my-2 btn btn-small bg-dark" id="' +
                                        data.chaptertagid + '">' + currentTagtext + '</button>');


                                    alert('Added tag '+ currentTagtext);
                                    $('#newTagModal').modal('hide');

                                    //$('.darkClass').hide();
                                    //$('#saveTagChapter').prop('disabled', false);

                                    //return;
                                    



                }else{

                    $('#messageArea').css('visibility','visible');


                    $('#newTagModal').find('#messageArea').text(formData.error);

                    setTimeout(function() {
                        $('#messageArea').css('visibility','hidden');

                    }, 2000);

                    

                   


                }
                //$(document).find('.Thursday').hide();
                $('#saveTagChapter').prop('disabled', false);


            })

            
           


        })

        $(document).on('click', '#saveTagChapterNoClose', function() {

event.preventDefault();


var button = $(this);
$(this).prop('disabled', true);

//we have chapter id

//now also need tagid

var currentTagid = $(document).find('#newTagModal').children().find('#tags').val();
var currentTagtext = $(document).find('#newTagModal').children().find('#tags option:selected').text();






//pass chapter under edit and tag id to ajax

var dataToSend = {

    chapterid: chapteridstored,
    videoid: videoPassed,
    tagid: currentTagid,


}

//const jsonString2 = JSON.stringify(dataToSend);

const jsonString = JSON.stringify(dataToSend);
console.log(jsonString);
//console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

var request2 = $.ajax({
    beforeSend: function() {

        //$('#active').removeClass('is-valid');

    },
    url: siteRoot + "scripts/saveTagChapter.php",
    type: "POST",
    contentType: "application/json",
    data: jsonString,
});



request2.done(function(data) {
    // alert( "success" );
    try {

        var formData = $.parseJSON(data);
        
    } catch (error) {
        
    }
    console.dir(formData);
    if (formData.success == true) {
        //show green tick
        //alert('working')
        


        $('.file').find('td[id=' + chapteridstored + ']').closest(
                            'tr').find('td:eq(7)').append(
                            '<button class="tagButton py-0 my-2 btn btn-small bg-dark" id="' +
                            data.chaptertagid + '">' + currentTagtext + '</button>');

                            $('#messageArea').css('visibility','visible');



                        $('#newTagModal').find('#messageArea').text('Added tag '+ currentTagtext);

                        
                        setTimeout(function() {
                            $('#messageArea').css('visibility','hidden');

                        }, 2000);

                        //$('#newTagModal').modal('hide');

                        //$('.darkClass').hide();
                        //$('#saveTagChapter').prop('disabled', false);

                        //return;





    }else{
        $('#messageArea').css('visibility','visible');

        $('#newTagModal').find('#messageArea').text(formData.error);
        
        setTimeout(function() {
                            $('#messageArea').css('visibility','hidden');

                        }, 2000);

    }
    //$(document).find('.Thursday').hide();
    $('#saveTagChapterNoClose').prop('disabled', false);


})





})

document.addEventListener('keydown', logKey);

function logKey(e) {

    
 
    if ((e.code == 'KeyA')){
        

        if (($('#tags').data('select2').isOpen())){
           //e.preventDefault();

        
       
        }else{

            $('#tags').select2('open');
            console.log('a pressed');

        }

        

    }
    //console.log(e.code);

    if ((e.code == 'Enter')){
        

        if (($('#tags').data('select2').isOpen())){
            //e.preventDefault();

            //now save
            $('#saveTagChapterNoClose').trigger('click');
            console.log('enter pressed, tags open');

           
        }else{
            console.log('enter pressed, tags not open');


        }

    }

    if ((e.code == 'KeyC')){
        

        if (($('#newTagModal').hasClass('show')) && !($('#tags').data('select2').isOpen())){
           // e.preventDefault();

            //now save

            console.log('c pressed');
            //$('#saveTagChapterNoClose').trigger('click');
            $('#newTagModal').modal('hide');
        }

    }
 
    //log.textContent += ` ${e.code}`;
}



$(document).on('click', '#openTagManager', function() {

    PopupCenter(siteRoot+'scripts/forms/tagsTable.php', 'TagManager', 1000,800);
    
})

$(document).on('click', '#openNewTag', function() {

PopupCenter(siteRoot+'scripts/forms/tagsForm.php', 'New Tag', 1000,800);

})

$(document).on('click', '#openNewCategory', function() {

PopupCenter(siteRoot+'scripts/forms/tagCategoriesForm.php', 'New Tag Categories', 1000,800);

})

$(document).on('click', '#openCategorySelect', function() {

    $('#newTagModal').modal('hide');


})


    })
    </script>
    <?php
		
		    // Include the footer file to complete the template:
		    include(BASE_URI . "/includes/footer.html");
		
		
		
		
		    ?>
</body>

</html>