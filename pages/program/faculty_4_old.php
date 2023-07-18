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


require BASE_URI . '/pages/learning/includes/nav_symposium_4.php';?>

    </header>
    <!-- Omnisearch -->
   
    <div class="main-content">

        <!-- Header (v1) -->
        <section class="pt-8">
        </section>




        <!-- Sponsors -->

        <!-- Team 1 -->
        <div id="team-team-1" title="the GIEQs faculty">
            <section class="slice bg-gradient-dark slice-lg">
                <div class="container">
                    <div class="mb-5 text-center">
                        <h1 class="mt-7">The GIEQs faculty</h1>
                        <div class="fluid-paragraph mt-3">
                            <p class="lead lh-150">With a stellar international faculty the third edition of GIEQs
                                promises to be a launch-pad for innovative thinking in everyday endoscopic practice.</p>
                        </div>
                        <a href="<?php echo BASE_URL;?>/pro-content/175&action=register" class="btn btn-fill-gieqsGold btn-lg my-2" role="button">Register Now!</a>


                    </div>


                    <div class="mb-5 text-left">
                        <h3 class=" mt-4" style="color: rgb(238, 194, 120);">Organising Committee</h3>
                    
                        <div class="row row-grid">

                    
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
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

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
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
                       

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
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
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
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
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Dr Jeroen Geldof" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Jeroen Geldof.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Jeroen Geldof</h5>
                                    <p class="text-muted mb-0">Gastroenterologist, UZ Ghent, Belgium</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
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

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Triana Lobaton" class="img-fluid rounded shadow"
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
                       
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
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
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
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

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Hans Van Vlierberghe" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Hans Van Vlierberghe.png">
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

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
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

                       <!--  <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Tania Helleputte" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1661401243_Awaiting Photo.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Mrs Tania Helleputte</h5>
                                    <p class="text-muted mb-0">Head Nurse</p>
                                    <p class="text-muted mb-0">Gastroenterology, Ghent University Hospital, Belgium</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Karolien Haenebalcke" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1661401243_Awaiting Photo.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Mrs Karolien Haenebalcke</h5>
                                    <p class="text-muted mb-0">Endoscopy Nurse</p>
                                    <p class="text-muted mb-0">Endoscopy Unit, Ghent University Hospital, Belgium</p>
                                </div>
                            </div>
                        </div> -->






                    </div>

