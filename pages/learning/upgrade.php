

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
    <title>GIEQs Online Endoscopy Trainer - Upgrade your Access</title>

    <script src=<?php echo BASE_URL . "/assets/js/jquery.vimeo.api.min.js"?>></script>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">



    <style>
    td {
        white-space: normal !important;
        word-wrap: break-word;
    }



    .header-row {

        color: rgb(238, 195, 120);
        background-color: #1b385d;
        font-size: .75rem;
        /* padding-top: .75rem;
padding-bottom: .75rem; */
        letter-spacing: 1px;
        text-transform: uppercase;
        border-bottom-width: 1px;
    }

    .text-muted {

        /* font-size: 1.025rem !important;
      font-weight: 300 !important; */
        color: #f0f0f0 !important;
    }

    .gieqsGold {

        color: rgb(238, 195, 120) !important;


    }

    .tagButton {

        cursor: pointer;

    }

    .tagCard {

        background-color: #1b385d75;



    }

    .tagCardHeader {

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

        table {
            table-layout: fixed;
        }
    }

    @media (min-width: 1200px) {
        #chapterSelectorDiv {



            top: -3vh;


        }

        #playerContainer {

            margin-top: -20px;

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
            <section class="page-header bg-dark-dark d-flex align-items-end pt-8 mt-10"
                style="background-image: url('<?php echo BASE_URL;?>/assets/img/covers/learning/1v2.png'); background-repeat: no-repeat; background-size: cover; background-position: center center;"
                data-offset-top="#header-main">


                <!-- Header container -->
                <div class="container pt-0 pt-lg-0">
                    <div class="row">
                        <div class=" col-lg-12">
                            <!-- Salute + Small stats -->
                            <div class="row align-items-center mb-4">
                                <div class="col-auto mb-4 mb-md-0">
                                    <span class="h2 mb-0 text-white text-bold d-block"><strong>Upgrade</strong> your
                                        GIEQs Online Access.
                                        <?php //echo $_SESSION['firstname'] . ' ' . $_SESSION['surname']?></span>
                                    <span class="text-white">Get more cases, tagging, links to published evidence and
                                        more.</span>
                                </div>
                                <!-- video -->
                                <div class="col-auto flex-fill d-none d-xl-block">
                                    <!-- <div id="videoDisplay" class="embed-responsive embed-responsive-16by9">
                <iframe  id='videoChapter' class="embed-responsive-item"
                    src='https://player.vimeo.com/video/398791515' allow='autoplay'
                    webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div> -->
                                </div>
                            </div>
                            <!-- Account navigation -->


                        </div>
                    </div>
                </div>
            </section>
            <?php //error_reporting(E_ALL);?>

            <?php 
          
          $users = new users;

          
          require BASE_URI . '/pages/learning/assets/upgradeNav.php';?>

            <!-- <section class="slice bg-section-secondary">
      <div class="container">
        <div class="d-flex flex-row-reverse mt-1 align-items-end">
            <a href="<?php //echo BASE_URL;?>/pages/learning/pages/account/profile.php" class="btn btn-icon btn-group-nav shadow btn-neutral mx-2">
              <span class="btn-inner--icon"><i class="fas fa-user"></i></span>
              <span class="btn-inner--text">My Learning Profile</span>
            </a>

            <a href="https://vimeo.com/422871506" class="btn btn-icon btn-group-nav bg-gieqsGold shadow btn-neutral mx-2" data-fancybox>
                <span class="btn-inner--icon text-dark"><i class="fas fa-directions"></i></span>
                <span class="animated bounce delay-2s btn-inner--text text-dark">Show me the basics!</span>
              </a>
            
        </div>
      </section> -->
            <section class="slice bg-dark pb-250">
                <div class="d-flex align-items-center">
                    <div class="container py-6">
                        <div class="row row-grid align-items-center justify-content-center">
                            <div class="col-lg-6">
                                <div class="py-lg-5 text-center">
                                    <h2 class="h2 text-white mb-3">Upgrade your experience with a GIEQs Online
                                        Subscription</h2>
                                    <p class="lead lh-180 text-white">Premium, curated content. Linked to published
                                        evidence. Quickly searchable for
                                        an unparalleled educational experience.</p>
                                    <a href="#options-text"
                                        class="btn bg-gieqsGold btn-icon rounded-pill hover-translate-y-n3 mt-5 mb-5" style="z-index:10;">
                                        <span class="btn-inner--icon">
                                            <i class="fas fa-arrow-down text-dark"></i>
                                        </span>
                                        <span class="btn-inner--text text-dark">See the options</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shape-container" data-shape-position="bottom" style="height: 342px;">
                    <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1437.24 372.58"
                        class="ie-shape-clouds">
                        <path class="fill-section-primary"
                            d="M1.35,97.76.5-189l16,8.88s28.43-111.93,145.68-53.3c0,0,42.13-28.11,63.71,9.81,0,0,30.73-57.54,90.88-11.11,0,0,136-132.07,196.8,86.3,0,0,86.3-171.3,234.72,5.23,0,0,39.23-102.65,143.19-22.23,0,0,5.88-113.11,149.07-61.46,0,0,68.65-100,189-11.11,0,0,126.84-28.11,151.69,87,0,0,34.65-34.65,56.23-18.31l.33,267.1Z"
                            transform="translate(-0.5 400)"></path>
                        <path class="fill-section-primary opacity-5"
                            d="M.56-113.82,1.35,97.76H1437.74l-.55-207.55s-62.35-102.82-192-23.19c0,0-50.05-64.84-110.35-5.69,0,0-22.75-37.54-52.33-13.65,0,0-18.2-75.08-87.59-30.71,0,0-29.58-18.2-36.4,8,0,0-101.25-122.86-167.23,18.2,0,0-78.49-60.29-137.65,12.51,0,0-35.27-26.16-52.33-1.14,0,0-2.28-27.3-36.4-11.38,0,0-31.85-52.33-91-21.61,0,0-48.92-64.84-111.48-6.83,0,0-62.88-21.69-72.81,29.58,0,0-44.91-23.4-43.23,19.34,0,0-39.82-51.19-81.91,4.55,0,0-54.6-44.37-94.42,9.1C70-122.74,17.56-154.95.56-113.82Z"
                            transform="translate(-0.5 274.83)"></path>
                    </svg>
                </div>
            </section>
            <section id="options-text" class="slice slice-lg">
                <div class="container">
                    <div class="row row-grid align-items-center justify-content-around">

                        <div class="col-lg-5 order-lg-1">
                            <div class="pr-md-4">
                                <h5 class="h3">GIEQs Online Subscriptions.</h5>
                                <p class="text-muted lead my-4">There are 3 levels of GIEQs online membership. Here's
                                    how it works:

                                <ul>

                                    <li class="my-1">You can sign-up for free. GIEQs<span class="gieqsGold"> FREE
                                        </span> membership contains a limited number of cases and does not give
                                        access to comments, tagging or access to published evidence.</li>

                                    <li class="mt-2 my-1">



                                        <p>GIEQs <span class="gieqsGold"> STANDARD </span> gives access to the full tag
                                            functionality of GIEQs online, 1-click
                                            access to published evidence and commenting. Your favourite videos are
                                            tracked for easy access. More PREMIUM content packages are available and you
                                            get (non-live) access to 2 ONLINE COURSES of your choice per year</p>
                                    </li>
                                    <li class="my-1">



                                        <p>GIEQs <span class="gieqsGold"> PRO </span> gives all the advantages of
                                            STANDARD plus access to ALL courses and PREMIUM CONTENT packages on the
                                            site. You also get discounted access to the yearly symposium if you are a
                                            member for > 3 months and catch-up access to last years symposium. </p>
                                    </li>

                                </ul>

                                </p>

                                <a href="#options-table"
                                    class="btn bg-gieqsGold btn-icon rounded-pill hover-translate-y-n3 mt-5">
                                    <span class="btn-inner--icon">
                                        <i class="fas fa-arrow-down text-dark"></i>
                                    </span>
                                    <span class="btn-inner--text text-dark">More details</span>
                                </a>

                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-1">
                            <div class="position-relative" style="z-index: 10;">
                                <img alt="Image placeholder"
                                    src="<?php echo BASE_URL;?>/assets/img/learning/advertising/tagsv2.png"
                                    class="img-center img-fluid">
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <hr>
            <section id="options-table" class="slice slice-lg">
                <div class="container">
                    <p>
                    <h1 class="display-5">GIEQs Online Subscription Options</h1>
                    </p>
                    <div class="row table-responsive-md">
                        <table class="table table-dark">
                            <caption>1 free trial of Standard / Pro per user is available for 14 days. You can peek at
                                any paid content for 15 minutes once per user. Prices subject to change without notice.
                                Consult our terms and conditions before subscribing.</caption>
                            <thead>
                                <tr class="d-flex ">
                                    <th class="col-4 gieqsGold" scope="col"> </th>
                                    <th class="col-2 gieqsGold text-center " scope="col">
                                        <h3 class="my-auto">Free</h3>
                                    </th>
                                    <th class="col-3 gieqsGold text-center" scope="col">
                                        <h3 class="my-auto">Standard</h3>billed monthly
                                    </th>
                                    <th class="col-3 gieqsGold text-center" scope="col">
                                        <h3 class="my-auto">Pro</h3>billed monthly
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr class="d-flex header-row">
                                    <th class="col-4" scope="row">Cost</th>
                                    <td class="col-3 text-center text-muted"> </td>
                                    <td class="col-3 text-center text-muted"> </td>
                                    <td class="col-2 text-center text-muted"> </td>
                                    <td class="col-2 text-center text-muted"> </td>
                                </tr> -->
                                <tr class="d-flex text-white">
                                    <td class="col-4"></td>
                                    <td class="col-2 text-center text-muted"></td>

                                    <?php if ($sitewide_status == 1 || $sitewide_status == 2){?>

                                    <td class="col-3 text-center text-muted"></td>

                                    <?php }else{?>

                                    <td class="col-3 text-center text-muted"><a
                                            class="btn-sm bg-gieqsGold p-1 mt-5 cursor-pointer"
                                            onclick="launchSubscriptionDialog(1);">

                                            <span class="btn-inner--text text-dark text-sm">Get STANDARD</span>
                                        </a></td>

                                    <?php }?>


                                    <?php if ($sitewide_status == 2){?>

                                    <td class="col-3 text-center text-muted"></td>

                                    <?php }else{?>

                                    <td class="col-3 text-center text-muted"><a
                                            class="btn-sm bg-gieqsGold p-1 mt-5 cursor-pointer"
                                            onclick="launchSubscriptionDialog(2);">

                                            <span class="btn-inner--text text-dark text-sm">Get PRO</span>
                                        </a></td>

                                    <?php }?>

                                </tr>
                                <tr class="d-flex text-white">
                                    <td class="col-4">Medical Endoscopist</td>
                                    <td class="col-2 text-center text-muted">FREE</td>

                                    <td class="col-3 text-center text-muted">€ 7</td>
                                    <td class="col-3 text-center text-muted">€ 15</td>
                                </tr>

                                <tr class="d-flex text-white">
                                    <td class="col-4">Trainee endoscopist</td>
                                    <td class="col-2 text-center text-muted">FREE</td>
                                    <td class="col-3 text-center text-muted">€ 5</td>
                                    <td class="col-3 text-center text-muted">€ 10</td>
                                </tr>
                                <tr class="d-flex text-white">
                                    <td class="col-4">Nursing endoscopist / Medical Student / Nursing assistant</td>
                                    <td class="col-2 text-center text-muted">FREE</td>
                                    <td class="col-3 text-center text-muted">€ 3</td>
                                    <td class="col-3 text-center text-muted">€ 5</td>
                                </tr>
                                <tr class="d-flex header-row">
                                    <th class="col-4" scope="row">Site Functionality</th>
                                    <td class="col-2 text-center text-muted"> </td>
                                    <td class="col-3 text-center text-muted"> </td>
                                    <td class="col-3 text-center text-muted"> </td>
                                </tr>
                                <tr class="d-flex text-white">
                                    <td class="col-4">Browse and enjoy free content</td>
                                    <td class="col-2 text-center text-muted">&#10003;</td>
                                    <td class="col-3 text-center text-muted">&#10003;</td>
                                    <td class="col-3 text-center text-muted">&#10003;</td>
                                </tr>
                                <tr class="d-flex text-white">
                                    <td class="col-4">Patented tag-based browsing for faster learning</td>
                                    <td class="col-2 text-center text-muted">x</td>
                                    <td class="col-3 text-center text-muted">&#10003;</td>
                                    <td class="col-3 text-center text-muted">&#10003;</td>
                                </tr>
                                <tr class="d-flex text-white">
                                    <td class="col-4">Direct link to published evidence</td>
                                    <td class="col-2 text-center text-muted">x</td>
                                    <td class="col-3 text-center text-muted">&#10003;</td>
                                    <td class="col-3 text-center text-muted">&#10003;</td>
                                </tr>
                                <tr class="d-flex text-white">
                                    <td class="col-4">Commenting</td>
                                    <td class="col-2 text-center text-muted">x</td>
                                    <td class="col-3 text-center text-muted">&#10003;</td>
                                    <td class="col-3 text-center text-muted">&#10003;</td>
                                </tr>
                                <tr class="d-flex text-white">
                                    <td class="col-4">Store my favourite content for faster access later</td>
                                    <td class="col-2 text-center text-muted">x</td>
                                    <td class="col-3 text-center text-muted">&#10003;</td>
                                    <td class="col-3 text-center text-muted">&#10003;</td>
                                </tr>
                                <tr class="d-flex text-white">
                                    <td class="col-4">Online clinical scoring systems</td>
                                    <td class="col-2 text-center text-muted">&#10003;</td>
                                    <td class="col-3 text-center text-muted">&#10003;</td>
                                    <td class="col-3 text-center text-muted">&#10003;</td>
                                </tr>
                                <tr class="d-flex header-row">
                                    <th class="col-4 gieqsGold" scope="col"> </th>
                                    <th class="col-2 gieqsGold text-center " scope="col">
                                        <h3 class="my-auto">FREE</h3>
                                    </th>
                                    <th class="col-3 gieqsGold text-center" scope="col">
                                        <h3 class="my-auto">STANDARD</h3>billed monthly
                                    </th>
                                    <th class="col-3 gieqsGold text-center" scope="col">
                                        <h3 class="my-auto">PRO</h3>billed monthly
                                    </th>
                                </tr>
                                <tr class="d-flex header-row">
                                    <th scope="row">Content</th>
                                    <td class="col-4"> </td>
                                    <td class="col-2 text-center text-muted"> </td>
                                    <td class="col-3 text-center text-muted"> </td>
                                    <td class="col-3 text-center text-muted"> </td>

                                </tr>

                                <tr class="d-flex text-white">
                                    <td class="col-4">Selection of freely available everyday endoscopy content</td>
                                    <td class="col-2 text-center text-muted">&#10003;</td>
                                    <td class="col-3 text-center text-muted">&#10003;</td>
                                    <td class="col-3 text-center text-muted">&#10003;</td>
                                </tr>
                                <tr class="d-flex text-white">
                                    <td class="col-4">Online Courses<br>(catch-up)</td>
                                    <td class="col-2 text-center text-muted">x</td>
                                    <td class="col-3 text-center text-muted">&#10003;<br>(2 / year)</td>
                                    <td class="col-3 text-center text-muted">&#10003;</td>
                                </tr>
                                <tr class="d-flex text-white">
                                    <td class="col-4">Online Courses<br>(live)</td>
                                    <td class="col-2 text-center text-muted">x</td>
                                    <td class="col-3 text-center text-muted">x</td>
                                    <td class="col-3 text-center text-muted">All*<br> (+ 5-6 new per year)</td>
                                </tr>
                                <tr class="d-flex text-white">
                                    <td class="col-4">Premium Curated Content Packages</td>
                                    <td class="col-2 text-center text-muted">x</td>
                                    <td class="col-3 text-center text-muted">&#10003;<br> (selection)</td>
                                    <td class="col-3 text-center text-muted">&#10003;<br> (all)</td>
                                </tr>
                                <tr class="d-flex text-white">
                                    <td class="col-4">Symposium (catch-up) access</td>
                                    <td class="col-2 text-center text-muted">x</td>
                                    <td class="col-3 text-center text-muted">x</td>
                                    <td class="col-3 text-center text-muted">&#10003;<br> (after 2 months)</td>
                                </tr>
                                <tr class="d-flex text-white">
                                    <td class="col-4">Live symposium access</td>
                                    <td class="col-2 text-center text-muted">x</td>
                                    <td class="col-3 text-center text-muted">x</td>
                                    <td class="col-3 text-center text-muted">&#10003;<br> (discount after 3 months
                                        membership)</td>
                                </tr>
                                <tr class="d-flex text-white">
                                    <td class="col-4"></td>
                                    <td class="col-2 text-center text-muted"></td>

                                    <?php if ($sitewide_status == 1 || $sitewide_status == 2){?>

                                    <td class="col-3 text-center text-muted"></td>

                                    <?php }else{?>

                                    <td class="col-3 text-center text-muted"><a
                                            class="btn-sm bg-gieqsGold p-1 mt-5 cursor-pointer"
                                            onclick="launchSubscriptionDialog(1);">

                                            <span class="btn-inner--text text-dark text-sm">Get STANDARD</span>
                                        </a></td>

                                    <?php }?>


                                    <?php if ($sitewide_status == 2){?>

                                    <td class="col-3 text-center text-muted"></td>

                                    <?php }else{?>

                                    <td class="col-3 text-center text-muted"><a
                                            class="btn-sm bg-gieqsGold p-1 mt-5 cursor-pointer"
                                            onclick="launchSubscriptionDialog(2);">

                                            <span class="btn-inner--text text-dark text-sm">Get PRO</span>
                                        </a></td>

                                    <?php }?>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </section>
            <!-- <section class="slice slice-lg bg-gradient-dark">
                <div class="container">
                    <div class="mb-5 text-center">
                        <h3 class=" mt-4">GIEQs Pro Subscription</h3>
                        <div class="fluid-paragraph mt-3">
                            <p class="lead lh-180">Get access to the full functionality of GIEQs Online.
                                <br />Subscriptions start 9 December 2020</p>
                        </div>
                    </div>
                    <div class="pricing-container">
                        <div class="text-center mb-7">
                            <div class="btn-group" role="group">
                                <button id="monthly" type="button" class="btn btn-secondary active"
                                    data-pricing="monthly">Monthly billing</button>
                                <button id="yearly" type="button" class="btn btn-secondary" data-pricing="yearly">Yearly
                                    billing</button>
                            </div>
                        </div>
                        <div class="pricing card-group flex-column flex-lg-row mb-3">
                            <div class="card card-pricing popular scale-110 text-center px-3 mb-5 mb-lg-0">
                                <span
                                    class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white">Physician</span>
                                <div class="card-header py-5 border-0">
                                    <div class="h1 text-primary text-center mb-0" data-pricing-value-month="5"
                                        data-pricing-value-year="50">&euro;<span class="price">5</span><span
                                            class="h6 ml-2 unit">/ per month</span></div>
                                </div>
                                <div class="card-body delimiter-top">
                                    <ul class="list-unstyled mb-4">
                                        <li>Full access to tag structure</li>
                                        <li>Jump rapidly between related learning</li>
                                        <li>1-click access to published evidence via PubMed</li>
                                        <li>Includes variety of cases<sup>*</sup></li>
                                        <li>Regular new material</li>
                                        <li>Cancel Anytime</li>
                                        <sup>*</sup><span class="text-sm">Other content available to buy
                                            separately</span>
                                    </ul><button type="button" class="btn btn-sm btn-neutral mb-3 trial">Get 1 month
                                        free trial!</button>
                                </div>
                            </div>
                            <div class="card card-pricing  text-center px-3 mb-5 mb-lg-0">
                                <span
                                    class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white">Trainee</span>
                                <div class="card-header py-5 border-0">
                                    <div class="h1 text-primary text-center mb-0" data-pricing-value-month="3"
                                        data-pricing-value-year="30">&euro;<span class="price">3</span><span
                                            class="h6 ml-2 unit">/ per month</span></div>
                                </div>
                                <div class="card-body delimiter-top">
                                    <ul class="list-unstyled mb-4">
                                        <li>Full access to tag structure</li>
                                        <li>Jump rapidly between related learning</li>
                                        <li>1-click access to published evidence via PubMed</li>
                                        <li>Includes variety of cases<sup>*</sup></li>
                                        <li>Regular new material</li>
                                        <li>Cancel Anytime</li>
                                        <sup>*</sup><span class="text-sm">Other content available to buy
                                            separately</span>
                                    </ul><button type="button" class="btn btn-sm btn-neutral mb-3 trial">Get 1 month
                                        free trial!</button>
                                </div>
                            </div>
                            <div class="card card-pricing text-center px-3 mb-5 mb-lg-0">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white">Nurse /
                                    Medical Student</span>
                                <div class="card-header py-5 border-0">
                                    <div class="h1 text-primary text-center mb-0" data-pricing-value-month="2"
                                        data-pricing-value-year="20">&euro;<span class="price">2</span><span
                                            class="h6 ml-2 unit">/ per month</span></div>
                                </div>
                                <div class="card-body delimiter-top">
                                    <ul class="list-unstyled mb-4">
                                        <li>Full access to tag structure</li>
                                        <li>Jump rapidly between related learning</li>
                                        <li>1-click access to published evidence via PubMed</li>
                                        <li>Includes variety of cases<sup>*</sup></li>
                                        <li>Regular new material</li>
                                        <li>Cancel Anytime</li>
                                        <sup>*</sup><span class="text-sm">Other content available to buy
                                            separately</span>
                                    </ul><button type="button" class="btn btn-sm btn-neutral mb-3 trial">Get 1 month
                                        free trial!</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <p class="mt-6 text-muted">Does not include access to all content. Pricing subject to change without
                        notice. <br />If you have an active subscription you will be notified of pricing changes.</p>

                </div>
            </section> -->

            <!-- Current studies -->

            <!--
        <div class="col-auto flex-fill d-none d-xl-block">
            <ul class="list-inline row justify-content-lg-end mb-0">
              <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
                <span class="badge badge-dot text-white">
                  <i class="bg-success"></i>Percentage complete
                </span>
                <a class="d-sm-block h5 text-white font-weight-bold pl-2" href="#">
                  20.5%
                  <small class="fas fa-angle-up text-success"></small>
                </a>
              </li>
              <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
                <span class="badge badge-dot text-white">
                  <i class="bg-warning"></i>Incomplete learning
                </span>
                <a class="d-sm-block h5 text-white font-weight-bold pl-2" href="#">
                  5.7%
                  <small class="fas fa-angle-up text-warning"></small>
                </a>
              </li>
              <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
                <span class="badge badge-dot text-white">
                  <i class="bg-danger"></i>Learning not started
                </span>
                <a class="d-sm-block h5 text-white font-weight-bold pl-2" href="#">
                  -3.24%
                  <small class="fas fa-angle-down text-danger"></small>
                </a>
              </li>
            </ul>
          </div>-->

            <!-- Further to add later Latest projects
        <div class="mb-5">
          <div class="actions-toolbar py-2 mb-4">
            <h5 class="mb-1">Latest projects</h5>
            <p class="text-sm text-muted mb-0">Manage pending orders and track invoices.</p>
          </div>
          <div>
            <table class="table table-cards align-items-center">
              <thead>
                <tr>
                  <th scope="col" class="sort" data-sort="name">Project</th>
                  <th scope="col" class="sort" data-sort="budget">Budget</th>
                  <th scope="col" class="sort" data-sort="status">Status</th>
                  <th scope="col">Users</th>
                  <th scope="col" class="sort" data-sort="completion">Completion</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody class="list">
                <tr>
                  <th scope="row">
                    <div class="media align-items-center">
                      <div>
                        <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-1.png" class="avatar  rounded-circle">
                      </div>
                      <div class="media-body ml-4">
                        <span class="name mb-0 text-sm">Purpose Design System</span>
                      </div>
                    </div>
                  </th>
                  <td class="budget">
                    $2500 USD
                  </td>
                  <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-warning"></i>
                      <span class="status">pending</span>
                    </span>
                  </td>
                  <td>
                    <div class="avatar-group">
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
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="completion mr-2">60%</span>
                      <div>
                        <div class="progress">
                          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="text-right">
                    <!-- Actions 
                    <div class="actions ml-3">
                      <a href="#" class="action-item mr-2" data-toggle="tooltip" title="Quick view">
                        <i class="fas fa-external-link-alt"></i>
                      </a>
                      <a href="#" class="action-item mr-2" data-toggle="tooltip" title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                      </a>
                      <a href="#" class="action-item text-danger mr-2" data-toggle="tooltip" title="Move to trash">
                        <i class="fas fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                <tr class="table-divider"></tr>
                <tr>
                  <th scope="row">
                    <div class="media align-items-center">
                      <div>
                        <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-2.png" class="avatar  rounded-circle">
                      </div>
                      <div class="media-body ml-4">
                        <span class="name mb-0 text-sm">Website redesign</span>
                      </div>
                    </div>
                  </th>
                  <td class="budget">
                    $1800 USD
                  </td>
                  <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-success"></i>
                      <span class="status">completed</span>
                    </span>
                  </td>
                  <td>
                    <div class="avatar-group">
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
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="completion mr-2">100%</span>
                      <div>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="text-right">
                    <!-- Actions 
                    <div class="actions ml-3">
                      <a href="#" class="action-item mr-2" data-toggle="tooltip" title="Quick view">
                        <i class="fas fa-external-link-alt"></i>
                      </a>
                      <a href="#" class="action-item mr-2" data-toggle="tooltip" title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                      </a>
                      <a href="#" class="action-item text-danger mr-2" data-toggle="tooltip" title="Move to trash">
                        <i class="fas fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                <tr class="table-divider"></tr>
                <tr>
                  <th scope="row">
                    <div class="media align-items-center">
                      <div>
                        <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-3.png" class="avatar  rounded-circle">
                      </div>
                      <div class="media-body ml-4">
                        <span class="name mb-0 text-sm">Webpixels website launch</span>
                      </div>
                    </div>
                  </th>
                  <td class="budget">
                    $3150 USD
                  </td>
                  <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-danger"></i>
                      <span class="status">delayed</span>
                    </span>
                  </td>
                  <td>
                    <div class="avatar-group">
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
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="completion mr-2">72%</span>
                      <div>
                        <div class="progress">
                          <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="text-right">
                    <!-- Actions 
                    <div class="actions ml-3">
                      <a href="#" class="action-item mr-2" data-toggle="tooltip" title="Quick view">
                        <i class="fas fa-external-link-alt"></i>
                      </a>
                      <a href="#" class="action-item mr-2" data-toggle="tooltip" title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                      </a>
                      <a href="#" class="action-item text-danger mr-2" data-toggle="tooltip" title="Move to trash">
                        <i class="fas fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                <tr class="table-divider"></tr>
                <tr>
                  <th scope="row">
                    <div class="media align-items-center">
                      <div>
                        <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-4.png" class="avatar  rounded-circle">
                      </div>
                      <div class="media-body ml-4">
                        <span class="name mb-0 text-sm">Purpose Website UI Kit</span>
                      </div>
                    </div>
                  </th>
                  <td class="budget">
                    $4400 USD
                  </td>
                  <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-info"></i>
                      <span class="status">on schedule</span>
                    </span>
                  </td>
                  <td>
                    <div class="avatar-group">
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
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="completion mr-2">90%</span>
                      <div>
                        <div class="progress">
                          <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="text-right">
                    <!-- Actions 
                    <div class="actions ml-3">
                      <a href="#" class="action-item mr-2" data-toggle="tooltip" title="Quick view">
                        <i class="fas fa-external-link-alt"></i>
                      </a>
                      <a href="#" class="action-item mr-2" data-toggle="tooltip" title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                      </a>
                      <a href="#" class="action-item text-danger mr-2" data-toggle="tooltip" title="Move to trash">
                        <i class="fas fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                <tr class="table-divider"></tr>
                <tr>
                  <th scope="row">
                    <div class="media align-items-center">
                      <div>
                        <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-5.png" class="avatar  rounded-circle">
                      </div>
                      <div class="media-body ml-4">
                        <span class="name mb-0 text-sm">Prototype Purpose Dashboard</span>
                      </div>
                    </div>
                  </th>
                  <td class="budget">
                    $2200 USD
                  </td>
                  <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-success"></i>
                      <span class="status">completed</span>
                    </span>
                  </td>
                  <td>
                    <div class="avatar-group">
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
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="completion mr-2">100%</span>
                      <div>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="text-right">
                    <!-- Actions
                    <div class="actions ml-3">
                      <a href="#" class="action-item mr-2" data-toggle="tooltip" title="Quick view">
                        <i class="fas fa-external-link-alt"></i>
                      </a>
                      <a href="#" class="action-item mr-2" data-toggle="tooltip" title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                      </a>
                      <a href="#" class="action-item text-danger mr-2" data-toggle="tooltip" title="Move to trash">
                        <i class="fas fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- Project stats
        <div class="actions-toolbar py-2 mb-4">
          <h5 class="mb-1">Project stats</h5>
          <p class="text-sm text-muted mb-0">Manage pending orders and track invoices.</p>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card mb-0">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="mb-0">Project progress</h6>
                  </div>
                  <div class="text-right">
                    <div class="actions">
                      <a href="#" class="action-item"><i class="fas fa-sync"></i></a>
                      <div class="dropdown action-item" data-toggle="dropdown">
                        <a href="#" class="action-item"><i class="fas fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a href="#" class="dropdown-item">Refresh</a>
                          <a href="#" class="dropdown-item">Manage Widgets</a>
                          <a href="#" class="dropdown-item">Settings</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-1.png" class="avatar  rounded-circle">
                    </div>
                    <div class="flex-fill pl-3 text-limit">
                      <h6 class="progress-text mb-1 text-sm d-block text-limit">Purpose Design System</h6>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="d-flex justify-content-between text-xs text-muted text-right mt-1">
                        <div>
                          <span class="font-weight-bold text-warning">Pending</span>
                        </div>
                        <div>
                          20 Aug 2018
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-2.png" class="avatar  rounded-circle">
                    </div>
                    <div class="flex-fill pl-3 text-limit">
                      <h6 class="progress-text mb-1 text-sm d-block text-limit">Website redesign</h6>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="d-flex justify-content-between text-xs text-muted text-right mt-1">
                        <div>
                          <span class="font-weight-bold text-success">Completed</span>
                        </div>
                        <div>
                          20 Aug 2018
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-3.png" class="avatar  rounded-circle">
                    </div>
                    <div class="flex-fill pl-3 text-limit">
                      <h6 class="progress-text mb-1 text-sm d-block text-limit">Webpixels website launch</h6>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="d-flex justify-content-between text-xs text-muted text-right mt-1">
                        <div>
                          <span class="font-weight-bold text-danger">Delayed</span>
                        </div>
                        <div>
                          20 Aug 2018
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-4.png" class="avatar  rounded-circle">
                    </div>
                    <div class="flex-fill pl-3 text-limit">
                      <h6 class="progress-text mb-1 text-sm d-block text-limit">Purpose Website UI Kit</h6>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="d-flex justify-content-between text-xs text-muted text-right mt-1">
                        <div>
                          <span class="font-weight-bold text-info">On schedule</span>
                        </div>
                        <div>
                          20 Aug 2018
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-5.png" class="avatar  rounded-circle">
                    </div>
                    <div class="flex-fill pl-3 text-limit">
                      <h6 class="progress-text mb-1 text-sm d-block text-limit">Prototype Purpose Dashboard</h6>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="d-flex justify-content-between text-xs text-muted text-right mt-1">
                        <div>
                          <span class="font-weight-bold text-success">Completed</span>
                        </div>
                        <div>
                          20 Aug 2018
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card mb-0">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="mb-0">Project budgets</h6>
                  </div>
                  <div class="text-right">
                    <div class="actions">
                      <a href="#" class="action-item"><i class="fas fa-sync"></i></a>
                      <div class="dropdown action-item" data-toggle="dropdown">
                        <a href="#" class="action-item"><i class="fas fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a href="#" class="dropdown-item">Refresh</a>
                          <a href="#" class="dropdown-item">Manage Widgets</a>
                          <a href="#" class="dropdown-item">Settings</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="media align-items-center">
                    <div class="mr-3">
                      <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-1.png" class="avatar  rounded-circle">
                    </div>
                    <div class="media-body">
                      <h6 class="text-sm d-block text-limit mb-0">Purpose Design System</h6>
                      <span class="d-block text-sm text-muted">Development</span>
                    </div>
                    <div class="media-body text-right">
                      <span class="text-sm text-dark font-weight-bold ml-3">
                        $2500
                      </span>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="media align-items-center">
                    <div class="mr-3">
                      <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-2.png" class="avatar  rounded-circle">
                    </div>
                    <div class="media-body">
                      <h6 class="text-sm d-block text-limit mb-0">Website redesign</h6>
                      <span class="d-block text-sm text-muted">Identity</span>
                    </div>
                    <div class="media-body text-right">
                      <span class="text-sm text-dark font-weight-bold ml-3">
                        $1800
                      </span>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="media align-items-center">
                    <div class="mr-3">
                      <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-3.png" class="avatar  rounded-circle">
                    </div>
                    <div class="media-body">
                      <h6 class="text-sm d-block text-limit mb-0">Webpixels website launch</h6>
                      <span class="d-block text-sm text-muted">Branding</span>
                    </div>
                    <div class="media-body text-right">
                      <span class="text-sm text-dark font-weight-bold ml-3">
                        $3150
                      </span>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="media align-items-center">
                    <div class="mr-3">
                      <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-4.png" class="avatar  rounded-circle">
                    </div>
                    <div class="media-body">
                      <h6 class="text-sm d-block text-limit mb-0">Purpose Website UI Kit</h6>
                      <span class="d-block text-sm text-muted">Marketing</span>
                    </div>
                    <div class="media-body text-right">
                      <span class="text-sm text-dark font-weight-bold ml-3">
                        $4400
                      </span>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="media align-items-center">
                    <div class="mr-3">
                      <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-5.png" class="avatar  rounded-circle">
                    </div>
                    <div class="media-body">
                      <h6 class="text-sm d-block text-limit mb-0">Prototype Purpose Dashboard</h6>
                      <span class="d-block text-sm text-muted">Frameworks</span>
                    </div>
                    <div class="media-body text-right">
                      <span class="text-sm text-dark font-weight-bold ml-3">
                        $2200
                      </span>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div> -->
        </div>
        </section>
        </div>

        <?php require BASE_URI . '/footer.php';?>

        <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
        <!-- <script src="assets/js/purpose.core.js"></script> -->
        <!-- Page JS -->



        <!-- Google maps -->

        <!-- Purpose JS -->
        <script src="../../assets/js/purpose.js"></script>
        <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
        <!-- <script src="assets/js/generaljs.js"></script> -->
        <script>
        var videoPassed = $("#id").text();
        </script>

        <script>
        var signup = $('#signup').text();

        function submitPreRegisterForm() {

            var esdLesionObject = pushDataFromFormAJAX("pre-register", "preRegister", "id", null,
                "0"); //insert new object

            esdLesionObject.done(function(data) {

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

        $(document).ready(function() {




            /* $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#collapseExample').length && 
                    $('#collapseExample').is(":visible")) {
                        $('#collapseExample').collapse('hide');
                    }        
            }); */

            $(document).click(function(event) {
                $target = $(event.target);

                if (!$target.closest('#selectDropdown').length &&
                    $('#selectDropdown').is(":visible")) {
                    $('#selectDropdown').collapse('hide');
                }
            });

            $(document).click(function(event) {
                $target = $(event.target);

                if (!$target.closest('#collapseExample2').length &&
                    $('#collapseExample2').is(":visible")) {
                    $('#collapseExample2').collapse('hide');
                }
            });

            $(document).click(function(event) {
                $target = $(event.target);

                if (!$target.closest('#collapseExample3').length &&
                    $('#collapseExample3').is(":visible")) {
                    $('#collapseExample3').collapse('hide');
                }
            });

            $(document).on('click', '.tagsClose', function() {

                $('#collapseExample').collapse('hide');

            })

            $(document).on('click', '.trial', function() {

                alert(
                    'Thanks for your interest.  We will be activating our subscription service shortly.'
                )


            })

            $(document).on('click', '#monthly', function() {

                //find find pricing
                //find has attribute data-pricing-value-month
                //store this value
                //set pricing find price to that value
                // set pricing find unit to / month

                $(document).find('.card-pricing').each(function() {

                    var monthPrice = $(this).children().find("[data-pricing-value-month]").attr(
                        'data-pricing-value-month')

                    $(this).children().find(".price").text(monthPrice);

                    $(this).children().find(".unit").text('/ per month');




                })


            })

            $(document).on('click', '#yearly', function() {

                //find find pricing
                //find has attribute data-pricing-value-month
                //store this value
                //set pricing find price to that value
                // set pricing find unit to / month

                $(document).find('.card-pricing').each(function() {

                    var yearPrice = $(this).children().find("[data-pricing-value-year]").attr(
                        'data-pricing-value-year')

                    $(this).children().find(".price").text(yearPrice);

                    $(this).children().find(".unit").text('/ per year');




                })


            })

            $('.referencelist').on('click', function() {


                //get the tag name

                var searchTerm = $(this).attr('data');

                //console.log("https://www.ncbi.nlm.nih.gov/pubmed/?term="+searchTerm);

                PopupCenter("https://www.ncbi.nlm.nih.gov/pubmed/?term=" + searchTerm,
                    'PubMed Search (endoWiki)', 800, 700);





            })

            $('.referencelist').on('mouseenter', function() {

                $(this).css('color', 'rgb(238, 194, 120)');
                $(this).css('cursor', 'pointer');

            })

            $('.referencelist').on('mouseleave', function() {

                $(this).css('color', 'white');
                $(this).css('cursor', 'default');

            })


        })
        </script>
    </body>

</html>