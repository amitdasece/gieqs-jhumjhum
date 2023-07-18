<?php

//require '../../includes/config.inc.php';	


$url =  "{$_SERVER['REQUEST_URI']}";
                    $highlightComplex = preg_match (  '/complex/' ,  $url);
                    $highlightProgram = preg_match (  '/program/' ,  $url);
                    $highlightPlenary = preg_match (  '/plenary/' ,  $url);
                    $highlightNursing = preg_match (  '/nursing/' ,  $url);
                  
         


?>


<nav class="mt-10 navbar navbar-horizontal navbar-expand-lg navbar-dark gieqsGold" style="z-index: 1 !important;">
    <div class="container">
        <a class="navbar-brand"
            href="<?php echo BASE_URL; ?>/pages/learning/index.php"><?php echo 'Global Polypectomy Assessment Tool';?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-warning"
            aria-controls="navbar-warning" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-warning">
            <ul class="navbar-nav align-items-lg-center ml-lg-auto">



                

                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="<?php echo BASE_URL;?>/pages/learning/pages/scores/dashboard-gpat.php">

                        <span class="nav-link-inner--text ">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="<?php echo BASE_URL;?>/pages/learning/pages/scores/logbook-gpat.php">

                        <span class="nav-link-inner--text ">Logbook</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="<?php echo BASE_URL;?>/pages/learning/pages/scores/technique.php">

                        <span class="nav-link-inner--text ">Enter New Assessment</span>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link nav-link-icon">

                        <span class="nav-link-inner--text ">Request New Assessment</span>
                    </a>
                </li> -->

                <li class="nav-item">
                <a class="nav-link nav-link-icon" href="<?php echo BASE_URL;?>/pages/learning/pages/scores/help-gpat.php">

                        <span class="nav-link-inner--text ">Help</span>
                    </a>
                </li>


            </ul>

        </div>
    </div>
</nav>

<?php //require BASE_URI . '/assets/scripts/purchase.php';?>