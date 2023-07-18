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
$requiredUserLevel = 1;

require BASE_URI . '/head.php';

$formv1 = new formGenerator;


require_once BASE_URI . '/assets/scripts/classes/assetManager.class.php';
$assetManager = new assetManager;

require_once BASE_URI . '/assets/scripts/classes/userFunctions.class.php';
$userFunctions = new userFunctions;

spl_autoload_unregister ('class_loader');
//require BASE_URI . '/assets/scripts/pdocrud/script/pdocrud_gieqs.php';
require BASE_URI . '/assets/scripts/xcrud/xcrud/xcrud.php';

//$pdocrud = new PDOCrud();

spl_autoload_register ('class_loader');



?>

    <title>Ghent International Endoscopy Symposium - Backend - GIEQs III Asset Manager</title>

    <!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/libs/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.css">
    <script src="<?php echo BASE_URL;?>/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>
    <!-- Purpose CSS -->
    <!-- <link rel="stylesheet" href="<?php //echo BASE_URL; ?>/assets/css/purpose.css" id="stylesheet"> -->


    <link href="<?php echo BASE_URL;?>/assets/scripts/xcrud/xcrud/plugins/select2-develop/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/scripts/xcrud/xcrud/plugins/select2-develop/dist/js/select2.full.js"></script>
<script type="text/javascript">

</script>

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


        <?php 
        

        $debug = false;
        
        require BASE_URI . '/nav.php';?>

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
                            <div class="col-md-10 mb-4 mb-md-0">
                                <span class="h2 mb-0 text-white d-block">GIEQS Pre-Post Question Manager</span>

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

//require($_SERVER['DOCUMENT_ROOT'].'/config/global-xcrud-dbs.php');
if($_SESSION['relative'])
		{
			require($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['relative'].'/config/global-xcrud-dbs.php');	
		}
		else
		{
			require($_SERVER['DOCUMENT_ROOT'].'/config/global-xcrud-dbs.php');

		}
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
//     $dbname = 'gieqs';
//     $dbname_learning = 'learningToolv1';
//     $host = 'localhost';



// }else{

//     $username = 'djt35';
//     $password = 'nevira1pine';
//     $dbname = 'gieqs';
//     $dbname_learning = 'learningtoolv1';
//     $host = 'localhost';


//     //$xcrud->connection('djt35','nevira1pine','learningtoolv1','localhost');


// }

$xcrud->connection($username,$password,$dbname_learning,$host);

$xcrud->table('assets_paid'); //open the assets paid table
$xcrud->table_name('Select course to add questions');


$xcrud->columns('id, name', false); //show the following columns in the table
$xcrud->fields('name'); //show the following columns in the edit view
$xcrud->readonly('name'); //make read-only the following fields in the edit view




//add the question table
$question_nest = $xcrud->nested_table('Manage Course Questions', 'id', 'questions','asset_id'); //display the nested table questions
$question_nest->table_name('Manage Course Questions');
$question_nest->connection($username,$password,$dbname_learning,$host);
$question_nest->fields('asset_id, updated', true); //do not show the following columns in the edit view
$question_nest->validation_pattern('question_order', 'numeric'); //accept only numeric value for question_order
$question_nest->validation_required('question_order'); //require the question_order field
$question_nest->validation_required('text'); //require the text field
$question_nest->validation_required('pre'); //require the pre field



//add the answers table
$choices_nest = $question_nest->nested_table('Answers', 'id', 'choices','question_id');
$choices_nest->table_name('Define Question Choices');
$choices_nest->connection($username,$password,$dbname_learning,$host);
$choices_nest->fields('question_id, updated', true); //do not show the following columns in the edit view
$choices_nest->validation_pattern('number', 'numeric'); //accept only numeric value for number
$choices_nest->validation_required('number'); //require the number field
$choices_nest->validation_required('text'); //require the text field
$choices_nest->validation_required('correct'); //require the correct field
//explanation not required




echo $xcrud->render(); //magic


exit();

$xcrud->table('id, institutional'); //employees - MySQL table name


