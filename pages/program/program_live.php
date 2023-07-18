<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>

<head>
<meta name=”robots” content=”noindex”>

    <?php

//define user access level



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

$emailLink = new emailLink;
$emails = new emails;
$emailContent = new emailContent;


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

//definitions

//assetid

$debug = false;



//rest should come from this




?>
    <title>GIEQs III Scientific Program</title>
    <meta charset="utf-8">
 <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Explore the program for the GIEQs II Online Congress">
    <meta name="author" content="David Tate">
    <meta name="keywords" content="colonoscopy, gastroscopy, ERCP, quality, polyp, colon cancer, polypectomy, EMR, endoscopic imaging, colorectal cancer, endoscopy, gieqs, GIEQS, training, digital endoscopy event, digital symposium, ghent, gent, endoscopy quality, quality in endoscopy">
 
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.css">
    <script src="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>

    <style>
    .text-gieqsGold {

        color: rgb(238, 194, 120);

    }

    strong {

        font-weight: ;
        color: white;

    }

    .table .td-dark{
    color: #4a83cb;
    
    }

    .bg-gieqsGold {

        background-color: rgb(238, 194, 120);

    }

    .modal-backdrop {
        opacity: 0.75 !important;
    }

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

        <?php require BASE_URI . '/pages/learning/includes/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/pages/learning/includes/nav.php';?>

        <div id="action" style="display:none;"><?php if ($action){echo $action;}?></div>
        <div id="access_token" style="display:none;"><?php if ($access_token){echo $access_token;}?></div>


    </header>

<div class="mt-10"></div>
<?php
//$assetid = 13;
$asset_id_pagewrite = '95';
$asset_id_pagewrite2 = '96';
$email_to_use_as_basis = '1';

/*$asset_id_pagewrite = '3';
$asset_id_pagewrite2 = '3';
$email_to_use_as_basis = '1';*/

$emails->Load_from_key($email_to_use_as_basis);
$emailid = $email_to_use_as_basis;

$programme_array = $assetManager->returnProgrammesAsset($asset_id_pagewrite);
if ($debug){

    var_dump($programme_array);
}

$programme_defined = $programme_array[0];
if ($programme_array[1] != ''){

    $programme2 = $programme_array[1];
}else{

    $programme2 = null;
}

$programme_array = $assetManager->returnProgrammesAsset($asset_id_pagewrite2);
if ($debug){

    var_dump($programme_array);
}
$programme_defined3 = $programme_array[0];
if ($programme_array[1] != ''){

    $programme4 = $programme_array[1];
}else{

    $programme4 = null;
}

if ($debug){

print_r($programme_defined);
print_r($programme2);


}



$assets_paid->Load_from_key($asset_id_pagewrite);

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

if ($debug){
var_dump($currentTime);
}

    $videoset = 2;
    
