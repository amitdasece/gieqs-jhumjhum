<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>

<head>
    <?php

//define user access level

$openaccess = 1;

require BASE_URI . '/headNoPurposeCore.php';

?>

    <title>GIEQs Symposium - Concept</title>

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

    .blog-container {

        font-family: 'nunito', sans-serif;
        font-size: 1.3rem !important;
        font-weight: 300;
        line-height: 1.7 !important;
        text-align: left !important;
        color: #95aac9;
    }

    .blog-container strong {

        font-weight: 500;
        color: #e3ebf6;
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

        <?php 
        
        $symposium_nav_active = [

            0 => 'gieqsGold', //news
            1 => '', //individual reg
            2 => '', //group reg
            3 => '', //program
            4 => '', //faculty
            5 => '', //register now
            
            
            
            ];
        
        
        require BASE_URI . '/pages/learning/includes/nav_symposium.php';?>

    </header>

    <div class="main-content">




        <!-- Header text 1 -->
        <section class="slice slice-lg pb-2 bg-gradient-dark" data-offset-top="#header-main">
            <div class="container pt-6">
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <article class="mt-8 mb-6">
                            <h1 class="lh-150 mb-3">Introducing GIEQs IV - the Fourth Edition of the Ghent International
                                Endoscopy Quality and Safety Symposium</h1>
                            <p class="lead">A Symposium Dedicated to Promoting Safety and Quality in Everyday Endoscopy.
                            </p>
        </section>
        <section class="blog-container">



            <!--     <section class="bg-cover bg-size--cover" style="height: 200px; background-image: url('../../assets/img/backgrounds/endoscopy.jpg'); background-position: top center;"></section>
 -->









            <section>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <!-- Article body -->
                            <article>

                                <p class="lead">
                                <h1>Concept - "We can do Everyday Endoscopy Better"</h1>
                                <p><strong>October 2020</strong> - we launched our first international symposium on
                                    Everyday Endoscopy.</p>
                                <p><strong>October 2021</strong> was our second edition - expanded faculty and more
                                    delegates, broadening the idea of Everyday Endoscopy.</p>
                                <p><strong>September 29<sup>th</sup> and 30<sup>th</sup> 2022</strong> will be the dates
                                    our annual symposium pushes the concept of Everyday Endoscopy to an exciting new
                                    level. Read on to find out more...</p>


                                <hr>
                                <h1>Everyday Endoscopy Needs a Home</h1>

                                <p>For too long Endoscopy symposia have focussed on novel, complex or niche procedures
                                    that are not performed by the vast majority of endoscopists. </p>
                                <p><strong>There is a clear need for a high-quality meeting focused on procedures that
                                        all endoscopists perform.</strong></p>



                                <figure class="figure text-center">
                                    <a href="<?php echo BASE_URL;?>/login?destination=viewvideo&videoid=278"
                                        target="_blank"><img alt="Fundal Varices Retroflexion View"
                                            src="<?php echo BASE_URL;?>/assets/scripts/pdocrud/script/uploads/1650359944_image1060-2.jpg"
                                            class="w-75 img-fluid rounded"></a>
                                    <figcaption class="mt-3 text-muted"><strong>Gastric Varices viewed in
                                            Retroflexion</strong> - our <a
                                            href="<?php echo BASE_URL;?>/login?destination=viewvideo&videoid=278"
                                            target="_blank">Masterclass on therapy of Gastric Varices during GIEQs I</a>
                                        was a highlight for many viewers and is one of the most viewed videos on GIEQs
                                        Online</figcaption>
                                </figure>

                                <div class="card p-3">
                                    <p><strong>GIEQs focusses on these procedures</strong>:</p>
                                    <ul>
                                        <li>Gastroscopy</li>
                                        <li>Colonoscopy</li>
                                        <li>Endoscopic Therapy for Gastrointestinal Bleeding</li>
                                        <li>ERCP</li>
                                        <li>EUS</li>
                                        <li>Lesion Detection, Assessment and Decision-making</li>
                                        <li>Basic endoscopic therapeutic procedures including the basics of Colonic
                                            Polypectomy</li>
                                        <li>Training in Endoscopic Procedures</li>
                                        <li>Common Mistakes / Controversies in Endoscopic Practice</li>
                                        <li>System approaches to improve the quality and safety of endoscopy</li>
                                    </ul>
                                </div>
                                <div class="btn-container mt-5 text-center">
                                <a href="<?php echo BASE_URL;?>/pro-content/95&action=register" class="btn btn-fill-gieqsGold btn-lg my-2" role="button">Register Now!</a>


                                </div>
                                <hr>
                                <h1>Deconstruction: the key to the GIEQs Approach</h1>
                                <p>How do you learn any practical skill? Think back to when you learned to drive. Did
                                    your parents try to teach you how to drive? Did they do a good job? If you are like
                                    us, they did not.</p>
                                <p><strong>Why not? </strong>Our parents were able to drive a car, but most found it
                                    difficult to explain the key actions required to drive safely. In contrast, our
                                    driving instructors knew exactly how to teach us to drive.</p>
                                <p><strong>This is the key to learning an endoscopic skill. </strong>Having the
                                    knowledge to explain why certain things work in certain situations based on
                                    instrument mechanics and the underlying pathophysiology and anatomy.</p>
                                <p><strong>All endoscopic procedures can be deconstructed in this way. </strong>GIEQs
                                    brings deconstructed education of endoscopic procedures to the mainstream using a
                                    combination of virtual, live and symposium-based education.</p>

                                <div class="card p-3">

                                    <figure class="figure">
                                        <a href="<?php echo BASE_URL;?>/blog-view?id=56" target="_blank"><img
                                                alt="Deconstructed approach to polypectomy"
                                                src="<?php echo BASE_URL;?>/assets/scripts/pdocrud/script/uploads/1650364600_Deconstruction of Polypectomy.jpg"
                                                class="img-fluid rounded"></a>
                                        <figcaption class="mt-3 text-muted"><strong>Deconstruction of Colonic
                                                Polypectomy</strong> - this figure is a simple deconstruction of colonic
                                            polypectomy. We use this approach to throughout the whole of GIEQs, from the
                                            Symposium to the Online Learning Library. Of course all endoscopic
                                            procedures
                                            can be deconstructed in this way.</figcaption>
                                    </figure>
                                    <p><a href="<?php echo BASE_URL;?>/blog-view?id=56" target="_blank">View Examples of
                                            Our
                                            Deconstructed Approach</a></p>
                                </div>
                                <hr>
                                <h1>GIEQs IV – a Virtual-Live meeting with High-Definition Streaming</h1>
                                <p>Our next meeting will be bigger, improving on our previous experience and delivery.
                                    It will be a <strong>VIRTUAL </strong>event streamed directly in high
                                    definition to our custom online learning platform. The same production standards that defined the
                                    first two editions will be maintained.</p>
                                <p>You can choose your format:</p>
                                <ul>
                                   
                                    <li>Attend <strong>VIRTUALLY</strong> on our custom-made platform for an in-room
                                        experience right up close to the action and like no other</li>
                                        <li>Setup a <strong>LIVE</strong> experience dependent on your local situation for a true face-to-face
                                        experience with group interaction and upskilling</li>
                                    <li>Attend <strong>VIRTUALLY</strong> after the event.</li>
                                </ul>
                                <p>LIVE participants gain all of the above in their registration package.</p>
                                <div class="btn-container mt-5 mb-5 text-center">
                                <a href="<?php echo BASE_URL;?>/pro-content/95&action=register" class="btn btn-fill-gieqsGold btn-lg my-2" role="button">Register Now!</a>
                                <a href="<?php echo BASE_URL;?>/pages/program/symposium-group-registration.php" class="btn btn-fill-gieqsGold btn-lg my-2" role="button">Explore Group Registration</a>


                                </div>

                                <div class="card p-3">

                                    <a href="" target="_blank">
                                        <figure class="figure" style="text-align:center;">
                                            <img alt="Image placeholder"
                                                src="<?php echo BASE_URL;?>/assets/scripts/pdocrud/script/uploads/1650358689_UZGent211001_GieqsSymposiumEndoscopie_lowres85-2.JPG"
                                                class="img-fluid rounded" style="width:47%;"><img
                                                alt="Image placeholder"
                                                src="<?php echo BASE_URL;?>/assets/scripts/pdocrud/script/uploads/1650359674_UZGent211001_GieqsSymposiumEndoscopie_lowres62-2.JPG"
                                                class="img-fluid rounded ml-4 mt-sm-2" style="width:47%;">
                                            <figcaption class="mt-3 text-muted"><strong>The GIEQs Approach </strong> -
                                                High
                                                Quality Visuals in a Virtual-Live Environment</figcaption>
                                        </figure>
                                    </a>
                                </div>


                                <hr>
                                <h1>Content</h1>
                                <p>Our provisional programme for GIEQs IV is below. You will notice a focus on a
                                    simple, deconstructed approach to key issues in endoscopic practice.</p>
                                <p>Whether you attend live or virtually you can expect the following</p>
                                <ul>
                                    <li>High-definition visuals</li>
                                    <li>All content linked together by tags*</li>
                                    <li>Ability to ask questions directly to the experts performing procedures and panel
                                    </li>
                                    <li>Combination of live endoscopy, case-based discussion and cartoon-based
                                        whiteboard teaching to improve understanding of important concepts</li>
                                    <li>Content equally relevant for trainees and experienced endoscopists</li>
                                </ul>
                                <p><a href="<?php echo BASE_URL;?>/pages/program/program.php">View
                                        the draft scientific programme</a></p>
                                <p><a href="<?php echo BASE_URL;?>/blog-view?id=56" target="_blank">View Examples of Our
                                        Content and Approach</a></p>
                                <p></p>
                                <div class="btn-container mt-5 text-center">


                                </div>
                                <div class="card p-3">
                                    <figure class="figure">
                                        <a href="<?php echo BASE_URL;?>/login?destination=viewvideo&videoid=588"
                                            target="_blank"><img
                                                alt="Heater probe use to treat a visible vessel in a duodenal ulcer"
                                                src="<?php echo BASE_URL;?>/assets/scripts/pdocrud/script/uploads/1650361050_GI Bleeding in Endoscopy.jpg"
                                                class="img-fluid rounded"></a>
                                        <figcaption class="mt-3 text-muted"><strong>GIEQs II - Demonstration of Best
                                                Practice</strong> - <a
                                                href="<?php echo BASE_URL;?>/login?destination=viewvideo&videoid=588"
                                                target="_blank">using a Gold Probe to treat a Visible Vessel</a> within
                                            a
                                            Duodenal Ulcer</figcaption>
                                    </figure>
                                </div>
                                <p></p>


                                </p>







                                <p class="lead">
                                    <hr>
                                <h1>Faculty</h1>
                                <p>This year we have invited experts who have really impacted the practice of everyday
                                    endoscopic practice. We have gone out of our way to be inclusive and to ensure a
                                    broad range of expertise.</p>
                                <p><strong>Our provisional External faculty includes:</strong></p>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td style="width:35%;">
                                                <p><strong>Professor Michael Bourke</strong></p>
                                            </td>
                                            <td>
                                                <p>Opinion Leader in Polypectomy Practice and ERCP</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><strong>Dr John Anderson</strong></p>
                                            </td>
                                            <td>
                                                <p>Opinion Leader in Endoscopy Training and Polypectomy</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><strong>Dr Roland Valori</strong></p>
                                            </td>
                                            <td>
                                                <p>Opinion Leader in Colonoscopy Training, Post Colonoscopy Colorectal
                                                    Cancer and Quality Improvement in Endoscopy</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><strong>Professor Raf Bisschops</strong></p>
                                            </td>
                                            <td>
                                                <p>Opinion Leader in Endoscopic Imaging, Barrett's Oesophagus and
                                                    Quality Improvement in Endoscopy</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><strong>Dr Nigel Trudgill</strong></p>
                                            </td>
                                            <td>
                                                <p>Opinion Leader in Upper GI Cancer after Gastroscopy</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><strong>Dr John Morris</strong></p>
                                            </td>
                                            <td>
                                                <p>Opinion Leader in Upper GI Bleeding</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><strong>Dr Steven Heitman</strong></p>
                                            </td>
                                            <td>
                                                <p>Opinion Leader in Colon Cancer Screening</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><strong>Dr Amir Klein</strong></p>
                                            </td>
                                            <td>
                                                <p>Opinion Leader in Polypectomy Practice</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><strong>Dr Paul Dunckley</strong></p>
                                            </td>
                                            <td>
                                                <p>Opinion Leader in Endoscopy Training</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><strong>Dr Manmeet Matharoo</strong></p>
                                            </td>
                                            <td>
                                                <p>Safety in Gastrointestinal Endoscopy</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><strong>Dr Mayenaaz Sidhu</strong></p>
                                            </td>
                                            <td>
                                                <p>Polypectomy Practice</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>More faculty to be announced soon. Watch this space.</p>
                                <hr>
                                <h1>Pricing</h1>
                                <p>We commit to keeping the costs of our flagship event down as much as possible. For
                                    this we are grateful to a large number of companies for their sponsorship of the
                                    event.</p>
                                <p>To lock in this unique experience for the best possible price we advise you to
                                    register as soon as possible, certainly before the <strong>early bird deadline of
                                        1<sup>st</sup> July 2022.</strong></p>
                                <div class="btn-container mt-5 text-center">
                                <a href="<?php echo BASE_URL;?>/pro-content/95&action=register" class="btn btn-fill-gieqsGold btn-lg my-2" role="button">Register Now!</a>


                                </div>
                                <hr>
                                <h1>Join us Virtually, 29 and 30<sup>th</sup> September 2022</h1>
                                <p>Or organise your own group experience!</p>
                                <p class="mb-6">We very much look forward to seeing you there!</p>
                                </p>

                                








                                <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <p class="lead">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
              <h5>First thing you need to do</h5>
              <figure class="figure">
                <img alt="Image placeholder" src="../../assets/img/theme/light/img-3-800x600.jpg" class="img-fluid rounded">
                <figcaption class="mt-3 text-muted">Figure one: Type here your description</figcaption>
              </figure>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <h5>Second thing you need to do</h5>
              <figure class="figure">
                <img alt="Image placeholder" src="../../assets/img/theme/light/img-4-800x600.jpg" class="img-fluid rounded">
                <figcaption class="mt-3 text-muted">Figure two: Type here your description</figcaption>
              </figure>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
             -->
                            </article>
            </section>
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