</div>
                    <div class="mb-5 text-left">
                        <h3 class=" mt-4" style="color: rgb(238, 194, 120);">International Faculty</h3>

                    </div>
                    <div class="row row-grid">
                        
                        <!-- <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
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
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
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

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Matthew Banks" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1660739218_Matthew Banks.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Matthew Banks</h5>
                                    <p class="text-muted mb-0">Consultant Gastroenterologist</p>
                                    <p class="text-muted mb-0">University College London Hospitals, UK</p>
                                    <p class="text mb-0">Focus: Upper GI Endoscopy</p>
                                </div>
                            </div>
                        </div>

                            
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
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
                        
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Nick Burgess" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1660739291_Nicholas Burgess.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">A/Prof. Nicholas G Burgess</h5>
                                    <p class="text-muted mb-0">Associate Professor of Medicine</p>
                                    <p class="text-muted mb-0">University of Sydney, Australia</p>
                                    <p class="text mb-0">Focus: polypectomy</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Nick Church" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1661113716_churchy_png.png	">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Nick Church</h5>
                                    <p class="text-muted mb-0">Consultant Gastroenterologist</p>
                                    <p class="text-muted mb-0">NHS Lothian, Edinburgh, UK</p>
                                    <p class="text mb-0">Focus: colonoscopy, polypectomy</p>
                                </div>
                            </div>
                        </div>  

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Katie Cross" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1660742734_Katy Cross.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Miss Katie Cross</h5>
                                    <p class="text-muted mb-0">Consultant Colorectal Surgeon</p>
                                    <p class="text-muted mb-0">Northern Devon Healthcare NHS Trust</p>
                                    <p class="text mb-0">Focus: lower GI cancer therapy, polypectomy</p>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="John Curtis" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1660738995_John Curtis.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr John Curtis</h5>
                                    <p class="text-muted mb-0">Consultant Radiologist</p>
                                    <p class="text-muted mb-0">Aintree University NHS trust, UK</p>
                                    <p class="text mb-0">Focus: Radiology in Endoscopy</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="John Curtis" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1660738680_Andrea de Gottardi.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Andrea De Gottardi</h5>
                                    <p class="text-muted mb-0">Consultant Hepatologist</p>
                                    <p class="text-muted mb-0">Inselspital, Universitätsspital Bern, Switzerland</p>
                                    <p class="text mb-0">Focus: Hepatology in Endoscopy</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Paul Dunckley" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1660739834_Paul Dunckley.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Paul Dunckley</h5>
                                    <p class="text-muted mb-0">Consultant Gastroenterologist</p>
                                    <p class="text-muted mb-0">Gloucestershire Royal Hospital, UK</p>
                                    <p class="text mb-0">Focus: Colonoscopy, Training in Endoscopy</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Dr Steven Heitman" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1660739971_Steven Heitman.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Steven Heitman</h5>
                                    <p class="text-muted mb-0">Associate Professor<br>Gastroenterologist and Hepatologist, University of Calgary, Canada. </p>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a>
                                        <img alt="Marietta Iaccuci" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1660739137_Marietta Iacucci.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Marietta Iacucci</h5>
                                    <p class="text-muted mb-0">Reader and Honorary Gastroenterology Consultant</p>
                                    <p class="text-muted mb-0">University Hospitals Birmingham NHS Foundation Trust, UK</p>
                                    <p class="text mb-0">Focus: Imaging in IBD</p>
                                </div>
                            </div>
                        </div> 
                        
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Chris Kassianides" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1660739089_Kris Kassianides.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Chris Kassianides</h5>
                                    <p class="text-muted mb-0">Consultant Gastroenterologist</p>
                                    <p class="text-muted mb-0">Director Gastroenterology Foundation of Subsaharan Africa</p>
                                    <p class="text mb-0">Focus: Outreach in Gastroenterology and Endoscopy</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Dr Amir Klein" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1663750921_Dr Amir Klein.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Amir Klein</h5>
                                    <p class="text-muted mb-0">Acting Director</p>
                                    <p class="text-muted mb-0">Gastroenterology department, Rambam Healthcare Campus, Tel Aviv, Israel</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Vikash Lala" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1661977414_vikash.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Vikash Lala</h5>
                                    <p class="text-muted mb-0">Consultant Gastroenterologist, Fellow in Training (Advanced Endoscopy)</p>
                                    <p class="text-muted mb-0">Charlotte Maxeke Johannesburg Academic Hospital, Johannesburg, South Africa</p>
                                    <p class="text mb-0">Focus: quality, colonoscopy training, polypectomy</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="#">
                                        <img alt="Dr Ralph Lee" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Ralph Lee.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Ralph Lee</h5>
                                    <p class="text-muted mb-0">Gastroenterologist and assistant professor, University of Ottawa, Ontario, Canada</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Arnaud Lemmers" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Arnaud Lemmers.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Arnaud Lemmers </h5>
                                    <p class="text-muted mb-0">Head of Clinic, Endoscopy Unit </p>
                                    <p class="text-muted mb-0">Erasme Hospital, Belgium </p>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Carme Loras" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1660738844_Carme Loras.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Dr Carme Loras</h5>
                                    <p class="text-muted mb-0">Head of Digestive Endoscopy</p>
                                    <p class="text-muted mb-0">Hospital Universitari Mútua De Terrassa, Barcelona, Spain
</p>
                                    <p class="text mb-0">Focus: Imaging and Stricture Management in IBD</p>
                                </div>
                            </div>
                        </div>

                        
                   
                       

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Donald Macintosh" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Donald MacIntosh.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Donald Macintosh</h5>
                                    <p class="text-muted mb-0">Professor of Medecine</p>
                                    <p class="text-muted mb-0">Dalhousie University in Halifax, Canada</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Manmeet Matharoo" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1660739112_Manmeet Matharoo.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Manmeet Matharoo</h5>
                                    <p class="text-muted mb-0">Consultant Gastroenterologist</p>
                                    <p class="text-muted mb-0">St Marks Hospital, London, UK