$xcrud->change_type('logo_src','image','',array(
    'thumbs'=>array(
        array('width'=> 50, 'marker'=>'_small'),
        array('width'=> 100, 'marker'=>'_middle'),
        array('width' => 150, 'folder' => 'thumbs'),
    ) // using 'thumbs' subfolder //uploads to assets/img/uploads
)); 
$xcrud->button(BASE_URL . '/pages/backend/institution_landing.php?institution_id={id}', 'Open Institution', '', 'bg-primary', array('target'=>'_blank'));


$curriculaesectiontable_nest = $xcrud->nested_table('Institutional Users', 'id', 'institution_user','institution_id');
$curriculaesectiontable_nest->connection($username,$password,$dbname_learning,$host);
$curriculaesectiontable_nest->change_type('user_type','select','',array(1=>'administrator', 2=>'viewer'),);  //2 table removed
$curriculaesectiontable_nest->change_type('user_id','select','',$userFunctions->getAllUsersArray(),);  //2 table removed
$curriculaesectiontable_nest->columns('institution_id', true);
//$curriculaeitemstable_nest->relation('user_id','users','id',array('firstname'));


//$curriculaesectiontable_nest->table('curriculum_sections');


echo $xcrud->render(); //magic

exit();

$xcrud->table('sessionItemAsset'); //employees - MySQL table name
$xcrud->join('sessionItemid','sessionItem','id');
$xcrud->join('sessionItemid','sessionOrder','sessionItemid');
$xcrud->join('sessionOrder.sessionid','session','id');
$xcrud->join('sessionOrder.sessionid', 'programmeOrder', 'sessionid');
$xcrud->join('programmeOrder.programmeid', 'programme', 'id');
$xcrud->relation('sessionItemid','sessionItem','id', array('id', 'title', 'description'));
$xcrud->unset_view();
$xcrud->unset_remove();
$xcrud->limit(50);
$xcrud->order_by(array('programme.date', 'session.timeFrom'));


$xcrud->columns('programme.id, programme.date, programme.title, session.id, session.timeFrom, session.timeTo, session.title, sessionItemAsset.assetid', false);
$xcrud->fields('sessionItemid, assetid', false);
$xcrud->button(BASE_URL . '/login?destination=viewasset&assetid={sessionItemAsset.assetid}', 'Open Asset', '', 'bg-primary', array('target'=>'_blank'));
$xcrud->button(BASE_URL . '/pages/backend/paid_assets.php?identifier={assetid}', 'Edit Asset Videos', 'fas fa-edit', 'bg-secondary', array('target'=>'_blank'));

$xcrud->change_type('assetid','select',0,$assetManager->get_all_assets(),);

//$xcrud->join('id', 'sessionOrder', 'sessionid');
//$xcrud->join('sessionOrder.sessionItemid', 'sessionItem', 'id');

/* $xcrud->columns('programme.id, programme.date, programme.title, session.id, session.timeFrom, session.timeTo, session.title', false);

$sessionItemNest = $xcrud->nested_table('Session Items', 'id', 'sessionOrder','sessionid');
$sessionItemNest->connection($username,$password,$dbname,$host);
$sessionItemNest->relation('sessionItemid','sessionItem','id', array('id', 'title', 'description'));
$sessionItemNest->table('sessionOrder');
$sessionItemNest->join('sessionItemid', 'sessionItem', 'id');
$sessionItemNest->relation('sessionItem.faculty','faculty','id', array('id', 'title', 'firstname', 'surname'));
$sessionItemNest->change_type('sessionItem.live','select',0,array(0=>'No', 1=>'Yes'),);



$sessionItemNest->columns('sessionItem.timeFrom, sessionItem.timeTo, sessionItem.title, sessionItem.description');
$sessionItemNest->fields('sessionItem.timeFrom, sessionItem.timeTo, sessionItem.title, sessionItem.description, sessionItem.faculty, sessionItem.live, sessionItem.url_video');
 */
//$sessionItemNest->change_type('assetid','select',0,$assetManager->get_all_assets(),);




