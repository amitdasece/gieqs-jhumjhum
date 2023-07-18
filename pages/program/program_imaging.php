<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>

<head>
<meta name=”robots” content=”noindex”>

    <?php

//define user access level



$openaccess = 1;

require BASE_URI . '/headNoPurposeCore.php';

require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;


if (isset($_GET["action"])){
  $action = $_GET["action"];

}else{

  $action = null;

}

if (isset($_GET["access_token"])){
    $access_token = $_GET["access_token"];
  
  }else{
  
    $access_token = null;
  
  }



$general = new general;


?>
    <title>GIEQs - Imaging of Colorectal Polyps Evening Symposium</title>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.css">
    <script src="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>

    <style>
    .text-gieqsGold {

        color: rgb(238, 194, 120);

    }

    .bg-gieqsGold {

        background-color: rgb(238, 194, 120);

    }

    .modal-backdrop {
        opacity: 0.75 !important;
    }

    .modal {
        overflow: auto !important;
    }

    @media screen and (max-width: 400px) {


        .scroll {

            font-size: 1em;

        }

        .h5 {

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

        <div id="action" style="display:none;"><?php if ($action){echo $action;}?></div>
        <div id="access_token" style="display:none;"><?php if ($access_token){echo $access_token;}?></div>


    </header>


    <div class="main-content">

        <!-- Header (v1) -->
        <section class="header-1 bg-gradient-dark" data-offset-top="#header-main">


        </section>

        <!-- PROGRAM TABLE -->

        <section class="bg-gradient-dark pt-6 mb-0">
            <div class="container">
                <div class="row text-center">

                    <div class="col-12 p-3 pb-1">
                        <span class="h1" style="color: rgb(238, 194, 120);">Imaging of Colorectal Polyps
                            (Virtual)<br /></span>
                        <span class="h3 mt-4" style="color: rgb(238, 194, 120);">Thursday 18th March 2021<br /></span>
                        <span class="h5" style="color: rgb(238, 194, 120);">1930 - 2120 CET, on Demand
                            thereafter<br /></span>
                        <a href="#targetScrollProgramme" id="wednesdayTop"
                            class="btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 scroll-me">
                            <span class="btn-inner--text text-dark">View Programme</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>

                        <?php 
                        
                        $asset_id_pagewrite = '14';

                        if ($userid){

                            

                            if ($assetManager->doesUserHaveSameAssetAlready($asset_id_pagewrite, $userid, false)){
                                //user owns This
                                ?>

                                <a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                                    class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                                    <span class="btn-inner--text text-dark">View My Course!</span>
                                    <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                                </a>


                             
                        
                        
                   

                        

                        <?php }else{ ?>

                            <a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                                class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                                <span class="btn-inner--text text-dark">Register Now!</span>
                                <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                            </a>

                        <?php
                      
                        }//close if owns this

                    }else{//close if user id
                        
                        ?>

<a data-assetid="<?php echo $asset_id_pagewrite; ?>"
                                class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mt-6 ml-3">
                                <span class="btn-inner--text text-dark">Register Now!</span>
                                <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                            </a>



<?php }?>
                    </div>

                </div>
            </div>

        </section>

        <section class="">
        <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%"
                    id="bodyTable"
                    style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;height:100%;margin:0;padding:0;width:100%;">
                    <tr>
                        <td align="center" valign="top" id="bodyCell"
                            style="mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;height:100%;margin:0;padding:0;width:100%;">

                            <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;">
                                <tr>
                                    <td align="center" valign="top" id="templateHeader" data-template-container=""
                                        style="background:#162e4d none no-repeat center/cover;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;background-color:#162e4d;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:0;border-bottom:0;padding-top:24px;padding-bottom:24px;">



                                        <!--GIEQS HEADER-->
                                       
                                        <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" id="templateBody" data-template-container=""
                                        style="background:#FFFFFF none no-repeat center/cover;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;background-color:#FFFFFF;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:0;border-bottom:0;padding-top:36px;padding-bottom:54px;">
                                        <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
                                    <tr>
                                    <td align="center" valign="top" width="600" style="width:600px;">
                                    <![endif]-->

                                        <!--GIEQS TEXT-->
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                            class="templateContainer"
                                            style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;max-width:600px !important;">
                                            <tr>
                                                <td valign="top" class="bodyContainer"
                                                    style="background:transparent none no-repeat center/cover;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;background-color:transparent;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:0;border-bottom:0;padding-top:0;padding-bottom:0;">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                                        class="mcnTextBlock"
                                                        style="min-width:100%;border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;">
                                                        <tbody class="mcnTextBlockOuter">
                                                            <tr>
                                                                <td valign="top" class="mcnTextBlockInner"
                                                                    style="padding-top:9px;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;">
                                                                    <!--[if mso]>
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
<tr>
<![endif]-->

                                                                    <!--[if mso]>
<td valign="top" width="599" style="width:599px;">
<![endif]-->

                                                                    <table align="left" border="0" cellpadding="0"
                                                                        cellspacing="0"
                                                                        style="max-width:100%;min-width:100%;border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;"
                                                                        width="100%" class="mcnTextContentContainer">
                                                                        <tbody>
                                                                            <tr>

                                                                                <td valign="top" class="mcnTextContent"
                                                                                    style="padding-top:0;padding-right:18px;padding-bottom:30px;padding-left:18px;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;word-break:break-word;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left;">

                                                                                    <h4 class="text-center"
                                                                                        style="display:block;margin:0;padding: 0;color:#949494;font-family:Georgia;font-size:20px;font-style:italic;font-weight:normal;line-height:125%;letter-spacing:normal;text-align:center;">
                                                                                        We can do everyday endoscopy
                                                                                        better.
                                                                                    </h4>


                                                                                    <!-- get array emailContent
                                            
                                            -->

                                                                                    
                                                                                    <h3
                                                                                        style="display:block;margin:0;padding-top:30px;color:#222222;font-family:Helvetica;font-size:40px;font-style:normal;font-weight:bold;line-height:150%;letter-spacing:normal;text-align:center;">
                                                                                        Endoscopic Imaging of Colon Polyps                                                                                    </h3>

                                                                                    





                                                                                    
                                                                                    <p
                                                                                       >
                                                                                        <h4 class="text-center text-dark"><b>Thursday</b> 18th March, 1930-2120 CET <br/>Online at www.gieqs.com </h4></p>

<p style="text-align:center;"> <b>€10</b> (or FREE if you <a href="mailto:admin@gieqs.com?subject=Why%20i%20shouldn't%20pay%20for%20your%20online%20polypectomy%20course">tell us why</a> you shouldn't pay)*</p>                                                                                    </p>

                                                                                    





                                                                                    
                                                                                    <p
                                                                                        style="margin:10px 0;padding:0;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left;">
                                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock" style="min-width:100%;border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;">
    <tbody class="mcnButtonBlockOuter">
        <tr>
            <td style="padding-top:25px;padding-right:18px;padding-bottom:18px;padding-left:18px;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" valign="top" align="center" class="mcnButtonBlockInner">
                <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer" style="border-collapse:separate !important;border-radius:3px;background-color:#1b385d;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust: 100%;">
                    <tbody>
                        <tr>
                            <td align="center" valign="middle" class="mcnButtonContent" style="font-family:Helvetica;font-size:18px;padding:18px;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;">
                                <a data-assetid="14"
                                class="register-now" title="Register Now" style="font-weight:bold;letter-spacing:-0.5px;line-height:100%;text-align:center;text-decoration:none;color:#e3ebf6;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;display:block;">Register Now!
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>                                                                                    </p>

                                                                                    





                                                                                    
    <table border="0" cellpadding="0" cellspacing="0"
                                                                        width="100%" class="mcnImageGroupBlock"
                                                                        style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;">
                                                                        <tbody class="mcnImageGroupBlockOuter">

                                                                            <tr>
                                                                                <td valign="top"
                                                                                    style="padding:9px;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;"
                                                                                    class="mcnImageGroupBlockInner">

                                                                                    <table align="left"
                                                                                        width="563.9999389648438"
                                                                                        border="0" cellpadding="0"
                                                                                        cellspacing="0"
                                                                                        class="mcnImageGroupContentContainer"
                                                                                        style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="mcnImageGroupContent"
                                                                                                    valign="top"
                                                                                                    style="padding-left:9px;padding-top:0;padding-bottom:0px;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;text-align:center;">

                                                                                                    <center>
                                                                                                        <a data-assetid="14"
                                                                                                        class="register-now"
                                                                                                            target="_blank"><img
                                                                                                                alt=""
                                                                                                                src="https://www.gieqs.com/assets/img/polyps/transverse_invasive.png"
                                                                                                                width="300"
                                                                                                                style="max-width:300px;padding-bottom:0;border:0;height:auto;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;vertical-align:bottom;text-align:center;"
                                                                                                                ></a>
                                                                                                    </center>

                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>

                                                                                </td>
                                                                            </tr>



                                                                        </tbody>
                                                                    </table>
                                                                   







                                                                                    
                                                                                    

                                                                                    





                                                                                    
                                                                                    <p
                                                                                        style="margin:10px 0;padding:0;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left;">
                                                                                        Ever unsure of how to approach a large polyp in the colon that you encountered on a routine colonoscopy list? Not 100% confident on the difference between Kudo III, or IV, or Vn, or Paris 0-IIa versus 0-IIa/Is? Wish you had some structured way to approach this common clinical problem?                                                                                    </p>

                                                                                    





                                                                                    
                                                                                    <p
                                                                                        style="margin:10px 0;padding:0;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left;">
                                                                                        <b>GIEQs’ Colon Polyp Imaging Webinar</b> has you covered!
<ul>
<li>High Definition video based webinar</li>
<li>Interactive expert discussion via Zoom</li>
<li>Short recap on theory - Paris, Kudo, NICE, Sano and how to use them in clinical practice</li>
<li>over 1 hour of video case-based discussion with multiple invited experts focussed on the following simple step by step process
<ul>
<li>surface analysis using white light and narrow band imaging</li>
<li>detection / ruling out of a demarcated area of suspected submucosal invasion (SMI)</li>
<li>use of morphology and surrogate findings to further determine the risk of SMI</li>
<li>use the available information to make a clinically relevant treatment decision for your patient</li>
</ul>
</li>
</ul>                                                                                    </p>

                                                                                    





                                                                                    
                                                                                    <p
                                                                                        style="margin:10px 0;padding:0;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left;">
                                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock" style="min-width:100%;border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;">
    <tbody class="mcnButtonBlockOuter">
        <tr>
            <td style="padding-top:25px;padding-right:18px;padding-bottom:18px;padding-left:18px;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" valign="top" align="center" class="mcnButtonBlockInner">
                <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer" style="border-collapse:separate !important;border-radius:3px;background-color:#1b385d;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust: 100%;">
                    <tbody>
                        <tr>
                            <td align="center" valign="middle" class="mcnButtonContent" style="font-family:Helvetica;font-size:18px;padding:18px;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;">
                                <a data-assetid="14"
                                class="register-now" title="Register Now" style="font-weight:bold;letter-spacing:-0.5px;line-height:100%;text-align:center;text-decoration:none;color:#e3ebf6;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;display:block;">Register Now!
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>                                                                                    </p>

                                                                                    





                                                                                    
                                                                                    <p
                                                                                        style="margin:10px 0;padding:0;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left;">
                                                                                        As ever at GIEQs we are really interested in the trainee perspective and theory of training so have invited our assistant colleagues to join the faculty and broaden the debate.                                                                                     </p>

                                                                                    





                                                                                    
                                                                                    <p
                                                                                        style="margin:10px 0;padding:0;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left;">
                                                                                        <hr>                                                                                    </p>

                                                                                    





                                                                                    
                                                                                    <p
                                                                                        style="margin:10px 0;padding:0;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left;">
                                                                                        <h4 class="text-dark" style="text-align:left;">Faculty</h4>
<ul>
<li>Dr David Tate, UZ Gent, Belgium</li>
<li>Dr John Anderson, Interventional Endoscopist, UK</li>
<li>Dr Roland Valori, Interventional Endoscopist, UK</li>
<li>Dr Lobke Desomer, Interventional Endoscopist, Roeselare, Belgium</li>
<li>Dr Pieter Hindryckx, Interventional Endoscopist, UZ Gent, Belgium</li>
<li>Dr Christophe Schoonjans, Endoscopy Fellow, UZ Gent, Belgium</li>
<li>Dr Lynn Debels, Assistant Doctor, UZ Gent, Belgium</li>
</ul>
                                                                                    </p>

                                                                                    





                                                                                    
                                                                                    <p
                                                                                        style="margin:10px 0;padding:0;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left;">
                                                                                        <hr>                                                                                    </p>

                                                                                    





                                                                                    
                                                                                    <p
                                                                                        style="margin:10px 0;padding:0;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left;">
                                                                                        <h4 class="text-dark" style="text-align:left;">Cost</h4>

                                                                                    </p>

                                                                                    





                                                                                    
                                                                                    <p
                                                                                        style="margin:10px 0;padding:0;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left;">
                                                                                        Joining costs €10.  You will have access to the live stream, be able to interact with the faculty live on Zoom and have access to the whole evening course for 3 months.                                                                                    </p>

                                                                                    





                                                                                    
                                                                                    <p
                                                                                        style="margin:10px 0;padding:0;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left;">
                                                                                        GIEQs is a not-for-profit Educational Foundation dedicated to the promotion of quality in endoscopy.                                                                                    </p>

                                                                                    





                                                                                    
                                                                                    <p
                                                                                        style="margin:10px 0;padding:0;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left;">
                                                                                        * <a href="mailto:admin@gieqs.com?subject=Why%20i%20shouldn't%20pay%20for%20your%20online%20polypectomy%20course">tell us why</a> you shouldn't pay and (if we think it's a great reason) you join for FREE!                                                                                    </p>

                                                                                    





                                                                                    
                                                                                    <p
                                                                                        style="margin:10px 0;padding:0;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left;">
                                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock" style="min-width:100%;border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;">
    <tbody class="mcnButtonBlockOuter">
        <tr>
            <td style="padding-top:25px;padding-right:18px;padding-bottom:18px;padding-left:18px;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;" valign="top" align="center" class="mcnButtonBlockInner">
                <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer" style="border-collapse:separate !important;border-radius:3px;background-color:#1b385d;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust: 100%;">
                    <tbody>
                        <tr>
                            <td align="center" valign="middle" class="mcnButtonContent" style="font-family:Helvetica;font-size:18px;padding:18px;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;">
                                <a data-assetid="14"
                                class="register-now" title="Register Now" style="font-weight:bold;letter-spacing:-0.5px;line-height:100%;text-align:center;text-decoration:none;color:#e3ebf6;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;display:block;">Register Now!
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>

                                                                                        </p>

                                                                                    





                                                                                    

                                                                                    
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                    

                                                                    <table align="left" border="0" cellpadding="0"
                                                                        cellspacing="0"
                                                                        style="max-width:100%;min-width:100%;border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;"
                                                                        width="100%" class="mcnTextContentContainer">
                                                                        <tbody>
                                                                            <tr>

                                                                                <td valign="top" class="mcnTextContent"
                                                                                    style="padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;word-break:break-word;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left;">




                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                    <!--GIEQS BUTTON -->



                                                                    <!--UZG container-->


                                                                    <!--GIEQS DIVIDER BLOCK-->








                                                                    <!--[if mso]>
</td>
<![endif]-->

                                                                    <!--[if mso]>
</tr>
</table>
<![endif]-->
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>


                                                    <!-- begin COVID-19 message -->

                                                    <!-- end COVID-19 message -->


                                                    <!-- GIEQS header -->



                                                    <!-- GIEQS standard text block -->



                                                    <!--GIEQS IMAGE BLOCK-->



                                                    <!--GIEQS ITALIC BLOCK-->



                                                </td>
                                            </tr>
                                        </table>
                                        <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                    </td>
                                </tr>
                                <tr>

                                    <td align="center" valign="top" id="templateFooter" data-template-container=""
                                        style="background:#162e4d none no-repeat center/cover;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;background-color:#162e4d;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:0;border-bottom:0;padding-top:45px;padding-bottom:63px;">
                                        <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
                                    <tr>
                                    <td align="center" valign="top" width="600" style="width:600px;">
                                    <![endif]-->

                                        <!--GIEQS FOOTER-->
                                 
                                        <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                    </td>
                                </tr>
                            </table>
                            <!-- // END TEMPLATE -->
                        </td>
                    </tr>
                </table>
        </section>
        <section class="">
            <div class="container">
                <div class="row text-center">

                    <div class="col-12 p-3 pb-4">
                        <!-- <a href="#" class="btn btn-white rounded-pill hover-translate-y-n3 btn-icon mr-3 scroll-me"> -->
                        <!-- <span class="btn-inner--text">Overview</span> -->
                        <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        <!-- </a> -->


                        <!-- <p class=""><span class="text-white">Programme description:</span> Acquisition of the skills necessary to perform basic colonoscopy is still difficult. To become a skilled colonoscopist takes a long time. This course will explore and deconstruct the key problem areas encountered when performing colonoscopy with commentary and analysis .  </p>

                        <p class=""><span class="text-white">What to expect:</span> We will demonstrate the essentials of how to control the instrument effectively, and how to diagnose and overcome failure to progress.  The goal will be to provide participants with a clear understanding of the essential components of high quality colonoscopy and practical advice of how to improve when they get back into the endoscopy room.</span></p>
                        <p class=""><span class="text-white">Format of the course:</span> The course is suitable for anyone who wants to improve their colonoscopy skills and ideal for trainees learning colonoscopy. The format of the course will be a mixture of short presentations, discussion groups and in depth analysis of colonoscopy technique. Delegates will be invited to participate at various junctures of the course and everyone will be able to pose questions at any time.</p> -->
                        <a data-assetid="14"
                            class="register-now btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mr-3 mt-3">
                            <span class="btn-inner--text text-dark">Register Now!</span>
                            <!-- <span class="btn-inner--icon"><i class="fas fa-filter"></i></span> -->
                        </a>
                        <!-- <a href="#targetScrollProgramme" id="thursday" class="btn bg-gieqsGold rounded-pill hover-translate-y-n3 btn-icon mr-3 scroll-me">
                            <span class="btn-inner--text text-dark">Tues 17 Nov</span>
                        </a> -->
                    </div>

                </div>

                <hr id="targetScrollProgramme" class="divider divider-fade" />


                <div id="ajaxWed">

                </div>



            </div>
        </section>
    </div>

    <?php 
                            if (isset($access_token) && ($access_token == '8874101655')){

                               $access_validated = true;

                            }else{
                            
                                $access_validated = false;
                            

                             }?>


    <!-- Modals NEW GENERIC -->

    <div class="modal modal-new fade" id="modal_success" tabindex="-1" role="dialog" aria-labelledby="modal-new"
        aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h6" id="modal_title_6">Buy New GIEQs Online Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-0"
                        style="min-height: 100px; background-image: url('<?php echo BASE_URL;?>/assets/img/covers/learning/1.png'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
                    </div>
                    <div class="py-3 text-left">
                        <!-- <i class="fas fa-exclamation-circle fa-4x"></i> -->
                        <hr />
                        <h5 class="heading h4 mt-4">New GIEQs Online Course Subscription</h5>
                        <p class="heading h5 mt-4">Course : <span class="text-white" id="asset-name"></span></p>

                        <p class="text-white"><span class="text-muted" id="asset-type"></span></p>
                        <p class="text-white">Duration : <span class="text-muted" id="renew-frequency"></span><span
                                class="text-muted"> Month(s) after Live Date</span></p>
                        <p class="text-white">Cost : 
                            <?php 
                            if ($access_validated){

                                echo ' FREE with your Complimentary Link';

                            }else{?>
                            
                            <span class="text-muted" id="cost">&euro;</span></p>

                            <?php }?>


                        <p class="text-white text-justify mt-4">
                            Description : <span class="text-muted" id="asset-description"></span>

                        </p>
                        <hr />

                        <?php
                        if  (!$userid){?>

                        <p class="text-white">You need a GIEQs Online User Account (free) to Register for this Course
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</button>

                    <button id="button-login" class="btn btn-sm btn-white button-login">I have a GIEQs Online
                        Account</button>
                    <button id="button-signup" class="btn btn-sm btn-white button-signup">I have no account, sign me
                        up!</button>


                </div>

                <?php }else{?>

                    <?php if (!($access_validated)){?>

                <p class="text-sm mt-4">
                    By clicking Start Payment you will be taken to PayPal to start the payment process.
                    The payment process is not final until you confirm with the payment provider.
                    Once complete your subscription will be active immediately and you will receive a
                    confirmation email.
                    <!-- This subscription will automatically renew after the expiry term. This can easily be
                            switched off your account settings. -->
                    We do not store any payment details whatsoever on GIEQs.com. We believe this is best handled by
                    PayPal who have a
                    track record in industry standard procedures in this regard.
                    All subscriptions and payments are covered by our <a
                        href="<?php echo BASE_URL;?>/pages/support/support_gieqs_online_terms.php" target="_blank">terms
                        and conditions</a>.
                </p>

                <?php }else{?>

                    <p class="text-sm mt-4">

                        No payment is required for this subscription.
                    </p>


                <?php }   ?>
            </div>
        </div>

        <?php 

        //determine action 

        if ($access_validated){

            //allow free register

            $form_action_path = BASE_URL . '/pages/learning/scripts/subscriptions/generate_free_subscription.php';


        }else{

            $form_action_path = BASE_URL . '/pages/learning/scripts/subscriptions/charge.php';


        }


        ?>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</button>
            <form id="confirm-new" action="<?php echo $form_action_path;?>"
                method="POST">
                <input type="hidden" id="asset_id_hidden" name="asset_id" value="">
                <input type="hidden" id="course_date" name="course_date" value="2021-03-16 08:00">
                <!-- CHANGE ME UPDATE TODO MAKE THIS COME FROM THE PROGRAM -->

                <input type="submit" id="button-confirm-new" class="btn btn-sm btn-white button-confirm-new"
                    value="<?php $result = $access_validated ? 'Register' : 'Start Payment'; echo $result;?>">
            </form>
        </div>

        <?php } ?>
    </div>
    </div>
    </div>

    <!-- Register Modal -->

    <div class="modal fade" id="registerInterest" tabindex="-1" role="dialog" aria-labelledby="registerInterestLabel"
        aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerInterestLabel" style="color: rgb(238, 194, 120);">Sign-up for
                        GIEQs Online!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="false">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <span class="h6">This will only take 2 seconds.</span><span><br />We need your email address and a
                        password to keep track of your learning aims and objectives. Thereafter you can choose what
                        further information you share with us</span>
                    <form id="NewUserForm" class="mt-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">First name</label>
                                    <input name="firstname" class="form-control" type="text"
                                        placeholder="Enter your first name" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Last name</label>
                                    <input name="surname" class="form-control" type="text"
                                        placeholder="Also your last name" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">

                            <div class="col-md-6">
                                <div class="form-group focused">
                                    <label class="form-control-label">Gender</label>
                                    <select name="gender" class="form-control" aria-hidden="true">
                                        <option hidden>select gender
                                        </option>
                                        <option value="1">Female</option>
                                        <option value="2"> Male</option>
                                        <option value="3">Rather not say</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Email (will be your user id)</label>
                                    <input name="email" class="form-control" type="email" placeholder="name@example.com"
                                        value="">
                                    <!--                     <small class="form-text text-muted mt-2">This is the main email address that we'll send notifications to. <a href="account-notifications.html">Manage your notifications</a> in order to control what we send.</small>
         -->
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">

                            <div class="col-md-6">
                                <div class="form-group focused">
                                    <label class="form-control-label">I am a...</label>
                                    <select name="endoscopistType" class="form-control" aria-hidden="true">
                                        <option hidden selected disabled>Select the option which best describes you
                                        </option>
                                        <option value="1">Medical Endoscopist</option>
                                        <option value="2">Surgical Endoscopist</option>
                                        <option value="3">Nurse Endoscopist</option>
                                        <option value="4">Endoscopy Nurse (assistant)</option>
                                        <option value="5">Medical Student</option>
                                        <option value="6">Nursing Student</option>
                                        <option value="7">Not a healthcare professional</option>


                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Institution country</label>
                                    <select id="centreCountry" name="centreCountry" class="form-control" tabindex="-1"
                                        aria-hidden="true">
                                        <option hidden disabled selected>select a country...</option>
                                        <?php $countries = $general->getCountries();
                        
                        foreach ($countries as $key=>$value){
                        
                        ?>

                                        <option value="<?php echo $key;?>"><?php echo $value;?></option>




                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <input id="password" name="password" class="form-control" type="password"
                                        placeholder="Enter your password" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Password again</label>
                                    <input name="passwordAgain" class="form-control" type="password"
                                        placeholder="password again" value="">
                                </div>
                            </div>
                        </div>
                        <div class="my-4">
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" name="checkterms" class="custom-control-input" id="checkterms">
                                <label class="custom-control-label" for="checkterms">I agree to the <a
                                        href="<?php echo BASE_URL;?>/pages/support/support_gieqs_terms_and_conditions.php"
                                        target="_blank">terms and conditions</a></label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="checkprivacy" class="custom-control-input"
                                    id="checkprivacy">
                                <label class="custom-control-label" for="checkprivacy">I agree to the <a
                                        href="<?php echo BASE_URL;?>/pages/support/support_gieqs_privacy_policy.php"
                                        target="_blank">privacy policy</a></label>
                            </div>
                        </div>

                        <input type="hidden" name="signup_redirect" value="imaging">

                        <?php if ($access_validated){

                            ?>
                        <input type="hidden" name="access_token" value="true">

                        <?php
                        }
                       

                        ?>

                    </form>
                </div>
                <div class="modal-footer">
                    <button id="submitPreRegister" type="button" class="btn btn-small text-dark bg-gieqsGold">Sign
                        up</button>
                    <button id="login" type="button" class="btn btn-small btn-secondary">I already have a login</button>



                </div>
            </div>
        </div>
    </div>

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->

    <script src="../../assets/js/purpose.core.js"></script>
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>
    <script src="<?php echo BASE_URL;?>/node_modules/jquery-validation/dist/jquery.validate.js"></script>
    <script src="../../assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>


    <script src=<?php echo BASE_URL . "/assets/js/generaljs.js"?>></script>



    <script>
    if ($("#action").text() != '') {
        var videoPassed = $("#action").text();
    } else {

        var videoPassed = false;
    }

    if ($("#access_token").text() != '') {
        var access_token = $("#access_token").text();
    } else {

        var access_token = false;
    }



    var userid = '<?php echo $userid;?>';

    if (userid == '') {

        userid = false;

    }

    var waitForFinalEvent = (function() {
        var timers = {};
        return function(callback, ms, uniqueId) {
            if (!uniqueId) {
                uniqueId = "Don't call this twice without a uniqueId";
            }
            if (timers[uniqueId]) {
                clearTimeout(timers[uniqueId]);
            }
            timers[uniqueId] = setTimeout(callback, ms);
        };
    })();

    function refreshProgrammeView() {



        const dataToSend = {

            programmeid: 35,

        }

        const jsonString = JSON.stringify(dataToSend);
        console.log(jsonString);

        var request2 = $.ajax({
            url: siteRoot + "assets/scripts/classes/generateProgrammeCurrent.php",
            crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request2.done(function(data) {
            // alert( "success" );
            $('#ajaxWed').html(data);
            //$(document).find('.Thursday').hide();
        })
    }

    function submitPreRegisterForm() {


        //userid is lesionUnderEdit

        //console.log('updatePassword chunk');
        //go to php script with an object from the form

        $('#submitPreRegister').append('<i class="fas fa-circle-notch fa-spin ml-2"></i>');


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
            "Content-Type": "application/x-www-form-urlencoded",
            },
            crossDomain: true,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            type: "POST",
            contentType: "application/json",
            data: data,
        });

        passwordChange.done(function(data) {


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
                $('#submitPreRegister').find('i').remove();


            })



        })

    }

    $(document).ready(function() {

        /* $('#centreCountry').select2({

          dropdownParent: $(".modal-content"),

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



          }); */



        refreshProgrammeView();

        $('#button-login').click(function() {

            <?php 
            if ($access_validated){
                ?>

window.location = siteRoot +
            "pages/authentication/login.php?destination=imaging_signup&access_token=<?php echo $access_token;?>";

<?php 
            }else{
                ?>

            window.location = siteRoot +
            "pages/authentication/login.php?destination=imaging_signup";

            <?php
            }
            ?>


        })



        $(document).on('click', '#login', function() {

            event.preventDefault();
            window.location.href = siteRoot +
                '/pages/authentication/login.php?destination=imaging_signup';


        })

        $('#button-signup').click(function() {


            $('.modal-new').modal('hide');
            $('#registerInterest').modal('show');
            $('.modal').css('overflow', 'auto');



        })

        if (videoPassed == 'register') {

            //simulate click

            waitForFinalEvent(function() {

                $('.register-now').trigger('click');


            }, 500, "hello header");

        }

        $('.register-now').click(function(event) {

            var button = $(this);

            $(this).append('<i class="fas fa-circle-notch fa-spin ml-2"></i>');
            $(this).attr('disabled', true);
            //var asset_type = $(this).data('assettype');
            var asset_id = $(this).data('assetid');

            console.log(asset_id);
            $('.modal-footer #button-confirm-new').attr('data-assetid', '' + asset_id);

            //get the modal data
            const dataToSend = {

                asset_id: asset_id,

            }

            const jsonString = JSON.stringify(dataToSend);

            if (userid) {

                //closed version
                var url = siteRoot +
                    "pages/learning/scripts/subscriptions/get_new_subscription_data.php";

            } else {

                //open version

                var url = siteRoot +
                    "pages/learning/scripts/subscriptions/get_new_subscription_data_open.php";

            }

            var request = $.ajax({
                url: url,
                crossDomain: true,
                headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                },
                type: "POST",
                contentType: "application/json",
                data: jsonString,
                timeout: 5000,
                fail: function(xhr, textStatus, errorThrown) {
                    alert(
                        'Something went wrong.  We could not load the subscription data.'
                    );
                    $(this).find('i').remove();
                    $(this).attr('disabled', false);
                }
            });

            request.done(function(data) {


                data = data.trim();
                console.log(data);

                try {

                    externalTest = $.parseJSON(data);
                    console.dir(externalTest);
                    if (data) {

                        
                        try {

                            if (externalTest.location_jump){

                                window.location.href = externalTest.location_jump;
                            
                            }

                        }catch(error){



                        }
                        
                        
                        

                        $('.modal-new #asset-name').text(externalTest.asset_name);
                        $('.modal-new #asset-type').text(externalTest.asset_type);
                        $('.modal-new #renew-frequency').text(externalTest.renew_frequency);
                        $('.modal-new #asset-description').text(externalTest.description);
                        $('.modal-new #asset_id_hidden').val(externalTest.asset_id);
                        $('.modal-new #cost').text(externalTest.cost + ' euro');


                        $('.modal-new').modal('show');
                        $(button).find('i').remove();
                        $(button).attr('disabled', false);

                    } else {

                        alert('Something went wrong.  We could not load the subscription data.');
                        $(this).find('i').remove();
                        $(this).attr('disabled', false);


                    }

                } catch (error) {

                    alert(data);
                    $(button).find('i').remove();
                    $(button).attr('disabled', false);

                }


            });


        });

        $(document).on('click', '#submitPreRegister', function(event) {

            event.preventDefault();
            $('#NewUserForm').submit();

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


                centreCountry: {

                    required: true,

                },
                endoscopistType: {

                    required: true
                },

                checkterms: {

                    required: true,

                },
                checkprivacy: {

                    required: true
                }



            },
            messages: {



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







    })
    </script>
</body>

</html>