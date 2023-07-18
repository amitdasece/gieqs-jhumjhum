<?php 
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php 

require '../../assets/includes/config.inc.php';
define('WP_USE_THEMES', false);
spl_autoload_unregister ('class_loader');

require(BASE_URI . '/assets/wp/wp-load.php');

spl_autoload_register ('class_loader');

// ini_set('display_errors', 1);
// error_reporting(E_ALL);


if (isset($_GET["id"]) && is_numeric($_GET["id"])){
    $asset_id_url = $_GET["id"];

}else{

    $asset_id_url = null;

}
if ($asset_id_url == '171'){

    header('Location: ' . BASE_URL . '/pages/program/sies.php?id=171');
    exit();

}


//define user access level

$debug = false;

$openaccess = 1;
require BASE_URI . '/headNoPurposeCore.php';


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;

require_once BASE_URI . '/assets/scripts/classes/sessionView.class.php';
$sessionView = new sessionView;

require_once BASE_URI . '/assets/scripts/classes/programme.class.php';
$programme = new programme;

require_once(BASE_URI . '/assets/scripts/classes/token.class.php');
$token = new token;

$blogLink = new blogLink;
$blogs = new blogs;
$blogContent = new blogContent;


if (isset($_GET["action"])){
  $action = $_GET["action"];

}else{

  $action = false;

}

if (isset($_GET["access_token"])){
    $access_token = $_GET["access_token"];
  
  }else{
  
    $access_token = null;
  
  }


$general = new general;





$asset_id_pagewrite = $asset_id_url;
$assets_paid->Load_from_key($asset_id_pagewrite);
$blog_to_use_as_basis = $assets_paid->getlinked_blog();









//rest should come from this




?>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.css">
    <script src="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>

    <!-- SEO -->

    <title><?php echo $assets_paid->getName(); ?> | GIEQs Course</title>
    <meta name="description" content="<?php echo $assets_paid->getdescription(); ?>">
    <?php $post_tags = get_the_tags($blog_to_use_as_basis);?>
    <meta name="keywords"
        content="<?php if ( $post_tags ) {
	foreach( $post_tags as $tag ) {
    echo $tag->name . ', '; 
	}
}else{ echo 'endoscopy training courses, endoscopy training, everyday endoscopy, endoscopy symposium, virtual endoscopy, virtual endoscopy symposium, learn endoscopy online, geeks endoscopy, free endoscopy online, online endoscopy library, endoscopy image library, endoscopy video library, endoscopic imaging training, better endoscopy';  }?>">


    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@gieqs_symposium">
    <meta name="twitter:creator" content="@djtate35">
    <meta name="twitter:title" content="<?php echo $assets_paid->getName(); ?>">
    <meta name="twitter:description" content="<?php echo $assets_paid->getdescription(); ?>">
    <meta name="twitter:image"
        content="<?php echo get_the_post_thumbnail_url($blog_to_use_as_basis);?>">

    <meta property="og:type" content="website" />
    <meta property="fb:app_id" content="493045018280075" />
    <meta property="og:url"
        content="https://www.gieqs.com/pro-content/<?php echo $asset_id_url;?>">
    <meta property="og:title" content="<?php echo $assets_paid->getName(); ?>">
    <meta property="og:description" content="<?php echo $assets_paid->getdescription(); ?>">
    <meta property="og:image"
        content="<?php echo get_the_post_thumbnail_url($blog_to_use_as_basis);?>">


    <style>
    .btn-outline-gieqsGold {

        color: rgb(238, 194, 120);
        border-color: rgb(238, 194, 120);

    }


    .btn-fill-gieqsGold {

        color: #162e4d !important;
        border-color: rgb(238, 194, 120) !important;
        background-color: rgb(238, 194, 120) !important;
    }

    .btn-fill-gieqsGold:hover {



        border-color: rgb(238, 194, 120) !important;
        background-color: #162e4d !important;
        color: rgb(238, 194, 120) !important;


    }

    .btn-fill-gieqsGold-dark {

        background-color: #162e4d !important;
        border-color: rgb(238, 194, 120) !important;
        color: rgb(238, 194, 120) !important;
    }

    .btn-fill-gieqsGold-dark:hover {


        border-color: rgb(238, 194, 120) !important;
        background-color: rgb(238, 194, 120) !important;
        color: #162e4d !important;


    }


    .blog-container {

        font-family: 'nunito', sans-serif;
        font-size: 1.3rem !important;
        font-weight: 300;
        line-height: 1.7 !important;
        text-align: left !important;
        color: #95aac9;
    }

    .blog-container strong {

        font-weight: 500;
        color: #e3ebf6;
    }

    .text-gieqsGold {

        color: rgb(238, 194, 120);

    }

    .bg-gieqsGold {

        background-color: rgb(238, 194, 120);

    }

    .modal-backdrop {
        opacity: 0.75 !important;
    }

    form.is-submitting::before {
        position: absolute;
        content: '';
        top: -0.5em;
        right: -0.5em;
        left: -0.5em;
        bottom: -0.5em;
        background: rgba(0, 0, 0, 0.2) url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/Pgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPgo8c3ZnIHdpZHRoPSI0MHB4IiBoZWlnaHQ9IjQwcHgiIHZpZXdCb3g9IjAgMCA0MCA0MCIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWw6c3BhY2U9InByZXNlcnZlIiBzdHlsZT0iZmlsbC1ydWxlOmV2ZW5vZGQ7Y2xpcC1ydWxlOmV2ZW5vZGQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS1taXRlcmxpbWl0OjEuNDE0MjE7IiB4PSIwcHgiIHk9IjBweCI+CiAgICA8ZGVmcz4KICAgICAgICA8c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWwogICAgICAgICAgICBALXdlYmtpdC1rZXlmcmFtZXMgc3BpbiB7CiAgICAgICAgICAgICAgZnJvbSB7CiAgICAgICAgICAgICAgICAtd2Via2l0LXRyYW5zZm9ybTogcm90YXRlKDBkZWcpCiAgICAgICAgICAgICAgfQogICAgICAgICAgICAgIHRvIHsKICAgICAgICAgICAgICAgIC13ZWJraXQtdHJhbnNmb3JtOiByb3RhdGUoLTM1OWRlZykKICAgICAgICAgICAgICB9CiAgICAgICAgICAgIH0KICAgICAgICAgICAgQGtleWZyYW1lcyBzcGluIHsKICAgICAgICAgICAgICBmcm9tIHsKICAgICAgICAgICAgICAgIHRyYW5zZm9ybTogcm90YXRlKDBkZWcpCiAgICAgICAgICAgICAgfQogICAgICAgICAgICAgIHRvIHsKICAgICAgICAgICAgICAgIHRyYW5zZm9ybTogcm90YXRlKC0zNTlkZWcpCiAgICAgICAgICAgICAgfQogICAgICAgICAgICB9CiAgICAgICAgICAgIHN2ZyB7CiAgICAgICAgICAgICAgICAtd2Via2l0LXRyYW5zZm9ybS1vcmlnaW46IDUwJSA1MCU7CiAgICAgICAgICAgICAgICAtd2Via2l0LWFuaW1hdGlvbjogc3BpbiAxLjVzIGxpbmVhciBpbmZpbml0ZTsKICAgICAgICAgICAgICAgIC13ZWJraXQtYmFja2ZhY2UtdmlzaWJpbGl0eTogaGlkZGVuOwogICAgICAgICAgICAgICAgYW5pbWF0aW9uOiBzcGluIDEuNXMgbGluZWFyIGluZmluaXRlOwogICAgICAgICAgICB9CiAgICAgICAgXV0+PC9zdHlsZT4KICAgIDwvZGVmcz4KICAgIDxnIGlkPSJvdXRlciI+CiAgICAgICAgPGc+CiAgICAgICAgICAgIDxwYXRoIGQ9Ik0yMCwwQzIyLjIwNTgsMCAyMy45OTM5LDEuNzg4MTMgMjMuOTkzOSwzLjk5MzlDMjMuOTkzOSw2LjE5OTY4IDIyLjIwNTgsNy45ODc4MSAyMCw3Ljk4NzgxQzE3Ljc5NDIsNy45ODc4MSAxNi4wMDYxLDYuMTk5NjggMTYuMDA2MSwzLjk5MzlDMTYuMDA2MSwxLjc4ODEzIDE3Ljc5NDIsMCAyMCwwWiIgc3R5bGU9ImZpbGw6YmxhY2s7Ii8+CiAgICAgICAgPC9nPgogICAgICAgIDxnPgogICAgICAgICAgICA8cGF0aCBkPSJNNS44NTc4Niw1Ljg1Nzg2QzcuNDE3NTgsNC4yOTgxNSA5Ljk0NjM4LDQuMjk4MTUgMTEuNTA2MSw1Ljg1Nzg2QzEzLjA2NTgsNy40MTc1OCAxMy4wNjU4LDkuOTQ2MzggMTEuNTA2MSwxMS41MDYxQzkuOTQ2MzgsMTMuMDY1OCA3LjQxNzU4LDEzLjA2NTggNS44NTc4NiwxMS41MDYxQzQuMjk4MTUsOS45NDYzOCA0LjI5ODE1LDcuNDE3NTggNS44NTc4Niw1Ljg1Nzg2WiIgc3R5bGU9ImZpbGw6cmdiKDIxMCwyMTAsMjEwKTsiLz4KICAgICAgICA8L2c+CiAgICAgICAgPGc+CiAgICAgICAgICAgIDxwYXRoIGQ9Ik0yMCwzMi4wMTIyQzIyLjIwNTgsMzIuMDEyMiAyMy45OTM5LDMzLjgwMDMgMjMuOTkzOSwzNi4wMDYxQzIzLjk5MzksMzguMjExOSAyMi4yMDU4LDQwIDIwLDQwQzE3Ljc5NDIsNDAgMTYuMDA2MSwzOC4yMTE5IDE2LjAwNjEsMzYuMDA2MUMxNi4wMDYxLDMzLjgwMDMgMTcuNzk0MiwzMi4wMTIyIDIwLDMyLjAxMjJaIiBzdHlsZT0iZmlsbDpyZ2IoMTMwLDEzMCwxMzApOyIvPgogICAgICAgIDwvZz4KICAgICAgICA8Zz4KICAgICAgICAgICAgPHBhdGggZD0iTTI4LjQ5MzksMjguNDkzOUMzMC4wNTM2LDI2LjkzNDIgMzIuNTgyNCwyNi45MzQyIDM0LjE0MjEsMjguNDkzOUMzNS43MDE5LDMwLjA1MzYgMzUuNzAxOSwzMi41ODI0IDM0LjE0MjEsMzQuMTQyMUMzMi41ODI0LDM1LjcwMTkgMzAuMDUzNiwzNS43MDE5IDI4LjQ5MzksMzQuMTQyMUMyNi45MzQyLDMyLjU4MjQgMjYuOTM0MiwzMC4wNTM2IDI4LjQ5MzksMjguNDkzOVoiIHN0eWxlPSJmaWxsOnJnYigxMDEsMTAxLDEwMSk7Ii8+CiAgICAgICAgPC9nPgogICAgICAgIDxnPgogICAgICAgICAgICA8cGF0aCBkPSJNMy45OTM5LDE2LjAwNjFDNi4xOTk2OCwxNi4wMDYxIDcuOTg3ODEsMTcuNzk0MiA3Ljk4NzgxLDIwQzcuOTg3ODEsMjIuMjA1OCA2LjE5OTY4LDIzLjk5MzkgMy45OTM5LDIzLjk5MzlDMS43ODgxMywyMy45OTM5IDAsMjIuMjA1OCAwLDIwQzAsMTcuNzk0MiAxLjc4ODEzLDE2LjAwNjEgMy45OTM5LDE2LjAwNjFaIiBzdHlsZT0iZmlsbDpyZ2IoMTg3LDE4NywxODcpOyIvPgogICAgICAgIDwvZz4KICAgICAgICA8Zz4KICAgICAgICAgICAgPHBhdGggZD0iTTUuODU3ODYsMjguNDkzOUM3LjQxNzU4LDI2LjkzNDIgOS45NDYzOCwyNi45MzQyIDExLjUwNjEsMjguNDkzOUMxMy4wNjU4LDMwLjA1MzYgMTMuMDY1OCwzMi41ODI0IDExLjUwNjEsMzQuMTQyMUM5Ljk0NjM4LDM1LjcwMTkgNy40MTc1OCwzNS43MDE5IDUuODU3ODYsMzQuMTQyMUM0LjI5ODE1LDMyLjU4MjQgNC4yOTgxNSwzMC4wNTM2IDUuODU3ODYsMjguNDkzOVoiIHN0eWxlPSJmaWxsOnJnYigxNjQsMTY0LDE2NCk7Ii8+CiAgICAgICAgPC9nPgogICAgICAgIDxnPgogICAgICAgICAgICA8cGF0aCBkPSJNMzYuMDA2MSwxNi4wMDYxQzM4LjIxMTksMTYuMDA2MSA0MCwxNy43OTQyIDQwLDIwQzQwLDIyLjIwNTggMzguMjExOSwyMy45OTM5IDM2LjAwNjEsMjMuOTkzOUMzMy44MDAzLDIzLjk5MzkgMzIuMDEyMiwyMi4yMDU4IDMyLjAxMjIsMjBDMzIuMDEyMiwxNy43OTQyIDMzLjgwMDMsMTYuMDA2MSAzNi4wMDYxLDE2LjAwNjFaIiBzdHlsZT0iZmlsbDpyZ2IoNzQsNzQsNzQpOyIvPgogICAgICAgIDwvZz4KICAgICAgICA8Zz4KICAgICAgICAgICAgPHBhdGggZD0iTTI4LjQ5MzksNS44NTc4NkMzMC4wNTM2LDQuMjk4MTUgMzIuNTgyNCw0LjI5ODE1IDM0LjE0MjEsNS44NTc4NkMzNS43MDE5LDcuNDE3NTggMzUuNzAxOSw5Ljk0NjM4IDM0LjE0MjEsMTEuNTA2MUMzMi41ODI0LDEzLjA2NTggMzAuMDUzNiwxMy4wNjU4IDI4LjQ5MzksMTEuNTA2MUMyNi45MzQyLDkuOTQ2MzggMjYuOTM0Miw3LjQxNzU4IDI4LjQ5MzksNS44NTc4NloiIHN0eWxlPSJmaWxsOnJnYig1MCw1MCw1MCk7Ii8+CiAgICAgICAgPC9nPgogICAgPC9nPgo8L3N2Zz4K') no-repeat 50% 50% / 1em 1em;
    }


    /* article p {

    font-size: 1.125rem !important; 
font-weight: 300 !important;

} */


    .modal {
        overflow: auto !important;
    }

    @media screen and (max-width: 400px) {


        .scroll {

            font-size: 1em;

        }

        .h5 {

            font-size: 1em;
        }

        .tiny {
            font-size: 0.75em;

        }

        .btn {

            padding: 0.25rem 1.00rem;
            margin-bottom: 0.75rem;
        }
    }
    </style>