//$xcrud->join('sessionOrder.sessionItemid', 'sessionItemAsset', 'id');
/* $xcrud->change_type('break','select',0,array(0=>'No', 1=>'Yes'),);

$sessionOrderNest = $sessionItemNest->nested_table('Session Assets', 'sessionItemid', 'sessionItemAsset','sessionItemid');
$sessionOrderNest->connection($username,$password,$dbname,$host);
//$sessionOrderNest->relation('sessionItemid','sessionItem','id', array('id', 'title', 'description'));
$sessionOrderNest->table('sessionItemAsset');
$sessionOrderNest->change_type('assetid','select',0,$assetManager->get_all_assets(),); */

//$sessionOrderNest->show_primary_ai_field(FALSE);

//get_all_assets


//$xcrud->join('')

$xcrud->where('programmeOrder.programmeid =', array(47, 48, 49, 50));
/* $xcrud->fields('created, updated', true);
$xcrud->default_tab('Session');
$xcrud->set_logging(true);
$xcrud->fields_inline('long_name');
$xcrud->inline_edit_click('double_click');
$xcrud->button(BASE_URL . '/curricula/{id}', 'Open Curriculum');
 */

//$sessionOrderNest = $xcrud->nested_table('Session Order', 'id', 'sessionOrder','sessionid');
//$sessionOrderNest->connection($username,$password,$dbname,$host);
//$sessionOrderNest->table('curriculum_sections');


//VERY USEFUL TO CHECK LATER
//$xcrud->fk_relation('Session_item','id','sessionOrder','sessionid', 'sessionItemid', 'sessionItem', 'id', array('id', 'timeFrom', 'timeTo', 'title', 'description'));

/* $xcrud->relation('id','sessionOrder','sessionid',array('id'));

$xcrud->relation('','sessionOrder','sessionid',array('id')); */

//$sessionOrderNest->columns('curriculum_id, created, updated', true);

//$xcrud->relation('id','sessionOrder','session_id','');

