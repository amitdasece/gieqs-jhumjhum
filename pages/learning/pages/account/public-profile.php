

<?php require '../../includes/config.inc.php';?>


<head>

    <?php

error_reporting(E_NONE);


      //define user access level

      //$openaccess = 1;

      $requiredUserLevel = 6;


      require BASE_URI . '/headNoPurposeCore.php';

      function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

      $general = new general;
      $users = new users;

      ?>

    <!--Page title-->
    <title>User Profile</title>

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">

    

    <style>
        .gieqsGold {

            color: rgb(238, 195, 120);


        }

        .tagButton {

            cursor: pointer;

        }

        .tagCard {

background-color: #1b385d75; 



}

.tagCardHeader{

    background-color: #162e4d;

}

        

.cursor-pointer {

    cursor: pointer;

}

@media (min-width: 992px) {
    .tagCard {

            
left: -50vw;
top: -20vh;


}
}

@media (min-width: 1200px) {
        #chapterSelectorDiv{

            
                
                top:-3vh;
            

        }
        #playerContainer{

                margin-top:-20px;

        }
        #collapseExample {

            position: absolute; 
            max-width: 50vh; 
            z-index: 25;
        }

        #selectDropdown {

            
            z-index: 25;
            }

            

}
    </style>


</head>

<body>
    <header class="header header-transparent" id="header-main">

        <!-- Topbar -->

        <?php require BASE_URI . '/pages/learning/includes/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/pages/learning/includes/nav.php';?>

        


    </header>

    <?php
		if (isset($_GET["id"]) && is_numeric($_GET["id"])){
			$id = $_GET["id"];
		
		}else{
		
			$id = null;
		
		}
				        
        if (count($_GET) > 0){

	

	
            $data = $general->sanitiseGET($_GET);
            
            foreach ($data as $key=>$value){
              
              $GLOBALS[$key] = $value;
              
              }
          
              if ($debug){
          
                  print_r($data);

              }

    
                  
                  
            
          
              //switch the userLevel to 6
          
                          
                        
		
        ?>
        
       

        <body>



<div class="main-content">
    <!-- Header (account) -->

<?php if ($users->matchRecord($id)){   
    
    $users->Load_from_key($id);
    
    ?>

    <div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>

    <section class="pt-10 bg-dark-dark d-flex align-items-end">
      <!-- Header container -->
      <div class="container mt-4 pt-0 pt-lg-0">
        <div class="row justify-content-end">
          <div class=" col-lg-8">
            <!-- Salute + Small stats -->
           <p class="h4">GIEQs Online User Profile</p>
            <!-- Account navigation -->
            
        
          </div>
        </div>
      </div>
    </section>
    <section class="pt-5 pt-lg-0  mb-6">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div>
              <!-- <div data-toggle="sticky" data-sticky-offset="200" data-negative-margin=".card-profile-cover">-->
              <div class="card card-profile border-0">
                <div class="card-profile-cover">
                  <img alt="Image placeholder" src="<?php echo BASE_URL;?><?php if ($users->getgender() == 1){echo "/assets/img/icons/people/white-female.png";}?><?php if ($users->getgender() == 2){echo "/assets/img/icons/people/white-male.png";}?>" class="card-img-top">
                </div>
                
                <div class="card-body p-3 mt-4 pt-0 text-center">
                  <h5 class="mb-0"><?php echo $users->getfirstname() . ' ' . $users->getsurname();?></h5>
                  <span class="d-block text-white mb-3"><?php if ($users->getendoscopistType() == 1){echo "Medical Endoscopist";}
                        if ($users->getendoscopistType() == 2){echo "Surgical Endoscopist";}
                        if ($users->getendoscopistType() == 3){echo "Nurse Endoscopist";}
                        if ($users->getendoscopistType() == 4){echo "Endoscopy Nurse (assistant)";}
                        if ($users->getendoscopistType() == 5){echo "Medical Student";}
                        if ($users->getendoscopistType() == 6){echo "Nursing Student";}?></span>
                  <span class="d-block text-muted mb-3"><?php echo $users->getUserAccessLevelText($id);?></span>
                  
                  <!-- <div class="actions d-flex justify-content-between mt-3 pt-3 px-5 delimiter-top">
                    <a href="#" class="action-item">
                      <i class="fas fa-envelope"></i>
                    </a>
                    <a href="#" class="action-item">
                      <i class="fas fa-user"></i>
                    </a>
                    <a href="#" class="action-item">
                      <i class="fas fa-chart-pie"></i>
                    </a>
                    <a href="#" class="action-item text-danger">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 mt-lg-5">
            <!-- Change avatar -->
            <!-- <div class="card bg-gradient-warning hover-shadow-lg">
              <div class="card-body py-3">
                <div class="row row-grid align-items-center">
                  <div class="col-lg-8">
                    <div class="media align-items-center">
                      <a href="#" class="avatar avatar-lg rounded-circle mr-3">
                        <img alt="Image placeholder" src="../../assets/img/theme/light/team-1-800x800.jpg">
                      </a>
                      <div class="media-body">
                        <h5 class="text-white mb-0">Heather Wright</h5>
                        <div>
                          <form>
                            <input type="file" name="file-1[]" id="file-1" class="custom-input-file custom-input-file-link" data-multiple-caption="{count} files selected" multiple />
                            <label for="file-1">
                              <span class="text-white">Change avatar</span>
                            </label>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto flex-fill mt-4 mt-sm-0 text-sm-right d-none d-lg-block">
                    <a href="#" class="btn btn-sm btn-white rounded-pill btn-icon shadow">
                      <span class="btn-inner--icon"><i class="fas fa-fire"></i></span>
                      <span class="btn-inner--text">Upgrade to Pro</span>
                    </a>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- Timeline -->
            <div class="card">
              <div class="card-header pt-4 pb-2">
                <div class="d-flex align-items-center">
                <a href="#" class="avatar bg-gieqsGold text-dark avatar-md rounded-circle mr-3 p-1">
                        <?php echo $users->getUserInitials($id);?>
                      </a>
                  <div class="avatar-content">
                    <h6 class="mb-0"><?php echo $users->getfirstname() . ' ' . $users->getsurname();?></h6>
                    <div class="d-flex">
<!--                     <small class="d-block text-muted mr-2"><i class="fas fa-clock mr-2"></i>Profile updated : 3 hrs ago</small>
 -->                    <small class="d-block text-muted mr-2"><i class="fas fa-clock mr-2"></i>Member since : <?php echo time_elapsed_string($users->getregistered_date());?></small>
</div>

                  </div>
                </div>
              </div>
              <div class="card-body">
              <span class="text-white pr-2 pb-2">Centre: <span class="text-muted"><?php echo $users->getcentreName() . ' , ' . $users->getcentreCity();?></span></span>

              <span class="text-white pr-2 pb-2">Country: <span class="text-muted"><?php $country = $users->getcentreCountry(); echo $general->getCountryName($country);?></span></span>

                <p class="mt-1"><span class="text-white pr-2 pb-2">Bio: </span><?php echo $users->getbio();?></p>
                <!-- Badges -->
                <div class="d-lg-flex mt-4">

                <?php if ($users->gettrainee() == 1){?>
                    
                    <a href="#" class="d-flex align-items-center mr-lg-5 mb-3 mb-lg-0">
                    <div>
                      <div class="icon icon-sm bg-gradient-success text-white rounded-circle icon-shape">
                        <i class="fas fa-user-ninja"></i>
                      </div>
                    </div>
                    <div class="pl-3">
                      <span class="h6">Trainee member</span>
                    </div>
                  </a>
                    
                    
                    
                    <?php }else if ($users->gettrainee() == 0){?>

                  <a href="#" class="d-flex align-items-center mr-lg-5 mb-3 mb-lg-0">
                    <div>
                      <div class="icon icon-sm bg-gradient-success text-white rounded-circle icon-shape">
                        <i class="fas fa-user-ninja"></i>
                      </div>
                    </div>
                    <div class="pl-3">
                      <span class="h6">Independent Endoscopist</span>
                    </div>
                  </a>
                  <?php if ($users->getendoscopyTrainingProgramme() == 1  || $users->getendoscopyTrainingProgramme() == 2 || $users->getendoscopyTrainingProgramme() == 3){?>

                  <a href="#" class="d-flex align-items-center mr-lg-5 mb-3 mb-lg-0">
                    <div>
                      <div class="icon icon-sm bg-gradient-warning text-white rounded-circle icon-shape">
                        <i class="fas fa-award"></i>
                      </div>
                    </div>
                    <div class="pl-3">
                      <span class="h6">Completed Endoscopy Fellowship</span>
                    </div>
                  </a>
                  <?php } ?>
                </div>
                <div class="d-lg-flex mt-4">

                  <a href="#" class="d-flex align-items-center mr-lg-5 mb-3 mb-lg-0">
                    <div>
                      <div class="icon icon-sm bg-gradient-primary text-white rounded-circle icon-shape">
                        <i class="fas fa-bolt"></i>
                      </div>
                    </div>
                    <div class="pl-3">
                      <span class="h6">Specialist Interest: <?php if ($users->getspecialistInterest() == 1){echo "General Endoscopy";}?>
                        <?php if ($users->getspecialistInterest() == 2){echo "Endoscopic Resection";}?>
                        <?php if ($users->getspecialistInterest() == 3){echo "Endoscopic imaging";}?>
                        <?php if ($users->getspecialistInterest() == 4){echo "Colonoscopy training";}?>
                        <?php if ($users->getspecialistInterest() == 5){echo "Training theory";}?>
                        <?php if ($users->getspecialistInterest() == 6){echo "ERCP / EUS";}?></span>
                    </div>
                  </a>
                  <?php }?>
                </div>
                <!--<div class="pt-5 mt-5 delimiter-top">-->
                  <!-- Contributions - not yet implemented 
                  <h6 class="mb-4">
                    <i class="fas fa-file-signature mr-2"></i>Contributions
                  </h6>-->
                  <!-- Timeline 
                  <div class="timeline timeline-one-side" data-timeline-content="axis">
                    <div class="timeline-block">
                      <span class="timeline-step border-primary"></span>
                      <div class="timeline-content">
                        <small class="text-muted font-weight-bold">2016 - present</small>
                        <h6>Web Developer at Webpixels</h6>
                        <p class="text-sm lh-160">When we strive to become better than we are everything around us becomes better too. This is a wider card with supporting text below.</p>
                        <div>
                          <span class="badge badge-soft-primary mr-2 mb-2">Bootstrap</span>
                          <span class="badge badge-soft-primary mr-2 mb-2">UI/UX</span>
                          <span class="badge badge-soft-primary mr-2 mb-2">Market Strategy</span>
                        </div>
                      </div>
                    </div>
                    <div class="timeline-block">
                      <span class="timeline-step timeline-step-sm border-warning"></span>
                      <div class="timeline-content">
                        <small class="text-muted font-weight-bold">2014 - 2016</small>
                        <h6>Front Designer at Google</h6>
                        <p class="text-sm lh-160">When we strive to become better than we are everything around us becomes better too. This is a wider card with supporting text below.</p>
                        <div>
                          <span class="badge badge-soft-warning mr-2 mb-2">HTML5</span>
                          <span class="badge badge-soft-warning mr-2 mb-2">CSS3</span>
                          <span class="badge badge-soft-warning mr-2 mb-2">Responsive Design</span>
                        </div>
                      </div>
                    </div>
                    <div class="timeline-block">
                      <span class="timeline-step timeline-step-sm border-info"></span>
                      <div class="timeline-content">
                        <small class="text-muted font-weight-bold">2013 - 2014</small>
                        <h6>Internship at Apple</h6>
                        <p class="text-sm lh-160">When we strive to become better than we are everything around us becomes better too. This is a wider card with supporting text below.</p>
                        <div>
                          <span class="badge badge-soft-info mr-2 mb-2">Product Design</span>
                          <span class="badge badge-soft-info mr-2 mb-2">Development</span>
                          <span class="badge badge-soft-info mr-2 mb-2">Market Strategy</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pt-5 mt-5 delimiter-top">-->
                  <!-- Title 
                  <h6>
                    <i class="fas fa-user-n mr-2 mb-4"></i>Skills
                  </h6>-->
                  <!-- Skil badges 
                  <div>
                    <a href="#" class="badge badge-lg badge-soft-primary d-inline-block mr-2 mb-2">Web Design</a>
                    <a href="#" class="badge badge-lg badge-soft-primary d-inline-block mr-2 mb-2">Development</a>
                    <a href="#" class="badge badge-lg badge-soft-primary d-inline-block mr-2 mb-2">UI/UX</a>
                    <a href="#" class="badge badge-lg badge-soft-primary d-inline-block mr-2 mb-2">Bootstrap 4</a>
                    <a href="#" class="badge badge-lg badge-soft-primary d-inline-block mr-2 mb-2">User Experience</a>
                    <a href="#" class="badge badge-lg badge-soft-primary d-inline-block mr-2 mb-2">Psychology</a>
                    <a href="#" class="badge badge-lg badge-soft-primary d-inline-block mr-2 mb-2">Photoshop</a>
                  </div>
                </div>
                <div class="pt-5 mt-5 delimiter-top">-->
                  <!-- Title 
                  <h6 class="mb-4">
                    <i class="fas fa-user-friends mr-2"></i>Endorsements
                  </h6>-->
                  <!-- Rating cards 
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="card bg-secondary">
                        <div class="p-3">
                          <div class="d-flex align-items-center">
                            <div>
                              <a href="#" class="avatar rounded-circle d-inline-block">
                                <img alt="Image placeholder" src="../../assets/img/theme/light/team-1-800x800.jpg" class="">
                              </a>
                            </div>
                            <div class="pl-3">
                              <a href="#" class="h6 text-sm">Betty Mavis</a><span class="static-rating static-rating-sm d-block"><i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star"></i></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card bg-secondary">
                        <div class="p-3">
                          <div class="d-flex align-items-center">
                            <div>
                              <a href="#" class="avatar rounded-circle d-inline-block">
                                <img alt="Image placeholder" src="../../assets/img/theme/light/team-2-800x800.jpg" class="">
                              </a>
                            </div>
                            <div class="pl-3">
                              <a href="#" class="h6 text-sm">Heather Wright</a><span class="static-rating static-rating-sm d-block"><i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card bg-secondary">
                        <div class="p-3">
                          <div class="d-flex align-items-center">
                            <div>
                              <a href="#" class="avatar rounded-circle d-inline-block">
                                <img alt="Image placeholder" src="../../assets/img/theme/light/team-3-800x800.jpg" class="">
                              </a>
                            </div>
                            <div class="pl-3">
                              <a href="#" class="h6 text-sm">John Sullivan</a><span class="static-rating static-rating-sm d-block"><i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="card bg-secondary">
                        <div class="p-3">
                          <div class="d-flex align-items-center">
                            <div>
                              <a href="#" class="avatar rounded-circle d-inline-block">
                                <img alt="Image placeholder" src="../../assets/img/theme/light/team-4-800x800.jpg" class="">
                              </a>
                            </div>
                            <div class="pl-3">
                              <a href="#" class="h6 text-sm">George Squier</a><span class="static-rating static-rating-sm d-block"><i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star"></i>
                                <i class="star fas fa-star"></i></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card bg-secondary">
                        <div class="p-3">
                          <div class="d-flex align-items-center">
                            <div>
                              <a href="#" class="avatar rounded-circle d-inline-block">
                                <img alt="Image placeholder" src="../../assets/img/theme/light/team-5-800x800.jpg" class="">
                              </a>
                            </div>
                            <div class="pl-3">
                              <a href="#" class="h6 text-sm">Jesse Stevens</a><span class="static-rating static-rating-sm d-block"><i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star"></i></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card bg-secondary">
                        <div class="p-3">
                          <div class="d-flex align-items-center">
                            <div>
                              <a href="#" class="avatar rounded-circle d-inline-block">
                                <img alt="Image placeholder" src="../../assets/img/theme/light/team-6-800x800.jpg" class="">
                              </a>
                            </div>
                            <div class="pl-3">
                              <a href="#" class="h6 text-sm">Monroe Parker</a><span class="static-rating static-rating-sm d-block"><i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i>
                                <i class="star fas fa-star voted"></i></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
            <!-- Post 
            <div class="card mt-4">
              <div class="card-header pt-4 pb-2">
                <div class="d-flex align-items-center">
                  <a href="#" class="avatar rounded-circle shadow">
                    <img alt="Image placeholder" src="../../assets/img/theme/light/team-2-800x800.jpg">
                  </a>
                  <div class="avatar-content">
                    <h6 class="mb-0">Bettie Mavis</h6>
                    <small class="d-block text-muted"><i class="fas fa-clock mr-2"></i>3 hrs ago</small>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <p>Personal profiles are the perfect way for you to grab their attention and persuade recruiters to continue reading your CV because you’re telling them from the off exactly why they should hire you. Of course, you’ll need to know how to write an effective statement first, but we’ll get on to that in a bit.</p>
                <a href="../../assets/img/theme/light/img-4-800x600.jpg" data-fancybox>
                  <img alt="Image placeholder" src="../../assets/img/theme/light/img-4-800x600.jpg" class="img-fluid rounded">
                </a>
                <div class="row align-items-center my-3 pb-3 border-bottom">
                  <div class="col-sm-6">
                    <div class="icon-actions">
                      <a href="#" class="love active">
                        <i class="fas fa-heart"></i>
                        <span class="text-muted">150 likes</span>
                      </a>
                      <a href="#">
                        <i class="fas fa-comment"></i>
                        <span class="text-muted">20 comments</span>
                      </a>
                    </div>
                  </div>
                  <div class="col-sm-6 d-none d-sm-block">
                    <div class="d-flex align-items-center justify-content-sm-end">
                      <small class="pr-2 font-weight-bold">Seen by</small>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexis Ren">
                          <img alt="Image placeholder" src="../../assets/img/theme/light/thumb-1.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Michael Jhonson">
                          <img alt="Image placeholder" src="../../assets/img/theme/light/thumb-2.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Daniel Lewis">
                          <img alt="Image placeholder" src="../../assets/img/theme/light/thumb-3.jpg" class="rounded-circle">
                        </a>
                      </div>
                      <small class="pl-2 font-weight-bold">and 30+ more</small>
                    </div>
                  </div>
                </div>-->
                <!-- Comments
                <div class="mb-3">
                  <div class="media media-comment">
                    <img alt="Image placeholder" class="rounded-circle shadow mr-4" src="../../assets/img/theme/light/team-2-800x800.jpg" style="width: 64px;">
                    <div class="media-body">
                      <div class="media-comment-bubble left-top">
                        <h6 class="mt-0">Alexis Ren</h6>
                        <p class="text-sm lh-160">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                        <div class="icon-actions">
                          <a href="#" class="love active">
                            <i class="fas fa-heart"></i>
                            <span class="text-muted">10 likes</span>
                          </a>
                          <a href="#">
                            <i class="fas fa-comment"></i>
                            <span class="text-muted">1 reply</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="media media-comment">
                    <img alt="Image placeholder" class="rounded-circle shadow mr-4" src="../../assets/img/theme/light/team-3-800x800.jpg" style="width: 64px;">
                    <div class="media-body">
                      <div class="media-comment-bubble left-top">
                        <h6 class="mt-0">Tom Cruise</h6>
                        <p class="text-sm lh-160">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                        <div class="icon-actions">
                          <a href="#" class="love active">
                            <i class="fas fa-heart"></i>
                            <span class="text-muted">20 likes</span>
                          </a>
                          <a href="#">
                            <i class="fas fa-comment"></i>
                            <span class="text-muted">3 replies</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="media media-comment align-items-center">
                    <img alt="Image placeholder" class="avatar rounded-circle shadow mr-4" src="../../assets/img/theme/light/team-1-800x800.jpg">
                    <div class="media-body">
                      <form>
                        <div class="form-group mb-0">
                          <div class="input-group input-group-merge">
                            <textarea class="form-control" data-toggle="autosize" placeholder="Write your comment" rows="1"></textarea>
                            <div class="input-group-append">
                              <button class="btn btn-primary" type="button">
                                <span class="far fa-paper-plane"></span>
                              </button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div> -->
              <!--</div>-->
            </div>
          </div>
        </div>
      </div>
    </section>



<?php }else{?>
    <section class="header-account-page bg-dark-dark d-flex align-items-end">
        <!-- Header container -->
        <div class="container mt-4 pt-0 pt-lg-0">
          <div class="row justify-content-end">
            <div class=" col-lg-8">
              <!-- Salute + Small stats -->
             <p class="h4">User does not exist</p>
             <p class="text-muted"><a href="<?php echo BASE_URL;?>/pages/learning/">Return to GIEQs Online</a></p>
              <!-- Account navigation -->
              
          
            </div>
          </div>
        </div>
      </section>

<?php
} //close match record if

        } //close if GET > 0 if
