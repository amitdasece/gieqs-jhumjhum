<?php require '../../assets/includes/config.inc.php';?>

<?php

//php general variables

//form name

//$formName = 'programme-form';

//database name

$databaseName = 'faculty';

//identifier

$identifier = 'id';

//javascript general variables
//to be passed via divs on page

?>


<!DOCTYPE html>
<html lang="en">



<head>

    <?php

//define user access level

$openaccess = 0;
$requiredUserLevel = 3;

require BASE_URI . '/head.php';

$formv1 = new formGenerator;

?>

    <title>Ghent International Endoscopy Symposium - Backend</title>

    <!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.css">
    <!-- Purpose CSS -->
    <!-- <link rel="stylesheet" href="<?php //echo BASE_URL; ?>/assets/css/purpose.css" id="stylesheet"> -->

    <style>
    .modal-backdrop {
        opacity: 0.75 !important;
    }
    .text-muted-inactive { opacity: 0.25; }

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
    @media print {

body {
  margin: 0;
  color: #000;
  background-color: #fff;
  

}
header, footer, aside, nav, form, iframe, .menu, .hero, .adslot {
  display: none;


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

${$databaseName} = new $databaseName;

//eval("\$" . $databaseName . " = new " . $databaseName . ";");

//$programme = new programme;

if (isset($_GET['identifier']) && is_numeric($_GET['identifier'])) {
    $identifierValue = $_GET['identifier'];
    //echo $identifierValue;

} else {

    $identifierValue = null;

}

if ($identifierValue) {

    $sessionIdentifier = $identifierValue;

    $validRecord = ${$databaseName}->matchRecord($sessionIdentifier);

    if ($validRecord === false) {
        echo "No $databaseName with that id exists";
        exit();

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
                            <h5 class="mb-1">Faculty Tasks</h5>
                            <p class="text-sm text-muted mb-0 d-none d-md-block">Moderator, Speaker and Live sessions</p>
                        </div>
                        <div class="col text-right">
                            <div class="actions">
                                <!-- <a href="#" class="action-item mr-2 active" data-action="search-open"
                                    data-target="#actions-search"><i class="fas fa-search"></i></a> -->
                                    <?php if ($currentUserLevel < 3){
                            
                            
                            ?>
                                <a href="#" id="add<?php echo $databaseName; ?>" class="action-item mr-2 active"><i
                                        class="fas fa-plus"></i></a>

                                    <?php }?>
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
                <div class="table-responsive">
                    <table id="dataTable" class="table text-center table-cards align-items-center">
                        <thead>
                            <tr>
                                <!-- EDIT -->
                                <th>id</th>
                                <th>firstname</th>
                                <th>surname</th>
                                <th>Moderator</th>
                                <th>Live</th>
                                <th>Lecture</th>
                                <th></th>

                            </tr>
                        </thead>

                    </table>
                </div>
                <!-- Load more -->
                <!-- <div class="mt-4 text-center">
                    <a href="#" class="btn btn-sm btn-neutral rounded-pill shadow hover-translate-y-n3">Load more
                        ...</a>
                </div> -->
            </div>
        </section>


    </div>

    <!-- Modal -->
    <?php require BASE_URI . '/pages/backend/forms/facultyForm.php';?>

    <!-- Info Modal Faculty Tasks -->

<div class="modal fade" id="modal-faculty-report" tabindex="-1" role="dialog" aria-labelledby="modal-change-username" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div id="facultyReport">

</div>
                    
            </div>

        </div>
    
    <!-- give an array per faculty -->



    </div>










    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="../../assets/js/purpose.core.js"></script> -->

    <script src="<?php echo BASE_URL; ?>/assets/libs/autosize/dist/autosize.min.js"></script>

    <!-- Datatables -->
    <script src="<?php echo BASE_URL; ?>/node_modules/datatables.net/js/jquery.datatables.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/flatpickr/dist/flatpickr.min.js"></script>

    <script>
    //var data = $('#data').text();
    //var dataSet = $.parseJSON($('#data').text());
    var datatable;
    var edit = 0;
    var lesionUnderEdit = null;

    function tableRefresh() {

        //update the div at the top with AJAX

        // refresh the table


    }

    function fillForm(idPassed) {

        disableFormInputs("<?php echo $databaseName; ?>-form");

        esdLesionRequired = new Object;

        esdLesionRequired = getNamesFormElements("<?php echo $databaseName; ?>-form");

        esdLesionString = '`id`=\'' + idPassed + '\'';

        var selectorObject = getDataQuery("<?php echo $databaseName; ?>", esdLesionString, getNamesFormElements(
            "<?php echo $databaseName; ?>-form"), 1);

        //console.log(selectorObject);

        selectorObject.done(function(data) {

            console.log(data);

            var formData = $.parseJSON(data);


            $(formData).each(function(i, val) {
                $.each(val, function(k, v) {
                    $(document).find("#" + k).val(v);

                    //if a select2, trigger change also required to display the change
                    if ($(document).find("#" + k).hasClass('select2-hidden-accessible') ===
                        true) {

                        $(document).find("#" + k).trigger('change');

                    }

                });

            });

            //$("#messageBox").text("Editing ESD lesion ID "+idPassed);

            enableFormInputs("<?php echo $databaseName; ?>-form");

        });




    }

    function submit<?php echo $databaseName; ?>Form() {

        //pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)

        console.log('got to the submit function');

        if (edit == 0) {

            var esdLesionObject = pushFormDataJSON($("#<?php echo $databaseName; ?>-form"),
                "<?php echo $databaseName; ?>", "id", null, "0"); //insert new object

            esdLesionObject.done(function(data) {

                console.log(data);

                if (data) {

                    //alert ("New esdLesion no "+data+" created");
                    $('#topTableSuccess').text("New <?php echo $databaseName; ?> no " + data + " created");

                    $('#modal-faculty').animate({
                        scrollTop: 0
                    }, 'slow');


                    $("#topTableAlert").fadeTo(4000, 500).slideUp(500, function() {
                        $("#topTableAlert").slideUp(500);
                    });

                    //edit = 1;

                    //refresh table
                    datatable.ajax.reload();

                    //close modal
                    $('#modal-faculty').modal('hide');





                } else {

                    alert("No data inserted, try again");

                }


            });

        } else if (edit == 1) {


            if (lesionUnderEdit) {

                var esdLesionObject = pushFormDataJSON($("#<?php echo $databaseName; ?>-form"),
                    "<?php echo $databaseName; ?>", "id", lesionUnderEdit, "1"); //insert new object

                esdLesionObject.done(function(data) {

                    console.log(data);

                    if (data) {

                        if (data == 1) {

                            $('#topModalSuccess').text("Data for <?php echo $databaseName; ?> " +
                                lesionUnderEdit + " saved");

                            $('#modal-faculty').animate({
                                scrollTop: 0
                            }, 'slow');

                            $("#topModalAlert").fadeTo(4000, 500).slideUp(500, function() {
                                $("#topTableAlert").slideUp(500);
                            });



                            //refresh table
                            datatable.ajax.reload();
                            //edit = 1;


                            //edit = 1;

                        } else if (data == 0) {

                            alert("No change in data detected");

                        } else if (data == 2) {

                            alert("Error, try again");

                        }



                    }


                });

            }


        }


    }

    //delete behaviour

    function deleteRow(id) {

        //esdLesionPassed is the current record, some security to check its also that in the id field

        /* if (esdLesionPassed != $("#id").text()){

            return;

        } */


        if (confirm("Do you wish to delete this <?php echo $databaseName; ?>?")) {

            disableFormInputs("<?php echo $databaseName; ?>-form");

            var esdLesionObject = pushFormDataJSON($("#<?php echo $databaseName; ?>-form"),
                "<?php echo $databaseName; ?>", "id", id, "2"); //delete esdLesion

            esdLesionObject.done(function(data) {

                console.log(data);

                if (data) {

                    if (data == 1) {

                        $('#topTableSuccess').text("<?php echo $databaseName; ?> deleted");

                        $("#topTableAlert").removeClass("alert-success").addClass("alert-danger").fadeTo(4000,
                            500).slideUp(500, function() {
                            $("#topTableAlert").slideUp(500);
                        });
                        //TODO refresh the table from AJAX
                        //esdLesionPassed = null;
                        //window.location.href = siteRoot + "scripts/forms/esdLesionTable.php";
                        //location.reload();
                        datatable.ajax.reload();


                        enableFormInputs("<?php echo $databaseName; ?>-form");

                        //go to esdLesion list

                    } else {

                        alert("Error, could not delete.  Please try again");

                        enableFormInputs("<?php echo $databaseName; ?>-form");

                    }



                }


            });

        }


    }

    function getFacultyReport(facultyid) {



const dataToSend = {

    facultyid: facultyid ,

}

const jsonString = JSON.stringify(dataToSend);
console.log(jsonString);

var request2 = $.ajax({
    url: siteRoot + "assets/scripts/viewGenerators/generateFacultyIndividual.php",
    type: "POST",
    contentType: "application/json",
    data: jsonString,
});



request2.done(function (data) {
    // alert( "success" );
    $('#facultyReport').html(data);
    $('#modal-faculty-report').modal('show');
})
}

    $(document).ready(function() {

        //add those which require date pickr

        var options = {
            enableTime: false,
            allowInput: true
        };

        $('[data-toggle="date"]').flatpickr(options);

        // add those which require select2 box

        $('[data-toggle="select"]').select2({

            dropdownParent: $(".modal-content"),
            //theme: "bootstrap",

        });





        datatable = $('#dataTable').DataTable({

            language: {
                infoEmpty: "There are currently no active <?php echo $databaseName; ?>s.",
                emptyTable: "There are currently no active <?php echo $databaseName; ?>s.",
                zeroRecords: "There are currently no active <?php echo $databaseName; ?>s.",
            },
            autowidth: false,


            ajax: siteRoot +
                'assets/scripts/tableInteractors/refresh<?php echo $databaseName; ?>TableTasks.php',
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
                    data: 'countModerator'
                },
                {
                    data: 'countLive'
                },
                {
                    data: 'countLecture'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        <?php if ($currentUserLevel < 3){
                            
                            
                            ?>
                        return '<div class="d-flex align-items-center justify-content-end"><div class="actions ml-3"><a class="fill-modal action-item mr-2"  data-toggle="tooltip" title="edit this row" data-original-title="Edit"> <span class="text-muted"><i class="fas fa-pencil-alt"></i></span> </a> <a class="action-item action-item-individual mr-2" data-toggle="tooltip" title="view individual program" data-original-title="see enclosed items"> <i class="fas fa-user"></i> </a> <div class="dropdown"> <a href="#" class="action-item" role="button" data-toggle="dropdown" aria-haspopup="true" data-expanded="false"> <i class="fas fa-times"></i> </a> <div class="dropdown-menu dropdown-menu-right"> <a class="delete-row dropdown-item"> Delete </a> </div> </div> </div> </div>';
                        <?php }else{?>
                        
                        return '<div class="d-flex align-items-center justify-content-end"><div class="actions ml-3"><a class="action-item mr-2"  data-toggle="tooltip" title="edit this row" data-original-title="Edit"> <span class="text-muted-inactive"><i class="fas fa-pencil-alt"></i></span> </a> <a class="action-item action-item-individual mr-2" data-toggle="tooltip" title="view individual program" data-original-title="see enclosed items"> <i class="fas fa-user"></i> </a> <div class="dropdown"> <a class="action-item" role="button" data-toggle="dropdown" aria-haspopup="true" data-expanded="false"> <span class="text-muted-inactive"><i class="fas fa-times"></i></span> </a> <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item"> Delete </a> </div> </div> </div> </div>';

                        <?php } ?>
                    }
                }
            ],




        });



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

        

        $(document).on('click', '#add<?php echo $databaseName; ?>', function() {


            $('#modalMessageArea').text('New <?php echo $databaseName; ?>');
            $('#modal-faculty').modal('show');
            $(document).find('#<?php echo $databaseName; ?>-form').find(':input').val('');
            $(document).find('#<?php echo $databaseName; ?>-form').find(':checkbox, :radio').prop(
                'checked', false);
            edit = 0;

        })

        $(document).on('click', '.fill-modal', function() {

            var targettd = $(this).parent().parent().parent().parent().find('td').first().text();
            //console.log(targettd);
            lesionUnderEdit = targettd;
            $('#modalMessageArea').text('Editing <?php echo $databaseName; ?> ' + lesionUnderEdit);
            $('#modal-faculty').modal('show');
            fillForm(targettd);
            edit = 1;

        })

        $(document).on('click', '.action-item-individual', function() {

        var targettd = $(this).parent().parent().parent().parent().find('td').first().text();
        //console.log(targettd);
        lesionUnderEdit = targettd;
        getFacultyReport(lesionUnderEdit);
        

        })

        $(document).on('click', '.delete-row', function() {

            var targettd = $(this).parent().parent().parent().parent().parent().parent().find('td')
                .first().text();
            console.log(targettd);
            //$('#modal-faculty').modal('show');
            deleteRow(targettd);

        })

        $(document).on('click', '.submit-<?php echo $databaseName; ?>-form', function() {

            event.preventDefault();
            console.log('clicked');
            console.log($('#<?php echo $databaseName; ?>-form').closest());
            $('#<?php echo $databaseName; ?>-form').submit();

        })

        $("#<?php echo $databaseName; ?>-form").validate({

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





                title: {
                    required: true,

                },



                firstname: {
                    required: true,

                },



                surname: {
                    required: true,

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


    })
    </script>
</body>

<?php require BASE_URI . '/footer.php';?>




</html>