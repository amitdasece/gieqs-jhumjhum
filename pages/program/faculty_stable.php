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

    <title>GIEQs faculty</title>
  
    <style>
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

    </header>
    <!-- Omnisearch -->
    <div id="omnisearch" class="omnisearch">
        <div class="container">
            <!-- Search form -->
            <form class="omnisearch-form">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-flush">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Type and hit enter ...">
                    </div>
                </div>
            </form>
            <div class="omnisearch-suggestions">
                <h6 class="heading">Search Suggestions</h6>
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>macbook pro</span> in Laptops
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>iphone 8</span> in Smartphones
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>macbook pro</span> in Laptops
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>beats pro solo 3</span> in Headphones
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>smasung galaxy 10</span> in Phones
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">

        <!-- Header (v1) -->
        <section class="header-1 bg-section-dark" data-offset-top="#header-main">
        </section>




        <!-- Sponsors -->

        <!-- Team 1 -->
        <div id="team-team-1" title="the GIEQs faculty">
            <section class="slice bg-gradient-dark slice-lg">
                <div class="container">
                    <div class="mb-5 text-center">
                        <h2 class="mt-4" style="color: rgb(238, 194, 120);">The GIEQs Courses faculty</h2>
                        <div class="fluid-paragraph mt-3">
                            <p class="lead lh-180">The faculty for courses includes those closely involved in the first edition of GIEQs Digital.
                                They will push your understanding and promote your ability to go further in everyday endoscopy.</p>
                        </div>
                    </div>
                    <div class="mb-5 text-left">
                        <h3 class=" mt-4" style="color: rgb(238, 194, 120);">International Faculty</h3>

                    </div>
                    <div class="row row-grid">
                        <!-- <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Michael Bourke" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/MB.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Michael J Bourke</h5>
                                    <p class="text-muted mb-0">Clinical Professor of Medicine</p>
                                    <p class="text-muted mb-0">University of Sydney, Australia</p>
                                    <p class="text mb-0">Focus: polypectomy, ERCP</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Steven Heitman" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/SH.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">A/Prof. Steven J Heitman</h5>
                                    <p class="text-muted mb-0">Herschfield Professor of Medicine</p>
                                    <p class="text-muted mb-0">University of Calgary, Canada</p>
                                    <p class="text mb-0">Focus: quality, polypectomy</p>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Roland Valori" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/RMV.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Roland Valori</h5>
                                    <p class="text-muted mb-0">Consultant Gastroenterologist</p>
                                    <p class="text-muted mb-0">Gloucestershire Royal Hospital, UK</p>
                                    <p class="text mb-0">Focus: quality, colonoscopy training</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="John Anderson" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/JA.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr John Anderson</h5>
                                    <p class="text-muted mb-0">Consultant Gastroenterologist</p>
                                    <p class="text-muted mb-0">Cheltenham General Hospital, UK</p>
                                    <p class="text mb-0">Focus: polypectomy, colonoscopy training</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- <div class="row row-grid"> -->

                        <div class="mb-4 text-left">
                            <h3 class="mt-6" style="color: rgb(238, 194, 120);">National faculty</h3>
                        </div>

                    <!-- </div> -->
                    <div class="row row-grid">
                        <!-- <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Raf Bisschops" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/RB.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Raf Bisschops</h5>
                                    <p class="text-muted mb-0">Professor of Medicine</p>
                                    <p class="text-muted mb-0">University Hospital Leuven</p>
                                    <p class="text mb-0">Focus: Endoscopic imaging, Barrett's oesophagus</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="">
                                        <img alt="Pierre Deprez" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/PD.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Professor Pierre Deprez</h5>
                                    <p class="text-muted mb-0">Interventional Endoscopist</p>
                                    <p class="text-muted mb-0">Cliniques universitaires Saint-Luc (UCLouvain)</p>
                                    <p class="text mb-0">Focus: quality in upper GI tract early neoplasia, ERCP and endoscopic ultrasound</p>
                                </div>
                            </div>
                        </div>
                      
                        <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="">
                                        <img alt="Schalk Van der Merwe" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/SM.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Professor Schalk Van der Merwe</h5>
                                    <p class="text-muted mb-0">Interventional Endoscopist</p>
                                    <p class="text-muted mb-0">University Hospital of Leuven</p>
                                    <p class="text mb-0">Focus: quality in ERCP and endoscopic ultrasound</p>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Steven Heitman" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/SH.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">A/Prof. Steven J Heitman</h5>
                                    <p class="text-muted mb-0">Herschfield Professor of Medicine</p>
                                    <p class="text-muted mb-0">University of Calgary, Canada</p>
                                    <p class="text mb-0">Focus: quality, polypectomy</p>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Roland Valori" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/RMV.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Roland Valori</h5>
                                    <p class="text-muted mb-0">Consultant Gastroenterologist</p>
                                    <p class="text-muted mb-0">Gloucestershire Royal Hospital, UK</p>
                                    <p class="text mb-0">Focus: quality, colonoscopy training</p>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="John Anderson" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/JA.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr John Anderson</h5>
                                    <p class="text-muted mb-0">Consultant Gastroenterologist</p>
                                    <p class="text-muted mb-0">Cheltenham General Hospital, UK</p>
                                    <p class="text mb-0">Focus: polypectomy, colonoscopy training</p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="row row-grid"> -->

                        <div class="mb-4 text-left">
                            <h3 class="mt-6" style="color: rgb(238, 194, 120);">Local faculty</h3>
                        </div>

                        <div class="row row-grid">
                        <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="David Tate" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/DT.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr David Tate</h5>
                                    <p class="text-muted mb-0">Interventional Endoscopist</p>
                                    <p class="text-muted mb-0">University Hospital of Ghent</p>
                                    <p class="text mb-0">Focus: endoscopy quality, tissue resection, training</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Pieter Hindryckx" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/PH.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Dr. Pieter Hindryckx</h5>
                                    <p class="text-muted mb-0">Interventional Endoscopist</p>
                                    <p class="text-muted mb-0">University Hospital of Ghent</p>
                                    <p class="text mb-0">Focus: ERCP, interventional EUS</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Hans Van Vlierberghe" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/HVV.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Hans Van Vlierberghe</h5>
                                    <p class="text-muted mb-0">Hepatologist</p>
                                    <p class="text-muted mb-0">University Hospital of Ghent</p>
                                    <p class="text mb-0">Focus: hepatology and endoscopy</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Danny Delooze" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/DDL.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Danny De Looze</h5>
                                    <p class="text-muted mb-0">Interventional Endoscopist</p>
                                    <p class="text-muted mb-0">University Hospital of Ghent</p>
                                    <p class="text mb-0">Focus: Barrett's, proctology, general gastroenterology</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Lobke Desomer" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/LD.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Lobke Desomer</h5>
                                    <p class="text-muted mb-0">Interventional Endoscopist</p>
                                    <p class="text-muted mb-0">AZ Delta Hospital, Roeselare</p>
                                    <p class="text mb-0">Focus: endoscopy quality, polypectomy, training</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Helena Degroote" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/HD.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Helena Degroote</h5>
                                    <p class="text-muted mb-0">Hepatologist and Interventional Endoscopist</p>
                                    <p class="text-muted mb-0">UZ Gent</p>
                                    <p class="text mb-0">Focus: quality in ERCP and EUS</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Suzane Ribeiro" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/SR.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Suzane Moura Ribeiro</h5>
                                    <p class="text-muted mb-0">Oncologist and Echo-Endoscopist</p>
                                    <p class="text-muted mb-0">UZ Gent</p>
                                    <p class="text mb-0">Focus: quality in EUS and digestive oncology</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Helena Degroote" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/TL.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Dr Triana Lobaton</h5>
                                    <p class="text-muted mb-0">Gastroenterologist</p>
                                    <p class="text-muted mb-0">UZ Gent</p>
                                    <p class="text mb-0">Focus: quality in IBD and endoscopy</p>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="John Anderson" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/JA.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr John Anderson</h5>
                                    <p class="text-muted mb-0">Consultant Gastroenterologist</p>
                                    <p class="text-muted mb-0">Cheltenham General Hospital, UK</p>
                                    <p class="text mb-0">Focus: polypectomy, colonoscopy training</p>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <!-- </div> -->
                </div>
                <!--<div class="row row-grid">
                <div class="col-lg-3">
                  <div data-animate-hover="2">
                    <div class="animate-this">
                      <a href="#">
                        <img alt="Image placeholder" class="img-fluid rounded shadow" src="assets/img/theme/light/team-5-800x800.jpg">
                      </a>
                    </div>
                    <div class="mt-3">
                      <h5 class="card-title mb-0">Danielle Levin</h5>
                      <p class="text-muted mb-0">CTO</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div data-animate-hover="2">
                    <div class="animate-this">
                      <a href="#">
                        <img alt="Image placeholder" class="img-fluid rounded shadow" src="assets/img/theme/light/team-6-800x800.jpg">
                      </a>
                    </div>
                    <div class="mt-3">
                      <h5 class="card-title mb-0">Martin Gray</h5>
                      <p class="text-muted mb-0">CTO</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div data-animate-hover="2">
                    <div class="animate-this">
                      <a href="#">
                        <img alt="Image placeholder" class="img-fluid rounded shadow" src="assets/img/theme/light/team-7-800x800.jpg">
                      </a>
                    </div>
                    <div class="mt-3">
                      <h5 class="card-title mb-0">George Squier</h5>
                      <p class="text-muted mb-0">CTO</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div data-animate-hover="2">
                    <div class="animate-this">
                      <a href="#">
                        <img alt="Image placeholder" class="img-fluid rounded shadow" src="assets/img/theme/light/team-8-800x800.jpg">
                      </a>
                    </div>
                    <div class="mt-3">
                      <h5 class="card-title mb-0">Jesse Stevens</h5>
                      <p class="text-muted mb-0">CTO</p>
                    </div>
                  </div>
                </div>
              </div>-->
        </div>
        </section>
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



    })
    </script>
</body>

</html>