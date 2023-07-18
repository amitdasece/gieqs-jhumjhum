<!DOCTYPE html>
<html lang="en">
<meta name=”robots” content=”noindex”>

<?php require '../../assets/includes/config.inc.php';?>

<head>
    
<?php

//define user access level

$openaccess = 1;

require BASE_URI . '/head.php';

?>

    <title>Ghent International Endoscopy Symposium - Accommodation</title>
   
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
       
        <section class="slice slice-xl bg-cover bg-size--cover" data-offset-top="#header-main" style="background-image: url(&quot;<?php echo BASE_URL?>/assets/img/backgrounds/gentNight.png&quot;); background-position: center center; padding-top: 150px;">
            <span class="mask bg-dark opacity-3"></span>
            <div class="container py-5 pt-lg-2 position-relative zindex-100">
              <div class="row">
                <div class="col-lg-10 text-center text-lg-left">
                <a href="<?php echo $registrationURL;?>" target="_blank">

                <div class="alert alert-modern alert-dark">
                    <span class="badge gieqsGold badge-pill">
                      New
                    </span>
                    <span class="alert-content">Registration now open!</span>
                  </div>
                  </a>  
                  <div class="">
                    <h2 class="text-white my-4">
                      <span class="display-5 font-weight-light">Accommodation options. For all budgets.</span>
                      
                    </h2>
                    <p class="lead text-white"></p>
                    <div class="mt-5 mb-8">
                     <!--  <a href="#sct-products" class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon d-none d-xl-inline-block scroll-me">
                        <span class="btn-inner--icon"><i class="fas fa-shopping-bag"></i></span>
                        <span class="btn-inner--text">Go shopping</span>
                      </a> -->
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            
          </section>

        
          <section class="slice slice-lg">
            <div class="container no-padding">
              <div class="mb-5 text-center">
                <h3 class=" mt-4">Ghent has accommodation options to suit all budgets.</h3>
                <div class="fluid-paragraph mt-3">
                  <p class="lead lh-180">We have provided links below to the best hotels and accommodation near the conference venue or in the city centre.  The links will gain you preferential rates on room bookings.</p>
<p class="lead lh-180">Please note that hotel reservations are to be made directly with the hotel via the details below. </p><p class="lead lh-180">For special requests, please contact the hotel directly.</p>
                </div>
              </div><hr class="divider divider-icon" />
              <div class="card-deck">
                <div class="card hover-shadow-lg">
                  <div class="card-body">
                    <div class="delimiter-bottom pb-3 mb-4">
                      
                      <h5 class="text-center mt-4">City centre hotels</h5>
                    </div>
                    <ul class="list-group">
                    <li class="list-group-item"><i class="fas fa-hotel mr-2"></i><span class="gieqsGold">Ghent Marriott Hotel</span>, 4*, Korenlei 10, 9000 Gent</li>
                    <li class="list-group-item"><i class="fas fa-hotel mr-2"></i><span class="gieqsGold">Pillows Grand Hotel Reylof</span>, 4*</li>
                    <li class="list-group-item"><i class="fas fa-hotel mr-2"></i><span class="gieqsGold">Monasterium PoortAckere</span>, 4*</li>
                    
                    </ul>
                  </div>
                  
                </div>
                <div class="card hover-shadow-lg">
                  <div class="card-body">
                    <div class="delimiter-bottom pb-3 mb-4">
                      
    
                      <h5 class="text-center mt-4">Hotels near the conference centre</h5>
                    </div>
                    <ul class="list-group">
                    <li class="list-group-item"><i class="fas fa-hotel mr-2"></i><span class="gieqsGold"><a class="gieqsGold" href="https://www.hiexpress.com/redirect?path=hd&brandCode=EX&localeCode=en&regionCode=925&hotelCode=GNTBE&_PMID=99801505&GPC=SEA&cn=no&viewfullsite=true">Holiday Inn Express Ghent</span></a>, 3*, Akkerhage 2, 9000 Gent</li>
                    <li class="list-group-item"><i class="fas fa-hotel mr-2"></i><span class="gieqsGold"><a class="gieqsGold" href="https://www.marriott.com/event-reservations/reservation-link.mi?id=1580810630049&key=GRP&app=resvlink">Residence Inn by Marriott Ghent</span></a>, 4*, Akkerhage 2a, 9000 Ghent</li>
                    <li class="list-group-item"><i class="fas fa-hotel mr-2"></i><span class="gieqsGold">Campanile</span>, 2*</li>
                    
                    </ul>
                  </div>
                  
                </div>
                
            </div>
          </section>

          

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
    <!-- Page JS -->
    <script src="../../assets/libs/swiper/dist/js/swiper.min.js"></script>
    <script src="../../assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <script src="../../assets/libs/typed.js/lib/typed.min.js"></script>
    <script src="../../assets/libs/isotope-layout/dist/isotope.pkgd.min.js"></script>
    <script src="../../assets/libs/jquery-countdown/dist/jquery.countdown.min.js"></script>
    <!-- Google maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBuyKngB9VC3zgY_uEB-DKL9BKYMekbeY"></script>
    <!-- Purpose JS -->
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>
    <!-- Demo JS - remove it when starting your project -->
    <script src="../../assets/js/demo.js"></script>

    <script>
    $(document).ready(function() {

      

    })
    </script>
</body>

</html>