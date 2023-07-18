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
  
  <section class="slice" id="sct-topics">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-body text-center">
              <a href="#!">
                <img alt="Image placeholder" src="<?php echo BASE_URL;?>/assets/img/svg/illustrations/design-thinking.svg" class="img-fluid img-center" style="height:90px;">
              </a>
              <h5 class="mt-5 mb-0"><a href="#">GIEQs III</a></h5>
            </div>
            <div class="list-group list-group-sm list-group-flush">
              <a href="<?php echo BASE_URL;?>/pages/support/support_gieqs_digital.php" class="list-group-item list-group-item-action">Connection and other issues</a>
              
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <div>
                <a href="#!" class="text-sm text-muted">
                  <i class="fas fa-edit mr-2"></i>see more topics
                </a>
              </div>
              <div class="text-right">
                <div class="actions">
                  <a href="#!" class="action-item"><i class="fas fa-angle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-body text-center">
              <a href="#!">
                <img alt="Image placeholder" src="<?php echo BASE_URL;?>/assets/img/svg/illustrations/financial-data.svg" class="img-fluid img-center" style="height:90px;">
              </a>
              <h5 class="mt-5 mb-0"><a href="#">My account</a></h5>
            </div>
            <div class="list-group list-group-sm list-group-flush">
              <a href="#" class="list-group-item list-group-item-action disabled">Update my profile</a>
            
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <div>
                <a href="#!" class="text-sm text-muted">
                  <i class="fas fa-edit mr-2"></i>see more topics
                </a>
              </div>
              <div class="text-right">
                <div class="actions">
                  <a href="#!" class="action-item"><i class="fas fa-angle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-body text-center">
              <a href="#!">
                <img alt="Image placeholder" src="<?php echo BASE_URL;?>/assets/img/svg/illustrations/financial-data.svg" class="img-fluid img-center" style="height:90px;">
              </a>
              <h5 class="mt-5 mb-0"><a href="#">Legal and Privacy</a></h5>
            </div>
            <div class="list-group list-group-sm list-group-flush">
              <a href="<?php echo BASE_URL;?>/pages/support/support_gieqs_terms_and_conditions.php" class="list-group-item list-group-item-action">Terms and Conditions</a>
              <a href="<?php echo BASE_URL;?>/pages/support/support_gieqs_privacy_policy.php" class="list-group-item list-group-item-action">Privacy Policy</a>
              <a href="<?php echo BASE_URL;?>/pages/support/support_gieqs_online_terms.php" class="list-group-item list-group-item-action">GIEQs Online Terms</a>

            
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <div>
                <a href="#!" class="text-sm text-muted disabled">
                  <i class="fas fa-edit mr-2"></i>see more topics
                </a>
              </div>
              <div class="text-right">
                <div class="actions">
                  <a href="#!" class="action-item"><i class="fas fa-angle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php        if (isset($_SESSION['user_id']) && ($_SESSION['siteKey'] == 'TxsvAb6KDYpmdNk') && ($_SESSION['access_level'] == '1' || $_SESSION['access_level'] == '2') || $_SESSION['access_level'] == '3'){?>

        <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-body text-center">
              <a href="#!">
                <img alt="Image placeholder" src="<?php echo BASE_URL;?>/assets/img/svg/illustrations/following.svg" class="img-fluid img-center" style="height:90px;">
              </a>
              <h5 class="mt-5 mb-0"><a href="#">Administration (GIEQs Online)</a></h5>
            </div>
            <div class="list-group list-group-sm list-group-flush">
            <a href="<?php echo BASE_URL;?>/pages/learning/pages/scores/help-gieqs-administration.php"  class="list-group-item list-group-item-action">GIEQs Online Administration User Guide</a>

              <a href="<?php echo BASE_URL;?>/pages/support/support_admin_user_add_permissions.php" class="list-group-item list-group-item-action">Add user permissions (GIEQs digital)</a>
              <a href="#" class="list-group-item list-group-item-action disabled">Reset user account</a>
              <a href="#" class="list-group-item list-group-item-action disabled">Reset user password</a>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <div>
                <a href="#!" class="text-sm text-muted">
                  <i class="fas fa-edit mr-2"></i>see more topics
                </a>
              </div>
              <div class="text-right">
                <div class="actions">
                  <a href="#!" class="action-item"><i class="fas fa-angle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php }
        if (isset($_SESSION['user_id']) && ($_SESSION['siteKey'] == 'TxsvAb6KDYpmdNk') && ($_SESSION['access_level'] == '1' || $_SESSION['access_level'] == '2')){ ?>

        <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-body text-center">
              <a href="#!">
                <img alt="Image placeholder" src="<?php echo BASE_URL;?>/assets/img/svg/illustrations/following.svg" class="img-fluid img-center" style="height:90px;">
              </a>
              <h5 class="mt-5 mb-0"><a href="#">Creator Tools (GIEQs Online)</a></h5>
            </div>
            <div class="list-group list-group-sm list-group-flush">
            <a href="<?php echo BASE_URL;?>/pages/learning/pages/scores/help-gieqs-creator.php"  class="list-group-item list-group-item-action">GIEQs Online Creator Tools User Guide</a>
              <a href="<?php echo BASE_URL;?>/pages/support/support_creator_edit_video_chapters.php" class="list-group-item list-group-item-action">Edit video chapters</a>
              <a href="#" class="list-group-item list-group-item-action disabled">Tag a video</a>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <div>
                <a href="#!" class="text-sm text-muted disabled">
                  <i class="fas fa-edit mr-2"></i>see more topics
                </a>
              </div>
              <div class="text-right">
                <div class="actions">
                  <a href="#!" class="action-item disabled"><i class="fas fa-angle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>


        <?php }?>
        <!-- <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-body text-center">
              <a href="#!">
                <img alt="Image placeholder" src="<?php echo BASE_URL;?>/assets/img/svg/illustrations/in-sync.svg" class="img-fluid img-center" style="height:90px;">
              </a>
              <h5 class="mt-5 mb-0"><a href="#">My account</a></h5>
            </div>
            <div class="list-group list-group-sm list-group-flush">
              <a href="#" class="list-group-item list-group-item-action">Delete history</a>
              <a href="#" class="list-group-item list-group-item-action">Change privacy settings</a>
              <a href="#" class="list-group-item list-group-item-action">Manage cookies</a>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <div>
                <a href="#!" class="text-sm text-muted">
                  <i class="fas fa-edit mr-2"></i>23 topics
                </a>
              </div>
              <div class="text-right">
                <div class="actions">
                  <a href="#!" class="action-item"><i class="fas fa-angle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-body text-center">
              <a href="#!">
                <img alt="Image placeholder" src="<?php echo BASE_URL;?>/assets/img/svg/illustrations/monitor.svg" class="img-fluid img-center" style="height:90px;">
              </a>
              <h5 class="mt-5 mb-0"><a href="#">Privacy center</a></h5>
            </div>
            <div class="list-group list-group-sm list-group-flush">
              <a href="#" class="list-group-item list-group-item-action">Delete history</a>
              <a href="#" class="list-group-item list-group-item-action">Change privacy settings</a>
              <a href="#" class="list-group-item list-group-item-action">Manage cookies</a>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <div>
                <a href="#!" class="text-sm text-muted">
                  <i class="fas fa-edit mr-2"></i>23 topics
                </a>
              </div>
              <div class="text-right">
                <div class="actions">
                  <a href="#!" class="action-item"><i class="fas fa-angle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-body text-center">
              <a href="#!">
                <img alt="Image placeholder" src="<?php echo BASE_URL;?>/assets/img/svg/illustrations/note-list.svg" class="img-fluid img-center" style="height:90px;">
              </a>
              <h5 class="mt-5 mb-0"><a href="#">My account</a></h5>
            </div>
            <div class="list-group list-group-sm list-group-flush">
              <a href="#" class="list-group-item list-group-item-action">Delete history</a>
              <a href="#" class="list-group-item list-group-item-action">Change privacy settings</a>
              <a href="#" class="list-group-item list-group-item-action">Manage cookies</a>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <div>
                <a href="#!" class="text-sm text-muted">
                  <i class="fas fa-edit mr-2"></i>23 topics
                </a>
              </div>
              <div class="text-right">
                <div class="actions">
                  <a href="#!" class="action-item"><i class="fas fa-angle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div> -->
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