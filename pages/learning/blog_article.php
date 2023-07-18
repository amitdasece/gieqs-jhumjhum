

<?php require 'includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      $openaccess = 1;

      //$requiredUserLevel = 6;


      //blank previous browsing

      



      require BASE_URI . '/pages/learning/includes/head.php';

      $general = new general;
      //$blogs = new blogs;
      //$blogContent = new blogContent;

      //require_once(BASE_URI . '/assets/scripts/classes/users.class.php');
      require_once BASE_URI . '/assets/scripts/classes/blogs.class.php';
        $blogs = new blogs;

        require_once BASE_URI . '/assets/scripts/classes/blogContent.class.php';
        $blogContent = new blogContent;

        require_once BASE_URI . '/assets/scripts/classes/blogLink.class.php';
        $blogLink = new blogLink;

      $users = new users;
      $navigator = new navigator;

      if (isset($_GET["id"]) && is_numeric($_GET["id"])){
          $id = $_GET["id"];
      
      }else{
      
          $id = null;
      
      }
               
      if ((!isset($id))){
          ?>
    <div class="main-content container mt-10">

        <?php            
          echo 'This page requires a blog id';
          echo '<br/><br/>Return <a href="' . BASE_URL .  '/blog">home</a>';
          //redirect_user(BASE_URL . '/pages/learning/');

      
          die();
      }

      if (!($blogs->Return_row($id))){
          ?>
        <div class="main-content container mt-10">

            <?php            
                  echo 'Incorrect or missing blog id';
                  echo '<br/><br/>Return <a href="' . BASE_URL .  '/blog">home</a>';
                  //redirect_user(BASE_URL . '/pages/learning/');
      
              
                  die();


      }else{

          $blogs->Load_from_key($id);

      }
                      
      $page_title = $blogs->getname();
     
      

      function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime('now', new DateTimeZone('UTC'));     
        $ago = new DateTime($datetime, new DateTimeZone('UTC'));
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


      ?>

            <!--Page title-->
            <title>GIEQs Online Endoscopy Blog - <?php echo $page_title ?></title>

            <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">



            <style>

            .blog-container {

                font-family: 'nunito', sans-serif;
font-size: 1.3rem !important;
font-weight: 300;
line-height: 1.7 !important;
text-align: left !important;
color: #95aac9;
            }

            .blog-container strong{

                font-weight: 500;
color: #e3ebf6;
}

