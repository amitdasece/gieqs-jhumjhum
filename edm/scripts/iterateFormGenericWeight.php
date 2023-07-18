<?php 
    
		        
           $row = $general->formIteratorWeight($iterationForm, $tableNameSheet);

           //print_r($row);

            foreach($row as $key=>$value) {

                $value2 = $value['Value1'] . '_t';

                if (($value["Type"])==1){
                    generateSelect (($value["Text"]), ($value["Name"]) , ($value["Value1"]), ($value2), $_POST[($value["Name"])], ($value["Message_t"]), $general, $tableNameValues, ($value["Weight"])); 
                    
                } 
                elseif (($value["Type"])==2){
                    if($value["textType"]==1){$type="number";}elseif($value["textType"]==2){$type="text";}elseif($value["textType"]==3){$type="date";}
                    
                    generateText (($value["Text"]), ($value["Name"]) , $type, $_POST[($value["Name"])], ($value["Message_t"]));  
                    
                } 
                elseif (($value["Type"])==3){
                    //generateChecked(($value["Text"]), ($value["Name"]), ($value["Value1"]), ($value["Value2"]), $_POST[($value["Name"])], ($value["Message_t"])); 
                    generateChecked (($value["Text"]), ($value["Name"]) , ($value["Value1"]), ($value2), $_POST[($value["Name"])], ($value["Message_t"]), $general, $tableNameValues, ($value["Weight"])); 

                    
                }
                elseif (($value["Type"])==4) {
                    generateTextArea (($value["Text"]), ($value["Name"]) , $_POST[($value["Name"])], ($value["Message_t"]));
                    
        
                }
                elseif (($value["Type"])==5){
                    generateHidden (($value["Text"]), ($value["Name"]) , 'hidden', $_POST[($value["Name"])]);  
                    
                } 

                elseif (($value["Type"])==6){
                    generateChecked (($value["Text"]), ($value["Name"]) , ($value["Value1"]), ($value2), $_POST[($value["Name"])], ($value["Message_t"]), $general, $tableNameValues, ($value["Weight"])); 
                } 
            }

       ?>