<?php require '../../assets/includes/config.inc.php';?>

<?php

//php general variables

//form name

//$formName = 'programme-form';

//database name

$debug = false;

$databaseName = 'symposium';

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
$requiredUserLevel = 2;

require BASE_URI . '/head.php';

$formv1 = new formGenerator;

spl_autoload_unregister ('class_loader');
//require BASE_URI . '/assets/scripts/pdocrud/script/pdocrud_gieqs.php';
require BASE_URI . '/assets/scripts/xcrud/xcrud/xcrud.php';

//$pdocrud = new PDOCrud();

spl_autoload_register ('class_loader');



?>

    <title>GIEQs Online - Backend - Curriculum Editor</title>

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

    #symposium {

        background-color: #162e4d;
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
                                <span class="h2 mb-0 text-white d-block">Living Curriculum Manager</span>

                                <!-- <span class="text-white">Have a nice day!</span> -->
                            </div>
                            <div class="col-auto flex-fill d-xl-block">
                <ul class="list-inline row justify-content-lg-end mb-0">
                  <li id="cipher-generate" class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0 d-none">
                    <a href="<?php echo BASE_URL;?>/pages/backend/test_backend.php?table=menu"><button class="btn btn-sm">Generate Cipher</button></a>
                  </li>
                  <li id="link-generate" class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0 d-none">
                    <a href="<?php echo BASE_URL;?>/pages/backend/test_backend.php?table=menu"><button class="btn btn-sm">Generate Link</button></a>
                  </li>
                  <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
<!--                   <a href="<?php echo BASE_URL;?>/pages/backend/test_backend.php?table=navigation"><button class="btn btn-sm">Navigation</button></a>
 -->                  </li>
                  <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
<!--                   <a href="<?php echo BASE_URL;?>/pages/backend/test_backend.php?table=headings"><button class="btn btn-sm">Headings</button></a>
 -->                  </li>
                  <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
<!--                   <a href="<?php echo BASE_URL;?>/pages/backend/test_backend.php?table=pages"><button class="btn btn-sm">Pages</button></a>
 -->                  </li>
                  
                </ul>
              </div>
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
$userFunctions = new userFunctions;


${$databaseName} = new $databaseName;

//eval("\$" . $databaseName . " = new " . $databaseName . ";");

//$programme = new programme;

if (isset($_GET['identifier']) && is_numeric($_GET['identifier'])) {
    $identifierValue = $_GET['identifier'];
    //echo $identifierValue;

} else {

    $identifierValue = null;

}

