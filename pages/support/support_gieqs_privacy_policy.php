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
              <h2 class="mb-2">Privacy Policy for GIEQs digital and GIEQs online</h2>
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
                  Ghent International Endoscopy Quality Symposium
              </h2> 
<h3>
    PRIVACY POLICY
</h3>
<h5>
    PREAMBLE
</h5>
<p>
    These conditions relate to the processing of personal information by:
    
    The Ghent International Endoscopy Safety and Quality Foundation (GIEQs)<br/>
    Streepbosstraat 8<br/>
    9031 Drongen<br/>
    BELGIUM<br/>
    BE 0766.413.826<br/>
    www.gieqs.com<br/>
    admin@gieqs.com <br/>
</p>

<p>
    During your (online) contacts with GIEQs, GIEQS collects information from you. You are identifiable as a person based on this information. Therefore, this information is also referred to as "personal data". GIEQS is the party responsible for this processing.
</p>

<p>
    GIEQS respects your privacy and ensures that you can entrust your personal data to GIEQS. Privacy is important. For this reason, GIEQS wishes to inform you by means of these conditions about what is done with your collected personal data and about your rights concerning this. 
</p>

<p>
    GIEQS can use the information for new purposes that are not foreseen in this privacy policy. Before GIEQS uses your data for these new purposes, GIEQS shall inform you of the changes to the privacy policy and shall give you the opportunity to refuse your participation.
</p>

<p>
    <h5>
        1. Legal principles 
    </h5>
    Your information is processed on the basis of the following legal principles: 
    <ul>
        <li>
            	Your permission; 
        </li>
        <li>
            	The processing is necessary for the execution of an agreement to which you are a party or, at your request, to take measures to conclude an agreement;
        </li>
        <li>
            	The processing is necessary in order to comply with a legal obligation to which GIEQS is bound as the party responsible for processing; 
        </li>
        <li>
            	The processing is necessary in order to protect your vital interests or those of another natural person; 
        </li>
        <li>
            	The processing is necessary for the fulfilment of a task in the general interest or for the fulfilment of a task assigned to GIEQS as the party responsible for processing in the context of the execution of public authority.
        </li>
    </ul>
</p>

<p>
    <h5>
        2. Processing purposes 
    </h5>
    <h6>
        GIEQS processes your personal data solely for the following purposes: 
    </h6>
    	<ul>
            <li>
                To enable GIEQS to communicate with you;
            </li>
        <li>
            To enable you to learn about and use GIEQS’s services;
        </li>
        <li>
            To direct advertisements to you;
        </li>
        <li>
            For the performance of contracts.
        </li>
    </ul>
    
    <h6>
        GIEQS processes your personal data solely for the following purposes if you have stated your explicit agreement with this: 
    </h6>
    <ul>
        <LI>
            For advertising and/or marketing purposes;
        </LI>
        <LI>
            For sending newsletters.
        </LI>
        </ul>
</p>

<p>
    <h5>
        3. Personal data that is collected
    </h5>
    <p>
        GIEQS collects personal data that you share via the GIEQS website or via Aventri (registration system used by GIEQS), when registering for the newsletter, filling in the contact form, by telephone, e-mail, by filling in questionnaires on the GIEQS website or via other media.
        </p>
    <ul><li>
    We also use technical resources including cookies (see article 5 - "Use of cookies" concerning this).
    </li></ul>
    <p>
        GIEQS processes only that personal information that is necessary, relevant and sufficient for the substantiation of the processing purposes. Personal information is information that makes it possible to identify you as a user. This concerns primarily the following information: 
        </P>
    	<ul>
            <li>
                    Contact information such as name, address, e-mail address, company or employer, telephone number;
                </li>
            	<li>
                    A copy of the correspondence between you and GIEQS;
                </li>
            	<li>
                    Information about your visit and the resources that you use for this.
                </li>
        </ul>
</p>

<p>
    <h5>
        4. Patients participating in live endoscopy and videos
    </h5>
    <ul>
        <li>
            All patients participating in the live endoscopy and videos have given their explicit written consent to be filmed. All identifying shots are removed. If a user notices a video which clearly identifies a patient they should contact the administrator immediately so this video can be removed and re-edited.
        </li>
        <li>
            GIEQs does not accept any legal responsibility for how the information presented is used. The final decision about the management of any patient rests with the treated physician only and is entirely their responsibility.
        </li>
    </ul>
</p>
<p>
    <h5>
        5. Information to third parties
    </h5>
    <ul>
        <li>
            In principle, GIEQS does not share the data collected with third parties, nor does it transfer data. The situations below are exceptions to this. If GIEQS is required to give this information to third parties under these conditions, GIEQS shall ensure that these third parties comply with the legal obligations and guarantees concerning the processing of personal data. This constitutes a contractual commitment of effort on the part of GIEQS.
        </li>
    </ul>
    
</p>
<p>
    A.	OTHER RESPONSIBLE PROCESSORS
    <ul>
        <li>
            The GIEQS website and/or Aventri use integrations from Facebook Pixel and Google Analytics. You can find more information about this in article 5 - Use of cookies.
        </li>
    </ul>
    
