<?php 

require '../../assets/includes/config.inc.php';
/* Short and sweet */
define('WP_USE_THEMES', false);
spl_autoload_unregister ('class_loader');



require(BASE_URI . '/assets/wp/wp-blog-header.php');

spl_autoload_register ('class_loader');
//get_header(); 

?>




<head>

    <?php

      //define user access level

      $openaccess = 1;

      require BASE_URI . '/head.php';


      ?>


    <!--META DATA-->
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>The Gastrointestinal Quality and Safety (GIEQs) Foundation</title>
    <meta name="description"
        content="The Gastrointestinal Quality and Safety (GIEQs) Foundation is a not-for profit organisation dedicated to improving quality and safety in everyday endoscopic practice.">
    <meta name="author" content="David Tate">
    <meta name="keywords"
        content="colonoscopy, gastroscopy, ERCP, quality, polyp, colon cancer, polypectomy, EMR, endoscopic imaging, colorectal cancer, endoscopy, gieqs, GIEQS, training, digital endoscopy event, digital symposium, ghent, gent, endoscopy quality, quality in endoscopy">

    


</head>

<body>
    <header class="header header-transparent" id="header-main">

        <!-- Topbar -->

        <?php require BASE_URI . '/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/nav.php';?>



        


    </header>



    <?php 


?>


    <div class="blog-container container mt-5 p-10">
    
    <?php
$mypages = get_pages( array( 'include' => 32) );

foreach( $mypages as $page ) {		
	$content = $page->post_content;
	if ( ! $content ) // Check for empty page
		continue;

	$content = apply_filters( 'the_content', $content );
?>
	<h2><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
	<div class="entry"><?php echo $content; ?></div>
<?php
	}	
?>
    
    
    
    
    
    <?php
//$posts = get_posts('numberposts=10&order=ASC&orderby=post_title');
//foreach ($posts as $post) : setup_postdata( $post ); ?>
<?php //the_date(); echo "<br />"; ?>
<span class="display-4 font-weight-light"><?php //the_title(); ?>   </span>

 
<?php //the_content(); ?>
<?php
//endforeach;
?>








                                </div>
                               


                                <?php require(BASE_URI . '/footer.php');?>

<!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
<!-- <script src="assets/js/purpose.core.js"></script> -->
<!-- Page JS -->
<script src="assets/libs/swiper/dist/js/swiper.min.js"></script>
<script src="assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
<script src="assets/libs/typed.js/lib/typed.min.js"></script>
<script src="assets/libs/isotope-layout/dist/isotope.pkgd.min.js"></script>
<script src="assets/libs/jquery-countdown/dist/jquery.countdown.min.js"></script>
<!-- Google maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBuyKngB9VC3zgY_uEB-DKL9BKYMekbeY"></script>
<!-- Purpose JS -->
<script src="assets/js/purpose.js"></script>
<!-- <script src="assets/js/generaljs.js"></script> -->
<script src="assets/js/demo.js"></script>