require(BASE_URI . '/pages/learning/pages/general/live_nav.php'); ?>



    <div class="main-content bg-dark">

        <!-- Header (v1) -->
       

        <!-- PROGRAM TABLE -->

        <section class="bg-gradient-dark pt-7 mb-0 pb-5">
            <div class="container">
                <div class="row text-center">

                    <div class="col-12 p-3 pb-1">
                        <span class="h1 display-2"
                            style="color: rgb(238, 194, 120);">GIEQs III Scientific Program<br /></span>
                        <span
                            class="h3 display-5 mt-4 text-white"><?php echo 'Live :  ' . $humanReadableProgrammeDate;?></span>
                        <span
                            class="h3 display-5 text-white"><?php echo ', ' . $humanStartTime . ' - ' . $humanEndTime;?>
                            <br /> and Friday 1st October 2021, 08:00 - 17:30 CEST

                            <br /><br />on Demand
                            thereafter<br /></span>
                        <a href="#targetScrollProgramme" id="wednesdayTop"
                            class="btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 scroll-me">
                            <span class="btn-inner--text text-dark">View Programme</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>

                        <?php 
                        

                        if ($userid){

                            

                            if ($assetManager->doesUserHaveSameAssetAlready($asset_id_pagewrite, $userid, false)){
                                //user owns This
                                ?>

                      









                        <?php }else{ ?>

<!--                         <a data-assetid="<?php //echo $asset_id_pagewrite; ?>"
                            class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                            <span class="btn-inner--text text-dark">Register Now!</span>
                            <span class="btn-inner--icon"><i class="fas fa-filter"></i></span>
                        </a> -->

                        <?php
                      
                        }//close if owns this

                    }else{//close if user id
                        
                        ?>

                        <!-- <a data-assetid="<?php //echo $asset_id_pagewrite; ?>"
                            class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                            <span class="btn-inner--text text-dark">Register Now!</span>
                             <span class="btn-inner--icon"><i class="fas fa-filter"></i></span>
                        </a> -->



                        <?php }?>
                    </div>

                </div>
            </div>

        </section>

        <!-- <section class="">
        <?php         //include(BASE_URI . '/assets/scripts/courses/generateEmailScriptNoModal.php');?>

        <section class="slice bg-gradient-dark">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-9">
            <!- - Article body - ->
            <article>
            <figure class="figure">
                <img alt="Image placeholder" src="<?php echo BASE_URL;?>/assets/img/backgrounds/gieqs2ii.png" class="img-fluid rounded">
                <!- - <figcaption class="mt-3 text-muted">GIEQs II: September 2021.</figcaption> - ->
              </figure>
            </article>
            </div>
            </div>
            </div>
            </section> -->
       
    <section class="">
        <div class="container">
            
        

            <hr id="targetScrollProgramme" class="divider divider-fade" />


            <div id="ajaxWed">

            </div>

            <hr>

            <div id="ajaxThurs">

            </div>

            <div class="row">
            <div class="col-12 text-center pb-4">
            <?php 
                        

                        if ($userid){

                            

                            if ($assetManager->doesUserHaveSameAssetAlready($asset_id_pagewrite, $userid, false)){
                                //user owns This
                                ?>

                    







                    <?php }else{ ?>

                    <!-- <a data-assetid="<?php //echo $asset_id_pagewrite; ?>"
                        class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                        <span class="btn-inner--text text-dark">Register Now!</span>
                         <span class="btn-inner--icon"><i class="fas fa-filter"></i></span>
                    </a> -->

                    <?php
                      
                        }//close if owns this

                    }else{//close if user id
                        
                        ?>

                    <!-- <a data-assetid="<?php //echo $asset_id_pagewrite; ?>"
                        class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                        <span class="btn-inner--text text-dark">Register Now!</span>
                       <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> 
                    </a>
 -->


                    <?php }?>

