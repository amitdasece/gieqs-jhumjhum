<!DOCTYPE html>
<html lang="en">

<?php require 'includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      //$openaccess = 1;

      $requiredUserLevel = 6;


      require BASE_URI . '/pages/learning/includes/head.php';

      $general = new general;

      ?>

    <!--Page title-->
    <title>User Profile</title>

    <script src=<?php echo BASE_URL . "/assets/js/jquery.vimeo.api.min.js"?>></script>
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
				        
                        
                        
		
        ?>
        
        <!-- load all video data -->

        <body>

<div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>

<div class="main-content">
    <!-- Header (account) -->
    <section class="header-account-page bg-primary d-flex align-items-end" data-offset-top="#header-main">
      <!-- Header container -->
      <div class="container pt-4 pt-lg-0">
        <div class="row justify-content-end">
          <div class=" col-lg-8">
            <!-- Salute + Small stats -->
            <div class="row align-items-center mb-4">
              <div class="col-lg-8 col-xl-5 mb-4 mb-md-0">
                <span class="h2 mb-0 text-white d-block">Morning, Heather</span>
                <span class="text-white">Have a nice day!</span>
              </div>
              <div class="col-auto flex-fill d-none d-xl-block">
                <ul class="list-inline row justify-content-lg-end mb-0">
                  <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
                    <span class="badge badge-dot text-white">
                      <i class="bg-success"></i>Sales
                    </span>
                    <a class="d-sm-block h5 text-white font-weight-bold pl-2" href="#">
                      20.5%
                      <small class="fas fa-angle-up text-success"></small>
                    </a>
                  </li>
                  <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
                    <span class="badge badge-dot text-white">
                      <i class="bg-warning"></i>Tasks
                    </span>
                    <a class="d-sm-block h5 text-white font-weight-bold pl-2" href="#">
                      5.7%
                      <small class="fas fa-angle-up text-warning"></small>
                    </a>
                  </li>
                  <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
                    <span class="badge badge-dot text-white">
                      <i class="bg-danger"></i>Sales
                    </span>
                    <a class="d-sm-block h5 text-white font-weight-bold pl-2" href="#">
                      -3.24%
                      <small class="fas fa-angle-down text-danger"></small>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- Account navigation -->
            <div class="d-flex">
              <a href="account-profile-public.html" class="btn btn-icon btn-group-nav shadow btn-neutral">
                <span class="btn-inner--icon"><i class="fas fa-user"></i></span>
                <span class="btn-inner--text d-none d-md-inline-block">My Profile</span>
              </a>
              <div class="btn-group btn-group-nav shadow ml-auto" role="group" aria-label="Basic example">
                <div class="btn-group" role="group">
                  <button id="btn-group-settings" type="button" class="btn btn-neutral btn-icon" data-toggle="dropdown" data-offset="0,8" aria-haspopup="true" aria-expanded="false">
                    <span class="btn-inner--icon"><i class="fas fa-sliders-h"></i></span>
                    <span class="btn-inner--text d-none d-sm-inline-block">Account</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" aria-labelledby="btn-group-settings">
                    <span class="dropdown-header">Profile</span>
                    <a class="dropdown-item" href="account-profile-public.html">Public profile</a>
                    <span class="dropdown-header">Account</span>
                    <a class="dropdown-item" href="account-profile.html">Profile</a>
                    <a class="dropdown-item" href="account-settings.html">Settings</a>
                    <a class="dropdown-item" href="account-billing.html">Billing</a>
                    <a class="dropdown-item" href="account-notifications.html">Notifications</a>
                  </div>
                </div>
                <div class="btn-group" role="group">
                  <button id="btn-group-boards" type="button" class="btn btn-neutral btn-icon" data-toggle="dropdown" data-offset="0,8" aria-haspopup="true" aria-expanded="false">
                    <span class="btn-inner--icon"><i class="fas fa-chart-line"></i></span>
                    <span class="btn-inner--text d-none d-sm-inline-block">Board</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" aria-labelledby="btn-group-boards">
                    <a class="dropdown-item" href="board-overview.html">Overview</a>
                    <a class="dropdown-item" href="board-projects.html">Projects</a>
                    <a class="dropdown-item" href="board-tasks.html">Tasks</a>
                    <a class="dropdown-item" href="board-connections.html">Connections</a>
                  </div>
                </div>
                <div class="btn-group" role="group">
                  <button id="btn-group-listing" type="button" class="btn btn-neutral btn-icon rounded-right" data-toggle="dropdown" data-offset="0,8" aria-haspopup="true" aria-expanded="false">
                    <span class="btn-inner--icon"><i class="fas fa-list-ul"></i></span>
                    <span class="btn-inner--text d-none d-sm-inline-block">Listing</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" aria-labelledby="btn-group-settings">
                    <span class="dropdown-header">Tables</span>
                    <a class="dropdown-item" href="listing-orders.html">Orders</a>
                    <a class="dropdown-item" href="listing-projects.html">Projects</a>
                    <span class="dropdown-header">Flex</span>
                    <a class="dropdown-item" href="listing-users.html">Users</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pt-5 pt-lg-0">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div data-toggle="sticky" data-sticky-offset="30" data-negative-margin=".card-profile-cover">
              <div class="card card-profile border-0">
                <div class="card-profile-cover">
                  <img alt="Image placeholder" src="../../assets/img/theme/light/team-1-800x400.jpg" class="card-img-top">
                </div>
                <a href="#" class="mx-auto">
                  <img alt="Image placeholder" src="../../assets/img/theme/light/team-1-800x800.jpg" class="card-profile-image avatar rounded-circle shadow hover-shadow-lg">
                </a>
                <div class="card-body p-3 pt-0 text-center">
                  <h5 class="mb-0">Betty Mavis</h5>
                  <span class="d-block text-muted mb-3">Senior Developer</span>
                  <div class="avatar-group hover-avatar-ungroup mb-3">
                    <a href="#" class="avatar rounded-circle avatar-sm">
                      <img alt="Image placeholder" src="../../assets/img/theme/light/team-1-800x800.jpg" class="">
                    </a>
                    <a href="#" class="avatar rounded-circle avatar-sm">
                      <img alt="Image placeholder" src="../../assets/img/theme/light/team-2-800x800.jpg" class="">
                    </a>
                    <a href="#" class="avatar rounded-circle avatar-sm">
                      <img alt="Image placeholder" src="../../assets/img/theme/light/team-3-800x800.jpg" class="">
                    </a>
                  </div>
                  <div class="actions d-flex justify-content-between mt-3 pt-3 px-5 delimiter-top">
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
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 mt-lg-5">
            <!-- Change avatar -->
            <div class="card bg-gradient-warning hover-shadow-lg">
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
            </div>
            <!-- Timeline -->
            <div class="card">
              <div class="card-header pt-4 pb-2">
                <div class="d-flex align-items-center">
                  <a href="#" class="avatar rounded-circle shadow">
                    <img alt="Image placeholder" src="../../assets/img/theme/light/team-1-800x800.jpg">
                  </a>
                  <div class="avatar-content">
                    <h6 class="mb-0">Bettie Mavis</h6>
                    <small class="d-block text-muted"><i class="fas fa-clock mr-2"></i>3 hrs ago</small>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <p>Personal profiles are the perfect way for you to grab their attention and persuade recruiters to continue reading your CV because you’re telling them from the off exactly why they should hire you. Of course, you’ll need to know how to write an effective statement first, but we’ll get on to that in a bit.</p>
                <!-- Badges -->
                <div class="d-lg-flex mt-4">
                  <a href="#" class="d-flex align-items-center mr-lg-5 mb-3 mb-lg-0">
                    <div>
                      <div class="icon icon-sm bg-gradient-success text-white rounded-circle icon-shape">
                        <i class="fas fa-user-ninja"></i>
                      </div>
                    </div>
                    <div class="pl-3">
                      <span class="h6">10 Skills</span>
                    </div>
                  </a>
                  <a href="#" class="d-flex align-items-center mr-lg-5 mb-3 mb-lg-0">
                    <div>
                      <div class="icon icon-sm bg-gradient-warning text-white rounded-circle icon-shape">
                        <i class="fas fa-user-friends"></i>
                      </div>
                    </div>
                    <div class="pl-3">
                      <span class="h6">57 Endorsements</span>
                    </div>
                  </a>
                  <a href="#" class="d-flex align-items-center mr-lg-5 mb-3 mb-lg-0">
                    <div>
                      <div class="icon icon-sm bg-gradient-primary text-white rounded-circle icon-shape">
                        <i class="fas fa-award"></i>
                      </div>
                    </div>
                    <div class="pl-3">
                      <span class="h6">7 Awards</span>
                    </div>
                  </a>
                </div>
                <div class="pt-5 mt-5 delimiter-top">
                  <!-- Title -->
                  <h6 class="mb-4">
                    <i class="fas fa-file-signature mr-2"></i>Experience
                  </h6>
                  <!-- Timeline -->
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
                <div class="pt-5 mt-5 delimiter-top">
                  <!-- Title -->
                  <h6>
                    <i class="fas fa-user-n mr-2 mb-4"></i>Skills
                  </h6>
                  <!-- Skil badges -->
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
                <div class="pt-5 mt-5 delimiter-top">
                  <!-- Title -->
                  <h6 class="mb-4">
                    <i class="fas fa-user-friends mr-2"></i>Endorsements
                  </h6>
                  <!-- Rating cards -->
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
            </div>
            <!-- Post -->
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
                </div>
                <!-- Comments -->
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="assets/js/purpose.core.js"></script> -->
    <!-- Page JS -->
    <script src="assets/libs/swiper/dist/js/swiper.min.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <script src="assets/libs/typed.js/lib/typed.min.js"></script>
    <script src="assets/libs/isotope-layout/dist/isotope.pkgd.min.js"></script>
    <script src="assets/libs/jquery-countdown/dist/jquery.countdown.min.js"></script>
    <!-- Google maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBuyKngB9VC3zgY_uEB-DKL9BKYMekbeY"></script>
    <!-- Purpose JS -->
    <script src="../../assets/js/purpose.js"></script>
    <!-- <script src="assets/js/generaljs.js"></script> -->
    <script src="assets/js/demo.js"></script>
    <script>
    var videoPassed = $("#id").text();
                    </script>

    <script src=<?php echo BASE_URL . "/pages/learning/includes/endowiki-player.js"?>></script>
    <script>
        var signup = $('#signup').text();

        function submitPreRegisterForm() {

            var esdLesionObject = pushDataFromFormAJAX("pre-register", "preRegister", "id", null,
            "0"); //insert new object

            esdLesionObject.done(function (data) {

                console.log(data);

                var dataTrim = data.trim();

                console.log(dataTrim);

                if (dataTrim) {

                    try {

                        dataTrim = parseInt(dataTrim);

                        if (dataTrim > 0) {

                            alert("Thank you for your details.  We will keep you updated on everything GIEQs.");
                            $("[data-dismiss=modal]").trigger({
                                type: "click"
                            });

                        }

                    } catch (error) {

                        //data not entered
                        console.log('error parsing integer');
                        $("[data-dismiss=modal]").trigger({
                            type: "click"
                        });


                    }

                    //$('#success').text("New esdLesion no "+data+" created");
                    //$('#successWrapper').show();
                    /* $("#successWrapper").fadeTo(4000, 500).slideUp(500, function() {
                      $("#successWrapper").slideUp(500);
                    });
                    edit = 1;
                    $("#id").text(data);
                    esdLesionPassed = data;
                    fillForm(data); */




                } else {

                    alert("No data inserted, try again");

                }


            });
        }

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