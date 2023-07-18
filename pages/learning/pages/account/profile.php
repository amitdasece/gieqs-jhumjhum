

<?php require '../../includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      //$openaccess = 1;

      $requiredUserLevel = 6;



      require BASE_URI . '/head.php';

     


      $general = new general;

      $users = new users;

      

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
    
    $debug = false;
        
    $users->Load_from_key($userid);
                        
                        
		
        ?>
        
        <!-- load all video data -->

        <body>

<div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>

<div class="main-content">
    <!-- Header (account) -->
    <section class="page-header bg-dark-dark d-flex align-items-end pt-8 mt-10" style="background-image: url('<?php echo BASE_URL;?>/assets/img/covers/learning/1v2.png'); background-repeat: no-repeat; background-size: cover; background-position: center center;" data-offset-top="#header-main">

   
      <!-- Header container -->
      <div class="container pt-0 pt-lg-0" >
        <div class="row" >
          <div class=" col-lg-12">
            <!-- Salute + Small stats -->
            <div class="row align-items-center mb-4">
              <div class="col-auto mb-4 mb-md-0">
                <span class="h2 mb-0 text-white text-bold d-block">Welcome to GIEQs Online. <?php //echo $_SESSION['firstname'] . ' ' . $_SESSION['surname']?></span>
                <span class="text-white">Your home for evidence-based endoscopy education.</span>
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
            <!-- Change avatar -->
            <?php require(BASE_URI . '/pages/learning/pages/account/memberCard.php');?>
            <!-- General information form -->
            <div class="actions-toolbar py-2 mb-4">
              <h5 class="mb-1">General information</h5>
              <p class="text-sm text-muted mb-0">The information below in your profile is <a href="<?php echo BASE_URL;?>/pages/learning/pages/account/public-profile.php?id=<?php echo $userid;?>" target="_blank">publicly available on GIEQs.com</a> except your email address</p>
            </div>
            <form id="userForm">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                  <label class="form-control-label">First name</label>
                    <input name="firstname" class="form-control" type="text" placeholder="Enter your first name" value="<?php echo $users->getfirstname();?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label">Last name</label>
                    <input name="surname" class="form-control" type="text" placeholder="Also your last name" value="<?php echo $users->getsurname();?>">
                  </div>
                </div>
              </div>
              <div class="row align-items-center">
                
                <div class="col-md-6">
                  <div class="form-group focused">
                    <label class="form-control-label">Gender</label>
                    <select name="gender" class="form-control" tabindex="-1" aria-hidden="true">
                    <option hidden></option>  
                    <option value="1" <?php if ($users->getgender() == 1){echo "selected";}?>>Female</option>
                      <option value="2" <?php if ($users->getgender() == 2){echo "selected";}?>>Male</option>
                      <option value="3"  <?php if ($users->getgender() == 3){echo "selected";}?>>Rather not say</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label">Email (also your user id)</label>
                    <input name="email" class="form-control" type="email" placeholder="name@example.com" value="<?php echo $users->getemail();?>">