/* $xcrud->relation('sessionItem','sessionItem','user_id',array('user_id','firstname', 'surname'));
$xcrud->relation('user_id','users','user_id',array('user_id','firstname', 'surname'));
$xcrud->relation('user_id','users','user_id',array('user_id','firstname', 'surname'));

$userstable = $xcrud->nested_table('userstable', 'user_id', 'users','user_id'); // nested table
$userstable = $xcrud->nested_table('userstable', 'user_id', 'users','user_id'); // nested table

$userstable->connection($username,$password,$dbname,$host); // nested table instance access
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
$xcrud->change_type('professionalMember','select',0,array(0=>'Not a member of any', 1=>'ESGE', 2=>'BSG', 3=>'ASGE',),);
$xcrud->change_type('title','select','',array(1=>'Mr', 2=>'Mrs', 3=>'Ms', 4=>'Dr', 5=>'Professor'),);
$xcrud->change_type('interestReason','select','',array(1=>'Quality in general endoscopy', 2=>'Quality in colonoscopy technique', 3=>'Quality in ERCP', 4=>'Quality in endoscopic ultrasound', 5=>'Quality in endoscopic polypectomy', 6=>'Quality in endoscopic imaging of gastrointestinal lesions', 7=>'Quality in endoscopic unit design', 8=>'Quality in gastrointestinal bleeding', 9=>'Quality in inflammatory bowel disease endoscopy', 10=>'Quality in hepatologic endoscopy', 11=>'Quality in therapeutic endoscopy'),);
$xcrud->change_type('informedHow','select','',array(0=>'None of the below', 1=>'GIEQs Online', 2=>'GIEQs Mailing List', 3=>'Professional Contact', 4=>'Google', 5=>'Social Media'),);

$userstable->change_type('centreCountry', 'select', '', array(1=>"Afghanistan", 2=>"Aland Islands", 3=>"Albania", 4=>"Algeria", 5=>"American Samoa", 6=>"Andorra", 7=>"Angola", 8=>"Anguilla", 9=>"Antarctica", 10=>"Antigua and Barbuda", 11=>"Argentina", 12=>"Armenia", 13=>"Aruba", 14=>"Australia", 15=>"Austria", 16=>"Azerbaijan", 17=>"Bahamas", 18=>"Bahrain", 19=>"Bangladesh", 20=>"Barbados", 21=>"Belarus", 22=>"Belgium", 23=>"Belize", 24=>"Benin", 25=>"Bermuda", 26=>"Bhutan", 27=>"Bolivia", 28=>"Bonaire, Sint Eustatius and Saba", 29=>"Bosnia and Herzegovina", 30=>"Botswana", 31=>"Bouvet Island", 32=>"Brazil", 33=>"British Indian Ocean Territory", 34=>"Brunei", 35=>"Bulgaria", 36=>"Burkina Faso", 37=>"Burundi", 38=>"Cambodia", 39=>"Cameroon", 40=>"Canada", 41=>"Cape Verde", 42=>"Cayman Islands", 43=>"Central African Republic", 44=>"Chad", 45=>"Chile", 46=>"China", 47=>"Christmas Island", 48=>"Cocos (Keeling) Islands", 49=>"Colombia", 50=>"Comoros", 51=>"Congo", 52=>"Cook Islands", 53=>"Costa Rica", 54=>"Ivory Coast", 55=>"Croatia", 56=>"Cuba", 57=>"Curacao", 58=>"Cyprus", 59=>"Czech Republic", 60=>"Democratic Republic of the Congo", 61=>"Denmark", 62=>"Djibouti", 63=>"Dominica", 64=>"Dominican Republic", 65=>"Ecuador", 66=>"Egypt", 67=>"El Salvador", 68=>"Equatorial Guinea", 69=>"Eritrea", 70=>"Estonia", 71=>"Ethiopia", 72=>"Falkland Islands (Malvinas)", 73=>"Faroe Islands", 74=>"Fiji", 75=>"Finland", 76=>"France", 77=>"French Guiana", 78=>"French Polynesia", 79=>"French Southern Territories", 80=>"Gabon", 81=>"Gambia", 82=>"Georgia", 83=>"Germany", 84=>"Ghana", 85=>"Gibraltar", 86=>"Greece", 87=>"Greenland", 88=>"Grenada", 89=>"Guadaloupe", 90=>"Guam", 91=>"Guatemala", 92=>"Guernsey", 93=>"Guinea", 94=>"Guinea-Bissau", 95=>"Guyana", 96=>"Haiti", 97=>"Heard Island and McDonald Islands", 98=>"Honduras", 99=>"Hong Kong", 100=>"Hungary", 101=>"Iceland", 102=>"India", 103=>"Indonesia", 104=>"Iran", 105=>"Iraq", 106=>"Ireland", 107=>"Isle of Man", 108=>"Israel", 109=>"Italy", 110=>"Jamaica", 111=>"Japan", 112=>"Jersey", 113=>"Jordan", 114=>"Kazakhstan", 115=>"Kenya", 116=>"Kiribati", 117=>"Kosovo", 118=>"Kuwait", 119=>"Kyrgyzstan", 120=>"Laos", 121=>"Latvia", 122=>"Lebanon", 123=>"Lesotho", 124=>"Liberia", 125=>"Libya", 126=>"Liechtenstein", 127=>"Lithuania", 128=>"Luxembourg", 129=>"Macao", 130=>"Macedonia", 131=>"Madagascar", 132=>"Malawi", 133=>"Malaysia", 134=>"Maldives", 135=>"Mali", 136=>"Malta", 137=>"Marshall Islands", 138=>"Martinique", 139=>"Mauritania", 140=>"Mauritius", 141=>"Mayotte", 142=>"Mexico", 143=>"Micronesia", 144=>"Moldava", 145=>"Monaco", 146=>"Mongolia", 147=>"Montenegro", 148=>"Montserrat", 149=>"Morocco", 150=>"Mozambique", 151=>"Myanmar (Burma)", 152=>"Namibia", 153=>"Nauru", 154=>"Nepal", 155=>"Netherlands", 156=>"New Caledonia", 157=>"New Zealand", 158=>"Nicaragua", 159=>"Niger", 160=>"Nigeria", 161=>"Niue", 162=>"Norfolk Island", 163=>"North Korea", 164=>"Northern Mariana Islands", 165=>"Norway", 166=>"Oman", 167=>"Pakistan", 168=>"Palau", 169=>"Palestine", 170=>"Panama", 171=>"Papua New Guinea", 172=>"Paraguay", 173=>"Peru", 174=>"Phillipines", 175=>"Pitcairn", 176=>"Poland", 177=>"Portugal", 178=>"Puerto Rico", 179=>"Qatar", 180=>"Reunion", 181=>"Romania", 182=>"Russia", 183=>"Rwanda", 184=>"Saint Barthelemy", 185=>"Saint Helena", 186=>"Saint Kitts and Nevis", 187=>"Saint Lucia", 188=>"Saint Martin", 189=>"Saint Pierre and Miquelon", 190=>"Saint Vincent and the Grenadines", 191=>"Samoa", 192=>"San Marino", 193=>"Sao Tome and Principe", 194=>"Saudi Arabia", 195=>"Senegal", 196=>"Serbia", 197=>"Seychelles", 198=>"Sierra Leone", 199=>"Singapore", 200=>"Sint Maarten", 201=>"Slovakia", 202=>"Slovenia", 203=>"Solomon Islands", 204=>"Somalia", 205=>"South Africa", 206=>"South Georgia and the South Sandwich Islands", 207=>"South Korea", 208=>"South Sudan", 209=>"Spain", 210=>"Sri Lanka", 211=>"Sudan", 212=>"Suriname", 213=>"Svalbard and Jan Mayen", 214=>"Swaziland", 215=>"Sweden", 216=>"Switzerland", 217=>"Syria", 218=>"Taiwan", 219=>"Tajikistan", 220=>"Tanzania", 221=>"Thailand", 222=>"Timor-Leste (East Timor)", 223=>"Togo", 224=>"Tokelau", 225=>"Tonga", 226=>"Trinidad and Tobago", 227=>"Tunisia", 228=>"Turkey", 229=>"Turkmenistan", 230=>"Turks and Caicos Islands", 231=>"Tuvalu", 232=>"Uganda", 233=>"Ukraine", 234=>"United Arab Emirates", 235=>"United Kingdom", 236=>"United States", 237=>"United States Minor Outlying Islands", 238=>"Uruguay", 239=>"Uzbekistan", 240=>"Vanuatu", 241=>"Vatican City", 242=>"Venezuela", 243=>"Vietnam", 244=>"Virgin Islands, British", 245=>"Virgin Islands, US", 246=>"Wallis and Futuna", 247=>"Western Sahara", 248=>"Yemen", 249=>"Zambia", 250=>"Zimbabwe", ),);


 */
