<?php
		$openaccess = 0;
		$requiredUserLevel = 2;
		
		require ('../../includes/config.inc.php');		
		
		require (BASE_URI1.'/scripts/headerCreatorV2.php');
	
		//;
		
		$formv1 = new formGenerator;
		$general = new general;
		$video = new video;
		$tagCategories = new tagCategories;
		$esdLesion = new PolypectomyAssessmentTool;  //CHANGE
		
		
		
		?>
<!DOCTYPE html PUBLIC '-//W3C//DTD HTML 4.01//EN'>

<html>

<head>
    <title>Polypectomy Assessment Tool Table</title>
    <!--//CHANGE-->

    <style>
    .text-gieqsGold {

        color: rgb(238, 194, 120);

    }

    .bg-gieqsGold {

        background-color: rgb(238, 194, 120);

    }

    @media only screen and (max-width: 992px) {

        #right {

            display: none;

        }

    }



    }
    </style>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.css">

</head>

<?php
		//include($root . "/scripts/logobar.php");
		include(BASE_URI1 . "/includes/topbar.php");
		include(BASE_URI1 . "/includes/naviv2.php");
		?>

<body>

    <section class="slice">
        <div id='content' class='content container p-2'>



            <div class='row'>
                <div class='col-9'>
                    <h2 style="text-align:left;">Table of Polypectomy Assessment Tools</h2>
                </div>

                <div id="messageBox" class='col-3 yellow-light narrow center'>

                </div>
            </div>

            <div class='row'>


                <div class='col-12'>
                    <p style='text-align:left;'><?php echo "We have  ".$esdLesion->numberOfRows()." lesions";?> </p>
                    <br>
                    <p><?php $general->makeTable("SELECT `id` AS `ID`, `Paris` AS `Paris Classification`, `Location` AS `Location` from `PolypectomyAssessmentTool` ORDER BY `id` DESC"); ?>
                    </p>
                    <!--CHANGE-->
                </div>


            </div>



        </div>
    </section>
    <!-- Datatables -->
    <script src="<?php echo BASE_URL; ?>/node_modules/datatables.net/js/jquery.datatables.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.js"></script>

    <script>
    switch (true) {
        case winLocation('gieqs.com'):

            var rootFolder = 'https://www.gieqs.com/edm/';
            break;

        case winLocation('localhost'):
            var rootFolder = 'http://localhost:90/dashboard/gieqs/edm/';
            break;

        default: // set whatever you want
            var rootFolder = 'https://www.gieqs.com/edm/';
            break;
    }



    var siteRoot = rootFolder;


    $(document).ready(function() {

        $("#dataTable").find("tr");

        $(".content").on("click", ".datarow", function() {

            var id = $(this).find("td:first").text();

            //console.log(id);

            window.location.href = siteRoot + 'scripts/forms/PolypectomyFormv2.php?id=' +
                id; //CHANGE


        })

        $('#dataTable').DataTable();



    });
    </script>


    <?php
		
		    // Include the footer file to complete the template:
		    include($root ."/includes/footer.php");
		
		
		
		
		    ?>
</body>

</html>