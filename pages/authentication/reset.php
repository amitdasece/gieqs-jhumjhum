<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      //$openaccess = 1;

      $openaccess = 1;


      require BASE_URI . '/head.php';

      $general = new general;
      $users = new users;
      $userFunctions = new userFunctions;

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
    
    if (count($_GET) > 0){

	

	
      $data = $general->sanitiseGET($_GET);
      
      foreach ($data as $key=>$value){
        
        $GLOBALS[$key] = $value;
        
        }
    
        if ($debug){
    
            print_r($data);
            
            }
    
    
        //look up the user
    
        $userid = $userFunctions->getUserFromKey($key);
    
      
    
        //switch the userLevel to 6
    
        if ($users->matchRecord($userid)){

          $users->Load_from_key($userid);
          ?>
          <div class="main-content">
  <div class="container h-100vh d-flex align-items-center">
    <div class="col">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5 col-xl-4">
          <div>
            <div class="mb-5 text-center">
              <h6 class="h3">Password reset</h6>
              <p class="text-muted mb-2">Welcome <?php echo $users->getfirstname() . ' ' . $users->getsurname()?></p>
              <p class="text-muted mb-0">Enter your new password below to reset your account.</p>
            </div>
            <span class="clearfix"></span>
            <form id="NewUserForm">
              <div class="form-group">
                <label for="password" class="form-control-label">New Password</label>
                <div class="input-group input-group-merge">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                  </div>
                  <input name="password" id="password" class="form-control" type="password" placeholder="new password">
                </div>
              </div>
              <label for="passwordAgain" class="form-control-label">Enter new password again</label>
                <div class="input-group input-group-merge">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                  </div>
                  <input name="passwordAgain" id="passwordAgain" type="password" class="form-control" placeholder="new password again">
                </div>
              </div>
              <div class="mt-6">
                <button type="button" id="submitPreRegister" class="btn btn-block btn-primary">Update password</button></div>
            </form>
            <div class="mt-4 text-center"><small>Receieved this link by mistake?</small>
              <a href="<?php echo BASE_URL;?>" class="small font-weight-bold">Exit here</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php



        }else{
          ?>
          <div class="main-content">
  <div class="container h-100vh d-flex align-items-center">
    <div class="col">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5 col-xl-4">
          <div>
            <div class="mb-5 text-center">
              <h6 class="h3">Password reset</h6>
              <p class="text-muted mb-0">A valid key was not provided.</p>
            </div>

            <?php
            exit();

        }

          }else{
            ?>
            <div class="main-content">
    <div class="container h-100vh d-flex align-items-center">
      <div class="col">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-5 col-xl-4">
            <div>
              <div class="mb-5 text-center">
                <h6 class="h3">Password reset</h6>
                <p class="text-muted mb-0">A valid key was not provided.</p>
              </div>
  
              <?php
              exit();

          }
				        
                        
                        
		
        ?>
        
        <!-- load all video data -->

        <body>

<div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>
<div id="key" style="display:none;"><?php if ($key){echo $key;}?></div>
<div id="userid" style="display:none;"><?php if ($userid){echo $userid;}?></div>


      

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
    <script src="../../assets/js/purpose.js"></script>
    <!-- <script src="assets/js/generaljs.js"></script> -->
    <script src="assets/js/demo.js"></script>
    <script>
    var videoPassed = $("#id").text();
    var key = $("#key").text();
    var userid = $("#userid").text();
                    </script>

    <script>
        var signup = $('#signup').text();

        function submitPreRegisterForm() {


//userid is lesionUnderEdit

//console.log('updatePassword chunk');
//go to php script with an object from the form

var data = getFormDatav2($('#NewUserForm'), 'users', 'user_id', key, 1);

//TODO add identifier and identifierKey

console.log(data);

data = JSON.stringify(data);

console.log(data);

disableFormInputs('NewUserForm');

var passwordChange = $.ajax({
url: siteRoot + "/assets/scripts/passwordResetExecute.php",
type: "POST",
contentType: "application/json",
data: data,
});

passwordChange.done(function(data){


Swal.fire({
type: 'info',
title: 'Password Reset',
text: data,
background: '#162e4d',
confirmButtonText: 'ok',
confirmButtonColor: 'rgb(238, 194, 120)',

}).then((result) => {

  window.location.href = siteRoot;
  resetFormElements('NewUserForm');
  enableFormInputs('NewUserForm');
  //$('#registerInterest').modal('hide');

})



})

}

        $(document).ready(function () {

            

          if (signup == '2456') {

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
  


          password: {
            required: true,
            minlength: 6,

          },

          passwordAgain: {
            equalTo: "#password",
            

          },

          



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