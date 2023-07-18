<?php require '../../assets/includes/config.inc.php';?>

<?php

$openaccess = 0;
$requiredUserLevel = 2;

$formv1 = new formGenerator;
//$general = new general;
//$video = new video;
//$tagCategories = new tagCategories;

error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="At GIEQs we aim to make everyday endoscopy better.  Endoscopy is performed by a team of doctors and nurses.  Both parts of the team are important and so a nursing symposium is part of GIEQs.">
    <meta name="author" content="gieqs">
    <title>Ghent International Endoscopy Symposium - Backend</title>
    <!-- Favicon -->
    <link rel="icon" href="<?php echo BASE_URL; ?>/assets/img/brand/favicongieqs.png" type="image/png">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/swiper/dist/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.css">
    <!-- Purpose CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/purpose.css" id="stylesheet">

    <style>
    .modal-backdrop {
        opacity: 0.75 !important;
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

    </header>







    <div class="container">



        <section class="header-account-page bg-dark d-flex align-items-end" data-offset-top="#header-main"
            style="padding-top: 147.4px;">
            <!-- Header container -->
            <div class="container pt-4 pt-lg-0">
                <div class="row">
                    <div class=" col-lg-12">
                        <!-- Salute + Small stats -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-5 mb-4 mb-md-0">
                                <span class="h2 mb-0 text-white d-block">GIEQs backend</span>

                                <!-- <span class="text-white">Have a nice day!</span> -->
                            </div>
                            <!-- <div class="col-auto flex-fill d-none d-xl-block">
                <ul class="list-inline row justify-content-lg-end mb-0">
                  <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
                    <span class="badge badge-dot text-white">
                      <i class="bg-success"></i>Sales
                    </span>
                    <a class="d-sm-block h5 text-white font-weight-bold pl-2" href="#">
                      20.5%
                      <small class="fas fa-angle-up text-success"></small>
                    </a>
                  </li>
                  <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
                    <span class="badge badge-dot text-white">
                      <i class="bg-warning"></i>Tasks
                    </span>
                    <a class="d-sm-block h5 text-white font-weight-bold pl-2" href="#">
                      5.7%
                      <small class="fas fa-angle-up text-warning"></small>
                    </a>
                  </li>
                  <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
                    <span class="badge badge-dot text-white">
                      <i class="bg-danger"></i>Sales
                    </span>
                    <a class="d-sm-block h5 text-white font-weight-bold pl-2" href="#">
                      -3.24%
                      <small class="fas fa-angle-down text-danger"></small>
                    </a>
                  </li>
                </ul>
              </div> -->
                        </div>

                        <!-- Account navigation -->
                        <?php require 'backendNav.php';?>


                    </div>
                </div>
            </div>
        </section>

        <section class="slice bg-section-secondary">
            <div class="container">

                <!-- id check-->
                <?php

$formv1 = new formGenerator;

$general = new general;

$programme = new programme;

                  if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
                      $id = $_GET["id"];

                  } else {

                      $id = null;

                  }

                  if ($id) {

                      if ($programme->matchRecord($id) === FALSE) {
                          echo "No programme with that id exists";
                          exit();

                      }
                  }

                  ?>

                  <div id="data" style="display:none;">
                  <?php

                  //get an array of the known programmes [first 50]

                  echo $programme->Load_records_limit_json(50);
                  ?>
                  </div>
                  <?php
                  
                  
                  //create a standard form based on the database to be included in modals





                  ?>

                <!-- Section title -->
                <div class="actions-toolbar py-2 mb-4">
                    <div class="actions-search show" id="actions-search">
                        <div class="input-group input-group-merge input-group-flush">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-flush"
                                placeholder="Type and hit enter ...">
                            <div class="input-group-append">
                                <a href="#" class="input-group-text bg-transparent" data-action="search-close"
                                    data-target="#actions-search"><i class="fas fa-times"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between align-items-center">
                        <div class="col">
                            <h5 class="mb-1">Programmes</h5>
                            <p class="text-sm text-muted mb-0 d-none d-md-block">Manage programmes.</p>
                        </div>
                        <div class="col text-right">
                            <div class="actions"><a href="#" class="action-item mr-2 active" data-action="search-open"
                                    data-target="#actions-search"><i class="fas fa-search"></i></a>
                                <div class="dropdown mr-2">
                                    <a href="#" class="action-item" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <a href="#" class="action-item" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-filter"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(21px, 35px, 0px);">
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-sort-amount-down"></i>Newest
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-sort-alpha-down"></i>From A-Z
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-sort-alpha-up"></i>From Z-A
                                        </a>
                                    </div>
                                </div><a href="#" class="action-item mr-2"><i class="fas fa-sync"></i></a>
                                <div class="dropdown" data-toggle="dropdown">
                                    <a href="#" class="action-item" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Refresh</a>
                                        <a href="#" class="dropdown-item">Manage Widgets</a>
                                        <a href="#" class="dropdown-item">Settings</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Orders table -->
                <div class="table-responsive">
                    <table id="dataTable" class="table table-cards align-items-center">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col" class="sort">Date</th>
                                <th scope="col" class="sort">Title</th>
                                <th scope="col" class="sort">Subtitle</th>
                                <th scope="col" class="sort">Description</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">
                                    <span class="id">Apple Inc</span>
                                </td>
                                <td class="order">
                                    <span class="date d-block text-sm text-muted">ABC 00023</span>
                                </td>
                                <td>
                                    <span class="title">Apple Inc</span>
                                </td>
                                <td>
                                    <span class="subtitle text-sm mb-0">bla bla bla </span>
                                </td>
                                <td>
                                    <span class="description text-sm mb-0">bla bla bla </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-end">

                                        <!-- Actions -->
                                        <div class="actions ml-3">
                                            <a href="#" class="action-item mr-2" data-toggle="modal"
                                                data-target="#modal-row-1" data-toggle="tooltip" title=""
                                                data-original-title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="#" class="action-item mr-2" data-toggle="tooltip" title=""
                                                data-original-title="see enclosed items">
                                                <i class="fas fa-level-down-alt"></i>
                                            </a>
                                            <div class="dropdown">
                                                <a href="#" class="action-item" role="button" data-toggle="dropdown"
                                                    aria-haspopup="true" data-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#!" class="dropdown-item">
                                                        Delete
                                                    </a>
                                                    <!-- <a href="#!" class="dropdown-item">
                            Another action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Something else here
                          </a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="table-divider"></tr>

                        </tbody>
                    </table>
                </div>
                <!-- Load more -->
                <div class="mt-4 text-center">
                    <a href="#" class="btn btn-sm btn-neutral rounded-pill shadow hover-translate-y-n3">Load more
                        ...</a>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="modal-row-1" tabindex="-1" role="dialog" aria-labelledby="modal-change-username"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form>
                    <div class="modal-content bg-dark border" style="border-color:rgb(238, 194, 120) !important;">
                        <div class="modal-header">
                            <div class="modal-title d-flex align-items-left" id="modal-title-change-username">
                                <div>
                                    <div class="icon bg-dark icon-sm icon-shape icon-info rounded-circle shadow mr-3">
                                        <img src="../../assets/img/icons/gieqsicon.png">
                                    </div>
                                </div>
                                <div class="text-left">
                                    <h5 class="mb-0">Edit programme</h5>
                                    <span class="mb-0"></span>
                                </div>

                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span="text-white" aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-subheader px-3 mt-2 mb-2 border-bottom">
                            <div class="row">
                                <div class="col-sm-12 text-left">
                                    <div>
                                        <h6 class="mb-0"></h6>
                                        <span class="mb-0"></span>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body">

                            <div class="programme-body">
                                <div class="form-group">
                                    <label for="date">Date of programme</label>
                                    <div class="input-group mb-3">
                                        <input type="text" data-toggle="date" class="form-control" id="date"
                                            placeholder="choose date">
                                    </div>

                                    <label for="title">Title</label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="title" class="form-control" placeholder="Title">
                                    </div>

                                    <label for="subtitle">Subtitle</label>
                                    <div class="input-group mb-3">
                                        <textarea id="subtitle" data-toggle="autosize" class="form-control"
                                            placeholder="Subtitle"></textarea>
                                    </div>

                                    <label for="description">Description</label>
                                    <div class="input-group">
                                        <textarea id="description" data-toggle="autosize" class="form-control"
                                            placeholder="Description"></textarea>
                                    </div>
                                </div>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                                    <p class="text-muted text-sm">Data entered here will change the live site</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-success"
                                    data-dismiss="modal">Save</i></button>
                                <button type="button" class="btn btn-sm btn-danger"
                                    data-dismiss="modal">Cancel</i></button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>





</body>




<!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
<script src="../../assets/js/purpose.core.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/libs/autosize/dist/autosize.min.js"></script>
<!-- Purpose JS -->
<script src="<?php echo BASE_URL; ?>/assets/js/purpose.js"></script>
<!-- Site Location JS -->
<script src="<?php echo BASE_URL; ?>/assets/js/siteLocation.js"></script>
<!-- Datatables -->
<script src="<?php echo BASE_URL; ?>/node_modules/datatables.net/js/jquery.datatables.min.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.js"></script>

<script>

var data = $('#data').text();
var dataSet = $.parseJSON($('#data').text());

$(document).ready(function(){

  $('#dataTable').DataTable( {
       
    data: data,
    columns: [
        { data: 'id' },
        { data: 'title' },
        { data: 'subtitle' },
        { data: 'description' }
    ],
    /* data: dataSet,
        columns: [
          { data: 'id' },
          { data: 'date' },
          { data: 'title' },
          { data: 'subtitle' },
          { data: 'description' },
        ] */

          
    } );


})



</script>

<?php require BASE_URI . '/footer.php';?>




</html>