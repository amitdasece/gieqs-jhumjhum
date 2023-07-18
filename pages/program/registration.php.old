<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>

<head>

    <?php

//define user access level

$openaccess = 1;

require BASE_URI . '/headNoPurposeCore.php';
//$registrationURL = BASE_URL . '/pages/program/online.php?id=2456';

$registrationURL = 'https://eu.eventscloud.com/200200203';

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
    <section class="slice slice-lg bg-cover bg-size--cover mt-10" style="background-image: url(&quot;<?php echo BASE_URL?>/assets/img/backgrounds/endoscopy_tall_blue.jpg&quot;); background-position: center center; padding-top: 150px;">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="card py-5 px-4 box-shadow-3 mt-0">
                <div class="card-body">
                  <h6 class="h2">
                    <?php if (!$past){?>

                    <strong>Reserve </strong> your place now!
                  </h6>
                  <p class="lead lh-180">Thanks to the extremely generous support of our partners registration for GIEQs is now <a href="#pricing" class='gieqsGold'>dramatically reduced in price</a> since the event will be fully digital!</p>
                  <p class="lead lh-180">You can still register for the congress, even as it is progressing.  We will get your registration working within 10-15 minutes of payment!</p>

                  <p class="lead lh-180">Once you register you will gain access to our unique learning site <a href="<?php echo BASE_URL;?>/pages/program/online.php" class='gieqsGold'>GIEQs Online</a>.
                      You will be registered for updates on GIEQs via email and will be notified of your unique link to view the entire event on October 7 / 8 2020.</p>
                      <p class="lead lh-180">You will also receive complimentary access to GIEQs Online basic from its launch until one month after the event, containing all the content from GIEQs and a selection of our curated learning material.</p>
                      <p class="lead lh-180">Welcome to the GIEQs family.  Let's do everyday endoscopy better!</p>
                  <div class="btn-container mt-5">
                    <?php }else{?>

                        <strong>Register </strong> for on demand now!
                    </h6>
                    <p class="lead lh-180">Thanks to the extremely generous support of our partners registration for GIEQs catch up is now <a href="#pricing" class='gieqsGold'>dramatically reduced in price</a> since the event was fully digital!</p>
                    <p class="lead lh-180">You can still register for the catch up.  We will get your registration processed ASAP and contact you after payment!</p>
  
                    <p class="lead lh-180">Once you register you will gain access to our unique learning site <a href="<?php echo BASE_URL;?>/pages/program/online.php" class='gieqsGold'>GIEQs Online containing all the material from GIEQs</a>.
                        </p>
                        <p class="lead lh-180">You will also receive complimentary access to GIEQs Online basic from its launch until one month after the event, containing all the content from GIEQs and a selection of our curated learning material.</p>
                        <p class="lead lh-180">Welcome to the GIEQs family.  Let's do everyday endoscopy better!</p>
                    <div class="btn-container mt-5">

                        <?php }?>


                  <?php if ($liveAccess){

                                $requiredArray = ['23', '29', '25', '30', '31'];

                                //print_r($requiredArray);

                                //print_r($liveAccess);


                                $bFound = (count(array_intersect($liveAccess, $requiredArray))) ? true : false;

                                //if (in_array($liveAccess, 25)){
                                }else{

                                    $bFound = false;
                                }

