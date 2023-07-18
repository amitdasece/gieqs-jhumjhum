

<?php require '../../includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      $openaccess = 0;
      $requiredUserLevel = 6;


      require BASE_URI . '/head.php';

      $general = new general;

      $navigator = new navigator;

      $formv1 = new formGenerator;

      $users = new users;


      require_once(BASE_URI . '/assets/scripts/classes/gpat_score.class.php'); 
      $gpat_score = new gpat_score();

      require_once(BASE_URI . '/assets/scripts/classes/gpat_glue.class.php'); 
      $gpat_glue = new gpat_glue();
      

   
      ?>

    <!--Page title-->
    <title>GPAT Help</title>

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">


    <style>
    .divider-icon::before {

        border-bottom: 1px solid #6e84a3 !important;
    }

    .divider-icon::after {

        border-bottom: 1px solid #6e84a3 !important;
    }

    .gieqsGold {

        color: rgb(238, 194, 120);


    }

    .text-container p {

        font-size: 1.3rem !important;
        padding-left: 1.5rem;
    }

    .text-container h2 {

        margin-top: 4rem;
        color: rgb(238, 194, 120);
       
    }

    .text-container h3 {

        display: list-item;          /* This has to be "list-item"                                               */
    list-style-type: disc;       /* See https://developer.mozilla.org/en-US/docs/Web/CSS/list-style-type     */
    list-style-position: inside; /* See https://developer.mozilla.org/en-US/docs/Web/CSS/list-style-position */

margin-top: 2rem;

padding-left: 1rem;
}

    .text-container p strong {

        color: rgb(238, 194, 120);
    }

    .card-placeholder {

        width: 344px;

    }

    .break {
        flex-basis: 100%;
        height: 0;
    }

    .flex-even {
        flex: 1;
    }

    .flex-nav {
        flex: 0 0 18%;
    }



    .gieqsGoldBackground {

        background-color: rgb(238, 194, 120);


    }

    .tagButton {

        cursor: pointer;

    }





    .cursor-pointer {

        cursor: pointer;

    }

    @media (max-width: 768px) {

        .flex-even {
            flex-basis: 100%;
        }
    }

    @media (max-width: 768px) {

        .card-header {
            height: 250px;
        }

        .card-placeholder {

            width: 204px;

        }


        /* #sticky {
position: absolute !important;
top: 0px;
}  */



    }

    @media (min-width: 1200px) {
        #chapterSelectorDiv {



            top: -3vh;


        }

        #playerContainer {

            margin-top: -20px;

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

        if (isset($userid)){
        $users->Load_from_key($userid);

        }else{

            die();
        }
				    
                        
                        
		
        ?>

    <!-- load all video data -->

    <div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>

    <!--- specifiy the tag Categories required for display  CHANGEME-->



    <!--CONSTRUCT TAG DISPLAY-->

    <!--GET TAG CATEGORY NAME 
                    
                    <?php

                    //define the page for referral info

                    //$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
                    $url =  "{$_SERVER['REQUEST_URI']}";

                    $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );

                    ?>
