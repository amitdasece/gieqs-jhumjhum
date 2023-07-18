<?php
    require (BASE_URI . '/assets/scripts/login_functions.php');
     
     //place to redirect the user if not allowed access
     $location = BASE_URL . '/index.php';
 
     if (!($dbc)){
     require(DB);
     }
    
     
     require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

     $registrationURL = 'https://www.gieqs.com/pages/program/registration.php';
     //$registrationURL = 'https://eu.eventscloud.com/200200203';
 ?>

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
<script src="<?php echo BASE_URL;?>/pages/learning/includes/generaljs.js"></script>
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


