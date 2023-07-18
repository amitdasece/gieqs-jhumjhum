<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>

<head>
    <?php

//define user access level

$openaccess = 1;

require BASE_URI . '/headNoPurposeCore.php';

?>

<title>What others are saying about GIEQs</title>
	<meta name="description" content="Everybody is talking about the GIEQs method for Endoscopy Training and Lifelong Learning.  Don’t just take our word for it, read the opinions of previous participants in our courses and symposia!" >


    <!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">

    <style>
    .logo {

        width: 100%;


    }

    .gieqsGold {

        color: rgb(238, 194, 120);

    }

    .video-thumbnail {
        position: relative;
        display: inline-block;
        cursor: pointer;
        margin: 30px;
    }

    .video-thumbnail::before {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        content: "&#9658;";
        font-family: FontAwesome;
        font-size: 100px;
        color: #fff;
        opacity: .8;
        text-shadow: 0px 0px 30px rgba(0, 0, 0, 0.5);
    }

    .video-thumbnail:hover::before {
        color: ;
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

       

    </header>

    <div class="main-content">




        <!-- Header text 1 -->
        <section class="slice slice-lg pb-2 bg-gradient-dark" data-offset-top="#header-main">
            <div class="container pt-0">
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <article class="mt-8 mb-6">
                            <h1 class="lh-150 mb-3">GIEQs' Testimonials <br />(don't just believe what we say!)</h1>
                            <p class="lead">Feedback on the 3+ years of GIEQs Symposia and GIEQs Online</p>
                            <p> <a class="btn btn-fill-gieqsGold btn-md my-2" href="<?php echo BASE_URL;?>/pages/program/online.php" role="button">Join the
                                    Community</a></p>
        </section>
        <div id="testimonials-testimonials-1" title="GIEQs fills training gaps">
            <section class="slice">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <blockquote
                                class="blockquote blockquote-card py-5 px-5 rounded-right bg-neutral hover-scale-110">
                                <h3 class="h2 font-weight-700">GIEQs fills training gaps!</h3>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <p class="lead">Having watched GIEQs' high quality upskilling/training I feel confident
                                    to say how I want to do some parts of colonoscopy and can explain why. If the
                                    Academy can continue to offer opportunities like this to trainees across the region.
                                    I am certain it will greatly improve endoscopy training and competence.</p>
                                <footer class="blockquote-footer">Trainee Medical Endoscopist<cite
                                        class="font-weight-600" title="Source Title"> United Kingdom</cite>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div id="testimonials-testimonials-2" title="Immersive Training">
            <section class="slice">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-8">
                            <blockquote
                                class="blockquote blockquote-card py-5 px-5 rounded-right bg-neutral hover-scale-110">
                                <h3 class="h2 font-weight-700">Immersive Training...</h3>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <p class="lead">for 2 hours I didn't even think about checking an email. My eyes were
                                    glued to the screen.</p>
                                <footer class="blockquote-footer">Consultant Surgeon<cite class="font-weight-600"
                                        title="Source Title"> United Kingdom</cite>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div id="testimonials-testimonials-3" title="Best thing I ever did in my career (so far!)">
            <section class="slice">
                <div class="container">
                    <div class="row">
                      
                        <div class="col-lg-8">
                            <blockquote
                                class="blockquote blockquote-card py-5 px-5 rounded-right bg-neutral hover-scale-110">
                                
                                <h3 class="h2 font-weight-700">The best thing I did in my career (so far!)</h3>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <p class="lead">After watching online videos from Tokyo live, Endo Swiss, Amsterdam Endoscopy Symposium (which were great but i personally did not benefit from them very much because i hadn't proper basic skill and knowledge) I saw on ESGE events calendar programme for GIEQS. After some consideration, and looking for reviews, I registered for the GIEQs Symposium - THE BEST THING I DID DURING MY WORKING CAREER</p>
                                <footer class="blockquote-footer">Consultant Gastroenterologist<cite class="font-weight-600"
                                        title="Source Title"> Croatia</cite>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div id="testimonials-testimonials-4" title="Best thing I ever did in my career (so far!)">
            <section class="slice">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-8">
                            <blockquote
                                class="blockquote blockquote-card py-5 px-5 rounded-right bg-neutral hover-scale-110">
                                <h3 class="h2 font-weight-700">Maximum Conscious Competence</h3>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <p class="lead">As someone who thought that nurses insert endoscopes and i only have to work with wheels, who knew almost nothing about appropriate snare selection, electrosurgey units, etc., You changed my whole practice. The structured approach that You and your team (especially dr. Anderson and dr. Valori) provide is priceless</p>
                                <footer class="blockquote-footer">Consultant Gastroenterologist<cite class="font-weight-600"
                                        title="Source Title"> UK</cite>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div id="testimonials-testimonials-5" title="Virtual informs Practical!">
            <section class="slice">
                <div class="container">
                    <div class="row">
                    <div class="col-lg-4">
                        </div>
                        <div class="col-lg-8">
                            <blockquote
                                class="blockquote blockquote-card py-5 px-5 rounded-right bg-neutral hover-scale-110">
                                <h3 class="h2 font-weight-700">Virtual informs Practical!</h3>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <p class="lead">Thanks to you I've succesfully used OVESCO clips for GI bleeding 3 times (had no one senior that had experienced with that during procedures) - during which i was confident of the indication and the proper technique of placement thanks to many videos on your site</p>
                                <footer class="blockquote-footer">GIEQs II Participant and GIEQs Online Subscriber<cite class="font-weight-600"
                                        title="Source Title"> </cite>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div id="testimonials-testimonials-6" title="High Definition">
            <section class="slice">
                <div class="container">
                    <div class="row">
                    
                        <div class="col-lg-8">
                            <blockquote
                                class="blockquote blockquote-card py-5 px-5 rounded-right bg-neutral hover-scale-110">
                                <h3 class="h2 font-weight-700">High Definition</h3>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <p class="lead">I thought the imaging was excellent. The pictures and videos were excellent examples of what the presenters were trying to show</p>
                                <footer class="blockquote-footer">GIEQs Online Course Participant <cite class="font-weight-600" title="Source Title"> Consultant Surgeon, UK</cite>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div id="testimonials-testimonials-7" title="High Definition">
            <section class="slice">
                <div class="container">
                    <div class="row">
                       
                        <div class="col-lg-8">
                            <blockquote
                                class="blockquote blockquote-card py-5 px-5 rounded-right bg-neutral hover-scale-110">
                                <h3 class="h2 font-weight-700">Rich Learning from Watching Others Learn</h3>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <p class="lead">It was a good format. It was good that there was a theoretical course the night before. On the course itself there were a lot of opportunities to ask questions. The hands on part is very good and through watching collegues work, you learn also from their mistakes</p>
                                <footer class="blockquote-footer">GIEQs Online Course Participant <cite class="font-weight-600" title="Source Title"> Consultant Gastroenterologist, Peru</cite>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </section>
        </div> 
        
        <div id="testimonials-testimonials-8" title="Visual Learning">
            <section class="slice">
                <div class="container">
                    <div class="row">
                    <div class="col-lg-4">
                        </div>
                        <div class="col-lg-8">
                            <blockquote
                                class="blockquote blockquote-card py-5 px-5 rounded-right bg-neutral hover-scale-110">
                                <h3 class="h2 font-weight-700">Rich Visual Learning</h3>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <p class="lead">  The drawings of the virtual trainer were great. Very enjoyable way to learn. Excellent coaching during the live course and individual/personal approach. Nice way of learning where everyone feels at ease. </p>
                                <footer class="blockquote-footer">GIEQs Online Course Participant <cite class="font-weight-600" title="Source Title"> Consultant Gastroenterologist, Australia</cite>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="container text-center pb-8">
        <p> <a class="btn btn-fill-gieqsGold btn-md my-2" href="<?php echo BASE_URL;?>/pages/program/online.php" role="button">Join the
                                    Community</a></p>

</div>

    </div>

    </div>

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <script src="../../assets/js/purpose.core.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script> <!-- Page JS -->
    <script src="../../assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <!-- Google maps -->
    <!-- Purpose JS -->
    <!-- Demo JS - remove it when starting your project -->


    <script>
    $(document).ready(function() {



    })
    </script>
</body>

</html>