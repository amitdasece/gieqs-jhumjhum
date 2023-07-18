<?php
header('Access-Control-Allow-Origin: *');
require '../../assets/includes/config.inc.php';

require (BASE_URI . '/assets/scripts/login_functions.php');

$openaccess = 1;
     
     //place to redirect the user if not allowed access
     $location = BASE_URL . '/pages/authentication/login.php';
 
     if (!($dbc)){
     require(DB);
     }
    
     
     require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

     $registrationURL = BASE_URL . '/pages/program/registration.php';

//define user access level






require_once BASE_URI . '/assets/scripts/classes/assetManager.class.php';
$assetManager = new assetManager;

$courseTest = false;

$gieqs_ii_day = $assetManager->whichDay($courseTest,true);

$gieqs_ii_is_live = $assetManager->gieqsIILive($gieqs_ii_day);

$gieqs_ii_plenary_link = $assetManager->requiredAssetGIEQsII($gieqs_ii_day,false);

$target = false;

$debug = false;



//from redirect_login pass here the parameter

//then use it to see where the user wants to go

//$url = $_SERVER['REQUEST_URI'];
$url = $_SERVER['HTTP_REFERER'];
$url_components = parse_url($url);
//print_r($url_components);
$url_to_attach = $url_components['path'];
if (empty($url_components)){

  //url component set
  $url_path_set = false;


}else{

  //url component set
  $url_path_set = true;

}

if ($debug){

  print_r($_SERVER);
  print_r($url);

  print_r($url_components);
  var_dump($url_path_set);
  print_r($url_to_attach);



}




//if $userid is logged in
//echo 'ssssss'.$_GET['destination'];
if (isset($_GET['destination'])) {

  $destination = $_GET['destination'];

  if ($destination == 'subscriptions'){

    $target = 'pages/learning/pages/account/billing.php';

  }else if ($destination == 'catchup'){

    $target = 'pages/program/program-printable-catchup-public.php';

  }else if ($destination == 'gpat'){

    $target = 'pages/learning/pages/scores/dashboard-gpat.php';

  }else if ($destination == 'gpat_form'){

    $target = 'pages/learning/pages/scores/technique.php';

  }else if ($destination == 'catchupstaff'){

    $target = 'pages/program/program-printable-catchup.php';


  }else if ($destination == 'signup'){

    //check which page to go to... (that means use the db)

    if (isset($_GET['assetid'])){

      $assetid = $_GET['assetid'];

    }

    if (isset($_GET['access_token'])){

      $access_token = $_GET['access_token'];
      $target = '/pro-content/' . $assetid . '&action=register&access_token=' . $access_token;

    }else{

      $target = '/pro-content/' . $assetid . '&action=register';

    }

    


  }else if ($destination == 'small_polyp_signup'){

    if (isset($_GET['access_token'])){

      $access_token = $_GET['access_token'];
      $target = '/pages/program/program_small_polypectomy.php?action=register&access_token=' . $access_token;

    }else{

      $target = '/pages/program/program_small_polypectomy.php?action=register';

    }

    


  }else if ($destination == 'gieqs_ii'){

    if (isset($_GET['access_token'])){

      $access_token = $_GET['access_token'];
      $target = '/pages/program/gieqs_ii.php?action=register&access_token=' . $access_token;

    }else{

      $target = '/pages/program/gieqs_ii.php?action=register';

    }

    


  }else if ($destination == 'gieqsonline'){

    $target = '/pages/learning/index.php';


  }else if ($destination == 'subscriptionoptions'){

    $target = '/pages/learning/upgrade.php#options-table';


  } else if ($destination == 'tagvideo'){

    //define other constant

    if (isset($_GET['videoid']) & is_numeric($_GET['videoid'])){

      $videoid = $_GET['videoid'];
      $target = 'pages/learning/scripts/forms/videoChapterForm.php?id=' . $videoid;

    }else{

      $destination = null;

    }

  }else if ($destination == 'viewvideo'){

    //define other constant

    if ((isset($_GET['videoid']) & is_numeric($_GET['videoid'])) && (isset($_GET['chapternumber']) & is_numeric($_GET['chapternumber']))){

      $videoid = $_GET['videoid'];
      $chapternumber = $_GET['chapternumber'];

      $target = 'videos/' . $videoid . '&chapternumber=' . $chapternumber;


    }elseif(isset($_GET['videoid']) & is_numeric($_GET['videoid'])){

      $videoid = $_GET['videoid'];
      $target = 'videos/' . $videoid;

    }else{

      $destination = null;

    }

  }else if ($destination == 'subscribe'){

    //define other constant

    
      $target = 'pages/learning/index.php?id=2345';

    

  }else if ($destination == 'viewasset'){

    //define other constant

    if (isset($_GET['assetid']) & is_numeric($_GET['assetid'])){

      $assetid = $_GET['assetid'];
      //$target = 'videos/' . $videoid;

      $target = 'view-pro-content/'.$assetid;


    }else{

      $destination = null;

    }

  }else if ($destination == 'gieqs2'){

    //define other constant

    if (($gieqs_ii_is_live)){


      
      $target = '/view-pro-content/'. $gieqs_ii_plenary_link;
      
    }else{

      $destination = null;

    }

  }else {

    $target = urldecode($destination);

    // echo $target;

    // exit();

    


        if ($local){

          //splice local start off

          $string_to_remove = '/gieqs/';
          $target = str_replace($string_to_remove ,'',$target);

        }else{

          //splice other start off
          //$string_to_remove = 'https://www.gieqs.com/';
          $string_to_remove = '/gieqs/';         
          $target = str_replace($string_to_remove ,'',$target);


        }

    




  }


}

