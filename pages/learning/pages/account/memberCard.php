<div class="card bg-gradient-dark hover-shadow-lg">
              <div class="card-body py-3">
                <div class="row row-grid align-items-center">
                  <div class="col-lg-8">
                    <div class="media align-items-center">
                      <a href="#" class="avatar bg-gieqsGold text-dark avatar-lg rounded-circle mr-3">
                        <?php echo $users->getUserInitials($userid);?>
                      </a>
                      <div class="media-body">


                      <?php

                      $accesslevel = $currentUserLevel;
                      
                      if ($accesslevel == 1){

                        $accessLevelText = 'GIEQs.com Superuser';
                      }elseif ($accesslevel == 2){
                
                        $accessLevelText = 'GIEQs.com Creator';
                      }elseif ($accesslevel == 3){
                
                        $accessLevelText = 'GIEQs.com Staff, no creator priveledge';
                      }elseif ($accesslevel == 4 && $sitewide_status == 2){
                
                        $accessLevelText = 'GIEQs Pro Member';
                      }elseif ($accesslevel == 4 && $sitewide_status == 1){
                        
                        $accessLevelText = 'GIEQS Standard Member';
                        
                      }elseif ($accesslevel == 6){
                        
                        $accessLevelText = 'GIEQS Free Member';
                        
                      }
                      
                      
                      ?>
                        <h5 class="text-white mb-0"><?php if ($debug){ echo '$userid is ' . $userid;}  echo $users->getfirstname() . ' ' . $users->getsurname();?></h5>
                        <p class="text-sm text-muted mb-0"><?php echo $accessLevelText;?></p>

                        <div>
                          <!-- <form>
                            <input type="file" name="file-1[]" id="file-1" class="custom-input-file custom-input-file-link" data-multiple-caption="{count} files selected" multiple="">
                            <label for="file-1">
                              <span class="text-white">Change avatar</span>
                            </label>
                          </form> -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php if ($sitewide_status == 1){?>

                  <!--TODO Implement this upgrade functionality-->
                  <div class="col-auto flex-fill mt-4 mt-sm-0 text-sm-right">
                    <a id="upgradePro" href="<?php echo BASE_URL;?>/pages/learning/upgrade.php" class="btn btn-sm btn-white rounded-pill btn-icon shadow bg-gieqsGold text-dark">
                      <span class="btn-inner--icon"><i class="fas fa-fire"></i></span>
                      <span class="btn-inner--text">Upgrade to GIEQs Pro</span>
                    </a>
                  </div>
                  <?php }?>
                  <?php if ($currentUserLevel == 6 && ($sitewide_status != 1 && $sitewide_status != 2)){?>

<!--TODO Implement this upgrade functionality-->
<div class="col-auto flex-fill mt-4 mt-sm-0 text-sm-right">
<a id="upgradeStandard" href="<?php echo BASE_URL;?>/pages/learning/upgrade.php" class="btn btn-sm btn-white rounded-pill btn-icon shadow bg-gieqsGold text-dark mt-2">
    <span class="btn-inner--icon"><i class="fas fa-fire"></i></span>
    <span class="btn-inner--text">Upgrade to GIEQs Standard</span>
  </a>  
<a id="upgradePro" href="<?php echo BASE_URL;?>/pages/learning/upgrade.php" class="btn btn-sm btn-white rounded-pill btn-icon shadow bg-gieqsGold text-dark mt-2">
    <span class="btn-inner--icon"><i class="fas fa-fire"></i></span>
    <span class="btn-inner--text">Upgrade to GIEQs Pro</span>
  </a>
</div>
<?php }?>
                </div>
              </div>
            </div>


<!-- Modal -->
<div class="modal modal-fluid fade" id="modal_1" tabindex="-1" role="dialog" aria-labelledby="modal_1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center py-4">
                        <h6 class="h3">Upgrade to GIEQs Standard!</h6>
                        <p class="lead text-muted">
                            More content from GIEQs Online.  For <span class="gieqsGold">FREE</span>
                        </p>

                        <p class="lead text-muted">
                           What you get:
                        </p>
                        <ul class="list-group text-left">
  <li class="list-group-item gieqsGold">More videos</li>
  <li class="list-group-item gieqsGold">Access to sections : grouped of videos on specific endoscopy topics</li>
  <li class="list-group-item gieqsGold">Access to tags (without filtering)</li>
  <li class="list-group-item gieqsGold">Access to comment on videos</li>
  
</ul>

<p class="lead text-muted mt-3">
                           All we ask in return is for you to update your profile details with your endoscopy background, host institution and a biography.
                        </p>
                        <p class="lead text-muted mt-3">
                           After updating your profile you will automatically receive access to GIEQs Standard.
                        </p>

                        <p class="lead text-muted mt-3">
                           For more information check out our <a href="<?php echo BASE_URL;?>/pages/learning/upgrade.php">upgrade page</a>
                        </p>
                        
                        <button type="button" class="btn btn-sm text-dark bg-gieqsGold mt-3" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>