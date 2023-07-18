
<?php  
        $page_title='iACE study - data entry';
        $page_header='Lesion Data entry';
        include ('scroll_header.php');
          ?> 
<style>

	
.navbar {
    background-color: #f75345;
}
	
	
.navbar a {
    color: white;
	background-color: #F75345;
}

.dropdown .dropbtn {
    color: white;
    background-color: #F75345;
}

.navbar a:hover, .dropdown:hover .dropbtn {
    background-color: #4CAF50;
}

.dropdown-content {
    background-color: #4CAF50;
}

.dropdown-content a {
    color: white;
}

.dropdown-content a:hover {
    background-color: #205690;
}
	
th, td {
    text-align: left;
    padding: 6px;
    border-bottom-left-radius: solid 1px black;
}
	
tr:nth-child(2n){background-color: #f2f2f2}

	
	#controlBar {
		    display: inline-block;
			
			text-align: center;
			padding: 5px;
		
	}
	
	#controlBar button{
			

		
	}
	
	.red {
		    color: #D2343E;
			background-color: #ffffff;
		
	}

	.green {
		    color: green;

	
	}
	
	
	
</style>
<?php
error_reporting(0);
		

	

	include('navi.php');
	
	
	set_include_path('classes/');
		require 'formGenerator.class.php';
		require 'Lesion.class.php';
		
		$lesion = new Lesion;
		$lesion->Lesion();
		
		$form = new formGenerator;


if ((isset($_GET['lesionID'])) || (isset($_POST['lesionID']))) { // From other pages.php 


	$checkLesion = $lesion->checkisValidLesion($_GET['lesionID'], $_POST['lesionID']);

	if ($checkLesion == 0){
		
		echo 'Invalid Lesion Passed';
		exit();
		
		
		
	}else{
		
		$lesionID = $_GET['lesionID'];
        $legacy = $lesion->isLegacyLesion($lesionID);
	    echo '<div style = "display:none;" id="legacy">' . $lesion->isLegacyLesion($lesionID) . '</div>';
		
		
	}
	
	
	
}




if ((isset($_GET['lesionID'])) && (is_numeric ($_GET['lesionID']))) { // From other pages.php 
      $lesionID = $_GET['lesionID'];}
     // $legacy = $lesion->isLegacyLesion($lesionID);
	 //echo '<div style = "display:none;" id="legacy">' . $lesion->isLegacyLesion($lesionID) . '</div>';

?>

    </div>
    
</div>




</header>

<style>


</style>
 

<script>

//to id IE
	
if (navigator.userAgent.match(/msie/i) || navigator.userAgent.match(/trident/i) ){
    var browser = 0;
}else{
	var browser = 1;
}
	
if (browser == 1){
	
(function ($)
{
    var oldval = $.fn.val;
    var enc = function(s){return encodeURIComponent(s).replace(/[%20]/gim, '+')};
    jQuery.fn.val = function(value)
    {
        if(this.prop('disabled')){
            if(typeof value == 'undefined'){
                return this.first().data('before-disabled-value');
            } else {
                this.each(function(){
                    $(this).data('before-disabled-value', value);
                });
            }
        }
        return oldval.apply(this, arguments);
    }
    var oldProp = $.fn.prop;
    jQuery.fn.prop = function(name, value)
    {
        if(typeof value != 'undefined' && name == "disabled")
        {
            this.each(function(){
                $(this).data('before-disabled-value', $(this).val());
            });
        }
        return oldProp.apply(this, arguments);
    } 
    var oldAttr = $.fn.attr;
    jQuery.fn.attr = function(name, value)
    {
        if(typeof value != 'undefined' && name == "disabled")
        {
            this.each(function(){
                $(this).data('before-disabled-value', $(this).val());
            });
        }
        return oldAttr.apply(this, arguments);
    }
   
})(jQuery);	
	
}
	
var types = ['You are not editing the lesion','You are editing : index lesion data','You are editing : 30 day lesion data','You are editing : SC1 lesion data','You are editing : SC2 lesion data', 'You are editing : SC3 lesion data', 'You are editing : SC4 lesion data'];
    
function showAll () {
    
    $('.Lesion.Assessment').show();
    $('.Lesion.Resection').show();
    $('.Intra-procedural.Adverse.Events').show();
    $('.Histopathology').show();
    $('.30.day.adverse.events.and.follow.up').show();
    $('.First.Follow.Up').show();
    $('.Second.Follow.Up').show();
    $('.Third.Follow.Up').show();
    $('.Fourth.Follow.Up').show();
    $('#editType').text(types[0]);
	$('.techniqueSelector').hide();
	
	if (isResearchCentre () == '1'){
		
		WestmeadShow ();
		
	}else{
		
		WestmeadHide ();
	}
}            
    
function Index () {
    
    $('.Lesion.Assessment').show();
    $('.Lesion.Resection').show();
    $('.Intra-procedural.Adverse.Events').show();
    $('.Histopathology').css("display","none");
    $('.30.day.adverse.events.and.follow.up').css("display","none");
    $('.First.Follow.Up').css("display","none");
    $('.Second.Follow.Up').css("display","none");
    $('.Third.Follow.Up').css("display","none");
    $('.Fourth.Follow.Up').css("display","none");
    $('#entrytype').val('1');
    $('#editType').text(types[1]);;
	
	if (defineInitialOrEdit () == 1){
	
			if (!$('#EMR').hasClass('green') && !$('#ESD').hasClass('green')){
				$('#EMR').addClass('green');	
			}

			$('#ESD').show();
			$('#EMR').show();
			$('#ColdSnare').show();


			$('#techniqueType').html('1');
			setProcedureEMR();

	}
	
	if (isResearchCentre () == '1'){
		
		WestmeadShow ();
		
	}else{
		
		WestmeadHide ();
	}
	
}        

function ThirtyDay () {
    
    $('.Lesion.Assessment').css("display","none");
    $('.Lesion.Resection').css("display","none");
    $('.Intra-procedural.Adverse.Events').css("display","none");
    $('.Histopathology').show();
    $('.30.day.adverse.events.and.follow.up').show();
    $('.First.Follow.Up').css("display","none");
    $('.Second.Follow.Up').css("display","none");
    $('.Third.Follow.Up').css("display","none");
    $('.Fourth.Follow.Up').css("display","none");
     $('#entrytype').val('2');
    $('#editType').text(types[2]);
	$('.techniqueSelector').hide();
	WestmeadHide ();

}    
        
function SC1 () {
    
    $('.Lesion.Assessment').hide();
    $('.Lesion.Resection').hide();
    $('.Intra-procedural.Adverse.Events').hide();
    $('.Histopathology').hide();
    $('.30.day.adverse.events.and.follow.up').hide();
    $('.First.Follow.Up').show();
    $('.Second.Follow.Up').hide();
    $('.Third.Follow.Up').hide();
    $('.Fourth.Follow.Up').hide();
     $('#entrytype').val('3');
    $('#editType').text(types[3]);
	$('.techniqueSelector').hide();
	WestmeadHide ();

}       

function SC2 () {

    $('.Lesion.Assessment').hide();
    $('.Lesion.Resection').hide();
    $('.Intra-procedural.Adverse.Events').hide();
    $('.Histopathology').hide();
    $('.30.day.adverse.events.and.follow.up').hide();
    $('.First.Follow.Up').hide();
    $('.Second.Follow.Up').show();
    $('.Third.Follow.Up').hide();
    $('.Fourth.Follow.Up').hide();
     $('#entrytype').val('4');
    $('#editType').text(types[4]);
	$('.techniqueSelector').hide();
	WestmeadHide ();
}  

function SC3 () {
    
    $('.Lesion.Assessment').hide();
    $('.Lesion.Resection').hide();
    $('.Intra-procedural.Adverse.Events').hide();
    $('.Histopathology').hide();
    $('.30.day.adverse.events.and.follow.up').hide();
    $('.First.Follow.Up').hide();
    $('.Second.Follow.Up').hide();
    $('.Third.Follow.Up').show();
    $('.Fourth.Follow.Up').hide();
     $('#entrytype').val('5');
    $('#editType').text(types[5]);
	$('.techniqueSelector').hide();
	WestmeadHide ();

}  

function SC4 () {
    
    $('.Lesion.Assessment').hide();
    $('.Lesion.Resection').hide();
    $('.Intra-procedural.Adverse.Events').hide();
    $('.Histopathology').hide();
    $('.30.day.adverse.events.and.follow.up').hide();
    $('.First.Follow.Up').hide();
    $('.Second.Follow.Up').hide();
    $('.Third.Follow.Up').hide();
    $('.Fourth.Follow.Up').show();
    $('#entrytype').val('6');
	$('#editType').text(types[6]);
	$('.techniqueSelector').hide();
	WestmeadHide ();
}  

// !Westmead Only Display Functions


function WestmeadShow () {
    
    $('.Research').show();
    $('#StalkHisto1').show();
    $('#StalkHisto1').prop('disabled', false);
    
    $('#StalkHisto2').show();
    $('#StalkHisto2').prop('disabled', false);

	$('.Research').find(':input').each(function(){
		
		$(this).prop('disabled', false);
		
		
		
	})
   
   
   
} 

function WestmeadHide () {
    
     $('.Research').hide();
     
      $('#StalkHisto1').hide();
    $('#StalkHisto1').prop('disabled', true);
    
    $('#StalkHisto2').hide();
    $('#StalkHisto2').prop('disabled', true);
    
    
	 $('.Research').find(':input').each(function(){
		
		$(this).prop('disabled', true);
		
		
		
	})
}     

</script>
<div class="content">
	<div class="loader"></div>
     
	<div id='controlBar' style='text-align:left;'>
	<button type="button" id="showAll" class='procedureSelector' onclick="showAll();">Show all fields</button>
 <button type="button"  id="index" class='procedureSelector' onclick="Index();">Index</button>
  <button type="button" id="30day" class='procedureSelector' onclick="ThirtyDay();">30 day check</button>
     <button type="button" id="SC1" class='procedureSelector' onclick="SC1();">SC1 Entry</button>
     <button type="button" id="SC2" class='procedureSelector' onclick="SC2();">SC2 Entry </button>
         <button type="button" id="SC3" class='procedureSelector' onclick="SC3();">SC3 Entry </button>
     <button type="button" id="SC4" class='procedureSelector' onclick="SC4();">SC4 Entry </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <br>
     <br>
	 Navigate this lesion:
	 <button type="button" id="toPatient">Go to Parent <b>Patient</b> </button>
	 <button type="button" id="toProcedure">Go to Parent <b>Procedure</b> </button>
	 
	 <button type="button" id="toStudy">Go to <b>Study</b> Page</button><br>
	  <button type="button" id="toLesionManager">Go to <b>Lesion Manager</b> for this lesion</button>
	<br><br>
	
	
	 <button type="button" id="EMR" class='techniqueSelector' style='display: none;'>EMR</button>
	 <button type="button" id="ESD" class='techniqueSelector' style='display: none;'>ESD</button>
	 <button type="button" id="ColdSnare" class='techniqueSelector' style='display: none;'>Cold Snare</button>



</div>
    
    
     <h2>Lesion Entry</h2>
    
<?php
     define ('MYSQL', '../../../mysqli_connect_PROSPER.php');
     require (MYSQL); 

	$centre = $_SESSION['centre'];
	include "centres.php";
	echo "<div id='centre' style='display:none;'>$centre</div>";
	
if ((isset($_GET['lesionID'])) && (is_numeric ($_GET['lesionID']))) { // From other pages.php 
      $lesionID = $_GET['lesionID'];
      
      echo "<div id='patientID' style='display:none;'>";
		echo $lesion->getLesionPatient($lesionID);
        echo "</div>";
    
    $q = "SELECT Name, PageOrder FROM Sheet1 WHERE PageOrder IS NOT NULL ORDER BY PageOrder ASC";
     $r = mysqli_query($dbc, $q);
    
    $pageFields = array();
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) { 
                    $pageFields[$row['PageOrder']] = $row['Name'];    
                    }
    
    $matches = implode(', ', $pageFields);
    
    $q = "SELECT ".$matches.", _k_lesion, _k_procedure FROM Lesion WHERE _k_lesion = ".$lesionID."";
    $r = mysqli_query($dbc, $q);
    
        $formData = array();
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) { 
            echo "You are editing <b>Lesion Number</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$row['_k_lesion']."<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspProcedure Number</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$row['_k_procedure'];
            $_k_procedure = $row['_k_procedure'];
            foreach($pageFields as $x => $x_value) {
                $formData[$x_value]=$row[$x_value];      
                 }
            
            
            }
    
    $q = "SELECT _k_patient FROM `Procedure` WHERE _k_procedure = ".$_k_procedure."";
    $r = mysqli_query($dbc, $q);
         while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) { 
            echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>Patient Number</b> (Study ID)&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$row['_k_patient'];}
    
        echo "<br><br><div id='formData' style='display:none;'>";
        echo json_encode($formData);
        echo "</div>";
        echo "<div id='lesionID' style='display:none;'>";
        echo $lesionID;
        echo "</div>";
		echo "<div id='procedureID2' style='display:none;'>$_k_procedure</div>";
        
            }

