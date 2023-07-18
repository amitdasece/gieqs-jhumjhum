<?php require '../../assets/includes/config.inc.php';?>

<?php

//php general variables

//form name

//$formName = 'programme-form';

//database name
//error_reporting(E_ALL);

$databaseName = 'emails';

//identifier

$identifier = 'id';



//javascript general variables
//to be passed via divs on page


?>


<!DOCTYPE html>
<html lang="en">
<meta charset="ISO-8859-1">



<head>

    <?php

//define user access level

$openaccess = 0;
$requiredUserLevel = 3;

require BASE_URI . '/head.php';

$formv1 = new formGenerator;
$emailLink = new emailLink;



?>

    <title>Ghent International Endoscopy Symposium - Backend</title>

    <!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.css">
    <script src="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>
    <!-- Purpose CSS -->
    <!-- <link rel="stylesheet" href="<?php //echo BASE_URL; ?>/assets/css/purpose.css" id="stylesheet"> -->

    <style>
    .modal-backdrop {
        opacity: 0.75 !important;
    }

    .can-drag.over {
        border: 3px dotted #666;
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







    <div class="container-fluid mx-0 pl-0 pr-0">



        <section class="header-account-page bg-dark d-flex align-items-end" data-offset-top="#header-main"
            style="padding-top: 147.4px;">
            <!-- Header container -->
            <div class="container pt-4 pt-lg-0">
                <div class="row">
                    <div class=" col-lg-12">
                        <!-- Salute + Small stats -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-5 mb-4 mb-md-0">
                                <span class="h2 mb-0 text-white d-block">GIEQs Admin Console</span>

                                <!-- <span class="text-white">Have a nice day!</span> -->
                            </div>

                        </div>

                        <!-- Account navigation -->
                        <?php require 'backendNav.php';?>


                    </div>
                </div>
            </div>
        </section>

        <section class="slice bg-section-secondary">
            <div class="container-fluid px-lg-8">

                <!-- id check-->
                <?php

$formv1 = new formGenerator;

$general = new general;
$userFunctions = new userFunctions;

//error_reporting(E_ALL);

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
                            <h5 class="mb-1"><?php echo 'Emails';?></h5>
                            <p class="text-sm text-muted mb-0 d-none d-md-block">Manage <?php echo $databaseName;?>.</p>
                        </div>
                        <div class="col text-right">
                            <div class="actions">
                                <!-- <a href="#" class="action-item mr-2 active" data-action="search-open"
                                    data-target="#actions-search"><i class="fas fa-search"></i></a> -->
                                <a href="#" id="add<?php echo $databaseName;?>" class="action-item mr-2 active"><i
                                        class="fas fa-plus"></i></a>

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
                                <th>email_id</th>
                                <th>name</th>
                                <th>subject</th>
                                <th>preheader</th>
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

    <div class="modal-email-placeholder">

    </div>

    <div class="modal-email-generate-placeholder">

    </div>

    <div class="buttonText d-none">



        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock"
            style="min-width:100%;border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;">
            <tbody class="mcnButtonBlockOuter">
                <tr>
                    <td style="padding-top:25px;padding-right:18px;padding-bottom:18px;padding-left:18px;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;"
                        valign="top" align="center" class="mcnButtonBlockInner">
                        <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer"
                            style="border-collapse:separate !important;border-radius:3px;background-color:rgb(238, 195, 120);mso-table-lspace:0pt;mso-table-rspace:0pt;-ms-text-size-adjust:100%;-webkit-text-size-adjust: 100%;">
                            <tbody>
                                <tr>
                                    <td align="center" valign="middle" class="mcnButtonContent"
                                        style="font-family:Helvetica;font-size:18px;padding:18px;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;">
                                        <a class="mcnButton " title="" href="" target="_blank"
                                            style="font-weight:normal;letter-spacing:-0.5px;line-height:100%;text-align:center;text-decoration:none;color:#162e4d;mso-line-height-rule:exactly;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;display:block;">button
                                            text
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>

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
    var optionsSelect;
    var lesionUnderEdit = null;
    var loading;
    var externalTest;
    var externalTest2;
    var mailUnderEdit = null;
    var databaseName = '<?php echo $databaseName;?>';
    var openedWindow = null;
    var active = null;



    //drag and drop

    var items = null;
    var dragSrcEl = null;

    //functions for the modal

    $(document).on('click', '.delete-email-content', function() {

        //get the id

        var id = $(this).attr('data-id');


        if (confirm("do you wish to delete this row?") == true) {

            deleteEmailContent(id);


        } else {
            return false;
        }



    })

    function deleteEmailContent(id) {

        const dataToSend = {



            id: id,

            //options: myOpts,

        }

        const jsonString = JSON.stringify(dataToSend);
        //console.log(jsonString);



        var request = $.ajax({
            url: siteRoot + "assets/scripts/courses/deleteEmailContent.php",
            crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
            type: "POST",
            contentType: "application/json",
            data: jsonString,

        });



        request.done(function(data) {



            console.log(data);

            if (data) {

                redrawModal();

            }







        })

        return request;



    }

    function tableRefresh() {

        //update the div at the top with AJAX

        // refresh the table


    }

    //refresh modal

    function redrawModal() {


        refreshModal().done(function(result) {


            //$(document).find("#registrations").val().trigger('change');
            //$('#registrations').select2();
            //$(document).find("#registrations").empty().append('<option value="id">text</option>').val(externalTest).trigger('change');

            $('#modalMessageArea').text('Editing <?php echo $databaseName;?> ' +
                lesionUnderEdit);
            fillForm(lesionUnderEdit);
            edit = 1;
            items = document.querySelectorAll('.emailBody .can-drag');
            items.forEach(function(item) {
                item.addEventListener('dragstart', handleDragStart, false);
                item.addEventListener('dragenter', handleDragEnter, false);
                item.addEventListener('dragover', handleDragOver, false);
                item.addEventListener('dragleave', handleDragLeave, false);
                item.addEventListener('drop', handleDrop, false);
                item.addEventListener('dragend', handleDragEnd, false);
            });

            $(document).find('#modal-row-1').modal('show');






        })



    }

    function redrawModalEmailText() {


        refreshModalEmailText().done(function(result) {


            //$(document).find("#registrations").val().trigger('change');
            //$('#registrations').select2();
            //$(document).find("#registrations").empty().append('<option value="id">text</option>').val(externalTest).trigger('change');



            $(document).find('#modal-row-2').modal('show');






        })



    }

    function openMail(id) {

        mailUnderEdit = id;

        redrawModalEmailText();




    }

    function refreshModal() {

        const dataToSend = {



            emailid: lesionUnderEdit,
            databaseName: databaseName,
            //options: myOpts,

        }

        const jsonString = JSON.stringify(dataToSend);
        //console.log(jsonString);



        var request = $.ajax({
            beforeSend: function() {

                $('#modal-row-1').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

            },
            url: siteRoot + "assets/scripts/getEmailModal.php",
            crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
            type: "POST",
            contentType: "application/json",
            data: jsonString,

        });



        request.done(function(data) {



            console.log(data);

            if (data) {






                $('body').find('.modal-email-placeholder').html(data);
                //refreshModalEmailText();
                //$(document).find('#modal-row-1').modal('show');


            }







        })

        return request;





    }

    function refreshModalEmailText() {

        const dataToSend = {



            emailid: mailUnderEdit,
            databaseName: databaseName,
            //options: myOpts,

        }

        const jsonString = JSON.stringify(dataToSend);
        //console.log(jsonString);



        var request = $.ajax({
            beforeSend: function() {

                $('#modal-row-2').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

            },
            url: siteRoot + "assets/scripts/courses/generateEmail.php",
            crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
            type: "POST",
            contentType: "application/json",
            data: jsonString,

        });



        request.done(function(data) {



            console.log(data);

            if (data) {






                $('body').find('.modal-email-generate-placeholder').html(data);
                //refreshModalEmailText();
                //$(document).find('#modal-row-2').modal('show');



            }







        })

        return request;





    }

    function addNewEmail() {

        const dataToSend = {



            emailid: lesionUnderEdit,
            databaseName: databaseName,
            //options: myOpts,

        }

        const jsonString = JSON.stringify(dataToSend);
        //console.log(jsonString);



        var request = $.ajax({
            url: siteRoot + "assets/scripts/courses/addEmail2.php",
            crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
            type: "POST",
            contentType: "application/json",
            data: jsonString,

        });



        request.done(function(data) {



            if (data) {

                lesionUnderEdit = data;
            }






        })

        return request;





    }

    function getSortOrderComponentsEmail() {

        var x = 1;

        var film = $('body').find('.modal-body').find('.input-group-merge');

        var output = new Object();

        $.each(film, function(k1, v1) {


            var rowitems = $(v1).find('.emailContent');

            var y = 1;


            $.each(rowitems, function(k, v) {

                var len = rowitems.length;

                console.dir(rowitems);
                console.log('length is ' + len);



                //does this row contain only text

                var len = rowitems.length;

                if (len > 1) {

                    //check if video or image

                    var type = null;
                    var video = null;
                    var img = null;
                    var text = null;

                    $.each(rowitems, function(a, b) {

                        if ($(b).attr('data-type') == 'video') {

                            type = 'video';
                            video = $(b).val();


                        } else if ($(b).attr('data-type') == 'img') {

                            type = 'img';
                            img = $(b).val();

                        } else {

                            text = $(b).val();
                        }

                    })

                    if (type == 'video') {

                        output[x] = {
                            order: x,
                            id: $(v).attr('data-id'),
                            type: type,
                            video: video,
                            text: text,
                        };

                    }

                    if (type == 'img') {

                        output[x] = {
                            order: x,
                            id: $(v).attr('data-id'),
                            type: type,
                            img: img,
                            text: text,
                        };

                    }


                } else {

                    //text

                    output[x] = {
                        order: x,
                        id: $(v).attr('data-id'),
                        type: $(v).attr('data-type'),
                        content: $(v).val(),
                    };

                }

                y++;

            })

            x++;

        })

        console.dir(output);

        return output;

    }

    function addText() {

        const dataToSend = {



            emailid: lesionUnderEdit,
            databaseName: databaseName,
            //options: myOpts,

        }

        const jsonString = JSON.stringify(dataToSend);
        //console.log(jsonString);



        var request = $.ajax({
            url: siteRoot + "assets/scripts/courses/addText.php",
            crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
            type: "POST",
            contentType: "application/json",
            data: jsonString,

        });



        request.done(function(data) {



            //console.log(data);

            if (data) {

                redrawModal();

            }







        })

        return request;





    }


    function addImg() {

        const dataToSend = {

            emailid: lesionUnderEdit,
            databaseName: databaseName,
            //options: myOpts,

        }

        const jsonString = JSON.stringify(dataToSend);
        //console.log(jsonString);

        var request = $.ajax({
            url: siteRoot + "assets/scripts/courses/addImg.php",
            crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
            type: "POST",
            contentType: "application/json",
            data: jsonString,

        });


        request.done(function(data) {

            //console.log(data);

            if (data) {

                redrawModal();

            }

        })

        return request;


    }

    function addVideo() {

        const dataToSend = {

            emailid: lesionUnderEdit,
            databaseName: databaseName,
            //options: myOpts,

        }

        const jsonString = JSON.stringify(dataToSend);
        //console.log(jsonString);

        var request = $.ajax({
            url: siteRoot + "assets/scripts/courses/addVideo.php",
            crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
            type: "POST",
            contentType: "application/json",
            data: jsonString,

        });


        request.done(function(data) {

            //console.log(data);

            if (data) {

                redrawModal();

            }

        })

        return request;


    }

    function launchViewer() {

        openedWindow = window.open(siteRoot + 'assets/scripts/courses/generateEmail.php?emailid=' + lesionUnderEdit,
            '_blank', 'toolbar=0,location=0,menubar=0');

    }

    function commitEmail() {

        if (confirm('Are you sure you wish to spool this mail for sending?') === true) {


            //var audience = $(document).find('.modalContent').find('#audience').val();
            const dataToSend = {

                emailid: lesionUnderEdit,
               // audience: audience,
                //options: myOpts,

            }

            const jsonString = JSON.stringify(dataToSend);
            //console.log(jsonString);

            var request = $.ajax({
                url: siteRoot + "assets/scripts/courses/commitEmail.php",
                crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
                type: "POST",
                contentType: "application/json",
                data: jsonString,

            });


            request.done(function(data) {

                //console.log(data);

                if (data) {

                    redrawModal();

                }

            })

            return request;

        }



    }

    function uncommitEmail() {

if (confirm('Are you sure you wish to stop this mail from spool sending?') === true) {


    //var audience = $(document).find('.modalContent').find('#audience').val();
    const dataToSend = {

        emailid: lesionUnderEdit,
       // audience: audience,
        //options: myOpts,

    }

    const jsonString = JSON.stringify(dataToSend);
    //console.log(jsonString);

    var request = $.ajax({
        url: siteRoot + "assets/scripts/courses/uncommitEmail.php",
        crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
        type: "POST",
        contentType: "application/json",
        data: jsonString,

    });


    request.done(function(data) {

        //console.log(data);

        if (data) {

            redrawModal();

        }

    })

    return request;

}



}

function testEmail() {

if (confirm('Are you sure you wish to send a test mail') === true) {


    //var audience = $(document).find('.modalContent').find('#audience').val();
    const dataToSend = {

        emailid: lesionUnderEdit,
       // audience: audience,
        //options: myOpts,

    }

    const jsonString = JSON.stringify(dataToSend);
    //console.log(jsonString);

    var request = $.ajax({
        url: siteRoot + "assets/scripts/courses/sendTestMail.php",
        crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
        type: "POST",
        contentType: "application/json",
        data: jsonString,

    });


    request.done(function(data) {

        //console.log(data);

        if (data) {

            alert('Mail Sent.');

        }

    })

    return request;

}



}
function clearRecipients() {

if (confirm('Are you sure you wish to clear recipients for this mail') === true) {


    //var audience = $(document).find('.modalContent').find('#audience').val();
    const dataToSend = {

        emailid: lesionUnderEdit,
       // audience: audience,
        //options: myOpts,

    }

    const jsonString = JSON.stringify(dataToSend);
    //console.log(jsonString);

    var request = $.ajax({
        url: siteRoot + "assets/scripts/courses/removeSentUsersEmail.php",
        crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
        type: "POST",
        contentType: "application/json",
        data: jsonString,

    });


    request.done(function(data) {

        //console.log(data);

        if (data) {

            alert('Recipients Cleared and Archived.');

        }

    })

    return request;

}

}

function duplicateRow(targettd) {

if (confirm('Are you sure you wish to create a new email duplicating email id ' + targettd) === true) {


    //var audience = $(document).find('.modalContent').find('#audience').val();
    const dataToSend = {

        emailid: targettd,
       // audience: audience,
        //options: myOpts,

    }

    const jsonString = JSON.stringify(dataToSend);
    //console.log(jsonString);

    var request = $.ajax({
        url: siteRoot + "assets/scripts/courses/duplicateEmail.php",
        crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
        type: "POST",
        contentType: "application/json",
        data: jsonString,

    });


    request.done(function(data) {

        //console.log(data);

        if (data) {

            alert('Email Duplicated.');

        }

    })

    return request;

}



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

    var externalFormData;

    function fillForm(idPassed, result) {



        var stop;

        disableFormInputs("<?php echo $databaseName;?>-form");

        esdLesionRequired = new Object;

        esdLesionRequired = getNamesFormElements("<?php echo $databaseName;?>-form");

        esdLesionString = '`id`=\'' + idPassed + '\'';

        var selectorObject = getDataQueryLearning("<?php echo $databaseName;?>", esdLesionString, getNamesFormElements(
            "<?php echo $databaseName;?>-form"), 1);

        //console.log(selectorObject);

        selectorObject.done(function(data) {

            //console.log(data);

            var formData = $.parseJSON(data);

            //externalFormData = formData;

            console.dir(formData);

            //if the user making the edit request is of lower rank than the user to be edited don't respond

            var userAccessLevel = "<?php echo $currentUserLevel;?>";


            externalFormData = userAccessLevel;




            $(formData).each(function(i, val) {

                if (parseInt(val.active) == 1) {

                    console.log('edit not allowed');
                    console.dir(val);

                    active = true;
                    $(document).find('.modal-body').find(':input').prop('disabled', true);
                    $(document).find('.modal-body').find('.commitEmail').removeClass('commitEmail').addClass('uncommitEmail');
                    //return false;



                }else{

                    active = false;
                }


                $.each(val, function(k, v) {

                    /* if (k == 'access_level'){
                        console.log(v);
                        if (parseInt(v) < parseInt(userAccessLevel)){
                            console.log('edit not allowed');
                            $(document).find('#modal-row-1').modal('hide');
                            return false;
                            
                            
                        } 
                    } */

                    $(document).find("#" + k).val(v);

                    //if a select2, trigger change also required to display the change
                    if ($(document).find("#" + k).hasClass('select2-hidden-accessible') ===
                        true) {

                        $(document).find("#" + k).trigger('change');

                    }

                });

            });




            //$("#messageBox").text("Editing ESD lesion ID "+idPassed);

            //do specifics

            //get array of current registrations





        });

        const dataToSend = {



            emailid: lesionUnderEdit,
            //options: myOpts,

        }

        const jsonString = JSON.stringify(dataToSend);
        //console.log(jsonString);



        var request = $.ajax({
            url: siteRoot + "assets/scripts/getEmailContents.php",
            crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request.done(function(data) {


            data = data.trim();
            //console.log(data);
            externalTest = $.parseJSON(data);
            //console.log(externalTest);
            if (data) {

                $(externalTest).each(function(i, val) {
                    //TO HERE
                    //CAN TAKE THIIS FORWARD TO ECHO THE EMAIL TEXT WITH VAL
                    //IF IMG
                    //IF VIDEO DO SOMETHING DIFFERENT (echo a textbox for video and an upload for image) 
                    //console.log(val);
                    $.each(val, function(k, v) {

                        //console.log(v);
                    });
                });

                //$(document).find("#registrations").val(2);
                waitForFinalEvent(function() {
                    //$(document).find("#registrations").val().trigger('change');
                    //$('#registrations').select2();
                    //$(document).find("#registrations").empty().append('<option value="id">text</option>').val(externalTest).trigger('change');
                    $(document).find(".registrations").val(externalTest).trigger('change');

                }, 250, 'Wrapper Video');

            } else {

                waitForFinalEvent(function() {
                    //$(document).find("#registrations").val().trigger('change');
                    //$('#registrations').select2();
                    //$(document).find("#registrations").empty().append('<option value="id">text</option>').val(externalTest).trigger('change');
                    $(document).find(".registrations").val('').trigger('change');

                }, 250, 'Wrapper Video 3');

            }

            waitForFinalEvent(function() {
                if (stop === true) {

                    $(document).find('#modal-row-1').modal('hide');
                    resetFormElements("<?php echo $databaseName;?>-form");
                    return;
                }
            }, 500, 'Wrapper Video 2');





        })

        var request2 = $.ajax({
            url: siteRoot + "assets/scripts/getAssetVideos.php",
            crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });

        request2.done(function(data) {


            data = data.trim();
            //console.log(data);
            externalTest2 = $.parseJSON(data);
            if (data) {




                //$(document).find("#registrations").val(2);
                waitForFinalEvent(function() {
                    //$(document).find("#registrations").val().trigger('change');
                    //$('#registrations').select2();
                    //$(document).find("#registrations").empty().append('<option value="id">text</option>').val(externalTest).trigger('change');
                    $(document).find(".videos").val(externalTest2).trigger('change');

                }, 250, 'Wrapper Video 4');

            } else {

                waitForFinalEvent(function() {
                    //$(document).find("#registrations").val().trigger('change');
                    //$('#registrations').select2();
                    //$(document).find("#registrations").empty().append('<option value="id">text</option>').val(externalTest).trigger('change');
                    $(document).find(".videos").val('').trigger('change');

                }, 250, 'Wrapper Video 5');

            }

            waitForFinalEvent(function() {
                if (stop === true) {

                    $(document).find('#modal-row-1').modal('hide');
                    resetFormElements("<?php echo $databaseName;?>-form");
                    return;
                }
            }, 500, 'Wrapper Video 6');





        })






        enableFormInputs("<?php echo $databaseName;?>-form");

    }

    function sendUserEmail() {


        //userid is lesionUnderEdit

        //console.log('updatePassword chunk');
        //go to php script with an object from the form


        //TODO add identifier and identifierKey

        const dataToSend = {

            passedUserid: lesionUnderEdit,

        }

        const jsonString = JSON.stringify(dataToSend);
        //console.log(jsonString);

        $('.send-mail').prop('disabled', true);
        $('.send-mail').append('&nbsp&nbsp<i class="fas fa-circle-notch fa-spin"></i>');


        var passwordChange = $.ajax({
            url: siteRoot + "assets/scripts/passwordResetGenerateAdmin.php",
            crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        passwordChange.done(function(data) {

            if (data) {
                Swal.fire({
                    type: 'info',
                    title: 'Password Reset',
                    text: data,
                    background: '#162e4d',
                    confirmButtonText: 'ok',
                    confirmButtonColor: 'rgb(238, 194, 120)',


                }).then((result) => {

                    $('.send-mail').prop('disabled', false);
                    $('.send-mail').find('.fa-spin').remove();

                    /* window.location.href = siteRoot;
                    resetFormElements('NewUserForm');
                    enableFormInputs('NewUserForm'); */
                    //$('#registerInterest').modal('hide');

                })

            }

        })

    }

    function sendUserWelcomeEmail() {


        //userid is lesionUnderEdit

        //console.log('updatePassword chunk');
        //go to php script with an object from the form


        //TODO add identifier and identifierKey

        const dataToSend = {

            passedUserid: lesionUnderEdit,

        }

        const jsonString = JSON.stringify(dataToSend);
        //console.log(jsonString);

        $('.send-welcome-mail').prop('disabled', true);
        $('.send-welcome-mail').append('&nbsp&nbsp<i class="fas fa-circle-notch fa-spin"></i>');


        var passwordChange = $.ajax({
            url: siteRoot + "assets/scripts/passwordResetGenerateAdminDigital.php",
            crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        passwordChange.done(function(data) {

            if (data) {
                Swal.fire({
                    type: 'info',
                    title: 'Digital Invite',
                    text: data,
                    background: '#162e4d',
                    confirmButtonText: 'ok',
                    confirmButtonColor: 'rgb(238, 194, 120)',


                }).then((result) => {

                    $('.send-welcome-mail').prop('disabled', false);
                    $('.send-welcome-mail').find('.fa-spin').remove();

                    /* window.location.href = siteRoot;
                    resetFormElements('NewUserForm');
                    enableFormInputs('NewUserForm'); */
                    //$('#registerInterest').modal('hide');

                })

            }

        })

    }

    function fixUserLogin() {


        //userid is lesionUnderEdit

        ////console.log('updatePassword chunk');
        //go to php script with an object from the form


        //TODO add identifier and identifierKey

        const dataToSend = {

            passedUserid: lesionUnderEdit,

        }

        const jsonString = JSON.stringify(dataToSend);
        //console.log(jsonString);

        $('.reset-activity').prop('disabled', true);
        $('.reset-activity').append('&nbsp&nbsp<i class="fas fa-circle-notch fa-spin"></i>');


        var userFix = $.ajax({
            url: siteRoot + "assets/scripts/fixUserAccess.php",
            crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        userFix.done(function(data) {

            if (data) {
                Swal.fire({
                    type: 'info',
                    title: 'User Activity Reset',
                    text: data,
                    background: '#162e4d',
                    confirmButtonText: 'ok',
                    confirmButtonColor: 'rgb(238, 194, 120)',


                }).then((result) => {

                    $('.reset-activity').prop('disabled', false);
                    $('.reset-activity').find('.fa-spin').remove();

                    /* window.location.href = siteRoot;
                    resetFormElements('NewUserForm');
                    enableFormInputs('NewUserForm'); */
                    //$('#registerInterest').modal('hide');

                })

            }

        })

    }

    function submit<?php echo $databaseName;?>Form() {

        //pushDataFromFormAJAX (form, table, identifierKey, identifier, updateType)

        //console.log('got to the submit function');

        if (edit == 0) {

            var esdLesionObject = pushFormDataJSONv2($("#<?php echo $databaseName;?>-form"),
                "<?php echo $databaseName;?>", "user_id", null, "0"); //insert new object

            esdLesionObject.done(function(data) {

                //console.log(data);

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


            if (lesionUnderEdit) {

                var esdLesionObject = pushFormDataJSONv2($("#<?php echo $databaseName;?>-form"),
                    "<?php echo $databaseName;?>", "user_id", lesionUnderEdit, "1"); //insert new object

                esdLesionObject.done(function(data) {

                    //console.log(data);

                    if (data) {

                        if (data == 1) {

                            $('#topModalSuccess').text("Data for <?php echo $databaseName;?> " +
                                lesionUnderEdit + " saved");

                            $('#modal-row-1').animate({
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

                            //alert("No change in data detected");
                            $('#modal-row-1').modal('hide');

                        } else if (data == 2) {

                            alert("Error, try again");


                        }



                    }


                });

            }


        }


    }

    function saveForm() {

        if (lesionUnderEdit) {

            var esdLesionObject = pushFormDataJSONv2($("#<?php echo $databaseName;?>-form"),
                "<?php echo $databaseName;?>", "user_id", lesionUnderEdit, "1"); //insert new object

            esdLesionObject.done(function(data) {

                //console.log(data);

                if (data) {

                    if (data == 1) {





                    } else if (data == 0) {



                    } else if (data == 2) {

                        alert("Error, try again");


                    }



                }


            });

            return esdLesionObject;

            //return request22;



        }



    }

    function saveEmailContents() {


        var dataToSend = getSortOrderComponentsEmail();

        const jsonString = JSON.stringify(dataToSend);
        console.dir(jsonString);


        var request2 = $.ajax({
            url: siteRoot + "assets/scripts/courses/updateEmailComponents.php",
            crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
            type: "POST",
            contentType: "application/json",
            data: jsonString,

        });


        request2.done(function(data) {

            //console.log(data);

            if (data) {



            }



        })

        return request2;







    }

    //delete behaviour

    <?php if ($isSuperuser){

        if ($isSuperuser == 1){

            ?>

    function deleteRow(id) {

        //esdLesionPassed is the current record, some security to check its also that in the id field

        /* if (esdLesionPassed != $("#id").text()){

            return;

        } */


        if (confirm("Do you wish to delete this <?php echo $databaseName;?>?")) {

            disableFormInputs("<?php echo $databaseName;?>-form");

            var esdLesionObject = pushFormDataJSONv2($("#<?php echo $databaseName;?>-form"),
                "<?php echo $databaseName;?>", "user_id", id, "2"
            ); //delete esdLesion //getFormdatav2 is specific for users

            esdLesionObject.done(function(data) {

                //console.log(data);

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

    <?php 

        }
    }
    ?>


    function handleDragStart(e) {
        this.style.opacity = '0.4';
        dragSrcEl = this;

        e.dataTransfer.effectAllowed = 'move';
        e.dataTransfer.setData('text/html', this.innerHTML);
    }

    function handleDragEnd(e) {
        this.style.opacity = '1';

        items.forEach(function(item) {
            item.classList.remove('over');
        });
    }

    function handleDragOver(e) {
        if (e.preventDefault) {
            e.preventDefault();
        }

        return false;
    }

    function handleDrop(e) {
        e.stopPropagation();

        if (dragSrcEl !== this) {

            //get the dragged element
            //put it in a new space just after

            var el = document.createElement("div");
            el.setAttribute('draggable', 'true');
            el.setAttribute('style', 'cursor: move;');
            el.classList.add('input-group');
            el.classList.add('input-group-merge');
            el.classList.add('mb-3');
            el.classList.add('can-drag');


            this.parentNode.insertBefore(el, this.nextSibling);

            //delete the old one

            //dragSrcEl.innerHTML = this.innerHTML;  OLD



            //this.innerHTML = e.dataTransfer.getData('text/html');  OLD

            //this.innerHTML = e.dataTransfer.getData('text/html');


            el.innerHTML = e.dataTransfer.getData('text/html');

            dragSrcEl.remove();

            items = document.querySelectorAll('.emailBody .can-drag');
            items.forEach(function(item) {
                item.addEventListener('dragstart', handleDragStart, false);
                item.addEventListener('dragenter', handleDragEnter, false);
                item.addEventListener('dragover', handleDragOver, false);
                item.addEventListener('dragleave', handleDragLeave, false);
                item.addEventListener('drop', handleDrop, false);
                item.addEventListener('dragend', handleDragEnd, false);
            });
        }

        return false;
    }

    function handleDragEnter(e) {
        this.classList.add('over');
    }

    function handleDragLeave(e) {
        this.classList.remove('over');
    }




    $(document).ready(function() {

        //add those which require date pickr

        //drag and drop





        refreshModal();

        //allow keyboard inpuy

        var keys = [];

        $(document).on('keydown, keyup', function(e) {
            //
            if (e.type == "keydown") {



                if (e.keyCode == 17 || e.keyCode == 91) {
                    //e.preventDefault();
                    keys[0] = e.keyCode; //cmd or ctrl pressed
                } else if (e.keyCode == 69) {
                    keys[1] = 69; //other key pressed
                };

                if ((keys[0] == 17 || keys[0] == 91) && keys[1] == 69) {

                    saveForm().done(function() {

                        saveEmailContents().done(function() {

                            redrawModal();

                        })

                    });
                }

            } else {

                keys = [];
            }

        });


        var options = {
            enableTime: true,
            allowInput: true
        };


        $('[data-toggle="date"]').flatpickr(options);

        // add those which require select2 box

        $('[data-toggle="select"]').select2({

            dropdownParent: $(".modal-content"),
            //theme: "bootstrap",

        });

        $('.registrations').select2({

            dropdownParent: $(".modal-content"),
            //tags: true,
            multiple: true,
            /* ajax: {

                url: siteRoot + 'assets/scripts/querySelectProgrammes.php',

            dataType: 'json'
            },
            processResults: function(data) {
                    return {
                      results: data.items
                    };
                  }, */
        })

        $('.videos').select2({

            dropdownParent: $(".modal-content"),
            //tags: true,
            multiple: true,
            /* ajax: {

                url: siteRoot + 'assets/scripts/querySelectProgrammes.php',

            dataType: 'json'
            },
            processResults: function(data) {
                    return {
                      results: data.items
                    };
                  }, */
        })

        $('#user_id').select2({

            dropdownParent: $(".modal-content"),

            ajax: {
                //url: siteRoot + 'assets/scripts/select2simple.php?table=Delegate&field=firstname',
                url: siteRoot + 'assets/scripts/classes/queryUserSelect.php',
                crossDomain: true,
                headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                },
                data: function(params) {
                    var query = {
                        search: params.term,
                    }

                    // Query parameters will be 
                    //console.log(query);
                    return query;
                },
                dataType: 'json'
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }



        });

        $('#asset_id').select2({

            dropdownParent: $(".modal-content"),

            ajax: {
                //url: siteRoot + 'assets/scripts/select2simple.php?table=Delegate&field=firstname',
                url: siteRoot + 'assets/scripts/classes/queryAssetSelect.php',
                crossDomain: true,
                headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                },
                data: function(params) {
                    var query = {
                        search: params.term,
                    }

                    // Query parameters will be 
                    //console.log(query);
                    return query;
                },
                dataType: 'json'
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }



        });

        /* $('#registrations').select2({

            dropdownParent: $(".modal-content"),
            tags: true,


            tokenSeparators: [",", " "],

            multiple: true,
            ajax: {

                url: siteRoot + 'assets/scripts/querySelectProgrammes.php',
            data: function (params) {
                var query = {
                    search: params.term,
                }

                console.log(query);
                return query;
            },
            dataType: 'json'
            } 
           
            

        });*/

        //$(document).find(".registrations").trigger('change');

        //centre.change, submit ajax of the added tag, or remove



        datatable = $('#dataTable').DataTable({

            "ordering": false,

            language: {
                infoEmpty: "There are currently no active <?php echo $databaseName;?>s.",
                emptyTable: "There are currently no active <?php echo $databaseName;?>s.",
                zeroRecords: "There are currently no active <?php echo $databaseName;?>s.",
            },
            autowidth: true,


            ajax: siteRoot +
                'assets/scripts/tableInteractors/refresh<?php echo $databaseName;?>Table.php',
            //TODO all classes need this function


            //EDIT
            columns: [

                {
                    data: 'id'
                },
                {
                    data: 'email_id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'subject'
                },
                {
                    data: 'preheader'
                },




                {
                    data: null,
                    render: function(data, type, row) {
                        return '<div class="d-flex align-items-center justify-content-end"><div class="actions ml-3"><a class="fill-modal action-item mr-2"  data-toggle="tooltip" title="edit this row" data-original-title="Edit"> <i class="fas fa-pencil-alt"></i> </a> <a class="action-item mr-2 dashboard" data-toggle="tooltip" title="view course dashboard" data-original-title="see enclosed items"> <i class="fas fa-level-down-alt"></i> </a> <div class="dropdown"> <a href="#" class="action-item" role="button" data-toggle="dropdown" aria-haspopup="true" data-expanded="false"> <i class="fas fa-ellipsis-v"></i> </a> <div class="dropdown-menu dropdown-menu-right"> <?php if ($isSuperuser == 1){ ?><a class="delete-row dropdown-item"> Delete </a><a class="duplicate-row dropdown-item"> Duplicate this Mail </a><?php } ?> </div> </div> </div> </div>';
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

        $(document).on('click', '#add<?php echo $databaseName;?>', function() {


            $('#modalMessageArea').text('New <?php echo $databaseName;?>');






            addNewEmail().done(function(e) {

                //$('#modal-row-1').modal('show');

                refreshModal().done(function(result) {

                    $('#modalMessageArea').text('Editing <?php echo $databaseName;?> ' +
                        lesionUnderEdit);
                    $('#modal-row-1').modal('show');
                    fillForm(lesionUnderEdit);
                    edit = 1;
                    items = document.querySelectorAll('.emailBody .can-drag');
                    items.forEach(function(item) {
                        item.addEventListener('dragstart', handleDragStart,
                            false);
                        item.addEventListener('dragenter', handleDragEnter,
                            false);
                        item.addEventListener('dragover', handleDragOver,
                            false);
                        item.addEventListener('dragleave', handleDragLeave,
                            false);
                        item.addEventListener('drop', handleDrop, false);
                        item.addEventListener('dragend', handleDragEnd, false);
                    });

                })


            })






        })

        $(document).on('click', '.fill-modal', function() {

            var targettd = $(this).parent().parent().parent().parent().find('td').first().text();
            //console.log(targettd);
            lesionUnderEdit = targettd;
            refreshModal().done(function(result) {

                $('#modalMessageArea').text('Editing <?php echo $databaseName;?> ' +
                    lesionUnderEdit);
                $('#modal-row-1').modal('show');
                fillForm(targettd);
                edit = 1;
                items = document.querySelectorAll('.emailBody .can-drag');
                items.forEach(function(item) {
                    item.addEventListener('dragstart', handleDragStart, false);
                    item.addEventListener('dragenter', handleDragEnter, false);
                    item.addEventListener('dragover', handleDragOver, false);
                    item.addEventListener('dragleave', handleDragLeave, false);
                    item.addEventListener('drop', handleDrop, false);
                    item.addEventListener('dragend', handleDragEnd, false);
                });

            })


            //fillForm(targettd));








        })

        $(document).on('click', '.delete-row', function() {

            var targettd = $(this).parent().parent().parent().parent().parent().parent().find('td').first().text();
            //console.log(targettd);
            //$('#modal-row-1').modal('show');
            deleteRow(targettd);

        })

        $(document).on('click', '.duplicate-row', function() {

            var targettd = $(this).parent().parent().parent().parent().parent().parent().find('td').first().text();
            //console.log(targettd);
            //$('#modal-row-1').modal('show');
            duplicateRow(targettd);

            })

        $(document).on('click', '.submit-<?php echo $databaseName;?>-form', function() {

            event.preventDefault();
            //console.log('clicked');
            //console.log($('#<?php echo $databaseName;?>-form').closest());
            //$('#<?php echo $databaseName;?>-form').submit();

            saveForm().done(function() {

                saveEmailContents().done(function() {

                    /* if (openedWindow){   TODO IMPLEMENT THIS SO THAT OPENED WINDOW REFRESHES

openedWindow.opener.location.reload();


} */

                    redrawModal();

                })

            });

        })

        $(document).on('click', '.send-mail', function() {

            event.preventDefault();
            sendUserEmail();

        })

        $(document).on('click', '.send-welcome-mail', function() {

            event.preventDefault();
            sendUserWelcomeEmail();

        })

        $(document).on('click', '.reset-activity', function() {

            event.preventDefault();
            fixUserLogin();

        })

        $("#<?php echo $databaseName;?>-form").validate({

            invalidHandler: function(event, validator) {
                var errors = validator.numberOfInvalids();
                //console.log("there were " + errors + " errors");
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










                email_id: {
                    required: true,

                },



                name: {
                    required: true,

                },



                subject: {
                    required: true,

                },



                preheader: {
                    required: true,

                },







            },
            submitHandler: function(form) {

                //submitPreRegisterForm();

                submit<?php echo $databaseName;?>Form();

                //TODO submit changes
                //TODO reimport the array at the top
                //TODO redraw the table



            }




        });

        //detect change of multi-select tag box

        $(document).on('change', '.registrations', function() {

            /* alert('change'); */

            //ajax call to update the link

            //$('#registrations').refreshDataSelect2(optionsSelect);

            //get the options to choose from

            if (loading) {
                return;
            }

            var myOpts = [];

            $(".registrations option").each(function() {
                myOpts.push($(this).val());
            });

            const dataToSend = {


                programmeid: $(this).val(),
                assetid: lesionUnderEdit,
                options: myOpts,

            }

            const jsonString = JSON.stringify(dataToSend);
            //console.log(jsonString);



            var request = $.ajax({
                url: siteRoot + "assets/scripts/updateAssetProgrammes.php",
                crossDomain: true,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request.done(function(data) {



                if (data == 'User profile updated') {

                    Swal.fire({
                        title: 'Congratulations',
                        text: 'Your user profile was upgraded to GIEQs Standard',
                        type: 'success',
                        background: '#162e4d',
                        confirmButtonText: 'ok',
                        confirmButtonColor: 'rgb(238, 194, 120)',

                    })
                }

            })





        })

        $(document).on('change', '.videos', function() {

            /* alert('change'); */

            //ajax call to update the link

            //$('#registrations').refreshDataSelect2(optionsSelect);

            //get the options to choose from

            if (loading) {
                return;
            }

            var myOpts = [];

            $(".videos option").each(function() {
                myOpts.push($(this).val());
            });

            const dataToSend = {


                videoid: $(this).val(),
                assetid: lesionUnderEdit,
                options: myOpts,

            }

            const jsonString = JSON.stringify(dataToSend);
            //console.log(jsonString);



            var request = $.ajax({
                url: siteRoot + "assets/scripts/updateAssetVideos.php",
                crossDomain: true,
                headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                },
                type: "POST",
                contentType: "application/json",
                data: jsonString,
            });



            request.done(function(data) {



                if (data == 'User profile updated') {

                    Swal.fire({
                        title: 'Congratulations',
                        text: 'Your user profile was upgraded to GIEQs Standard',
                        type: 'success',
                        background: '#162e4d',
                        confirmButtonText: 'ok',
                        confirmButtonColor: 'rgb(238, 194, 120)',

                    })
                }

            })





        })


        $(document).on('click', '.dashboard', function() {

            var targettd = $(this).parent().parent().parent().parent().find('td').first().text();
            //console.log(targettd);
            lesionUnderEdit = targettd;

            //load edit form in new window

            openMail(targettd);


        })

        $(document).on('click', '.addText', function(e) {

            //add a new text to the database

            //refresh the database

            if (e.preventDefault) {
                e.preventDefault();
            }

            saveForm().done(function() {

                saveEmailContents().done(function() {

                    addText().done(function(result) {

                        //redrawModal();

                        //

                    });



                })

            });



            //load edit form in new window

            //openInNewTab(siteRoot + 'pages/backend/course_dashboard.php?identifier=' + targettd);


        })

        $(document).on('click', '.addTextButton', function(e) {

            //add a new text to the database

            //refresh the database

            if (e.preventDefault) {
                e.preventDefault();
            }

            saveForm().done(function() {

                saveEmailContents().done(function() {

                    addText().done(function(result) {

                        //redrawModal();

                        //get last item
                        waitForFinalEvent(function() {

                            var buttonText = $('.buttonText').html();

                            //add button text

                            var film = $('body').find('.modal-body')
                                .find('.emailContent').last();

                            //var rowitems = $(v1).


                            $(film).val(buttonText);

                        }, 250, 'Wrapper Video 750');



                        //

                    });



                })

            });



            //load edit form in new window

            //openInNewTab(siteRoot + 'pages/backend/course_dashboard.php?identifier=' + targettd);


        })

        $(document).on('click', '.expand-components', function(e) {

//add a new text to the database

//refresh the database

if (e.preventDefault) {
    e.preventDefault();
}

$('textarea').each(function () {
  this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
}).on('input', function () {
  this.style.height = 'auto';
  this.style.height = (this.scrollHeight) + 'px';
});


});

$(document).on('click', '.shrink-components', function(e) {

//add a new text to the database

//refresh the database

if (e.preventDefault) {
    e.preventDefault();
}

$('textarea').each(function () {
    $(this).attr('rows', 3);
});





});







        $(document).on('click', '.addImg', function(e) {

            //add a new text to the database

            //refresh the database

            if (e.preventDefault) {
                e.preventDefault();
            }

            saveForm().done(function() {

                saveEmailContents().done(function() {

                    addImg().done(function(result) {

                        //redrawModal();

                    });



                })

            });




            //load edit form in new window

            //openInNewTab(siteRoot + 'pages/backend/course_dashboard.php?identifier=' + targettd);


        })

        $(document).on('click', '.addVideo', function(e) {

            //add a new text to the database

            //refresh the database

            if (e.preventDefault) {
                e.preventDefault();
            }

            saveForm().done(function() {

                saveEmailContents().done(function() {

                    addVideo().done(function(result) {

                        //redrawModal();

                    });



                })

            });



            //load edit form in new window

            //openInNewTab(siteRoot + 'pages/backend/course_dashboard.php?identifier=' + targettd);


        })

        $(document).on('click', '.launchViewer', function(e) {

            //add a new text to the database

            //refresh the database

            if (e.preventDefault) {
                e.preventDefault();
            }

            launchViewer();


            /* saveForm().done(function() {

                saveEmailContents().done(function() {

                    redrawModal();



                })

            }); */



            //load edit form in new window

            //openInNewTab(siteRoot + 'pages/backend/course_dashboard.php?identifier=' + targettd);


        })

        $(document).on('click', '.commitEmail', function(e) {

            //add a new text to the database

            //refresh the database

            if (e.preventDefault) {
                e.preventDefault();
            }

            commitEmail();


            /* saveForm().done(function() {

                saveEmailContents().done(function() {

                    redrawModal();



                })

            }); */



            //load edit form in new window

            //openInNewTab(siteRoot + 'pages/backend/course_dashboard.php?identifier=' + targettd);


        })

        $(document).on('click', '.uncommitEmail', function(e) {

//add a new text to the database

//refresh the database

if (e.preventDefault) {
    e.preventDefault();
}

uncommitEmail();


/* saveForm().done(function() {

    saveEmailContents().done(function() {

        redrawModal();



    })

}); */



//load edit form in new window

//openInNewTab(siteRoot + 'pages/backend/course_dashboard.php?identifier=' + targettd);


})

$(document).on('click', '.testEmail', function(e) {

//add a new text to the database

//refresh the database

if (e.preventDefault) {
    e.preventDefault();
}

testEmail();


/* saveForm().done(function() {

    saveEmailContents().done(function() {

        redrawModal();



    })

}); */



//load edit form in new window

//openInNewTab(siteRoot + 'pages/backend/course_dashboard.php?identifier=' + targettd);


})

$(document).on('click', '.clearRecipients', function(e) {

//add a new text to the database

//refresh the database

if (e.preventDefault) {
    e.preventDefault();
}

clearRecipients().done(function() {
    
    redrawModal();

    
});


/* saveForm().done(function() {

    saveEmailContents().done(function() {

        redrawModal();



    })

}); */



//load edit form in new window

//openInNewTab(siteRoot + 'pages/backend/course_dashboard.php?identifier=' + targettd);


})

    })
    </script>
</body>

<?php require BASE_URI . '/footer.php';?>




</html>