?>

                    <a href="<?php if (isset($_SESSION['user_id']) && $bFound){echo '';}else{echo $registrationURL;}?>"
                        class="btn gieqsGoldBack text-dark mt-2 rounded-pill hover-translate-y-n3">
                        Register now ->
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <?php if (!$past){?>
      <section id="pricing" class="slice slice-lg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="mb-5 text-center">
                        <h3 class="mt-2">Registration</h3>
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
                                            <span class="price">100</span></div>
                                        <span class="h6 text-muted">full registration</span>
                                        <div class="h6 text-muted text-center mb-0 mt-4"
                                            data-pricing-value="200">€ <span class="price">75</span> for single
                                            day</div>

                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled mb-4">
                                            <li>available until September 24th 2020</li>
                                            <li>Access to full programme</li>
                                            <li>GIEQs online access<sup>*</sup></li>
                                            
                                        </ul>
                                        <a href="<?php echo $registrationURL;?>" target="_blank"

                                            class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                    </div>
                                </div>
                                <div class="card card-pricing text-center mb-3">
                                    <div class="card-header py-5 border-0 delimiter-bottom">
                                        <span class="d-block h5 mb-4">Regular Rate</span>
                                        <div class="h1 gieqsGold text-center mb-0" data-pricing-value="400">€
                                            <span class="price">125</span></div>
                                        <span class="h6 text-muted">full registration</span>
                                        <div class="h6 text-muted text-center mb-0 mt-4"
                                            data-pricing-value="300">€ <span class="price">100</span> for single
                                            day</div>

                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled mb-4">
                                            <li>available from September 24th 2020</li>
                                            <li>Access to full programme</li>
                                            <li>GIEQs online access<sup>*</sup></li>
                                        </ul>
                                        <a href="<?php echo $registrationURL;?>" target="_blank"

                                            class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                    </div>
                                </div>
                                
                            </div>
                        
                        <div class="mt-6 mb-2 text-center">
                            <div class="fluid-paragraph mt-3">
                                <p class="lead lh-180"><sup>*</sup>access lasts from launch until 1 month after GIEQs</p>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->

            <!-- Specialist in Training Rates -->
                    <div id="ST" class="d-none">
                        <div class="pricing card-group flex-column flex-lg-row mb-3 shadow-none">
                            <div
                                class="card card-pricing text-center border shadow-none hover-shadow mb-2 popular scale-110">
                                <div class="card-header py-5 border-0 delimiter-bottom">
                                    <span class="d-block h5 mb-4">Early Bird</span>
                                    <div class="h1 gieqsGold text-center mb-0" data-pricing-value="250">€
                                        <span class="price">50</span></div>
                                    <span class="h6 text-muted">full registration</span>
                                    <div class="h6 text-muted text-center mb-0 mt-4"
                                        data-pricing-value="200">€ <span class="price">35</span> for single
                                        day</div>

                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-4">
                                        <li>available until September 24th 2020</li>
                                        <li>Access to full programme</li>
                                        <li>GIEQs online access<sup>*</sup></li>
                                        
                                    </ul>
                                    <a href="<?php echo $registrationURL;?>" target="_blank"

                                        class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                </div>
                            </div>
                            <div class="card card-pricing text-center mb-3">
                                <div class="card-header py-5 border-0 delimiter-bottom">
                                    <span class="d-block h5 mb-4">Regular Rate</span>
                                    <div class="h1 gieqsGold text-center mb-0" data-pricing-value="400">€
                                        <span class="price">75</span></div>
                                    <span class="h6 text-muted">full registration</span>
                                    <div class="h6 text-muted text-center mb-0 mt-4"
                                        data-pricing-value="300">€ <span class="price">50</span> for single
                                        day</div>

                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-4">
                                        <li>available from September 24th 2020</li>
                                        <li>Access to full programme</li>
                                        <li>GIEQs online access<sup>*</sup></li>
                                    </ul>
                                    <a href="<?php echo $registrationURL;?>" target="_blank"

                                        class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                </div>
                            </div>
                            
                        </div>
                    
                    <div class="mt-6 mb-2 text-center">
                        <div class="fluid-paragraph mt-3">
                            <p class="lead lh-180"><sup>*</sup>access lasts from launch until 1 month after GIEQs, proof of status required for reduced registration rate</p>
                        </div>
                    </div>
                </div>
                    <!-- </div>   -->

                    <div id="AHP" class="d-none">
                        <div class="pricing card-group flex-column flex-lg-row mb-3 shadow-none">
                            <div
                                class="card card-pricing text-center border shadow-none hover-shadow mb-2 popular scale-110">
                                <div class="card-header py-5 border-0 delimiter-bottom">
                                    <span class="d-block h5 mb-4">Early Bird</span>
                                    <div class="h1 gieqsGold text-center mb-0" data-pricing-value="250">€
                                        <span class="price">35</span></div>
                                    <span class="h6 text-muted">full registration</span>
                                    

                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-4">
                                        <li>available until September 24th 2020</li>
                                        <li>Access to full programme</li>
                                        <li>GIEQs online access<sup>*</sup></li>
                                        
                                    </ul>
                                    <a href="<?php echo $registrationURL;?>" target="_blank"

                                        class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                </div>
                            </div>
                            <div class="card card-pricing text-center mb-3">
                                <div class="card-header py-5 border-0 delimiter-bottom">
                                    <span class="d-block h5 mb-4">Regular Rate</span>
                                    <div class="h1 gieqsGold text-center mb-0" data-pricing-value="400">€
                                        <span class="price">50</span></div>
                                    <span class="h6 text-muted">full registration</span>
                                    

                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-4">
                                        <li>available from September 24th 2020</li>
                                        <li>Access to full programme</li>
                                        <li>GIEQs online access<sup>*</sup></li>
                                    </ul>
                                    <a href="<?php echo $registrationURL;?>" target="_blank"

                                        class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                </div>
                            </div>
                            
                        </div>
                    
                    <div class="mt-6 mb-2 text-center">
                        <div class="fluid-paragraph mt-3">
                            <p class="lead lh-180"><sup>*</sup>access lasts from launch until 1 month after GIEQs, proof of status required for reduced registration rate</p>
                        </div>
                    </div>
                </div>
                   <!--  </div>   -->

                    <div id="MS" class="d-none">
                        <div class="pricing card-group flex-column flex-lg-row mb-3 shadow-none">
                            <div
                                class="card card-pricing text-center border shadow-none hover-shadow mb-2 popular scale-110">
                                <div class="card-header py-5 border-0 delimiter-bottom">
                                    <span class="d-block h5 mb-4">Early Bird</span>
                                    <div class="h1 gieqsGold text-center mb-0" data-pricing-value="250">€
                                        <span class="price">25</span></div>
                                    <span class="h6 text-muted">full registration</span>
                                    <div class="h6 text-muted text-center mb-0 mt-4"
                                        data-pricing-value="200">€ <span class="price">15</span> for single
                                        day</div>

                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-4">
                                        <li>available until September 24th 2020</li>
                                        <li>Access to full programme</li>
                                        <li>GIEQs online access<sup>*</sup></li>
                                        
                                    </ul>
                                    <a href="<?php echo $registrationURL;?>" target="_blank"

                                        class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                </div>
                            </div>
                            <div class="card card-pricing text-center mb-3">
                                <div class="card-header py-5 border-0 delimiter-bottom">
                                    <span class="d-block h5 mb-4">Regular Rate</span>
                                    <div class="h1 gieqsGold text-center mb-0" data-pricing-value="400">€
                                        <span class="price">25</span></div>
                                    <span class="h6 text-muted">full registration</span>
                                    <div class="h6 text-muted text-center mb-0 mt-4"
                                        data-pricing-value="300">€ <span class="price">20</span> for single
                                        day</div>

                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-4">
                                        <li>available from September 24th 2020</li>
                                        <li>Access to full programme</li>
                                        <li>GIEQs online access<sup>*</sup></li>
                                    </ul>
                                    <a href="<?php echo $registrationURL;?>" target="_blank"

                                        class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                </div>
                            </div>
                            
                        </div>
                    
                    <div class="mt-6 mb-2 text-center">
                        <div class="fluid-paragraph mt-3">
                            <p class="lead lh-180"><sup>*</sup>access lasts from launch until 1 month after GIEQs, proof of status required for reduced registration rate</p>
                        </div>
                    </div>
                </div>
                  <!--   </div> -->  


                </div>
            </div>
        </div>
</div>
</section>
<?php }else{?>
    <section id="pricing" class="slice slice-lg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="mb-5 text-center">
                        <h3 class="mt-2">Registration for Catch Up On Demand</h3>
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
                                        <span class="d-block h5 mb-4">Access to All Material</span>
                                        <div class="h1 gieqsGold text-center mb-0" data-pricing-value="250">€
                                            <span class="price">100</span></div>
                                        

                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled mb-4">
                                            <li>available until December 9th 2020</li>
                                            <li>Access to full programme</li>
                                            <li>GIEQs online access<sup>*</sup></li>
                                            
                                        </ul>
                                        <a href="<?php echo $registrationURL;?>" target="_blank"

                                            class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                    </div>
                                </div>
                                
                                
                            </div>
                        
                        <div class="mt-6 mb-2 text-center">
                            <div class="fluid-paragraph mt-3">
                                <p class="lead lh-180"><sup>*</sup>access lasts from launch until 1 month after GIEQs</p>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->

            <!-- Specialist in Training Rates -->
                    <div id="ST" class="d-none">
                        <div class="pricing card-group flex-column flex-lg-row mb-3 shadow-none">
                            <div
                                class="card card-pricing text-center border shadow-none hover-shadow mb-2 popular scale-110">
                                <div class="card-header py-5 border-0 delimiter-bottom">
                                    <span class="d-block h5 mb-4">Access all Material</span>
                                    <div class="h1 gieqsGold text-center mb-0" data-pricing-value="250">€
                                        <span class="price">50</span></div>
                                    

                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-4">
                                        <li>available until December 9th 2020</li>
                                        <li>Access to full programme</li>
                                        <li>GIEQs online access<sup>*</sup></li>
                                        
                                    </ul>
                                    <a href="<?php echo $registrationURL;?>" target="_blank"

                                        class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                </div>
                            </div>
                            
                            
                        </div>
                    
                    <div class="mt-6 mb-2 text-center">
                        <div class="fluid-paragraph mt-3">
                            <p class="lead lh-180"><sup>*</sup>access lasts from launch until 1 month after GIEQs, proof of status required for reduced registration rate</p>
                        </div>
                    </div>
                </div>
                    <!-- </div>   -->

                    <div id="AHP" class="d-none">
                        <div class="pricing card-group flex-column flex-lg-row mb-3 shadow-none">
                            <div
                                class="card card-pricing text-center border shadow-none hover-shadow mb-2 popular scale-110">
                                <div class="card-header py-5 border-0 delimiter-bottom">
                                    <span class="d-block h5 mb-4">Access All Material</span>
                                    <div class="h1 gieqsGold text-center mb-0" data-pricing-value="250">€
                                        <span class="price">35</span></div>
                                    
                                    

                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-4">
                                        <li>available until December 9th 2020</li>
                                        <li>Access to full programme</li>
                                        <li>GIEQs online access<sup>*</sup></li>
                                        
                                    </ul>
                                    <a href="<?php echo $registrationURL;?>" target="_blank"

                                        class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                </div>
                            </div>
                            
                            
                        </div>
                    
                    <div class="mt-6 mb-2 text-center">
                        <div class="fluid-paragraph mt-3">
                            <p class="lead lh-180"><sup>*</sup>access lasts from launch until 1 month after GIEQs, proof of status required for reduced registration rate</p>
                        </div>
                    </div>
                </div>
                   <!--  </div>   -->

                    <div id="MS" class="d-none">
                        <div class="pricing card-group flex-column flex-lg-row mb-3 shadow-none">
                            <div
                                class="card card-pricing text-center border shadow-none hover-shadow mb-2 popular scale-110">
                                <div class="card-header py-5 border-0 delimiter-bottom">
                                    <span class="d-block h5 mb-4">Access All Material</span>
                                    <div class="h1 gieqsGold text-center mb-0" data-pricing-value="250">€
                                        <span class="price">25</span></div>
                                    

                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-4">
                                        <li>available until December 9th 2020</li>
                                        <li>Access to full programme</li>
                                        <li>GIEQs online access<sup>*</sup></li>
                                        
                                    </ul>
                                    <a href="<?php echo $registrationURL;?>" target="_blank"

                                        class="btn btn-sm gieqsGold btn-neutral mb-3">Register</a>
                                </div>
                            </div>
                            
                            
                        </div>
                    
                    <div class="mt-6 mb-2 text-center">
                        <div class="fluid-paragraph mt-3">
                            <p class="lead lh-180"><sup>*</sup>access lasts from launch until 1 month after GIEQs, proof of status required for reduced registration rate</p>
                        </div>
                    </div>
                </div>
                  <!--   </div> -->  


                </div>
            </div>
        </div>
</div>
</section>

    <?php }?>
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
                        <a href="<?php if (isset($_SESSION['user_id'])){echo '';}else{echo $registrationURL;}?>" 
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
    <script src="../../assets/js/purpose.core.js"></script> 
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>   

    <!-- Page JS -->
   <script src="../../assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <!-- Google maps -->
    <!-- Purpose JS -->


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