</div>
                    </div>





        </div>
    </section>
    </div>

    <?php 
                            if (isset($access_token) && ($access_token == '8874101655')){

                               $access_validated = true;

                            }else{
                            
                                $access_validated = false;
                            

                             }?>


    <!-- Modals NEW GENERIC -->

    <div class="modal modal-new fade" id="modal_success" tabindex="-1" role="dialog" aria-labelledby="modal-new"
        aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h6" id="modal_title_6">Buy New GIEQs Symposium Access</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-0"
                        style="min-height: 100px; background-image: url('<?php echo BASE_URL;?>/assets/img/covers/learning/1.png'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
                    </div>
                    <div class="py-3 text-left">
                        <!-- <i class="fas fa-exclamation-circle fa-4x"></i> -->
                        <hr />
                        <h5 class="heading h4 mt-4">New GIEQs Symposium Purchase</h5>
                        <p class="heading h5 mt-4">Course : <span class="text-white" id="asset-name"></span></p>

                        <p class="text-white"><span class="text-muted" id="asset-type"></span></p>
                        <p class="text-white">Duration : <span class="text-muted" id="renew-frequency"></span><span
                                class="text-muted"> Month(s) after Live Date</span></p>
                        <p class="text-white">Cost :
                            <?php 
                            if ($access_validated){

                                echo ' FREE with your Complimentary Link';

                            }else{?>

                            <!-- <span class="text-muted" id="cost">&euro;</span> --><span class="text-muted">Varies depending upon class of subscription.  To be determined on registration platform.</span>
                        </p>

                        <?php }?>


                        <p class="text-white text-justify mt-4">
                            Description : <span class="text-muted" id="asset-description"></span>

                        </p>
                        <hr />

                        <?php
                        if  (!$userid){?>

                        <p class="text-white">You need a GIEQs Online User Account (free) to Register for this Course
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</button>

                    <button id="button-login" class="btn btn-sm btn-white button-login">I have a GIEQs Online
                        Account</button>
                    <button id="button-signup" class="btn btn-sm btn-white button-signup">I have no account, sign me
                        up!</button>


                </div>

                <?php }else{?>

                <?php if (!($access_validated)){?>

                <p class="text-sm mt-4">
                    On clicking Start Registration you will be forwarded to the registration portal of the symposium secretariat Seauton International.
                    <!-- This subscription will automatically renew after the expiry term. This can easily be
                            switched off your account settings. -->
                    
                    All Congress subscriptions and payments are covered by our <a
                        href="<?php echo BASE_URL;?>/pages/support/support_gieqs_online_terms.php" target="_blank">terms
                        and conditions</a>.
                </p>

                <?php }else{?>

                <p class="text-sm mt-4">

                    No payment is required for this subscription.
                </p>


                <?php }   ?>
            </div>
        </div>

        <?php 

        //determine action 

        if ($access_validated){

            //allow free register

            $form_action_path = 'https://eu.eventscloud.com/ereg/index.php?eventid=200221839&';


        }else{

            $form_action_path = 'https://eu.eventscloud.com/ereg/index.php?eventid=200221839&';


        }


        ?>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</button>
            <form id="confirm-new" action="<?php echo $form_action_path;?>" method="POST">
                <input type="hidden" id="asset_id_hidden" name="asset_id" value="">
                <input type="hidden" id="course_date" name="course_date" value="2021-09-30 08:00">
                <!-- CHANGE ME UPDATE TODO MAKE THIS COME FROM THE PROGRAM -->

                <input type="submit" id="button-confirm-new" class="btn btn-sm btn-white button-confirm-new"
                    value="<?php $result = $access_validated ? 'Start Registration' : 'Start Registration'; echo $result;?>">
            </form>
        </div>

        <?php } ?>
    </div>
    </div>
    </div>

    <!-- Register Modal -->

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
                    <span class="h6">This will only take 2 seconds.</span><span><br />We need your email address and a
                        password to keep track of your learning aims and objectives. Thereafter you can choose what
                        further information you share with us</span>
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
                                    <select name="gender" class="form-control" aria-hidden="true">
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
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" name="checkterms" class="custom-control-input" id="checkterms">
                                <label class="custom-control-label" for="checkterms">I agree to the <a
                                        href="<?php echo BASE_URL;?>/pages/support/support_gieqs_terms_and_conditions.php"
                                        target="_blank">terms and conditions</a></label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="checkprivacy" class="custom-control-input"
                                    id="checkprivacy">
                                <label class="custom-control-label" for="checkprivacy">I agree to the <a
                                        href="<?php echo BASE_URL;?>/pages/support/support_gieqs_privacy_policy.php"
                                        target="_blank">privacy policy</a></label>
                            </div>
                        </div>

                        <input type="hidden" name="signup_redirect" value="gieqs_ii">

                        <?php if ($access_validated){

                            ?>
                        <input type="hidden" name="access_token" value="true">

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

    <div class="modal fade" id="teaser-videos" tabindex="-1" role="dialog" aria-labelledby="teaser-videos"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dark" role="document">
                <div class="modal-content p-1">
                    <div class="modal-header">
                        <h5 class="display-4 modal-title" id="accreditationLabel" style="color: rgb(238, 194, 120);">GIEQs II
                            Teaser Videos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="text-white" aria-hidden="false">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div id="videoDisplay mb-3" class="">

                            <div class="row">
                                <p class="h5 mt-2">Released prior to the early bird deadline for our <span style="text-decoration:underline;"><a href="<?php echo BASE_URL;?>/ii">flagship symposium</a></span> in Everyday Endoscopy, these 6, 1-2 minute video
                                    snippets
                                    demonstrate the attention to detail, deconstructed approach and rock solid evidence
                                    base of the GIEQs Approach. <br /> <br /></p>
                                <p class="text-white">Please enjoy them and <span class="gieqsGold"><a href="<?php echo BASE_URL;?>/ii">join us in September 2021</a> </span>for GIEQs II for much more of this
                                    approach...</p>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="https://vimeo.com/544320202" data-fancybox>
                                            <img alt="video image"
                                                src="https://i.vimeocdn.com/video/1126626828_1280x720?r=pad"
                                                class="img-fluid mt-2">
                                        </a>
                                    </div>
                                    <div class="col-sm-6">

                                        <p class="ml-3"><span class="h4">1 - Over the Scope Clip for Upper
                                                Gastrointestinal Bleeding</span><br/><span class="text-muted">Use of OTSC as first-line for life 
                                                threatening upper gastrointestinal haemorrhage.</span>
                                        </p>

                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <a href="https://vimeo.com/554318938/c7ca7d7344" data-fancybox>
                                            <img alt="video image"
                                                src="https://i.vimeocdn.com/video/1148126009_1280x720?r=pad"
                                                class="img-fluid mt-2">
                                        </a>
                                    </div>
                                    <div class="col-sm-6">

                                        <p class="ml-3"><span class="h4">2 - Early Gastric Cancer</span><br/><span class="text-muted">Can you
                                            identify and characterise 
                                            this early gastric cancer? Watch the video for more information including endoscopic resectability</span>
                                        </p>

                                    </div>

                                </div>


                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <a href="https://vimeo.com/558060403/60a0e3b128" data-fancybox>
                                            <img alt="video image"
                                                src="https://i.vimeocdn.com/video/1209723683_1280x720?r=pad"
                                                class="img-fluid mt-2">
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="ml-3"><span class="h4">3 - The Demarcated Area as a Predictor of
                                                Submucosal Invasion in Colon Polyps</span><br/> <span class="text-muted">the Demarcated Area has emerged as a stable predictor of submucosal invasive cancer.  Find out more here.</span>
                                        </p>

                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <a href="https://vimeo.com/566734386/dab5d063ba" data-fancybox>
                                            <img alt="video image"
                                                src="https://i.vimeocdn.com/video/1209716933_1280x720?r=pad"
                                                class="img-fluid mt-2">
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="ml-3"><span class="h4">4 - Dealing with Adverse Events at Colonic Polypectomy</span><br/><span class="text-muted">
                                        To be able to competently perform colonic polypectomy you must be able to deal with adverse events.   A deconstructed example is shown here.</span>
                                        </p>

                                    </div>
                                </div>
                                
                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <a href="https://vimeo.com/569339891/d436733eba" data-fancybox>
                                            <img alt="video image"
                                                src="https://i.vimeocdn.com/video/1177464087_1280x720?r=pad"
                                                class="img-fluid mt-2">
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="ml-3"><span class="h4">5 - Complex EUS applications to make Everyday ERCP easier</span><br/><span class="text-muted">Endoscopic Ultrasound is radically changing the way we approach biliary intervention and can make a difference to everyday endoscopic problems.</span>
                                        </p>

                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <a href="https://vimeo.com/570805121/11be30d98a" data-fancybox>
                                            <img alt="video image"
                                                src="https://i.vimeocdn.com/video/1180469446_1280x720?r=pad"
                                                class="img-fluid mt-2">
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="ml-3"><span class="h4">6 - Decision Making after Large perforation and life threatening Bleeding during Polypectomy</span><br/><span class="text-muted">Many of the GIEQs faculty spend their normal working lives on complex endoscopy.  Learning the lessons and approach from these procedures, deconstructing them and bringing them to the everyday is a crucial part of the GIEQs approach.</span>
                                        </p>

                                    </div>
                                </div>





                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn-small rounded-pill bg-gieqsGold text-dark"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    </div>

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->

    <script src="../../assets/js/purpose.core.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>
    <script src="<?php echo BASE_URL;?>/node_modules/jquery-validation/dist/jquery.validate.js"></script>
    <script src="../../assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>


    <script src=<?php echo BASE_URL . "/assets/js/generaljs.js"?>></script>



    <script>
    if ($("#action").text() != '') {
        var videoPassed = $("#action").text();
    } else {

        var videoPassed = false;
    }

    if ($("#access_token").text() != '') {
        var access_token = $("#access_token").text();
    } else {

        var access_token = false;
    }



    var userid = '<?php echo $userid;?>';

    if (userid == '') {

        userid = false;

    }

    var waitForFinalEvent = (function() {
        var timers = {};
        return function(callback, ms, uniqueId) {
            if (!uniqueId) {
                uniqueId = "Don't call this twice without a uniqueId";
            }
            if (timers[uniqueId]) {
                clearTimeout(timers[uniqueId]);
            }
            timers[uniqueId] = setTimeout(callback, ms);
        };
    })();

    function refreshProgrammeView() {



        const dataToSend = {

            programmeid: <?php echo $programme_defined;?>,
            programme2: <?php echo $programme2;?>,

        }

        const jsonString = JSON.stringify(dataToSend);
        console.log(jsonString);

        var request2 = $.ajax({
            url: siteRoot + "assets/scripts/classes/generateProgrammeCurrent.php",
            crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
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

    function refreshProgrammeView2() {



        const dataToSend = {

            programmeid: <?php echo $programme_defined3;?>,
            programme2: <?php echo $programme4;?>,

        }

        const jsonString = JSON.stringify(dataToSend);
        console.log(jsonString);

        var request2 = $.ajax({
            url: siteRoot + "assets/scripts/classes/generateProgrammeCurrent.php",
            crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
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
            url: siteRoot + "assets/scripts/newUser.php",
            crossDomain: true,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
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
                enableFormInputs('NewUserForm');
                $('#registerInterest').modal('hide');
                $('#submitPreRegister').find('i').remove();


            })



        })

    }

    $(document).ready(function() {

        /* $('#centreCountry').select2({

          dropdownParent: $(".modal-content"),

          ajax: {
          //url: siteRoot + 'assets/scripts/select2simple.php?table=Delegate&field=firstname',
          url: siteRoot + 'assets/scripts/select2query.php',
          data: function (params) {
              var query = {
                  search: params.term,
                  query: '`id`, `CountryName` FROM `countries`',
                  fieldRequired: 'CountryName',
              }

              // Query parameters will be 
              console.log(query);
              return query;
          },
          dataType: 'json'
          // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
          }



          }); */



        refreshProgrammeView();
        refreshProgrammeView2();

        $('#button-login').click(function() {

            <?php 
            if ($access_validated){
                ?>

            window.location = siteRoot +
                "pages/authentication/login.php?destination=gieqs_ii&access_token=<?php echo $access_token;?>";

            <?php 
            }else{
                ?>

            window.location = siteRoot +
                "pages/authentication/login.php?destination=gieqs_ii";

            <?php
            }
            ?>


        })



        $(document).on('click', '#login', function() {

            event.preventDefault();
            window.location.href = siteRoot +
                '/pages/authentication/login.php?destination=gieqs_ii';


        })

        $('#button-signup').click(function() {


            $('.modal-new').modal('hide');
            $('#registerInterest').modal('show');
            $('.modal').css('overflow', 'auto');



        })

        if (videoPassed == 'register') {

            //simulate click

            waitForFinalEvent(function() {

                $('.register-now').trigger('click');


            }, 500, "hello header");

        }

        $('.register-now').click(function(event) {

            var button = $(this);

            $(this).append('<i class="fas fa-circle-notch fa-spin ml-2"></i>');
            $(this).attr('disabled', true);
            //var asset_type = $(this).data('assettype');
            var asset_id = $(this).data('assetid');

            console.log(asset_id);
            $('.modal-footer #button-confirm-new').attr('data-assetid', '' + asset_id);

            //get the modal data
            const dataToSend = {

                asset_id: asset_id,

            }

            const jsonString = JSON.stringify(dataToSend);

            if (userid) {

                //closed version
                var url = siteRoot +
                    "pages/learning/scripts/subscriptions/get_new_subscription_data.php";

            } else {

                //open version

                var url = siteRoot +
                    "pages/learning/scripts/subscriptions/get_new_subscription_data_open.php";

            }

            var request = $.ajax({
                url: url,
                crossDomain: true,
                headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                },
                type: "POST",
                crossDomain: true,
                headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                },
                contentType: "application/json",
                data: jsonString,
                timeout: 5000,
                fail: function(xhr, textStatus, errorThrown) {
                    alert(
                        'Something went wrong.  We could not load the subscription data.'
                    );
                    $(this).find('i').remove();
                    $(this).attr('disabled', false);
                }
            });

            request.done(function(data) {


                data = data.trim();
                console.log(data);

                try {

                    externalTest = $.parseJSON(data);
                    console.dir(externalTest);
                    if (data) {


                        try {

                            if (externalTest.location_jump) {

                                window.location.href = externalTest.location_jump;

                            }

                        } catch (error) {



                        }




                        $('.modal-new #asset-name').text(externalTest.asset_name);
                        $('.modal-new #asset-type').text(externalTest.asset_type);
                        $('.modal-new #renew-frequency').text(externalTest.renew_frequency);
                        $('.modal-new #asset-description').text(externalTest.description);
                        $('.modal-new #asset_id_hidden').val(externalTest.asset_id);
                        $('.modal-new #cost').text(externalTest.cost + ' euro');


                        $('.modal-new').modal('show');
                        $(button).find('i').remove();
                        $(button).attr('disabled', false);

                    } else {

                        alert(
                            'Something went wrong.  We could not load the subscription data.'
                        );
                        $(this).find('i').remove();
                        $(this).attr('disabled', false);


                    }

                } catch (error) {

                    alert(data);
                    $(button).find('i').remove();
                    $(button).attr('disabled', false);

                }


            });


        });

        $(document).on('click', '#submitPreRegister', function(event) {

            event.preventDefault();
            $('#NewUserForm').submit();

        })

        $("#NewUserForm").validate({

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

                gender: {
                    required: true,

                },


                email: {
                    required: true,
                    email: true,

                },

                password: {
                    required: true,
                    minlength: 6,

                },

                passwordAgain: {
                    equalTo: "#password",


                },


                centreCountry: {

                    required: true,

                },
                endoscopistType: {

                    required: true
                },

                checkterms: {

                    required: true,

                },
                checkprivacy: {

                    required: true
                }



            },
            messages: {



                password: {
                    required: 'Please enter a password',
                    minlength: 'Please use at least 6 characters'


                },
                passwordAgain: {

                    equalTo: "The new passwords should match",



                },
            },
            submitHandler: function(form) {

                submitPreRegisterForm();

                //console.log("submitted form");



            }

        });

        $(document).on('click', '.editSessionFromPlan', function(event) {

            event.preventDefault();
            var sessionid = $(this).attr('data');
            window.open(siteRoot + "/pages/backend/sessionview.php?identifier=" + sessionid, '_blank');


        })







    })
    </script>
</body>

</html>