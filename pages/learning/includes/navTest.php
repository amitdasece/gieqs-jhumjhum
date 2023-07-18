<!--Main Navbar-->
<?php

function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}

?>

<nav class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-dark bg-dark" id="navbar-main">
    <div class="container px-lg-0">
        <!-- Logo -->
        <a class="navbar-brand mr-lg-5" href="<?php echo BASE_URL;?>/index.php">
            <img alt="Image placeholder" src="<?php echo BASE_URL;?>/assets/img/brand/gieqs.svg" id="navbar-logo"
                style="height: 50px;">
        </a>
        <!-- Navbar collapse trigger -->
        <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="#navbar-main-collapse"
            aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar nav -->
        <div class="collapse navbar-collapse" id="navbar-main-collapse">
            <ul class="navbar-nav align-items-lg-center">
                <!-- Home - Overview  -->
                <!--<li class="nav-item active">
              <a class="nav-link" href="/index.php">Overview</a>
            </li>-->

            <!-- LIVE, moved to main page -->

           
                <!-- Mission -->
                <li class="nav-item active">
                    <a class="nav-link text-white">GIEQs Demonstration Viewer</a>
                </li>
                <!-- <li class="nav-item active">
                <a href="<?php echo BASE_URL;?>/iii" class="btn btn-sm btn-icon btn-group-nav bg-dark text-white shadow btn-neutral mx-2 my-2">
                <span class="btn-inner--icon text-white"><i class="fas fa-user-plus"></i></span>
                <span class="btn-inner--text text-white">Sign up for GIEQs III</span>
              </a>
                </li> -->
                </li>
                <li class="nav-item active">
                <a href="https://vimeo.com/450743797" class="btn btn-sm btn-icon btn-group-nav bg-dark text-white shadow btn-neutral mx-2 my-2" data-fancybox>
                <span class="btn-inner--icon text-white"><i class="fas fa-directions"></i></span>
                <span class="btn-inner--text text-white">Show me the basics of GIEQs Online!</span>
              </a>
                </li>
                <li class="nav-item active">
                <a href="<?php echo BASE_URL;?>/pages/program/online.php?id=2456" class="btn btn-sm btn-icon btn-group-nav bg-gieqsGold shadow btn-neutral mx-2">
                <span class="btn-inner--icon text-dark"><i class="fas fa-user-plus"></i></span>
                <span class="animated bounce delay-2s btn-inner--text text-dark">Sign up for a FREE account</span>
              </a>
                
             
              
                
                <!-- Program-basic, later to add dropdown with options -->
               <!--  <li class="nav-item dropdown dropdown-animate" data-toggle="hover">
                    <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Video</a>
                    
                    <div class="dropdown-menu  dropdown-menu-arrow" aria-labelledby="btn-group-settings">
                    <span style="color: rgb(238, 194, 120);" class="dropdown-header">Beta</span>
                    <a class="dropdown-item" href="<?php //echo BASE_URL;?>/pages/learning/navigator.php"><i class="fas fa-columns"></i>Video Explorer</a>
                    
                    <div class="dropdown-divider"></div>
                    <span style="color: rgb(238, 194, 120);" class="dropdown-header">Later</span>
                    <a class="dropdown-item" href="<?php //echo BASE_URL;?>/pages/program/faculty.php"><i class="fas fa-user"></i>Faculty</a>
                    
                    
                  </div>
                </li> -->

                
            </ul>
        </div>
    </div>
</nav>