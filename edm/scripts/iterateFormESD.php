<?php 
        $host = substr($_SERVER['HTTP_HOST'], 0, 5);
		if (in_array($host, array('local', '127.0', '192.1'))) {
		    $local = TRUE;
		} else {
		    $local = FALSE;
		}

        
        if ($local){
            $dbc = @mysqli_connect ("localhost", "root", "", "esdv1");
			}else{
			$dbc = @mysqli_connect ("localhost", "djt", "nevira1pine", "esdv1");
				
				
			}
        
        //$dbc = mysqli_connect ("localhost", "root", "nevira1pine", "esd");
        
        /* check connection */
		if (mysqli_connect_errno()) {
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();
		}
		        
            $sql = "SELECT Name, Type, textType, Value1, Value2, Text, Message_t FROM pageLayoutESD WHERE position=".$iterationForm." AND Type IS NOT NULL ORDER BY `Order` ASC";
            //echo $sql;
            $result = mysqli_query ($dbc, $sql);
            if ($result){
            while($row = mysqli_fetch_array($result)) {
                if (($row["Type"])==1){
                    generateSelect (($row["Text"]), ($row["Name"]) , ($row["Value1"]), ($row["Value2"]), $_POST[($row["Name"])], ($row["Message_t"]), $valuesObject); 
                    
                } 
                elseif (($row["Type"])==2){
                    if($row["textType"]==1){$type="number";}elseif($row["textType"]==2){$type="text";}elseif($row["textType"]==3){$type="date";}
                    
                    generateText (($row["Text"]), ($row["Name"]) , $type, $_POST[($row["Name"])], ($row["Message_t"]));  
                    
                } 
                elseif (($row["Type"])==3){
                   generateChecked(($row["Text"]), ($row["Name"]), ($row["Value1"]), ($row["Value2"]), $_POST[($row["Name"])], ($row["Message_t"])); 
                    
                }
                elseif (($row["Type"])==4) {
                    generateTextArea (($row["Text"]), ($row["Name"]) , $_POST[($row["Name"])], ($row["Message_t"]));
                    
        
                }
                elseif (($row["Type"])==5){
                    generateHidden (($row["Text"]), ($row["Name"]) , 'hidden', $_POST[($row["Name"])]);  
                    
                } 
            }
            }else{
	            
	            printf("Errormessage: %s\n", mysqli_error($dbc));
	            
            }
       mysqli_free_result($result);
       ?>