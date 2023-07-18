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
    <title>GIEQs Online Support Pages</title>

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
              <h2 class="mb-2">Support for GIEQs III</h2>
              <p class="lead mb-0"></p>
              <div class="media align-items-center mt-4">
                <a href="#!" class="avatar avatar-sm rounded-circle mr-3">
                  <img alt="Image placeholder" src="<?php echo BASE_URL;?>/assets/img/icons/people/white-male.png"">
                </a>
                <div class="media-body">
                  <span class="h6 mb-0">The GIEQs organising committee</span>
                  <span class="text-sm text-muted">27th September 2022</span>
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
    Ghent International Endoscopy Quality Symposium, 3rd edition
</h2>
<h4>
    Navigating the congress
</h4>

<p>
    -       Use a MODERN BROWSER (such as Google Chrome or Safari).  You will not be able to access on Internet Explorer<br/>
    –       Go to gieqs.com and select GIEQs III from the Courses and Pro Content menu on the menu bar or navigate to the link in your confirmation email<br/>
    –       if you are registered for the congress you will access our custom Symposium Viewer.  You can take a tour to learn more about the features of GIEQs' custom viewer.<br/>
<br/>

</p>
 
<h4>
    Connection issues
</h4>
<p>
    –       If you cannot access the page for the streams or receive an error suggesting you do not have access please contact us (details below)<br/>
    –       Live support is available via email or telephone during GIEQs III<br/>
    –       If the stream will not load first try reloading the page<br/>
    –       For any other issues please contact us (details below)<br/>

</p>

<h4>
    Having your say
</h4>
<p>
    –       You can ask questions and interact with competitions live using the embedded chat window.  You must use a name to win prizes<br/>
    -       To win prizes you must mail the session, your name (same as one used in chat) and your email to admin@gieqs.com<br/>
    -       We will post links to surveys which you can fill during the symposium


</p>
<hr />
<h2>Information about the Symposium.</h2>
<p>GIEQs III will be held from 7:45am until 5pm Central European Time on&nbsp;<strong>29th and 30th September 2022.</strong>&nbsp;There may be satellite symposia outside of these times (see program for details).</p>
<p><strong>This GIEQs III registration is for the Virtual Experience only.</strong></p>
<hr />
<h2>Accessing the Congress</h2>
<p>You can access the congress directly using the button above. This will also work for catch-up after the congress. You will be prompted to log in first.</p>
<p>If you have issues logging in you can reset your password from the&nbsp;<a href="<?php echo BASE_URL;?>/login">login screen</a>&nbsp;or&nbsp;<a>contact us</a>. For urgent issues you can call or WhatsApp us on +32471117844</p>
<p>You can also use the button above to access catch up after the symposium (delay of 48 hours until videos available). There will be no video visible on the page until the first day of the symposium.</p>
<p>During each session there will be a quiz. GIEQs Coin can be won during these sessions which can be used to pay for items on GIEQs.com. You must register using your name which exactly matches your GIEQs account to be eligible to win. The decision of the judges is final as to the winner. The winner will be randomly chosen from those who answer the poll question correctly.</p>
<hr />
<h2>Thanks to our Sponsors</h2>
<p>We would like to thank our&nbsp;<a href="<?php echo BASE_URL;?>/sponsors">Sponsors</a>&nbsp;without whom this Symposium would not be possible.</p>
<p>Please catch up with them electronically using the links available on the symposium viewer.</p>
<hr />
<h2>Staying Up-to-Date</h2>
<p>You can find all the information you need about the symposium&nbsp;<a href="<?php echo BASE_URL;?>/iii">here</a>.</p>
<p>The best place to catch up on the latest is&nbsp;<a href="https://twitter.com/gieqs_symposium">Twitter</a>&nbsp;or&nbsp;<a href="https://www.facebook.com/gieqs">Facebook</a>. You can also follow us on Linkedin. Use the links at the bottom of this mail.</p>
<p>Use the hashtag&nbsp;<strong>#GIEQs_III</strong>&nbsp;to reference the meeting!</p>
<hr />
<h2>Accreditation and CME</h2>
<p>Both European (EACCME) and Belgian (RIZIV/INAMI) accreditation have been requested for the live event.</p>
<p>Accreditation will only be claimable by those who login during the live congress (not currently available for catch-up).</p>
<p>EACCME: 8 / 7 CME points (per day) RIZIV: 8.5 points (per day)</p>
<hr />
<h2>Thank-you</h2>
<p>Thanks again for your registration. We are really looking forward to you joining us tomorrow.</p>
<p><strong>Together we can make the safety and quality of everyday Endoscopy better.</strong></p>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td>
<table border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td><a title="find out more" href="<?php echo BASE_URL;?>/login?destination=viewasset&amp;assetid=95" target="_blank">Access GIEQs III</a></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>


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
                  <a href="mailto:gieqs-helpdesk@seauton-international.com" class="btn btn-sm btn-primary" >Contact Support</a>
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