if (isset($_GET['table'])) {
    $table = $_GET['table'];
    //echo $identifierValue;

} else {

    $table = null;

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

              

<?php 


/* $pdocrud->relatedData('asset_id','assets_paid','id','name');
$pdocrud->fieldTypes("created", "date");
$pdocrud->fieldNotMandatory('partner');
$pdocrud->relatedData('sponsor','sponsor','id','name');
$pdocrud->relatedData('partner','partner','id','name');
$pdocrud->relatedData('institutional_id','institutional','id','name');


$pdocrud->fieldNotMandatory('sponsor');
$pdocrud->fieldNotMandatory('institutional_id');


$pdocrud->checkDuplicateRecord(array("cipher"));


$pdocrud->addPlugin('select2');
 */
/* 
 $pSymposium = new PDOCrud();
 $pSymposium->setSettings("viewFormTabs", true);
 $pSymposium->multiTableRelationDisplay("tab", "Symposium Registration Data");
 $pSymposium->relatedData('user_id', 'users', 'user_id', 'firstname');
 $pSymposium->checkDuplicateRecord(array("id"));
 $pSymposium->tableHeading("Symposium Registrations");
 $pSymposium->tableSubHeading("<br><span class=\"text-muted\">Each record is a symposium registration.  Search for partial registration = 0 and full registration date present.</span>");

 $pSymposium->fieldTypes("includeGIEQsPro", "select");
 $pSymposium->fieldDataBinding("includeGIEQsPro", array(0=>"No", 1=>"Yes"), "", "","array");//add data for radio button

 $pSymposium->addFilter("failed_registration_filter", "Failed Registration", "partial_registration", "radio");
//set data for filter ("unique-filter-name",array of data or table,key (if source=db),value (if source=db), "source_type") 
$pSymposium->setFilterSource("failed_registration_filter", array("0" => "Complete Registration", "1" => "Incomplete Registration"), "", "", "array");

$pSymposium->fieldNotMandatory('group_registration');
$pSymposium->fieldNotMandatory('full_registration_date');
$pSymposium->fieldNotMandatory('professionalMemberDiscount');
$pSymposium->fieldNotMandatory('professionalMemberNumber');
$pSymposium->fieldNotMandatory('notes');

$pSymposium->tableColFormatting("full_registration_date", "date",array("format" =>"m-d-Y H:i:s"));
$pSymposium->addDateRangeReport("Last 30 days", "month", "full_registration_date");



 

 $pUserSymposium = new PDOCrud();
 $pUserSymposium->dbTable("users");

 $pSymposium->multiTableRelation("user_id", "user_id", $pUserSymposium);
 $pUserSymposium->multiTableRelationDisplay("tab", "Associated User Data");


echo $pSymposium->dbTable("symposium")->render(); */
require($_SERVER['DOCUMENT_ROOT'].'/config/global-xcrud-learning.php');
// $host = substr($_SERVER['HTTP_HOST'], 0, 5);
// if (in_array($host, array('local', '127.0', '192.1'))) {
//     $local = TRUE;
// } else {
//     $local = FALSE;
// }
// $xcrud = Xcrud::get_instance(); //instantiate xCRUD

// //$xcrud->connection('root','nevira1pine','learningToolv1','localhost');


// if ($local){

//     $username = 'root';
//     $password = '';
//     $dbname = 'learningToolv1';
//     $host = 'localhost';



// }else{

//     $username = 'djt35';
//     $password = 'nevira1pine';
//     $dbname = 'learningtoolv1';
//     $host = 'localhost';


//     //$xcrud->connection('djt35','nevira1pine','learningtoolv1','localhost');


// }

$xcrud->connection($username,$password,$dbname,$host);



$xcrud->table('curriculae'); //employees - MySQL table name
$xcrud->fields('created, updated', true);
$xcrud->default_tab('Curriculae');
$xcrud->set_logging(true);
$xcrud->fields_inline('long_name');
$xcrud->inline_edit_click('double_click');
$xcrud->change_type('active','select','',array(0=>'Inactive', 1=>'Active',));
$xcrud->relation('owner','partner','id',array('name'));



$xcrud->button(BASE_URL . '/curricula/{id}', 'Open Curriculum');






    //nest 1

    //$curriculaesectiontable_nest = Xcrud::get_instance(); //instantiate xCRUD

    $curriculaesectiontable_nest = $xcrud->nested_table('Sections', 'id', 'curriculum_sections','curriculum_id');
    $curriculaesectiontable_nest->connection($username,$password,$dbname,$host);
    //$curriculaesectiontable_nest->table('curriculum_sections');
    $curriculaesectiontable_nest->relation('curriculum_id','curriculae','id',array('long_name'));
    $curriculaesectiontable_nest->columns('curriculum_id, created, updated', true);

    $curriculaesectiontable_nest->fields('curriculum_id, created, updated', true);
    $curriculaesectiontable_nest->unset_add;
    $curriculaesectiontable_nest->default_tab('Sections');
    $curriculaesectiontable_nest->set_logging(true);
    $curriculaesectiontable_nest->fields_inline('section_order');
    $curriculaesectiontable_nest->inline_edit_click('double_click');




    //third nest, items

    $curriculaeitemstable_nest = $curriculaesectiontable_nest->nested_table('Items', 'id', 'curriculum_items','section_id');
    $curriculaeitemstable_nest->connection($username,$password,$dbname,$host);
    //$curriculaeitemstable_nest->table('curriculum_sections');
    $curriculaeitemstable_nest->relation('curriculum_id','curriculae','id',array('long_name'));
    $curriculaeitemstable_nest->relation('section_id','curriculum_sections','id',array('long_name'));

    $curriculaeitemstable_nest->change_type('type','select','',array(1=>'text', 3=>'figure', 4=>'video', 5=>'gieqs online asset'),);  //2 table removed
    $curriculaeitemstable_nest->change_type('evidence_level','select','',array(0=>'n/a', 1=>'A', 2=>'B', 3=>'C', 4=>'D'),);
    $curriculaeitemstable_nest->columns('curriculum_id, section_id, created, updated', true);

    $curriculaeitemstable_nest->fields('curriculum_id, section_id, created, updated', true);
    $curriculaeitemstable_nest->unset_add;
    $curriculaeitemstable_nest->default_tab('Items');
    $curriculaeitemstable_nest->set_logging(true);
   $curriculaeitemstable_nest->change_type('image_url','image','',array(
        'thumbs'=>array(
            array('width'=> 50, 'marker'=>'_small'),
            array('width'=> 100, 'marker'=>'_middle'),
            array('width' => 150, 'folder' => 'thumbs'),
        ) // using 'thumbs' subfolder
    )); 
    //working just jumps out on return


    //fourth nest, refs

    $curriculumreferencestable_nest = $curriculaeitemstable_nest->nested_table('References', 'id', 'curriculum_references','curriculum_item_id');
    $curriculumreferencestable_nest->connection($username,$password,$dbname,$host);

    $curriculumreferencestable_nest->relation('curriculum_item_id','curriculum_items','id',array('id', 'item_order', 'statement'));
    $curriculumreferencestable_nest->relation('reference_id','references','id',array('id', 'formatted', 'authors'));
    $curriculumreferencestable_nest->columns('curriculum_item_id, created, updated', true);

    $curriculumreferencestable_nest->fields('curriculum_item_id, created, updated', true);
    $curriculumreferencestable_nest->set_logging(true);
    //$curriculumreferencestable_nest->unique('reference_id'); [needed but unique for curriculum id]



    //fifth nest, tags

    $curriculumtagstable_nest = $curriculaeitemstable_nest->nested_table('Tags', 'id', 'curriculum_tags','curriculum_item_id');
    $curriculumtagstable_nest->connection($username,$password,$dbname,$host);

    $curriculumtagstable_nest->relation('curriculum_item_id','curriculum_items','id',array('id', 'item_order', 'statement'));
    $curriculumtagstable_nest->relation('tag_id','tags','id',array('id', 'tagName'));
    $curriculumtagstable_nest->columns('curriculum_item_id, created, updated', true);

        $curriculumtagstable_nest->fields('curriculum_item_id, created, updated', true);
        $curriculumtagstable_nest->set_logging(true);
       // $curriculumtagstable_nest->unique('tag_id');

       //sixth nest, demonstration videos

    $curriculumvideostable_nest = $curriculaeitemstable_nest->nested_table('Videos', 'id', 'curriculum_demonstrations','curriculum_item_id');
    $curriculumvideostable_nest->connection($username,$password,$dbname,$host);

    $curriculumvideostable_nest->relation('curriculum_item_id','curriculum_items','id',array('id', 'item_order', 'statement'));
    $curriculumvideostable_nest->relation('video_id','video','id',array('id', 'name'));
    $curriculumvideostable_nest->relation('chapter_id','chapter','id',array('video_id', 'number', 'name'));

    $curriculumvideostable_nest->columns('curriculum_item_id, created, updated', true);

        $curriculumvideostable_nest->fields('curriculum_item_id, created, updated', true);
        $curriculumvideostable_nest->set_logging(true);





//$curriculaesectiontable->unique('section_order');

//$curriculaesectiontable->unset_add(); // nested table instance access allow add but prevent editing of curriculum field

/* 
$curriculaeitemstable = Xcrud::get_instance(); //instantiate xCRUD

$curriculaeitemstable->connection($username,$password,$dbname,$host);
$curriculaeitemstable->table('curriculum_items');
$curriculaeitemstable->relation('curriculum_id','curriculae','id',array('long_name'));
$curriculaeitemstable->relation('section_id','curriculum_sections','id',array('long_name'));

$curriculaeitemstable->change_type('type','select','',array(1=>'text', 2=>'table', 3=>'figure', 4=>'video', 5=>'gieqs online asset'),);
$curriculaeitemstable->change_type('evidence_level','select','',array(1=>'A', 2=>'B', 3=>'C', 4=>'D'),);
$curriculaeitemstable->fields('created, updated', true);



$curriculumtagstable = Xcrud::get_instance();
$curriculumtagstable->connection($username,$password,$dbname,$host);

$curriculumtagstable->table('curriculum_tags');
$curriculumtagstable->relation('curriculum_item_id','curriculum_items','id',array('id', 'item_order', 'statement'));
$curriculumtagstable->relation('tag_id','tags','id',array('id', 'tagName'));
$curriculumtagstable->fields('created, updated', true);



$curriculumreferencestable = Xcrud::get_instance();
$curriculumreferencestable->connection($username,$password,$dbname,$host);

$curriculumreferencestable->table('curriculum_references');
$curriculumreferencestable->relation('curriculum_item_id','curriculum_items','id',array('id', 'item_order', 'statement'));
$curriculumreferencestable->relation('reference_id','references','id',array('id', 'formatted', 'authors'));
$curriculumreferencestable->fields('created, updated', true); */



//$curriculaeitemstable->relation('category','tagCategories','id',array('id', 'tagCategoryName'));
//$curriculaeitemstable->relation('item','tags','id',array('id', 'tagName'));


/* $xcrud->relation('user_id','users','user_id',array('user_id','firstname', 'surname'));
$userstable = $xcrud->nested_table('userstable', 'user_id', 'users','user_id'); // nested table
$userstable->unset_add(); // nested table instance access
$xcrud->parsley_active(true);
$xcrud->set_logging(true);

$xcrud->set_attr('user_id',array('required'=>'required'));
$xcrud->set_attr('partial_registration',array('required'=>'required'));
$xcrud->change_type('partial_registration','select',0,array(0=>'No', 1=>'Yes'),);
$xcrud->change_type('early_bird','select',0,array(0=>'No', 1=>'Yes'),);
$xcrud->change_type('group_registration','select',0,array(0=>'No', 1=>'Yes'),);
$xcrud->change_type('includeGIEQsPro','select','',array(0=>'No', 1=>'Yes'),);
$xcrud->change_type('registrationType','select','',array(1=>'Doctor', 2=>'Doctor in Training', 3=>'Nurse Endoscopist (includes Nursing Symposium in Dutch)', 4=>'Endoscopy Nurse (includes Nursing Symposium in Dutch)', 5=>'Medical Student'),);
$xcrud->change_type('longTermProMemberDiscount','select',0,array(0=>'No', 1=>'Yes'),);
$xcrud->change_type('professionalMemberDiscount','select',0,array(0=>'No', 1=>'Yes'),);
$xcrud->change_type('professionalMember','select',0,array(0=>'No', 1=>'Yes'),);
$xcrud->change_type('title','select','',array(1=>'Mr', 2=>'Mrs', 3=>'Ms', 4=>'Dr', 5=>'Professor'),);
$xcrud->change_type('interestReason','select','',array(1=>'Doctor', 2=>'Doctor in Training', 3=>'Nurse Endoscopist (includes Nursing Symposium in Dutch)', 4=>'Endoscopy Nurse (includes Nursing Symposium in Dutch)', 5=>'Medical Student'),);
$xcrud->change_type('informedHow','select','',array(0=>'None of the below<', 1=>'GIEQs Online', 2=>'GIEQs Mailing List', 3=>'Professional Contact', 4=>'Google', 5=>'Social Media'),);

 */




//$xcrud->is_edit_modal(true);>

?>

<!-- <button class="btn btn-fill-gieqsGold btn-sm mx-2 my-3" onclick="search_xcrud('1','symposium.partial_registration')">Show Partial Registrations</button>
<button class="btn btn-fill-gieqsGold btn-sm mx-2 my-3" onclick="search_xcrud('0','symposium.partial_registration')">Show Completed Registrations</button>
 -->

<?php
echo $xcrud->render(); //magic
/* echo $curriculaesectiontable->render(); //magic
echo $curriculaeitemstable->render();
echo $curriculumtagstable->render();
echo $curriculumreferencestable->render(); */


//echo $pdocrud->loadPluginJsCode("select2",".select2-element-identifier");//to add plugin call on select elements










//$pdocrud->setSkin("dark");
//$pdocrud->formDisplayInPopup();// call this function to show forms in popup

/* $pdocrud->joinTable("video", "usersViewsVideo.videoid = video.id", "LEFT JOIN");
 */

//menu
 //


//navigation    $xcrud->set_attr('extension',array('required'=>'required'));



//headings


//pages


//blog





//echo $pdocrud->dbTable("usersViewsVideo")->render();?>



            </div>
        </section>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-row-1" role="dialog" aria-labelledby="modal-change-username" aria-hidden="true">
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
                            <h5 class="mb-0">Edit <?php echo $databaseName;?></h5>
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

                    <div class="<?php echo $databaseName;?>-body">
                        <form id="<?php echo $databaseName;?>-form">
                            <div class="form-group">
                                <!-- EDIT -->

                                <label for="user_id">user_id</label>
                                <div class="input-group mb-3">
                                    <select id="user_id" type="text" data-toggle="select" class="form-control"
                                        name="user_id">
                                        <option value="" selected disabled hidden>please select an option</option>

                                    </select>
                                </div>

                                <label for="asset_id">asset_id</label>
                                <div class="input-group mb-3">
                                    <select id="asset_id" type="text" data-toggle="select" class="form-control"
                                        name="asset_id">
                                        <option value="" selected disabled hidden>please select an option</option>

                                    </select>
                                </div>

                                <label for="start_date">start_date</label>
                                <div class="input-group mb-3">
                                    <input id="start_date" type="date" class="form-control" data-toggle="date"
                                        name="start_date">
                                </div>

                                <label for="expiry_date">expiry_date</label>
                                <div class="input-group mb-3">
                                    <input id="expiry_date" type="date" class="form-control" data-toggle="date"
                                        name="expiry_date">
                                </div>

                                <label for="active">active</label>
                                <div class="input-group mb-3">
                                    <select id="active" type="text" data-toggle="select" class="form-control"
                                        name="active">
                                        <option value="" selected disabled hidden>please select an option</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>

                                <label for="auto_renew">auto_renew</label>
                                        <div class="input-group mb-3">
                                            <select id="auto_renew" type="text" data-toggle="select" class="form-control" name="auto_renew">
                                            <option value="" selected disabled hidden>please select an option</option>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                            </select>
                                        </div>

                                <!-- <label for="firstname">First Name</label>
                                        <div class="input-group mb-3">
                                            <input id="firstname" type="text" class="form-control" name="firstname">
                                        </div>

                                    <label for="surname">Surname</label>
                                    <div class="input-group mb-3">
                                        <input id="surname" type="text" class="form-control" name="surname">
                                    </div>

                                    <label for="gender">Gender</label>
                                        <div class="input-group mb-3">
                                        <select id="gender" name="gender" class="form-control" data-toggle="select" aria-hidden="true" aria-invalid="false">
                            <option hidden="">select gender
                            </option>  
                            <option value="1">Female</option>
                              <option value="2"> Male</option>
                              <option value="3">Rather not say</option>
                            </select>
                                        </div> -->

                                <!-- <label for="email">email (also user id)</label>
                                    <div class="input-group mb-3">
                                        <input id="email" type="text" class="form-control" name="email">
                                    </div>

                                    <button class="btn bg-warning text-white p-2 m-2 send-welcome-mail">Send GIEQs digital welcome mail</button>

                                    <button class="btn bg-warning text-white p-2 m-2 send-mail">Send Password Reset Mail   </button>
                                    <button class="btn bg-warning text-white p-2 m-2 reset-activity">Fix user login issue   </button>


                                    <br/> -->



                                <!-- <label for="centreName">centreName</label>
                                        <div class="input-group mb-3">
                                            <input id="centreName" type="text" class="form-control" name="centreName">
                                        </div>

                                        <label for="registered_date">registered_date</label>
                                        <div class="input-group mb-3">
                                            <input id="registered_date" data-toggle = "date" type="text" class="form-control" name="registered_date">
                                        </div> -->




                                <!-- <label for="contactPhone">contactPhone</label>
                                        <div class="input-group mb-3">
                                            <input id="contactPhone" type="text" class="form-control" name="contactPhone">
                                        </div>

                                        <label for="centreCity">centreCity</label>
                                        <div class="input-group mb-3">
                                            <input id="centreCity" type="text" class="form-control" name="centreCity">
                                        </div>

                                        <label for="centreCountry">centreCountry</label>
                                        <div class="input-group mb-3">
                                            <input id="centreCountry" type="text" class="form-control" name="centreCountry">
                                        </div>

                                        <label for="trainee">trainee</label>
                                        <div class="input-group mb-3">
                                            <select id="trainee" type="text" data-toggle="select" class="form-control" name="trainee">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                
                                            </select>
                                        </div>
 -->
                                <!--  <label for="emailPreferences">emailPreferences</label>
                                        <div class="input-group mb-3">
                                            <select id="emailPreferences" type="text" data-toggle="select" class="form-control" name="emailPreferences">
                                            <option value="" selected disabled hidden>select</option>
                                            <option value="1">All email ok</option>
                                            <option value="2">Only regarding activities on the site</option>
                                            <option value="3">No email contact</option>
                                            </select>
                                        </div>

                                        <label for="key">key</label>
                                        <div class="input-group mb-3">
                                            <input id="key" type="text" class="form-control" name="key">
                                        </div> -->



                            </div>
                        </form>

                        <div class="px-5 pt-2 mt-2 mb-2 pb-2 text-center">
                            <p class="text-muted text-sm">Data entered here will change the live site</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                            class="submit-<?php echo $databaseName;?>-form btn btn-sm btn-success">Save</button>
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

    </div>










    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="../../assets/js/purpose.core.js"></script> -->

    <script src="<?php echo BASE_URL; ?>/assets/libs/autosize/dist/autosize.min.js"></script>

    <link href="<?php echo BASE_URL;?>/assets/scripts/xcrud/xcrud/plugins/select2-develop/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/scripts/xcrud/xcrud/plugins/select2-develop/dist/js/select2.full.js"></script>
<script type="text/javascript">

$(document).on("xcrudbeforerequest", function(event, container) {
    if (container) {
        $(container).find("select").each(function(){
          
            if ($(this).data('select2')){

                $(this).select2('destroy');
            }
            
        })
    } else {
        $(".xcrud").find("select").each(function(){
          
          if ($(this).data('select2')){

              $(this).select2('destroy');
          }
          
      })
    }
});
$(document).on("ready xcrudafterrequest", function(event, container)
 {
    if (container) {
        $(container).find("select").select2();
    } else {
        $(".xcrud").find("select").select2();
    }
});
$(document).on("xcrudbeforedepend", function(event, container, data) {
    console.log(data.name);
    //if (container) {
        console.log(!$.isEmptyObject($(container).find('select[name="' + data.name + '"]')));
        console.log(data.name);
        //if(!$.isEmptyObject($(container).find('select[name="' + data.name + '"]'))){
             if ($(container).find('select[name="' + data.name + '"]').data('select2')) {
                  console.log("select2 item");
                  $(container).find('select[name="' + data.name + '"]').select2('destroy');
             }  else {
                  console.log("Not a select2 ");
             }              
        //}
   // }
    
});
$(document).on("xcrudafterdepend", function(event, container, data) {
    jQuery(container).find('select[name="' + data.name + '"]').select2();
});
</script>
    <?php //echo Xcrud::load_js() ?>

    <!-- Datatables -->
  <!-- Purpose JS -->
<!--   <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/purpose.css" id="stylesheet">
 -->    

  <!-- <script src="<?php echo BASE_URL; ?>/assets/js/purpose.js"></script>
     -->

     <script>


function search_xcrud(phrase, col=''){

console.log('Xcrud Search Started: ' + phrase+ ' Col: ' + col);
$('input[name ="phrase"]').val(phrase);
$('select[name ="column"]').val(col);
$( '.search-go' ).trigger( "click" );

}

/* You then connect your button/link with a simple onclick or like this: search_xcrud('phrase','colname');

Here the function:

function search_xcrud(phrase, col=''){

  console.log('Xcrud Search Started: ' + phrase+ ' Col: ' + col);
  $('input[name ="phrase"]').val(phrase);
  $('select[name ="column"]').val(col);
  $( '.search-go' ).trigger( "click" );

}
You can use the function without "col" and than the function searches in all columns. If you search for a specific column you need to enter the name of the table with the exact label as used in $xcrud->columns!

Example: If you use for example table "clients" with the columns id,name,age.

$xcrud->table('Clients');
$xcrud->columns('id, name, age');
You would call the function like this:

search_xcrud('myphrase','Clients.name'); // incl. tablename and colname! 
If you have doubts about the right column check your source code and look for the select box with the name "column" for all your options in this situation. This depends on the use of relations etc. and might change in this cases.

I hope this helps others since I was looking since quite some time for a easy solution without somehow touching the original Xcrud code. PS: Xcrud is fantastic! */


         function generateCipher(length){

            var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * 
 charactersLength));
   }
   return result;


         }


         //progresss select 2; this works     $('.xcrud-container').find('select').select2(); but is not being triggered below
         MutationObserver = window.MutationObserver || window.WebKitMutationObserver;

