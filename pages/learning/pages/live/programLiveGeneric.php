

<?php require '../../../../assets/includes/config.inc.php';?>

<head>
<?php

//define user access level

$openaccess = 0;
$requiredUserLevel = 6;


require BASE_URI . '/headNoPurposeCore.php';



?>
    <title>Ghent International Endoscopy Symposium - Live Programme</title>
  
    <style>
        .text-gieqsGold {

color: rgb(238, 194, 120);

               }
               #navbar-main{

z-index: 9999;
}
               .bg-gieqsGold {

background-color: rgb(238, 194, 120);

}
      .modal-backdrop
      {
          opacity:0.75 !important;
      }
      @media screen and (max-width: 400px) {
        
        
        .scroll{

          font-size: 1em;

          }

          .h5{

          font-size: 1em;
          }

          .tiny {
          font-size: 0.75em;

          }

          .btn {

            padding: 0.25rem 1.00rem;
            margin-bottom: 0.75rem;
          }
      }
    

    </style>
</head>

<body>
    <header class="header header-transparent" id="header-main">
        <!-- Topbar -->

        <?php require BASE_URI . '/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/nav.php';?>


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

/* exit if no assetid provided */

if (!isset($assetid)){
    ?>
<div class="main-content container mt-10">

    <?php            
    echo 'This page requires an asset id';
    echo '<br/><br/>Return <a href="' . BASE_URL .  '/pages/learning/">home</a>';
    //redirect_user(BASE_URL . '/pages/learning/');
    die();
}


/* determine access */


$access = null;

$access = $assetManager->is_assetid_covered_by_user_subscription($assetid, $userid, false);

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

//check asset is currently active

      /* load the asset */

if ($assets_paid->Return_row($assetid)){

    $assets_paid->Load_from_key($assetid); 

}else{

    if ($debug){

        $log[] =  'issue loading the asset';
    }

}

/* define the page variables */

$page_title = $assets_paid->getname();
$page_description = $assets_paid->getdescription();
$videoset = null;
$programmeid = $assetManager->getProgrammeidAsset($assetid);
//print_r($programmeid);




$gieqsDigital = false;  //?remove

//new program

if ($assets_paid->getasset_type() == '2' || $assets_paid->getasset_type() == '3'){

//continue

}else{

echo 'Asset must be a course.  Please contact the system administrator';
die();

}

?>

    </header>
    
    <?php $livepage = 'GIEQs Livestream - Programme';?>
    <?php require (BASE_URI . '/pages/learning/pages/live/liveNav.php');?>
    <div class="main-content bg-gradient-dark">

  
  
    <?php 


?>
    

        

        <!-- PROGRAM TABLE -->

        <section >
            <div class="container">
                <!-- <div class="row text-center">

                    <div class="col-12 p-3 pb-5">
                        <span class="h1" style="color: rgb(238, 194, 120);">Ghent International Endoscopy Quality
                            Symposium <br /> Edition I. <br/>Live Scientific Programme</span>
                    </div>

                </div> -->
               <!--  <div class="row text-center">

                    <div class="col-12 p-3 pb-5 mt-5">
                       
                        <a href="#targetScrollProgramme" id="wednesday"
                            class="btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mr-3 scroll-me">
                            <span class="btn-inner--text text-dark">Wed 7 Oct</span>
                        </a>
                        <a href="#targetScrollProgramme" id="thursday" class="btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mr-3 scroll-me">
                            <span class="btn-inner--text text-dark">Thurs 8 Oct</span>
                        </a>
                    </div>

                </div> -->

<!--                 <hr id="targetScrollProgramme" class="divider divider-fade" />
 -->

                <div class="pt-6" id="ajaxWed">

                </div>

                

            </div>
            </section>
            </div>

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- Page JS -->
    <!-- Purpose JS -->
    <!-- Demo JS - remove it when starting your project -->

    <script src="<?php echo BASE_URL;?>/assets/js/purpose.core.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>

<script src="<?php echo BASE_URL;?>/assets/libs/select2/dist/js/select2.min.js"></script>
<!-- <script src="<?php //echo BASE_URL;?>/assets/js/purpose.js"></script>
 --><script src="<?php echo BASE_URL;?>/assets/js/generaljs.js"></script>
<script src="<?php echo BASE_URL;?>/node_modules/jquery-validation/dist/jquery.validate.js"></script>



    <script>


    function refreshProgrammeView() {



    const dataToSend = {

        programmeid: <?php echo $programmeid[0];?> ,

    }

    const jsonString = JSON.stringify(dataToSend);
    console.log(jsonString);

    var request2 = $.ajax({
        url: siteRoot + "assets/scripts/classes/generateProgrammeCurrent.php",
        type: "POST",
        contentType: "application/json",
        data: jsonString,
    });



    request2.done(function (data) {
        // alert( "success" );
        $('#ajaxWed').html(data);
        //$(document).find('.Thursday').hide();
    })
    }

    $(document).ready(function() {

        refreshProgrammeView();

        

        $(document).on('click', '#wednesday', function() {

            $(document).find('.Wednesday').show();
            $(document).find('.Thursday').hide();

        })

        $(document).on('click', '#thursday', function() {

            $(document).find('.Thursday').show();
            $(document).find('.Wednesday').hide();

        })

    })
    </script>
</body>

</html>