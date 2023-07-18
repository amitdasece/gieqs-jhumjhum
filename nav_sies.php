<!--Main Navbar-->
<style>

  /* .navbar-nav {

    overflow-y:scroll;

  } */

</style>

<?php 



//TESTING

//access planning for GIEQs III

//require_once BASE_URI . '/pages/learning/includes/gieqs_iii_settings.php';



?>

<nav class="navbar navbar-main navbar-expand-lg navbar-transparent navbar" id="navbar-main">
    <div class="container px-lg-0">
        <!-- Logo -->
        <a class="navbar-brand mr-lg-5" href="<?php echo BASE_URL;?>/pages/program/sies.php?id=171">
            <img alt="Image placeholder" src="<?php echo BASE_URL;?>/assets/img/brand/sies.png" id="navbar-logo"
                style="height: 50px;">
        </a>
        <!-- Navbar collapse trigger -->
        <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="#navbar-main-collapse"
            aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
           
            <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
        </button>
        <!-- Navbar nav -->
        <div class="collapse navbar-collapse" id="navbar-main-collapse">
            <ul class="navbar-nav align-items-lg-center">
            
                
               <!--  <li class="nav-item active">
                    <a class="nav-link" href="https://assocprof.eventsair.com/sies-2023/program">Program</a>
                </li> -->

                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo BASE_URL;?>/pages/program/sies.php?id=171">Virtual Registration</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="https://www.sies.org.au/14-annual-event-2023/">In-Person Registration</a>
                </li>

                <?php 
                
                if ($userid){

                    $access_symposium = $assetManager->is_assetid_covered_by_user_subscription('171', $userid, $debug, $fullAccess);

                }else{

                    $access_symposium = false;

                }

                if ($access_symposium){

                    $url_symposium = BASE_URL . '/pages/learning/pages/general/show_subscription_sies.php?assetid=171';

                }else{

                    $url_symposium = BASE_URL . '/pages/program/sies.php?id=171';
   
                }

 ?>

                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo $url_symposium;?>">SIES Symposium Catch-up</a>
                </li>

                <?php 
                
                if ($userid){

                    $access_series = $assetManager->is_assetid_covered_by_user_subscription('172', $userid, $debug, $fullAccess);

                }else{

                    $access_series = false;

                }

                if ($access_series){

                    $url_series = BASE_URL . '/pages/learning/pages/general/show_subscription_sies.php?assetid=172';

                }else{

                    $url_series = BASE_URL . '/pages/program/sies.php?id=172';
   
                }

 ?>

                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo $url_series;?>">SIES Series II</a>
                </li>

               <!--  <li class="nav-item active">
                    <a class="nav-link" href="#">Catch-up</a>
                </li> -->

                <!-- link  -->
                <!-- Home - Overview  -->
                <!--<li class="nav-item active">
              <a class="nav-link" href="<?php echo BASE_URL;?>/index.php">Overview</a>
            </li>-->
          
               
            </ul>
        </div>
    </div>
</nav>