.blog-container figure {

    text-align: center;

}

            .gieqsGold {

                color: rgb(238, 195, 120);


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


            .article p {

                /* font-size: 1.3rem !important;  */
                font-weight: 300 !important;

            }



            .article li {

                font-size: 1.3rem !important; 
                font-weight: 300 !important;

            }




            .cursor-pointer {

                cursor: pointer;

            }

            @supports ((position: -webkit-sticky) or (position: sticky)) {

                .sticky-top {
                    position: -webkit-sticky !important;
                    position: sticky !important;
                    z-index: 1020;
                    top: 0;
                }
            }


            @media (min-width: 992px) {
                .tagCard {


                    left: -50vw;
                    top: -20vh;


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

            /*
 * Variables
 */
            :root {
                --card-padding: 24px;
                --card-height: 480px;
                --card-skeleton: linear-gradient(#193659 var(--card-height), transparent 0);
                --avatar-size: 32px;
                --avatar-position: var(--card-padding) var(--card-padding);
                --avatar-skeleton: radial-gradient(circle 16px at center, #162e4d 99%, transparent 0);
                --title-height: 32px;
                --title-width: 200px;
                --title-position: var(--card-padding) 180px;
                --title-skeleton: linear-gradient(#162e4d var(--title-height), transparent 0);
                --desc-line-height: 16px;
                --desc-line-skeleton: linear-gradient(#162e4d var(--desc-line-height), transparent 0);
                --desc-line-1-width: 230px;
                --desc-line-1-position: var(--card-padding) 242px;
                --desc-line-2-width: 180px;
                --desc-line-2-position: var(--card-padding) 265px;
                --footer-height: 40px;
                --footer-position: 0 calc(var(--card-height) - var(--footer-height));
                --footer-skeleton: linear-gradient(#162e4d var(--footer-height), transparent 0);
                --blur-width: 200px;
                --blur-size: var(--blur-width) calc(var(--card-height) - var(--footer-height));
            }

            /*
 * Card Skeleton for Loading
 */
            .card-skeleton {
                width: 280px;
                height: var(--card-height);
            }

            .card-skeleton:empty::after {
                content: "";
                display: block;
                width: 100%;
                height: 100%;
                border-radius: 6px;
                box-shadow: 0 10px 45px rgba(0, 0, 0, 0.1);
                background-image: linear-gradient(90deg, rgba(238, 195, 120, 0) 0, rgba(238, 195, 120, 0.8) 50%, rgba(238, 195, 120, 0) 100%), var(--title-skeleton), var(--desc-line-skeleton), var(--desc-line-skeleton), var(--avatar-skeleton), var(--footer-skeleton), var(--card-skeleton);
                background-size: var(--blur-size), var(--title-width) var(--title-height), var(--desc-line-1-width) var(--desc-line-height), var(--desc-line-2-width) var(--desc-line-height), var(--avatar-size) var(--avatar-size), 100% var(--footer-height), 100% 100%;
                background-position: -150% 0, var(--title-position), var(--desc-line-1-position), var(--desc-line-2-position), var(--avatar-position), var(--footer-position), 0 0;
                background-repeat: no-repeat;
                -webkit-animation: loading 1.5s infinite;
                animation: loading 1.5s infinite;
            }

            /*  background-image: linear-gradient(90deg, rgba(211, 211, 211, 0) 0, rgba(211, 211, 211, 0.8) 50%, rgba(211, 211, 211, 0) 100%), var(--title-skeleton), var(--desc-line-skeleton), var(--desc-line-skeleton), var(--avatar-skeleton), var(--footer-skeleton), var(--card-skeleton);
*/

            @-webkit-keyframes loading {
                to {
                    background-position: 350% 0, var(--title-position), var(--desc-line-1-position), var(--desc-line-2-position), var(--avatar-position), var(--footer-position), 0 0;
                }
            }

            @keyframes loading {
                to {
                    background-position: 350% 0, var(--title-position), var(--desc-line-1-position), var(--desc-line-2-position), var(--avatar-position), var(--footer-position), 0 0;
                }
            }

            .demo {
                margin: auto;
                width: 300px;
                height: 700px;
                /* change height to see repeat-y behavior */

                background-image:
                    radial-gradient(circle 16px, white 99%, transparent 0),
                    /* layer 1: title */
                    /* white rectangle with 40px height */
                    linear-gradient(white 40px, transparent 0),
                    /* layer 0: card bg */
                    /* gray rectangle that covers whole element */
                    linear-gradient(gray 100%, transparent 0);

                background-repeat: no-repeat;

                background-size:
                    32px 32px,
                    /* avatar */
                    200px 40px,
                    /* title */
                    100% 100%;
                /* card bg */

                background-position:
                    24px 24px,
                    /* avatar */
                    24px 200px,
                    /* title */
                    0 0;
                /* card bg */

                animation: shine 1s infinite;
            }

            @keyframes shine {
                to {
                    background-position:
                        350% 0,
                        200px
                        /*var(--title-position)*/
                        ,
                        var(--desc-line-1-position),
                        var(--desc-line-2-position),
                        var(--avatar-position),
                        var(--footer-position),
                        0 0
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

        <?php
        $usersMetricsManager = new usersMetricsManager;
        $usersViewsVideo = new usersViewsVideo;
        $usersSocial = new usersSocial;

        require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
        $assetManager = new assetManager;

        $video_PDO = new video_PDO;


        $debug = false;
    ?>






    </header>



    <!-- load all video data -->

    <body>

        <div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>

        <div class="main-content">
            <!-- Header (account) -->
            <section class="page-header bg-dark-dark d-flex align-items-end pt-8 mt-10"
                style="background-image: url('<?php echo BASE_URL;?>/assets/img/backgrounds/gent_wall_blue_v2.png'); background-repeat: no-repeat; background-size: cover; background-position: center center;"
                data-offset-top="#header-main">


                <!-- Header container -->
                <div class="container pt-0 pt-lg-0">
                    <div class="row">
                        <div class=" col-lg-12">
                            <!-- Salute + Small stats -->
                            <div class="row align-items-center mb-4">
                                <div class="col-auto mb-4 mb-md-0">
                                    <span class="h2 mb-0 text-white text-bold d-block">The GIEQs Online Blog.
                                        <?php //echo $_SESSION['firstname'] . ' ' . $_SESSION['surname']?></span>
                                    <span class="text-white">Everyday Endoscopy. Updated weekly.</span>
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
            <?php 


            if (isset($userid)){
            require BASE_URI . '/pages/learning/assets/upgradeNav.php';
            
            }?>
            <div class="d-flex flex-wrap container mt-2">

                <nav aria-label="breadcrumb" class="align-self-center text-right">
                    <ol class="breadcrumb breadcrumb-links p-0 m-0">
                        <li class="breadcrumb-item"><a class="text-white"
                                href="<?php echo BASE_URL . '/pages/learning/index.php'?>">GIEQs
                                Online</a></li>
                        <li class="breadcrumb-item"><a class="text-white"
                                href="<?php echo BASE_URL . '/blog'?>">Blog
                            </a></li>



                        <li class="breadcrumb-item gieqsGold" aria-current="page"><?php echo $page_title;?></li>
                    </ol>
                </nav>

            </div>
            <section class="">
                <?php $users->Load_from_key($blogs->getauthor());?>

                <div class="container pt-6">
                    <div class="row justify-content-center">
                        <div class="col-md-9">
                            <h1 class="lh-150 mb-3"><?php echo $blogs->getname();?></h1>
                            <p class="lead text-muted mb-0" style="font-size:1.4rem !important;"><?php echo $blogs->getpreheader();?></p>
                            <div class="media align-items-center mt-5">
                                <div>
                                    <a href="#" class="avatar rounded-circle mr-3">
                                        <img alt="Image placeholder"
                                            src="<?php echo BASE_URL;?><?php if ($users->getgender() == 1){echo "/assets/img/icons/people/white-female.png";}?><?php if ($users->getgender() == 2){echo "/assets/img/icons/people/white-male.png";}?>"
                                            class="card-img-top">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <span
                                        class="d-block h6 mb-0"><?php echo $users->getfirstname() . ' ' . $users->getsurname();?></span>
                                    <?php 
                
               //work the date
               $blog_date = new DateTime($blogs->getcreated());
               $blog_date_readable = date_format($blog_date, "l jS F Y");

              
               
               $imagesCovers = [

                1 => [0 => '/assets/img/blog/covers/colonoscopy_1920x600.png', ], //Colon Tutor
                2 => [0 => '/assets/img/blog/covers/polypectomy_1920x600.png', ], //Polyp Tutor
                3 => [0 => '/assets/img/blog/covers/imaging_1920x600.png', ], //Imaging Tutor
                4 => [0 => '/assets/img/blog/covers/gastroscopy_1920x600.png', ], //Gastroscopy Tutor
               /*  5 => '', //GIEQs Topics Tutor
                6 => '', //Nursing Tutor
                7 => '', //ERCP Tutor
                8 => '', //EUS Tutor
                9 => '', //Therapeutic EUS Tutor */
                10 => [0 => '/assets/img/blog/covers/complex_polypectomy_1920x600.png', ], //Complex Resection Tutor
                11 => [0 => '/assets/img/blog/covers/submucosal_1920x600.png', ], //Submucosal Endoscopy Tutor
                0 => '', //Video Nav
            
            
              ];

                
                ?>
                                    <span class="text-sm text-muted"><?php echo $blog_date_readable;?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--     <section class="bg-cover bg-size--cover" style="height: 200px; background-image: url('../../assets/img/backgrounds/endoscopy.jpg'); background-position: top center;"></section>
 -->

 

 <?php 
 
 
 //echo $blogs->getsubject();
 
 if (array_key_exists($blogs->getsubject(),$imagesCovers)) {

  $countImagesArray = count($imagesCovers[$blogs->getsubject()]) - 1;
  $countImagesArray2 = count($imagesCovers[$blogs->getsubject()]);

  $random_number = mt_rand(0, $countImagesArray);

  if ($countImagesArray2 > 0){

   ?>
            <section class="bg-cover mt-5"
                style="height: 250px; background-image: url('<?php echo BASE_URL . $imagesCovers[$blogs->getsubject()][$random_number];?>'); background-position: top center; background-size: contain;">
            </section>

<?php 
  }

}?> 

            <section class="blog-container slice">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <!-- Article body -->
                            <article>

                                <?php

$emailContents = $blogLink->getEmailContents($id);

$x = 0;

//var_dump($emailContents);

foreach ($emailContents as $key=>$value){

   





if ($value['img'] != NULL){

    ?>

                                <figure class="figure">
                                    <img alt="Image placeholder" src="<?php echo BASE_URL . $value['img'];?>"
                                        class="img-fluid rounded">
                                    <figcaption class="mt-3 text-muted"><?php echo $value['text'];?></figcaption>
                                </figure>


                                <?php

}elseif ($value['video'] != NULL){

    ?>

                                <div class="row d-flex flex-wrap align-items-lg-stretch py-4 px-0">



                                    <div class="col-lg-12 pt-0 p-4">

                                        <div style="padding:56.25% 0 0 0;position:relative;"><iframe
                                                src="<?php echo 'https://player.vimeo.com/video/' . $value['video'] . '?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479';?>"
                                                frameborder="0" allow="autoplay; fullscreen; picture-in-picture"
                                                allowfullscreen
                                                style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                                        </div>
                                        <figcaption class="mt-3 text-muted"><?php echo $value['text'];?></figcaption>


                                    </div>

                                </div>

                                <?php

    
}else{

    ?>
                                <p class=""> <?php echo $value['text'];?></p>

                                <?
    
  }
  
  
  
  ?>






                                <?php 
  
  $x++;
  
  }?>

                                <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <p class="lead">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
              <h5>First thing you need to do</h5>
              <figure class="figure">
                <img alt="Image placeholder" src="../../assets/img/theme/light/img-3-800x600.jpg" class="img-fluid rounded">
                <figcaption class="mt-3 text-muted">Figure one: Type here your description</figcaption>
              </figure>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <h5>Second thing you need to do</h5>
              <figure class="figure">
                <img alt="Image placeholder" src="../../assets/img/theme/light/img-4-800x600.jpg" class="img-fluid rounded">
                <figcaption class="mt-3 text-muted">Figure two: Type here your description</figcaption>
              </figure>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
             -->
                            </article>
                            <!-- <hr>
            <h5 class="mb-4">Comments</h5>
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
                      <div class="input-group input-group-merge border">
                        <textarea class="form-control" data-toggle="autosize" placeholder="Write your comment" rows="1"></textarea>
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="button">
                            <span class="fas fa-paper-plane"></span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div> -->
                        </div>
                    </div>
                </div>
        </div>
        </section>

        <section class="slice bg-section-secondary delimiter-top delimiter-bottom">
            <div class="container">

                <div class="mb-5 text-center">
                    <h3 class=" mt-4">Latest from the blog</h3>
                    <div class="fluid-paragraph mt-3">
                        <p class="lead lh-180">Weekly nuggets focussed on Everyday techniques. Monthly evening
                            round-ups.</p>
                    </div>
                </div>

                <?php


$maxToShow = 3;
$featuredFirst = false;

require(BASE_URI. '/pages/learning/scripts/show_blogs.php');

?>





                </div>
        </section>

        <?php 


if (isset($userid)){


    ?>

        <section class="slice slice-lg">
            <div class="container">
                <div class="mb-5 text-center">
                    <h3 class=" mt-4">Subscribe for weekly updates from GIEQs</h3>
                    <div class="fluid-paragraph mt-3">
                        <p class="lead lh-180">Improving your knowledge of everyday endoscopy has never been easier.</p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-7">
                        <form class="mt-4">
                            <div class="form-group mb-0">
                                <div class="input-group input-group-lg input-group-merge rounded-pill bg-dark">
                                    <input type="email" class="form-control form-control-flush" name="email"
                                        placeholder="Enter your email address" aria-label="Enter your email address">
                                    <div class="input-group-append">
                                        <button class="btn btn-dark" type="button">
                                            <span class="fas fa-paper-plane"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

<? } ?>


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
        

        $(document).ready(function() {


            $(document).ready(function() {

$(document).on('click', '.card', function() {

    event.preventDefault();
    var id = $(this).attr('data-blog-id');

    window.location.href = siteRoot + "blog_article.php?id="+id;


})


})
           


        })
        </script>
    </body>

</html>