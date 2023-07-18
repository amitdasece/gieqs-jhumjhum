<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>

<head>
<meta name=”robots” content=”noindex”>

    <?php

//define user access level

$openaccess = 1;

require BASE_URI . '/headNoPurposeCore.php';

if (isset($_GET["action"])){
  $action = $_GET["action"];

}else{

  $action = null;

}

$general = new general;


?>
    <title>GIEQs - Train the Colonoscopy Trainers Course (1 day)</title>
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

.modal { overflow: auto !important; }

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


    </header>


    <div class="main-content">

        <!-- Header (v1) -->
        <section class="header-1 bg-gradient-dark" data-offset-top="#header-main">


        </section>

        <!-- PROGRAM TABLE -->

        <section class="bg-gradient-dark pt-6 mb-0">
            <div class="container">
                <div class="row text-center">

                    <div class="col-12 p-3 pb-1">
                        <span class="h1" style="color: rgb(238, 194, 120);">GIEQs - Train the Colonoscopy Trainers Course
                            (Virtual)<br /></span>
                        <span class="h3 mt-4" style="color: rgb(238, 194, 120);">Currently Online and Directly Accessible<br /></span>
                        <span class="h5" style="color: rgb(238, 194, 120);">Further Dates with Interaction Planned
                            (watch this space!)<br /></span>
                        <a href="#targetScrollProgramme" id="wednesdayTop"
                            class="btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 scroll-me">
                            <span class="btn-inner--text text-dark">View Programme</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>
                        <a data-assetid="8"
                            class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                            <span class="btn-inner--text text-dark">Register Now!</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>
                    </div>

                </div>
            </div>
            
        </section>
        
        <section class="">
          
            <div class="container">
                <div class="mb-5 text-center">
                    <h3 class=" mt-6">A Virtual Experience Suitable for All Who Train Other Colonoscopists</h3>
                    <div class="fluid-paragraph mt-5">
                      <p class="lead lh-180"><span class="text-white">Format</span></p>  
                      <p class="lead lh-180"> Following a classroom-based overview of training theory, trainers with variable experience will be coached to improve their training skills and understanding of how to overcome common problems encountered during colonoscopy by local and virtual faculty.</p>  
                      <p class="lead lh-180"><span class="text-white">Who should enroll?</span></p>  
 
                      <p class="lead lh-180">Anyone who wishes to train others in Colonoscopy</p>
                      <p class="lead lh-180"><span class="text-white">When?</span></p>  
 
                      <p class="lead lh-180">Currently Online and Directly Accessible</p>
                      <p class="lead lh-180"><span class="text-white">Where?</span></p>  
 
                      <p class="lead lh-180">Live here, online at gieqs.com.  You can follow live (discussion and interaction) or catch up at your leisure.</p>
                      <p class="lead lh-180"><span class="text-white">Cost?</span></p>  
  
                      <p class="lead lh-180">100 euros (includes review of the course on demand for 3 months, delay of 24 hours for content upload)</p>
                        <p class="lead lh-180">Participation via live chat platform possible.  Anyone can ask questions and join the conversation at any time.
                        </p>



                          
                          
                          
                          
                          
                          </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card hover-shadow-lg hover-scale-110">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start">
                                    <div class="icon text-primary rounded-circle">
                                        <i class="fas fa-terminal"></i>
                                    </div>
                                    <div class="icon-text pl-4">
                                        <h5 class="ma-0 ">Deconstructed Technique</h5>
                                        <p class="mb-0">Training requires an understanding (on the part of the trainer) of
                                            why colonoscopy is difficult and how to apply a problem solving approach for trainees. 
                                            To become a good trainer requires the trainer to be Consciously Competent.
                                            </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card hover-shadow-lg hover-scale-110">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start">
                                    <div class="icon text-primary rounded-circle">
                                        <i class="fas fa-dolly"></i>
                                    </div>
                                    <div class="icon-text pl-4">
                                        <h5 class="ma-0 ">Conscious Competence</h5>
                                        <p class="mb-0">This is the art of knowing why what you do in Colonoscopy works and is critical to passing your skills based 
                                            knowledge onto others.  A key focus of this course is improving your conscious competence of colonoscopy as a trainer.  
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card hover-shadow-lg hover-scale-110">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start">
                                    <div class="icon text-primary rounded-circle">
                                        <i class="far fa-comments"></i>
                                    </div>
                                    <div class="icon-text pl-4">
                                        <h5 class="ma-0 ">Interactive</h5>
                                        <p class="mb-0">Delegates will be invited to participate at various junctures of
                                            the course and everyone will be able to pose questions at any time via our
                                            trademark high quality digital stream</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card hover-shadow-lg hover-scale-110">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start">
                                    <div class="icon text-primary rounded-circle">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="icon-text pl-4">
                                        <h5 class="ma-0 ">Unique Live / Virtual Hybrid</h5>
                                        <p class="mb-0">Training experiences [involving trainers seeking to improve their conscious competence and local trainees] will be performed live, with
                                            commentary from experienced trainers, lectures and discussion of
                                            pre-recorded training. Detailed debrief sessions will deconstruct the techniques demonstrated to cement the learning points.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">

              <div class="col-12 p-3 pb-4">
                  <!-- <a href="#" class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon mr-3 scroll-me"> -->
                  <!-- <span class="btn-inner--text">Overview</span> -->
                  <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                  <!-- </a> -->


                  <!-- <p class=""><span class="text-white">Programme description:</span> Acquisition of the skills necessary to perform basic colonoscopy is still difficult. To become a skilled colonoscopist takes a long time. This course will explore and deconstruct the key problem areas encountered when performing colonoscopy with commentary and analysis .  </p>

                  <p class=""><span class="text-white">What to expect:</span> We will demonstrate the essentials of how to control the instrument effectively, and how to diagnose and overcome failure to progress.  The goal will be to provide participants with a clear understanding of the essential components of high quality colonoscopy and practical advice of how to improve when they get back into the endoscopy room.</span></p>
                  <p class=""><span class="text-white">Format of the course:</span> The course is suitable for anyone who wants to improve their colonoscopy skills and ideal for trainees learning colonoscopy. The format of the course will be a mixture of short presentations, discussion groups and in depth analysis of colonoscopy technique. Delegates will be invited to participate at various junctures of the course and everyone will be able to pose questions at any time.</p> -->
                  <a data-assetid="8"
                      class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mr-3 mt-3">
                      <span class="btn-inner--text text-dark">Register Now!</span>
                      <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                  </a>
                  <!-- <a href="#targetScrollProgramme" id="thursday" class="btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mr-3 scroll-me">
                      <span class="btn-inner--text text-dark">Tues 17 Nov</span>
                  </a> -->
              </div>

          </div>
         
        </section>
        <section class="my-4 slice-video slice-xl d-flex align-items-center bg-cover bg-size--cover" style="background-image: url(<?php echo BASE_URL;?>/assets/img/backgrounds/trainers.png);">
          <span class="mask bg-gradient-dark opacity-7"></span>
          <div class="container">
            <div class="col">
              <div class="row justify-content-center">
                <div class="col-md-10 text-center">
                  <h2 class="display-4 text-white">
                    Considering participating? 
                  </h2>
                  <h4 class="text-white mt-3">This example footage of our training style may help convince you!</h4>
                  <a href="https://vimeo.com/464879077" data-fancybox data-toggle="tooltip" data-placement="bottom" title="" class="btn btn-white btn-icon-only rounded-circle hover-scale-110 mt-4" data-original-title="Watch video">
                    <span class="btn-inner--icon">
                      <i class="fas fa-play"></i>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          
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
                        <a data-assetid="8"
                            class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mr-3 mt-3">
                            <span class="btn-inner--text text-dark">Register Now!</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>
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
                        <hr/>
                        <h5 class="heading h4 mt-4">New GIEQs Online Course Subscription</h5>
                        <p class="heading h5 mt-4">Course : <span class="text-white" id="asset-name"></span></p>

                        <p class="text-white"><span class="text-muted" id="asset-type"></span></p>
                        <p class="text-white">Duration : <span class="text-muted" id="renew-frequency"></span><span class="text-muted"> Month(s) after Live Date</span></p>
                        <p class="text-white">Cost : <span class="text-muted" id="cost">&euro;</span></p>


                        <p class="text-white text-justify mt-4">
                            Description : <span class="text-muted" id="asset-description"></span>

                        </p>
                        <hr/>

                        <?php
                        if  (!$userid){?>

                          <p class="text-white">You need a GIEQs Online User Account (free) to Register for this Course                          </p>
                        </div>
                        </div>
                        <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</button>
                    
                        <button id="button-login" class="btn btn-sm btn-white button-login">I have a GIEQs Online Account</button>
                        <button id="button-signup" class="btn btn-sm btn-white button-signup">I have no account, sign me up!</button>

                    
                </div>

                        <?php }else{?>

                        <p class="text-sm mt-4">
                            By clicking confirm you will be taken to PayPal to start the payment process.
                            The payment process is not final until you confirm with the payment provider.
                            Once complete your subscription will be active immediately and you will receive a
                            confirmation email.
                            <!-- This subscription will automatically renew after the expiry term. This can easily be
                            switched off your account settings. -->
                            We do not store any payment details whatsoever on GIEQs.com.  We believe this is best handled by PayPal who have a 
                            track record in industry standard procedures in this regard.
                            All subscriptions and payments are covered by our <a
                                href="<?php echo BASE_URL;?>/pages/support/support_gieqs_online_terms.php"
                                target="_blank">terms and conditions</a>.
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</button>
                    <form id="confirm-new"
                        action="<?php echo BASE_URL;?>/pages/learning/scripts/subscriptions/charge.php" method="POST">
                        <input type="hidden" id="asset_id_hidden" name="asset_id" value="">
                        <input type="hidden" id="course_date" name="course_date" value="2020-11-16 08:00"> <!-- CHANGE ME UPDATE TODO MAKE THIS COME FROM THE PROGRAM -->

                        <input type="submit" id="button-confirm-new" class="btn btn-sm btn-white button-confirm-new"
                            value="Start Payment">
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
                    <h5 class="modal-title" id="registerInterestLabel" style="color: rgb(238, 194, 120);">Sign-up for GIEQs Online!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="false">&times;</span>
                    </button>
                </div>
 
                <div class="modal-body">
                    <span class="h6">This will only take 2 seconds.</span><span><br/>We need your email address and a password to keep track of your learning aims and objectives.  Thereafter you can choose what further information you share with us</span>
                    <form id="NewUserForm" class="mt-3">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label">First name</label>
                            <input name="firstname" class="form-control" type="text" placeholder="Enter your first name" value="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label">Last name</label>
                            <input name="surname" class="form-control" type="text" placeholder="Also your last name" value="">
                          </div>
                        </div>
                      </div>
                      <div class="row align-items-center">
                        
                        <div class="col-md-6">
                          <div class="form-group focused">
                            <label class="form-control-label">Gender</label>
                            <select name="gender" class="form-control"  aria-hidden="true">
                            <option hidden>select gender
                            </option>  
                            <option value="1" >Female</option>
                              <option value="2"> Male</option>
                              <option value="3">Rather not say</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label">Email (will be your user id)</label>
                            <input name="email" class="form-control" type="email" placeholder="name@example.com" value="">
        <!--                     <small class="form-text text-muted mt-2">This is the main email address that we'll send notifications to. <a href="account-notifications.html">Manage your notifications</a> in order to control what we send.</small>
         -->                  </div>
                        </div>
                      </div>
                      <div class="row align-items-center">
                        
                        <div class="col-md-6">
                          <div class="form-group focused">
                            <label class="form-control-label">I am a...</label>
                            <select name="endoscopistType" class="form-control" aria-hidden="true">
                        <option hidden selected disabled>Select the option which best describes you</option>
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
                      <select id="centreCountry" name="centreCountry" class="form-control" tabindex="-1" aria-hidden="true">
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
                            <input id="password" name="password" class="form-control" type="password" placeholder="Enter your password" value="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label">Password again</label>
                            <input name="passwordAgain" class="form-control" type="password" placeholder="password again" value="">
                          </div>
                        </div>
                      </div>
                      <div class="my-4">
                        <div class="custom-control custom-checkbox mb-3">
                          <input type="checkbox" name="checkterms" class="custom-control-input" id="checkterms">
                          <label class="custom-control-label" for="checkterms">I agree to the <a href="<?php echo BASE_URL;?>/pages/support/support_gieqs_terms_and_conditions.php" target="_blank">terms and conditions</a></label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="checkprivacy" class="custom-control-input" id="checkprivacy">
                          <label class="custom-control-label" for="checkprivacy">I agree to the <a href="<?php echo BASE_URL;?>/pages/support/support_gieqs_privacy_policy.php" target="_blank">privacy policy</a></label>
                        </div>
                      </div>

                      <input type="hidden" name="signup_redirect" value="basic_colon">
                      
          </form>
                </div>
                <div class="modal-footer">
                  <button id="submitPreRegister" type="button" class="btn btn-small text-dark bg-gieqsGold">Sign up</button>
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

        

          var userid = '<?php echo $userid;?>';
          
        if (userid == ''){

          userid = false;

        }
    
        var waitForFinalEvent = (function () {
	  var timers = {};
	  return function (callback, ms, uniqueId) {
	    if (!uniqueId) {
	      uniqueId = "Don't call this twice without a uniqueId";
	    }
	    if (timers[uniqueId]) {
	      clearTimeout (timers[uniqueId]);
	    }
	    timers[uniqueId] = setTimeout(callback, ms);
	  };
	})();

    function refreshProgrammeView() {



        const dataToSend = {

            programmeid: 33,

        }

        const jsonString = JSON.stringify(dataToSend);
        console.log(jsonString);

        var request2 = $.ajax({
            url: siteRoot + "assets/scripts/classes/generateProgramme_course_single.php",
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
            $(document).find('.Thursday').hide();
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

      passwordChange.done(function (data) {


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

        $('#button-login').click(function(){


          window.location = siteRoot + "pages/authentication/login.php?destination=basic_colon_signup";


        })

        

        $(document).on('click', '#login', function() {

        event.preventDefault();
        window.location.href = siteRoot + '/pages/authentication/login.php?destination=basic_colon_signup';


        })

        $('#button-signup').click(function(){


          $('.modal-new').modal('hide');
          $('#registerInterest').modal('show');
          $('.modal').css('overflow','auto');
      


        })

        if (videoPassed == 'register'){

        //simulate click

            waitForFinalEvent(function(){
              
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
              var url = siteRoot + "pages/learning/scripts/subscriptions/get_new_subscription_data.php";

            }else{

              //open version

              var url = siteRoot + "pages/learning/scripts/subscriptions/get_new_subscription_data_open.php";

            }

            var request = $.ajax({
                url: url,
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
                      'Something went wrong.  We could not load the subscription data.');

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
                    
          
                    centreCountry:{
          
                      required: true,
          
                    }, 
                    endoscopistType:{
          
                      required:true
                    },

                    checkterms:{
          
                      required: true,
          
                    }, 
                    checkprivacy:{
          
                      required:true
                    }
          
          
          
          },messages: {
          
          
          
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

        



      

    })
    </script>
</body>

</html>