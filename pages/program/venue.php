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

    <title>Ghent International Endoscopy Symposium - Venue</title>
   
    <style>

.logo { 

width: 100%;


}

.gieqsGold {

color: rgb(238, 194, 120);

}

.background-gieqsGold {

background-color: rgb(238, 194, 120);

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
       
        <section class="slice slice-xl bg-cover bg-size--cover" data-offset-top="#header-main" style="background-image: url(&quot;<?php echo BASE_URL?>/assets/img/backgrounds/audience.jpg&quot;); background-position: center center; padding-top: 150px;">
            <span class="mask bg-dark opacity-3"></span>
            <div class="container pt-5 pt-lg-2 position-relative zindex-100">
              <div class="row">
                <div class="col-lg-8 text-center text-lg-left">
                <a href="<?php echo $registrationURL;?>">

                <div class="alert alert-modern alert-dark">
                    <span class="badge gieqsGold badge-pill">
                      New
                    </span>
                    <span class="alert-content">Registration now open!</span>
                  </div>
                  </a>  
                  <div class="">
                    <h2 class="gieqsGold mt-4 card p-2 text-left">
                      <span class="display-5 font-weight-bold">FREE Live Stream in High Definition.<br/>3 locations.<br/>Focussed on everyday endoscopy.</span>
                      
                      
                    </h2>
                    

                    
                   
                  </div>
                </div>
              </div>
              
            </div>
            
          </section>

          <section class="slice slice-lg">
            <div class="container no-padding">
              <div class="">
                
                <h2 class="text-white mb-4">
                  <span class="display-5 font-weight-light">streamed from<br/></span>
                  <ul>
                      <li><span class="display-5 font-weight-light">the University Hospital of Ghent. Ghent. Belgium.</span></li>
                    </ul>
                    <span class="display-5 font-weight-light">contributions from<br/></span>
                  <ul>
                      <li><span class="display-5 font-weight-light">Westmead Hospital.  Sydney.  Australia.</span></li>
                      <li><span class="display-5 font-weight-light">Forzani & MacPhail Colon Cancer Screening Centre.  Calgary. Canada.</span></li>
                     <!--  <li><span class="display-5 font-weight-light">Cheltenham Hospital. Cheltenham. UK.</span></li> -->

                    </ul>
                  
                </h2>

                
                <p class="lead text-white"></p>
                <div class="mt-5 mb-8">
                 <!--  <a href="#sct-products" class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon d-none d-xl-inline-block scroll-me">
                    <span class="btn-inner--icon"><i class="fas fa-shopping-bag"></i></span>
                    <span class="btn-inner--text">Go shopping</span>
                  </a> -->
                </div>
              </div>
              
              <div class="card-deck">
                <div class="card hover-shadow-lg">
                  <div class="card-body">
                    <div class="delimiter-bottom pb-3 mb-4">
                      
                      <h5 class="text-center mt-4">3 locations</h5>
                    </div>
                    <p class="text-center">Based in Belgium.  Truly international.  Since the international faculty will not be travelling to Belgium due to COVID-19 restrictions, we bring them to you on the digital stream.  In High Definition.</p>
                  </div>
                  <div class="card-footer px-0 py-0 border-0 overflow-hidden">
                    <a href="<?php echo $registrationURL;?>" target="_blank" class="btn btn-block btn-dark gieqsGold rounded-0">Register now!</a>
                  </div>
                </div>
                <div class="card hover-shadow-lg">
                  <div class="card-body">
                    <div class="delimiter-bottom pb-3 mb-4">
                      
    
                      <h5 class="text-center mt-4">Hub and spoke model</h5>
                    </div>
                    <p class="text-center">Possibility to host a socially distanced GIEQs event at your hospital with high definition streaming.  Contact us for more details</p>
                  </div>
                  <div class="card-footer px-0 py-0 border-0 overflow-hidden">
                    <a href="mailto:gieqs@seauton-international.com" class="btn btn-block btn-dark gieqsGold rounded-0">Contact us!</a>
                  </div>
                </div>
                <div class="card hover-shadow-lg">
                  <div class="card-body">
                    <div class="delimiter-bottom pb-3 mb-4">
                     
    
                      <h5 class="text-center mt-4">Expert interaction</h5>
                    </div>
                    <p class="text-center">The moderators and invited faculty can interact live and are filmed professionally to appear on the digital stream.</p>
                  </div>
                  <div class="card-footer px-0 py-0 border-0 overflow-hidden">
                    <a href="<?php echo $registrationURL;?>" target="_blank" class="btn btn-block btn-dark gieqsGold rounded-0">Register now!</a>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <div id="videoDisplay mb-3" class="embed-responsive embed-responsive-16by9">
            <iframe  id='videoChapter' class="embed-responsive-item"
             allow='autoplay' src='https://player.vimeo.com/video/431241116?autoplay=1&loop=1&autopause=0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>

         
    <section class="slice slice-lg bg-section-secondary" id="sct-call-to-action"><a href="#sct-call-to-action"
            class="tongue tongue-up tongue-section-primary" data-scroll-to="">
            <i class="fas fa-angle-up"></i>
        </a>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-8 text-center">
                    <h3 class="font-weight-400">Register now to improve the quality of your <span
                            class="font-weight-700">every-day </span> endoscopy.</h3>
                    <div class="mt-5">
                        <a href="<?php echo $registrationURL;?>" target="_blank"
                            class="btn btn-dark gieqsGold rounded-pill hover-translate-y-n3">
                            Register now
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
<!--
          <section class="slice slice-xl bg-cover bg-size--cover" data-offset-top="#header-main">
            <span class="mask bg-dark opacity-3"></span>
            <div class="container py-5 pt-lg-2 position-relative zindex-100">
              <div class="row">
                <div class="col-lg-8 text-center text-lg-left">
                  
                  <div class="">
                    <h2 class="text-white my-4">
                      <span class="display-5 font-weight-light">GIEQs will be held in the Ghalemco Arena. Ghent. Belgium.</span>
                      
                    </h2>
                    <p class="lead text-white">Within the MeetDistrict area of the arena is a beautiful space, almost custom made for a congress</p>
                    <div class="mt-5 mb-8">
                   
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            
          </section>
    -->
       

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