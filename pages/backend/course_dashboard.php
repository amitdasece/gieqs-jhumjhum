<?php 

require '../../assets/includes/config.inc.php';

$databaseName = 'session';

//identifier

$identifier = 'id';



//javascript general variables
//to be passed via divs on page


//define user access level

$openaccess = 0;
$requiredUserLevel = 2;

require BASE_URI . '/head.php';

$formv1 = new formGenerator;

?>

    <title>Ghent International Endoscopy Symposium - Backend - Courses Dashboard</title>

    <!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/node_modules/dropzone/dist/dropzone.css">

    <!-- Purpose CSS -->
    <!-- <link rel="stylesheet" href="<?php //echo BASE_URL; ?>/assets/css/purpose.css" id="stylesheet"> -->

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
    <script>
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    </script>
</head>

<body>
    <header class="header header-transparent" id="header-main">
        <!-- Topbar -->

        <?php require BASE_URI . '/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/nav.php';?>

    </header>







    <div class="container-fluid m-0 p-0">



        <section class="header-account-page bg-dark d-flex align-items-end" data-offset-top="#header-main"
            style="padding-top: 147.4px;">
            <!-- Header container -->
            <div class="container pt-4 pt-lg-0">
                <div class="row">
                    <div class=" col-lg-12">
                        <!-- Salute + Small stats -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-5 mb-4 mb-md-0">
                                <span class="h2 mb-0 text-white d-block">GIEQs administration server</span>

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

error_reporting(E_ALL);

//$session = new session;



${$databaseName} = new $databaseName;

$courseManager = new courseManager;

$assetManager = new assetManager;

$assets_paid = new assets_paid;

$emails = new emails;

$emails = new emailContent;


$databaseName = assets_paid;


//eval("\$" . $databaseName . " = new " . $databaseName . ";");

//$programme = new programme;

//print_r($_GET);

//TODO update all top of files like this

if (isset($_GET['identifier']) && is_numeric($_GET['identifier'])) {
    $identifierValue = $_GET['identifier'];
    //echo $identifierValue;

} else {

    $identifierValue = null;

}

if ($identifierValue) {

    $sessionIdentifier = $identifierValue;

    $validRecord = $assets_paid->matchRecord($sessionIdentifier);

    if ($validRecord === false) {
        echo "No asset with that id exists";
        exit();

    }else{

        $assets_paid->Load_from_key($sessionIdentifier);
    }
}

?>

                <div id="data" style="display:none;">
                    <?php

//get an array of the known programmes [first 50]

//echo ${$databaseName}->Load_records_limit_json(50);
?>
                </div>
                <?php

//create a standard form based on the database to be included in modals