var observer = new MutationObserver(function(mutations, observer) {
    // fired when a mutation occurs
    console.log(mutations, observer);
    // ...
});

// define what element should be observed by the observer
// and what types of mutations trigger the callback
observer.observe('.xcrud-ajax', {
  subtree: true,
  attributes: true
  //...
});

$(document).on('ready', function(){

   
    

            

    $(document).on('click', '#cipher-generate', function(event){

        event.preventDefault();
        var cipher = null;
        var cipher = generateCipher(15);
        $(document).find('label:contains(\'Cipher\')').siblings().filter('input').val(cipher);

        //console.log($(document).find('label:contains(\'Cipher\')'));

    })
    
    $(document).on('click', '#link-generate', function(event){

        event.preventDefault();
        var cipher = null;
        var cipher = $(document).find('label:contains(\'Cipher\')').siblings().filter('input').val();
        var assetid = $(document).find('label:contains(\'Asset\')').siblings().filter('select').val();
        alert('URL to copy is https://www.gieqs.com/pro-content/'+assetid+'&access_token='+cipher);

        //console.log($(document).find('label:contains(\'Cipher\')'));

    })



})

         </script>

     <style>
     
     .select2-selection__arrow
{
    /*display: none;*/
}

.select2.select2-container
{
    width: 100% !important;
}