</p>
<p>
    B.	FORWARDING ON GROUNDS OF A JUDICIAL ORDER OR APPLICABLE REGULATION
    GIEQS can be required to provide complete or partial insight into your personal data if: 
    	<ul>
            <li>
                    A legal obligation and/or order is issued by means of a judicial or administrative obligation;
                </li>
            	<li>
                    This turns out to be necessary for the execution of the agreement between you and GIEQS;
                </li>
            	<li>
                    GIEQS considers this necessary to indemnify its rights;
                </li>
            	<li>
                    You have provided specific and written permission beforehand.
                </li>
        </ul>
    
</p>
<p>
    <h5>
        5. Use of cookies
    </h5>
    Cookies are small files that a site or its provider transfers to the hard drive of your computer via your web browser (with your permission), so that the site's systems or those of the internet provider can collect and recall certain information. For example, GIEQS uses cookies that help it to know and to remember your preferences based on your previous and current activity on the website or on Aventri. In this manner, GIEQS can offer you better services and it provides GIEQS with better insight into the use of its website and platforms. GIEQS also uses cookies to collect aggregated information about the traffic on the site and about interaction with the site so that they can offer you a better website experience and better instruments in the future. In this manner, GIEQS can keep its website and platform up-to-date and respond to your interests and needs.
    More particularly, GIEQS collects the following data: 
    	<ul>
            <li>
                    Information including the complete clickstream to, via or from its website (including the date and time); services that you have viewed or for which you have searched; the response time for a given page, download errors, the duration of the visits to particular pages, information about the interaction with the page in question (such as scrolling, clicking and mouse movements), along with methods that are used to leave the page;
                </li>
            	<li>
                    Technical information including the Internet Protocol (IP) address that is used to connect your computer to the internet, your login information, browser type and version, the time zone configuration, browser plug-in types and versions, the operating system and platform.
                </li>
        </ul>
    
    GIEQS can conclude agreements with third-party service providers to gain better insight into the visitors to its website. These service providers are then the actual processors of the personal information. GIEQS makes use of Facebook Pixel and Google Analytics as processors, among others. These processors may not use the information that they collect for GIEQS except to help GIEQS, at its request, to initiate and improve its activities further.
</p>

<p>
    A.	FACEBOOK PIXEL
    By means of integrations on the GIEQS website, Facebook Pixel collects personal data that it then can use for its own processing activities. 
    GIEQS is not a party to the processing activities of Facebook Pixel. You are expected to inform yourself of Facebook Pixel's privacy policy for more information concerning the purpose of the processing. You can read Facebook Pixel's privacy policy using the following link: https://www.facebook.com/privacy/explanation. You can change your settings using this link: https://www.facebook.com/settings?tab=ads.
    
</p>
<p>
    B.	GOOGLE ANALYTICS
    GIEQS collects statistics with the assistance of Google Analytics. Google Analytics shall not store any personal data. It saves only anonymised data such as connection time, the device use, location,…
    Google may use the personal data collected for its own purposes, in which case it acts as the party responsible for processing. Google's privacy policy can be viewed here: http://www.google.com/privacypolicy.html.
    
</p>
<p>
    <h5>
        6. Security
    </h5>
    GIEQS makes all reasonable efforts to secure your personal data. 
    Should a breach concerning your personal data nonetheless occur despite these efforts, a breach that is likely to represent a considerable risk to the rights and freedoms of natural persons, then GIEQS shall inform you of this immediately, unless: 
    	<ul>
            <li>
                    GIEQS has taken appropriate technical and organisational protective measures and these measures have been applied to the personal data to which the breach relates;
                </li>
            	<li>
                    GIEQS takes measures after the fact to ensure that the substantial risk is unlikely to recur;
                </li>
            	<li>
                    Such a notification would require an unreasonable effort on the part of GIEQS, in which case a public notification or similar measures are sufficient.
                </li>
        </ul>
    
    As soon as GIEQS becomes aware of any such breach, it will provide you with at least the following information without unreasonable delay: 
    	<ul>
            <li>
                    The nature of the breach in connection with the personal data;
                </li>
            	<li>
                    The name and contact information of the officer for data protection or another contact point;
                </li>
            	<li>
                    The likely consequences of the breach;
                </li>
            	<li>
                    The measures – either proposed or taken – to address the breach and to limit any possible deleterious consequences.
                </li>
        </ul>
</p>

