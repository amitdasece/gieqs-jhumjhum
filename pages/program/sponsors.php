<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>

<head>
<meta name=”robots” content=”noindex”>

    
<?php

//define user access level

$openaccess = 1;

require BASE_URI . '/headNoPurposeCore.php';

?>

    <title>Ghent International Endoscopy Symposium - Sponsorship</title>
   
    <style>

        .header, .navbar, .navbar-top {
            transition: none !important;
        }

        .bg-dark{
            background-color: #162e4d !important; 
        }

.logo { 

width: 100%;


}

      @media screen and (max-width: 400px) {
        
        
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

        <?php $symposium_nav_active = [

0 => '', //news
1 => '', //individual reg
2 => '', //group reg
3 => '', //program
4 => '', //faculty
5 => '', //register now
6 => '',
7 => 'gieqsGold',



];


require BASE_URI . '/pages/learning/includes/nav_symposium.php';?>

    </header>
    <!-- Omnisearch 
    <div id="omnisearch" class="omnisearch">
        <div class="container">
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
                                    
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    
                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i> 

                                </a>
                            </li>
                            <li>
                                <a class="list-link" href="#">
                                    <i class="fas fa-search"></i>
                                    
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->

    <div class="main-content">

        <!-- Header (v1) -->
        <section class="header-1 bg-section-dark" data-offset-top="#header-main">


        </section>
        <section class="slice slice-lg mt-2">
            <div class="container">
                <div class="row text-center">

                    <div class="col-12 p-3 pb-2">
                        <span class="h1" style="color: rgb(238, 194, 120);">GIEQs would like to thank our sponsors</span><br/><br/>
                        <span class="h4">Our mission to improve everyday endoscopy would not be possible without their financial support</span>
                        <span class=""><br/>Sponsors have given funding as a contribution to medical education without input or influence over the medical or nursing programme.</span>
                            
                    </div>

                </div>
    </div>
    </section>

        <!-- Sponsors -->

        <div id="clients-clients-1">
          <section class="clients">
            <div class="container mb-5 p-5 bg-white">
                
                <!--Platinum Sponsor-->

                <div class="row my-4">
                    <h2 class="mx-auto" style="color: #12263f;">Platinum Sponsors</h2>
                </div>

                <div class="client-group row justify-content-center align-items-center mb-4">

                    <div class="col-lg-5 col-md-5 col-5 p-3">
                        <a href="https://www.bostonscientific.com/en-EU/medical-specialties/gastroenterology.html" target="_Blank">
                            <img class="logo" alt="Boston Scientific Logo" src="<?php echo BASE_URL . '/assets/img/sponsors/Boston Scientific.jpg';?>">
                        </a>
                    </div>

                    <div class="col-lg-5 col-md-5 col-5 p-3">
                        <a href="https://www.olympus.be/medical/en/Home/" target="_Blank">
                            <img class="logo" alt="Olympus Logo" src="<?php echo BASE_URL . '/assets/img/sponsors/OLYMPUS.jpg';?>">
                        </a>
                    </div>

                </div>

                
                <div class="row my-4">
                    <h2 class="mx-auto" style="color: #12263f;">Gold Sponsors</h2>
                </div>

                <div class="client-group row justify-content-center align-items-center mb-4">

                    <div class="col-lg-4 col-md-4 col-4 p-3">
                        <a href="https://www.duodmed.com" target="_Blank">
                            <img class="logo" alt="DUODMED" src=" <?php echo BASE_URL;?>/assets/scripts/pdocrud/script/uploads/1663918022_Duomed.png">
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-4 col-4 p-3">
                        <a href="https://www.fujifilm-endoscopy.com/" target="_Blank">
                            <img class="logo" alt="fujifilm" src="<?php echo BASE_URL . '/assets/img/sponsors/Fuji Logo.jpg';?>">
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-4 col-4 p-3">
                        <a href="https://www.pentax-medical.com" target="_Blank">
                            <img class="logo" alt="PENTAX" src="<?php echo BASE_URL;?>/assets/scripts/pdocrud/script/uploads/1663877490_pentaxlogo-rgb.png">
                        </a>
                    </div>

                </div>
            

                <div class="row my-4">
                    <h2 class="mx-auto" style="color: #12263f;">Silver Sponsors</h2>
                </div>

                <div class="client-group row justify-content-center align-items-center mb-4">

                    <div class="col-lg-4 col-md-4 col-4 p-3">
                        <a href="https://www.janssen.com/immunology/gastroenterology" target="_Blank">
                            <img class="logo" alt="JANSSEN" src="<?php echo BASE_URL . '/assets/img/sponsors/JANSSEN.jpg';?>">
                        </a>
                    </div>
                   

                </div>
    
                <!--Bronze Sponsors-->
                <div class="row my-4">
                    <h2 class="mx-auto" style="color: #12263f;">Bronze Sponsors</h2>
                </div>

                <div class="client-group row justify-content-center align-items-center mb-4">

                    <div class="col-lg-2 col-md-3 col-4 p-3">
                        <a href="https://www.ambu.com/" target="_Blank">
                            <img class="logo" alt="Ambu" src="<?php echo BASE_URL;?>/assets/scripts/pdocrud/script/uploads/1663663492_Ambu logo.jpg">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-4 p-3">
                        <a href="http://creomedical.com/en/" target="_Blank">
                            <img class="logo" alt="creo" src="<?php echo BASE_URL;?>/assets/scripts/pdocrud/script/uploads/1663908233_Creo Medical primary logo full-colour RGB low-res with clearance.jpg">
                        </a>
                    </div>

                   <!--  <div class="col-lg-2 col-md-3 col-4 p-3">
                        <a href="https://www.drfalkpharma-benelux.eu/" target="_Blank">
                            <img class="logo" alt="Dr Falk" src="<?php echo BASE_URL . '/assets/img/sponsors/drfalk.png';?>">
                        </a>
                    </div> -->
<!-- 
                    <div class="col-lg-2 col-md-3 col-4 p-3">
                        <a href="https://www.erbe-med.com/de-en/global-home/" target="_Blank">
                            <img class="logo" alt="Erbe" src="<?php //echo BASE_URL . '/assets/img/sponsors/Erbe_Logo_RGB.png';?>">
                        </a>
                    </div> -->

                 <!--    <div class="col-lg-2 col-md-3 col-4 p-3">
                        <a href="https://ferring.be/" target="_Blank">
                            <img class="logo" alt="Ferring" src="<?php //echo BASE_URL . '/assets/img/sponsors/Ferring logo blue - high res (JPG - RGB - 89[1].3KB).png';?>">
                        </a>
                    </div> -->

                    <div class="col-lg-2 col-md-3 col-4 p-3">
                        <a href="http://www.fidesmedical.com/dyn/home.php?lang=3" target="_Blank">
                            <img class="logo" alt="Fides Medical" src="<?php echo BASE_URL . '/assets/img/sponsors/Logo Fides Medical.png';?>">
                        </a>
                    </div>

                  <!--   <div class="col-lg-2 col-md-3 col-4 p-3">
                        <a href="https://europe.medtronic.com/gi" target="_Blank">
                            <img class="logo" alt="Medtronic" src="<?php echo BASE_URL . '/assets/img/sponsors/MEDTRONIC.jpg';?>">
                        </a>
                    </div> -->

                    <div class="col-lg-2 col-md-3 col-4 p-3">
                        <a href="https://norgine.com/" target="_Blank">
                            <img class="logo" alt="Norgine" src="<?php echo BASE_URL . '/assets/img/sponsors/Norgine - Because patients inspire us.png';?>">
                        </a>
                    </div>

                    <!-- <div class="col-lg-2 col-md-3 col-4 p-3">
                        <a href="https://www.pfizer.be" target="_Blank">
                            <img class="logo" alt="Pfizer" src="<?php //echo BASE_URL . '/assets/img/sponsors/Pfizer_Logo_Color_RGB.png';?>">
                        </a>
                    </div> -->

                    <div class="col-lg-2 col-md-3 col-4 p-3">
                        <a href="http://prionmedical.be/" target="_Blank">
                            <img class="logo" alt="Prion Medical" src="<?php echo BASE_URL . '/assets/img/sponsors/Prion Medical.png';?>">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-4 p-3">
                        <a href="http://www.rmsmedicaldevices.com/en/home" target="_Blank">
                            <img class="logo" alt="RMS" src="<?php echo BASE_URL . '/assets/img/sponsors/RMS_LOGO_PMS.png';?>">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-4 p-3">
                        <a href="https://www.viatris.com/en" target="_Blank">
                            <img class="logo" alt="Viatris" src="<?php echo BASE_URL . '/assets/img/sponsors/Viatris.png';?>">
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-4 p-3">
                        <a href="https://www.cookmedical.eu/" target="_Blank">
                            <img class="logo" alt="COOK" src="<?php echo BASE_URL;?>/assets/scripts/pdocrud/script/uploads/1662389484_CookMedical-Logo-Signage_A4.jpg">
                        </a>
                    </div>
                    
                    <div class="col-lg-2 col-md-3 col-4 p-3">
                        <a href="https://www.astellas.com/en/" target="_Blank">
                            <img class="logo" alt="Astellas" src="<?php echo BASE_URL;?>/assets/scripts/pdocrud/script/uploads/1662979004_astellas.png">
                        </a>
                    </div>

                    <!-- <div class="col-lg-2 col-md-3 col-4 p-3">
                        <img class="logo" alt="Mundipharma" src="<?php //echo BASE_URL . '/assets/img/brand/mundipharma.jpg';?>">
                    </div> -->

                    <!-- <div class="col-lg-2 col-md-3 col-4 p-3">
                    <img class="logo" alt="Prion Medical" src="<?php //echo BASE_URL . '/assets/img/brand/prion.jpg';?>">

                    </div>
                    <div class="col-lg-2 col-md-3 col-4 p-3">
                    <img class="logo" alt="Cook Medical" src="<?php //echo BASE_URL . '/assets/img/brand/cook.jpg';?>">

                    </div>
                    <div class="col-lg-2 col-md-3 col-4 p-3">
                    <img class="logo" alt="Boucart Medical" src="<?php //echo BASE_URL . '/assets/img/brand/boucart.jpg';?>">

                    </div> -->

                </div>
                <!-- 
                <div class="client-group row justify-content-center mb-4">
                    <div class="col-lg-2 col-md-4 col-4 py-1">
                        <img class="logo" alt="ovesco" src="<?php //echo BASE_URL . '/assets/img/icons/ovesco.png';?>">
                    </div>
                    <div class="col-lg-2 col-md-4 col-4 py-1">
                    <img class="logo" alt="sandoz" src="<?php //echo BASE_URL . '/assets/img/icons/sandoz.png';?>">

                    </div>
                    <div class="col-lg-2 col-md-4 col-4 py-1">
                    <img class="logo" alt="takeda" src="<?php //echo BASE_URL . '/assets/img/brand/takeda.png';?>">

                    </div>
                    <div class="col-lg-2 col-md-4 col-4 py-1">
                    <img class="logo" alt="mylan" src="<?php //echo BASE_URL . '/assets/img/icons/mylan-inc-logo.jpg';?>">

                    </div>
                    <div class="col-lg-2 col-md-4 col-4 py-1">

                    </div>
                    <div class="col-lg-2 col-md-4 col-4 py-1">

                    </div>

                </div>
                -->

<!--                 Other Sponsors
 -->           <div class="row my-4">
                        <span class="h2 mx-auto" style="color: black;">Additional Sponsors</span><br />
                </div>

                
                <div class="client-group row justify-content-center align-items-center mb-4">
                    <div class="col-lg-2 col-md-4 col-4 py-1">
                        <img class="logo" alt="Biogen" src="<?php echo BASE_URL;?>/assets/scripts/pdocrud/script/uploads/1663663578_biogen logo.jpg">
                    </div>
                    <div class="col-lg-2 col-md-4 col-4 py-1">
                        <img class="logo" alt="Celltrion" src="<?php echo BASE_URL;?>/assets/scripts/pdocrud/script/uploads/1663918122_Celltrion.jpg">
                    </div> 
                    
                    <div class="col-lg-2 col-md-4 col-4 py-1">
                        <img class="logo" alt="Takeda" src="<?php echo BASE_URL;?>/assets/scripts/pdocrud/script/uploads/1663918305_Takeda Logo.jpg">
                    </div> 
                    
                    <div class="col-lg-2 col-md-4 col-4 py-1">
                        <img class="logo" alt="Ferring" src="<?php echo BASE_URL;?>/assets/scripts/pdocrud/script/uploads/1663918337_Ferring logo blue - high res (JPG - RGB - 89[1].3KB).jpg">
                    </div>

                    <div class="col-lg-2 col-md-4 col-4 py-1">
                        <img class="logo" alt="Galapagos" src="<?php echo BASE_URL;?>/assets/scripts/pdocrud/script/uploads/1663918087_GLPG_2C_Simpl_Normal.png">
                    </div>

                    

                    <!-- <div class="col-lg-2 col-md-4 col-4 py-1">
                        <img class="logo" alt="Cook Medical" src="<?php //echo BASE_URL . '/assets/img/brand/cook.jpg';?>">
                    </div>

                    <div class="col-lg-2 col-md-4 col-4 py-1">
                        <img class="logo" alt="Boucart Medical" src="<?php //echo BASE_URL . '/assets/img/brand/boucart.jpg';?>">
                    </div>

                    <div class="col-lg-2 col-md-4 col-4 py-1">
                    </div>

                    <div class="col-lg-2 col-md-4 col-4 py-1">
                    </div>

                    <div class="col-lg-2 col-md-4 col-4 py-1">
                    </div> -->

                </div>
           

                <!--Society Endorsements-->
                <div class="row my-4 pt-4">
                    <h2 class="mx-auto" style="color: #12263f;">Endorsing Societies</h2>
                </div>

                <div class="client-group row justify-content-center align-items-center">

                    <div class="col-lg-2 col-md-3 col-4 p-3">
                        <img class="logo" alt="asge" src="<?php echo BASE_URL . '/assets/img/sponsors/ASGE.png';?>">
                    </div>

                    <div class="col-lg-2 col-md-3 col-4 p-3">
                        <img class="logo" alt="ESGE" src="<?php echo BASE_URL . '/assets/img/brand/bsgie.png';?>">
                    </div>

                    <div class="col-lg-2 col-md-3 col-4 p-3">
                        <img class="logo" alt="ESGE" src="<?php echo BASE_URL . '/assets/img/icons/esge.png';?>">
                    </div>

                    <div class="col-lg-2 col-md-3 col-4 p-3">
                        <img class="logo" alt="WEO" src="<?php echo BASE_URL . '/assets/img/sponsors/WEO.png';?>">
                    </div>

                    <div class="col-lg-2 col-md-3 col-4 p-3">
                        <img class="logo" alt="WGO" src="<?php echo BASE_URL . '/assets/img/sponsors/WGO.png';?>">
                    </div>

                    <!-- <div class="col-lg-2 col-md-3 col-4 p-3">
                    <a href="https://www.sfed.org/professionnels/actualites-pro/programme-du-congres-e-video-digest-reservez-votre-vendredi-13" target="_blank"><img class="logo" alt="SFED" src="<?php echo BASE_URL . '/assets/img/brand/sfed.png';?>"></a>
                    </div> -->

                    <!--
                    <div class="col-lg-2 col-md-4 col-4 py-1">
                        <img class="logo" alt="bsg" src="<?php echo BASE_URL . '/assets/img/brand/bsg.png';?>">
                    </div>
                    -->

                </div>


            </div>
        </section>
        

    </div>

    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <script src="../../assets/js/purpose.core.js"></script> 
    <script src="<?php echo BASE_URL;?>/assets/js/purpose.js"></script>   
    <!-- Page JS -->
   
    <script>
    $(document).ready(function() {

      

    })
    </script>
</body>

</html>
