<!-- Account navigation -->


<div class="d-flex">
              <a href="#" class="btn btn-icon btn-group-nav shadow btn-neutral">
                <span class="btn-inner--icon"><i class="fas fa-user"></i></span>
                <span class="btn-inner--text d-none d-md-inline-block"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['surname'];?></span>
              </a>
              <div class="btn-group btn-group-nav shadow ml-auto" role="group" aria-label="Basic example">
                
                <div class="btn-group" role="group">
                  <button id="btn-group-listing" type="button" class="btn btn-neutral btn-icon rounded-right" data-toggle="dropdown" data-offset="0,8" aria-haspopup="true" aria-expanded="false">
                    <span class="btn-inner--icon"><i class="fas fa-list-ul"></i></span>
                    <span class="btn-inner--text d-none d-sm-inline-block">Live</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" aria-labelledby="btn-group-settings">
                    <?php if ($currentUserLevel < 4){ ?>
                    <h6 class="dropdown-header">Tagging</h6>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/learning/pages/live/generate_tags_live.php">Tagging Live Screen</a>
                    <?php } ?>
                    <?php if ($currentUserLevel < 4){ ?>
                      <h6 class="dropdown-header">Materials</h6>
                      <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/learning/pages/live/generate_materials_live.php">Materials Live Screen</a>
                      <?php } ?>
                      <?php if ($currentUserLevel < 4){ ?>
                      <h6 class="dropdown-header">Programme Catch Up</h6>
                      <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/program/program-printable-catchup.php">Catch up program for staff</a>
                      <?php } ?>
                    
                  </div>
                </div>
                <div class="btn-group" role="group">
                  <button id="btn-group-listing" type="button" class="btn btn-neutral btn-icon rounded-right" data-toggle="dropdown" data-offset="0,8" aria-haspopup="true" aria-expanded="false">
                    <span class="btn-inner--icon"><i class="fas fa-list-ul"></i></span>
                    <span class="btn-inner--text d-none d-sm-inline-block">Programme</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" aria-labelledby="btn-group-settings">
                    <h6 class="dropdown-header">Overview</h6>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/program/programv2.php" target="_blank">Programme Overview</a>
                    
                    <?php if ($currentUserLevel < 3){ ?>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/program/programv2editor.php" target="_blank">Programme Overview [editable]</a>
                    <?php } ?>
                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">Symposium Registration Manager</h6>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/symposium_registrations.php">Registration Manager (beta)</a>

                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">Session Planning</h6>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/program/program-printable.php">Printable Program (beta)</a>

                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/program/programFaculty.php">Faculty per program</a>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/facultyTasks.php">Faculty tasks</a>
                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">Printable Session Plan</h6>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/printProgramAllv2.php" target="_blank">Printable session plan</a>

                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">Individual Items</h6>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/programmeEdit.php">Programmes</a>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/session.php">Sessions</a>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/faculty_new.php">Faculty</a>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/delegate.php">Delegates</a>
                    <?php if ($currentUserLevel < 4){ ?>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/users.php">Users (Access)</a>
                    <div class="dropdown-divider"></div>

                    <h6 class="dropdown-header">GIEQs III Beta</h6>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/view_assets_gieqs_iii.php">View Assets GIII</a>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/assets_program.php">Edit Asset Structure GIII</a>


                    <?php } ?>
                  </div>
                </div>
              
                <div class="btn-group" role="group">
                  <button id="btn-group-boards" type="button" class="btn btn-neutral btn-icon" data-toggle="dropdown" data-offset="0,8" aria-haspopup="true" aria-expanded="false">
                    <span class="btn-inner--icon"><i class="fas fa-chart-line"></i></span>
                    <span class="btn-inner--text d-none d-sm-inline-block">Courses</span>
                  </button>


                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" aria-labelledby="btn-group-boards">
                  <span class="dropdown-header">Course Managers</span>
                  <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/paid_assets.php">Edit Courses</a>
                  <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/question_manager.php">Edit Questions</a>
                  <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/course_dashboard.php">Course Dashboard</a>
                  <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/emails.php">Email Editor</a>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/socialGenerator.php">Social contact</a>
                    
                  </div>
                </div>
                <?php if ($currentUserLevel < 2){ ?>

                <div class="btn-group" role="group">
                  <button id="btn-group-boards" type="button" class="btn btn-neutral btn-icon" data-toggle="dropdown" data-offset="0,8" aria-haspopup="true" aria-expanded="false">
                    <span class="btn-inner--icon"><i class="fas fa-chart-line"></i></span>
                    <span class="btn-inner--text d-none d-sm-inline-block">Site Settings</span>
                  </button>


                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" aria-labelledby="btn-group-boards">
                  <span class="dropdown-header">GIEQs Online Structure</span>
                  <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/test_backend.php?table=pages">Edit Site Structure</a>
                  <span class="dropdown-header">Curriculum Management</span>
                  <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/curriculae.php">Edit Curriculae</a>
                  <span class="dropdown-header">Question Management</span>
                  <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/question_manager.php">Edit Questions</a>

                  <span class="dropdown-header">Image Management</span>
                  <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/images.php">Edit Images</a>
                  <span class="dropdown-header">Blog</span>
                  <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/blogs.php">Edit Blogs</a>
                  <span class="dropdown-header">Asset Token Access</span>
                  <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/token.php">Edit Token</a>
                  <span class="dropdown-header">GIEQs Online Partners</span>
                  <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/institution.php">Institutions</a>
                  <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/institutional_new.php">Institutions NEW</a>

                  <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/sponsor.php">Edit Sponsors</a>
                  <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/partner.php">Edit Partners</a>
                  <span class="dropdown-header">GIEQs Coin</span>
                  <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/coin_grant.php">Edit Coin Grant</a>
                  <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/coin_spend.php">Edit Coin Spend</a>

                  <span class="dropdown-header">Top Assets</span>
                  <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/top_assets.php">Edit Top Assets and Videos</a>
  
                  </div>
                </div>

                <?php } ?>
                <div class="btn-group" role="group">
                  <button id="btn-group-settings" type="button" class="btn btn-neutral btn-icon" data-toggle="dropdown" data-offset="0,8" aria-haspopup="true" aria-expanded="false">
                    <span class="btn-inner--icon"><i class="fas fa-sliders-h"></i></span>
                    <span class="btn-inner--text d-none d-sm-inline-block">Subscriptions</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" aria-labelledby="btn-group-settings">

                  <?php if ($currentUserLevel < 3){?>
                    <span class="dropdown-header">Subscriptions</span>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/subscriptions_new.php">User Subscriptions</a>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/paid_assets.php">Subscribable Items</a>
                    <a class="dropdown-item" href="<?php echo BASE_URL;?>/pages/backend/enrolments.php">Course Enrolments</a>

                    <?php } ?>
                   
                   
                  </div>
                </div>
                
              </div>
            </div>