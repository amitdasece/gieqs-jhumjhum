


<nav class="mt-4 navbar navbar-expand-lg navbar-dark bg-dark sticky-top" id="videoBar"
    style="margin-top: 20px; z-index: 2 !important;">
    <div class="container">

        <!--

Useful for PHP to JS transfer

-->
        <div id='browsing_id' data-browsing-id="<?php echo $browsing_id;?>" class="d-none"></div>
        <div id='browsing' data-browsing="<?php echo $browsing;?>" class="d-none"></div>
        <div id='browsing_array' class="d-none"><?php echo json_encode($browsing_array);?></div>



        <div class="collapse navbar-collapse" id="navbar-warning">
            <!-- <ul class="navbar-nav align-items-lg-left ml-lg-auto">

                
            </ul> -->
            <ul class="navbar-nav d-flex">

           
            <form class="form-inline mr-auto">
            <a href="" class="btn btn-sm btn-outline-gieqsGold" data-fancybox>How to Use GIEQs Online</a>

<!--             <a href="https://vimeo.com/450743797" class="btn btn-sm btn-outline-gieqsGold" data-fancybox>How to Use GIEQs Online</a>
 -->                
  
    <button class="btn btn-sm btn-outline-gieqsGold mr-5" type="button">Find my next Experience</button>
  </form>

                <!-- li class="nav-item"><a class="nav-link btn-sm bg-gieqsGold cursor-pointer" onclick="window.location.href = siteRoot + 'gieqs-coins.php';">

<span class="btn-inner--text text-dark text-sm">Find Out More</span>
</a></li> -->

                <li class="nav-item dropdown-animate dropdown-submenu bg-dark" data-toggle="hover">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Navigation
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                        <a id="chapterNavTour" class="dropdown-item" href="#statistics">

                            GIEQs Statistics
                        </a>
                        <a class="dropdown-item cursor-pointer" href="#whats-new">New Material
                        </a>

                        <div class="dropdown-divider"></div>
                        <a id="tourTagNav" class="dropdown-item cursor-pointer"
                            href="#catchup">

                            Pick up where you left off
                        </a>
                        <div class="dropdown-divider"></div>
                        <a id="jumpComments" class="dropdown-item cursor-pointer" href="#suggested">


                            <span class="nav-link-inner--text ">Next steps</span>
                        </a>
                        <a id="jumpReferences" class="dropdown-item cursor-pointer"
                            href="#popular">

                            <span class="nav-link-inner--text">Popular</span>
                        </a>
                    </div>
                </li>

                <li class="nav-item dropdown-animate dropdown-submenu bg-dark" data-toggle="hover">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Show Me Around!
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item cursor-pointer showMeAround">

                            Overview Tour
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="showMeAroundLong dropdown-item cursor-pointer">Detailed Feature Tour
                        </a>



                    </div>
                </li>




            </ul>

        </div>
    </div>
</nav>