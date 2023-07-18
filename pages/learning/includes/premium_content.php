<?php 

if (isset($userid)){
if ($isSuperuser == 1){

  $fullAccess = true;
  $proMember = false;

}elseif ($sitewide_status == 2){ //PRO subscription

  $fullAccess = true;
  $proMember = true;

}else{

  $fullAccess = false;
  $proMember = false;
}
}else{

  $fullAccess = false;
  $proMember = false;
}

require_once BASE_URI . '/assets/scripts/classes/assets_paid.class.php';
        $assets_paid = new assets_paid;


        

?>

<!-- define some styles here -->

<style>

 .promember {

    color : rgb(238, 194, 120) !important;


 }

 .non-promember-does-not-own {

    color : #95aac9 !important;


 }

 .non-promember-owned {

    color : rgb(238, 194, 120) !important;



 }

</style>


<li class="nav-item dropdown mega-dropdown dropdown-animate cursor-pointer" data-toggle="hover"
    style="position:static; font-size:1.0rem;">
    <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">Courses & Pro Content</a>





    <div class="dropdown-menu cursor-pointer mega-menu v-2 z-depth-1 pink darken-4 py-4 px-3" style="font-size:1.0rem; margin-top:-15px;"
        aria-labelledby="navbarDropdownMenuLink2">

        
        <div class="row">


            <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">

                <h6 class="sub-title text-uppercase font-weight-bold white-text">Upcoming Symposia & Courses <br /><small>(Register)</small>
                </h6>
                <?php //var_dump($coursesAdvertised);?>
                <ul class="list-unstyled">

                    <?php 
                    
                    $symposiaAdvertised = array_slice($symposiaAdvertised, 0, 5, true);


                    foreach($symposiaAdvertised as $key=>$value){ 
                      
                      
                        $programme_array = $assetManager->returnProgrammesAsset($value['id']);
  
                        $programme_defined = $programme_array[0];
                        //echo $programme_defined;
  
                        $access = [0=>['id'=>$programme_defined],];
  
                        
  
                        $access1 = $sessionView->getStartAndEndProgrammes($access, $debug);
  
                        $access2 = $sessionView->getStartEndProgrammes($access1, $debug);
  
  
                    
                          $programme->Load_from_key($programme_defined);
                          $serverTimeZone = new DateTimeZone('Europe/Brussels');
                          $programmeDate = new DateTime($programme->getdate(), $serverTimeZone);
  
                          $humanReadableProgrammeDate = date_format($programmeDate, "l jS F Y");
  
                          //echo $humanReadableProgrammeDate;
  
                          $startTime = new DateTime($programme->getdate() . ' ' . $access2[0]['startTime'], $serverTimeZone);
  
                          $humanReadableStartTime = date_format($startTime, "H:i"); 
  
                          //var_dump($startTime);
  
  
                          if ($startTime > new DateTime('now')){
  
  
                                  //no proaccess
                                  if ($assetManager->doesUserHaveSameAssetAlready($value['id'], $userid, false) == true){
  
                                      $color_item = 'non-promember-owned';
                                      $start_link = BASE_URL . '/view-pro-content/';
                                      $advert_text = '<i class="fas fa-unlock-alt small"></i>';
  
                                  }else{
                                    
                                      $color_item = 'non-promember-does-not-own';
                                      $start_link = BASE_URL . '/pro-content/';
                                      $advert_text = '<i class="fas fa-lock small" title="You do not own this content.  Click to Purchase"></i><i class="fas fa-shopping-basket small ml-1"></i>';
  
  
                                  }
  
  
                              
  
                            ?>
  
                    <li class="mt-2" style="line-height:1.2;">
  
                      <a class="menu-item <?php echo $color_item;?>"
                              href="<?php echo $start_link . $value['id'] ?>"><i
               class="fas fa-caret-right pl-1 pr-3"></i><?php echo $value['name'] . ' ' . $advert_text; ?></a><br /><span
                              class="text-muted small"><?php echo $humanReadableProgrammeDate . ' ' . $humanReadableStartTime . ' CET'; ?></span>
  
                      </li>
  
                      <?php 
                          }
                        
                        
                        
                        ?>
  
  
                      <?php } ?>