-->

    <div id="escaped_url" style="display:none;"><?php echo $escaped_url;?></div>

    <!--
                    
                TODO see other videos with similar tags, see videos with this tag, tag jump the video,
                list of chapters with associated tags [toggle view by category, chapter]
                
                -->


    <!-- Omnisearch -->

    <?php 
    //error_reporting(E_ALL);
    //include(BASE_URI . '/pages/learning/assets/gpatNav.php');

    
    $debug = false;
    $_SESSION['debug'] = false;

    ?>



    <div class="main-content bg-gradient-dark mt-10">

        <!--Header CHANGEME-->

        <div class="d-flex align-items-end container">
            <p class="h1 mt-5">GIEQs Online User Guide</p>


        </div>
        <div class="d-flex align-items-end container">
            <p class="text-muted pl-4 mt-2">User Reference for GIEQs Online</p>

        </div>









        <div class="container mt-3">



            <script>
            function round(value, precision) {
                var multiplier = Math.pow(10, precision || 0);
                return Math.round(value * multiplier) / multiplier;
            }








            $(document).ready(function() {







            })
            </script>


            </head>

            <body>



                <div class='content'>
                    <div class="row">



                        <div id="right" class="col-lg-3 col-xl-3 border-right">
                            <!--         	<div class="h-100 p-4"> -->
                            <div id="sticky" data-toggle="sticky" class="is_stuck pr-3 mr-3 pl-2 pt-2">
                                <div id="messageBox" class='text-left text-white pb-2 pl-2 pt-2'></div>
                                <div class="d-flex flex-nowrap text-small text-muted text-right px-3 mt-1 mb-3 ">







                                </div>


                                <div id="errorWrapper"
                                    class="error alert alert-warning alert-flush alert-dismissible collapse bg-gieqsGold"
                                    role="alert">
                                    <strong>Check the form!</strong> <span id="error"></span><button type="button"
                                        class="close" data-hide="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="successWrapper"
                                    class="success alert alert-success alert-flush alert-dismissible collapse"
                                    role="alert">
                                    <strong>Success!</strong> <span id="success"></span><button type="button"
                                        class="close" data-hide="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div id="warningWrapper"
                                    class="warning alert alert-warning alert-flush alert-dismissible collapse"
                                    role="alert">
                                    <strong>Warning!</strong> <span id="warning"></span><button type="button"
                                        class="close" data-hide="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <h6 class="mt-3 mb-3 pl-2 h5">Navigation</h6>

                                <ul class="section-nav">


                                   
                                </ul>










                            </div>

                        </div>

                        <div class="col-lg-9 text-container">


                            <?php
          
            
            ?>




                           


                            
