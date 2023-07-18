<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      //$openaccess = 1;

      $openaccess = 1;

      $requiredUserLevel = 0;


      require BASE_URI . '/head.php';

      $general = new general;

      ?>

    <!--Page title-->
    <title>GIEQs Online Endoscopy Trainer</title>

    <script src=<?php echo BASE_URL . "/assets/js/jquery.vimeo.api.min.js"?>></script>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.css">
    <script src="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>



    

    <style>
        .gieqsGold {

            color: rgb(238, 195, 120);


        }

        .tagButton {

            cursor: pointer;

        }

        .tagCard {

background-color: #1b385d75; 



}

.tagCardHeader{

    background-color: #162e4d;

}

        

.cursor-pointer {

    cursor: pointer;

}

@media (min-width: 992px) {
    .tagCard {

            
left: -50vw;
top: -20vh;


}
}

@media (min-width: 1200px) {
        #chapterSelectorDiv{

            
                
                top:-3vh;
            

        }
        #playerContainer{

                margin-top:-20px;

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
    </style>


</head>

<body>
    <header class="header header-transparent" id="header-main">

        <!-- Topbar -->

        <?php require BASE_URI . '/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/nav.php';?>

        


    </header>

    <?php
		if (isset($_GET["id"]) && is_numeric($_GET["id"])){
			$id = $_GET["id"];
		
		}else{
		
			$id = null;
		
		}
				        
                        
                        
		
        ?>
        
        <!-- load all video data -->

        <body>

<div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>

<div class="main-content">
  <!-- Spotlight -->
  <?php require(BASE_URI . '/pages/support/header_support.php') ?>
  
  <section class="slice" id="sct-article">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <div class="card">
            <div class="card-body p-5">
              <!-- Topic header -->
              <h2 class="mb-2">Terms and Conditions for GIEQs digital</h2>
              <p class="lead mb-0"></p>
              <div class="media align-items-center mt-4">
                <a href="#!" class="avatar avatar-sm rounded-circle mr-3">
                  <img alt="Image placeholder" src="<?php echo BASE_URL;?>/assets/img/icons/people/white-male.png"">
                </a>
                <div class="media-body">
                  <span class="h6 mb-0">The GIEQs organising committee</span>
                  <span class="text-sm text-muted">31st August 2020</span>
                </div>
              </div>
              <!-- <div class="d-flex align-items-center mt-4">
                <ul class="list-inline">
                  <li class="list-inline-item pr-3">
                    <span class="badge badge-pill badge-soft-info"><i class="fas fa-code mr-1"></i>Web Design</span>
                  </li>
                  <li class="list-inline-item pr-3">
                    <span class="badge badge-pill badge-soft-success">Solved</span>
                  </li>
                  <li class="list-inline-item text-sm pr-3"><i class="fas fa-thumbs-up mr-2"></i>100</li>
                  <li class="list-inline-item text-sm pr-3"><i class="fas fa-comment mr-2"></i>20</li>
                </ul>
              </div> -->
              <!-- Topic body -->
              <article class="mt-5">
              <h2>
    Ghent International Endoscopy Quality Symposium, digital edition
</h2>
<h4>
    Specific Terms & Conditions
</h4>
 
<h4>
    GHENT INTERNATIONAL ENDOSCOPY QUALITY SYMPOSIUM
</h4>
<p>
    –       These Specific Terms & Conditions govern the Ghent International Endoscopy Quality Symposium, digital edition.
    –       the Ghent International Endoscopy Quality Symposium is organised by the GIEQs Foundation, a not-for-profit Foundation registered in Belgium.
</p>
 
<h4>
    SYMPOSIUM REGISTRATION
</h4>
<p>
    –       The registration includes:
    o   Exclusive access to the Scientific Programme of the Ghent International Endoscopy Quality Symposium, digital edition
    o   Exclusive access to CME accredited content
    o   You will also receive complimentary access to GIEQs Online basic from its launch until one month after the event, containing all the content from GIEQs and a selection of our curated learning material 
    –       All fees are in euro, including applicable VAT. 
