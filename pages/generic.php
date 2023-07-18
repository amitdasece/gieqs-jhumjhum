<?php 

$host = substr($_SERVER['HTTP_HOST'], 0, 5);
if (in_array($host, array('local', '127.0', '192.1'))) {
    require ('../assets/includes/config.inc.php');

} else {
   // require $_SERVER['DOCUMENT_ROOT'] .'/../assets/includes/config.inc.php';
    require ('../assets/includes/config.inc.php');
}

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


if (isset($_GET['id'])) {

    $id = $_GET['id'];

}else{

    $id = 93;   //should be generic post which tells that a post id is required
 }

echo '<div id="id" style="display:none;">' . $id . '</div>';

if ($isSuperuser == 1){

    echo '<a href="' . BASE_URL . '/assets/wp/wp-admin/post.php?post=' . $id . '&action=edit" class="btn btn-primary">Edit</a>';

}

$title = get_post_field('post_title', $id);
$author = get_post_field('post_author', $id);


$content = apply_filters('the_content', get_post_field('post_content', $id));

$post_tags = get_the_tags($id);




     


      ?>


    <!--META DATA-->
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title;?></title>
    <meta name="description"
        content="<?php echo get_the_excerpt($id);?>">
    <meta name="author" content="<?php echo $author;?>">
    <meta name="keywords"
        content="<?php if ( $post_tags ) {
	foreach( $post_tags as $tag ) {
    echo $tag->name . ', '; 
	}
}?>">


<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@gieqs_symposium">
<meta name="twitter:creator" content="<?php echo get_the_author_meta('display_name', get_post_field('post_author', $id));?>">
<meta name="twitter:title" content="<?php echo $title;?>">
<meta name="twitter:description" content="<?php echo get_the_excerpt($id);?>">
<meta name="twitter:image" content="<?php echo get_the_post_thumbnail_url($id);?>">

<meta property="og:type" content="website" />
<meta property="fb:app_id" content="493045018280075" />

<meta property="og:url" content="https://www.gieqs.com/blogs/<?php echo $id;?>">
<meta property="og:title" content="<?php echo $title;?>">
<meta property="og:description" content="<?php echo get_the_excerpt($id);?>">
<meta property="og:image" content="<?php echo get_the_post_thumbnail_url($id);?>">

    


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


    <div class="blog-container container mt-5 pt-10">

    <p>

<?php if ($isSuperuser == 1){

    echo '<a href="' . BASE_URL . '/dashboard/gieqs/assets/wp/wp-admin/post.php?post=' . $id . '&action=edit" class="btn btn-primary">Edit</a>';

}

?>

    </p>
    
    <?php


echo '<span class="display-4 font-weight-light">' . $title . '</span>';
echo $content;



?>







                                </div>
                               


                                <?php require(BASE_URI . '/footer.php');?>

<!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
<!-- <script src="assets/js/purpose.core.js"></script> -->
<!-- Page JS -->

<!-- Purpose JS -->
<script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>
<!-- <script src="assets/js/generaljs.js"></script> -->
