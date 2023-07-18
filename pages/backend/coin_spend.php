<?php require '../../assets/includes/config.inc.php';?>

<?php

//php general variables

//form name

//$formName = 'programme-form';

//database name

$databaseName = 'token';

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
$requiredUserLevel = 1;

require BASE_URI . '/head.php';

$formv1 = new formGenerator;

spl_autoload_unregister ('class_loader');
require BASE_URI . '/assets/scripts/pdocrud/script/pdocrud.php';
$pdocrud = new PDOCrud();
spl_autoload_register ('class_loader');



?>

    <title>Ghent International Endoscopy Symposium - Backend - Coin Spend Manager</title>

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
                                <span class="h2 mb-0 text-white d-block">Coin Spend Manager</span>

                                <!-- <span class="text-white">Have a nice day!</span> -->
                            </div>
                            <div class="col-auto flex-fill d-xl-block">
                <ul class="list-inline row justify-content-lg-end mb-0">
                  <li id="cipher-generate" class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0 d-none">
                    <a href="<?php echo BASE_URL;?>/pages/backend/test_backend.php?table=menu"><button class="btn btn-sm">Insert Standard Path</button></a>
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


/* 
$pdocrud->relatedData('asset_id','assets_paid','id','name');


$pdocrud->fieldNotMandatory('partner');
$pdocrud->fieldNotMandatory('sponsor');


$pdocrud->checkDuplicateRecord(array("cipher")); */

//$pdocrud->setSettings("uploadURL", BASE_URI. "/assets/img/icons/");

$pdocrud->fieldTypes("spend_date", "date");

    
echo $pdocrud->dbTable("coin_spend")->render();



switch ($table) {
    case "menu":
        echo $pdocrud->dbTable("menu")->render();
        break;
    case "navigation":
        $pdocrud->relatedData('menu_id','menu','id','title');
        $pdocrud->relatedData('superCategory','values','superCategory','superCategory_t');
        //$pdocrud->addFilter("superCategoryFilter", "Super Category", "superCategory", "dropdown");
        //$pdocrud->setFilterSource("superCategoryFilter", "values", "superCategory", "superCategory_t", "db");
        //$pdocrud->setAdvSearchParam('superCategory', 'Super Category');
        echo $pdocrud->dbTable("navigation")->render();
        break;
    case "headings":
        $pdocrud->relatedData('navigation_id','navigation','id','title');
        echo $pdocrud->dbTable("headings")->render();
        break;
    case "pages":

        //pages table
        $pPages = new PDOCrud();

        $pPages->relatedData('headings_id','headings','id','name');
        $pPages->fieldTypes("simple", "radio");//change gender to radio button
        $pPages->fieldDataBinding("simple", array(0 => "No (displays tag categories)", 1=> "Yes (displays list of individual videos)"), "", "","array");//add data for radio button

        $pPages->tableHeading("Pages");
        $pPages->tableSubHeading("<br><span class=\"text-muted\">Here you can edit individual pages on the site.</span>");

        //add button to view page
        $action = BASE_URL . "/pages/learning/pages/general/show_subscription.php?page_id={pk}";//pk will be replaced by primary key value
        $text = '<i class="fa fa-external-link" aria-hidden="true"></i>';
        $attr = array("title"=>"Show Page");
        $pPages->enqueueBtnActions("url", $action, "url",$text,"id", $attr);   


        echo $pPages->dbTable("pages")->render();

        //tag Category pages table;
        $ppagesTagCategory = new PDOCrud(true);
        $ppagesTagCategory->addPlugin('select2');
        $ppagesTagCategory->tableHeading("Page Tag Categories");
        $ppagesTagCategory->tableSubHeading("<br><span class=\"text-muted\">Add tag categories to the page.  Dependent upon the simple variable on the page.  If simple is 0 these will work.  If simple is 1 these will have no effect.</span>");
        $ppagesTagCategory->relatedData('pages_id','pages','id','title');
        $ppagesTagCategory->relatedData('tagCategories_id','tagCategories','id','tagCategoryName');
        $ppagesTagCategory->fieldCssClass("pages_id", array("select2-element-identifier"));// add css classes
        $ppagesTagCategory->fieldCssClass("tagCategories_id", array("select2-element-identifier"));// add css classes

/*         $ppagesTagCategory->fieldTypes('pages_id', 'multiselect');
 *//*         $ppagesTagCategory->fieldTypes('tagCategories_id', 'multiselect');
 */        
        $ppagesTagCategory->dbTable("pagesTagCategory");
        echo $ppagesTagCategory->render();
        echo $ppagesTagCategory->loadPluginJsCode("select2",".select2-element-identifier");//to add plugin call on select elements


        //video pages table

        $ppagesVideo = new PDOCrud(true);
        $ppagesVideo->dbTable("pagesVideo");
        $ppagesVideo->tableHeading("Page Videos");
        $ppagesVideo->tableSubHeading("<br><span class=\"text-muted\">Add individual videos to the page.  Dependent upon the simple variable on the page.  If simple is 1 these will be added.  If simple is 0 these will have no effect.</span>");

        $ppagesVideo->relatedData('pages_id','pages','id','title');
        $ppagesVideo->relatedData('video_id','video','id','name');
        $ppagesVideo->fieldCssClass("pages_id", array("select2-element-identifier"));// add css classes

        $ppagesVideo->fieldCssClass("video_id", array("select2-element-identifier"));// add css classes


        echo $ppagesVideo->render();
        
//first paramater is first table(object) columnn name and 2nd parameter is 2nd object column name



            break;
            case "blog":
                $pdocrud->relatedData('video_id','video','id','name');
echo $pdocrud->dbTable("blog_v2")->render();
break;
}


//$pdocrud->setSkin("dark");
//$pdocrud->formDisplayInPopup();// call this function to show forms in popup

/* $pdocrud->joinTable("video", "usersViewsVideo.videoid = video.id", "LEFT JOIN");
 */

//menu
 //


//navigation


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

    <!-- Datatables -->
  <!-- Purpose JS -->
<!--   <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/purpose.css" id="stylesheet">
 -->    

  <!-- <script src="<?php echo BASE_URL; ?>/assets/js/purpose.js"></script>
     -->

     <script>

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

$(document).on('ready', function(){

    jQuery(document).ready(function () {
                               jQuery(document).on("pdocrud_before_ajax_action",function(event,obj,data){
                                   console.log(obj);
                                   console.log(data);

                                   if (data.action == 'edit' || data.action == 'add'){

                                       //alert('got it');
                                       $(document).find('#cipher-generate').removeClass('d-none');
                                       //console.log(generateCipher(10));

                                   }

                                   if (data.action == 'back'){

                                    //alert('got it');
                                    $(document).find('#cipher-generate').addClass('d-none');
                                   // console.log(generateCipher(10));

                                    }

                                   //show a predefined buttonn in the header TODO

                                   //this generates a random cipher


                                });
                            });

    $(document).on('click', '#cipher-generate', function(event){

        event.preventDefault();
        var cipher = null;
        var cipher = 'https://www.gieqs.com/assets/img/icons/';
        $(document).find('label:contains(\'Logo src\')').siblings().filter('input').val(cipher);

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