//$xcrud->is_edit_modal(true);>

?>

<a class="btn btn-fill-gieqsGold btn-sm mx-2 my-3" href="<?php echo BASE_URL;?>/pages/backend/view_assets_gieqs_iii.php">View Assets GIII</a>
<a class="btn btn-fill-gieqsGold btn-sm mx-2 my-3" href="<?php echo BASE_URL;?>/pages/backend/assets_program.php">Edit Structure GIII</a>


<?php
echo $xcrud->render(); //magic


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


$(document).on('ready', function(){

   
    /* $(document).on("xcrudbeforerequest", function(event, container) {
        $('.xcrud-container').find('select').select2('destroy');
});
$(document).on("ready xcrudafterrequest", function(event, container)
 {
    alert('fired');
    $('.xcrud-container').find('select').select2();
});
$(document).on("xcrudbeforedepend", function(event, container, data) {

    $('.xcrud-container').find('select').select2();
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
    $('.xcrud-container').find('select').select2();
    jQuery(container).find('select[name="' + data.name + '"]').select2();
});

waitForFinalEvent(function() {

    $('.xcrud-container').find('select').select2();

}, 1000, "hello header"); */

$(document).on("xcrudbeforerequest", function(event, container) {
    if (container) {
        $(container).find("select").select2('destroy');
    } else {
        $(".xcrud").find("select").select2('destroy');
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
    console.log('container is ' + container);
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