if ((isset($_GET['procedureid'])) && (is_numeric ($_GET['procedureid']))) { // From other pages.php 
      $procedureID = $_GET['procedureid'];
    echo "<div id='procedureID' style='display:none;'>";
        echo $procedureID;
        echo "</div>";
        
        
    echo "<div id='lesionID' style='display:none;'>";
        echo "</div>";
    echo "<div id='lesionIDnew' style='display:none;'>";
        echo "</div>";
		
	
    
}

if ((!(isset($lesionID))) && (!(isset($procedureID)))){
		echo '<body>';
		echo '<div class="content">';
		echo 'Please specify a lesion when referring to this page';
		echo '</div></body>';
		//echo 'session tag'.$_SESSION['tag'];
		exit();
		
	}




?>   
<?php 
    error_reporting(0);

    //define the database we are using, here PROSPER.
    
    
?>
   
   
    <div id='SMSA'>
	SMSA score is
	
	</div><br/>
    
    <div id="SERT">
    SERT score is
    </div><br/>
	
	<div id='SERThidden' style='display:none;'></div>
	
	<div id='SMSAtransmit' style='display:none;'></div>
	
	<div id='techniqueType' style='display:none;'></div>
    
    <p id="editType">You are editing </p>
    
    <p id="errorPara"></p>

<form method="post" id="dataentry">
    
  	<div>* indicates mandatory fields to enter once entry type selected at the top of the screen.  If a lesion had surgery or resection not completed some procedural fields are not mandatory.</div>
    <div class="tooltip"><i>Hover mouse over fields that are underlined to reveal explainer</i>
        <span class="tooltiptext">Explainers are displayed to the right of the entry fields.  Please take the time to read these explainers as they will improve the accuracy and reliability of data entry</span></div>

   


        <?php
        //require (MYSQL);
     //   echo "Sex: <SELECT name = 'Sex'>";
     //   $query = "SELECT `Sex`, `Sex_t` FROM `values` WHERE `Sex` IS NOT NULL";
     //   $res = mysqli_query ($dbc, $query);
      //  while($row = mysqli_fetch_array($res))
     //   {
      //      echo "<option value=".$row['Sex'].">".$row['Sex']." ".$row['Sex_t']."</option>"; }
     //   echo "</select>";
      //  mysqli_free_result($res);
      //  mysqli_close($dbc);
      //  ?>
        
    <?php 
       
        include("FormFunctions.php");
       
       ?>
          
       
        <?php 
              $iterationForm = 1;
              $sectionTitle = array();
                    $sectionTitle[0] = "";
                    $sectionTitle[1] = "Lesion Assessment";
                    $sectionTitle[2] = "Lesion Resection";
                    $sectionTitle[3] = "Intra-procedural Adverse Events";
                    $sectionTitle[4] = "Histopathology";
                    $sectionTitle[5] = "30 day adverse events and follow up";
                    $sectionTitle[6] = "First Follow Up";
                    $sectionTitle[7] = "Second Follow Up";
                    $sectionTitle[8] = "Third Follow Up";
                    $sectionTitle[9] = "Fourth Follow Up";  
                    $sectionTitle[10] = "Westmead Additional Research Studies";  
				
			// !Westmead only version here which generates, no just hide and disable if not Westmead	
					
              for($x = 1; $x <= 10; $x++) {
                  echo "<fieldset class=\"".$sectionTitle[$x]."\"><h3>".$sectionTitle[$x]."</h3>";
                  echo "<table style=\"table-layout: fixed;\" class=\"comorbidity\">";
                  include("iterateForm.php");
                  echo "</table><br/></fieldset>";
                  $iterationForm++;
              } 
    
            define ('MYSQL', '../../../mysqli_connect_PROSPER.php');
     require (MYSQL); 
              
       ?>
    
    
    <script>
        
     
function determineSERT () {
    var SizeRaw = $("#Size").val();
    var Dysplasia = $("#Dysplasia").val();
    var IPBleed = $("#IPBleed").val();
    var HGD = 0;
    var Size = 0;
    var IPB = 0;
    var SERT = 0;
    
    //convert dysplasia to HGD yes/no
    if (Dysplasia == 2 || Dysplasia == 3) {
        HGD = 1;
    } else if (Dysplasia == 1 || Dysplasia == 0) {
        HGD = 0;}
    
    if (IPBleed = 1) {IPB = 1;}
        
    // convert size to 0 <40 1 >=40
    if (SizeRaw <40) {
        Size = 0; }
    else if (SizeRaw >= 40){Size = 1;}
        
    if ((SizeRaw != null) && (Dysplasia != null) && (IPBleed != null)) {
        SERT = (HGD + (Size * 2) + IPB);
        return SERT;
    }
    else {
        return null;
    }
    };   
		
function determineSMSA () {
    var Size = $("#Size").val();
    var Morphology = $("#Paris").val(); /*2 if flat 1 if sessile */
    var Access = $("#Access").val();
    var Site = $('#Location').val();
	
	
	if (Size < 10) {
		var SMSA_size = 1;
	}else if(Size >= 10 && Size < 20) {
		var SMSA_size = 3;	
	}else if(Size >= 20 && Size < 30) {
		var SMSA_size = 5;	
	}else if(Size >= 30 && Size < 40) {
		var SMSA_size = 7;	
	}else if(Size >= 40) {
		var SMSA_size = 9;	
	}
	
	if (Morphology == 3) {
		var SMSA_morphology = 3;
	}else if (Morphology != null){
		var SMSA_morphology = 2;
	}
	
	if (Site < 5){
		var SMSA_site = 1;
	}else if(Site >= 5) {
		var SMSA_site = 2;	
	}
	
	if (Access == 0){
		var SMSA_access = 1;
	}else if(Access == 1 || Access == 2 || Access == 3) {
		var SMSA_access = 3;	
	}
		
		
		var smsaScore = +SMSA_size + +SMSA_morphology + +SMSA_site + +SMSA_access;

		if (smsaScore == 4 || smsaScore == 5){ var smsaGroup = 1;}
		if (smsaScore > 5 && smsaScore < 10){ var smsaGroup = 2;}
		if (smsaScore > 8 && smsaScore < 13){ var smsaGroup = 3;}
		if (smsaScore > 12){ var smsaGroup = 4;}
		
		//$('#SMSA').html('SMSA score is '+smsaScore);
		//$('#AdminMorphError').html('SMSA group is '+smsaGroup);
		
		console.log(smsaScore);
	
	
	if (smsaScore != null) {
        return smsaScore;
    }
    else {
        return null;
    }
	
	
    }; 
		
function determineSMSAgroup () {
	   var Size = $("#Size").val();
    var Morphology = $("#Paris").val(); /*2 if flat 1 if sessile */
    var Access = $("#Access").val();
    var Site = $('#Location').val();
	
	
	if (Size < 10) {
		var SMSA_size = 1;
	}else if(Size >= 10 && Size < 20) {
		var SMSA_size = 3;	
	}else if(Size >= 20 && Size < 30) {
		var SMSA_size = 5;	
	}else if(Size >= 30 && Size < 40) {
		var SMSA_size = 7;	
	}else if(Size >= 40) {
		var SMSA_size = 9;	
	}
	
	if (Morphology == 3) {
		var SMSA_morphology = 2;
	}else if (Morphology != null){
		var SMSA_morphology = 1;
	}
	
	if (Site < 5){
		var SMSA_site = 1;
	}else if(Site >= 5) {
		var SMSA_site = 2;	
	}
	
	if (Access == 0){
		var SMSA_access = 1;
	}else if(Access == 1 || Access == 2 || Access == 3) {
		var SMSA_access = 2;	
	}
		
		
		var smsaScore = +SMSA_size + +SMSA_morphology + +SMSA_site + +SMSA_access;

		if (smsaScore == 4 || smsaScore == 5){ var smsaGroup = 1;}
		if (smsaScore > 5 && smsaScore < 10){ var smsaGroup = 2;}
		if (smsaScore > 8 && smsaScore < 13){ var smsaGroup = 3;}
		if (smsaScore > 12){ var smsaGroup = 4;}
		
		//$('#SMSA').html('SMSA score is '+smsaScore);
		//$('#AdminMorphError').html('SMSA group is '+smsaGroup);
		
		console.log(smsaGroup);
	
	
	if (smsaGroup != null) {
        return smsaGroup;
    }
    else {
        return null;
    }
	
};

function writeSERT () {
   var SERTscore = "SERT score is ";
   var SERT = determineSERT();
	if (SERT == null){
		$('#SERT').html('You have not defined enough parameters for SERT score calculation');

	}else{

   $("#SERT").text(SERTscore + SERT);
   $('#SERThidden').html(SERT);
	}
}
function writeSMSA () {
   var SMSAscore = "SMSA score is ";
   var SMSA = determineSMSA();
   var SMSA_group = determineSMSAgroup();
	if (SMSA == null || SMSA_group == null){
		$('#SMSA').html('You have not defined enough parameters for SMSA score calculation');
		
	}else{
	
   $('#SMSA').html('SMSA score is '+SMSA+' and SMSA group is '+SMSA_group);
   $("#hiddenSMSA").val(SMSA);
   $('#SMSAtransmit').html(SMSA);
	}
}
function checkKudo () {
     var valueKudo = $("#HighestKudo").val();
    if (valueKudo == 1) {
        $("#HighestKudoMessage").text('Normal colonic mucosa...are you sure?').css("color","red");}
    else if (valueKudo == 2 || valueKudo == 7) {
        var valueNICE = $("#NICE_Overall").val();
                if (valueNICE == 2) {
                    $("#HighestKudoMessage").text('Kudo II and NICE II do not go together').css("color","red");
                    }
                    else if (valueNICE == 3) {
                    $("#HighestKudoMessage").text('Kudo II and NICE III do not go together').css("color","red");
                   }
            else{
                $("#HighestKudoMessage").text('');  
    }
    }
    else if (valueKudo == 3 || valueKudo == 4 || valueKudo == 8 || valueKudo == 9) {
        var valueNICE = $("#NICE_Overall").val();
            if (valueNICE == 1) {
            $("#HighestKudoMessage").text('Kudo III/IV and NICE I do not go together').css("color","red");
            }
            else if (valueNICE == 3) {
            $("#HighestKudoMessage").text('Kudo III/IV and NICE III do not go together').css("color","red");
            }
            else {
                $("#HighestKudoMessage").text('');  
            }
    }
     else if (valueKudo == 5 || valueKudo == 10 || valueKudo == 11) {
            var valueNICE = $("#NICE_Overall").val();
            if (valueNICE == 1 || valueNICE == 2) {
            $("#HighestKudoMessage").text('Kudo V and NICE I/II do not go together').css("color","red");
            }
            else {
                $("#HighestKudoMessage").text('');
            }
        }
    else {
          $("#HighestKudoMessage").text('');  
        }
    };
function checkPredict () {
    var valueHisto = $(this).val();
    if (valueHisto == 3 || valueHisto == 4) {
        var valueNICE = $("#NICE_Overall").val();
        var valueKudo = $("#HighestKudo").val();
        if ((valueNICE == 1 || valueNICE == 2) || (valueKudo == 3 || valueKudo == 4 ||valueKudo == 8 || valueKudo == 9 || valueKudo == 2 || valueKudo == 7 || valueKudo == 1)) {
        $("#Predict_CancerMessage").text('Consider your values of Kudo and NICE in light of this prediction').css("color","red");
        }   
    }
    else {
      $("#Predict_CancerMessage").text('');  
    }
        
    };
