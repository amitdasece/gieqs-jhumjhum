<!--Main Navbar-->
<style>

  /* .navbar-nav {

    overflow-y:scroll;

  } */

</style>

<?php 



require_once BASE_URI . '/assets/scripts/classes/users.class.php';
$users = new users;
//var_dump($user_id);
require_once BASE_URI . '/assets/scripts/classes/programme.class.php';
$programme = new programme;
//$sessionView = new sessionView;
require_once BASE_URI . '/assets/scripts/classes/sessionView.class.php';
$sessionView = new sessionView;
//error_reporting(E_ALL);


require_once BASE_URI . "/vendor/autoload.php";
spl_autoload_unregister ('class_loader');

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
$options = new QROptions([
	'version'    => 7,
	'outputType' => QRCode::OUTPUT_MARKUP_SVG,
  'eccLevel'   => QRCode::ECC_L,
  'cssClass' => 'gieqsGold',
  'svgOpacity' => 50,
  'scale' => 3,
]);
$qrcode = new QRCode($options);
spl_autoload_register ('class_loader');

//TESTING

//access planning for GIEQs III

require_once BASE_URI . '/pages/learning/includes/gieqs_iii_settings.php';



?>

<nav class="navbar navbar-main navbar-expand-lg navbar-transparent <?php if (isset($light_theme)){ echo $light_theme ?  '' : 'navbar-dark bg-dark';} ?> " id="navbar-main">
    <div class="container px-lg-0">
        <!-- Logo -->
        <a class="navbar-brand mr-lg-5" href="<?php echo BASE_URL;?>/index.php">
            <img alt="Image placeholder" src="<?php echo BASE_URL;?>/assets/img/brand/gieqs_foundation_logo.png" id="navbar-logo"
                style="height: 50px;">
        </a>
        <!-- Navbar collapse trigger -->
        <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="#navbar-main-collapse"
            aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon"></span> -->
            <i class="fas fa-bars text-white"></i>
        </button>
        <!-- Navbar nav -->
        <div class="collapse navbar-collapse" id="navbar-main-collapse">
            <ul class="navbar-nav align-items-lg-center">
            <li class="nav-item active">
                    <a class="nav-link" href="<?php echo BASE_URL;?>/blog">Blog</a>
                </li>
                <!-- Home - Overview  -->
                <!--<li class="nav-item active">
              <a class="nav-link" href="<?php echo BASE_URL;?>/index.php">Overview</a>
            </li>-->
            <!-- LIVE -->

            <?php if ((isset($_SESSION['user_id'])) && ($_SESSION['siteKey'] == 'TxsvAb6KDYpmdNk')){ 
              
              //load user from key
              $liveAndLoggedIn = true;

              $debug=$gigs_debug;
              $serverTimeZoneNav = new DateTimeZone('Europe/Brussels'); //because this is where course is held
              $currentNavTime = new DateTime('now', $serverTimeZoneNav);
              //$currentNavTime = new DateTime('2020-11-17', $serverTimeZoneNav); //TESTING



              if ($users->Return_row($userid)){


                  $programmes = $sessionView->returnLiveProgrammesArray($currentNavTime, $debug);

                  //test users

                  if ($debug){

                    print_r($programmes);

                  }

                  if (!$programmes){

                    if ($debug){

                      echo 'no programmes';
  
                    }

                    if (in_array($userid, $liveTestingUsers)){

                      if ($test){

                      $currentNavTime = new DateTime('2020-12-17', $serverTimeZoneNav); //TESTING
                      $programmes = $sessionView->returnLiveProgrammesArray($currentNavTime, $debug);

                      }

                    }

                  }

                //just use the first programme that day.  modify later if others required

                if (isset($programmes345) && ($programmes345 === true)){   //if $programmes previously so now disabled

                  $access3 = $assetManager->programme_owned_by_user($programmes[0]['programmeid'], $userid, $debug);

                  if ($access3){
                    //user has access to the programme with id $programmes[0]['programmeid']

                    require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
                    $assets_paid = new assets_paid;

                    //get the asset id

                    $asset_id = $assetManager->returnAssetProgrammes($programmes[0]['programmeid']);
                    $programme->Load_from_key($programmes[0]['programmeid']);

                    
                    if ($debug){
                      print_r($asset_id);

                    }

                    $assets_paid->Load_from_key($asset_id[0]);


                    ?>

<li class="nav-item dropdown dropdown-animate" data-toggle="hover">
              <a class="nav-link dropdown-toggle animated bounce" style="color: rgb(238, 194, 120);" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $assets_paid->getname();?></a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-arrow p-0">
                <ul class="list-group list-group-flush">
                 <li class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                    <a href="#" class="list-group-item list-group-item-action dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <div class="media d-flex align-items-center">
                       
                        <figure style="width: 50px;">
                          <svg width="100%" height="100%" viewBox="0 0 328 284" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><path d="M96.367,205.433l135.015,0c12.588,0 -10.619,-55.25 -10.619,-55.25c-1.375,-3.287 -4.68,-5.395 -7.842,-6.69l-21.35,-9.83l-10.258,-8.649l-16.482,16.392l-0.012,0l7.111,47.547c0.023,0.165 -0.016,0.329 -0.114,0.464l-7.435,10.178c-0.12,0.162 -0.309,0.258 -0.51,0.258c-0.201,0 -0.39,-0.096 -0.507,-0.258l-7.438,-10.178c-0.098,-0.135 -0.139,-0.299 -0.113,-0.464l7.111,-47.547l-0.011,0l-16.481,-16.392l-10.257,8.649l-21.35,9.83c-3.158,1.295 -6.263,3.264 -7.843,6.69c0.003,0 -23.202,55.25 -10.615,55.25Z" style="fill:#eec278;fill-rule:nonzero;"/><path d="M163.875,129.409c16.285,0 38.131,-20.346 38.501,-54.462c0.236,-23.674 -11.038,-37.841 -38.501,-37.841c-27.464,0 -38.742,14.167 -38.501,37.842c0.369,34.116 19.442,54.461 38.501,54.461Zm-7.74,-44.954c19.91,2.121 37.271,-25.726 36.988,-0.793c-0.168,14.924 -14.012,37.462 -29.245,37.462c-15.988,0 -27.021,-18.731 -29.247,-37.454c-2.413,-20.306 34.859,-15.679 21.504,0.785Z" style="fill:#eec278;fill-rule:nonzero;"/><path d="M312.75,0l-297.75,0c-8.285,0 -15,6.715 -15,15l0,212.539c0,8.285 6.716,15 15,15l297.75,0c8.284,0 15,-6.715 15,-15l0,-212.539c0,-8.285 -6.716,-15 -15,-15Zm-7.5,220.039l-282.75,0l0,-197.539l282.75,0l0,197.539Z" style="fill:#eec278;fill-rule:nonzero;"/><path d="M0,266.394c0,4.576 3.709,8.287 8.285,8.287l79.775,0l0,-16.573l-79.775,0c-4.575,0 -8.285,3.71 -8.285,8.286Z" style="fill:#eec278;fill-rule:nonzero;"/><path d="M319.464,258.108l-199.349,0l0,16.574l199.349,0c4.576,0 8.286,-3.711 8.286,-8.287c0,-4.578 -3.71,-8.287 -8.286,-8.287Z" style="fill:#eec278;fill-rule:nonzero;"/><path d="M104.09,249.423c-5.495,0 -9.965,4.471 -9.965,9.964l0,14.013c0,5.494 4.47,9.965 9.965,9.965c5.493,0 9.962,-4.471 9.962,-9.965l0,-14.012c0,-5.494 -4.469,-9.965 -9.963,-9.965Z" style="fill:#eec278;fill-rule:nonzero;"/></svg>
                        </figure>
                        
                        <div class="media-body ml-3">
                          <h6 class="mb-1">Live Stream</h6>
<!--                           <p class="mb-0">2 streams. <br/><strong>Plenary</strong>- focussed on everyday endoscopy. <br/><strong>Complex</strong> - focussed on the next steps</p>

 -->                       
 <p class="mb-0"><strong><?php echo $assets_paid->getname();?></strong></p>
</div>
                      </div>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                          <?php  ?>
    
                        <a class="dropdown-item"
                            href="<?php echo BASE_URL;?>/pages/learning/pages/live/course.php?assetid=<?php echo $asset_id[0];?>">
                            <span class="badge badge-pill bg-gieqsGold text-dark badge-floating border-dark mr-2">LIVE</span>

    
                           
                          Access High Quality Stream
                        </a>

                        <?php if ($programme->geturl_zoom() != ''){?>

                        <a class="dropdown-item"
                            href="<?php echo $programme->geturl_zoom();?>">
                            <span class="badge badge-pill bg-gieqsGold text-dark badge-floating border-dark mr-2">LIVE</span>

    
                           
                          Access Interactive Zoom Stream (lower image quality)
                        </a>

                        <?php }?>
                      </li>
                    
                       
                    
                    </ul>
                  </li>
                  <li class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                    <a href="#" class="list-group-item list-group-item-action dropdown-toggle" aria-haspopup="true" aria-expanded="false" role="button" data-toggle="dropdown">
                      <div class="media d-flex align-items-center">
                        <!-- SVG icon -->
                        <figure style="width: 50px;">
                        <svg width="100%" height="100%" viewBox="0 0 384 314" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><rect x="42.272" y="68.468" width="80.104" height="22.813" style="fill:#edc1c0;"/><rect x="42.272" y="108.671" width="118.863" height="22.813" style="fill:#edc1c0;"/><rect x="42.272" y="148.868" width="118.863" height="22.813" style="fill:#edc1c0;"/><rect x="42.272" y="189.065" width="118.863" height="22.813" style="fill:#edc1c0;"/><path d="M292.139,0l-19.684,0l-22.813,0l-249.642,0l0,280.349l249.643,0l0,33.4l32.654,-18.266l32.655,18.266l0,-33.4l69.048,0l0,-280.349l-69.048,0l-22.813,0Zm-111.545,257.537l-157.781,0l0,-234.724l157.781,0l0,234.724Zm69.049,-189.067l-26.776,0l0,22.813l26.776,0l0,17.385l-26.776,0l0,22.813l26.776,0l0,17.386l-26.776,0l0,22.813l26.776,0l0,17.385l-26.776,0l0,22.813l26.776,0l0,45.657l-46.236,0l0,-234.722l46.236,0l0,45.657Zm42.497,206.379l-9.842,-5.506l-9.842,5.505l0,-252.035l19.684,0l0,252.036Zm69.047,-17.312l-46.235,0l0,-45.657l26.775,0l0,-22.813l-26.775,0l0,-17.386l26.775,0l0,-22.813l-26.775,0l0,-17.385l26.775,0l0,-22.813l-26.775,0l0,-17.386l26.775,0l0,-22.813l-26.775,0l0,-45.658l46.235,0l0,234.724Z" style="fill:#eec278;fill-rule:nonzero;"/></svg>
                        </figure>
                        <!-- Media body -->
                        <div class="media-body ml-3">
                          <h6 class="mb-1">Programme</h6>
                          <p class="mb-0" >See the schedule for this course.</p>
                        </div>
                      </div>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- <li>
                        <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/learning/pages/live/programLive.php">
                          View the programme
                        </a>
                      </li> -->

                      <li>
                        <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/learning/pages/live/programLiveGeneric.php?assetid=<?php echo $asset_id[0];?>">
                        <?php echo $assets_paid->getname();?> Live Programme
                        </a>
                      </li>
                    
                    </ul>
                  </li>

                  <!--Sponsors Menu-->
                  <!-- <li class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                    <a href="#" class="list-group-item list-group-item-action dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <div class="media d-flex align-items-center">
                        <figure style="width: 50px;">
                          <svg width="100%" height="100%" viewBox="0 0 36 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><path d="M23.804,4.718c-0.083,-0.084 -0.187,-0.144 -0.298,-0.18l-6.732,-2.113c-2.691,-0.845 -4.443,0.629 -4.914,1.102c-0.276,0.276 -0.486,0.566 -0.594,0.819l-2.999,7.053c-0.172,0.403 -0.113,0.941 0.156,1.477c0.386,0.766 1.08,1.318 1.91,1.517c0.93,0.222 1.893,-0.08 2.648,-0.834c0.197,-0.197 0.365,-0.414 0.464,-0.599l1.008,-1.87c0.166,-0.309 0.407,-0.63 0.66,-0.884c0.865,-0.865 1.276,-0.469 1.451,-0.301c1.508,1.455 9.415,9.396 9.415,9.396c0.281,0.282 0.223,0.815 -0.129,1.166c-0.351,0.35 -0.885,0.41 -1.165,0.13l-2.222,-2.22c-0.286,-0.288 -0.748,-0.288 -1.035,0c-0.286,0.284 -0.286,0.748 0,1.034l2.222,2.222c0.28,0.28 0.222,0.813 -0.129,1.163c-0.351,0.352 -0.886,0.411 -1.165,0.131l-2.222,-2.221c-0.287,-0.286 -0.75,-0.286 -1.035,0c-0.287,0.284 -0.287,0.749 0,1.035l2.221,2.222c0.281,0.28 0.22,0.813 -0.13,1.164c-0.351,0.351 -0.884,0.411 -1.165,0.129l-2.222,-2.22c-0.285,-0.286 -0.749,-0.286 -1.035,0c-0.285,0.285 -0.285,0.75 0,1.034l2.222,2.222c0.281,0.281 0.221,0.815 -0.129,1.166c-0.353,0.351 -0.886,0.41 -1.166,0.129l-2.704,-2.706c0.386,-0.581 0.281,-1.423 -0.292,-1.998c-0.642,-0.642 -1.63,-0.701 -2.201,-0.128c0.571,-0.572 0.515,-1.558 -0.128,-2.201c-0.644,-0.642 -1.629,-0.701 -2.201,-0.13c0.572,-0.571 0.514,-1.557 -0.13,-2.199c-0.642,-0.643 -1.628,-0.702 -2.201,-0.13c0.573,-0.572 0.514,-1.557 -0.129,-2.202c-0.601,-0.601 -1.498,-0.683 -2.08,-0.225l-4.38,-4.379c-0.285,-0.286 -0.75,-0.286 -1.035,0c-0.285,0.285 -0.285,0.749 0,1.036l4.368,4.367l-1.296,1.295c-0.571,0.571 -0.513,1.557 0.131,2.201c0.642,0.642 1.627,0.701 2.2,0.129c-0.573,0.572 -0.514,1.557 0.129,2.2c0.642,0.642 1.629,0.702 2.201,0.13c-0.572,0.572 -0.515,1.557 0.129,2.2c0.643,0.643 1.629,0.702 2.2,0.13c-0.571,0.571 -0.513,1.556 0.13,2.2c0.643,0.642 1.628,0.701 2.201,0.129l1.368,-1.367l2.685,2.685c0.858,0.857 2.307,0.797 3.236,-0.13c0.452,-0.452 0.694,-1.03 0.727,-1.601c0.572,-0.034 1.15,-0.276 1.602,-0.729c0.453,-0.452 0.696,-1.03 0.73,-1.601c0.571,-0.034 1.147,-0.276 1.601,-0.729c0.453,-0.453 0.695,-1.029 0.728,-1.602c0.572,-0.033 1.15,-0.274 1.603,-0.729c0.927,-0.927 0.984,-2.379 0.129,-3.234l-1.133,-1.134l4.65,-4.649c0.286,-0.285 0.286,-0.749 0,-1.035l-6.729,-6.733Z" style="fill:#eec278;fill-rule:nonzero;"/><path d="M34.825,6.355l-5.926,-5.926c-0.572,-0.572 -1.499,-0.572 -2.072,0l-2.071,2.07c-0.572,0.572 -0.572,1.499 0,2.071l5.926,5.927c0.573,0.572 1.5,0.572 2.072,0l2.071,-2.071c0.57,-0.572 0.57,-1.5 0,-2.071Zm-3.111,3.018c-0.663,0 -1.201,-0.538 -1.201,-1.202c0,-0.663 0.538,-1.202 1.201,-1.202c0.664,0 1.203,0.538 1.203,1.202c-0.001,0.663 -0.539,1.202 -1.203,1.202Z" style="fill:#eec278;fill-rule:nonzero;"/></svg>
                        </figure>
                        <div class="media-body ml-3">
                          <h6 class="mb-1">Sponsors</h6>
                          <p class="mb-0">Come and meet our fantastic sponsors.</p>
                        </div>
                      </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-xl rounded-bottom delimiter-top p-4">
                      <div class="row">
                        <div class="col-sm-3">
                          <a href="#" class="dropdown-item" style="color: rgb(238, 194, 120);">Platinum</a>
                          <a href="<?php echo BASE_URL;?>/pages/learning/pages/live/sponsor-boston.php" class="dropdown-item">Boston
                          </a>
                         
                        </div>
                        <div class="col-sm-3">
                          <a href="#" class="dropdown-item" style="color: rgb(238, 194, 120);">Gold</a>

                          <a href="<?php echo BASE_URL;?>/pages/learning/pages/live/sponsor-fujifilm.php" class="dropdown-item">Onis / Fujifilm</a>

                         
                        </div>
                        <div class="col-sm-3">
                          <a href="#" class="dropdown-item" style="color: rgb(238, 194, 120);">Silver</a>

                          <a href="<?php echo BASE_URL;?>/pages/learning/pages/live/sponsor-olympus.php" class="dropdown-item">Olympus</a>
                          <a href="<?php echo BASE_URL;?>/pages/learning/pages/live/sponsor-medtronic.php" class="dropdown-item">Medtronic</a>
                        
                        </div>
                       
                      
                      </div>
                    </div>
                  </li> -->

                  <!--Nursing Menu-->
                  <!-- <li class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                    <a href="#" class="list-group-item list-group-item-action dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <div class="media d-flex align-items-center">
                        
                        <figure style="width: 50px;">
                          <svg width="100%" height="100%" viewBox="0 0 328 284" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><path d="M96.367,205.433l135.015,0c12.588,0 -10.619,-55.25 -10.619,-55.25c-1.375,-3.287 -4.68,-5.395 -7.842,-6.69l-21.35,-9.83l-10.258,-8.649l-16.482,16.392l-0.012,0l7.111,47.547c0.023,0.165 -0.016,0.329 -0.114,0.464l-7.435,10.178c-0.12,0.162 -0.309,0.258 -0.51,0.258c-0.201,0 -0.39,-0.096 -0.507,-0.258l-7.438,-10.178c-0.098,-0.135 -0.139,-0.299 -0.113,-0.464l7.111,-47.547l-0.011,0l-16.481,-16.392l-10.257,8.649l-21.35,9.83c-3.158,1.295 -6.263,3.264 -7.843,6.69c0.003,0 -23.202,55.25 -10.615,55.25Z" style="fill:#eec278;fill-rule:nonzero;"/><path d="M163.875,129.409c16.285,0 38.131,-20.346 38.501,-54.462c0.236,-23.674 -11.038,-37.841 -38.501,-37.841c-27.464,0 -38.742,14.167 -38.501,37.842c0.369,34.116 19.442,54.461 38.501,54.461Zm-7.74,-44.954c19.91,2.121 37.271,-25.726 36.988,-0.793c-0.168,14.924 -14.012,37.462 -29.245,37.462c-15.988,0 -27.021,-18.731 -29.247,-37.454c-2.413,-20.306 34.859,-15.679 21.504,0.785Z" style="fill:#eec278;fill-rule:nonzero;"/><path d="M312.75,0l-297.75,0c-8.285,0 -15,6.715 -15,15l0,212.539c0,8.285 6.716,15 15,15l297.75,0c8.284,0 15,-6.715 15,-15l0,-212.539c0,-8.285 -6.716,-15 -15,-15Zm-7.5,220.039l-282.75,0l0,-197.539l282.75,0l0,197.539Z" style="fill:#eec278;fill-rule:nonzero;"/><path d="M0,266.394c0,4.576 3.709,8.287 8.285,8.287l79.775,0l0,-16.573l-79.775,0c-4.575,0 -8.285,3.71 -8.285,8.286Z" style="fill:#eec278;fill-rule:nonzero;"/><path d="M319.464,258.108l-199.349,0l0,16.574l199.349,0c4.576,0 8.286,-3.711 8.286,-8.287c0,-4.578 -3.71,-8.287 -8.286,-8.287Z" style="fill:#eec278;fill-rule:nonzero;"/><path d="M104.09,249.423c-5.495,0 -9.965,4.471 -9.965,9.964l0,14.013c0,5.494 4.47,9.965 9.965,9.965c5.493,0 9.962,-4.471 9.962,-9.965l0,-14.012c0,-5.494 -4.469,-9.965 -9.963,-9.965Z" style="fill:#eec278;fill-rule:nonzero;"/></svg>
                        </figure>
                        
                        <div class="media-body ml-3">
                          <h6 class="mb-1">Nursing Catch Up</h6>
                          <p class="mb-0">1 half-day stream. <br/><strong>Nursing</strong>- dedicated to the other half of the team.</p>
                        </div>
                      </div>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/learning/pages/live/nursing.php">
                          Nursing Stream On Demand
                        </a>
                      </li>
                      
                    
                    </ul>
                  </li> -->

                  <!--QR Code Slido Menu, only show if slido details entered-->

                  <?php
                        if ($programme->geturl_slido() != ''){?>
                          

                  
                  <li class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                    <a href="https://app.sli.do/event/<?php echo $programme->geturl_slido();?>" target="_blank" class="list-group-item list-group-item-action dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                      <div class="flex-column align-items-right">
                        <figure class="gieqsGold" style="background-size:100px;">

                        <?php

                        //load the programme

                        
                        $data = 'https://app.sli.do/event/' . $programme->geturl_slido();

                        // quick and simple:
                        //echo '<img src="'.$qrcode->render($data).'" alt="QR Code" />';
                        echo $qrcode->render($data);
                        ?>
                          <!--   <img src="<?php //echo BASE_URL;?>/assets/img/brand/qrslido_white.png" style="width: 200px;"> -->
                        </figure>
                        <p>Scan Me with a SmartPhone or click to join the Q+A conversation on Slido</p>
                       
                      </div>
                    </a>
                  </li>

                  <?php       }?>

                  
                </ul>
              </div>
            </li>


                <?php } //close if access3

                          } //close if programmes



              }
            

              //are any progammes live now

              //if so  determine if user has access to the programm

              ?>
              


            <?php }?>
                <!-- Mission -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo BASE_URL;?>/pages/program/mission.php">Foundation</a>
                </li>

                <!-- <li class="nav-item dropdown dropdown-animate" data-toggle="hover">
                    <div class="dropdown-menu  dropdown-menu-arrow" aria-labelledby="btn-group-settings">
                        <span style="color: 
                        rgb(238, 194, 120);" class="dropdown-header">Registration</span>
                        <a class="dropdown-item" href="https://eu.eventscloud.com/ereg/index.php?eventid=200200203&" target="_blank"><i class="fas fa-registered"></i>Register now!</a>
                        <a class="dropdown-item" href="<?php //echo BASE_URL;?>/pages/program/registration.php"><i class="fas fa-shapes"></i>Registration options</a>
                        
                        <div class="dropdown-divider"></div>
                        <span style="color: rgb(238, 194, 120);" class="dropdown-header">Practical</span>
                        <a class="dropdown-item" href="<?php //echo BASE_URL;?>/pages/practical/accommodation.php"><i class="fas fa-igloo"></i>Accommodation</a>
                        <a class="dropdown-item" href="https://visit.gent.be/en/good-know/practical-information/how-get-ghent" target="_blank"><i class="fas fa-train"></i></i>Getting here</a>
                        <div class="dropdown-divider"></div>
                        <span style="color: rgb(238, 194, 120);" class="dropdown-header">Why Ghent?</span>
                        <a class="dropdown-item" href="https://visit.gent.be/en"><i class="fas fa-city" target="_blank"></i>Because it's the most beautiful<br/> medieval city in Europe</a>
                        <a class="dropdown-item" href="https://goo.gl/maps/PLsJXm86oGUPjQ7i7" target="_blank"><i class="fas fa-search-location"></i>Where is Ghent?</a>
                        <a class="dropdown-item" href="http://www.flickr.com/photos/visit_gent/albums" target="_blank"><i class="fas fa-images"></i>Ghent in pictures</a>
                        <a class="dropdown-item" href="https://visit.gent.be/en/top-10-tips" target="_blank"><i class="fas fa-university"></i>Top 10 Ghent</a>
                        
                      </div>
                </li> -->


                <!-- Program-basic, later to add dropdown with options -->
                

               

                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo BASE_URL;?>/pro-content/175">Symposium</a>
                </li>

              
                <!-- Venue -->
                <!--currently not active-->
               

                <!-- Sponsors -->
                
                
             <!--    <li class="nav-item active">
                    <a class="nav-link" href="<?php //echo BASE_URL;?>/pages/program/sponsors.php">Sponsors</a>
                </li> -->
               

                <!-- Registration-basic -->
                <?php if (!isset($liveAndLoggedIn)){?>
                <li class="nav-item dropdown dropdown-animate" data-toggle="hover">
                   <!-- <a class="nav-link" href="<?php //echo BASE_URL;?>/pages/program/registration.php">Registration</a> -->
                    <!-- <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Registration</a>
                    
                    <div class="dropdown-menu  dropdown-menu-arrow" aria-labelledby="btn-group-settings">
                    <span style="color: 
                    rgb(238, 194, 120);" class="dropdown-header">Registration</span>
                    <a class="dropdown-item" href="https://eu.eventscloud.com/ereg/index.php?eventid=200200203&" target="_blank"><i class="fas fa-registered"></i>Register now!</a>
                    <a class="dropdown-item" href="<?php //echo BASE_URL;?>/pages/program/registration.php"><i class="fas fa-shapes"></i>Registration options</a>
                    
                    <div class="dropdown-divider"></div>
                    <span style="color: rgb(238, 194, 120);" class="dropdown-header">Practical</span>
                    <a class="dropdown-item" href="<?php //echo BASE_URL;?>/pages/practical/accommodation.php"><i class="fas fa-igloo"></i>Accommodation</a>
                    <a class="dropdown-item" href="https://visit.gent.be/en/good-know/practical-information/how-get-ghent" target="_blank"><i class="fas fa-train"></i></i>Getting here</a>
                    <div class="dropdown-divider"></div>
                    <span style="color: rgb(238, 194, 120);" class="dropdown-header">Why Ghent?</span>
                    <a class="dropdown-item" href="https://visit.gent.be/en"><i class="fas fa-city" target="_blank"></i>Because it's the most beautiful<br/> medieval city in Europe</a>
                    <a class="dropdown-item" href="https://goo.gl/maps/PLsJXm86oGUPjQ7i7" target="_blank"><i class="fas fa-search-location"></i>Where is Ghent?</a>
                    <a class="dropdown-item" href="http://www.flickr.com/photos/visit_gent/albums" target="_blank"><i class="fas fa-images"></i>Ghent in pictures</a>
                    <a class="dropdown-item" href="https://visit.gent.be/en/top-10-tips" target="_blank"><i class="fas fa-university"></i>Top 10 Ghent</a>
                    
                  </div> -->
                </li>
                <?php }?>
                
                <?php
                if (isset($_SESSION['user_id']) && ($_SESSION['siteKey'] == 'TxsvAb6KDYpmdNk')){
                ?>

<li class="nav-item">
                    <a class="nav-link"
                        href="<?php echo BASE_URL; ?>/pages/learning/index.php">Online Education</a>
                </li>

                


                <?php }else{ ?>

                  <li class="nav-item active">
                    <a class="nav-link" href="<?php echo BASE_URL;?>/pages/program/online.php">Online Education<!-- <span class="badge bg-gieqsGold text-dark badge-pill badge-floating ml-1 p-1">
                                    New
                                    </span> --></a>
                </li>
              


                <?php }
                
                ?>


