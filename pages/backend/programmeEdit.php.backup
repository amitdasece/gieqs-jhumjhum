<?php require '../../assets/includes/config.inc.php';?>




<!DOCTYPE html>
<html lang="en">



<head>

<?php

//define user access level

$openaccess = 0;
$requiredUserLevel = 2;

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

$programme = new programme;

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];

} else {

    $id = null;

}

if ($id) {

    if ($programme->matchRecord($id) === false) {
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

                   <!--alerts-->

    <div id="topTableAlert" class="alert alert-success alert-flush collapse" role="alert">
    <span id="topTableSuccess"></span>
</div>

                <!-- Section title -->
                <div class="actions-toolbar py-2 mb-4">

                    <div class="row justify-content-between align-items-center">
                        <div class="col">
                            <h5 class="mb-1">Programmes</h5>
                            <p class="text-sm text-muted mb-0 d-none d-md-block">Manage programmes.</p>
                        </div>
                        <div class="col text-right">
                            <div class="actions"><!-- <a href="#" class="action-item mr-2 active" data-action="search-open"
                                    data-target="#actions-search"><i class="fas fa-search"></i></a> -->
                                    <a href="#" id="addProgramme" class="action-item mr-2 active"><i class="fas fa-plus"></i></a>
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
                                </div> --><!-- <a href="#" class="action-item mr-2"><i class="fas fa-sync"></i></a> -->
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
                            <th>id</th>
                            <th>date</th>
                            <th>title</th>
                            <th>subtitle</th>
                            <th>description</th>
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
   <div class="modal fade" id="modal-row-1" tabindex="-1" role="dialog" aria-labelledby="modal-change-username"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

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
                                <span class="text-white" aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-subheader px-3 mt-2 mb-2 border-bottom">
                            <div class="row">
                                <div class="col-sm-12 text-left">
                                    <div>
                                        <h6 class="mb-0"></h6>
                                        <span id = "modalMessageArea" class="mb-0"></span>

                                    </div>
                                    <div id="topModalAlert" class="alert alert-warning alert-flush collapse" role="alert">
    <span id="topModalSuccess"></span>
</div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body">

                            <div class="programme-body">
                                <form id="programme-form">
                                    <div class="form-group">
                                        <label for="date">Date of programme</label>
                                        <div class="input-group mb-3">
                                            <input id="date" type="text" class="form-control" name="date">
                                        </div>

                                        <label for="title">Title</label>
                                        <div class="input-group mb-3">
                                            <input type="text" id="title" name="title" class="form-control" placeholder="Title">
                                        </div>

                                        <label for="subtitle">Subtitle</label>
                                        <div class="input-group mb-3">
                                            <textarea id="subtitle" name="subtitle" data-toggle="autosize" class="form-control"
                                                placeholder="Subtitle"></textarea>
                                        </div>

                                        <label for="description">Description</label>
                                        <div class="input-group">
                                            <textarea id="description" name="description" data-toggle="autosize" class="form-control"
                                                placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                </form>

                                <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                                    <p class="text-muted text-sm">Data entered here will change the live site</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="submit-programme-form btn btn-sm btn-success">Save</button>
                                <button type="button" class="btn btn-sm btn-danger"
                                    data-dismiss="modal">Cancel</button>
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

<script>

//var data = $('#data').text();
//var dataSet = $.parseJSON($('#data').text());
var datatable;
var edit = 0;
var lesionUnderEdit = null;

function tableRefresh (){

    //update the div at the top with AJAX

    // refresh the table


}

function fillForm (idPassed){

        disableFormInputs("programme-form");

        esdLesionRequired = new Object;

        esdLesionRequired = getNamesFormElements("programme-form");

        esdLesionString = '`id`=\''+idPassed+'\'';

        var selectorObject = getDataQuery ("programme", esdLesionString, getNamesFormElements("programme-form"), 1);

        //console.log(selectorObject);

        selectorObject.done(function (data){

            console.log(data);

            var formData = $.parseJSON(data);


            $(formData).each(function(i,val){
                $.each(val,function(k,v){
                    $("#"+k).val(v);
                    //console.log(k+' : '+ v);
                });

            });

            //$("#messageBox").text("Editing ESD lesion ID "+idPassed);

            enableFormInputs("programme-form");

        });




    }

    function submitprogrammeForm (){

        //pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)

        console.log('got to the submit function');

        if (edit == 0){

            var esdLesionObject = pushDataFromFormAJAX("programme-form", "programme", "id", null, "0"); //insert new object

            esdLesionObject.done(function (data){

                console.log(data);

                if (data){

                    //alert ("New esdLesion no "+data+" created");
                    $('#topTableSuccess').text("New programme no "+data+" created");

                     $("#topTableAlert").fadeTo(4000, 500).slideUp(500, function() {
                        $("#topTableAlert").slideUp(500);
                    });
                    //edit = 1;

                    //refresh table
                    datatable.ajax.reload();

                    //close modal
                    $('#modal-row-1').modal('hide');





                }else {

                    alert("No data inserted, try again");

                }


            });

        } else if (edit == 1){


            if (lesionUnderEdit){

                var esdLesionObject = pushDataFromFormAJAX("programme-form", "programme", "id", lesionUnderEdit, "1"); //insert new object

                    esdLesionObject.done(function (data){

                        console.log(data);

                        if (data){

                            if (data == 1){

                                $('#topModalSuccess').text("Data for programme " + lesionUnderEdit + " saved");

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

		function deleteRow (id){

        //esdLesionPassed is the current record, some security to check its also that in the id field

        /* if (esdLesionPassed != $("#id").text()){

            return;

        } */


        if (confirm("Do you wish to delete this programme?")) {

            disableFormInputs("programme-form");

            var esdLesionObject = pushDataFromFormAJAX("programme-form", "programme", "id", id, "2"); //delete esdLesion

            esdLesionObject.done(function (data){

                console.log(data);

                if (data){

                    if (data == 1){

                        $('#topTableSuccess').text("Programme deleted");

                        $("#topTableAlert").removeClass("alert-success").addClass("alert-danger").fadeTo(4000, 500).slideUp(500, function() {
                            $("#topTableAlert").slideUp(500);
                        });
                        //TODO refresh the table from AJAX
                        //esdLesionPassed = null;
                        //window.location.href = siteRoot + "scripts/forms/esdLesionTable.php";
                        //location.reload();
                        datatable.ajax.reload();


                        enableFormInputs("programme-form");

                        //go to esdLesion list

                    }else {

                    alert("Error, could not delete.  Please try again");

                    enableFormInputs("programme-form");

                    }



                }


            });

        }


    }

$(document).ready(function(){

    var options = {
			enableTime: false,
			allowInput: true
		};
    $("#date").flatpickr(options);

    datatable = $('#dataTable').DataTable( {

        language: { infoEmpty: "There are currently no active programmes.",
                emptyTable: "There are currently no active programmes.",
                zeroRecords: "There are currently no active programmes.",
        },
        autowidth : true,


       ajax: siteRoot + 'assets/scripts/tableInteractors/refreshProgrammeTable.php',


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




       } );



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

    $(document).on('click', '#addProgramme', function() {


        $('#modalMessageArea').text('New programme');
        $('#modal-row-1').modal('show');
        $(document).find('#programme-form').find(':input').val('');
        $(document).find('#programme-form').find(':checkbox, :radio').prop('checked', false);
        edit = 0;

    })

    $(document).on('click', '.fill-modal', function() {

    var targettd = $(this).parent().parent().parent().parent().find('td').first().text();
    //console.log(targettd);
    lesionUnderEdit = targettd;
    $('#modalMessageArea').text('Editing programme ' + lesionUnderEdit);
    $('#modal-row-1').modal('show');
    fillForm(targettd);
    edit = 1;

    })

    $(document).on('click', '.delete-row', function() {

    var targettd = $(this).parent().parent().parent().parent().parent().parent().find('td').first().text();
    console.log(targettd);
    //$('#modal-row-1').modal('show');
    deleteRow(targettd);

    })

    $(document).on('click', '.submit-programme-form', function() {

    event.preventDefault();
    console.log('clicked');
    console.log($('#programme-form').closest());
    $('#programme-form').submit();

    })

$("#programme-form").validate({

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
    date: {

        required: true,
        date: true,

    },

    title: {
        required: true,
    },
    subtitle: {
        required: true,

    },

},
submitHandler: function(form) {

    //submitPreRegisterForm();

    submitprogrammeForm();

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