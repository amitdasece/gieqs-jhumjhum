<?php
    
    

	//section headings
	
	//questions
	
	//options and values
	
		echo '<h1>iACE database key</h1>';
		
		echo '<p>The database currently accepts colonic resections using EMR / ESD / piecemeal cold snare polypectomy</p>';
		
		echo '<p>Certain fields are used only for specific procedures</p>';
		
		
		echo '<p>Extra Fields for ESD are ESDfields=["#ESDType", "#ESDTrainingCase", "#ESDTrainingCaseSelfCompleted", "#ESDTrainingCaseStageTakeoverCompleted", "#ESDTrainingCaseStageTakeoverReason", "#ESDTrainingCaseStageTakeoverReasonText", "#ESDhighDefScope", "#ESDcutCurrent", "#ESDcutCurrentWatts", "#ESDcutCurrentEffect", "#ESDcoagCurrent", "#ESDcoagCurrentEffect", "#ESDcoagCurrentWatts", "#ESDIPBControl", "#ESDIPBProphylacticCoag", "#ESDPocket", "#ESDaddSnareExcision", "#ESDnoPieces", "#ESDknifeType1", "#ESDknifeType2", "#ESDflushingPump", "#ESDtractionTechnique", "#ESDdurationTotal", "#ESDdurationIncision", "#ESDdurationDissection", "#ESDdurationDefectAssess", "#ESDlesionRemoved", "#ESDenblocEndo", "#ESDdefectVesselstoCoagulate", "#ESDdefectMuscleInjury", "#ESDdefectFullThicknessMuscleInjury", "#ESDHistoDimensionx", "#ESDHistoDimensiony", "#ESDHistoEnBloc", "#ESDHistoR0", "#ESDHistoVM", "#ESDHistoHM", "#ESDHistoTypes", "#ESDHistoDysplasia", "#ESDHistoInvasive", "#ESDHistoSMICDepth", "#ESDHistoSMICLVI", "#ESDHistoSMICLVIconfidence", "#ESDHistoSMICTB", "#ESDHistoSMICDifferentiation", "#ESDgeneralnotes", "#ESDSurgeryNotes"];</p>';
		
		echo '<p>Fields not required for ESD are "#SnareType", "#SnareSize", "#Current", "#No_Injection", "#No_Pieces", "#SnareExcision", "#AddModality", "#SuccessfulEMR", "#EnBloc", "#STSC_Margin", "#SCAR_complete", "#Duration", "#BookTwoStage", "#HistoPathMajor", "#Dysplasia", "#Cancer", "#SMInvasion", "#Margins", "#SpecimenSize", "#IPBleed_Control", "#DeepInjury", "#IPPerforation"];</p>';
		
		echo '<p>Extra Fields for CSP are 		
