<?php

	require (BASE_URI . '/assets/scripts/login_functions.php');
     
     //place to redirect the user if not allowed access
     $location = BASE_URL . '/pages/authentication/login.php';
      
     if (!($dbc)){
     require(DB);
     }
     //echo 'head:'.$relative_path;
       
     require(BASE_URI . '/assets/scripts/interpretUserAccess.php');
     
     $registrationURL = BASE_URL . '/pages/program/registration.php';

     //$registrationURL = 'https://eu.eventscloud.com/200200203';
 ?>

<?php 
/*
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$page_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if($page_url=='http://www.gieqs.com/' || $page_url=='https://www.gieqs.com'){ ?>

	<title>The GIEQs Foundation | Online Endoscopy Training Courses and, Webinars</title>
	<meta name="description" content="Want high quality, virtual examples of best practice in gastrointestinal endoscopy and training.  Join for FREE today.  Our cutting-edge Endoscopy platform offers tagged learning at your own page, 24/7 with regular courses and symposia hosted live." >

<?php }elseif($page_url=='https://www.gieqs.com/pages/program/mission.php'){ ?>

	<title>The GIEQs Foundation | Our Mission</title>
	<meta name="description" content="Procedures The mission of the GIEQs Foundation is to improve the safety and efficacy of gastrointestinal endoscopy through training and standardization of training.  We approach this via a yearly Symposium, regular live courses and a state of the art online platform.  We have outreach programs for those who cannot afford to access high quality endoscopy education." >

<?php }elseif($page_url=='https://www.gieqs.com/pages/program/online.php'){ ?>

	<title>GIEQs’ Online Endoscopy Trainer | Virtual-Live Endoscopy Training Courses and Webinars</title>
	<meta name="description" content="Want high quality, virtual examples of best practice in gastrointestinal endoscopy and training.  Join for FREE today.  Our cutting-edge Endoscopy platform offers tagged learning at your own page, 24/7 with regular hosted live." >

<?php }elseif($page_url=='https://www.gieqs.com/pages/program/testimonials.php'){ ?>

	<title>What others are saying about GIEQs</title>
	<meta name="description" content="Everybody is talking about the GIEQs method for Endoscopy Training and Lifelong Learning.  Don’t just take our word for it, read the opinions of previous participants in our courses and symposia!" >
 
<?php } */?>	
<!--iphone fix -->

<meta name="viewport" content="width=device-width, initial-scale=1.0">


 <!-- Favicon -->
 <link rel="icon" href="<?php echo BASE_URL;?>/assets/img/brand/favicongieqs.png" type="image/png">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/@fortawesome/fontawesome-free/css/all.min.css"><!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/swiper/dist/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <!--Extra CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/select2/dist/css/select2.min.css">

    <!-- <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/select2/dist/css/select2bootstrap.min.css">
     -->
    <!-- Purpose CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/purpose.css" id="stylesheet">
   
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/gieqs.css">

<!-- Global JS -->

<script src="<?php echo BASE_URL;?>/assets/js/purpose.core.js"></script>
<script src="<?php echo BASE_URL;?>/assets/libs/select2/dist/js/select2.min.js"></script>
<script src="<?php echo BASE_URL;?>/assets/js/generaljs.js"></script>
<script src="<?php echo BASE_URL;?>/node_modules/jquery-validation/dist/jquery.validate.js"></script>


<!-- Seo Tag Start-->
<meta name="Language" content="English"/>
<meta name='rating' content='General'>
<meta name="YahooSeeker" content="INDEX, FOLLOW">
<meta name="msnbot" content="INDEX, FOLLOW">
<meta name="allow-search" content="yes">
<meta name="robots" content="Index, Follow"/>
<meta name="robots" content="noydir, noodp"/> 
<meta name="revisit-after" content="Weekly">
<meta name="author" content="Gastrointestinal Quality and Safety Foundation (GIEQs)">
<meta name="msvalidate.01" content="5DF39F9156DBB05ED14F3B71627B967A" />
<meta name="distribution" content="Global">
<meta name="google-site-verification" content="iGRygJl7yRS_q1a0VkTFa0TZ-MuzZIDwZhAgVdNjuR8" />

<script async src="https://www.googletagmanager.com/gtag/js?id=G-KT01N45BVS"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-KT01N45BVS');
</script>
<!-- Seo Tag END-->