</head>

<body>
    <header class="header header-transparent" id="header-main">
        <!-- Topbar -->

        <?php require BASE_URI . '/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/nav.php';?>



        <?php 

//definitions

//assetid

//$assetid = 13;


//fix GIEQs III
if ($asset_id_url == '95'){

    $asset_id_pagewrite = '95';
    $asset_id_pagewrite2 = '96'; //this will actually be 95 and need to get second part of the array
    $is_symposium = true;

    $symposium_nav_active = [

        0 => '', //news
        1 => 'gieqsGold', //individual reg
        2 => '', //group reg
        3 => '', //program
        4 => '', //faculty
        5 => '', //register now
        
        
        
        ];

     require BASE_URI . '/pages/learning/includes/nav_symposium.php';

    
}elseif($asset_id_url == '175'){


    $asset_id_pagewrite = '175';
    $asset_id_pagewrite2 = '180'; //this will actually be 95 and need to get second part of the array
    $is_symposium = true;

    $symposium_nav_active = [

        0 => '', //news
        1 => 'gieqsGold', //individual reg
        2 => '', //group reg
        3 => '', //program
        4 => '', //faculty
        5 => '', //register now
        
        
        
        ];

     require BASE_URI . '/pages/learning/includes/nav_symposium_4.php';




}elseif ($asset_id_url == '132'){

    $asset_id_pagewrite = '132';
    //$asset_id_pagewrite2 = '96'; //this will actually be 95 and need to get second part of the array
    $is_symposium = false;

    $symposium_nav_active = [

        0 => '', //news
        1 => '', //individual reg
        2 => '', //group reg
        3 => '', //program
        4 => '', //faculty
        5 => 'gieqsGold', //VPK
        
        
        
        ];

     require BASE_URI . '/pages/learning/includes/nav_symposium.php';

    
}else{

    $is_symposium = false;
}

$programme_array = $assetManager->returnProgrammesAsset($asset_id_pagewrite);

$programme_defined = $programme_array[0];
if ($programme_array[1] != ''){

    $programme2 = $programme_array[1];
}else{

    $programme2 = null;
}

if (isset($asset_id_pagewrite2)){

$programme_array2 = $assetManager->returnProgrammesAsset($asset_id_pagewrite2);
$programme_defined3 = $programme_array2[0];
if ($programme_array2[1] != ''){

    $programme4 = $programme_array2[1];
}else{

    $programme4 = null;
}

}

if ($debug){

print_r($programme_defined);
print_r($programme2);
print_r($programme_defined3);

print_r($programme4);



}


$asset_id_pagewrite = $asset_id_url;
$assets_paid->Load_from_key($asset_id_pagewrite);

$blog_to_use_as_basis = $assets_paid->getlinked_blog();

if (isset($blog_to_use_as_basis)){


    $title = get_post_field('post_title', $blog_to_use_as_basis);
    $author = get_post_field('post_author', $blog_to_use_as_basis);
    
    $content = apply_filters('the_content', get_post_field('post_content', $blog_to_use_as_basis));
    
    $post_tags = get_the_tags($blog_to_use_as_basis);

    $blog_date_wp = get_post_field('post_date', $blog_to_use_as_basis);

}


//$blogs->Load_from_key($blog_to_use_as_basis);
//$blogid = $blog_to_use_as_basis;



$access = [0=>['id'=>$programme_defined],];
$access1 = null;


    
$access1 = $sessionView->getStartAndEndProgrammes($access, $debug);

    //var_dump($access1);

    //echo '<br/><br/>now get the start and end times in a single array<br/><br/>';

    $access2 = null;

    $access2 = $sessionView->getStartEndProgrammes($access1, $debug);

    //var_dump($access2);

