

<?php require '../../includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      //$openaccess = 1;

      $requiredUserLevel = 6;
      $tokenaccess = 1;


      require BASE_URI . '/head.php';

      $general = new general;
      $users = new users;

      if ($users->matchRecord($userid)){

        $users->Load_from_key($userid);

        //get preferences

        $emailAccount = $users->getemailAccount();
        $emailServices = $users->getemailServices();
        $emailPartners = $users->getemailPartners();


      }
      

      ?>

    <!--Page title-->
    <title>GIEQs Online Endoscopy Trainer</title>


    <!-- Cookie Consent by https://www.TermsFeed.com -->
<script type="text/javascript" src="//www.termsfeed.com/public/cookie-consent/3.0.0/cookie-consent.js"></script>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function () {
cookieconsent.run({"notice_banner_type":"interstitial","consent_type":"express","palette":"dark","language":"en","website_name":"GIEQs.com","change_preferences_selector":"#changePreferences"});
});
</script>

<!-- End Cookie Consent -->


    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">

    

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
				        
                        
                        
		
        ?>
        
        <!-- load all video data -->

        <body>

<div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>
<div id="emailAccount" style="display:none;"><?php if ($emailAccount){echo $emailAccount;}?></div>
<div id="emailServices" style="display:none;"><?php if ($emailServices){echo $emailServices;}?></div>
<div id="emailPartners" style="display:none;"><?php if ($emailPartners){echo $emailPartners;}?></div>

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
            
            <div class="mt-2">
              <!-- Notification -->
              <div class="actions-toolbar py-2 mb-4">
                <h5 class="mb-1">GDPR compliant notifications</h5>
                <p class="text-sm text-muted mb-0">Modify how or whether we can contact you.</p>
              </div>
              <div class="card">
                <div class="list-group list-group-flush">
                  <div class="list-group-item d-flex w-100 justify-content-between">
                    <div>
                      <h6 class="mb-1">Email regarding my account</h6>
                      <span class="text-sm text-muted">You will receive an alert when changes are made to your account or updates are required.</span>
                    </div>
                    <div>
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="notification-account" disabled>
                        <label class="custom-control-label" for="notification-account"></label>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item d-flex w-100 justify-content-between">
                    <div>
                      <h6 class="mb-1">Email regarding other services from GIEQs.com</h6>
                      <span class="text-sm text-muted">You will receive infrequent emails regarding interesting features of GIEQs.com based on your profile.</span>
                    </div>
                    <div>
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="notification-services" disabled>
                        <label class="custom-control-label" for="notification-services"></label>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item d-flex w-100 justify-content-between">
                    <div>
                      <h6 class="mb-1">Marketing email from partners</h6>
                      <span class="text-sm text-muted">We will share your details with carefully selected marketing partners to provide offers of interest to you.</span>
                    </div>
                    <div>
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="notification-email" disabled>
                        <label class="custom-control-label" for="notification-email"></label>
                      </div>
                    </div>
                  </div>
               
                </div>
              </div>
            </div>
            <div class="mt-2">
              <!-- Notification -->
              <div class="actions-toolbar py-2 mb-4">
                <h5 class="mb-1">Manage Cookie Preferences</h5>
                <button id="changePreferences" type="button" class="btn btn-sm btn-primary mt-3">Manage</button>
              </div>
              
            </div>
          </div>
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
    var emailAccount = $("#emailAccount").text();
    var emailServices = $("#emailServices").text();
    var emailPartners = $("#emailPartners").text();

                    </script>

    <script>
        var signup = $('#signup').text();

        function submitPreRegisterForm() {

            var esdLesionObject = pushDataFromFormAJAX("pre-register", "preRegister", "id", null,
            "0"); //insert new object

            esdLesionObject.done(function (data) {

                console.log(data);

                var dataTrim = data.trim();

                console.log(dataTrim);

                if (dataTrim) {

                    try {

                        dataTrim = parseInt(dataTrim);

                        if (dataTrim > 0) {

                            alert("Thank you for your details.  We will keep you updated on everything GIEQs.");
                            $("[data-dismiss=modal]").trigger({
                                type: "click"
                            });

                        }

                    } catch (error) {

                        //data not entered
                        console.log('error parsing integer');
                        $("[data-dismiss=modal]").trigger({
                            type: "click"
                        });


                    }

                    //$('#success').text("New esdLesion no "+data+" created");
                    //$('#successWrapper').show();
                    /* $("#successWrapper").fadeTo(4000, 500).slideUp(500, function() {
                      $("#successWrapper").slideUp(500);
                    });
                    edit = 1;
                    $("#id").text(data);
                    esdLesionPassed = data;
                    fillForm(data); */




                } else {

                    alert("No data inserted, try again");

                }


            });
        }

        function setStartSliders(){

          if (emailAccount){

            if (emailAccount == '1'){

              //check emailAccount
              $('#notification-account').prop("checked", true);
              


            }
          }

          if (emailServices){

            if (emailServices == '1'){

              $('#notification-services').prop("checked", true);
              

            }


          }

          if (emailPartners){

            if (emailPartners == '1'){

              $('#notification-email').prop("checked", true);
              

            }


          }
              
          $('#notification-account').prop("disabled", false);
          $('#notification-services').prop("disabled", false);
          $('#notification-email').prop("disabled", false);

        }

        $(document).ready(function () {

            
          setStartSliders();

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

  //new behaviours

  $('#notification-account').change(function(){

    var slider = $(this);
    $(slider).prop("disabled", true);
//ajax to a script to update

      if($(this).is(':checked')){
          var notification = '1';  // checked
      }else{
          var notification = '0';  // unchecked

      }

      var dataToSend = {

          notification: notification,
          type: 1,
          

      }

      //const jsonString2 = JSON.stringify(dataToSend);

      const jsonString = JSON.stringify(dataToSend);
      console.log(jsonString);
      //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

      var request2 = $.ajax({
      beforeSend: function () {

          $('#notification-account').removeClass('is-valid');

      },
      url: siteRoot + "/pages/learning/scripts/account/updateNotify.php",
      type: "POST",
      contentType: "application/json",
      data: jsonString,
      });



      request2.done(function (data) {
      // alert( "success" );
      if (data == '1'){
          //show green tick

          
        $('#notification-account').delay('1000').addClass('is-valid');
          
              
              

      }

      $(slider).prop("disabled", false);
      //$(document).find('.Thursday').hide();
      })


  })

  $('#notification-services').change(function(){
    var slider = $(this);
    $(slider).prop("disabled", true);

//ajax to a script to update

      if($(this).is(':checked')){
          var notification = '1';  // checked
      }else{
          var notification = '0';  // unchecked

      }

      var dataToSend = {

          notification: notification,
          type: 2,
          

      }

      //const jsonString2 = JSON.stringify(dataToSend);

      const jsonString = JSON.stringify(dataToSend);
      console.log(jsonString);
      //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

      var request2 = $.ajax({
      beforeSend: function () {

          $('#notification-services').removeClass('is-valid');

      },
      url: siteRoot + "/pages/learning/scripts/account/updateNotify.php",
      type: "POST",
      contentType: "application/json",
      data: jsonString,
      });



      request2.done(function (data) {
      // alert( "success" );
      if (data == '1'){
          //show green tick

          
        $('#notification-services').delay('1000').addClass('is-valid');
          
              
              

      }
      //$(document).find('.Thursday').hide();
      $(slider).prop("disabled", false);
      })


  })

  $('#notification-email').change(function(){

    var slider = $(this);
    $(slider).prop("disabled", true);

//ajax to a script to update

      if($(this).is(':checked')){
          var notification = '1';  // checked
      }else{
          var notification = '0';  // unchecked

      }

      var dataToSend = {

          notification: notification,
          type: 3,
          

      }

      //const jsonString2 = JSON.stringify(dataToSend);

      const jsonString = JSON.stringify(dataToSend);
      console.log(jsonString);
      //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

      var request2 = $.ajax({
      beforeSend: function () {

          $('#notification-email').removeClass('is-valid');

      },
      url: siteRoot + "/pages/learning/scripts/account/updateNotify.php",
      type: "POST",
      contentType: "application/json",
      data: jsonString,
      });



      request2.done(function (data) {
      // alert( "success" );
      if (data == '1'){
          //show green tick

          
        $('#notification-email').delay('1000').addClass('is-valid');
          
              
              

      }
      //$(document).find('.Thursday').hide();
      $(slider).prop("disabled", false);
      })


  })
  


        })
    </script>
</body>

</html>