function hideifEmpty () {
    if ($(this).is(':empty')){
        $(this).hide();
    }
    else {
        $(this).show();
    }
    
}
function disableFields(item) {
            $(item).prop("disabled", true).css("background-color","#ffe6e6");
                    } 
        
function enableFields(item) {
            $(item).prop("disabled", false).css("background-color","white");
                    } 
function validateInteger(id, lower, upper) {
    
    if ((id <= upper) && (id >=lower)){
    return true;}
    else {
        return false;
    }
}    
        

function displayMessage(messageField) {
            $(messageField).html("Please enter a value").css("color","red");
                  $(messageField).show();
                    } 


function checkMessagesEmpty(message) {
    if (messageEmpty(message)==true) {
        return;
    } else {
        errors.push(message);
    }
      
} 
function validateIndex () {       
        var errors;
        indexRequiredSelects.forEach(targetEmpty)
        //jQuery select the selectors
        //apply the is empty test
        //wipe all the error boxes
        //display those errors where the test is positive
        indexRequiredMessages.forEach(checkMessagesEmpty);
        //if //errors array empty {
     //    $(':input[type="submit"]').prop('disabled', false);   
     //   }else {
            
        allMessages.forEach(hideAll); indexRequiredMessages.forEach(displayMessage);}
//need a validate function for each criteria
//suspect can base this on importing the critria for each into one function


//trim the input
function isknownEmpty( el ){
      return !$.trim(el.html())
  }

 var request;       
      //get arrays from dbase 
      
 var legacy = $('#legacy').text();
 
        
  
var allSelects=[<?php 
    //$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);

     $sql = "SELECT Name FROM Sheet1 ORDER BY PageOrder ASC";
     $result = mysqli_query($dbc, $sql);
    // $row=(mysqli_fetch_array($result));
         while($row = mysqli_fetch_array($result)){
                 echo "\"\#".$row['Name']."\", ";} ?> ];  
 
var allFields=[<?php 
    //$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);
     $sql = "SELECT Name FROM Sheet1 ORDER BY PageOrder ASC";
     $result = mysqli_query($dbc, $sql);
    // $row=(mysqli_fetch_array($result));
         while($row = mysqli_fetch_array($result)){
                 echo "\"".$row['Name']."\", ";} ?> ];  
        
 var allMessages=[<?php 
    //$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);
     $sql = "SELECT MessageVariable FROM Sheet1 ORDER BY PageOrder ASC";
     $result = mysqli_query($dbc, $sql);
   //  $row=(mysqli_fetch_array($result));
         while($row = mysqli_fetch_array($result)){
                 echo "\"\#".$row['MessageVariable']."\", ";} ?> ];   
        
  var indexRequiredMessages=[<?php 
    //$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);
     $sql = "SELECT MessageVariable FROM Sheet1 WHERE RequiredIndex=1 ORDER BY PageOrder ASC";
     $result = mysqli_query($dbc, $sql);
   //  $row=(mysqli_fetch_array($result));
         while($row = mysqli_fetch_array($result)){
                 echo "\"\#".$row['MessageVariable']."\", ";} ?> ];
        
   var indexRequiredSelects=[<?php 
    //$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);
     $sql = "SELECT Name FROM Sheet1 WHERE RequiredIndex=1 ORDER BY PageOrder ASC";
     $result = mysqli_query($dbc, $sql);
   //  $row=(mysqli_fetch_array($result));
         while($row = mysqli_fetch_array($result)){
                 echo "\"\#".$row['Name']."\", ";} ?> ];  
        
   var indexNotAttemptedRequiredMessages=[<?php 
    //$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);
     $sql = "SELECT MessageVariable FROM Sheet1 WHERE RequiredIndexNoAttempt=1 ORDER BY PageOrder ASC";
     $result = mysqli_query($dbc, $sql);
   //  $row=(mysqli_fetch_array($result));
         while($row = mysqli_fetch_array($result)){
                 echo "\"\#".$row['MessageVariable']."\", ";} 
            mysqli_free_result($result);?> ];  
        
   var indexNotAttemptedRequiredSelects=[<?php 
    //$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);
     $sql = "SELECT Name FROM Sheet1 WHERE RequiredIndexNoAttempt=1 ORDER BY PageOrder ASC";
     $result = mysqli_query($dbc, $sql);
  //   $row=(mysqli_fetch_array($result));
         while($row = mysqli_fetch_array($result)){
                 echo "\"\#".$row['Name']."\", ";} 
                mysqli_free_result($result);
                                         ?> ];
        
    var indexNotAttemptedNotRequiredSelects=[<?php 
        //$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);
     $sql = "SELECT Name FROM Sheet1 WHERE (RequiredIndex=1 AND RequiredIndexNoAttempt=0) OR (RequiredIndex=0 AND RequiredIndexNoAttempt=0 AND (`Position`=2 OR `Position`=3 OR `Position`>4)) ORDER BY PageOrder ASC";
     $result = mysqli_query($dbc, $sql);
    // $row=(mysqli_fetch_array($result));
         while($row = mysqli_fetch_array($result)){
                 echo "\"\#".$row['Name']."\", ";} 
                  mysqli_free_result($result);                           ?> ];

        var thirtyDayRequiredSelects=[<?php 
        //$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);
     $sql = "SELECT Name FROM Sheet1 WHERE Required30day=1 ORDER BY PageOrder ASC";
     $result = mysqli_query($dbc, $sql);
   //  $row=(mysqli_fetch_array($result));
         while($row = mysqli_fetch_array($result)){
                 echo "\"\#".$row['Name']."\", ";} ?> ];
        
                         
      if (legacy == 1) {
	       
	       var SC1RequiredSelects = ["\#FirstFU", "\#FirstFUDate", "\#FirstFURecurrence", "\#FirstFURecurrenceClipArtifact", "\#FirstFUNoRecurScarBx", "\#FirstFUOutcome", "\#FirstFUDisposition", "\#FirstFUNextColon_Mths"]; 
	       
	       
       }else{
	       
	       var SC1RequiredSelects=[<?php 
           //$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
           $dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);
     $sql = "SELECT Name FROM Sheet1 WHERE RequiredSC1=1 ORDER BY PageOrder ASC";
     $result = mysqli_query($dbc, $sql);
   //  $row=(mysqli_fetch_array($result));
         while($row = mysqli_fetch_array($result)){
                 echo "\"\#".$row['Name']."\", ";} ?> ];

	       
	       
	       
       }
       
       var SC1MissingRequiredSelects = ["\#FirstFU", "\#FirstFUOutcome", "\#FirstFUDisposition"]; 
       
       if (legacy == 1) {
	       
	       var SC2RequiredSelects = ["\#SecondFU", "\#SecondFUDate", "\#SecondFURecurrence", "\#SecondFURecurrenceClipArtifact", "\#SecondFUNoRecurScarBx", "\#SecondFUOutcome", "\#SecondFUDisposition", "\#SecondFUNextColon_Mths"]; 
	       
	       
       }else{
	       
	      var SC2RequiredSelects=[<?php 
          //$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
          $dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);
     $sql = "SELECT Name FROM Sheet1 WHERE RequiredSC2=1 ORDER BY PageOrder ASC";
     $result = mysqli_query($dbc, $sql);
   //  $row=(mysqli_fetch_array($result));
         while($row = mysqli_fetch_array($result)){
                 echo "\"\#".$row['Name']."\", ";} ?> ];

	       
	       
	       
       }
       
       var SC2MissingRequiredSelects = ["\#SecondFU", "\#SecondFUOutcome", "\#SecondFUDisposition"]; 
       
       if (legacy == 1) {
	       
	       var SC3RequiredSelects = ["\#ThirdFU", "\#ThirdFUDate", "\#ThirdFURecurrence", "\#ThirdFURecurrenceClipArtifact", "\#ThirdFUNoRecurScarBx", "\#ThirdFUOutcome", "\#ThirdFUDisposition", "\#ThirdFUNextColon_Mths"]; 
	       
	       
       }else{
	       
	       var SC3RequiredSelects=[<?php 
           //$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
           $dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);
     $sql = "SELECT Name FROM Sheet1 WHERE RequiredSC3=1 ORDER BY PageOrder ASC";
     $result = mysqli_query($dbc, $sql);
   //  $row=(mysqli_fetch_array($result));
         while($row = mysqli_fetch_array($result)){
                 echo "\"\#".$row['Name']."\", ";} ?> ];

	       
	       
	       
       }
       
       var SC3MissingRequiredSelects = ["\#ThirdFU", "\#ThirdFUOutcome", "\#ThirdFUDisposition"]; 

       
       if (legacy == 1) {
	       
	       var SC4RequiredSelects = ["\#FourthFU", "\#FourthFUDate", "\#FourthFURecurrence", "\#FourthFURecurrenceClipArtifact", "\#FourthFUNoRecurScarBx", "\#FourthFUOutcome", "\#FourthFUDisposition", "\#FourthFUNextColon_Mths"]; 
	       
	       
       }else{
	       
	       var SC4RequiredSelects=[<?php 
           //$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
           $dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);
     $sql = "SELECT Name FROM Sheet1 WHERE RequiredSC4=1 ORDER BY PageOrder ASC";
     $result = mysqli_query($dbc, $sql);
   //  $row=(mysqli_fetch_array($result));
         while($row = mysqli_fetch_array($result)){
                 echo "\"\#".$row['Name']."\", ";} ?> ];

	       
	       
	       
       } 
       
                 
       var SC4MissingRequiredSelects = ["\#FourthFU", "\#FourthFUOutcome", "\#FourthFUDisposition"]; 
          
        
       
        
        
        
        var surgeryAttemptRequiredSelects=[<?php 
        //$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);
     $sql = "SELECT Name FROM Sheet1 WHERE RequiredSurgeryAttempt=1 ORDER BY PageOrder ASC";
     $result = mysqli_query($dbc, $sql);
   //  $row=(mysqli_fetch_array($result));
         while($row = mysqli_fetch_array($result)){
                 echo "\"\#".$row['Name']."\", ";} ?> ];
        
        var RequiredSurgeryNoAttemptSelects=[<?php 
        //$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);
     $sql = "SELECT Name FROM Sheet1 WHERE RequiredSurgeryNoAttempt=1 ORDER BY PageOrder ASC";
     $result = mysqli_query($dbc, $sql);
   //  $row=(mysqli_fetch_array($result));
         while($row = mysqli_fetch_array($result)){
                 echo "\"\#".$row['Name']."\", ";} ?> ];
		
		var thirtyDayRequiredSelectsUncontact=["\#PreviousAttempt", "\#PreviousBiopsy", "\#Size", "\#Location", "\#Paris", "\#Morphology", "\#HighestKudo", "\#NICE_Overall", "\#Predict_Histo", "\#Predict_Histo_Confidence", "\#Predict_Cancer", "\#Feat_Invasion", "\#EMRAttempted", "\#HistoPathMajor", "\#Dysplasia", "\#Cancer", "\#SMInvasion", "\#FollowUp2Weeks", "\#Disposition2Weeks", "\#SurgReferral"];
		
		var saveRequiredSelects=["\#Size", "\#Location"];
		
		var ESDfields=["#ESDType", "#ESDTrainingCase", "#ESDTrainingCaseSelfCompleted", "#ESDTrainingCaseStageTakeoverCompleted", "#ESDTrainingCaseStageTakeoverReason", "#ESDTrainingCaseStageTakeoverReasonText", "#ESDhighDefScope", "#ESDcutCurrent", "#ESDcutCurrentWatts", "#ESDcutCurrentEffect", "#ESDcoagCurrent", "#ESDcoagCurrentEffect", "#ESDcoagCurrentWatts", "#ESDIPBControl", "#ESDIPBProphylacticCoag", "#ESDPocket", "#ESDaddSnareExcision", "#ESDnoPieces", "#ESDknifeType1", "#ESDknifeType2", "#ESDflushingPump", "#ESDtractionTechnique", "#ESDdurationTotal", "#ESDdurationIncision", "#ESDdurationDissection", "#ESDdurationDefectAssess", "#ESDlesionRemoved", "#ESDenblocEndo", "#ESDdefectVesselstoCoagulate", "#ESDdefectMuscleInjury", "#ESDdefectFullThicknessMuscleInjury", "#ESDHistoDimensionx", "#ESDHistoDimensiony", "#ESDHistoEnBloc", "#ESDHistoR0", "#ESDHistoVM", "#ESDHistoHM", "#ESDHistoTypes", "#ESDHistoDysplasia", "#ESDHistoInvasive", "#ESDHistoSMICDepth", "#ESDHistoSMICLVI", "#ESDHistoSMICLVIconfidence", "#ESDHistoSMICTB", "#ESDHistoSMICDifferentiation", "#ESDgeneralnotes", "#ESDSurgeryNotes"];
    
		var notforESDfields=["#SnareType", "#SnareSize", "#Current", "#No_Injection", "#No_Pieces", "#SnareExcision", "#AddModality", "#SuccessfulEMR", "#EnBloc", "#STSC_Margin", "#SCAR_complete", "#Duration", "#BookTwoStage", "#HistoPathMajor", "#Dysplasia", "#Cancer", "#SMInvasion", "#Margins", "#SpecimenSize", "#IPBleed_Control", "#DeepInjury", "#IPPerforation"];
		
		
		
			