$programme->Load_from_key($programme_defined);
$serverTimeZone = new DateTimeZone('Europe/Brussels');
$programmeDate = new DateTime($programme->getdate(), $serverTimeZone);

$humanReadableProgrammeDate = date_format($programmeDate, "l jS F Y");

$startTime = new DateTime($programme->getdate() . ' ' . $access2[0]['startTime'], $serverTimeZone);
$endTime = new DateTime($programme->getdate() . ' ' . $access2[0]['endTime'], $serverTimeZone);
$humanStartTime = date_format($startTime, "H:i");
$humanEndTime = date_format($endTime, "H:i T");

if (isset($asset_id_pagewrite2)){

    $accessv1 = [0=>['id'=>$programme_defined3],];

    $accessv11 = null;

    $accessv11 = $sessionView->getStartAndEndProgrammes($accessv1, $debug);

    //var_dump($access1);

    //echo '<br/><br/>now get the start and end times in a single array<br/><br/>';

    $accessv12 = null;

    $accessv12 = $sessionView->getStartEndProgrammes($accessv11, $debug);

    //var_dump($access2);

$programme->Load_from_key($programme_defined3);
//$serverTimeZonev1 = new DateTimeZone('Europe/Brussels');
$programmeDatev1 = new DateTime($programme->getdate(), $serverTimeZone);

$humanReadableProgrammeDatev1 = date_format($programmeDate, "l jS F Y");

$startTimev1 = new DateTime($programme->getdate() . ' ' . $accessv12[0]['startTime'], $serverTimeZone);
$endTimev1 = new DateTime($programme->getdate() . ' ' . $accessv12[0]['endTime'], $serverTimeZone);
$humanStartTimev1 = date_format($startTimev1, "H:i");
$humanEndTimev1 = date_format($endTimev1, "H:i T");


}


if ($debug){
var_dump($currentTime);
}

                            if (isset($access_token) && ($assetManager->checkAssetToken($asset_id_pagewrite, $access_token, false) === true)){  //is set and is valid for this course and there are tokens remaining

                                //we know the asset_id

                                //function check_token (asset_id_desired, token, debug=false)

                               $access_validated = true;

                               //now load the token class

                               $token_from_cipher = $assetManager->getTokenidfromCipher($access_token, false);

                               $token->Load_from_key($token_from_cipher);

                               // get if institutional

                               $institutional_id = $token->getinstitutional_id();

                               //get length 

                               $token_length = $token->getlength();

                               //make some booleans

                               if ((!isset($institutional_id)) || $institutional_id === NULL || $institutional_id == 0){

                                $is_institutional = false;

                               }elseif (isset($institutional_id) && is_numeric($institutional_id)) {

                                $is_institutional = true;

                               }else{

                                $is_institutional = false;

                               }

                               //$debug = true;

                               if ($debug){

                                echo 'We detected a valid access code ' . $access_token;
                                echo '<br><br>';
                                var_dump($is_institutional);
                                echo 'Is_Institutional = : ' . $is_institutional;
                                echo '<br><br>';
                                echo 'Institutional id was  : ' . $institutional_id;
                                echo '<br><br>';
                                echo 'Token length id was  : ' . $token_length;


                               }

                            }else{
                            
                                $access_validated = false;

                                if ($assets_paid->getasset_type() == '1'){

                                    echo '<div class="container mt-10 mb-10">';
                                    echo "Error Code 1. There is an issue with your access to this page.  Please check with us or your referring institution/partner.";
                                    echo "<br/>You can still purchase this item <a href='" . BASE_URL . "/pro-content/" . $asset_id_pagewrite . "'>here</a>. "; 
                                    echo '</div>';
                                    include(BASE_URI . "/footer.php");
                                    exit();

                                }

                                

                             }

                             if (!($access_validated) && isset($access_token)){

                                echo '<div class="container mt-10 mb-10">';
                                echo "Error Code 2. There is an issue with your access code.  Please check with us or your referring institution/partner.";
                                echo "<br/>You can still purchase this item <a href='" . BASE_URL . "/pro-content/" . $asset_id_pagewrite . "'>here</a>. "; 
								echo '</div>';
								include(BASE_URI . "/footer.php");
								exit();
                            

                             }
                             
                             if ($debug){
                             var_dump($access_validated);
                             var_dump($token);
                             }


                             //pass a fake access validated if a pro subscription


   //DETERMINE IF THE USER HAS A SUBSCRIPTION

   if ($userid){
    if ($isSuperuser == 1){
    
      $fullAccess = true;
      $proMember = false;
    
    }elseif ($sitewide_status == 2){ //PRO subscription
    
      $fullAccess = true;
      $proMember = true;
    
    }else{
    
      $fullAccess = false;
      $proMember = false;
    }
    }else{
    
      $fullAccess = false;
      $proMember = false;
    }

    if ($access_validated === false){
        if ($fullAccess === true || $proMember === true){

            //should not be applicable to anything other than symposia, courses and advanced packs
            //change this 2 months after Symposium

            if ($assetManager->getAssetTypeAsset($assets_paid->getid()) == '2' || $assetManager->getAssetTypeAsset($assets_paid->getid()) == '3' || $assetManager->getAssetTypeAsset($assets_paid->getid()) == '4'){
            
                //fix for upcoming symposium (gieqs iii)

                if ($assets_paid->getid() == '175'){
                    
                    $access_validated = false;
                    $proMember = false;
                    $fullAccess = false;


                }else{
            
                    $access_validated = true;
                }
            }


        }

    }

                             
                             ?>

        <div id="action" style="display:none;"><?php if ($action){echo $action;}?></div>
        <div id="access_token" style="display:none;"><?php if ($access_validated){echo $access_token;}?></div>
        <div id="asset_id" style="display:none;"><?php if ($asset_id_url){echo $asset_id_url;}?></div>
        <div id="programme_defined" style="display:none;"><?php if (isset($programme_defined)){echo $programme_defined;}else{echo 'false';}?></div>
        <div id="programme2" style="display:none;"><?php if ($programme2!=null){echo $programme2;}else{echo 'false';}?></div>
        <div id="programme_defined3" style="display:none;"><?php if (isset($programme_defined3)){echo $programme_defined3;}else{echo 'false';}?></div>
        <div id="programme4" style="display:none;"><?php if ($programme4!=null){echo $programme4;}else{echo 'false';}?></div>
        <div id="isSymposium" style="display:none;"><?php if ($is_symposium){echo 'true';}else{echo 'false';}?></div>
        <!--         <div id="stripe-status-live" style="display:none;"><?php //if ($stripe_status_live){echo 'true';}else{echo 'false';}?></div>
 -->
    </header>


    <?php


		
				        if ($asset_id_url){
		
                            $access = $assets_paid->Return_row($asset_id_pagewrite);
							if ($access === false){
                                echo '<div class="container mt-10 mb-10">';
                                echo "Passed id does not exist in the database";
								echo '</div>';
								include(BASE_URI . "/footer.php");
								exit();
		
							}
						}else {
							echo '<div class="container mt-10 mb-10">';
							echo "This page requires the id of an asset existing in the database to be passed";
							echo '</div>';
							include(BASE_URI . "/footer.php");
							exit();
							
                        }

        
                        
                  
                        

?>

    <div class="main-content">

        <?php 
    
    //if an asset

    //$debug = true;


    
    $partnerAsset = $assets_paid->getpartner();

    if ($debug){


        echo '<br/><br/><br/><br/>';
        var_dump($assets_paid);

        echo $partnerAsset . ' is partnerAsset';
    }

    $sponsorAsset = $assets_paid->getsponsor();

    if ($partnerAsset != ''){

        require_once(BASE_URI . '/assets/scripts/classes/partner.class.php');
        $partner = new partner;
        //get the logo from partner

        $partner->Load_from_key($partnerAsset);

        $partner_logo_check = $partner->getlogo_src();

        if ($partner_logo_check != ''){

            $partner_src = $partner_logo_check;
        }else{

            $partner_src = FALSE;
            
        }

        if ($debug){


            echo '<br/><br/><br/><br/>';
            var_dump($partner);
    
            echo $partner_logo_check . ' is partner_logo_check';
            echo $partner_src . ' is partner_src';
        }

        //store the src

        //echo below

    }

    if ($sponsorAsset != ''){

        require_once(BASE_URI . '/assets/scripts/classes/sponsor.class.php');
        $sponsor = new sponsor;
        //get the logo from partner

        $sponsor->Load_from_key($sponsorAsset);


        $sponsor_logo_check = $sponsor->getlogo_src();

        if ($sponsor_logo_check != ''){

            $sponsor_src = $sponsor_logo_check;
        }else{

            $sponsor_src = FALSE;
            
        }

        //store the src

        //echo below

    }
    
   // $debug = false;

   //TODOTODAY use token class to get the data for instutitonal
   //TODOTODAY use token class to get the length of the subscription if institutional

   //TODOTODAY disable access here without institutional if asset type is subscription (1)

    
    
    
    ?>

        <!-- Header (v1) -->
        <section class="header-1 bg-gradient-dark" data-offset-top="#header-main">


        </section>

        <!-- PROGRAM TABLE -->

        <section class="sliice bg-gradient-dark pt-6 mb-0 pb-5">
            <div class="container">

            <div class="row text-center">
                <div class="col-12">
            <?php 
            
            
            if ($fullAccess || $proMember){?>



<div class="text-center bg-gieqsGold text-dark">
 Thanks for your PRO MEMBERSHIP.  Pro members must register for all courses.  Registration is FREE by clicking Register Now below.</div>
<?php }?>
            </div>