.select2-container .select2-selection--single,
.select2-container--default.select2-container--focus .select2-selection--multiple,
.select2-container--default .select2-selection--multiple,
.select2-container--default .select2-search--dropdown .select2-search__field
{
    font-size: 1rem;
    line-height: 1.5;

    display: block;

    width: 100%;
    height: calc(1.5em + 1.5rem + 2px);
    padding: .75rem 1.25rem;

    transition: all .2s ease; 

    color: #fff;
    border: 1px solid #142b47;
    border-radius: .25rem;
    background-color: #1b385d;
    background-clip: padding-box;
    box-shadow: inset 0 1px 1px rgba(18, 38, 63, .075);
}
@media (prefers-reduced-motion: reduce)
{
    .select2-container .select2-selection--single,
    .select2-container--default.select2-container--focus .select2-selection--multiple,
    .select2-container--default .select2-selection--multiple,
    .select2-container--default .select2-search--dropdown .select2-search__field
    {
        transition: none;
    }
}
.select2-container .select2-selection--single::-ms-expand,
.select2-container--default.select2-container--focus .select2-selection--multiple::-ms-expand,
.select2-container--default .select2-selection--multiple::-ms-expand,
.select2-container--default .select2-search--dropdown .select2-search__field::-ms-expand
{
    border: 0; 
    background-color: transparent;
}
.select2-container .select2-selection--single:focus,
.select2-container--default.select2-container--focus .select2-selection--multiple:focus,
.select2-container--default .select2-selection--multiple:focus,
.select2-container--default .select2-search--dropdown .select2-search__field:focus
{
    color: #fff;
    border-color: rgba(48, 110, 255, .5);
    outline: 0;
    background-color: #1b385d;
    box-shadow: inset 0 1px 1px rgba(18, 38, 63, .075), 0 0 20px rgba(48, 110, 255, .1);
}
.select2-container .select2-selection--single::-ms-input-placeholder,
.select2-container--default.select2-container--focus .select2-selection--multiple::-ms-input-placeholder,
.select2-container--default .select2-selection--multiple::-ms-input-placeholder,
.select2-container--default .select2-search--dropdown .select2-search__field::-ms-input-placeholder
{
    opacity: 1; 
    color: #95aac9;
}
.select2-container .select2-selection--single::placeholder,
.select2-container--default.select2-container--focus .select2-selection--multiple::placeholder,
.select2-container--default .select2-selection--multiple::placeholder,
.select2-container--default .select2-search--dropdown .select2-search__field::placeholder
{
    opacity: 1; 
    color: #95aac9;
}
.select2-container .select2-selection--single:disabled,
.select2-container .select2-selection--single[readonly],
.select2-container--default.select2-container--focus .select2-selection--multiple:disabled,
.select2-container--default.select2-container--focus .select2-selection--multiple[readonly],
.select2-container--default .select2-selection--multiple:disabled,
.select2-container--default .select2-selection--multiple[readonly],
.select2-container--default .select2-search--dropdown .select2-search__field:disabled,
.select2-container--default .select2-search--dropdown .select2-search__field[readonly]
{
    opacity: 1; 
    background-color: #edf2f9;
}

