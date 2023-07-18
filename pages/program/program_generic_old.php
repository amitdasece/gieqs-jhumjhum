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

//$assetid = 13;
$asset_id_pagewrite = '15';
$email_to_use_as_basis = '1';

$emails->Load_from_key($email_to_use_as_basis);
$emailid = $email_to_use_as_basis;

$programme_array = $assetManager->returnProgrammesAsset($asset_id_pagewrite);
$programme_defined = $programme_array[0];

if ($debug){

print_r($programme_array);
echo $programme_defined;

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

//rest should come from this




?>
    <title>GIEQs Course - <?php echo $assets_paid->getname(); ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.css">
    <script src="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>

    <style>
    .text-gieqsGold {

        color: rgb(238, 194, 120);

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

        <?php require BASE_URI . '/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/nav.php';?>

        <div id="action" style="display:none;"><?php if ($action){echo $action;}?></div>
        <div id="access_token" style="display:none;"><?php if ($access_token){echo $access_token;}?></div>


    </header>


    <div class="main-content">

        <!-- Header (v1) -->
        <section class="header-1 bg-gradient-dark" data-offset-top="#header-main">


        </section>

        <!-- PROGRAM TABLE -->

        <section class="bg-gradient-dark pt-6 mb-0 pb-5">
            <div class="container">
                <div class="row text-center">

                    <div class="col-12 p-3 pb-1">
                        <span class="h1" style="color: rgb(238, 194, 120);"><?php echo $assets_paid->getName(); ?><br /></span>
                        <span class="h3 mt-4" style="color: rgb(238, 194, 120);"><?php echo 'Live :  ' . $humanReadableProgrammeDate;?></span>
                        <span class="h3" style="color: rgb(238, 194, 120);"><?php echo ', ' . $humanStartTime . ' - ' . $humanEndTime;?> <br/>on Demand
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

                                <a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                                    class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                                    <span class="btn-inner--text text-dark">View My Course!</span>
                                    <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                                </a>


                             
                        
                        
                   

                        

                        <?php }else{ ?>

                            <a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                                class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                                <span class="btn-inner--text text-dark">Register Now!</span>
                                <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                            </a>

                        <?php
                      
                        }//close if owns this

                    }else{//close if user id
                        
                        ?>

<a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                                class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                                <span class="btn-inner--text text-dark">Register Now!</span>
                                <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                            </a>



<?php }?>
                    </div>

                </div>
            </div>

        </section>

        <section class="">
        <?php         include(BASE_URI . '/assets/scripts/courses/generateEmailScriptNoModal.php');?>
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
                        

                        if ($userid){

                            

                            if ($assetManager->doesUserHaveSameAssetAlready($asset_id_pagewrite, $userid, false)){
                                //user owns This
                                ?>

                                <a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                                    class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                                    <span class="btn-inner--text text-dark">View My Course!</span>
                                    <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                                </a>


                             
                        
                        
                   

                        

                        <?php }else{ ?>

                            <a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                                class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                                <span class="btn-inner--text text-dark">Register Now!</span>
                                <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                            </a>

                        <?php
                      
                        }//close if owns this

                    }else{//close if user id
                        
                        ?>

<a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                                class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                                <span class="btn-inner--text text-dark">Register Now!</span>
                                <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                            </a>



<?php }?>
                        <!-- <a href="#targetScrollProgramme" id="thursday" class="btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mr-3 scroll-me">
                            <span class="btn-inner--text text-dark">Tues 17 Nov</span>
                        </a> -->
                    </div>

                </div>

                <hr id="targetScrollProgramme" class="divider divider-fade" />


                <div id="ajaxWed">

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
                    <h5 class="modal-title h6" id="modal_title_6">Buy New GIEQs Online Course</h5>
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
                        <h5 class="heading h4 mt-4">New GIEQs Online Course Subscription</h5>
                        <p class="heading h5 mt-4">Course : <span class="text-white" id="asset-name"></span></p>

                        <p class="text-white"><span class="text-muted" id="asset-type"></span></p>
                        <p class="text-white">Duration : <span class="text-muted" id="renew-frequency"></span><span
                                class="text-muted"> Month(s) after Live Date</span></p>
                        <p class="text-white">Cost : 
                            <?php 
                            if ($access_validated){

                                echo ' FREE with your Complimentary Link';

                            }else{?>
                            
                            <span class="text-muted" id="cost">&euro;</span></p>

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
                    By clicking Start Payment you will be taken to PayPal to start the payment process.
                    The payment process is not final until you confirm with the payment provider.
                    Once complete your subscription will be active immediately and you will receive a
                    confirmation email.
                    <!-- This subscription will automatically renew after the expiry term. This can easily be
                            switched off your account settings. -->
                    We do not store any payment details whatsoever on GIEQs.com. We believe this is best handled by
                    PayPal who have a
                    track record in industry standard procedures in this regard.
                    All subscriptions and payments are covered by our <a
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

            $form_action_path = BASE_URL . '/pages/learning/scripts/subscriptions/generate_free_subscription.php';


        }else{

            $form_action_path = BASE_URL . '/pages/learning/scripts/subscriptions/charge.php';


        }


        ?>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</button>
            <form id="confirm-new" action="<?php echo $form_action_path;?>"
                method="POST">
                <input type="hidden" id="asset_id_hidden" name="asset_id" value="">
                <input type="hidden" id="course_date" name="course_date" value="2021-03-16 08:00">
                <!-- CHANGE ME UPDATE TODO MAKE THIS COME FROM THE PROGRAM -->

                <input type="submit" id="button-confirm-new" class="btn btn-sm btn-white button-confirm-new"
                    value="<?php $result = $access_validated ? 'Register' : 'Start Payment'; echo $result;?>">
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

                        <input type="hidden" name="signup_redirect" value="imaging">

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

        $('#button-login').click(function() {

            <?php 
            if ($access_validated){
                ?>

window.location = siteRoot +
            "pages/authentication/login.php?destination=imaging_signup&access_token=<?php echo $access_token;?>";

<?php 
            }else{
                ?>

            window.location = siteRoot +
            "pages/authentication/login.php?destination=imaging_signup";

            <?php
            }
            ?>


        })



        $(document).on('click', '#login', function() {

            event.preventDefault();
            window.location.href = siteRoot +
                '/pages/authentication/login.php?destination=imaging_signup';


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
                type: "POST",
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

                            if (externalTest.location_jump){

                                window.location.href = externalTest.location_jump;
                            
                            }

                        }catch(error){



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

                        alert('Something went wrong.  We could not load the subscription data.');
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