<li class="nav-item active">
                    <a class="nav-link" href="<?php echo BASE_URL;?>/pages/program/testimonials.php">Testimonials</a>
                </li>


<!-- Get all courses, the ones which are advertised, list by 

get array id, name-->

<?php 

$symposiaAdvertised = $assetManager->returnAdvertisedAssets(2, false);
$coursesAdvertised = $assetManager->returnAdvertisedAssets(3, false);
$learningPacksAdvertised = $assetManager->returnAdvertisedAssets(4, false);
  


if ($debug){

  var_dump($symposiaAdvertised);
  var_dump($coursesAdvertised);

  var_dump($learningPacksAdvertised);


}


if (isset($userid)){
if ($isSuperuser == 1){

  $fullAccess = true;
  $proMember = false;

  if ($debug){

    echo 'is superuser';

  }

}elseif ($sitewide_status == 2){ //PRO subscription

  $fullAccess = true;
  $proMember = true;

  if ($debug){

    echo 'full access not superuser so pro user';

  }

}else{

  $fullAccess = false;
  $proMember = false;

  if ($debug){

    echo 'not full access not pro member but logged in';

  }

}
}else{

  $fullAccess = false;
  $proMember = false;

  if ($debug){

    echo 'not  logged in';

  }
}



               if (($proMember === false)){



require(BASE_URI . '/pages/learning/includes/premium_content.php');

               }

