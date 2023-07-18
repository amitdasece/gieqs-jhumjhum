<?php

//require '../../includes/config.inc.php';	

$url =  "{$_SERVER['REQUEST_URI']}";
                    $highlightComplex = preg_match (  '/complex/' ,  $url);
                    $highlightProgram = preg_match (  '/program/' ,  $url);
                    $highlightPlenary = preg_match (  '/plenary/' ,  $url);
                    $highlightNursing = preg_match (  '/nursing/' ,  $url);
                  
                    $debug = true;
         

                    /* $debug = true;

                    if ($debug){
                        echo '<span style="color:white;">';
                        echo '<br/>';
                    
                        echo 'Cookie [selectedTag] = ' . $_COOKIE['selectedTag'];
                        echo '<br/>';
                        echo 'Cookie [browsing] = ' . $_COOKIE['browsing'];
                        echo '<br/>';
                        echo 'Cookie [browsing_last] = ' . $_COOKIE['browsing_last'];
                        echo '<br/>';
                        echo 'Cookie [browsing_array] = ' . $_COOKIE['browsing_array'];
                        echo '<br/>';
                    
                        echo 'Cookie [browsing_id] = ' . $_COOKIE['browsing_id'];
                        echo '<br/>';
                    
                        echo 'Cookie [restricted] = ' . $_COOKIE['restricted'];
                        echo '<br/>';
                    
                        echo 'localStorage [restricted] = ' . $data['localrestricted'];
                        echo '<br/>';
                    
                            echo 'localStorage [selectedTag] = ' . $data['localselectedTag'];
                            echo '<br/>';
                    
                    
                     
                    //var_dump($data);
                    
                        
                    
                    
                        echo '</span>';





                    } */


?>




<nav id="tagBar" class="mt-2 navbar navbar-horizontal navbar-expand-lg d-none"  style="padding: 0;margin-top: 0 !important; z-index: 1 !important; ">
    <div class="container gieqsGold">
        <a class="navbar-brand"><?php echo '- active tag filter';?>
        </a>
        <button class="navbar-toggler gieqsGold" type="button" data-toggle="collapse" data-target="#navbar-tag"
            aria-controls="navbar-warning" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-tag">
            <ul class="navbar-nav gieqsGold align-items-lg-center ml-lg-auto">



            
                <?php
                    
                ?>
                <li class="nav-item text-nowrap">
                   <a class="nav-link nav-link-icon exitTagNav"
                       >

                       <span id="tagCategoryNameBar" class="nav-link-inner--text"></span>
                   </a>
               </li>

               
                                           <li class="nav-item text-nowrap">
                   
                   <a class="nav-link nav-link-icon text-nowrap"
                       >
<!--                        <span class="badge badge-pill text-dark badge-floating border-dark mr-2" style="z-index: -1 !important;">LEVEL 4</span>
 -->                       <span id="tagNameBar" class="nav-link-inner--text text-bold"></span></a>
                     
                   
                   
                   


                          


                               <!-- <span class="nav-link-inner--text ">Complex</span> -->
                           
               </li>

               <li class="nav-item text-nowrap">
                   <a class="nav-link nav-link-icon exitTagNav"
                       >

                       <span class="nav-link-inner--text "><span id="videoNumeratorTagNav">x</span> / <span id="videoDenomTagNav">y</span></span>
                   </a>
               </li>

               <li class="nav-item text-nowrap">
                   <a class="nav-link nav-link-icon previousTagNav"
                       >

                       <span class="nav-link-inner--text "><i class="fas fa-arrow-left mr-2"></i> Previous</span>
                   </a>
               </li>
               <li class="nav-item text-nowrap">
                   <a class="nav-link nav-link-icon nextTagNav"
                       >

                       <span class="nav-link-inner--text ">Next<i class="fas fa-arrow-right ml-2"></i></span>
                   </a>
               </li>
               <li class="nav-item text-nowrap">
                   <a class="nav-link nav-link-icon expandSearch cursor-pointer text-primary"
                       >

                       <span class="nav-link-inner--text ">Expand Search</span>
                   </a>
               </li>
               <li class="nav-item text-nowrap">
                   <a class="nav-link nav-link-icon exitTagNav"
                       >

                       <span class="nav-link-inner--text "><i class="fas fa-times cursor-pointer"></i></span>
                   </a>
               </li>
                <?php
                    
                ?>
                <!-- <li class="nav-item text-nowrap">
                    <a class="nav-link nav-link-icon"
                        href="<?php //echo BASE_URL;?>/pages/learning/pages/live/nursing.php">

                        <span class="nav-link-inner--text ">Nursing</span>
                    </a>
                </li>
                <li class="nav-item text-nowrap">
                    <a class="nav-link nav-link-icon" target="_blank"
                        href="<?php //echo BASE_URL;?>/pages/learning/pages/live/programLive.php">

                        <span class="nav-link-inner--text ">Live Programme</span>
                    </a>
                </li>
                <li class="nav-item text-nowrap">
                    <a class="nav-link nav-link-icon" target="_blank" href="https://facebook.com/gieqs">
                        <i class="fab fa-facebook-square"></i>
                        <span class="nav-link-inner--text d-lg-none">Share</span>
                    </a>
                </li>
                <li class="nav-item text-nowrap">
                    <a class="nav-link nav-link-icon" target="_blank" href="https://twitter.com/gieqs_symposium">
                        <i class="fab fa-twitter"></i>
                        <span class="nav-link-inner--text d-lg-none">Tweet</span>
                    </a>
                </li> -->

            </ul>

        </div>
    </div>
</nav>