</div>
                <div class="row text-center">

                    
                    <div class="col-12 p-3 pb-1">

                        <?php /**gieqs 3 specific**/ if ($asset_id_url == '95'){?>

                        <figure class="figure mb-3">
                            <a href="https://www.gieqs.com/iii" target="_blank"><img alt="Image placeholder"
                                    src="https://www.gieqs.com/assets/scripts/pdocrud/script/uploads/1677936961_gieqs_iii_image.png"
                                    class="w-50 mb-4"></a>

                        </figure>

                        <?php }elseif ($asset_id_url == '175'){?>

                            <figure class="figure mb-3">
                                <a href="https://www.gieqs.com/iv" target="_blank"><img alt="Image placeholder"
                                        src="https://www.gieqs.com/assets/wp/wp-content/uploads/2023/03/background_gieqs_iv.jpg"
                                        class="w-50 mb-4"></a>

                            </figure>

                            <?php }else{?>

                        <span class="h1"
                            style="color: rgb(238, 194, 120);"><?php echo $assets_paid->getName(); ?><br /></span>


                        <?php }?>




                        <?php if ($assetManager->getAssetTypeAsset($assets_paid->getid()) == '2' || $assetManager->getAssetTypeAsset($assets_paid->getid()) == '3'){?>
                        <span class="h3 mt-4"
                            style="color: rgb(238, 194, 120);"><?php echo 'Live and Online :  ' . $humanReadableProgrammeDate;?></span>
                        <span class="h3"
                            style="color: rgb(238, 194, 120);"><?php echo ', ' . $humanStartTime . ' - ' . $humanEndTime;?>
                            <?php if (isset($asset_id_pagewrite2)){?>
                            <br />
                            <!-- fix -->
                            <span class="h3 mt-4"
                                style="color: rgb(238, 194, 120);"><?php echo 'and :  Friday 6th October , 08:00 - 17:30 CET'?></span>

                            <!-- later replace -->

                            <!--   <span class="h3 mt-4" style="color: rgb(238, 194, 120);"><?php echo 'and :  ' . $humanReadableProgrammeDatev1;?></span>
                        <span class="h3" style="color: rgb(238, 194, 120);"><?php echo ', ' . $humanStartTimev1 . ' - ' . $humanEndTimev1;?> 
 -->
                            <?php }?>


                            <br />on Demand
                            thereafter<br />
                        </span>


                        <?php }else if ($assetManager->getAssetTypeAsset($assets_paid->getid()) == '4'){ ?>


                        <span class="h3 mt-4" style="color: rgb(238, 194, 120);">Premium Content Pack</span>




                        <?php }else if ($assetManager->getAssetTypeAsset($assets_paid->getid()) == '1'){ ?>


                        <span class="h3 mt-4"
                            style="color: rgb(238, 194, 120);"><?php if ($is_institutional){echo 'Institutional';}?>
                            Subscription Package</span>


                        <?php } ?>

                        <div class="d-flex justify-content-center container pt-2">
                            <div class="d-flex flex-column m-2">

                                <?php if (isset($partner_src)){?>
                                <div class="h4 p-3">In partnership with</div><img class="bg-white p-2" height="75px"
                                    src='<?php echo $partner_src;?>'>
                                <?php }?>
                            </div>
                            <div class="d-flex flex-column m-2">

                                <?php if (isset($sponsor_src)){?>
                                <div class="h4 p-3">Proudly supported by</div><img class="bg-white p-2" height="75px"
                                    src='<?php echo $sponsor_src;?>'>
                                <?php }?>
                            </div>
                        </div>

                        <?php if ($assetManager->getAssetTypeAsset($assets_paid->getid()) == '2' || $assetManager->getAssetTypeAsset($assets_paid->getid()) == '3'){?>
                        <a href="#targetScrollProgramme" id="wednesdayTop"
                            class="btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 scroll-me">
                            <span class="btn-inner--text text-dark">View Programme</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>

                        <?php } ?>


                        <?php 
                        

                        if ($userid)
                        {

                            

                            if ($assetManager->doesUserHaveSameAssetAlready($asset_id_pagewrite, $userid, false)){
                                //user owns This

                                echo '<div id="alreadyRegistered" class="d-none">true</div>';

                                if ($assetManager->getAssetTypeAsset($assets_paid->getid()) == '1'){

                                    echo '<p>You Cannot Subscribe since you already own this Subscription.  Please end your current subscription first to take advantage of this offer or contact us.</p>';
                                    

                                }else{
                                ?>

                        <a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                            class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                            <span class="btn-inner--text text-dark">View My Course!</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>









                        <?php 
                                }//close make sure not a subscription
                            }else{ 

                                echo '<div id="alreadyRegistered" class="d-none">false</div>';

                                
                                if ($assetManager->getAssetTypeAsset($assets_paid->getid()) == '1'){



                                    ?>



                        <a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                            class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                            <span class="btn-inner--text text-dark">Subscribe Now!</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>

                        <?php

                                }else{ ?>



                        <?php   if ($is_symposium === true){  //if is a symposium //new behaviour, hide button, new button?>




                        <a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                            class="symposium-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                            <span class="btn-inner--text text-dark">Register Now!</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>

                        <a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                            class="d-none register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                            <span class="btn-inner--text text-dark">Register Now!</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>


                        <?php }else{   //current behaviour?>



                        <a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                            class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                            <span class="btn-inner--text text-dark">Register Now!</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>

                        <?php }
                                
                                ?>





                        <?php
                      
                                }
                            }//close if owns this

                    }else{//close if user id
                        
                        ?>

                        <a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                            class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                            <span class="btn-inner--text text-dark">Register Now!</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>



                        <?php } ?>
                    </div>

                </div>
            </div>

        </section>

        <section class="container blog-container">
            <?php         include(BASE_URI . '/pages/learning/blog_article_generate_wp.php');?>
        </section>
        <section class="">
            <div class="container">
                <div class="row text-center">

                    <div class="col-12 p-3 pb-4">
                        <!-- <a href="#" class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon mr-3 scroll-me"> -->
                        <!-- <span class="btn-inner--text">Overview</span> -->
                        <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        <!-- </a> -->


                        <!-- <p class=""><span class="text-white">Programme description:</span> Acquisition of the skills necessary to perform basic colonoscopy is still difficult. To become a skilled colonoscopist takes a long time. This course will explore and deconstruct the key problem areas encountered when performing colonoscopy with commentary and analysis .  </p>

                        <p class=""><span class="text-white">What to expect:</span> We will demonstrate the essentials of how to control the instrument effectively, and how to diagnose and overcome failure to progress.  The goal will be to provide participants with a clear understanding of the essential components of high quality colonoscopy and practical advice of how to improve when they get back into the endoscopy room.</span></p>
                        <p class=""><span class="text-white">Format of the course:</span> The course is suitable for anyone who wants to improve their colonoscopy skills and ideal for trainees learning colonoscopy. The format of the course will be a mixture of short presentations, discussion groups and in depth analysis of colonoscopy technique. Delegates will be invited to participate at various junctures of the course and everyone will be able to pose questions at any time.</p> -->
                        <?php 

                        if ($debug){

                            echo 'assets_paid = ';
                            var_dump($assets_paid);
                            echo '<br/>';
                            echo 'from assetmanager type is ' . $assetManager->getAssetTypeAsset($assets_paid->getid()); 

                        }
                        
                        //if it is type 1 don't do this

                        if ($assetManager->getAssetTypeAsset($assets_paid->getid()) == '1'){

                            //do nothing

                        }else{

                        if ($userid){

                            

                            if ($assetManager->doesUserHaveSameAssetAlready($asset_id_pagewrite, $userid, false)){
                                //user owns This
                                ?>

                        <a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                            class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                            <span class="btn-inner--text text-dark">View My Course!</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>









                        <?php }else{ 
                            
                            //user does not own this
                            ?>

                        <?php   if ($is_symposium === true){  //if is a symposium //new behaviour, hide button, new button?>




                        <a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                            class="symposium-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                            <span class="btn-inner--text text-dark">Register Now!</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>

                        <a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                            class="d-none register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                            <span class="btn-inner--text text-dark">Register Now!</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>


                        <?php }else{   //current behaviour?>



                        <a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                            class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                            <span class="btn-inner--text text-dark">Register Now!</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>

                        <?php }

?>





                        <?php

}
}//close if owns this

                    }//close if type 1