</p>
 
<h4>
    CANCELLATION POLICY
</h4>
<p>
    After receipt of the email confirmation of the individual or group registrations, 100% cancellation costs apply (no refunds).
    Cancellations have to be made in writing to the PCO Secretariat via admin@gieqs.com.
</p>

<h4>
    PHOTOS AND VIDEO
</h4>
<p>
    –       Delegates agree that GIEQs may use any photos taken in conjunction with the Symposium in an unlimited manner for promotional purposes of GIEQs and its activities on GIEQs website and in GIEQs Publications without any compensation to the delegate.
    –       Delegates agree that GIEQs may use any video recordings taken in conjunction with the Symposium in an unlimited manner for scientific educational purposes of GIEQs and its activities on GIEQs website and in GIEQs Digital Material without any compensation to the delegate.
    –       All patients participating in the live endoscopy and videos have given their explicit written consent to be filmed. All identifying shots are removed. If a user notices a video which clearly identifies a patient they should contact the administrator immediately so this video can be removed and re-edited. GIEQs does not accept any legal responsibility for how the information presented is used. The final decision about the management of any patient rests with the treated physician only and is entirely their responsibility.
     
</p>
<h4>
    PERMISSION TO CONTACT
</h4>
<p>
    –       Delegates will be contacted by the PCO secretariat with regards to their registration to GIEQs, digital edition. Due to the online nature of the meeting, the PCO secretariat will communicate directly with all delegates to ensure access to content, to provide updates regarding the release of content, as well as customer service. 
    –       The PCO secretariat (admin@gieqs.com) can be contacted when delegates wish to consult, modify or delete registered information.
     
</p>
<h4>
    PAYMENT POLICY
</h4>
<p>
    –       Registrations are only valid once full payment is received by the PCO Secretariat. Priority to activities with limited capacity will be given to those who have paid in full.
    –       All invoices issued must be paid before the Symposium. All amounts are in euro. Payments can be made by credit card through a secured page on the Symposium website or bank transfer (by exception).
    –       Invoices that will be paid via wire transfer are payable within 30 days from the invoice date. The invoice number and registration/booking reference number should be mentionned as payment reference.
    –       Outstanding amounts will be collected at the Late Fee rate. 
    –       All charges for payment transactions are the responsibility of the participant and should be paid at source in addition to the registration fees.
    –       Invoices are only sent by email.
    –       Special requests for the processing of the invoice should kindly be submitted in writing to the PCO Secretariat.  For the reissuing of invoices, €100,00 (excluding VAT) will be charged.
     
</p>
<h4>
    ONLINE PAYMENTS 
</h4>
<p>
    Online payments are accepted by: 
    –       Credit Card: Visa, MasterCard, American Express and Maestro
     
</p>
<h4>
    LIABILITY
</h4>
<p>
    –       The participant acknowledges that he/she has no right to lodge damage claims against the organizers should the holding of the Symposium be hindered or prevented by unexpected political or economic events or generally by force majeure, or should the non-appearance of speakers or other reasons necessitate programme changes. 
    –       Should technical reasons beyond the control of the organisers make any changes necessary, they cannot be held responsible.  
    –       Everybody attending should stick to the confidentiality rules.
    –       Belgian law shall apply and place of jurisdiction will be Leuven. 
</p>
<h4>
    VALIDITY
</h4>
<p>
    –       If one or more provisions of these Specific Terms & Conditions is found to be invalid, illegal or unenforceable (in whole or in part), the remainder of the provision and of these Specific Terms & Conditions shall not be affected and shall continue in full force and effect as if the invalid, illegal or unenforceable provision(s) had never existed.