//var_dump($local);
//var_dump($target);

//exit();

if (isset($userid) && ($target != false)){

//just go to location

redirect_user(BASE_URL . '/' . $target);

}

?>
    <title>Ghent International Endoscopy Symposium - Login </title>
  
    <meta name=”robots” content=”noindex”>

<!--iphone fix -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">


 <!-- Favicon -->
 <link rel="icon" href="<?php echo BASE_URL;?>/assets/img/brand/favicongieqs.png" type="image/png">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/@fortawesome/fontawesome-free/css/all.min.css"><!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/swiper/dist/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <!--Extra CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/select2/dist/css/select2.min.css">

    <!-- <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/select2/dist/css/select2bootstrap.min.css">
     -->
    <!-- Purpose CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/purpose.css" id="stylesheet">
   
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/gieqs.css">

<!-- Global JS -->

<script src="<?php echo BASE_URL;?>/assets/js/purpose.core.js"></script>
<script src="<?php echo BASE_URL;?>/assets/libs/select2/dist/js/select2.min.js"></script>
<!-- <script src="<?php //echo BASE_URL;?>/assets/js/purpose.js"></script>
 --><script src="<?php echo BASE_URL;?>/assets/js/generaljs.js"></script>
<script src="<?php echo BASE_URL;?>/node_modules/jquery-validation/dist/jquery.validate.js"></script>


    <style>

      /* Change the white to any color ;) */