var indexESDRequiredSelects = ["#PreviousBiopsy", "#Size",
  "#Location",
  "#Paris",
  "#Morphology",
  "#HighestKudo",
  "#Predict_Histo",
  "#Predict_Cancer",
  "#Feat_Invasion",
  "#EMRAttempted",
  "#SMInjection",
  "#Constituent",
  "#Adrenaline",
  "#Dye",
  "#Lifting",
  "#SMF",
  "#Access", '#IntendedProcedure', '#ActualPredominantProcedure', '#ESDType', '#ESDTrainingCase', '#ESDcutCurrent', '#ESDcoagCurrent', '#ESDIPBControl', '#ESDIPBProphylacticCoag', '#ESDPocket', '#ESDaddSnareExcision', '#ESDnoPieces', '#ESDknifeType1', '#ESDdurationTotal', '#ESDlesionRemoved', '#ESDenblocEndo', '#ESDdefectMuscleInjury'];
		
/* REMOVED '#ESDtractionTechnique',*/

var indexESDNotAttemptedRequiredSelects = ["#PreviousAttempt",
  "#PreviousBiopsy",
  "#Size",
  "#Location",
  "#Paris",
  "#Morphology",
  "#HighestKudo",
  "#Predict_Histo",
  "#Predict_Cancer",
  "#Feat_Invasion",
  "#EMRAttempted"];




var thirtyDayESDRequiredSelectsUncontact = [
	
	"#FollowUp2Weeks",
	"#ESDHistoEnBloc",
  "#ESDHistoR0",
  "#ESDHistoVM",
  "#ESDHistoHM",
  "#ESDHistoType",
  "#ESDHistoDysplasia",
  "#ESDHistoInvasive", 							  
	"#ESDHistoSMICDepth",
  "#ESDHistoSMICLVI",
  "#ESDHistoSMICTB"			
	
	
];
var thirtyDayESDRequiredSelects = ["#FollowUp2Weeks",
  "#DelayedBleed",
  "#DelayedBleed_Admit",
  "#DelayedBleed_Colon",
  "#DelayedPerforation",
  "#DelayedPerforation_Rx",
  "#Disposition2Weeks",
  "#SurgReferral", 
	"#ESDHistoEnBloc",
  "#ESDHistoR0",
  "#ESDHistoVM",
  "#ESDHistoHM",
  "#ESDHistoType",
  "#ESDHistoDysplasia",
  "#ESDHistoInvasive", 							  
	"#ESDHistoSMICDepth",
  "#ESDHistoSMICLVI",
  "#ESDHistoSMICTB"								  
								  ];
	
	
	
	
var RequiredESDSurgeryNoAttemptSelects = ["#PreviousAttempt",
  "#PreviousBiopsy",
  "#Size",
  "#Location",
  "#Paris",
  "#Morphology",
  "#HighestKudo",
  "#Predict_Histo",
  "#Predict_Cancer",
  "#Feat_Invasion",
  "#EMRAttempted",
  "#FirstFU",
  "#FirstFUDate",
  "#FirstFUSurgery",
  "#FirstFUSurgeryType",
  "#FirstFUSurgeryMethod",
  "#FirstFUSurgeryResidual"
										 
										 
										 ];

var surgeryESDAttemptRequiredSelects = [
	
	"#PreviousBiopsy",
  "#Size",
  "#Location",
  "#Paris",
  "#Morphology",
  "#HighestKudo",
  "#Predict_Histo",
  "#Predict_Cancer",
  "#Feat_Invasion",
  "#EMRAttempted",
  "#SMInjection",
  "#Constituent",
  "#Adrenaline",
  "#Dye",
  "#Lifting",
  "#SMF",
  "#Access", '#IntendedProcedure', '#ActualPredominantProcedure', '#ESDType', '#ESDTrainingCase', '#ESDcutCurrent', '#ESDcoagCurrent', '#ESDIPBControl', '#ESDIPBProphylacticCoag', '#ESDPocket', '#ESDaddSnareExcision', '#ESDnoPieces', '#ESDknifeType1', '#ESDtractionTechnique', '#ESDdurationTotal', '#ESDlesionRemoved', '#ESDenblocEndo', '#ESDdefectVesselstoCoagulate', '#ESDdefectMuscleInjury',
	"#FollowUp2Weeks",
  "#DelayedBleed",
  "#DelayedBleed_Admit",
  "#DelayedBleed_Colon",
  "#DelayedPerforation",
  "#DelayedPerforation_Rx",
  "#Disposition2Weeks",
  "#SurgReferral",
  "#FirstFU",
  "#FirstFUDate",
  "#FirstFUSurgery",
  "#FirstFUSurgeryType",
  "#FirstFUSurgeryMethod",
  "#FirstFUSurgeryResidual"
	
	
];
	
	
var ESDSC1RequiredSelects = [ "#FirstFU",
  "#FirstFUDate",
  "#FirstFURecurrence",
  "#FirstFURecurrenceClipArtifact",
  "#FirstFUNoRecurScarBx",
  "#FirstFUOutcome",
  "#FirstFUDisposition",
  "#FirstFUNextColon_Mths"];
	

	
	
var ESDSC2RequiredSelects = ["#FirstFU", "#SecondFU",
  "#SecondFUDate",
  "#SecondFURecurrence",
  "#SecondFURecurrenceClipArtifact",
  "#SecondFUNoRecurScarBx",
  "#SecondFUOutcome",
  "#SecondFUDisposition",
  "#SecondFUNextColon_Mths"];
	
	
var ESDSC3RequiredSelects = ["#FirstFU", "#SecondFU", "#ThirdFU",
  "#ThirdFUDate",
  "#ThirdFURecurrence",
  "#ThirdFURecurrenceClipArtifact",
  "#ThirdFUNoRecurScarBx",
  "#ThirdFUOutcome",
  "#ThirdFUDisposition",
  "#ThirdFUNextColon_Mths"];
	
	
var ESDSC4RequiredSelects = ["#FirstFU", "#SecondFU", "#ThirdFU", "#FourthFU",
  "#FourthFUDate",
  "#FourthFUMonths",
  "#FourthFURecurrence",
  "#FourthFURecurrenceClipArtifact",
  "#FourthFURecurrenceNotes",
  "#FourthFUOutcome",
  "#FourthFUDisposition"];

		
var CSPfields=["#Locationcm", "#LocationSpecific", "#CSPSnare", "#CSPprotrusion", "#CSPMarginbiopsy"];
		
		var notforCSPfields=["#Lifting", "#SnareSize", "#Current", "#SnareType"];
		
var indexCSPRequiredSelects = ["#PreviousBiopsy", "#Size",
  "#Location",
  "#Paris",
  "#Morphology",
  "#HighestKudo",
  "#Predict_Histo",
  "#Predict_Cancer",
  "#Feat_Invasion",
  "#EMRAttempted",
  "#SMInjection",
  "#Access", '#IntendedProcedure', '#ActualPredominantProcedure', '#Locationcm', '#CSPSnare', '#CSPprotrusion', '#IPBleed', '#DeepInjury', '#SuccessfulEMR', '#IPPerforation'];
		
/* REMOVED '#ESDtractionTechnique',*/

var indexCSPNotAttemptedRequiredSelects = ["#PreviousAttempt",
  "#PreviousBiopsy",
  "#Size",
  "#Location",
  "#Paris",
  "#Morphology",
  "#HighestKudo",
  "#Predict_Histo",
  "#Predict_Cancer",
  "#Feat_Invasion",
  "#EMRAttempted"];




var thirtyDayCSPRequiredSelectsUncontact = [
	
	"#FollowUp2Weeks",
"#HistoPathMajor",
  "#Dysplasia",
  "#Cancer",
  "#SMInvasion"	
	
	
];
var thirtyDayCSPRequiredSelects = ["#FollowUp2Weeks",
  "#DelayedBleed",
  "#DelayedBleed_Admit",
  "#DelayedBleed_Colon",
  "#DelayedPerforation",
  "#DelayedPerforation_Rx",
  "#Disposition2Weeks",
  "#SurgReferral", 
	"#HistoPathMajor",
  "#Dysplasia",
  "#Cancer",
  "#SMInvasion"
 						  
								  ];
	
	
	
	
var RequiredCSPSurgeryNoAttemptSelects = ["#PreviousAttempt",
  "#PreviousBiopsy",
  "#Size",
  "#Location",
  "#Paris",
  "#Morphology",
  "#HighestKudo",
  "#Predict_Histo",
  "#Predict_Cancer",
  "#Feat_Invasion",
  "#EMRAttempted",
  "#FirstFU",
  "#FirstFUDate",
  "#FirstFUSurgery",
  "#FirstFUSurgeryType",
  "#FirstFUSurgeryMethod",
  "#FirstFUSurgeryResidual"
										 
										 
										 ];

var surgeryCSPAttemptRequiredSelects = [
	
	"#PreviousBiopsy",
  "#Size",
  "#Location",
  "#Paris",
  "#Morphology",
  "#HighestKudo",
  "#Predict_Histo",
  "#Predict_Cancer",
  "#Feat_Invasion",
  "#EMRAttempted",
  "#SMInjection",
  "#Access", '#IntendedProcedure', '#ActualPredominantProcedure', '#Locationcm', '#CSPSnare', '#CSPprotrusion',
	"#FollowUp2Weeks",
  "#DelayedBleed",
  "#DelayedBleed_Admit",
  "#DelayedBleed_Colon",
  "#DelayedPerforation",
  "#DelayedPerforation_Rx",
  "#Disposition2Weeks",
  "#SurgReferral",
  "#FirstFU",
  "#FirstFUDate",
  "#FirstFUSurgery",
  "#FirstFUSurgeryType",
  "#FirstFUSurgeryMethod",
  "#FirstFUSurgeryResidual"
	
	
];
	
	
var CSPSC1RequiredSelects = [ "#FirstFU",
  "#FirstFUDate",
  "#FirstFURecurrence",
  "#FirstFURecurrenceClipArtifact",
  "#FirstFUNoRecurScarBx",
  "#FirstFUOutcome",
  "#FirstFUDisposition",
  "#FirstFUNextColon_Mths"];
	

	
	
var CSPSC2RequiredSelects = ["#FirstFU", "#SecondFU",
  "#SecondFUDate",
  "#SecondFURecurrence",
  "#SecondFURecurrenceClipArtifact",
  "#SecondFUNoRecurScarBx",
  "#SecondFUOutcome",
  "#SecondFUDisposition",
  "#SecondFUNextColon_Mths"];
	
	
var CSPSC3RequiredSelects = ["#FirstFU", "#SecondFU", "#ThirdFU",
  "#ThirdFUDate",
  "#ThirdFURecurrence",
  "#ThirdFURecurrenceClipArtifact",
  "#ThirdFUNoRecurScarBx",
  "#ThirdFUOutcome",
  "#ThirdFUDisposition",
  "#ThirdFUNextColon_Mths"];
	
	
var CSPSC4RequiredSelects = ["#FirstFU", "#SecondFU", "#ThirdFU", "#FourthFU",
  "#FourthFUDate",
  "#FourthFUMonths",
  "#FourthFURecurrence",
  "#FourthFURecurrenceClipArtifact",
  "#FourthFURecurrenceNotes",
  "#FourthFUOutcome",
  "#FourthFUDisposition"];


