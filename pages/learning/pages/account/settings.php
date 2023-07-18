

<?php require '../../includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      //$openaccess = 1;

      $requiredUserLevel = 6;


      require BASE_URI . '/head.php';

      $general = new general;

      ?>

    <!--Page title-->
    <title>GIEQs Online Endoscopy Trainer</title>

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

        .swal2-shown {

          color: white !important;

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

        <?php require BASE_URI . '/pages/learning/includes/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/pages/learning/includes/nav.php';?>

        


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
    <!-- Header (account) -->
    <section class="page-header bg-dark-dark d-flex align-items-end pt-8 mt-10" style="background-image: url('<?php echo BASE_URL;?>/assets/img/covers/resection/ssp.png'); background-repeat: no-repeat; background-size: cover; background-position: center center;" data-offset-top="#header-main">

   
      <!-- Header container -->
      <div class="container pt-0 pt-lg-0" >
        <div class="row" >
          <div class=" col-lg-12">
            <!-- Salute + Small stats -->
            <div class="row align-items-center mb-4">
              <div class="col-auto mb-4 mb-md-0">
                <span class="h2 mb-0 text-white text-bold d-block">My Account <?php //echo $_SESSION['firstname'] . ' ' . $_SESSION['surname']?></span>
                <span class="text-white">Setup your GIEQs account.</span>
              </div>
              <!-- video -->
              <div class="col-auto flex-fill d-none d-xl-block">
              <!-- <div id="videoDisplay" class="embed-responsive embed-responsive-16by9">
                <iframe  id='videoChapter' class="embed-responsive-item"
                    src='https://player.vimeo.com/video/398791515' allow='autoplay'
                    webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div> -->
            </div>
            </div>
            <!-- Account navigation -->
           
            
          </div>
        </div>
      </div>
    </section>
    <section class="slice">
      <div class="container">
        <div class="row row-grid">
          <div class="col-lg-9 order-lg-2">
            <form id="passwordChange">
              <!-- Password -->
              <div class="actions-toolbar py-2 mb-4">
                <h5 class="mb-1">Change password</h5>
                <p class="text-sm text-muted mb-0">Change your password here.</p>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label">Old password</label>
                    <input name="oldPassword" class="form-control" type="password">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label">New password</label>
                    <input id="newPassword" name="newPassword" class="form-control" type="password">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label">Confirm password</label>
                    <input name="newPasswordConfirm" class="form-control" type="password">
                  </div>
                </div>
              </div>
              <div class="mt-4">
                <button id="passwordChangeButton" type="button" class="btn btn-sm btn-primary">Update password</button>
                <a href="<?php echo BASE_URL;?>/pages/authentication/recover.php" class="btn btn-sm btn-secondary">I forgot my password</a>
              </div>
            </form>
            <!-- Username TODO ADD LATER-->
            <!-- <div class="mt-5 pt-5 delimiter-top">
              <div class="actions-toolbar py-2 mb-4">
                <h5 class="mb-1">Global User Settings can appear here
                </h5>
                <p class="text-sm text-muted mb-0">Checkboxes for global settings.</p>
              </div>
              <!-- Button trigger modal
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-change-username">Save</button>
              <!-- Modal 
              <div class="modal fade" id="modal-change-username" tabindex="-1" role="dialog" aria-labelledby="modal-change-username" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <form>
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="modal-title d-flex align-items-center" id="modal-title-change-username">
                          <div>
                            <div class="icon icon-sm icon-shape icon-info rounded-circle shadow mr-3">
                              <i class="fas fa-user"></i>
                            </div>
                          </div>
                          <div>
                            <h6 class="mb-0">Change username</h6>
                          </div>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="form-control-label">Old username</label>
                              <input class="form-control" type="text">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label class="form-control-label">New username</label>
                              <input class="form-control" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="px-5 pt-4 mt-4 delimiter-top text-center">
                          <p class="text-muted text-sm">You will receive an email where you will be asked to confirm this action in order to be completed.</p>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Change my username</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div> -->
            <!-- Delete -->
            <div class="mt-5 pt-5 delimiter-top">
              <div class="actions-toolbar py-2 mb-4">
                <h5 class="mb-1">Delete account</h5>
                <p class="text-sm text-muted mb-0">Deleting your account is ireversible and can affect past activites.</p>
              </div>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-account">Delete account</button>
              <!-- Modal -->
              <div class="modal modal-danger fade" id="modal-delete-account" tabindex="-1" role="dialog" aria-labelledby="modal-delete-account" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <form id="form-delete-account" class="form-danger">
                    <div class="modal-content">
                      <div class="modal-body">
                        <div class="text-center">
                          <i class="fas fa-exclamation-circle fa-3x opacity-8"></i>
                          <h5 class="text-white mt-4">Should we stop now?</h5>
                          <p class="text-sm text-sm">All your data and preferences will be erased. If you have a subscription it will be removed and you will no longer be billed.</p>
                        </div>
                        <div class="form-group">
                          <label class="form-control-label text-white">Your email (username)</label>
                          <input name="email" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                          <label class="form-control-label text-white">To verify, type <span class="font-italic">delete my account</span> below</label>
                          <input name="delete" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                          <label class="form-control-label text-white">Your password</label>
                          <input name="password" class="form-control" type="password">
                        </div>
                        <div class="mt-4">
                          <button id="delete" type="button" class="btn btn-block btn-sm btn-white text-danger">Delete my account</button>
                          <button type="button" class="btn btn-block btn-sm btn-link text-light mt-4" data-dismiss="modal">Not this time</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
         
          <?php require BASE_URI . '/pages/learning/pages/account/sidenav.php';?>

        </div>
      </div>
    </section>

          <!-- Devolve to external file for side nav -->
        
    </section>
  </div>

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="assets/js/purpose.core.js"></script> -->
    <!-- Page JS -->
    <script src="<?php echo BASE_URL;?>/assets/libs/swiper/dist/js/swiper.min.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/libs/typed.js/lib/typed.min.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/libs/isotope-layout/dist/isotope.pkgd.min.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/libs/jquery-countdown/dist/jquery.countdown.min.js"></script>
    <!-- Google maps -->
    <!-- Purpose JS -->
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>
    <!-- <script src="assets/js/generaljs.js"></script> -->
    <script>

    var videoPassed = $("#id").text();
                    </script>

    <script>
        var signup = $('#signup').text();

        var edit = 0;

        var lesionUnderEdit = <?php echo $userid;?>;

        function updatePassword(){

        //userid is lesionUnderEdit

        //console.log('updatePassword chunk');
        //go to php script with an object from the form

        var data = getFormDatav2($('#passwordChange'), 'users', 'user_id', lesionUnderEdit, 1);

        //TODO add identifier and identifierKey

        console.log(data);

        data = JSON.stringify(data);

        console.log(data);

        var passwordChange = $.ajax({
        url: siteRoot + "/assets/scripts/changePassword.php",
        type: "POST",
        contentType: "application/json",
        data: data,
        });

        passwordChange.done(function(data){


        Swal.fire({
        type: 'info',
        title: 'Password Change',
        text: data,
        background: '#162e4d',
        confirmButtonText: 'ok',
        confirmButtonColor: 'rgb(238, 194, 120)',

        }).then((result) => {

          resetFormElements('passwordChange');

        })



        })

        }

        function submituserDeleteForm() {

//pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)

console.log('got to the submit function');




  if (lesionUnderEdit) {

    var esdLesionObject = pushFormDataJSON($("#form-delete-account"), "users", "user_id", lesionUnderEdit, "3"); //insert new object

    esdLesionObject.done(function (data) {

      console.log(data);

      if (data) {

        if (data == 1) {

          Swal.fire({
            type: 'success',
            title: 'Profile Deleted',
            text: 'Your user profile was deleted.  Logging you out.',
            background: '#162e4d',
            confirmButtonText: 'ok', 
            confirmButtonColor: 'rgb(238, 194, 120)', 

          }).then((result) => {
            logout();
})

          

        

        } else if (data == 0) {

          alert("Error, try again");

        } else if (data == 3) {

          Swal.fire({
            type: 'error',
            title: 'Incorrect Entry',
            text: 'Your user profile was NOT deleted.  Either the username or password was incorrect.',
            background: '#162e4d',
            confirmButtonText: 'ok', 
            confirmButtonColor: 'rgb(238, 194, 120)', 

          }).then((result) => {
           
          })

        }



      }


    });

  }





}

        $(document).ready(function () {


          

          $(document).on('click', '#delete', function () {

            event.preventDefault();

            $('#form-delete-account').submit();

          });
          
          $(document).on('click', '#passwordChangeButton', function (event) {

            event.preventDefault();

            $('#passwordChange').submit();

          });

          $("#form-delete-account").validate({

            invalidHandler: function (event, validator) {
              var errors = validator.numberOfInvalids();
              console.log("there were " + errors + " errors");
              if (errors) {
                var message = errors == 1 ?
                  "1 field contains errors. It has been highlighted" :
                  +errors + " fields contain errors. They have been highlighted";


                $('#error').text(message);
                //$('div.error span').addClass('form-text text-danger');
                //$('#errorWrapper').show();

                $("#errorWrapper").fadeTo(4000, 500).slideUp(500, function () {
                  $("#errorWrapper").slideUp(500);
                });
              } else {
                $('#errorWrapper').hide();
              }
            },
            ignore: [],
            rules: {


              email: {
                required: true,
                email: true,

              },
              delete: {
                required: true,
                regex: 'delete my account',

              },
              password: {
                required: true,

              },











            },
            submitHandler: function (form) {

              //submitPreRegisterForm();

              submituserDeleteForm();

              //TODO submit changes
              //TODO reimport the array at the top
              //TODO redraw the table



            }




          });

          $("#passwordChange").validate({

          invalidHandler: function (event, validator) {
          var errors = validator.numberOfInvalids();
          console.log("there were " + errors + " errors");
          if (errors) {
          var message = errors == 1 ?
          "1 field contains errors. It has been highlighted" :
          +errors + " fields contain errors. They have been highlighted";


          $('#error').text(message);
          //$('div.error span').addClass('form-text text-danger');
          //$('#errorWrapper').show();

          $("#errorWrapper").fadeTo(4000, 500).slideUp(500, function () {
          $("#errorWrapper").slideUp(500);
          });
          } else {
          $('#errorWrapper').hide();
          }
          },
          ignore: [],
          rules: {


                oldPassword: {
                required: true,


                },
                newPassword: {
                required: true,
                minlength: 6,


                },
                newPasswordConfirm: {

                equalTo: "#newPassword",



                },
          },
          messages: {


oldPassword: {
required: 'Please enter your old password',


},
newPassword: {
required: 'Please enter a new password',
minlength: 'Please use at least 6 characters'


},
newPasswordConfirm: {

equalTo: "The new passwords should match",



},











},
          
          submitHandler: function (form) {

          //submitPreRegisterForm();

          updatePassword();

          //TODO submit changes
          //TODO reimport the array at the top
          //TODO redraw the table



          },




          
          });


        })
    </script>
</body>

</html>