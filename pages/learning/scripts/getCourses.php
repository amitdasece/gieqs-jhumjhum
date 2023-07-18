<?php




$openaccess = 1;
//$requiredUserLevel = 4;

require '../includes/config.inc.php';



require (BASE_URI . '/assets/scripts/login_functions.php');
     
     //place to redirect the user if not allowed access
     $location = BASE_URL . '/index.php';
 
     if (!($dbc)){
     require(DB);
     }
    
     
     require(BASE_URI . '/assets/scripts/interpretUserAccess.php');
/* 
     define('WP_USE_THEMES', false);
     spl_autoload_unregister ('class_loader');
     
     require(BASE_URI . '/assets/wp/wp-blog-header.php');
     
     spl_autoload_register ('class_loader'); */
     
//require (BASE_URI.'/scripts/headerCreatorV2.php');

//(1);
//require ('/Applications/XAMPP/xamppfiles/htdocs/dashboard/esd/scripts/headerCreator.php');

function array_not_unique($a = array())
{
    return array_diff_key($a, array_unique($a));
}

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

$navigator = new navigator;

$user = new users;

$usersLikeVideo = new usersLikeVideo;
$usersFavouriteVideo = new usersFavouriteVideo;


require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/courseManager.class.php');
$courseManager = new courseManager;


require_once(BASE_URI . '/assets/scripts/classes/programmeView.class.php');

$programmeView = new programmeView;

require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');

$assets_paid = new assets_paid;



$data = json_decode(file_get_contents('php://input'), true);

$tagsToMatch = $data['tags'];

$loaded = $data['loaded'];

$loadedRequired = $data['loadedRequired'];

$active = $data['active'];

$videoset = $data['videoset'];

$assetid = $data['assetid'];


$gieqsDigitalv1 = $data['gieqsDigital'];

$thumbnails = $data['thumbnails'][0];

//then to get a particular thumbnail from wordpress is
// $thumbnails[wp_id]


$debug = false;


$loadedRequiredProduct = 20 * $loadedRequired;

if ($debug) {
    
    print_r($tagsToMatch);
}

$numberOfTagsToMatch = count($tagsToMatch);

if ($numberOfTagsToMatch < 1) {

    $tagsToMatch = null;

}

if ($debug) {
    print_r('number of tags to match' . $numberOfTagsToMatch);
}


?>


<?php

        //CHANGE ME FOR NEW PAGES

$requiredTagCategories = $data['requiredTagCategories'];

//$requiredTagCategories = ['39', '40', '41', '42'];

?>

<?php

$videos = [];
$x = 0;


//more data processing

$data2 = $courseManager->returnAllCourses('2', false); //congress
//$data2['description'] = 'Past GIEQs Symposia.  The flagship yearly event hosted by the GIEQs Foundation';
//ok

//echo '<pre>';
//var_dump($data2);
//echo '</pre>';
//exit();

//take courses

$data3 = $courseManager->returnAllCourses('3', false); //congress

$data31 = []; //colonoscopy courses
$data32 = []; // polypectomy courses
$data33 = []; // other courses


foreach($data3 as $key=>$value){ 

    //var_dump($value);
                      
    //get the asset category

    $assets_paid->Load_from_key($value['id']);
    //var_dump($assets_paid);
    $supercategory = null;
    $supercategory = $assets_paid->getsupercategory();

    if ($supercategory == '1'){  //colonoscopy

        $data31[] = $value;


    }elseif ($supercategory == '2'){ // polypectomy

        $data32[] = $value;

    }else{

        $data33[] = $value;
    }
}



$data4 = $courseManager->returnAllCourses('4', $debug); //content pack
//$data4['description'] = 'Premium Content Packages, focussed on a specific aspect of Everyday Endoscopy';


$data = [

0 => $data2,
1 => $data4,
2 => $data31,
3 => $data32,
4 => $data33,

];

$namesArray = [

    0 => [

        'name' => 'GIEQs Symposia',
        'description' => 'Past GIEQs Symposia.  The flagship yearly event hosted by the GIEQs Foundation',

    ],

    1 => [

        'name' => 'Pro Content Packs',
        'description' => 'Premium Content Packages, focussed on a specific aspect of Everyday or Complex Endoscopy',

    ],

    2 => [

        'name' => 'Colonoscopy Virtual/Live Courses',
        'description' => 'Deconstructed Colonoscopy.  Instruction and Training.  All the information you need to optimise your technique and start training others',

    ],

    3 => [

        'name' => 'Polypectomy Virtual/Live Courses',
        'description' => 'Deconstructed Polypectomy Training.  All the information you need to avoid incomplete resection and adverse events.',

    ],

    4 => [

        'name' => 'Other Virtual/Live Courses',
        'description' => 'Premium Content Packages, focussed on a specific aspect of Everyday Endoscopy',

    ],

];

if ($debug){
echo '<pre>';
print_r($data);
echo '</pre>';
}


$videos = $data;

if ($debug) {
    echo PHP_EOL . 'html build array contains:::' . PHP_EOL;
    print_r($videos);

    echo json_encode($videos);
}




?>


<?php

$x=0;

