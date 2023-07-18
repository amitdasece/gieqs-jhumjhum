<?php

//require '../../includes/config.inc.php';	

$url =  "{$_SERVER['REQUEST_URI']}";
                    $highlightCourse = preg_match (  '/course/' ,  $url);

                    $highlightComplex = preg_match (  '/complex/' ,  $url);
                    $highlightProgram = preg_match (  '/program/' ,  $url);
                    $highlightPlenary = preg_match (  '/plenary/' ,  $url);
                    $highlightNursing = preg_match (  '/nursing/' ,  $url);
                  
         


?>


<nav class="mt-10 navbar navbar-horizontal navbar-expand-lg navbar-dark gieqsGold">
    <div class="container">
        <a class="navbar-brand" style="z-index: -1 !important;"><?php echo $livepage;?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-warning"
            aria-controls="navbar-warning" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-warning">
            <ul class="navbar-nav align-items-lg-center ml-lg-auto">




                <li class="nav-item">

                  

                    <a class="nav-link nav-link-icon <?php if ($highlightCourse){echo 'disabled';}?>"
                        href="<?php echo BASE_URL;?>/pages/learning/pages/live/course.php?assetid=<?php echo $asset_id[0];?>">
                        <span
                            class="badge badge-pill bg-gieqsGold text-dark badge-floating border-dark mr-2">LIVE</span>


                       
                  


                                <span
                                    class="nav-link-inner--text <?php if ($highlightCourse){echo 'gieqsGold';}?>">HD Stream</span>
                            </a>
                </li
                <li class="nav-item">
                    
                    <a class="nav-link nav-link-icon"
                        href="https://app.sli.do/event/<?php echo $programme->geturl_slido();?>" target="_blank">
                       

                        


                           


                                <span
                                    class="nav-link-inner--text <?php if ($highlightComplex){echo 'gieqsGold';}?>">Chat</span>
                            </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link nav-link-icon <?php if ($highlightProgram) {echo 'disabled';}?>" target="_blank"
                        href="<?php echo BASE_URL;?>/pages/learning/pages/live/programLiveGeneric.php?assetid=<?php echo $asset_id[0];?>">

                        <span class="nav-link-inner--text <?php if ($highlightProgram){echo 'gieqsGold';}?>">Live
                            Programme</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" target="_blank" href="https://facebook.com/gieqs">
                        <i class="fab fa-facebook-square"></i>
                        <span class="nav-link-inner--text d-lg-none">Share</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" target="_blank" href="https://twitter.com/gieqs_symposium">
                        <i class="fab fa-twitter"></i>
                        <span class="nav-link-inner--text d-lg-none">Tweet</span>
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>