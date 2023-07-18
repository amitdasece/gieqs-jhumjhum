<style>
.modal-backdrop
{
    opacity:0.7 !important;
}
</style>

<!--Topbar-->
<div id="navbar-top-main" class="navbar-top border-bottom navbar-collapsed">
      <div class="container px-0">
        <div class="navbar-nav align-items-center">
          <div class="d-none d-lg-inline-block">
            <span class="navbar-text mr-3">The Sydney International Endoscopy Symposium</span>
          </div>
          <div>
            <ul class="nav">
              <!--<li class="nav-item dropdown ml-lg-2">
                <a class="nav-link px-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0,10">
                  <img alt="Image placeholder" src="assets/img/icons/flags/us.svg">
                  <span class="d-none d-lg-inline-block">United States</span>
                  <span class="d-lg-none">EN</span>
                </a>
                <div class="dropdown-menu dropdown-menu-sm">
                  <a href="#" class="dropdown-item"><img alt="Image placeholder" src="assets/img/icons/flags/es.svg">Spanish</a>
                  <a href="#" class="dropdown-item"><img alt="Image placeholder" src="assets/img/icons/flags/ro.svg">Romanian</a>
                  <a href="#" class="dropdown-item"><img alt="Image placeholder" src="assets/img/icons/flags/gr.svg">Greek</a>
                </div>
              </li>-->
            </ul>
          </div>
          <div class="ml-auto">
            <ul class="nav">
             
              <!-- <li class="nav-item">
                <a href="#" class="nav-link" data-action="omnisearch-open" data-target="#omnisearch"><i class="fas fa-search"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/shop/checkout-cart.html"><i class="fas fa-shopping-cart"></i></a>
              </li>
            -->
            
            <?php

              if (!isset($_SESSION['user_id']) || ($_SESSION['siteKey'] != 'TxsvAb6KDYpmdNk')){

            ?>

            
            <li class="nav-item">
                <a class="nav-link mr-4" href="<?php echo BASE_URL;?>/pages/support/support_gieqs_digital.php">Support</a>
              </li>
            <li class="nav-item">

            <?php $url_sies = '/pages/program/sies.php?id=171';?>
              <a class="nav-link" title="Login" href="<?php echo BASE_URL . '/pages/authentication/login.php?destination=' . urlencode($url_sies);?>"><i class="fas fa-user-plus mr-2"></i>Login</a>
            </li>

            

            <?php
              }

            //check page we are on

            /* $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            //if contains index.html

            if (strpos($actual_link, 'index.php') !== false) {
              echo '
              <li class="nav-item">
              <a class="nav-link" title="Registration" href="#" data-toggle="modal" data-target="#registerInterest"><i class="fas fa-user-plus"></i></a>
            </li>';
            }else{
              //otherwise
              echo '
              <li class="nav-item">
              <a class="nav-link" title="Registration" href="' . BASE_URL . '/index.php?signup=2456"><i class="fas fa-user-plus"></i></a>
            </li>'; 
              

            }*/

            

            



            ?>
            
            
            <?php
              $debug = $gigs_debug;
              if ($debug){

                echo 'Session user id is ' . $_SESSION['user_id'];
                echo 'Session site key is ' . $_SESSION['siteKey'];

              }

              if (isset($_SESSION['user_id']) && ($_SESSION['siteKey'] == 'TxsvAb6KDYpmdNk') ){



              

            ?>
            <li class="nav-item">
                <a class="nav-link mr-4" href="<?php echo BASE_URL;?>/pages/support/support.php">Support</a>
              </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user-circle"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                  
                  <h6 class="dropdown-header"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['surname']?></h6>
                  <a class="dropdown-item" href="<?php echo BASE_URL . '/pages/learning/pages/account/profile.php'?>">
                    <i class="fas fa-user"></i>Account
                  </a>
                 
                  <a class="dropdown-item" href="<?php echo BASE_URL . '/pages/learning/pages/account/settings.php'?>">
                    <i class="fas fa-cog"></i>Settings
                  </a>
                  <div class="dropdown-divider" role="presentation"></div>
                  <a id="logout" class="dropdown-item" href="#">
                    <i class="fas fa-sign-out-alt"></i>Sign out
                  </a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <span class="nav-link">Logged In</span>
              </li>
            
              <?php

              }
?>
              
            </ul>
          </div>
        </div>
      </div>
    </div>

   