?>



                <!--alerts-->

                <div id="topTableAlert" class="alert alert-success alert-flush collapse" role="alert">
                    <span id="topTableSuccess"></span>
                </div>

                <!-- Section title -->
                <div class="actions-toolbar py-2 mb-4">

                    <div class="row justify-content-between align-items-center">
                        <div class="col">
                            <h5 class="mb-1"><?php echo 'Course Dashboard - ' . $assets_paid->getname();?></h5>
                            <p class="text-sm text-muted mb-0 d-none d-md-block"></p>
                        </div>
                        <div class="col text-right">
                            <div class="actions">
                                <!-- <a href="#" class="action-item mr-2 active" data-action="search-open"
                                    data-target="#actions-search"><i class="fas fa-search"></i></a> -->
                                <!--                                     <a href="#" id="add<?php //echo $databaseName;?>" class="action-item mr-2 active"><i class="fas fa-plus"></i></a>
 -->
                                <!-- <div class="dropdown mr-2">
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
                                </div> -->
                                <!-- <a href="#" class="action-item mr-2"><i class="fas fa-sync"></i></a> -->
                                <!-- <div class="dropdown" data-toggle="dropdown">
                                    <a href="#" class="action-item" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Refresh</a>
                                        <a href="#" class="dropdown-item">Manage Widgets</a>
                                        <a href="#" class="dropdown-item">Settings</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Orders table -->

                <form>
                    <div id="sessionView">






                    </div>
                </form>

                <!-- Load more -->
                <!-- <div class="mt-4 text-center">
                    <a href="#" class="btn btn-sm btn-neutral rounded-pill shadow hover-translate-y-n3">Load more
                        ...</a>
                </div> -->
            </div>
        </section>


    </div>

    <!-- Modal -->
    <!--diverged to external file sessionForm.html-->
    <?php require(BASE_URI . '/pages/backend/forms/sessionForm.php');?>

    <!-- modal 1,5 sessionItem -->
    <?php require(BASE_URI . '/pages/backend/forms/sessionItemFormMultiple.php');?>

    <!-- modal 2,5 asset -->
    <?php require(BASE_URI . '/pages/backend/forms/assetForm.php');?>

    <!-- modal 2,5 asset -->
    <?php require(BASE_URI . '/pages/backend/forms/emailForm.php');?>

    <!-- modal 2,5 asset -->
    <?php require(BASE_URI . '/pages/backend/forms/emailCreateForm.php');?>


    <!-- Modal 2, moderator -->
    <div class="modal fade" id="modal-moderator" tabindex="-1" role="dialog" aria-labelledby="modal-change-username"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content mc2 bg-dark border" style="border-color:rgb(238, 194, 120) !important;">
                <div class="modal-header">
                    <div class="modal-title d-flex align-items-left" id="modal-title-change-username">
                        <div>
                            <div class="icon bg-dark icon-sm icon-shape icon-info rounded-circle shadow mr-3">
                                <img src="../../assets/img/icons/gieqsicon.png">
                            </div>
                        </div>
                        <div class="text-left">
                            <h5 class="mb-0">Add a Moderator</h5>
                            <span class="mb-0"></span>
                        </div>

                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-subheader px-3 mt-2 mb-2 border-bottom">
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <div>
                                <h6 class="mb-0"></h6>
                                <span id="modalMessageArea" class="mb-0"></span>

                            </div>
                            <div id="topModalAlert" class="alert alert-warning alert-flush collapse" role="alert">
                                <span id="topModalSuccess"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body">

                    <div class="moderator-body">
                        <form id="moderator-form">
                            <div class="form-group">
                                <!-- EDIT -->

                                <label for="moderatorid">Select moderator</label>
                                <div class="input-group mb-3">
                                    <select id="moderatorid" data-toggle="select" class="form-control"
                                        name="moderatorid">
                                        <option value="" selected disabled hidden>please select an option</option>

                                    </select>
                                </div>







                            </div>
                        </form>

                        <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                            <p class="text-muted text-sm">Data entered here will change the live site</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="submit-moderator-form btn btn-sm btn-success">Save</button>
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

    </div>










    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="../../assets/js/purpose.core.js"></script> -->

    <script src="<?php echo BASE_URL; ?>/assets/libs/autosize/dist/autosize.min.js"></script>

    <!-- Datatables -->
    <script src="<?php echo BASE_URL; ?>/node_modules/datatables.net/js/jquery.datatables.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/node_modules/dropzone/dist/dropzone.js"></script>




    <script>
    //var data = $('#data').text();
    //var dataSet = $.parseJSON($('#data').text());
    var datatable;
    var edit = 0;
    var lesionUnderEdit = null;
    var editSessionItem = 0;
    var editModerator = 0;
    var sessionItemUnderEdit = null;
    var moderatorUnderEdit = null;
    Dropzone.autoDiscover = false;
    var assetUnderEdit = null;

    //generic functions

    function tableRefresh() {

        //update the div at the top with AJAX

        // refresh the table


    }

    /* COURSE EMAIL FUNCTIONS */


    //email attach functions


    //definitions

    var editEmail = 0;

    var emailUnderEdit = null;

    var file_up_names = [];



    function fillFormEmail(idPassed) {

        disableFormInputs("sessionItem-form");

        var formString = $('#sessionItem-form').serializeFormJSON();

        formString["sessionItemid"] = idPassed;

        const jsonString = JSON.stringify(formString);
        console.log(jsonString);

        var request = $.ajax({
            url: siteRoot + "assets/scripts/getSessionItem.php", //TODO make this file
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request.done(function(data) {
            // alert( "success" );

            if (data) {
                var formData = $.parseJSON(data);
                console.dir(formData);


                //do something with the select2



                //TODO required for faculty
                var faculty = (formData[0]['faculty']);

                $.ajax({
                    //url: siteRoot + 'assets/scripts/select2simple.php?table=Delegate&field=firstname',

                    url: siteRoot +
                        'assets/scripts/classes/querySelectFacultySingleOption.php?search=' + faculty,

                }).then(function(data) {
                    // create the option and append to Select2
                    var retrievedProgramme = $.parseJSON(data);
                    //console.log(retrievedProgramme);
                    var option = new Option(retrievedProgramme.text, retrievedProgramme.id, true, true);
                    $('#SIfaculty').append(option).trigger('change');

                    // manually trigger the `select2:select` event
                    $('#SIfaculty').trigger({
                        type: 'select2:select',
                        params: {
                            data: data
                        }
                    });
                });

                var url = (formData[0]['url_video']);


                $.ajax({
                    //url: siteRoot + 'assets/scripts/select2simple.php?table=Delegate&field=firstname',

                    url: siteRoot + 'assets/scripts/classes/querySelectVideoOption.php?search=' + url,

                }).then(function(data) {
                    // create the option and append to Select2
                    var retrievedProgramme = $.parseJSON(data);
                    //console.log(retrievedProgramme);
                    var option = new Option(retrievedProgramme.text, retrievedProgramme.id, true, true);
                    $('#SIurl_video').append(option).trigger('change');

                    // manually trigger the `select2:select` event
                    $('#SIurl_video').trigger({
                        type: 'select2:select',
                        params: {
                            data: data
                        }
                    });
                });






                $(formData).each(function(i, val) {
                    $.each(val, function(k, v) {
                        $("#SI" + k).val(v).trigger('change');
                        //console.log(k+' : '+ v);
                    });

                });

                enableFormInputs("sessionItem-form");


            } else {

                alert('please try again');

            }
        })





    }

    function submitEmailForm() {

        //pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)

        var idPassed = emailUnderEdit;

        console.log('got to the submit function for email item' + emailUnderEdit);

        if (editEmail == 0) {


            const dataToSend = {

                assetid: $('.editAsset').attr('data'),
                assets_course_id: emailUnderEdit,

            }

            const jsonString = JSON.stringify(dataToSend);
            console.log(jsonString);



            var request = $.ajax({
                url: siteRoot + "assets/scripts/courses/addEmail.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request.done(function(data) {
                // alert( "success" );

                if (data == 1) {
                    refreshSessionView();
                } else if (data == 4) {

                    alert('This link already exists.  Try again');

                }
            })


            //alert ("New esdLesion no "+data+" created");
            $('#topTableSuccess').text("New sessionItem no " + data + " created");

            $('#modal-email').animate({
                scrollTop: 0
            }, 'slow');


            $("#topTableAlert").fadeTo(4000, 500).slideUp(500, function() {
                $("#topTableAlert").slideUp(500);
            });

            //edit = 1;

            //refresh table
            refreshSessionView();

            //close modal
            $('#modal-email').modal('hide');


        } else if (editSessionItem == 1) {

            //

            var formString = $('#sessionItem-form').serializeFormJSONModifier();

            disableFormInputs("sessionItem-form");
            //get session id

            console.dir(formString);

            formString["sessionItemid"] = idPassed;
            formString["update"] = 1;
            //formString["programmeid"] = ; get from the form

            const jsonString = JSON.stringify(formString);
            console.log(jsonString);

            var request = $.ajax({
                url: siteRoot + "assets/scripts/createUpdateSessionItem.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request.done(function(data) {
                // alert( "success" );

                if (data) {

                    //decode data
                    var returnedData = $.parseJSON(data);

                    console.dir(returnedData);


                    var wasSessionItemUpdated = returnedData.updatedSessionItem;
                    //check it for 1's

                    if (wasSessionItemUpdated == 1) {

                        console.log('we know data was updated / saved');
                    }

                    //console.log(data);
                    enableFormInputs("sessionItem-form");
                    $('#topModalSuccess').text("Data for <?php echo $databaseName;?> " + idPassed + " saved");

                    $('#modal-sessionItem').animate({
                        scrollTop: 0
                    }, 'slow');

                    $("#topModalAlert-sessionItem").fadeTo(4000, 500).slideUp(500, function() {
                        $("#topTableAlert").slideUp(500);
                    });


                    refreshSessionView();



                } else {

                    alert('please try again');

                }
            })




        }


    }


    //document ready functions

    $(document).ready(function() {


        $(document).on('click', '.addEmail', function() {

            //define session id


            $('#modal-email').modal('show');

            //fillFormEmail(sessionid);

            edit = 0;

        })


        $(document).on('click', '.editEmail', function() {

            //define session id

            var sessionid = $(this).attr('data');

            console.log(sessionid);

            $('#modal-email').modal('show');

            fillFormEmail(sessionid);

            edit = 1;

        })

        $(document).on('click', '.deleteEmail', function() {


            //TODO add a sessionItem form
            //GET the ID of the sessionItem required to edit
            //update this from here via a template form
            //use the tempate form for the table later

            var sessionItemID = $(this).parent().prev().prev().text();
            console.log(sessionItemID);
            const dataToSend = {

                sessionItemID: sessionItemID,
                sessionid: <?php echo $sessionIdentifier; ?>,

            }

            const jsonString = JSON.stringify(dataToSend);
            console.log(jsonString);



            var request = $.ajax({
                url: siteRoot + "assets/scripts/deleteSessionItem.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request.done(function(data) {
                // alert( "success" );

                if (data == 1) {
                    refreshSessionView();
                } else if (data == 4) {

                    alert('This record does not exist.  Try again');

                }
            })



        })


        //validation

        //extra methods

        $.validator.addMethod("time24", function(value, element) {
            if (!/^\d{2}:\d{2}:\d{2}$/.test(value)) return false;
            var parts = value.split(':');
            if (parts[0] > 23 || parts[1] > 59 || parts[2] > 59) return false;
            return true;
        }, "Invalid time format.");

        //form validation

        $("#email-form").validate({

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
            ignore: [],
            rules: {

                //EDIT




                name: {
                    required: true,

                },



                description: {
                    required: true,

                },



                asset_type: {
                    required: true,

                },



                assetid: {
                    required: true,

                },



                path: {
                    required: true,

                },



                send_date: {
                    required: true,
                    date: true,

                },



                time_send: {
                    required: true,
                    time24: true,

                },




            },
            messages: {



            },


            submitHandler: function(form) {

                //submitPreRegisterForm();

                submitEmailForm();

                //TODO submit changes
                //TODO reimport the array at the top
                //TODO redraw the table



            }




        });

        //extra functions for email

        //file upload


        $("#id_dropzone").dropzone({
            maxFiles: 1,
            /* acceptedFiles: 'image/jpeg, image/png, image/gif, video/*, application/pdf, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.presentation, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document', */
            acceptedFiles: '.html,',

            createImageThumbnails: true,
            addRemoveLinks: true,
            url: siteRoot + "/pages/backend/uploadFileAsset.php",
            success: function(file, response) {
                console.log(response);
                file_up_names.push(response);

                //the file is stored at pages/backend/uploads/response
            },
            removedfile: function(file) {

                x = confirm('Do you want to delete?');
                if (!x) return false;
                for (var i = 0; i < file_up_names.length; ++i) {

                    if (file_up_names[i] == file.name) {

                        $.post('delete_file.php', {
                                file_name: file_up_names[i]
                            },
                            function(data, status) {
                                alert('file deleted');
                            });
                    }
                }
            }

        });

    });


    /* EMAIL CREATION FUNCTIONS */


    //email attach functions


    //definitions

    var editEmailCreate = 0;

    var emailCreateUnderEdit = null;

    var file_up_names_create = [];



    function fillFormEmailCreate(idPassed) {

        disableFormInputs("sessionItem-form");

        var formString = $('#sessionItem-form').serializeFormJSON();

        formString["sessionItemid"] = idPassed;

        const jsonString = JSON.stringify(formString);
        console.log(jsonString);

        var request = $.ajax({
            url: siteRoot + "assets/scripts/getSessionItem.php", //TODO make this file
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request.done(function(data) {
            // alert( "success" );

            if (data) {
                var formData = $.parseJSON(data);
                console.dir(formData);


                //do something with the select2



                //TODO required for faculty
                var faculty = (formData[0]['faculty']);

                $.ajax({
                    //url: siteRoot + 'assets/scripts/select2simple.php?table=Delegate&field=firstname',

                    url: siteRoot +
                        'assets/scripts/classes/querySelectFacultySingleOption.php?search=' + faculty,

                }).then(function(data) {
                    // create the option and append to Select2
                    var retrievedProgramme = $.parseJSON(data);
                    //console.log(retrievedProgramme);
                    var option = new Option(retrievedProgramme.text, retrievedProgramme.id, true, true);
                    $('#SIfaculty').append(option).trigger('change');

                    // manually trigger the `select2:select` event
                    $('#SIfaculty').trigger({
                        type: 'select2:select',
                        params: {
                            data: data
                        }
                    });
                });

                var url = (formData[0]['url_video']);


                $.ajax({
                    //url: siteRoot + 'assets/scripts/select2simple.php?table=Delegate&field=firstname',

                    url: siteRoot + 'assets/scripts/classes/querySelectVideoOption.php?search=' + url,

                }).then(function(data) {
                    // create the option and append to Select2
                    var retrievedProgramme = $.parseJSON(data);
                    //console.log(retrievedProgramme);
                    var option = new Option(retrievedProgramme.text, retrievedProgramme.id, true, true);
                    $('#SIurl_video').append(option).trigger('change');

                    // manually trigger the `select2:select` event
                    $('#SIurl_video').trigger({
                        type: 'select2:select',
                        params: {
                            data: data
                        }
                    });
                });






                $(formData).each(function(i, val) {
                    $.each(val, function(k, v) {
                        $("#SI" + k).val(v).trigger('change');
                        //console.log(k+' : '+ v);
                    });

                });

                enableFormInputs("sessionItem-form");


            } else {

                alert('please try again');

            }
        })





    }

    function submitEmailCreateForm() {

        //pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)

        var idPassed = emailUnderEdit;

        console.log('got to the submit function for email item' + emailUnderEdit);

        if (editEmail == 0) {


            const dataToSend = {

                assetid: $('.editAsset').attr('data'),
                assets_course_id: emailUnderEdit,

            }

            const jsonString = JSON.stringify(dataToSend);
            console.log(jsonString);



            var request = $.ajax({
                url: siteRoot + "assets/scripts/courses/addEmail.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request.done(function(data) {
                // alert( "success" );

                if (data == 1) {
                    refreshSessionView();
                } else if (data == 4) {

                    alert('This link already exists.  Try again');

                }
            })


            //alert ("New esdLesion no "+data+" created");
            $('#topTableSuccess').text("New sessionItem no " + data + " created");

            $('#modal-email').animate({
                scrollTop: 0
            }, 'slow');


            $("#topTableAlert").fadeTo(4000, 500).slideUp(500, function() {
                $("#topTableAlert").slideUp(500);
            });

            //edit = 1;

            //refresh table
            refreshSessionView();

            //close modal
            $('#modal-email').modal('hide');


        } else if (editSessionItem == 1) {

            //

            var formString = $('#sessionItem-form').serializeFormJSONModifier();

            disableFormInputs("sessionItem-form");
            //get session id

            console.dir(formString);

            formString["sessionItemid"] = idPassed;
            formString["update"] = 1;
            //formString["programmeid"] = ; get from the form

            const jsonString = JSON.stringify(formString);
            console.log(jsonString);

            var request = $.ajax({
                url: siteRoot + "assets/scripts/createUpdateSessionItem.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request.done(function(data) {
                // alert( "success" );

                if (data) {

                    //decode data
                    var returnedData = $.parseJSON(data);

                    console.dir(returnedData);


                    var wasSessionItemUpdated = returnedData.updatedSessionItem;
                    //check it for 1's

                    if (wasSessionItemUpdated == 1) {

                        console.log('we know data was updated / saved');
                    }

                    //console.log(data);
                    enableFormInputs("sessionItem-form");
                    $('#topModalSuccess').text("Data for <?php echo $databaseName;?> " + idPassed + " saved");

                    $('#modal-sessionItem').animate({
                        scrollTop: 0
                    }, 'slow');

                    $("#topModalAlert-sessionItem").fadeTo(4000, 500).slideUp(500, function() {
                        $("#topTableAlert").slideUp(500);
                    });


                    refreshSessionView();



                } else {

                    alert('please try again');

                }
            })




        }


    }


    //document ready functions

    $(document).ready(function() {


        $(document).on('click', '.addEmailCreate', function() {

            //define session id


            $('#modal-emailCreate').modal('show');

            //fillFormEmail(sessionid);

            edit = 0;

        })


        $(document).on('click', '.editEmail', function() {

            //define session id

            var sessionid = $(this).attr('data');

            console.log(sessionid);

            $('#modal-email').modal('show');

            fillFormEmail(sessionid);

            edit = 1;

        })

        $(document).on('click', '.deleteEmailCreate', function() {


            //TODO add a sessionItem form
            //GET the ID of the sessionItem required to edit
            //update this from here via a template form
            //use the tempate form for the table later

            var sessionItemID = $(this).parent().prev().prev().text();
            console.log(sessionItemID);
            const dataToSend = {

                sessionItemID: sessionItemID,
                sessionid: <?php echo $sessionIdentifier; ?>,

            }

            const jsonString = JSON.stringify(dataToSend);
            console.log(jsonString);



            var request = $.ajax({
                url: siteRoot + "assets/scripts/deleteSessionItem.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request.done(function(data) {
                // alert( "success" );

                if (data == 1) {
                    refreshSessionView();
                } else if (data == 4) {

                    alert('This record does not exist.  Try again');

                }
            })



        })


        //validation

        //extra methods

        

        //form validation

        $("#emailCreate-form").validate({

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
            ignore: [],
            rules: {

                //EDIT




                name: {
                    required: true,

                },



                description: {
                    required: true,

                },



                asset_type: {
                    required: true,

                },



                assetid: {
                    required: true,

                },



                path: {
                    required: true,

                },



                send_date: {
                    required: true,
                    date: true,

                },



                time_send: {
                    required: true,
                    time24: true,

                },




            },
            messages: {



            },


            submitHandler: function(form) {

                //submitPreRegisterForm();

                submitEmailForm();

                //TODO submit changes
                //TODO reimport the array at the top
                //TODO redraw the table



            }




        });

        //extra functions for email

        //file upload


        

    });




    function fillFormSession(idPassed) {

        disableFormInputs("session-form");

        var formString = $('#session-form').serializeFormJSON();

        formString["sessionid"] = idPassed;

        const jsonString = JSON.stringify(formString);
        console.log(jsonString);

        var request = $.ajax({
            url: siteRoot + "assets/scripts/getSession.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request.done(function(data) {
            // alert( "success" );

            if (data) {
                var formData = $.parseJSON(data);
                console.log(formData);

                //do something with the select2




                var requiredProgramme = (formData[0]['programmeid']);

                $.ajax({
                    //url: siteRoot + 'assets/scripts/select2simple.php?table=Delegate&field=firstname',

                    url: siteRoot +
                        'assets/scripts/classes/querySelectProgrammeSingleOption.php?search=' +
                        requiredProgramme,

                }).then(function(data) {
                    // create the option and append to Select2
                    var retrievedProgramme = $.parseJSON(data);
                    //console.log(retrievedProgramme);
                    var option = new Option(retrievedProgramme.text, retrievedProgramme.id, true, true);
                    $('#programmeid').append(option).trigger('change');

                    // manually trigger the `select2:select` event
                    $('#programmeid').trigger({
                        type: 'select2:select',
                        params: {
                            data: data
                        }
                    });
                });






                $(formData).each(function(i, val) {
                    $.each(val, function(k, v) {
                        $("#" + k).val(v).trigger('change');
                        //console.log(k+' : '+ v);
                    });

                });

                enableFormInputs("session-form");


            } else {

                alert('please try again');

            }
        })





    }

    function fillFormSessionItem(idPassed) {

        disableFormInputs("sessionItem-form");

        var formString = $('#sessionItem-form').serializeFormJSON();

        formString["sessionItemid"] = idPassed;

        const jsonString = JSON.stringify(formString);
        console.log(jsonString);

        var request = $.ajax({
            url: siteRoot + "assets/scripts/getSessionItem.php", //TODO make this file
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request.done(function(data) {
            // alert( "success" );

            if (data) {
                var formData = $.parseJSON(data);
                console.dir(formData);


                //do something with the select2



                //TODO required for faculty
                var faculty = (formData[0]['faculty']);

                $.ajax({
                    //url: siteRoot + 'assets/scripts/select2simple.php?table=Delegate&field=firstname',

                    url: siteRoot +
                        'assets/scripts/classes/querySelectFacultySingleOption.php?search=' + faculty,

                }).then(function(data) {
                    // create the option and append to Select2
                    var retrievedProgramme = $.parseJSON(data);
                    //console.log(retrievedProgramme);
                    var option = new Option(retrievedProgramme.text, retrievedProgramme.id, true, true);
                    $('#SIfaculty').append(option).trigger('change');

                    // manually trigger the `select2:select` event
                    $('#SIfaculty').trigger({
                        type: 'select2:select',
                        params: {
                            data: data
                        }
                    });
                });

                var url = (formData[0]['url_video']);


                $.ajax({
                    //url: siteRoot + 'assets/scripts/select2simple.php?table=Delegate&field=firstname',

                    url: siteRoot + 'assets/scripts/classes/querySelectVideoOption.php?search=' + url,

                }).then(function(data) {
                    // create the option and append to Select2
                    var retrievedProgramme = $.parseJSON(data);
                    //console.log(retrievedProgramme);
                    var option = new Option(retrievedProgramme.text, retrievedProgramme.id, true, true);
                    $('#SIurl_video').append(option).trigger('change');

                    // manually trigger the `select2:select` event
                    $('#SIurl_video').trigger({
                        type: 'select2:select',
                        params: {
                            data: data
                        }
                    });
                });






                $(formData).each(function(i, val) {
                    $.each(val, function(k, v) {
                        $("#SI" + k).val(v).trigger('change');
                        //console.log(k+' : '+ v);
                    });

                });

                enableFormInputs("sessionItem-form");


            } else {

                alert('please try again');

            }
        })





    }

    function submit<?php echo $databaseName; ?>Form() {

        //pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)

        var idPassed = $('.editSession').attr('data');

        console.log('got to the submit function');

        if (edit == 0) {

            var esdLesionObject = pushFormDataJSON($("#<?php echo $databaseName;?>-form"),
                "<?php echo $databaseName;?>", "id", null, "0"); //insert new object

            esdLesionObject.done(function(data) {

                console.log(data);

                if (data) {

                    //alert ("New esdLesion no "+data+" created");
                    $('#topTableSuccess').text("New <?php echo $databaseName;?> no " + data + " created");

                    $('#modal-row-1').animate({
                        scrollTop: 0
                    }, 'slow');


                    $("#topTableAlert").fadeTo(4000, 500).slideUp(500, function() {
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

            //

            var formString = $('#session-form').serializeFormJSON();

            disableFormInputs("session-form");
            //get session id

            console.log(formString);

            formString["sessionid"] = idPassed;
            formString["update"] = 1;
            //formString["programmeid"] = ; get from the form

            const jsonString = JSON.stringify(formString);
            console.log(jsonString);

            var request = $.ajax({
                url: siteRoot + "assets/scripts/createUpdateSession.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request.done(function(data) {
                // alert( "success" );

                if (data) {

                    //decode data
                    var returnedData = $.parseJSON(data);

                    console.dir(returnedData);

                    var wasProgrammeUpdated = returnedData.updatedProgramme;
                    console.log(wasProgrammeUpdated);
                    var wasSessionUpdated = returnedData.updatedSession;
                    //check it for 1's

                    if (wasProgrammeUpdated == 1 || wasSessionUpdated == 1) {

                        console.log('we know data was updated / saved');
                    }

                    //console.log(data);
                    enableFormInputs("session-form");
                    $('#topModalSuccess').text("Data for <?php echo $databaseName;?> " + idPassed + " saved");

                    $('#modal-session').animate({
                        scrollTop: 0
                    }, 'slow');

                    $("#topModalAlert").fadeTo(4000, 500).slideUp(500, function() {
                        $("#topTableAlert").slideUp(500);
                    });


                    refreshSessionView();



                } else {

                    alert('please try again');

                }
            })




        }


    }

    function submitSessionItemForm() {



        var idPassed = sessionItemUnderEdit;

        console.log('got to the submit function for session item' + sessionItemUnderEdit);

        if (editSessionItem == 0) {

            var esdLesionObject = pushFormDataJSONModifier($("#sessionItem-form"), "sessionItem", "id", null,
                "0"); //insert new object

            esdLesionObject.done(function(data) {

                console.log(data);

                if (data) {

                    //INSERT THE ITEM TO MATCH DATA TO THE 

                    data = data.trim();

                    const dataToSend = {

                        sessionItemid: data,
                        sessionid: <?php echo $sessionIdentifier; ?>,

                    }

                    const jsonString = JSON.stringify(dataToSend);
                    console.log(jsonString);



                    var request = $.ajax({
                        url: siteRoot + "assets/scripts/addSessionItemJoin.php",
                        type: "POST",
                        contentType: "application/json",
                        data: jsonString,
                    });



                    request.done(function(data) {
                        // alert( "success" );

                        if (data == 1) {
                            refreshSessionView();
                        } else if (data == 4) {

                            alert('This link already exists.  Try again');

                        }
                    })


                    //alert ("New esdLesion no "+data+" created");
                    $('#topTableSuccess').text("New sessionItem no " + data + " created");

                    $('#modal-sessionItem').animate({
                        scrollTop: 0
                    }, 'slow');


                    $("#topTableAlert").fadeTo(4000, 500).slideUp(500, function() {
                        $("#topTableAlert").slideUp(500);
                    });

                    //edit = 1;

                    //refresh table
                    refreshSessionView();

                    //close modal
                    $('#modal-sessionItem').modal('hide');





                } else {

                    alert("No data inserted, try again");

                }


            });

        } else if (editSessionItem == 1) {



            var formString = $('#sessionItem-form').serializeFormJSONModifier();

            disableFormInputs("sessionItem-form");
            //get session id

            console.dir(formString);

            formString["sessionItemid"] = idPassed;
            formString["update"] = 1;
            //formString["programmeid"] = ; get from the form

            const jsonString = JSON.stringify(formString);
            console.log(jsonString);

            var request = $.ajax({
                url: siteRoot + "assets/scripts/createUpdateSessionItem.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request.done(function(data) {
                // alert( "success" );

                if (data) {

                    //decode data
                    var returnedData = $.parseJSON(data);

                    console.dir(returnedData);


                    var wasSessionItemUpdated = returnedData.updatedSessionItem;
                    //check it for 1's

                    if (wasSessionItemUpdated == 1) {

                        console.log('we know data was updated / saved');
                    }

                    //console.log(data);
                    enableFormInputs("sessionItem-form");
                    $('#topModalSuccess').text("Data for <?php echo $databaseName;?> " + idPassed + " saved");

                    $('#modal-sessionItem').animate({
                        scrollTop: 0
                    }, 'slow');

                    $("#topModalAlert-sessionItem").fadeTo(4000, 500).slideUp(500, function() {
                        $("#topTableAlert").slideUp(500);
                    });


                    refreshSessionView();



                } else {

                    alert('please try again');

                }
            })




        }


    }






    function submitModeratorForm() {

        //get id of moderator from form

        var id = $('#modal-moderator').find('#moderatorid').val()

        //refresh the ajax

        const dataToSend = {

            moderatorid: $('#modal-moderator').find('#moderatorid').val(),
            sessionid: <?php echo $sessionIdentifier; ?>,

        }

        const jsonString = JSON.stringify(dataToSend);
        console.log(jsonString);



        var request = $.ajax({
            url: siteRoot + "assets/scripts/addModerator.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request.done(function(data) {
            // alert( "success" );

            if (data) {
                $('#modal-moderator').modal('hide');
                refreshSessionView();
            } else {

                alert('please try again');

            }
        })




    }

    //delete behaviour

    function deleteRow(id) {

        //esdLesionPassed is the current record, some security to check its also that in the id field

        /* if (esdLesionPassed != $("#id").text()){

            return;

        } */


        if (confirm("Do you wish to delete this <?php echo $databaseName;?>?")) {

            disableFormInputs("<?php echo $databaseName;?>-form");

            var esdLesionObject = pushFormDataJSON($("#<?php echo $databaseName;?>-form"),
                "<?php echo $databaseName;?>", "id", id, "2"); //delete esdLesion

            esdLesionObject.done(function(data) {

                console.log(data);

                if (data) {

                    if (data == 1) {

                        $('#topTableSuccess').text("<?php echo $databaseName;?> deleted");

                        $("#topTableAlert").removeClass("alert-success").addClass("alert-danger").fadeTo(4000,
                            500).slideUp(500, function() {
                            $("#topTableAlert").slideUp(500);
                        });
                        //TODO refresh the table from AJAX
                        //esdLesionPassed = null;
                        //window.location.href = siteRoot + "scripts/forms/esdLesionTable.php";
                        //location.reload();
                        datatable.ajax.reload();


                        enableFormInputs("<?php echo $databaseName;?>-form");

                        //go to esdLesion list

                    } else {

                        alert("Error, could not delete.  Please try again");

                        enableFormInputs("<?php echo $databaseName;?>-form");

                    }



                }


            });

        }


    }

    function refreshSessionView() {



        const dataToSend = {

            sessionid: <?php echo $sessionIdentifier; ?>,

        }

        const jsonString = JSON.stringify(dataToSend);
        console.log(jsonString);

        var request2 = $.ajax({
            url: siteRoot + "assets/scripts/classes/generateSessionViewCourse.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request2.done(function(data) {
            // alert( "success" );
            $('#sessionView').html(data);
        })
    }



    $(document).ready(function() {





        //add those which require date pickr

        $.fn.serializeFormJSON = function() {

            var o = {};
            var a = this.serializeArray();
            $.each(a, function() {
                if (o[this.name]) {
                    if (!o[this.name].push) {
                        o[this.name] = [o[this.name]];
                    }
                    o[this.name].push(this.value || '');
                } else {
                    o[this.name] = this.value || '';
                }
            });
            return o;
        };

        $.fn.serializeFormJSONModifier = function() {

            var o = {};
            var p = {};
            var a = this.serializeArray();
            $.each(a, function() {
                if (o[this.name]) {
                    if (!o[this.name].push) {
                        o[this.name] = [o[this.name]];
                    }
                    o[this.name].push(this.value || '');
                } else {
                    o[this.name] = this.value || '';
                }
            });
            console.dir(o);
            $.each(o, function(k, v) {

                var modifiedName1 = k;

                var modifiedName = modifiedName1.replace('SI', '');
                console.log(modifiedName);
                p[modifiedName] = v;

            });
            return p;
        };



        /* var options = {

            enableTime: true,
            dateFormat: "H:i",
            allowInput: true
        };

        $('#time_send').flatpickr(options); */

        var optionsDate = {
            enableTime: false,
            allowInput: true
        };
        $("#send_date").flatpickr(optionsDate);

        // add those which require select2 box

        $('[data-toggle="select"]').select2({

            //dropdownParent: $(".modal-content"),
            //theme: "bootstrap",

        });

        $('#programmeid').select2({

            dropdownParent: $("#modal-session"),

            ajax: {
                //url: siteRoot + 'assets/scripts/select2simple.php?table=Delegate&field=firstname',
                url: siteRoot + 'assets/scripts/classes/queryProgrammeSelect.php',
                data: function(params) {
                    var query = {
                        search: params.term,
                        query: '`id`, `date`, `title` FROM `programme`',
                        fieldRequired: 'date',
                    }

                    // Query parameters will be 
                    console.log(query);
                    return query;
                },
                dataType: 'json'
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }



        });

        $('#moderatorid').select2({

            dropdownParent: $("#modal-moderator"),

            ajax: {
                //url: siteRoot + 'assets/scripts/select2simple.php?table=Delegate&field=firstname',
                url: siteRoot + 'assets/scripts/classes/queryModeratorSelect.php',
                data: function(params) {
                    var query = {
                        search: params.term,
                    }

                    // Query parameters will be 
                    console.log(query);
                    return query;
                },
                dataType: 'json'
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }



        });

        $('#SIfaculty').select2({

            dropdownParent: $("#modal-sessionItem"),

            ajax: {
                //url: siteRoot + 'assets/scripts/select2simple.php?table=Delegate&field=firstname',
                url: siteRoot + 'assets/scripts/classes/queryModeratorSelect.php',
                data: function(params) {
                    var query = {
                        search: params.term,
                    }

                    // Query parameters will be 
                    console.log(query);
                    return query;
                },
                dataType: 'json'
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }



        });

        $('#SIurl_video').select2({

            dropdownParent: $("#modal-sessionItem"),

            ajax: {
                //url: siteRoot + 'assets/scripts/select2simple.php?table=Delegate&field=firstname',
                url: siteRoot + 'assets/scripts/classes/queryVideoSelect.php',
                data: function(params) {
                    var query = {
                        search: params.term,
                    }

                    // Query parameters will be 
                    console.log(query);
                    return query;
                },
                dataType: 'json'
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }



        });

        <?php

    

    if ($sessionIdentifier) {
        ?>

        const dataToSend = {

            sessionid: <?php echo $sessionIdentifier; ?>,

        }

        const jsonString = JSON.stringify(dataToSend);
        console.log(jsonString);



        var request = $.ajax({
            url: siteRoot + "assets/scripts/classes/generateSessionViewCourse.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request.done(function(data) {
            // alert( "success" );
            $('#sessionView').html(data);
        })
        <?php
    } else {

        //TODO echo blank form
    } ?>




        /* datatable = $('#dataTable').DataTable({

            language: {
                infoEmpty: "There are currently no active <?php //echo $databaseName;?>s.",
                emptyTable: "There are currently no active <?php //echo $databaseName;?>s.",
                zeroRecords: "There are currently no active <?php //echo $databaseName;?>s.",
            },
            autowidth: true,


            ajax: siteRoot +
                'assets/scripts/tableInteractors/refresh<?php //echo $databaseName;?>Table.php',
            //TODO all classes need this function


            //EDIT
            columns: [{
                    data: 'id'
                },
                {
                    data: 'firstname'
                },
                {
                    data: 'surname'
                },
                {
                    data: 'user_id'
                },
                {
                    data: 'email'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return '<div class="d-flex align-items-center justify-content-end"><div class="actions ml-3"><a class="fill-modal action-item mr-2"  data-toggle="tooltip" title="edit this row" data-original-title="Edit"> <i class="fas fa-pencil-alt"></i> </a> <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="see enclosed items"> <i class="fas fa-level-down-alt"></i> </a> <div class="dropdown"> <a href="#" class="action-item" role="button" data-toggle="dropdown" aria-haspopup="true" data-expanded="false"> <i class="fas fa-ellipsis-v"></i> </a> <div class="dropdown-menu dropdown-menu-right"> <a class="delete-row dropdown-item"> Delete </a> </div> </div> </div> </div>';
                    }
                }
            ],




        }); */



        /* datatable = $('#dataTable').DataTable( {

        data: dataSet,
        columns: [
            { data: 'id' },
            { data: 'date' },
            { data: 'title' },
            { data: 'subtitle' },
            { data: 'description' },
            {
            data: null,
            render: function ( data, type, row ) {
                return '<div class="d-flex align-items-center justify-content-end"><div class="actions ml-3"><a class="fill-modal action-item mr-2"  data-toggle="tooltip" title="edit this row" data-original-title="Edit"> <i class="fas fa-pencil-alt"></i> </a> <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="see enclosed items"> <i class="fas fa-level-down-alt"></i> </a> <div class="dropdown"> <a href="#" class="action-item" role="button" data-toggle="dropdown" aria-haspopup="true" data-expanded="false"> <i class="fas fa-ellipsis-v"></i> </a> <div class="dropdown-menu dropdown-menu-right"> <a class="delete-row dropdown-item"> Delete </a> </div> </div> </div> </div>';
            }
            }
        ],




        } ); */

        $(document).on('click', '.editAsset', function() {

            //define session id

            var assetid = $(this).attr('data');

            console.log(assetid);

            window.open(
                siteRoot + "/pages/backend/paid_assets.php", "_blank");


        })



        $(document).on('click', '.addModerators', function() {


            $('#modal-moderator').modal('show');
            //TODO make sure blank
            $(document).find('#moderator-form').find(':input').each(function() {

                $(this).val('');
                if ($(this).hasClass('select2-hidden-accessible') === true) {

                    $(this).trigger('change');

                }

            })

        })


        $(document).on('click', '.removeModerators', function() {

            var moderatorid = $(this).prev().attr('data');
            console.log(moderatorid);
            const dataToSend = {

                moderatorid: $(this).prev().attr('data'),
                sessionid: <?php echo $sessionIdentifier; ?>,

            }

            const jsonString = JSON.stringify(dataToSend);
            console.log(jsonString);



            var request = $.ajax({
                url: siteRoot + "assets/scripts/deleteModerator.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request.done(function(data) {
                // alert( "success" );

                if (data == 1) {
                    refreshSessionView();
                } else if (data == 4) {

                    alert('This record does not exist.  Try again');

                }
            })
            //TODO get moderator id
            //modify delete function for this moderator joined to the session

        })

        $(document).on('click', '.addAsset', function() {


            $('#modal-asset').modal('show');
            //TODO make sure blank
            $(document).find('#asset-form').find(':input').each(function() {

                $(this).val('');
                if ($(this).hasClass('select2-hidden-accessible') === true) {

                    $(this).trigger('change');

                }

            })

            var myDropzone = Dropzone.forElement("#id_dropzone");
            myDropzone.destroy();
            $("#id_dropzone").dropzone({
                maxFiles: 1,
                acceptedFiles: 'image/jpeg, image/png, image/gif, video/*, application/pdf, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.presentation, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                createImageThumbnails: true,
                addRemoveLinks: true,
                url: siteRoot + "/pages/backend/uploadFileAsset.php",
                success: function(file, response) {
                    console.log(response);
                    file_up_names.push(response);

                    //the file is stored at pages/backend/uploads/response
                },
                removedfile: function(file) {

                    x = confirm('Do you want to delete?');
                    if (!x) return false;
                    for (var i = 0; i < file_up_names.length; ++i) {

                        if (file_up_names[i] == file.name) {

                            $.post('delete_file.php', {
                                    file_name: file_up_names[i]
                                },
                                function(data, status) {
                                    alert('file deleted');
                                });
                        }
                    }
                }

            });


            //$(document).find('#asset-form').find(':checkbox, :radio').prop('checked', false);
            assetUnderEdit = 0;

        })

        $(document).on('click', '#assetCheck', function() {

            var assetToFind = ($(this).parent().find('input').val());

            var assetTypeToFind = $(document).find('#Assettype').val();

            if (assetTypeToFind == 1) {

                if (assetToFind != '') {
                    window.open('http://www.endoscopy.wiki/scripts/display/displayVideo.php?id=' +
                        assetToFind, '_blank');
                }

            } else if (assetTypeToFind == 2) {

                if (assetToFind != '') {
                    window.open('http://www.endoscopy.wiki/scripts/display/atlasImageset.php?id=' +
                        assetToFind, '_blank');
                }

            }
            //TODO make sure blank

        })

        $(document).on('click', '.submit-email-form', function(event) {

            event.preventDefault();
            console.log('clicked email submit');
            console.log($('#email-form').closest());
            $('#email-form').submit();

        })

        $(document).on('click', '.submit-asset-form', function(event) {

            event.preventDefault();
            console.log('clicked asset submit');
            console.log($('#asset-form').closest());
            $('#asset-form').submit();

        })

        $(document).on('click', '.submit-moderator-form', function() {

            event.preventDefault();
            console.log('clicked moderator submit');
            console.log($('#moderator-form').closest());
            $('#moderator-form').submit();

        })

        $(document).on('click', '.submit-sessionItem-form', function() {

            event.preventDefault();
            console.log('clicked sessionItem submit');
            console.log($('#sessionItem-form').closest());
            $('#sessionItem-form').submit();

        })

        $(document).on('click', '.addSessionItem', function() {


            //TODO add a sessionItem form

            $('#modal-sessionItem').modal('show');
            //ensure it is blank
            $(document).find('#sessionItem-form').find(':input').each(function() {

                $(this).val('');
                if ($(this).hasClass('select2-hidden-accessible') === true) {

                    $(this).trigger('change');

                }

            })
            editSessionItem = 0;

            //create, read and update this from here via a template form
            //use the tempate form for the table later
            //refresh the table

        })

        $(document).on('click', '.editSessionItem', function() {


            //TODO add a sessionItem form
            $('#modal-sessionItem').modal('show');
            var targettd = $(this).parent().prev().prev().text();
            console.dir(targettd);
            sessionItemUnderEdit = targettd;
            $('#modalMessageArea-sessionItem').text('Editing Session Item' + sessionItemUnderEdit);

            //GET the ID of the sessionItem required to edit
            //update this from here via a template form
            //use the tempate form for the table later
            fillFormSessionItem(targettd);
            editSessionItem = 1;

        })

        $(document).on('click', '.deleteSessionItem', function() {


            //TODO add a sessionItem form
            //GET the ID of the sessionItem required to edit
            //update this from here via a template form
            //use the tempate form for the table later

            var sessionItemID = $(this).parent().prev().prev().text();
            console.log(sessionItemID);
            const dataToSend = {

                sessionItemID: sessionItemID,
                sessionid: <?php echo $sessionIdentifier; ?>,

            }

            const jsonString = JSON.stringify(dataToSend);
            console.log(jsonString);



            var request = $.ajax({
                url: siteRoot + "assets/scripts/deleteSessionItem.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request.done(function(data) {
                // alert( "success" );

                if (data == 1) {
                    refreshSessionView();
                } else if (data == 4) {

                    alert('This record does not exist.  Try again');

                }
            })



        })





        $(document).on('click', '#add<?php echo $databaseName;?>', function() {


            $('#modalMessageArea').text('New <?php echo $databaseName;?>');
            $('#modal-row-1').modal('show');
            $(document).find('#<?php echo $databaseName;?>-form').find(':input').val('');
            $(document).find('#<?php echo $databaseName;?>-form').find(':checkbox, :radio').prop(
                'checked', false);
            edit = 0;

        })

        $(document).on('click', '.fill-modal', function() {

            var targettd = $(this).parent().parent().parent().parent().find('td').first().text();
            //console.log(targettd);
            lesionUnderEdit = targettd;
            $('#modalMessageArea').text('Editing <?php echo $databaseName;?> ' + lesionUnderEdit);
            $('#modal-row-1').modal('show');
            fillForm(targettd);
            edit = 1;

        })

        $(document).on('click', '.delete-row', function() {

            var targettd = $(this).parent().parent().parent().parent().parent().parent().find('td')
                .first().text();
            console.log(targettd);
            //$('#modal-row-1').modal('show');
            deleteRow(targettd);

        })

        $(document).on('click', '.submit-<?php echo $databaseName;?>-form', function() {

            event.preventDefault();
            console.log('clicked');
            console.log($('#<?php echo $databaseName;?>-form').closest());
            $('#<?php echo $databaseName;?>-form').submit();

        })

        $("#<?php echo $databaseName;?>-form").validate({

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
            ignore: [],
            rules: {

                //EDIT




                programmeid: {

                    required: true,
                },


                timeFrom: {
                    required: true,
                    regex: '^([0-1]?[0-9]|2[0-3]):[0-5][0-9]:?[0-5]?[0-9]?$',


                },



                timeTo: {
                    required: true,
                    regex: '^([0-1]?[0-9]|2[0-3]):[0-5][0-9]:?[0-5]?[0-9]?$',

                },



                title: {
                    required: true,

                },



                subtitle: {
                    required: true,

                },



                description: {
                    required: true,

                },

            },
            messages: {

                timeTo: {

                    regex: 'Enter a valid time [hh:mm]',

                },

                timeFrom: {

                    regex: 'Enter a valid time [hh:mm]',

                },

            },
            submitHandler: function(form) {

                //submitPreRegisterForm();

                submit<?php echo $databaseName; ?>Form();

                //TODO submit changes
                //TODO reimport the array at the top
                //TODO redraw the table



            }




        });

        $("#moderator-form").validate({

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
            ignore: [],
            rules: {

                //EDIT




                moderatorid: {

                    required: true,
                },




            },
            messages: {



            },


            submitHandler: function(form) {

                //submitPreRegisterForm();

                submitModeratorForm();

                //TODO submit changes
                //TODO reimport the array at the top
                //TODO redraw the table



            }




        });

        $("#asset-form").validate({

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
            ignore: [],
            rules: {

                //EDIT




                Assettype: {

                    required: true,
                },

                Assetdescription: {

                    required: true,
                },




            },
            messages: {



            },


            submitHandler: function(form) {

                //submitPreRegisterForm();

                submitAssetForm();

                //TODO submit changes
                //TODO reimport the array at the top
                //TODO redraw the table



            }




        });



        $("#sessionItem-form").validate({

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
            ignore: [],
            rules: {

                //EDIT




                SItimeFrom: {
                    required: true,
                    regex: '^([0-1]?[0-9]|2[0-3]):[0-5][0-9]:?[0-5]?[0-9]?$',

                },



                SItimeTo: {
                    required: true,
                    regex: '^([0-1]?[0-9]|2[0-3]):[0-5][0-9]:?[0-5]?[0-9]?$',

                },



                SItitle: {
                    required: true,

                },



                SIdescription: {
                    required: true,

                },



                faculty: {
                    required: true,

                },



                SIlive: {
                    required: true,

                },




            },
            messages: {



            },


            submitHandler: function(form) {

                //submitPreRegisterForm();

                submitSessionItemForm();

                //TODO submit changes
                //TODO reimport the array at the top
                //TODO redraw the table



            }




        });


    })
    </script>
</body>

<?php require BASE_URI . '/footer.php';?>




</html>