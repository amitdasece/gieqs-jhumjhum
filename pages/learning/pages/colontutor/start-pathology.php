

<?php require '../../includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      //$openaccess = 1;
      $requiredUserLevel = 6;


      require BASE_URI . '/headNoPurposeCore.php';

      $general = new general;

      $navigator = new navigator;

      $users = new users;

      $page_title = "Introduction to Managing Pathology";

      ?>

    <!--Page title-->


    <title>GIEQs Online Endoscopy Trainer - <?php echo $page_title;?></title>

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">


    <style>
       
        .gieqsGold {

            color: rgb(238, 194, 120);


        }

        .card-placeholder{

            width: 344px;

        }

        .break {
  flex-basis: 100%;
  height: 0;
}

.flex-even {
  flex: 0 0 30%;
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
    height:250px;
}

.card-placeholder{

    width: 204px;

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
        if ($liveAccess){

            $requiredArray = ['23', '25', '29', '30', '31'];
    
            //print_r($requiredArray);
    
            //print_r($liveAccess);
    
            
            $gieqsDigital = (count(array_intersect($liveAccess, $requiredArray))) ? true : false;
    
            //if (in_array($liveAccess, 25)){
            
        }
				    
                        
                        
		
        ?>
        
        <!-- load all video data -->

        <div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>

        <!--- specifiy the tag Categories required for display  CHANGEME-->

        <?php
        $requiredTagCategories = ['47'];
        $requiredVideos = ['104', '105', '72'];

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

        <!--Header CHANGEME-->

    <div class="d-flex flex-wrap container pt-10 mt-5">
        <div class="h1 mr-auto"><?php echo $page_title;?></div>
       <!--  <div class="w-50"><?php //require(BASE_URI . '/pages/learning/pages/account/memberCard.php');?></div> -->
   

    </div>
    <p class="h3 gieqsGold container "></p>

    <div class="d-flex align-items-end container">
        <p class="text-muted pl-4 mt-2"></p>

    </div>


        <!--Navigation-->

    <div id="navigationZone">
    <?php //require(BASE_URI . '/pages/learning/includes/navigation.php'); ?>
    </div>
    


        <!--Video Display-->


    <div class="container mt-4 pb-6">
        <div id="videoCards" class="flex-wrap">
            

            <div class="d-flex align-items-center">
                <strong>Loading...</strong>
                <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
              </div>
            
  


        </div>

    </div>



   
   
    

       
    </div>



    
    <!-- Modal -->
    

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="assets/js/purpose.core.js"></script> -->
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.core.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>
    <!-- Page JS -->
    
    <!-- Google maps -->
    
    <!-- Purpose JS -->
   
    <script src=<?php echo BASE_URL . "/assets/js/generaljs.js"?>></script>
    <script>
    var videoPassed = $("#id").text();
                    </script>

    <script src=<?php echo BASE_URL . "/pages/learning/includes/social.js"?>></script>

    <script>
        
        //the number that are actually loaded
        var loaded = 1;

        //the number the user wants
        var loadedRequired = 1;

        var firstTime = 1; var activeStatus = 1;

        var requiredTagCategoriesText = $("#requiredTagCategories").text();

        var requiredTagCategories = JSON.parse(requiredTagCategoriesText);
        
        var requiredVideosText = $("#requiredVideos").text();

        var requiredVideos = JSON.parse(requiredVideosText);


        function refreshNavAndTags(){

            var screenTop = $(document).scrollTop();

            //console.log(top);

            var tags = [];

                $('.tag').each(function(){

                    if ($(this).is(":checked")){
                        tags.push($(this).attr('data'));
                    }


                })

                

                //push how many loaded, use loaded variable

                console.dir(tags);

                /*var key = $(this).attr('data');

				const dataToSend = {

					key: key,

				}*/var dataToSend = {

                    tags: tags,
                    requiredTagCategories: requiredTagCategories,
                    requiredVideos: requiredVideos,
                    active: activeStatus,

                    }

                    //const jsonString2 = JSON.stringify(dataToSend);

				const jsonString = JSON.stringify(dataToSend);
				////console.log(jsonString);
				//console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

				var request2 = $.ajax({
					beforeSend: function () {

                        $('#videoCards').html("<div class=\"d-flex align-items-center\"><strong>Loading...</strong><div class=\"spinner-border ml-auto\" role=\"status\" aria-hidden=\"true\"></div></div>");
                        //for each tags array push the badges to the tags shown area
                        var html = '';
                        $.each(tags, function(k,v){

                            //HERE WE HAVE THE TAGID
                            
                            var tagid = v;

                            //get the name and category

                            var tagName = $('body').find('#navigationZone').find('#tag'+v).siblings().text();

                            var tagCategory = $('body').find('#navigationZone').find('#tag'+v).parent().parent().parent().parent().find('span').text();

                            html += '<span class="badge bg-gieqsGold text-dark mx-2 my-2 tagButton" data="'+v+'">'+tagCategory+ ' / ' +tagName+' <i style="float:right;" class="fas fa-times removeTag cursor-pointer ml-1" data="'+v+'"></i></span>';

                        });
                        $('body').find('#navigationZone').find('#shown-tags').html(html);

					},
					url: siteRoot + "/pages/learning/scripts/getNavv2.php",
					type: "POST",
					contentType: "application/json",
					data: jsonString,
				});



				request2.done(function (data) {
                    // alert( "success" );
                    if (data != '[]'){
                        var toKeep = $.parseJSON(data.trim());
                        //alert(data.trim());
                        console.dir(toKeep);
                        
                             
                            $('.tag').each(function(){

                                var tagid = $(this).attr('data');

                                if (toKeep.indexOf(tagid) > -1){

                                    $(this).attr('disabled', false);

                                }else{

                                    $(this).attr('disabled', true);
                                }

                            })    

                      
                    }
					//$(document).find('.Thursday').hide();
                })
                
                request2.then(function (data) {
                    var tags = [];

                    $('.tag').each(function(){

                        if ($(this).is(":checked")){
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
                        gieqsDigital: '<?php echo $gieqsDigital;?>',


                    }

                    const jsonString2 = JSON.stringify(dataToSend);

                  

                    
                    const jsonString = JSON.stringify(tags);

                    console.dir(jsonString2);


                    var request3 = $.ajax({
					beforeSend: function () {


					},
					url: siteRoot + "/pages/learning/scripts/getVideosSimple.php",
					type: "POST",
					contentType: "application/json",
					data: jsonString2,
                    });
                    request3.done(function (data) {
                    // alert( "success" );
                    if (data){
                        //var toKeep = $.parseJSON(data.trim());
                        //alert(data.trim());
                        //console.dir(toKeep);

                        $('#videoCards').html(data);
                        $('body').find('#itemCount').each(function(){

                            var count = $('body').find('.individualVideo').length;
                            $(this).text(count);


                        })


                        if (firstTime == 1){
                        $('body').on('click', '#loadMore', function () {

                        loadedRequired = loadedRequired + 1;

            
                        refreshNavAndTags();

                        })
                        }

                        

                        if (firstTime > 1 && loadedRequired > 1){

                                var loadedRequiredMultiple = ((loadedRequired-1) * 10)-3;

                                //console.log(loadedRequiredMultiple);

                                //scroll to current level

                            
                                $("body,html").animate(
                                {
                                    scrollTop: $('body').find('.individualVideo:eq('+loadedRequiredMultiple +')').offset().top
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

        $(document).ready(function () {

            

            refreshNavAndTags();

            $('#refreshNavigation').click(function(){


                firstTime = 1;
                 //the number that are actually loaded
                loaded = 1;

                //the number the user wants
                loadedRequired = 1;
                
                $('.tag').each(function(){

                    if ($(this).is(":checked")){
                        
                        $(this).prop('checked', false);
                    }


                })

                refreshNavAndTags();

            })

            //on load check if any are checked, if so load the videos

            //if none are checked load 10 most recent videos for these categories

            $('.tag').click(function(){

                refreshNavAndTags();

            })

            $('body').on('click', '.removeTag', function(){

                var tagToRemove = $(this).attr('data');
                //remove the check from the tag removed

                $('.tag').each(function(){

                if ($(this).attr("data") == tagToRemove){
                    
                    $(this).prop('checked', false);

                }


                })


                refreshNavAndTags();

            })
            //active behaviour

            $('body').on('change', '#active', function(){

                var active = $(this).children("option:selected").val();
                //remove the check from the tag removed

                activeStatus = active;

                refreshNavAndTags();

            })

            


           
           

         


        })
    </script>
</body>

</html>