?>
                        <!-- <a href="#targetScrollProgramme" id="thursday" class="btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mr-3 scroll-me">
                            <span class="btn-inner--text text-dark">Tues 17 Nov</span>
                        </a> -->
                    </div>

                </div>

                <hr id="targetScrollProgramme" class="divider divider-fade" />


                <div id="ajaxWed">

                </div>

                <hr>

                <div id="ajaxThurs">

                </div>



            </div>
        </section>
    </div>




    <!-- Register Modal $access_token == '8874101655')-->

    <div class="modal fade" id="registerInterest" tabindex="-1" role="dialog" aria-labelledby="registerInterestLabel"
        aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerInterestLabel" style="color: rgb(238, 194, 120);">Sign-up for
                        GIEQs Online!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="false">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <span class="h6">This will only take a minute.</span><span><br />We need your email address and a
                        password to keep track of your learning aims and objectives. The rest of the information we
                        request here is to track your learning outcomes and suggest relevant content. You can update
                        your information in My Account once you have registered.</span>
                    <form id="NewUserForm" class="mt-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">First name</label>
                                    <input name="firstname" class="form-control" type="text"
                                        placeholder="Enter your first name" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Last name</label>
                                    <input name="surname" class="form-control" type="text"
                                        placeholder="Also your last name" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">

                            <div class="col-md-6">
                                <div class="form-group focused">
                                    <label class="form-control-label">Gender</label>
                                    <select id="gender" name="gender" class="form-control" aria-hidden="true">
                                        <option hidden>select gender
                                        </option>
                                        <option value="1">Female</option>
                                        <option value="2"> Male</option>
                                        <option value="3">Rather not say</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Email (will be your user id)</label>
                                    <input name="email" class="form-control" type="email" placeholder="name@example.com"
                                        value="">
                                    <!--                     <small class="form-text text-muted mt-2">This is the main email address that we'll send notifications to. <a href="account-notifications.html">Manage your notifications</a> in order to control what we send.</small>
         -->
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">

                            <div class="col-md-6">
                                <div class="form-group focused">
                                    <label class="form-control-label">I am a...</label>
                                    <select name="endoscopistType" class="form-control" aria-hidden="true">
                                        <option hidden selected disabled>Select the option which best describes you
                                        </option>
                                        <option value="1">Medical Endoscopist</option>
                                        <option value="2">Surgical Endoscopist</option>
                                        <option value="3">Nurse Endoscopist</option>
                                        <option value="4">Endoscopy Nurse (assistant)</option>
                                        <option value="5">Medical Student</option>
                                        <option value="6">Nursing Student</option>
                                        <option value="7">Not a healthcare professional</option>


                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Are you a trainee?</label>
                                    <select id="trainee" name="trainee" class="form-control" tabindex="-1"
                                        aria-hidden="true">
                                        <option hidden disabled selected>select a training status...</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Institution country</label>
                                    <select id="centreCountry" name="centreCountry" class="form-control" tabindex="-1"
                                        aria-hidden="true">
                                        <option hidden disabled selected>select a country...</option>
                                        <?php $countries = $general->getCountries();
                            
                            foreach ($countries as $key=>$value){
                            
                            ?>

                                        <option value="<?php echo $key;?>"><?php echo $value;?></option>




                                        <?php }?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <input id="password" name="password" class="form-control" type="password"
                                        placeholder="Enter your password" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Password again</label>
                                    <input name="passwordAgain" class="form-control" type="password"
                                        placeholder="password again" value="">
                                </div>
                            </div>
                        </div>
                        <div class="my-4">
                            <div class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" name="checkterms" class="custom-control-input" id="checkterms">
                                <label class="custom-control-label" for="checkterms">I agree to the <a
                                        href="<?php echo BASE_URL;?>/pages/support/support_gieqs_terms_and_conditions.php"
                                        target="_blank">terms and conditions</a></label>
                            </div>
                            <div class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" name="checkprivacy" class="custom-control-input"
                                    id="checkprivacy">
                                <label class="custom-control-label" for="checkprivacy">I agree to the <a
                                        href="<?php echo BASE_URL;?>/pages/support/support_gieqs_privacy_policy.php"
                                        target="_blank">privacy policy</a></label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="checkMail" class="custom-control-input" id="checkMail">
                                <label class="custom-control-label" for="checkMail">I agree to receive mails from
                                    GIEQs.com related to my account</label>
                            </div>
                        </div>

                        <input type="hidden" id="signup_redirect" name="signup_redirect"
                            value="<?php echo $asset_id_pagewrite;?>">

                        <?php if ($access_validated){

                            ?>
                        <input type="hidden" name="access_token" value="<?php echo $access_token;?>">

                        <?php
                        }
                       

                        ?>

                    </form>
                </div>
                <div class="modal-footer">
                    <button id="submitPreRegister" type="button" class="btn btn-small text-dark bg-gieqsGold">Sign
                        up</button>
                    <button id="login" type="button" class="btn btn-small btn-secondary">I already have a login</button>



                </div>
            </div>
        </div>
    </div>

    <!-- $('#costCalculator').modal('show') -->

    <div class="modal fade" id="costCalculator" tabindex="-1" role="dialog" aria-labelledby="costCalculatorLabel"
        aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title h3" id="costCalculatorLabel" style="color: rgb(238, 194, 120);">Fine Tune your
                        Virtual Registration Options for GIEQs IV!</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="false">&times;</span>
                    </button>
                </div>



                <div class="modal-body">
                    <span class="h4">Select from the options below to determine your registration options and
                        cost.</span>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <p class="text-white">Early Bird Rates Apply until 4th September 2023.</p>
                            <div class="form-group">
                                <label class="form-control-label text-muted">Type of Registration</label>
                                <select id="registrationType" name="registrationType" class="form-control determineCost"
                                    aria-hidden="true">
                                    <option hidden value="9">select registration type
                                    </option>
                                    <option value="1">Doctor</option>
                                    <option value="2">Doctor in Training</option>
                                    <option value="3">Nurse Endoscopist (includes Nursing Symposium in Dutch)</option>
                                    <option value="4">Endoscopy Nurse (includes Nursing Symposium in Dutch)</option>
                                    <option value="5">Medical Student / Company Representative</option>
                                </select>
                            </div>

                                

                            <?php if ($access_validated){?>

                                <div class="form-group d-none">
                                <label class="form-control-label text-muted">Group Registration (not selectable in link registration)</label>
                                <select id="groupRegistration" name="groupRegistration"
                                    class="form-control determineCost" aria-hidden="true">
                                    <option value="0" selected="selected">No</option>
                                   
                                </select>
                                </div>
                                <div class="form-group d-none">
                                    <label class="form-control-label gieqsGold">Do you wish to include a 1-year GIEQs Online
                                        PRO Membership at significantly reduced cost? (included in all link registrations)</label>
                                    <select id="includeGIEQsPRO" name="includeGIEQsPRO" class="form-control determineCost"
                                        aria-hidden="true">
                                   
                                        <option value="1" selected="selected">Yes</option>

                                    </select>
                                </div>

                            <?php }else{ ?>

                                <div class="form-group d-none">
                                <label class="form-control-label text-muted">Do you intend to make a Group
                                    Reservation?</label>
                                <select id="groupRegistration" name="groupRegistration"
                                    class="form-control determineCost" aria-hidden="true">
                                    <option hidden value="9">group reservation?
                                    </option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                </div>
                                <div class="form-group d-none">
                                    <label class="form-control-label gieqsGold">Do you wish to include a 1-year GIEQs Online
                                        PRO Membership at significantly reduced cost?</label>
                                    <select id="includeGIEQsPRO" name="includeGIEQsPRO" class="form-control determineCost"
                                        aria-hidden="true">
                                        <option hidden value="9">include GIEQs Online PRO Membership?
                                        </option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>

                                    </select>
                                </div>


                            <?php } ?>


                            
                        </div>

                        <div class="col-md-6">

                            <div class="card bg-dark-light p-3">
                                <div class"card-header">

                                <?php if ($access_validated){?>

                                    <p class="h3 text-white mt-2">Free Registration</p>
                                    <p>Group Registrants / Faculty / Complimentary Registrants</p>
                                </div>

                                    <?php }else{ ?>

                                        <p class="h3 text-white mt-2">Cost Breakdown</p>
                                </div>
                                <div class="card-body">
                                    <p class="text-white mt-0">Symposium : &euro;<span id="cost-symposium"></span></p>
                                    <p class="text-white mt-0"><span class="cursor-pointer"
                                            onclick="alert('to the stars');"
                                            title="GIEQs PRO is the premier tier of GIEQs Online Membership.  Click to find out more."
                                            data-toggle="tooltip" data-placement="bottom">GIEQs PRO 1-year</span> :
                                        &euro;<s><span id="normal-cost-online"></span></s> <span id="cost-online"
                                            class="gieqsGold"></span></p>
                                    <p class="gieqsGold" id="costSaving"></p>
                                </div>

                                <!-- <p class="h5">Make a choice of your registration type to view cost and savings</p> -->


                                <div class="card-footer">
                                    <p class="h3">Total : &euro; <span id="updatedCost"></span></p>
                                </div>


                                    <?php } ?>

                                    
                            </div>

                        </div>


                    </div>
                    <div class="modal-footer">
                        <p class="small">These options are for virtual registration. There are a small number (first
                            come first served) of registrations available in Ghent (details in your confirmation email).
                            We <strong>strongly</strong> encourage participants to register in groups and create their
                            own live experiences. This not only facilitates networking but saves the Planet.</p>
                        <button id="continueRegistration" type="button"
                            class="btn btn-small text-dark btn-fill-gieqsGold">Continue Registration</button>




                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="step2" tabindex="-1" role="dialog" aria-labelledby="step2Label" aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="step2Label" style="color: rgb(238, 194, 120);">Complete your
                        Registration Details!</h3>
                   
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="false">&times;</span>
                    </button>

                </div>

                <p class="modal-header">If you registered for GIEQs last year we saved your details for this year! Please just check they are up-to-date!</p>
                <div class="modal-body">
                    <card class="card bg-dark-light">
                        <div class="card-body">
                            <p class="text-white">Selected Registration Type : <span id="regType1"></span>, <span
                                    id="gieqsOnlineAdded"></span> <button type="button" id="changeRegistration"
                                    class="btn btn-small text-dark bg-gieqsGold p-1 m-2">Change</button></p>
                        </div>
                    </card>
                    <span class="h6">This will only take a minute.</span><span><br />We need these details to finalise
                        your registration. We have prefilled data already associated with your account.</span>
                    <form id="step2Form" class="mt-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">First name</label>
                                    <input id="firstname" name="firstname" class="form-control" type="text"
                                        placeholder="Enter your first name" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Last name</label>
                                    <input id="surname" name="surname" class="form-control" type="text"
                                        placeholder="Also your last name" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">

                            <div class="col-md-6">
                                <div class="form-group focused">
                                    <label class="form-control-label">Title</label>
                                    <select id="title" name="title" class="form-control" aria-hidden="true">
                                        <option hidden>select title
                                        </option>
                                        <option value="1">Mr</option>
                                        <option value="2">Mrs</option>
                                        <option value="3">Ms</option>
                                        <option value="4">Dr</option>
                                        <option value="5">Professor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Mobile Telephone Number</label>
                                    <input name="contactPhone" class="form-control" id="contactPhone"
                                        placeholder="including country code" value="">
                                    <!--                     <small class="form-text text-muted mt-2">This is the main email address that we'll send notifications to. <a href="account-notifications.html">Manage your notifications</a> in order to control what we send.</small>
         -->
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row align-items-center">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Name of Employing Institution</label>
                                    <input name="centreName" class="form-control" id="centreName"
                                        placeholder="some hospital" value="">
                                    <!--                     <small class="form-text text-muted mt-2">This is the main email address that we'll send notifications to. <a href="account-notifications.html">Manage your notifications</a> in order to control what we send.</small>
         -->
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">City of Employing Institution</label>
                                    <input name="centreCity" class="form-control" id="centreCity"
                                        placeholder="some city" value="">
                                    <!--                     <small class="form-text text-muted mt-2">This is the main email address that we'll send notifications to. <a href="account-notifications.html">Manage your notifications</a> in order to control what we send.</small>
         -->
                                </div>
                            </div>


                        </div>


                        <div class="row align-items-center">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Country of Employing Institution</label>
                                    <select id="centreCountry1" name="centreCountry1" class="form-control" tabindex="-1"
                                        aria-hidden="true">
                                        <option hidden disabled selected>select a country...</option>
                                        <?php $countries = $general->getCountries();
                            
                            foreach ($countries as $key=>$value){
                            
                            ?>

                                        <option value="<?php echo $key;?>"><?php echo $value;?></option>




                                        <?php }?>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <hr />
                        <div class="row align-items-center">

                            <div class="col-md-6">
                                <div class="form-group focused">
                                    <label class="form-control-label">I am a...</label>
                                    <select name="endoscopistType" id="endoscopistType" class="form-control"
                                        aria-hidden="true">
                                        <option hidden selected disabled>Select the option which best describes you
                                        </option>
                                        <option value="1">Medical Endoscopist</option>
                                        <option value="2">Surgical Endoscopist</option>
                                        <option value="3">Nurse Endoscopist</option>
                                        <option value="4">Endoscopy Nurse (assistant)</option>
                                        <option value="5">Medical Student</option>
                                        <option value="6">Nursing Student</option>
                                        <option value="7">Not a healthcare professional</option>


                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Are you a trainee?</label>
                                    <select id="trainee1" name="trainee1" class="form-control" tabindex="-1"
                                        aria-hidden="true">
                                        <option hidden disabled selected>select a training status...</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>

                                </div>
                            </div>
                            <p class="pl-4">[trainee status will require a letter from the current Head of Department as
                                confirmation. you will be contacted and charged the difference if a letter is not
                                provided]</p>

                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label class="form-control-label">My main interest in GIEQs is...</label>
                                    <select id="interestReason" name="interestReason" class="form-control" tabindex="-1"
                                        aria-hidden="true">
                                        <option hidden disabled selected>select a main interest...</option>
                                        <option value="1">Quality in general endoscopy</option>
                                        <option value="2">Quality in colonoscopy technique</option>
                                        <option value="3">Quality in ERCP</option>
                                        <option value="4">Quality in endoscopic ultrasound</option>
                                        <option value="5">Quality in endoscopic polypectomy</option>
                                        <option value="6">Quality in endoscopic imaging of gastrointestinal lesions
                                        </option>
                                        <option value="7">Quality in endoscopic unit design</option>
                                        <option value="8">Quality in gastrointestinal bleeding</option>
                                        <option value="9">Quality in inflammatory bowel disease endoscopy</option>
                                        <option value="10">Quality in hepatologic endoscopy</option>
                                        <option value="11">Quality in therapeutic endoscopy</option>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label class="form-control-label">I am a member of the following professional
                                        organisation (select only one)</label>
                                    <select id="professionalMember" name="professionalMember" class="form-control"
                                        tabindex="-1" aria-hidden="true">
                                        <option hidden disabled selected>select a main interest...</option>
                                        <option value="0">Not a member of any of the following</option>
                                        <option value="1">ESGE</option>
                                        <option value="2" disabled>BSG - we asked, sadly no cooperation, please select not a member</option>
                                        <option value="3" disabled>ASGE - we asked, sadly no cooperation, please select not a member</option>
                                        <option value="4">WEO</option>


                                    </select>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">


                                    <label class="form-control-label">If membership selected please enter your member
                                        number for verification</label>
                                    <input name="professionalMemberNumber" class="form-control"
                                        id="professionalMemberNumber" placeholder="membership number" value="">

                                </div>

                            </div>
                            <p class="pl-4">[no membership number = no discounted registration. you will be contacted
                                and charged the difference if a membership number is not provided]</p>


                        </div>

                        <hr />

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label class="form-control-label">How and where were you informed of the Symposium
                                        (select only one)</label>
                                    <select id="informedHow" name="informedHow" class="form-control" tabindex="-1"
                                        aria-hidden="true">
                                        <option hidden disabled selected>select how you were informed...</option>
                                        <option value="0">None of the below</option>
                                        <option value="1">GIEQs Online</option>
                                        <option value="2">GIEQs Mailing List</option>
                                        <option value="3">Professional Contact</option>
                                        <option value="4">Google</option>
                                        <option value="5">Social Media</option>


                                    </select>
                                </div>

                            </div>



                        </div>

                        <hr />





                        <div class="my-4">
                            <div class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" name="checkterms2" class="custom-control-input" id="checkterms2">
                                <label class="custom-control-label" for="checkterms2">I agree to the <a
                                        href="<?php echo BASE_URL;?>/pages/support/support_gieqs_terms_and_conditions.php"
                                        target="_blank">terms and conditions</a></label>
                            </div>
                            <div class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" name="checkprivacy2" class="custom-control-input"
                                    id="checkprivacy2">
                                <label class="custom-control-label" for="checkprivacy2">I agree to the <a
                                        href="<?php echo BASE_URL;?>/pages/support/support_gieqs_privacy_policy.php"
                                        target="_blank">privacy policy</a></label>
                            </div>

                        </div>

                        <input type="hidden" id="signup_redirect1" name="signup_redirect"
                            value="<?php echo $asset_id_pagewrite;?>">

                        <?php if ($access_validated){

                            ?>
                        <input type="hidden" name="access_token1" value="<?php echo $access_token;?>">

                        <?php
                        }
                       

                        ?>

                    </form>
                </div>
                <div class="modal-footer">

                    <button id="continueRegistration2" type="button"
                        class="btn btn-small text-dark bg-gieqsGold">Continue Registration</button>



                </div>
            </div>
        </div>
    </div>


    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->

    <script src="<?php echo BASE_URL;?>/assets/js/purpose.core.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>
    <script src="<?php echo BASE_URL;?>/node_modules/jquery-validation/dist/jquery.validate.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>


    <script src=<?php echo BASE_URL . "/assets/js/generaljs.js"?>></script>

    <?php require BASE_URI . '/assets/scripts/purchase.php';?>


    <script>
    var isSymposium = $('#isSymposium').text();

    /*         var stripestatuslive = $('#stripe-status-live').text();
     */
    //define programes

    var programmeDefined = $('#programme_defined').text();
    var programme2 = $('#programme2').text();
    var programme_defined3 = $('#programme_defined3').text();
    var programme4 = $('#programme4').text();

    var alreadyRegistered = $("#alreadyRegistered").text();


    function isBefore(date1, date2) {
        return date1 < date2;
    }

    const d1 = new Date('2023-09-05 00:00:00');
    const d2 = new Date();

    console.log(isBefore(d2, d1)); 

    //define early bird tag, change on 1 sept 2022
    var earlyBird = isBefore(d2, d1);

    function submitPreRegisterForm() {


        //userid is lesionUnderEdit

        //console.log('updatePassword chunk');
        //go to php script with an object from the form

        $('#submitPreRegister').append('<i class="fas fa-circle-notch fa-spin ml-2"></i>');


        var data = getFormDatav2($('#NewUserForm'), 'users', 'user_id', null, 1);

        //TODO add identifier and identifierKey

        console.log(data);

        data = JSON.stringify(data);

        console.log(data);

        disableFormInputs('NewUserForm');

        var passwordChange = $.ajax({
            url: siteRoot + "/assets/scripts/newUser.php",
            type: "POST",
            contentType: "application/json",
            data: data,
        });

        passwordChange.done(function(data) {


            Swal.fire({
                type: 'info',
                title: 'Create Account',
                text: data,
                background: '#162e4d',
                confirmButtonText: 'ok',
                confirmButtonColor: 'rgb(238, 194, 120)',

            }).then((result) => {

                resetFormElements('NewUserForm');
                $(document).find('#signup_redirect').val(asset_id);
                enableFormInputs('NewUserForm');
                $('#registerInterest').modal('hide');
                $('#submitPreRegister').find('i').remove();


            })



        })

    }


    function refreshProgrammeView() {



        const dataToSend = {

            programmeid: <?php if(isset($programme_defined)){echo $programme_defined;} else{echo 'null';};?>,

        }

        const jsonString = JSON.stringify(dataToSend);
        console.log(jsonString);

        var request2 = $.ajax({
            url: siteRoot + "assets/scripts/classes/generateProgrammeCurrent.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request2.done(function(data) {
            // alert( "success" );
            $('#ajaxWed').html(data);
            //$(document).find('.Thursday').hide();
        })
    }






    function refreshProgrammeViewv1() {



        const dataToSend = {

            programmeid: programmeDefined,
            programme2: programme2,

        }

        const jsonString = JSON.stringify(dataToSend);
        console.log(jsonString);

        var request2 = $.ajax({
            url: siteRoot + "assets/scripts/classes/generateProgrammeCurrent.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request2.done(function(data) {
            // alert( "success" );
            $('#ajaxWed').html(data);
            //$(document).find('.Thursday').hide();
        })
    }

    function refreshProgrammeViewv2() {



        const dataToSend = {

            programmeid: programme_defined3,
            programme2: programme4,

        }

        const jsonString = JSON.stringify(dataToSend);
        console.log(jsonString);

        var request2 = $.ajax({
            url: siteRoot + "assets/scripts/classes/generateProgrammeCurrent.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request2.done(function(data) {
            // alert( "success" );
            $('#ajaxThurs').html(data);
            //$(document).find('.Thursday').hide();
        })
    }

    function createCookie(name, value, days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            var expires = "; expires=" + date.toGMTString();
        } else {
            var expires = "";
        }
        document.cookie = name + "=" + value + expires + "; path=/";
    }

    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1, c.length);
            }
            if (c.indexOf(nameEQ) == 0) {
                return c.substring(nameEQ.length, c.length);
            }
        }
        return null;
    }

    function eraseCookie(name) {
        createCookie(name, "", -1);
    }

    function calculateCost(earlyBird, registrationType, groupRegistration, includeGIEQsPRO, debug = false) {

        var cost = 0;
        var normalCostGIEQsOnline = null;
        var saving = null;
        var group = null;
        var symposiumcost = null;

        if (earlyBird === true) {

            //early bird rates

            if (registrationType == 1) { // doctor

                symposiumcost = 125;
                cost += 125;

                if (groupRegistration == 1) { //return a marker

                    group = true;

                }

                if (includeGIEQsPRO == 1) {

                    normalCostGIEQsOnline = 180;
                    saving = 80;

                    cost += (normalCostGIEQsOnline - saving);



                }

                return {

                    cost: cost,
                    normalCostGIEQsOnline: normalCostGIEQsOnline,
                    saving: saving,
                    group: group,
                    earlyBird: earlyBird,
                    registrationType: registrationType,
                    includeGIEQsPro: includeGIEQsPRO,
                    symposiumcost: symposiumcost,



                };

            } else if (registrationType == 2 || registrationType == 3) {


                symposiumcost = 75;

                cost += 75;

                if (groupRegistration == 1) { //return a marker

                    group = true;

                }

                if (includeGIEQsPRO == 1) {

                    normalCostGIEQsOnline = 120;
                    saving = 30;

                    cost += (normalCostGIEQsOnline - saving);


                }


                return {

                    cost: cost,
                    normalCostGIEQsOnline: normalCostGIEQsOnline,
                    saving: saving,
                    group: group,
                    earlyBird: earlyBird,
                    registrationType: registrationType,
                    includeGIEQsPro: includeGIEQsPRO,
                    symposiumcost: symposiumcost,



                };

            } else if (registrationType == 4 || registrationType == 5) {


                symposiumcost = 55;

                cost += 55;

                if (groupRegistration == 1) { //return a marker

                    group = true;

                }

                if (includeGIEQsPRO == 1) {

                    normalCostGIEQsOnline = 60;
                    saving = 10;

                    cost += (normalCostGIEQsOnline - saving);



                }

                return {

                    cost: cost,
                    normalCostGIEQsOnline: normalCostGIEQsOnline,
                    saving: saving,
                    group: group,
                    earlyBird: earlyBird,
                    registrationType: registrationType,
                    includeGIEQsPro: includeGIEQsPRO,
                    symposiumcost: symposiumcost,



                };

            }


        } else {

            //non-early bird rates


            if (registrationType == 1) { // doctor

                symposiumcost = 175;

                cost += 175;

                if (groupRegistration == 1) { //return a marker

                    group = true;

                }

                if (includeGIEQsPRO == 1) {

                    normalCostGIEQsOnline = 180;
                    saving = 80;

                    cost += (normalCostGIEQsOnline - saving);



                }

                return {

                    cost: cost,
                    normalCostGIEQsOnline: normalCostGIEQsOnline,
                    saving: saving,
                    group: group,
                    earlyBird: earlyBird,
                    registrationType: registrationType,
                    includeGIEQsPro: includeGIEQsPRO,
                    symposiumcost: symposiumcost,


                };

            } else if (registrationType == 2 || registrationType == 3) {


                symposiumcost = 100;

                cost += 100;

                if (groupRegistration == 1) { //return a marker

                    group = true;
                }

                if (includeGIEQsPRO == 1) {

                    normalCostGIEQsOnline = 120;
                    saving = 30;

                    cost += (normalCostGIEQsOnline - saving);





                }


                return {

                    cost: cost,
                    normalCostGIEQsOnline: normalCostGIEQsOnline,
                    saving: saving,
                    group: group,
                    earlyBird: earlyBird,
                    registrationType: registrationType,
                    includeGIEQsPro: includeGIEQsPRO,
                    symposiumcost: symposiumcost,


                };

            } else if (registrationType == 4 || registrationType == 5) {


                symposiumcost = 70;

                cost += 70;

                if (groupRegistration == 1) { //return a marker

                    group = true;

                }

                if (includeGIEQsPRO == 1) {

                    normalCostGIEQsOnline = 60;
                    saving = 10;

                    cost += (normalCostGIEQsOnline - saving);


                }

                return {

                    cost: cost,
                    normalCostGIEQsOnline: normalCostGIEQsOnline,
                    saving: saving,
                    group: group,
                    earlyBird: earlyBird,
                    registrationType: registrationType,
                    includeGIEQsPro: includeGIEQsPRO,
                    symposiumcost: symposiumcost,


                };
            }


        }


    }


    function submitSymposiumForm() {

        $('#continueRegistration2').append('<i class="fas fa-circle-notch fa-spin ml-2"></i>');


        var data = getFormDatav2($('#step2Form'), 'users', 'user_id', null, 1);

        var costUpdate = JSON.parse(readCookie('step1'));

        //TODO add identifier and identifierKey

        //add assetid
        //add all cost data

        data.costUpdate = costUpdate;

        data.assetid = asset_id;


        //console.log(data);

        data = JSON.stringify(data);

        //console.log(data);

        disableFormInputs('step2Form');

        var passwordChange = $.ajax({
            url: siteRoot + "/assets/scripts/symposium_update.php",
            type: "POST",
            contentType: "application/json",
            data: data,
        });

        passwordChange.done(function(data) {


            if (data) {

                var result = JSON.parse(data);
                console.dir(result);

                var users = parseInt(result.users);
                var symposium = parseInt(result.symposium);

                if (users > -1 || symposium > -1) {

                    Swal.fire({
                        type: 'info',
                        title: 'Registration Data Saved',
                        text: 'We Saved your Registration Data.  Proceeding to Payment.',
                        background: '#162e4d',
                        confirmButtonText: 'ok',
                        confirmButtonColor: 'rgb(238, 194, 120)',

                    }).then((result) => {

                        //resetFormElements('step2Form');
                        $(document).find('#signup_redirect').val(asset_id);
                        enableFormInputs('step2Form');
                        $('#step2').modal('hide');
                        $('#continueRegistration2').find('i').remove();
                        $('.register-now').trigger('click');


                    })

                }




            }



        })


    }


    $(document).ready(function() {


        //if a symposium
        //$('#costCalculator').modal('show');
        //$('#step2').modal('show');


        //when showing costCalculator modal

        //check for the cookie

        $(document).on('shown.bs.modal', '#costCalculator', function() {

            var costUpdate = JSON.parse(readCookie('step1'));

            if (costUpdate != undefined) {

                if (costUpdate.group == null) {

                    var group = 0;
                }

                $('#groupRegistration').val(group);
                $('#registrationType').val(costUpdate.registrationType);
                $('#includeGIEQsPRO').val(costUpdate.includeGIEQsPro);
                $('#registrationType').trigger('change');
                $('#groupRegistration').trigger('change');
                $('#includeGIEQsPRO').trigger('change');


            }



        })


        $(document).on('click', '.symposium-now', function() {

            $('#costCalculator').modal('show');


        })




        if (isSymposium == 'true') {

            refreshProgrammeViewv1();
            refreshProgrammeViewv2();
        } else {

            refreshProgrammeView();
        }



        //if not


    });





    //logic for drop downs of the registration checker GIEQs III
    //can be modified to update regarding 1-groups for link clicked no mention, 2-price free with link, all include gieqs pro so this screen is unnecessary replace it with free symposium link

    $(document).ready(function() {

        $(document).on('change', '.determineCost', function() {

            if ($('#registrationType').val() != '9') {

                $('#continueRegistration').attr('disabled', false);



                var updatedCostObject = calculateCost(earlyBird, $('#registrationType').val(), $(
                    '#groupRegistration').val(), $('#includeGIEQsPRO').val(), false);
                console.dir(updatedCostObject);

                if (updatedCostObject.group === true) {
                    $('#updatedCost').text('Up to 50% Off');
                    $('#costSaving').html(
                        '<p>You could save ++ for yourself and a group of colleagues if you organise a group registration.</p>  <p> Experiencing GIEQs III in a group could contribute to upskilling in your department.  </p><button id="more-group-info" class="btn btn-small text-dark bg-gieqsGold p-1">More Information on Group Registration</button>'
                        );
                    $('#continueRegistration').attr('disabled', true);
                    $('#cost-symposium').text('up to 50% off');
                    $('#cost-online').text('included with all group registrations');
                    $('#normal-cost-online').text('');



                } else {
                    $('#updatedCost').text(updatedCostObject.cost);
                    $('#continueRegistration').attr('disabled', false);

                    if (updatedCostObject.saving === null) { //didn't select GIEQs Online

                        $('#costSaving').html(
                            'You could make a significant saving by purchasing a year worth of GIEQs Online PRO with your Symposium Registration (offer not available separately)'
                            );
                        $('#cost-symposium').text(updatedCostObject.cost);
                        $('#cost-online').text('');
                        $('#normal-cost-online').text('');


                    } else {

                        $('#costSaving').html('You are saving &euro;' + updatedCostObject.saving +
                            ' versus the price of a pay-monthly GIEQs Online PRO Subscription for a year'
                            );
                        $('#cost-symposium').text(updatedCostObject.cost - (updatedCostObject
                            .normalCostGIEQsOnline - updatedCostObject.saving));
                        $('#normal-cost-online').text(updatedCostObject.normalCostGIEQsOnline);
                        $('#cost-online').text(updatedCostObject.normalCostGIEQsOnline -
                            updatedCostObject.saving);


                    }
                }



            } else {

                $('#continueRegistration').attr('disabled', true);



            }




        })


        //if a symposium
        $(document).on('change', '#registrationType', function() {

            console.log('triggered');
            console.log();

            if ($('#registrationType').val() == '1' || $('#registrationType').val() == '2') {


                $('#groupRegistration').parent().removeClass('d-none');

            } else {

                $('#groupRegistration').parent().addClass('d-none');
                $('#groupRegistration').val('0');
                $('#groupRegistration').trigger('change');


            }




        })

        $(document).on('change', '#groupRegistration', function() {

            if ($('#groupRegistration').val() == '0') {

                $('#includeGIEQsPRO').parent().removeClass('d-none');


            } else {

                $('#includeGIEQsPRO').parent().addClass('d-none');


            }




        })

        $(document).on('change', '#includeGIEQsPRO', function() {

            if ($('#includeGIEQsPRO').val() == '1') {




            } else {



            }




        })

        // move on to second stage

        $(document).on('click', '#continueRegistration', function() {

            if ($('#registrationType').val() != '9' && $('#includeGIEQsPRO').val() != '9') {

                var updatedCostObject = calculateCost(earlyBird, $('#registrationType').val(), $(
                    '#groupRegistration').val(), $('#includeGIEQsPRO').val(), false);

                createCookie('step1', JSON.stringify(updatedCostObject), 3);

                //disable the button
                $('#continueRegistration').attr('disabled', true);

                //populate the new modal



                const dataToSend = {

                    assetid : <?php echo $asset_id_pagewrite;?>


                }

                const jsonString = JSON.stringify(dataToSend);
                console.log(jsonString);

                var request2 = $.ajax({
                    url: siteRoot + "assets/scripts/populateSymposiumRegistrationModal.php",
                    type: "POST",
                    contentType: "application/json",
                    data: jsonString,
                });



                request2.done(function(data) {

                    if (data) {


                        var result = JSON.parse(data);
                        console.dir(result);
                        console.log(result[0].access_level);
                        $('#firstname').val(result[0].firstname);
                        $('#surname').val(result[0].surname);
                        $('#contactPhone').val(result[0].contactPhone);
                        $('#centreName').val(result[0].centreName);
                        $('#centreCity').val(result[0].centreCity);
                        $('#centreCountry1').val(result[0].centreCountry);
                        $('#endoscopistType').val(result[0].endoscopistType);
                        $('#trainee1').val(result[0].trainee);
                        $('#title').val(result[0].title);
                        $('#interestReason').val(result[0].interestReason);
                        $('#professionalMember').val(result[0].professionalMember);
                        $('#professionalMemberNumber').val(result[0].professionalMemberNumber);

                        $('#informedHow').val(result[0].informedHow);



                        //also set from the cookie selected reg

                        var costUpdate = JSON.parse(readCookie('step1'));
                        console.dir(costUpdate);

                        if (costUpdate.registrationType == '1') {

                            $('#regType1').text('Doctor Registration ');


                        } else if (costUpdate.registrationType == '2' || costUpdate
                            .registrationType == '3') {

                            $('#regType1').text('Trainee or Nurse Endoscopist Registration ');

                        } else if (costUpdate.registrationType == '4' || costUpdate
                            .registrationType == '5') {

                            $('#regType1').text('Nurse or Medical Student Registration (if free link also Company Representative)');

                        }

                        if (costUpdate.includeGIEQsPro == '1') {
                            //including 1 year GIEQs Online
                            $('#gieqsOnlineAdded').text(
                                'plus 1 year discounted access to GIEQs Online');

                        } else {

                            $('#gieqsOnlineAdded').html(
                                '<span class=\'gieqsGold\'>missing out on discount on 1 year of GIEQs Online - are you sure? (offer not available separately or after purchase)<span>'
                                );

                            //without GIEQs PRO 1 year (are you sure you want to miss out on this discount)
                        }






                        $('#step2').modal('show');
                        $('#costCalculator').modal('hide');

                    }



                })

                //show the new modal and hide this one
                $('#continueRegistration').attr('disabled', false);


            } else {


                alert(
                    'Please Let us know whether you would like to add discounted GIEQs Pro Access for 1 year');

            }




        })

        $(document).on('click', '#changeRegistration', function() {

            $('#step2').modal('hide');
            $('#costCalculator').modal('show');

        })

        $(document).on('click', '#continueRegistration2', function(event) {

            event.preventDefault();
            $("#step2Form").submit();

        })

        //validation form
        $.validator.addMethod('checkProfessional', function(value, element) {
            return (value === '' | value == '0');
        }, "This field must either be empty or 0!");

        $.validator.addMethod(
  "regex",
  function(value, element, regexp) {
    var re = new RegExp(regexp);
    return this.optional(element) || re.test(value);
  },
  "Please ensure your entry is correct."
);

        $("#step2Form").validate({

            invalidHandler: function(event, validator) {
                var errors = validator.numberOfInvalids();
                console.log("there were " + errors + " errors");
                if (errors) {
                    var message = errors == 1 ?
                        "1 field contains errors. It has been highlighted" :
                        +errors + " fields contain errors. They have been highlighted";


                    $('#error').text(message);
                    //$('div.error span').addClass('form-text text-danger');
                    //$('#errorWrapper').show();

                    $("#errorWrapper").fadeTo(4000, 500).slideUp(500, function() {
                        $("#errorWrapper").slideUp(500);
                    });
                } else {
                    $('#errorWrapper').hide();
                }
            },
            rules: {
                firstname: {
                    required: true,

                },



                surname: {
                    required: true,

                },

                title: {
                    required: true,

                },

                contactPhone: {
                    required: true,
                    minlength: 8,

                },

                centreName: {
                    required: true,

                },

                centreCity: {
                    required: true,

                },
                centreCountry1: {
                    required: true,

                },
                endoscopistType: {
                    required: true,

                },
                trainee1: {
                    required: true,

                },
                interestReason: {
                    required: true,

                },
                professionalMember: {

                    required: true,

                },


                professionalMemberNumber: {

                    required : {

                        depends: function(element){

                            return $('#professionalMember').val() != 0;

                        }
                    },

                    minlength: 8,

                    /* required: {
                    depends: function (element) {
                        //return $("#professionalMember").is(":filled");
                        return $("#professionalMember").val() != '0' || $("#professionalMember").val() != '';
                    }
                },
                    */


                },



                checkterms2: {

                    required: true,

                },
                checkprivacy2: {

                    required: true
                },



            },
            messages: {

                checkterms2: {

                    required: 'You must agree to the Terms and Conditions',

                },
                checkprivacy2: {

                    required: 'You must agree to the Privacy Policy',
                },



            },
            submitHandler: function(form) {

                //alert('Validation passed');
                submitSymposiumForm();

                //console.log("submitted form");



            }




        });

        $(document).on('click', '#more-group-info', function() {

            $('#step2').modal('hide');
            window.location.href = siteRoot2 + '/pages/program/symposium-group-registration-4.php';

        })









    });
    </script>



<script src="//code.tidio.co/60umwbfdkgadwfebvct2iq22o3mgbxpl.js" async></script>

</body>

</html>