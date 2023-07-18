<?php
//require_once ('../assets/includes/config.inc.php');
		
//require (BASE_URI1 . '/scripts/headerScript.php');
new users;
$userid = $_SESSION['user_id'];
?>

<!--Main Navbar-->


    <nav class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-dark bg-dark" id="navbar-main">
      <div class="container px-lg-0">
        <!-- Logo -->
        <a class="navbar-brand mr-lg-5" href="<?php echo BASE_URL1;?>/index.php">
          <img alt="Image placeholder" src="<?php echo BASE_URL1;?>/assets/logo/edm.png" id="navbar-logo" style="height: 50px;">
        </a>
        <!-- Navbar collapse trigger -->
        <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="#navbar-main-collapse" aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <?php

        if ($userid) {
        //Navbar nav if logged in
        
        echo '<div class="collapse navbar-collapse" id="navbar-main-collapse">
          <ul class="navbar-nav align-items-lg-center">
            <!-- Home - Overview  -->
            <li class="nav-item active">
              <a class="nav-link" href="' . BASE_URL1 . '/index.php">Home</a>
            </li>
            

            

            <li class="nav-item dropdown dropdown-animate" data-toggle="hover">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-arrow p-0">
                <ul class="list-group list-group-flush">
                  <li class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                    <a href="#" class="list-group-item list-group-item-action dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <div class="media d-flex align-items-center">
                        <!-- SVG icon -->
                        <figure style="width: 50px;">
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="147px" height="109px" viewBox="0 0 147 109" version="1.1" class="injected-svg svg-inject img-fluid" style="height: 50px;">
    <!-- Generator: Sketch 51.2 (57519) - http://www.bohemiancoding.com/sketch -->
    <title>Code_2</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Code_2" transform="translate(1.000000, 1.000000)">
            <path d="M144.1,8.5 L144.1,98.1 C144.1,102.2 140.8,105.6 136.6,105.6 L8.1,105.6 C4,105.6 0.6,102.3 0.6,98.1 L0.6,0.6 L136.1,0.6 C140.6,0.6 144.1,4.2 144.1,8.5 Z" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
            <path d="M133.7,0.6 C139.4,0.6 144.1,5.3 144.1,11 L144.1,98.1 C144.1,102.2 140.9,105.6 137,105.6 L14.3,105.6 C10.4,105.6 7.2,102.3 7.2,98.1 L7.2,0.6 L133.7,0.6 Z" id="Shape" class="fill-primary-300" fill-rule="nonzero"></path>
            <path d="M95.9,19.5 L0.7,19.5 L0.7,8.1 C0.7,4 4,0.6 8.2,0.6 L136.7,0.6 C140.8,0.6 144.2,3.9 144.2,8.1 L144.2,19.5 L119.2,19.5" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
            <path d="M134.9,19.2 L143,19.2" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M124.4,19.2 L125.4,19.2" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M1.3,19.2 L87.5,19.2" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <circle id="Oval" class="fill-primary-300" fill-rule="nonzero" cx="13.5" cy="10.2" r="3.2"></circle>
            <circle id="Oval" class="fill-primary-200" fill-rule="nonzero" cx="24.1" cy="10.2" r="3.2"></circle>
            <circle id="Oval" class="fill-primary-200" fill-rule="nonzero" cx="34.7" cy="10.2" r="3.2"></circle>
            <path d="M0.7,62.6 L0.7,61.4" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M0.7,55.2 L0.7,8 C0.7,3.9 4,0.5 8.2,0.5 L136.7,0.5 C140.8,0.5 144.2,3.8 144.2,8 L144.2,98.1 C144.2,102.2 140.9,105.6 136.7,105.6 L8.2,105.6 C4.1,105.6 0.7,102.3 0.7,98.1 L0.7,77" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <g id="Group" transform="translate(18.000000, 31.000000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
                <path d="M22.1,20.1 L48.5,20.2" id="Shape" class="stroke-neutral"></path>
                <path d="M80.9,20.1 L111.3,20.3" id="Shape" class="stroke-neutral"></path>
                <path d="M60.5,58.3 L91,58.5" id="Shape" class="stroke-primary"></path>
                <path d="M57.5,20.1 L72.3,20.2" id="Shape" class="stroke-primary"></path>
                <path d="M0.6,19.9 L11.4,20" id="Shape" class="stroke-neutral"></path>
                <path d="M37.8,32.8 L53.7,33" id="Shape" class="stroke-primary"></path>
                <path d="M62.5,32.8 L103,33.3" id="Shape" class="stroke-neutral"></path>
                <path d="M0.6,32.7 L27.2,32.8" id="Shape" class="stroke-neutral"></path>
                <path d="M37.8,45.5 L74.7,45.7" id="Shape" class="stroke-primary"></path>
                <path d="M0.6,45.4 L27.2,45.5" id="Shape" class="stroke-neutral"></path>
                <path d="M29.9,58.3 L50.3,58.4" id="Shape" class="stroke-neutral"></path>
                <path d="M0.6,58.1 L17,58.2" id="Shape" class="stroke-primary"></path>
                <path d="M0.5,0.4 L75.3,0.7" id="Shape" class="stroke-neutral"></path>
            </g>
        </g>
    </g>
</svg>
                        </figure>
                        <!-- Media body -->
                        <div class="media-body ml-3">
                          <h6 class="mb-1">ESD Database</h6>
                          <p class="mb-0">Upper and Lower GI</p>
                        </div>
                      </div>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a class="dropdown-item" href="' . BASE_URL1 . '/scripts/forms/esdLesionFormv2.php">
                          Enter new Lesion
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="' . BASE_URL1 . '/scripts/forms/esdLesionTablev2.php">
                          Table of Lesions
                        </a>
                      </li>
                      
                    </ul>

                    
                  </li>
                  <li class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                    <a href="#" class="list-group-item list-group-item-action dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <div class="media d-flex align-items-center">
                        <!-- SVG icon -->
                        <figure style="width: 50px;">
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="147px" height="109px" viewBox="0 0 147 109" version="1.1" class="injected-svg svg-inject img-fluid" style="height: 50px;">
    <!-- Generator: Sketch 51.2 (57519) - http://www.bohemiancoding.com/sketch -->
    <title>Code_2</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Code_2" transform="translate(1.000000, 1.000000)">
            <path d="M144.1,8.5 L144.1,98.1 C144.1,102.2 140.8,105.6 136.6,105.6 L8.1,105.6 C4,105.6 0.6,102.3 0.6,98.1 L0.6,0.6 L136.1,0.6 C140.6,0.6 144.1,4.2 144.1,8.5 Z" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
            <path d="M133.7,0.6 C139.4,0.6 144.1,5.3 144.1,11 L144.1,98.1 C144.1,102.2 140.9,105.6 137,105.6 L14.3,105.6 C10.4,105.6 7.2,102.3 7.2,98.1 L7.2,0.6 L133.7,0.6 Z" id="Shape" class="fill-primary-300" fill-rule="nonzero"></path>
            <path d="M95.9,19.5 L0.7,19.5 L0.7,8.1 C0.7,4 4,0.6 8.2,0.6 L136.7,0.6 C140.8,0.6 144.2,3.9 144.2,8.1 L144.2,19.5 L119.2,19.5" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
            <path d="M134.9,19.2 L143,19.2" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M124.4,19.2 L125.4,19.2" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M1.3,19.2 L87.5,19.2" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <circle id="Oval" class="fill-primary-300" fill-rule="nonzero" cx="13.5" cy="10.2" r="3.2"></circle>
            <circle id="Oval" class="fill-primary-200" fill-rule="nonzero" cx="24.1" cy="10.2" r="3.2"></circle>
            <circle id="Oval" class="fill-primary-200" fill-rule="nonzero" cx="34.7" cy="10.2" r="3.2"></circle>
            <path d="M0.7,62.6 L0.7,61.4" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M0.7,55.2 L0.7,8 C0.7,3.9 4,0.5 8.2,0.5 L136.7,0.5 C140.8,0.5 144.2,3.8 144.2,8 L144.2,98.1 C144.2,102.2 140.9,105.6 136.7,105.6 L8.2,105.6 C4.1,105.6 0.7,102.3 0.7,98.1 L0.7,77" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <g id="Group" transform="translate(18.000000, 31.000000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
                <path d="M22.1,20.1 L48.5,20.2" id="Shape" class="stroke-neutral"></path>
                <path d="M80.9,20.1 L111.3,20.3" id="Shape" class="stroke-neutral"></path>
                <path d="M60.5,58.3 L91,58.5" id="Shape" class="stroke-primary"></path>
                <path d="M57.5,20.1 L72.3,20.2" id="Shape" class="stroke-primary"></path>
                <path d="M0.6,19.9 L11.4,20" id="Shape" class="stroke-neutral"></path>
                <path d="M37.8,32.8 L53.7,33" id="Shape" class="stroke-primary"></path>
                <path d="M62.5,32.8 L103,33.3" id="Shape" class="stroke-neutral"></path>
                <path d="M0.6,32.7 L27.2,32.8" id="Shape" class="stroke-neutral"></path>
                <path d="M37.8,45.5 L74.7,45.7" id="Shape" class="stroke-primary"></path>
                <path d="M0.6,45.4 L27.2,45.5" id="Shape" class="stroke-neutral"></path>
                <path d="M29.9,58.3 L50.3,58.4" id="Shape" class="stroke-neutral"></path>
                <path d="M0.6,58.1 L17,58.2" id="Shape" class="stroke-primary"></path>
                <path d="M0.5,0.4 L75.3,0.7" id="Shape" class="stroke-neutral"></path>
            </g>
        </g>
    </g>
</svg>
                        </figure>
                        <!-- Media body -->
                        <div class="media-body ml-3">
                          <h6 class="mb-1">POEM Database</h6>
                          <p class="mb-0">Per oral endoscopic myotomy</p>
                        </div>
                      </div>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a class="dropdown-item" href="' . BASE_URL1 . '/scripts/forms/POEMFormv2.php">
                          Enter new POEM
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="' . BASE_URL1 . '/scripts/forms/POEMTablev2.php">
                          Table of Lesions
                        </a>
                      </li>
                      
                    </ul>

                    
                  </li>
                  <li class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                    <a href="#" class="list-group-item list-group-item-action dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <div class="media d-flex align-items-center">
                        <!-- SVG icon -->
                        <figure style="width: 50px;">
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="147px" height="109px" viewBox="0 0 147 109" version="1.1" class="injected-svg svg-inject img-fluid" style="height: 50px;">
    <!-- Generator: Sketch 51.2 (57519) - http://www.bohemiancoding.com/sketch -->
    <title>Code_2</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Code_2" transform="translate(1.000000, 1.000000)">
            <path d="M144.1,8.5 L144.1,98.1 C144.1,102.2 140.8,105.6 136.6,105.6 L8.1,105.6 C4,105.6 0.6,102.3 0.6,98.1 L0.6,0.6 L136.1,0.6 C140.6,0.6 144.1,4.2 144.1,8.5 Z" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
            <path d="M133.7,0.6 C139.4,0.6 144.1,5.3 144.1,11 L144.1,98.1 C144.1,102.2 140.9,105.6 137,105.6 L14.3,105.6 C10.4,105.6 7.2,102.3 7.2,98.1 L7.2,0.6 L133.7,0.6 Z" id="Shape" class="fill-primary-300" fill-rule="nonzero"></path>
            <path d="M95.9,19.5 L0.7,19.5 L0.7,8.1 C0.7,4 4,0.6 8.2,0.6 L136.7,0.6 C140.8,0.6 144.2,3.9 144.2,8.1 L144.2,19.5 L119.2,19.5" id="Shape" class="fill-neutral" fill-rule="nonzero"></path>
            <path d="M134.9,19.2 L143,19.2" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M124.4,19.2 L125.4,19.2" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M1.3,19.2 L87.5,19.2" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <circle id="Oval" class="fill-primary-300" fill-rule="nonzero" cx="13.5" cy="10.2" r="3.2"></circle>
            <circle id="Oval" class="fill-primary-200" fill-rule="nonzero" cx="24.1" cy="10.2" r="3.2"></circle>
            <circle id="Oval" class="fill-primary-200" fill-rule="nonzero" cx="34.7" cy="10.2" r="3.2"></circle>
            <path d="M0.7,62.6 L0.7,61.4" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M0.7,55.2 L0.7,8 C0.7,3.9 4,0.5 8.2,0.5 L136.7,0.5 C140.8,0.5 144.2,3.8 144.2,8 L144.2,98.1 C144.2,102.2 140.9,105.6 136.7,105.6 L8.2,105.6 C4.1,105.6 0.7,102.3 0.7,98.1 L0.7,77" id="Shape" class="stroke-primary" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            <g id="Group" transform="translate(18.000000, 31.000000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
                <path d="M22.1,20.1 L48.5,20.2" id="Shape" class="stroke-neutral"></path>
                <path d="M80.9,20.1 L111.3,20.3" id="Shape" class="stroke-neutral"></path>
                <path d="M60.5,58.3 L91,58.5" id="Shape" class="stroke-primary"></path>
                <path d="M57.5,20.1 L72.3,20.2" id="Shape" class="stroke-primary"></path>
                <path d="M0.6,19.9 L11.4,20" id="Shape" class="stroke-neutral"></path>
                <path d="M37.8,32.8 L53.7,33" id="Shape" class="stroke-primary"></path>
                <path d="M62.5,32.8 L103,33.3" id="Shape" class="stroke-neutral"></path>
                <path d="M0.6,32.7 L27.2,32.8" id="Shape" class="stroke-neutral"></path>
                <path d="M37.8,45.5 L74.7,45.7" id="Shape" class="stroke-primary"></path>
                <path d="M0.6,45.4 L27.2,45.5" id="Shape" class="stroke-neutral"></path>
                <path d="M29.9,58.3 L50.3,58.4" id="Shape" class="stroke-neutral"></path>
                <path d="M0.6,58.1 L17,58.2" id="Shape" class="stroke-primary"></path>
                <path d="M0.5,0.4 L75.3,0.7" id="Shape" class="stroke-neutral"></path>
            </g>
        </g>
    </g>
</svg>
                        </figure>
                        <!-- Media body -->
                        <div class="media-body ml-3">
                          <h6 class="mb-1">Polypectomy Report Card Database</h6>
                          <p class="mb-0">Per oral endoscopic myotomy</p>
                        </div>
                      </div>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a class="dropdown-item" href="' . BASE_URL1 . '/scripts/forms/PolypectomyFormv2.php">
                          Enter new Polypectomy Report Card
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="' . BASE_URL1 . '/scripts/forms/PolypectomyForm_video.php">
                          Enter new Polypectomy Video Test
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="' . BASE_URL1 . '/scripts/forms/PolypectomyReportTablev2.php">
                          Table of Report Cards
                        </a>
                      </li>
                      
                    </ul>

                    
                  </li>
                  
                </ul>
              </div>

              
            </li>
        

            
      </div>
      
    </nav>';
    
        }else{
            echo '<div class="collapse navbar-collapse" id="navbar-main-collapse">
            <ul class="navbar-nav align-items-lg-center">
              <!-- Home - Overview  -->
              <!--<li class="nav-item active">
                <a class="nav-link" href="#">Login for options</a>
              </li>-->
              
  
              </div>
        </div>
      </nav>';

        }
    ?>