input:-webkit-autofill,
input:-webkit-autofill:hover, 
input:-webkit-autofill:focus, 
input:-webkit-autofill:active  {
    -webkit-box-shadow: 0 0 0 30px blue inset !important;
}

        .text-gieqsGold {

color: rgb(238, 194, 120);

               }
               .pointer {

cursor: pointer;

}
               .bg-gieqsGold {

background-color: rgb(238, 194, 120);

}
      .modal-backdrop
      {
          opacity:0.75 !important;
      }
      @media screen and (max-width: 400px) {
        
        input {

          padding-left: 10px !important;

        }
        .scroll{

          font-size: 1em;

          }

          .h5{

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

    </header>
    <!-- Omnisearch -->
    <div id="omnisearch" class="omnisearch">
        <div class="container">
            <!-- Search form -->
            <form class="omnisearch-form">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-flush">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Type and hit enter ...">
                    </div>
                </div>
            </form>
            <div class="omnisearch-suggestions">
                <h6 class="heading">Search Suggestions</h6>
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>macbook pro</span> in Laptops
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>iphone 8</span> in Smartphones
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>macbook pro</span> in Laptops
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>beats pro solo 3</span> in Headphones
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    <span>smasung galaxy 10</span> in Phones
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">

       
  <div class="main-content">
    <section class="slice slice-lg min-vh-100 d-flex align-items-center bg-gradient-dark">
      <!-- SVG background -->
      <div class="bg-absolute-cover bg-size--contain d-none d-lg-block">
        <figure class="w-100">
          <img alt="Image placeholder" src="../../assets/img/svg/backgrounds/bg-3.svg" class="svg-inject">
        </figure>
      </div>
      <div class="container py-5 px-md-0 d-flex align-items-center">
        <div class="w-100">
          <div class="row row-grid justify-content-center justify-content-lg-between align-items-center">
            <div class="col-sm-8 col-lg-6 col-xl-5 order-lg-2">
              <div class="card shadow zindex-100 mb-0">
                <div class="card-body px-md-5 py-5">
                  <div class="mb-5">
                    <h6 class="h3">Login</h6>
                    <p class="text-muted mb-0">Sign in to your account to continue.</p>
                    <p class="text-danger mb-0 position-absolute"><span id="loginError"></span></p>
                  </div>
                  <span class="clearfix"></span>
                  <form id="login" role="form">
                    <div class="form-group">
                      <label class="form-control-label">Email address</label>
                      <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="email" name="username" class="form-control" id="input-email" placeholder="name@example.com">
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <div class="d-flex align-items-center justify-content-between">
                        <div>
                          <label class="form-control-label">Password</label>
                        </div>
                        <div class="mb-2">
                          <a href="<?php echo BASE_URL . '/pages/authentication/recover.php';?>" class="small text-muted text-underline--dashed border-primary" tabindex="-1">Lost password?</a>
                        </div>
                      </div>
                      <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" name="password" id="input-password" placeholder="Password">
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="fas fa-eye"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="mt-4"><button id="loginButton" type="button" class="btn btn-sm btn-primary btn-icon rounded-pill">
                        <span class="btn-inner--text">Sign in</span>
                        <span class="btn-inner--icon"><i class="fas fa-long-arrow-alt-right"></i></span>
                      </button></div>
                  </form>
                </div>
                <div class="card-footer px-md-5"><small>Don't yet have an account?
             <?php if (!($userid)){echo 'You can <a href="' . BASE_URL . '/pages/program/online.php?id=2456" class="small font-weight-bold">create an account here</a>';}?></small></div>
              
            </div>
            </div>
            <div class="col-lg-5 order-lg-1 d-none d-lg-block" style="z-index:1000;">
              <blockquote>
                <h3 class="h2 mb-4">GIEQs Online is a modern Endoscopy Education Platform.  It's free to join with stacks of free content.</h3>
                <div class="mt-4"><a id="signupbutton" type="button" class="btn btn-sm btn-primary btn-icon cursor-pointer rounded-pill" href="<?php echo BASE_URL . '/pages/program/online.php?id=2456';?>">
                        <span class="btn-inner--text">Sign Up Now!</span>
                        <span class="btn-inner--icon"><i class="fas fa-long-arrow-alt-right"></i></span>
                      </a></div>
                <footer></footer>
              </blockquote>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- Modal Help-->
  <div class="modal fade" id="accreditation" tabindex="-1" role="dialog" aria-labelledby="accreditationLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dark" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="accreditationLabel" style="color: rgb(238, 194, 120);">Duplicate Logins</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="text-white" aria-hidden="false">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div id="videoDisplay mb-3" class="">

            

            <p class="h5 mt-2">We want you to enjoy your personal GIEQs account<br /> <br /></p>
            <p class="text-white">We have disabled duplicate logins with the same username to prevent people sharing user accounts.
              <br /><br />If you receive this message your account was accessed somewhere on a different device within the last 15 minutes.  This could have been you on a different device.  Or another browser on the same computer.  <span class="text-gieqsGold">To use GIEQs here simply logout of that other browsing session and the login will work immediately here.</span>  </p>
              <p class="text-white">If you already closed the other browsing window without logging out, you can still open www.gieqs.com on the same device and logout from there.  The login will immediately work again after this action.</p>
              <p class="text-white">If you persistently receive this message please accept our apologies.  Computers sometimes make mistakes.  Please contact us to reset your account.  During GIEQs live events a response will be offered within a few minutes.  At other times you should try to login again after 15 minutes or we will respond when able.</p>
  

          </div>
          <div class="modal-footer">
            <button type="button" class="btn-small btn-secondary" data-dismiss="modal">Close</button>

          </div>
        </div>
      </div>
    </div>
  <?php require BASE_URI . '/footer.php';?>

<!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
<!-- <script src="../../assets/js/purpose.core.js"></script>
 --><!-- Page JS -->
<script src="../../assets/libs/swiper/dist/js/swiper.min.js"></script>
<script src="../../assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
<script src="../../assets/libs/typed.js/lib/typed.min.js"></script>
<script src="../../assets/libs/isotope-layout/dist/isotope.pkgd.min.js"></script>
<script src="../../assets/libs/jquery-countdown/dist/jquery.countdown.min.js"></script>
<!-- Google maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBuyKngB9VC3zgY_uEB-DKL9BKYMekbeY"></script>
<!-- Purpose JS -->
<script src="../../assets/js/purpose.js"></script>
<!-- Demo JS - remove it when starting your project -->
<script src="../../assets/js/demo.js"></script>

<script>

<?php if (isset($target)){?>

  var target = "<?php echo $target;?>";


<?php }else{?>

  var target = false;


<?php 
} ?>;



function login(){
	
	//validate both boxes filled
	//check the login against the databse as per the elearn script
  //reload the page for logged in
  
  //	        data: $('#login').serialize()+ "&destination=<\?php echo destination;?>",

	
	request = $.ajax({
	        url: siteRoot + "assets/scripts/login.php",
          crossDomain: true,
          headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
    },
	        type: "POST",
	        data: $('#login').serialize(),

		   });

	request.done(function(data){
			   
         
         if (data == 3){

          $('#loginError').show().html('Please use the link sent by email to verify your email prior to login');
				   setTimeout(
				   function() 
				   {  $('#loginError').hide();  }, 8000);

         }else if (data == 1){
          // alert(target);
          // alert(siteRoot);
					   
				  $('#loginError').addClass('text-success').show().text('Successful Login');
          
				   setTimeout(
				   function() 
				   { 
             
            if (target){  
              window.location.href = siteRoot + target;  
            }else{
              window.location.href = siteRoot + "pages/learning/index.php";  

            }
          
          
          
          }, 1000);

				   
			   }else if (data == 4){
					
					   
				  $('#loginError').show().html('<p class="my-2">Duplicate Login Attempt detected.  <a class="pointer" data-toggle="modal" data-target="#accreditation">More...</a>');
				   setTimeout(
				   function() 
				   {  $('#loginError').hide();  }, 6000);
			   

				   
			   }else {
				   
				   $('#loginError').show().html('Unsuccessful Login, try again');
				   setTimeout(
				   function() 
				   {  $('#loginError').hide();  }, 2000);
			   }
			   
			   //alert(data);
			   
		   });
	
	
}

$(document).ready(function(){


  $( "#input-password" ).on( "keydown", function(event) {
      if(event.which == 13) {
         login();
      }
    });
  

    //detect enter keypress

    $('#loginButton').click(function(){

    login();

    })



})


</script>
</body>

</html>