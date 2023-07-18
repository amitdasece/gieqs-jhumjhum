

<?php require '../../includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      //$openaccess = 1;
      $requiredUserLevel = 1;


      require BASE_URI . '/head.php';

      $general = new general;

      $navigator = new navigator;

      //$userFunctions = new userFunctions;

      ?>

    <!--Page title-->
    <title>GIEQs Online Endoscopy Trainer - Polypectomy Imaging Videos</title>

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
        $requiredTagCategories = ['71', '72', '73', '74', '75', '76', '92', '103', '84'];

        ?>

        <div id="requiredTagCategories" style="display:none;"><?php echo json_encode($requiredTagCategories);?></div>

       

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
            <div class="h1 mr-auto">Page Creator</div>
            <nav aria-label="breadcrumb" class="align-self-center">
                                <ol class="breadcrumb breadcrumb-links p-0 m-0">
                                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL . '/pages/learning/index.php'?>">GIEQs online</a></li>
                                    <li class="breadcrumb-item gieqsGold">Page Creator</a></li>
                                </ol>
                            </nav>
    
        </div>
    <div class="d-flex align-items-end container">

    </div>


        <!--Navigation-->

    


        <!--Video Display-->


    <div class="container mt-6">
    <div class="session-body">
                                <form id="session-form">
                                    <div class="form-group">
                                    <!-- EDIT -->

                                    <label for="access_level">access_level</label>
                                        <div class="input-group mb-3">
                                            <select id="access_level" type="text" data-toggle="select" class="form-control" name="access_level">
                                            <option value="" selected disabled hidden>select</option>
                                            
                                            <?php if ($isSuperuser){
                                                if ($isSuperuser == 1){?>

                                                <option value="1">1 - Superuser</option>
                                                <option value="2">2 - Content Creator</option>

                                            <?php    }
                                            }?>
                                            
                                            <option value="3">3 - Staff member</option>
                                            <option value="4">4 - GIEQs pro</option>
                                            <option value="5">5 - GIEQs standard</option>
                                            <option value="6">6 - GIEQs basic</option>
                                            <?php if ($isSuperuser){
                                                if ($isSuperuser == 1){?>

                                    <option value="9">9 - Inactive user (cannot login)</option>

                                            <?php    }
                                            }?>
                                            
                                            </select>
                                        </div>
                                    
                                    

                                        <label for="title">Page Title</label>
                                        <div class="input-group mb-3">
                                            <textarea id="title" type="text" class="form-control" name="title"></textarea>
                                        </div>

                                        
                                        <label for="description">Page description</label>
                                        <div class="input-group mb-3">
                                            <textarea id="description" class="form-control" name="description"></textarea>
                                        </div>

                                        <label for="tagCategories">Categories (searchable)</label>
                                        <div class="input-group mb-3">
                                            <select id="tagCategories" data-toggle="select" class="form-control tagCategories" name="tagCategories" multiple>
                                            <!--TODO get centres from AJAX-->
                                            <!--or direct from PHP-->
                                            <?php echo $navigator->generateTagCategoryOptions();?>

                                            
                                            </select>
                                        </div>

                                        <label for="videos">Individual videos (searchable)</label>
                                        <div class="input-group mb-3">
                                            <select id="videos" type="text" data-toggle="select" class="form-control tagCategories" name="videos" multiple>
                                            <!--TODO get centres from AJAX-->
                                            <!--or direct from PHP-->
                                       
                                            <?php echo $navigator->generateSimplePageOptions();?>

                                            
                                            </select>
                                        </div>

                                        



                                    </div>
                                </form>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                                    <p class="text-muted text-sm">Data entered here will change the live site</p>
                                    <?php echo $navigator->generateSimplePageOptions();?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="submit-page-form btn btn-sm btn-success">Save</button>
                                <button type="button" class="btn btn-sm btn-danger"
                                    data-dismiss="modal">Cancel</button>
                            </div>

    </div>

    <div class="text-muted code-display"></div>



   
   
    

       
    </div>



    
    <!-- Modal -->
    

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="assets/js/purpose.core.js"></script> -->
    <!-- Page JS -->
     <!-- Google maps -->
    
    <!-- Purpose JS -->
    <script src=<?php echo BASE_URL . "/assets/js/purpose.js"?>></script>
    <!-- <script src=<?php echo BASE_URL . "/assets/js/generaljs.js"?>></script> -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.css">
    <script src="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>
    <script>
    var videoPassed = $("#id").text();
                    </script>

    <script src=<?php echo BASE_URL . "/pages/learning/includes/social.js"?>></script>

    <script>
        
        //the number that are actually loaded
     
        $(document).ready(function () {

            $('[data-toggle="select"]').select2({

//dropdownParent: $(".modal-content"),
//theme: "bootstrap",

});

$('.tagCategories').select2({

multiple: true,
minimumResultsForSearch: 1,

})

$(document).on('click', '.submit-page-form', function(){

/* 
if (loading){
    return;
}
 */
var tagCategories = [];

$("#tagCategories option:selected").each(function()
{
    tagCategories.push($(this).val());
});

var videos = [];

$("#videos option:selected").each(function()
{
    videos.push($(this).val());
});

const dataToSend = {

    access_level: $('#access_level').val(),
    title: $('#title').val(),
    description: $('#description').val(),
    tagCategories: tagCategories,
    videos: videos,

    }

    const jsonString = JSON.stringify(dataToSend);
    console.log(jsonString);



    var request = $.ajax({
        url: siteRoot + "assets/scripts/generatePageLearning.php",
        type: "POST",
        contentType: "application/json",
        data: jsonString,
    });



    request.done(function (data) {

        

    if (data){

        Swal.fire({
        title: 'Result',
        text: 'Page creation completed',
        type: 'success',
        background: '#162e4d',
        confirmButtonText: 'ok',
        confirmButtonColor: 'rgb(238, 194, 120)',

        })

        $('.code-display').html(data);
    }

    })





})

            
            


           
           

         


        })
    </script>
</body>

</html>