function highlightMandatoryFields (entryType) {
	
	for (x in entryType) {
		
		var text = $(entryType[x]).closest('tr').find('td:eq(0)').text();
		
		if (text.indexOf('*') !== -1){
			var trimmedText = text.substring(2);
			$(entryType[x]).closest('tr').find('td:eq(0)').text(trimmedText);
			$(entryType[x]).closest('tr').find('td:eq(0)').prepend('* ');
		}else {
			
			$(entryType[x]).closest('tr').find('td:eq(0)').prepend('* ');
		}
		
	}
	
	
}		
		
function missingErrors () {
    
  //  if required selects are empty
  //    print a message in the field
    
    //then check all message fields, if all empty allow submit.
    var x;
    var errors = 0;
    for (x in indexRequiredSelects) {
        if ($(indexRequiredSelects[x]).val() == null) {
                if ($(indexRequiredSelects[x]).closest('tr').find('td:eq(2)').text() === "") {
                    $(indexRequiredSelects[x]).closest('tr').find('td:eq(2)').text('You must enter a value').css("color","red");
                    errors = errors + 1;
        }}
        else if ($(indexRequiredSelects[x]).val() != null) {
                if ($(indexRequiredSelects[x]).closest('tr').find('td:eq(2)').text() == "You must enter a value"); {
                $(indexRequiredSelects[x]).closest('tr').find('td:eq(2)').text('');
        }
        }}
}; 
        
function missingErrorsAll (entryType) {
    
    var x;
    var y;
    var errors = 0;
    for (y in entryType) {
       if ($(entryType[x]).closest('tr').find('td:eq(2)').text() == "You must enter a value"); {
                $(entryType[x]).closest('tr').find('td:eq(2)').text('');
       }  
    }
    
    for (x in entryType) {
        if ($(entryType[x]).val() == '' || $(entryType[x]).val() == null) {
            console.log('error in'+x);
            errors = errors + 1;    
            if ($(entryType[x]).closest('tr').find('td:eq(2)').text() === "") {
                    $(entryType[x]).closest('tr').find('td:eq(2)').text('You must enter a value').css("color","red");
                    
        }}
     else if ($(entryType[x]).val() != '' || $(entryType[x]).val() != null) {
               if ($(entryType[x]).closest('tr').find('td:eq(2)').text() == "You must enter a value"); {
                $(entryType[x]).closest('tr').find('td:eq(2)').text('');
       }
        }}
    
    return errors;
}; 
		
function isValidDate(dateString) {
  var regEx = /^\d{4}-\d{2}-\d{2}$/;
  if(!dateString.match(regEx)) return false;  // Invalid format
  var d = new Date(dateString);
  if(!d.getTime() && d.getTime() !== 0) return false; // Invalid date
  return d.toISOString().slice(0,10) === dateString;
}
		
		
function defineLesionType () {
	
	
	
	
	
}	
		
		
function getToolTip () {
	
	//when hovering over td
	
	//get table
	//drill down on each row
	//drill down on first td tdeq1
	//drill down on title of td
	//if has title get as text 
	//pass to the tdeq3

	
	
}

function displayToolTip() {
	//when hover over td(eq1)
	//display tooltip text in td(eq3)
	
	
}	
		
