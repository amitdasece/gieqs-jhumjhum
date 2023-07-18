
<nav class="mt-4 navbar navbar-expand-lg navbar-dark bg-dark sticky-top" id="videoBar"
                style="margin-top: 20px; z-index: 2 !important;">
                <div class="container">
                    <a class="navbar-brand cursor-pointer" id="start_tour">
                        <!-- <small class="m-0 p-0"><br/> --><?php if ($videoset == 3){?>


                        <h5 class="text-gieqsGold mr-auto">Live Course Viewer</h5>

                        <?php }elseif ($videoset == 2){ ?>

                        <h5 class="text-gieqsGold mr-auto">Live Conference Viewer</h5>


                        <?php } ?>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-warning"
                        aria-controls="navbar-warning" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!--

Useful for PHP to JS transfer

-->



                    <div class="collapse navbar-collapse" id="navbar-warning">
                        <!-- <ul class="navbar-nav align-items-lg-left ml-lg-auto">

                
            </ul> -->
                        <ul class="navbar-nav justify-content-sm-center ml-sm-auto">
                        <?php if (isset($assetid)){?>
    
                        <li class="nav-item dropdown-animate dropdown-submenu bg-dark" data-toggle="hover">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Take a Tour
                                </a>
                                <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                                    <a id="chapterNavTour" class="dropdown-item cursor-pointer showMeAround">

                                        Conference Viewer
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item cursor-pointer" href="#whats-new">GIEQs Online
                                    </a>



                                </div>
                            </li>
                            <?php }?>


                            <li class="nav-item dropdown-animate dropdown-submenu bg-dark" data-toggle="hover">
                                <a id="programMenu" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Program
                                </a>
                                <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">

                                <?php if (isset($assetid)){?>
                                    <a id="chapterNavTour" class="dropdown-item" href="#programme-display">

                                      This Room, Today
                                    </a>

                                <?php }?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item cursor-pointer" href="<?php echo BASE_URL;?>/pages/program/program_live.php">Full Scientific Program
                                    </a>



                                </div>
                            </li>

                            <li class="nav-item dropdown-animate dropdown-submenu bg-dark" data-toggle="hover">
                                <a id="changeRoom" class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php if (isset($assetid)){?>

                                    Change Room
                                    <?php }else{ ?>

                                        <span class="gieqsGold">Live Endoscopy</span>
                                    <?php } ?>

                                </a>
                                <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                                    <a id="chapterNavTour" class="dropdown-item" href="<?php echo BASE_URL;?>/view-pro-content/<?php echo $gieqs_iii_plenary_link;?>">

                                        Plenary
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item cursor-pointer" href="<?php echo BASE_URL;?>/view-pro-content/<?php echo $gieqs_iii_complex_link;?>">Complex
                                    </a>



                                </div>
                            </li>
                            <li class="nav-item dropdown-animate dropdown-submenu bg-dark" data-toggle="hover">
                                <a id="sponsors" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sponsors
                                </a>

                                <div class="dropdown-menu dropdown-menu-xl rounded-bottom delimiter-top p-4">
                      <div class="row">
                        <div class="col-sm-3">
                          <a href="#" class="dropdown-item" style="color: rgb(238, 194, 120);">Platinum</a>
                          <a href="<?php echo BASE_URL;?>/pages/learning/pages/live/sponsor-boston.php" class="dropdown-item">Boston
                          <a href="<?php echo BASE_URL;?>/pages/learning/pages/live/sponsor-olympus.php" class="dropdown-item">Olympus</a>

                          </a>
                         
                        </div>
                        <div class="col-sm-3">
                          <a href="#" class="dropdown-item" style="color: rgb(238, 194, 120);">Gold</a>

                          <a href="<?php echo BASE_URL;?>/pages/learning/pages/live/sponsor-fujifilm.php" class="dropdown-item">Duomed / Fujifilm</a>

                         
                        </div>
                        <div class="col-sm-3">
                          <a href="#" class="dropdown-item" style="color: rgb(238, 194, 120);">Silver</a>

                          <a href="<?php echo BASE_URL;?>/pages/learning/pages/live/sponsor-janssen.php" class="dropdown-item">Janssen</a>
                        
                        </div>
                       
                      
                      </div>
                    </div>
                            </li>


                            

                            <li class="nav-item">
                    <a class="nav-link nav-link-icon" target="_blank" href="https://facebook.com/gieqs">
                        <i class="fab fa-facebook-square"></i>
                        <span class="nav-link-inner--text d-lg-none">Share</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a id="twitter-tour" class="nav-link nav-link-icon" target="_blank" href="https://twitter.com/gieqs_symposium">
                        <i class="fab fa-twitter"></i>
                        <span class="nav-link-inner--text d-lg-none">Tweet</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" target="_blank" href="https://www.linkedin.com/company/74524034/">
                    <i class="fab fa-linkedin"></i>
                        <span class="nav-link-inner--text d-lg-none">Share</span>
                    </a>
                </li>
                <li class="nav-item mr-auto">
                                <a id="support-tour" class="nav-link nav-link-icon"
                                    href="<?php echo BASE_URL;?>/pages/support/support_gieqs_digital.php" target="_blank">

                                    <span class="nav-link-inner--text ">Support</span>
                                </a>
                            </li>

                        </ul>
                     
                

                    </div>
                </div>
            </nav>