<!--                     <small class="form-text text-muted mt-2">This is the main email address that we'll send notifications to. <a href="account-notifications.html">Manage your notifications</a> in order to control what we send.</small>
 -->                  </div>
                </div>
              </div>
              
             
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label">Phone</label>
                    <input name="contactPhone" class="form-control" type="text" placeholder="with country code" value="<?php echo $users->getcontactPhone();?>">
                  </div>
                </div>
              </div>
              <!-- Address -->
              
              <!-- Skills -->
              <!-- <div class="pt-5 mt-5 delimiter-top">
                <div class="actions-toolbar py-2 mb-4">
                  <h5 class="mb-1">Skills</h5>
                  <p class="text-sm text-muted mb-0">Show off you skills using our tags input control.</p>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group focused">
                      <label class="sr-only">Skills</label>
                      <div class="bootstrap-tagsinput"><span class="tag badge badge-primary">HTML<span data-role="remove"></span></span> <span class="tag badge badge-primary"> CSS3<span data-role="remove"></span></span> <span class="tag badge badge-primary"> Bootstrap<span data-role="remove"></span></span> <span class="tag badge badge-primary"> Photoshop<span data-role="remove"></span></span> <span class="tag badge badge-primary"> VueJS<span data-role="remove"></span></span> <input type="text" placeholder="Type here..."></div><input type="text" class="form-control" value="HTML, CSS3, Bootstrap, Photoshop, VueJS" data-toggle="tags" placeholder="Type here..." style="display: none;">
                    </div>
                  </div>
                </div>
              </div> -->

              <div class="pt-5 mt-5 delimiter-top">
                <div class="actions-toolbar py-2 mb-4">
                  <h5 class="mb-1">Institution</h5>
                  <p class="text-sm text-muted mb-0">Please share your institution details to help others identify where
                    you are from and your expertise.</p>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label">Institution name</label>
                      <input id="centreName" name="centreName" class="form-control" type="text"
                        placeholder="Enter your institution name" value="<?php echo $users->getcentreName();?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label">Institution city</label>
                      <input name="centreCity" class="form-control" type="text"
                        placeholder="Enter your institution city" value="<?php echo $users->getcentreCity();?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label">Institution country</label>
                      <select id="centreCountry" name="centreCountry" class="form-control" tabindex="-1" aria-hidden="true">
                        <option hidden disabled>select a country...</option>
                        <option value="<?php $country = $users->getcentreCountry(); echo $country;?>" selected="selected"><?php echo $general->getCountryName($country);?></option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group focused">
                      <label class="form-control-label">Institution Type</label>
                      <select name="centreType" class="form-control" tabindex="-1" aria-hidden="true"
                        placeholder="Select the description that best matches your institution">
                        <option hidden selected disabled>Please select your institution type</option>
                        <option value="1" <?php if ($users->getcentreType() == 1){echo "selected";}?>>Public Academic</option>
                        <option value="2" <?php if ($users->getcentreType() == 2){echo "selected";}?>>Private Academic</option>
                        <option value="3" <?php if ($users->getcentreType() == 3){echo "selected";}?>>Public Non-Academic</option>
                        <option value="4" <?php if ($users->getcentreType() == 4){echo "selected";}?>>Private Non-Academic</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="pt-5 mt-5 delimiter-top">
                <div class="actions-toolbar py-2 mb-4">
                  <h5 class="mb-1">Endoscopic Experience</h5>
                  <p class="text-sm text-muted mb-0">Please share your details of your experience to allow others to
                    relate to your comments and postings.</p>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group focused">
                      <label class="form-control-label">Are you a trainee?</label>
                      <select id="trainee" name="trainee" class="form-control" tabindex="-1" aria-hidden="true">
                        <option hidden disabled selected>Are you a trainee?</option>
                        <option value="0" <?php if ($users->gettrainee() == 0){echo "selected";}?>>No</option>
                        <option value="1" <?php if ($users->gettrainee() == 1){echo "selected";}?>>Yes</option>

                      </select>
                    </div>

                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group focused">
                      <label class="form-control-label">Which of the following best describes you?</label>
                      <select name="endoscopistType" class="form-control" tabindex="-1" aria-hidden="true">
                        <option hidden selected disabled>Select the option which best describes you</option>
                        <option value="1" <?php if ($users->getendoscopistType() == 1){echo "selected";}?>>Medical Endoscopist</option> 
                        <option value="2" <?php if ($users->getendoscopistType() == 2){echo "selected";}?>>Surgical Endoscopist</option>
                        <option value="3" <?php if ($users->getendoscopistType() == 3){echo "selected";}?>>Nurse Endoscopist</option>
                        <option value="4" <?php if ($users->getendoscopistType() == 4){echo "selected";}?>>Endoscopy Nurse (assistant)</option>
                        <option value="5" <?php if ($users->getendoscopistType() == 5){echo "selected";}?>>Medical Student</option>
                        <option value="6" <?php if ($users->getendoscopistType() == 6){echo "selected";}?>>Nursing Student</option>
                        <option value="7" <?php if ($users->getendoscopistType() == 7){echo "selected";}?>>Not a Healthcare Professional</option>

                      </select>
                    </div>

                  </div>
                </div>
                <div class="actions-toolbar py-2 mb-4">
                  <p class="text-sm text-muted mb-0">if you are an independent endoscopist....</p>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label">Number of years performing endoscopy</label>
                      <input name="yearsEndoscopy" class="form-control" type="text"
                        placeholder="Enter your years of endoscopic experience" value="<?php echo $users->getyearsEndoscopy();?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group focused">
                      <label class="form-control-label">Training programme?</label>
                      <select name="endoscopyTrainingProgramme" class="form-control" tabindex="-1" aria-hidden="true">
                        <option hidden selected disabled>Did you complete extra endoscopy training?</option>
                        <option value="0"  <?php if ($users->getendoscopyTrainingProgramme() == 0){echo "selected";}?>>No</option>
                        <option value="1" <?php if ($users->getendoscopyTrainingProgramme() == 1){echo "selected";}?>>Dedicated Endoscopy Training programme < 6 months</option>
                        <option value="2" <?php if ($users->getendoscopyTrainingProgramme() == 2){echo "selected";}?>>Dedicated Endoscopy Training programme > 6 months < 1 year</option>
                        <option value="3" <?php if ($users->getendoscopyTrainingProgramme() == 3){echo "selected";}?>>Dedicated Endoscopy Training programme > 1 year</option>


                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group focused">
                      <label class="form-control-label">Specialist interest</label>
                      <select name="specialistInterest" class="form-control" tabindex="-1" aria-hidden="true">
                        <option hidden selected disabled>Select one specialist interest</option>
                        <option value="1" <?php if ($users->getspecialistInterest() == 1){echo "selected";}?>>General Endoscopy</option>
                        <option value="2" <?php if ($users->getspecialistInterest() == 2){echo "selected";}?>>Endoscopic Resection</option>
                        <option value="3" <?php if ($users->getspecialistInterest() == 3){echo "selected";}?>>Endoscopic imaging</option>
                        <option value="4" <?php if ($users->getspecialistInterest() == 4){echo "selected";}?>>Colonoscopy training</option>
                        <option value="5" <?php if ($users->getspecialistInterest() == 5){echo "selected";}?>>Training theory</option>
                        <option value="6" <?php if ($users->getspecialistInterest() == 6){echo "selected";}?>>ERCP / EUS</option>

                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Description -->
              <div class="pt-5 mt-5 delimiter-top">
                <div class="actions-toolbar py-2 mb-4">
                  <h5 class="mb-1">About me</h5>
                  <p class="text-sm text-muted mb-0">Use this field to let others using the site get to know you better.
                  </p>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <div class="form-group">
                        <label class="form-control-label">Bio</label>
                        <textarea name="bio" class="form-control" placeholder="Tell us a few words about yourself that we can show to others on the site.  You can mention your interests, focus and experience in Endoscopy"
                          rows="3"><?php echo $users->getbio();?></textarea>
                        <small class="form-text text-muted mt-2"></small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Save changes buttons -->
              <div class="pt-5 mt-5 delimiter-top text-center">
                <button id="submit-userForm" type="button" class="btn btn-sm bg-gieqsGold text-dark">Save changes</button>
                <button type="button" class="btn btn-link text-muted">Cancel</button>
              </div>
              </form>
              </div>

          <!-- Devolve to external file for side nav -->
          <?php require BASE_URI . '/pages/learning/pages/account/sidenav.php';?>
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
  

  
      var signup = $('#signup').text();
    var edit = 1;
    var lesionUnderEdit = <?php echo $userid; ?>;



    function submituserForm() {

      //pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)

      console.log('got to the submit function');

      if (edit == 0) {

        var esdLesionObject = pushFormDataJSON($("#userForm"), "users", "user_id", null, "0"); //insert new object

        esdLesionObject.done(function (data) {

          console.log(data);

          if (data) {

            //alert ("New esdLesion no "+data+" created");
            $('#topTableSuccess').text("New <?php echo $databaseName;?> no " + data + " created");

            $('#modal-row-1').animate({
              scrollTop: 0
            }, 'slow');


            $("#topTableAlert").fadeTo(4000, 500).slideUp(500, function () {
              $("#topTableAlert").slideUp(500);
            });

            //edit = 1;

            //refresh table
            datatable.ajax.reload();

            //close modal
            $('#modal-row-1').modal('hide');





          } else {

            alert("No data inserted, try again");

          }


        });

      } else if (edit == 1) {


        if (lesionUnderEdit) {

          var esdLesionObject = pushFormDataJSON($("#userForm"), "users", "user_id", lesionUnderEdit, "1"); //insert new object

          esdLesionObject.done(function (data) {

            console.log(data);

            if (data) {

              if (data == 1 || data == 0) {

                Swal.fire({
                  title: 'Updated',
                  text: 'Your user profile was updated successfully',
                  type: 'success',
                  background: '#162e4d',
                  confirmButtonText: 'ok',
                  confirmButtonColor: 'rgb(238, 194, 120)',

                })






                //refresh table
                //datatable.ajax.reload();
                //edit = 1;


                //edit = 1;



              } else if (data == 2) {

                alert("Error, try again");

              }



            }


          })/* .then((result) => {

            const dataToSend = {

             
              profile: '2379',

              }

              const jsonString = JSON.stringify(dataToSend);
              console.log(jsonString);



              var request = $.ajax({
                  url: siteRoot + "pages/learning/scripts/useractions/upgradeUserStandard.php",
                  type: "POST",
                  contentType: "application/json",
                  data: jsonString,
              });



              request.done(function (data) {

                if (data == 'User profile updated'){

                  Swal.fire({
                    title: 'Congratulations',
                    text: 'Your user profile was upgraded to GIEQs Standard',
                    type: 'success',
                    background: '#162e4d',
                    confirmButtonText: 'ok',
                    confirmButtonColor: 'rgb(238, 194, 120)',

                  })
                }

              })



          }); */

        }


      }


    }

    $(document).ready(function () {

      $('#centreCountry').select2({

        dropdownParent: $("#userForm"),

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



        });

      $(document).on('click', '#submit-userForm', function () {

        event.preventDefault();

        $('#userForm').submit();

      })

      $("#userForm").validate({

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

          //EDIT







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

          bio: {
            

          },




          centreName: {
            required: true,

          },

          centreCity: {

            required: function (element) {
              return $("#centreName").val() != "";

            }
          },

          centreType: {

            required: function (element) {
              return $("#centreName").val() != "";

            }
          },

          endoscopistType: {

            required: function (element) {
              return $("#trainee").val() != "";

            }
          },

          yearsEndoscopy: {

            required: function (element) {
              return $("#trainee").val() != "";

            }
          },

          endoscopyTrainingProgramme: {

            required: function (element) {
              return $("#trainee").val() != "";

            }
          },

          specialistInterest: {

            required: function (element) {
              return $("#trainee").val() != "";

            },
            regex: '[0-9\-\(\)\s]+',
          },

















          contactPhone: {

            regex: '[0-9\-\(\)\s]+',

          },


















        },
        submitHandler: function (form) {

          //submitPreRegisterForm();

          submituserForm();

          //TODO submit changes
          //TODO reimport the array at the top
          //TODO redraw the table



        }




      });



    })
    </script>
</body>

</html>