<p>
    <h5>
        7. Your rights
    </h5>
    GIEQS shall do everything possible to ensure that personal information is processed in accordance with legal requirements. The processing takes place with particular attention to the honest and justified way in which this is done, with an eye to well considered, expressly described and justified purposes. GIEQS shall ensure that the processing activities take place solely in a sufficient, relevant and non-excessive manner. 
    Moreover, you have various rights assigned to you by the privacy law.
    
    <p>
        A.	VIEWING RIGHT 
        You have the right to know whether GIEQS processes your personal data, along with the purposes for which it does so, how long your personal data is retained, which categories of personal data are processed and to which categories of recipients this personal information is provided. 
    </p>
    
    <p>
        B.	RIGHT TO RECTIFICATION 
        You can request the improvement of incorrect information and provide a supplement for incomplete personal information. 
    </p>
    
    <p>
        C.	RIGHT TO DELETION OF DATA
        You have the right to have personal data removed if: 
        	<ul>
                <li>
                        The personal data is no longer required for the substantiation of the processing purposes;
                    </li>
                	<li>
                        You rescind your permission and there are no other grounds for the processing;
                    </li>
                	<li>
                        You lodge an objection to the processing, direct marketing activities or automated decision-making;
                    </li>
                	<li>
                        The personal information is illegally processed;
                    </li>
                	<li>
                        The personal information must be erased in order to comply with a legal obligation on the part of GIEQS pursuant to European Union law or member state law;
                    </li>
                	<li>
                        The personal data is collected in connection with an offer from the information society.
                    </li>
            </ul>
        
        The request for removal can be refused on the basis of the exercise of the right to freedom of opinion and information, legal obligations, for reasons of general interest in the area of public health or in the context of scientific or historic research, or for the initiation, exercise or substantiation of legal proceedings. 
        
    </p>
    <p>
        D.	RIGHT TO LIMITATION OF THE PROCESSING 
        You have the right to request that GIEQS limit the processing if: 
        	<ul>
                <li>
                        You dispute the accuracy of the personal data during a time period in which GIEQS is able to check its accuracy;
                    </li>
                	<li>
                        The processing is illegal and you object to the erasure of the personal data and, instead of this, request a limitation of its use;
                    </li>
                	<li>
                        GIEQS no longer needs the data for the processing purposes, but you need the information for the initiation, exercise or substantiation of legal proceedings.
                    </li>
            </ul>
        
        If the processing is limited, GIEQS may use your personal data, with the exception of its storage, solely with your permission, for the initiation, exercise or substantiation of legal proceedings, for the protection of the rights of another natural person or legal entity, or for pressing reasons in the general interest for the European Union or for a member state. 
        If the limitation of the processing is to case, GIEQS will inform you of this beforehand. 
    </p>
    
    <p>
        E.	RIGHT OF TRANSFERABILITY 
        You have the right at all times to obtain the personal data applicable to you in a form that is structured, customary and readable by a machine. You can also request GIEQS to send this data directly to another party responsible for processing if this is technically possible. 
    </p>
    
    <p>
        F.	RIGHT OF OBJECTION 
        You can also lodge an objection to the processing of your personal data due to pressing and justified reasons related to your particular situation. You can lodge this objection against: 
        	<ul>
                <li>
                        The processing on the basis of fulfilment of a task in the general interest or of a task assigned to GIEQS in the context of the execution of public authority;
                    </li>
                	<li>
                        The processing in support of the justified interests of GIEQS or of a third party, unless GIEQS's justified grounds take precedence over your interest, rights and freedoms or if they relate to the initiation, exercise or substantiation of legal proceedings;
                    </li>
                	<li>
                        Every form of direct marketing, including profiling related to this.
                    </li>
            </ul>
    </p>
    
    <p>
        G.	RIGHT TO COMPLAIN
        You have the right to submit a complaint to the supervisory authority, more particularly, the authorised Belgian authority, if you believe you have noted a breach concerning the processing of your personal data.
    </p>
    
    <p>
        H.	EXERCISING YOUR RIGHT
        GIEQS takes all measures necessary to allow you to exercise your rights without cost. However, if a request is apparently unfounded or appears to be excessive (e.g. due to its repetitive character), then GIEQS retains the right to charge a reasonable compensation or to refuse the request. 
        In order to exercise your rights, you must send a dated and signed request to GIEQS at the address or e-mail address included in the preamble. With this request, you must include a proof of identity, preferably a copy of your ID card. 
        If your request complies with all of the conditions, then GIEQS is obliged to respond to this within 30 days after receiving it. This deadline can be extended by two months in accordance with the complexity of your request. 
        Should GIEQS decide not to honour your request, then GIEQS shall inform you of this within 30 days, with a statement of the reasons that have led to not honouring your request. 
        You can always submit a complaint to a supervisory authority or lodge an appeal with the courts if you do not agree with GIEQS's decision.
    </p>
</p>

<p>
    <h5>
        8. Retention period for personal data
    </h5>
    GIEQS retains your personal information until 5 years after the end of the agreement/the most recent contact, unless a longer retention period is either legally required or necessary.
</p>

<p>
    <h5>
        9. Permission
    </h5>
    By continuing to use the website, you will be considered to have accepted this privacy policy. This implies that you agree to GIEQS's using the data collected (see item 2) in the context of its processing purposes (see item 1). 
    You have the right to rescind your permission at all times for the processing that is based on this permission. This rescission is without prejudice to the legality of the processing based on the approval prior to the rescission. 
    You can exercise this right as described in item 5.H. of this privacy policy.  
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