

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

      require_once(BASE_URI . '/assets/scripts/classes/gpat_score.class.php'); 
      $gpat_score = new gpat_score();

      require_once(BASE_URI . '/assets/scripts/classes/gpat_glue.class.php'); 
      $gpat_glue = new gpat_glue();
      

   
      ?>

    <!--Page title-->
    <title>GPAT Dashboard</title>

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">


    <style>
    .gieqsGold {

        color: rgb(238, 194, 120);


    }

    .buttons-html5 {

        padding : .5rem .5rem !important;
        margin : .5rem, .5rem !important;

    }

    .buttons-datatable {

        text-align: right !important;
    }

    #dataTable_filter {

text-align: right !important;
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
    include(BASE_URI . '/pages/learning/assets/gpatNav.php');

    
    $debug = false;

    ?>



    <div class="main-content bg-gradient-dark">

        <!--Header CHANGEME-->

        <div class="d-flex align-items-end container">
            <p class="h1 mt-5">GPAT Logbook</p>


        </div>
        <div class="d-flex align-items-end container">
            <p class="text-muted pl-4 mt-2">Find all your GPAT assessments here.</p>

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
                                <div class="d-flex flex-nowrap text-small text-muted text-left px-3 mt-1 mb-3 ">

                                    <div class="gieqsGold">
                                        <i id='reset-table' class="fas fa-undo cursor-pointer mt-2"
                                            title='Remove All Filters' data-toggle='tooltip'
                                            data-placement='right'>&nbsp;Reset Table</i>
                                        <i id='complete-filter' class="fas fa-filter cursor-pointer mt-2"
                                            title='Show Complete GPAT' data-toggle='tooltip' data-placement='right'
                                            onclick=''>&nbsp;Show Complete GPAT Only</i>
                                    </div>





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


                                    <?php

echo '<li class="toc-entry toc-h4" style="font-size:1.0rem;"><a class="text-muted" href="#dataTable">Procedure Log</a></li>';

                       
                        

                       

                            ?>

                                </ul>










                            </div>

                        </div>

                        <div class="col-lg-9">


                            <?php
          
            
            ?>


                            <div class="table-responsive">
                                <table id="dataTable" class="table text-center table-cards align-items-center">
                                    <thead>
                                        <tr>
                                            <!-- EDIT -->
                                            <th>id</th>
                                            <th>gpat id</th>
                                            <th>date</th>
                                            <th>GPAT(unw)</th>
                                            <th>GPAT(w)</th>
                                            <th>SMSA</th>

                                            <th>complete</th>

                                            <th></th>

                                        </tr>
                                    </thead>

                                </table>
                            </div>



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
    <script src="<?php echo BASE_URL;?>/assets/js/jquery.canvasjs.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/node_modules/datatables.net/js/jquery.datatables.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/datatables/Buttons-1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/datatables/Buttons-1.6.1/js/buttons.html5.min.js"></script>





    <script>
    //the number that are actually loaded

    var siteRoot = rootFolder;

    var datatable;


    esdLesionPassed = $("#id").text();

    if (esdLesionPassed == "") {

        var edit = 0;

    } else {

        var edit = 1;

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

    var datatable = $('#dataTable').DataTable({

        language: {
            infoEmpty: "",
            emptyTable: "There are currently no GPAT assessments recorded for <?php echo $userFunctions->getUserName($userid);?>.",
            zeroRecords: "There are currently no GPAT assessments recorded for <?php echo $userFunctions->getUserName($userid);?>.",
        },
        autowidth: true,
        //"oSearch": {"sSearch": "1" }, //TODO implement filter on page load


        ajax: siteRoot + 'assets/scripts/scores/refresh_user_gpat_logbook.php',
        //TODO all classes need this function


        //EDIT
        order: [
            [1, 'desc']
        ],

        columnDefs: [{
            "targets": [0],
            "visible": false,
            "searchable": false
        }, ],

        columns: [{
                data: 'id'
            },
            {
                data: 'gpat_id'
            },
            {
                data: 'date_procedure'
            },
            {
                data: 'fraction'
            },
            {
                data: 'weighted_fraction'
            },
            {
                data: 'SMSA'
            },

            {
                data: 'complete'
            },

            {
                data: null,
                render: function(data, type, row) {
                    return '<div class="d-flex align-items-center justify-content-end"><div class="actions ml-3"><a class="fill-modal action-item mr-2"  data-toggle="tooltip" title="edit this GPAT" data-original-title="Edit"> <i class="fas fa-pencil-alt"></i> </a> <div class="dropdown"> <a href="#" class="action-item" role="button" data-toggle="dropdown" aria-haspopup="true" data-expanded="false"> <i class="fas fa-ellipsis-v"></i> </a> <div class="dropdown-menu dropdown-menu-right"> <a class="delete-row dropdown-item"> Delete </a> </div> </div> </div> </div>';
                }
            }
        ],

            dom: 'frtip<"buttons-datatable"B><"clear">',

            buttons: [
            
                'excelHtml5',
                'copyHtml5',
                'csvHtml5',
            
            ],

        "drawCallback": function(settings) {
            /*  var currentProgrammeID = localStorage.getItem('session-programmeID');

             if (currentProgrammeID != ''){

                 datatable.columns([0]).search(currentProgrammeID).draw();


             } */
        }





    });



    $(document).ready(function() {



        //refreshNavAndTags();


        $("#dataTable").on('click', '.fill-modal', function(e) {

            //to jump to record 
            e.preventDefault();

            var currentRow = $(this).closest("tr");

            var data = $('#dataTable').DataTable().row(currentRow).data();
            //console.log(data['id']);

            window.location.href = siteRoot + 'pages/learning/pages/scores/technique.php?id=' + data[
                'id'];



        });

        $("#dataTable").on('click', '.delete-row', function(e) {

            //to jump to record 
            e.preventDefault();

            var currentRow = $(this).closest("tr");

            var data = $('#dataTable').DataTable().row(currentRow).data();
            //console.log(data['id']);

            const dataToSend = {

                id: data['id'],

            }

            const jsonString = JSON.stringify(dataToSend);


            if (confirm('Are you sure you wish to permanently delete this GPAT?')){

            var request = $.ajax({
                beforeSend: function() {

                },
                url: siteRoot + "assets/scripts/scores/delete_gpat.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString,

            });

            request.done(function(data) {

                console.log(data);

                if (data) {

                    alert('GPAT deleted');
                    datatable.search('').columns().search('').draw();



                }else{

                    alert('Something went wrong.  Please try again');
                }

            })

            return request;

            }

            /* window.location.href = siteRoot + 'pages/learning/pages/scores/technique.php?id=' + data[
                'id']; */



        });

        $(document).on('click', '#reset-table', function(e) {

            //to jump to record 
            e.preventDefault();
            //alert('clicked');  

            //
            datatable.search('').columns().search('').draw();


            //works




        });

        $(document).on('click', '#complete-filter', function(e) {

            //to jump to record 


            datatable.column(6).search("^" + 'Complete' + "$", true, false, true).draw();



        });


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

        //datatables










    })
    </script>
</body>

</html>