function defineInitialOrEdit () {
	
	var lesionID = $("#lesionID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
    
    var procedureID = $("#procedureID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
	
	if (lesionID != ''){
		
		return 2;
		
	}
	
	if (procedureID != ''){
		
		return 1;
		
	}
	
}		
		

function verifyForm () {
    var lesionID = $("#lesionID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
    
    var procedureID = $("#procedureID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
    
    var entryType = $('#entrytype').val();
	var uncontactable = $('#FollowUp2Weeks').val();
    var emrAttempted = $('#EMRAttempted').val();
    var SurgReferral = $('#SurgReferral').val();
	var Size = +$("#Size").val();
	var FirstFU = $('#FirstFU').val();
	var SecondFU = $('#SecondFU').val();
	var ThirdFU = $('#ThirdFU').val();
	var FourthFU = $('#FourthFU').val();
    
    if (lesionID != '') {
            if (entryType == '') {
                alert('You must select an entry type from the buttons at the top of the screen');

                $('html, body').animate({ scrollTop: 0 }, 'fast');
    
                return;
            }
		
			if (!validateInteger(Size, 20, 200)){
				$("#SizeMessage").text('This study accepts lesions larger or equal to 20mm in maximum dimension').css("color","red");
				 $('html,body').animate({scrollTop: $('#PreviousAttempt').offset().top});
                return;
			}
		
            if (emrAttempted == null) {
                alert('You must define whether the EMR was attempted prior to submission');
                
                $('html,body').animate({scrollTop: $('#EMRAttempted').offset().top});

                $("#EMRAttemptedMessage").text('Please define whether the EMR was attempted prior to submission').css("color","red");
                return;
            }

            if (entryType == 1 && emrAttempted == 6) {
               if ((missingErrorsAll (indexRequiredSelects)) == 0) {
                    updateForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
            if (entryType == 1 && emrAttempted != null && emrAttempted < 6) {
                if ((missingErrorsAll (indexNotAttemptedRequiredSelects)) == 0){
                    updateForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }

            if (entryType == 2) {
                if (uncontactable == 2 || uncontactable == 0) {
					if ((missingErrorsAll (thirtyDayRequiredSelectsUncontact)) == 0){
						 updateForm();
						return;
					}
					else {
						alert('Please correct errors in form');
						$('html, body').animate({ scrollTop: 0 }, 'fast');
						return;
					}
				} else {
				
					if ((missingErrorsAll (thirtyDayRequiredSelects)) == 0){
						 updateForm();
						return;
					}
					else {
						alert('Please correct errors in form');
						$('html, body').animate({ scrollTop: 0 }, 'fast');
						return;
					}
				}
            }
            
            //check SurgReferral exists
            
           
				
            if (entryType == 3 && SurgReferral == 1 && emrAttempted < 6 ) {
                    if ((missingErrorsAll (RequiredSurgeryNoAttemptSelects)) == 0){
                         updateForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
                }
            
            if (entryType == 3 && SurgReferral == 1 && emrAttempted == 6) {
                    if ((missingErrorsAll (surgeryAttemptRequiredSelects)) == 0){
                         updateForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
                }  
        
            if (entryType == 3 && SurgReferral != 1 && emrAttempted == 6) {
                    
				 if (SurgReferral == '' || SurgReferral == null){
	            
					 alert('You must define whether surgery was required after the index procedure to enter surveillance data');
				 	return;
	            
				}
            
				
				// define firstFU
				
								
				if (FirstFU == '1' || FirstFU == '2'){
					
					//alert('hello');
					
					if (!isValidDate(($('#FirstFUDate').val()))){
					 $("#FirstFUDateMessage").text('The date must be entered in format yyyy-mm-dd').css("color","red");
					$('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');
					return;
					
					}
				
					if ((missingErrorsAll (SC1RequiredSelects)) == 0){
                         updateForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                   $('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');

                    return;
                	}
                	
                }else{
	                
	                if ((missingErrorsAll (SC1MissingRequiredSelects)) == 0){
                         updateForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                   $('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');

                    return;
                	}
	                
	                
                }
            } 
            
            if (entryType == 4 && (FirstFU == 1 || FirstFU == 2) && SurgReferral != 1 && emrAttempted == 6) {
                    if (!isValidDate(($('#SecondFUDate').val()))){
					 $("#SecondFUDateMessage").text('The date must be entered in format yyyy-mm-dd').css("color","red");
					$('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');
					return;
					
					}

				
				
				
				if (SecondFU == 1 || SecondFU == 2){
				
				
					if ((missingErrorsAll (SC2RequiredSelects)) == 0){
                         updateForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                   $('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');

                    return;
                	}
                	
                }else{
	                
	                if ((missingErrorsAll (SC2MissingRequiredSelects)) == 0){
                         updateForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                   $('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');

                    return;
                	}
	                
	                
                }
            }else if (FirstFU != 1 && FirstFU !=2){
	            
	            alert('Fill First FU first');
	            return;
	            
	            
            }
            
            if (entryType == 5 && (FirstFU == 1 || FirstFU == 2) && (SecondFU == 1 || SecondFU == 2) && SurgReferral != 1 && emrAttempted == 6) {
                    if (!isValidDate(($('#ThirdFUDate').val()))){
					 $("#ThirdFUDateMessage").text('The date must be entered in format yyyy-mm-dd').css("color","red");
					$('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');
					return;
					
					}

				
				
				
				if (ThirdFU == 1 || ThirdFU == 2){
				
				
					if ((missingErrorsAll (SC3RequiredSelects)) == 0){
                         updateForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                   $('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');

                    return;
                	}
                	
                }else{
	                
	                if ((missingErrorsAll (SC3MissingRequiredSelects)) == 0){
                         updateForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                   $('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');

                    return;
                	}
	                
	                
                }
            }else if (FirstFU != 1 && FirstFU !=2){
	            
	            alert('Fill First FU first');
	            return;
	            
	            
            }else if (SecondFU != 1 && SecondFU !=2){
	            
	            alert('Fill Second FU first');
	            return;
	            
	            
            }
            
        
			if (entryType == 6 && (FirstFU == 1 || FirstFU == 2) && (SecondFU == 1 || SecondFU == 2) && (ThirdFU == 1 || ThirdFU == 2) && SurgReferral != 1 && emrAttempted == 6) {
                    if (!isValidDate(($('#FourthFUDate').val()))){
					 $("#FourthFUDateMessage").text('The date must be entered in format yyyy-mm-dd').css("color","red");
					$('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');
					return;
					
					}

				
				
				
				if (FourthFU == 1 || FourthFU == 2){
				
				
					if ((missingErrorsAll (SC4RequiredSelects)) == 0){
                         updateForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                   $('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');

                    return;
                	}
                	
                }else{
	                
	                if ((missingErrorsAll (SC4MissingRequiredSelects)) == 0){
                         updateForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                   $('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');

                    return;
                	}
	                
	                
                }
            }else if (FirstFU != 1 && FirstFU !=2){
	            
	            alert('Fill First FU first');
	            return;
	            
	            
            }else if (SecondFU != 1 && SecondFU !=2){
	            
	            alert('Fill Second FU first');
	            return;
	            
	            
            }else if (ThirdFU != 1 && ThirdFU !=2){
	            
	            alert('Fill Third FU first');
	            return;
	            
	            
            }
        
                    
        
        
        
        
        
    }
    
    if (procedureID != '') {
            if (entryType == '') {
                alert('You must select an entry type from the buttons at the top of the screen');

                $('html, body').animate({ scrollTop: 0 }, 'fast');
    
                return;
            }
		
			if (!validateInteger(Size, 20, 200)){
				$("#SizeMessage").text('This study accepts lesions larger or equal to 20mm in maximum dimension').css("color","red");
				 $('html,body').animate({scrollTop: $('#PreviousAttempt').offset().top});
                return;
			}
			
            if (emrAttempted == null) {
                alert('You must define whether the EMR was attempted prior to submission');
                
                $('html,body').animate({scrollTop: $('#EMRAttempted').offset().top});

                $("#EMRAttemptedMessage").text('Please define whether the EMR was attempted prior to submission').css("color","red");
                return;
            }

            if (entryType == 1 && emrAttempted == 6) {
               if ((missingErrorsAll (indexRequiredSelects)) == 0) {
                    submitForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
            if (entryType == 1 && emrAttempted != null && emrAttempted < 6) {
                if ((missingErrorsAll (indexNotAttemptedRequiredSelects)) == 0){
                    submitForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }

            if (entryType == 2) {
                if ((missingErrorsAll (thirtyDayRequiredSelects)) == 0){
                     submitForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
        
            if (entryType == 3 && SurgReferral == 1 && emrAttempted < 6 ) {
                    if ((missingErrorsAll (RequiredSurgeryNoAttemptSelects)) == 0){
                         submitForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
                }
            
            if (entryType == 3 && SurgReferral == 1 && emrAttempted == 6) {
                    if ((missingErrorsAll (surgeryAttemptRequiredSelects)) == 0){
                         submitForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
                }  
        
            if (entryType == 3 && SurgReferral != 1 && emrAttempted == 6) {
                    if ((missingErrorsAll (SC1RequiredSelects)) == 0){
                         submitForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
                } 
        
            if (entryType == 4) {
                if ((missingErrorsAll (SC2RequiredSelects)) == 0){
                    submitForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
        
            if (entryType == 5) {
                if ((missingErrorsAll (SC3RequiredSelects)) == 0){
                     submitForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
        
            if (entryType == 6) {
                if ((missingErrorsAll (SC4RequiredSelects)) == 0){
                     submitForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
        
        
        
        
        
        
    }
        
        
        
  //  else {s
 //       alert ('You must choose a procedure tyoe');
  //  }
}
		
function verifyESDForm () {
    var lesionID = $("#lesionID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
    
    var procedureID = $("#procedureID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
    
    var entryType = $('#entrytype').val();
	var uncontactable = $('#FollowUp2Weeks').val();
    var emrAttempted = $('#EMRAttempted').val();
    var SurgReferral = $('#SurgReferral').val();
	var Size = +$("#Size").val();
    
    if (lesionID != '') {
            if (entryType == '') {
                alert('You must select an entry type from the buttons at the top of the screen');

                $('html, body').animate({ scrollTop: 0 }, 'fast');
    
                return;
            }
		
			if (!validateInteger(Size, 20, 200)){
				$("#SizeMessage").text('This study accepts lesions larger or equal to 20mm in maximum dimension').css("color","red");
				$('html,body').animate({scrollTop: $('#PreviousAttempt').offset().top});
                return;
			}
		
            if (emrAttempted == null) {
                alert('You must define whether the ESD was attempted prior to submission');
                
                $('html,body').animate({scrollTop: $('#EMRAttempted').offset().top});

                $("#EMRAttemptedMessage").text('Please define whether the ESD was attempted prior to submission').css("color","red");
                return;
            }

            if (entryType == 1 && emrAttempted == 6) {
               if ((missingErrorsAll (indexESDRequiredSelects)) == 0) {
                    updateForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
            if (entryType == 1 && emrAttempted != null && emrAttempted < 6) {
                if ((missingErrorsAll (indexESDNotAttemptedRequiredSelects)) == 0){
                    updateForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }

            if (entryType == 2) {
                if (uncontactable == 2) {
					if ((missingErrorsAll (thirtyDayESDRequiredSelectsUncontact)) == 0){
						 updateForm();
						return;
					}
					else {
						alert('Please correct errors in form');
						$('html, body').animate({ scrollTop: 0 }, 'fast');
						return;
					}
				} else {
				
					if ((missingErrorsAll (thirtyDayESDRequiredSelects)) == 0){
						 updateForm();
						return;
					}
					else {
						alert('Please correct errors in form');
						$('html, body').animate({ scrollTop: 0 }, 'fast');
						return;
					}
				}
            }
        
            if (entryType == 3 && SurgReferral == 1 && emrAttempted < 6 ) {
                    if ((missingErrorsAll (RequiredESDSurgeryNoAttemptSelects)) == 0){
                         updateForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
                }
            
            if (entryType == 3 && SurgReferral == 1 && emrAttempted == 6) {
                    if ((missingErrorsAll (surgeryESDAttemptRequiredSelects)) == 0){
                         updateForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
                }  
        
            if (entryType == 3 && SurgReferral != 1 && emrAttempted == 6) {
                    if (!isValidDate(($('#FirstFUDate').val()))){
					 $("#FirstFUDateMessage").text('The date must be entered in format yyyy-mm-dd').css("color","red");
					$('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');
					return;
					
					}

				
					if ((missingErrorsAll (ESDSC1RequiredSelects)) == 0){
                         updateForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                   $('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');

                    return;
                }
                } 
        
            if (entryType == 4) {
				
				if (!isValidDate(($('#SecondFUDate').val()))){
					 $("#SecondFUDateMessage").text('The date must be entered in format yyyy-mm-dd').css("color","red");
					$('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');
					return;
					
					}
				
                if ((missingErrorsAll (ESDSC2RequiredSelects)) == 0){
                    updateForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
        
            if (entryType == 5) {
				
				if (!isValidDate(($('#ThirdFUDate').val()))){
					 $("#ThirdFUDateMessage").text('The date must be entered in format yyyy-mm-dd').css("color","red");
					$('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');
					return;
					
					}
				
                if ((missingErrorsAll (ESDSC3RequiredSelects)) == 0){
                     updateForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
        
            if (entryType == 6) {
				
				if (!isValidDate(($('#FourthFUDate').val()))){
					 $("#FourthFUDateMessage").text('The date must be entered in format yyyy-mm-dd').css("color","red");
					$('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');
					return;
					
					}
				
                if ((missingErrorsAll (ESDSC4RequiredSelects)) == 0){
                     updateForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
        
        
        
        
        
        
    }
    
    if (procedureID != '') {
            if (entryType == '') {
                alert('You must select an entry type from the buttons at the top of the screen');

                $('html, body').animate({ scrollTop: 0 }, 'fast');
    
                return;
            }
		
			if (!validateInteger(Size, 20, 200)){
				$("#SizeMessage").text('This study accepts lesions larger or equal to 20mm in maximum dimension').css("color","red");
				$('html,body').animate({scrollTop: $('#PreviousAttempt').offset().top});
                return;
			}
			
            if (emrAttempted == null) {
                alert('You must define whether the ESD was attempted prior to submission');
                
                $('html,body').animate({scrollTop: $('#EMRAttempted').offset().top});

                $("#EMRAttemptedMessage").text('Please define whether the ESD was attempted prior to submission').css("color","red");
                return;
            }

            if (entryType == 1 && emrAttempted == 6) {
               if ((missingErrorsAll (indexESDRequiredSelects)) == 0) {
                    submitForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
            if (entryType == 1 && emrAttempted != null && emrAttempted < 6) {
                if ((missingErrorsAll (indexESDNotAttemptedRequiredSelects)) == 0){
                    submitForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }

            if (entryType == 2) {
                if ((missingErrorsAll (thirtyESDDayRequiredSelects)) == 0){
                     submitForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
        
            if (entryType == 3 && SurgReferral == 1 && emrAttempted < 6 ) {
                    if ((missingErrorsAll (RequiredESDSurgeryNoAttemptSelects)) == 0){
                         submitForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
                }
            
            if (entryType == 3 && SurgReferral == 1 && emrAttempted == 6) {
                    if ((missingErrorsAll (surgeryESDAttemptRequiredSelects)) == 0){
                         submitForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
                }  
        
            if (entryType == 3 && SurgReferral != 1 && emrAttempted == 6) {
				
					if (!isValidDate(($('#FirstFUDate').val()))){
					 $("#FirstFUDateMessage").text('The date must be entered in format yyyy-mm-dd').css("color","red");
					$('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');
					return;
					
					}
				
                    if ((missingErrorsAll (ESDSC1RequiredSelects)) == 0){
                         submitForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
                } 
        
            if (entryType == 4) {
				if (!isValidDate(($('#SecondFUDate').val()))){
					 $("#SecondFUDateMessage").text('The date must be entered in format yyyy-mm-dd').css("color","red");
					$('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');
					return;
					
					}
				
				
                if ((missingErrorsAll (ESDSC2RequiredSelects)) == 0){
                    submitForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
        
            if (entryType == 5) {
				
				if (!isValidDate(($('#ThirdFUDate').val()))){
					 $("#ThirdFUDateMessage").text('The date must be entered in format yyyy-mm-dd').css("color","red");
					$('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');
					return;
					
					}
				
				
                if ((missingErrorsAll (ESDSC3RequiredSelects)) == 0){
                     submitForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
        
            if (entryType == 6) {
				
				if (!isValidDate(($('#FourthFUDate').val()))){
					 $("#FourthFUDateMessage").text('The date must be entered in format yyyy-mm-dd').css("color","red");
					$('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');
					return;
					
					}
				
				
                if ((missingErrorsAll (ESDSC4RequiredSelects)) == 0){
                     submitForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
        
        
        
        
        
        
    }
        
        
        
  //  else {s
 //       alert ('You must choose a procedure tyoe');
  //  }
}
		
function verifyCSPForm () {
    var lesionID = $("#lesionID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
    
    var procedureID = $("#procedureID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
    
    var entryType = $('#entrytype').val();
	var uncontactable = $('#FollowUp2Weeks').val();
    var emrAttempted = $('#EMRAttempted').val();
    var SurgReferral = $('#SurgReferral').val();
	var Size = +$("#Size").val();
    
    if (lesionID != '') {
            if (entryType == '') {
                alert('You must select an entry type from the buttons at the top of the screen');

                $('html, body').animate({ scrollTop: 0 }, 'fast');
    
                return;
            }
		
			if (!validateInteger(Size, 20, 200)){
				$("#SizeMessage").text('This study accepts lesions larger or equal to 20mm in maximum dimension').css("color","red");
				$('html,body').animate({scrollTop: $('#PreviousAttempt').offset().top});
                return;
			}
		
            if (emrAttempted == null) {
                alert('You must define whether the pCSP was attempted prior to submission');
                
                $('html,body').animate({scrollTop: $('#EMRAttempted').offset().top});

                $("#EMRAttemptedMessage").text('Please define whether the pCSP was attempted prior to submission').css("color","red");
                return;
            }

            if (entryType == 1 && emrAttempted == 6) {
               if ((missingErrorsAll (indexCSPRequiredSelects)) == 0) {
                    updateForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
            if (entryType == 1 && emrAttempted != null && emrAttempted < 6) {
                if ((missingErrorsAll (indexCSPNotAttemptedRequiredSelects)) == 0){
                    updateForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }

            if (entryType == 2) {
                if (uncontactable == 2 || uncontactable == 0) {
					if ((missingErrorsAll (thirtyDayCSPRequiredSelectsUncontact)) == 0){
						 updateForm();
						return;
					}
					else {
						alert('Please correct errors in form');
						$('html, body').animate({ scrollTop: 0 }, 'fast');
						return;
					}
				} else {
				
					if ((missingErrorsAll (thirtyDayCSPRequiredSelects)) == 0){
						 updateForm();
						return;
					}
					else {
						alert('Please correct errors in form');
						$('html, body').animate({ scrollTop: 0 }, 'fast');
						return;
					}
				}
            }
        
            if (entryType == 3 && SurgReferral == 1 && emrAttempted < 6 ) {
                    if ((missingErrorsAll (RequiredCSPSurgeryNoAttemptSelects)) == 0){
                         updateForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
                }
            
            if (entryType == 3 && SurgReferral == 1 && emrAttempted == 6) {
                    if ((missingErrorsAll (surgeryCSPAttemptRequiredSelects)) == 0){
                         updateForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
                }  
        
            if (entryType == 3 && SurgReferral != 1 && emrAttempted == 6) {
                    if (!isValidDate(($('#FirstFUDate').val()))){
					 $("#FirstFUDateMessage").text('The date must be entered in format yyyy-mm-dd').css("color","red");
					$('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');
					return;
					
					}

				
					if ((missingErrorsAll (CSPSC1RequiredSelects)) == 0){
                         updateForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                   $('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');

                    return;
                }
                } 
        
            if (entryType == 4) {
				
				if (!isValidDate(($('#SecondFUDate').val()))){
					 $("#SecondFUDateMessage").text('The date must be entered in format yyyy-mm-dd').css("color","red");
					$('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');
					return;
					
					}
				
                if ((missingErrorsAll (CSPSC2RequiredSelects)) == 0){
                    updateForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
        
            if (entryType == 5) {
				
				if (!isValidDate(($('#ThirdFUDate').val()))){
					 $("#ThirdFUDateMessage").text('The date must be entered in format yyyy-mm-dd').css("color","red");
					$('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');
					return;
					
					}
				
                if ((missingErrorsAll (CSPSC3RequiredSelects)) == 0){
                     updateForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
        
            if (entryType == 6) {
				
				if (!isValidDate(($('#FourthFUDate').val()))){
					 $("#FourthFUDateMessage").text('The date must be entered in format yyyy-mm-dd').css("color","red");
					$('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');
					return;
					
					}
				
                if ((missingErrorsAll (CSPSC4RequiredSelects)) == 0){
                     updateForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
        
        
        
        
        
        
    }
    
    if (procedureID != '') {
            if (entryType == '') {
                alert('You must select an entry type from the buttons at the top of the screen');

                $('html, body').animate({ scrollTop: 0 }, 'fast');
    
                return;
            }
		
			if (!validateInteger(Size, 20, 200)){
				$("#SizeMessage").text('This study accepts lesions larger or equal to 20mm in maximum dimension').css("color","red");
				$('html,body').animate({scrollTop: $('#PreviousAttempt').offset().top});
                return;
			}
			
            if (emrAttempted == null) {
                alert('You must define whether the CSP was attempted prior to submission');
                
                $('html,body').animate({scrollTop: $('#EMRAttempted').offset().top});

                $("#EMRAttemptedMessage").text('Please define whether the CSP was attempted prior to submission').css("color","red");
                return;
            }

            if (entryType == 1 && emrAttempted == 6) {
               if ((missingErrorsAll (indexCSPRequiredSelects)) == 0) {
                    submitForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
            if (entryType == 1 && emrAttempted != null && emrAttempted < 6) {
                if ((missingErrorsAll (indexCSPNotAttemptedRequiredSelects)) == 0){
                    submitForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }

            if (entryType == 2) {
                if ((missingErrorsAll (thirtyCSPDayRequiredSelects)) == 0){
                     submitForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
        
            if (entryType == 3 && SurgReferral == 1 && emrAttempted < 6 ) {
                    if ((missingErrorsAll (RequiredCSPSurgeryNoAttemptSelects)) == 0){
                         submitForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
                }
            
            if (entryType == 3 && SurgReferral == 1 && emrAttempted == 6) {
                    if ((missingErrorsAll (surgeryCSPAttemptRequiredSelects)) == 0){
                         submitForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
                }  
        
            if (entryType == 3 && SurgReferral != 1 && emrAttempted == 6) {
				
					if (!isValidDate(($('#FirstFUDate').val()))){
					 $("#FirstFUDateMessage").text('The date must be entered in format yyyy-mm-dd').css("color","red");
					$('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');
					return;
					
					}
				
                    if ((missingErrorsAll (CSPSC1RequiredSelects)) == 0){
                         submitForm();
                    return;
                    }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
                } 
        
            if (entryType == 4) {
				if (!isValidDate(($('#SecondFUDate').val()))){
					 $("#SecondFUDateMessage").text('The date must be entered in format yyyy-mm-dd').css("color","red");
					$('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');
					return;
					
					}
				
				
                if ((missingErrorsAll (CSPSC2RequiredSelects)) == 0){
                    submitForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
        
            if (entryType == 5) {
				
				if (!isValidDate(($('#ThirdFUDate').val()))){
					 $("#ThirdFUDateMessage").text('The date must be entered in format yyyy-mm-dd').css("color","red");
					$('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');
					return;
					
					}
				
				
                if ((missingErrorsAll (CSPSC3RequiredSelects)) == 0){
                     submitForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
        
            if (entryType == 6) {
				
				if (!isValidDate(($('#FourthFUDate').val()))){
					 $("#FourthFUDateMessage").text('The date must be entered in format yyyy-mm-dd').css("color","red");
					$('html, body').animate({ scrollTop: ($('#dataentry').offset().top) }, 'fast');
					return;
					
					}
				
				
                if ((missingErrorsAll (CSPSC4RequiredSelects)) == 0){
                     submitForm();
                    return;
                }
                else {
                    alert('Please correct errors in form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
            }
        
        
        
        
        
        
    }
        
        
        
  //  else {s
 //       alert ('You must choose a procedure tyoe');
  //  }
}
		

		
function saveVerify () {
    var lesionID = $("#lesionID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
    
    var procedureID = $("#procedureID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
    
    var entryType = $('#entrytype').val();
	var uncontactable = $('#FollowUp2Weeks').val();
    var emrAttempted = $('#EMRAttempted').val();
    var SurgReferral = $('#SurgReferral').val();
    
	if ((missingErrorsAll (saveRequiredSelects)) == 0) {
                    saveForm();
                    return;
                }else {
                    alert('Please ensure you specify LSL size and location as a minimum to save the lesion form');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                    return;
                }
	
}

function submitForm () {
    
    var $form = $("#dataentry");
	var SMSA = $('#SMSAtransmit').html();
	var SERT = $('#SERThidden').html();

    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();
    $inputs.prop("disabled", true);
     
     
    //if the initial form 
    
    if (defineInitialOrEdit () == 2){
	 
	 var procedureIDText = $("#procedureID2")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 

	    
	    
	    
    }else{
     var procedureIDText = $("#procedureID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
        
     }   
    
    
    request = $.ajax({
        url: "form.php",
        type: "post",
        data: serializedData+'&_k_procedure='+procedureIDText+'&SMSA='+SMSA+'&SERT='+SERT
    });

    request.done(function (response, textStatus, jqXHR){
        $('#lesionIDnew').html(response, textStatus);
        console.log("Successful AJAX request");
        var lesionIDnew = $('#newID').text(); 
        if (lesionIDnew) {
            alert('Data Saved');
           window.location.href = "studies.php?lesionid="+lesionIDnew;
              return;
             
        }
    });

    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        $('#errorPara').text("The following error occurred: "+ textStatus, errorThrown);
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

};
		
function saveForm () {
    
    var $form = $("#dataentry");
	//var SMSA = $('#SMSAtransmit').html();
	//var SERT = $('#SERThidden').html();

    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();
    $inputs.prop("disabled", true);
     var procedureIDText = $("#procedureID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
    
    
    request = $.ajax({
        url: "form_save.php",
        type: "post",
        data: serializedData+'&_k_procedure='+procedureIDText+'&save=1'
    });

    request.done(function (response, textStatus, jqXHR){
        $('#lesionIDnew').html(response, textStatus);
        console.log("Successful AJAX request");
        var lesionIDnew = $('#newID').text(); 
        if (lesionIDnew) {
            alert('Data Saved');
           window.location.href = "studies.php?lesionid="+lesionIDnew;
              return;
             
        }
    });

    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        $('#errorPara').text("The following error occurred: "+ textStatus, errorThrown);
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

};
        
function updateForm () {
	writeSERT();
	writeSMSA();
	var SMSA = $('#SMSAtransmit').html();
	var SERT = $('#SERThidden').html();

    var entryType = $('#entrytype').val();
    var $form = $("#dataentry");
    var $inputs = $form.find("input, select, button, textarea");
   
	
	// var serializedData = $("#dataentry :input[value!='']").serialize();
	var serializedData = $form.serialize();
    var lesionID = $("#lesionID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
	
	if (defineInitialOrEdit () == 2){
	 
	 var procedureID = $("#procedureID2")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 

	    
	    
	    
    }else{
     var procedureID = $("#procedureID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
        
     }   
	
	
    $inputs.prop("disabled", true);
	determineSERT();
	var date = new Date().toISOString().slice(0, 19).replace('T', ' ');
	console.log(date);
	/*IF THE SERT SCORE IS NOT DEFINED THEN DON'T POST IT, OTHERWISE DO
	ALSO DETERMINE SMSA IN THE SAME WAY
	POST IT IN THE SAME WAY
	
	*/
    
    request = $.ajax({
        url: "update_form.php",
        type: "post",
        data: serializedData+'&_k_lesion='+lesionID+'&SMSA='+SMSA+'&SERT='+SERT+'&date='+date+'&save=0'/*POST THE SERT SCORE AND OTHER CALCULATIONS HERE*/
    });

    request.done(function (response, textStatus, jqXHR){
        alert(response);
        $('#errorPara').text(response, textStatus);
        console.log("Successful AJAX request");
		 
		if (entryType == 2) {
			
			var proceed = $('#FollowUp2Weeks').val();
			if (proceed == 2){
				
				window.location.href = "studies.php?lesionid="+lesionID;
				
			}else{
			
			window.location.href = "procedure.php?procedureid="+procedureID+"&refer=30day";
			}
				
		}else{
		
		window.location.href = "studies.php?lesionid="+lesionID;
              return;}
    });

    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        $('#errorPara').text("The following error occurred: "+ textStatus, errorThrown);
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

};
		
function setDefaults () {
    $("#Constituent").val(3);
	$("#Constituent_other").val(0);
	$("#Adrenaline").val(1);
	$("#Dye").val(1);
	$("#Lifting").val(0);
	$("#SnareType").val(2);
	$("#SnareSize").val(1);
	$("#Current").val(5);
}

function setProcedureEMR () {
	
	 $('#techniqueType').html('1');
     for (x in ESDfields) {
		 $(ESDfields[x]).closest('tr').hide(); 
		 $(ESDfields[x]).prop('disabled',true);
	 }
	for (x in CSPfields) {
		 $(CSPfields[x]).closest('tr').hide(); 
		 $(CSPfields[x]).prop('disabled',true);
	}
	
		// $('#ActualPredominantProcedure').prop('disabled',false);
		 $("#ActualPredominantProcedure option[value='1']").prop('disabled', false);
		 $("#ActualPredominantProcedure option[value='2']").prop('disabled', false);
		 $("#ActualPredominantProcedure option[value='7']").prop('disabled', false);

		 $('#ActualPredominantProcedure').val(2);
		 $("#ActualPredominantProcedure option[value='3']").prop('disabled', true);
		 $("#ActualPredominantProcedure option[value='4']").prop('disabled', true);
		 $("#ActualPredominantProcedure option[value='5']").prop('disabled', true);
		 $("#ActualPredominantProcedure option[value='6']").prop('disabled', true);
	 
	for (x in notforESDfields) {
		$(notforESDfields[x]).closest('tr').show();
		$(notforESDfields[x]).prop('disabled',false);
	}
	
	for (x in notforCSPfields) {
		$(notforCSPfields[x]).closest('tr').show();
		$(notforCSPfields[x]).prop('disabled',false);
	}
	
	if (isResearchCentre () == '1'){
		
		WestmeadShow ();
		
	}else{
		
		WestmeadHide ();
	}
	
}
		
function setProcedureESD() {
	
	$('#techniqueType').html('2');
	for (x in CSPfields) {
		 $(CSPfields[x]).closest('tr').hide(); 
		 $(CSPfields[x]).prop('disabled',true);
	}
	
	for (x in ESDfields) {
		 $(ESDfields[x]).closest('tr').show();
		 $(ESDfields[x]).prop('disabled',false);
	}
		 $("#ActualPredominantProcedure option[value='3']").prop('disabled', false);
		 $("#ActualPredominantProcedure option[value='7']").prop('disabled', false);
		 $("#ActualPredominantProcedure option[value='1']").prop('disabled', true);
		 $("#ActualPredominantProcedure option[value='2']").prop('disabled', true);
		 $("#ActualPredominantProcedure option[value='4']").prop('disabled', true);
		 $("#ActualPredominantProcedure option[value='5']").prop('disabled', true);
		 $("#ActualPredominantProcedure option[value='6']").prop('disabled', true);

		 $('#ActualPredominantProcedure').val(3);
	 
	for (x in notforESDfields) {
		$(notforESDfields[x]).closest('tr').hide();
		$(notforESDfields[x]).prop('disabled',true);
	}
	
	WestmeadHide ();
	
	
}
		
function setProcedureCSP() {
	
	$('#techniqueType').html('3');
	
	for (x in ESDfields) {
		 $(ESDfields[x]).closest('tr').hide(); 
		 $(ESDfields[x]).prop('disabled',true);
	}
	for (x in notforESDfields) {
		$(notforESDfields[x]).closest('tr').show();
		$(notforESDfields[x]).prop('disabled',false);
	}
	
	for (x in notforCSPfields) {
		$(notforCSPfields[x]).closest('tr').hide();
		$(notforCSPfields[x]).prop('disabled',true);
	}
	
	for (x in CSPfields) {
		 $(CSPfields[x]).closest('tr').show();
		 $(CSPfields[x]).prop('disabled',false);
		}
		 $("#ActualPredominantProcedure option[value='4']").prop('disabled', false);
		 $("#ActualPredominantProcedure option[value='7']").prop('disabled', false);
		 $("#ActualPredominantProcedure option[value='1']").prop('disabled', true);
		 $("#ActualPredominantProcedure option[value='2']").prop('disabled', true);
		 $("#ActualPredominantProcedure option[value='3']").prop('disabled', true);
		 $("#ActualPredominantProcedure option[value='5']").prop('disabled', true);
		 $("#ActualPredominantProcedure option[value='6']").prop('disabled', true);

		 $('#ActualPredominantProcedure').val(4);
	 
	
	WestmeadHide ();
	
	
}
		
function disableTechniqueTypeChoose () {
	
	var intendedProcedure = $('#IntendedProcedure').val();
	var actualProcedure = $('#ActualPredominantProcedure').val();
	
	
	if (defineInitialOrEdit() == 1){
		
		$('#toStudy').hide();
		
	}
	
	if (defineInitialOrEdit() == 2){
		
		$('#toStudy').show();

		if (actualProcedure == '7') {
			
			if (intendedProcedure == '1' || intendedProcedure == '2') {
			
				setProcedureEMR();
			
			}
			
			if (intendedProcedure == '3') {
			
				setProcedureESD();
			
			}
			
			if (intendedProcedure == '4') {
			
				setProcedureCSP();
			
			}
			
			
			
		}
		
		
		if ($('#ActualPredominantProcedure').val() == '1' || $('#ActualPredominantProcedure').val() == '2'){
			
			setProcedureEMR();
			
		} else if ($('#ActualPredominantProcedure').val() == '3'){
			
			setProcedureESD();
			
		} else if ($('#ActualPredominantProcedure').val() == '4'){
			
			setProcedureCSP();
			
		}
		


		
		
		//$('#ActualPredominantProcedure').prop('disabled', true);
	}
	
	
	
}

function identifyIslesion () {
	
	$('#IsNumberNodules').closest('tr').show();
	$('#IsNumberNodules').prop('disabled',false);
	
	$('#IsSizeDominantNodule').closest('tr').show();
	$('#IsSizeDominantNodule').prop('disabled',false);
	
	$('#IsNumberNodulesLarger8mm').closest('tr').show();
	$('#IsNumberNodulesLarger8mm').prop('disabled',false);
	
	
}

function identifyNotIslesion () {
	
	$('#IsNumberNodules').closest('tr').hide();
	$('#IsNumberNodules').prop('disabled',true);
	
	$('#IsSizeDominantNodule').closest('tr').hide();
	$('#IsSizeDominantNodule').prop('disabled',true);
	
	$('#IsNumberNodulesLarger8mm').closest('tr').hide();
	$('#IsNumberNodulesLarger8mm').prop('disabled',true);
	
	
}

function checkIs () {
	
	
	if ($('#Paris').val() == '6' || $('#Paris').val() == '1' || $('#Paris').val() == '7' || $('#Paris').val() == '10' || $('#Paris').val() == '11' || $('#Paris').val() == '12'){
		
		identifyIslesion ();
		
		
	}else {
		
		
		identifyNotIslesion ();
		
	}

	
	
	
}

function isResearchCentre () {
	
	var centre = $('#centre').text();
	
	if (centre == '1' || centre == '77'){
		
		return 1;
		
	}else {
		
		return 0;
		
		
	}
	
	
}
		
$(document).ready(function() {

	//$('.content #ColdSnare').prop('disabled, true');
	
	if (isResearchCentre () == '1'){
		
		WestmeadShow ();
		
	}else{
		
		WestmeadHide ();
	}
	
	for (x in ESDfields) {
		 $(ESDfields[x]).closest('tr').hide();
		 $(ESDfields[x]).prop('disabled',true);
	 }
	
    var rawFormData = $('#formData').text();
    
    if (rawFormData != "") {
    var parsedJson = $.parseJSON(rawFormData);
    $(parsedJson).each(function(i,val){
    $.each(val,function(k,v){
        $('#'+k).val(v);  
        //console.log(k+" : "+ v);     
    });
        
    })};

	
if (defineInitialOrEdit () == 1){
setProcedureEMR();
	
}

	
highlightMandatoryFields(indexRequiredSelects);

disableTechniqueTypeChoose();
	
checkIs ();
	
$(document).ajaxStart(function(){
        $(".loader").css("display", "block");
    });
    $(document).ajaxComplete(function(){
        $(".loader").css("display", "none");
    });
	
$('.tooltip').mouseenter( function() {
	
	var tooltip = $(this).closest('tr').find('td:eq(0)').attr('title');
	
	//look for a tooltip in the first cell
	//var tooltip = $(this).find('td:eq(0)').attr('title');
	//console.log(tooltip);
	
    $(this).closest('tr').find('td:eq(2)').each (function() {	
		
		if ($(this).text() == ''){
		$(this).css("fontSize", 12);	
		$(this).text(tooltip);
		}
		
	});
});

$('.tooltip').mouseleave( function() {
	
	//look for a tooltip in the first cell
	var tooltip = $(this).closest('tr').find('td:eq(0)').attr('title');
	//console.log(tooltip);
	
    $(this).closest('tr').find('td:eq(2)').each (function() {	
		
		if ($(this).text() == tooltip){
		$(this).css("fontSize", 16);	

		$(this).text('');
		}
		
	});
});

$('.procedureSelector').click(function(){
    $('.procedureSelector.red').removeClass('red')
        $(this).addClass('red');
});
	
$('.techniqueSelector').click(function(){
    $('.techniqueSelector.green').removeClass('green')
        $(this).addClass('green');
});
	
$(".content").on("click", "#EMR", function(){
	setProcedureEMR();
});

$(".content").on("click", "#ESD", function(){
	
	setProcedureESD();
	
});

$(".content").on("click", "#ColdSnare", function(){
	
	setProcedureCSP();
	
});
	
$('.techniqueSelector').click(function(){
    $('.techniqueSelector.green').removeClass('green')
        $(this).addClass('green');
});
	
$(".content").on("change", "#Paris", function () {
	
	
	checkIs ();
	
	
	
});	
	
	
$(".content").on("click", "#setDefaults", setDefaults);

$(".content").on("click", "#toProcedure", function(){
	
	var procedureID = $("#procedureID2")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
	
	if(confirm("Go to parent procedure page?"))
				{
							window.location.href = "procedure.php?procedureid="+procedureID;
				}
				else
				{
					e.preventDefault();
				}
	
	
	
	
	
});

$(".content").on("click", "#toStudy", function(){
	
	var lesionID = $("#lesionID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
	
	if(confirm("Go to study page?"))
				{
							window.location.href = "studies.php?lesionid="+lesionID;
				}
				else
				{
					e.preventDefault();
				}
	
	
	
	
	
});

$(".content").on("click", "#toPatient", function(){
	
	var patientID = $("#patientID")
        .clone()    //clone the element
        .children() //select all the children
        .remove()   //remove all the children
        .end()  //again go back to selected element
        .text(); 
	
	if(confirm("Go to patient page?"))
				{
							window.location.href = "new.php?patientID="+patientID;
				}
				else
				{
					e.preventDefault();
				}
	
	
	
	
	
});

$(".content").on("click", "#toLesionManager", function(){

		var lesionID = $("#lesionID")
	        .clone()    //clone the element
	        .children() //select all the children
	        .remove()   //remove all the children
	        .end()  //again go back to selected element
	        .text();

	    window.location.href = "scripts/tables/lesionTable.php?lesionID="+lesionID;


	});
	
$("#HighestKudo").change(checkKudo);
    
$("#NICE_Overall").change(checkKudo);        

$("#Predict_Cancer").change(checkPredict);
$("#IPBleed").change(writeSERT);
$("#Dysplasia").change(writeSERT);
$("#Size").change(writeSMSA);
$("#Paris").change(writeSMSA);
$("#Access").change(writeSMSA);
$("#Location").change(writeSMSA);



// Bind to the submit event of our form
$("#dataentry").submit(function(event){

    var $form = $("#dataentry");

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    //var serializedData = $form.serialize();
	var serializedData = $("#dataentry :input[value!='']").serialize();

    $inputs.prop("disabled", true);

    // Fire off the request to /form.php
    request = $.ajax({
        url: "form.php",
        type: "post",
        data: serializedData
    });

    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        console.log("Hooray, it worked!");
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

});

$('.formInputs').change(function () {
        var formInputs = $(this);
        $.each(formInputs, function() {  
                if ($(formInputs).closest('tr').find('td:eq(2)').text('You must enter a value'))
                 {
                     $(formInputs).closest('tr').find('td:eq(2)').text('');
                 
             }})
    });
    
 $('#SubmitForm').click(function (){
	 
	 
	 
	 if (defineInitialOrEdit () == 1) {
		 
		 
		if  ($('#techniqueType').html() == '') {
			
			alert('You must define the type of data entry e.g. index etc and the procedure type.  Use the buttons at the top of the screen');
			$('html, body').animate({ scrollTop: 0 }, 'fast');
			
		}else{
		 
		 if ($('#techniqueType').html() == '1') {
		 
		 verifyForm ();
		 
	 		} else if ($('#techniqueType').html() == '2') {
		 
				verifyESDForm ();
		 
	 		} else if ($('#techniqueType').html() == '3') {
		 
				verifyCSPForm ();
			 
			}
		}
		 
	 } else if (defineInitialOrEdit () == 2) {
		 
		 
		 var intendedProcedure = $('#IntendedProcedure').val();
		 var actualProcedure = $('#ActualPredominantProcedure').val();
		 
		 if (actualProcedure == '7') {
			
			if (intendedProcedure == '1' || intendedProcedure == '2') {
			
				verifyForm ();
			
			}
			
			if (intendedProcedure == '3') {
			
				verifyESDForm ();
			
			}
			
			if (intendedProcedure == '4') {
			
				verifyCSPForm ();
			
			}
			
			
			
		}
		 
		 
		 
		 if ($('#ActualPredominantProcedure').val() == '1' || $('#ActualPredominantProcedure').val() == '2') {
			 
			 verifyForm ();
			 
			 
		 } else if ($('#ActualPredominantProcedure').val() == '3') {
			 
			 verifyESDForm ();
			 
			 
		 } else if ($('#ActualPredominantProcedure').val() == '4') {
			 
			 verifyCSPForm ();
			 
			 
		 } else if ($('#ActualPredominantProcedure').val() == '' || $('#ActualPredominantProcedure').val() == null) {
			 
			 console.log('value empty detected');
			 
			 verifyForm ();
			 
			 
		 }
		 
		 
		 
		 
	 }



/*

$(".content").on("click", ".reset", function(){
	
	var desired = $(this).prev();
	
	$(desired).val('');
	
	console.log(desired);
	
	
});
*/	 
	 
	 
	 
	 
 });   
    
$('.reset').click(function(){
      
   //console.log('clicked');
   
   var desired = $(this).prev();
	
	$(desired).val('');
	
	//console.log(desired);
	
});
   
        
var pageFields=[<?php 
    //$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $dbc = @mysqli_connect (DB_HOST_GIEQS, DB_USER_GIEQS, DB_PASSWORD_GIEQS, DB_NAME_GIEQS);
     $sql = "SELECT Name FROM Sheet1 ORDER BY Number ASC";
     $result = mysqli_query($dbc, $sql);
     $row=(mysqli_fetch_array($result));
        if(mysqli_num_rows($result)>0){
         while($row = mysqli_fetch_array($result)){
                 echo "\"\#".$row['Name']."\", ";}} ?> ];
        
        //define for each condition pageFieldsIndex etc and each type so select box, integer, other textarea just run through mysqliescapestring
        

$("#EMRAttempted").change(function(){
        var valueEMRAttempted;
        valueEMRAttempted = $("#EMRAttempted").val();
        if (valueEMRAttempted < 6) {
            $("#EMRAttemptedMessage").text('Resection not attempted; multiple entry fields disabled').css("color","red");
            indexNotAttemptedNotRequiredSelects.forEach(disableFields);
    }
 
   else {
      indexNotAttemptedNotRequiredSelects.forEach(enableFields); 
   $("#EMRAttemptedMessage").text('');    
		 $('#EMRAttempted').closest('tr').find('td:eq(2)').html('<button type="button"  id="setDefaults">Set Institution Defaults</button>');
   
   
   }}); 
	
	writeSERT();
	writeSMSA();
    
});

</script>
       
    <br> 
        

    <p><input type="hidden" name="centre" value="<?php echo "{$_SESSION['centre']}"; ?>" </p>
	<p><input type="hidden" name="SMSA" id="hiddenSMSA"> </p>
        </form>
        
    <?php if ($procedureID) {echo "<button name='submit' id='SubmitForm'>Complete data entry</button>&nbsp&nbsp<button name='saveUpdate' id='saveUpdate' onclick='saveVerify();'>Save without verify</button> </p>";} 
	
	if ($lesionID) {echo "<button name='submit' id='SubmitForm'>Update lesion data</button></p>";} ?>

    
     </div>
    
    </body>
   <?php include ('footer.html'); ?>
</html>
 