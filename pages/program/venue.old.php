<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>

<head>
    
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
       
        <section class="slice slice-xl bg-cover bg-size--cover" data-offset-top="#header-main" style="background-image: url(&quot;<?php echo BASE_URL?>/assets/img/backgrounds/ghalemcohigh.png&quot;); background-position: center center; padding-top: 150px;">
            <span class="mask bg-dark opacity-3"></span>
            <div class="container py-5 pt-lg-2 position-relative zindex-100">
              <div class="row">
                <div class="col-lg-8 text-center text-lg-left">
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
                      <span class="display-5 font-weight-light">the Ghelamco Arena. Ghent. Belgium.</span>
                      
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
                <h3 class=" mt-4">GIEQs will be held at the Ghelamco Arena, Ghent, Belgium.</h3>
                <div class="fluid-paragraph mt-3">
                  <p class="lead lh-180">within the Ghelamco arena is a modern conference venue which will make for a spectacular meeting</p>
                </div>
              </div>
              <div class="card-deck">
                <div class="card hover-shadow-lg">
                  <div class="card-body">
                    <div class="delimiter-bottom pb-3 mb-4">
                      
                      <h5 class="text-center mt-4">2 bespoke lecture theatres</h5>
                    </div>
                    <p class="text-center">A large auditorium and an up-close and personal 'pitch arena' for 70 people allows for unparalleled interaction with the faculty.</p>
                  </div>
                  <div class="card-footer px-0 py-0 border-0 overflow-hidden">
                    <a href="<?php echo $registrationURL;?>" target="_blank" class="btn btn-block btn-dark gieqsGold rounded-0">Register now!</a>
                  </div>
                </div>
                <div class="card hover-shadow-lg">
                  <div class="card-body">
                    <div class="delimiter-bottom pb-3 mb-4">
                      
    
                      <h5 class="text-center mt-4">Modern networking space</h5>
                    </div>
                    <p class="text-center">With beautiful, modern open spaces this venue allows for professional networking and mingling with the faculty.</p>
                  </div>
                  <div class="card-footer px-0 py-0 border-0 overflow-hidden">
                    <a href="<?php echo $registrationURL;?>" target="_blank" class="btn btn-block btn-dark gieqsGold rounded-0">Register now!</a>
                  </div>
                </div>
                <div class="card hover-shadow-lg">
                  <div class="card-body">
                    <div class="delimiter-bottom pb-3 mb-4">
                     
    
                      <h5 class="text-center mt-4">Beautiful satellite rooms</h5>
                    </div>
                    <p class="text-center">The venue contains multiple modern meeting rooms for spin-off sessions and up-close interaction with the faculty.</p>
                  </div>
                  <div class="card-footer px-0 py-0 border-0 overflow-hidden">
                    <a href="<?php echo $registrationURL;?>" target="_blank" class="btn btn-block btn-dark gieqsGold rounded-0">Register now!</a>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <section class="slice slice-lg delimiter-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-overlay card-hover-overlay">
              <figure class="figure">
                <img alt="Image placeholder" src="../../assets/img/venue/venue1.jpg" class="img-fluid">
              </figure>
              <div class="card-img-overlay d-flex flex-column align-items-center p-0">
                <div class="overlay-text w-75 mt-auto p-4">
                  <p class="lead">Large open reception area for catering and networking.</p>
                  
                </div>
                <div class="overlay-actions w-100 card-footer mt-auto d-flex justify-content-between align-items-center">
                  <div>
                  <p class="h6 mb-0">Reception and Catering Area</p>
                  </div>
                  <div>
                    <div class="actions">
                      
                      <a href="<?php echo $registrationURL;?>" target="_blank" class="action-item"><i class="fas fa-user-plus"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            
              <figure class="figure">
                <img alt="Image placeholder" src="../../assets/img/venue/venue2.jpg" class="img-fluid">
              </figure>
              
              
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-overlay card-hover-overlay">
              <figure class="figure">
                <img alt="Image placeholder" src="../../assets/img/venue/venue3.jpg" class="img-fluid">
              </figure>
              <div class="card-img-overlay d-flex flex-column align-items-center p-0">
                <div class="overlay-text w-75 mt-auto p-4">
                  <p class="lead">The Pitch Arena.  A space for up to 70 people allowing unparalleled interaction with the faculty</p>
                  
                </div>
                <div class="overlay-actions w-100 card-footer mt-auto d-flex justify-content-between align-items-center">
                  <div>
                  <p class="h6 mb-0">Pitch Arena</p>
                  </div>
                  <div>
                    <div class="actions">
                    <a href="<?php echo $registrationURL;?>" target="_blank" class="action-item"><i class="fas fa-user-plus"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-overlay card-hover-overlay">
              <figure class="figure">
                <img alt="Image placeholder" src="../../assets/img/venue/venue4.jpg" class="img-fluid">
              </figure>
              <div class="card-img-overlay d-flex flex-column align-items-center p-0">
                <div class="overlay-text w-75 mt-auto p-4">
                  <p class="lead">A brand new lecture theatre with state of the art projection and audio facilities.  Direct streaming from the University Hospital of Ghent</p>
                  
                </div>
                <div class="overlay-actions w-100 card-footer mt-auto d-flex justify-content-between align-items-center">
                  <div>
                  <p class="h6 mb-0">Main Auditorium</p>
                  </div>
                  <div>
                    <div class="actions">
                    <a href="<?php echo $registrationURL;?>" target="_blank" class="action-item"><i class="fas fa-user-plus"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-overlay card-hover-overlay">
              <figure class="figure">
                <img alt="Image placeholder" src="../../assets/img/venue/venue5.jpg" class="img-fluid">
              </figure>
              <div class="card-img-overlay d-flex flex-column align-items-center p-0">
                <div class="overlay-text w-75 mt-auto p-4">
                  <p class="lead">Large area full of light for interactions with industry sponsors.</p>
          
                </div>
                <div class="overlay-actions w-100 card-footer mt-auto d-flex justify-content-between align-items-center">
                  <div>
                    <p class="h6 mb-0">Industry interaction area</p>
                  </div>
                  <div>
                    <div class="actions">
                    <a href="<?php echo $registrationURL;?>" target="_blank" class="action-item"><i class="fas fa-user-plus"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-overlay card-hover-overlay">
              <figure class="figure">
                <img alt="Image placeholder" src="../../assets/img/venue/venue6.jpg" class="img-fluid">
              </figure>
              <div class="card-img-overlay d-flex flex-column align-items-center p-0">
                <div class="overlay-text w-75 mt-auto p-4">
                  <p class="lead">Interaction area with smaller meeting rooms visible to the right.  Allows for up-close faculty interaction.</p>
                
                </div>
                <div class="overlay-actions w-100 card-footer mt-auto d-flex justify-content-between align-items-center">
                  <div>
                    <p class="h6 mb-0">Up-close faculty interaction</p>
                  </div>
                  <div>
                    <div class="actions">
                    <a href="<?php echo $registrationURL;?>" target="_blank" class="action-item"><i class="fas fa-user-plus"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Load more -->
        
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
    <script src="../../assets/js/purpose.core.js"></script> <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>    <!-- Page JS -->
   <script src="../../assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <!-- Google maps -->
    <!-- Purpose JS -->
    <script src="../../assets/js/purpose.js"></script>
    <!-- Demo JS - remove it when starting your project -->


    <script>
    $(document).ready(function() {

      

    })
    </script>
</body>

</html>