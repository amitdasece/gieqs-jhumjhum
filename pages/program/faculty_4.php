<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>


<head>

<?php

//define user access level

$openaccess = 1;

require BASE_URI . '/headNoPurposeCore.php';

?>

<!--Page title-->

    <title>GIEQs IV faculty</title>
    <meta charset="utf-8">
 <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Discover the world-leading faculty we have invited for GIEQs IV">
    <meta name="author" content="David Tate">
    <meta name="keywords" content="colonoscopy, gastroscopy, ERCP, quality, polyp, colon cancer, polypectomy, EMR, endoscopic imaging, colorectal cancer, endoscopy, gieqs, GIEQS, training, digital endoscopy event, digital symposium, ghent, gent, endoscopy quality, quality in endoscopy">
 
  
    <style>

        .header, .navbar, .navbar-top {
            transition: none !important;
        }

        .bg-dark{
            background-color: #162e4d !important; 
        }

        .logo {
            width: 100%;
        }

        .gieqsGold {
            color: rgb(238, 194, 120);
        }

    @media screen and (max-width: 400px) {


        .scroll {

            font-size: 1em;

        }

        .h5 {

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

       <?php $symposium_nav_active = [

0 => '', //news
1 => '', //individual reg
2 => '', //group reg
3 => '', //program
4 => 'gieqsGold', //faculty
5 => '', //register now



];

require_once BASE_URI . '/assets/scripts/classes/symposium_manager.class.php';
$symposium_manager = new symposium_manager;


require BASE_URI . '/pages/learning/includes/nav_symposium_4.php';?>


    </header>
    <!-- Omnisearch -->
   
    <div class="main-content">

        <!-- Header (v1) -->
        <section class="pt-8">
        </section>

    <!-- 

    setup a query for all GIEQs IV faculty split by type
    use foreach loop


     -->




        <!-- Sponsors -->

        <!-- Team 1 -->

    <?php
//loda faulty
//get_faculty_symposium($edition, $type)

//print_r($international=$symposium_manager->get_faculty_symposium('4', '2'));

$faculty_title_key = [

    1=>'Consultant Gastroenterologist', 2=>'Consultant Surgeon', 3=>'Consultant Hepatologist',  4=>'Consultant Interventional Endoscopist', 5=>'Trainee Endoscopist', 6=>'Consultant Radiologist', 7=>'Consultant Oncologist', 8=>'Nurse',


];

$type_key = [

    1=>'Organising Committee', 2=>'International Faculty', 3=>'National Faculty',  4=>'Local Faculty',



];



?>


        <div id="team-team-1" title="the GIEQs faculty">
            <section class="slice bg-gradient-dark slice-lg">
                <div class="container">
                    <div class="mb-5 text-center">
                        <h1 class="mt-7">The GIEQs faculty</h1>
                        <div class="fluid-paragraph mt-3">
                            <p class="lead lh-150">With a stellar international faculty the fourth edition of GIEQs
                                promises to be a launch-pad for innovative thinking in everyday endoscopic practice.</p>
                                <p class="lead lh-150">Click on the faculty member to view their bio.</p>
                        </div>
                        <a href="<?php echo BASE_URL;?>/pro-content/175&action=register" class="btn btn-fill-gieqsGold btn-lg my-2" role="button">Register Now!</a>


                    </div>

                    <?php


                    foreach ($type_key as $key1=>$value1){

echo '<div class="mb-5 text-left">';
echo '<h3 class=" mt-4" style="color: rgb(238, 194, 120);">' . $value1 . '</h3>';
echo '<div class="row row-grid">';

$this_data = null;
$this_data = $symposium_manager->get_faculty_symposium('4', $key1);

foreach ($this_data as $key=>$value){

    $bio = null;
    $bio = htmlspecialchars($value['bio']);

    echo "<div class=\"col-lg-3 py-3\">";
    echo "  <div data-animate-hover=\"2\">";
    echo "    <div class=\"animate-this\">";
    echo "      <a class=\"cursor-pointer faculty-bio-link\" data-name=\"{$value['title']} {$value['firstname']} {$value['surname']}\" data-bio=\"{$bio}\" title=\"Show Bio for {$value['title']} {$value['firstname']} {$value['surname']}\">";
    echo "        <img";
    echo "          alt=\"{$value['title']} {$value['firstname']} {$value['surname']}\"";
    echo "          class=\"img-fluid rounded shadow\"";
    echo "          src=\"../../assets/img/uploads/{$value['image_url']}\"";
    echo "        />";
    echo "      </a>";
    echo "    </div>";
    echo "    <div class=\"mt-3\">";
    echo "      <h5 class=\"gieqsGold card-title mb-0\">{$value['title']} {$value['firstname']} {$value['surname']}</h5>";
    echo "      <p class=\"text-muted mb-0\">{$faculty_title_key[$value['title_printed']]}</p>";
    echo "      <p class=\"text-muted mb-0\">{$value['institution']}</p>";
    echo "      <p class=\"text mb-0\">Focus: {$value['focus']}</p>";
    echo "    </div>";
    echo "  </div>";
    echo "</div>";
    echo "";



}

echo '</div>';
echo '</div>';

}

?>

                  
        </section>
    </div>

    </div>

    <div class="modal modal-new" id="modal_success" tabindex="-1" role="dialog" aria-labelledby="modal-new"
    aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h6" id="modal_title_6">GIEQs' Faculty Bios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="py-3 text-left">
                <h3 id="faculty-bio-name"></h3>
                  <p id="faculty-bio"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</button>

              

            </div>

            
        </div>
    </div>

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <script src="../../assets/js/purpose.core.js"></script> 
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>    <!-- Page JS -->
   <script src="../../assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <!-- Google maps -->
    <!-- Purpose JS -->
    <!-- Demo JS - remove it when starting your project -->


    <script>
    $(document).ready(function() {

        $('.faculty-bio-link').click(function(){

            var name = $(this).attr('data-name');
            var bio = $(this).attr('data-bio');

            $('#faculty-bio-name').text(name);

            if (bio == ''){

                $('#faculty-bio').html('No bio yet');

            }else{
                $('#faculty-bio').html(bio);
            }

            $('.modal-new').modal('show');




        })


    })
    </script>
</body>

</html>