<?php 

$coursesAdvertised = array_slice($coursesAdvertised, 0, 10, true);

                    foreach($coursesAdvertised as $key=>$value){ 
                      
                      
                      $programme_array = $assetManager->returnProgrammesAsset($value['id']);

                      $programme_defined = $programme_array[0];
                      //echo $programme_defined;

                      $access = [0=>['id'=>$programme_defined],];

                      

                      $access1 = $sessionView->getStartAndEndProgrammes($access, $debug);

                      $access2 = $sessionView->getStartEndProgrammes($access1, $debug);


                  
                        $programme->Load_from_key($programme_defined);
                        $serverTimeZone = new DateTimeZone('Europe/Brussels');
                        $programmeDate = new DateTime($programme->getdate(), $serverTimeZone);

                        $humanReadableProgrammeDate = date_format($programmeDate, "l jS F Y");

                        //echo $humanReadableProgrammeDate;

                        $startTime = new DateTime($programme->getdate() . ' ' . $access2[0]['startTime'], $serverTimeZone);

                        $humanReadableStartTime = date_format($startTime, "H:i"); 

                        //var_dump($startTime);


                        if ($startTime > new DateTime('now')){


                                //no proaccess
                                if ($assetManager->doesUserHaveSameAssetAlready($value['id'], $userid, false) == true){

                                    $color_item = 'non-promember-owned';
                                    $start_link = BASE_URL . '/view-pro-content/';
                                    $advert_text = '<i class="fas fa-unlock-alt small"></i>';

                                }else{
                                  
                                    $color_item = 'non-promember-does-not-own';
                                    $start_link = BASE_URL . '/pro-content/';
                                    $advert_text = '<i class="fas fa-lock small" title="You do not own this content.  Click to Purchase"></i><i class="fas fa-shopping-basket small ml-1"></i>';


                                }


                            

                          ?>

                    <li style="line-height:1.2;">

                    <a class="menu-item <?php echo $color_item;?>"
                            href="<?php echo $start_link . $value['id'] ?>"><i
             class="fas fa-caret-right pl-1 pr-3"></i><?php echo $value['name'] . ' ' . $advert_text; ?></a><br /><span
                            class="text-muted small"><?php echo $humanReadableProgrammeDate . ' ' . $humanReadableStartTime . ' CET'; ?></span>

                    </li>

                    <?php 
                        }
                      
                      
                      
                      ?>


                    <?php } ?>

                </ul>
            </div>

            <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
                <h6 class="sub-title text-uppercase font-weight-bold white-text">Past Symposia <br /><small>(Immediate Access)</small>
                </h6>
                <?php //var_dump($coursesAdvertised);?>
                <ul class="list-unstyled">

                    <?php foreach($symposiaAdvertised as $key=>$value){  
                        
                        

                            //no proaccess
                            if ($assetManager->doesUserHaveSameAssetAlready($value['id'], $userid, false) == true){

                                $color_item = 'non-promember-owned';
                                $start_link = BASE_URL . '/view-pro-content/';
                                $advert_text = '<i class="fas fa-unlock-alt small"></i>';

                            }else{
                              
                                $color_item = 'non-promember-does-not-own';
                                $start_link = BASE_URL . '/pro-content/';
                                $advert_text = '<i class="fas fa-lock small" title="You do not own this content.  Click to Purchase"></i><i class="fas fa-shopping-basket small ml-1"></i>';



                            }


                        
                        ?>

                    <li class="mt-2" style="line-height:1.2;">

                    <a class="menu-item <?php echo $color_item;?>"
                            href="<?php echo $start_link . $value['id'] ?>"><i
                                class="fas fa-caret-right pl-1 pr-3"></i><?php echo $value['name'] . ' ' . $advert_text; ?></a>

                    </li>

                    <?php } ?>

                </ul>
            </div>

            <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
                <h6 class="sub-title text-uppercase font-weight-bold white-text">Colonoscopy Courses <br /><small>(Immediate Access)</small>
                </h6>
                <?php //var_dump($coursesAdvertised);?>
                <ul class="list-unstyled">

                    <?php foreach($coursesAdvertised as $key=>$value){ 
                      
                      //get the asset category

                      $assets_paid->Load_from_key($value['id']);
                      //var_dump($assets_paid);
                      $supercategory = null;
                      $supercategory = $assets_paid->getsupercategory();

                      if ($supercategory == '1'){
                      
                      $programme_array = $assetManager->returnProgrammesAsset($value['id']);

                      $programme_defined = $programme_array[0];
                      //echo $programme_defined;

                      $access = [0=>['id'=>$programme_defined],];

                      

                      $access1 = $sessionView->getStartAndEndProgrammes($access, $debug);

                      $access2 = $sessionView->getStartEndProgrammes($access1, $debug);


                  
                        $programme->Load_from_key($programme_defined);
                        $serverTimeZone = new DateTimeZone('Europe/Brussels');
                        $programmeDate = new DateTime($programme->getdate(), $serverTimeZone);

                        $humanReadableProgrammeDate = date_format($programmeDate, "jS F Y");

                        //echo $humanReadableProgrammeDate;

                        $startTime = new DateTime($programme->getdate() . ' ' . $access2[0]['startTime'], $serverTimeZone);

                        $humanReadableStartTime = date_format($startTime, "H:i"); 

                        //var_dump($startTime);


                        if ($startTime < new DateTime('now')){

                            //determine if it is owned and determine start of link


                                //no proaccess
                                if ($assetManager->doesUserHaveSameAssetAlready($value['id'], $userid, false) == true){

                                    $color_item = 'non-promember-owned';
                                    $start_link = BASE_URL . '/view-pro-content/';
                                    $advert_text = '<i class="fas fa-unlock-alt small"></i>';

                                }else{
                                  
                                    $color_item = 'non-promember-does-not-own';
                                    $start_link = BASE_URL . '/pro-content/';
                                    $advert_text = '<i class="fas fa-lock small" title="You do not own this content.  Click to Purchase"></i><i class="fas fa-shopping-basket small ml-1"></i>';


                                }



                          ?>

                    <li class="mt-2" style="line-height:1.2;">

                        <a class="menu-item <?php echo $color_item;?>"
                            href="<?php echo $start_link . $value['id'] ?>"><i
                                class="fas fa-caret-right pl-1 pr-3"></i><?php echo $value['name'] . ' ' . $advert_text; ?></a><br /><span
                            class="text-muted small"><?php echo $humanReadableProgrammeDate;?></span>

                    </li>

                    <?php 
                        }
                      
                      }
                      
                      ?>


                    <?php } ?>

                </ul>
            </div>

            <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
                <h6 class="sub-title text-uppercase font-weight-bold white-text">Polypectomy Courses <br /><small>(Immediate Access)</small>
                </h6>
                <?php //var_dump($coursesAdvertised);?>
                <ul class="list-unstyled">

                    <?php foreach($coursesAdvertised as $key=>$value){ 
                      
                      //get the asset category

                      $assets_paid->Load_from_key($value['id']);
                      //var_dump($assets_paid);
                      $supercategory = null;
                      $supercategory = $assets_paid->getsupercategory();

                      if ($supercategory == '2' || $supercategory == '3'){
                      
                      $programme_array = $assetManager->returnProgrammesAsset($value['id']);

                      $programme_defined = $programme_array[0];
                      //echo $programme_defined;

                      $access = [0=>['id'=>$programme_defined],];

                      

                      $access1 = $sessionView->getStartAndEndProgrammes($access, $debug);

                      $access2 = $sessionView->getStartEndProgrammes($access1, $debug);


                  
                        $programme->Load_from_key($programme_defined);
                        $serverTimeZone = new DateTimeZone('Europe/Brussels');
                        $programmeDate = new DateTime($programme->getdate(), $serverTimeZone);

                        $humanReadableProgrammeDate = date_format($programmeDate, "jS F Y");

                        //echo $humanReadableProgrammeDate;

                        $startTime = new DateTime($programme->getdate() . ' ' . $access2[0]['startTime'], $serverTimeZone);

                        $humanReadableStartTime = date_format($startTime, "H:i"); 

                        //var_dump($startTime);


                        if ($startTime < new DateTime('now')){


                                //no proaccess
                                if ($assetManager->doesUserHaveSameAssetAlready($value['id'], $userid, false) == true){

                                    $color_item = 'non-promember-owned';
                                    $start_link = BASE_URL . '/view-pro-content/';
                                    $advert_text = '<i class="fas fa-unlock-alt small"></i>';


                                }else{
                                  
                                    $color_item = 'non-promember-does-not-own';
                                    $start_link = BASE_URL . '/pro-content/';
                                    $advert_text = '<i class="fas fa-lock small" title="You do not own this content.  Click to Purchase"></i><i class="fas fa-shopping-basket small ml-1"></i>';

                                }



                          ?>

                    <li class="mt-2" style="line-height:1.2;">

                    <a class="menu-item <?php echo $color_item;?>"
                            href="<?php echo $start_link . $value['id'] ?>"><i
                                class="fas fa-caret-right pl-1 pr-3"></i><?php echo $value['name'] . ' ' . $advert_text; ?></a><br /><span
                            class="text-muted small"><?php echo $humanReadableProgrammeDate; ?></span>

                    </li>

                    <?php 
                        }
                      
                      }
                      
                      ?>


                    <?php } ?>

                </ul>
            </div>

            

        </div>
        
        <hr>

        <div class="row my-3">

        <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
                <h6 class="sub-title text-uppercase font-weight-bold white-text">Pro Content Packs <br /><small>(Immediate
                    Access)</small></h6>
                <?php //var_dump($coursesAdvertised);?>
                <ul class="list-unstyled">

                    <?php foreach($learningPacksAdvertised as $key=>$value){   
                        

                            //no proaccess
                            if ($assetManager->doesUserHaveSameAssetAlready($value['id'], $userid, false) == true){

                                $color_item = 'non-promember-owned';
                                $start_link = BASE_URL . '/view-pro-content/';
                                $advert_text = '<i class="fas fa-unlock-alt small"></i>';
                            }else{
                              
                                $color_item = 'non-promember-does-not-own';
                                $start_link = BASE_URL . '/pro-content/';
                                $advert_text = '<i class="fas fa-lock small" title="You do not own this content.  Click to Purchase"></i><i class="fas fa-shopping-basket small ml-1"></i>';

                            }


                        
                        ?>

                    <li class="mt-2" style="line-height:1.2;">

                    <a class="menu-item <?php echo $color_item;?>"
                            href="<?php echo $start_link . $value['id'] ?>"><i
                                class="fas fa-caret-right pl-1 pr-3"></i><?php echo $value['name'] . ' ' . $advert_text; ?></a>

                    </li>

                    <?php } ?>

                </ul>
            </div>

            <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
                <h6 class="sub-title text-uppercase font-weight-bold white-text">Other Courses <br /><small>(Immediate Access)</small>
                </h6>
                <?php //var_dump($coursesAdvertised);?>
                <ul class="list-unstyled">

                    <?php foreach($coursesAdvertised as $key=>$value){ 
                      
                      //get the asset category

                      $assets_paid->Load_from_key($value['id']);
                      //var_dump($assets_paid);
                      $supercategory = null;
                      $supercategory = $assets_paid->getsupercategory();

                      if ($supercategory == '4' || $supercategory == '5' || $supercategory == '7' || $supercategory == '8' || $supercategory == '9' || $supercategory == '10' || $supercategory == '11'){
                      
                      $programme_array = $assetManager->returnProgrammesAsset($value['id']);

                      $programme_defined = $programme_array[0];
                      //echo $programme_defined;

                      $access = [0=>['id'=>$programme_defined],];

                      

                      $access1 = $sessionView->getStartAndEndProgrammes($access, $debug);

                      $access2 = $sessionView->getStartEndProgrammes($access1, $debug);


                  
                        $programme->Load_from_key($programme_defined);
                        $serverTimeZone = new DateTimeZone('Europe/Brussels');
                        $programmeDate = new DateTime($programme->getdate(), $serverTimeZone);

                        $humanReadableProgrammeDate = date_format($programmeDate, "jS F Y");

                        //echo $humanReadableProgrammeDate;

                        $startTime = new DateTime($programme->getdate() . ' ' . $access2[0]['startTime'], $serverTimeZone);

                        $humanReadableStartTime = date_format($startTime, "H:i"); 

                        //var_dump($startTime);


                        if ($startTime < new DateTime('now')){


                                //no proaccess
                                if ($assetManager->doesUserHaveSameAssetAlready($value['id'], $userid, false) == true){

                                    $color_item = 'non-promember-owned';
                                    $start_link = BASE_URL . '/view-pro-content/';
                                    $advert_text = '<i class="fas fa-unlock-alt small"></i>';

                                }else{
                                  
                                    $color_item = 'non-promember-does-not-own';
                                    $start_link = BASE_URL . '/pro-content/';
                                     $advert_text = '<i class="fas fa-lock small" title="You do not own this content.  Click to Purchase"></i><i class="fas fa-shopping-basket small ml-1"></i>';


                                }



                          ?>

                    <li class="mt-2" style="line-height:1.2;">

                    <a class="menu-item <?php echo $color_item;?>"
                            href="<?php echo $start_link . $value['id'] ?>"><i
                                class="fas fa-caret-right pl-1 pr-3"></i><?php echo $value['name'] . ' ' . $advert_text; ?></a><br /><span
                            class="text-muted small"><?php echo $humanReadableProgrammeDate; ?></span>

                    </li>

                    <?php 
                        }
                      
                      }
                      
                      ?>


                    <?php } ?>

                </ul>
            </div>

            <div class="col-md-6 col-xl-3 sub-menu mb-xl-0 mb-4">
             

            <a href="<?php echo BASE_URL;?>/pro-content" class="btn btn-sm text-white bg-secondary hover-gold mt-0">Browse All Pro Content</a>

                    </div>
            
           
        </div>
        <!-- <div class="row">
        <span style="flex:auto; justify-content: end;" class="dropdown-header text-white">Legend <span class="gieqsGold"> you own this</span> <span class="text-muted"> available for purchase </span>
</div> -->
        <div class="row text-right pt-2 px-2">
            <?php   if ($userid) {

$upgradeURL = BASE_URL . '/pages/learning/upgrade.php';

}else{

$upgradeURL = BASE_URL . '/login?destination=subscriptionoptions';


}



if (($proMember === false) && ($fullAccess === false)){?>

            <span style="background-color:rgb(238, 194, 120); flex:auto;" class="dropdown-header text-dark">You could gain access
                to ALL of these courses with a GIEQs Pro subscription. <a href="<?php echo $upgradeURL;?>">Find out
                    more and get a FREE 14 day trial.</a></span>


            <?php                                               }elseif (($proMember === true) || ($fullAccess === true)) {?>

                <span style="background-color:rgb(238, 194, 120); flex:auto;" class="dropdown-header text-dark">You have access to ALL content as a benefit of your GIEQs Pro Subscription.  You must register for individual courses via this menu prior to access.</a></span>


<?php }
?>
        </div>
    </div>

</li>