</p>
                                    <p class="text mb-0">Focus: Patient Safety</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="John Morris" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1660739065_John Morris.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr John Morris</h5>
                                    <p class="text-muted mb-0">Consultant Gastroenterologist</p>
                                    <p class="text-muted mb-0">Ross Hall Hospital, Glasgow, UK</p>
                                    <p class="text mb-0">Focus: upper GI endoscopy, upper GI bleeding</p>
                                </div>
                            </div>
                        </div>
                       
                        
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Dr Mayenaaz Sidhu" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Mayenaaz Sidhu.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Mayenaaz Sidhu</h5>
                                    <p class="text-muted mb-0">Gastroenterologist and Hepatologist, Westmead Hospital (Sydney), University of Sydney, Concord Hospital (Sydney)</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Prof Sandie Thompson" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1660739930_Sandie Thomson.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof Sandie Thompson</h5>
                                    <p class="text-muted mb-0">Surgical Gastroenterologist</p>
                                    <p class="text-muted mb-0">University of Cape Town | UCT, South Africa</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Dr Nigel Trudgill" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1660739332_Nigel Trudgill.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Nigel Trudgill</h5>
                                    <p class="text-muted mb-0">Consultant Gastroenterologist</p>
                                    <p class="text-muted mb-0">Sandwell & West Birmingham NHS Trust, UK</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
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

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Dr Rogier Voermans" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1660739891_Rogier Voermans.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Rogier Voermans</h5>
                                    <p class="text-muted mb-0">Consultant Gastroenterologist</p>
                                    <p class="text-muted mb-0">Amsterdam University Medical Centre, Amsterdam, Netherlands</p>
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

                    <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Dr Maridi Aerts" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Maridi Aerts.jpeg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Maridi Aerts</h5>
                                    <p class="text-muted mb-0">Gastroenterologist, UZ-Brussel, Belgium</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Prof Marianna Arvanitaki" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Marianna Arvanitaki.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof Marianna Arvanitaki</h5>
                                    <p class="text-muted mb-0">Head of the Clinic of Pancreatology and Clinical Nutrition and Professor, Erasme University Hospital, Belgium</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Dr Filip Baert" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Filip Baert.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Filip Baert</h5>
                                    <p class="text-muted mb-0">AZ Delta Roeselare, Belgium</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Raf Bisschops" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Raf Bisschops.jpg">
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

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Peter Bossuyt" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Peter Bossuyt.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr. Peter Bossuyt </h5>
                                    <p class="text-muted mb-0">Gastroenterologist, IBD clinic </p>
                                    <p class="text-muted mb-0">Imelda General Hospital, Bonheiden, Belgium</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Dr Thomas Botelberge" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1660739989_Thomas Botelberge.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Thomas Botelberge</h5>
                                    <p class="text-muted mb-0"> Gastroenterologist, GZA hospitals, Belgium</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Dr Michiel Bronswijk" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Michiel Bronswijk.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Michiel Bronswijk</h5>
                                    <p class="text-muted mb-0">Interventional Endoscopist</p>
                                    <p class="text-muted mb-0">Imelda General Hospital Bonheiden & University Hospitals Leuven, Belgium</p>
                                    <p class="text mb-0">Focus: Therapeutic EUS </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Dr Eduard Callebout" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1663758691_Dr Eduard Callebout.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Eduard Callebout</h5>
                                    <p class="text-muted mb-0">Gastroenterologist and Oncologist</p>
                                    <p class="text-muted mb-0">University Hospital of Ghent</p>
                                    <p class="text mb-0">Focus: Oncology in the GI tract </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Dr Ercan Cesmeli" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Ercan Cesmeli.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Ercan Cesmeli</h5>
                                    <p class="text-muted mb-0">Gastroenterologist, AZ St Lucas, Belgium</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Frederik de Clerck" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Frederik de Clerck.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr. Frederik de Clerk</h5>
                                    <p class="text-muted mb-0">Gastroenterologist </p>
                                    <p class="text-muted mb-0">AZ Sint Lucas Gent, Belgium </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Pieter Dewint" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1660739873_Pieter Dewint.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr. Pieter Dewint</h5>
                                    <p class="text-muted mb-0">Gastroenterologist </p>
                                    <p class="text-muted mb-0">AZ Maria Middalares, Belgium </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Pierre Eisendrath" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1660739853_Pierre Eisendrath.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Dr. Pierre Eisendrath</h5>
                                    <p class="text-muted mb-0">Professor of Gastroenterology</p>
                                    <p class="text-muted mb-0">UMC Sint-Pieter, Brussels, Belgium</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Dr Christophe Schoonjans" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1660738886_Christophe Schoonjans.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Christophe Schoonjans</h5>
                                    <p class="text-muted mb-0">Gastroenterologist, AZ Sint Jan Hospital, Bruges</p>
                                </div>
                            </div>
                        </div>

                       
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Raf Bisschops" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Christophe Snauwaert.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr. Christophe Snauwaert </h5>
                                    <p class="text-muted mb-0">Therapeutic Endoscopist </p>
                                    <p class="text-muted mb-0">AZ Sint-Jan Brugge-Oostende, Belgium </p>
                                </div>
                            </div>
                        </div>

                     
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Raf Bisschops" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Tim Vanuytsel.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof. Dr. Tim Vanuytsel</h5>
                                    <p class="text-muted mb-0">Consultant gastroenterologist</p>
                                    <p class="text-muted mb-0">Leuven University Hospital, Belgium</p>
                                </div>
                            </div>
                        </div>

                       

               
                      
                       
                  
                      
            <!-- 
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Prof Dr Harald Peeters" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Harald Peeters.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof Dr Harald Peeters</h5>
                                    <p class="text-muted mb-0">Gastroenterologist, St Lucas Hospital, Belgium</p>
                                </div>
                            </div>
                        </div> -->
                    
             

                       <!--  <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Dr Dominiek De Wulf" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Dominiek De Wulf.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Dominiek De Wulf</h5>
                                    <p class="text-muted mb-0">Gastroenterologist, AZ Delta Roeselare, Belgium</p>
                                </div>
                            </div>
                        </div> -->

                   

             

                

                   

                        
                        

                        <!-- <div class="col-lg-3">
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
                        </div> -->
                        <!-- <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a href="">
                                        <img alt="Ratislav Kunda" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/RK.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Professor Ratislav Kunda</h5>
                                    <p class="text-muted mb-0">Interventional Endoscopist and Surgeon</p>
                                    <p class="text-muted mb-0">University Hospital of Brussels</p>
                                    <p class="text mb-0">Focus: quality in_array ERCP and endoscopic ultrasound</p>
                                </div>
                            </div>
                        </div> -->
                       <!--  <div class="col-lg-3">
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
                                    <a >
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
                                    <a >
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
                                    <a >
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

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
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

                                    

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Dr Isabelle De Kock " class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1663160586_Dr Isabelle De Kock.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Isabelle De Kock</h5>
                                    <p class="text-muted mb-0">Consultant Radiologist, Ghent University Hospital, Belgium</p>
                                </div>
                            </div>
                        </div>

                  

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
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
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
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

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Prof Dr Karen Geboes" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Karen Geboes.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof Dr Karen Geboes</h5>
                                    <p class="text-muted mb-0">Head of Clinic of Gastrointestinal and Intestinal Diseases, UZ Ghent 
                                        <br>Professor of Medicine, Ghent University, Belgium</p>
                                </div>
                            </div>
                        </div>


                     
                   
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Prof Anja Geerts" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/AnjaGeerts.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof Anja Geerts</h5>
                                    <p class="text-muted mb-0">Gastroenterologist and Hepatologist, Ghent University Hospital, Belgium</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Dr Jeroen Geldof" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Jeroen Geldof.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Jeroen Geldof</h5>
                                    <p class="text-muted mb-0">Gastroenterologist, UZ Ghent, Belgium</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
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
               
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
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

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Sarah Raevens" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1663767766_Sarah Raevens.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Sarah Raevens</h5>
                                    <p class="text-muted mb-0">Hepatologist</p>
                                    <p class="text-muted mb-0">UZ Gent</p>
                                    <p class="text mb-0">Focus: quality in Hepatology and Endoscopy</p>
                                </div>
                            </div>
                        </div>
                        

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
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
                        
                          
                        
                            


                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
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

                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Dr Elke Van Daele" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1660738908_Elke Van Daele.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Elke Van Daele</h5>
                                    <p class="text-muted mb-0">Consultant Surgeon (Upper GI Focus), Ghent University Hospital, Belgium</p>
                                </div>
                            </div>
                        </div>

                    
                       
                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Hans Van Vlierberghe" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Hans Van Vlierberghe.png">
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


                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Prof Dr Xavier Verhelst" class="img-fluid rounded shadow"
                                            src="../../assets/img/faculty/Xavier Verhelst.jpg">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Prof Dr Xavier Verhelst</h5>
                                    <p class="text-muted mb-0">Interventional Endoscopist</p>
                                    <p class="text-muted mb-0">Gastroenterologist, Ghent University Hospital, Belgium</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-3 py-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
                                        <img alt="Dr Lynn Debels" class="img-fluid rounded shadow"
                                            src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1662539356_Dr Lynn Debels.png">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="gieqsGold card-title mb-0">Dr Lynn Debels</h5>
                                    <p class="text-muted mb-0">Fellow in Endoscopy, Ghent University Hospital, Belgium</p>
                                </div>
                            </div>
                        </div>
                       
                        </div>
                       
                        <!-- <div class="col-lg-3">
                            <div data-animate-hover="2">
                                <div class="animate-this">
                                    <a >
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


                    

                             
           

                    <!-- </div> -->
                </div>
                <!--<div class="row row-grid">
                <div class="col-lg-3">
                  <div data-animate-hover="2">
                    <div class="animate-this">
                      <a >
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
                      <a >
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
                      <a >
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
                      <a >
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
