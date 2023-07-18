<?php



?>

<style>

@supports ((position: -webkit-sticky) or (position: sticky)) {

.sticky-top {
    position: -webkit-sticky !important;
    position: sticky !important;
    z-index: 1020;
    top: 0;
}
}


</style>

<?php

//setup token access

if (isset($access_token) && ($assetManager->checkAssetToken($asset_id_pagewrite, $access_token, false) === true)){  //is set and is valid for this course and there are tokens remaining

    $access_token_present = true;
    $link_yellow_button_token = BASE_URL . "/pro-content/175&access_token=" . $access_token . "&action=register";

}else{
    $access_token_present = false;
    $link_yellow_button_no_token = BASE_URL . "/pro-content/175&action=register";
}

?>


<nav class="mt-2 navbar navbar-horizontal navbar-expand-lg navbar-dark gieqsGold sticky-top" style="z-index: 1 !important;">
    <div class="container">
        <a class="navbar-brand" href="<?php echo BASE_URL; ?>/pro-content/175"><?php echo 'Symposium.  Edition IV';?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-warning"
            aria-controls="navbar-warning" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-warning">
            <ul class="navbar-nav align-items-lg-center ml-lg-auto">


                <li class="nav-item">
                    <a href="<?php echo BASE_URL;?>/pages/program/concept_4.php" class="nav-link nav-link-icon">
                        <span class="nav-link-inner--text <?php echo $symposium_nav_active[0];?> ">Concept</span>
                    </a>
                </li>


                
                <li class="nav-item">
                    <a <a href="<?php echo BASE_URL;?>/pro-content/175" class="nav-link nav-link-icon cursor-pointer">
                        <span class="nav-link-inner--text <?php echo $symposium_nav_active[1];?> ">Individual</span>
                    </a>
                </li>

                
                <li class="nav-item">
                    <a href="<?php echo BASE_URL;?>/pages/program/symposium-group-registration-4.php" class="nav-link nav-link-icon cursor-pointer">
                        <span class="nav-link-inner--text <?php echo $symposium_nav_active[2];?> ">Group</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo BASE_URL;?>/pages/program/program_4.php" class="nav-link nav-link-icon cursor-pointer">
                    <span class="nav-link-inner--text <?php echo $symposium_nav_active[3];?>">Programme</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo BASE_URL;?>/pages/program/faculty_4.php" class="nav-link nav-link-icon cursor-pointer">
                        <span class="nav-link-inner--text <?php echo $symposium_nav_active[4];?> ">Faculty</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo BASE_URL;?>/pages/program/sponsors_4.php" class="nav-link nav-link-icon cursor-pointer">
                        <span class="nav-link-inner--text <?php echo $symposium_nav_active[7];?> ">Sponsors</span>
                    </a>
                </li>
                
                <li class="nav-item">
                <a href="<?php echo ($access_token_present) ? $link_yellow_button_token : $link_yellow_button_no_token;?>" class="btn btn-fill-gieqsGold btn-sm mx-2" role="button">
                        <span class="nav-link-inner--text <?php echo $symposium_nav_active[6];?> ">Register Now!</span>
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>