.select2-container .select2-selection--single .select2-selection__rendered
{
    overflow: inherit;

    padding: 0;

    white-space: inherit; 
    text-overflow: inherit;
}

.select2-container--default .select2-selection--single .select2-selection__rendered
{
    line-height: inherit; 

    color: inherit;
}

.select2-dropdown
{
    padding: .35rem 0;

    border: 1px solid #142b47;
    border-radius: .25rem; 
    background-color: #162e4d;
}

.select2-results__option
{
    padding: .25rem 1.25rem;

    color: #6e84a3; 
    background-color: #fff;
}
.select2-results__option:hover
{
    color: #fff;
}

.select2-container--default .select2-results__option--highlighted[aria-selected],
.select2-container--default .select2-results__option[aria-selected='true']
{
    color: #306eff; 
    background-color: transparent;
}

.select2-container--default .select2-results__option[aria-disabled=true]
{
    color: #95aac9;
}

.select2-container--default.select2-container--focus .select2-selection--multiple,
.select2-container--default .select2-selection--multiple
{
    height: auto;
    min-height: calc(1.5em + 1.5rem + 2px);
}

.select2-container--default .select2-selection--multiple .select2-selection__rendered
{
    display: block;

    margin: 0 0 -.25rem -.25rem;
    padding: 0;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice
{
    font-size: .875rem;
    line-height: 1.5rem;

    display: inline-flex;

    margin: 0 0 .25rem .25rem;
    padding: 0 .5rem;

    color: #fff; 
    border: none;
    border-radius: .2rem;
    background-color: #193659;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice__remove
{
    margin-left: .5rem;

    color: #6e84a3; 

    order: 2;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover
{
    color: #95aac9;
}

.select2-container .select2-search--inline
{
    display: none;
}

.select2-selection[aria-expanded='true']
{
    border-bottom-right-radius: 0 !important; 
    border-bottom-left-radius: 0 !important;
}

.select2-search--dropdown
{
    padding: .25rem 1.25rem;
}

.select2-container--default .select2-search--dropdown .select2-search__field
{
    font-size: .875rem;
    line-height: 1.5;

    height: calc(1.5em + 1rem + 2px);
    padding: .5rem 1.25rem;

    border-radius: .2rem;
}

.form-control-sm + .select2-container .select2-selection--single,
.form-control-sm + .select2-container--default.select2-container--focus .select2-selection--multiple,
.form-control-sm + .select2-container--default .select2-selection--multiple
{
    font-size: .875rem;
    line-height: 1.5;

    height: calc(1.5em + 1rem + 2px);
    padding: .5rem 1.25rem;

    border-radius: .2rem;
}

.form-control-sm + .select2-container--default.select2-container--focus .select2-selection--multiple,
.form-control-sm + .select2-container--default .select2-selection--multiple
{
    min-height: calc(1.5em + 1rem + 2px);
}

.form-control-sm + .select2-container--default .select2-selection--multiple .select2-selection__choice
{
    line-height: 1.3125rem;
}

.form-control-lg + .select2-container .select2-selection--single,
.form-control-lg + .select2-container--default.select2-container--focus .select2-selection--multiple,
.form-control-lg + .select2-container--default .select2-selection--multiple
{
    font-size: 1.25rem;
    line-height: 1.5;

    height: calc(1.5em + 2rem + 2px);
    padding: 1rem 1.875rem;

    border-radius: .375rem;
}

.form-control-lg + .select2-container--default.select2-container--focus .select2-selection--multiple,
.form-control-lg + .select2-container--default .select2-selection--multiple
{
    min-height: calc(1.5em + 2rem + 2px);
}

.form-control-lg + .select2-container--default .select2-selection--multiple .select2-selection__choice
{
    line-height: 1.875rem;
}
     
     </style>
</body>

<?php require BASE_URI . '/footer.php';?>




</html>