<h1>Using the GIEQS online administration system</h1>
<h2>Users</h2>
<p><u>Where to</u><u> find?</u></p>
<p>Go to Programme and there you&rsquo;ll find &lsquo;Users (access)&rsquo;.</p>
<p><u>Content:</u></p>
<p>You can edit the users accounts for people who have signed up to the site (edit the users demographics and the access level).</p>
<p>You can create a new user and send him a password.</p>
<p>All of the other functions of the usermenu are legacy of GIEQS I, including the assets which they can sign up (for example all the programmes).</p>
<p>Access list</p>
<table>
<tbody>
<tr>
<td width="41">
<p>1</p>
</td>
<td width="510">
<p>Superuser: This should only be reserved for people managing the website.</p>
</td>
</tr>
<tr>
<td width="41">
<p>2</p>
</td>
<td width="510">
<p>Creator: They can create menus in the GIEQS online. They can bring in new videos, edit videos and edit options to show videos on the website.</p>
</td>
</tr>
<tr>
<td width="41">
<p>3</p>
</td>
<td width="510">
<p>Staff member: they can access the administration menu and can access full content</p>
</td>
</tr>
<tr>
<td width="41">
<p>4</p>
</td>
<td width="510">
<p>previous pro level</p>
</td>
</tr>
<tr>
<td width="41">
<p>5</p>
</td>
<td width="510">
<p>previous standard level</p>
</td>
</tr>
<tr>
<td width="41">
<p>6</p>
</td>
<td width="510">
<p>previous basic level</p>
</td>
</tr>
<tr>
<td width="41">
<p>7</p>
</td>
<td width="510">
<p>Basic user: the user cannot login</p>
</td>
</tr>
</tbody>
</table>
<p>Four, five and six are historical ways to access the website and can now be used indiscriminately.</p>
<p>All the users receive a six when they sign up and this is replaced by a subscription, which will cover later and give access to the site globally.</p>
<h2>Subscription</h2>
<p><u>Where to find?</u></p>
<p>You can find it all the way on the right. You have subscriptions and subscribable items</p>
<p><u>Subscriptions menu:</u></p>
<p>With this menu, you can edit users access tot he site. You can change whether people have global access. In GIEQS online we have now pro, standard and free. Free is automatically granted&nbsp; when they sign up. They need to do nothing for that to get it. For standard or pro access payment is required. The payment is by the Stripe payment platform which is automatically linked to the generation of payments. Three subsciptions can be generated and managing this is covered later in this document. You should not create subscriptions from this menu, because they will not be tracked and they will not be able to be linked to the user account easily.</p>
<p>This menu should really be reserved for modifying user subscriptions. So for example, you may receive mails from users which say my subscription is not working, I cannot access the site. So it depends on what they&rsquo;re saying that they cannot access. If it&rsquo;s a course, you need to have the ID number of the course, which can be found in the paid assets menu (=in the same menu that you find subscriptions on). Then you can search for the title and find the ID number. After that, you need to search for the user ID, in combination with the ID number of the asset or the users name in combination with the asset. So you can find which subscription is relevant.</p>
<p>Subscriptions are either active or inactive. That means that there&rsquo;s a one or a zero in the active column. If there&rsquo;s a zero in the active column, this will not be working for the user. If there&rsquo;s is a date beyond today&rsquo;s date and there&rsquo;s a one in the active column, then the subscription end date beyond today&rsquo;s date and a one in the active column, then the subscription should be active and should be able to access.</p>
<p><u>Possible problems with subscriptions:</u></p>
<p>If there is a problem with their ability to use the site, then this is very likely they&rsquo;re not using Google Chrome/Safari/Microsoft Edge (but Internet Explorer).</p>
<p>If the end date is before the date today, then they will not have access to that product and there&rsquo;s some problem with their payment. This needs manually reviewing by looking at Stripe and seeing how their payment system is.</p>
<p>The set up, whether they have paid or not have paid and however this will work, that will go into further later.</p>
<p>The next issue of their subsciption is not being active. That will also need sorting out by checking Stripe to see whether they do have an active subscription. So these are true for pro or standard subscription. This is not true of single one of payments because those two things that are described above are recurring payments, handled by Stripe. All of the other assets (including all of the courses, GIEQS I, GIEQS II, ..) is one of payments. And the one of payments is handled by Stripe, but it&rsquo;s for a determined period of time. That can be tree months or six months. It depends which is advertised on the website. So the likely thing is if the user is saying that they can&rsquo;t access it and they have gone beyond the time of the subscription. They need to buy it again and that needs to be communicated back to the user who is asking the question.</p>
<p>The end and start dates of the subscriptions can be edited, the active states (yes or no) can be edited.</p>
<p>Auto renew refers to whether the subscription be build at the end of the billing circle. This actually doesn&rsquo;t change anything in GIEQS online, is only changed in Stripe (and it&rsquo;s only applicable to those things which are subscriptions (not those things which are handled by single one of payments)</p>
<p>Paid assets (subscribable items):</p>
<p>This is used to add features to the site, including packs or videos, courses, other subscriptionables. This should only be modified by the superusers and should only be used as reference by other users when not creating new material for the site. We are also creating in this section hidden assets to make our textbooks of endoscopy, which can then be later accessed as reference or presentation or for courses.</p>
<h2>Course enrolments</h2>
<p><u>Where to find?</u></p>
<p>Go to subscriptions, Course enrolments</p>
<p><u>Course enrolments:</u></p>
<p>This menu will list everybody who is enrolled in the particular courses that we are running and you can use this for making lists to submit to quality assurance agencies (like RIZIV, EACCME).</p>
<h2>Edit token</h2>
<p><u>Where to find?</u></p>
<p>Go to Site Settings, drop down the menu and select Edit token</p>
<p><u>Edit token:</u></p>
<p>Tokens are part of the site which allow users to access content for free. You can also use it for access for institutions. If you&rsquo;re asked to add an institutional access, this is the place to go.</p>
<p>You can press plus to add a new token. You need to select the asset for which is relevant. This cannot be used to give access to subscriptions. This can only be used to give access to standard courses, video sets etc.</p>
<h2>Sponsors and partners</h2>
<p><u>Where to find?</u></p>
<p>Go to Site Settings, drop down the menu and select &lsquo;Edit Sponsors/Edit Partners.</p>
<p><u>Sponsors and partners</u></p>
<p>A partner is an academic organisation, a sponsor is a company. You can add here names and upload images for the partner or sponsor as well.</p>
<p>This is something which will increase in future when all our courses are sponsored and partnered with other organizations (like ESGE).</p>
<p>We can add a number of registrations for institutions. Some rules apply to the section. You can add a number per organisation, but each token represents an agreement with an external organisation to provide a certain number of licenses to the site. If that token is shared by members of that organisation, it will still work and therefor they need to know that and keep the distribution of that link (which is essentially a password to get free access to the course that we have created for them) safe. Don&rsquo;t&nbsp; allow the members to distribute their password.</p>
<p>There will be a certain number agreed with the organisation for a certain price. The pricing and the invoicing here can be performed on Stripe or done in accordance or discussion with Seauton.</p>
<p>The institutional licence is indefinite untill the number has been used up or we desable it.</p>
<p>You can add a number in the edit token screen and that number is then decreased every time somebody signs up, using one of those tokens . When the tokens run out, the link will stop working and the partner organisation, in the future, will receive a mail saying that the tokens are exhausted and that they need to contact us. So they can get more or do nothing if they think that&rsquo;s fine in the context of their agreement with us. Someone from Seauton and someone from the GIEQs foundation should receive an alert at this point.</p>

                            


                        </div>
                        <!--end col-9-->


                    </div>
                    <!--end row-->

                </div>
                <!--end content-->


        </div>
        <!--end content-->








    </div>
    <!--end overall-->




    <!-- Modal -->


    <?php require BASE_URI . '/footer.php';?>



    <!-- Purpose JS -->
    <script src=<?php echo BASE_URL . "/assets/js/purpose.js"?>></script>
    <!-- <script src=<?php echo BASE_URL . "/assets/js/generaljs.js"?>></script> -->
    <script>
    var videoPassed = $("#id").text();
    </script>

    <script src=<?php echo BASE_URL . "/pages/learning/includes/social.js"?>></script>
    <script src="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/js/canvasjs.min.js"></script>





    <script>
    //the number that are actually loaded

    var siteRoot = rootFolder;

    esdLesionPassed = $("#id").text();

    if (esdLesionPassed == "") {

        var edit = 0;

    } else {

        var edit = 1;

    }


    function generateTOC() {

        var statement = '';

        //get all h1s
        //get all h2s before the next h1 -> second line
        //get all h3s before the next h2 -> 3rd line

        var x=15;
        $('h2').each(function() {

            var id = null;
            
            $(this).attr('id', x);
            id = $(this).attr('id');
            text = $(this).text();
            statement +=
                '<li class="toc-entry toc-h4" style="font-size:1.1rem;"><a class="text-muted" href="#' + id +
                '">' + text + '</a></li>';
            x++;

        })

        $('.section-nav').html(statement);



    }

    function generateTOCold() {

var statement = '';

$('.toc-item').each(function() {

    var id = null;
    id = $(this).attr('id');
    text = $(this).attr('data-toc');
    statement +=
        '<li class="toc-entry toc-h4" style="font-size:1.1rem;"><a class="text-muted" href="#' + id +
        '">' + text + '</a></li>';

})

$('.section-nav').html(statement);



}



    function copyToClipboard(text) {
        if (window.clipboardData && window.clipboardData.setData) {
            // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
            return window.clipboardData.setData("Text", text);

        } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
            var textarea = document.createElement("textarea");
            textarea.textContent = text;
            textarea.style.position = "fixed"; // Prevent scrolling to bottom of page in Microsoft Edge.
            document.body.appendChild(textarea);
            textarea.select();
            try {
                return document.execCommand("copy"); // Security exception may be thrown by some browsers.
            } catch (ex) {
                console.warn("Copy to clipboard failed.", ex);
                return false;
            } finally {
                document.body.removeChild(textarea);
            }
        }
    }



    $(document).ready(function() {


       generateTOC();
        //refreshNavAndTags();

        waitForFinalEvent(function(){
            generateTOC();

			
	    }, 1000, "Resize header");

        if (edit == 1) {

            fillForm(esdLesionPassed);
        }

        $('#refreshNavigation').click(function() {


            firstTime = 1;
            //the number that are actually loaded
            loaded = 1;

            //the number the user wants
            loadedRequired = 1;

            $('.tag').each(function() {

                if ($(this).is(":checked")) {

                    $(this).prop('checked', false);
                }


            })

            refreshNavAndTags();

        })

        //on load check if any are checked, if so load the videos

        //if none are checked load 10 most recent videos for these categories



        $(window).scroll(function() {
            var scrollDistance = $(window).scrollTop();


            // Assign active class to nav links while scolling
            $('fieldset').each(function(i) {
                if ($(this).position().top <= scrollDistance) {
                    $('.section-nav a.text-gieqsGold').removeClass('text-gieqsGold').addClass(
                        'text-muted');
                    $('.section-nav a').eq(i).addClass('text-gieqsGold').removeClass(
                        'text-muted');
                }
            });
        }).scroll();












    })
    </script>
</body>

</html>