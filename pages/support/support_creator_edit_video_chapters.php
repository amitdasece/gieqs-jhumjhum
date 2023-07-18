<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      //$openaccess = 1;

      $openaccess = 0;

      $requiredUserLevel = 6;


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
              <h2 class="mb-2">Editing videos chapters and tags for GIEQs Online</h2>
              <p class="lead mb-0">Properly tagging and chaptering a video is the key to the GIEQs online learning experience.</p>
              <div class="media align-items-center mt-4">
                <a href="#!" class="avatar avatar-sm rounded-circle mr-3">
                  <img alt="Image placeholder" src="<?php echo BASE_URL;?>/assets/img/icons/people/white-male.png"">
                </a>
                <div class="media-body">
                  <span class="h6 mb-0">David Tate</span>
                  <span class="text-sm text-muted">31st August 2020, Updated 6/9/2021</span>
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
                <p>The video below shows you how to add chapters to videos on GIEQs online</p>
                
                <h5>This video shows you the basics</h5>
                
                  <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/453408855" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
                  <figcaption class="mt-3 text-muted"><p><a href="https://vimeo.com/453408855/a077212070">Creator Video Chapter Tagging GIEQs Online</a> from <a href="https://vimeo.com/user67134812">David</a> on <a href="https://vimeo.com">Vimeo</a>.</p></figcaption>
                  
                
                <h4>Frequent Questions</h4>

                <h5>Why can I not add tag categories or new tags?</h5>
                <p>The tags and tag categories govern the running of the site.  Therefore we ask that you don't modify them but discuss them with the managing users</p>

                <h5>Why does my work on tagging not save?</h5>
                <p>As per the video above you need to avoid using special characters like ' and " and / which will break the page.  You can always tell if your tagging
                  has saved by checking the bar at the top just underneath the video which says Saved at e.g. 21:40.  If that is not showing then check you do not have any of these
                  characters in your input.
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
                  <a href="mailto:admin@gieqs.com" class="btn btn-sm btn-primary">Contact Support</a>
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
url: siteRoot + "assets/scripts/newUser.php",
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