?>
  </div>

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="assets/js/purpose.core.js"></script> -->
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.core.js"></script>
    <!-- Page JS -->
    <script src="assets/libs/swiper/dist/js/swiper.min.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <script src="assets/libs/typed.js/lib/typed.min.js"></script>
    <script src="assets/libs/isotope-layout/dist/isotope.pkgd.min.js"></script>
    <script src="assets/libs/jquery-countdown/dist/jquery.countdown.min.js"></script>
    <!-- Google maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBuyKngB9VC3zgY_uEB-DKL9BKYMekbeY"></script>
    <!-- Purpose JS -->
    
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>
    
    <!-- <script src="assets/js/generaljs.js"></script> -->
    <script src="assets/js/demo.js"></script>
    <script>
    var videoPassed = $("#id").text();
                   

    

        $(document).ready(function () {

            


            /* $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#collapseExample').length && 
                    $('#collapseExample').is(":visible")) {
                        $('#collapseExample').collapse('hide');
                    }        
            }); */

            $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#selectDropdown').length && 
                    $('#selectDropdown').is(":visible")) {
                        $('#selectDropdown').collapse('hide');
                    }        
            });

            $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#collapseExample2').length && 
                    $('#collapseExample2').is(":visible")) {
                        $('#collapseExample2').collapse('hide');
                    }        
            });

            $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#collapseExample3').length && 
                    $('#collapseExample3').is(":visible")) {
                        $('#collapseExample3').collapse('hide');
                    }        
            });

            $(document).on('click', '.tagsClose', function(){

                $('#collapseExample').collapse('hide');

            })

            $('.referencelist').on('click', function (){
		
		
		//get the tag name
		
		var searchTerm = $(this).attr('data');
		
		//console.log("https://www.ncbi.nlm.nih.gov/pubmed/?term="+searchTerm);
		
		PopupCenter("https://www.ncbi.nlm.nih.gov/pubmed/?term="+searchTerm, 'PubMed Search (endoWiki)', 800, 700);

		
		
		
		
	})

	$('.referencelist').on('mouseenter', function (){

		$(this).css('color', 'rgb(238, 194, 120)');
		$(this).css('cursor', 'pointer');

	})

	$('.referencelist').on('mouseleave', function (){

		$(this).css('color', 'white');
		$(this).css('cursor', 'default');

	})


        })
    </script>
</body>

</html>