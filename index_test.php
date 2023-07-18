<?php 

require 'assets/includes/config.inc.php';?>

<?php 
/* Short and sweet */
define('WP_USE_THEMES', false);
spl_autoload_unregister ('class_loader');



require(BASE_URI . '/assets/wp/wp-blog-header.php');

spl_autoload_register ('class_loader');
//get_header(); 
?>


<head>

    <?php

      //define user access level

      $openaccess = 1;

      require BASE_URI . '/head.php';

      ?>


    <!--META DATA-->
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>The Gastrointestinal Quality and Safety (GIEQs) Foundation</title>
    <meta name="description"
        content="The Gastrointestinal Quality and Safety (GIEQs) Foundation is a not-for profit organisation dedicated to improving quality and safety in everyday endoscopic practice.">
    <meta name="author" content="David Tate">
    <meta name="keywords"
        content="colonoscopy, gastroscopy, ERCP, quality, polyp, colon cancer, polypectomy, EMR, endoscopic imaging, colorectal cancer, endoscopy, gieqs, GIEQS, training, digital endoscopy event, digital symposium, ghent, gent, endoscopy quality, quality in endoscopy">

    <!--Page title-->

    <style>
    .gieqsGold {

        color: rgb(238, 194, 120);

    }

    .pointer {

        cursor: pointer;

    }

    @import url(https://fonts.googleapis.com/css?family=Lato:700);

    .box {
        position: relative;
        max-width: 600px;
        width: 90%;
        height: 400px;
        background: #fff;
        box-shadow: 0 0 15px rgba(0, 0, 0, .1);
    }

    /* common */
    .ribbon {
        width: 150px;
        height: 150px;
        overflow: hidden;
        position: absolute;
    }

    .ribbon::before,
    .ribbon::after {
        position: absolute;
        z-index: -1;
        content: '';
        display: block;
        border: 5px solid #2980b9;
    }

    .ribbon span {
        position: absolute;
        display: block;
        width: 225px;
        padding: 15px 0;
        background-color: #3498db;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        color: #fff;
        font: 700 18px/1 'Lato', sans-serif;
        text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
        text-transform: uppercase;
        text-align: center;
    }



    /* top right*/
    .ribbon-top-right {
        top: -10px;
        right: -10px;
    }

    .ribbon-top-right::before,
    .ribbon-top-right::after {
        border-top-color: transparent;
        border-right-color: transparent;
    }

    .ribbon-top-right::before {
        top: 0;
        left: 0;
    }

    .ribbon-top-right::after {
        bottom: 0;
        right: 0;
    }

    .ribbon-top-right span {
        left: -25px;
        top: 30px;
        transform: rotate(45deg);
    }

    @media (min-width: 768px) {

        #twitter {

            max-width: 40%;

        }
    }
    </style>


</head>

<body>
    <header class="header header-transparent" id="header-main">

        <!-- Topbar -->

        <?php require 'topbar.php';?>

        <!-- Main navbar -->

        <?php require 'nav.php';?>



        <?php
//set the variable to launch the registration pop-up

//print_r($_GET);

$debug = false;

if (isset($_GET['signup'])) {

    $signup = $_GET['signup'];

}

echo '<div id="signup" style="display:none;">' . $signup . '</div>';

//date stuff

                                    $now = $currentTime;


                                    $sessionTimeFrom = new DateTime('2020-10-08 19:30:00', $serverTimeZone);
                                    $startdate = $sessionTimeFrom;

                                    

                                    if ($debug){

                                        echo 'comparing start date ';
                                        print_r($startdate);
            
                                        echo 'with current time';
                                        print_r($currentTime);
                                    }

                                    $current = false;
                                    $past = false;

                                

                                    if($startdate <= $now) {
                                        $past = true;
                                        
                                    }else{
                                        $past = false;
                                    }

                                    if ($debug){

                                        echo 'SESSION is ';
                                        if ($past == true){

                                            echo 'past';
                                        }

                                        if ($past == false){

                                            echo 'not past';
                                        }

                                        if ($current == false){

                                            echo 'not current';
                                        }

                                        if ($current == true){

                                            echo 'current';
                                        }

                                        echo PHP_EOL;
                                    }

                                    

?>


    </header>


    <div class="main-content">
    <section class="slice delimiter-bottom mb-2 p-2 mt-10" id="GIII">
    <div class="blog-container container pt-0 pt-lg-0">
 



<?php
$mypages = get_pages( array( 'include' => '87') );

foreach( $mypages as $page ) {		
	$content = $page->post_content;
	if ( ! $content ) // Check for empty page
		continue;

	$content = apply_filters( 'the_content', $content );
?>
	<div class="entry"><?php echo $content; ?></div>
<?php
	}	
?>




                                </div>
                                </div>
                                </div>


   



        <?php require(BASE_URI . '/footer.php');?>

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
        <script src="assets/js/purpose.js"></script>
        <!-- <script src="assets/js/generaljs.js"></script> -->
        <script src="assets/js/demo.js"></script>


        <script>
        var signup = $('#signup').text();

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

                            alert(
                                "Thank you for your details.  We will keep you updated on everything GIEQs."
                                );
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

        function stopVideo() {
            var $frame = $('iframe#videoChapter');

            // saves the current iframe source
            var vidsrc = $frame.attr('src');

            // sets the source to nothing, stopping the video
            $frame.attr('src', '');

            // sets it back to the correct link so that it reloads immediately on the next window open
            $frame.attr('src', vidsrc);
        }



        $(document).ready(function() {

            /* var isshow = localStorage.getItem('isshow');
            if (isshow == null) {
                localStorage.setItem('isshow', 1);

                // Show popup here
                setTimeout(function() {
                    $('#teaser-videos').modal('show');
                }, 5000);

            } */


            if (signup == '2456') {

                $('#registerInterest').modal('show');

            }

            $('#registerInterest').on('hidden.bs.modal', function(e) {
                stopVideo();
            })



            $(document).on('click', '#submitPreRegister', function() {

                event.preventDefault();
                $('#pre-register').submit();

            })

            $(document).on('click', '.teaser-popup', function() {

                event.preventDefault();
                $('#teaser-videos').modal('show');

            })

            $("#pre-register").validate({

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
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },

                },
                submitHandler: function(form) {

                    submitPreRegisterForm();

                    //console.log("submitted form");



                }




            });


        })
        </script>
</body>

</html>