foreach ($data as $datakey=>$datavalue){

                //new script

             




                //using data2

                $a = 1;

                $b = count($datavalue);

                if ($b == 0){

                    ?>



<div class="d-flex flex-row flex-wrap justify-content-center mt-1 pt-0 px-0 text-white">
    <span class=" mt-3 mb-6 h6"><?php echo $emptyText;?></span>

</div>

<?php
                }

                

                foreach ($datavalue as $key=>$value){

                    $owned = false;
                    $colour_card = null;
                    $button_text = null;
                    $colour_button = null;
                    $link = null;
                    $text = null;
                    
                    if ($assetManager->doesUserHaveSameAssetAlready($value['id'], $userid, false) == true){
    
                        $owned = true;
                        $colour_card = 'bg-transparent';
                        $button_text = 'Watch Now';
                        $colour_button = 'gieqs-light-blue';
                        $link = BASE_URL . '/view-pro-content/' . $value['id'];
                        $text = 'text-muted';
                        $text_heading = 'text-white';
    
                    }else{
    
                        $owned = false;
                        $colour_card = 'null';
                        $button_text = 'Discover';
                        $colour_button = 'bg-gieqsGold';
                        $link = BASE_URL . '/pro-content/' . $value['id'];
                        $text = 'gieqsGold';
                        if (isset($userid)){
                            $text_heading = 'gieqsGold';


                        }else{
                            $text_heading = 'text-white';


                        }


    
    
                    }

                    //is there a thumbnail?

                    $thumbnail = null;
                    $thumbnail = $thumbnails[$value['linked_blog']];

                    if ($thumbnail == ''){

                        $thumbnail = BASE_URL . '/assets/img/backgrounds/course_no_image.png';

                    }

                    //course_no_image

               /*      echo '<br/><br/>';
                    echo 'a is ' . $a;
                    echo 'b is ' . $b;
                    echo '<br/><br/>key is ';
                    print_r($key);
                    echo '<br/><br/>value is '; */

                    //print_r($value);

                    //if ($key == 'description'){continue;}

                    
                    //make the html for the cards (in groups of +10)

                    if ($a == 1){

                        ?>
<p class="display-4 my-3 toc-item"><?php echo $namesArray[$x]['name']?></p>
<p class="pl-4 mb-5"><?php echo $namesArray[$x]['description'];?></p>

<div class="d-flex flex-row flex-wrap justify-content-center mt-1 pt-0 px-0 text-white video-card">
    <?php }


                    if ($a < $loadedRequiredProduct){

                    
                    
?>

    <div class="card mr-md-4 individualVideo <?php echo $colour_card;?> flex-even">
        <div class="card-header" style="height:175px;">
            <div class="row align-items-right my-0">
                <div class="col-12 my-0 pr-0">
                    <div class="actions d-flex mb-3">

                    <?php

if ($owned == true){


?>

                    <span class="badge <?php echo $colour_button;?> text-dark mr-auto" style="line-height:1rem;">In My Library</span>

                    <?php

}

?>

                        <a class="action-item action-favorite" data-toggle="tooltip"
                            data-original-title="Mark as favorite" data="<?php echo $value['id'];?>">
                            <i
                                class="fas fa-heart <?php if ($usersFavouriteVideo->matchRecord2way($userid, $value['id']) === true){echo 'gieqsGold';}else{echo 'text-muted';}?>"></i>
                        </a>


                        <a class="action-item action-like active" data-toggle="tooltip" data-original-title="Like"
                            data="<?php echo $value['id'];?>">
                            <i
                                class="fas fa-thumbs-up <?php if ($usersLikeVideo->matchRecord2way($userid, $value['id']) === true){echo 'gieqsGold';}else{echo 'text-muted';}?>"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center text-break">
                <div class="col-12 text-break">
                    <h5 class="card-title title <?php echo $text_heading;?> mb-0 w-100"><?php echo $value['name']; ?></h5>
                    <!-- <p class="text-muted text-sm mt-1 mb-0 align-self-baseline">Author : <a class="author text-muted"
                            data-author="<?php echo $value['author'];?>" target="_blank"
                            href="<?php echo BASE_URL;?>/pages/learning/pages/account/public-profile.php?id=<?php //echo $value['author'];?>"><?php //echo $user->getUserName($value['author']); ?></a>
                    </p> -->
                    <!-- <div class="d-flex flex-row-reverse">
                        <span class="badge text-dark p-1 type"
                            data-type="<?php //echo $navigator->getVideoTypeid($value['id']);?>"
                            style="color:rgb(238, 194, 120) !important;"><?php //echo $navigator->getVideoTypeidv2($value['id']);?></span>
                    </div> -->

                </div>
            </div>

        </div>
        <a
            href="<?php echo $link; ?>">
            <img alt="video image" src="<?php echo $thumbnail;?>" class="img-fluid mt-2 cursor-pointer">
        </a>

        <div class="card-body">
            <p class="card-text"><?php echo $value['description']; ?></p>
        </div>
        <div class="card-footer">
            <div class="row align-items-center">
            
                     

                        
                        
                        
                <div class="col-6">
                    <a href="<?php echo $link; ?>"
                        class="btn btn-sm text-dark <?php echo $colour_button;?>"><?php echo $button_text;?></a>
                </div>
                <div class="col-6 text-right">
                    <span class="<?php echo $text; ?> created text-sm">Cost: &euro;<?php echo $value['cost'];?><br/>GIEQs Pro : Free</span>
                </div>
             

            </div>
        </div>
    </div>







    <?php
                    }

                    if ($a % 2 == 0){
                        ?>
</div>
<div class="d-flex flex-row flex-wrap justify-content-center mt-1 pt-0 px-0 text-white">

    <?php
                    }

                    $a++;

                }

                if ($b > $loadedRequiredProduct - 1){

                    ?>

</div>
<div class="d-flex flex-row-reverse flex-wrap mt-1 pb-6 pt-0 px-0 text-white">

    <button class="align-self-end btn btn-sm text-dark gieqsGoldBackground" id="loadMore">Load more videos..</button>


    <?php

                }

                if (!($b % 2 == 0)){

                    ?>
    <div class="d-flex flex-row flex-wrap card-placeholder justify-content-center mt-1 pt-0 px-0 text-white">
    </div>
    
    <?php

                }

               


echo '</div>';

$x++;

            }




?>