</p>

              </article>
            </div>
            <div class="card-footer px-5 py-4 bg-lighter border-0 delimiter-top">
              <h5 class="mb-4">Did you find this article helpful?</h5>
              <form class="d-flex justify-content-between">
                <div>
                  <button class="btn btn-sm btn-dark" type="submit"><i class="fas fa-thumbs-up"></i>
                  </button>
                  <button class="btn btn-sm btn-dark" type="submit"><i class="fas fa-thumbs-down"></i>
                  </button>
                </div>
                <div>
                  <a href="mailto:admin@gieqs.com" class="btn btn-sm btn-primary" >Contact Support</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="assets/js/purpose.core.js"></script> -->
    <!-- Page JS -->
    <script src="assets/libs/swiper/dist/js/swiper.min.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <script src="assets/libs/typed.js/lib/typed.min.js"></script>
    <script src="assets/libs/isotope-layout/dist/isotope.pkgd.min.js"></script>
    <script src="assets/libs/jquery-countdown/dist/jquery.countdown.min.js"></script>
    <!-- Google maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBuyKngB9VC3zgY_uEB-DKL9BKYMekbeY"></script>
    <!-- Purpose JS -->
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>
    <!-- <script src="assets/js/generaljs.js"></script> -->
    <script src="assets/js/demo.js"></script>
    <script>
    var videoPassed = $("#id").text();
                    </script>

    
    <script>
        var signup = $('#signup').text();

        function submitPreRegisterForm() {


//userid is lesionUnderEdit

//console.log('updatePassword chunk');
//go to php script with an object from the form

var data = getFormDatav2($('#NewUserForm'), 'users', 'user_id', null, 1);

//TODO add identifier and identifierKey

console.log(data);

data = JSON.stringify(data);

console.log(data);

disableFormInputs('NewUserForm');

var passwordChange = $.ajax({
url: siteRoot + "/assets/scripts/newUser.php",
crossDomain: true,
headers: {
  'Content-Type': 'application/x-www-form-urlencoded'
},
type: "POST",
contentType: "application/json",
data: data,
});

passwordChange.done(function(data){


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

})



})

}

        $(document).ready(function () {

            

          if (videoPassed == '2456') {

$('#registerInterest').modal('show');

}

$(document).on('click', '#submitPreRegister', function() {

event.preventDefault();
$('#NewUserForm').submit();

})

$(document).on('click', '#login', function() {

event.preventDefault();
window.location.href = siteRoot + '/pages/authentication/login.php';


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
            /* $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#collapseExample').length && 
                    $('#collapseExample').is(":visible")) {
                        $('#collapseExample').collapse('hide');
                    }        
            }); */

            $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#selectDropdown').length && 
                    $('#selectDropdown').is(":visible")) {
                        $('#selectDropdown').collapse('hide');
                    }        
            });

            $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#collapseExample2').length && 
                    $('#collapseExample2').is(":visible")) {
                        $('#collapseExample2').collapse('hide');
                    }        
            });

            $(document).click(function(event) { 
                $target = $(event.target);
                
                if(!$target.closest('#collapseExample3').length && 
                    $('#collapseExample3').is(":visible")) {
                        $('#collapseExample3').collapse('hide');
                    }        
            });

            $(document).on('click', '.tagsClose', function(){

                $('#collapseExample').collapse('hide');

            })

            $('.referencelist').on('click', function (){
		
		
		//get the tag name
		
		var searchTerm = $(this).attr('data');
		
		//console.log("https://www.ncbi.nlm.nih.gov/pubmed/?term="+searchTerm);
		
		PopupCenter("https://www.ncbi.nlm.nih.gov/pubmed/?term="+searchTerm, 'PubMed Search (endoWiki)', 800, 700);

		
		
		
		
	})

	$('.referencelist').on('mouseenter', function (){

		$(this).css('color', 'rgb(238, 194, 120)');
		$(this).css('cursor', 'pointer');

	})

	$('.referencelist').on('mouseleave', function (){

		$(this).css('color', 'white');
		$(this).css('cursor', 'default');

	})


        })
    </script>
</body>

</html>