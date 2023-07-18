<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>

<head>
<meta name=”robots” content=”noindex”>

<?php

//define user access level

$openaccess = 1;

require BASE_URI . '/headNoPurposeCore.php';

?>
    <title>Ghent International Endoscopy Symposium - Draft Programme</title>
  
    <style>
        .text-gieqsGold {

color: rgb(238, 194, 120);

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
        <section class="header-1 bg-gradient-dark" data-offset-top="#header-main">


        </section>

        <!-- PROGRAM TABLE -->

        <section class="slice bg-gradient-dark slice-lg">
            <div class="container">
                <div class="row text-center">

                    <div class="col-12 p-3 pb-5">
                        <span class="h1" style="color: rgb(238, 194, 120);">Ghent International Endoscopy Quality
                            Symposium <br /> Edition I. <br/>Draft Programme</span>
                    </div>

                </div>
                <div class="row text-center">

                    <div class="col-12 p-3 pb-4">
                        <!-- <a href="#" class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon mr-3 scroll-me"> -->
                            <!-- <span class="btn-inner--text">Overview</span> -->
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        <!-- </a> -->
                        <a href="#targetScrollProgramme" id="wednesday"
                            class="btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mr-3 scroll-me">
                            <span class="btn-inner--text text-dark">Wed 7 Oct</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>
                        <a href="#targetScrollProgramme" id="thursday" class="btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mr-3 scroll-me">
                            <span class="btn-inner--text text-dark">Thurs 8 Oct</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>
                    </div>

                </div>

                <hr id="targetScrollProgramme" class="divider divider-fade" />


                <!--Wednesday Programme-->

                <div id="wednesdayProgramme" class="wednesday">

                    <div class="row text-left">
                        <div class="col-12 p-1 pb-3 pt-3">
                            <span class="h5">Wednesday 7 October 2020</span>

                        </div>
                    </div>

                    <div class="row text-center border">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">

                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="h4">Plenary</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="h4">Complex</span>
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                            <span class="h4">Live</span>
                        </div>





                    </div>

                    <div class="row text-center border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">0845-0900</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Introduction to GIEQS</span><br />
                            <span class="sessionSubtitle">Introduction to Quality in Endoscopy</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class=" h5"></span><br />
                            <span></span>
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                            <span class="h5"></span><br />
                            <span></span>
                        </div>



                    </div>

                    <div class="row text-center border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">0900-1000</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Optimal Colonoscopy Technique</span><br />
                            <span class="sessionSubtitle">Intubation, withdrawal and diminutive polyps</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="h5"></span><br />
                            <span></span>
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                            <span class="h5"></span><br />
                            <span></span>
                        </div>



                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">1000-1045</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="h5"></span><br />
                            <span></span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Live ERCP technique</span><br />
                            <span class="sessionSubtitle">Papillary morphology versus technique</span>
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                            <span class="sessionTitle h5">Live Colonoscopy technique</span><br />
                            <span class="sessionSubtitle">Quicker, painless intubation</span>
                        </div>



                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom">

                        <div class="col-12 p-2 pb-3 pt-3">
                            <span class="h5" style="color: rgb(238, 194, 120);">Morning Tea</span>
                        </div>




                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">1100-1200</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">GI bleeding symposium</span><br />
                            <span class="sessionSubtitle">Techniques for effective hemostasis</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Basic ERCP symposium</span><br />
                            <span class="sessionSubtitle">Stones, stents and strictures</span>
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                            <span class="sessionTitle h5">Live GIB / ERCP</span><br />
                            <span class="sessionSubtitle">Best practice techniques</span>
                        </div>



                    </div>
                    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">1200-1245</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Difficult GI bleeding</span><br />
                            <span class="sessionSubtitle">Use of new techniques as first line</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Difficult Cannulation</span><br />
                            <span class="sessionSubtitle">Prediction, preparation and when to refer</span>
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                            <span class="h5"></span><br />
                            <span></span>
                        </div>



                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom">

                        <div class="col-12 p-2 pb-3 pt-3">
                            <span class="h5" style="color: rgb(238, 194, 120);">Lunch</span>
                        </div>




                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">1345-1415</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Principles of Endoscopic Imaging<br /> in the GI
                                tract</span><br />
                            <span class="sessionSubtitle">The 'Demarcated area' - a predictor of invasion</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">

                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                            <span class="h5"></span><br />
                            <span></span>
                        </div>



                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">1415-1515</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Principles of Endoscopy Unit Design</br> and
                                management</span><br />
                            <span class="sessionSubtitle">The Global Rating Scale and exportability</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Management of adverse events <br /> at ERCP</span><br />
                            <span class="sessionSubtitle">Pancreatitis, bleeding and perforation</span>
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                            <span class="h5"></span><br />
                            <span></span>
                        </div>



                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom">

                        <div class="col-12 p-2 pb-3 pt-3">
                            <span class="h5" style="color: rgb(238, 194, 120);">Afternoon Tea</span>
                        </div>




                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">1530-1630</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">IBD in Endoscopy Symposium</span><br />
                            <span class="sessionSubtitle">Comprehensive endoscopic assessment of activity</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Basic EUS</span><br />
                            <span class="sessionSubtitle">Quality standardised examination</span>
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                            <span class="sessionTitle h5">Live IBD / EUS</span><br />
                            <span class="sessionSubtitle">Chromoendoscopy and technique</span>
                        </div>



                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">1630-1700</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Endoscopic Management of strictures <br />in IBD</span><br />
                            <span class="sessionSubtitle">Balloon, incision or surgery</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Unit setup for EUS / ERCP</span><br />
                            <span class="sessionSubtitle">Equipment, settings and personnel</span>
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                            <span class="h5"></span><br />
                            <span></span>
                        </div>



                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom">

                        <div class="col-12 p-2 pb-3 pt-3">
                            <span class="h5" style="color: rgb(238, 194, 120);">Break</span>
                        </div>




                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">1715-1800</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Artificial Intelligence in Endoscopy</span><br />
                            <span class="sessionSubtitle">Implications, Ethics and Future Directions</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Interventional EUS symposium</span><br />
                            <span class="sessionSubtitle">Role in everyday practice, referral criteria</span>
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                            <span class="sessionTitle h5">AI Live</span><br />
                            <span class="sessionSubtitle">current state of the tech</span>
                        </div>



                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom">

                        <div class="col-12 p-2 pb-3 pt-3">
                            <span class="h5" style="color: rgb(238, 194, 120);">1930 - Conference Dinner</span>
                        </div>




                    </div>

                    <div class="row text-left">

                        <div class="col-12 p-2 pb-3 pt-3">
                            <span class="text-sm">Programme contents subject to change without notice.</span>
                        </div>




                    </div>

                </div>

                <!--Thursday Programme-->

                <div id="thursdayProgramme" class="thursday">

                    <div class="row text-left">
                        <div class="col-12 p-1 pb-3 pt-3">
                            <span class="h5">Thursday 8 October 2020</span>

                        </div>
                    </div>

                    <div class="row text-center border">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">

                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="h4">Plenary</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="h4">Complex</span>
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                            <span class="h4">Live</span>
                        </div>





                    </div>

                    

                    <div class="row text-center border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">0900-0940</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right" data-toggle="modal" data-target="#modal-thursday-0900">
                            <span class="sessionTitle h5">Optimal Gastroscopy Technique</span><br />
                            <span class="sessionSubtitle">Intubation, withdrawal and lesion detection</span>
                            <!-- <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-change-username">Change username</button> -->

                        </div>

                        <!-- Modal -->
                            <div class="modal fade" id="modal-thursday-0900" tabindex="-1" role="dialog" aria-labelledby="modal-change-username" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <form>
                                        <div class="modal-content bg-dark border" style="border-color:rgb(238, 194, 120) !important;">
                                            <div class="modal-header">
                                                <div class="modal-title d-flex align-items-left" id="modal-title-change-username">
                                                    <div>
                                                        <div class="icon bg-dark icon-sm icon-shape icon-info rounded-circle shadow mr-3">
                                                        <!-- <i class="fa fa-calendar" aria-hidden="true" ></i> -->
                                                        <img src="../../assets/img/icons/gieqsicon.png">
                                                        </div>
                                                    </div>
                                                    <div class="text-left">
                                                        <h5 class="mb-0">Optimal Gastroscopy Technique</h5>
                                                        <span class="mb-0">Thursday 0900-0940</span>
                                                    </div>
                                                    
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span="text-white" aria-hidden="true">&times;</span>
                                                </button>
                                                
                                            </div>
                                            <div class="modal-subheader px-3 mt-2 mb-2 border-bottom">
                                             <div class="row">
                                                   <div class="col-sm-12 text-left">
                                                        <div>
                                                            <h6 class="mb-0">Moderators</h6>
                                                            <span class="mb-0">LD, PH, RMV</span>
                                                      
                                                        </div>
                                                     </div>
                                                </div>
                                            </div>  
                                            <div class="modal-body">
                                               
                                                <!-- <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Old username</label>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">New username</label>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="programme-body">
                                                  <div class="row d-flex align-items-left text-left align-middle">
                                                    <div class="pl-2 pr-1 pb-0 pt-1 time">
                                                      <h6>0900 - 0915 : </h5>
                                                    </div>
                                                    <div class="pr-2 pb-0 pt-1 title">
                                                      <h6>How I Perform Gastroscopy</h5>
                                                    </div>

                                                  </div>
                                                  <div class="row d-flex align-items-left text-left align-middle">
                                                    <div class="pl-3 pr-1 pb-0 pt-0 time">
                                                      <span class="author">Michael J Bourke</h5>
                                                    </div>
                              

                                                  </div>
                                                  <div class="row d-flex align-items-left text-left align-middle mt-4">
                                                    <div class="pl-2 pr-1 pb-0 pt-1">
                                                      <h6>0900 - 0915 : </h5>
                                                    </div>
                                                    <div class="pr-2 pb-1 pt-1">
                                                      <h6>How I Perform Gastroscopy</h5>
                                                    </div>

                                                  </div>
                                                  <div class="row d-flex align-items-left text-left align-middle">
                                                    <div class="pl-3 pr-1 pb-0 pt-0 time">
                                                      <span class="author">Michael J Bourke</h5>
                                                    </div>
                              

                                                  </div>
                                                </div>
                                                
                                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                                                    <p class="text-muted text-sm">Programme subject to change without notice.</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Back to programme &nbsp; &nbsp;<i class="fas fa-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="h5"></span><br />
                            <span></span>
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                        <span class="sessionTitle h5">Live Gastroscopy technique</span><br />
                            <span class="sessionSubtitle">Focus on Lesion characterisation</span>
                        </div>



                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">0940-1010</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                        <span class="sessionTitle h5">Imaging in the Lower GI tract</span><br />
                            <span class="sessionSubtitle">Endoscopic resection or surgery?</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                        <span class="sessionTitle h5">Live Colorectal Imaging</span><br />
                            <span class="sessionSubtitle">Focus on Lesion characterisation</span>
                        </div>



                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">1010-1045</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Cold Snare Polypectomy</span><br />
                            <span class="sessionSubtitle"><strong>Safe</strong>, quick and effective</span>
                        
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                           
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                            <span class="sessionTitle h5">Live cold snare technique</span><br />
                            <span class="sessionSubtitle">Focus on the basics</span>
                        </div>



                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom">

                        <div class="col-12 p-2 pb-3 pt-3">
                            <span class="h5" style="color: rgb(238, 194, 120);">Morning Tea</span>
                        </div>




                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">1100-1200</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Hepatology in Endoscopy symposium</span><br />
                            <span class="sessionSubtitle">Banding, glue and proper assessment</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Hot snare polypectomy [EMR]</span><br />
                            <span class="sessionSubtitle">Complete resection, preventing recurrence</span>
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                            <span class="sessionTitle h5">Live hepatology cases</span><br />
                            <span class="sessionSubtitle">Best practice techniques</span>
                        </div>



                    </div>
                    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">1200-1245</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Malignancy</span><br />
                            <span class="sessionSubtitle">Detection, description and marking</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Complex polypectomy [EMR&nbsp;&ge;&nbsp;20mm]</span><br />
                            <span class="sessionSubtitle">Evidence & where does it fit into my practice?<br/>To include piecemeal cold snare</span>
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                        <span class="sessionTitle h5">Live big polyp</span><br />
                            <span class="sessionSubtitle">Best practice techniques</span>
                        </div>



                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom">

                        <div class="col-12 p-2 pb-3 pt-3">
                            <span class="h5" style="color: rgb(238, 194, 120);">Lunch</span>
                        </div>




                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">1345-1415</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Barrett's oesophagus</span><br />
                            <span class="sessionSubtitle">Assessment, description, dysplasia and referral</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">

                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                         <span class="sessionTitle h5">Live Barrett's</span><br />
                            <span class="sessionSubtitle">Focus on detection of dysplasia</span>
                        </div>



                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">1415-1445</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">How to improve your ADR</span><br />
                            <span class="sessionSubtitle">Preparation, caps, light and timing</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                        <span class="sessionTitle h5">The role of <br/>endoscopic submucosal dissection (ESD)</span><br />
                            <span class="sessionSubtitle">Throughout the GI tract, where it fits my practice</span>
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                            <span class="h5"></span><br />
                            <span></span>
                        </div>



                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">1445-1515</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Informatics in the drive for quality</span><br />
                            <span class="sessionSubtitle">Structured reporting, national datasets and AI</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Bringing it together in the colon</span><br />
                            <span class="sessionSubtitle">Specific polyp - which technique, rectum specific algorithm, when to refer</span>
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                        <span class="sessionTitle h5">Live ESD</span><br />
                            <span class="sessionSubtitle">Focus on lesion assessment</span>
                        </div>



                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom">

                        <div class="col-12 p-2 pb-3 pt-3">
                            <span class="h5" style="color: rgb(238, 194, 120);">Afternoon Tea</span>
                        </div>




                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">1530-1615</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Room & Generator setup for polypectomy</span><br />
                            <span class="sessionSubtitle">Which personel, which kit, which settings, </span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Assessment + treatment of sphincters </span><br />
                            <span class="sessionSubtitle">EndoFlip, manometry and POEM</span>
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                            <span class="sessionTitle h5">Live sphincter assessment</span><br />
                            <span class="sessionSubtitle">How does it fit into everyday practice?</span>
                        </div>



                    </div>

                    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">1615-1700</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Endoscopic dilatation and stents</span><br />
                            <span class="sessionSubtitle">Quality in established techniques, new technology</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Serrated polyps + polyposis</span><br />
                            <span class="sessionSubtitle">How to detect, characterise and resect</span>
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                          <span class="sessionTitle h5">Live serrated polyposis case</span><br />
                            <span class="sessionSubtitle">Safe and complete resection</span>
                        </div>



                    </div>

                    

                    <div class="row text-center align-middle border-left border-right border-bottom bg-dark">

                        <div class="col-1 p-1 pb-3 pt-3 border-right">
                            <span class="tiny" style="color: rgb(238, 194, 120);">1700-1715</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5">Conclusions and Wrap-up</span><br />
                            <span class="sessionSubtitle">GIEQs</span>
                        </div>

                        <div class="col-4 p-1 pb-3 pt-3 border-right">
                            <span class="sessionTitle h5"></span><br />
                            <span class="sessionSubtitle"></span>
                        </div>

                        <div class="col-3 p-1 pb-3 pt-3">
                            <span class="sessionTitle h5"></span><br />
                            <span class="sessionSubtitle"></span>
                        </div>



                    </div>

                    

                    <div class="row text-left">

                        <div class="col-12 p-2 pb-3 pt-3">
                            <span class="text-sm">Programme contents subject to change without notice.</span>
                        </div>




                    </div>

                </div>

            </div>



        </section>

    </div>

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <script src="../../assets/js/purpose.core.js"></script> <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>    <!-- Page JS -->
   <script src="../../assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <!-- Google maps -->
    <!-- Purpose JS -->
    <!-- Demo JS - remove it when starting your project -->


    <script>
    $(document).ready(function() {

      $('.thursday').hide();

        $(document).on('click', '#wednesday', function() {

            $('.wednesday').show();
            $('.thursday').hide();

        })

        $(document).on('click', '#thursday', function() {

            $('.thursday').show();
            $('.wednesday').hide();

        })

    })
    </script>
</body>

</html>