var CSPfields=["#Locationcm", "#LocationSpecific", "#CSPSnare", "#CSPprotrusion", "#CSPMarginbiopsy"]</p>';
		
				
		echo '<p>Fields not required for CSP are var notforCSPfields=["#Lifting", "#SnareSize", "#Current", "#SnareType"]';
		
		
			
		 define ('MYSQL', '../../mysqli_connect_esd.inc.php');
		 require (MYSQL); 

		 error_reporting(0);

        $dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        
        function generateSelect($stext, $sname, $svalue1, $svalue2, $post, $message) {
            $dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            
            //echo "<tr><td style=\"max-width:30%;\">".$stext." : </td><td><SELECT name = '".$sname."' id='".$sname."' class='formInputs' style=\"max-width:75%;\">";
			
			echo "<b>$stext</b>";
			echo "<br>";
			echo "Database Field name - " . $sname;
			echo "<br>";
			echo "Explanation - " . $message;
			echo "<br>";
			echo "Options:";
			$query = "SELECT `".$svalue1."`, `".$svalue2."` FROM `valuesESD` WHERE `".$svalue1."` IS NOT NULL";
            $res = mysqli_query ($dbc, $query);
            while($row = mysqli_fetch_array($res)){
             	
             	echo '<br>';
                echo $row[$svalue1]." - ".$row[$svalue2];
                    
            }
            echo '<br>';
            echo '<br>';
            mysqli_free_result($res);
        }
        
        function generateText($stext, $sname, $type, $post, $message) {
            $dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            
            //echo "<tr><td style=\"max-width:30%;\">".$stext." : </td><td><SELECT name = '".$sname."' id='".$sname."' class='formInputs' style=\"max-width:75%;\">";
			
			echo "<b>$stext</b>";
			echo "<br>";
			echo "Database Field name - " . $sname;
			echo "<br>";
			//echo "Explanation - ";
			//echo "<br>";
			echo "Free text input";            
			            echo '<br>';
			            echo '<br>';

            mysqli_free_result($res);
        }
            
       
       
        //include("FormFunctions.php");
       
       ?>
          
       
        <?php 
              $iterationForm = 1;
              $sectionTitle = array();
              $sectionTitle[1] = "Patient Details";
              $sectionTitle[2] = "Pre-ESD";
              $sectionTitle[3] = "Procedural technical details";
              $sectionTitle[4] = "Lesion details";
              $sectionTitle[5] = "Adverse Events";
              $sectionTitle[6] = "Histology";
              $sectionTitle[7] = "Surgical data";
              $sectionTitle[8] = "First Surveillance";
              $sectionTitle[9] = "Second Surveillance";
              $sectionTitle[10] = "Most Recent Surveillance";
				
			// !Westmead only version here which generates, no just hide and disable if not Westmead	
					
              for($x = 1; $x <= 10; $x++) {
                  echo '<hr>';
                  echo '<br>';
                  echo "<h2>".$sectionTitle[$x]."</h2>";
                  echo "<table style=\"table-layout: fixed;\" class=\"comorbidity\">";
                  
		                  $sql = "SELECT * FROM pageLayoutESD WHERE position=".$iterationForm." AND Type IS NOT NULL ORDER BY `Order` ASC";
		            $result = mysqli_query ($dbc, $sql);
		            while($row = mysqli_fetch_array($result)) {
		                if (($row["Type"])==1){
		                    generateSelect (($row["Text"]), ($row["Name"]) , ($row["Value1"]), ($row["Value2"]), $_POST[($row["Name"])], ($row["Message_t"])); 
		                    
		                } 
		                
		                elseif (($row["Type"])==2){
		                    if($row["textType"]==1){$type="number";}elseif($row["textType"]==2){$type="text";}elseif($row["textType"]==3){$type="date";}
		                    
		                    generateText (($row["Text"]), ($row["Name"]) , $type, $_POST[($row["Name"])], ($row["Message_t"]));  
		                    //errorMessage(($row["MessageVariable"]));
		                } 
		                
		                elseif (($row["Type"])==4) {
		                    generateText (($row["Text"]), ($row["Name"]) , $type, $_POST[($row["Name"])], ($row["Message_t"]));
		                    //errorMessage(($row["MessageVariable"]));
		        
		                }
		                
		                
		            }
					mysqli_free_result($result);
                  
                  
                  
                  
                  echo '<br>';
                  //echo "</table><br/></fieldset>";
                  $iterationForm++;
              } 
              
              $iterationForm = 1;
              $sectionTitle = array();
                    $sectionTitle[0] = "";
                    $sectionTitle[1] = "Procedure Demographics";
                    $sectionTitle[2] = "Antithrombotics";
                    $sectionTitle[3] = "Post Index Procedure Data";
                    $sectionTitle[4] = "Comorbidity";
    
              for($x = 1; $x <= 4; $x++) {
                  
                  
                     $dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $sql = "SELECT Name, Type, textType, Value1, Value2, Text FROM procedureKey WHERE position=".$iterationForm." AND Display IS NOT NULL ORDER BY `DisplayOrder` ASC";
            $result = mysqli_query ($dbc, $sql);
            while($row = mysqli_fetch_array($result)) {
                if (($row["Type"])==1){
                    generateSelect (($row["Text"]), ($row["Name"]) , ($row["Value1"]), ($row["Value2"]), $_POST[($row["Name"])]); 
                   
                } 
                elseif (($row["Type"])==2){
                    
                    
                                    } 
                           }
			mysqli_free_result($result);
           
                  
                  
                  
                  $iterationForm++;
              } 
    
           
              
       ?>

       
       
       
