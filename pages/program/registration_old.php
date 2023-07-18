<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>

<head>
<meta name=”robots” content=”noindex”>


    <?php

//define user access level

$openaccess = 1;

require BASE_URI . '/headNoPurposeCore.php';

$registrationURL = 'https://eu.eventscloud.com/200200203';


?>

    <title>Ghent International Endoscopy Symposium - Registration</title>

    <style>
    .logo {

        width: 100%;


    }

    .gieqsGold {

        color: rgb(238, 194, 120);

    }

    .gieqsGoldBack {

        background-color: rgb(238, 194, 120);

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

        <div id="pricing-pricing-1" title="pricing/pricing-1.html">
            <section class="slice slice-lg">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="mb-5 text-center">
                                <h3 class="mt-8">Registration</h3>
                                <div class="fluid-paragraph mt-3">
                                    <p class="lead lh-180">high quality endoscopic education. for a fair price,</p>
                                </div>
                                <a href="<?php echo $registrationURL;?>" target="_blank"
                                    class="btn btn-dark gieqsGold mt-2 rounded-pill hover-translate-y-n3">
                                    Register now ->
                                </a>
                            </div>


                            <div class="pricing-container px-2">
                                <div class="text-center mb-7">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn selectorRole btn-secondary active"
                                            data-pricing="P">Physician</button>
                                        <button type="button" class="btn selectorRole btn-secondary"
                                            data-pricing="ST">Specialist in Training</button>
                                        <button type="button" class="btn selectorRole btn-secondary"
                                            data-pricing="AHP">Nurse</button>
                                        <button type="button" class="btn selectorRole btn-secondary"
                                            data-pricing="MS">Medical Student</button>

                                    </div>
                                </div>

                                <div id="P">
                                    <div class="pricing card-group flex-column flex-lg-row mb-3 shadow-none">
                                        <div
                                            class="card card-pricing text-center border shadow-none hover-shadow mb-2 popular scale-110">
                                            <div class="card-header py-5 border-0 delimiter-bottom">
                                                <span class="d-block h5 mb-4">Early Bird</span>
                                                <div class="h1 gieqsGold text-center mb-0" data-pricing-value="250">€
                                                    <span class="price">250</span></div>
                                                <span class="h6 text-muted">full registration</span>
                                                <div class="h6 text-muted text-center mb-0 mt-4"
                                                    data-pricing-value="200">€ <span class="price">200</span> for single
                                                    day</div>

                                            </div>
                                            <div class="card-body">
                                                <ul class="list-unstyled mb-4">
                                                    <li>available until June 25th 2020</li>
                                                    <li>Access to full programme</li>
                                                    <li>Invitation to conference dinner <sup>*</sup></li>
                                                    <li>Catering included</li>
                                                </ul>
                                                <a href="<?php echo $registrationURL;?>" target="_blank"
      
                                                    class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                            </div>
                                        </div>
                                        <div class="card card-pricing text-center mb-3">
                                            <div class="card-header py-5 border-0 delimiter-bottom">
                                                <span class="d-block h5 mb-4">Regular Rate</span>
                                                <div class="h1 gieqsGold text-center mb-0" data-pricing-value="400">€
                                                    <span class="price">400</span></div>
                                                <span class="h6 text-muted">full registration</span>
                                                <div class="h6 text-muted text-center mb-0 mt-4"
                                                    data-pricing-value="300">€ <span class="price">300</span> for single
                                                    day</div>

                                            </div>
                                            <div class="card-body">
                                                <ul class="list-unstyled mb-4">
                                                    <li>after June 25th 2020</li>
                                                    <li>Access to full programme</li>
                                                    <li>Invitation to conference dinner <sup>*</sup></li>
                                                    <li>Catering included</li>
                                                </ul>
                                                <a href="<?php echo $registrationURL;?>" target="_blank"
      
                                                    class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                            </div>
                                        </div>
                                        <div class="card card-pricing text-center border shadow-none hover-shadow mb-3">
                                            <div class="card-header py-5 border-0 delimiter-bottom">
                                                <span class="d-block h5 mb-4">Onsite Rate</span>
                                                <div class="h1 gieqsGold text-center mb-0" data-pricing-value="400">€
                                                    <span class="price">550</span></div>
                                                <span class="h6 text-muted">full registration</span>
                                                <div class="h6 text-muted text-center mb-0 mt-4"
                                                    data-pricing-value="300">€ <span class="price">450</span> for single
                                                    day</div>

                                            </div>
                                            <div class="card-body">
                                                <ul class="list-unstyled mb-4">
                                                    <li>after October 1st 2020</li>
                                                    <li>Access to full programme</li>
                                                    <li>Invitation to conference dinner <sup>*</sup></li>
                                                    <li>Catering included</li>
                                                </ul>
                                                <a href="<?php echo $registrationURL;?>" target="_blank"
      
                                                    class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                            </div>
                                        </div>
                                    </div>
                                
                                <div class="mt-6 mb-2 text-center">
                                    <div class="fluid-paragraph mt-3">
                                        <p class="lead lh-180"><sup>*</sup>conference dinner at extra cost</p>
                                    </div>
                                </div>
                            </div>
                            </div>

                    <!-- Specialist in Training Rates -->
                            <div id="ST" class="d-none">
                                <div class="pricing card-group flex-column flex-lg-row mb-3 shadow-none">
                                    <div
                                        class="card card-pricing text-center border shadow-none hover-shadow mb-2 popular scale-110">
                                        <div class="card-header py-5 border-0 delimiter-bottom">
                                            <span class="d-block h5 mb-4">Early Bird</span>
                                            <div class="h1 gieqsGold text-center mb-0" data-pricing-value="100">€ <span
                                                    class="price">100</span></div>
                                            <span class="h6 text-muted">full registration</span>
                                            <div class="h6 text-muted text-center mb-0 mt-4" data-pricing-value="75">€
                                                <span class="price">75</span> for single day</div>

                                        </div>
                                        <div class="card-body">
                                            <ul class="list-unstyled mb-4">
                                                <li>available until June 25th 2020</li>
                                                <li>Access to full programme</li>
                                                <li>Invitation to conference dinner <sup>*</sup></li>
                                                <li>Catering included</li>
                                            </ul>
                                            <a href="<?php echo $registrationURL;?>" target="_blank"
      
                                                    class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                        </div>
                                    </div>
                                    <div class="card card-pricing text-center mb-3">
                                        <div class="card-header py-5 border-0 delimiter-bottom">
                                            <span class="d-block h5 mb-4">Regular Rate</span>
                                            <div class="h1 gieqsGold text-center mb-0" data-pricing-value="175">€ <span
                                                    class="price">175</span></div>
                                            <span class="h6 text-muted">full registration</span>
                                            <div class="h6 text-muted text-center mb-0 mt-4" data-pricing-value="125">€
                                                <span class="price">125</span> for single day</div>

                                        </div>
                                        <div class="card-body">
                                            <ul class="list-unstyled mb-4">
                                                <li>after June 25th 2020</li>
                                                <li>Access to full programme</li>
                                                <li>Invitation to conference dinner <sup>*</sup></li>
                                                <li>Catering included</li>
                                            </ul>
                                            <a href="<?php echo $registrationURL;?>" target="_blank"
      
                                                    class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                        </div>
                                    </div>
                                    <div class="card card-pricing text-center border shadow-none hover-shadow mb-3">
                                        <div class="card-header py-5 border-0 delimiter-bottom">
                                            <span class="d-block h5 mb-4">Onsite Rate</span>
                                            <div class="h1 gieqsGold text-center mb-0" data-pricing-value="200">€ <span
                                                    class="price">200</span></div>
                                            <span class="h6 text-muted">full registration</span>
                                            <div class="h6 text-muted text-center mb-0 mt-4" data-pricing-value="150">€
                                                <span class="price">150</span> for single day</div>

                                        </div>
                                        <div class="card-body">
                                            <ul class="list-unstyled mb-4">
                                                <li>after October 1st 2020</li>
                                                <li>Access to full programme</li>
                                                <li>Invitation to conference dinner <sup>*</sup></li>
                                                <li>Catering included</li>
                                            </ul>
                                            <a href="<?php echo $registrationURL;?>" target="_blank"
      
                                                    class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                        </div>
                                    </div>
                                </div>
                            
                            <div class="mt-6 mb-2 text-center">
                                <div class="fluid-paragraph mt-3">
                                    <p class="lead lh-180"><sup>*</sup>conference dinner at extra cost</p>
                                </div>
                            </div>
                            </div>  

                            <div id="AHP" class="d-none">
                                <div class="pricing card-group flex-column flex-lg-row mb-3 shadow-none">
                                    <div
                                        class="card card-pricing text-center border shadow-none hover-shadow mb-2 popular scale-110">
                                        <div class="card-header py-5 border-0 delimiter-bottom">
                                            <span class="d-block h5 mb-4">Early Bird</span>
                                            <div class="h1 gieqsGold text-center mb-0" data-pricing-value="100">€ <span
                                                    class="price">100</span></div>
                                            <span class="h6 text-muted">full registration</span>
                                            <div class="h6 text-muted text-center mb-0 mt-4" data-pricing-value="75">€
                                                <span class="price">75</span> for single day</div>

                                        </div>
                                        <div class="card-body">
                                            <ul class="list-unstyled mb-4">
                                                <li>available until June 25th 2020</li>
                                                <li>Access to full programme</li>
                                                <li>Invitation to conference dinner <sup>*</sup></li>
                                                <li>Catering included</li>
                                            </ul>
                                            <a href="<?php echo $registrationURL;?>" target="_blank"
      
                                                    class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                        </div>
                                    </div>
                                    <div class="card card-pricing text-center mb-3">
                                        <div class="card-header py-5 border-0 delimiter-bottom">
                                            <span class="d-block h5 mb-4">Regular Rate</span>
                                            <div class="h1 gieqsGold text-center mb-0" data-pricing-value="175">€ <span
                                                    class="price">175</span></div>
                                            <span class="h6 text-muted">full registration</span>
                                            <div class="h6 text-muted text-center mb-0 mt-4" data-pricing-value="125">€
                                                <span class="price">125</span> for single day</div>

                                        </div>
                                        <div class="card-body">
                                            <ul class="list-unstyled mb-4">
                                                <li>after June 25th 2020</li>
                                                <li>Access to full programme</li>
                                                <li>Invitation to conference dinner <sup>*</sup></li>
                                                <li>Catering included</li>
                                            </ul>
                                            <a href="<?php echo $registrationURL;?>" target="_blank"
      
                                                    class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                        </div>
                                    </div>
                                    <div class="card card-pricing text-center border shadow-none hover-shadow mb-3">
                                        <div class="card-header py-5 border-0 delimiter-bottom">
                                            <span class="d-block h5 mb-4">Onsite Rate</span>
                                            <div class="h1 gieqsGold text-center mb-0" data-pricing-value="200">€ <span
                                                    class="price">200</span></div>
                                            <span class="h6 text-muted">full registration</span>
                                            <div class="h6 text-muted text-center mb-0 mt-4" data-pricing-value="150">€
                                                <span class="price">150</span> for single day</div>

                                        </div>
                                        <div class="card-body">
                                            <ul class="list-unstyled mb-4">
                                                <li>after October 1st 2020</li>
                                                <li>Access to full programme</li>
                                                <li>Invitation to conference dinner <sup>*</sup></li>
                                                <li>Catering included</li>
                                            </ul>
                                            <a href="<?php echo $registrationURL;?>" target="_blank"
      
                                                    class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                        </div>
                                    </div>
                                </div>
                            
                            <div class="mt-6 mb-2 text-center">
                                <div class="fluid-paragraph mt-3">
                                    <p class="lead lh-180"><sup>*</sup>conference dinner at extra cost</p>
                                </div>
                            </div>
                            </div>  

                            <div id="MS" class="d-none">
                                <div class="pricing card-group flex-column flex-lg-row mb-3 shadow-none">
                                    <div
                                        class="card card-pricing text-center border shadow-none hover-shadow mb-2 popular scale-110">
                                        <div class="card-header py-5 border-0 delimiter-bottom">
                                            <span class="d-block h5 mb-4">Early Bird</span>
                                            <div class="h1 gieqsGold text-center mb-0" data-pricing-value="65">€ <span
                                                    class="price">65</span></div>
                                            <span class="h6 text-muted">full registration</span>
                                            <div class="h6 text-muted text-center mb-0 mt-4" data-pricing-value="50">€
                                                <span class="price">50</span> for single day</div>

                                        </div>
                                        <div class="card-body">
                                            <ul class="list-unstyled mb-4">
                                                <li>available until June 25th 2020</li>
                                                <li>Access to full programme</li>
                                                <li>Invitation to conference dinner <sup>*</sup></li>
                                                <li>Catering included</li>
                                            </ul>
                                            <a href="<?php echo $registrationURL;?>" target="_blank"
      
                                                    class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                        </div>
                                    </div>
                                    <div class="card card-pricing text-center mb-3">
                                        <div class="card-header py-5 border-0 delimiter-bottom">
                                            <span class="d-block h5 mb-4">Regular Rate</span>
                                            <div class="h1 gieqsGold text-center mb-0" data-pricing-value="65">€ <span
                                                    class="price">65</span></div>
                                            <span class="h6 text-muted">full registration</span>
                                            <div class="h6 text-muted text-center mb-0 mt-4" data-pricing-value="50">€
                                                <span class="price">50</span> for single day</div>

                                        </div>
                                        <div class="card-body">
                                            <ul class="list-unstyled mb-4">
                                                <li>after June 25th 2020</li>
                                                <li>Access to full programme</li>
                                                <li>Invitation to conference dinner <sup>*</sup></li>
                                                <li>Catering included</li>
                                            </ul>
                                            <a href="<?php echo $registrationURL;?>" target="_blank"
      
                                                    class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                        </div>
                                    </div>
                                    <div class="card card-pricing text-center border shadow-none hover-shadow mb-3">
                                        <div class="card-header py-5 border-0 delimiter-bottom">
                                            <span class="d-block h5 mb-4">Onsite Rate</span>
                                            <div class="h1 gieqsGold text-center mb-0" data-pricing-value="65">€ <span
                                                    class="price">65</span></div>
                                            <span class="h6 text-muted">full registration</span>
                                            <div class="h6 text-muted text-center mb-0 mt-4" data-pricing-value="50">€
                                                <span class="price">50</span> for single day</div>

                                        </div>
                                        <div class="card-body">
                                            <ul class="list-unstyled mb-4">
                                                <li>after October 1st 2020</li>
                                                <li>Access to full programme</li>
                                                <li>Invitation to conference dinner <sup>*</sup></li>
                                                <li>Catering included</li>
                                            </ul>
                                            <a href="<?php echo $registrationURL;?>" target="_blank"
      
                                                    class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                        </div>
                                    </div>
                                </div>
                            
                            <div class="mt-6 mb-2 text-center">
                                <div class="fluid-paragraph mt-3">
                                    <p class="lead lh-180"><sup>*</sup>conference dinner at extra cost</p>
                                </div>
                            </div>
                            </div>  


                        </div>
                    </div>
                </div>
        </div>
        </section>
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



    </div>

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->

    <!-- Page JS -->
   <script src="../../assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <!-- Google maps -->
    <!-- Purpose JS -->
    <script src="../../assets/js/purpose.js"></script>


    <script>
    $(document).ready(function() {

      $('.selectorRole').click(function(){
       
        $(this).addClass('active'); //remove from other selectorRole members
        var target = $(this).attr('data-pricing');
        $('#'+target).removeClass('d-none');
        console.log('#'+target);

        $(this).siblings().each(function(){

          if($(this).hasClass('active')) {

            $(this).removeClass('active');

          }

          var target = $(this).attr('data-pricing');
          $('#'+target).addClass('d-none');

        })

      })

    })
    </script>
</body>

</html>