?>



         
                    
                    
                  
                

                <!-- Backend -->

                <?php
                if(!empty($_SESSION['access_level']))
                {
                  if (isset($_SESSION['user_id']) && ($_SESSION['siteKey'] == 'TxsvAb6KDYpmdNk') && ($_SESSION['access_level'] == '1' || $_SESSION['access_level'] == '2') || $_SESSION['access_level'] == '3'){
                    ?>
    
                    <li class="nav-item">
                        <a class="nav-link text-muted"
                            href="<?php echo BASE_URL;?>/pages/backend/backend.php">Administration</a>
                    </li>
    
                    <?php
                    }

                }
                

              
                
                if (isset($_SESSION['user_id']) && ($_SESSION['siteKey'] == 'TxsvAb6KDYpmdNk') && ($_SESSION['access_level'] == '1')){
                ?>

                <li class="nav-item">
                    <a class="nav-link text-muted"
                        href="<?php echo BASE_URL;?>/edm/index.php">eDM</a>
                </li>

                <?php
                }

            //check page we are on
/* 
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            //if contains index.html

            if (strpos($actual_link, 'index.php') !== false) {
              echo '
            <li class="nav-item active">
              <a class="nav-link" data-toggle="modal" data-target="#registerInterest">Register</a>
            </li>';
            }else{
              //otherwise
              echo '
              <li class="nav-item active">
                <a class="nav-link" href="' . BASE_URL . '/index.php?signup=2456">Register</a>
              </li>';
              

            } */

            

            



            ?>


                <!-- Pages menu -->
                <!-- <li class="nav-item dropdown dropdown-animate" data-toggle="hover">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-arrow p-0">
                <ul class="list-group list-group-flush">
                  <li class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                    <a href="#" class="list-group-item list-group-item-action dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <div class="media d-flex align-items-center"> -->
                <!-- SVG icon -->
                <!-- <figure style="width: 50px;">
                          <img alt="Image placeholder" src="assets/img/icons/essential/detailed/Code_2.svg" class="svg-inject img-fluid" style="height: 50px;">
                        </figure> -->
                <!-- Media body -->
                <!-- <div class="media-body ml-3">
                          <h6 class="mb-1">Landing</h6>
                          <p class="mb-0">A great point to start from.</p>
                        </div>
                      </div>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a class="dropdown-item" href="pages/landing/agency.html">
                          Agency
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/landing/app.html">
                          App
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/landing/blog.html">
                          Blog
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/landing/classic.html">
                          Classic
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/landing/cloud-hosting.html">
                          Cloud hosting
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/landing/digital.html">
                          Digital
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/landing/event-music.html">
                          Event music
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/landing/features.html">
                          Features
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/landing/portfolio.html">
                          Portfolio
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/landing/presentation.html">
                          Presentation
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/landing/saas.html">
                          Saas
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/landing/services.html">
                          Services
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/landing/software.html">
                          Software
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                    <a href="#" class="list-group-item list-group-item-action dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <div class="media d-flex align-items-center"> -->
                <!-- SVG icon -->
                <!-- <figure style="width: 50px;">
                          <img alt="Image placeholder" src="assets/img/icons/essential/detailed/Code.svg" class="svg-inject img-fluid" style="height: 50px;">
                        </figure> -->
                <!-- Media body -->
                <!-- <div class="media-body ml-3">
                          <h6 class="mb-1">Secondary</h6>
                          <p class="mb-0">Examples for any scenario.</p>
                        </div>
                      </div>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a class="dropdown-item" href="pages/secondary/about-classic.html">
                          About classic
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/secondary/about.html">
                          About
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/secondary/blog.html">
                          Blog
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/secondary/blog-article.html">
                          Blog article
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/secondary/blog-masonry.html">
                          Blog masonry
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/secondary/careers.html">
                          Careers
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/secondary/careers-single.html">
                          Careers single
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/secondary/contact.html">
                          Contact
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/secondary/contact-simple.html">
                          Contact simple
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/secondary/get-started.html">
                          Get started
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/secondary/portfolio.html">
                          Portfolio
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/secondary/portfolio-fullscreen.html">
                          Portfolio fullscreen
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/secondary/pricing-charts.html">
                          Pricing charts
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/secondary/pricing-comparison.html">
                          Pricing comparison
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/secondary/pricing-simple.html">
                          Pricing simple
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/secondary/services.html">
                          Services
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/secondary/team.html">
                          Team
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                    <a href="#" class="list-group-item list-group-item-action dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <div class="media d-flex align-items-center"> -->
                <!-- SVG icon -->
                <!-- <figure style="width: 50px;">
                          <img alt="Image placeholder" src="assets/img/icons/essential/detailed/Secure_Files.svg" class="svg-inject img-fluid" style="height: 50px;">
                        </figure> -->
                <!-- Media body -->
                <!-- <div class="media-body ml-3">
                          <h6 class="mb-1">Authentication</h6>
                          <p class="mb-0">Examples for any scenario.</p>
                        </div>
                      </div>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="text-sm text-muted dropdown-header px-0">Basic</li>
                      <li>
                        <a class="dropdown-item" href="pages/authentication/basic-login.html">
                          Login
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/authentication/basic-register.html">
                          Register
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/authentication/basic-recover.html">
                          Recover
                        </a>
                      </li>
                      <li class="dropdown-divider"></li>
                      <li class="text-sm text-muted dropdown-header px-0">Cover</li>
                      <li>
                        <a class="dropdown-item" href="pages/authentication/cover-login.html">
                          Login
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/authentication/cover-register.html">
                          Register
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/authentication/cover-recover.html">
                          Recover
                        </a>
                      </li>
                      <li class="dropdown-divider"></li>
                      <li class="text-sm text-muted dropdown-header px-0">Simple</li>
                      <li>
                        <a class="dropdown-item" href="pages/authentication/simple-login.html">
                          Login
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/authentication/simple-register.html">
                          Register
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/authentication/simple-recover.html">
                          Recover
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                    <a href="#" class="list-group-item list-group-item-action dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <div class="media d-flex align-items-center"> -->
                <!-- SVG icon -->
                <!-- <figure style="width: 50px;">
                          <img alt="Image placeholder" src="assets/img/icons/essential/detailed/Task.svg" class="svg-inject img-fluid" style="height: 50px;">
                        </figure> -->
                <!-- Media body -->
                <!-- <div class="media-body ml-3">
                          <h6 class="mb-1">Account</h6>
                          <p class="mb-0">Account management made cool.</p>
                        </div>
                      </div>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="text-sm text-muted dropdown-header px-0">Account</li>
                      <li>
                        <a class="dropdown-item" href="pages/account/account-billing.html">
                          Billing
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/account/account-notifications.html">
                          Notifications
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/account/account-profile.html">
                          Profile
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/account/account-profile-public.html">
                          Profile public
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/account/account-settings.html">
                          Settings
                        </a>
                      </li>
                      <li class="dropdown-divider"></li>
                      <li class="text-sm text-muted dropdown-header px-0">Board</li>
                      <li>
                        <a class="dropdown-item" href="pages/account/board-connections.html">
                          Connections
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/account/board-overview.html">
                          Overview
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/account/board-projects.html">
                          Projects
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/account/board-tasks.html">
                          Tasks
                        </a>
                      </li>
                      <li class="dropdown-divider"></li>
                      <li class="text-sm text-muted dropdown-header px-0">Listing</li>
                      <li>
                        <a class="dropdown-item" href="pages/account/listing-orders.html">
                          Orders
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/account/listing-projects.html">
                          Projects
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/account/listing-users.html">
                          Users
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                    <a href="#" class="list-group-item list-group-item-action dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <div class="media d-flex align-items-center"> -->
                <!-- SVG icon -->
                <!-- <figure style="width: 50px;">
                          <img alt="Image placeholder" src="assets/img/icons/essential/detailed/Cart_Add_2.svg" class="svg-inject img-fluid" style="height: 50px;">
                        </figure> -->
                <!-- Media body -->
                <!-- <div class="media-body ml-3">
                          <h6 class="mb-1">Shop</h6>
                          <p class="mb-0">Complete flow for online shops.</p>
                        </div>
                      </div>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="text-sm text-muted dropdown-header px-0">Shop</li>
                      <li>
                        <a class="dropdown-item" href="pages/shop/shop-landing.html">
                          Landing
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/shop/shop-products.html">
                          Products
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/shop/shop-product.html">
                          Product
                        </a>
                      </li>
                      <li class="dropdown-divider"></li>
                      <li class="text-sm text-muted dropdown-header px-0">Checkout</li>
                      <li>
                        <a class="dropdown-item" href="pages/shop/checkout-cart.html">
                          Cart
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/shop/checkout-cart-empty.html">
                          Cart empty
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/shop/checkout-customer.html">
                          Customer
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/shop/checkout-payment.html">
                          Payment
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/shop/checkout-shipping.html">
                          Shipping
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                    <a href="#" class="list-group-item list-group-item-action dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <div class="media d-flex align-items-center">-->
                <!-- SVG icon -->
                <!-- <figure style="width: 50px;">
                          <img alt="Image placeholder" src="assets/img/icons/essential/detailed/Cog_Wheels.svg" class="svg-inject img-fluid" style="height: 50px;">
                        </figure> -->
                <!-- Media body -->
                <!-- <div class="media-body ml-3">
                          <h6 class="mb-1">Utility</h6>
                          <p class="mb-0">Error pages and everything else.</p>
                        </div>
                      </div>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a class="dropdown-item" href="pages/utility/coming-soon.html">
                          Coming soon
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/utility/error-404.html">
                          Error 404
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/utility/faq.html">
                          Faq
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/utility/support.html">
                          Support
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/utility/topic.html">
                          Topic
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="pages/utility/topic-simple.html">
                          Topic simple
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </li> -->
                <!-- Sections menu -->
                <!-- <li class="nav-item dropdown dropdown-animate" data-toggle="hover">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sections</a>
              <div class="dropdown-menu dropdown-menu-xl dropdown-menu-arrow p-0">
                <ul class="list-group list-group-flush">
                  <li>
                    <a href="sections.html" class="list-group-item list-group-item-action" role="button">
                      <div class="media d-flex align-items-center">
                        <figure style="width: 50px;">
                          <img alt="Image placeholder" src="assets/img/icons/essential/detailed/Apps.svg" class="svg-inject img-fluid" style="height: 50px;">
                        </figure>
                        <div class="media-body ml-3">
                          <h6 class="mb-1">Explore all sections</h6>
                          <p class="mb-0">Awesome section examples for any scenario.</p>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
                <div class="dropdown-menu-links rounded-bottom delimiter-top p-4">
                  <div class="row">
                    <div class="col-sm-4">
                      <a href="sections.html#headers" class="dropdown-item">Headers</a>
                      <a href="sections.html#footers" class="dropdown-item">Footers</a>
                      <a href="sections.html#blog" class="dropdown-item">Blog</a>
                      <a href="sections.html#call-to-action" class="dropdown-item">Call to action</a>
                      <a href="sections.html#clients" class="dropdown-item">Clients</a>
                      <a href="sections.html#collapse" class="dropdown-item">Collapse</a>
                    </div>
                    <div class="col-sm-4">
                      <a href="sections.html#covers" class="dropdown-item">Covers</a>
                      <a href="sections.html#features" class="dropdown-item">Features</a>
                      <a href="sections.html#milestone" class="dropdown-item">Milestone</a>
                      <a href="sections.html#pricing" class="dropdown-item">Pricing</a>
                      <a href="sections.html#projects" class="dropdown-item">Projects</a>
                      <a href="sections.html#subscribe" class="dropdown-item">Subscribe</a>
                    </div>
                    <div class="col-sm-4">
                      <a href="sections.html#swiper" class="dropdown-item">Swiper</a>
                      <a href="sections.html#tables" class="dropdown-item">Tables</a>
                      <a href="sections.html#team" class="dropdown-item">Team</a>
                      <a href="sections.html#testimonials" class="dropdown-item">Testimonials</a>
                      <a href="sections.html#video" class="dropdown-item">Video</a>
                    </div>
                  </div>
                </div>
                <div class="delimiter-top py-3 px-4">
                  <span class="badge badge-soft-success">Yaass!</span>
                  <p class="mt-2 mb-0">
                    Explore, switch, customize any component, section or page and make your website rich its full potential.
                  </p>
                </div>
              </div>
            </li>
          </ul> -->
                <!--
          <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            <li class="nav-item dropdown dropdown-animate" data-toggle="hover">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Docs</a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg dropdown-menu-arrow p-0">
                <ul class="list-group list-group-flush">
                  <li>
                    <a href="docs/index.php" class="list-group-item list-group-item-action" role="button">
                      <div class="media d-flex align-items-center">-->
                <!-- SVG icon -->
                <!--<figure style="width: 50px;">
                          <img alt="Image placeholder" src="assets/img/icons/essential/detailed/DOC_File.svg" class="svg-inject img-fluid" style="height: 50px;">
                        </figure>-->
                <!-- Media body -->
                <!--
                        <div class="media-body ml-3">
                          <h6 class="mb-1">Documentation</h6>
                          <p class="mb-0">Awesome section examples for any scenario.</p>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="docs/components/index.php" class="list-group-item list-group-item-action" role="button">
                      <div class="media d-flex align-items-center">-->
                <!-- SVG icon -->
                <!--
                        <figure style="width: 50px;">
                          <img alt="Image placeholder" src="assets/img/icons/essential/detailed/Mobile_UI.svg" class="svg-inject img-fluid" style="height: 50px;">
                        </figure>-->
                <!-- Media body -->
                <!--
                        <div class="media-body ml-3">
                          <h6 class="mb-1">Components</h6>
                          <p class="mb-0">Awesome section examples for any scenario.</p>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
                <div class="dropdown-menu-links rounded-bottom delimiter-top p-4">
                  <div class="row">
                    <div class="col-sm-6">
                      <a href="docs/getting-started/installation.html" class="dropdown-item">Installation</a>
                      <a href="docs/getting-started/file-structure.html" class="dropdown-item">File structure</a>
                      <a href="docs/getting-started/build-tools.html" class="dropdown-item">Build tools</a>
                      <a href="docs/getting-started/customization.html" class="dropdown-item">Customization</a>
                    </div>
                    <div class="col-sm-6">
                      <a href="docs/getting-started/plugins.html" class="dropdown-item">Using plugins</a>
                      <a href="docs/components/index.php" class="dropdown-item">Components</a>
                      <a href="docs/plugins/animate.html" class="dropdown-item">Plugins</a>
                      <a href="docs/support.html" class="dropdown-item">Support</a>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item d-lg-none d-xl-block">
              <a class="nav-link" href="docs/changelog.html" target="_blank">What's new</a>
            </li>
            <li class="nav-item mr-0">
              <a href="https://themes.getbootstrap.com/product/purpose-website-ui-kit/" target="_blank" class="nav-link d-lg-none">Purchase now</a>
              <a href="https://themes.getbootstrap.com/product/purpose-website-ui-kit/" target="_blank" class="btn btn-sm btn-white rounded-pill btn-icon rounded-pill d-none d-lg-inline-flex" data-toggle="tooltip" data-placement="left" title="Go to Bootstrap Themes">
                <span class="btn-inner--icon"><i class="fas fa-shopping-cart"></i></span>
                <span class="btn-inner--text">Purchase now</span>
              </a>
            </li>-->
            </ul>
        </div>
    </div>
</nav>